<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Main Controller
 * The index method on this is the homepage
 *
 * @package Controllers
 */

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('debate_model');
	}

	/**
	 * This is the home page
	 */
	public function index() {

		// If user is logged in, redirect to dashboard
		if($this->php_session->get('loggedin')) {
			redirect('dashboard');
		}
		else {
			$data['title'] = 'Welcome';
			$data['stylesheets'] = array(
				'assets/css/home.css',
				'http://fonts.googleapis.com/css?family=Lato:700'
			);
			$posts = $this->debate_model->get_posts('explore', 0, 0);
			// Turn $posts array into HTML
			$data['posts'] = $this->debate_model->post_html($posts, true);
			$this->template->load('home', $data);
		}

	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */