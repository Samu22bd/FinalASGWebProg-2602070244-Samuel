-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 05:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectfriend`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `name`, `price`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'bear1', 50, 'avatars/bear1.jpg', NULL, NULL),
(2, 'bear2', 75, 'avatars/bear2.jpg', NULL, NULL),
(3, 'bear3', 100, 'avatars/bear3.jpg', NULL, NULL),
(4, 'bear4', 125, 'avatars/bear4.jpg', NULL, NULL),
(5, 'bear5', 150, 'avatars/bear5.jpg', NULL, NULL),
(6, 'Elysia1', 1000, 'avatars/elysia1.jpg', NULL, NULL),
(7, 'Elysia2', 1250, 'avatars/elysia2.jpg', NULL, NULL),
(8, 'Elysia3', 1500, 'avatars/elysia3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `accepted`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(2, 1, 3, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(3, 1, 4, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(4, 1, 5, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(5, 2, 8, 0, '2025-01-10 08:47:29', '2025-01-10 08:47:29'),
(6, 2, 3, 0, '2025-01-10 08:48:41', '2025-01-10 08:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gaming', NULL, NULL),
(2, 'Drawing', NULL, NULL),
(3, 'Photography', NULL, NULL),
(4, 'Fishing', NULL, NULL),
(5, 'Hiking', NULL, NULL),
(6, 'Gardening', NULL, NULL),
(7, 'Cycling', NULL, NULL),
(8, 'Running', NULL, NULL),
(9, 'Tennis', NULL, NULL),
(10, 'Swimming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `avatar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `content`, `avatar_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Et voluptatem enim qui voluptatem qui quam. Amet dolor omnis magnam ut. Architecto ad facilis qui atque.', NULL, NULL, NULL),
(2, 2, 'Nisi fuga praesentium ut dolorem voluptates voluptatem non. Ut ex qui est provident amet ad veritatis.', NULL, NULL, NULL),
(3, 3, 'Quasi ea molestiae quibusdam vero. Ut ex velit repellat iste omnis. Libero eos perferendis id fugiat est ipsa. Voluptate et non deserunt eius.', NULL, NULL, NULL),
(4, 4, 'Eum sint eveniet nostrum quasi repellat tempore voluptatum. Nihil reprehenderit est perferendis rerum officiis sed. Sed aspernatur fugit et rem eum. Necessitatibus rerum ut dolorem sunt vero amet.', NULL, NULL, NULL),
(5, 5, 'Consequatur sequi et ratione omnis voluptas sint. Assumenda voluptatum rerum deserunt unde. Fuga sequi quo unde laboriosam. Quis cupiditate ut nisi dolores placeat.', NULL, NULL, NULL),
(6, 2, 'Hai', NULL, '2025-01-10 08:54:53', '2025-01-10 08:54:53'),
(7, 1, 'Halo juga', NULL, '2025-01-10 08:56:00', '2025-01-10 08:56:00'),
(8, 3, 'Bear 5 for u', 5, '2025-01-10 09:11:36', '2025-01-10 09:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `message_recepients`
--

CREATE TABLE `message_recepients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_recepients`
--

INSERT INTO `message_recepients` (`id`, `message_id`, `receiver_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, '2025-01-10 08:56:54'),
(2, 2, 3, 0, NULL, NULL),
(3, 3, 2, 0, NULL, NULL),
(4, 4, 2, 0, NULL, NULL),
(5, 5, 2, 0, NULL, NULL),
(6, 6, 1, 1, '2025-01-10 08:54:53', '2025-01-10 08:56:01'),
(7, 7, 2, 1, '2025-01-10 08:56:00', '2025-01-10 08:56:54'),
(8, 8, 1, 1, '2025-01-10 09:11:36', '2025-01-10 09:13:09');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2025_01_04_053520_create_hobbies_table', 1),
(3, '2025_01_04_140655_create_user_hobbies_table', 1),
(4, '2025_01_08_100942_create_friends_table', 1),
(5, '2025_01_09_042954_create_messages_table', 1),
(6, '2025_01_09_060234_create_message_recepients_table', 1),
(7, '2025_01_09_061429_create_avatars_table', 1),
(8, '2025_01_09_061548_add_avatar_to_id_to_messages_table', 1),
(9, '2025_01_09_061913_add_avatar_to_id_to_users_table', 1),
(10, '2025_01_10_065031_create_user_avatars_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BMfjZcn98u9Os8JdPtZOINNs3dWk3W58Vhy98ZR5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGVrVUFJNnFwY2UxT1RrSndHNHV1QUdVbTBqeGVETFQyTWVyZnQ1TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736525954),
('H49aKpnPAthD6NXff9uonydPwgZtgZ5XIzTdGeKr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVhCSGxtSEVjYVoxQ1JERjdmQ0hxMURrbUdhbmtJOWJIaktyWmhSWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fX0=', 1736523353);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `instagram_username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `coins` int(11) NOT NULL,
  `mobile_number` bigint(20) UNSIGNED NOT NULL,
  `birth_date` date NOT NULL,
  `avatar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `gender`, `instagram_username`, `password`, `coins`, `mobile_number`, `birth_date`, `avatar_id`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'schulist.jarrell@yahoo.com', 'Miss Brielle D\'Amore II', 'male', 'http://www.instagram.com/bertram41', '$2y$12$5J82P94puawlysG8lTW.yeUx9tSoa/hRVhQpRpOBu5Ct0dct5YVSy', -1294, 281209608777, '2008-02-04', 8, 0, '2025-01-10 08:35:40', '2025-01-10 09:18:28'),
(2, 'ehermiston@yahoo.com', 'Demond Kutch', 'female', 'http://www.instagram.com/grady.adrian', '$2y$12$yRuaQHt8ZMdIRUHof55dze.asp3Et.48Eahop2h86k3JrfwZqcKdq', 2293, 300373876348, '1990-10-12', 7, 1, '2025-01-10 08:35:40', '2025-01-10 09:15:50'),
(3, 'remington48@hotmail.com', 'Prof. Franz Purdy PhD', 'female', 'http://www.instagram.com/alanis13', '$2y$12$21vj469zsTvmg8M2..xjS.QYd2/jFVViH/Gu8hKxf9fQKh.ZjAZZW', 300, 590645177462, '2000-04-16', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 09:11:15'),
(4, 'luther40@yahoo.com', 'Prof. Wendell Prohaska DVM', 'male', 'http://www.instagram.com/ian.aufderhar', '$2y$12$RpjWbs51BOQR8WcvJKf/8eC3jjIxqRPpSRWe8Wx1ujPidlcWTK5Q6', 442, 260615846374, '1985-02-13', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(5, 'ekessler@kilback.info', 'Myah Muller', 'female', 'http://www.instagram.com/dgleason', '$2y$12$HEnlQ344QCCPM0o3y3jF4uYDOVnQySpPBPrhnvPrZ/P2gA6uHEx4K', 475, 183719956249, '1993-11-13', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(6, 'ariel56@dach.com', 'Delaney Pollich', 'female', 'http://www.instagram.com/kozey.brando', '$2y$12$aqf9I50KRi3gawtX8EDY5uHAfrvx9SSrArYlGMctsJFlPoGJDoDSG', 140, 423512583617, '1967-08-07', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(7, 'macy21@gmail.com', 'Meaghan Herman', 'female', 'http://www.instagram.com/alivia85', '$2y$12$ikKtsSs99FUrK2wk74Ije.I0YB8x7fTwZBNSeu8Qm2H4DYWrswUkW', 259, 84867127438, '1945-06-07', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(8, 'kemmer.noah@hotmail.com', 'Geovany Bernier', 'male', 'http://www.instagram.com/floy.mclaughlin', '$2y$12$./rVV8/altczTFr/LkceHuxPMLLNDh1GKOuMzs/TT8Ay6mU.fxOFu', 191, 975799307260, '1959-06-07', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(9, 'fay.holden@gmail.com', 'Anthony Gislason', 'female', 'http://www.instagram.com/myra07', '$2y$12$LBMRRvTreWzrBGodQ3E3Ae98add.Dp3sjiKObz3kSs8XdRrcskzWK', 362, 601654174784, '1971-01-29', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(10, 'steuber.ashton@lemke.com', 'Brandy Dach', 'male', 'http://www.instagram.com/cummings.montana', '$2y$12$Z.8O7p5HteNgKirxF0ZZSu6CrwNiIjKTMWvenVepuuVHf2hWMYWL6', 122, 222103172094, '2006-05-15', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(11, 'yfritsch@gmail.com', 'Camille Swift', 'female', 'http://www.instagram.com/karli.volkman', '$2y$12$KZuIksS9TJLseQ8Pev.pKeFccPBNkieX1zCP6iGQV8NY9/uKShWSK', 329, 268493555214, '1990-06-23', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(12, 'alvina.bruen@jacobi.com', 'Maryam Schuster', 'female', 'http://www.instagram.com/dulce87', '$2y$12$2G/VDBYut90pUPyd1TWUO.hMcwiv.ss5oR3hNZVmdZPBaGAAcbieS', 404, 205192120720, '1955-11-24', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(13, 'oconnell.gracie@hotmail.com', 'Rosella Koelpin PhD', 'female', 'http://www.instagram.com/mcglynn.myah', '$2y$12$/nmy3f0XP7nOaMsue6s0R.Ew4E6bJl1rq3XiqRm1TqFri0lnaJk9u', 391, 26776821309, '1987-02-07', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(14, 'cartwright.jordyn@bogan.org', 'Mrs. Ruth Hauck', 'female', 'http://www.instagram.com/dicki.tomasa', '$2y$12$GbmUSa66EiAxoECBcm3sbOzC4oGorLwBTc9iY2Vmw/8GySm370au6', 131, 770945123544, '2010-02-17', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(15, 'hazle09@collier.org', 'Shane Moore V', 'male', 'http://www.instagram.com/mueller.elwin', '$2y$12$lpmKImzA5Ul5ECoMFaL9peAipFwh19yEQoYqXCnVqFa5.Yq/DDHGu', 376, 404736892542, '1953-12-29', NULL, 1, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(16, 'dkawokdo@gmail.com', 'Samuel', 'male', 'https://www.instagram.com/Samu', '$2y$12$RkKO.kMctOhihWA7dIOOr.M/sFHHZp83d1drGRu3psLv6hN9kJT5O', 100, 23109321922, '2025-01-01', NULL, 1, '2025-01-10 08:36:53', '2025-01-10 08:36:53'),
(17, 'dkawokdo@gmail.com', 'Samuel', 'male', 'https://www.instagram.com/Samu', '$2y$12$AS2vYvINuIZzl4iVPnl/2OpHIi4Va2FtVgTe7QddJYr4Vkd7RtiIu', 100, 23109321922, '2025-01-01', NULL, 1, '2025-01-10 08:38:54', '2025-01-10 08:38:54'),
(18, 'dkawokdo@gmail.com', 'Samuel', 'male', 'https://www.instagram.com/Samu223122', '$2y$12$APwx2drwcwCLKcGfnJ8y2uduYITFhcGFHucZq6rKhQZ5dI269GYF.', 229, 23109321922, '2025-01-01', NULL, 1, '2025-01-10 08:39:56', '2025-01-10 08:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_avatars`
--

CREATE TABLE `user_avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_avatars`
--

INSERT INTO `user_avatars` (`id`, `user_id`, `avatar_id`, `created_at`, `updated_at`) VALUES
(1, 2, 7, NULL, NULL),
(2, 2, 8, NULL, NULL),
(3, 3, 7, NULL, NULL),
(4, 3, 8, NULL, NULL),
(6, 1, 5, NULL, NULL),
(7, 1, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_hobbies`
--

CREATE TABLE `user_hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hobby_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_hobbies`
--

INSERT INTO `user_hobbies` (`id`, `user_id`, `hobby_id`, `created_at`, `updated_at`) VALUES
(1, 10, 2, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(2, 12, 3, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(3, 1, 6, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(4, 1, 3, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(5, 13, 5, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(6, 5, 8, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(7, 13, 5, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(8, 4, 4, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(9, 4, 9, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(10, 7, 8, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(11, 6, 8, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(12, 4, 8, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(13, 12, 7, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(14, 13, 9, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(15, 9, 7, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(16, 5, 8, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(17, 2, 3, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(18, 5, 9, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(19, 15, 8, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(20, 10, 4, '2025-01-10 08:35:40', '2025-01-10 08:35:40'),
(21, 17, 1, NULL, NULL),
(22, 17, 2, NULL, NULL),
(23, 17, 3, NULL, NULL),
(24, 18, 1, NULL, NULL),
(25, 18, 2, NULL, NULL),
(26, 18, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friends_user_id_foreign` (`user_id`),
  ADD KEY `friends_friend_id_foreign` (`friend_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_avatar_id_foreign` (`avatar_id`);

--
-- Indexes for table `message_recepients`
--
ALTER TABLE `message_recepients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_recepients_message_id_foreign` (`message_id`),
  ADD KEY `message_recepients_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `users_avatar_id_foreign` (`avatar_id`);

--
-- Indexes for table `user_avatars`
--
ALTER TABLE `user_avatars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_avatars_user_id_foreign` (`user_id`),
  ADD KEY `user_avatars_avatar_id_foreign` (`avatar_id`);

--
-- Indexes for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_hobbies_user_id_foreign` (`user_id`),
  ADD KEY `user_hobbies_hobby_id_foreign` (`hobby_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message_recepients`
--
ALTER TABLE `message_recepients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_avatars`
--
ALTER TABLE `user_avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_recepients`
--
ALTER TABLE `message_recepients`
  ADD CONSTRAINT `message_recepients_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_recepients_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_avatars`
--
ALTER TABLE `user_avatars`
  ADD CONSTRAINT `user_avatars_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_avatars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  ADD CONSTRAINT `user_hobbies_hobby_id_foreign` FOREIGN KEY (`hobby_id`) REFERENCES `hobbies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_hobbies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
