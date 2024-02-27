-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2024 pada 19.17
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
-- Struktur dari tabel `t_antrian`
--

CREATE TABLE `t_antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `nomor_antri` int(11) NOT NULL,
  `nomor_antri_sekarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_antrian`
--

INSERT INTO `t_antrian` (`id_antrian`, `id_pendaftaran`, `id_poliklinik`, `nomor_antri`, `nomor_antri_sekarang`) VALUES
(145, 2, 1, 1, 0);

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
(1, 'Pemeriksaan', 50000),
(2, 'Pemeriksaan Lanjut', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_obat`
--

CREATE TABLE `t_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_obat` bigint(20) NOT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_obat`
--

INSERT INTO `t_obat` (`id_obat`, `nama_obat`, `harga_obat`, `stok_obat`) VALUES
(18, 'parasetamol', 10000, 88);

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
(1, '00010010110289', 'Ade Kurniawan', 'Tempino', '2001-06-22', 'KTP', '150505220620010101', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Minang', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171027936'),
(2, '00010010110999', 'Sultan Thariq', 'Tempino', '2001-06-05', 'KTP', '150505220620010999', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Jawa', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171027456'),
(3, '00010010110888', 'Tri Mulyani', 'Tempino', '2001-04-02', 'KTP', '150505220620010888', 'Perempuan', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Jawa', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171021209'),
(59, '12312441', 'ahmad', 'tidore', '1997-03-05', 'KTP', '1232132', 'Laki-laki', 'wirausaha', 'Warga Negara Indonesia', 'Suku Ambon', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01, RT 01, RW 02, Kelurahan 003, Kecamatan tihu, Kabupaten Bandung, Provinsi maluku', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '081244475835'),
(60, '23123123', 'fani', 'maluku', '1997-02-06', 'KTP', '312134441231', 'Perempuan', 'kasir', 'Warga Negara Indonesia', 'Suku Ambon', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01, RT 31, RW 21, Kelurahan 02, Kecamatan tihu, Kabupaten poca, Provinsi maluku', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '081244475835'),
(61, '231231612', 'jeje', 'maluku', '1997-02-06', 'KTP', '3121344413124', 'Perempuan', 'kasir', 'Warga Negara Indonesia', 'Suku Ambon', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01, RT 31, RW 21, Kelurahan 02, Kecamatan tihu, Kabupaten poca, Provinsi maluku', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '081244475835'),
(62, '231266717', 'gery', 'maluku', '1997-02-06', 'KTP', '12599912', 'Perempuan', 'kasir', 'Warga Negara Indonesia', 'Suku Ambon', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01, RT 31, RW 21, Kelurahan 02, Kecamatan tihu, Kabupaten poca, Provinsi maluku', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '081244475835'),
(63, '2312123134', 'gilan', 'maluku', '1997-02-06', 'KTP', '312134441999', 'Perempuan', 'kasir', 'Warga Negara Indonesia', 'Suku Ambon', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01, RT 31, RW 21, Kelurahan 02, Kecamatan tihu, Kabupaten poca, Provinsi maluku', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '081244475835');

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
(1, 1, 0, '000192543355', 'admin', '$2y$10$4748PJfzCTIYXX1JFHqvkeG2yUlKgwFdXDSFupVHx.EZjNlna9mTq', 'Admin', 'Jalan Jambi - Palembang KM 27', '083171027946', 'Laki-laki', 1, '580b57fcd9996e24bc43c4e72.png', '2023-11-21 14:13:06'),
(45, 2, 0, '123348890216', 'pp_vali', '$2y$10$2p4AG2vKVBHIfzozvZJZS.igGiJtDIfSao85bWHtxro7nQfi8xoA.', 'Krisna', 'Jalan Jambi Palembang KM 27', '083171027936', 'Laki-laki', 1, 'default.jpg', '2024-01-02 13:22:40'),
(46, 3, 1, '000000001209', 'p_vali', '$2y$10$q5SesFE0xkbpobP8X1qxKOIaoMHZUD6mEBKcCd2PO/2WgnkGPhMbS', 'Muhammad Indra Zulfian Tuanaya', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01', '081244475835', 'Laki-laki', 1, 'default.jpg', '2024-01-02 13:45:31'),
(47, 4, 1, '000000001298', 'd_vali', '$2y$10$c/zhRAljF./vWqUs/tp0re23WhXUMLLfKY1SHxmK6Sn2Mm0398jJC', 'Agung', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01', '081244475835', 'Laki-laki', 1, 'default.jpg', '2024-01-02 13:46:39'),
(48, 5, 0, '000000001121', 'k_vali', '$2y$10$KSTic3.lFF3OKTCUggG5P.lu812ct/Y0nKN6UCyrhvsrK6SNoBHNy', 'Wahyu', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01', '081244475835', 'Perempuan', 1, 'default.jpg', '2024-01-02 13:47:10'),
(49, 7, 0, '000000001111', 'f_vali', '$2y$10$z1UDcluzmfRFFO5oNzK1k.IxMSJPyu31vdri6ZijGAA0zA0DspcXC', 'Meli', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01', '081244475835', 'Laki-laki', 1, 'default.jpg', '2024-01-02 13:47:44'),
(50, 6, 0, '000000001011', 'r_vali', '$2y$10$uctv9o/PBuuof77izIgxruvXNvY3hKttKXwGaeufN/pK8NoZA/wvG', 'Indra', 'jl. tubagus ismail\r\nBLOCK II, GANG ANGKLUNG RT/RW: 05/01', '081244475835', 'Laki-laki', 1, 'default.jpg', '2024-01-02 13:48:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_biaya` int(11) NOT NULL,
  `nomor_antri` int(11) NOT NULL,
  `waktu_pembayaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_pembayaran`
--

INSERT INTO `t_pembayaran` (`id_pembayaran`, `id_pendaftaran`, `id_pegawai`, `id_biaya`, `nomor_antri`, `waktu_pembayaran`) VALUES
(12, 2, 45, 1, 1, '2024-02-28 00:50:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pemeriksaan1`
--

CREATE TABLE `t_pemeriksaan1` (
  `id_pemeriksaan1` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `keadaan_umum` varchar(255) NOT NULL,
  `kesadaran` varchar(255) NOT NULL,
  `gcs` varchar(11) NOT NULL,
  `e` varchar(255) NOT NULL,
  `v` varchar(11) NOT NULL,
  `m` varchar(11) NOT NULL,
  `keluhan_umum` varchar(255) NOT NULL,
  `keluhan_lain` varchar(255) NOT NULL,
  `tekanan_darah` varchar(11) NOT NULL,
  `nadi` varchar(11) NOT NULL,
  `temperatur` varchar(11) NOT NULL,
  `pernapasan` varchar(11) NOT NULL,
  `nyeri` varchar(255) NOT NULL,
  `pencetus` varchar(11) NOT NULL,
  `kwalitas` varchar(11) NOT NULL,
  `lokasi` varchar(11) NOT NULL,
  `skala` varchar(11) NOT NULL,
  `durasi` varchar(11) NOT NULL,
  `pengetahuan_tentang_penyakit` varchar(255) NOT NULL,
  `perawatan_yg_dilakukan` varchar(255) NOT NULL,
  `perasaan` varchar(255) NOT NULL,
  `status_aktivitas` varchar(255) NOT NULL,
  `muskuloskeleta` varchar(255) NOT NULL,
  `kekuatan_otot` varchar(255) NOT NULL,
  `alergi` varchar(255) NOT NULL,
  `tidur_siang` varchar(11) NOT NULL,
  `tidur_malam` varchar(11) NOT NULL,
  `gangguan_tidur` varchar(255) NOT NULL,
  `penerimaan_kondisi` varchar(255) NOT NULL,
  `tinggal_bersama` varchar(255) NOT NULL,
  `kebiasaan` varchar(255) NOT NULL,
  `skor_hm` varchar(11) NOT NULL,
  `skor_mfs` varchar(11) NOT NULL,
  `skor_omss` varchar(11) NOT NULL,
  `status_laporan_hasil_SR` varchar(255) NOT NULL,
  `berat_badan` varchar(11) NOT NULL,
  `tinggi_badan` varchar(11) NOT NULL,
  `imt` varchar(11) NOT NULL,
  `skor_mst` varchar(11) NOT NULL,
  `imunisasi_dasar` varchar(255) NOT NULL,
  `imunisasi_lain` varchar(255) NOT NULL,
  `eliminasi` varchar(11) NOT NULL,
  `pola_makan` varchar(11) NOT NULL,
  `pola_minum` varchar(11) NOT NULL,
  `bak` varchar(11) NOT NULL,
  `bab` varchar(11) NOT NULL,
  `umur` varchar(255) NOT NULL,
  `RTKB_sosial` varchar(255) NOT NULL,
  `RTKB_motorik_halus` varchar(255) NOT NULL,
  `RTKB_motorik_kasar` varchar(255) NOT NULL,
  `RTKB_bahasa` varchar(255) NOT NULL,
  `analisa_masalah_keperawatan` varchar(255) NOT NULL,
  `planning` varchar(255) NOT NULL,
  `implementasi_dan_evaluasi` varchar(255) NOT NULL,
  `edukasi` varchar(255) NOT NULL,
  `keadaan_pasien_pulang` varchar(255) NOT NULL,
  `berkas_yang_diberikan` varchar(255) NOT NULL,
  `info_edukasi_yang_diberikan` varchar(255) NOT NULL,
  `status_permintaan_pulang` varchar(255) NOT NULL,
  `status_melarikan_diri` varchar(255) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `waktu_pemeriksaan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pemeriksaan2`
--

CREATE TABLE `t_pemeriksaan2` (
  `id_pemeriksaan2` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `keluhan_umum` varchar(255) NOT NULL,
  `riwayat_penyakit_sekarang` varchar(255) NOT NULL,
  `riwayat_alergi` varchar(255) NOT NULL,
  `riwayat_penyakit_dahulu` varchar(255) NOT NULL,
  `riwayat_pengobatan` varchar(255) NOT NULL,
  `riwayat_penyakit_keluarga` varchar(255) NOT NULL,
  `pemeriksaan` varchar(255) NOT NULL,
  `diagnosa_utama` varchar(255) NOT NULL,
  `diagnosa_tambahan` varchar(255) NOT NULL,
  `planning` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `edukasi` varchar(255) NOT NULL,
  `resep_obat` varchar(255) NOT NULL,
  `rencana_kontrol` varchar(255) NOT NULL,
  `pelayanan_home_care` varchar(255) NOT NULL,
  `kontrol_ke_poliklinik` varchar(255) NOT NULL,
  `perlu_penggunaan_alat` varchar(255) NOT NULL,
  `telah_memesan_alat` varchar(255) NOT NULL,
  `dirujuk_ke_komunitas` varchar(255) NOT NULL,
  `dirujuk_ke_terapis` varchar(255) NOT NULL,
  `dirujuk_ke_ahli_gizi` varchar(255) NOT NULL,
  `lain_lain` varchar(255) NOT NULL,
  `perlu_pemeriksaan_lanjut` varchar(255) NOT NULL,
  `waktu_pemeriksaan2` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status_pemeriksaan2` enum('0','1') NOT NULL,
  `perlu_pemeriksaan_lanjut` enum('0','1') NOT NULL,
  `status_pemeriksaan_lanjut` enum('0','1') NOT NULL,
  `status_pengambilan_obat` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_pendaftaran`
--

INSERT INTO `t_pendaftaran` (`id_pendaftaran`, `id_pasien`, `jenis_pembayaran`, `penanggung_jawab`, `nama_penanggung_jawab`, `hubungan`, `alamat_penanggung_jawab`, `nomor_hp_penanggung_jawab`, `waktu_pendaftaran`, `ketentuan_rs_ke_pasien`, `id_poliklinik`, `id_pegawai`, `status_pembayaran`, `status_pemeriksaan1`, `status_pemeriksaan2`, `perlu_pemeriksaan_lanjut`, `status_pemeriksaan_lanjut`, `status_pengambilan_obat`) VALUES
(2, 1, 'BPJS', 'Pribadi', 'Ade Kurniawan', 'Suami', 'Jalan Jambi Palembang KM 27, RT 22, RW 22, Kelurahan dsfdsf, Kecamatan sdfsdf, Kabupaten Jambi, Provinsi sdfsdf', '083171027936', '2024-02-08 00:50:38', 'Sudah', 1, 45, '1', '0', '0', '0', '0', '0'),
(4, 1, 'Bayar', 'Perusahaan', 'Ade Kurniawan', 'Suami', 'Jalan Jambi Palembang KM 27, RT 2, RW 2, Kelurahan fdsfs, Kecamatan fsdf, Kabupaten Jambi, Provinsi sdfs', '083171027936', '2024-02-28 00:51:11', 'Sudah', 7, 45, '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengambilan_obat`
--

CREATE TABLE `t_pengambilan_obat` (
  `id_pengambilan_obat` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `obat_yang_diambil` varchar(255) NOT NULL,
  `keterangan_pengambilan_obat` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `waktu_pengambilan_obat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Poliklinik bedah mulut'),
(3, 'Poliklinik Saraf'),
(7, 'Poliklinik THT (Telinga, Hidung, Tenggorokan)'),
(8, 'Poliklinik Gigi'),
(9, 'Poliklinik Anak'),
(11, 'Poliklinik Kesehatan Ibu dan Anak (KIA)'),
(12, 'Poliklinik Penyakit Dalam'),
(13, 'Polklinik Jantung');

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
-- Indeks untuk tabel `t_antrian`
--
ALTER TABLE `t_antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_klinik` (`id_poliklinik`),
  ADD KEY `antrian_ibfk_2` (`id_pendaftaran`);

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
-- Indeks untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indeks untuk tabel `t_pemeriksaan1`
--
ALTER TABLE `t_pemeriksaan1`
  ADD PRIMARY KEY (`id_pemeriksaan1`);

--
-- Indeks untuk tabel `t_pemeriksaan2`
--
ALTER TABLE `t_pemeriksaan2`
  ADD PRIMARY KEY (`id_pemeriksaan2`);

--
-- Indeks untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `t_pengambilan_obat`
--
ALTER TABLE `t_pengambilan_obat`
  ADD PRIMARY KEY (`id_pengambilan_obat`);

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
-- AUTO_INCREMENT untuk tabel `t_antrian`
--
ALTER TABLE `t_antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `t_biaya`
--
ALTER TABLE `t_biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `t_pasien`
--
ALTER TABLE `t_pasien`
  MODIFY `id_pasien` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_pemeriksaan1`
--
ALTER TABLE `t_pemeriksaan1`
  MODIFY `id_pemeriksaan1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_pemeriksaan2`
--
ALTER TABLE `t_pemeriksaan2`
  MODIFY `id_pemeriksaan2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_pengambilan_obat`
--
ALTER TABLE `t_pengambilan_obat`
  MODIFY `id_pengambilan_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `t_poliklinik`
--
ALTER TABLE `t_poliklinik`
  MODIFY `id_poliklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_antrian`
--
ALTER TABLE `t_antrian`
  ADD CONSTRAINT `t_antrian_ibfk_1` FOREIGN KEY (`id_poliklinik`) REFERENCES `t_poliklinik` (`id_poliklinik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_antrian_ibfk_2` FOREIGN KEY (`id_pendaftaran`) REFERENCES `t_pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD CONSTRAINT `t_pegawai_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `t_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD CONSTRAINT `t_pembayaran_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `t_pendaftaran` (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
