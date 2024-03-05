-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2024 pada 06.01
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Blog-Kosmetik', 'blog-kosmetik', NULL, '2024-02-08 05:04:00'),
(2, 'Blog-Kesehatan', 'blog-kesehatan', NULL, NULL),
(3, 'Blog-Multimedia', 'blog-multimedia', NULL, NULL),
(4, 'Blog-Berita', 'blog-berita', NULL, NULL),
(5, 'Blog-Budaya', 'blog-budaya', NULL, NULL),
(6, 'Blog-Kuliner', 'blog-kuliner', NULL, NULL),
(7, 'Blog-Teknologi', 'blog-teknologi', NULL, NULL),
(8, 'Blog-Politik', 'blog-politik', NULL, NULL),
(9, 'Blog-Pilpres', 'blog-pilpres', NULL, NULL),
(11, 'Blog-Otomotif', 'blog-otomotif', NULL, NULL),
(12, 'Blog-Pendidikan', 'blog-pendidikan', NULL, NULL),
(13, 'Blog-Sejarah', 'blog-sejarah', NULL, NULL),
(14, 'Blog-Ekonomi', 'blog-ekonomi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_24_060222_create_posts_table', 1),
(6, '2024_01_24_073118_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug_category` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `blog_image` text NOT NULL,
  `published_at` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `slug_category`, `user_id`, `name`, `image`, `title`, `slug`, `body`, `blog_image`, `published_at`, `negara`, `created_at`, `updated_at`) VALUES
(8, 'blog-pilpres', 1, 'Abdillah', 'profile/APHpRNYiltYiM7a5FICWNBjoh9f4feLTICiPsRbc.jpg', 'Pilpres RI Masuk Radar Singapura', 'pilpres-ri-masuk-radar-singapura', '<div><strong>Jakarta</strong> - Banyak pengusaha asal Singapura yang ternyata memantau perkembangan pemilihan presiden (Pilpres) 2024. Ekonom Bank DBS bahkan mengatakan para pengusaha juga memantau masing-masing calon presiden (capres).<br>\"Mayoritas investor di Singapura sangat tertarik untuk tahu capres (calon presiden) sedang membicarakan apa. Pilpres 2024 akan membawa perubahan kepemimpinan yang sepanjang satu dekade ini dipegang oleh Presiden Jokowi,\" ungkap Senior Economist DBS Bank Radhika Rao di di Gedung Bank DBS, Capital Palace, Gatot Subroto, Jakarta Selatan, Rabu (7/2/2024).<br><br>Radhika mengatakan para investor sangat tertarik melihat gagasan ekonomi yang dibawa oleh para capres. Di antaranya seperti strategi konsolidasi fiskal, kebijakan hilirisasi, upaya mendorong investasi, kebijakan pembangunan mobil listrik, dan lain sebagainya.<br><br>Ia menjelaskan para investor tertarik untuk melihat langkah serta gagasan para capres untuk ekonomi Indonesia. Kendati demikian, Radhika menilai mayoritas investor berekspektasi tidak akan perubahan besar-besaran yang terjadi terhadap ekonomi setelah Pilpres 2024.<br><br>\"Investor akan mengamati hasil pilpres tapi tidak berekspektasi ada perubahan besar. Investor mau melihat siapa yang akan jadi pemimpin,\" terangnya.<br><br>Di sisi lain, Radhika mengatakan ada satu alasan lain para investor Singapura melirik hasil Pilpres 2024. Ia mengungkap Indonesia adalah salah satu negara di Asia Tenggara yang termasuk dalam global bond index atau indeks obligasi global.<br><br>Indeks obligasi global mencakup pasar utang negara berkembang (emerging markets) yang memantau secara ketat obligasi mata uang lokal yang diterbitkan oleh pemerintah di berbagai negara berkembang.<br><br>Advertisements<br><br><br>Dalam hal ini, Radhika mengatakan Indonesia adalah salah satu negara yang memberi high-yield atau memberi bunga dan deviden tinggi kepada para investor. Banyak investor pasif asal Singapura yang membeli obligasi dari Indonesia.<br><br>\"Kepentingan ada di sana karena posisi Indonesia adalah salah satu negara yang memberi high yield di ekosistem ini. Tidak banyak negara yang membeli return obligasi yang bagus. Jadi Indonesia betul-betul menonjol,\" ujar dia.</div>', 'blog_image/BOQPGjCiqb3wYeB7CzcbsxV6ryj5mw07xAUnmhKE.jpg', '2024-02-08', 'Indonesia', '2024-02-08 00:49:04', '2024-02-16 06:31:40'),
(15, 'blog-kosmetik', 6, 'Muhammad Abdillah Asyhar', 'profile/xm940K04P0AQC4Xn4TkZBdgtLAPT93zEzHj3sjTu.jpg', 'test-5', 'test-5', '<div>test</div>', 'blog_image_update/sAqKXlTWOtFpSKNdXDo5Ophmx4nrd0PeYz71hQ71.jpg', '2024-02-14', 'Indonesia', '2024-02-14 09:32:08', '2024-02-15 23:39:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `kode_pos` char(255) DEFAULT NULL,
  `no_telepon` char(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `tentang_saya` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `is_online` tinyint(4) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `alamat`, `kota`, `negara`, `kode_pos`, `no_telepon`, `image`, `tentang_saya`, `email`, `email_verified_at`, `password`, `role`, `is_online`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdillah', 'Bumi Telukjambe Blok T/567 rt 006/ rw 011, Desa Sukaharja Kecamatan Telukjambe Timur, Kabupaten Karawang Jawa Barat', 'Karawang', 'Indonesia', '41361', '081386052762', 'profile/APHpRNYiltYiM7a5FICWNBjoh9f4feLTICiPsRbc.jpg', 'Saya Seorang Back End Web Developer PHP', 'mabdillahasyhar758@gmail.com', '2024-02-04 09:08:46', '$2y$12$K7k/CA8mUjZyHn/s.Qy67.OnedeJ4pphMyCK7XR.K2i2WlmeCgY5q', 1, 0, NULL, '2024-02-04 09:06:31', '2024-02-17 04:25:12'),
(7, 'Muhammad Abdillah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cahayabakery89@gmail.com', '2024-02-09 06:54:47', '$2y$12$5XzcokbCt2DVXJnpLT/MpuE7M8E3sDLtFxFUb/fmkcm2v.OmqHfwm', 0, 0, NULL, '2024-02-09 06:37:16', '2024-02-15 07:35:36'),
(8, 'Galih', 'Bumi Telukjambe Blok T/567 rt 006/ rw 011, Desa Sukaharja Kecamatan Telukjambe Timur, Kabupaten Karawang Jawa Barat', 'Karawang', 'Indonesia', '41361', '081386052908', 'profile/WCFk74dqui43Q6dZd8O6HTVy90U94PBdiNLvc2GT.jpg', NULL, 'cahayabakery624@gmail.com', '2024-02-09 08:39:26', '$2y$12$UOwWazQWkcE91rcDPxaX5uhMSX0DhkQYrAfkZxh.tuQZXPMsXbN7G', 0, 0, NULL, '2024-02-09 08:36:04', '2024-02-10 21:14:08'),
(9, 'Abdillahh', NULL, NULL, NULL, NULL, NULL, 'default.jpg', NULL, 'abdillahhh3144@gmail.com', NULL, '$2y$12$D2Ip5DH5DEXQyBqQHBiGQeM/tNKjalg41NSO9i0UVisQMl1yMaf5S', 0, 0, NULL, '2024-02-17 04:20:03', '2024-02-17 04:20:03'),
(10, 'Muhammad Abdillah Asyhar', NULL, NULL, NULL, NULL, NULL, 'default.jpg', NULL, 'muhammadabdillahasyhar68@gmail.com', '2024-02-17 04:26:19', '$2y$12$y6WgEEh.zrqaOwKCGpIKROMcYvw1Y9Jagl4qvp4CQtc2ZbXFJkeqC', 0, 0, NULL, '2024-02-17 04:25:51', '2024-02-17 04:26:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_category_slug_unique` (`category_slug`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
