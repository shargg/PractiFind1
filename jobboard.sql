-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 11:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `module_id`, `user_id`, `description`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here Description goes here .', 'uploads/contract-yamadayosuke_1645783935.pdf', '2022-02-25 10:12:15', '2022-02-25 10:12:15'),
(2, 1, 3, 'This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1This is the description of student1.', 'uploads/contract-yamadayosuke_1645784256.pdf', '2022-02-25 10:17:36', '2022-02-25 10:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `user_id`, `board_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'This is the application of teacher', '2022-02-25 10:54:21', '2022-02-25 10:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'First job', 'This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job This is the first job', '2022-02-25 10:05:14', '2022-02-25 10:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_11_202057_create_messages_table', 1),
(4, '2017_02_11_223846_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'First module', 'This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module This is the first module .', '2022-02-25 10:05:44', '2022-02-25 10:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0 : student, 1 : teacher',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', 'teacher@gmail.com', 1, '$2y$10$wfNH9sAu7y7LeB3ee9nkIOLJ8l.YRl2sNUR9dI1FlIQZS4wbrLkca', 'lQZouE6tWFrKKKp5lAv1rYlpjZZdqKOYEYkpsTP8vEfBc2up0tQzt1iWIROp', '2022-02-25 13:44:24', '2022-02-25 13:44:24'),
(2, 'Student', 'student@gmail.com', 0, '$2y$10$Ib9b8pKdHXoRIK5WnYP80u1ZnFbOLePdcy6UXGEbFjd/PpqFCE5nq', 'l0hp8fNtMmNOSHKjUaTdLvhir1e929SaGZmsIs0irdKDwZyc6NnYZKTEzhvz', '2022-02-25 13:45:13', '2022-02-25 13:45:13'),
(3, 'student1', 'student1@gmail.com', 0, '$2y$10$kMYTSArshXaicgOn6cvqcOaI.a6pvyptgGIw7rBX/HJBp0v9F79v6', 'espNslFxlNv2TLoXBhUm6IQiuUJ8v8UqEVFhSZvj03TiVccb02rLoBf37Xqd', '2022-02-25 15:17:02', '2022-02-25 15:17:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
