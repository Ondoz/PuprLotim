<div class="wrapper">
	<div class="container">
		<div class="col-sm-4">
			<a href="<?= base_url("admin/project/addproject") ?>" class="btn menuAdd  btn-default btn-md waves-effect waves-light m-b-30"><i class="md md-add"></i> Add Project</a>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">

					<h4 class="m-t-0 header-title"><b>Daftar Project</b></h4>
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>No </th>
								<th>Nama Proyek</th>
								<th>Satuan Kerja</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th>Kategori</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php $i = 1 ?>
							<?php foreach ($project as $key => $value) : ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><a href="<?= base_url("admin/project/show/" . $value['id']) ?>"><?= $value['no_spk'] ?></a></td>
									<td><?= $value['paket_pekerjaan'] ?></td>
									<td><?= $value['satuan_kerja'] ?></td>
									<td><?= date('j M Y', strtotime($value['tgl_mulai'])) ?></td>
									<td><?= date('j M Y', strtotime($value['tgl_selesai'])) ?></td>
									<td><?= $value['name']?></td>
									<td>
										<a href="<?php echo base_url("admin/project/hpsProject/" . $value['id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin?')"><i class="md  md-clear"></i></a>
										<a href="<?= base_url("admin/project/editProject/" . $value['id']) ?>" class="btn  btn-warning btn-xs waves-effect waves-light "><i class="md md-edit"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- <button type="button" class="btn btn-danger btn-xs" id="load" data-loading-text="<i class='fa 	fa-spinner fa-spin '></i>">Tidak Aktif</button> -->
