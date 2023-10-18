<?php
//import koneksi ke database
$koneksi = mysqli_connect("localhost","root","","elearningta");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
<html>
<head>
  <title>Data Absensi Siswa</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Daftar Absensi Siswa</h2>
		
				<div class="data-tables datatable-dark">
					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
					<table class="table table-hover" id = "myTable">
                    <thead>
                        <th>No</th>
                        <th>No Induk</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kehadiran</th>
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
                            <?php
                              if($key->keterangan == 0){
                                echo 'Alpha';
                              }else if($key->keterangan == 1){
                                echo 'Masuk';
                              }else if($key->keterangan == 2){
                                echo 'Sakit';
                              }else{
                                echo 'Izin';
                              }
                            ?>
                          </td>
                        </tr>
                      <?php $no++;
                      } ?>
                    </tbody>
                  </table>
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>