<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>	
	<?php $this->load->view('template/header'); ?>
</head>
<body>
	<?php $this->load->view('template/navbar'); echo "\n"; ?>

	<?php if($parallax == true && !$this->php_session->get('loggedin')): ?>
			<?php $this->load->view('templates/parallax'); ?>
	<?php endif; ?>

	<?php echo $msg; ?>

	<?php echo $contents; ?>

	<?php $this->load->view('footer'); echo "\n"; ?>
</body>
</html>