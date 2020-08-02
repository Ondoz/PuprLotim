<div class="wrapper">
	<div class="container">
		<div class="col-sm-4">
			<a href="#custom-modal" class="btn menuAdd  btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add Menu</a>

		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">

					<h4 class="m-t-0 header-title"><b>Menu Akses</b></h4>
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Menu</th>
								<th>Url</th>
								<th>Icon</th>
								<th>Status Menu</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php $i = 1 ?>
							<?php foreach ($sda as $key => $value) : ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $value['title'] ?></td>
									<td><?= $value['name_role'] ?></td>
									<td><?= $value['url'] ?></td>
									<td><?= $value['icon'] ?></td>
									<td>
										<?php if ($value['is_active'] == 1) : ?>
											<span style="margin-left:10px" class="label label-success">Aktif</span>
										<?php else : ?>
											<span style="margin-left:10px" class="label label-danger">Tidak Aktif</span>
										<?php endif; ?>
									</td>
									<td>
										<a href="<?php echo base_url("admin/menu/delete/" . $value['id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin?')"><i class="md  md-clear"></i></a>
										<a href="#custom-modal" class="btn menuUbah btn-warning btn-xs waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a" data-id="<?= $value['id'] ?>"><i class="md md-edit"></i></a>
									</td>

								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div id="custom-modal" class="modal-demo">
			<button type="button" class="close" onclick="Custombox.close();">
				<span>&times;</span><span class="sr-only">Close</span>
			</button>
			<h4 class="custom-modal-title" id="modalMenu">Add Menu</h4>
			<div class="custom-modal-text text-left">
				<form role="form" action="<?= base_url('admin/menu') ?>" method="post">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="title">Titile</label>
						<input type="text" class="form-control" id="title" placeholder="Title" name="title">
					</div>
					<div class="form-group">
						<label for="role user">Menu accsess</label>
						<select class="form-control" name="menu_id" id="menu_id">
							<option value="1">admin</option>
							<option value="2">user</option>
						</select>
					</div>
					<div class="form-group">
						<label for="url">URL</label>
						<input type="text" class="form-control" id="url" placeholder="URL" name="url">
					</div>
					<div class="form-group">
						<label for="icon">icon</label>
						<input type="icon" class="form-control" id="icon" placeholder="ICON" name="icon">
					</div>
					<div class="form-group">
						<label for="role user">status</label><br>
						<span for="">Ket. Menu Mau di Tampilkan atau tidak</span>
						<select class="form-control" name="is_active" id="is_active">
							<option value="0">Tidak Aktif</option>
							<option value="1">Aktif</option>
						</select>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
						<button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	//addmenu ajax
	$(document).ready(function() {
		$(".menuAdd").on("click", function() {
			$("#modalMenu").html("Add Menu");
			$(".modal-footer  button[type=submit]").html("Add Menu");
			$("#menu_id").val("");
			$("#title").val("");
			$("#url").val("");
			$("#icon").val("");
			$("#is_active").val("");
		});

		$(".menuUbah").on("click", function() {
			$("#modalMenu").html("Edit Menu");
			$(".modal-footer  button[type=submit]").html("Update Menu");
			$(".custom-modal-text form").attr("action", "menu/update");

			const id = $(this).data("id");

			$.ajax({
				url: "menu/Edit",
				data: {
					id: id
				},
				method: "POST",
				dataType: "json",
				success: function(data) {
					$("#menu_id").val(data.menu_id);
					$("#title").val(data.title);
					$("#url").val(data.url);
					$("#icon").val(data.icon);
					$("#is_active").val(data.is_active);
					$("#id").val(data.id);
					console.log(data);
				}
			});
		});
	});
</script>

<!-- <button type="button" class="btn btn-danger btn-xs" id="load" data-loading-text="<i class='fa 	fa-spinner fa-spin '></i>">Tidak Aktif</button> -->