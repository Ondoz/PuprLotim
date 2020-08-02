<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
	<div class=" card-box">
		<div class="panel-heading">
			<h3 class="text-center">
				Sign Up to <strong class="text-custom">UBold</strong>
			</h3>
		</div>
		<?php if (validation_errors()) : ?>
			<div class="alert alert-denger" role="alert">
				<?= validation_errors() ?>
			</div>
		<?php endif ?>

		<div class="panel-body">
			<form class="form-horizontal m-t-20" action="<?= base_url('register') ?>" method="post">
				<div class="form-group ">
					<div class="col-xs-12">
						<input class="form-control" type="email" required="" placeholder="Email" name="user_email" />
					</div>
				</div>

				<div class="form-group ">
					<div class="col-xs-12">
						<input class="form-control" type="text" required="" placeholder="Username" name="name" />
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<input class="form-control" type="password" required="" placeholder="Password" name="user_password" />
					</div>
				</div>

				<div class="form-group text-center m-t-40">
					<div class="col-xs-12">
						<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
							Register
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 text-center">
			<p>
				Already have account?<a href="page-login.html" class="text-primary m-l-5"><b>Sign In</b></a>
			</p>
		</div>
	</div>
</div>
