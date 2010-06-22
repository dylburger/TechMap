-- MySQL dump 10.11
--
-- Host: localhost    Database: techMap
-- ------------------------------------------------------
-- Server version	5.0.32-Debian_7etch5-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminEmail` varchar(255) NOT NULL,
  `debugging` tinyint(1) NOT NULL,
  `holiday` tinyint(1) NOT NULL,
  `summer` tinyint(1) NOT NULL,
  PRIMARY KEY  (`adminEmail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `availableComps`
--

DROP TABLE IF EXISTS `availableComps`;
CREATE TABLE `availableComps` (
  `pcId` int(11) NOT NULL,
  `lab` varchar(255) default NULL,
  `compOn` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`pcId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `bugs`
--

DROP TABLE IF EXISTS `bugs`;
CREATE TABLE `bugs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `numVotes` int(11) NOT NULL default '0',
  `developer` varchar(255) default NULL,
  `priority` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `labs`
--

DROP TABLE IF EXISTS `labs`;
CREATE TABLE `labs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `stringRep` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) default NULL,
  `openStatus` tinyint(1) NOT NULL default '0',
  `alwaysOpenStatus` tinyint(1) NOT NULL default '0',
  `statusMessage` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `ooStats`
--

DROP TABLE IF EXISTS `ooStats`;
CREATE TABLE `ooStats` (
  `id` int(11) NOT NULL,
  `printerId` int(11) NOT NULL,
  `ooStatus` tinyint(1) NOT NULL default '0',
  `time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `printers`
--

DROP TABLE IF EXISTS `printers`;
CREATE TABLE `printers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `stringRep` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `lab` varchar(255) NOT NULL,
  `openStatus` tinyint(1) NOT NULL default '1',
  `ooStatus` tinyint(1) NOT NULL default '0',
  `sendEmail` tinyint(1) NOT NULL default '1',
  `openStatusMessage` varchar(255) NOT NULL,
  `closedStatusMessage` varchar(255) NOT NULL,
  `ooStatusMessage` varchar(255) NOT NULL,
  `tonerLevel` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `labId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `staticLabHours`
--

DROP TABLE IF EXISTS `staticLabHours`;
CREATE TABLE `staticLabHours` (
  `id` int(11) NOT NULL,
  `labId` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `openTime` int(11) NOT NULL,
  `closedTime` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `tonerStats`
--

DROP TABLE IF EXISTS `tonerStats`;
CREATE TABLE `tonerStats` (
  `id` int(11) NOT NULL,
  `printerId` int(11) NOT NULL,
  `tonerLevel` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `e-mail` varchar(255) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-04-06  5:25:58
