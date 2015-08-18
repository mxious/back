$(function () {
    $("#menu").tooltip('show');
});

var grid = $('#grid');
grid.imagesLoaded(function() {
	grid.masonry({
	    isFitWidth:true,
	    isAnimated: true,
	    columnWidth: '.card-std'
	});
});
