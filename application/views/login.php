<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
	<div class=" card-box">
		<div class="panel-heading">
			<h3 class="text-center"> Sign In to <strong class="text-custom">UBold</strong> </h3>
		</div>

		<?= $this->session->flashdata('msg') ?>

		<div class="panel-body">
			<form class="form-horizontal m-t-20" action="<?php echo site_url('auth/auth'); ?>" method="post">

				<div class="form-group ">
					<div class="col-xs-12">
						<input class="form-control" type="email" name="email" required="" placeholder="Email">
						<small class="form-text text-danger"><?= form_error("email"); ?></small>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<input class="form-control" type="password" name="password" required="" placeholder="Password">
						<small class="form-text text-danger"><?= form_error("password"); ?></small>
					</div>
				</div>

				<div class="form-group ">
					<div class="col-xs-12">
						<div class="checkbox checkbox-primary">
							<input id="checkbox-signup" type="checkbox">
							<label for="checkbox-signup">
								Remember me
							</label>
						</div>

					</div>
				</div>

				<div class="form-group text-center m-t-40">
					<div class="col-xs-12">
						<button class="btn btn-default btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
					</div>
				</div>


				<div class="form-group m-t-30 m-b-0">
					<div class="col-sm-12">
						<a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
					</div>
				</div>
			</form>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			<p>Don't have an account? <a href="<?php echo site_url('register'); ?>" class="text-primary m-l-5"><b>Sign Up</b></a></p>
		</div>
	</div>
</div>
