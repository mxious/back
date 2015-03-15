<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-bold">Username</h3>
  </div>
  <div class="panel-body">
    <span style="font-size:15px;"><?=$username?></span>
    <br />
    
    <em>Looking for bio, name, and birthday? You can find those settings on your <a href="<?=profile_url()?>/about">about page</a>.</em>
    <br>
    <br>
     <em>Want to change your profile picture? Go to Gravatar.com and make an account, it will auto-sync from there.</em>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-bold">Email Address</h3>
  </div>
  <div class="panel-body">
    <form action="javascript:;" id="email-change">
      <input type="email" value="<?=$email?>" class="form-control" />
      <br />
      <button class="btn btn-primary btn-sm">Change</button>
    </form>
  </div>
</div>