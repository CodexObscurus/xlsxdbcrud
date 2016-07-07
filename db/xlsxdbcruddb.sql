-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2016 at 10:50 PM
-- Server version: 5.1.46
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xlsxdbcruddb`
--
CREATE DATABASE `xlsxdbcruddb` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `xlsxdbcruddb`;

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE IF NOT EXISTS `product_tbl` (
  `P_ID` int(8) NOT NULL AUTO_INCREMENT,
  `P_CAT` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `P_SUB` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `P_PARTNO` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `P_DESC` varchar(120) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=334 ;
