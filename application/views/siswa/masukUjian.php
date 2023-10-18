<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo site_url('index.php/siswa/overviewSiswa') ?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Siswa</li>
    </ol>
    <?php if ($this->session->userdata('level') == 'Siswa') { ?>
      <br>
    <?php } ?>
    <script type="text/javascript">
      var d = new Date(<?= json_encode($waktu) ?>);
      var w = new Date();
      var dd = d - w;
      console.log(dd);
      setTimeout(function() {
        SubmitFunction()
      }, dd);

      function SubmitFunction() {
        alert("Waktu Anda Habis");
        //submitted.innerHTML="Time is up!";
        document.getElementById('ujianOnline').submit();
      }

      function Countdown() {
        setInterval(function() {

          var jam = document.getElementById("hours");
          var menit = document.getElementById("minutes");
          var detik = document.getElementById("seconds");

          var deadline = d; //new Date(d);
          var waktu = new Date();
          var distance = deadline - waktu;
          //console.log(distance);
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          // var minutes = parseInt(distance / 60, 10);
          // var seconds = parseInt(distance % 60, 10);

          // minutes = minutes < 10 ? "0" + minutes : minutes;
          // seconds = seconds < 10 ? "0" + seconds : seconds;
          jam.innerHTML = hours;
          menit.innerHTML = minutes;
          detik.innerHTML = seconds;

        }, 1000);
      }
      Countdown();
      //var div = document.getElementById('');
    </script>
    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <!-- MAP DATA-->
          <div class="map-data m-b-40">
            <h3 class="title-3 m-b-30">Ujian</h3>
            <!--                <p><?php //echo "<pre>"; print_r($ujian); echo "</pre>";
                                    ?></p>-->
            <div class="mx-auto d-block">
              <div class="container-fluid">
                <div class="card card-body">
                  <div style="border: 1px solid black;background-color: skyblue;color: black;font-weight: bold;"><span>Waktu Anda mengerjakan Ujian </span><span id="hours"></span>:<span id="minutes"></span>:<span id="seconds"></span></div>
                  <form id="ujianOnline" nama="ujianOnline" method="post" action="<?= base_url('siswa/ujian/koreksiUjian') ?>/<?= $id_ujian ?>">
                    <?php $no = 1;
                    foreach ($soal_ujian as $key) {
                      if ($key->tipe == 1) { ?>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label"><?= $no . '. ' . $key->pertanyaan ?></label>
                          <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                              <input type="radio" id="A" name="<?= $key->id_soal ?>" value="A">
                              <label class="form-check-label" for="A"><?= $key->pilgan_a ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" id="B" name="<?= $key->id_soal ?>" value="B">
                              <label class="form-check-label" for="B"><?= $key->pilgan_b ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" id="C" name="<?= $key->id_soal ?>" value="C">
                              <label class="form-check-label" for="C"><?= $key->pilgan_c ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" id="B" name="<?= $key->id_soal ?>" value="D">
                              <label class="form-check-label" for="B"><?= $key->pilgan_d ?></label>
                            </div>
                          </div>
                        </div>
                      <?php } elseif ($key->tipe == 2) { ?>
                        <input type="hidden" name="no<?= $no; ?>">
                        <div class="form-group row">
                          <label for="iiii" class="col-sm-2 col-form-label"><?= $no . '. ' . $key->pertanyaan ?></label>
                          <div class="col-sm-10">
                            <textarea id="iiii" name="<?= $key->id_soal ?>" class="form-control"></textarea>
                          </div>
                        </div>
                    <?php }
                      $no++;
                    } ?>
                    <button class="btn btn-primary btn-block">Kirim</button>
                  </form>
                </div>
              </div>
            </div>
            <br>

          </div>
          <!-- END MAP DATA-->
        </div>
      </div>

    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#A").click(function() {
          $("#B").attr("checked", false);
          $("#C").attr("checked", false);
          $("#D").attr("checked", false);
          $("#A").attr("checked", true);
        });
        $("#B").click(function() {
          $("#A").attr("checked", false);
          $("#C").attr("checked", false);
          $("#D").attr("checked", false);
          $("#B").attr("checked", true);
        });
        $("#C").click(function() {
          $("#A").attr("checked", false);
          $("#C").attr("checked", true);
          $("#D").attr("checked", false);
          $("#B").attr("checked", false);
        });
        $("#D").click(function() {
          $("#A").attr("checked", false);
          $("#C").attr("checked", false);
          $("#D").attr("checked", true);
          $("#B").attr("checked", false);
        });
      });
    </script>

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