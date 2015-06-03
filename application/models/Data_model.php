<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use GuzzleHttp\Client;

/**
 * Data Model
 * 
 * @package Models
 * @copyright (c) 2014 Alphasquare
*/

class Data_model extends CI_Model {
	public function get_art_results($query) {
		$query = urldecode($query);
		$query = preg_replace('{ [^ \w \s \' " ] }x', ' ', $query);
		$guzzle = new Client(['base_uri' => 'http://itunes.apple.com/']);
		$url = sprintf('/search?term=%s&limit=1&media=music&entity=musicTrack,album,mix,song', $query);
		try {
			$request = $guzzle->get($url);
			return json_decode($request->getBody(), true);
		} catch (RequestException $e) {
				return null;
		}
	}
}