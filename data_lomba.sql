-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2024 pada 17.52
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
-- Database: `data_lomba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'administrator', 'Administrator'),
(2, 'user', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 24),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 25),
(2, 26),
(2, 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'petertohahaha@gmail.com', 22, '2024-01-13 09:04:29', 1),
(2, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 00:00:04', 1),
(3, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 10:12:04', 1),
(4, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 10:54:21', 1),
(5, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 12:11:34', 1),
(6, '::1', 'gintama404', NULL, '2024-01-14 13:38:14', 0),
(7, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 13:38:22', 1),
(8, '::1', 'gintama404', NULL, '2024-01-14 13:39:34', 0),
(9, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 13:39:41', 1),
(10, '::1', 'gintama404', NULL, '2024-01-14 13:40:10', 0),
(11, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 13:40:25', 1),
(12, '::1', 'gintama404', NULL, '2024-01-14 13:41:59', 0),
(13, '::1', 'gintama404', NULL, '2024-01-14 13:42:08', 0),
(14, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 13:42:16', 1),
(15, '::1', 'gintama404', NULL, '2024-01-14 13:51:23', 0),
(16, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 13:51:31', 1),
(17, '::1', 'gintama404', NULL, '2024-01-14 14:04:29', 0),
(18, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 14:06:49', 1),
(19, '::1', 'gintama405', NULL, '2024-01-14 14:09:28', 0),
(20, '::1', 'gintama405', NULL, '2024-01-14 14:09:41', 0),
(21, '::1', 'gintama404', NULL, '2024-01-14 14:09:47', 0),
(22, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 14:09:55', 1),
(23, '::1', 'gintama404', NULL, '2024-01-14 14:10:36', 0),
(24, '::1', 'gintama404', NULL, '2024-01-14 14:11:37', 0),
(25, '::1', 'gintama404', NULL, '2024-01-14 14:11:45', 0),
(26, '::1', 'gintama404', NULL, '2024-01-14 14:11:54', 0),
(27, '::1', 'gintama404', NULL, '2024-01-14 14:12:38', 0),
(28, '::1', 'rizkyagusti7@gmail.com', 26, '2024-01-14 14:13:04', 1),
(29, '::1', 'rizkyagusti7@gmail.com', 26, '2024-01-14 14:13:41', 1),
(30, '::1', 'backupnyagus@gmail.com', 24, '2024-01-14 16:02:03', 1),
(31, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 16:12:24', 1),
(32, '::1', 'backupnyagus@gmail.com', 24, '2024-01-14 16:26:31', 1),
(33, '::1', 'backupnyagus@gmail.com', 24, '2024-01-14 16:27:30', 1),
(34, '::1', 'gintama404', NULL, '2024-01-14 16:28:54', 0),
(35, '::1', 'backupnyagus2@gmail.com', 25, '2024-01-14 16:29:25', 1),
(36, '::1', 'gintama403', NULL, '2024-01-14 16:31:44', 0),
(37, '::1', 'backupnyagus@gmail.com', 24, '2024-01-14 16:31:53', 1),
(38, '::1', 'bisa@bisa.com', 27, '2024-01-14 16:47:42', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_lomba_now`
--

CREATE TABLE `data_lomba_now` (
  `id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `namalomba` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `tanggal1` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_lomba_now`
--

INSERT INTO `data_lomba_now` (`id`, `event`, `namalomba`, `keterangan`, `tanggal`, `tanggal1`) VALUES
(66, 'Liga Pecel', 'Catur Dewasa', 'Memiliki Catur', '2024-01-14', NULL),
(69, 'Liga Pecel', 'Futsal Dewasa', 'Memakai baju futsal', '2024-01-14', NULL),
(70, 'Liga Pecel', 'Catur', 'Memiliki Catur', '2024-01-17', NULL),
(71, 'Liga Pecel', 'Renang', 'Memiliki Catur', '2024-01-20', NULL),
(74, 'Liga Pecel', 'Renang', 'Memiliki Baju Renang', '2024-01-18', NULL),
(75, 'Liga Pecel', 'Renang', 'Memiliki Baju Renang', '2024-01-02', NULL),
(77, 'Liga Pecel', 'Judi 2', 'Kartu Judi', '2024-01-05', NULL),
(78, 'Liga Pecel', 'Judi', 'Kartu Judi', '2024-01-26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `nama_lomba` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `juara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id`, `nama_mahasiswa`, `kelas`, `nama_lomba`, `kategori`, `juara`) VALUES
(7, 'Renaldi Pratama', '2 Elektronika B', 'Lomba Tidur', 'kota ', '1st'),
(8, 'Renaldi Pratama', '2 Elektronika B', 'Lomba Makan', 'kota ', '2nd'),
(11, 'Agusti', '2 Elektronika A', 'Hackaton2', 'Kabupaten', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1704531793, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 'backupnyagus@gmail.com', 'gintama405', '$2y$10$TpaRZeH0cnNGj5akngjtRepRFKanSHRCmWJYr5S8B.i4nsfLAFj7a', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-13 09:12:16', '2024-01-14 16:01:39', NULL),
(25, 'backupnyagus2@gmail.com', 'gintama404', '$2y$10$UBl.Pv1ZAr4LN0NQ9ZCO5Ox7WAHWMgZpNlq1WNwzp0koE9BemIJy2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-13 23:59:24', '2024-01-14 16:12:04', NULL),
(26, 'rizkyagusti7@gmail.com', 'gintama403', '$2y$10$BEl3NuIPNEtRMndtY/RQfuAvHCFmwsL6m9po9m.IKUdzgZXVAnWP2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-14 14:12:58', '2024-01-14 14:13:24', NULL),
(27, 'bisa@bisa.com', 'admin', '$2y$10$iPY0CX7crdnfedvtuv2abuIm5djzoZf7H5Cxcm8gri01w2yNML.im', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-14 16:47:16', '2024-01-14 16:47:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_lomba_now`
--
ALTER TABLE `data_lomba_now`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_lomba_now`
--
ALTER TABLE `data_lomba_now`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
