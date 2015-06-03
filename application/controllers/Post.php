<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Post Controller
 * 
 * @package Controllers
 * @copyright (c) 2014 Alphasquare
*/

class Post extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('post_model');
    $this->load->model('people_model');
  }

  /**
   * Create a debate
   * URL: /debate/create
   * Accessed with AJAX
   */
  public function create() {
    login_required();
    $content = $this->input->post('content');
    $created = $this->post_model->create($content);

    // If not ajax request, redirect user back to dashboard
    if(!$this->input->is_ajax_request()) {
      redirect('dashboard');
    }

    // If the post was created, turn array that the create method returned into JSON
    if($created) {
      json_output($created, true);
    }
    else {
      json_error('Sorry, we could not post your debate.');
    }
  }

  /**
   * Edit a debate
   * (not yet)
   */
  public function edit($id) {
    login_required();
  }

  /**
   * Individual post page
   * URL: /debate/username/timestamp
   */
  public function view($username, $timestamp) {

    // Load comments model
    
    if (!$this->php_session->get('loggedin')) {

    }

    $this->load->model('comments_model');
    // Get post info
    $info = $this->post_model->get_info($username, $timestamp);
    // If post does not exist, show 404 page
    if(!$info) {
      show_404();
    }
    $data['title'] = 'post';
    $data['info'] = $info;

    // Load post html
    $data['post_html'] = $this->post_model->post_html($info,false,true);
    // Get comments
    $comments = $this->comments_model->get_all($info['id']);
    $data['comments'] = $this->comments_model->comment_html($comments, true);
    // Load post view page
    $this->template->load('posts/view', $data);
  }

  /** 
   * Voting on posts
   * URL: /debate/vote/[up|down|remove]
   */
  public function vote($type = 'up') {
    login_required();
    $id = $this->input->post('id');
    usleep(500*100);
    if(!$this->post_model->exists($id)) {
      json_error('That post does not exist');
    }
    if(!$id) die('No ID provided');
    switch($type) {
      case 'up':
      case 'down':
        $status = $this->post_model->vote($type, $id);
      break;
      case 'remove':
        $status = $this->post_model->remove_vote($id);
      break;
    }
    $counts = $this->post_model->get_vote_counts($id);
    json_output($counts, $status);
  }

  /**
   * Delete a debate
   * 
   * URL: /debate/delete
   */
  public function delete() {
    login_required();
    $id = $this->input->post('id');
    $info = $this->post_model->get_basic_info($id);
    
    if(!$info) {
      json_error('Post does not exist!');
    } 
    else if($info['userid'] !== $this->php_session->get('userid')) {
      json_error('You cannot delete that post.');
    }

    if($this->post_model->delete($id)) {
      json_output(array('id'=>$id), true);
    }
    else {
      json_error('Unable to delete post.');
    }

  }

  /**
   * Load more debates 
   * aka infinite scrolling
   * 
   * URL: /debate/load_more
   */
  public function load_more() {
    $limit = 10;
    $offset = $this->input->get('offset');
    $type = $this->input->get('type');
    $order = $this->input->get('order');
    // fallback to desc if no order is given
    if ($order == null) {
      $order = 'desc';
    }
   
    $params = array();
    if($type === 'profile') {
      $params['user_id'] = $this->input->get('user_id');
    }
    // Get posts
    $posts = $this->post_model->get_posts($type, $order, $offset, $limit, $params);
    // Get HTML for the posts
    $html = $this->post_model->post_html($posts, true);
    // Output JSON
    $json = array(
      'html' => $html,
      'count' => count($posts)
    );
    json_output($json, true);
  }

  /**
   * Poll for new posts
   * 
   * This will load any posts newer than GET[latest_id]
   * On dashboard, profiles, etc.
   *
   * URL: /debate/poll
   */
  public function poll() {
    $latest_id = $this->input->get('latest_id');
    $type = $this->input->get('type');
    $order = $this->input->get('order');
    // fallback to desc if no order is given
    if ($order == null) {
      $order = 'desc';
    }
    $params['latest_id'] = $latest_id;
    // If on profile, do params
    if($type === 'profile') {
      $params['user_id'] = $this->input->get('user_id');
    }
    // Get new posts
    $posts = $this->post_model->get_posts($type, $order, null, null, $params);
    // Get HTML for the posts
    $html = $this->post_model->post_html($posts, true);
    // Output JSON
    $json = array(
      'html' => $html,
      'count' => count($posts)
    );
    json_output($json, true);
  }

  public function modal() {
    $this->load->view('templates/post_modal');
  }
  
}

/* End of file debate.php */
/* Location: ./application/controllers/debate.php */