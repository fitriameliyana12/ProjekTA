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
      <center><h3><strong>Buat Absen Kelas</strong></h3></center><br>
    <?php } ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8">
              <?php echo $this->session->flashdata('alert'); ?>

              <form action="<?= base_url('guru/absen/aturAbsen') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="card">
                  <div class="card-body card-block">
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Kelas</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="kelas" placeholder="Kelas" readonly value="<?= $kelas->NamaKelas ?>" class="form-control">
                        <input type="hidden" id="text-input" name="KodeKelas" placeholder="kelas" readonly value="<?= $KodeKelas ?>" class="form-control">
                        <input type="hidden" id="text-input" name="KodeMapel" placeholder="Mapel" readonly value="<?= $KodeMapel ?>" class="form-control">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Mapel</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="mapel" placeholder="mapel" readonly value="<?= $mapel[0]->NamaMapel ?>" class="form-control">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Tanggal</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="date" name="tanggal" class="form-control">
                      </div>
                    </div>
                    <!-- <div class="row form-group">
                    <div class="col col-md-3">
                      <label>Jam Mulai<font color="red">*</font></label>
                      <select name="jam_mulai" class="form-control" >
                      <?php foreach ($Jam_pelajaran as $key) { ?>
                        <option value ="<?php echo $key->id ?>"><?php echo $key->jam_mulai ?></option>
                      <?php } ?>
                      </select>
                    </div><br>
                    <div class="row form-group">
                      <label for="select" class="form-control-label">Jam Selesai<font color="red">*</font></label>
                    <select name="jam_selesai" class="form-control" >
                      </div>
                      <div class="col-12 col-md-9">
                      <?php foreach ($Jam_pelajaran as $key) { ?>
                      <option value ="<?php echo $key->id ?>"><?php echo $key->jam_selesai ?></option>
                    <?php } ?>
                      </select>
                      </div>
                  </div> -->
                    <!-- <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Jam Mulai</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="time" id="text-input" name="jam_mulai" placeholder="Jam Mulai" class="form-control">
                      </div>
                    </div> -->
                    
                    <div class=" row form-group">
                    <div class="col col-md-3">
                      <label>Jam Mulai<font color="red">*</font></label>
                      
                      </div>
                      <div class="col-12 col-md-9">
                      <select name="jam_mulai" class="form-control">
                        <option value="07:00:00">07:00:00</option>
                        <option value="07:45:00">07:45:00</option>
                        <option value="08:30:00">08:30:00</option>
                        <option value="09:15:00">09:15:00</option>
                        <option value="10:00:00">10:00:00</option>
                        <option value="10:30:00">10:30:00</option>
                        <option value="11:15:00">11:15:00</option>
                        <option value="12:00:00">12:00:00</option>
                        <option value="12:30:00">12:30:00</option>
                        <option value="13:15:00">13:15:00</option>
                        <option value="14:00:00">14:00:00</option>
                        </select>
                      </div>
                      </div>
                    <!-- <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Jam Selesai</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="time" id="text-input" name="jam_selesai" placeholder="Jam Selesai" class="form-control">
                      </div>
                    </div> -->
                    <div class="row form-group">
                    <div class="col col-md-3">
                    <label>Jam Selesai<font color="red">*</font></label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="jam_selesai" class="form-control">
                        <option value="07:45:00">07:45:00</option>
                        <option value="08:30:00">08:30:00</option>
                        <option value="09:15:00">09:15:00</option>
                        <option value="10:00:00">10:00:00</option>
                        <option value="10:30:00">10:30:00</option>
                        <option value="11:15:00">08:30:00</option>
                        <option value="12:00:00">12:00:00</option>
                        <option value="12:30:00">12:30:00</option>
                        <option value="13:15:00">13:15:00</option>
                        <option value="14:00:00">14:00:00</option>
                        <option value="14:45:00">14:45:00</option>
                        </select>
                        </div>
                      </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Mulai Absen
                      </button>
                      <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                      </button>
                    </div>
                  </div>
                </div>
              </form>
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