
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/admin/overview')?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Obat</li>
    </ol>

    <h1>Tambah data Obat</h1>
    <?php 
    echo form_open_multipart('index.php/admin/obat/tambah/'); 
    echo validation_errors();
    ?>

    <div class="form-group">
    <label>Nama Obat<font color="red">*</font></label>
    <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Isikan Nama Obat" required>
    </div>
    <div class="form-group">
      <label>Supplier<font color="red">*</font></label><br>
      <select name="id_supplier" class="form-control">
        <?php foreach ($supplierList as $key) { ?>
          <option value="<?php echo $key->id_supplier ?>"><?php echo $key->nama_supplier ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Stok Obat<font color="red">*</font></label>
      <input type="number" class="form-control" id="stok_obat" name="stok_obat" required>
    </div>
    <div class="form-group">
      <label>Kategori Obat<font color="red">*</font></label>
      <select name="kategori_obat" class="form-control">
        <option value="tablet">Tablet</option>
        <option value="pil">Pil</option>
        <option value="kapsul">Kapsul</option>
        <option value="sirup">Sirup</option>
        <option value="salep">Salep</option>
        <option value="bubuk">Bubuk</option>
        <option value="lain-lain">Lain-lain</option>
      </select>
    </div>
    <div class="form-group">
      <label>Tanggal Expired<font color="red">*</font></label>
      <input type="date" class="form-control" id="tgl_expired" name="tgl_expired" required>
    </div>
    <div class="form-group">
      <label>Gambar Obat</label>
      <input type="file" class="form-control" id="gambar" name="gambar" required>
    </div>
    <div class="container-fluid">
      <label>Satuan</label>
      <div class="col-md-3">
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" class="form-control" id="jumlah_satuan" name="jumlah_satuan" value="1" readonly="readonly" required>
          </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Harga</label>
          <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required>
          </div>
      </div>
    </div>
    <div class="container-fluid">
      <label>Strip</label>
      <div class="col-md-3">
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" class="form-control" id="jumlah_strip" name="jumlah_strip" required>
          </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Harga</label>
          <input type="number" class="form-control" id="harga_strip" name="harga_strip" required>
          </div>
      </div>
    </div>
    <div class="container-fluid">
      <label>Pack</label>
      <div class="col-md-3">
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" class="form-control" id="jumlah_pack" name="jumlah_pack" required>
          </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Harga</label>
          <input type="number" class="form-control" id="harga_pack" name="harga_pack" required>
          </div>
      </div>
    </div>
    <div class="container-fluid">
      <label>Dos</label>
      <div class="col-md-3">
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" class="form-control" id="jumlah_dos" name="jumlah_dos" required>
          </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Harga</label>
          <input type="number" class="form-control" id="harga_dos" name="harga_dos" required>
          </div>
      </div>
    </div>
    
    <font color="red"><i>* Wajib diisi</i></font>
    <br>
    <br>

    <button type="submit" class="btn btn-primary">Submit</button>



    <?php echo form_close(); ?>

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
