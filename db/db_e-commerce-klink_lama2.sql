-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2022 pada 09.51
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-commerce-klink`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `username`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'kota padang', '0812345678', NULL, NULL),
(2, 'pelanggan', 'Lubuk Basung, Kabupaten Agam', '08123456776', '2022-06-03 09:40:02', '2022-06-03 09:40:02'),
(3, 'karyawan', 'Padang', '085261044403', '2022-06-05 05:35:52', '2022-06-05 05:35:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `kode_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_user`, `kode_barang`, `nama_barang`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(3, 1, 'A001', 'DSO', '1654788074.jpg', 'Perhitungan DSO tersebut dengan cara membagi total piutang selama jangka waktu dengan total penjualan kredit bersih. Hasil perhitungan tersebut akan dikalikan dengan jumlah hari pada periode tersebut. Selain itu pengukuran DSO ini memiliki jangka waktu secara bulanan, tahunan, maupun triwulan. Apabila hasil days sales outstanding rendah maka bisnis Anda hanya perlu beberapa hari menagih piutangnya.', '2022-06-09 08:21:14', '2022-06-09 08:21:58'),
(4, 1, 'A002', 'Whitening kety', '1654788179.jpg', 'Cipher FEAL (diikuti oleh Khufu dan Khafre ) memperkenalkan praktik pemutihan kunci menggunakan bagian dari kunci yang sama yang digunakan di sisa cipher. Ini tidak menawarkan perlindungan tambahan dari serangan brute force, tetapi dapat membuat serangan lain lebih sulit. Dalam cipher Feistel atau algoritme serupa, pemutihan kunci dapat meningkatkan keamanan dengan menyembunyikan input spesifik ke fungsi putaran pertama dan terakhir. Secara khusus, itu tidak rentan terhadap serangan meet-in-the-middle . Bentuk pemutihan kunci ini telah diadopsi sebagai fitur dari banyak sandi blok kemudian, termasuk AES , MARS , RC6 , dan Twofish .', '2022-06-09 08:22:59', '2022-06-09 08:22:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_pembayaran` bigint(20) NOT NULL,
  `tipe_pembayaran` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuantiti` bigint(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `total_akhir` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_pembayaran`, `tipe_pembayaran`, `bukti_pembayaran`, `kota`, `alamat`, `kuantiti`, `tanggal_pembayaran`, `total_akhir`, `created_at`, `updated_at`) VALUES
(1, 'cod', '', 'Kota Padang', 'Padang Kuranji', 3, '2022-06-02', 82000, NULL, NULL),
(2, 'cod', '', 'Kota Padang', 'Padang Kuranji', 1, '2022-06-02', 82000, NULL, NULL),
(3, 'transfer', '1656833895.jpg', 'Kota Padang', 'Jati', 2, '2022-07-03', 58000, NULL, NULL),
(4, 'transfer', '1656833895.jpg', 'Kota Padang', 'Jati', 1, '2022-07-03', 58000, NULL, NULL),
(5, 'transfer', '1656834475.jpg', 'Luar Kota Padang', 'Bukittinggi', 5, '2022-07-03', 130000, NULL, NULL),
(6, 'transfer', '1656834475.jpg', 'Luar Kota Padang', 'Bukittinggi', 1, '2022-07-03', 130000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` bigint(20) UNSIGNED NOT NULL,
  `nama_kurir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'A', 0, '2022-06-05 05:39:59', '2022-06-05 05:39:59'),
(2, 'B', 0, '2022-06-05 05:40:10', '2022-06-05 05:40:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_03_133832_create_banner_table', 1),
(5, '2021_07_03_134653_create_alamat_table', 1),
(6, '2021_07_07_133714_create_barang_table', 1),
(7, '2021_07_31_050138_create_pemesanan_table', 1),
(8, '2021_07_31_123559_create_kurir_table', 1),
(9, '2021_08_09_124155_create_persediaan_table', 1),
(10, '2022_06_03_073901_create_pembayaran', 1),
(11, '2022_06_03_073911_create_detail_pembayaran', 1),
(12, '2022_07_02_025535_create_table_detail_pembayaran', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_persediaan` bigint(20) NOT NULL,
  `id_kurir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dikonfirmasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='14';

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `id_persediaan`, `id_kurir`, `kode_barang`, `dikonfirmasi`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '', 'A002', 'Admin', 'sampai', '2022-07-02 03:37:31', '2022-07-03 00:39:53'),
(2, 2, 1, '', 'A001', 'pending', 'pending', '2022-07-02 03:37:31', '2022-07-02 03:37:31'),
(3, 2, 2, '', 'A002', 'Admin', 'sampai', '2022-07-03 07:38:14', '2022-07-03 00:39:45'),
(4, 2, 1, '', 'A001', 'Admin', 'sampai', '2022-07-03 07:38:15', '2022-07-03 00:39:49'),
(5, 2, 2, '', 'A002', 'Admin', 'sampai', '2022-07-03 07:47:55', '2022-07-03 00:50:14'),
(6, 2, 1, '', 'A001', 'Admin', 'sampai', '2022-07-03 07:47:55', '2022-07-03 00:50:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_persediaan` bigint(20) NOT NULL,
  `kode_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuantiti` bigint(20) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan`
--

CREATE TABLE `persediaan` (
  `id_persediaan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `kode_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persediaan` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `diskon` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `id_user`, `kode_barang`, `persediaan`, `harga`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 1, 'A001', 58, 10000, 0, '2022-06-03 09:39:16', '2022-07-03 07:47:31'),
(2, 1, 'A002', 123, 24000, 0, '2022-06-05 05:34:53', '2022-07-03 07:47:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.jpg',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `foto`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, '$2y$10$PbBoyTkSCq63QyC3jyQq3eH2xvdTFm3le4pLQYGGSOCbj836GJAjW', 'admin.jpg', 'admin', NULL, NULL, NULL),
(2, 'Pelanggan', 'pelanggan', NULL, '$2y$10$XRPLloOv0Pov/P19nCxUP.reOP5yoInvZJCFr93I5995THRlQ1gAi', 'admin.jpg', 'user', NULL, '2022-06-03 09:40:02', '2022-06-03 09:40:02'),
(3, 'karyawan', 'karyawan', NULL, '$2y$10$o7MHjmHRx.56ltnwRda74O0eANTMMOLVMcrVnOT180JSIVHffxVgy', 'admin.jpg', 'karyawan', NULL, '2022-06-05 05:35:52', '2022-06-05 05:35:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id_persediaan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_persediaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
