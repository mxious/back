<?php show_form_errors($errors); ?>

<div class="container login-panel row">
 <div class="col s6 offset-s3">
   <div class="card">
    <div class="card-content">
       <span class="card-title grey-text text-darken-4">Register </span>
        <p>
            <form action="" method="post">
              <input type="hidden" name="next" value="<?=htmlentities($this->input->get('next'))?>" >

              	<div class="row">
              	<div class="input-field col s12">
              		<input type="text" name="username" id="username" placeholder="Username" class="form-control" value="<?=set_value('username')?>" />
              	</div>
              	</div>

              	<div class="row">
              	<div class="input-field col s12">
              		<input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?=set_value('email')?>" />
              	</div>
              	</div>

              	<div class="row">
              	<div class="input-field col s12">
              		<input type="password" name="password" id="password" placeholder="Password" class="form-control" />
              	</div>
              	</div>

              	<div class="row">
              	<div class="input-field col s12">
              		<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control" />
              	</div>
              	</div>

                <p>By using Alphasquare, you agree with the
              	terms of service and privacy policy.</p>
              	<br>
              	 <?php echo $recaptcha_html; ?>
              	 <br>

            <button name="submit" class="btn yellow darken-4" value="true">Sign up</button>
          
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
