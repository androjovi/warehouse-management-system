<?php
$this->load->view('template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<?php breadcrumb() ?>


<!-- Main content -->
<section class="content">
  <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Add users</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php foreach($query as $k): ?>
          <form class="form-horizontal" method="post" action="<?php echo site_url('gudang/update/'. $k->id_penyimpanan) ?>">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Penyimpanan</label>

                  <div class="col-sm-10">
                    <input type="number" readonly value="<?php echo $k->id_penyimpanan ?>" name="id_penyimpanan" class="form-control" placeholder="ID Peyimpanan">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama gudang</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $k->nama_penyimpanan ?>" name="nama_gudang" class="form-control" placeholder="Nama gudang">
                  </div>

                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Batas max</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $k->batas_max ?>" name="batas_max" class="form-control" placeholder="Batas max">
                  </div>
                </div>
              <?php endforeach; ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Perusahaan</label>

                  <div class="col-sm-10">
                    <select class="form-control selectpicker" name="id_perusahaan" data-live-search="true">
                      <?php foreach(get_induk('id_perusahaan', 'tperusahaan') as $k): ?>
                      <option class="t" data-tokens="<?php echo $k->id_perusahaan ?>"><?php echo $k->id_perusahaan ?></option>
                    <?php endforeach; ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Furniture</label>
                  <div class="col-sm-10">
                    <select class="form-control selectpicker" name="id_furniture" data-live-search="true">
                      <?php foreach(get_induk('id_furniture', 'tjenis_furniture') as $k): ?>
                      <option data-tokens="<?php echo $k->id_furniture ?>"><?php echo $k->id_furniture ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <?php echo validation_errors(); ?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-danger">Hapus</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
      </div>
    </div>
        <!-- /.box -->

</section><!-- /.content -->


<?php
$this->load->view('template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('template/foot');
?>
