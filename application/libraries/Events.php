<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Events Library
 *
 * We like events instead of calling a million functions for everything.
 *
 * @package libraries
 */

class Events {

  public function __construct() {
    $this->CI =& get_instance();
  }

  public function call($event) {
    switch ($event) {
      
      case POST_CREATE:
        
        break;
      case POST_DELETE:
        
        break;
      case COMMENT_CREATE:
        
        break;
      case COMMENT_DELETE:
        
        break;
      case LOGIN:
        
        break;
      case LOGOUT:
        
        break;
      case FOLLOW:
        
        break;
      case UNFOLLOW: 
        
        break;
      default:
        trigger_error('Events: library called, no known argument passed', E_USER_ERROR);
    }
  }
}

/* End of file events.php */
/* Location: ./application/libraries/events.php */