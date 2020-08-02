<div class="wrapper">
	<div class="container">
		 <div class="row">
			<div class="col-lg-12">
				<div class="card-box ">
					
				<?php if($this->session->userdata('role_id') == 1) {?>
					<a href="<?= base_url('admin/module/get/').$question['id_sub_module']."/". $module['slug']?>"  class="btn btn-primary btn-lg btn-circle"><i class="md  md-arrow-back"></i></a>
				<?php }else{?>	
					<a href="<?= base_url('user/module/get/').$question['id_sub_module']."/". $module['slug']?>"  class="btn btn-primary btn-lg btn-circle"><i class="md  md-arrow-back"></i></a>
				<?php }?>	
				<h3><b> <?=$get_question['title']?></b></h3>
					<div class="table-box opport-box">
						<h5 class="m-t-5" style="letter-spacing: 0.5px;line-height: 1.2;"><?=$get_question['body'];?></h5>
						<div class="row">
							<div class="col-md-2">
								<div class="member-info">
									<?php 
									$post_title = $get_question['created_at'];
									?>
									<p class="text-dark m-b-0"><b>Active: </b> <span class="text-muted"><?= time_ago($post_title). 'ago'?></span></p>
								</div>	
							</div>
							<div class="col-md-2">
								<div class="member-info">
									<p class="text-dark m-b-5"><b>Ask by: </b><span class="text-muted"><?= ($get_question['name']) ?></span></p>
								</div>
							</div>
						</div>
					</div>
					<hr>
				</div>
			</div>
		</div>
		<?php if($this->session->userdata('role_id') == 1) {
			include APPPATH.'views/admin/module/_form_answer.php'; 
		}else{
			include APPPATH.'views/modules/_form_answer.php'; 
		}
		 ?> 
			<div class="container">
				<div class="row">	
					<div class="col-sm-12">
					<div class="card-box">
						<h4 class="m-t-0 header-title"><b>Answer</b></h4>
						<p class="text-muted m-b-30 font-13">The default media displays a media object (images, video, audio) to the left or right of a content block.</p>
						<div>
							<?php foreach($get_answer as $key => $value) : ?>
							<div class="media">
								<div class="media-left">
									<a href="#"> <img class="media-object img-circle" src="https://api.adorable.io/avatars/50/<?= $value['user_email']; ?>"> </a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><?=$value['name']?></h4>
									<span class="text-muted m-b-10 font-13"><?= time_ago($value['created_at']). 'ago'?></span>
								<h5><?=$value['body']?></h5>
								</div>
							</div>  
							<?php endforeach;?>        
						</div>
					</div>
					</div>
				</div> <!-- end row -->
			</div>
		</div>
	</div>


