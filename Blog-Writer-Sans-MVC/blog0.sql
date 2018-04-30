-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 avr. 2018 à 11:13
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
-- Base de données :  `blog0`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'modo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `token`, `role`) VALUES
(1, 'Jean Forteroche', 'mathsperformances@gmail.com', '70ccd9007338d6d81dd3b6271621b9cf9a97ea00', 'FantZ2s6G4UXRRX9rvOl', 'admin');

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
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `date`, `seen`) VALUES
(2, 'Souhayb', 'mathsperformances@gmail.com', 'bala bala bla abla ablaa  balal', 3, '2017-10-17 22:48:30', 0),
(3, 'Souhayb1', 'mathsperformances@gmail.com', 'balbabzzlezl ffhzpfeehfezfn', 3, '2017-10-25 10:41:10', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'post.png',
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `writer`, `image`, `date`, `posted`) VALUES
(3, 'Ebauche 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a justo at turpis rutrum dictum et at nibh. In et est maximus, tempus tortor vel, ultricies diam. Pellentesque mauris velit, rutrum a varius accumsan, accumsan ac dolor. Cras elementum tellus metus, ac commodo quam facilisis et. In dictum sit amet magna ut efficitur. Nullam maximus ligula eget diam viverra, molestie faucibus felis fringilla. Vestibulum facilisis purus ac dignissim maximus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Morbi vel tincidunt ex.\r\n\r\nEtiam blandit lectus vel mi convallis convallis. Pellentesque vulputate libero sed fringilla faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in dui at nisi elementum congue. Etiam accumsan erat at tellus dapibus ultricies. Quisque suscipit massa neque. Vivamus sed nisl ut nibh fringilla aliquet a nec magna. Etiam efficitur ac neque blandit elementum. Mauris lacinia, leo vitae lacinia malesuada, libero neque volutpat ex, sit amet rutrum quam nulla nec nibh. Pellentesque auctor, nibh sed eleifend tempus, tortor metus scelerisque nibh, varius vehicula sapien magna et purus. Vivamus cursus lacus eget eros luctus pretium. Nullam congue mollis bibendum. Aenean sollicitudin et dolor non porttitor.\r\n\r\nSed tempor finibus nulla vel aliquet. Proin eu est consequat, efficitur ex eu, auctor dolor. Fusce malesuada tempor ex ac luctus. Aenean laoreet lorem posuere ex pellentesque consequat eget a augue. Pellentesque aliquam sed metus eu sagittis. Suspendisse lacus lectus, vestibulum eget ligula sit amet, varius eleifend ipsum. Praesent et erat vel dolor vehicula rutrum quis sit amet lacus. Aenean et nisi nunc. Mauris viverra, massa quis egestas blandit, magna libero gravida est, ut aliquam arcu nulla sit amet nulla. Aliquam finibus eget erat scelerisque rhoncus.\r\n\r\nQuisque eu commodo leo, eu dignissim erat. Integer at dictum nisi. Quisque iaculis eleifend mi quis congue. Curabitur sapien metus, tristique quis sem sed, interdum eleifend augue. Curabitur mollis neque eu tempor molestie. In ut purus pellentesque tortor ornare ultrices vitae eget ipsum. Praesent arcu nibh, molestie nec scelerisque ac, mattis eu elit. Fusce vitae consectetur leo, vitae egestas mi. Duis pretium, lectus viverra malesuada auctor, nisl nibh ultrices nisi, at lobortis purus ex ac lacus. In nec ex dolor. Donec porta mauris id tellus volutpat, non ultrices erat condimentum. Phasellus ultricies sem nec neque suscipit ultricies. Donec faucibus blandit lorem, eu commodo justo gravida ut. Fusce egestas ex nec porta dapibus. Fusce vitae turpis est. Integer eu libero quam.\r\n\r\nDonec aliquet dolor vel facilisis imperdiet. Donec pharetra nulla elit, vitae scelerisque quam dictum quis. Mauris quis quam et justo rutrum iaculis. Pellentesque quis turpis risus. Quisque pharetra, sapien vel convallis lobortis, eros odio interdum lectus, at luctus dui justo ut lacus. Fusce dignissim lacus orci, non ullamcorper diam dapibus at. Vestibulum finibus lobortis enim non sagittis. Maecenas ornare volutpat risus, non scelerisque felis ultricies id.\r\n\r\nVivamus sit amet lorem pellentesque, egestas eros eu, tincidunt mauris. Mauris vestibulum risus et arcu scelerisque rutrum. Nam finibus, lectus a luctus tempus, nunc mauris luctus dolor, viverra feugiat neque elit ut quam. Nunc efficitur efficitur lobortis. Sed sed interdum urna. Sed venenatis gravida sapien sed pulvinar. Ut sollicitudin eros ligula, eget ultrices dolor lobortis ut. In nec tortor sem. Integer euismod, odio at ornare placerat, erat tellus tempor eros, eget mollis risus metus malesuada lorem. Maecenas eget suscipit lectus. Aliquam pharetra sem id elit rutrum, eget cursus orci finibus.\r\n\r\nMauris aliquet turpis ultricies dignissim commodo. Sed interdum, enim eu sagittis lobortis, quam quam imperdiet justo, at fermentum dolor elit ut nisi. Sed tincidunt, sapien aliquam pellentesque mattis, lorem justo tristique mi, pulvinar semper augue ligula et sem. Donec vel elit eu est tristique posuere at at nisi. Integer sed est et nisi viverra bibendum. Praesent iaculis quam eu dui interdum finibus. Maecenas mi odio, ultrices sed purus sodales, condimentum pretium mi. Duis placerat tellus massa, vel efficitur lectus dignissim vitae. Nullam id sollicitudin turpis. Ut bibendum feugiat sem, et mattis diam ultrices ac. Morbi nec dolor sodales, laoreet ante laoreet, pretium tortor. Donec at mauris lorem. Nunc ut felis lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer elementum dapibus condimentum. Sed vitae nunc aliquet, sodales ante et, dictum orci.\r\n\r\nNunc eros sem, euismod non felis eget, fringilla interdum leo. Suspendisse blandit viverra turpis, porta lacinia purus imperdiet quis. Sed a commodo risus, ac faucibus magna. Mauris auctor ligula lacus, quis fermentum eros tempus nec. Vestibulum eget mi semper, maximus mi ultrices, malesuada magna. Aliquam sagittis eleifend metus. Mauris aliquet elit erat, vitae congue ligula blandit eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent maximus molestie neque, sed finibus dolor finibus non. Duis maximus leo sed augue auctor, consectetur placerat magna ullamcorper. Quisque et viverra nulla, luctus facilisis neque. Morbi at ultricies lectus. Mauris orci est, dictum quis facilisis at, volutpat pellentesque lacus. Phasellus diam dui, fringilla et condimentum sit amet, viverra quis lorem.\r\n\r\nDonec blandit ac libero eget vestibulum. Morbi gravida eu nisl varius faucibus. Donec in diam ante. Nullam pulvinar nibh vel dolor varius tempus. Aenean dignissim eros lorem, vitae varius ligula malesuada eu. Quisque cursus pharetra rhoncus. Morbi id aliquet metus, id posuere felis. Morbi condimentum ultrices dolor a condimentum. Aenean faucibus urna sit amet suscipit sodales.\r\n\r\nNam et sodales leo. Morbi pharetra massa tincidunt turpis venenatis luctus. In aliquam tempus mauris rhoncus placerat. Vivamus ut augue eget nunc lobortis vehicula. Donec eu diam a ante condimentum posuere in ut diam. Fusce vestibulum luctus eros, sed posuere mauris pellentesque nec. Duis at mi in libero aliquet tristique vitae nec justo. Fusce a rutrum sem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec sit amet sodales ipsum, nec viverra nibh. Vivamus lobortis, neque ut tempus fringilla, dolor diam efficitur mauris, et aliquet ex odio vitae est. Suspendisse eu quam nibh. Fusce commodo elit vel rhoncus sagittis. Pellentesque dignissim magna orci, nec malesuada est pellentesque sit amet. Aliquam consequat lorem sed felis lobortis, placerat varius lectus tincidunt.', 'mathsperformances@gmail.com', '3.jpg', '2016-01-08 20:55:14', 1),
(20, 'Ebauche 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna eget iaculis sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque mi nisi, aliquet non viverra eget, hendrerit eleifend enim. Praesent finibus tortor at scelerisque varius. Etiam malesuada eros lobortis neque ullamcorper, quis aliquet arcu ornare. Nam vulputate quam turpis, eget varius massa lacinia ut. Phasellus laoreet maximus consectetur. Nam pulvinar arcu massa, in aliquam diam tempus at. Ut ac quam cursus elit porttitor aliquam pharetra sed ligula. Nam eleifend eleifend erat, a congue nisi. Duis dapibus facilisis nulla, a gravida velit posuere vel. Suspendisse ac iaculis lacus. Integer ornare velit sapien, ac vulputate arcu ultricies nec. Suspendisse id felis sagittis, eleifend neque tempor, egestas ligula. Cras quis diam consectetur, pharetra justo facilisis, dictum ipsum. Suspendisse nec mauris a nibh iaculis convallis in sit amet justo.\r\n\r\nPhasellus purus nunc, pharetra at neque nec, semper placerat eros. Maecenas vel commodo nunc. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultrices mauris vel dapibus dignissim. Duis porttitor a augue at blandit. Nulla facilisi. Quisque iaculis, eros vitae egestas pulvinar, dolor sapien ultricies massa, eget imperdiet erat mi id dui. Pellentesque et pretium purus. Aenean lacinia turpis quis orci fringilla pellentesque. Praesent at dapibus justo, eget interdum nulla.\r\n\r\nPhasellus in sapien laoreet, ullamcorper orci vitae, congue erat. Donec nec pharetra mi, eu accumsan risus. Mauris vestibulum justo ultrices venenatis semper. Donec rhoncus, justo a ullamcorper tempus, leo felis varius ex, quis hendrerit velit purus et dui. Suspendisse sed nibh risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus eros elit, tempus id lacus sit amet, vulputate porta enim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum commodo felis lacus, vel aliquet ligula ultricies sed.\r\n\r\nEtiam condimentum felis eu nisl vestibulum suscipit. In mollis sodales leo, vitae pretium odio faucibus vel. Nulla porttitor accumsan nunc, vitae ornare tortor dignissim ac. Etiam pretium, ipsum non ultrices pharetra, tellus arcu porta nulla, ut scelerisque nunc tortor vel ligula. Quisque mi diam, fringilla nec sapien gravida, viverra cursus libero. Proin tristique lobortis enim, vel blandit sem. Donec posuere est vitae nibh suscipit, ut porttitor sem malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris at mauris at turpis egestas egestas. Aenean congue ullamcorper dolor sed varius. Integer nec malesuada est. Integer viverra mattis orci, at aliquet enim dictum nec.', 'mathsperformances@gmail.com', '20.jpg', '2016-01-08 20:54:46', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
