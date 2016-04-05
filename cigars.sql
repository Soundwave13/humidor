-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2014 at 05:54 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cigars`
--
CREATE DATABASE IF NOT EXISTS `cigars` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cigars`;

-- --------------------------------------------------------

--
-- Table structure for table `cigarlist`
--

CREATE TABLE IF NOT EXISTS `cigarlist` (
  `CigID` int(11) NOT NULL AUTO_INCREMENT,
  `OriginCountry` varchar(30) DEFAULT NULL,
  `Manufacturer` varchar(30) DEFAULT NULL,
  `Brand` varchar(30) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `TypeShape` varchar(30) DEFAULT NULL,
  `Length` varchar(10) DEFAULT NULL,
  `RingGage` varchar(2) DEFAULT NULL,
  `PurchaseDate` varchar(20) DEFAULT NULL,
  `Price` decimal(4,2) DEFAULT NULL,
  `PointOfSale` varchar(30) DEFAULT NULL,
  `BoxCode` varchar(20) DEFAULT NULL,
  `MfgDate` varchar(20) DEFAULT NULL,
  `DateRemoved` varchar(20) DEFAULT NULL,
  `Picture` blob,
  PRIMARY KEY (`CigID`),
  KEY `CigID` (`CigID`),
  KEY `CigID_2` (`CigID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Cigar Inventory' AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cigarlist`
--

INSERT INTO `cigarlist` (`CigID`, `OriginCountry`, `Manufacturer`, `Brand`, `Name`, `TypeShape`, `Length`, `RingGage`, `PurchaseDate`, `Price`, `PointOfSale`, `BoxCode`, `MfgDate`, `DateRemoved`, `Picture`) VALUES
(1, 'Cuba', 'Habanos SA', 'Monte Cristo', 'Monte #2', 'Torpedo', '6.25', '52', '2014-10-22', '10.00', 'Swiss', 'ABC123', 'June 2010', '2014-10-28', NULL),
(2, 'Nicaragua', 'My Father', 'Tatuaje', 'J21', 'Robusto', '5.0', '50', '2014-10-01', '10.00', 'Famous', 'JUN014', 'June 2014', NULL, NULL),
(3, 'Cuba', 'El Laguito', 'Cohiba', 'CORO', 'robusto', '5.0', '50', 'May 2012', '12.00', 'Swiss', 'CBA321', 'February 2010', '', NULL),
(4, 'Dominican Republic', 'Arturo Fuente', 'Opus X', 'XXX', 'Figurado', '4.5', '48', '2014-07-01', '13.00', 'Holts', NULL, 'February 2011', NULL, NULL),
(6, 'Cuba', 'El Laguito', 'Cohiba', 'CORO', 'Robusto', '5', '50', '7/31/13', '13.00', 'Swiss', NULL, 'May 2012', NULL, NULL),
(7, 'Nicaragua', 'My Father Cigars', 'Tatuaje', 'Tat Black CG', 'Corona Gorda', '5', '46', '10/15/2010', '10.00', 'Atlantic Cigar', NULL, 'August 2009', NULL, NULL),
(8, 'Cuba', 'Partagas', 'Partagas', 'Partagas 898', 'lonsdale', '6.75', '46', '5/1/2013', '10.00', 'Swiss', '', 'August 2012', '', NULL),
(9, 'Nicaragua', 'My Father Cigars', 'Tatuaje', 'Frank', 'Churchill', '7.3', '49', '10/31/2009', '13.00', 'Famous', '666', 'March 2009', '10/31/2010', NULL),
(10, 'Nicaragua', 'Drew Estates', 'Drew Estates', 'Dirty Rat', 'Corona', '4.75', '43', '7/15/14', '12.00', 'Atlantic Cigar', '', 'Feb 2012', '', NULL),
(11, 'D', 'D', 'D', 'DELETE TEST', 'D', 'D', 'D', 'D', '5.00', 'D', 'D', 'D', 'D', NULL),
(12, 'D', 'D', 'D', 'DELETE2', 'D', 'D', 'D', 'D', '5.00', 'D', 'D', 'D', 'D', NULL),
(13, 'D', 'D', 'D', 'DELETE3', 'D', 'D', 'D', 'D', '5.00', 'D', 'D', 'D', 'D', NULL),
(14, 'D', 'D', 'D', 'REVIEWTEST', 'D', 'D', 'D', 'D', '5.00', 'D', 'D', 'D', 'D', NULL),
(15, 'D', 'D', 'D', 'REVIEWTEST2', 'D', 'D', 'D', 'D', '5.00', 'D', 'D', 'D', 'D', NULL),
(16, 'D', 'D', 'D', 'REVIEWTEST3', 'D', 'D', 'D', 'D', '5.00', 'D', 'D', 'D', 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `ReviewID` int(5) NOT NULL AUTO_INCREMENT,
  `CigarID` varchar(5) DEFAULT NULL,
  `ReviewDate` varchar(20) DEFAULT NULL,
  `Blend` varchar(100) DEFAULT NULL,
  `Strength` varchar(100) DEFAULT NULL,
  `Construction` varchar(100) DEFAULT NULL,
  `FlavorProfile` varchar(150) DEFAULT NULL,
  `Burn` varchar(100) DEFAULT NULL,
  `Pairing` varchar(100) DEFAULT NULL,
  `Overall` varchar(200) DEFAULT NULL,
  `Score` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ReviewID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Cigar Review Database' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `CigarID`, `ReviewDate`, `Blend`, `Strength`, `Construction`, `FlavorProfile`, `Burn`, `Pairing`, `Overall`, `Score`) VALUES
(1, '1', '2014-10-28', 'Cuban volado wrapper; est. 20% ligero, 40% Seco, \r\n40% Volado filler', 'Medium strength; full bodied', 'Tight draw for first 1/3; firm to the pinch', 'Classic cuban flavors, rich cocoa and coffee with \r\nnotes of raisin', 'Slightly uneven, self corrected 1/2 way', 'Cuban espresso, water', 'Classic cigar, I see why it’s one of the best selling in\r\nthe world. Box-worthy!', '93'),
(2, '7', 'May 2012', 'Nicaraguan Sun Grown Criollo Estelí with Nicaraguan binder & filler', 'Medium-full', 'covered foot, firm to the touch, easy draw', 'dark chocolate, espresso, graham cracker, cream', 'even burn and solid ash throughout', 'Jones Cream Soda', 'Fantastic cigar, highly recommend!', '95'),
(3, '8', 'July 2014', 'n/a', 'Medium-full', 'spongy lumpy packed dark brown wrapper with a glove soft oily feel', 'Peppery, creamy, buttery, spicy', 'Slightly uneven, but self correcting', 'Sparkling Cider', 'One of my favorite Cuban cigars, also a favorite size.', '92'),
(4, '2', 'April 2014', 'Ecuadorian Habano ligero wrapper and Nicaraguan fillers', NULL, 'Firm, no soft spots, triple capped, smooth draw', 'Rich wood & barnyard, coffee, raisins', 'even with near white ash, drop after 1.5 inches', 'Root beer', 'strong but rich cigar, highly recommend', '89'),
(7, '10', '123', 'test', NULL, 'test', 'test', 'testtest', 'test', 'test', '65'),
(8, '3', 'Oct 2014', 'Ligero Sungrown Wrapper, aged binder & filler', NULL, 'rough wrapper, slightly firm draw', 'Cinnamon, almonds, white tea, slight raisin', 'Slightly uneven, draw opened at 1/3', 'Lemon water', 'Excellent', '91'),
(9, '4', 'July 2014', 'Sungrown Wrapper, Ligero Filler', NULL, 'Flawless, smooth tooth, easy draw', 'Citrus, graham, cranberries', 'Even, white ash', 'Lemonaid', 'Outstanding, though became bitter in last 1/3', '90'),
(10, '14', '12/9/14', 'ok', NULL, 'ok', 'ok', 'ok', 'ok', 'ok', '50'),
(11, '15', '12/10/14', 'ok', NULL, 'ok', 'ok', 'o', 'kok', 'ok', '55');

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE IF NOT EXISTS `userdb` (
  `UserID` varchar(20) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `OverEighteen` tinyint(1) DEFAULT NULL,
  `UserName` varchar(20) DEFAULT NULL,
  `UserPassword` varchar(20) DEFAULT NULL,
  `UserEmail` varchar(40) DEFAULT NULL,
  `UserPhone` varchar(20) DEFAULT NULL,
  `PostalCode` int(10) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdb`
--

INSERT INTO `userdb` (`UserID`, `FirstName`, `LastName`, `OverEighteen`, `UserName`, `UserPassword`, `UserEmail`, `UserPhone`, `PostalCode`) VALUES
('admin', 'Andrew', 'Bisson', 1, 'andrew', 'andrew', 'ajbisson@rcn.com', '1231231234', 18064),
('guest', 'Joe', 'Smith', 0, 'guest', 'password', 'joesmith@123.com', '9879879876', 12345);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
