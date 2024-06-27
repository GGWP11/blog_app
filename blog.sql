-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 08:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2023_04_28_163314_create_types_table', 1),
(6, '2023_05_02_081346_create_categories_table', 2),
(7, '2023_05_02_082828_create_posts_table', 2),
(8, '2023_05_05_145240_create_reviews_table', 3);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_slug` varchar(255) DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `post_title`, `post_slug`, `post_content`, `featured_image`, `created_at`, `updated_at`) VALUES
(3, 1, 'How to update Image', NULL, 'testing update imageasasd', '1683029956_images.png', '2023-05-02 02:28:38', '2023-05-02 04:19:16'),
(4, 1, 'Update Article', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi lacus sed viverra tellus in hac. Eget dolor morbi non arcu risus. Imperdiet sed euismod nisi porta lorem mollis aliquam ut. Urna neque viverra justo nec ultrices dui. Libero justo laoreet sit amet cursus sit. Vestibulum lectus mauris ultrices eros in cursus turpis massa. Aliquam purus sit amet luctus venenatis lectus magna fringilla urna. Urna nunc id cursus metus aliquam eleifend mi in. Natoque penatibus et magnis dis parturient montes nascetur ridiculus. Egestas integer eget aliquet nibh praesent tristique magna sit. Neque convallis a cras semper auctor neque vitae tempus quam. Massa ultricies mi quis hendrerit dolor magna eget.\r\n\r\nBlandit turpis cursus in hac habitasse platea dictumst quisque sagittis. Dolor magna eget est lorem ipsum. Non arcu risus quis varius. Dignissim cras tincidunt lobortis feugiat vivamus. Auctor augue mauris augue neque. Amet commodo nulla facilisi nullam vehicula. Ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. Aenean et tortor at risus viverra adipiscing at in tellus. Mauris augue neque gravida in fermentum et sollicitudin ac. Turpis massa sed elementum tempus.', '1683030580_testupdate.jpg', '2023-05-02 02:32:43', '2023-05-05 09:31:41'),
(5, 1, 'Lorem Ipsum', 'lorem-ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum scelerisque consectetur elit. Proin dictum sem facilisis nunc cursus aliquet. Phasellus et tincidunt enim, quis tempus mauris. Proin sed lobortis odio. Sed luctus euismod nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam sit amet suscipit ligula. Morbi leo dui, porttitor at turpis in, faucibus dictum ligula. Nunc sit amet nisi ipsum. Integer eu libero vitae leo ullamcorper laoreet.\r\n\r\nNulla tincidunt dapibus nibh a hendrerit. Sed eu egestas sapien, sed cursus lectus. Sed fermentum libero commodo tortor imperdiet ornare. Nunc efficitur tincidunt gravida. Suspendisse rhoncus ac lorem nec rhoncus. Vivamus scelerisque sagittis rhoncus. Morbi efficitur, quam sit amet vehicula facilisis, tortor risus porta mauris, id aliquet ipsum erat vitae augue. Sed et metus nec eros rutrum auctor ornare sit amet velit. Nulla facilisi.\r\n\r\nDonec sed pretium eros. Pellentesque tristique enim quis lorem gravida semper. Praesent a efficitur risus. In interdum accumsan ultrices. Aenean pellentesque eros at tellus ornare egestas. Proin laoreet ante eu neque luctus vulputate. Etiam sed magna orci. Pellentesque id ex turpis. Integer vestibulum elementum neque quis rutrum. Proin scelerisque gravida elit, malesuada finibus ligula iaculis eget. Curabitur nec dapibus leo. Nam eu dapibus leo, eu vulputate dui. Nullam turpis nunc, tincidunt ac risus nec, aliquam laoreet dui. Aliquam velit elit, sollicitudin vel magna a, bibendum vulputate dui. Fusce tempor, est vel faucibus rhoncus, nisl ex vehicula mauris, nec luctus dolor turpis quis nibh.\r\n\r\nNunc facilisis, felis sit amet euismod elementum, erat nulla dictum nunc, eu ornare nisl neque vitae eros. Praesent facilisis nulla quis magna dignissim elementum. Vivamus euismod pellentesque libero. Nullam quis nunc arcu. Aliquam fringilla quam efficitur diam interdum aliquet. Morbi sit amet lacus a tellus semper tristique. Suspendisse ultrices euismod ultricies. Nunc luctus erat dui, et fringilla odio scelerisque nec. In venenatis mollis vestibulum. Sed nisi augue, molestie id diam in, ullamcorper commodo justo. Ut ultricies ornare arcu. Aenean in condimentum ex, in tempor libero. Mauris et vulputate risus. Phasellus tempor consectetur elementum. Vestibulum in dui ut tortor viverra mollis.\r\n\r\nSed diam ex, dignissim at consequat sit amet, finibus et lacus. Curabitur bibendum felis quis orci viverra, vitae ornare leo rhoncus. Nunc varius scelerisque sem, sed vehicula leo consectetur ut. Aliquam nec viverra felis. Fusce eget ex pharetra, iaculis nisl vel, vulputate felis. Suspendisse dignissim pretium urna non blandit. Etiam eget ex et tortor dignissim tristique. Suspendisse pretium nibh eu facilisis tempus. Duis gravida sem magna, quis ullamcorper metus molestie in. Quisque a urna eu augue egestas tincidunt vitae quis mi. Aliquam quis tortor in odio feugiat pulvinar sed vitae lorem. Pellentesque vel iaculis diam. Proin a lacus ornare, eleifend magna et, dapibus quam. Suspendisse pharetra dui non lobortis scelerisque.', '1683307536_1Dnajl.jpg', '2023-05-05 09:25:36', '2023-05-05 09:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `post_id`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 'good article', 5, NULL, NULL),
(2, 3, 'This article is well-written! Helped me to solve my problem.. 5 STARS', 5, NULL, NULL),
(3, 3, 'Great article!', 3, '2023-05-05 09:09:29', '2023-05-05 09:09:29'),
(4, 4, 'This article is very helpful!', 4, '2023-05-05 09:09:53', '2023-05-05 09:09:53'),
(5, 5, 'Great share!', 4, '2023-05-05 21:09:51', '2023-05-05 21:09:51'),
(6, 3, 'Test comment', 3, '2023-05-05 21:14:26', '2023-05-05 21:14:26'),
(7, 5, 'Test comment', 1, '2023-05-05 21:17:42', '2023-05-05 21:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin/Super Author', NULL, NULL),
(2, 'Author', NULL, NULL);

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
  `username` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `biography` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT 2,
  `blocked` int(11) NOT NULL DEFAULT 0,
  `direct_publish` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `picture`, `biography`, `type`, `blocked`, `direct_publish`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'BlogAdmin', 'blogadmin@gmail.com', NULL, '$2y$10$fNEFIycvyYktQYafpiNFJ.vEOgaFl3KTi2mlXLD.flBPD7od1EAKe', 'BlogAdmin123', NULL, '', 1, 0, 1, NULL, NULL, NULL),
(2, 'BlogUser', 'bloguser@gmail.com', NULL, '$2y$10$4t3NGBiaeKavN/Ufxl1eQOxc6CeIm3UdbsUwaBuPkl5bYtUOT5Eu2', 'BlogUser123', NULL, '', 2, 0, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
