<?php if (validation_errors()) : ?>
	<div class="alert alert-denger" role="alert">
		<?= validation_errors() ?>
	</div>
<?php endif ?>
<form method="post" action="<?= base_url('admin/module/show_question/') . $question['uuid_question'] . "/" . $get_question['slug'] ?>" class="well">
	<input type="hidden" name="id_questions" value="<?= $get_question['id'] ?>">
	<span class="input-icon icon-right">
		<textarea rows="2" class="form-control" name="body" placeholder="Post a new Ask"></textarea>
	</span>
	<div class="p-t-10 pull-right">
		<button type="submit" class="btn btn-primary waves-effect waves-light"> <i class="fa fa-rocket m-r-5"></i> <span>Post</span> </button>
	</div>
	<ul class="nav nav-pills profile-pills m-t-10">
		<li>
			<a href="#"><i class="fa fa-user"></i></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-location-arrow"></i></a>
		</li>
		<li>
			<a href="#"><i class=" fa fa-camera"></i></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-smile-o"></i></a>
		</li>
	</ul>
</form>
