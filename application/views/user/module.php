<div class="wrapper">
	<div class="container">
		<div class="row">

			<div class="col-lg-12">

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
								<div class="col-md-4">
									<div class="member-info">
										<p class="text-dark m-b-5"><b>Create by: </b><span class="text-muted"><?= ($value['name']) ?></span></p>
										<p class="text-dark m-b-0"><b>Status: </b>
											<?php if ($value['is_active'] == 1) : ?>
												<span style="margin-left:10px" class="label label-success">Aktif</span>
											<?php else : ?>
												<span style="margin-left:10px" class="label label-danger">Tidak Aktif</span>
											<?php endif; ?>
										</p>
									</div>
								</div>
								<div class="col-md-2"></div>
								<div class="col-md-1">
									<a href="<?= base_url('user/module/get/') . $value['id'] . "/" . $value['slug'] ?>" type="button" class="btn btn-default btn-rounded waves-effect waves-light" style="margin-top:3px">Diskusi
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
</div>
