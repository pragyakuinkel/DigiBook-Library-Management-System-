-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 11:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(8, 'JD Salinger', 'jdsalinger@gmail.com', '2024-12-30 18:56:14', '2024-12-30 18:56:14'),
(9, 'Markus Zusak', 'markuszusak@gmail.com', '2024-12-30 18:56:59', '2024-12-30 18:56:59'),
(10, 'George Orwell', 'georgeorwell@gmail.com', '2024-12-30 18:57:22', '2024-12-30 18:57:22'),
(11, 'Paulo Coelho', 'paulocoelho@gmail.com', '2024-12-30 18:57:47', '2024-12-30 18:57:47'),
(12, 'Harper Lee', 'harperlee@gmail.com', '2024-12-30 18:57:55', '2024-12-30 18:57:55'),
(13, 'Cormac McCarthy', 'cormacmccarthy@gmail.com', '2024-12-30 19:09:06', '2024-12-30 19:09:06'),
(14, 'Alex Michaelides', 'alexmichaelides@gmail.com', '2024-12-30 19:20:08', '2024-12-30 19:20:08'),
(15, 'Liane Moriarty', 'lianemoriarty@gmail.com', '2024-12-30 19:20:40', '2024-12-30 19:20:40'),
(16, 'Erin Morgenstern', 'erinmorgenstern@gmail.com', '2024-12-30 19:21:04', '2024-12-30 19:21:04'),
(17, 'Paula Hawkins', 'paulahawkins@gmail.com', '2024-12-30 19:22:25', '2024-12-30 19:22:25'),
(18, 'Delia Owens', 'deliaowens@gmail.com', '2024-12-30 19:22:59', '2024-12-30 19:22:59'),
(19, 'Gillian Flynn', 'gillianflynn@gmail.com', '2024-12-31 01:29:55', '2024-12-31 01:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `publication` varchar(255) NOT NULL,
  `publication_year` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `available_copy` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `isbn`, `publication`, `publication_year`, `availability`, `available_copy`, `image`, `created_at`, `updated_at`) VALUES
(19, 'The Catcher in the Rye', '9780316769488', '16', '1951-07-16', 'Available', 5, 'photos/UojJttNSZKaUPCWZNbHnjkGQxGNWBYaVwar66p0I.jpg', '2024-12-30 23:17:20', '2024-12-30 23:17:20'),
(20, 'The Book Thief', '9780375842207', '17', '2005-03-14', 'Available', 12, 'photos/vFI1YQvytCwj2VeWaHXRZCZZrGScy8q4q3DZnfbH.jpg', '2024-12-30 23:19:01', '2024-12-30 23:19:01'),
(21, '1984', '9780451524935', '18', '1949-06-08', 'Available', 11, 'photos/HVLSmWy43t1y3HCkeLl3LFwPrUNRXPaYgLWp2Zov.jpg', '2024-12-31 00:59:55', '2024-12-31 00:59:55'),
(22, 'The Alchemist', '9780061122415', '19', '1988-05-01', 'Available', 4, 'photos/b5GmbqLXI6tBxzjpjLbs1dZaJEjF7IJj780TeOQ7.jpg', '2024-12-31 01:01:36', '2024-12-31 01:01:36'),
(23, 'To Kill a Mockingbird', '9780060935467', '19', '1960-07-11', 'Available', 10, 'photos/dsjv4RlSRVfMxyoxMXysq3YkEN0XUMiYhOVEcsxB.jpg', '2024-12-31 01:05:05', '2024-12-31 01:05:05'),
(24, 'The Road', '9780374533557', '20', '2006-09-26', 'Available', 18, 'photos/KTfR0aT4xoOWQkcBLVNCBDcI6hRhwlj0mKC3K1RM.jpg', '2024-12-31 01:06:47', '2024-12-31 01:06:47'),
(25, 'The Silent Patient', '9781501180989', '21', '2019-02-05', 'Available', 8, 'photos/L6qswhv9oN3G7DR4yas9nqc22nKmCwRoICX3Ikml.jpg', '2024-12-31 01:16:36', '2024-12-31 01:16:36'),
(26, 'Big Little Lies', '9781451673319', '22', '2014-07-29', 'Available', 12, 'photos/jzZtp0G2homOKYuNKAoqmS3tgetQN9wj19Ubvl9Y.jpg', '2024-12-31 01:18:09', '2024-12-31 01:18:09'),
(27, 'The Night Circus', '9780062315007', '23', '2011-09-13', 'Available', 11, 'photos/wimtOmQQgAZ6nQGkcw9n3JqwXlUWImf9cskS6kAZ.jpg', '2024-12-31 01:22:16', '2024-12-31 01:22:16'),
(28, 'Where the Crawdads Sing', '9780374287032', '27', '2018-08-14', 'Available', 9, 'photos/cbkaGdmRuZHpC1BdKLGvKYHAqY2DyXFvQkd74IPy.jpg', '2024-12-31 01:24:26', '2024-12-31 01:25:34'),
(29, 'The Girl on the Train', '9781447264536', '24', '2015-01-13', 'Available', 9, 'photos/trrxxX8M5YhLFYweL1nKgdwxS2F9yVkZOWBfZeL6.jpg', '2024-12-31 01:27:21', '2024-12-31 01:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`book_id`, `author_id`, `created_at`, `updated_at`) VALUES
(19, 8, '2024-12-30 23:17:20', '2024-12-30 23:17:20'),
(20, 9, '2024-12-30 23:19:01', '2024-12-30 23:19:01'),
(21, 10, '2024-12-31 00:59:55', '2024-12-31 00:59:55'),
(22, 11, '2024-12-31 01:01:36', '2024-12-31 01:01:36'),
(23, 12, '2024-12-31 01:05:05', '2024-12-31 01:05:05'),
(24, 13, '2024-12-31 01:06:47', '2024-12-31 01:06:47'),
(25, 14, '2024-12-31 01:16:36', '2024-12-31 01:16:36'),
(26, 15, '2024-12-31 01:18:09', '2024-12-31 01:18:09'),
(27, 16, '2024-12-31 01:22:16', '2024-12-31 01:22:16'),
(28, 18, '2024-12-31 01:24:26', '2024-12-31 01:24:26'),
(29, 17, '2024-12-31 01:27:21', '2024-12-31 01:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`book_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(19, 19, '2024-12-30 23:17:20', '2024-12-30 23:17:20'),
(20, 19, '2024-12-30 23:19:01', '2024-12-30 23:19:01'),
(20, 23, '2024-12-30 23:19:01', '2024-12-30 23:19:01'),
(21, 19, '2024-12-31 00:59:55', '2024-12-31 00:59:55'),
(22, 19, '2024-12-31 01:01:36', '2024-12-31 01:01:36'),
(23, 19, '2024-12-31 01:05:05', '2024-12-31 01:05:05'),
(24, 19, '2024-12-31 01:06:47', '2024-12-31 01:06:47'),
(25, 19, '2024-12-31 01:16:36', '2024-12-31 01:16:36'),
(26, 19, '2024-12-31 01:18:09', '2024-12-31 01:18:09'),
(26, 27, '2024-12-31 01:18:09', '2024-12-31 01:18:09'),
(27, 29, '2024-12-31 01:22:44', '2024-12-31 01:22:44'),
(28, 27, '2024-12-31 01:24:26', '2024-12-31 01:24:26'),
(29, 30, '2024-12-31 01:27:50', '2024-12-31 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `borrowed_at` timestamp NULL DEFAULT NULL,
  `returned_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `book_id`, `user_id`, `borrowed_at`, `returned_at`, `created_at`, `updated_at`) VALUES
(1, 27, 3, '2025-01-05 04:56:22', NULL, '2025-01-05 04:56:22', '2025-01-05 04:56:22'),
(2, 29, 3, '2025-01-05 04:56:28', NULL, '2025-01-05 04:56:28', '2025-01-05 04:56:28'),
(4, 24, 3, '2025-01-05 04:56:39', NULL, '2025-01-05 04:56:39', '2025-01-05 04:56:39'),
(5, 21, 3, '2025-01-05 04:56:45', '2025-01-05 04:56:59', '2025-01-05 04:56:45', '2025-01-05 04:56:45'),
(6, 28, 3, '2025-01-05 04:56:50', NULL, '2025-01-05 04:56:50', '2025-01-05 04:56:50'),
(7, 21, 3, '2025-01-05 04:57:01', NULL, '2025-01-05 04:57:01', '2025-01-05 04:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'Science', '2024-12-30 16:01:53', '2024-12-30 16:01:53'),
(19, 'Fiction', '2024-12-30 18:31:49', '2024-12-30 18:31:49'),
(20, 'Self Help', '2024-12-30 18:32:35', '2024-12-30 18:32:35'),
(21, 'Poetry', '2024-12-30 18:32:42', '2024-12-30 18:32:42'),
(22, 'Adventure', '2024-12-30 18:32:52', '2024-12-30 18:32:52'),
(23, 'Historical', '2024-12-30 18:33:31', '2024-12-30 18:33:31'),
(24, 'Programming', '2024-12-30 18:33:39', '2024-12-30 18:33:39'),
(25, 'Technology', '2024-12-30 18:33:54', '2024-12-30 18:33:54'),
(26, 'Cookbook', '2024-12-30 18:34:05', '2024-12-30 18:34:05'),
(27, 'Mystery', '2024-12-30 18:34:15', '2024-12-30 18:34:15'),
(28, 'Travel & Food', '2024-12-30 18:36:00', '2024-12-30 18:36:00'),
(29, 'Fantasy', '2024-12-31 01:22:27', '2024-12-31 01:22:27'),
(30, 'Thriller', '2024-12-31 01:27:33', '2024-12-31 01:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_23_065504_publishers', 1),
(6, '2024_12_23_102829_create_authors_table', 1),
(7, '2024_12_25_031012_create_books_table', 1),
(8, '2024_12_25_031134_create_genres_table', 1),
(9, '2024_12_25_031409_create_book_authors_table', 1),
(10, '2024_12_25_031518_create_book_genres_table', 1),
(11, '2024_12_26_074506_create_reviews_table', 1),
(12, '2024_12_28_032901_add_available_copy_to_books', 1),
(13, '2024_12_28_050434_create_borrowers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `email`, `address`, `created_at`, `updated_at`) VALUES
(16, 'Little, Brown and Company', 'littlebrown@gmail.com', '1745 Broadway, New York, NY 10019, USA', '2024-12-30 20:44:53', '2024-12-30 20:44:53'),
(17, 'Alfred A. Knopf', 'knopfdoubleday@gmail.com', '1745 Broadway, New York, NY 10019, USA', '2024-12-30 20:45:43', '2024-12-30 20:45:43'),
(18, 'Signet Classics', 'penguin@gmail.com', '1745 Broadway, New York, NY 10019, USA', '2024-12-30 20:46:23', '2024-12-30 20:46:23'),
(19, 'HarperCollins', 'general@harpercollins.com', '195 Broadway, New York, NY 10007, USA', '2024-12-30 20:46:51', '2024-12-30 20:46:51'),
(20, 'Picador', 'macmillan@gmail.com', '175 Fifth Avenue, New York, NY 10010, USA', '2024-12-30 23:03:32', '2024-12-30 23:03:32'),
(21, 'Celadon Books', 'celadonbooks@gmail.com', '175 Fifth Avenue, New York, NY 10010, USA', '2024-12-30 23:07:45', '2024-12-30 23:07:45'),
(22, 'Amy Einhorn Books', 'penguinrandomhouse@gmail.com', '375 Hudson Street, New York, NY 10014, USA', '2024-12-30 23:09:39', '2024-12-30 23:09:39'),
(23, 'Doubleday', 'doubleday@gmail.com', '1745 Broadway, New York, NY 10019, USA', '2024-12-30 23:10:57', '2024-12-30 23:10:57'),
(24, 'Riverhead Books', 'riverheadbooks@penguinrandomhouse.com', '175 Fifth Avenue, New York, NY 10010, USA', '2024-12-30 23:11:45', '2024-12-30 23:11:45'),
(25, 'Crown Publishing Group', 'crownpublishinggroup@gmail.com', '1745 Broadway, New York, NY 10019, USA', '2024-12-30 23:13:16', '2024-12-30 23:13:16'),
(26, 'Scholastic Press', 'scholastic@gmail.com', '557 Broadway, New York, NY 10012, USA', '2024-12-30 23:14:03', '2024-12-30 23:14:03'),
(27, 'G.P. Putnam\'s Sons', 'gputnamsons@gmail.com', '1745 Broadway, New York, NY 10019, USA', '2024-12-31 01:25:09', '2024-12-31 01:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `publisher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review` varchar(255) NOT NULL,
  `reviewable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Pragya', 'pragya@gmail.com', NULL, '$2y$10$X4o0bu2H.9DQeLECQEHH5OI1Ol6olaYHNw5kQ25ZSPyz/LWc.SE3.', 0, NULL, '2025-01-05 04:56:17', '2025-01-05 04:56:17'),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$10$C53wHvlsm0e0MYfeIGFpFOdtGnSUaVP3vyRhPY76qjPb6V211exfC', 1, NULL, '2025-01-05 04:57:20', '2025-01-05 04:57:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_email_unique` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`);

--
-- Indexes for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD PRIMARY KEY (`book_id`,`author_id`),
  ADD KEY `book_authors_author_id_foreign` (`author_id`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`book_id`,`genre_id`),
  ADD KEY `book_genres_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowers_book_id_foreign` (`book_id`),
  ADD KEY `borrowers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `publishers_email_unique` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`),
  ADD KEY `reviews_author_id_foreign` (`author_id`),
  ADD KEY `reviews_publisher_id_foreign` (`publisher_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD CONSTRAINT `book_authors_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_authors_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD CONSTRAINT `book_genres_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD CONSTRAINT `borrowers_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
