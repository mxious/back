<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?></title>
		<?php echo View::forge('head'); ?>
	</head>
	<body>
		<?php echo View::forge('navbar'); ?>
		<div class="container">

			<?php if (isset($fixed_container)): ?>
			<div class="page-container col-md-6 col-md-offset-3">

				<?php if (isset($fixed_container['title'])): ?>
				<div class="page-header">
					<h1><?php echo $fixed_container['title']; ?> </h1>
				</div>		
				<?php endif; ?>
			<?php endif; ?>

			<?php echo $content; ?>

			<?php if (isset($fixed_container)): ?>
				</div>
			<?php endif; ?>

			<?php echo View::forge('footer'); ?>
		</div>
	</body>
</html>