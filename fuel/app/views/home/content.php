<div class="jumbotron welcome-hero">
  <h1>Welcome to Mxious</h1>
  <p>Welcome to Mxious, your premier music discovery website. </p>
  <p><a class="btn btn-primary btn-lg" href="register" role="button">Register</a>&nbsp;<a class="btn btn-primary btn-lg" href="login" role="button">Sign in</a></p>
</div>
<?php foreach ($posts as $p): ?>
<div id="grid" data-columns>
    <div class="card card-std grid-item">
      <div class="image">
        <img src="<?php echo $p->image; ?>">
        <span class="title"><?php echo $p->title; ?></span>
      </div>
      <div class="content">
        <p><?php echo $p->content; ?></p>
        <br>
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img class="media-object img-circle img-avatar-card" src="https://www.twii.me/data/user/avatar/big/dd/UeWJZ_-61e_dbvb143647347970c_SZY94RUnEJN.jpg" alt="...">
            </a>
          </div>
          <div class="media-body">
            <h5 class="media-heading">@<?php echo $p->username; ?></h5>
            <?php echo Date::time_ago($p->time); ?>
          </div>
        </div>
      </div>
      <div class="action">
        <div class="btn-group" role="group" aria-label="...">
          <button type="button" class="btn btn-success btn-outline"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo Num::quantity($p->likes_cache, 1); ?></button>
          <button type="button" class="btn btn-danger btn-outline"><span class="glyphicon glyphicon-thumbs-down"></span> <?php echo Num::quantity($p->dislikes_cache); ?></button>
        </div>
        <button type="button" class="btn btn-primary btn-outline">Listen</button>
      </div>
    </div>
  </div>
<?php endforeach; ?>
