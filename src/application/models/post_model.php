<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Posts Model
 *
 * @package Models
*/

class Post_model extends CI_Model {

  /**
   * Get an array of posts depending on the params passed
   *
   * @param string $type The type of posts (dashboard, profile, etc.)
   * @param string $order The order of the posts (asc or desc)
   * @param int $offset The number of posts to start at
   * @param int $limit The number of posts to select (0 = all)
   * @param array $params An optional array of info (e.g. user id)
   * @return array An array of posts and their info
   */
  public function get_posts($type, $offset = 0, $limit = POST_DISPLAY_LIMIT, $params = array()) {
    $userid = $this->php_session->get('userid');
    $this->db->select('d.*, u.id as userid, u.username, u.email, u.avatar, v.vote')
             ->from('posts d')
             // Get post owner's info
             ->join('users u', 'u.id = d.userid', 'inner')
             // Get the vote that the logged in user made on this post
             ->join('votes v', "v.postid = d.id AND v.userid = '{$userid}'", 'left');

    // If latest_id param is present, add a statement to the WHERE clause
    if(isset($params['latest_id']) && $params['latest_id'] > 0) {
      $this->db->where('d.id > '.$params['latest_id'], null, false);
    }

    switch($type) {
      case 'dashboard':
        // User is on the dashboard
        // Select posts by users that the logged in user is following or their own posts
        $this->db->where("(d.userid IN
                            (
                              SELECT followid
                              FROM following
                              WHERE userid = '{$userid}'
                            )
                          OR d.userid = '{$userid}' )", null, false);
      break;
      case 'explore':
      break;
      case 'profile':
        // User is on a profile
        // Select posts by the profile user
        $this->db->where('d.userid', $params['user_id']);
      break;
      case 'search':
        // Searching posts
        $this->db->like('d.content', $params['query'], 'both');
      break;
    }

      $this->db->order_by('d.time', 'desc');
    

    if(!$limit) $limit = POST_DISPLAY_LIMIT; 
    $this->db->limit($limit, $offset);

    $results = $this->db->get()->result_array();

    return $results;
  }

 
  /**
   * Get the information of a post
   * @param string $username The post owner's username
   * @param int $timestamp The post creation timestamp
   * @return array An array of the post's info
   */
  public function get_info($username, $timestamp) {
    $userid = $this->php_session->get('userid');
    $where = array(
      'u.username' => $username,
      'd.time' => $timestamp
    );
    $this->db->select('d.*, u.id as userid, u.username, u.email, u.avatar, v.vote')
             ->from('posts d')
             ->join('users u', 'u.id = d.userid', 'left')
             ->join('votes v', 'v.postid = d.id AND v.userid = "'.$userid.'"', 'left')
             ->where($where)
             ->limit(1);
    $info = $this->db->get()->row_array();
    return $info;
  }

  /**
   * Get a specific post's info by ID
   *
   * This is for getting a post's info by ID
   * It does not include the post owner's info (no join on user table)
   * 
   * @param int $id The post's ID
   * @return array An array of the post's info
   */
  public function get_basic_info($id) {
    return $this->db->get_where('posts', array('id'=>$id))
                    ->row_array();
  }

  /**
   * Check if post exists
   *
   * @param int $id Debate ID
   */
  public function exists($id) {
    $this->db->select('id')
             ->from('posts')
             ->where('id', $id);
    return $this->db->count_all_results() ? true : false;
  }

  /**
   * Create a post
   * @param string $content The text of the post
   * @return array|bool If creation was successful an array will be returned; on failure false will be returned
   */
  public function create($content) {
    $data = array(
      'userid' => $this->php_session->get('userid'),
      'content' => $content,
      'time' => time()
    );

    $this->load->library('points');
    $this->points->addPoints(5);

    $insert = $this->db->insert('posts', $data);
    if($insert) {
      // Filler data for the template (will throw undefined errors without this)
      $data['up_votes'] = 0;
      $data['down_votes'] = 0;
      $data['comments_count'] = 0;
      $data['vote'] = null;
      $data['email'] = $this->php_session->get('email');
      $data['avatar'] = $this->php_session->get('avatar');
      $data['username'] = $this->php_session->get('username');
      $data['id'] = $this->db->insert_id();
      $post_html = $this->post_html($data);
    }
    $return = array('html' => $post_html);

    $this->load->library('mentions');
    $this->load->library('alert');

    $mentions = $this->mentions->list_mentions($content);

    if ($mentions) {
      foreach ($mentions as $m) {
        
        if ($this->mentions->user_exists($m)) {
          $userid = $this->mentions->get_userid($m);
          $this->alert->create($userid, 'mention', 'post', $data['id']);
        }

      }
    }

    return $insert ? $return : false;
  }

  /**
   * Delete a post
   * @param  int $id The post ID to delete
   * @return bool
   */
  public function delete($id) {

    
      $this->load->library('points');
      $this->points->removePoints(5);
    

    return $this->db->delete('posts', array('id'=>$id));


  }

  /**
   * Get the HTML for a post from view template
   *
   * @param array $data The post's info
   * @param bool $list Whether or not there are multiple posts in $data
   * @param bool $post_page Whether or not user is on a post page
   * @return string The HTML for the post
   */
  public function post_html($data, $list = false, $post_page = false) {
    $this->load->helper('format_post');
    // If $list is true, then we have multiple posts
    if($list) {
      $data = array('posts' => $data);
    }
    // Else, we have only one post
    else {
      // Whether or not we are on a post page
      if($post_page) {
        $data['post_page'] =  true;
      }
      // Allow the foreach loop to still loop the item (will loop once)
      $data = array('posts' => array($data));
    }
    $html = $this->load->view('posts/html_template', $data, true);
    return $html;
  }

  /**
   * Gets the up and down vote counts of a post
   *
   * @param int $id The post's ID
   * @return array The up and down vote counts
   */
  public function get_vote_counts($id) {
    $this->db->select('userid')
             ->from('votes')
             ->where(array('postid' => $id, 'vote' => 1));
    $up = $this->db->count_all_results();

    $this->db->select('userid')
             ->from('votes')
             ->where(array('postid' => $id, 'vote' => -1));
    $down = $this->db->count_all_results();

    $counts = array(
      'up_votes' => $up,
      'down_votes' => $down
    );
    return $counts;
  }

  /** 
   * Sync vote columns with votes table counts.
   *
   * This method "syncs" the vote columns on the posts table
   * with the actual vote counts in the votes table.
   *
   * @param int $id The ID of the post
   * @return void
   */
  public function sync_vote_columns($id) {
    // get_vote_counts() returns an array: up_votes, down_votes
    $counts = $this->get_vote_counts($id);
    $this->db->where('id', $id);
    $this->db->update('posts', $counts);
  }

  /**
   * Insert a vote into the DB
   *
   * @param string $type The type of vote (up or down)
   * @param int $id The ID of the post
   * @return bool
   */
  public function vote($type, $id) {

    $info = $this->get_basic_info($id);
    if(!$info) {
      json_error('Oops, that post does not exist.');
    }

    // If type is up, vote is 1
    // Else type is down, vote is -1
    $vote = $type === 'up' ? 1 : -1;
    $userid = $this->php_session->get('userid');

    // Using regular SQL because ActiveRecord doesn't have
    // an easy way to do ON DUPLICATE KEY UPDATE
    $sql = 'INSERT INTO votes (userid, postid, vote)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE
              vote = VALUES(vote)';
    // Execute SQL, pass in parameters (like prepared statements)
    $query = $this->db->query($sql, array($userid, $id, $vote));

    if($query) {
      // Update vote columns
      $this->sync_vote_columns($id);
      // Notify the post owner
      $this->load->library('alert');
      $alert_type = $vote === 1 ? 'like' : 'dislike';
      $this->alert->create($info['userid'], $alert_type, 'post', $id);
      return true;
    }
    else {
      return false;
    }

  }

  /**
   * Remove (undo) a vote
   * @param int $id The ID of the post
   * @return bool
   */
  public function remove_vote($id) {
    $where = array(
              'postid'=>$id,
              'userid'=>$this->php_session->get('userid')
             );
    // Delete the vote row
    $this->db->delete('votes', $where);
    // Update the vote column
    $this->sync_vote_columns($id);
    return true;
  }

}

/* End of file post_model.php */
/* Location: ./application/models/post_model.php */