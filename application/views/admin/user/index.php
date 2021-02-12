<div class="wrapper">
	<div class="container">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h1 class="page-title"> List User</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<form role="form">
					<div class="form-group contact-search m-b-30">
						<input type="text" id="search" class="form-control" placeholder="Search...">
						<button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div>
			<div class="col-sm-4">
				<a href="#custom-modal" class="btn tampilAdd btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add User</a>
			</div>
		</div>
		<?php if (validation_errors()) : ?>
			<div class="alert alert-denger" role="alert">
				<?= validation_errors() ?>
			</div>
		<?php endif ?>
		<div class="row">
			<?php foreach ($user as $key => $value) : ?>
				<div class="col-sm-4 col-lg-4">
					<div class="card-box">
						<div class="contact-card">
							<a class="pull-left" href="#">
								<img class="img-circle" src="https://api.hello-avatar.com/adorables/100/<?= $value['user_email'] ?>" alt="">
							</a>
							<div class="member-info" style="padding-bottom: 0px;">
								<h5 class="m-t-0 m-b-0 header-title"><b><?= $value['name'] ?></b></h5>
								<p class="text-muted"><?= $value['user_email'] ?></p>
								<p class="text-dark"><i class="md md-business m-r-10"></i><small><?= $value['name_role'] ?></small>
									<?php if ($value['is_active'] == 1) : ?>
										<span style="margin-left:10px" class="label label-success">Aktif</span>
									<?php else : ?>
										<span style="margin-left:10px" class="label label-danger">Tidak Aktif</span>
									<?php endif; ?>
								</p>
								<div class="contact-action">
									<a href="<?= base_url("admin/user/delete/" . $value['user_id']) ?>" onclick="return confirm('yakin?')" class=" btn btn-danger btn-sm"><i class="md md-close"></i></a>
								</div>

								<!-- <a href="<?php echo base_url("admin/user/edit/" . $value['user_id']) ?>" class="btn btn-primary btn-xs btn-custom w-lg btn-outline-primary waves-effect">View Details</a> -->
								<a href="#custom-modal" class="btn tampilUbah btn-warning btn-xs waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a" data-id="<?= $value['user_id'] ?>"><i class="md md-edit"></i> Edit User</a>
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
	<h4 class="custom-modal-title" id="modalLable">Add User</h4>
	<div class="custom-modal-text text-left">
		<form action="<?= base_url('admin/user') ?>" method="post">
			<input type="hidden" name="user_id" id="user_id">

			<!-- <input type="text" name="no" value="<?php echo $kode; ?>" readonly="readonly"> -->
			<div class="form-group">
				<label for="name">Nama</label>
				<input type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="user_email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="text" class="form-control" id="password" name="user_password">
			</div>
			<div class="form-group">
				<label for="role_id">Role User</label>
				<select class="form-control" name="role_id" id="role_id">

					<?php $i = 1 ?>
					<?php foreach ($role as $key => $value) : ?>
						<option value="<?= $i++ ?>"><?= $value['name_role'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<div class="checkbox checkbox-success checkbox-circle">
					<input id="checkbox-10" type="checkbox" checked="" name="is_active" value="1">
					<label for="checkbox-10">
						Checked Jika User Mau Di Aktifkan
					</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
				<button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>
			</div>
		</form>
	</div>
</div>
