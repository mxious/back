<div class="row">
  <div class="col-lg-8 col-md-8">

    <?php $this->load->view('posts/post_box') ?>

    <?php if($show_follow_msg): ?>
    <div class="row container">
      <div class="col s12">
        <div class="card-panel yellow darken-4">
          <span class="white-text"> <b>You aren't following anyone, <?=session_get('username')?>.</b> Hit the people tab on the sidebar and follow some people!
          </span>
        </div>
      </div>
    </div>
    <div class="row container">
      <div class="col s12">
        <div class="card-panel yellow darken-4">
          <span class="white-text"> <b>Meanwhile,</b> we'll show you random posts you might like. 
          </span>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <div id="layout">
      <?=$posts_html?>
    </div>
  </div>

</div>

<script src="<?=base_url('assets/js/dashboard.js')?>"></script>