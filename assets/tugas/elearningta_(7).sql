-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2021 pada 10.35
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearningta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL,
  `KodeMapel` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `KodeKelas`, `KodeGuru`, `KodeMapel`, `tanggal`, `jam_mulai`, `jam_selesai`) VALUES
(6, 'X1001', '40', '1001', '2021-05-27', '06:09:00', '00:09:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id_absen_siswa` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `keterangan` tinyint(1) NOT NULL COMMENT '0=alpha, 1=masuk, 2=sakit, 3=izin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`id_absen_siswa`, `id_absen`, `no_induk`, `keterangan`) VALUES
(1, 6, 4678, 1),
(2, 6, 5555, 1),
(3, 6, 47897, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `KodeGuru` varchar(10) NOT NULL,
  `NamaGuru` varchar(150) NOT NULL,
  `NIP` varchar(100) NOT NULL,
  `JenisKelamin` enum('P','L') NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`KodeGuru`, `NamaGuru`, `NIP`, `JenisKelamin`, `id_user`, `foto`) VALUES
('40', 'Lia', '123456', 'P', 1002, 'WhatsApp_Image_2021-03-16_at_02_03_25.jpeg'),
('41', 'Ami', '20220504 20000112', 'P', 1005, ''),
('47', 'Basukiii', '20220504 20000112', 'L', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `KodeMapel` varchar(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` time NOT NULL,
  `KodeGuru` varchar(10) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `KodeMapel`, `hari`, `jam`, `KodeGuru`, `KodeKelas`) VALUES
(20001, '1001', 'Selasa', '07:00:00', '40', 'X1007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `jawaban` text DEFAULT NULL,
  `nilai_pilgan` int(11) NOT NULL,
  `nilai_essay` int(11) DEFAULT NULL,
  `nilai_total` double NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_ujian`, `no_induk`, `jawaban`, `nilai_pilgan`, `nilai_essay`, `nilai_total`, `jumlah_soal`, `tanggal`) VALUES
(2, 4, 47897, '6:A,7:iya', 3, 0, 16.666666666667, 2, '2021-05-28 10:08:00'),
(3, 6, 47897, '8:C,9:bukan', 3, 100, 1716.6666666667, 2, '2021-05-28 10:44:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(5) NOT NULL,
  `jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(101, 'MIPA'),
(102, 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `KodeKelas` varchar(11) NOT NULL,
  `NamaKelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`KodeKelas`, `NamaKelas`) VALUES
('X1001', 'X - MIPA 1'),
('X1002', 'X - MIPA 2'),
('X1003', 'X - MIPA 3'),
('X1004', 'X - MIPA 4'),
('X1005', 'X - MIPA 5'),
('X1006', 'X - IPS 1'),
('X1007', 'X- IPS 2'),
('X1008', 'X - IPS 3'),
('X1009', 'XI - IPS 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL,
  `no_induk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `KodeMapel` varchar(11) NOT NULL,
  `NamaMapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`KodeMapel`, `NamaMapel`) VALUES
('1001', 'PAG Islam'),
('1002', 'Sosiologi'),
('1003', 'Fisika (LM)'),
('1004', 'Biologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_ajar`
--

CREATE TABLE `mapel_ajar` (
  `id_mapel_ajar` int(11) NOT NULL,
  `hari_id` tinyint(4) NOT NULL COMMENT '1=senin, 2=selasa, 3=rabu, 4=kamis, 5=jumat',
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `KodeGuru` varchar(10) NOT NULL,
  `id_mapel_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_kelas`
--

CREATE TABLE `mapel_kelas` (
  `id_mapel_kelas` int(11) NOT NULL,
  `Kodemapel` varchar(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel_kelas`
--

INSERT INTO `mapel_kelas` (`id_mapel_kelas`, `Kodemapel`, `KodeKelas`, `KodeGuru`) VALUES
(1201, '1001', 'X1001', '40'),
(1202, '1003', 'X1004', '41'),
(1203, '1002', 'X1007', '40'),
(1204, '1004', 'X1001', '41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id_mapelsiswa` int(11) NOT NULL,
  `no_induk` int(30) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `KodeMapel` varchar(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `file` text NOT NULL,
  `tgl_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `KodeMapel`, `KodeGuru`, `judul`, `isi`, `file`, `tgl_posting`) VALUES
(2, '1001', '40', 'ini materi nya ya', 'semangat', 'Pertemuan_13.pptx', '2021-05-26 20:26:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_kelas`
--

CREATE TABLE `materi_kelas` (
  `id_materi_kelas` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi_kelas`
--

INSERT INTO `materi_kelas` (`id_materi_kelas`, `id_materi`, `KodeKelas`) VALUES
(2, 2, 'X1001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_tugas`
--

CREATE TABLE `nilai_tugas` (
  `id_nilai_tugas` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `IdPengumuman` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`IdPengumuman`, `judul`, `isi`, `tanggal`) VALUES
(1001, 'Untuk Hari Senin', 'Harap Memakai Sabuk dan Dasi karena akan diadakan upacara bendera.\r\nTerimakasih', '2021-05-19'),
(1002, 'Kartun Nusa', 'kartunnya bagus banget. bertemakan islami . hayuk semua nonton. jangan lupa karena bagus untuk anak-anak di bawah umur daripada nonton sinetron yang tidak jelas. terimakasih', '2021-05-19'),
(1003, 'Kartun Nusa', 'kartunnya bagus banget. bertemakan islami . hayuk semua nonton. jangan lupa karena bagus untuk anak-anak di bawah umur daripada nonton sinetron yang tidak jelas. terimakasih', '2021-05-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `no_induk` int(11) NOT NULL,
  `NISN` int(30) NOT NULL,
  `NamaSiswa` varchar(200) NOT NULL,
  `JenisKelamin` enum('P','L') NOT NULL,
  `KodeKelas` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=pending, 1=aktif, 2=blok, 3=alumni, 4=hapus',
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`no_induk`, `NISN`, `NamaSiswa`, `JenisKelamin`, `KodeKelas`, `id_user`, `status`, `foto`) VALUES
(4678, 32453901, 'Anita', 'P', 'X1001', 1006, 0, ''),
(5555, 98765, 'nendhe', 'P', 'X1001', 1003, 0, ''),
(47897, 2147483647, 'Ami', 'P', 'X1001', 1005, 0, 'Picture_045.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilgan_a` text NOT NULL,
  `pilgan_b` text NOT NULL,
  `pilgan_c` text NOT NULL,
  `pilgan_d` text NOT NULL,
  `jawaban_pilgan` varchar(50) NOT NULL,
  `tipe` int(11) NOT NULL COMMENT '1=pilgan, 2=essay',
  `KodeGuru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `pertanyaan`, `pilgan_a`, `pilgan_b`, `pilgan_c`, `pilgan_d`, `jawaban_pilgan`, `tipe`, `KodeGuru`) VALUES
(5, 'ini soal essay\r\n', '', '', '', '', '', 2, '40'),
(6, 'ini pertanyaan', 'A.iya', 'B.salah', 'C.salah', 'D.salah', 'A', 1, '40'),
(7, 'ini essay lho ya', '', '', '', '', '', 2, '40'),
(8, 'ini pertanyaan', 'A.iya', 'B.iya', 'C.salah', 'D.iya', 'C', 1, '40'),
(9, 'apa ini pilihan ganda ?', '', '', '', '', '', 2, '40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Pending'),
(2, 'Aktif'),
(3, 'Blok'),
(4, 'Alumni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `KodeMapel` varchar(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `KodeMapel`, `KodeGuru`, `judul`, `isi`, `file`, `tgl_posting`, `deadline`) VALUES
(4, '1001', '40', 'ini judul1', 'semangat', 'Week_14_-_Database_Maintenance.pdf', '2021-05-25 10:55:23', '2021-05-21 15:59:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_kelas`
--

CREATE TABLE `tugas_kelas` (
  `id_tugas_kelas` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas_kelas`
--

INSERT INTO `tugas_kelas` (`id_tugas_kelas`, `id_tugas`, `KodeKelas`) VALUES
(2, 4, 'X1001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_pengumpulan`
--

CREATE TABLE `tugas_pengumpulan` (
  `id_tugas_pengumpulan` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas_pengumpulan`
--

INSERT INTO `tugas_pengumpulan` (`id_tugas_pengumpulan`, `id_tugas`, `no_induk`, `KodeKelas`, `file`, `nilai`, `tanggal`) VALUES
(2, 4, 47897, 'X1001', 'bab_15_modelling_state5.pdf', '80', '2021-05-26 19:10:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tgl_buat` date NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `waktu` int(11) NOT NULL,
  `id_mapel_kelas` int(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `judul`, `tgl_buat`, `tgl_selesai`, `waktu`, `id_mapel_kelas`, `KodeGuru`) VALUES
(3, 'Ini ujian', '2021-05-28', '2021-05-31 12:33:00', 30, 1203, '40'),
(4, 'ujian agama ya', '2021-05-28', '2021-05-30 03:01:00', 60, 1201, '40'),
(6, 'ini percobaan lagi', '2021-05-28', '2021-05-30 04:39:00', 40, 1201, '40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_soal`
--

CREATE TABLE `ujian_soal` (
  `id_ujian_soal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian_soal`
--

INSERT INTO `ujian_soal` (`id_ujian_soal`, `id_ujian`, `id_soal`) VALUES
(4, 3, 5),
(5, 4, 6),
(6, 4, 7),
(7, 6, 8),
(8, 6, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Faris ', 'faris', 'c73f227db1b523334ea3aef35bf06af8', 1),
(1002, 'Lia', 'lia', 'eae61f0edaeab4bc53da35d3458acd67', 2),
(1003, 'Nendhe', 'nendhe', 'd7ab364495ca4b2324129e4bd987d79c', 3),
(1005, 'Ami', 'ami', 'c7d1a4f2ea841d5c37dda9986f9a4b24', 3),
(1006, 'AnitaSari', 'anita', '773d0431bf5f09da674c781c81a37525', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `KodeKelas` (`KodeKelas`),
  ADD KEY `KodeGuru` (`KodeGuru`),
  ADD KEY `KodeMapel` (`KodeMapel`);

--
-- Indeks untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id_absen_siswa`),
  ADD KEY `id_absen` (`id_absen`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`KodeGuru`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `KodeGuru` (`KodeGuru`),
  ADD KEY `KodeMapel` (`KodeMapel`),
  ADD KEY `KodeKelas` (`KodeKelas`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_ujian` (`id_ujian`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`KodeKelas`);

--
-- Indeks untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`),
  ADD KEY `no_induk` (`no_induk`),
  ADD KEY `KodeKelas` (`KodeKelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`KodeMapel`);

--
-- Indeks untuk tabel `mapel_ajar`
--
ALTER TABLE `mapel_ajar`
  ADD PRIMARY KEY (`id_mapel_ajar`),
  ADD KEY `KodeGuru` (`KodeGuru`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`);

--
-- Indeks untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD PRIMARY KEY (`id_mapel_kelas`),
  ADD KEY `Kodemapel` (`Kodemapel`),
  ADD KEY `KodeGuru` (`KodeGuru`),
  ADD KEY `KodeKelas` (`KodeKelas`);

--
-- Indeks untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id_mapelsiswa`),
  ADD KEY `no_induk` (`no_induk`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `KodeMapel` (`KodeMapel`),
  ADD KEY `KodeGuru` (`KodeGuru`);

--
-- Indeks untuk tabel `materi_kelas`
--
ALTER TABLE `materi_kelas`
  ADD PRIMARY KEY (`id_materi_kelas`),
  ADD KEY `id_materi` (`id_materi`),
  ADD KEY `KodeKelas` (`KodeKelas`);

--
-- Indeks untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  ADD PRIMARY KEY (`id_nilai_tugas`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`IdPengumuman`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`no_induk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `KodeKelas` (`KodeKelas`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `KodeGuru` (`KodeGuru`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `KodeGuru` (`KodeGuru`),
  ADD KEY `KodeMapel` (`KodeMapel`);

--
-- Indeks untuk tabel `tugas_kelas`
--
ALTER TABLE `tugas_kelas`
  ADD PRIMARY KEY (`id_tugas_kelas`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `KodeKelas` (`KodeKelas`);

--
-- Indeks untuk tabel `tugas_pengumpulan`
--
ALTER TABLE `tugas_pengumpulan`
  ADD PRIMARY KEY (`id_tugas_pengumpulan`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `KodeKelas` (`KodeKelas`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `id_mapel_kelas` (`id_mapel_kelas`),
  ADD KEY `KodeGuru` (`KodeGuru`);

--
-- Indeks untuk tabel `ujian_soal`
--
ALTER TABLE `ujian_soal`
  ADD PRIMARY KEY (`id_ujian_soal`),
  ADD KEY `id_ujian` (`id_ujian`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id_absen_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel_ajar`
--
ALTER TABLE `mapel_ajar`
  MODIFY `id_mapel_ajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  MODIFY `id_mapel_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1205;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `materi_kelas`
--
ALTER TABLE `materi_kelas`
  MODIFY `id_materi_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  MODIFY `id_nilai_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `IdPengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tugas_kelas`
--
ALTER TABLE `tugas_kelas`
  MODIFY `id_tugas_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tugas_pengumpulan`
--
ALTER TABLE `tugas_pengumpulan`
  MODIFY `id_tugas_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ujian_soal`
--
ALTER TABLE `ujian_soal`
  MODIFY `id_ujian_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`),
  ADD CONSTRAINT `absen_ibfk_3` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`),
  ADD CONSTRAINT `absen_ibfk_4` FOREIGN KEY (`KodeMapel`) REFERENCES `mapel` (`KodeMapel`);

--
-- Ketidakleluasaan untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD CONSTRAINT `absen_siswa_ibfk_1` FOREIGN KEY (`id_absen`) REFERENCES `absen` (`id_absen`),
  ADD CONSTRAINT `absen_siswa_ibfk_2` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`);

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`KodeMapel`) REFERENCES `mapel` (`KodeMapel`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`),
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`);

--
-- Ketidakleluasaan untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`),
  ADD CONSTRAINT `kelas_siswa_ibfk_3` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `mapel_ajar`
--
ALTER TABLE `mapel_ajar`
  ADD CONSTRAINT `mapel_ajar_ibfk_1` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`),
  ADD CONSTRAINT `mapel_ajar_ibfk_2` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`);

--
-- Ketidakleluasaan untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD CONSTRAINT `mapel_kelas_ibfk_1` FOREIGN KEY (`Kodemapel`) REFERENCES `mapel` (`KodeMapel`),
  ADD CONSTRAINT `mapel_kelas_ibfk_2` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`),
  ADD CONSTRAINT `mapel_kelas_ibfk_3` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD CONSTRAINT `mapel_siswa_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`),
  ADD CONSTRAINT `mapel_siswa_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`KodeMapel`) REFERENCES `mapel` (`KodeMapel`),
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`);

--
-- Ketidakleluasaan untuk tabel `materi_kelas`
--
ALTER TABLE `materi_kelas`
  ADD CONSTRAINT `materi_kelas_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`),
  ADD CONSTRAINT `materi_kelas_ibfk_2` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  ADD CONSTRAINT `nilai_tugas_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`),
  ADD CONSTRAINT `nilai_tugas_ibfk_2` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`);

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`),
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`KodeMapel`) REFERENCES `mapel` (`KodeMapel`);

--
-- Ketidakleluasaan untuk tabel `tugas_kelas`
--
ALTER TABLE `tugas_kelas`
  ADD CONSTRAINT `tugas_kelas_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`),
  ADD CONSTRAINT `tugas_kelas_ibfk_2` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `tugas_pengumpulan`
--
ALTER TABLE `tugas_pengumpulan`
  ADD CONSTRAINT `tugas_pengumpulan_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`),
  ADD CONSTRAINT `tugas_pengumpulan_ibfk_2` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`),
  ADD CONSTRAINT `tugas_pengumpulan_ibfk_3` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`);

--
-- Ketidakleluasaan untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_mapel_kelas`) REFERENCES `mapel_kelas` (`id_mapel_kelas`),
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`);

--
-- Ketidakleluasaan untuk tabel `ujian_soal`
--
ALTER TABLE `ujian_soal`
  ADD CONSTRAINT `ujian_soal_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`),
  ADD CONSTRAINT `ujian_soal_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
