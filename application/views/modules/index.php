<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3><?= $module['title'] ?></h3>
				<div class="card-box ">
					<div class="row">
						<div class="col-sm-12">
							<div class="btn-group pull-right ">
							<?php if ($this->session->userdata('role_id') == 1) { ?>
								<a class="btn btn-primary waves-effect waves-light m-t-15" href="<?= base_url('admin/module/questions/') . $module['id'] . '/' . $module['slug'] ?>">Ask Question</a>
								<?php } else { ?>
									<a class="btn btn-primary waves-effect waves-light m-t-15" href="<?= base_url('user/module/questions/') . $module['id'] . '/' . $module['slug'] ?>">Ask Question</a>
								<?php } ?>
							</div>
							<h2>All Questions</h2>
							<ul class="breadcrumb">
								<li>
									<span>Total Questions : 100</span>
								</li>
								<li>
									<span>News Questions : 10</span>
								</li>
								<li class="active">
									Modals
								</li>
							</ul>
						</div>
					</div>
					<hr>
					<?php foreach ($data_questions as $key => $value) : ?>
						<div class="table-box opport-box ">
							<div class="row">
								<div class="col-md-1 ">
									<div class="media ">
										<div class="d-flex flex-column counters ">
											<div class="status">
												<strong><?= $value['total_answers'] ?></strong>answers</div>
											<div class="view">
												<?= ($value['views']) ?> views
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-8">
									<?php if ($this->session->userdata('role_id') == 1) { ?>
									<h3 class="widthTitle "><a href="<?= base_url('admin/module/show_question/') . $value['uuid_question'] . '/' . $value['slug'] ?>" class="m-t-0"><b><?= $value['title'] ?></b></a>
									<?php } else { ?>
										<h3 class="widthTitle "><a href="<?= base_url('user/module/show_question/') . $value['uuid_question'] . '/' . $value['slug'] ?>" class="m-t-0"><b><?= $value['title'] ?></b></a>
									<?php } ?>
									
									<?php if ($this->session->userdata('user_id') == $value['id_user']) : ?>
										<p class="text-dark m-b-5">
											<a href="<?= base_url('user/module/delete/') . $value['uuid_question'] . '/' . $value['slug']  ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin?')"><i class="md  md-clear"></i> Delete</a>
											<a href="" class="btn btn-warning btn-xs"><i class="md md-create"></i> Edit</a>
										</p>
									<?php endif ?>
									</h3>
									<div class="member-info">
										<p class="text-dark m-b-5"><b>Category: </b> <span class="text-muted"><?= $module['title'] ?></span></p>
										<?php $post_title = $value['created_at']; ?>
									</div>
									<h5><?= word_limiter($value['body'], 20); ?></h5>
								</div>

								<div class="col-md-3">
									<div class="member-info" style="margin-top:50px">
										<p class="text-dark m-b-5"><b>Asked</b> <?= time_ago($post_title) . 'ago' ?> </p>
										<img src="https://api.adorable.io/avatars/32/<?= $value['user_email']; ?>" alt="user-img"></img>
										<span class="text-muted"><?= ($value['name']) ?></span>
									</div>
								</div>
							</div>
						</div>
						<hr>
					<?php endforeach; ?>
					<div class="card-body">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
