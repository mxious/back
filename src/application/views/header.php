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

<?=$extra_stylesheets?>

<script>
  emojify.setConfig({
      img_dir          : '/assets/img/emoji',  
      ignored_tags     : {                
          'SCRIPT'  : 1,
          'TEXTAREA': 1,
          'A'       : 1,
          'PRE'     : 1,
          'CODE'    : 1
      }
  });

  emojify.run();

});

</script>
