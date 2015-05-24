<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Discover class
 * Lets user view trending/new content
 * @package Controllers
 * 
 */
class Discover extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('people_model');
		$this->load->model('account_model');
	}
	
	public function people($type = '') {
		switch ($type) {
			case 'trending':
				// dont set a limit, there's a constant for that
				$people = $this->people_model->get_list($type);
				$data['title'] = 'Trending';
				$data['people'] = $people;
				$this->template->load('discover/people');
				break;
			case 'new':
				// again dont set a limit, there's a constant for that
				$people = $this->people_model->get_list($type);
				$data['title'] = 'New';
				$data['people'] = $people;
				$this->template->load('discover/people');
				break;
			case 'random':
				// and once again dont set a limit, there's a constant for that
				$people = $this->people_model->get_list($type);
				$data['title'] = 'Random';
				$data['people'] = $people;
				$this->template->load('discover/people');
				break;
			default:
				echo "Default case.";
				break;
		}
	}

	public function posts($type = '') {
		switch ($type) {
			case 'trending':
				// dont set a limit, there's a constant for that
				$posts = $this->post_model->get_posts('discover', 'trending');
				$data['posts'] = $this->post_model->post_html($posts, true);
				$data['title'] = 'Trending';
				$this->template->load('discover/posts');
				break;
			case 'new':
				// again dont set a limit, there's a constant for that
				$posts = $this->post_model->get_posts('discover', 'new');
				$data['posts'] = $this->post_model->post_html($posts, true);
				$data['title'] = 'New';
				$this->template->load('discover/posts');
				break;
			case 'random':
				// and once again dont set a limit, there's a constant for that
				$posts = $this->post_model->get_posts('discover', 'random');
				$data['posts'] = $this->post_model->post_html($posts, true);
				$data['title'] = 'Random';
				$this->template->load('discover/posts');
				break;
			default:
				echo "default case";
				break;
		}
	}

}