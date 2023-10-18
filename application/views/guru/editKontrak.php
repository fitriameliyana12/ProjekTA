<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo site_url('index.php/guru/overviewGuru') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Rencana Pembelajaran</li>
        </ol>
        <?php if ($this->session->userdata('level') == 'Guru') { ?>
            <div align="left">
                <!-- <a href="<?php echo base_url('index.php/guru/kontrak/tambah/'); ?>" class="btn btn-success">Tambah</a> -->
            </div>
            <br>
            <center><h3><strong>Edit Rencana Pembelajaran </strong></h3></center>
        <?php } ?>
        <br>
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php echo $this->session->flashdata('alert'); ?>

                            <form action="<?= base_url('guru/kontrak/prosesUpdateKontrak/'.$kontrak[0]->id_kontrak) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit Rencana Pembelajaran</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <?php if (isset($error)) { ?>
                                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                <span class="badge badge-pill badge-danger">Error</span>
                                                <?= $error ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <input type="hidden" id="text-input" value="<?= $KodeKelas?>" name="KodeKelas" placeholder="KodeKelas" class="form-control">
                                        <input type="hidden" id="text-input" value="<?= $KodeMapel?>" name="KodeMapel" placeholder="KodeMapel" class="form-control">

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">judul</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="judul" placeholder="Judul" class="form-control" value="<?= $kontrak[0]->judul ?>">
                                                <small class="form-text text-muted">Tulislah Judul yang sesuai dengan rencana pembelajaran</small>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Tanggal</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="tgl_posting" placeholder="Tanggal Posting" readonly value="<?= $kontrak[0]->tgl_posting ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Isi</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="isi" id="isi" rows="9" placeholder="Isi Pesan..." class="form-control"><?= $kontrak[0]->isi ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">File rencana pembelajaran</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="text-input" name="kontrak" class="form-control">
                                                <p>NB: isi file tugas ketika ingin merubah file tugas</p>
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
        </script>


        </body>

        </html>