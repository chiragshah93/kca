-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2014 at 06:47 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(50) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `adminid`, `pass`) VALUES
('admin', 'ad101', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `doj` date NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`aid`, `adminid`, `name`, `address`, `phone`, `username`, `password`, `eid`, `doj`, `dob`) VALUES
(7, 'ad101', 'chirag', '103,divya jyoti app,near sardar birdge,adajan,surat', '45466', 'chrg', 'shah', '102', '0000-00-00', '0000-00-00'),
(8, 'ad101', 'heli', 'pal', '12345', 'heli', 'helishah', '101', '0000-00-00', '0000-00-00'),
(9, '', 'Chiragg', 'Dfdf', '1234567890', 'dfd', 'dfdf', '', '0000-00-00', '0000-00-00'),
(10, 'ad101', 'vidhi', 'dfgg', '123454', 'grfdg', '232', '105', '0000-00-00', '0000-00-00'),
(17, 'ad101', 'Anuj', 'Pal', '0987654321', 'anuj', 'shah', '201', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `agentinqury`
--

CREATE TABLE IF NOT EXISTS `agentinqury` (
  `aid` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `doj` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agentinqury`
--

INSERT INTO `agentinqury` (`aid`, `name`, `address`, `phone`, `username`, `password`, `eid`, `doj`, `dob`, `adminid`) VALUES
('9', 'nimesh', 'udhna', '6767776', 'nimu', '12345', '103', '12/5/2013', '25/12/1992', 'ad101');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `eid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`eid`, `cid`, `name`, `address`, `phone`, `dob`, `aname`, `adminid`) VALUES
(102, 101, 'anuj', 'majura gate', '98989', '24/12/1993', 'chrg', 'ad101'),
(101, 102, 'vidhi', 'adajan', '9898989898', '25/11/1993', 'heli', 'ad101');

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

CREATE TABLE IF NOT EXISTS `consultant` (
  `name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `code` varchar(30) NOT NULL,
  `validfrom` varchar(30) NOT NULL,
  `validto` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultant`
--

INSERT INTO `consultant` (`name`, `description`, `code`, `validfrom`, `validto`, `address`, `username`, `phone`) VALUES
('zarna', 'good', 'c1001', '12/1/2014', '18/1/2014', 'majura gate', 'zarna', '0977');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`uid`, `username`, `comment`, `status`) VALUES
(2, 'vidhi', 'excellent', 0),
(7, 'chirag', 'this product id not attractive', 0),
(9, 'anuj', 'range is very high', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('anuj', '2345'),
('chirag', '1234'),
('vidhi', '4567'),
('zarna', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `aname` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `odetail` varchar(300) NOT NULL,
  `amount` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`aname`, `cid`, `odetail`, `amount`) VALUES
('chrg', 101, 'frgthh', '5000'),
('chrg', 101, 'frgthh', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` varchar(50) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `stock` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `rate`, `stock`) VALUES
('101', 'aquasafe', '150', '500');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `cid` varchar(50) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `caddress` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `ddate` varchar(50) NOT NULL,
  `cgift` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`cid`, `adminid`, `cname`, `caddress`, `phone`, `ddate`, `cgift`, `dob`) VALUES
('101', 'ad101', 'anuj', 'majura gate', '9924764999', '20/2/2014', 'small box', '22/5/1993');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `pid` varchar(50) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `caddress` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `ddate` varchar(50) NOT NULL,
  `adminid` varchar(20) NOT NULL,
  `total` varchar(30) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`pid`, `cid`, `eid`, `cname`, `caddress`, `phone`, `ddate`, `adminid`, `total`) VALUES
('101', '101', '101', 'anuj', 'majura gate', '9924764999', '20/2/2014', 'ad101', '200');
