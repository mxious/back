<?php
/**
 * Feed creator helper
 * @package Helpers
 * @author Sergio Diaz
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Sets the parameters required to create a feed
 * @param  string $container Feed container e.g. #feed, #layout
 * @param  string $type      Type of feed to be requested
 * @return n/a
 */
function create_feed($container, $type) {
	global $data;
	$data['feed'] = true;
	$data['feed_container'] = $container;
	$data['feed_type'] = $type;
}


/* End of file msg_helper.php */
/* Location: ./application/helpers/msg_helper.php */