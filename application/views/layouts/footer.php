<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/detect.js') ?>"></script>
<script src="<?= base_url('assets/js/fastclick.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.slimscroll.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.blockUI.js') ?>"></script>
<script src="<?= base_url('assets/js/waves.js') ?>"></script>
<script src="<?= base_url('assets/js/wow.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.nicescroll.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.scrollTo.min.js') ?>"></script>
<!--Summernote js-->
<script src="<?= base_url('assets/plugins/summernote/summernote.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.core.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.app.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.js') ?>"></script>
<!-- Modal-Effect -->
<script src="<?= base_url('assets/plugins/custombox/js/custombox.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/custombox/js/legacy.min.js') ?>"></script>
<!-- datatable -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.js') ?>"></script>

<script src="<?= base_url('assets/plugins/datatables/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/buttons.bootstrap.min.js') ?>"></script>

<script src="<?= base_url('assets/plugins/datatables/dataTables.fixedColumns.min.js') ?>"></script>
<script src="<?= base_url('assets/pages/datatables.init.js') ?>"></script>
<!-- ladda js -->
<script src="<?= base_url('assets/plugins/ladda-buttons/js/spin.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/ladda-buttons/js/ladda.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/ladda-buttons/js/ladda.jquery.min.js') ?>"></script>

<!--Summernote js-->
<script src="<?= base_url('assets/js/script.js') ?>"></script>
<script src="<?= base_url('assets/plugins/moment/moment.js') ?>"></script>
<script src="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('assets/pages/jquery.form-pickers.init.js') ?>"></script>

<!-- page js -->
<script src="<?= base_url('assets/pages/jquery.form-pickers.init.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').dataTable();
	});

	jQuery(document).ready(function() {

		$('.summernote').summernote({
			height: 250, // set editor height
			minHeight: null, // set minimum height of editor
			maxHeight: null, // set maximum height of editor
			focus: false // set focus to editable area after initializing summernote
		});

		$('.inline-editor').summernote({
			airMode: true
		});

	});
</script>
<script>

</script>
</body>

</html>