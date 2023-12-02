-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2023 pada 09.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_rs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nomor_rekam_medis` varchar(255) NOT NULL,
  `nama_lengkap_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kartu_identitas` varchar(255) NOT NULL,
  `nomor_kartu_identitas` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `warga_negara` varchar(255) NOT NULL,
  `suku` varchar(255) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `status_perkawinan` enum('Menikah','Belum Menikah','Janda / Duda','') NOT NULL,
  `agama` varchar(255) NOT NULL,
  `bahasa` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `penanggung_jawab` enum('Pribadi','Keluarga','Perusahaan','Asuransi') NOT NULL,
  `nama_penanggung_jawab` varchar(255) NOT NULL,
  `hubungan` varchar(255) NOT NULL,
  `alamat_penanggung_jawab` varchar(255) NOT NULL,
  `nomor_hp_penanggung_jawab` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `keterangan_ttd` varchar(255) NOT NULL,
  `waktu_pendaftaran` datetime NOT NULL,
  `ketentuan_rs_ke_pasien` varchar(255) NOT NULL,
  `poliklinik` varchar(255) NOT NULL,
  `nomor_antri` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nomor_rekam_medis`, `nama_lengkap_pasien`, `tempat_lahir`, `tanggal_lahir`, `kartu_identitas`, `nomor_kartu_identitas`, `jenis_kelamin`, `pekerjaan`, `warga_negara`, `suku`, `alamat_lengkap`, `status_perkawinan`, `agama`, `bahasa`, `pendidikan`, `nomor_hp`, `jenis_pembayaran`, `penanggung_jawab`, `nama_penanggung_jawab`, `hubungan`, `alamat_penanggung_jawab`, `nomor_hp_penanggung_jawab`, `ttd`, `keterangan_ttd`, `waktu_pendaftaran`, `ketentuan_rs_ke_pasien`, `poliklinik`, `nomor_antri`, `user_id`) VALUES
(11, '00012345', 'Ade Kurniawan', 'Jambi', '2001-06-22', 'KTP', '150505220620010101', 'Laki-laki', 'Serabut', 'Warga Negara Indonesia', 'Suku Minang', 'Jambi, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestong, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'SMA', '083171027946', 'BPJS', 'Keluarga', 'Sidiq', 'Kerabat', 'Dago, RT 02, RW 05, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '0812747499768', '', '', '2023-11-19 11:40:11', 'Sudah', 'Poliklinik Mata', 0, 14),
(12, '000100023', 'Jaka Haryanto', 'Dieng', '1997-08-22', 'KTP', '150505220608090001', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Batak', 'Jalan Soekarno Nomor 45, RT 01, RW 00, Kelurahan Sebapo, Kecamatan Mestong, Kabupaten Muaro Jambi, Provinsi Jambi', 'Menikah', 'Islam', 'Bahasa Indonesia', 'SMA', '081267675463', 'Bayar', 'Keluarga', 'Ahmad', 'Orang Tua', 'Jalan Soekarno Nomor 49, RT 01, RW 00, Kelurahan Sebapo, Kecamatan Mestong, Kabupaten Mauro Jambi, Provinsi Jambi', '089645362211', '', '', '2023-11-19 14:48:32', 'Sudah', 'Poliklinik Mata', 0, 14),
(13, '000100024', 'Siska Indriani', 'Bandung', '2000-01-30', 'KTP', '150508765620010101', 'Perempuan', 'Pengusaha', 'Warga Negara Indonesia', 'Suku Sunda', 'Jalan Tubagus Ismail Nomor 41, RT 07, RW 07, Kelurahan Tubagus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', 'Belum Menikah', 'Khatolik', 'Bahasa Indonesia', 'S1', '08323245124893', 'BPJS', 'Keluarga', 'Dinda Maharani', 'Teman Kampus', 'Jalan Tubagus Ismail Nomor 44, RT 07, RW 07, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '0812555599768', '', '', '2023-11-19 14:57:03', 'Belum', 'Poliklinik Saraf', 0, 14),
(14, '000100025', 'Adi Suhendra', 'Simpang Rimbo', '2000-07-01', 'KTP', '150778820620010101', 'Laki-laki', 'Teknisi', 'Warga Negara Indonesia', 'Suku Jawa', 'Jalan Otto Iskandar Nomor 78, RT 09, RW 01, Kelurahan Rimbo, Kecamatan Rimba, Kabupaten Jambi, Provinsi Jambi', 'Menikah', 'Khatolik', 'Bahasa Indonesia', 'D1/D2/D3', '087777027946', 'BPJS', 'Keluarga', 'Faisal', 'Kerabat', 'Jalan Ilham Dzaki Nomor 23, RT 02, RW 05, Kelurahan Rimbo, Kecamatan Rimba, Kabupaten Jambi, Provinsi Jambi', '089645362222', '', '', '2023-11-19 15:14:34', 'Belum', 'Poliklinik Kulit', 0, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `nama_role` enum('Petugas Pendaftaran','Perawat','Dokter','Kasir','Rekam Medis','Farmasi','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Petugas Pendaftaran'),
(3, 'Perawat'),
(4, 'Dokter'),
(5, 'Kasir'),
(6, 'Rekam Medis'),
(7, 'Farmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_hp` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status_aktif` int(1) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `username`, `password`, `nama_lengkap`, `alamat`, `nomor_hp`, `jenis_kelamin`, `status_aktif`, `foto`, `tanggal_dibuat`) VALUES
(1, 1, 'admin', '$2y$10$MTYeVUjU7MJ3GphMmBXaT.7GtvHp4s/FBbtLBzkorKwqO51lYYaBq', 'Admin', 'Jalan Jambi - Palembang KM 27', '083171027946', '', 1, 'default.jpg', '0000-00-00 00:00:00'),
(15, 2, 'pp_ilham', '$2y$10$MF4E4ETA/R/HdshPV9FFz.MeCw07.Qk94FaR9bw.Z2MusaKcRYf2W', 'Ilham', 'Jalan Dago Nomor 67', '083171027947', 'Laki-laki', 1, 'default.jpg', '2023-11-19 15:03:50'),
(16, 3, 'p_sri', '$2y$10$niwPZ9lk9uF8CCdxDepwBOj7fG0t3nLVDt5a8FT/1WUNwtx/lf28G', 'Sri Astuti', 'Jalan Esmeralda Nomor 55', '083144427946', 'Perempuan', 1, 'default.jpg', '2023-11-19 15:04:28'),
(17, 2, 'pp_rustam', '$2y$10$.poI01G09MgLtouDk5XstuXyB3Sxf9RDD.IVD1yTfasuU2.jDLRru', 'Rustam Siregar', 'Jalan Samosir Nomor 45', '081271027946', 'Laki-laki', 1, 'default.jpg', '2023-11-19 15:05:13'),
(18, 4, 'd_zainal', '$2y$10$V.jwNVYntjGXUg.SZ7B9c./kMFZRzaR0zmpcuVl6Z1r.BbyOWUvni', 'Zainal Abidin', 'Jalan Senja Nomor 99', '081288889765', 'Laki-laki', 1, 'default.jpg', '2023-11-19 15:11:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
