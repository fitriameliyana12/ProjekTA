<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/guru/overviewGuru') ?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Daftar Penilaian</li>
    </ol>
    <?php if ($this->session->userdata('level') == 'Guru') { ?>
    <!-- <a href="<?php echo base_url('index.php/guru/Tugas/excel/').$id_tugas; ?>" class="btn btn-success">EXPORT EXCEL</a>
    <a href="<?php echo base_url('index.php/guru/Tugas/pdf/').$id_tugas; ?>" class="btn btn-primary">EXPORT PDF</a>
    <a href="<?php echo base_url('index.php/guru/Tugas/print/').$id_tugas; ?>" class="btn btn-warning"> PRINT DATA</a><br>
      <br> -->
      <center><h3><strong>Daftar Penilaian Tugas Siswa</strong></h3></center>
    <?php } ?>
    <br>
    <table class="table table-hover" id="myTable">
      <thead>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>File</th>
        <th>Tanggal</th>
        <th>Nilai</th>
      </thead>
      <tbody id="isi_user">
        <?php $no = 1;
        foreach ($upload as $key) { ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $key->NamaSiswa ?></td>
            <td><a href="<?= base_url('guru/tugas/downloadTugas/' . $key->file) ?>"><?php echo $key->file; ?></td>
            <td><?php echo $key->tanggal; ?></td>
            <td>
              <div class="table-data-feature">
                <form method="post" action="<?= base_url('guru/tugas/updateNilai/' . $key->id_tugas_pengumpulan . 
                '/' . $id_tugas . '/' . $KodePertemuan . '/' . $KodeKelas . '/' . $KodeMapel) ?>">
                  <div class="row form-group">
                    <div class="col-4">
                      <input type="number" class="form-control" name="nilai" value="<?= $key->nilai ?>">
                    </div>
                    <div class="col-3">
                      <input type="submit" value="Submit" class="btn btn-secondary btn-sm">
                    </div>
                  </div>
                </form>
              </div>
            </td>
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