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
      <center><h3><strong>Ujian</strong></h3></center><br>
    <?php } ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <!-- MAP DATA-->
          <div class="map-data m-b-40">
            <!--                <p><?php //echo "<pre>"; print_r($ujian); echo "</pre>";
                                    ?></p>-->
            <div class="mx-auto d-block">
              <div class="container-fluid">
                <div class="card card-body">
                  <a href="#modalUjian" type="button" data-toggle="modal" class="btn btn-primary pull-right">Buat Ujian</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Nama Ujian</th>
                        <th>Mata Pelajaran</th>
                        <th>Waktu Ujian</th>
                        <th>Tanggal Berakhir</th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php foreach ($ujian as $k) {
                        ?>
                          <tr>
                            <td><?= $k->judul ?></td>
                            <td><?= $k->NamaKelas ?> || <?= $k->NamaMapel ?></td>
                            <td><?= $k->waktu ?></td>
                            <td><?= $k->tgl_selesai ?></td>
                            <td>
                              <a href="<?= base_url() ?>guru/ujian/hasilUjian/<?= $k->id_ujian ?>" class="btn btn-primary btn-sm">Hasil</a>
                              <a href="<?= base_url() ?>guru/ujian/detailUjian/<?= $k->id_ujian ?>" class="btn btn-primary btn-sm">Detail</a>
                              <a href="<?= base_url() ?>guru/ujian/hapusUjian/<?= $k->id_ujian ?>" class="btn btn-danger btn-sm">Hapus</a>
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

    <div class="modal fade" id="modalUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buat Ujian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url() ?>guru/ujian/buatUjian/" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Judul <span class="text-error">*</span></label>
                <input type="text" name="nama" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Waktu <span class="text-error">*menit</span></label>
                <input type="number" name="waktu" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Mata Pelajaran <span class="text-error"></span></label>
                <select class="form-control" required name="mapelKelas">
                  <?php foreach ($mapel as $key) { ?>
                    <option value="<?= $key->id_mapel_kelas; ?>"><?= $key->NamaKelas ?> - <?= $key->NamaMapel ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Tanggal Berakhir <span class="text-error">*</span></label>
                <input type="date" name="tgl" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Jam Berakhir <span class="text-error">*</span></label>
                <input type="time" name="jam" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Buat</button>
            </form>
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