-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2015 at 04:25 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social-network`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id`      INT(11)       NOT NULL AUTO_INCREMENT,
  `chat_with`    INT(11)       NOT NULL,
  `chat_message` VARCHAR(5000) NOT NULL,
  `chat_date`    VARCHAR(11)   NOT NULL,
  `chat_time`    TIME          NOT NULL,
  PRIMARY KEY (`chat_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `firend_id`          INT(11)     NOT NULL AUTO_INCREMENT,
  `profile_id`         INT(11)     NOT NULL,
  `friend_with`        INT(11)     NOT NULL,
  `date_of_friendship` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`firend_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id`       INT(11)      NOT NULL AUTO_INCREMENT,
  `profile_id`     INT(11)      NOT NULL,
  `image_location` VARCHAR(100) NOT NULL,
  `date`           VARCHAR(11)  NOT NULL,
  PRIMARY KEY (`image_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id`    INT(11)      NOT NULL AUTO_INCREMENT,
  `first_name`    VARCHAR(50)  NOT NULL,
  `middle_name`   VARCHAR(50)  NOT NULL,
  `last_name`     VARCHAR(50)  NOT NULL,
  `birth_date`    VARCHAR(2)   NOT NULL,
  `birth_month`   VARCHAR(2)   NOT NULL,
  `birth_year`    VARCHAR(5)   NOT NULL,
  `address`       VARCHAR(100) NOT NULL,
  `profile_image` VARCHAR(100) NOT NULL,
  `contact_no`    VARCHAR(20)  NOT NULL,
  `email_id`      VARCHAR(50)  NOT NULL,
  `gender`        VARCHAR(1)   NOT NULL,
  `password`      VARCHAR(20)  NOT NULL,
  `logged_in`     INT(1)       NOT NULL,
  PRIMARY KEY (`profile_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 10;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `birth_month`, `birth_year`, `address`, `profile_image`, `contact_no`, `email_id`, `gender`, `password`, `logged_in`)
VALUES
  (1, 'Mahbubur', '', 'Rashid', '08', '06', '1992', '', '', '', 'mrtonmoy12@gmail.com', '', '123456', 0),
  (2, 'Mahbubur', '', 'Rashid', '03', '03', '3424', '', '', '', 'fbleon112358@gmail.com', '', '1234', 0),
  (3, 'sdfsdfsd', 'sdfsdf', 'sdfsdf', '04', '03', '53345', '', '', '', 'sg@sf.com', '', '1234', 0),
  (4, 'sdfsd', 'sdf', 'sdf', '23', '04', '4435', '', '', '', 'sdf@sf.com', '', '1', 0),
  (5, 'dfsdf', 'sdfsgsg', 'sgsdgsdg', '05', '05', '3455', '', '', '', 'leon@ga.com', '', '12', 0),
  (6, 'dfsdf', 'sdfsgsg', 'sgsdgsdg', '05', '05', '3455', '', '', '', 'leon@ga.com', '', '1', 0),
  (7, 'dfsdf', 'sdfsgsg', 'sgsdgsdg', '05', '05', '3455', '', '', '', 'leon@ga.com', '', '1', 0),
  (8, 'dfsdf', 'sdfsgsg', 'sgsdgsdg', '05', '05', '3455', '', '', '', 'leon@ga.com', '', '1', 0),
  (9, 'dfsdf', 'sdfsgsg', 'sgsdgsdg', '04', '05', '3455', '', '', '', 'leon@ga.com', '', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `update_id`      INT(11)       NOT NULL AUTO_INCREMENT,
  `prifile_id`     INT(11)       NOT NULL,
  `update_message` VARCHAR(5000) NOT NULL,
  PRIMARY KEY (`update_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
