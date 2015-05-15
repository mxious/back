<?php foreach($posts as $post): ?>
<div class="col item-masonry" data-id="<?=$post['id']?>">
      <div class="card">
        <div class="card-image">
          <img src="<?=$post['img_url']?>">

          <span class="card-title"><?=$post['title']?></span>
        </div>
        <div class="card-content">
          <p class="ellipsis"><?=format_post($post['content'])?></p>
        </div>
        <div class="card-action">
          <a class="activator">READ POST</a> <a href="">LISTEN</a>
        </div>
        <div class="card-reveal" class="post">
          <span class="card-title grey-text text-darken-4"><?=$post['title']?> <i class="mdi-navigation-close right"></i></span>
          <p><?=format_post($post['content'])?>
                  <a href="<?=profile_url($post['username'])?>">
    <img src="<?=avatar_url($post['avatar'], $post['email'], 55)?>" class="circle img-responsive item-avatar tooltipped" data-position="top" data-delay="50" data-tooltip="@<?=$post['username']?>" />
     </a></p>
        </div>
      </div>

    </div>
    
<?php endforeach; ?>