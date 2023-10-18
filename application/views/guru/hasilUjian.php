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
      <!-- <div align="left">
  <a href="<?php echo base_url('index.php/admin/guru/tambah/'); ?>" class="btn btn-success">Tambah</a>
</div> -->
      <br>
    <?php } ?>

                  <center><strong><h3><b>Hasil Ujian Siswa</b></h3></strong></center><br>
                  <!-- <a href="#modalUjian"  type="button" data-toggle="modal" class="btn btn-primary pull-right">Buat Ujian</a> -->
                  <!-- <div class="table-responsive"> -->
                    <table class="table table-hover" id="myTable">
                      <thead>
                        <th>No</th>
                        <th>Nama Ujian</th>
                        <th>Tanggal</th>
                        <th>Nama Siswa</th>
                        <th>Jawaban</th>
                        <th>Pilgan Benar</th>
                        <th>Nilai Pilgan</th>
                        <th>Nilai Essay</th>
                        <th>Jumlah Soal</th>
                        <!-- <th>Action</th> -->
                      </thead>
                      <tbody id="isi_user">
                      <?php $no = 1;
                        foreach ($jawaban as $k) {
                        ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php foreach ($ujian as $key) {
                                  if ($key->id_ujian == $k->id_ujian) {
                                    echo $key->judul;
                                  }
                                } ?>
                            </td>
                            <td><?= $k->tanggal ?></td>
                            <td><?php foreach ($siswa as $key) {
                                  if ($key->no_induk == $k->no_induk) {
                                    echo $key->NamaSiswa;
                                  }
                                } ?></td>
                            <td><?= $k->jawaban ?></td>
                            <td><?= $k->nilai_pilgan ?></td>
                            <td><?= round($k->nilai_total, 2) ?></td>
                            <td>
                              <div class="table-data-feature">
                                <form method="post" action="<?= base_url('guru/ujian/nilaiEssay/' . $k->id_jawaban . '/' . $id_ujian) ?>">
                                <div class="row form-group">
                                <div class="col-7">
                                <input type="number" class="form-control" name="nilai_essay" value="<?= $k->nilai_essay ?>">
                                </div>
                                <div class="col-2">
                                  <input type="submit" value="Submit" class="btn btn-secondary btn-sm">
                                  </div>
                                  </div>
                                </form>
                                </div>
                            </td>
                            <td><?= $k->jumlah_soal ?></td>
                          </tr>
                        <?php $no++;
                      } ?>
                      </tbody>
                    </table>
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <br>

          </div>
          <!-- END MAP DATA-->
        </div>
      </div>

    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#laki").click(function() {
          $("#perempuan").attr("checked", false);
          $("#laki").attr("checked", true);

        });
        $("#perempuan").click(function() {
          $("#laki").attr("checked", false);
          $("#perempuan").attr("checked", true);
        });
      });
    </script>

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