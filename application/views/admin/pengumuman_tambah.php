
<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Pengumuman</li>
  </ol>

  <h1>Tambah Pengumuman</h1>
  <?php 
  echo form_open('index.php/admin/pengumuman/tambah/'); 
  echo validation_errors();
  ?>

  <div class="form-group">
  <label>Judul Pengumuman<font color="red">*</font></label>
  <input type="text" class="form-control" id="JudulPengumuman" name="JudulPengumuman" placeholder="Judul Pengumuman" required>
  </div>
  <div class="form-group">
    <label>Tanggal Pengumuman<font color="red">*</font></label>
    <input type="text" class="form-control" id="TglPengumuman" name="TglPengumuman" placeholder="Tanggal Pengumuman" readonly value="<?= date('Y-m-d')?>" required>
  </div>
  <div class="form-group">
    <label for="textarea-input">Isi<font color="red">*</font></label><br>
    <div class="col-12 col-md-9">
        <textarea name="isi" id="isi" rows="9" placeholder="Isi Pesan..." class="form-control"></textarea>
        </div>
  </div>
  <div class="row form-group">
    <div class="col col-md-3">
        <label class=" form-control-label">Tampil Guru </label>
    </div>
    <div class="col col-md-9">
        <div class="form-check-inline form-check">
            <label for="inline-radio1" class="form-check-label">
                <input type="radio" id="TampilGuru" name="TampilGuru" value="1" class="form-check-input"> Ya 
            </label>
            <label for="inline-radio2" class="form-check-label">
                <input type="radio" id="TampilGuru" name="TampilGuru" value="0" class="form-check-input"> Tidak 
            </label>
        </div>
    </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Tampil Siswa </label>
        </div>
        <div class="col col-md-9">
            <div class="form-check-inline form-check">
                <label for="inline-radio1" class="form-check-label">
                    <input type="radio" id="tampilSiswa" name="tampilSiswa" value="1" class="form-check-input"> Ya 
            </label>
            <label for="inline-radio2" class="form-check-label">
                    <input type="radio" id="tampilSiswa" name="tampilSiswa" value="0" class="form-check-input"> Tidak 
            </label>
            </div>
        </div>
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
