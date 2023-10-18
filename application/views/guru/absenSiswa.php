<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/guru/overviewGuru') ?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Guru</li>
    </ol>
    <?php if ($this->session->userdata('level') == 'Guru') { ?>
      <div align="left">
  <a href="<?php echo base_url('index.php/guru/Absen/excel/').$id_absen; ?>" class="btn btn-primary">EXPORT EXCEL</a>
  <a href="<?php echo base_url('index.php/guru/Absen/pdf/').$id_absen; ?>" class="btn btn-primary">EXPORT PDF</a>
  <a href="<?php echo base_url('index.php/guru/Absen/print/').$id_absen; ?>" class="btn btn-primary"> PRINT DATA</a>
<br>
  <?php foreach ($kelas as $k) { ?>
    <br>
    <li><b> Kelas    : <?= $kelas[0]->NamaKelas ?> </b></li>
    <li><b> Guru    : <?= $kelas[0]->NamaGuru ?> </b></li>
    <li><b> Mata Pelajaran    : <?= $kelas[0]->NamaMapel ?> </b></li>
</div>
      <br>
      <center><h3><strong>Absensi Siswa</strong></h3></center>
    <?php } ?>

                  <table class="table table-hover" id = "myTable">
                    <thead>
                        <th>No</th>
                        <th>No Induk</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kehadiran</th>
                        <th>Aksi</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Akhir</th>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($absen as $key) { ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td>
                            <?= $key->no_induk ?>
                          </td>
                          <td>
                            <?= $key->NISN ?>
                          </td>
                          <td>
                            <?= $key->NamaSiswa ?>
                          </td>
                          <td>
                            <?php
                              if($key->keterangan == "alpha"){
                                echo 'Alpha';
                              }else if($key->keterangan == "masuk"){
                                echo 'Masuk';
                              }else if($key->keterangan == "sakit"){
                                echo 'Sakit';
                              }else{
                                echo 'Izin';
                              }
                            ?>
                          </td>
                          <td>
                          <a type="button" class="btn btn-danger btn-sm" href="<?= base_url() ?>guru/absen/updateAbsenSiswa/<?= $key->id_absen_siswa; ?>/<?= $key->id_absen ?>/alpha">Alpha</a>
                            <a type="button" class="btn btn-success btn-sm" href="<?= base_url() ?>guru/absen/updateAbsenSiswa/<?= $key->id_absen_siswa; ?>/<?= $key->id_absen ?>/masuk">Masuk</a>
                            <a type="button" class="btn btn-primary btn-sm" href="<?= base_url() ?>guru/absen/updateAbsenSiswa/<?= $key->id_absen_siswa; ?>/<?= $key->id_absen ?>/sakit">Sakit</a>
                            <a type="button" class="btn btn-warning btn-sm" href="<?= base_url() ?>guru/absen/updateAbsenSiswa/<?= $key->id_absen_siswa; ?>/<?= $key->id_absen ?>/izin">Izin</a>
                          </td>
                          <td> <?= $key->tanggal ?> </td>
                          <td><?= $key->jam_mulai ?> </td>
                          <td><?= $key->jam_selesai ?> </td>
                        </tr>
                        <?php $no++;
                      }?>
                      <?php $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="copyright">
                <p>Copyright © 2021 SMAN 1 PATIANROWO</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
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
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>


</body>

</html>