<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Comments Controller
Anything to do with comments
*/

class Comments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('comments_model');
	}

	public function create() {

		login_required();
		
		$postid = $this->input->post('postid');
		$content = trim($this->input->post('content'));

		$this->load->model('post_model');
		$info = $this->post_model->get_basic_info($postid);
		if(!$info) {
			json_error('That post does not exist.');
		}

		if(strlen($content) < 1) {
			json_error('Please enter a comment.');
		}

		$created = $this->comments_model->create($postid, $content);
		if($created) {
			// Send the post owner an alert
			$this->load->library('alert');
			$this->alert->create($info['userid'], 'comment', 'post', $created['id']);
			// Debate HTML
			$html = $this->comments_model->comment_html($created, false);
			// Output JSON with the comment's html
			$data = array('html' => $html);
			json_output($data, true);
		}
		else {
			json_error('Sorry, your comment could not be posted. Please try again later.');
		}

	}

}

/* End of file comments.php */
/* Location: ./application/controllers/comments.php */