<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SMAN 1 Patianrowo</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="<?php echo base_url().'assets/chart/css/morris.css'?>">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <style type="text/css">
    .badge {
      position:relative;
    }
    .badge[data-badge]:after {
      content:attr(data-badge);
      position:absolute;
      top:-10px;
      right:-10px;
      font-size:.7em;
      background:red;
      color:white;
      width:18px;height:18px;
      text-align:center;
      line-height:18px;
      border-radius:50%;
      box-shadow:0 0 1px #333;
}
  </style>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <img src="<?php echo base_url('assets/sma.png')?>" width="50px;"> &nbsp; &nbsp;

    <a class="navbar-brand mr-1" href="">SMAN 1 PATIANROWO</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item">Notif</a><br>
        </div>
      </li>
      
      <li class="nav-item dropdown no-arrow mx-1">

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('index.php/admin/overview'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
  
      <?php if($this->session->userdata('level') == '1'){ ?>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/guru/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Guru</span></a> <!--obat-->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/siswa/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Siswa</span></a> <!--Supplier-->
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/admin/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Admin</span></a>
        </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/user/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master User</span></a> <!--Supplier-->
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/jurusan/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Jurusan</span></a> <!--Supplier
      </li> --> 
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/mapel/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Mata Pelajaran</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/mapelKelas/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master MaPel Kelas</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/kelas/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Kelas</span></a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/kelasSiswa/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manajemen Kelas Siswa</span></a>
        </li> -->
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/jadwal/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Jadwal Pelajaran</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/pengumuman/'); ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Pengumuman</span></a>
        </li>
      </li>
    <!--   <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/laporan/'); ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span></a>
      </li>

      <?php } ?>
      <?php if($this->session->userdata('level') == '1'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/penjualan/listPenjualan/'); ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>List Penjualan</span></a>
      </li>
      <?php } ?> -->
      
      <?php if($this->session->userdata('level') == '2'){ ?>
        
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/tugas/'); ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Upload Tugas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/penjualan/'); ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Upload Materi</span></a>
      </li>
      <?php } ?>
      <?php if($this->session->userdata('level') == '3'){ ?>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/laporan/'); ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/laporan/lihatGrafik/'); ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Grafik</span></a>
      </li>
      <?php } ?>
      
     <!--  <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/admin/ubah_pass/'); ?>">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Ganti Password</span></a>
      </li>
      </li> -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('index.php/login/logout'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
