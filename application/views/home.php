<?php if(!session_get('loggedin')): ?>
	<!-- Discover -->
	<div class="feed row" data-feed-type="discover" data-feed-order="desc">
		<?=$posts?>
	</div>
<?php else: ?>
	<!-- Dashboard -->
	<div class="feed ro" data-feed-type="discover" data-feed-order="desc">
		<?=$posts?>
	</div>
<?php endif; ?>