-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2022 pada 05.17
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Mathematics', '2022-02-02 14:37:54', '2022-02-02 14:37:54'),
(3, 'Biology', '2022-02-02 14:38:01', '2022-02-02 14:38:01'),
(4, 'IT', '2022-02-02 14:38:13', '2022-02-02 14:38:13'),
(5, 'Management', '2022-02-02 14:38:20', '2022-02-02 14:38:20'),
(6, 'Bussiness', '2022-02-02 14:38:25', '2022-02-02 14:38:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` int(11) NOT NULL,
  `material_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_author`, `description`, `cover_path`, `course_price`, `material_path`, `created_at`, `updated_at`) VALUES
(1, 'Web Progamming', 'Reinert Yosua', 'Belajar laravel', 'images/1643812952.jpg', 50000, 'materials/1643812952.zip', '2022-02-02 14:42:32', '2022-02-02 14:42:32'),
(2, 'Big Data Processing', 'Fepri', 'Belajar big data processing', 'images/1643813020.png', 30000, 'materials/1643813020.zip', '2022-02-02 14:43:40', '2022-02-02 14:43:40'),
(3, 'IT Management', 'Indra Gunawan', 'Belajar persiapan untuk bekerja di bidang IT Management', 'images/1643813230.png', 70000, 'materials/1643813230.zip', '2022-02-02 14:47:10', '2022-02-02 14:47:10'),
(4, 'Calculus 2', 'Indra Gunawan', 'Belajar integral dan turunan calculus 2 level advanced', 'images/1643813301.jpg', 90000, 'materials/1643813301.zip', '2022-02-02 14:48:21', '2022-02-02 14:48:21'),
(5, 'International Bussiness Management', 'Budi', 'Belajar basic bisnis dan management', 'images/1643813503.jpg', 55000, 'materials/1643813503.zip', '2022-02-02 14:51:43', '2022-02-02 14:51:43'),
(6, 'UN Biology', 'Wibowo', 'Siap hadapi Ujian Nasional Biology IPA', 'images/1643813667.jpg', 67000, 'materials/1643813667.zip', '2022-02-02 14:54:27', '2022-02-02 14:55:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_category_detail`
--

CREATE TABLE `course_category_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `course_category_detail`
--

INSERT INTO `course_category_detail` (`id`, `course_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 2, 4, NULL, NULL),
(3, 3, 4, NULL, NULL),
(4, 3, 5, NULL, NULL),
(5, 4, 2, NULL, NULL),
(6, 5, 5, NULL, NULL),
(7, 5, 6, NULL, NULL),
(8, 6, 3, NULL, NULL);

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_12_31_065455_create_categories_table', 1),
(4, '2021_12_31_065624_create_courses_table', 1),
(5, '2021_12_31_070013_create_transaction_headers_table', 1),
(6, '2021_12_31_070756_create_transaction_details_table', 1),
(7, '2022_01_02_131306_create_course_category_detail_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2022-02-02 15:30:50', '2022-02-02 15:30:50'),
(2, 3, 2, '2022-02-02 15:31:09', '2022-02-02 15:31:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_headers`
--

CREATE TABLE `transaction_headers` (
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cart',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_headers`
--

INSERT INTO `transaction_headers` (`transaction_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'cart', NULL, NULL),
(2, 2, 'cart', NULL, NULL),
(3, 3, 'checkout', '2022-02-02 15:29:27', '2022-02-02 15:32:11'),
(4, 3, 'cart', '2022-02-02 15:32:11', '2022-02-02 15:32:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$YmSaF96hoSRFCV1Eu/qEJuUSAVBBl6SGZLPwpoMLUMoR7Yqw05fMW', 'admin', 'u5tI4HyFpFKXrJct1X0BXWXxPckk3zZpS1T9GbFYNGCOaWIQil0QoLKVp8xH', NULL, NULL),
(2, 'member', 'member@member.com', '$2y$10$.HYZkGNZ0l8XFMQ86sK/7e4UvlxtPl6n78LqnVlFa2LXacUJdWvgK', 'member', NULL, NULL, NULL),
(3, 'Indra Gunawan', 'ahong.beksai@gmail.com', '$2y$10$qP/Q80mV/vTucBQuqTh.Su60DWu/S7g4gl5lYCqrvU1MjKrLB8tY6', 'member', NULL, '2022-02-02 15:29:27', '2022-02-02 15:29:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_category_detail`
--
ALTER TABLE `course_category_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_category_detail_course_id_foreign` (`course_id`),
  ADD KEY `course_category_detail_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_course_id_foreign` (`course_id`);

--
-- Indeks untuk tabel `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transaction_headers_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `course_category_detail`
--
ALTER TABLE `course_category_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaction_headers`
--
ALTER TABLE `transaction_headers`
  MODIFY `transaction_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `course_category_detail`
--
ALTER TABLE `course_category_detail`
  ADD CONSTRAINT `course_category_detail_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_category_detail_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_headers` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD CONSTRAINT `transaction_headers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
