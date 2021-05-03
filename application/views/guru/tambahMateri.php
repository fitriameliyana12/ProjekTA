<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo site_url('index.php/guru/overviewGuru') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Upload Materi</li>
  </ol>
  <?php if ($this->session->userdata('level') == '2') { ?>
    <div align="left">
      <!-- <a href="<?php echo base_url('index.php/guru/tugas/tambah/'); ?>" class="btn btn-success">Tambah</a> -->
    </div>
    <br>
  <?php } ?>
  <br>
  <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                         <?php echo $this->session->flashdata('alert');?>

                        <form action="<?= base_url('materi/prosesUploadMateri')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Tambah Materi</strong>
                                </div>
                                <div class="card-body card-block">
                                    <?php if (isset($error)) {?>
                                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Error</span>
											<?= $error?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                                    <?php }?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">judul</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="judul" placeholder="Judul" class="form-control">
                                            <small class="form-text text-muted">Tulislah Judul yang sesuai dengan Tugas</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Kelas</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" readonly value="<?= $kelas[0]->NamaKelas?>" name="kelas" placeholder="Judul" class="form-control">
                                            <input type="hidden" id="text-input" value="<?= $kodeKelas?>" name="KodeKelas" placeholder="KodeKelas" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mata Pelajaran</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" readonly value="<?= $mapel[0]->NamaMapel?>" name="mapel" placeholder="Judul" class="form-control">
                                            <input type="hidden" id="text-input" value="<?= $kodeMapel?>" name="KodeMapel" placeholder="KodeMapel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tanggal</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="tgl_posting" placeholder="Tanggal Posting" readonly value="<?= date('Y-m-d H:i:s')?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Isi</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="isi" id="isi" rows="9" placeholder="Isi Pesan..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Upload Materi</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="text-input" name="materi" class="form-control">
                                        </div>
                                    </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>        
                        </form>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>