-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2013 at 09:29 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hvcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `purchase_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_no` varchar(250) NOT NULL,
  `department` varchar(150) NOT NULL,
  `department_head` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `total` float NOT NULL,
  `check_requisition` int(11) NOT NULL,
  `check_needed_by` date NOT NULL,
  `payable_to` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `question` varchar(100) NOT NULL,
  `petty_cash_amount` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `accounting_rejected_by` varchar(50) NOT NULL,
  `pastor_rejected_by` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'accounting',
  PRIMARY KEY (`purchase_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`purchase_order_id`, `purchase_order_no`, `department`, `department_head`, `date_created`, `name`, `description`, `total`, `check_requisition`, `check_needed_by`, `payable_to`, `address`, `question`, `petty_cash_amount`, `created_by`, `accounting_rejected_by`, `pastor_rejected_by`, `status`) VALUES
(13, '', 'asdf', 'asdf', '2013-05-19', 'Jeremuel Raymundo', '', 33, 1, '2013-05-01', '123', '123', 'reimbursement', 0, 1, '', '', 'reject'),
(14, '', '123', '123', '2013-05-19', 'Jeremuel Raymundo', '', 123, 1, '2013-05-24', '23', '23', 'petty_cash', 2222, 1, '', '', 'approved'),
(15, '', '123', '123', '2013-05-19', 'Jeremuel Raymundo', '', 123, 0, '0000-00-00', '123', '123', 'credit_card', 0, 1, '', '', 'reject'),
(16, '', 'qq', 'qq', '2013-05-19', 'Jeremuel Raymundo', 'asdfasdf', 1234, 0, '0000-00-00', '234', '234', 'credit_card', 0, 1, '', '', 'reject'),
(17, '', 'te5st', 'test', '2013-05-19', 'Jeremuel Raymundo', 'test', 123, 0, '0000-00-00', 'bnone', 'address', 'reimbursement', 0, 1, '', '', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `reject_reasons_list`
--

CREATE TABLE IF NOT EXISTS `reject_reasons_list` (
  `reject_reasons_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `date_rejected` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reject_reasons_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reject_reasons_list`
--

INSERT INTO `reject_reasons_list` (`reject_reasons_list_id`, `purchase_order_id`, `reason`, `rejected_by`, `date_rejected`) VALUES
(1, 13, 'asdf', 1, '2013-05-18 21:50:49'),
(2, 15, 'bakla ka auyoko sayo11\r\n\r\n', 1, '2013-05-18 22:20:02'),
(3, 16, 'ayokok sayo kalbo11\r\n\r\nla u utak1', 1, '2013-05-18 22:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE IF NOT EXISTS `useraccount` (
  `useraccount_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`useraccount_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`useraccount_id`, `firstname`, `lastname`, `username`, `password`, `usertype_id`, `status`) VALUES
(1, 'Jeremuel', 'Raymundo', 'einlanzer7@gmail.com', 'ecbf9038c6130c1a67bc1d0ff0b2000a', 4, 'active'),
(2, 'Gabriel', 'Raymundo', 'admin', 'admin', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `usertype_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`usertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `description`) VALUES
(1, 'superuser'),
(2, 'pastor'),
(3, 'accountant'),
(4, 'enduser');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
