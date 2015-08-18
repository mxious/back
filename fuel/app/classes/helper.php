<?php

/**
 * Helper Class
 * Random-usage functions that really don't fit anywhere.
 *
 * @package  Helpers
 * @author  Sergio Diaz <sergio@alphasquare.us>
 */

class Helper
{

	/**
	 * Determine if user is loggedin
	 * @return boolean
	 */
	
	public static function is_loggedin()
	{
		return \Session::get('loggedin', false);
	}

}