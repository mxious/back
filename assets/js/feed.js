/* 
 * Mxious JS Engine Feed
 * (copy) Mxious, The Alphasquare Group,
 * (copy [..]) and Alphasquare Open Source
*/

var Feed = Feed || {

	ajax_offset: 5,
	container: Main.feed_container,
	
	init: function (container, type) {
		this.feed_type = type;
		this.container = container;
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
			type = Feed.feed_type;
			$.getJSON('post/load_more', {offset: Feed.offset, type: type}).done(function (data) {
				elem = $(Main.feed_container);
				offset = Feed.offset + data.count;
				Feed.offset = offset;
				debug = {
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