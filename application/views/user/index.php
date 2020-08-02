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


		<!-- Footer -->
		<footer class="footer text-right">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						© 2016. All rights reserved.
					</div>
					<div class="col-xs-6">
						<ul class="pull-right list-inline m-b-0">
							<li>
								<a href="#">About</a>
							</li>
							<li>
								<a href="#">Help</a>
							</li>
							<li>
								<a href="#">Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>

<script>
	//function ajax add user
	$(function() {
		$(".tampilAdd").on("click", function() {
			$("#modalLable").html("Add User");
			$(".modal-footer  button[type=submit]").html("Add User");
			$("#name").val("");
			$("#email").val("");
			$("#password").val("");
			$("#role_id").val("");
			$("#user_id").val("");
		});

		$(".tampilUbah").on("click", function() {
			$("#modalLable").html("Edit User");
			$(".modal-footer  button[type=submit]").html("Edit User");
			$(".custom-modal-text form").attr("action", "user/update");

			const id = $(this).data("id");

			$.ajax({
				url: "user/edit",
				data: {
					id: id
				},
				method: "POST",
				dataType: "json",
				success: function(data) {
					$("#name").val(data.name);
					$("#email").val(data.user_email);
					$("#password").val(data.user_password);
					$("#role_id").val(data.role_id);
					$("#user_id").val(data.user_id);
				}
			});
		});
	});
</script>