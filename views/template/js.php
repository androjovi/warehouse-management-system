</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-notify/bootstrap-notify.min.js') ?>" type="text/javascript"></script>
<script>
function confirm_hapus(){
  var msg
  msg = "Aapak anda yakin untuk menghapus data"
  var agree = confirm(msg)
  if (agree)
  return true;
  else
  return false;
}
$(document).ready(function(){
<?php if ($this->session->flashdata('success')): ?>
$.notify({
	// options
	message: '<?php echo $this->session->flashdata('success'); ?>'
},{
	// settings
	type: 'success'
});
<?php elseif ($this->session->flashdata('error')): ?>
$.notify({
	// options
	message: '<?php echo $this->session->flashdata('error'); ?>'
},{
	// settings
	type: 'danger'
});
<?php endif; ?>
})
</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-select/bootstrap-select.min.js') ?>" type="text/javascript"></script>

<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.min.js') ?>" type="text/javascript"></script>
