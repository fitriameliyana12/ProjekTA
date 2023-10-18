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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <!-- MAP DATA-->
          <div class="map-data m-b-40">
            <center><h3 class="title-3 m-b-30">Edit Ujian</h3></center>
            <div class="mx-auto d-block">
              <div class="container-fluid">
                <div class="card card-body">
                  <a href="#modalUjian" type="button" data-toggle="modal" class="btn btn-primary pull-right">Edit Ujian</a>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <?php foreach ($ujian as $k) {
                        ?>
                          <tr>
                            <td>Nama Ujian</td>
                            <td><?= $k->judul ?></td>
                          </tr>
                          <tr>
                            <td>Judul</td>
                            <td><?= $k->NamaKelas ?> || <?= $k->NamaMapel ?></td>
                          </tr>
                          <tr>
                            <td>Waktu pengerjaan</td>
                            <td><?= $k->waktu ?></td>
                          </tr>
                          <tr>
                            <td>Tanggal Mulai</td>
                            <td><?= $k->tgl_mulai ?></td>
                          </tr>
                          <tr>
                            <td>Tanggal Selesai</td>
                            <td><?= $k->tgl_selesai ?></td>
                          </tr>
                          <tr>
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
          <div class="map-data m-b-40">
            <!-- <center><h3 class="title-3 m-b-30">Soal</h3></center> --><br>
            <div class="btn-group btn-block" role="group" aria-label="Basic example">
              <a href="#modalPG" type="button" data-toggle="modal" class="btn btn-primary ">Buat Soal Pilihan Ganda</a>
              <a href="#modalEssay" type="button" data-toggle="modal" class="btn btn-primary ">Buat Soal Essay</a>
            </div>
            <!--<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Atur Soal
                    </button><br>
                <div class="collapse" id="collapseExample">
                <form action="<?= base_url() ?>pengajar/tambahSoalUjian/<?= $id_soalnya ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-10">
                              <?php $no = 1;
                              foreach ($soal as $key) { ?>
                                <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $no ?>" value="<?= $key->id_soal ?>" name="pertanyaan[]">
                                          <label class="form-check-label" for="inlineCheckbox<?= $no ?>"><?= $key->pertanyaan ?></label>
                                </div><hr>
                                <?php $no++;
                              } ?>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>-->
            <div class="mx-auto d-block">
              <div class="container-fluid">
                <div class="table-responsive"><br>
                  <center><h5>Daftar Soal Ujian</h5></center><br>
                  <table class="table">
                    <?php $no = 1;
                    foreach ($soal_ujian as $key) { ?>
                      <tr>
                        <td><?= $no; ?></td> 
                        <td><?php if ($key->tipe == 1) {
                              echo "Pilihan Ganda";
                            } elseif ($key->tipe == 2) {
                              echo "Essay";
                            } ?></td>
                        <?php
                        if ($key->tipe == 1) {
                        ?>
                          <td><?= $key->pertanyaan ?><br><?= $key->pilgan_a ?><br><?= $key->pilgan_b ?><br><?= $key->pilgan_c ?><br><?= $key->pilgan_d ?></td>
                        <?php
                        } else {
                        ?>
                          <td><?= $key->pertanyaan ?></td>
                        <?php
                        }
                        ?>
                        <td><?= $key->jawaban_pilgan ?></td>
                        <td><a class="btn btn-danger btn-sm" href="<?= base_url('guru/ujian/hapusSoalUjian/') ?><?= $key->id_ujian_soal ?>/<?= $key->id_ujian ?>/<?= $key->id_soal ?>">Hapus</a></td>
                      </tr>
                      <?php $no++;
                      } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- END MAP DATA-->
        </div>
      </div>

    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

      });
    </script>

    <div class="modal fade" id="modalUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Ujian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php foreach ($ujian as $k) { ?>
              <form action="<?= base_url() ?>guru/ujian/updateUjian/<?= $k->id_ujian ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Judul <span class="text-error">*</span></label>
                  <input type="text" name="nama" class="form-control" value="<?= $k->judul ?>" required>
                </div>
                <div class="form-group">
                  <label>Waktu <span class="text-error">*menit</span></label>
                  <input type="number" name="waktu" class="form-control" value="<?= $k->waktu ?>" required>
                </div>
                <div class="form-group">
                  <label>Mata Pelajaran <span class="text-error"></span></label>
                  <select class="form-control" required name="mapelKelas">
                    <?php foreach ($mapel as $key) { ?>
                      <option value="<?= $key->id_mapel_kelas; ?>" <?php if ($key->id_mapel_kelas == $k->id_mapel_kelas) : ?> selected <?php endif ?>><?= $key->NamaKelas ?> - <?= $key->NamaMapel ?></option>
                    <?php } ?>
                  </select>
                </div>
                <?php
                $dt = new DateTime($k->tgl_selesai);

                $date = $dt->format('Y-m-d');
                $time = $dt->format('H:i:s');
                ?>
                <div class="form-group">
                  <label>Tanggal Mulai <span class="text-error">*</span></label>
                  <input type="date" name="tgl_mulai" class="form-control" value="<?= $date ?>" required>
                </div>
                <div class="form-group">
                  <label>Jam Mulai <span class="text-error">*</span></label>
                  <input type="time" name="jam_mulai" class="form-control" value="<?= $date ?>" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Berakhir <span class="text-error">*</span></label>
                  <input type="date" name="tgl" class="form-control" value="<?= $date ?>" required>
                </div>
                <div class="form-group">
                  <label>Jam Berakhir <span class="text-error">*</span></label>
                  <input type="time" name="jam" class="form-control" value="<?= $time ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modalPG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buat Ujian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url() ?>guru/ujian/simpanSoal/1/<?= $id_ujian ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Pertanyaan <span class="text-error">*</span></label>
                <textarea class="form-control" name="pertanyaan" required></textarea>
              </div>
              <div class="form-group">
                <label>Pilihan A <span class="text-error">*</span></label>
                <input type="text" name="pilgan_a" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Pilihan B <span class="text-error">*</span></label>
                <input type="text" name="pilgan_b" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Pilihan C <span class="text-error">*</span></label>
                <input type="text" name="pilgan_c" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Pilihan D <span class="text-error">*</span></label>
                <input type="text" name="pilgan_d" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Jawaban Pilihan <span class="text-error"></span></label>
                <select class="form-control" required name="jawaban_pilgan">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Buat</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalEssay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buat Soal Essay</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url() ?>guru/ujian/simpanSoal/2/<?= $id_ujian ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Pertanyaan <span class="text-error">*</span></label>
                <textarea class="form-control" name="pertanyaan" required></textarea>
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