<?php

// Session shorthand helper function

function session_get($key) {
	$CI =& get_instance();
	return $CI->php_session->get($key);
}

function logged_in() {
	$CI =& get_instance();
	return $CI->php_session->get('loggedin');
}

function login_required() {
	if (logged_in() == null or loggedin() == false):
		redirect('/');
	endif;
}

/* End */