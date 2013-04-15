-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2013 at 11:27 AM
-- Server version: 5.1.63
-- PHP Version: 5.3.5-1ubuntu7.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sf_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Main Products'),
(3, 'Main Products');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `telefon` int(10) NOT NULL,
  `adresa` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `userid`, `nume`, `prenume`, `telefon`, `adresa`) VALUES
(4, 9, 'sabin', 'pochiscan', 740566384, 'soseaua pacurari nr 29'),
(7, 8, 'sabin', 'pochiscan', 740566384, 'strada pacurari nr 29'),
(8, 8, 'cristi', 'baltatescu', 123456789, 'strada iasi'),
(9, 8, 'popescu', 'ion', 754363215, 'strada maresal vasile nr 29');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(8, 'sabin', 'sabin', 'sabin.pochiscan@xivic.com', 'sabin.pochiscan@xivic.com', 1, '98wekxthssg08gkgwk44cosswwcc040', 'VVOed5CImD6TnWxEjNZUifOkbFvNKKBoKTT2RhZkTAbjdcAgDFh4MXn/+NLI4zmI8Imv8V7LRrwcBvf6SDHm5A==', '2013-03-26 18:10:20', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(9, 'sabin2', 'sabin2', 'test@test.com', 'test@test.com', 1, '81agqjx0ff0oc8ko8csswww4ks0cwgs', 'TNVksFAOJq8TFSsQiaavfLEq21hZzyZjbUcKTO5UVwMGkkg78p3WqKUxAcgr5FH/j0Dxk2ecxVbVdb+tU5+HDw==', '2013-03-13 07:17:50', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(10, 'sabin3', 'sabin3', 'email@email.com', 'email@email.com', 1, 'l8t7ds5x2ts8go0os8kg0ckwgw8gcg8', 't8T3hgpIwijsLYUU3N6Q1DYXRjb+OPoAT9MttCL069eMPD+JXkOaKSCetvGCgnYfPw1d3bFPA2sLK13gaFJk/A==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1CF73D3112469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `category_id`) VALUES
(1, 'A Foo Bar', '19.99', 'Lorem ipsum dolor', NULL),
(2, 'A Foo Bar', '19.99', 'Lorem ipsum dolor', NULL),
(3, 'A Foo Bar', '19.99', 'Lorem ipsum dolor', NULL),
(4, 'A Foo Bar', '19.99', 'Lorem ipsum dolor', NULL),
(5, 'sabin', '5.00', 'description', NULL),
(6, 'sabin', '5.55', 'lorem ipsum', NULL),
(7, 'Foo', '19.99', 'lorem ipsum', 2),
(8, 'Foo', '19.99', 'lorem ipsum', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_1CF73D3112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
