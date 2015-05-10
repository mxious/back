<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/third_party/hybridauth/Hybrid/Auth.php';

class HybridAuthLib extends Hybrid_Auth
{
	function __construct()
	{
		$ci =& get_instance();
		$ci->load->helper('url_helper');
		$ci->config->load('hybridauthlib');
		$config = $ci->config->item('hybridauth');
		$config['base_url'] = site_url($config['base_url']);

		parent::__construct($config);

		log_message('debug', 'HybridAuthLib Class Initalized');
	}

	/**
	 * @deprecated
	 */
	public static function serviceEnabled($service)
	{
		return self::providerEnabled($service);
	}

	public static function providerEnabled($provider)
	{
		return isset(parent::$config['providers'][$provider]) && parent::$config['providers'][$provider]['enabled'];
	}
}

/* End of file HybridAuthLib.php */
/* Location: ./application/libraries/HybridAuthLib.php */