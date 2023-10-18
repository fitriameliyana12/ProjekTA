<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/siswa/overviewSiswa') ?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Absensi</li>
    </ol>
    <?php if ($this->session->userdata('level') == 'Siswa') { ?>
      <!-- <div align="left">
        <a href="<?php echo base_url('index.php/guru/tugas/tambah/' . $KodeKelas . '/ ' . $KodeMapel); ?>" class="btn btn-success">Tambah</a>
      </div> -->
      <br>
      <center><h3><strong>Daftar Absensi Siswa</strong></h3></center>
    <?php } ?>
    <br>
    <table class="table table-hover" id="myTable">
      <thead>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th>Pengajar</th>
        <th>Keterangan</th>
      </thead>
      <tbody id="isi_user">
        <?php $no = 1;
        foreach ($absen as $key) { ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $key->tanggal ?></td>
            <td><?php echo $key->jam_mulai; ?></td>
            <td><?php echo $key->jam_selesai; ?></td>
            <td><?php echo $key->NamaGuru; ?></td>
            <td><?php
                if ($key->keterangan == 0) {
                  echo 'Alpha';
                } else if ($key->keterangan == 1) {
                  echo 'Masuk';
                } else if ($key->keterangan == 2) {
                  echo 'Sakit';
                } else {
                  echo 'Izin';
                }
                ?></td>
          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>

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