  <!--Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?= base_url('assets/js/materialize.js'); ?>"></script>
  <script src="<?= base_url('assets/js/global.js'); ?>"></script>
  <script src="<?= base_url('assets/js/feed.js'); ?>"></script>

  <!-- Fire it up. -->
  <script>
  Main.init({
    userid: <?=$cur_userid?>,
    php_offset: <?=POST_DISPLAY_LIMIT?>
  });
  </script>