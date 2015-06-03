<div class="row">
  <div class="col-lg-8 col-md-8">
    <div id="posts" data-type="dashboard">
      <?=$posts_html?>
    </div>
    <?php $this->load->view('posts/loading') ?>

  </div>

  <div class="col-lg-4 col-md-4" id="sidebar">
    <?php $this->load->view('sidebar/main') ?>
  </div>

</div>

<script src="<?=base_url('assets/js/dashboard.js')?>"></script>