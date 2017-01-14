-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 11:28 PM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `startdate` varchar(255) NOT NULL,
  `enddate` varchar(255) NOT NULL,
  `categorisation` varchar(255) NOT NULL,
  `tickets` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `location`, `startdate`, `enddate`, `categorisation`, `tickets`, `userid`) VALUES
(1, 'New years eve', 'Rooftop party', 'Paris', '2016-01-21', '2017-01-15', 'Basket', '24', 1),
(2, 'end of term', 'ca va etre nicee', 'London', '2017-01-29', '2017-01-26', 'Football', '29', 2),
(3, 'Bourrage de gueule', 'Coca gratuit', 'Casablanca', '2017-01-26', '2017-01-31', 'Basket', '19', 2),
(4, 'caca', 'popo', 'Hhhh', '2017-01-25', '2017-01-29', 'Basket', '22', 2),
(5, 'geoges clooney', 'iwbdbsk', 'ieibwfadslz', '2017-01-04', '2017-01-20', 'Basket', '30', 2),
(6, 'Tournoi chez oim', 'mehdi est invite', '28 phoenix court', '2017-01-22', '2017-01-10', 'Basket-ball', '33', 2),
(7, 'Manchester party', 'Booze and shit', 'Majorca', '2017-02-05', '2017-01-19', 'Tournament', '28', 6),
(8, 'test', 'test', 'kaka', '2017-01-03', '2016-12-26', 'Tournament', '33', 6),
(9, 'test2', 'test2', 'pipi', '2017-02-05', '2017-01-19', 'Tournament', '0', 6),
(10, 'Tournament chez oim ', 'BIBOKA', 'UCL', '2017-01-31', '2017-01-19', 'Tennis', '3', 6),
(11, 'WHATCHOUSAY', 'COSY', 'linon', '2017-01-12', '2017-01-12', 'Basket-ball', '3', 6),
(12, 'zabpartybitch', 'Rooftop partysa even if cold', 'kdjijwbq', '2017-01-28', '2017-01-19', 'Tennis', '23', 6),
(13, 'putaindemerde', 'broww', 'ijwldsn', '2017-01-29', '2017-01-17', 'Basket-ball', '44', 6);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `email`, `adress`, `age`, `phone`, `username`, `password`) VALUES
(1, 'Hicham', 'Ameur', 'hicham.ameur.14@ucl.ac.uk', '28 Phoenix Court', 23, 2147483647, 'Hicham113', 'ascvdz'),
(2, 'Mehdi', 'Benbrahim', 'mbenbra@gmail.com', '22', 31, 671915447, 'MehdiB', 'ascvdz'),
(3, 'Rambo', 'Stallone', 'london@gmail.com', '28 taha houcine', 43, 661312329, 'Rambo113', 'ascvdz'),
(4, '', '', '', '', 0, 0, 'hgttr', 'ascvdz'),
(5, '', '', '', '', 0, 0, 'ff', 'ascvdz'),
(6, 'Bryan', 'Cahill', 'bryancahill@hotmail.com', '23 Gower street', 29, 671915447, 'Alami', 'ascvdz');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `usergrade` int(11) NOT NULL,
  `usercomment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `memberid` (`memberid`,`eventid`),
  KEY `eventid` (`eventid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `memberid`, `eventid`, `usergrade`, `usercomment`) VALUES
(1, 2, 1, 0, ''),
(2, 1, 2, 0, ''),
(3, 2, 2, 0, ''),
(4, 2, 3, 0, ''),
(5, 1, 3, 0, ''),
(6, 2, 4, 0, ''),
(7, 2, 5, 0, ''),
(8, 1, 5, 0, ''),
(10, 2, 1, 0, ''),
(11, 2, 2, 0, ''),
(12, 1, 1, 0, ''),
(13, 1, 1, 0, ''),
(14, 1, 3, 0, ''),
(15, 6, 3, 0, ''),
(16, 6, 7, 0, ''),
(17, 6, 7, 0, ''),
(18, 6, 1, 4, 'wahou'),
(19, 6, 7, 0, ''),
(20, 6, 9, 0, ''),
(21, 6, 1, 4, 'wahou'),
(22, 6, 5, 5, 'DONE'),
(23, 1, 10, 0, ''),
(24, 6, 7, 0, ''),
(25, 2, 4, 0, ''),
(26, 2, 4, 0, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `link` FOREIGN KEY (`userid`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`memberid`) REFERENCES `members` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
