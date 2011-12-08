-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2011 at 04:45 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `llamafoundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` blob NOT NULL,
  `interests` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` VALUES(1, 'Nancy', 'Schnazenhaus', 'nancy@gmail.com', '530-333-4567', '1970-08-23', '2010-09-01 09:34:27', 0, 'photo1.jpg', '', 'cheese, llamas');
INSERT INTO `members` VALUES(15, 'David', 'Black', 'david@gmail.com', '393-887-1120', '1968-01-21', '2011-12-07 07:06:32', 0, '', 0x7a9ab49a3fe4, 'I love llamas!');
INSERT INTO `members` VALUES(14, 'Sarah', 'Green', 'sarah@email.com', '484-883-9987', '1985-05-19', '2011-12-07 07:04:00', 0, '', 0x7a9ab49a3fe4, 'stuff about llamas');
INSERT INTO `members` VALUES(13, 'Mary', 'Johnson', 'mary@yahoo.com', '747-373-2222', '1980-03-21', '2011-12-07 07:02:51', 0, '', 0x7a9ab49a3fe4, 'llamas!');
INSERT INTO `members` VALUES(11, 'Bill', 'Mead', 'Bill@meaddesign.net', '543-098-9876', '1965-10-19', '2011-12-07 06:58:55', 0, '', 0x7a9ab49a3fe4, 'Making cool websites');
INSERT INTO `members` VALUES(12, 'Bob', 'Smith', 'bob@somewhere.com', '432-098-7766', '1970-02-12', '2011-12-07 07:01:46', 0, '', 0x7a9ab49a3fe4, 'stuff');
INSERT INTO `members` VALUES(16, 'George', 'Jones', 'george@hotmail.com', '490-028-7752', '1990-09-07', '2011-12-07 07:08:04', 0, '', 0x7a9ab49a3fe4, 'Alpacas');
INSERT INTO `members` VALUES(17, 'Mary', 'Greene', 'mary@hotmail.com', '865-443-3455', '1958-09-20', '2011-12-07 07:09:39', 0, '', 0x7a9ab49a3fe4, 'llamas!');
INSERT INTO `members` VALUES(18, 'Joey', 'Black', 'joey@yahoo.com', '484-949-9499', '1994-07-16', '2011-12-07 07:10:34', 0, '', 0x7a9ab49a3fe4, 'llamas!');
INSERT INTO `members` VALUES(19, 'Barack', 'Obama', 'barack@whitehouse.gov', '584-555-9876', '1961-07-13', '2011-12-07 07:12:31', 0, '', 0x7a9ab49a3fe4, 'I pledge resources to llamas!');
INSERT INTO `members` VALUES(20, 'Alex', 'Baldwin', 'abaldwin@gmail.com', '483-029-9934', '1960-08-12', '2011-12-07 07:16:08', 0, '', 0x7a9ab49a3fe4, 'Go Llamas!');
INSERT INTO `members` VALUES(21, 'Nancy', 'Pelosi', 'nancy@congress.com', '489-098-8767', '1920-03-19', '2011-12-07 07:17:32', 0, '', 0x7a9ab49a3fe4, 'legalize llamas!');
