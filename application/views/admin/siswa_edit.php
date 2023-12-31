
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Siswa</li>
    </ol>

    <center><h1>Edit data Siswa</h1></center><br>
    <?php 
    echo form_open('index.php/admin/siswa/edit/'.$this->uri->segment(4)); 
    echo validation_errors();
    ?>

    <div class="form-group">
    <label>Nomer Induk<font color="red">*</font></label>
    <input type="text" class="form-control" id="no_induk" name="no_induk" placeholder="no_induk" value="<?php echo $siswa[0]->no_induk ?>">
    </div>
    <div class="form-group">
      <label>NISN<font color="red">*</font></label>
      <input type="text" class="form-control" id="NISN" name="NISN" placeholder="NISN" value="<?php echo $siswa[0]->NISN ?>">
    </div>
    <div class="form-group">
    <label>Nama Siswa<font color="red">*</font></label>
    <input type="text" class="form-control" id="NamaSiswa" name="NamaSiswa" placeholder="Isikan Nama Siswa" value="<?php echo $siswa[0]->NamaSiswa ?>">
    </div>
    <div class="form-group">
      <label>Jenis Kelamin<font color="red">*</font></label>
      <select name="JenisKelamin" class="form-control">
        <option value="P" <?php if ($siswa[0]->JenisKelamin == 'P') { ?> selected <?php } ?>>Peremuan</option>
        <option value="L" <?php if ($siswa[0]->JenisKelamin == 'L') { ?> selected <?php } ?>>Laki Laki</option>
      </select>
    </div>
    <div class="form-group">
      <label>Kelas<font color="red">*</font></label><br>
      <select name="KodeKelas" class="form-control">
        <?php foreach ($kelasList as $key) { ?>
          <option value="<?php echo $key->KodeKelas ?>" <?php if ($siswa[0]->KodeKelas == $key->KodeKelas) {
            echo "selected";
          } ?>><?php echo $key->NamaKelas ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>ID User<font color="red">*</font></label><br>
      <select name="id_user" class="form-control">
        <?php foreach ($userList as $key) { ?>
          <option value="<?php echo $key->id_user ?>" <?php if ($siswa[0]->id_user == $key->id_user) {
            echo "selected";
          } ?>><?php echo $key->id_user ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Status Siswa<font color="red">*</font></label>
      <select name="status_m" class="form-control">
        <option value="AKTIF" <?php if ($siswa[0]->status_m == 'AKTIF') { ?> selected <?php } ?>>AKTIF</option>
        <option value="TIDAK-AKTIF" <?php if ($siswa[0]->status_m == 'TIDAK-AKTIF') { ?> selected <?php } ?>>TIDAK-AKTIF</option>
      </select>
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
