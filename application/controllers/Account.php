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

		if ($this->input->post('username') || $this->input->post('password')) {
			// user submit the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// create an URL for failed logins				
			$fail_url = sprintf("login?username=%s", $username);

			if ($username < 1 || $password < 1) {
				msg('Please input your password and username.');
				redirect('login');
			}
			
			$status = $this->account_model->authenticate($username, $password);
			
			switch ($status) {
				case true:
					redirect('feed');
					break;
				case false:
					// user has incorrect credentials, redirect back
					msg('Wrong username/password combo.');
					redirect($fail_url);
					break;
			}
		} else {
			$settings['title'] = 'Login';
			$settings['fixed_container'] = true;
			$settings['fixed_container_title'] = "Login";
			$this->template->load('account/login', $settings, array());
			
		}

	}
	
	public function register() {
		$settings['title'] = 'Register';
		$settings['fixed_container'] = true;
		$settings['fixed_container_title'] = "Register";
		$settings['extra_stylesheets'] = array("//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");
		$this->template->load('account/register', $settings);
	}
	
	public function forgot_password() {
		
	}
	
	public function logout() {
		
	}
}
