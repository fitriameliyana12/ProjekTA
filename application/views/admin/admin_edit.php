
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Admin</li>
    </ol>

    <h1>Edit data Admin</h1>
    <?php 
    echo form_open('index.php/admin/admin/edit/'.$this->uri->segment(4)); 
    echo validation_errors();
    ?>
   <div class="form-group">
    <label>ID Admin<font color="red">*</font></label>
    <input type="text" class="form-control" id="id_admin" name="id_admin" placeholder="Isikan ID Admin" value="<?php echo $admin[0]->id_admin ?>">
    </div>
    <div class="form-group">
    <label>Nama Admin<font color="red">*</font></label>
    <input type="text" class="form-control" id="NamaAdmin" name="NamaAdmin" placeholder="Isikan Nama Admin" value="<?php echo $admin[0]->NamaAdmin ?>">
    </div>
    <div class="form-group">
      <label>NIP<font color="red">*</font></label>
      <input type="number" class="form-control" id="NIP" name="NIP" placeholder="Isikan NIP" value="<?php echo $admin[0]->NIP ?>">
    </div>
    <div class="form-group">
      <label>Jenis Kelamin<font color="red">*</font></label>
      <select name="JenisKelamin" class="form-control">
        <option value="P" <?php if ($admin[0]->JenisKelamin == 'P') { ?> selected <?php } ?>>Peremuan</option>
        <option value="L" <?php if ($admin[0]->JenisKelamin == 'L') { ?> selected <?php } ?>>Laki Laki</option>
      </select>
    </div>
    <div class="form-group">
    <label>ID User<font color="red">*</font></label><br>
    <select name="id_user" class="form-control">
      <?php foreach ($userList as $key) { ?>
        <option value="<?php echo $key->id_user ?>" <?php if ($admin[0]->id_user == $key->id_user) {
          echo "selected";
        } ?>><?php echo $key->id_user ?></option>
      <?php } ?>
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
