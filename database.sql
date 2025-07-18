-- --------------------------------------------------------
-- Host:                         103.15.226.176
-- Server version:               10.6.22-MariaDB-cll-lve-log - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table teamclov_demo_10.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.cache: ~0 rows (approximately)

-- Dumping structure for table teamclov_demo_10.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.cache_locks: ~0 rows (approximately)

-- Dumping structure for table teamclov_demo_10.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table teamclov_demo_10.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `foto` text DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guru_id_user_unique` (`id_user`),
  UNIQUE KEY `guru_nama_guru_unique` (`nama_guru`),
  UNIQUE KEY `guru_nip_unique` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.guru: ~1 rows (approximately)
REPLACE INTO `guru` (`id`, `id_user`, `nama_guru`, `nip`, `jenis_kelamin`, `foto`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
	(1, 6, 'Winta', '199606122022031004', 'P', NULL, 'Solok', '082285498005', '2025-07-13 09:18:38', '2025-07-13 09:18:38'),
	(2, 7, 'wiza', '1996122420250302', 'P', 'guru/YMrJz7GY43od3vmKGDAQlLLMNgI0bTGGQaBVoWol.jpg', 'Batu Bajanjang', '0813245678', '2025-07-13 12:59:11', '2025-07-13 12:59:11');

-- Dumping structure for table teamclov_demo_10.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.jobs: ~0 rows (approximately)

-- Dumping structure for table teamclov_demo_10.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.job_batches: ~0 rows (approximately)

-- Dumping structure for table teamclov_demo_10.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) NOT NULL,
  `id_guru` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelas_nama_kelas_unique` (`nama_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.kelas: ~6 rows (approximately)
REPLACE INTO `kelas` (`id`, `nama_kelas`, `id_guru`, `created_at`, `updated_at`) VALUES
	(5, 'Kelas 2', '', '2025-07-09 15:37:51', '2025-07-09 15:37:51'),
	(6, 'Kelas 3', '', '2025-07-09 15:37:58', '2025-07-09 15:37:58'),
	(7, 'Kelas 4', '', '2025-07-09 21:02:43', '2025-07-09 21:02:43'),
	(8, 'Kelas 5', '', '2025-07-09 21:02:51', '2025-07-09 21:02:51'),
	(9, 'Kelas 6', '', '2025-07-09 21:02:58', '2025-07-09 21:02:58'),
	(10, 'Tes kelas', '1', '2025-07-13 12:56:37', '2025-07-13 12:56:37');

-- Dumping structure for table teamclov_demo_10.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.migrations: ~8 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_07_06_102612_create_personal_access_tokens_table', 1),
	(5, '2025_07_09_071454_guru', 1),
	(6, '2025_07_09_091149_kelas', 1),
	(7, '2025_07_09_091203_siswa', 1),
	(8, '2025_07_09_110019_orang_tua', 1);

-- Dumping structure for table teamclov_demo_10.orang_tua
CREATE TABLE IF NOT EXISTS `orang_tua` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('Ayah','Ibu') NOT NULL DEFAULT 'Ayah',
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.orang_tua: ~6 rows (approximately)
REPLACE INTO `orang_tua` (`id`, `id_siswa`, `nama`, `jenis`, `pekerjaan`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Budi', 'Ayah', 'Petani', 'Solok', '082285498005', '2025-07-13 08:42:30', '2025-07-13 08:42:30'),
	(2, 2, 'Lala', 'Ibu', 'Petani', 'Solok', '082285498005', '2025-07-13 08:42:30', '2025-07-13 08:42:30'),
	(3, 3, 'Arianto', 'Ayah', 'PNS', 'Solok', '082285498005', '2025-07-13 08:43:24', '2025-07-13 08:43:24'),
	(4, 3, 'Yani', 'Ibu', 'PNS', 'Solok', '082285498005', '2025-07-13 08:43:24', '2025-07-13 08:43:24'),
	(5, 4, 'didi', 'Ayah', 'pns', 'solok', '081245124521', '2025-07-13 12:54:16', '2025-07-13 12:54:16'),
	(6, 4, 'lili', 'Ibu', 'rt', 'solok', '123456707656', '2025-07-13 12:54:16', '2025-07-13 12:54:16');

-- Dumping structure for table teamclov_demo_10.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table teamclov_demo_10.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table teamclov_demo_10.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.sessions: ~0 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('9TOlJ6yILiP4rEnJr1UM0mjRv97lKjAO19Trqqng', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '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', 1752098839);

-- Dumping structure for table teamclov_demo_10.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `foto` text DEFAULT NULL,
  `alamat` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siswa_nis_unique` (`nisn`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.siswa: ~1 rows (approximately)
REPLACE INTO `siswa` (`id`, `nama_siswa`, `nisn`, `jenis_kelamin`, `foto`, `alamat`, `id_kelas`, `created_at`, `updated_at`) VALUES
	(4, 'budi', '1234', 'L', NULL, 'solok', 5, '2025-07-13 12:54:16', '2025-07-13 12:54:16');

-- Dumping structure for table teamclov_demo_10.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teamclov_demo_10.users: ~2 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$TB9HQUH2KPjEF7aYHKtB.e1o6TMT25zhlL5WBKykc.0nW4nSx4UKe', 'admin', NULL, '2025-07-09 12:01:57', '2025-07-13 10:24:36'),
	(6, 'Winta', 'guru@gmail.com', NULL, '$2y$12$ZcSjzN3zSUvFcwB49V32U.FEYG6fxyoZIDHqYGPMHtrvtWJafMqL2', 'guru', NULL, '2025-07-13 09:18:38', '2025-07-13 10:28:05'),
	(7, 'wiza', 'wiza@gmail.com', NULL, '$2y$12$EDeOVRf4.qYztq4.HkLxe.a9ywx9DxbtCSXobgdYL16pbqE.kLK3y', 'guru', NULL, '2025-07-13 12:59:10', '2025-07-13 13:00:08');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
