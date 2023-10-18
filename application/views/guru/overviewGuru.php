<?php if ($this->session->userdata('level') == 'Guru') { ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('index.php/guru/overviewGuru') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Guru</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('index.php/guru/tugas') ?>">
              <span class="float-left">Tugas</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('index.php/guru/materi') ?>">
              <span class="float-left">Materi</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-list"></i>
              </div>
              <div class="mr-5"></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('index.php/guru/absen') ?>">
              <span class="float-left">Absensi</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('index.php/guru/ujian') ?>">
              <span class="float-left">Ujian</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

      <?php } ?>
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