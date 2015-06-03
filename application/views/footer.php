  <!--Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.0/js/materialize.min.js"></script>
  <script src="<?= base_url('assets/js/global.js'); ?>"></script>
  <script src="<?= base_url('assets/js/feed.js'); ?>"></script>

  <div id="post-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <form method="POST">
      <p id="modal-par-content"></p>
    </div>
    <div class="modal-footer">
      <button href="#!" id="post-submit" class="waves-effect waves-orange btn-flat disabled">Post</button>
    </div>
    </form>
  </div>

  <!-- Fire it up. -->
  <script>
  Main.init({
    userid: <?=$cur_userid?>,
    base_url: '<?=base_url()?>',
    php_offset: <?=POST_DISPLAY_LIMIT?>
  });
  </script>