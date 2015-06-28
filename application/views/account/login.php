<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form-horizontal" method="POST" action="<?php echo base_url('login'); ?>">
			<div class="form-group">
				<input type="username" name="username" class="form-control input-md" id="username" value="<?php $this->input->get('username') ?>" placeholder="Username/Email">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control input-md" id="password" placeholder="Password">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-md">Sign in</button>
				<button class="btn btn-info pull-right btn-md">Forgot?</button>
			</div>
		</form>
	</div>
	<div class="or-typography col-md-8 col-md-offset-2">
		<hr>
		<span>or</span>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<br>
		<a href="register" class="btn btn-primary btn-outline btn-lg btn-block">Create an account</a>
	</div>
</div>