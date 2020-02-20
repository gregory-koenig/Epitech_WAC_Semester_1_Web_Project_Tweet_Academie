-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 05 fév. 2018 à 16:22
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_twitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hashtag`
--

CREATE TABLE `hashtag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hashtagontweet`
--

CREATE TABLE `hashtagontweet` (
  `id` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `id_hashtag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `private_message`
--

CREATE TABLE `private_message` (
  `id` int(11) NOT NULL,
  `content` varchar(140) NOT NULL,
  `created_date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `id_tweet_origin` int(11) NOT NULL,
  `id_tweet_parent` int(11) NOT NULL,
  `id_tweet_fils` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `retweet`
--

CREATE TABLE `retweet` (
  `id` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(250) NOT NULL,
  `content` varchar(140) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hashtag`
--
ALTER TABLE `hashtag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hashtagontweet`
--
ALTER TABLE `hashtagontweet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `private_message`
--
ALTER TABLE `private_message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `retweet`
--
ALTER TABLE `retweet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hashtag`
--
ALTER TABLE `hashtag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hashtagontweet`
--
ALTER TABLE `hashtagontweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `private_message`
--
ALTER TABLE `private_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `retweet`
--
ALTER TABLE `retweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
