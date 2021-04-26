
    <div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Upload Tugas</li>
  </ol>
  <?php if ($this->session->userdata('level') == '2'){ ?>
  <div align="left">
    <a href="<?php echo base_url('index.php/admin/tugas/tambah/'); ?>" class="btn btn-success">Tambah</a>
  </div>
  <br>
<?php } ?>

      <br>
      <table class="table table-hover" id="myTable">
        <thead>
          <th>Id Tugas</th>
          <th>Tugas</th>
          <th>Kelas</th>
          <th>Id Mapel</th>
          <th>Pertemuan</th>
          <th>File</th>
          <?php if ($this->session->userdata('level') == '2') { ?>
          <th>Action</th>
        <?php } ?>
        </thead>
        <tbody id="isi_tugas">
          <?php $no=1; foreach ($tugasList as $key) { ?>
            <tr>
              <td><?php echo $IdTugas; ?></td>
              <td><?php echo $key->NamaTugas; ?></td>
              <td><?php echo $key->NamaKelas; ?></td>
              <td><?php echo $key->id_mapel; ?></td>
              <td><?php echo $key->Pertemuan; ?></td>
              <td><?php echo $key->file; ?></td>
                <?php if ($this->session->userdata('level') == '2') { ?>
              <td>
                <a href="<?php echo base_url('index.php/admin/tugas/edit/');echo $key->KodeKelas; ?>" class="btn btn-warning">Edit</a> <a onclick="return confirm('Apakah yakin ingin hapus?')" href="<?php echo base_url('index.php/admin/tugas/hapus/');echo $key->KodeKelas; ?>" class="btn btn-danger">Hapus</a>
              </td>
              <?php } ?>
            </tr>
          <?php $no++; } ?>
        </tbody>
      </table>
  
    </div>
  </div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="<?php echo site_url('index.php/login/logout'); ?>">Logout</a>
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
</script>


</body>

</html>
