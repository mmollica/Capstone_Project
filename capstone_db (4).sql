-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2014 at 02:48 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
  `total` double(6,2) DEFAULT '0.00',
  `assigneddate` date DEFAULT '0000-00-00',
  `duedate` date DEFAULT '0000-00-00',
  `assignmentname` varchar(50) NOT NULL,
  `assignmentdescrip` text,
  `classid` int(11) NOT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `file_type` varchar(250) DEFAULT NULL,
  `file_data` blob,
  `file_size` int(11) DEFAULT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`assignmentid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentid`, `total`, `assigneddate`, `duedate`, `assignmentname`, `assignmentdescrip`, `classid`, `file_name`, `file_type`, `file_data`, `file_size`, `type`) VALUES
(10, 50.00, '2014-04-09', '2014-04-16', 'Homework 2', NULL, 3, '', '', '', 0, 1),
(11, 250.00, '2014-01-06', '2014-04-28', 'Term Project', NULL, 3, '', '', '', 0, 1),
(12, 30.00, '2014-04-08', '2014-04-15', 'Practice ', NULL, 2, '', '', '', 0, 1),
(13, 100.00, '2014-04-18', '2014-04-18', 'Slope Intercept', NULL, 2, '', '', '', 0, 1),
(14, 30.00, '2014-04-16', '2014-04-16', 'Life Quiz', NULL, 4, '', '', '', 0, 1),
(15, 60.00, '2014-04-11', '2014-04-11', 'Motion Lab', NULL, 5, '', '', '', 0, 1),
(16, 0.00, '0000-00-00', '0000-00-00', 'Syllabus 2014', NULL, 2, NULL, NULL, NULL, NULL, 2),
(17, 0.00, '0000-00-00', '0000-00-00', 'Syllabus 2014', NULL, 3, NULL, NULL, NULL, NULL, 2),
(18, 0.00, '0000-00-00', '0000-00-00', 'Syllabus 2014', NULL, 4, NULL, NULL, NULL, NULL, 2),
(19, 0.00, '0000-00-00', '0000-00-00', 'Syllabus 2014', NULL, 5, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(50) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `due_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`),
  KEY `userid` (`teacherid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classname`, `teacherid`, `subject`, `due_added`) VALUES
(2, 'Pre-Algebra', 11, 'math', '0000-00-00 00:00:00'),
(3, 'History 101', 11, 'history', '0000-00-00 00:00:00'),
(4, 'Biology', 10, 'Science', '0000-00-00 00:00:00'),
(5, 'Physics', 10, 'Science', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `classassign`
--

CREATE TABLE IF NOT EXISTS `classassign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `studentid` (`studentid`),
  KEY `teacherid` (`teacherid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `classassign`
--

INSERT INTO `classassign` (`id`, `classid`, `studentid`, `teacherid`) VALUES
(2, 2, 12, 11),
(3, 3, 12, 11),
(4, 4, 30000000, 10),
(5, 5, 30000000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `clubassign`
--

CREATE TABLE IF NOT EXISTS `clubassign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clubid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `studentid` (`studentid`),
  KEY `teacherid` (`teacherid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `contentid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `classid` int(11) NOT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `file_type` varchar(250) DEFAULT NULL,
  `file_data` blob,
  `file_size` int(11) DEFAULT NULL,
  PRIMARY KEY (`contentid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentid`, `title`, `classid`, `file_name`, `file_type`, `file_data`, `file_size`) VALUES
(1, 'Syllabi 2014', 2, NULL, NULL, NULL, NULL),
(2, 'Syllabi 2013', 3, NULL, NULL, NULL, NULL),
(3, 'Chapter 2 Notes', 4, NULL, NULL, NULL, NULL),
(4, 'Accounting Ch.3', 5, NULL, NULL, NULL, NULL),
(5, 'Chapter 1 Notes', 3, NULL, NULL, NULL, NULL);

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
-- Table structure for table `parent_student_match`
--

CREATE TABLE IF NOT EXISTS `parent_student_match` (
  `matchid` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  PRIMARY KEY (`matchid`),
  UNIQUE KEY `parentid` (`parentid`,`studentid`),
  KEY `parentid_2` (`parentid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `parent_student_match`
--

INSERT INTO `parent_student_match` (`matchid`, `parentid`, `studentid`) VALUES
(1, 40000000, 30000000);

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
-- Table structure for table `studentupload`
--

CREATE TABLE IF NOT EXISTS `studentupload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` datetime NOT NULL,
  `comment` text,
  `file_name` varchar(250) NOT NULL,
  `file_type` varchar(250) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_data` blob NOT NULL,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `assignmentid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `studentupload`
--

INSERT INTO `studentupload` (`id`, `date_added`, `comment`, `file_name`, `file_type`, `file_size`, `file_data`, `classid`, `studentid`, `assignmentid`) VALUES
(1, '2014-04-13 11:18:01', '', 'Best deck evar.txt', 'text/plain', 296, 0x322073746f726d62726561746820647261676f6e0d0a3420706f6c697320637275736865720d0a3420656d626572207377616c6c6f7765720d0a3420656c76697368206d79737469630d0a342078656e61676f732c2074686520726576656c65720d0a332067617272756b2c2063616c6c6572206f66206265617374730d0a3220637261746572686f6f6620626568656d6f74680d0a34206d616e617765667420736c697665720d0a3220727572696320746861722c2074686520756e626f7765640d0a342073796c76616e20636172797469640d0a3220766f796567696e672073617479720d0a0d0a342073746f6d70696e672067726f756e64730d0a342074656d706c65206f66206162616e646f6e0d0a313020666f726573740d0a36206d6f756e7461696e, 3, 30000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacherevents`
--

CREATE TABLE IF NOT EXISTS `teacherevents` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `due_date` date NOT NULL,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherevents`
--

INSERT INTO `teacherevents` (`id`, `title`, `due_date`, `teacherid`, `classid`) VALUES
(1, 'Homework 2-Colonization of America', '2014-04-16', 11, 3),
(2, 'Quiz 6- Chapter 10,11', '2014-04-21', 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacherlink`
--

CREATE TABLE IF NOT EXISTS `teacherlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `url` varchar(2083) NOT NULL,
  `teacherid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teacherlink`
--

INSERT INTO `teacherlink` (`id`, `name`, `url`, `teacherid`) VALUES
(1, 'American History', 'http://www.besthistorysites.net/index.php/american-history', 11),
(2, 'Medieval History', 'http://www.besthistorysites.net/index.php/medieval-history', 11);

-- --------------------------------------------------------

--
-- Table structure for table `teachermessage`
--

CREATE TABLE IF NOT EXISTS `teachermessage` (
  `tmsgid` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text,
  `title` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  PRIMARY KEY (`tmsgid`),
  KEY `teacherid` (`teacherid`),
  KEY `classid` (`classid`),
  FULLTEXT KEY `msg` (`msg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `teachermessage`
--

INSERT INTO `teachermessage` (`tmsgid`, `msg`, `title`, `date`, `teacherid`, `classid`) VALUES
(1, 'Test will be next Wednesday', 'Chapter 2', '2014-04-09', 11, 3),
(2, 'Please check the syallabi on the content page', 'New Conten', '2014-04-09', 11, 3),
(3, 'Please check out the new assignment on the assignements page', 'Assignment two', '2014-04-09', 11, 3);

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
(0, 'Student3', 'Student', 'three', '''l������]�/��͒��8)���#��_R�', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 2, 'akhsbkdl', 'kj', 'jh', 30068, '2014-04-07 17:15:36'),
(9, 'mike', 'Mike', 'Mollica', '�{��C|�y��)�L)�!�;�}�T[�u�ĕ�', '59945da25d2521045b4bc84db7d5fd44b2c5511fe7cc247a8ce5a79bcd74a1c2', 1, '2401 Weatherford ct', 'marietta', 'ga', 30068, '0000-00-00 00:00:00'),
(10, 'Teacher', 'Johanna', 'Perez', 'C����?���٭���Np�D��B4�T(��', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 2, 'ihasbd', 'asdasd', 'as', 30068, '0000-00-00 00:00:00'),
(11, 'Teacher2', 'Herman', 'Ford', 'LS���p��F�����x3x�Yp��d]���\\޼�', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 2, 'asdasd', 'afdsgsgdf', 'er', 30068, '0000-00-00 00:00:00'),
(12, 'Student1', 'John', 'Harper', 'J^E~v7d���X��g��<�#*�&2�^�@*', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 3, 'asdasd', 'sdas', 'ds', 30068, '0000-00-00 00:00:00'),
(30000000, 'StudentFour', 'Lisa', 'Adams', '�_��v�V1Zʝ։5��L���az�<�K�', '59945da25d2521045b4bc84db7d5fd44b2c5511fe7cc247a8ce5a79bcd74a1c2', 3, 'lhj', 'jhk', 'jh', 36985, '2014-04-07 17:42:38'),
(40000000, 'NewParent', 'Jerry', 'Adams', '`�-J\0�[ؚo�״�-�Ʌ�DO�3�D�F0', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 4, 'asfasf', 'sadasd', 'fd', 30068, '2014-04-07 17:35:32'),
(40000001, 'Parenttwo', 'Barbara', 'Adams', '�ڙO''[����Hl\\�3�ӌ�UY�;=Ef	�', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 4, 'asfasf', 'sadasd', 'fd', 30068, '2014-04-07 17:37:52');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `class` (`id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `users` (`id`);

--
-- Constraints for table `classassign`
--
ALTER TABLE `classassign`
  ADD CONSTRAINT `classassign_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `classassign_ibfk_2` FOREIGN KEY (`teacherid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `classassign_ibfk_3` FOREIGN KEY (`studentid`) REFERENCES `users` (`id`);

--
-- Constraints for table `clubassign`
--
ALTER TABLE `clubassign`
  ADD CONSTRAINT `clubassign_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `clubassign_ibfk_2` FOREIGN KEY (`teacherid`) REFERENCES `users` (`id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `class` (`id`);

--
-- Constraints for table `parent_student_match`
--
ALTER TABLE `parent_student_match`
  ADD CONSTRAINT `parent_student_match_ibfk_1` FOREIGN KEY (`parentid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `parent_student_match_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `users` (`id`);

--
-- Constraints for table `teacherevents`
--
ALTER TABLE `teacherevents`
  ADD CONSTRAINT `teacherevents_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `teacherevents_ibfk_2` FOREIGN KEY (`classid`) REFERENCES `class` (`id`);

--
-- Constraints for table `teacherlink`
--
ALTER TABLE `teacherlink`
  ADD CONSTRAINT `teacherlink_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachermessage`
--
ALTER TABLE `teachermessage`
  ADD CONSTRAINT `teachermessage_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `teachermessage_ibfk_2` FOREIGN KEY (`classid`) REFERENCES `class` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
