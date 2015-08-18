<?php if (\Helper::is_loggedin()): ?>

<?php else: ?>
        <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand navbar-brand-centered">mxious</div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-brand-centered">
          <ul class="nav navbar-nav">
            <form class="navbar-form navbar-left" method="POST" action="/search" role="search">
              <div class="form-group">
                <input type="text" class="form-control" name="query" placeholder="Search Mxious...">
              </div>
            </form>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown" id="menu" data-toggle="tooltip" data-placement="left" title="Click to explore Mxious">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span id="menu-icon" class="glyphicon glyphicon-th" aria-hidden="true"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-globe"></span> Explore</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-stats"></span> Charts</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-fire"></span> Trending Now</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Sign in</a></li>
                        <li><a href="#">Register</a></li>
                      </ul>
                    </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
<?php endif; ?>

