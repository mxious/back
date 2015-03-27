/* 
 * Mxious JS Engine Dash
 * (copy) Mxious, The Alphasquare Group,
 * (copy [..]) and Alphasquare Open Source
*/

var Dash = Dash || {

	feed_container: '#layout',
	// offset is 5 because php loads 5
	offset: 5,

	init: function () {
		this.bind();
	},	

	feed: {
		init: function (elem, type) {
			Dash.feed_container = elem;

			$(window).scroll(function(){
				if ($(window).scrollTop() == $(document).height() - $(window).height()){
					Dash.feed.ajax.load_more(type);
				}
			});
		},
		ajax: {
			load_more: function (type) {
				$.getJSON('post/load_more', {offset: Dash.offset, type: type}).done(function (data) {
					elem = $(Dash.feed_container);
					offset = Dash.offset + data.count;
					Dash.offset = offset;
					if (Mxious.mode == "development") {
						debug = {
							offset: offset,
							container: Dash.feed_container
						};
						console.log("Mxious: loading more data:" + debug.offset + "," + debug.container);
					}

					var elem = jQuery(data.html);
	                $(Dash.feed_container).append(elem).imagesLoaded( function() { $(Dash.feed_container).masonry('appended', elem, true); });
				});
			}
		},
	},

	post: {

	},

	comments: {

	},

	bind: function () {

	},

	load_masonry: function () {

	}

}
