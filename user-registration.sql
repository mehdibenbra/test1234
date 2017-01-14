-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 08:47 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `categorisation` varchar(255) NOT NULL,
  `tickets` int(5) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `location`, `startdate`, `enddate`, `categorisation`, `tickets`, `userid`) VALUES
(19, 'teuf', 'dab', 'park', '2018-02-01', '2018-01-31', 'Tennis', 3, 8),
(20, 'rolland garos', 'tournament', 'Paris', '2017-03-01', '2017-02-26', 'Tennis', 43, 9),
(21, 'test', 'd', 'd', '2016-01-01', '2016-02-01', 'Tennis', 18, 9),
(22, 'alala', 'alalal', 'allala', '2015-01-01', '2016-01-01', 'Football', 788, 8),
(23, 'event1', 'hehey', 'suisse', '2018-01-01', '2019-01-01', 'Basket', 131, 8),
(24, 'wesh', 'weshwesh', 'jss pas', '2017-01-09', '2017-01-09', 'Tennis', 3455, 5),
(25, 'fdjfj', 'kjkfj', 'jkfd', '2017-01-11', '2017-01-11', 'Tennis', 23, 5),
(26, 'US open', 'no se', 'us', '2017-01-10', '2017-01-09', 'Tennis', 3455, 5);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(256) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `email`, `adress`, `age`, `phone`, `username`, `password`) VALUES
(5, 'Mehdi', 'Benbrahim', 'm.benbrahimelandaloussi@gmail.com', '109-113 Whitfield Street, 20 Montagu House', '20', '07877465254', 'mehdi', '0123456789'),
(6, 'Hicham', 'Ameur', 'm.el-andaloussi@ucl.ac.uk', 'Maarif Casablanca', '20', '04873829403', 'hicham', '0123456789'),
(7, 'wesh', 'alors', 'mfjdk', 'kfdfd', 'hkv11', '2394', 'dhsj', 'KFFL'),
(8, 'Francois', 'De Roquefeuil', 'nono@nono.com', 'djeklfe', '23', '933', 'francix', '0123456789'),
(9, 'Ali', 'Al Jawahiri', 'm.benbrahimelandaloussi@gmail.com', 'nose', '20', '9321', 'ali', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberidattending` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `usergrade` varchar(255) NOT NULL,
  `usercomment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `memberidcreator` (`memberidattending`),
  KEY `id` (`id`),
  KEY `eventid` (`eventid`),
  KEY `usergrade` (`usergrade`,`usercomment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `memberidattending`, `eventid`, `usergrade`, `usercomment`) VALUES
(1, 9, 19, '1/5', ''),
(2, 9, 21, '1/5', ''),
(3, 9, 21, '1/5', ''),
(4, 9, 19, '1/5', ''),
(5, 9, 21, '1/5', ''),
(6, 6, 19, '1/5', ''),
(7, 5, 21, '1/5', ''),
(8, 5, 20, '5/5', 'ah merde'),
(9, 9, 20, '', ''),
(10, 9, 21, '', ''),
(11, 9, 20, '', ''),
(12, 8, 22, '1/5', 'fjk'),
(13, 8, 23, '1/5', 'oufi'),
(14, 5, 24, '', ''),
(15, 5, 26, '', ''),
(16, 5, 19, '3/5', 'nique nique'),
(17, 5, 19, '3/5', 'nique nique'),
(18, 5, 19, '3/5', 'nique nique'),
(19, 5, 23, '', ''),
(20, 5, 20, '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`memberidattending`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
