<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/siswa/overviewSiswa') ?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Siswa</li>
    </ol>
    <?php if ($this->session->userdata('level') == 'Siswa') { ?>
      <!-- <div align="left">
    <a href="<?php echo base_url('index.php/admin/siswa/tambah/'); ?>" class="btn btn-success">Tambah</a>
  </div> -->
      <br>
      <center><h3><strong>Tugas Siswa</strong></h3></center><br>
    <?php } ?>
    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <!-- MAP DATA-->
          <div class="map-data m-b-40">
            <div class="mx-auto d-block">
              <div class="container-fluid">
                <?php foreach ($data as $key) {
                  if ($key->KodeKelas == $siswa->KodeKelas) { ?>
                    <div class="card card-body">
                      <h5><?= $key->NamaKelas ?></h5>
                      <hr>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <?php foreach ($mapel as $k) {
                              if ($key->KodeKelas == $k->KodeKelas) { ?>
                                <tr>
                                  <td width="80%"><?= $k->NamaMapel ?></td>
                                  <td><a href="<?= base_url() ?>siswa/tugas/listPertemuan/<?=
                                  $k->KodeKelas ?>/<?= $k->KodeMapel ?>" class="btn btn-primary">Tugas</a></td>
                                </tr>
                            <?php }
                            } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                <?php }
                } ?>
              </div>
            </div>
            <br>

          </div>
          <!-- END MAP DATA-->
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
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    </script>


    </body>

    </html>