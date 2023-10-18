<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('guru/overviewGuru') ?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Tugas</li>
    </ol>
    <?php if ($this->session->userdata('level') == 'Guru') { ?>
      <!-- <div align="left">
        <a href="<?php echo base_url('guru/tugas/tambah/' . $KodeKelas . '/' . $KodeMapel); ?>" class="btn btn-success">Tambah Tugas <?= $mapel[0]->NamaMapel ?> - <?= $kelas->NamaKelas ?></a>
      </div> -->
      <div align="left">
        <a href="<?php echo base_url('guru/tugas/tambah/' . $KodePertemuan . '/' . $KodeKelas . '/' . $KodeMapel); ?>" class="btn btn-success">Tambah Tugas <?= $mapel[0]->NamaMapel ?> - <?= $kelas->NamaKelas ?></a>
      </div>
      <br>
      <center><h3><strong>Daftar Tugas Siswa</strong></h3></center>
    <?php } ?>
    <br>
    <table class="table table-hover" id="myTable">
      <thead>
        <th>No</th>
        <th>Judul</th>
        <!-- <th>Kelas</th>
        <th>Mapel</th> -->
        <th>Tanggal Upload</th>
        <th>Deadline</th>
        <th>Action</th>
      </thead>
      <tbody id="isi_user">
        <?php $no = 1;
        foreach ($tugas as $key) { ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $key->judul ?></td>
            <!-- <td><?php echo $key->KodeKelas; ?></td>
            <td><?php echo $key->KodeMapel; ?></td> -->
            <td><?php echo $key->tgl_posting; ?></td>
            <td><?php echo $key->deadline; ?></td>
            <td>
              <div class="table-data-feature">
                <a href="<?= base_url('guru/tugas/detailTugas/') . $key->id_tugas . '/' . $KodePertemuan ?>" class="item" data-toggle="tooltip" data-placement="top" title="Open">
                  <i class="btn btn-info">Detail</i>
                </a>
                <a href="<?= base_url('guru/tugas/editTugas/') . $key->id_tugas . '/' . $KodePertemuan ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                  <i class="btn btn-warning">Edit</i>
                </a>
                <a href="<?= base_url('guru/tugas/hapusTugas/') . $key->id_tugas . "/" . $KodePertemuan . "/" . $KodeKelas . "/" . $KodeMapel ?>" class="item" data-toggle="tooltip" data-placement="top" title="Hapus">
                  <i class="btn btn-danger">Hapus</i>
                </a>
                <a href="<?= base_url('guru/tugas/penilaian/') . $key->id_tugas . "/" . $KodePertemuan . "/" . $KodeKelas . "/" . $KodeMapel ?>" class="item" data-toggle="tooltip" data-placement="top" title="Penilaian Tugas">
                  <i class="btn btn-info">Penilaian</i>
                </a>
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


    $('#stok_kurang').keyup(function() {
      getBerdasarStok();
    });

    function getBerdasarStok() {
      var stok = $('#stok_kurang').val();
      if (!stok) {
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "<?php echo base_url(); ?>" + "index.php/admin/obat/getObatSemua/",
          success: function(data) {
            var obj = data;
            $('#isi_obat').empty();
            $.each(obj, function(index) {
              $('#isi_obat').append('<tr><td>' + (index + 1) + '</td><td>' + obj[index].nama_obat + '</td><td>' + obj[index].nama_supplier + '</td><td>' + parseInt(obj[index].stok_obat) + '</td><td>' + obj[index].kategori_obat + '</td><td>Satuan - per-satuan 1 -  Rp. ' + parseInt(obj[index].harga_satuan) + ' <br>Strip - per-strip ' + obj[index].jumlah_strip + ' - Rp. ' + parseInt(+obj[index].harga_strip) + ' <br>Pack - per-pack ' + obj[index].jumlah_pack + ' -  Rp. ' + parseInt(obj[index].harga_pack) + ' <br>Dos - per-dos ' + obj[index].jumlah_dus + ' - Rp. ' + parseInt(obj[index].harga_dus) + '</td><?php if ($this->session->userdata("level") == "1" || $this->session->userdata("level") == "2") { ?><td><a href="<?php echo base_url("index.php/admin/obat/edit/"); ?>' + obj[index].kode_obat + '" class="btn btn-warning">Edit</a> <a onclick="return confirm("Apakah yakin ingin hapus?")" href="<?php echo base_url("index.php/admin/obat/hapus/"); ?>' + obj[index].kode_obat + '" class="btn btn-danger">Hapus</a></td><?php } ?></tr>');

            })
          }
        });
      } else {
        $.ajax({
          type: "POST",
          dataType: "json",
          data: {
            stok: stok
          },
          url: "<?php echo base_url(); ?>" + "index.php/admin/obat/getBerdasarStok/",
          success: function(data) {
            var obj = data;
            $('#isi_obat').empty();
            $.each(obj, function(index) {
              $('#isi_obat').append('<tr><td>' + (index + 1) + '</td><td>' + obj[index].nama_obat + '</td><td>' + obj[index].nama_supplier + '</td><td>' + parseInt(obj[index].stok_obat) + '</td><td>' + obj[index].kategori_obat + '</td><td>Satuan - per-satuan 1 -  Rp. ' + parseInt(obj[index].harga_satuan) + ' <br>Strip - per-strip ' + obj[index].jumlah_strip + ' - Rp. ' + parseInt(+obj[index].harga_strip) + ' <br>Pack - per-pack ' + obj[index].jumlah_pack + ' -  Rp. ' + parseInt(obj[index].harga_pack) + ' <br>Dos - per-dos ' + obj[index].jumlah_dus + ' - Rp. ' + parseInt(obj[index].harga_dus) + '</td><?php if ($this->session->userdata("level") == "1" || $this->session->userdata("level") == "2") { ?><td><a href="<?php echo base_url("index.php/admin/obat/edit/"); ?>' + obj[index].kode_obat + '" class="btn btn-warning">Edit</a> <a onclick="return confirm("Apakah yakin ingin hapus?")" href="<?php echo base_url("index.php/admin/obat/hapus/"); ?>' + obj[index].kode_obat + '" class="btn btn-danger">Hapus</a></td><?php } ?></tr>');

            })
          }
        });

      }
    }

  });
</script>


</body>

</html>