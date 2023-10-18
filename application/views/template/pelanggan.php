<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('<?php echo base_url(); ?>assets/assets/images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Pengajar SMAN 1 Patianrowo</h2>
            </div>
          </div>
        </div>
      </div> 

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">SMAN 1 Patianrowo</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">List Guru</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
          <table class="table table-striped table-bordered" id="list_mhs">
            <h2 align="center">Daftar Tenaga Didik SMAN 1 Patianrowo</h2><br>
    <thead>
      <tr>
          <th width="50px">No</th>
          <th>Detail</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($guruList as $key) { ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                     <td>
                      <ul>
                        <li>Kode Guru : <?php echo $key->KodeGuru; ?></li>
                        <li>Nama : <?php echo $key->NamaGuru; ?></li>
                        <li>NIP : <?php echo $key->NIP; ?></li>
                      </ul>
                     </td>
                  </tr>
                <?php $no++; } ?>        
      </tbody>
      </table>
      <br>
      <br><br>
    </div>
    </div> 
