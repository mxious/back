<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="description" content="Mxious: Music, delivered">
<?=$extra_meta?>

<link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>">

<!-- CSS  -->
<link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oleo+Script' rel='stylesheet' type='text/css'>
<script>
Mxious.init({
  mode: 'development',
  userid: <?=session_get('userid')?>,
  // show some pride!
  show_pride: <?=$pride?>,
  <?php if ($feed == true): ?>
	  // is there a feed container in this page?
	  feed: true,
	  dash_container: <?=$feed_container?>
  <?php endif; ?>
});
</script>
<?=$extra_stylesheets?>
