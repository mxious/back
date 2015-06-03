<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use GuzzleHttp\Client;

/**
 * Data Controller
 * 
 * @package Controllers
 * @copyright (c) 2014 Alphasquare
*/

class Data extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('data_model');
	}

	public function album_art($query = '') {
		$big = $this->input->get('big');
		$html = $this->input->get('html');
		if (!empty($query)) {
			$results = $this->data_model->get_art_results($query);
			if ($results !== null && is_array($results)) {
				$count = $results['resultCount'];
				if ($count > 1) {
					// rarely happens, just to make sure we don't blow up
				} elseif ($count == 0) {
					echo json_encode(['count' => $count, 'success' => 'true']);
				} else {
					$artist = $results['results'][0]['artistName'];
					$name = $results['results'][0]['collectionName'];
					if ($big == true) {
						// default to 100x00, else use big
						$artwork = $results['results'][0]['artworkUrl100'];
						$artwork = preg_replace('/\s*\.100x100.*\.|\s*\[.*\]/U', '.', $artwork);
					} elseif ($html == true) {
						$artwork = $results['results'][0]['artworkUrl100'];
						$artwork = preg_replace('/\s*\.100x100.*\.|\s*\[.*\]/U', '.', $artwork);
						$artwork = sprintf('<img id="art-img" src="%s">', $artwork);
					} else {
						$artwork = $results['results'][0]['artworkUrl100'];
					}
					$response = [
						'count' => $count,
						'artwork' => $artwork,
						'artist' => $artist,
						'name' => $name,
						'success' => true
					];
					echo json_encode($response);
				}
			}
		} else {
			echo json_encode(['error' => 'Missing query parameter', 'success' => 'false']);
		}
	}

}