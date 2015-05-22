/* 
 * Mxious JS Engine Feed
 * (copy) Mxious, The Alphasquare Group,
 * (copy [..]) and Alphasquare Open Source
*/

var Feed = Feed || {

	ajax_offset: '',
	// don't set default values cause thats not too good.
	container: '',
	type: '',
	order: '',
	
	init: function (container, type, order) {
		this.feed_type = type;
		this.container = container;
		this.order = order;
		this.bind();
	},

	bind: function () {
		console.log("Binding values...");
		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				Feed.ajax.load_more(Feed.feed_type);
			}
		});
		$(Feed.container).masonry({
		    itemSelector: '.item-masonry',
		    isFitWidth: true,
		    columnWidth: 250
		});
	},

	ajax: {
		load_more: function () {
			var type = Feed.feed_type;
			var order = Feed.order;
			var offset = Feed.ajax_offset;
			$.getJSON('post/load_more', {offset: offset, type: type, order: order}).done(function (data) {
				var elem = $(Feed.container);
				var offset = Feed.ajax_offset + data.count;
				Feed.ajax_offset = offset;
				var debug = {
					offset: offset,
					container: Feed.container
				};
				console.log("Mxious: loading more data:" + debug.offset + "," + debug.container);
				var elem = jQuery(data.html);
                $(Feed.container).imagesLoaded( function() { $(Feed.container).append(elem).masonry('appended', elem, true).masonry(); });
			});
		}
	}


}