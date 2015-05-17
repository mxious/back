  <!--Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?= base_url('assets/js/materialize.js'); ?>"></script>
  <script src="<?= base_url('assets/js/global.js'); ?>"></script>
  <script src="<?= base_url('assets/js/feed.js'); ?>"></script>

  <!-- FIRE DEM MXIOUS JS UPPPP -->
  <script>
  Main.init({
    userid: <?=$cur_userid?>,
    // show some pride!
    show_pride: <?=$pride?>,
    <?php if ($feed): ?>
  	  feed: true,
  	  feed_container: '<?=$feed_container?>',
      feed_type: '<?=$feed_type?>'
    <?php endif; ?>

  });
  </script>