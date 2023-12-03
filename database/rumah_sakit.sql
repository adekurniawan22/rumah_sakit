-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2023 pada 16.17
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
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_biaya`
--

CREATE TABLE `t_biaya` (
  `id_biaya` int(11) NOT NULL,
  `nama_biaya` varchar(255) NOT NULL,
  `harga_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_biaya`
--

INSERT INTO `t_biaya` (`id_biaya`, `nama_biaya`, `harga_biaya`) VALUES
(2, 'Pemeriksaan', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_obat`
--

CREATE TABLE `t_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_obat` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_obat`
--

INSERT INTO `t_obat` (`id_obat`, `nama_obat`, `harga_obat`) VALUES
(1, 'Paracetamol', 10000),
(12, 'Bodrex', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pasien`
--

CREATE TABLE `t_pasien` (
  `id_pasien` bigint(20) NOT NULL,
  `nomor_rekam_medis` varchar(20) NOT NULL,
  `nama_lengkap_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kartu_identitas` varchar(255) NOT NULL,
  `nomor_kartu_identitas` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `warga_negara` varchar(255) NOT NULL,
  `suku` varchar(255) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `status_perkawinan` enum('Menikah','Belum Menikah','Janda / Duda') NOT NULL,
  `agama` varchar(255) NOT NULL,
  `bahasa` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_pasien`
--

INSERT INTO `t_pasien` (`id_pasien`, `nomor_rekam_medis`, `nama_lengkap_pasien`, `tempat_lahir`, `tanggal_lahir`, `kartu_identitas`, `nomor_kartu_identitas`, `jenis_kelamin`, `pekerjaan`, `warga_negara`, `suku`, `alamat_lengkap`, `status_perkawinan`, `agama`, `bahasa`, `pendidikan`, `nomor_hp`) VALUES
(11, '11223344', 'Ade Kurniawan 345', 'Tempino', '2001-06-22', 'KTP', '150505220620010101', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Jawa', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171027936'),
(12, '32423432', 'Jamal Sebapo', 'Tempino', '2001-06-22', 'KTP', '150505220620010101', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Jawa', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171027936');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `nomor_pegawai` varchar(255) NOT NULL,
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
-- Dumping data untuk tabel `t_pegawai`
--

INSERT INTO `t_pegawai` (`id_pegawai`, `id_role`, `id_poliklinik`, `nomor_pegawai`, `username`, `password`, `nama_lengkap`, `alamat`, `nomor_hp`, `jenis_kelamin`, `status_aktif`, `foto`, `tanggal_dibuat`) VALUES
(1, 1, 0, '0001925433', 'admin', '$2y$10$4748PJfzCTIYXX1JFHqvkeG2yUlKgwFdXDSFupVHx.EZjNlna9mTq', 'Admin', 'Jalan Jambi - Palembang KM 27', '083171027946', 'Laki-laki', 1, '580b57fcd9996e24bc43c4e72.png', '2023-11-21 14:13:06'),
(33, 2, 0, '0000000010', 'pp_ade', '$2y$10$s2E6.3M7ZJh.8bdyM7abRuPZVaRVUy/PMOMs5uTKypSrE8gBoMKvG', 'Ade Kurniawan', 'Jalan Jambi Palembang KM 27', '083171027936', 'Laki-laki', 1, 'default.jpg', '2023-12-02 17:11:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pendaftaran`
--

CREATE TABLE `t_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `penanggung_jawab` enum('Pribadi','Keluarga','Perusahaan','Asuransi') NOT NULL,
  `nama_penanggung_jawab` varchar(255) NOT NULL,
  `hubungan` varchar(255) NOT NULL,
  `alamat_penanggung_jawab` varchar(255) NOT NULL,
  `nomor_hp_penanggung_jawab` varchar(255) NOT NULL,
  `waktu_pendaftaran` datetime NOT NULL,
  `ketentuan_rs_ke_pasien` varchar(255) NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `status_pembayaran` enum('0','1') NOT NULL,
  `status_pemeriksaan1` enum('0','1') NOT NULL,
  `status_pemeriksaan2` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_pendaftaran`
--

INSERT INTO `t_pendaftaran` (`id_pendaftaran`, `id_pasien`, `jenis_pembayaran`, `penanggung_jawab`, `nama_penanggung_jawab`, `hubungan`, `alamat_penanggung_jawab`, `nomor_hp_penanggung_jawab`, `waktu_pendaftaran`, `ketentuan_rs_ke_pasien`, `id_poliklinik`, `id_pegawai`, `status_pembayaran`, `status_pemeriksaan1`, `status_pemeriksaan2`) VALUES
(91, 11, 'BPJS', 'Keluarga', 'Sidiq Sanjaya Bakti', 'Teman Kampus', 'Jalan Tubagus Ismal Gang Kubangsari IV, RT 07, RW 02, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '081274749976', '2023-12-03 20:01:13', 'Sudah', 1, 33, '0', '0', '0'),
(92, 11, 'Bayar', 'Keluarga', 'Sidiq Sanjaya Bakti', 'Teman Kampus', 'Jalan Tubagus Ismal Gang Kubangsari IV, RT 07, RW 02, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '081274749976', '2023-12-03 20:01:48', 'Belum', 3, 33, '0', '0', '0'),
(93, 12, 'Bayar', 'Keluarga', 'Sidiq Sanjaya Bakti Sebapo', 'Teman Kampus', 'Jalan Tubagus Ismal Gang Kubangsari IV, RT 07, RW 02, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '081274749976', '2023-12-03 20:16:46', 'Sudah', 1, 33, '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_poliklinik`
--

CREATE TABLE `t_poliklinik` (
  `id_poliklinik` int(11) NOT NULL,
  `nama_poliklinik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_poliklinik`
--

INSERT INTO `t_poliklinik` (`id_poliklinik`, `nama_poliklinik`) VALUES
(1, 'Poliklinik Mata'),
(2, 'Poliklinik Kulit'),
(3, 'Poliklinik Saraf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` enum('Petugas Pendaftaran','Perawat','Dokter','Kasir','Rekam Medis','Farmasi','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_role`
--

INSERT INTO `t_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Petugas Pendaftaran'),
(3, 'Perawat'),
(4, 'Dokter'),
(5, 'Kasir'),
(6, 'Rekam Medis'),
(7, 'Farmasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_biaya`
--
ALTER TABLE `t_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `t_pasien`
--
ALTER TABLE `t_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `role_id` (`id_role`);

--
-- Indeks untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_poliklinik` (`id_poliklinik`);

--
-- Indeks untuk tabel `t_poliklinik`
--
ALTER TABLE `t_poliklinik`
  ADD PRIMARY KEY (`id_poliklinik`);

--
-- Indeks untuk tabel `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_biaya`
--
ALTER TABLE `t_biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_pasien`
--
ALTER TABLE `t_pasien`
  MODIFY `id_pasien` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `t_poliklinik`
--
ALTER TABLE `t_poliklinik`
  MODIFY `id_poliklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD CONSTRAINT `t_pegawai_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `t_role` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  ADD CONSTRAINT `t_pendaftaran_ibfk_1` FOREIGN KEY (`id_poliklinik`) REFERENCES `t_poliklinik` (`id_poliklinik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
