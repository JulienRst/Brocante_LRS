-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 12 Avril 2015 à 20:37
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `imac`
--

-- --------------------------------------------------------

--
-- Structure de la table `2015eshop_categorie`
--

CREATE TABLE IF NOT EXISTS `2015eshop_categorie` (
  `id_categorie` int(20) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_obj` int(20) NOT NULL,
  `description_categorie` varchar(250) NOT NULL,
  `nbr_obj_categorie` int(3) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `2015eshop_objet`
--

CREATE TABLE IF NOT EXISTS `2015eshop_objet` (
  `id_obj` int(20) NOT NULL,
  `nom_obj` varchar(50) NOT NULL,
  `id_vendeur` int(20) NOT NULL,
  `id_acheteur` int(20) NOT NULL,
  `nbr_obj` int(3) NOT NULL,
  `description_obj` varchar(250) NOT NULL,
  `prix` int(4) NOT NULL,
  `date_enchere` datetime NOT NULL,
  `date_publication` datetime NOT NULL,
  `date_vendu` datetime NOT NULL,
  `id_commande` int(20) NOT NULL,
  PRIMARY KEY (`id_obj`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `2015eshop_panier`
--

CREATE TABLE IF NOT EXISTS `2015eshop_panier` (
  `id_panier` int(20) NOT NULL,
  `id_acheteur` int(20) NOT NULL,
  `id_obj` int(20) NOT NULL,
  `nbr_obj` int(3) NOT NULL,
  `prix_total` int(5) NOT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `2015eshop_utilisateur`
--

CREATE TABLE IF NOT EXISTS `2015eshop_utilisateur` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `profil_pic` text NOT NULL,
  `mail` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sexe` char(1) DEFAULT NULL,
  `commentaire` varchar(250) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `clef` varchar(13) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `2015eshop_utilisateur`
--

INSERT INTO `2015eshop_utilisateur` (`id_user`, `login`, `mdp`, `profil_pic`, `mail`, `age`, `sexe`, `commentaire`, `telephone`, `clef`, `verified`) VALUES
(1, 'lea', 'rozen', '', 'learozen@gmail.com', 20, 'f', 'hello world', '101010101', '0', 0),
(2, 'lisa-anne', 'dang', '', 'lisaannedang@gmail.com', 21, 'f', 'hello', '202020202', '0', 0),
(4, 'julien', 'rousset', '', 'julien.rousset01@gmail.com', 19, 'm', 'Je suis un dieu', '608957135', '552aae55e575e', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
