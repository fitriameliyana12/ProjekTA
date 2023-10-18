
<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Jam Pelajaran</li>
  </ol>

  <h1>Tambah Data Jam Pelajaran</h1>
  <?php 
  echo form_open('index.php/admin/Jam_pelajaran/tambah/'); 
  echo validation_errors();
  ?>

  <div class="form-group">
  <label>Jam Mulai<font color="red">*</font></label>
  <input type="Time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="Isikan Jam Mulai" required>
  </div>
  <div class="form-group">
    <label>Jam Selesai<font color="red">*</font></label>
    <input type="Time" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="Isikan Jam Selesai" required>
  </div>
  <div class="form-group">
    <label>Keterangan<font color="red">*</font></label>
    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Isikan Keterangan" required>
  </div>

  <font color="red"><i>* Wajib diisi</i></font>
  <br>
  <br>

  <button type="submit" class="btn btn-primary">Submit</button>

  <?php echo form_close(); ?>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo site_url('index.php/login/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

  <!-- ... -->
  <!-- di sini ada kode yang panjang -->
  <!-- ... -->

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>
  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
  <script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>

</body>

</html>
