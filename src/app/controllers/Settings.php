<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('account_model');
    login_required();
  }

}

/* End of file settings.php */
/* Location: ./application/controllers/settings.php */