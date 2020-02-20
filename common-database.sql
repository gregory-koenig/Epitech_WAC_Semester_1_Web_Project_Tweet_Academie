-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 06 fév. 2018 à 10:47
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `common-database`
--
CREATE DATABASE IF NOT EXISTS `common-database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `common-database`;

-- --------------------------------------------------------

--
-- Structure de la table `directmessage`
--

CREATE TABLE `directmessage` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `id_dest` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_follow` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hashtag`
--

CREATE TABLE `hashtag` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hashtagontweets`
--

CREATE TABLE `hashtagontweets` (
  `id` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `id_hashtag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='liste des hastags lié aux tweets';

-- --------------------------------------------------------

--
-- Structure de la table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `id_tweet_origin` int(11) NOT NULL,
  `id_tweet_parent` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `retweets`
--

CREATE TABLE `retweets` (
  `id` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `content` varchar(140) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(16) DEFAULT NULL,
  `theme` enum('Blue','Red','Orange','Dark','Pink') NOT NULL DEFAULT 'Blue'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `directmessage`
--
ALTER TABLE `directmessage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hashtag`
--
ALTER TABLE `hashtag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hashtagontweets`
--
ALTER TABLE `hashtagontweets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `retweets`
--
ALTER TABLE `retweets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `directmessage`
--
ALTER TABLE `directmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `hashtag`
--
ALTER TABLE `hashtag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `hashtagontweets`
--
ALTER TABLE `hashtagontweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `retweets`
--
ALTER TABLE `retweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
