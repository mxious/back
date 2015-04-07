  <!--Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/global.js"></script>
  <script src="assets/js/dash.js"></script>

  <!-- FIRE DEM MXIOUS JS UPPPP -->
  <script>
  Mxious.init({
    mode: 'development',
    userid: <?=$cur_userid?>,
    // show some pride!
    show_pride: <?=$pride?>,
    <?php if ($feed): ?>
  	  // is there a feed container in this page?
  	  feed: true,
  	  dash_container: <?=$feed_container?>
    <?php endif; ?>
  });
  </script>