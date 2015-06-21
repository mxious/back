<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Account controllers responsible of managing account things
 * 
 * @author Sergio Diaz
 * @category Controllers
 * @version 1.0.0
 */

class Account extends CI_Controller {
	
	// keep a copy of the session variable so we don't stres $_SESSION much
	public $session;
	
	/**
	 * Construct for this controller. Requires models.
	 */
	
	public function __construct() {
		parent::__construct();
		$this->load->model('account_model');
	}
	
	public function login() {
		if ($this->input->post('handle') && $this->input->post('password')) {
			$handle = $this->input->post('handle');
			$password = $this->input->post('password');
			
			if (empty($handle) || empty($password)) {
				msg('Please input your password and username.');
				redirect('login');
			}
			
			$status = $this->account_model->authenticate($handle, $password);
			
			switch ($status) {
				case true:
					// log in
					break;
				case false:
					// idk
					break;
			}
		}
	}
	
	public function register() {
		
	}
	
	public function forgot_password() {
		
	}
	
	public function logout() {
		
	}
}
