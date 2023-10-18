
    <div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Guru</li>
  </ol>
  <?php if ($this->session->userdata('level') == 'Admin'){ ?>
  <div align="left">
    <a href="<?php echo base_url('index.php/admin/guru/tambah/'); ?>" class="btn btn-success">Tambah</a>
  </div>
  <br>
  <center><h3><strong>Daftar Guru</strong></h3></center>
<?php } ?>

      <br>
      <table class="table table-hover" id="myTable">
        <thead>
          <th>No</th>
          <th>Kode Guru</th>
          <th>Nama Guru</th>
          <th>NIP</th>
          <th>Jenis Kelamin</th>
          <th>ID User</th>
          <th>Status Mengajar</th>
          <?php if ($this->session->userdata('level') == 'Admin') { ?>
          <th>Action</th>
        <?php } ?>
        </thead>
        <tbody id="isi_guru">
          <?php $no=1; foreach ($guruList as $key) { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->KodeGuru; ?></td>
              <td><?php echo $key->NamaGuru; ?></td>
              <td><?php echo $key->NIP; ?></td>
              <td><?php echo $key->JenisKelamin; ?></td>
              <td><?php echo $key->id_user; ?></td>
              <td><?php echo $key->status_m; ?></td>

                <!-- <?php if ($this->session->userdata('level') == 'Admin') { ?> -->
              <td>
                <a href="<?php echo base_url('index.php/admin/guru/edit/');echo $key->KodeGuru; ?>" class="btn btn-warning">Edit</a> 
              </td>
              <!-- <?php } ?> -->
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
$(document).ready( function () {
$('#myTable').DataTable();


} );

</script>


</body>

</html>
