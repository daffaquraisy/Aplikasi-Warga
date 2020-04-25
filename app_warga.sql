-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2020 pada 05.19
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_warga`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informations`
--

INSERT INTO `informations` (`id`, `title`, `desc`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Hard Times', '<p>masa masa sulit karena corona kampret</p>', '2020-04-16', '2020-04-16 06:55:44', '2020-04-16 07:11:33'),
(2, 'Cucurak di masjid', '<p>Bentar lagi puasa, kita bakal cucurak di masjid</p>', '2020-04-17', '2020-04-17 02:06:07', '2020-04-17 02:06:07');

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
(5, '2020_04_16_100716_create_informations_table', 2),
(6, '2020_04_17_095719_create_patriarches_table', 3),
(7, '2020_04_18_091308_create_residents_table', 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `patriarches`
--

INSERT INTO `patriarches` (`id`, `nama`, `nomor_kk`, `tanggal_lahir`, `no_hp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wildan Pratama', '111111111', '1999-01-24', '0846364734', '[\"Hidup\"]', '2020-04-17 03:47:04', '2020-04-17 03:51:33'),
(2, 'Omen', '435453454', '2002-10-12', '0384637555', '[\"Wafat\"]', '2020-04-17 03:51:43', '2020-04-17 03:51:43'),
(4, 'Renofa Alwa', '9478732473', '1199-10-10', '0273526333', '[\"Wafat\"]', '2020-04-19 00:09:40', '2020-04-19 00:16:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `residents`
--

CREATE TABLE `residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '02',
  `status_perkawinan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kependudukan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Menetap',
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patriarch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `residents`
--

INSERT INTO `residents` (`id`, `nama`, `rt`, `rw`, `status_perkawinan`, `status_kependudukan`, `tanggal_lahir`, `no_telp`, `patriarch_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Allinny', '04', '02', 'Menikah', 'Menetap', '2019-04-25', '0878767666', 1, NULL, NULL, '2020-04-20 02:02:01'),
(2, 'Didin Mujahid', '01', '02', 'Belum Menikah', 'Menetap', '2009-10-01', '08765342512', 2, NULL, '2020-04-19 03:06:40', '2020-04-19 23:51:34');

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
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `phone`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$KiUHCQcV/3Pq15zc8EeTsey7ZTALyx5m/WSgM2RZW7Tx8KEjjgoNy', NULL, '2020-04-15 18:07:35', '2020-04-15 18:07:35', '[\"ADMIN\"]', '087635353', 'ACTIVE'),
(3, 'Muhammad Daffa Quraisy', 'daffaquraisy@gmail.com', NULL, '$2y$10$fFkx35IMPaR7XfMoqcugWefnH16119VVN.apSsEW8cHAtApWsGQWS', NULL, '2020-04-16 00:14:44', '2020-04-20 02:20:28', '[\"Pak RT 1\"]', '085878085670', 'ACTIVE'),
(6, 'Augusdin', 'agus@gmail.com', NULL, '$2y$10$EU2h4JuF1Qe3VQzY9/C1S.i4.b1TthnpeGa7xGBQrTn5t/bnsuUWi', NULL, '2020-04-20 02:21:28', '2020-04-20 02:21:28', '[\"Pak RT 2\"]', '0283627632', 'ACTIVE'),
(7, 'Septiaan', 'Ilham@gmail.com', NULL, '$2y$10$JI/0SD9eK3oXC22rsQbMa.BKV19InxC/3rWR871tX.3E412Rgz5Te', NULL, '2020-04-20 02:22:29', '2020-04-20 02:22:38', '[\"Pak RT 3\"]', '09876543212', 'ACTIVE'),
(8, 'Jeeff', 'jeff@gmail.com', NULL, '$2y$10$q5jmn9LOmDXKaqHbqopaTu2fOfEsEuZKltXD3uIVAc64jLw4br8Gm', NULL, '2020-04-20 02:25:17', '2020-04-20 02:25:17', '[\"Pak RT 4\"]', '08765432132', 'ACTIVE'),
(9, 'Dimas', 'dimas@gmail.com', NULL, '$2y$10$jj93pfLejLLBQ4rZMQSiQeTXQLS5wv9zzmNZE522AMDemn.V2fCeq', NULL, '2020-04-20 02:26:01', '2020-04-20 02:26:01', '[\"Pak RT 5\"]', '08765435122', 'ACTIVE'),
(10, 'Farhan', 'farhan@gmail.com', NULL, '$2y$10$QOQGesOGF/Mn/BTI3G8yUuTX3FJzlcZxxjyn14lmrZSskudUlF912', NULL, '2020-04-20 02:27:40', '2020-04-20 02:27:40', '[\"Pak RT 6\"]', '0897654123', 'ACTIVE'),
(11, 'Abima', 'abim@gmail.com', NULL, '$2y$10$0JotiGFEojK7GnI57J9n4.hqXxByNuW/zDs79Jl7xK4.CQMT1VSpu', NULL, '2020-04-20 02:28:27', '2020-04-20 02:28:27', '[\"Pak RT 7\"]', '0873123456', 'ACTIVE');

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
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `patriarches`
--
ALTER TABLE `patriarches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `residents`
--
ALTER TABLE `residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `residents_patriarch_id_foreign` FOREIGN KEY (`patriarch_id`) REFERENCES `patriarches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
