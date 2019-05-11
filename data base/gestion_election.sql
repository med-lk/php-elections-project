-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2019 at 04:32 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_election`
--

-- --------------------------------------------------------

--
-- Table structure for table `citoyen`
--

DROP TABLE IF EXISTS `citoyen`;
CREATE TABLE IF NOT EXISTS `citoyen` (
  `Cin` varchar(20) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'assets/img/user.png',
  PRIMARY KEY (`Cin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citoyen`
--

INSERT INTO `citoyen` (`Cin`, `Nom`, `prenom`, `image`) VALUES
('EE12345', 'Ziadi', 'mohamed', 'assets/img/profile/Photo-profil-professionnelle-par-photographe-entreprise10.jpg'),
('EE733511', 'hassan', 'abdo', 'assets/img/profile/images.jpg'),
('EE445599', 'ben Ziad', 'fatima', 'assets/img/profile/formidable.jpg'),
('EE987445', 'mohcin', 'ileas', 'assets/img/profile/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `condidat`
--

DROP TABLE IF EXISTS `condidat`;
CREATE TABLE IF NOT EXISTS `condidat` (
  `cin_cond` varchar(20) NOT NULL,
  `idpartie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`cin_cond`),
  KEY `FK_idpa` (`idpartie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `condidat`
--

INSERT INTO `condidat` (`cin_cond`, `idpartie`, `nom`, `prenom`, `picture`) VALUES
('E1234', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
CREATE TABLE IF NOT EXISTS `inscrit` (
  `cin` varchar(20) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tele` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `datnaiss` date NOT NULL,
  `idpartie` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cin`),
  KEY `FK_partie` (`idpartie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inscrit`
--

INSERT INTO `inscrit` (`cin`, `Nom`, `prenom`, `adresse`, `tele`, `password`, `datnaiss`, `idpartie`) VALUES
('EE733511', 'qsd', 'sdsq', 'qsd@gmail.com', '06325557', '15646', '2019-05-23', 0),
('EE12345', 'aze', 'qdds', 'qsd@gmail.com', '06325557', '123', '2019-05-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `idpartie` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(90) NOT NULL,
  `leader_name` varchar(80) NOT NULL,
  `leader_image` varchar(100) NOT NULL,
  `partie_image` varchar(100) NOT NULL,
  PRIMARY KEY (`idpartie`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partie`
--

INSERT INTO `partie` (`idpartie`, `full_name`, `leader_name`, `leader_image`, `partie_image`) VALUES
(1, 'حزب العدالة والتنمية', 'saad din loutmani', 'assets/img/Saad-Eddine_Al-Othmani.jpg', 'assets/img/download.jpg'),
(2, 'حزب الاستقلال', 'نزار بركة', 'assets/img/21067458-24262279.jpg', 'assets/img/BalanceIstiqlal.jpg'),
(3, 'التجمع الوطني للأحرار', 'عزيز أخنوش', 'assets/img/3ACF7A08-C982-4C87-8036-8BB4CDA1D410-6512-00000B1E99AB3D4C_tmp.jpg', 'assets/img/1543359417.jpg'),
(4, 'حزب الاصالة والمعاصرة', 'عبد الحكيم بنشماش', 'assets/img/280px-thumbnail.jpg', 'assets/img/5011.jpg'),
(5, 'الاتحاد الاشتراكي للقوات الشعبية', ' إدريس لشكر', 'assets/img/141226094438.jpg', 'assets/img/news_1404091838.jpg'),
(6, 'الحركة الشعبية', 'امحند العنصر', 'assets/img/350.jpg', 'assets/img/haraka.jpg'),
(7, 'الإتحاد الدستوري', 'محمد ساجد', 'assets/img/mohamed_sajid_040.jpg', 'assets/img/logo-150.png'),
(8, 'حزب الوسط الاجتماعي', 'حسن مديح', 'assets/img/balagh.jpg', 'assets/img/resize.jpg'),
(9, 'حزب النهضة والفضيلة ', 'محمد خليدي', 'assets/img/mohamedkhalidi_813030674.jpg', 'assets/img/download1.png'),
(10, 'حزب الأمل ', 'محمد باني', 'assets/img/hqdefault1.jpg', 'assets/img/download11.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
