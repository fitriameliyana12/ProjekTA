-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2021 pada 10.19
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `jam_mulai` varchar(100) NOT NULL,
  `jam_selesai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `KodeKelas`, `KodeGuru`, `KodeMapel`, `tanggal`, `jam_mulai`, `jam_selesai`) VALUES
(6, 'X1001', '40', '1001', '2021-05-27', '06:09:00', '00:09:00'),
(7, 'X1001', '40', '1001', '2021-05-28', '17:00:00', '18:00:00'),
(8, 'X1001', '40', '1001', '2021-06-12', '10:10:00', '12:12:00'),
(9, 'X1001', '40', '1001', '2021-06-01', '17:00:00', '18:00:00'),
(10, 'X1001', '40', '1001', '2021-06-12', '08:30:00', '09:00:00'),
(11, 'X1001', '40', '1001', '2021-07-10', '13:00:00', '14:30:00'),
(12, 'X1001', '40', '1001', '2021-07-09', '15:00:00', '19:00:00'),
(13, 'X1001', '40', '1001', '0000-00-00', '00:00:00', '00:00:00'),
(14, 'X1001', '40', '1001', '2021-11-28', '14:00:00', '14:45:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id_absen_siswa` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`id_absen_siswa`, `id_absen`, `no_induk`, `keterangan`) VALUES
(1, 6, 4678, 'alpha'),
(2, 6, 5555, 'masuk'),
(3, 6, 47897, 'sakit'),
(4, 7, 4678, 'izin'),
(5, 7, 5555, 'masuk'),
(6, 7, 47897, 'masuk'),
(7, 8, 4678, 'masuk'),
(8, 8, 5555, 'masuk'),
(9, 8, 47897, 'masuk'),
(10, 9, 4678, 'masuk'),
(11, 9, 5555, 'masuk'),
(12, 9, 47897, 'masuk'),
(13, 10, 4678, 'masuk'),
(14, 10, 5555, 'izin'),
(15, 10, 47897, 'izin'),
(16, 11, 4678, ''),
(17, 11, 5555, 'masuk'),
(18, 11, 47897, 'sakit'),
(19, 12, 4678, 'alpha'),
(20, 12, 5555, 'izin'),
(21, 12, 47897, 'sakit'),
(22, 13, 4678, ''),
(23, 13, 5555, ''),
(24, 13, 47897, ''),
(25, 14, 4678, 'masuk'),
(26, 14, 5555, 'masuk'),
(27, 14, 47897, 'masuk'),
(28, 14, 649686, 'masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `NamaAdmin` varchar(150) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `JenisKelamin` enum('P','L') NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `NamaAdmin`, `NIP`, `JenisKelamin`, `id_user`, `foto`) VALUES
(1, 'Farissss', '1998023948', 'L', 1, 'sma.png'),
(2, 'Halo ya', '19890221989', 'P', 1008, '');

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
  `status_m` enum('AKTIF','TIDAK-AKTIF') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`KodeGuru`, `NamaGuru`, `NIP`, `JenisKelamin`, `id_user`, `status_m`, `foto`) VALUES
('21', 'Hayoo siapa', '1364842872', 'P', 1006, 'AKTIF', ''),
('40', 'Lia', '123456', 'P', 1002, 'AKTIF', 'grand.PNG'),
('41', 'Ami', '20220504 20000112', 'P', 1005, 'AKTIF', ''),
('47', 'Basukiii', '11325467890', 'L', 1, 'AKTIF', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_pelajaran`
--

CREATE TABLE `jam_pelajaran` (
  `id` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam_pelajaran`
--

INSERT INTO `jam_pelajaran` (`id`, `jam_mulai`, `jam_selesai`, `keterangan`) VALUES
(1, '07:00:00', '07:45:00', 'Jam Pelajaran Ke-1'),
(2, '07:45:00', '08:30:00', 'Jam Pelajaran Ke-2'),
(3, '08:30:00', '09:15:00', 'Jam Pelajaran Ke-3'),
(4, '09:15:00', '10:00:00', 'Jam Pelajaran Ke-4'),
(5, '10:00:00', '10:30:00', 'Istirahat Ke-1'),
(6, '10:30:00', '11:15:00', 'Jam Pelajaran Ke-5'),
(7, '11:15:00', '12:00:00', 'Jam Pelajaran Ke-6'),
(8, '12:00:00', '12:30:00', 'Istirahat Ke-2'),
(9, '12:30:00', '13:15:00', 'Jam Pelajaran Ke-7'),
(10, '13:15:00', '14:00:00', 'Jam Pelajaran Ke-8'),
(11, '14:00:00', '14:45:00', 'Jam Pelajaran Ke-9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `jawaban` text,
  `nilai_pilgan` int(11) NOT NULL,
  `nilai_essay` int(11) DEFAULT NULL,
  `nilai_total` varchar(30) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_ujian`, `no_induk`, `jawaban`, `nilai_pilgan`, `nilai_essay`, `nilai_total`, `jumlah_soal`, `tanggal`) VALUES
(1, 4, 47897, '', 0, NULL, 'jawaban masih dikoreksi', 0, '2021-06-30 21:27:00'),
(2, 2, 47897, '', 0, NULL, 'jawaban masih dikoreksi', 0, '2021-06-30 21:28:00'),
(3, 1, 47897, '139:', 0, NULL, '0', 1, '2021-06-30 21:28:00'),
(4, 6, 47897, '', 0, NULL, 'jawaban masih dikoreksi', 0, '2021-07-01 20:30:00'),
(5, 7, 47897, '144:,145:', 0, NULL, '0', 2, '2021-11-28 16:02:00');

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
('X10010', 'X - IPS 3'),
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
-- Struktur dari tabel `kontrak`
--

CREATE TABLE `kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `KodeMapel` varchar(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak_kelas`
--

CREATE TABLE `kontrak_kelas` (
  `id_kontrak_kelas` int(11) NOT NULL,
  `id_kontrak` int(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL
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
(1204, '1004', 'X1001', '41'),
(1205, '1003', 'X1001', '41'),
(1206, '1001', 'X1005', '47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `KodePertemuan` int(11) NOT NULL,
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

INSERT INTO `materi` (`id_materi`, `KodePertemuan`, `KodeMapel`, `KodeGuru`, `judul`, `isi`, `file`, `tgl_posting`) VALUES
(7, 0, '1001', '40', 'halo', 'dfxcv', 'Pertemuan_133.pptx', '2021-06-01 11:12:26'),
(8, 0, '1001', '40', 'Bismillah', 'ini materi hari ini', 'Jurnal_Daring.pdf', '2021-06-09 20:34:31'),
(9, 1, '1001', '40', 'Kartun Nusa Bangsa ya', 'rjygf', 'SURAT_TUGAS.docx', '2021-07-08 23:18:27'),
(10, 2, '1001', '40', 'Untuk Hari Senin', 'gkyi', 'CV_Analysis_MI-3E.pdf', '2021-07-09 11:04:40');

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
(7, 7, 'X1001'),
(8, 8, 'X1001'),
(9, 9, 'X1001'),
(10, 10, 'X1001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minggu_pertemuan`
--

CREATE TABLE `minggu_pertemuan` (
  `KodePertemuan` int(11) NOT NULL,
  `NamaPertemuan` varchar(100) NOT NULL,
  `tgl_pertemuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `minggu_pertemuan`
--

INSERT INTO `minggu_pertemuan` (`KodePertemuan`, `NamaPertemuan`, `tgl_pertemuan`) VALUES
(1, 'Pertemuan Minggu ke-1', '2021-07-12'),
(2, 'Pertemuan Minggu Ke-2', '2021-07-19'),
(4, 'Pertemuan Minggu Ke-3', '2021-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minggu_pertemuan_kelas`
--

CREATE TABLE `minggu_pertemuan_kelas` (
  `id` int(11) NOT NULL,
  `KodePertemuan` int(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL,
  `KodeMapel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `minggu_pertemuan_kelas`
--

INSERT INTO `minggu_pertemuan_kelas` (`id`, `KodePertemuan`, `KodeKelas`, `KodeGuru`, `KodeMapel`) VALUES
(1, 1, 'X1001', '40', '1001'),
(2, 2, 'X1001', '40', '1001');

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
(1003, 'Bismillah', 'bismillah bisa hari ini', '2021-11-28');

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
  `status_m` enum('AKTIF','TIDAK-AKTIF') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`no_induk`, `NISN`, `NamaSiswa`, `JenisKelamin`, `KodeKelas`, `id_user`, `status_m`, `foto`) VALUES
(4678, 32453901, 'Anita', 'P', 'X1001', 1006, 'TIDAK-AKTIF', ''),
(5555, 98765, 'nendhe', 'P', 'X1001', 1003, 'AKTIF', ''),
(47897, 2147483647, 'Ami', 'P', 'X1001', 1005, 'AKTIF', 'time1.PNG'),
(649686, 13342, 'PUTRI LUSIANI bb', 'P', 'X1001', 1008, 'AKTIF', '');

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
  `tipe` int(2) NOT NULL COMMENT '1=pilgan,2=essay',
  `KodeGuru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `pertanyaan`, `pilgan_a`, `pilgan_b`, `pilgan_c`, `pilgan_d`, `jawaban_pilgan`, `tipe`, `KodeGuru`) VALUES
(137, 'halo kamu siapa', 'A.aespa', 'B.snsd', 'C.fx', 'D.redvelvet', 'D', 1, '40'),
(138, 'kamu suka agensi apa', 'A.cube', 'B.sm', 'C.yg', 'D.jyp', 'B', 1, '40'),
(143, 'kamu itu', 'A.aespa', 'B.redvelvet', 'C.snsd', 'D.fx', 'B', 1, '40'),
(144, 'siapa aespa', 'A.karina', 'B.winter', 'C.ningning', 'D.gisel', 'A', 1, '40'),
(145, 'iya siapa sm', '', '', '', '', '', 2, '40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `KodeMapel` varchar(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL,
  `KodePertemuan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `KodeMapel`, `KodeGuru`, `KodePertemuan`, `judul`, `isi`, `file`, `tgl_posting`, `deadline`) VALUES
(4, '1001', '40', 0, 'Kartun Nusaaa dan bangsa', 'njo', 'TEMPLATE_SOAL_KOSONGAN.docm', '2021-05-31 17:36:11', '2021-06-03 22:36:00'),
(5, '1001', '40', 0, 'Kartun Nusaaa dan bangsa', 'njo', 'TEMPLATE_SOAL_KOSONGAN.docm', '2021-05-31 17:36:11', '2021-06-03 22:36:00'),
(6, '1001', '40', 0, 'Kartun Nusaaa dan bangsa', 'njo', 'TEMPLATE_SOAL_KOSONGAN.docm', '2021-05-31 17:36:11', '2021-06-03 22:36:00'),
(11, '1001', '40', 0, 'Kartun Nusaaa dan bangsa', 'njo', 'TEMPLATE_SOAL_KOSONGAN.docm', '2021-05-31 17:36:11', '2021-06-03 22:36:00'),
(18, '1001', '40', 0, 'bismillah', 'shf', 'elearningta_(7).sql', '2021-06-01 10:51:18', '2021-02-12 12:00:00'),
(20, '1001', '40', 0, 'halo dela', 'gsf', 'AKD_EDITING1.docm', '2021-06-01 11:10:53', '2021-12-12 12:12:00'),
(27, '1001', '40', 0, 'bismillah yaa', 'bismillah semoga bisa', 'Ketentuan-Poster-SIAP-New-Normal.docx', '2021-06-09 20:28:38', '2021-06-11 20:28:00'),
(28, '1001', '40', 0, 'halo', '', '972.PDF', '2021-06-11 22:45:42', '2021-06-12 22:46:00'),
(29, '1001', '40', 0, 'Bismillah', 'bismillah semoga bisa', 'Undangan_Tahlil_1_Lembar_Jadi_22.doc', '2021-07-06 19:08:53', '2021-07-07 19:09:00'),
(30, '1001', '40', 0, 'Bismillah', 'dawfsgd', 'Undangan_Tahlil_1_Lembar_Jadi_2.doc', '2021-07-06 19:27:25', '2021-07-08 19:27:00'),
(31, '1001', '40', 0, 'Bismillah', 'sd', 'Undangan_Tahlil_1_Lembar_Jadi_21.doc', '2021-07-06 19:32:02', '2021-07-08 19:40:00'),
(32, '1001', '40', 0, 'Bismillah', 'sd', 'Undangan_Tahlil_1_Lembar_Jadi_210.doc', '2021-07-06 21:00:14', '2021-07-08 19:40:00'),
(33, '1001', '40', 0, 'Bismillah', 'eqaq', '1831710024-dikonversi.docx', '2021-07-06 22:43:52', '2021-07-08 22:44:00'),
(35, '1001', '40', 1, 'Kartun Nusa Bangsa ya', 'jangan lupa dikerjakan ya', '1831710180-dikonversi.docx', '2021-07-07 18:43:51', '2021-07-09 18:44:00'),
(36, '1001', '40', 1, 'Bismillah', 'myjhg', 'admin.cs', '2021-07-08 19:45:43', '2021-07-10 19:45:00'),
(38, '1001', '40', 1, 'Bismillah', '7uyhjn', 'poster_word2.docx', '2021-07-08 21:43:52', '2021-07-17 21:43:00'),
(39, '1001', '40', 1, 'halo dela', 'lutgj', 'config.php', '2021-07-08 22:04:59', '2021-07-10 22:05:00'),
(40, '1001', '40', 1, 'Bismillah', 'hdgv', 'WhatsApp_Image_2021-06-18_at_15.06.44.jpeg', '2021-07-09 15:30:20', '2021-07-10 15:30:00'),
(41, '1001', '40', 1, 'Bismillah ya', 'vczv', 'Kuesioner.docx', '2021-07-09 17:14:55', '2021-07-24 17:15:00'),
(42, '1001', '40', 1, 'halo', 'wvda', 'Data_Absensi_Siswa.xlsx', '2021-07-10 11:19:30', '2021-07-17 11:19:00'),
(45, '1001', '40', 2, 'Bismillah', 'nrgdbv ', 'minggu_pertemuan_kelas.cs', '2021-07-11 21:42:18', '2021-07-24 21:42:00'),
(46, '1001', '40', 2, 'Untuk Hari Senin', 'grshnfdgky', 'jam_edit.php', '2021-07-15 17:18:39', '2021-07-17 17:18:00');

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
(16, 18, 'X1001'),
(25, 27, 'X1001'),
(26, 28, 'X1001'),
(27, 29, 'X1001'),
(28, 30, 'X1001'),
(29, 31, 'X1001'),
(30, 32, 'X1001'),
(31, 33, 'X1001'),
(33, 35, 'X1001'),
(34, 40, 'X1001'),
(35, 41, 'X1001'),
(36, 42, 'X1001'),
(39, 45, 'X1001'),
(40, 46, 'X1001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_pengumpulan`
--

CREATE TABLE `tugas_pengumpulan` (
  `id_tugas_pengumpulan` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `KodePertemuan` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `KodeKelas` varchar(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas_pengumpulan`
--

INSERT INTO `tugas_pengumpulan` (`id_tugas_pengumpulan`, `id_tugas`, `KodePertemuan`, `no_induk`, `KodeKelas`, `file`, `nilai`, `tanggal`) VALUES
(10, 36, 1, 47897, 'X1001', '9721.PDF', '0', '2021-07-08 14:11:27'),
(13, 38, 1, 47897, 'X1001', 'admin1.cs', '0', '2021-07-08 14:44:54'),
(14, 39, 1, 47897, 'X1001', 'Pertemuan_1331.pptx', '0', '2021-07-08 15:05:51'),
(15, 35, 1, 47897, 'X1001', 'Jurnal_Lockdown5.pdf', '0', '2021-07-09 04:05:51'),
(16, 40, 1, 47897, 'X1001', 'CERITA_BUAT_VIDEO_GESS.docx', '0', '2021-07-09 08:38:42'),
(17, 41, 1, 47897, 'X1001', 'CERITA_BUAT_VIDEO_GESS1.docx', '0', '2021-07-09 10:15:38'),
(18, 42, 1, 47897, 'X1001', 'CERITA_BUAT_VIDEO_GESS2.docx', '85', '2021-07-13 13:39:31'),
(21, 45, 2, 47897, 'X1001', 'Data_Absensi_Siswa4.xlsx', '100', '2021-07-11 16:33:40'),
(24, 42, 1, 5555, 'X1001', 'poster_word3.docx', '90', '2021-07-13 13:39:35'),
(25, 46, 2, 47897, 'X1001', 'header.php', '30', '2021-07-15 13:31:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tgl_buat` date NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `waktu` int(11) NOT NULL,
  `id_mapel_kelas` int(11) NOT NULL,
  `KodeGuru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_soal`
--

CREATE TABLE `ujian_soal` (
  `id_ujian_soal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `status`) VALUES
(1, 'Faris ', 'faris', 'c73f227db1b523334ea3aef35bf06af8', 'Admin', 'AKTIF'),
(1002, 'Lia', 'lia', 'eae61f0edaeab4bc53da35d3458acd67', 'Guru', 'AKTIF'),
(1003, 'Nendhe', 'nendhe', 'd7ab364495ca4b2324129e4bd987d79c', 'Siswa', 'AKTIF'),
(1005, 'Ami', 'ami', 'c7d1a4f2ea841d5c37dda9986f9a4b24', 'Siswa', 'AKTIF'),
(1006, 'AnitaSari', 'anita', '773d0431bf5f09da674c781c81a37525', 'Siswa', 'NON-AKTIF'),
(1008, 'Halo', 'halo', 'cfdb09744b075bfb140be051ccd91f0a', 'Admin', 'NON-AKTIF'),
(1009, 'Delamontin', 'delamontin', 'f2572c44def7ba05ce0d897685d3565f', 'Guru', 'AKTIF');

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
-- Indeks untuk tabel `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `no_induk` (`no_induk`);

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
-- Indeks untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD KEY `kontrak_ibfk_1` (`KodeMapel`),
  ADD KEY `KodeGuru` (`KodeGuru`);

--
-- Indeks untuk tabel `kontrak_kelas`
--
ALTER TABLE `kontrak_kelas`
  ADD PRIMARY KEY (`id_kontrak_kelas`),
  ADD KEY `id_kontrak` (`id_kontrak`),
  ADD KEY `kontrak_kelas_ibfk_2` (`KodeKelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`KodeMapel`);

--
-- Indeks untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD PRIMARY KEY (`id_mapel_kelas`),
  ADD KEY `Kodemapel` (`Kodemapel`),
  ADD KEY `KodeGuru` (`KodeGuru`),
  ADD KEY `KodeKelas` (`KodeKelas`);

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
-- Indeks untuk tabel `minggu_pertemuan`
--
ALTER TABLE `minggu_pertemuan`
  ADD PRIMARY KEY (`KodePertemuan`);

--
-- Indeks untuk tabel `minggu_pertemuan_kelas`
--
ALTER TABLE `minggu_pertemuan_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `KodePertemuan` (`KodePertemuan`);

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
  ADD KEY `KodeKelas` (`KodeKelas`),
  ADD KEY `no_induk` (`no_induk`),
  ADD KEY `tugas_pengumpulan_ibfk_1` (`id_tugas`);

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id_absen_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontrak_kelas`
--
ALTER TABLE `kontrak_kelas`
  MODIFY `id_kontrak_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  MODIFY `id_mapel_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1208;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `materi_kelas`
--
ALTER TABLE `materi_kelas`
  MODIFY `id_materi_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `minggu_pertemuan`
--
ALTER TABLE `minggu_pertemuan`
  MODIFY `KodePertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `minggu_pertemuan_kelas`
--
ALTER TABLE `minggu_pertemuan_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `IdPengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tugas_kelas`
--
ALTER TABLE `tugas_kelas`
  MODIFY `id_tugas_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tugas_pengumpulan`
--
ALTER TABLE `tugas_pengumpulan`
  MODIFY `id_tugas_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ujian_soal`
--
ALTER TABLE `ujian_soal`
  MODIFY `id_ujian_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

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
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`);

--
-- Ketidakleluasaan untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`),
  ADD CONSTRAINT `kelas_siswa_ibfk_3` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `kontrak_ibfk_1` FOREIGN KEY (`KodeMapel`) REFERENCES `mapel` (`KodeMapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrak_ibfk_2` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`);

--
-- Ketidakleluasaan untuk tabel `kontrak_kelas`
--
ALTER TABLE `kontrak_kelas`
  ADD CONSTRAINT `kontrak_kelas_ibfk_1` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrak_kelas_ibfk_2` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD CONSTRAINT `mapel_kelas_ibfk_1` FOREIGN KEY (`Kodemapel`) REFERENCES `mapel` (`KodeMapel`),
  ADD CONSTRAINT `mapel_kelas_ibfk_2` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`),
  ADD CONSTRAINT `mapel_kelas_ibfk_3` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`KodeMapel`) REFERENCES `mapel` (`KodeMapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materi_kelas`
--
ALTER TABLE `materi_kelas`
  ADD CONSTRAINT `materi_kelas_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`),
  ADD CONSTRAINT `materi_kelas_ibfk_2` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`);

--
-- Ketidakleluasaan untuk tabel `minggu_pertemuan_kelas`
--
ALTER TABLE `minggu_pertemuan_kelas`
  ADD CONSTRAINT `minggu_pertemuan_kelas_ibfk_1` FOREIGN KEY (`KodePertemuan`) REFERENCES `minggu_pertemuan` (`KodePertemuan`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`KodeGuru`) REFERENCES `guru` (`KodeGuru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`KodeMapel`) REFERENCES `mapel` (`KodeMapel`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tugas_pengumpulan_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_pengumpulan_ibfk_2` FOREIGN KEY (`KodeKelas`) REFERENCES `kelas` (`KodeKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_pengumpulan_ibfk_3` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;

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
