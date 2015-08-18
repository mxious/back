<?php

namespace Controller;

use \Controller_Template as Controller_Template;
use \View as View;
use \Helper as Helper;

/**
 * Home controller
 * 
 * @author  Sergio Diaz <sergio@alphasquare.us>
 * @package  Controllers 
 * @extends Controller_Template
 */

class Home extends Controller_Template 
{

	public function action_index()
	{
		if (Helper::is_loggedin()) {
			\Response::redirect('/dashboard');
		}

		$this->template->title = "Home | Mxious";
		$this->template->posts = Post_Model::get_posts();
		$this->template->content = View::forge('home/content');
	}

}