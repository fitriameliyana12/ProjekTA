
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Admin</li>
    </ol>
    <h1>Ganti Password</h1>
    <?php 
    echo form_open('index.php/admin/admin/ubah_pass/'); 
    echo validation_errors();
    ?>

    <div class="form-group">
    <label>Password Lama<font color="red">*</font></label>
    <input type="password" class="form-control" id="pwlama" name="pwlama" placeholder="Isikan Password Lama" required>
    </div>
    <div class="form-group">
      <label>Password Baru<font color="red">*</font></label>
      <input type="password" class="form-control" id="pwbaru" name="pwbaru" placeholder="Isikan Password Baru" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$" required>
    </div>
    <div class="form-group">
      <label>Konfirmasi Password<font color="red">*</font></label>
      <input type="password" class="form-control" id="pwkonfirm" name="pwkonfirm" placeholder="Isikan Konfirmasi Password" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{7,20}$" required>
    </div>
    <font color="red"><i>* Wajib diisi</i></font>
    <br>
    <br>

 <script type="text/javascript">
            window.onload = function () {
                document.getElementById("pwbaru").onchange = validatePassword;
                document.getElementById("pwkonfirm").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("pwbaru").value;
                var pass1=document.getElementById("pwkonfirm").value;
                if(pass1!=pass2)
                    document.getElementById("pwbaru").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                else
                    document.getElementById("pwkonfirm").setCustomValidity('');
            }
        </script>
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
