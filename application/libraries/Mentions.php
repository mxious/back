<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Mention Library
 * Manage everything regarding handles
 *
 * @package Libraries
 * @author Sergio Diaz
 * @copyright (c) 2014 Alphasquare
 *
 */

class Mentions {

  public function __construct() {
    $this->CI =& get_instance();
  }

  /**
   * Lists all mentions on a string using regex
   * @param string $string the string to scan
   * @return array|bool if mentions are found, array returned, else false boolean
   */

  public function list_mentions($string) {
    preg_match_all('/(^|[^a-z0-9_])@([a-z0-9_]+)/i', $string, $mentions);
    $found = array();

    if(empty($mentions[0])) return false;

    foreach($mentions[0] as $match) {
      $found[] = preg_replace("/[^a-z0-9]+/i", "", $match);
    }
    
    return $found;
  }

  /**
   * Checks if user exists
   * @param string $username the user's username
   * @return bool whether the user exists or not
   */

  public function user_exists($username) {
    $this->CI->db->select('id')
             ->from('users')
             ->where('username', $username);

    if($this->CI->db->get()->num_rows > 0) {
    	return true;
    } else {
    	return false;
    }
  }

  /**
   * Gets userid for usernsme
   * @param string $username username
   * @return int the user's uid
   */

  public function get_userid($username) {
    $this->CI->db->select('id')
             ->from('users')
             ->where('username', $username);

    $array = $this->CI->db->get()->row_array();

    return $array['id'];
  }

}