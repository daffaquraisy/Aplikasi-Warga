-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Okt 2020 pada 07.30
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double(20,10) DEFAULT NULL,
  `lng` double(20,10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informations`
--

INSERT INTO `informations` (`id`, `title`, `desc`, `date`, `image`, `created_at`, `updated_at`, `lokasi`, `lat`, `lng`) VALUES
(1, 'Ada Jurig', 'Di pertigaan', '2020-09-22', 'images/7Hjgjvm7Uxjo9v0IxZCsMR5z8zPlpRbDuRSTqDVj.jpeg', '2020-09-22 07:32:05', '2020-09-22 07:54:44', '', 0.0000000000, 0.0000000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_16_005938_penyesuaian_table_users', 1),
(5, '2020_04_16_100716_create_informations_table', 1),
(6, '2020_04_17_095719_create_patriarches_table', 1),
(7, '2020_04_18_091308_create_residents_table', 1),
(8, '2020_06_07_101708_add_field_status_bantuan_to_patriarches', 1),
(9, '2020_09_23_095309_add_lat_lng_to_informations_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `patriarches`
--

CREATE TABLE `patriarches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_kk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '02',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_bantuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `patriarches`
--

INSERT INTO `patriarches` (`id`, `nama`, `nomor_kk`, `tanggal_lahir`, `no_hp`, `status`, `tempat_lahir`, `agama`, `pendidikan`, `pekerjaan`, `nik`, `rt`, `rw`, `created_at`, `updated_at`, `status_bantuan`) VALUES
(1, 'Muhammad Daffa Quraisy', '765777', '2020-09-17', '085878085670', 'Hidup', 'Bogor', 'Islam', 'S.Kom', 'Programmer', '34343434', '01', '02', '2020-09-22 03:28:33', '2020-09-22 03:28:33', 'Menerima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `residents`
--

CREATE TABLE `residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '02',
  `status_perkawinan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kependudukan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menetap',
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patriarch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `residents`
--

INSERT INTO `residents` (`id`, `nama`, `rt`, `rw`, `status_perkawinan`, `status_kependudukan`, `tanggal_lahir`, `no_telp`, `tempat_lahir`, `agama`, `nik`, `pendidikan`, `pekerjaan`, `patriarch_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'wildan', '01', '02', 'Belum Menikah', 'Menetap', '2002-06-06', '0823723', 'Bogor', 'Islam', '821636273', 'S1', 'PNS', 1, NULL, '2020-09-22 06:09:04', '2020-09-22 06:09:04'),
(2, 'daerlyr', '07', '02', 'Menikah', 'Hidup', '2003-04-14', '02377233', 'Bogor', 'Islam', '1281729', 'S3', 'Buruh Swasta', 1, NULL, '2020-09-22 06:13:36', '2020-09-22 06:26:32'),
(3, 'daerly', '07', '02', 'Menikah', 'Menetap', '2003-04-14', '02377233', 'Bogor', 'Islam', '128172', 'S3', 'Buruh Swasta', 1, '2020-09-22 06:30:19', '2020-09-22 06:14:09', '2020-09-22 06:30:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '["USER"]',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `phone`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$OIZ3FPJy.VsLs.5MlcfFY.G7xBFof3ASLiBYpIOTmyojjXeToT26G', NULL, '2020-09-22 02:01:39', '2020-09-22 02:01:39', '[\"ADMIN\"]', '087635353', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `patriarches`
--
ALTER TABLE `patriarches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patriarches_nomor_kk_unique` (`nomor_kk`),
  ADD UNIQUE KEY `patriarches_nik_unique` (`nik`);

--
-- Indeks untuk tabel `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `residents_nik_unique` (`nik`),
  ADD KEY `residents_patriarch_id_foreign` (`patriarch_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `patriarches`
--
ALTER TABLE `patriarches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `residents`
--
ALTER TABLE `residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `residents_patriarch_id_foreign` FOREIGN KEY (`patriarch_id`) REFERENCES `patriarches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
