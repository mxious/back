<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Account controllers responsible of managing account things
 * 
 * @author Sergio Diaz
 * @category Controllers
 * @version 1.0.0
 */

class Account extends CI_Controller {
		
	/**
	 * Construct for this controller. Requires models.
	 */
	
	public function __construct() {
		parent::__construct();
		$this->load->model('account_model');
	}

	/**
	 * Login controller
	 */
	
	public function login() {

		if (logged_in()) {
			redirect('feed');
		}

		if ($this->input->post('handle') && $this->input->post('password')) {
			// user submit the form
			$handle = $this->input->post('handle');
			$password = $this->input->post('password');
			// create an URL for failed logins				
			$fail_url = sprintf("login?handle=%s", $handle);
			
			if (empty($handle) || empty($password)) {
				msg('Please input your password and username.');
				redirect('login');
			}
			
			$status = $this->account_model->authenticate($handle, $password);
			
			switch ($status) {
				case true:
					redirect('feed');
					break;
				case false:
					// user has incorrect credentials, redirect back
					redirect($fail_url);
					break;
			}
		} else {
			$settings['title'] = 'Login';
			$this->template->load('account/login', $settings, array());
			
		}

	}
	
	public function register() {
		
	}
	
	public function forgot_password() {
		
	}
	
	public function logout() {
		
	}
}
