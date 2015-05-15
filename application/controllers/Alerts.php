<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Alerts Controller
 * View, mark as read, and delete alerts
 *
 * @package Controllers
*/

class Alerts extends CI_Controller {

  public function __construct() {
    parent::__construct();
    login_required();
    $this->load->model('alerts_model');
    $this->load->library('alert');
  }
  
}

/* End of file alerts.php */
/* Location: ./application/controllers/alerts.php */
