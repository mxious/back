<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?></title>
		<?php $this->load->view('templates/head'); ?>
	</head>
	<body>
		<?php $this->load->view('templates/navbar'); echo "\n"; ?>
		<div class="container">

			<?php if ($fixed_container): ?>
			<div class="page-container col-md-6 col-md-offset-3">

				<?php if (isset($fctitle)): ?>
				<div class="page-header">
					<h1><?php echo $fctitle; ?> </h1>
				</div>		
				<?php endif; ?>
			<?php endif; ?>
			<?php if ($msg !== null): echo $msg; endif; ?>
			
			<?php echo $contents; ?>

			<?php if (isset($container)): ?>
				</div>
			<?php endif; ?>

			<?php $this->load->view('templates/footer'); echo "\n"; ?>
		</div>
	</body>
</html>