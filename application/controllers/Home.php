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
	 * Homepage method
	 * 
	 * @access public
	 */

	public function index() {
		switch (logged_in()) {

			case true:
				redirect("feed");
				break;

			case false:
				$settings['title'] = 'Home';
				$this->template->load("home", $settings);
				break;
				
		}
	}
	
}