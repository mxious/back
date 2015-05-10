<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Main Controller
 * The index method on this is the homepage.
 * This is also a dynamic homepage that switches
 * to explore on loggedout or dashboard
 * on loggedin.
 *
 * @package Controllers
 */

class Main extends CI_Controller {

	public $loggedin;

	function __construct() {
		parent::__construct();
		$this->load->model('post_model');
		$this->load->model('people_model');
		$this->load->model('comments_model');
		$this->loggedin = $this->php_session->get('loggedin');
	}

	public function index() {

		switch ($this->loggedin) {
			
			case true:
				// user is not logged in, explore page instead of dashboard.
				$data['title'] = 'Explore';
				// load some stylesheets
				$data['stylesheets'] = array(
					'assets/css/home.css',
					'http://fonts.googleapis.com/css?family=Lato:700'
				);

				$posts = $this->post_model->get_posts('explore', 0);
				// Turn $posts array into HTML
				$data['posts'] = $this->post_model->post_html($posts, true);
				// tell the JS that there is a feed here
				$data['feed'] = true;
				// set a container for the feed
				$data['feed_container'] = '#feed';
				$this->template->load('home', $data);

				break;
			
			case false:

				// user is not logged in, explore page instead of dashboard.
				$data['title'] = 'Explore';
				// load some stylesheets
				$data['stylesheets'] = array(
					'assets/css/home.css',
					'http://fonts.googleapis.com/css?family=Lato:700'
				);

				$posts = $this->post_model->get_posts('explore', 0);
				// Turn $posts array into HTML
				$data['posts'] = $this->post_model->post_html($posts, true);
				// tell the JS that there is a feed here
				$data['feed'] = true;
				// set a container for the feed
				$data['feed_container'] = '#feed';
				$this->template->load('home', $data);
				break;

		}

	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */