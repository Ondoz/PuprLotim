<!-- Navigation Bar-->
<header id="topnav">
	<div class="topbar-main">
		<div class="container">
			<!-- Logo container-->
			<div class="logo">
				<a href="<?= base_url("admin/dashboard") ?>" class="logo"><span>PUPR LOTIM</span></a>
			</div>
			<!-- End Logo container-->
			<div class="menu-extras">
				<ul class="nav navbar-nav navbar-right pull-right">
					<li class="navbar-c-items">
						<form role="search" class="navbar-left app-search pull-left hidden-xs">
							<input type="text" placeholder="Search..." class="form-control">
							<a href=""><i class="fa fa-search"></i></a>
						</form>
					</li>
					<li class="dropdown navbar-c-items">
						<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
							<i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-lg">
							<li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
							<li class="list-group slimscroll-noti notification-list">
								<!-- list item-->
								<a href="javascript:void(0);" class="list-group-item">
									<div class="media">
										<div class="pull-left p-r-10">
											<em class="fa fa-diamond noti-primary"></em>
										</div>
										<div class="media-body">
											<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
											<p class="m-0">
												<small>There are new settings available</small>
											</p>
										</div>
									</div>
								</a>

								<!-- list item-->
								<a href="javascript:void(0);" class="list-group-item">
									<div class="media">
										<div class="pull-left p-r-10">
											<em class="fa fa-cog noti-warning"></em>
										</div>
										<div class="media-body">
											<h5 class="media-heading">New settings</h5>
											<p class="m-0">
												<small>There are new settings available</small>
											</p>
										</div>
									</div>
								</a>

								<!-- list item-->
								<a href="javascript:void(0);" class="list-group-item">
									<div class="media">
										<div class="pull-left p-r-10">
											<em class="fa fa-bell-o noti-custom"></em>
										</div>
										<div class="media-body">
											<h5 class="media-heading">Updates</h5>
											<p class="m-0">
												<small>There are <span class="text-primary font-600">2</span> new updates available</small>
											</p>
										</div>
									</div>
								</a>

								<!-- list item-->
								<a href="javascript:void(0);" class="list-group-item">
									<div class="media">
										<div class="pull-left p-r-10">
											<em class="fa fa-user-plus noti-pink"></em>
										</div>
										<div class="media-body">
											<h5 class="media-heading">New user registered</h5>
											<p class="m-0">
												<small>You have 10 unread messages</small>
											</p>
										</div>
									</div>
								</a>

								<!-- list item-->
								<a href="javascript:void(0);" class="list-group-item">
									<div class="media">
										<div class="pull-left p-r-10">
											<em class="fa fa-diamond noti-primary"></em>
										</div>
										<div class="media-body">
											<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
											<p class="m-0">
												<small>There are new settings available</small>
											</p>
										</div>
									</div>
								</a>

								<!-- list item-->
								<a href="javascript:void(0);" class="list-group-item">
									<div class="media">
										<div class="pull-left p-r-10">
											<em class="fa fa-cog noti-warning"></em>
										</div>
										<div class="media-body">
											<h5 class="media-heading">New settings</h5>
											<p class="m-0">
												<small>There are new settings available</small>
											</p>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="list-group-item text-right">
									<small class="font-600">See all notifications</small>
								</a>
							</li>
						</ul>
					</li>

					<li class="dropdown navbar-c-items">
						<a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="https://api.hello-avatar.com/adorables/70/<?= $this->session->userdata('email'); ?>" alt="user-img" class="img-circle"> </a>
						<ul class="dropdown-menu">
							<li><a href="javascript:void(0)"><i class="ti-user text-custom m-r-10"></i> Profile</a></li>
							<li><a href="javascript:void(0)"><i class="ti-settings text-custom m-r-10"></i> Settings</a></li>
							<li><a href="javascript:void(0)"><i class="ti-lock text-custom m-r-10"></i> Lock screen</a></li>
							<li class="divider"></li>
							<li><a href="<?= base_url('auth/logout') ?>"><i class="ti-power-off text-danger m-r-10"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
				<div class="menu-item">
					<!-- Mobile menu toggle-->
					<a class="navbar-toggle">
						<div class="lines">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</a>
					<!-- End mobile menu toggle-->
				</div>
			</div>
		</div>
	</div>
	<?php
	$role_id	= $this->session->userdata('role_id');
	$querySubMenu = "SELECT *
					FROM `tb_sub_menu` 
					WHERE `tb_sub_menu`.`menu_id` = $role_id
					AND `tb_sub_menu` . `is_active` = 1 ";
	$submenu = $this->db->query($querySubMenu)->result_array();
	?>
	<div class="navbar-custom">
		<div class="container">
			<div id="navigation">
				<ul class="navigation-menu">
					<?php foreach ($submenu as $sm) : ?>
						<li class="has-submenu">
							<a href="<?= base_url($sm['url']) ?>"><i class="<?= $sm['icon'] ?>"></i><?= $sm['title'] ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

</header>
