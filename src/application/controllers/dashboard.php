<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Controller
 * @package Controllers
 */

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('debate_model');
		$this->load->model('people_model');
		$this->load->model('comments_model');
	}

	/**
	 * Show the dashboard and load the posts
	 * URL: /dashboard
	 */
	public function index() {
		login_required();
		$data['title'] = 'Dashboard';

		// Get array of debates
		$posts = $this->debate_model->get_posts('dashboard');
		// Turn $posts array into HTML
		$data['posts_html'] = $this->debate_model->post_html($posts, true);
		// Turn $posts array into HTML

		// Get the number of people user is following
		$following = $this->people_model->get_follow_count('following');
		$data['show_follow_msg'] = $following < 1;
		// Get number of posts
		$post_count = count($posts);
		// Load dashboard css
		$data['stylesheets'] = array(
			'http://fonts.googleapis.com/css?family=Roboto+Slab:300',
			'assets/css/dashboard.css'
		);
		// Load dashboard view
		$this->template->load('dashboard', $data);
	}

	/**
	 * The mobile "more" page
	 * URL: /dashboard/more
	 */
	public function mobile_more() {
		$data['title'] = 'More';
		$this->template->load('mobile/more', $data);
	}

	/**
	 * Update alert and message counts
	 * URL: /dashboard/update_counts
	 * Accessed via AJAX
	 */
	public function update_counts() {
		$this->load->library('alert');
		$counts = array(
			'alerts' => $this->alert->get_unread_count(),
			'messages' => 0 // for now
		);
		$json = array('counts' => $counts);
		json_output($json, true);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */