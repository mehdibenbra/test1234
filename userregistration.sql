-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 10:34 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `location`, `startdate`, `enddate`, `categorisation`, `tickets`, `userid`) VALUES
(27, 'US open', 'The United States Open Tennis Championships is a hardcourt tennis tournament. ', 'NYC', '2016-12-14', '2016-11-25', 'Tennis', 2000, 4),
(28, 'Football World Cup', 'FIFA world cup', 'Saint Petersburgh', '2016-06-10', '2016-05-11', 'Football', 9997, 4),
(29, 'Liga : Barcelona - Real Madrid', 'El classico !', 'Madrid', '2016-12-14', '2016-11-10', 'Football', 6349, 1),
(30, 'Football tournament', 'Bring your team of 11 players and 2 subs', 'Green Park - London', '2016-10-13', '2016-07-08', 'Tournament', 66, 2),
(31, 'Champions league', 'European football tournament', 'Berlin', '2017-03-03', '2017-01-26', 'Football', 2901, 6),
(32, 'nba final', 'come and see the game', 'Central Park NYU', '2017-02-09', '2017-02-16', 'Tennis', 542, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `email`, `adress`, `age`, `phone`, `username`, `password`) VALUES
(1, 'Mehdi', 'Benbrahim', 'm.benbrahimelandaloussi@gmail.com', '109-113 Whitfield Street, 20 Montagu House', '20', '4477777777', 'mehdi', 'mehdi'),
(2, 'Francois', 'De Roquefeuil', 'zcesfde@ucl.ac.uk', 'Euston Road', '21', '07478444444', 'Francois', 'Francois'),
(3, 'berengere', 'de roquefeuil', 'berengere1000@hotmail.fr', 'woburn', '18', '2345678900', 'berengere', 'chocolat'),
(4, 'Ali', 'jawahiri', 'ali.jawahiri@ucl.ac.uk', '28 Aforgot Street', '20', '09764323456', 'ali', 'ali'),
(5, 'Robinson', 'Nouveau', 'robix@robix.com', '109-113 Whitfield Street, 20 Montagu House', '21', '098765432', 'robix', 'robix'),
(6, 'Hicham', 'Ameur', 'ameur_hicham@hotmail.com', '28 Phoenix Court ', '20', '1234567892', 'hicham', 'hicham'),
(7, 'Zeyna', 'Benbrahim', 'example@example.com', 'Casablanca', '17', '4567892', 'zeyna', 'zeyna');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `memberidattending`, `eventid`, `usergrade`, `usercomment`) VALUES
(1, 4, 30, '5/5', 'Such a great tournament !'),
(2, 1, 29, '4/5', 'Great Moment!'),
(3, 1, 28, '4/5', 'Awesome');

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
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`memberidattending`) REFERENCES `members` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
