-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 05 déc. 2021 à 22:51
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_aircare`
--

-- --------------------------------------------------------
CREATE DATABASE `db_aircare` ;

--
-- Structure de la table `captors`
--

DROP TABLE IF EXISTS `db_aircare`.`captors`;
CREATE TABLE IF NOT EXISTS `db_aircare`.`captors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `ozone` int(11) NOT NULL,
  `fine_particles` int(11) NOT NULL,
  `sulphur_dioxide` int(11) NOT NULL,
  `nitrogen_dioxide` int(11) NOT NULL,
  `carbon_monoxide` int(11) NOT NULL,
  `air_data` int(11) NOT NULL,
  `air_quality` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `db_aircare`.`messages`;
CREATE TABLE IF NOT EXISTS `db_aircare`.`messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `db_aircare`.`news`;
CREATE TABLE IF NOT EXISTS `db_aircare`.`news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(355) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(355) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `db_aircare`.`news` (`id`, `image`, `title`, `description`, `link`) VALUES
(1, 'https://www.respire-asso.org/wp-content/uploads/2016/03/Tout-savoir-sur-lair-respire.jpg', 'Qualité de l\'air', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec rutrum augue. Donec nisl nulla, facilisis non velit eget, venenatis volutpat nisi. Nullam at sem et odio posuere varius id elementum nulla. Nam egestas porta nulla ut posuere. Integer vestibulum id nibh ut sodales. Nunc lacinia mauris malesuada nulla varius, sit amet euismod urna sagittis. Integer fringilla elit sit amet arcu luctus cursus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac', 'https://www.francebleu.fr/infos/environnement/lair-que-vous-respirez-en-gironde-est-il-de-bonne-qualite-1571236617'),
(3, 'https://urbanlab.parisandco.paris/var/site/storage/images/_aliases/social_network_image/1/3/3/0/40331-3-fre-FR/Qualite-Air-couleurs-2.png', 'Lorem ipsum', 'Suspendisse pretium, turpis nec efficitur posuere, nisl diam condimentum lacus, sit amet egestas purus massa id erat. Praesent non sodales metus. Maecenas est lectus, fringilla ac libero eu, commodo pellentesque arcu. Phasellus commodo nisi non tempus elementum. Maecenas congue laoreet leo convallis rutrum.', 'https://actualite.lachainemeteo.com/actualite-meteo/2020-03-28/qualite-de-l-air-degradee-ce-week-end-au-nord-54577'),
(4, 'https://www.maslacq.fr/mod_turbolead/upload//image/contenu/qualitair.jpg', 'Lorem ipsum', 'Etiam eu gravida diam. Sed fermentum dolor risus, a finibus elit semper sed. Nulla justo ligula, tempus vel lacus sit amet, vestibulum fermentum arcu. Quisque aliquet dui eget luctus aliquam. Quisque vulputate ipsum massa, ac malesuada diam imperdiet at. Duis eget accumsan ex. Donec hendrerit, ante vitae finibus tempus, metus odio mattis nibh, et dignissim quam urna vel enim.', 'https://www.maslacq.fr/qualite-de-l-air.php');

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

DROP TABLE IF EXISTS `db_aircare`.`quiz`;
CREATE TABLE IF NOT EXISTS `db_aircare`.`quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `db_aircare`.`topics`;
CREATE TABLE IF NOT EXISTS `db_aircare`.`topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `db_aircare`.`topics` (`id`, `title`, `date`, `user_id`, `user_name`, `message`) VALUES
(1, 'Qualité de l\'air Paris 15', '2021-12-29 20:15:40', 9, 'Jean Dupont', 'Test de message '),
(2, 'Waaaaa la qualité de l\'air est cata, que faire ?', '2021-12-01 20:16:21', 12, 'prénom Nom', 'Teeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(3, 'Test de sujet', '2021-12-01 21:47:', 15, 'Adrien Bethuel', 'test message encore et encore'),
(5, 'Créons un topic', '2021-12-05 22:41:', 15, 'Adrien Bethuel', 'Ceci est le message du topic créé<br />\r\nEn effet');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `db_aircare`.`users`;
CREATE TABLE IF NOT EXISTS `db_aircare`.`users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','administrator','manager') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `db_aircare`.`users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(13, 'AdrienTest', 'Bethuel', 'adrien.test@eleve.isep.fr', '$2y$10$RpnksO03ruW7Sgob2/.FSeTMN2dVt2UuyICK.doVG.NVIXSns8O8e', 'user'),
(10, 'Prénom', 'Nom', 'email@email.mail', '$2y$10$RgWrqdKvjikyoQHBknazeOiWngqAYm4MlNoAPq/0zJ7df1Qz5gtR.', 'user'),
(9, 'Jean', 'Dupont', 'jean.dupont@email.test', '$2y$10$qbyo9rUD0FJ0aJuMykoyfu.0KvUPdL194GbFx3kkMqM6L2XCJ6/36', 'user'),
(11, 'Karim', 'Benzema', 'karim.benzema@ballondor.ff', '$2y$10$RJY5rBBw3mUsaxLcUC9eqOexLK0KSkEx6jCWAhtjComqbARh0s7o2', 'user'),
(12, 'prenom', 'Nom', 'nom.prenom@mail.com', '$2y$10$aUnEG8XZJR4ui2TpJrgMiemYnOsgqbK8EYc00JbhN5EKjJHabuZFK', 'user'),
(15, 'Adrien', 'Bethuel', 'adrien.bethuel@eleve.isep.fr', '$2y$10$XRrXBULag1w5O/qlWG5ruOCyRQF38MRutCVOA5umciW5xXH2OytUm', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
