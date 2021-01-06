-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 11:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE `checks` (
  `id` int(10) UNSIGNED NOT NULL,
  `host_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `last_run_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_run_output` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`last_run_output`)),
  `last_ran_at` timestamp NULL DEFAULT NULL,
  `next_run_in_minutes` int(11) DEFAULT NULL,
  `started_throttling_failing_notifications_at` timestamp NULL DEFAULT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`custom_properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`id`, `host_id`, `type`, `status`, `enabled`, `last_run_message`, `last_run_output`, `last_ran_at`, `next_run_in_minutes`, `started_throttling_failing_notifications_at`, `custom_properties`, `created_at`, `updated_at`) VALUES
(56, 9, 'diskspace', 'failed', 1, '30', '{\"output\":\"\",\"error_output\":\"\",\"exit_code\":1,\"exit_code_text\":\"General error\"}', '2020-11-09 16:09:18', 0, '2020-11-09 16:09:18', '[1]', '2020-10-20 07:43:00', '2020-11-09 16:09:18'),
(57, 9, 'elasticsearch', 'failed', 1, 'is not running', '{\"output\":\"\",\"error_output\":\"\",\"exit_code\":1,\"exit_code_text\":\"General error\"}', '2020-11-09 16:09:18', 0, '2020-11-09 16:09:18', '[]', '2020-10-20 07:43:00', '2020-11-09 16:09:18'),
(58, 9, 'memcached', 'failed', 1, 'is not running', '{\"output\":\"\",\"error_output\":\"\",\"exit_code\":1,\"exit_code_text\":\"General error\"}', '2020-11-09 16:09:18', 0, '2020-11-09 16:09:18', '[]', '2020-10-20 07:43:00', '2020-11-09 16:09:18'),
(59, 9, 'mysql', 'failed', 1, 'is not running', '{\"output\":\"\",\"error_output\":\"\",\"exit_code\":1,\"exit_code_text\":\"General error\"}', '2020-11-09 16:09:18', 0, '2020-11-09 16:09:18', '[]', '2020-10-20 07:43:00', '2020-11-09 16:09:18'),
(60, 9, 'apache', 'failed', 1, 'is not running', '{\"output\":\"\",\"error_output\":\"\",\"exit_code\":1,\"exit_code_text\":\"General error\"}', '2020-11-09 16:09:19', 0, '2020-11-09 16:09:18', '[]', '2020-10-20 07:43:00', '2020-11-09 16:09:19'),
(61, 9, 'beanstalkd', 'failed', 1, 'is not running', '{\"output\":\"\",\"error_output\":\"\",\"exit_code\":1,\"exit_code_text\":\"General error\"}', '2020-11-09 16:09:19', 0, '2020-11-09 16:09:19', '[]', '2020-10-20 07:43:00', '2020-11-09 16:09:19'),
(62, 9, 'cpu', 'not yet checked', 1, '41', NULL, NULL, NULL, NULL, '[1]', '2020-10-20 07:43:00', '2020-12-12 06:53:29'),
(63, 9, 'memory', 'success', 1, '30', NULL, NULL, NULL, NULL, '[1]', '2020-10-20 07:43:00', '2020-11-20 16:12:02'),
(80, 12, 'diskspace', 'not yet checked', 1, '30.6', NULL, NULL, NULL, NULL, '[]', '2020-11-09 16:09:04', '2020-11-09 16:09:04'),
(81, 12, 'elasticsearch', 'not yet checked', 1, NULL, NULL, NULL, NULL, NULL, '[]', '2020-11-09 16:09:04', '2020-11-09 16:09:04'),
(82, 12, 'memcached', 'not yet checked', 1, NULL, NULL, NULL, NULL, NULL, '[]', '2020-11-09 16:09:04', '2020-11-09 16:09:04'),
(83, 12, 'mysql', 'not yet checked', 1, NULL, NULL, NULL, NULL, NULL, '[]', '2020-11-09 16:09:04', '2020-11-09 16:09:04'),
(84, 12, 'apache', 'not yet checked', 1, NULL, NULL, NULL, NULL, NULL, '[]', '2020-11-09 16:09:04', '2020-11-09 16:09:04'),
(85, 12, 'beanstalkd', 'not yet checked', 1, NULL, NULL, NULL, NULL, NULL, '[]', '2020-11-09 16:09:04', '2020-11-09 16:09:04'),
(86, 12, 'cpu', 'not yet checked', 1, '3', NULL, NULL, NULL, NULL, '[]', '2020-11-09 16:09:04', '2020-12-12 06:53:29'),
(87, 12, 'memory', 'not yet checked', 1, '42', NULL, NULL, NULL, NULL, '[]', '2020-11-09 16:09:04', '2020-11-20 16:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `hosts`
--

CREATE TABLE `hosts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssh_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`custom_properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hosts`
--

INSERT INTO `hosts` (`id`, `name`, `ssh_user`, `port`, `ip`, `custom_properties`, `created_at`, `updated_at`) VALUES
(9, 'server1', 'root', 22, '52.2.94.107', '0', '2020-10-20 07:43:00', '2020-12-12 06:28:04'),
(12, 'server2', 'root', 22, '52.2.94.107', '1', '2020-11-09 16:09:04', '2020-12-12 06:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `log_status`
--

CREATE TABLE `log_status` (
  `id_log` int(11) NOT NULL,
  `id_hosts` int(10) UNSIGNED DEFAULT NULL,
  `persentase` float DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_status`
--

INSERT INTO `log_status` (`id_log`, `id_hosts`, `persentase`, `waktu`) VALUES
(1, 9, 3, '2020-12-08 14:04:02'),
(2, 12, 31, '2020-12-28 14:12:12'),
(3, 12, 42, '2020-12-28 14:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_09_09_154748_create_status_servers_table', 2),
(7, '2020_09_09_1730371_create_hosts_table', 3),
(8, '2020_09_09_1730372_create_checks_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_servers`
--

CREATE TABLE `status_servers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpu` int(11) NOT NULL,
  `lv1` int(11) NOT NULL,
  `lv2` int(11) NOT NULL,
  `lv3` int(11) NOT NULL,
  `memory` int(11) NOT NULL,
  `memorySwap` int(11) NOT NULL,
  `disk` int(11) NOT NULL,
  `memoryPhp` int(11) NOT NULL,
  `processPhp` int(11) NOT NULL,
  `fpm_idle_processes` int(11) NOT NULL,
  `fpm_active_processes` int(11) NOT NULL,
  `fpm_slow_requests` int(11) NOT NULL,
  `fpm_listen_queue` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'ok', 'ok@gmail.com', NULL, '$2y$10$IySHv7KThdpfj1u9llHf.eoiVvK/5gPUFYy9wzv5XuJyhUZpPlNkW', NULL, '2020-08-28 02:22:17', '2020-08-28 02:22:17'),
(2, 'admin1', 'admin1@gmail.com', NULL, '$2y$10$vjcAE.UQLBX1onEelIIeY.zBLYT3UB1KoGQ6Fal/LO5lBCh0lJ47y', 'IQDtxj6dMdUScW9GYSv7PSojF33NZG16FutVWckvF51MTYgHZhdt28t1rdlM', '2020-09-09 07:15:37', '2020-09-09 07:15:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checks_host_id_foreign` (`host_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosts`
--
ALTER TABLE `hosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_status`
--
ALTER TABLE `log_status`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_log_hosts` (`id_hosts`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `status_servers`
--
ALTER TABLE `status_servers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hosts`
--
ALTER TABLE `hosts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log_status`
--
ALTER TABLE `log_status`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_servers`
--
ALTER TABLE `status_servers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_host_id_foreign` FOREIGN KEY (`host_id`) REFERENCES `hosts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `log_status`
--
ALTER TABLE `log_status`
  ADD CONSTRAINT `fk_log_hosts` FOREIGN KEY (`id_hosts`) REFERENCES `hosts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
