<?php if(session_get('loggedin')): ?>

   <nav class="action-bar white yellow-text text-darken-4" role="navigation">
    <div class="logo-bar"><center><span class="oleo-f shadow">mxious</span></center></div>
    <center> <!-- have mercy on my soul -->
   <div>
    <form>
       <input placeholder="Search something">
    </form>
    <br>
    <a class="white-text orange orange-darken-4 btn-flat modal-trigger post-button" href="#post-modal"> Create</a>
    <a class="orange-text text-darken-4 waves-effect waves-orange waves-darken-4 btn-flat"><i class="mdi-social-public"></i> Feed</a>
    <a class="orange-text text-darken-4 waves-effect waves-orange waves-darken-4 btn-flat"><i class="mdi-social-notifications"></i> Alerts</a>
    <a href="trending" class="orange-text text-darken-4 waves-effect waves-orange waves-darken-4 btn-flat"><i class="mdi-social-whatshot"></i> Trending</a>
  </div>
  <footer>
  <div>
   <a href="">About</a>
   <a href="">Developers</a>
   <a href="">GitHub</a>
   <br>
   <a href="">Legal</a>
   <a href="">Help</a>
   <br>
   <span class="copy">
   &copy; 2014 Mxious
   </span>
   </div>
  </footer>
  </center>
   </nav>

<?php else: ?>

  <nav class="action-bar white yellow-text text-darken-4" role="navigation">
   <div class="logo-bar"><center><span class="oleo-f shadow">mxious</span></center></div>
   <center> <!-- have mercy on my soul -->
  <div>
   <form>
      <input placeholder="Search something">
   </form>
   <br>
   <a class="orange-text text-darken-4 waves-effect waves-orange waves-darken-4 btn-flat" href="discover"><i class="mdi-social-public"></i> Discover</a>
   <a class="orange-text text-darken-4 waves-effect waves-orange waves-darken-4 btn-flat"><i class="mdi-social-whatshot"></i> Trending</a>
   <a href="login" id="signin" class="orange-text text-darken-4 waves-effect waves-orange waves-darken-4 btn-flat"><i class="mdi-action-input"></i> Sign in</a>
 </div>
 <footer>
 <div>
  <a href="">About</a>
  <a href="">Developers</a>
  <a href="">GitHub</a>
  <br>
  <a href="">Legal</a>
  <a href="">Help</a>
  <br>
  <span class="copy">
  &copy; 2014 Mxious
  </span>
  </div>
 </footer>
 </center>
  </nav>

<?php endif; ?>

