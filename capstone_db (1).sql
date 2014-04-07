-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2014 at 12:19 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9
CREATE DATABASE capstone_db;
USE capstone_db;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `capstone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assignmentid` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `total` double(6,2) NOT NULL DEFAULT '0.00',
  `assigneddate` date NOT NULL DEFAULT '0000-00-00',
  `duedate` date NOT NULL DEFAULT '0000-00-00',
  `assignment name` varchar(15) NOT NULL,
  `assignmentdescrip` text,
  PRIMARY KEY (`assignmentid`),
  UNIQUE KEY `classid` (`classid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `classid` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classid`, `classname`, `teacherid`, `subject`) VALUES
(2, 'ashbdas', 11, 'math'),
(3, 'History 101', 11, 'history');

-- --------------------------------------------------------

--
-- Table structure for table `classassign`
--

CREATE TABLE IF NOT EXISTS `classassign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `classassign`
--

INSERT INTO `classassign` (`id`, `classid`, `studentid`) VALUES
(2, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `clubassign`
--

CREATE TABLE IF NOT EXISTS `clubassign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clubid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `gradeid` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `assignmentid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `points` double(6,2) NOT NULL,
  `comment` text,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `islate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gradeid`),
  UNIQUE KEY `classid` (`classid`,`assignmentid`,`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linkname` varchar(250) NOT NULL,
  `url` varchar(2083) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `linkname`, `url`) VALUES
(1, 'Facebook', 'https://www.facebook.com/'),
(2, 'Zimbra', 'https://zimbra.spsu.edu/zimbra/'),
(3, 'google', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parentid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fatherfname` varchar(15) NOT NULL,
  `fatherlname` varchar(15) NOT NULL,
  `motherfname` varchar(15) NOT NULL,
  `motherlname` varchar(15) NOT NULL,
  PRIMARY KEY (`parentid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parent_student_match`
--

CREATE TABLE IF NOT EXISTS `parent_student_match` (
  `matchid` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  PRIMARY KEY (`matchid`),
  UNIQUE KEY `parentid` (`parentid`,`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staffid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staffmessage`
--

CREATE TABLE IF NOT EXISTS `staffmessage` (
  `smsgid` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text,
  `title` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`smsgid`),
  FULLTEXT KEY `msg` (`msg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `staffmessage`
--

INSERT INTO `staffmessage` (`smsgid`, `msg`, `title`, `date`) VALUES
(1, 'Hello World', 'First Message', '2014-04-07'),
(2, 'AHHHHH', 'Second message', '2014-04-07'),
(3, 'WHAT IS GOING ON', 'Third Message', '2014-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT 'password',
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(5) NOT NULL,
  `gradelevel` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `fatherfname` varchar(15) NOT NULL,
  `fatherlname` varchar(15) NOT NULL,
  `motherfname` varchar(15) NOT NULL,
  `motherlname` varchar(15) NOT NULL,
  PRIMARY KEY (`studentid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherid` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(32) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `address` varchar(20) NOT NULL,
  `City` varchar(15) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`teacherid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacherlink`
--

CREATE TABLE IF NOT EXISTS `teacherlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `url` varchar(2083) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teachermessage`
--

CREATE TABLE IF NOT EXISTS `teachermessage` (
  `tmsgid` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text,
  `title` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`tmsgid`),
  FULLTEXT KEY `msg` (`msg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `salt` varbinary(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `groups` int(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(5) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `salt`, `password`, `groups`, `address`, `city`, `state`, `zip`, `date_added`) VALUES
(0, 'Student3', 'Student', 'three', '''l∂¸ãê◊Á]à/ÆÕÕí∑Œ8)áŒ˝#ÔŸ_R£?t', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 2, 'akhsbkdl', 'kj', 'jh', 30068, '2014-04-07 17:15:36'),
(9, 'mike', 'Mike', 'Mollica', 'ø{ã¡C|Ây˙ã)˘L)ó!ﬁ;º}ÅT[‡uÓƒï€', '59945da25d2521045b4bc84db7d5fd44b2c5511fe7cc247a8ce5a79bcd74a1c2', 1, '2401 Weatherford ct', 'marietta', 'ga', 30068, '0000-00-00 00:00:00'),
(10, 'Teacher', 'Blah', 'Blah', 'C¯∞ÌÀ?æóüŸ≠∞∂¢Np˘D≠ºB4‡´T(ˆ‹', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1, 'ihasbd', 'asdasd', 'as', 30068, '0000-00-00 00:00:00'),
(11, 'Teacher2', 'Dah', 'Teacher', 'LS∂ìòp∂÷F≠ı˜‰ˆx3xçYp»Îßd]òŸœ\\ﬁº∆', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1, 'asdasd', 'afdsgsgdf', 'er', 30068, '0000-00-00 00:00:00'),
(12, 'Student1', 'Student', 'one', 'J^E~v7dúÄÕXﬂ™gï∂<÷#*ì&2À^ô@*', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 2, 'asdasd', 'sdas', 'ds', 30068, '0000-00-00 00:00:00'),
(30000000, 'StudentFour', 'iuaa', 'ohn', '´_Ì‹vÓV1Z ù÷â5ÛáıL««“azß<ôK¡', '59945da25d2521045b4bc84db7d5fd44b2c5511fe7cc247a8ce5a79bcd74a1c2', 3, 'lhj', 'jhk', 'jh', 36985, '2014-04-07 17:42:38'),
(40000000, 'NewParent', 'hello', 'parent', '`À-J\0[ÿöoÈ◊¥ø-◊…ÖúDOÂ3πDÿF0', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 4, 'asfasf', 'sadasd', 'fd', 30068, '2014-04-07 17:35:32'),
(40000001, 'Parenttwo', 'hello', 'parent', 'ä⁄ôO''[⁄˝ù◊Hl\\√3ö”å¢UY⁄;=Ef	ÂØ', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 4, 'asfasf', 'sadasd', 'fd', 30068, '2014-04-07 17:37:52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
