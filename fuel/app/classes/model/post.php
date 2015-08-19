<?php

namespace Model;

use \Model as Model;
use \DB as DB;
use \Session as Session;

class Post extends Model
{

	public static function get_posts($type, $order_by = 'desc', $offset = 0, $limit = POST_LOAD_LIMIT)
	{
		// fetch the current user's id. if not set, return null
		$userid = Session::get('userid');

		// select statement passed as array
		$sql = [
			'*',
			['users.id', 'userid'],
			'users.username',
			'users.email',
			'likes.like'
		];

		// instance the db object
		$query = DB::select_array($sql)->from('posts');

		// do joins
		$query->join('users', 'INNER');
		$query->on('users.id', '=', 'posts.userid');

		$query->join('likes', 'left');
		$query->on('likes.postid', '=', 'posts.id');
		// get the current user's vote, if exists
		$query->and_on('likes.userid', '=', $userid);

		// Choose what type of feed to display
		switch ($type) {
			case 'dashboard':
				$expr = DB::expr("(posts.userid IN (SELECT followid FROM following WHERE userid = '{$userid}') OR posts.userid = '{$userid}' )");
				$query->where($expr);
			break;
			case 'profile':
				$query->where('posts.userid', '=', $params['userid']);
			break;
			case 'search':
				$query = DB::escape($params['query']);
				$query = "%{$query}%";
				$query->where('posts.content', 'LIKE', $query);
			break;
			case 'explore':
			break;
			case 'trending':
				// TODO: create trending search
			break;
		}

		// ORDER BY
		switch ($order_by) {
			case 'desc':
				$query->order_by('posts.time', 'desc');
			break;
			case 'asc':
				$query->order_by('posts.time', 'asc');
			case 'trending':
			break;
			case 'explore':
			break;
		}

		$query->limit($limit);
		$query->offset($offset); 

		return $query->as_object()->execute();
	}

}