<div class="wrapper">
	<div class="container">

		<!-- Page-Title -->
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
			</div>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name Role</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1 ?>
				<?php foreach ($categori as $key => $value) : ?>
					<tr>
						<th scope="row"><?= $i++ ?></th>
						<td><?= $value['name'] ?></td>
						<td><a href="" class="btn btn-danger btn-xs" onclick="return confirm('yakin?')"><i class="md  md-clear"></i></a>
							<a href="" class="btn btn-warning btn-xs"><i class="md md-create"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div> <!-- end container -->
</div>
<!-- end wrapper -->
