<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('people_model');
		$this->load->model('account_model');
	}

	/**
	 * Follow a user
	 * @param int $id User ID to follow
	 */
	public function follow($id) {
		login_required();
		if($id == $this->php_session->get('userid')) {
			json_error('You cannot follow yourself.');
		}
		$follow = $this->people_model->follow('follow', $id);
		$this->events->call(FOLLOW);
		if($follow) {
			json_output(null,true);
		}
		else {
			json_output(null,false,'Sorry, an error occurred.');
		}
	}

	/**
	 * Unfollow a user
	 * @param int $id User ID to unfollow
	 */
	public function unfollow($id) {
		login_required();
		if($id == $this->php_session->get('userid')) {
			json_error('You cannot follow yourself.');
		}
		$follow = $this->people_model->follow('unfollow', $id);
		$this->events->call(UNFOLLOW);
		if($follow) {
			json_output(null,true);
		}
		else {
			json_output(null,false,'Sorry, an error occurred.');
		}
	}


}

/* End of file people.php */
/* Location: ./application/controllers/people.php */