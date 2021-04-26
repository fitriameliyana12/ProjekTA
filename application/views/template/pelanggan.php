<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('<?php echo base_url(); ?>assets/assets/images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Daftar Obat</h2>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">List Obat</span>
      </div>
    </div>


    <div class="site-section">
        <div class="container">
          <table class="table table-striped table-bordered" id="list_mhs">
            <h2 align="center">Daftar Obat di Apotek Arjasa</h2><br>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Obat</th>
        <th>Stok</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Gambar</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($obatList as $key) { ?>
                  <tr>
                    <td>
                      <?php echo $no; ?>
                    </td>
                    <td>
                      <?php echo $key->nama_obat; ?>
                    </td>
                    <td>
                      <?php echo $key->stok_obat; ?>
                    </td>
                    <td>
                      <?php echo $key->kategori_obat; ?>
                    </td>
                    <td>
                      Satuan -  Rp. <?php echo $key->harga_satuan; ?> <br>
                      Strip -  Rp. <?php echo $key->harga_strip; ?> <br>
                      Pack -  Rp. <?php echo $key->harga_pack; ?> <br>
                      Dos - Rp. <?php echo $key->harga_dus; ?>
                    </td>
                    <td>
                      <?php if ($key->gambar_obat != "") { ?>
                        <img src="<?php echo base_url('assets/uploads/'); echo $key->gambar_obat; ?>" width="150px;">
                      <?php } else {
                        echo "gambar tidak tersedia";
                        }  ?>
                    </td>
                  </tr>
                <?php $no++; } ?>        
      </tbody>
      </table>
      <br>
      <br><br>
    </div>
    </div> 
