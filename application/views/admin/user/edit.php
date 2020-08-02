<div class="wrapper">
	<div class="container">

		<div class="row">
			<div class="col-sm-12">
				<div class="btn-group pull-right m-t-15">
					<button type="button" class="btn btn-default dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
					<ul class="dropdown-menu drop-menu-right" role="menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</div>

				<h4 class="page-title">Starter Page</h4>
				<ol class="breadcrumb">
					<li>
						<a href="#">Ubold</a>
					</li>
					<li>
						<a href="#">Pages</a>
					</li>
					<li class="active">
						Blank
					</li>
				</ol>


				<div class="row">
					<div class="col-xs-12">
						<div class="card-box product-detail-box">
							<div class="row">
								<div class="col-sm-3 text-center">

									<a href="https://api.adorable.io/avatars/500/<?= $user['user_email'] ?>"><img class="img-circle" src="https://api.adorable.io/avatars/200/<?= $user['user_email'] ?>" alt=""></a>

									<!-- <div style="margin-top:30px;" class="">

										<a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-edit"></i>Upload Photo</a>
									</div> -->

								</div>

								<div class="col-sm-8">
									<div class="product-right-info">

										<div class="row m-t-30">
											<div class="col-xs-12">
												<h4><b>Details User</b></h4>
												<div class="table-responsive m-t-20">
													<table class="table">
														<tbody>
															<tr>
																<td width="400">Name</td>
																<td>
																	<?= $user['name'] ?>
																</td>
															</tr>
															<tr>
																<td>Email</td>
																<td>
																	<?= $user['user_email'] ?>
																</td>
															</tr>
															<tr>
																<td>Password</td>
																<td>
																	<?= $user['user_password'] ?>
																</td>
															</tr>

															<tr>
																<td>Status user</td>
																<td>
																	<?php if ($user['is_active'] == 1) : ?>
																		<span style="margin-left:10px" class="label label-success">Aktif</span>
																	<?php else : ?>
																		<span style="margin-left:10px" class="label label-danger">Tidak Aktif</span>
																	<?php endif; ?>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
