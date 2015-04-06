<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Controller
 * @package Controllers
 */

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('post_model');
		$this->load->model('people_model');
		$this->load->model('comments_model');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */