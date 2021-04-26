
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
          <?php $totalSemua = 0 ; foreach ($penjualanPerbulan as $key) {  ?>
          <h3>Tanggal: <?php echo date('M d, Y', strtotime($key->tgl_penjualan)); ?></h3>
          <table class="table table-bordered">
            <tr>
              <th>Tanggal</th>
              <th>Pendapatan</th>

              <?php
              $tanggal = $key->tgl_penjualan;
              $penjualan_tanggal = $this->db->get_where('v_penjualan', array('tgl_penjualan' => $tanggal))->result();
              $totalPendapatan = 0;
              foreach ($penjualan_tanggal as $key) {
                $hargaDiskon = $key->total_bayar - ($key->total_bayar * ($key->diskon/100)); 
                $totalPendapatan += $hargaDiskon;

              }
              $totalSemua += $totalPendapatan;
            ?>
            </tr>
              <tr>
                <td><?php echo $key->tgl_penjualan ?></td>
                <td>Rp. <?php echo number_format($totalPendapatan, 0, '.', '.') ?></td>
              </tr>  
          </table>

          <table class="table table-bordered">
            <tr>
              <th>No Order</th>
              <th>Admin</th>
              <th>Obat</th>
              <th>Total Bayar</th>
              <th></th>
            </tr>
            <?php
              $tanggal = $key->tgl_penjualan;
              $penjualan_tanggal = $this->db->get_where('v_penjualan', array('tgl_penjualan' => $tanggal))->result();
            ?>

            <?php foreach ($penjualan_tanggal as $key) { ?>
            <?php
              $deskripsi_obat = "";
              $hargaDiskon = $key->total_bayar - ($key->total_bayar * ($key->diskon/100));
              $detail = $this->db->get_where('detail_penjualan', array('id_penjualan' => $key->no_order))->result();

              foreach($detail as $d) {
                $data_obat = $this->db->get_where('obat', array('kode_obat' => $d->kode_obat))->row();

                $deskripsi_obat .= "<p>" . $d->jml_beli . " " . $data_obat->nama_obat . "</p>";
              }
            ?>
              <tr>
                <td><?php echo $key->no_order ?></td>
                <td><?php echo $key->nama ?></td>
                <td><?php echo $deskripsi_obat ?></td>
                <td>Rp. <?php echo number_format($hargaDiskon,0,'.','.') ?></td>
              <td><a class="btn btn-primary" href="<?php echo base_url('index.php/admin/laporan/faktur/').$key->no_order ?>">Faktur</a>
              </td>
              </tr>  
              
            <?php } ?>
            
          </table>
          <?php } ?>
          <h3>Total Pendapatan Bulanan Rp. <?php echo number_format($totalSemua, 0, '.', '.'); ?></h3>

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

</body>

</html>
