<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>	
	<?php $this->load->view('templates/head'); ?>
</head>
<body>
	<?php $this->load->view('templates/navbar'); echo "\n"; ?>
	<div class="container">

	<?php if($parallax == true && !$this->php_session->get('loggedin')): ?>
			<?php $this->load->view('templates/parallax'); ?>
	<?php endif; ?>

	<?php if ($msg !== null): echo $msg; endif; ?>

	<?php echo $contents; ?>

	<?php $this->load->view('templates/footer'); echo "\n"; ?>
	</div>
</body>
</html>