-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2026 at 02:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dilihat` int UNSIGNED NOT NULL DEFAULT '0',
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dadi Haryadi',
  `tags` text COLLATE utf8mb4_unicode_ci,
  `tanggal_berita` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `kategori`, `gambar`, `isi`, `dilihat`, `penulis`, `tags`, `tanggal_berita`, `created_at`, `updated_at`) VALUES
(16, 'Malam Penuh Gengsi Dimulai! 16 Tim Berebut Mahkota Juara di Ajang CVC Cup 2026 Desa Jalatrang', 'Olahraga', 'berita/AYXJiFRxDqPj08WdcTPn0fK8zjNVt0NHLtOH30CH.jpg', 'JalatrangNews; Himpunan Pemuda-Pemudi Dusun Cikandung yang tergabung dalam Cikandung Voli Ball Club (CVC) resmi menyelenggarakan ajang olahraga bertajuk CVC Cup 2026. Turnamen bola voli putra antar-dusun se-Kecamatan Cipaku ini resmi dibuka pada Sabtu, 26 September 2026, dan dijadwalkan berlangsung hingga 10 Oktober 2026.\r\n\r\nPembukaan turnamen yang dipusatkan di Lapangan Bola Voli CVC, Dusun Cikandung, Desa Jalatrang, ini dibuka secara langsung oleh Kepala Desa Jalatrang, Dadi Haryadi.\r\n\r\nDalam sambutannya, Dadi Haryadi mengapresiasi tinggi inisiatif para pemuda Dusun Cikandung yang sukses menggerakkan kegiatan positif berskala kecamatan ini. \"Ajang ini bukan hanya sekadar mencari siapa yang menang atau kalah, tetapi menjadi momentum penting untuk mempererat silaturahmi, sportivitas, dan menggali bibit-bibit atlet bola voli potensial di wilayah Kecamatan Cipaku,\" ujar Dadi.\r\n\r\nPanggung Pembuktian 16 Tim Terbaik\r\nSebanyak 16 tim terbaik dari berbagai dusun di Kecamatan Cipaku dipastikan siap saling sikut demi memperebutkan mahkota juara. Atmosfer kompetisi dijamin bakal membara setiap malam mulai pukul 19.30 WIB hingga partai puncak pada 10 Oktober 2026.\r\n\r\nTak tanggung-tanggung, jalannya pertandingan tiap malam dijamin makin hidup dan bergemuruh berkat kehadiran reporter andalan Desa Jalatrang, Ali Jawa, yang memandu jalannya laga dengan gaya komentarnya yang khas dan memompa adrenalin penonton.\r\n\r\nDihadiri Tokoh Penting hingga Pengusaha Lokal\r\nMalam pembukaan CVC Cup 2026 kian terasa istimewa dengan hadirnya jajaran penting pemangku wilayah. Tampak memadati arena: Bhabinkamtibmas Desa Jalatrang, tokoh masyarakat, tokoh agama, tokoh pemuda, Kepala Dusun Cikandung, para pengusaha lokal Dusun Cikandung yang turut mendukung penuh acara, Ketua BPD Desa Jalatrang, hingga jajaran ketua RT dan RW se-Dusun Cikandung yang bahu-membahu menyukseskan acara.\r\n\r\nAjang CVC Cup 2026 kini resmi menabuh genderang perang sportivitas. Siapakah tim yang akan keluar sebagai penguasa voli baru di Kecamatan Cipaku? Saksikan keseruannya langsung setiap malam di Lapangan CVC Dusun Cikandung!\r\n\r\n \r\n\r\nTeam_Media; Nurhalim', 311, 'Admin', NULL, NULL, '2026-09-26 01:00:00', '2026-10-03 19:19:59'),
(17, 'Pemerintah Desa Jalatrang Kukuhkan Desa Siaga TB, Perkuat Kolaborasi Lintas Sektor Basmi Tuberkulosis', 'Pendidikan', 'berita/Gyc9yGtreLP3qBRgA4vOtl65E9GmGHz78cCecpsv.jpg', 'JalatrangNews; Pemerintah Desa Jalatrang, Kecamatan Cipaku, Kabupaten Ciamis, menunjukkan komitmen nyata dalam meningkatkan kesehatan masyarakat dengan menggelar Sosialisasi Pencegahan Penyakit Menular (TBC) sekaligus Pembentukan Desa Siaga Tuberkulosis (TB). Kegiatan strategis ini diselenggarakan pada Senin, 28 September 2026, di aula desa Jalatrang.\r\n\r\nAcara yang dihadiri oleh puluhan pemangku kepentingan tingkat desa ini bertujuan untuk membangun kesadaran kolektif serta memperkuat jejaring deteksi dini penularan TBC langsung dari tingkat akar rumput.\r\n\r\nKepala Desa Jalatrang dalam sambutannya menekankan pentingnya peran aktif seluruh elemen masyarakat dalam memutus mata rantai penyebaran TBC. Pembentukan \"Desa Siaga TB\" diharapkan mampu menjadi garda terdepan dalam penemuan kasus baru secara cepat dan tepat sehingga penanganan medis dapat segera dilakukan.\r\n\r\nSinergi Lintas Sektor dan Kehadiran Narasumber Ahli\r\nUntuk memberikan pemahaman mendalam secara komprehensif, Pemerintah Desa Jalatrang menghadirkan narasumber ahli dari tingkat kecamatan (Sekmat Cipaku) serta tenaga kesehatan profesional Tingkat Kabupaten Ciamis dari Puskesmas Cipaku. Materi yang disampaikan meliputi:\r\n\r\nPengenalan gejala klinis dan metode penularan TBC.\r\n\r\nLangkah-langkah pencegahan serta pentingnya kepatuhan minum obat bagi pasien.\r\n\r\nMekanisme kerja dan fungsi strategis pembentukan Desa Siaga TB.\r\n\r\nDihadiri Unsur Pimpinan dan Kelembagaan Desa\r\nKegiatan ini mendapat sambutan antusias dan dihadiri oleh jajaran lengkap Forum Koordinasi Pimpinan Desa serta lembaga kemasyarakatan, di antaranya: Bhabinkamtibmas, Babinsa, Ketua Badan Permusyawaratan Desa (BPD), Ketua KDMP, Pendamping Desa beserta PLD, Direktur Bank Sampah Jalatrang Berseka, Ketua TP PKK Desa Jalatrang, Bidan Desa, TPK Desa dan Seluruh pengurus Posyandu se-Desa Jalatrang\r\n\r\nTransparansi Anggaran dan Komitmen Berkelanjutan\r\nPelaksanaan program kesehatan masyarakat ini dibiayai penuh melalui alokasi Dana Desa (DD) Tahap 2 Tahun Anggaran 2026. Pemanfaatan Dana Desa ini dinilai sangat tepat sasaran guna mendukung visi pembangunan manusia yang sehat, produktif, dan berdaya saing di Desa Jalatrang.\r\n\r\nMelalui pengukuhan Desa Siaga TB ini, Pemerintah Desa Jalatrang optimis dapat menciptakan lingkungan desa yang tanggap, responsif, dan bebas dari stigma negatif terhadap penderita tuberkulosis.\r\n\r\n \r\n\r\nTeam_Media; Nurhalim', 128, 'Admin', NULL, NULL, '2026-09-28 01:00:00', '2026-10-04 06:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1791120074),
('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1791120074;', 1791120074);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint UNSIGNED NOT NULL,
  `berita_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentars`
--

INSERT INTO `komentars` (`id`, `berita_id`, `nama`, `email`, `no_hp`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 17, 'Indria', 'indria.rahma.2505336@students.um.ac.id', '0812345678', 'keren sekali programnya sangat bermanfaat', '2026-10-04 06:20:15', '2026-10-04 06:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_29_101953_create_beritas_table', 1),
(5, '2026_10_04_000000_create_komentars_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eF80RRXawDCRiWH3TQcAlu9PxtgI3OMCuCd391Sz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjhtdVVLNTdudFVTVVJvd3BLek1HMEE1WUZlaTJUeUtHaDYxVlI2OSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEvMTciO3M6NToicm91dGUiO3M6MTE6ImJlcml0YS5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxNToiY2FwdGNoYV9qYXdhYmFuIjtpOjExO30=', 1791081182),
('eL4LI6CiikFY31rERGrTJxXoZwWA6j0XLEX0I61s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.140.0 Chrome/150.0.7871.250 Electron/43.7.3 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUzlYaUpPZ0luRFdHR2dYcFJSb1dqS3VwbWVjR0Z4eDhBRTFxdHg4eiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO3M6NToicm91dGUiO3M6MTI6ImJlcml0YS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1791031915),
('EZbVsU5YuENZoe0ypL3Bxc2DkZeHYFi39EXFLcUX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUktldjVycGQ2YVQ3ZHF6Zm5LMHN6aUh4aHJUblhoM2ptbHRFdzNYcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO3M6NToicm91dGUiO3M6MTI6ImJlcml0YS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTU6ImNhcHRjaGFfamF3YWJhbiI7aToxMTt9', 1791120574),
('i5PWYXEGbp8o1auskmiIy2rorTY4A1cmPdEGPyOk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMWRHREFNZU5zUkZVaFFyNkdIUE1TR1hPRENobjV4TnVWTU9ucnQ3NSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO3M6NToicm91dGUiO3M6MTI6ImJlcml0YS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTU6ImNhcHRjaGFfamF3YWJhbiI7aToxMTt9', 1791103048),
('RDi1GLD9ONLXJmSmQerumr8D5EJxr9enjVSPGQ6G', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMk9INWpRV0FzWGhNaDc0emduZmE5Wmc2cklpQ0xIRVBsSGhubFFGWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO3M6NToicm91dGUiO3M6MTI6ImJlcml0YS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTU6ImNhcHRjaGFfamF3YWJhbiI7aTo4O30=', 1791095334),
('VQMAiU6cRtF93aH6XPSGe4002hx0M3ZmF5hUFdf2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2I1Y0NlNHQ4VDU3cGhTbm02Rng0ZFdYbW5lejdaVTFIWjVvMmI5WCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO3M6NToicm91dGUiO3M6MTI6ImJlcml0YS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1791090635),
('WZag0bHfOpygVwYBL84F6209oSqGqjMTpmVcFxms', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTE9Ub09ibUF4bkVVTUNFd3R4QURQY2VhclRhREJYb3djTXRkcWtYVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO3M6NToicm91dGUiO3M6MTI6ImJlcml0YS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1791038789);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2026-10-03 05:26:00', '$2y$12$LE5ZQM6oEj1VJShLqHyAQu/3umkPeipEJ0NAuTpkK/9FHOxic4LQC', 'wcQRWW2UMS', '2026-10-03 05:26:00', '2026-10-03 05:26:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentars_berita_id_foreign` (`berita_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_berita_id_foreign` FOREIGN KEY (`berita_id`) REFERENCES `beritas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
