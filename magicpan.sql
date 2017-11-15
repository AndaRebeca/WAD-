-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 14 Noi 2017 la 12:58
-- Versiune server: 5.6.33
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `magic_pan`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `blogs`
--

CREATE TABLE `blogs` (
  `blog__id` int(11) NOT NULL,
  `blog__title` varchar(255) NOT NULL,
  `blog__thumb` varchar(255) NOT NULL,
  `blog__content` mediumtext NOT NULL,
  `blog__time` mediumtext NOT NULL,
  `blog__user__id` int(11) NOT NULL,
  `blog__date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `blogs`
--

INSERT INTO `blogs` (`blog__id`, `blog__title`, `blog__thumb`, `blog__content`, `blog__time`, `blog__user__id`, `blog__date`) VALUES
(1, 'Blog 1 title', 'uploads/blogs/thumb.jpg', 'Blog 1 content', 'Blog 1 time', 5, '2017-10-20 08:37:47'),
(2, 'Blog 2 title', 'uploads/blogs/thumb.jpg', 'Blog 2 content', 'Blog 2 time', 5, '2017-10-20 08:37:52'),
(3, 'Blog 3 title', 'uploads/blogs/07.jpg', 'Blog 3 content', 'Blog 3 time', 2, '2017-10-20 08:51:23'),
(4, 'My Blog title', 'uploads/blogs/07.jpg', 'My Blog content', 'My Blog title', 5, '2017-10-20 08:52:33'),
(7, 'some text', 'uploads/blogs/203.jpg', '', '', 2, '2017-10-21 10:14:01');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `avatar` longtext,
  `alias` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `avatar`, `alias`, `location`, `description`) VALUES
(1, 'Gabi Perte', '$2y$10$eVegy2vilmdMWIaS02U9zO8QICWEHYkUzF1fEyn75tGnrbsqo5n1G', '2017-10-14 12:23:45', 'gabi.jpg', 'Gabi Perte', 'Oradea, RO', 'Pious ocean prejudice insofar derive grandeur inexpedient superiority ultimate play moral. Ultimate overcome truth dead mountains hatred.'),
(2, 'Anda', '$2y$10$oeIEPNKANsapUolKAFXIzuOLbDxml0A9agcDiWYalfganxy6zsMSS', '2017-10-14 12:25:31', 'default.jpg', 'Anda Bungau', 'Timisoara, RO ', 'Marvelous disgust ascetic moral grandeur against ultimate sea merciful selfish. God morality mountains burying endless decrepit self good hope.'),
(5, 'Arrow', '$2y$10$9REcbeNd9X8/gYujeO9fMunwtHd8EDEheDA7OqWdi0PCfvIGmq1qC', '2017-10-20 11:12:37', NULL, 'Goku', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog__id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog__id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;