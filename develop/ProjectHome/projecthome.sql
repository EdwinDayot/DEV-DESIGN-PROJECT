-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 11 Avril 2013 à 17:10
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projecthome`
--

-- --------------------------------------------------------

--
-- Structure de la table `announce`
--

CREATE TABLE IF NOT EXISTS `announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `solved` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_announce_category1_idx` (`category_id`),
  KEY `fk_announce_user1_idx` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `announce`
--

INSERT INTO `announce` (`id`, `content`, `type`, `created`, `address`, `solved`, `category_id`, `user_id`) VALUES
(15, 'Bonjours ! Je recois une correspondante tout droit venue d''Angleterre dans un mois, inutile de vous dire que mon Anglais n''est pas au point, que ce soit en franc parler ou meme pour la drague. Je cherche par conséquent quelqu''un de mon voisinage pour m''apprendre quelque peu le langage ! Je rémunère. bonne soirée', 'asking', '2013-04-10 22:12:29', '18 boulevard Flandrin 75016 Paris', 0, NULL, 0),
(14, 'Hello i''m selling smthng', 'asking', '2013-04-10 22:10:32', '42 rue Miromesnil 75008 Paris', 0, NULL, 0),
(16, 'Bonjours je cherche une tondeuse à gazon pour ce weekend, mon jardin ne ressemble plus a rien et ca devient genant ! Je rémunère !', 'asking', '2013-04-10 22:13:18', '34 rue des nouvelles 92150 Suresnes', 0, NULL, 0),
(17, 'Salut, je cherche une blouse blanche de medecin s''il vous plait, je suis en laboratoire demain et la mienne est déchiquetée !!', 'asking', '2013-04-10 22:13:44', '11 rue des petites écuries 75010 Paris', 0, NULL, 0),
(18, NULL, NULL, NULL, NULL, -1, NULL, NULL),
(19, 'Hello !', 'asking', '2013-04-11 16:04:06', '42 rue Miromesnil 75008 Paris', 0, NULL, 0),
(20, 'Hello ! :D', 'asking', '2013-04-11 16:09:59', '', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `announce_media`
--

CREATE TABLE IF NOT EXISTS `announce_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announce_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_announce_media_media1_idx` (`media_id`),
  KEY `fk_announce_media_announce1_idx` (`announce_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `announce_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_user1_idx` (`user_id`),
  KEY `fk_comment_announce1_idx` (`announce_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `announce_id`, `user_id`) VALUES
(1, 'Salut les amis !', 15, 0),
(2, 'Salut les amis ! ça va ?', 15, 0),
(3, 'Salut les amis ! 14', 14, 0),
(4, 'Salut les amis ! 16', 16, 0),
(5, 'Salut les amis ! 17', 17, 0),
(6, 'Salut les amis ! 19', 19, 0);

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` text,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `name`, `value`, `alias`) VALUES
(1, 'perpageannounce', '3', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contact_user1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) DEFAULT NULL,
  `filemin` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_message_user1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `street_number` int(11) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `geo-x` int(11) DEFAULT NULL,
  `geo-y` int(11) DEFAULT NULL,
  `bio` text,
  `mail` varchar(255) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `online` int(11) DEFAULT NULL,
  `activated` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_media_idx` (`media_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `firstname`, `lastname`, `street_number`, `street`, `zip`, `city`, `state`, `country`, `geo-x`, `geo-y`, `bio`, `mail`, `token`, `online`, `activated`, `media_id`) VALUES
(1, NULL, NULL, 'Djoan', 'Fal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
