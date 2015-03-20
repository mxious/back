<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $title; ?></title>

<?php $this->load->view('header'); ?>

</head>
<body <?php if($full_bg == true) { echo 'style="background-image: url('.SITE_IMG.');background-size:cover;background-repeat: no-repeat; background-position: center center;"'; } ?>>
<?php $this->load->view('navbar'); echo "\n"; ?>
<?php if($show_hero == true) { $this->load->view('templates/hero'); } ?>

<?php $this->load->view('templates/no_script'); echo "\n"; ?>

<?php echo $msg; ?>

<?php echo $contents; ?>

<?php $this->load->view('footer'); echo "\n"; ?>

</body>
</html>