<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Main controller responsible of showing the homepage
 * 
 * @author  Sergio Diaz
 * @category Controllers
 * @version 1.0.0
 */

class Home extends CI_Controller {

	/**
	 * Initialize required libraries
	 * @access public
	 */
	
	public function __construct() {
     	parent::__construct();
     	// load any libraries. none for now
	}

	/**
	 * Homepage method
	 * 
	 * @access public
	 */

	public function index() {
		if (!logged_in()) {
			$this->template->load('home', [
				'title' => 'Home'
			]);
		} else {
			redirect('feed');
		}
	}
	
}