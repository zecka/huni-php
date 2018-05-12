-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 12 mai 2018 à 10:45
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `huniphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `visibility` enum('admin','member','visitor') NOT NULL DEFAULT 'visitor',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `visibility`, `date`) VALUES
(1, 'Design', 'design', 'visitor', '2018-05-02 15:24:28'),
(2, 'Hippie', 'hippie', 'visitor', '2018-05-02 15:24:28'),
(3, 'Food', 'food', 'visitor', '2018-05-07 15:25:46'),
(4, 'Mode', 'mode', 'visitor', '2018-05-07 15:25:46');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_mail` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent` int(11) NOT NULL,
  `article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `thumb` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `thumb`, `slug`, `date`, `user`) VALUES
(1, 'Sort your paperwork for home loan success', 'Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.\r\n\r\nNulla quis lorem ut libero malesuada feugiat. Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit.\r\n\r\nNulla quis lorem ut libero malesuada feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', 'http://www.leconews.com/images/2017/06/01/paix-dans-le-monde_861332.jpg', 'sort-your-paperwork-for-home-loan-success', '2018-05-02 15:22:15', 1),
(2, 'La paix dans le monde ', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim.\r\n\r\nDonec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nQuisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'http://www.leconews.com/images/2017/06/01/paix-dans-le-monde_861332_679x417.jpg', 'la-paix-dans-le-monde', '2018-05-02 15:22:15', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts_categories`
--

CREATE TABLE `posts_categories` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts_categories`
--

INSERT INTO `posts_categories` (`id`, `id_post`, `id_category`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 4),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(90) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `firstname`, `lastname`, `password`, `bio`, `role`, `date`) VALUES
(1, 'leitnermat@gmail.com', 'madmat', 'Mahtieu', 'Leitner', '70ec505bb2d0a430342d50e2fd6ef8a5', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.', 'admin', '2018-05-02 15:05:28'),
(2, 'ferrari.robin@gmail.com', 'zecka', 'Robin', 'Ferrari', '$2y$10$6vgu3vCro7662h.Il/vz4OjYlZCKSa53jr3Rp561GrCb0otb1nZh6', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.', 'admin', '2018-05-02 15:32:07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `posts_categories`
--
ALTER TABLE `posts_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
