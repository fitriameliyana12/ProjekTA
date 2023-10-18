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
      <center><h3><strong>Ujian</strong></h3></center><br>
    <?php } ?>
    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

          <div class="main-content">
            <div class="section__content section__content--p30">
              <div class="container-fluid">
                <!-- MAP DATA-->
                <div class="map-data m-b-40">
                  <div class="mx-auto d-block">
                    <div class="container-fluid">
                      <div class="card card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <th>Nama Ujian</th>
                              <th>Mata Pelajaran</th>
                              <th>Waktu Ujian</th>
                              <th>Tanggal Mulai</th>
                              <th>Tanggal Berakhir</th>
                              <th>Nilai</th>
                              <th>Aksi</th>
                            </thead>
                            <tbody>
                              <?php foreach ($ujian as $k) {
                              ?>
                                <tr>
                                  <td><?= $k->judul ?></td>
                                  <td><?= $k->NamaKelas ?> || <?= $k->NamaMapel ?></td>
                                  <td><?= $k->waktu ?></td>
                                  <td><?= $k->tgl_mulai ?></td>
                                  <td><?= $k->tgl_selesai ?></td>
                                  <td>
                                    <?php
                                      foreach ($jawaban as $key) {
                                        if($key->id_ujian == $k->id_ujian){
                                          echo $key->nilai_total;
                                        }
                                      }
                                    ?>
                                  </td>
                                  <td>
                                    <?php
                                      $data = "";
                                      foreach ($jawaban as $key) {
                                        if($key->id_ujian == $k->id_ujian){
                                          $data = "ada";
                                        }
                                      }
                                    ?>
                                    <?php
                                      if (date('Y-m-d') <= $k->tgl_mulai && $k->tgl_selesai && $data != "ada") {
                                        ?>
                                          <a href="<?= base_url() ?>siswa/ujian/masukUjian/<?= $k->id_ujian ?>/
                                          <?= $k->waktu ?>" class="btn btn-primary btn-sm">Masuk Ujian Online</a>
                                        <?php
                                      } else {
                                        ?>
                                          <p>Anda Sudah Mengerjakan</p>
                                        <?php
                                      }
                                    ?>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
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