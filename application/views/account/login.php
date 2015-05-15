<div class="container login-panel row">
 <div class="col s6 offset-s3">
   <div class="card">
    <div class="card-content">
       <span class="card-title grey-text text-darken-4">Sign in</span>
        <p>
            <form action="" method="post">
              <input type="hidden" name="next" value="<?=htmlentities($this->input->get('next'))?>" />

              <div class="row">
              <div class="input-field col s12">
                <input class="validate" type="text"
                       name="username"
                       id="username">
                <label for="username">Username</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="password"
                       name="password"
                       id="password">
                <label for="password">Password</label>
              </div>
            </div>
            <button name="submit" class="btn yellow darken-4" value="true">Sign in</button>
          
            </form>
          </p>
          </div>
           <div class="card-action">
              <a href="<?=base_url('account/forgot_password')?>">Forgot your password?</a>
              <a href='<?=base_url('account/register')?>'>Create an account</a>
            </div>

        </div>
      </div>

</div>

