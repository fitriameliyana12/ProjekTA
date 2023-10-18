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
      <center><h3><strong>Detail Materi</strong></h3></center><br>
    <?php } ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8">
              <?php echo $this->session->flashdata('alert'); ?>
              <?php foreach ($materi as $key) { ?>
                <!-- <form action="<?= base_url('admin/prosesTambahPengumuman') ?>" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
                <div class="card">
                  <div class="card-header">
                    <strong>Isi Detail Materi</strong>
                  </div>
                  <div class="card-body card-block">
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <p>Judul : </p>
                      </div>
                      <div class="col col-md-9">
                        <label for="text-input" class=" form-control-label"><strong><?= $key->judul ?></strong></label>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <p>Dibuat pada : </p>
                      </div>
                      <div class="col-12 col-md-9">
                        <label for="textarea-input" class=" form-control-label"><?= $key->tgl_posting ?></label>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <p>Isi : </p>
                      </div>
                      <div class="col col-md-9">
                        <p><?php echo $key->isi ?></p>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-7">
                        <p>Download File Materi | <a href="<?= base_url() . "guru/materi/downloadMateri/" . $key->file ?>"><?php echo $key->file ?></a></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </form>
          <?php } ?>
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