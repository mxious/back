<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('people_model');
		$this->load->model('account_model');
	}
	
	/**
	 * Display users
	 * @param string $type type of users to display
	 */
	public function index($type) {
		switch ($type) {
			case 'trending':
				$people = $this->people_model->get_list('trending');
				$data['people'] = $people;
			break;
			case 'new':
				$people = $this->people_model->get_list('new');
				$data['people'] = $people;				
			break;
			case 'random':
				$people = $this->people_model->get_list('random');
				$data['people'] = $people;				
			break;
			default:
				// default to a really sexy page asking the users what they want to discover
			break;
		}
		$data['title'] = "People";
		$this->template->load('people/page', $data);
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