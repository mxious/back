Feed design explanation
=========================

Right now to instantiate a feed object you would have to go through our templating library first, by passing the settings in an array, like so:

	$data['feed_settings'] = ['#feed', 'discover', 'trending'];

Which would go through this:

	if (isset($view_data['feed_settings'])) {
		$this->set('feed', true);
		$this->set('feed_container', $view_data['feed_settings'][0]);
		$this->set('feed_type', $view_data['feed_settings'][1]);
		$this->set('feed_order', $view_data['feed_settings'][2]);
	} else {
		$this->set('feed', false);
	}

And load the parameters through the template for the footer, like so:

	Main.init({
		userid: <?=$cur_userid?>,
		<?php if ($feed): ?>
		  feed: true,
	      feed_container: '<?=$feed_container?>',
		  feed_type: '<?=$feed_type?>',
		  feed_order: '<?=$feed_order?>',
		  php_offset: <?=POST_DISPLAY_LIMIT?>
		<?php endif; ?>
	});
	</script>

That then, does this on the JS.
	
	var Main = Main || {
		// Define some variables
		userid: "",

		init: function (params) {
			
			console.log("Initializing Mxious.js");
			this.userid = params.userid;

			if (params.feed == true) {
				console.log("Initializing Feed.js");
				var type = params.feed_type;
				var container = params.feed_container;
				var order = params.feed_order;
				Feed.ajax_offset = params.php_offset;
				[...]

That adds an extra layer of complexity which is pretty annoying and adds overhead.

The new way
=============

Just load a view with this simple html:

	<div id="feed" data-feed="true" data-feed-type="discover" data-feed-order="desc">
	</div>

And through a simple JS if statement find one and load it according to the parameters given through the attributes.

Far simpler, eh?
And the client-side overhead is none, really. It's basically doing the same thing without the server overhead. Just looks if an item has the #feed id or data-feed is set to true in any item.
