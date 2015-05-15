<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Points Library
 *
 * Deals with points.
 *
 * @package libraries
 * 
 */

class Points {

	public function __construct() {
    	$this->CI =& get_instance();
    }

	/**
	 * 
	 * Verifies the amount of points a user has
	 * @return string Amount of points the user has, according to sess
	 * 
	 */
	
	public function get() {
		$points = $this->CI->php_session->get('points');
		return $points;
	}

	/**
	 * 
	 * Adds points to the current user
	 * @param $amount Integer, amount of points to add to the user
	 *  
	 */
	
	public function add($amount = 0) {
		$points = $this->CI->php_session->get('points');
		$userid = $this->CI->php_session->get('userid');
		$result = $points + $amount;
		$this->CI->php_session->set('points', $result);
		$this->CI->db->update('users', array('points'=>$result), array('id' => $userid));
	}
	
	/**
	 * 
	 * Removes points to the current user
	 * @param $amount Integer, amount of points to remove from the user
	 *  
	 */
	
	public function remove($amount = 0) {
		$points = $this->CI->php_session->get('points');
		$userid = $this->CI->php_session->get('userid');
		$result = $points - $amount;
		$this->CI->php_session->set('points', $result);
		$this->CI->db->update('users', array('points'=>$result), array('id' => $userid));
	}


}
