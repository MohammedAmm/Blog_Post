-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2018 at 10:00 PM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posts`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `last_update`) VALUES
(1, 'Sport', '2018-02-16 13:58:55', NULL),
(2, 'Art', '2018-02-16 19:20:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL DEFAULT '0',
  `reason` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `is_approved`, `rejected`, `reason`, `created_at`, `last_update`) VALUES
(1, 1, 1, 'Hello from the other side...', 1, 1, NULL, '2018-02-17 16:33:36', '2018-02-19 18:42:07'),
(2, 1, 1, 'This is my first comment', 0, 0, NULL, '2018-02-17 16:44:04', NULL),
(3, 1, 2, 'My comment for second post', 0, 0, NULL, '2018-02-17 16:45:26', NULL),
(4, 1, 1, 'Ibraaaaaaaaaaaaaaaaaahim', 0, 0, NULL, '2018-02-17 17:23:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL DEFAULT '0',
  `reason` text,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `image`, `is_approved`, `rejected`, `reason`, `category_id`, `created_at`, `last_update`) VALUES
(1, 1, 'First Post', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 1, 0, NULL, 1, '2018-02-16 14:36:29', '2018-02-19 18:34:08'),
(2, 1, 'Second', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 1, 0, NULL, 2, '2018-02-16 14:38:52', '2018-02-19 19:58:45'),
(3, 1, 'Browser', 'Created from browser....', '', 1, 0, NULL, 1, '2018-02-17 19:14:04', '2018-02-19 19:58:48'),
(4, 1, 'Third Post', 'Welcome to hotel translvania......', '', 1, 0, NULL, 1, '2018-02-19 06:17:35', '2018-02-19 19:58:50'),
(5, 1, 'Test', 'asdjasjdkjaskdkj', 'Dark-tv-netflix.jpg', 1, 0, NULL, 1, '2018-02-19 06:21:10', '2018-02-19 19:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `image` text,
  `reason` text,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `gender`, `country`, `status`, `image`, `reason`, `role`, `created_at`, `last_update`) VALUES
(1, 'focus', '$2y$10$4fGWdiUldFCYu3laDY2g1O/ULpXKdRZpr4mABh5u0Bv5Xoynq48na', 'nora', 'ashraf', 'male', 'ay', 1, NULL, NULL, 1, '2018-02-16 13:33:02', '2018-02-19 10:41:45'),
(2, 'newuser', '$2y$10$OXajruIzXQlULDhlaljMEu.NQoyAOym.nGkA2fKXcGM6.Y8ykAXHq', 'mohamed', 'ashraf', 'male', 'mansoura', 1, NULL, NULL, 1, '2018-02-18 05:18:37', '2018-02-19 10:41:46'),
(3, 'user', '$2y$10$ruUoAH4NXhIE3X2FlnmqX.zODz1RST/ydU6hIb8LblGkl/pE7ajgu', 'mohamed', 'ashraf', 'male', 'mm', 1, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:29:20', '2018-02-19 10:41:47'),
(4, 'focusa', '$2y$10$W8H3Kcpnumjt8E6z.YAJROosCeVsoR3n.LL8BYORsqNBvTdiKawLy', 'salma ', 'a', 'male', 'mansoura', 1, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:34:49', '2018-02-19 10:41:48'),
(5, 'aaaa', '$2y$10$dN2rz/5fu9WZf6ayK7/l8efaaRnJt2UJ0k5XtrCEjPebZ5c7Mgcu6', 'aa', 'aaa', 'male', 'aa', 1, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:39:57', '2018-02-19 10:41:48'),
(6, 'aaaaa', '$2y$10$jpCldM0IojEzu7WxbtS1kOWSZAcsM2WFlvXTo5SM1s8Qo7ZDBao1a', 'mohameda', 'a', 'male', 'aa', 1, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:42:52', '2018-02-19 10:41:49'),
(7, 'mohamed', '$2y$10$rrhbwR7A3AF/3Ne2d3GsNuFcuJbVlhN/nXKPeZxCvEKGqbmEO4tXS', 'first', 'try', 'male', 'mansoura', 1, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:44:01', '2018-02-19 10:41:50'),
(8, 'try', '$2y$10$3RAMbu1t669qsiGjtKjcieXQeUcwpSNmxFfF1SR4qnCO.rwBhoVby', 'second', 'try', 'male', 'mans', 0, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:44:56', NULL),
(9, 'last', '$2y$10$TVqy6uEpr3CwY1qVjcYb.OmYtF5LM5Kopbyv2QI9M50H/A/EfrTG6', 'last', 'try', 'male', 'mm', 0, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:46:09', NULL),
(10, '123', '$2y$10$W1CYFqR2U2AWstBOksf6G.iIeXGeo2Ws69AqUvNDT4lR5bv7bhHNe', 'mm', '123123', 'male', '123', 0, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:46:57', NULL),
(11, 'mml', '$2y$10$8y06prPTaVnAFBEBzLS3tOQ70jM8JWwV3uPeT49P21OJCFY3iHW2a', 'mm', 'mm', 'male', 'mm', 0, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:48:06', NULL),
(12, 'aaas', '$2y$10$3U4U93uDOAKCvLPefSFvdeDdBhjHAE3nLD3gHgCkA74MUSaZCogd.', 'mohamed', 'aa', 'male', 'aa', 0, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:53:18', NULL),
(13, '123123', '$2y$10$wCEzbIm9Z7CHT4VgeDWjRuG.0i9zD7vHEsoawMUnxizmRW66AKScK', 'mohamed', '123', 'male', 'mm', 0, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:54:12', NULL),
(14, 'ashrafa', '$2y$10$az5UerjUc4ydvI4bUaFf8OHC56qxlT.WYZLVV36bhQKGkJsPLgJTS', 'mohamed', 'ashraf', 'male', 'mansoura', 0, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 03:57:29', NULL),
(15, 'mmmmaaa', '$2y$10$UBCb.CG5DVolDBGngWINu.aygnj25M1HERBaDIHpDPHypu.0cyk5q', 'asdasd', 'ashraf', 'male', 'mansoura', 0, 'Dark-tv-netflix.jpg', NULL, 0, '2018-02-19 04:11:50', NULL),
(16, '', '$2y$10$r4WPTJvyy3BXIG02ErH3ReqVHz0Y.Op7uIAUWzJu3wnwsa1Vpqr0C', '', '', 'male', '', 0, '', NULL, 0, '2018-02-19 19:52:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comments_ibfk_2` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `posts_ibfk_2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
