/* 
 * Mxious JS Engine Feed
 * (copy) Mxious, The Alphasquare Group,
 * (copy [..]) and Alphasquare Open Source
*/

var Feed = Feed || {
	
	init: function (container, type, order) {
		this.feed_type = type;
		this.container = container;
		this.order = order;
		this.bind();
	},

	bind: function () {
		console.log("Binding values...");
		var c = Feed.container;
		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				Feed.ajax.load_more();
			}
		});
		c.masonry({
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
			var c = Feed.container;
			$.getJSON('post/load_more', {offset: offset, type: type, order: order}).done(function (data) {
				var offset = Feed.ajax_offset + data.count;
				Feed.ajax_offset = offset;
				var debug = {
					offset: offset,
					container: Feed.container
				};
				console.log("Mxious: loading more data:" + debug.offset + "," + debug.container);
				var elem = jQuery(data.html);
                c.imagesLoaded( function() { c.append(elem).masonry('appended', elem, true).masonry(); });
			});
		}
	}


}