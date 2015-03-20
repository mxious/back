<? if(session_get('loggedin')): ?>

  <nav class=" yellow darken-4" role="navigation">
    <div class="container">
      <div class="nav-wrapper"><a id="logo-container" href="#" class="brand-logo">mxious <span id="mxious-logo-next"></span></a>
        <ul id="nav-mobile" class="right side-nav">
          <li><a href="#">Hello there, <?=session_get('username')?></b></a></li>
        </ul><a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </div>
  </nav>


<? else: ?>

  <nav class=" yellow darken-4" role="navigation">
    <div class="container">
      <div class="nav-wrapper"><a id="logo-container" href="#" class="brand-logo">mxious <span id="mxious-logo-next"></span></a>
        <ul id="nav-mobile" class="right side-nav">
          <li><a href="#"><b>Sign in</b> or <b>register &raquo;</b></a></li>
        </ul><a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </div>
  </nav>


<? endif; ?>

