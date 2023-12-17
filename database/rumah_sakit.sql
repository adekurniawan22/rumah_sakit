-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2023 pada 14.53
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
(125, 173, 1, 1, 1),
(126, 174, 1, 2, 1);

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
(1, 'Paracetamol', 10000, 200),
(12, 'Bodrex', 10000, 200),
(13, 'Panadol', 5000, 120),
(14, 'Ibuprofen', 15000, 250),
(15, 'Amoksisilin', 10000, 100),
(16, 'Omeprazole', 15000, 50),
(17, 'Loratadin', 7000, 100);

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
(49, '00010010110289', 'Ade Kurniawan', 'Tempino', '2001-06-22', 'KTP', '150505220620010101', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Minang', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171027936'),
(50, '00010010110123', 'Jamal Indrawan', 'Tempino', '2001-01-02', 'KTP', '150505220620076530', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Ambon', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171021234'),
(51, '00010010110915', 'Adi Suhendra', 'Tempino', '2001-09-06', 'KTP', '150505220620045132', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Ambon', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171020987'),
(52, '00010010110999', 'Sultan Thariq', 'Tempino', '2001-06-05', 'KTP', '150505220620010999', 'Laki-laki', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Jawa', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171027456'),
(53, '00010010110888', 'Tri Mulyani', 'Tempino', '2001-04-02', 'KTP', '150505220620010888', 'Perempuan', 'Wiraswasta', 'Warga Negara Indonesia', 'Suku Jawa', 'Jalan Jambi Palembang KM 27, RT 12, RW 04, Kelurahan Tempino, Kecamatan Mestonh, Kabupaten Muaro Jambi, Provinsi Jambi', 'Belum Menikah', 'Islam', 'Bahasa Indonesia', 'S1', '083171021209');

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
(33, 2, 0, '000000001067', 'pp_ade', '$2y$10$s2E6.3M7ZJh.8bdyM7abRuPZVaRVUy/PMOMs5uTKypSrE8gBoMKvG', 'Ade Kurniawan Petugas Pendaftaran', 'Jalan Jambi Palembang KM 27', '083171027936', 'Laki-laki', 1, 'default.jpg', '2023-12-02 17:11:22'),
(36, 5, 0, '000192543388', 'k_ade', '$2y$10$ElpPueEn/zqwhqzUoldMveYp83M6HucR4STa2YGnyGWr8WV/VaYTq', 'Ade Kurniawan Kasir', 'Jalan Jambi Palembang KM 27', '083171027936', 'Laki-laki', 1, 'default.jpg', '2023-12-06 13:30:31'),
(37, 3, 1, '123348890216', 'p_ade', '$2y$10$QjCdpHinIM5rI1sIfiqyQeMWwO73pcADnPlqf33U.6Nsd97oI.KqO', 'Ade Kurniawan Perawat', 'Jalan Jambi Palembang KM 27', '083171027936', 'Laki-laki', 1, 'default.jpg', '2023-12-07 04:13:46'),
(38, 4, 1, '512367772771', 'd_ade', '$2y$10$rBuh/rthEFQNXTwnUbw6UegyIkxTTboYNP4kce49gSdoghUjOG/yW', 'Ade Kurniawan Dokter', 'Jalan Jambi Palembang KM 27', '083171027946', 'Laki-laki', 1, '580b57fcd9996e24bc43c4e73.png', '2023-12-08 16:22:02'),
(39, 7, 0, '234575656799', 'f_ade', '$2y$10$g2U9kjT1oXINwvpksbHinudKIx0ZxHmTB/u2muCwWIxyuvVHKrYHS', 'Ade Kurniawan Farmasi', 'Jalan Jambi Palembang KM 27', '083171027936', 'Laki-laki', 1, 'default.jpg', '2023-12-17 14:18:42');

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
(87, 173, 33, 1, 1, '2023-12-17 20:12:28'),
(88, 174, 33, 1, 2, '2023-12-17 20:12:36');

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

--
-- Dumping data untuk tabel `t_pemeriksaan1`
--

INSERT INTO `t_pemeriksaan1` (`id_pemeriksaan1`, `id_pendaftaran`, `id_pasien`, `keadaan_umum`, `kesadaran`, `gcs`, `e`, `v`, `m`, `keluhan_umum`, `keluhan_lain`, `tekanan_darah`, `nadi`, `temperatur`, `pernapasan`, `nyeri`, `pencetus`, `kwalitas`, `lokasi`, `skala`, `durasi`, `pengetahuan_tentang_penyakit`, `perawatan_yg_dilakukan`, `perasaan`, `status_aktivitas`, `muskuloskeleta`, `kekuatan_otot`, `alergi`, `tidur_siang`, `tidur_malam`, `gangguan_tidur`, `penerimaan_kondisi`, `tinggal_bersama`, `kebiasaan`, `skor_hm`, `skor_mfs`, `skor_omss`, `status_laporan_hasil_SR`, `berat_badan`, `tinggi_badan`, `imt`, `skor_mst`, `imunisasi_dasar`, `imunisasi_lain`, `eliminasi`, `pola_makan`, `pola_minum`, `bak`, `bab`, `umur`, `RTKB_sosial`, `RTKB_motorik_halus`, `RTKB_motorik_kasar`, `RTKB_bahasa`, `analisa_masalah_keperawatan`, `planning`, `implementasi_dan_evaluasi`, `edukasi`, `keadaan_pasien_pulang`, `berkas_yang_diberikan`, `info_edukasi_yang_diberikan`, `status_permintaan_pulang`, `status_melarikan_diri`, `id_pegawai`, `waktu_pemeriksaan`) VALUES
(60, 173, 50, 'Baik', 'Baik', '44', '55', '66', '77', 'Sakit sewaktu baru bangun tidur', 'Tidak ada', '55', '90', '30', '90', 'Tidak', '77', '88', '88', '99', '22', 'Tidak tau', 'Tidak', 'Penderitaan', 'Mandiri', 'Tidak ada', '877', 'Tidak ada alergi', '3', '7', 'Tidak ada gangguan tidur', 'Sakit ketika ingin berkattivitas sewaktu bangun tidur', 'Keluarga', 'Merokok', '7', '25', '5', 'Belum dilaporkan', '60', '170', '77', '3', 'Lengkap', 'Tidak Ada', '88', '2', '8', '5', '1', '2 Tahun', 'Senyum, Bermain Interaktif', 'Mengikuti Gerakan, Menggenggam, Memindahkan benda dari tangan ke tangan yang lain, Menjemput benda dengan 5 jari, Mencorat-coret kertas', 'Mengangkat Kepala 45 Derajat Dari Perut, Membalikan Badan, Duduk, Berdiri, Berjalan', 'Mengoceh, Mengeluarkan kata ma-ma-da-da, Menirukan Suara, Dapat menyebutkan 2 suku kata', 'Baik', 'Blabla', 'Blabla', 'Sebaiknya jangan menggosok mata', '', '', '', '', '', 37, '2023-12-17 20:24:50');

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
(172, 51, 'Bayar', 'Keluarga', 'Sidiq Sanjaya Bakti', 'Teman Kampus', 'Jalan Tubagus Ismal Gang Kubangsari IV, RT 07, RW 02, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '081274749976', '2023-12-17 20:12:02', 'Sudah', 1, 33, '0', '0', '0', '0', '0', '0'),
(173, 50, 'BPJS', 'Keluarga', 'Sidiq Sanjaya Bakti', 'Teman Kampus', 'Jalan Tubagus Ismal Gang Kubangsari IV, RT 07, RW 02, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '081274749976', '2023-12-17 20:12:28', 'Sudah', 1, 33, '1', '1', '0', '0', '0', '0'),
(174, 52, 'BPJS', 'Keluarga', 'Sidiq Sanjaya Bakti', 'Teman Kampus', 'Jalan Tubagus Ismal Gang Kubangsari IV, RT 07, RW 02, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '081274749976', '2023-12-17 20:12:36', 'Sudah', 1, 33, '1', '0', '0', '0', '0', '0'),
(175, 53, 'Bayar', 'Keluarga', 'Sidiq Sanjaya Bakti', 'Teman Kampus', 'Jalan Tubagus Ismal Gang Kubangsari IV, RT 07, RW 02, Kelurahan Tugabus, Kecamatan Coblong, Kabupaten Bandung, Provinsi Jawa Barat', '081274749976', '2023-12-17 20:12:44', 'Sudah', 1, 33, '0', '0', '0', '0', '0', '0');

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
(2, 'Poliklinik Kulit'),
(3, 'Poliklinik Saraf'),
(7, 'Poliklinik THT (Telinga, Hidung, Tenggorokan)'),
(8, 'Poliklinik Gigi'),
(9, 'Poliklinik Kandungan');

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
  ADD PRIMARY KEY (`id_pembayaran`);

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
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_poliklinik` (`id_poliklinik`);

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
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `t_biaya`
--
ALTER TABLE `t_biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `t_pasien`
--
ALTER TABLE `t_pasien`
  MODIFY `id_pasien` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `t_pemeriksaan1`
--
ALTER TABLE `t_pemeriksaan1`
  MODIFY `id_pemeriksaan1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `t_pemeriksaan2`
--
ALTER TABLE `t_pemeriksaan2`
  MODIFY `id_pemeriksaan2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT untuk tabel `t_pengambilan_obat`
--
ALTER TABLE `t_pengambilan_obat`
  MODIFY `id_pengambilan_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_poliklinik`
--
ALTER TABLE `t_poliklinik`
  MODIFY `id_poliklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `t_antrian_ibfk_1` FOREIGN KEY (`id_poliklinik`) REFERENCES `t_poliklinik` (`id_poliklinik`),
  ADD CONSTRAINT `t_antrian_ibfk_2` FOREIGN KEY (`id_pendaftaran`) REFERENCES `t_pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE;

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
