<div class="row" id="profile-page" data-id="<?=$id?>">
  <div class="col-lg-8 col-md-8">

  	<div class="page-header">

      <div id="header-top">
        <div id="info">
          <img src="<?=$avatar?>" class="img-circle" />
          <div class="clearfix visible-xs"></div>
          
          <div>
            <h2>

              <?=$username?>

              <?php if( $birthday && date('m-d') == date('m-d', strtotime($birthday)) ): ?>
              <span class="label label-info" title="Born on <?=$birthday_formatted?>" data-toggle="tooltip">Happy Birthday!</span>
              <?php endif; ?>

              <?php if($employee): ?>
              <span class="label label-primary">Staff</span>
              <?php endif; ?>

              <?php if($official == 1): ?>
              <span class="label label-success">Verified</span>
              <?php endif; ?>

            </h2>


            <p><?=htmlspecialchars($tagline)?></p>

            <span class="glyphicon glyphicon-map-marker"></span>
            <?=htmlspecialchars($location)?>
              

            <?php if($website_url): ?>
            <br class="visible-xs" />
            <span class="glyphicon glyphicon-link"></span>
            <a href="<?=$website_url?>" target="_blank"><?= $website_title ? htmlspecialchars($website_title) : $website_url ?></a>
            <?php endif; ?>
          </div>

        </div>
        <div id="actions">

          <?php if(!$is_owner): ?>

            <?php if(!$is_following): ?>
            <button class="btn btn-default follow" data-id="<?=$id?>" data-username="<?=$username?>">
              Follow
            </button>
            <?php else: ?>
            <button class="btn btn-primary unfollow" data-id="<?=$id?>" data-username="<?=$username?>">
              Following
            </button>
            <?php endif; ?>

          <?php elseif($is_owner && $tab !== 'about'): ?>
          <a href="<?=profile_url($username)?>/about" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-pencil"></span>
            Edit Profile
          </a>
          <?php endif; ?>

        </div>
        <div class="clearfix"></div>

      </div>

      <ul id="profile-menu">

        <li<?php if($tab==null) echo ' class="active"'?>>
          <a href="<?=profile_url($username)?>">
            <span class="glyphicon glyphicon-bullhorn"></span><br>
            Debates
          </a>
        </li>
        <li<?php if($tab=='comments') echo ' class="active"'?>>
          <a href="<?=profile_url($username)?>/comments">
            <span class="glyphicon glyphicon-comment"></span><br>
            Comments
          </a>
        </li>
        <li class="divider<?php if($tab=='about') echo ' active'?>">
          <a href="<?=profile_url($username)?>/about">
            <span class="glyphicon glyphicon-info-sign"></span><br>
            About Me
          </a>
        </li>
        <li<?php if($tab=='points') echo ' class="active"'?>>
          <a class="no-click" title="<?=$username?> has <?=number_format($points)?> points" data-toggle="tooltip">
            <span class="count"><?=short_number($points)?></span><br>
            Points
          </a>
        </li>
        <li<?php if($tab=='followers') echo ' class="active"'?>>
          <a href="<?=profile_url($username)?>/followers" title="<?=$username?> has <?=number_format($followers)?> followers" data-toggle="tooltip">
            <span class="count followers" data-id="<?=$id?>"><?=short_number($followers)?></span><br>
            Followers
          </a>
        </li>
        <li<?php if($tab=='following') echo ' class="active"'?>>
          <a href="<?=profile_url($username)?>/following" title="<?=$username?> is following <?=number_format($following)?> <?=$following==1 ? 'person': 'people'?>" data-toggle="tooltip">
            <span class="count following"><?=short_number($following)?></span><br>
            Following
          </a>
        </li>

      </ul>
      <div class="clearfix"></div>
    </div>

    <div id="tab-content">
      <?=$tab_content?>
    </div>

  </div>
  <div class="col-lg-4 col-md-4" id="sidebar">
  	<?php $this->load->view('sidebar/main') ?>
  </div>
</div>

<script src="<?=base_url('assets/js/dashboard.js')?>"></script>
<script src="<?=base_url('assets/js/profile.js')?>"></script>
<script>
$(function() {
	Profile.init({
    id: '<?=$id?>',
    username: '<?=$username?>',
    baseUrl: '<?=profile_url($username)?>'
  });
});
</script>