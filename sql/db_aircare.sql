-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 21 jan. 2022 à 20:22
-- Version du serveur :  8.0.21
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
CREATE DATABASE `jsjebl_aircare` ;

--
-- Structure de la table `air_quality`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`air_quality`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`air_quality` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_captor` int NOT NULL,
  `id_particles` int NOT NULL,
  `id_monoxide` int NOT NULL,
  `id_nitrogen` int NOT NULL,
  `place` varchar(255) NOT NULL,
  `result` float NOT NULL,
  `quality` varchar(255) NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `air_quality`
--

INSERT INTO `jsjebl_aircare`.`air_quality` (`id`, `id_captor`, `id_particles`, `id_monoxide`, `id_nitrogen`, `place`, `result`, `quality`, `date`) VALUES
(1, 2, 1, 1, 1, 'Salle d\'hospitalisation', 100, 'Mauvaise', '2010'),
(2, 2, 1, 1, 1, 'Salle d\'hospitalisation', 95, 'Mauvaise', '2011'),
(3, 2, 1, 1, 1, 'Salle d\'hospitalisation', 91, 'Mauvaise', '2012'),
(4, 2, 1, 1, 1, 'Salle d\'hospitalisation', 104, 'Mauvaise', '2013'),
(5, 2, 1, 1, 1, 'Salle d\'hospitalisation', 87, 'Pas bonne', '2014'),
(6, 2, 1, 1, 1, 'Salle d\'hospitalisation', 89, 'Pas très bonne', '2015'),
(7, 2, 1, 1, 1, 'Salle d\'hospitalisation', 92, 'Mauvaise', '2016');

-- --------------------------------------------------------

--
-- Structure de la table `bpm`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`bpm`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`bpm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `value` int NOT NULL,
  `quality` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bpm`
--

INSERT INTO `jsjebl_aircare`.`bpm` (`id`, `id_user`, `value`, `quality`) VALUES
(1, 16, 85, 'normale'),
(2, 16, 108, 'élevé');

-- --------------------------------------------------------

--
-- Structure de la table `captors`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`captors`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`captors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` text NOT NULL,
  `image` text NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `captors`
--

INSERT INTO `jsjebl_aircare`.`captors` (`id`, `title`, `description`, `place`, `date`, `image`, `user_id`, `user_name`) VALUES
(1, 'Air champ de vigne', 'Nous cherchons à déterminer la qualité de l\'air dans l\'environnement des champs de vignes.', 'Bordeaux, France', '12/12/2012', 'https://hatrabbits.com/wp-content/uploads/2017/01/random.jpg', 13, 'Jean Dupont'),
(2, 'Salle d\'hospitalisation', 'Nous cherchons à déterminer si la salle d\'hospitalisation bénéficie d\'une qualité de l\'air suffisante afin d\'accueillir les patients.', 'Hôpital Cochin', '20/09/1312', 'https://hatrabbits.com/wp-content/uploads/2017/01/random.jpg', 15, 'Adrien Bethuel'),
(3, 'Capteur salle de classe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate pretium egestas. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam luctus fringilla est elementum pretium. In eleifend tortor ac rhoncus rutrum. Aliquam nec nibh pharetra, semper eros vitae, tempus elit. Aliquam porta tincidunt justo, vel aliquam ante hendrerit hendrerit. Nunc vestibulum justo risus, in eleifend est luctus et.\r\n\r\nCras iaculis, mi id ultrices volutpat, sem nibh tincidunt nisi, eu tempor turpis ipsum ac erat. In ut justo sed nisi lacinia interdum in quis quam. Maecenas luctus odio et erat porta facilisis. Proin ut massa mollis turpis tempor vulputate eget dignissim dui. Vivamus pellentesque diam tristique erat sollicitudin dictum. Nullam semper felis mi, ac vestibulum lectus dignissim eget. Integer a imperdiet tortor, ac ultrices nisl. Suspendisse ac enim tortor. In non odio quis augue blandit tempus ac at libero. Nunc massa mi, aliquam vitae egestas et, mollis in orci. Nam facilisis turpis sed erat volutpat, in pellentesque ipsum sagittis. Quisque a nulla a lectus semper dictum. Etiam vel elementum mi, et porttitor erat. Curabitur in magna vitae elit fringilla porta. Praesent in convallis ex, sit amet blandit elit. Vestibulum ut volutpat tellus.\r\n\r\nQuisque sagittis turpis in posuere pretium. Quisque molestie aliquam tellus quis rhoncus. In non imperdiet massa, eu tristique nisi. Praesent at elementum massa. Proin cursus, sapien sed faucibus varius, velit eros pulvinar mi, vitae scelerisque elit orci nec elit. Maecenas ultrices convallis laoreet. Fusce lacinia sollicitudin ligula, ut consequat tur', 'Ecole Victor Hugo', '01/01/2001', 'https://static.lpnt.fr/images/2021/10/14/22319050lpw-22319058-article-jpg_8301796_660x287.jpg', 6, 'Prénom Nom');

-- --------------------------------------------------------

--
-- Structure de la table `carbon_monoxide`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`carbon_monoxide`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`carbon_monoxide` (
  `id` int NOT NULL AUTO_INCREMENT,
  `captor_id` int NOT NULL,
  `value` float NOT NULL,
  `percentage` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carbon_monoxide`
--

INSERT INTO `jsjebl_aircare`.`carbon_monoxide` (`id`, `captor_id`, `value`, `percentage`) VALUES
(1, 2, 30, 100);

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`email`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `email`
--

INSERT INTO `jsjebl_aircare`.`email` (`id`, `email`, `sujet`, `message`, `status`) VALUES
(3, 'max.verstappen@gmail.com', 'Sujet', 'Message', 'seen');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`faq`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `jsjebl_aircare`.`faq` (`id`, `question`, `answer`) VALUES
(1, 'Lorem Ipsim', 'Lorem Ipsum reponse'),
(2, 'Nouvelle question ', 'Réponse à la question');

-- --------------------------------------------------------

--
-- Structure de la table `fine_particles`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`fine_particles`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`fine_particles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `captor_id` int NOT NULL,
  `value` float NOT NULL,
  `percentage` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fine_particles`
--

INSERT INTO `jsjebl_aircare`.`fine_particles` (`id`, `captor_id`, `value`, `percentage`) VALUES
(1, 2, 35, 100);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`messages`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date` text NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `topic_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `jsjebl_aircare`.`messages` (`id`, `content`, `date`, `user_id`, `user_name`, `topic_id`) VALUES
(5, 'Refaisons un test de réponse<br />\r\nCeci est une réponse<br />\r\n', '17/12/2021 à 10:02', 15, 'Adrien Bethuel', 13),
(2, 'Test de réponse', '17/12/2021 à 09:33', 15, 'Adrien Bethuel', 13),
(6, 'Réponse à ce topic', '17/12/2021 à 10:04', 15, 'Adrien Bethuel', 5),
(7, 'Ouvre la fenêtre', '17/12/2021 à 10:23', 15, 'Adrien Bethuel', 2),
(8, 'Nouvelle réponse', '17/12/2021 à 18:47', 16, 'Adrien Bethuel', 13),
(9, 'Ici c\'est un test de réponse', '17/12/2021 à 22:59', 16, 'Adrien Bethuel', 7),
(10, 'Ceci est une réponse au test de message', '05/01/2022 à 11:07', 16, 'Adrien Bethuel', 1);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`news`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(355) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(355) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `jsjebl_aircare`.`news` (`id`, `image`, `title`, `description`, `link`) VALUES
(1, 'https://www.respire-asso.org/wp-content/uploads/2016/03/Tout-savoir-sur-lair-respire.jpg', 'Qualité de l\'air', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec rutrum augue. Donec nisl nulla, facilisis non velit eget, venenatis volutpat nisi. Nullam at sem et odio posuere varius id elementum nulla. Nam egestas porta nulla ut posuere. Integer vestibulum id nibh ut sodales. Nunc lacinia mauris malesuada nulla varius, sit amet euismod urna sagittis. Integer fringilla elit sit amet arcu luctus cursus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac', 'https://www.francebleu.fr/infos/environnement/lair-que-vous-respirez-en-gironde-est-il-de-bonne-qualite-1571236617'),
(3, 'https://urbanlab.parisandco.paris/var/site/storage/images/_aliases/social_network_image/1/3/3/0/40331-3-fre-FR/Qualite-Air-couleurs-2.png', 'Lorem ipsum', 'Suspendisse pretium, turpis nec efficitur posuere, nisl diam condimentum lacus, sit amet egestas purus massa id erat. Praesent non sodales metus. Maecenas est lectus, fringilla ac libero eu, commodo pellentesque arcu. Phasellus commodo nisi non tempus elementum. Maecenas congue laoreet leo convallis rutrum.', 'https://actualite.lachainemeteo.com/actualite-meteo/2020-03-28/qualite-de-l-air-degradee-ce-week-end-au-nord-54577'),
(4, 'https://www.maslacq.fr/mod_turbolead/upload//image/contenu/qualitair.jpg', 'Lorem ipsum', 'Etiam eu gravida diam. Sed fermentum dolor risus, a finibus elit semper sed. Nulla justo ligula, tempus vel lacus sit amet, vestibulum fermentum arcu. Quisque aliquet dui eget luctus aliquam. Quisque vulputate ipsum massa, ac malesuada diam imperdiet at. Duis eget accumsan ex. Donec hendrerit, ante vitae finibus tempus, metus odio mattis nibh, et dignissim quam urna vel enim.', 'https://www.maslacq.fr/qualite-de-l-air.php');

-- --------------------------------------------------------

--
-- Structure de la table `nitrogen_dioxide`
--

DROP TABLE IF EXISTS `jsjebl_aircare`.`nitrogen_dioxide`;
CREATE TABLE IF NOT EXISTS `jsjebl_aircare`.`nitrogen_dioxide` (
  `id` int NOT NULL AUTO_INCREMENT,
  `captor_id` int NOT NULL,
  `value` float NOT NULL,
  `percentage` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nitrogen_dioxide`
--

INSERT INTO `jsjebl_aircare`.`nitrogen_dioxide` (`id`, `captor_id`, `value`, `percentage`) VALUES
(1, 2, 213, 100);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `gywulo_aircare`.`topics`;
CREATE TABLE IF NOT EXISTS `gywulo_aircare`.`topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` text NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `gywulo_aircare`.`topics` (`id`, `title`, `date`, `user_id`, `user_name`, `message`) VALUES
(1, 'Qualité de l\'air Paris 15', '2021-12-29 20:15:40', 9, 'Jean Dupont', 'Test de message '),
(3, 'Test de sujet', '2021-12-01 21:47:', 15, 'Adrien Bethuel', 'test message encore et encore'),
(5, 'Créons un topic', '2021-12-05 22:41:', 15, 'Adrien Bethuel', 'Ceci est le message du topic créé<br />\r\nEn effet'),
(7, 'Refaisons un test', '2021-12-06 21:56:11', 15, 'Adrien Bethuel', 'Message du nouveau test'),
(13, 'Lorem ipsum', '16/12/2021 à 15:18', 15, 'Adrien Bethuel', 'Nunc porta auctor ex ac sagittis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas molestie, urna convallis commodo porttitor, erat ipsum consequat erat, in rhoncus risus eros at lacus. In hac habitasse platea dictumst. Sed elit neque, laoreet sed eros a, scelerisque lobortis mauris.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `gywulo_aircare`.`users`;
CREATE TABLE IF NOT EXISTS `gywulo_aircare`.`users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','administrator','manager') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `gywulo_aircare`.`users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(16, 'Adrien', 'Bethuel', 'adrien.bethuel@eleve.isep.fr', '$2y$10$INymdOIP4LH.e.wjCdcxQeNlZcv1IMFp6A0ec/DQQXl.wjXda/g5K', 'administrator'),
(27, 'Prénom', 'Nom', 'nom.prenom@gmail.com', '$2y$10$jDnzFpKiTL5Qc5fkCXStMu8fI3bVAkhuYeB5AcLJEOo.MY.HqVIl6', 'user'),
(26, 'Paul', 'Max', 'max@mail.com', '$2y$10$Q/LJqMhNPQZLd50pM6KvMOwQ551/fMNr.wWJ/G6JERe4nUlU0zrn.', 'user'),
(24, 'Clémence', 'PREHU', 'clemenceprh@hotmail.com', '$2y$10$qC7wSrQw0.A9y5.ifkiy3ul2rlde9PvHNsRmFihObxcMIXUJGE0eu', 'administrator'),
(23, 'Thomas', 'SOURBE', 'thomaspcs33@gmail.com', '$2y$10$9wY8nb7Vyhnxi2Bpb4RbS.fHDuE/n8O4QI9Kkox/37ZOTjthTTreG', 'administrator');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
