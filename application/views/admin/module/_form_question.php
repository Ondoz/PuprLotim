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
				<?php if (validation_errors()) : ?>
					<div class="alert alert-denger" role="alert">
						<?= validation_errors() ?>
					</div>
				<?php endif ?>
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

				<form method="post" action="<?= base_url('admin/module/questions/') . $module['id'] . '/' . $module['slug']  ?>" class="well">
					<?php if (validation_errors()) : ?>
						<div class="alert alert-denger" role="alert">
							<?= validation_errors() ?>
						</div>
					<?php endif ?>
					<input type="hidden" name="id_sub_module" value="<?= $module['id'] ?>">
					<span class="input-icon icon-right">
						<div class="form-group">
							<input type="text" class="form-control" name="title" placeholder="Title">
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-b-30 m-t-0 header-title"><b>Default Editor</b></h4>
									<div class="">
										<textarea class="form-control summernote" name="body" placeholder="Post a new Ask"></textarea>
									</div>
								</div>
							</div>
						</div>
					</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
				<button class="btn btn-primary waves-effect waves-light"> <i class="fa fa-rocket m-r-5"></i><span>Post</span> </button>
			</div>
			</form>
		</div>
	</div>
</div> <!-- end container -->
</div>
<!-- end wrapper -->
