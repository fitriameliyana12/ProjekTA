

                  <h1>Daftar Absensi Siswa</h1><br>
                  <?php foreach ($kelas as $k) { ?>
    <li><b> Kelas    : <?= $kelas[0]->NamaKelas ?> </b></li>
    <li><b> Guru    : <?= $kelas[0]->NamaGuru ?> </b></li>
    <li><b> Mata Pelajaran    : <?= $kelas[0]->NamaMapel ?> </b></li><br>
                  <table border="5">
                    <thead>
                        <th>No</th>
                        <th>No Induk</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kehadiran</th>
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
                            <?php echo $key->no_induk ?>
                          </td>
                          <td>
                            <?php echo $key->NISN ?>
                          </td>
                          <td>
                            <?php echo $key->NamaSiswa ?>
                          </td>
                          <td>
                            <?php echo $key->keterangan ?>
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
    window.print();
  });
</script>


</body>

</html>