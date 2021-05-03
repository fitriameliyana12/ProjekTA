<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/guru/overviewGuru') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Guru</li>
  </ol>
  <?php if ($this->session->userdata('level') == '2') { ?>
    <!-- <div align="left">
  <a href="<?php echo base_url('index.php/admin/guru/tambah/'); ?>" class="btn btn-success">Tambah</a>
</div> -->
    <br>
  <?php } ?>
  <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                        <h3 class="title-5 m-b-35">Detail Materi</h3>
                        <?php echo $this->session->flashdata('alert');?>
                        <?php foreach ($materi as $key) {?> 
                        <!-- <form action="<?= base_url('admin/prosesTambahPengumuman')?>" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
                            <div class="card">
                                <div class="card-header">
                                    <strong>Isi Detail Tugas</strong>
                                </div>
                                <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label"><strong><?= $key->judul ?></strong></label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label"><u></u></label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="textarea-input" class=" form-control-label"><?= $key->tgl_posting?></label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-7">
                                               <p><?php echo $key->isi?></p> 
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-7">
                                               <p>Download File Materi<a href="<?= base_url()."materi/downloadMateri/".$key->file?>"><?php echo $key->file?></a></p> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>        
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>