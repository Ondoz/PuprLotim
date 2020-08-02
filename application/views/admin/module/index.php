<div class="wrapper">
	<div class="container">
		<div class="col-sm-12" align="right">
			<a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add Module</a>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<h4 class="m-t-0 header-title"><b>Table Module</b></h4>
					<p class="text-muted font-13 m-b-30">
						Tabel ini menampilkan nama-nama Module yang akan tampil di halaman Module<code>$().DataTable();</code>.
					</p>
					<?php $i = 1 ?>
					<?php foreach ($module as $key => $value) : ?>
						<div class="card-box m-b-10">
							<h4 class="m-t-0"><b><?= $value['title'] ?></b></h4>
							<div class="table-box opport-box">
								<div class="row">
									<div class="col-md-4">
										<div class="member-info">
											<p class="text-dark m-b-5"><b>Category: </b> <span class="text-muted">Branch manager</span></p>
											<p class="text-dark m-b-0"><b>Active: </b> <span class="text-muted">2 hours ago</span></p>
										</div>

									</div>
									<div class="col-md-3">
										<div class="member-info">
											<p class="text-dark m-b-5"><b>Create by: </b><span class="text-muted"><?= ($value['name']) ?></span></p>
											<p class="text-dark m-b-0"><b>Status: </b>
												<?php if ($value['is_active'] == 1) : ?>
													<span style="margin-left:10px" class="label label-success">Aktif</span>
												<?php else : ?>
													<span style="margin-left:10px" class="label label-danger">Tidak Aktif</span>
												<?php endif; ?></p>
										</div>
									</div>

									<div class="col-md-4">
										<a href="<?= base_url('admin/module/delete/') . $value['id'] ?>" type="button" class="btn-xs btn-danger waves-effect waves-light" style="margin-top:3px">Remove
										</a>
										<a href="<?= base_url('admin/module/get/') . $value['id'] . "/" . $value['slug'] ?>" type="button" class="btn-xs btn-default  waves-effect waves-light" style="margin-top:3px">Diskusi
											<span class="btn-label btn-label-right"><i class="fa fa-arrow-right"></i>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div id="custom-modal" class="modal-demo">
			<button type="button" class="close" onclick="Custombox.close();">
				<span>&times;</span><span class="sr-only">Close</span>
			</button>
			<h4 class="custom-modal-title">Add Module</h4>
			<div class="custom-modal-text text-left">
				<form role="form" action="<?= base_url('admin/module/tambah') ?>" method="post">
					<div class="form-group">
						<label for="title">Title Module</label>
						<input type="text" class="form-control" id="title" placeholder="Title" name="title">
					</div>

					<div class="form-group">
						<label for="role user">status</label>
						<select class="form-control" name="is_active">
							<option value="0">Not Active</option>
							<option value="1">Active</option>
						</select>
					</div>

					<button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
					<button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>
