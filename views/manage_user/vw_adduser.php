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
      <div class="col-md-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li id="per"><a href="#add_user_perusahaan" data-toggle="tab">Perusahaan</a></li>
                  <li id="tok"><a href="#add_user_toko" data-toggle="tab">Toko</a></li>
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Tambah data</li>
                </ul>
                <script>
                $(document).ready(function(){
                  $("#<?php echo $this->session->flashdata('er_cus'); ?>").addClass("active");
                })
                </script>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="add_user_perusahaan">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('user/add_user') ?>">
                        <div class="box-body">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">ID Perusahaan</label>

                            <div class="col-sm-10">
                              <input type="number" name="id_perusahaan" class="form-control" placeholder="ID Perusahaan">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Nama lengkap</label>

                            <div class="col-sm-10">
                              <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>

                            <div class="col-sm-4">
                              <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>

                            <label class="col-sm-2 col-md-pull-1 control-label">Password</label>

                            <div class="col-sm-4 col-md-pull-1">
                              <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>

                            <div class="col-sm-10">
                              <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Telepon</label>

                            <div class="col-sm-10">
                              <input type="number" name="telepon" class="form-control" placeholder="No telepon">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                              <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>

                            <div class="col-sm-10">
                              <input type="number" name="status" class="form-control" placeholder="Status">
                            </div>
                          </div>
                          <?php echo validation_errors(); ?>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="reset" class="btn btn-danger">Hapus</button>
                          <button type="submit" class="btn btn-info pull-right">Sign in</button>
                        </div>
                        <!-- /.box-footer -->
                      </form>
                  </div>
                  <div class="chart tab-pane" id="add_user_toko">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('user/add_data_toko') ?>">
                        <div class="box-body">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">ID Toko</label>

                            <div class="col-sm-10">
                              <input type="number" name="id_toko" class="form-control" placeholder="ID Toko">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Nama toko</label>

                            <div class="col-sm-10">
                              <input type="text" name="nama_toko" class="form-control" placeholder="Nama toko">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Username Toko</label>

                            <div class="col-sm-4">
                              <input type="text" name="username" class="form-control" placeholder="Username toko">
                            </div>

                            <label class="col-sm-2 col-md-pull-1 control-label">Password</label>

                            <div class="col-sm-4 col-md-pull-1">
                              <input type="password" name="password" class="form-control" placeholder="Password toko">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat Toko</label>

                            <div class="col-sm-10">
                              <input type="text" name="alamat_toko" class="form-control" placeholder="Alamat toko">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Telepon Toko</label>

                            <div class="col-sm-10">
                              <input type="number" name="telepon_toko" class="form-control" placeholder="No telepon">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Email Toko</label>

                            <div class="col-sm-10">
                              <input type="email" name="email_toko" class="form-control" placeholder="Email toko">
                            </div>
                          </div>
                          <?php echo validation_errors(); ?>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="reset" class="btn btn-danger">Hapus</button>
                          <button type="submit" class="btn btn-info pull-right">Sign in</button>
                        </div>
                        <!-- /.box-footer -->
                      </form>
                  </div>
                </div>
              </div>
              </div>

              <!-- /.nav-tabs-custom -->
        <!-- /.row -->
        <!-- general form elements -->
          <!-- /.box-header -->
          <!-- form start -->

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
