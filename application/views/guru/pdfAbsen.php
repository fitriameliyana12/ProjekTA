<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>
  <h1>Daftar Absensi Siswa</h1>
  <?php foreach ($kelas as $k) { ?>
    <li><b> Kelas    : <?= $kelas[0]->NamaKelas ?> </b></li>
    <li><b> Guru    : <?= $kelas[0]->NamaGuru ?> </b></li>
    <li><b> Mata Pelajaran    : <?= $kelas[0]->NamaMapel ?> </b></li><br><br>
  <table border="5">
    <thead>
      <th>No</th>
      <th>No Induk</th>
      <th>NISN</th>
      <th>Nama Siswa</th>
      <th>Kehadiran</th>
      <th>Tanggal</th>
      <th>Jam Mulai</th>
      <th>Jam Akhir</th>
    </thead>
    <tbody>
    <tr></tr>
      <?php $no = 1;
      foreach ($absen as $key) { ?>
        <tr>
          <td><?= $no; ?></td>
          <td>
            <?= $key->no_induk ?>
          </td>
          <td>
            <?= $key->NISN ?>
          </td>
          <td>
            <?= $key->NamaSiswa ?>
          </td>
          <td>
            <?= $key->keterangan ?>
          </td>
          <td> <?= $key->tanggal ?> </td>
          <td><?= $key->jam_mulai ?> </td>
          <td><?= $key->jam_selesai ?> </td>
        </tr>
      <?php $no++;
      } ?>
      <?php $no++;
      }?>
    </tbody>
  </table>
</body>

</html>