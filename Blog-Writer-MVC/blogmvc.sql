-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 avr. 2018 à 11:19
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogmvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `email`, `name`, `password`, `role`) VALUES
(1, 'mathsperformances@gmail.com', 'Jean Forteroche', '70ccd9007338d6d81dd3b6271621b9cf9a97ea00', 'admins');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `date`, `post_id`, `seen`) VALUES
(1, 'sousou', 'blabla@gmail.com', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', '2017-12-04 10:03:06', 16, 1),
(2, 'coco', 'coco@gmail.com', 'bla bala bal', '2017-12-04 15:30:53', 16, 0),
(3, 'Pseudo Avatar', 'blabla@gmail.com', 'Test de commentaire', '2018-04-30 13:18:27', 19, 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `posted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `image`, `writer`, `posted`) VALUES
(16, 'Article 1: La rose des vents', '&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat gravida sagittis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed tincidunt ipsum sed augue feugiat, quis imperdiet lectus sodales. Aenean rhoncus auctor convallis. Quisque sit amet tempus dui. Maecenas consectetur efficitur nisi, ac efficitur libero luctus a. Sed molestie accumsan dolor ut sagittis. Phasellus a elit et turpis laoreet ornare nec in quam.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Nunc tincidunt porttitor mi, in ultricies justo congue et. Fusce rhoncus nulla metus. Donec congue mattis nisi, id malesuada lacus semper ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eget scelerisque ex, sit amet aliquam turpis. Sed bibendum dapibus sem, quis ornare tortor. Nulla sollicitudin commodo orci et malesuada. Suspendisse ut mattis nulla. Pellentesque vel dignissim lectus. Sed aliquet ut est eu sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Nulla vitae consequat lorem, nec convallis eros. Fusce elementum est at nulla luctus vestibulum. Ut a lacus varius, auctor est vel, tincidunt massa. Duis tempor, eros sit amet gravida maximus, orci elit tristique sapien, eget efficitur lectus odio non sapien. Aliquam vel lacinia tellus. Praesent justo dui, vehicula ornare volutpat vel, tempor sed eros. Nullam commodo massa in justo sodales, vel vehicula mauris vehicula. Praesent gravida augue sit amet magna sagittis tincidunt. Donec porttitor, neque in maximus sagittis, velit augue consequat odio, at suscipit nulla urna ut magna. Ut eget nisi metus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Phasellus et mauris eu ipsum molestie ornare. Quisque lectus ipsum, aliquam quis sem nec, feugiat hendrerit mauris. Integer in pretium est. Cras imperdiet pulvinar risus, id mollis nulla viverra a. Donec facilisis, nunc id pellentesque ultricies, ex urna pellentesque orci, quis tempus erat nulla id magna. Duis lobortis eros est, sed dignissim tellus ultricies convallis. Nulla auctor eros nec tellus viverra, non convallis lacus aliquet.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Maecenas efficitur orci leo, eu aliquam purus varius aliquam. Sed vitae eros maximus neque cursus venenatis sed nec enim. Nulla quis eros eget mi viverra porttitor eget nec erat. In nec ipsum eget odio mollis tempus. Aenean consequat facilisis vehicula. Ut egestas at ante id molestie. Donec condimentum, magna at ultricies congue, dui dolor auctor ipsum, at iaculis sapien arcu et felis. Suspendisse neque ante, ultrices a eleifend et, sollicitudin bibendum lorem. Fusce rutrum posuere lectus ac fringilla. Aliquam consectetur vulputate tempus.&lt;/p&gt;', '2017-11-24 00:19:45', 'splashing-143063_1920.jpg', 'Jean Forteroche', 1),
(17, 'Article 2: Le festin de Versailles', '&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat gravida sagittis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed tincidunt ipsum sed augue feugiat, quis imperdiet lectus sodales. Aenean rhoncus auctor convallis. Quisque sit amet tempus dui. Maecenas consectetur efficitur nisi, ac efficitur libero luctus a. Sed molestie accumsan dolor ut sagittis. Phasellus a elit et turpis laoreet ornare nec in quam.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Nunc tincidunt porttitor mi, in ultricies justo congue et. Fusce rhoncus nulla metus. Donec congue mattis nisi, id malesuada lacus semper ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eget scelerisque ex, sit amet aliquam turpis. Sed bibendum dapibus sem, quis ornare tortor. Nulla sollicitudin commodo orci et malesuada. Suspendisse ut mattis nulla. Pellentesque vel dignissim lectus. Sed aliquet ut est eu sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Nulla vitae consequat lorem, nec convallis eros. Fusce elementum est at nulla luctus vestibulum. Ut a lacus varius, auctor est vel, tincidunt massa. Duis tempor, eros sit amet gravida maximus, orci elit tristique sapien, eget efficitur lectus odio non sapien. Aliquam vel lacinia tellus. Praesent justo dui, vehicula ornare volutpat vel, tempor sed eros. Nullam commodo massa in justo sodales, vel vehicula mauris vehicula. Praesent gravida augue sit amet magna sagittis tincidunt. Donec porttitor, neque in maximus sagittis, velit augue consequat odio, at suscipit nulla urna ut magna. Ut eget nisi metus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Phasellus et mauris eu ipsum molestie ornare. Quisque lectus ipsum, aliquam quis sem nec, feugiat hendrerit mauris. Integer in pretium est. Cras imperdiet pulvinar risus, id mollis nulla viverra a. Donec facilisis, nunc id pellentesque ultricies, ex urna pellentesque orci, quis tempus erat nulla id magna. Duis lobortis eros est, sed dignissim tellus ultricies convallis. Nulla auctor eros nec tellus viverra, non convallis lacus aliquet.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Maecenas efficitur orci leo, eu aliquam purus varius aliquam. Sed vitae eros maximus neque cursus venenatis sed nec enim. Nulla quis eros eget mi viverra porttitor eget nec erat. In nec ipsum eget odio mollis tempus. Aenean consequat facilisis vehicula. Ut egestas at ante id molestie. Donec condimentum, magna at ultricies congue, dui dolor auctor ipsum, at iaculis sapien arcu et felis. Suspendisse neque ante, ultrices a eleifend et, sollicitudin bibendum lorem. Fusce rutrum posuere lectus ac fringilla. Aliquam consectetur vulputate tempus.&lt;/p&gt;', '2017-11-24 00:19:24', 'Salle_fete.jpg', 'Jean Forteroche', 1),
(19, 'Article 4: IdÃ©e en vrac', '&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat gravida sagittis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed tincidunt ipsum sed augue feugiat, quis imperdiet lectus sodales. Aenean rhoncus auctor convallis. Quisque sit amet tempus dui. Maecenas consectetur efficitur nisi, ac efficitur libero luctus a. Sed molestie accumsan dolor ut sagittis. Phasellus a elit et turpis laoreet ornare nec in quam.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Nunc tincidunt porttitor mi, in ultricies justo congue et. Fusce rhoncus nulla metus. Donec congue mattis nisi, id malesuada lacus semper ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eget scelerisque ex, sit amet aliquam turpis. Sed bibendum dapibus sem, quis ornare tortor. Nulla sollicitudin commodo orci et malesuada. Suspendisse ut mattis nulla. Pellentesque vel dignissim lectus. Sed aliquet ut est eu sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Nulla vitae consequat lorem, nec convallis eros. Fusce elementum est at nulla luctus vestibulum. Ut a lacus varius, auctor est vel, tincidunt massa. Duis tempor, eros sit amet gravida maximus, orci elit tristique sapien, eget efficitur lectus odio non sapien. Aliquam vel lacinia tellus. Praesent justo dui, vehicula ornare volutpat vel, tempor sed eros. Nullam commodo massa in justo sodales, vel vehicula mauris vehicula. Praesent gravida augue sit amet magna sagittis tincidunt. Donec porttitor, neque in maximus sagittis, velit augue consequat odio, at suscipit nulla urna ut magna. Ut eget nisi metus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Phasellus et mauris eu ipsum molestie ornare. Quisque lectus ipsum, aliquam quis sem nec, feugiat hendrerit mauris. Integer in pretium est. Cras imperdiet pulvinar risus, id mollis nulla viverra a. Donec facilisis, nunc id pellentesque ultricies, ex urna pellentesque orci, quis tempus erat nulla id magna. Duis lobortis eros est, sed dignissim tellus ultricies convallis. Nulla auctor eros nec tellus viverra, non convallis lacus aliquet.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;&quot;&gt;Maecenas efficitur orci leo, eu aliquam purus varius aliquam. Sed vitae eros maximus neque cursus venenatis sed nec enim. Nulla quis eros eget mi viverra porttitor eget nec erat. In nec ipsum eget odio mollis tempus. Aenean consequat facilisis vehicula. Ut egestas at ante id molestie. Donec condimentum, magna at ultricies congue, dui dolor auctor ipsum, at iaculis sapien arcu et felis. Suspendisse neque ante, ultrices a eleifend et, sollicitudin bibendum lorem. Fusce rutrum posuere lectus ac fringilla. Aliquam consectetur vulputate tempus.&lt;/p&gt;', '2017-12-04 15:33:03', 'Champs.jpg', 'Jean Forteroche', 1),
(24, 'Test article redaction', '&lt;p&gt;bal bala abl abal bala abl abal bala abl abal bala abl abal bala abl abal bala abl abal bala abl abal bala abl abal bala abl a&lt;/p&gt;', '2017-12-04 15:33:57', 'angle_de_rue.jpg', 'Jean Forteroche', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
