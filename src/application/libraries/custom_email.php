<?php
if(!defined('BASEPATH')) die('No direct script access allowed');

/** 
 * Custom email library
 * Uses CodeIgniter email class to send email
 *
 * Example usage:
 *
 *  $this->load->library('custom_email');
 *  $email_data = array(
 *  	'subject' => 'Some nice subject...',
 *  	'type' => 'EMAIL_VIEW_FILE', // located in views/emails/
 *  	'to' => 'john.doe@gmail.com'
 *  );
 *  $this->custom_email->set_data($email_data);
 *  $this->custom_email->send();
 *
 * @uses CodeIgniter email class
 * @package Libraries
 *
 */

class Custom_email {

	private $data = array();

	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->library('email');
	}

	/**
	 * Set the data for the email
	 * @access public
	 * @param array $data An array of info for the email.
	 * @return void
	 */
	public function set_data($data) {

		if(isset($data['username'])) {
			$data['name'] = $data['username'];
		}
		else {
			$data['name'] = $this->CI->php_session->get('username');
		}

		if(is_array($data['to'])) {
			$data['to_email'] = implode(',', $data['to']);
		}
		else {
			$data['to_email'] = $data['to'];
		}

		$this->data = $data;

		$this->load_email_view();
		$this->set_options();

	}

	/**
	 * Load the view for the email text
	 * @access private
	 * @return void
	 */
	private function load_email_view() {
		$name = $this->data['type'];

		if(!file_exists(APPPATH.'/views/emails/'.$name.'.php')) {
			die('<b>Error:</b> The email view <em>'.$name.'</em> does not exist.');
		}

		// load the email body view
		$message = $this->CI->load->view('emails/'.$name, $this->data, true);

		// load the main email template, and pass the message data
		// from the email view (above) to the template
		$this->data['message'] = $message;
		$this->data['full_message'] = $this->CI->load->view('emails/template', $this->data, true);
	}

	/**
	 * Set the options on the CI email library
	 * @access private
	 * @return void
	 */
	private function set_options() {

		$data = $this->data;

		if(!isset($data['from'])) {
			$this->CI->email->from(SYS_EMAIL_FROM, 'Alphasquare');
			$this->CI->email->reply_to(SYS_EMAIL_FROM, 'Alphasquare');
		}
		else {
			$this->CI->email->from($data['from']);
		}

		if(isset($data['reply_to'])) {
			$this->CI->email->reply_to($data['reply_to']);
		}

		$this->CI->email->to($data['to']);
		$this->CI->email->subject($data['subject']);
		$this->CI->email->message($data['full_message']);

	}

	/**
	 * Send the email
	 * @return bool
	 */
	public function send() {
		$this->CI->email->set_mailtype('html');
		return $this->CI->email->send();
	}

	/**
	 * Protects an email with asterisks
	 * 
 	 * This masks an email address with asterisks. 
 	 * Example: natha*****@gmail.com
 	 *
 	 * @param string $email Email address to mask
 	 * @param int    $min   Minimum number of characters
 	 * @return string       The masked email address.
 	 */
	public function obfuscate_email($email, $min = 3) {
	    $em   = explode("@",$email);
	    $name = implode(array_slice($em, 0, count($em)-1), '@');
	    $len  = floor(strlen($name)/2);
	    if(strlen($name) <= 4) {
	    	$name = substr($name, 0, 1);
	    	$len *= 2;
	    }

	    return substr($name, 0, $len) . str_repeat('*', $len) . "@" . end($em);

	}

}

/* End of file custom_email_helper.php */
/* Location: ./application/libraries/custom_email.php */