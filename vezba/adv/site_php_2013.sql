-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2014 at 08:04 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `site_php_2013`
--
CREATE DATABASE IF NOT EXISTS `site_php_2013` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `site_php_2013`;

-- --------------------------------------------------------

--
-- Table structure for table `sr_articles`
--

CREATE TABLE IF NOT EXISTS `sr_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sr_articles`
--

INSERT INTO `sr_articles` (`id`, `title`, `content`) VALUES
(1, 'HOME', '\r\n                <p>A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. Ut sodales viverra lacus ac rutrum. Pellentesque faucibus justo vitae nisi blandit at elementum lacus tristique. Nam hendrerit nulla vel dui accumsan ac eleifend magna aliquam.</p>\r\n                <p>Ut sodales viverra lacus ac rutrum. Pellentesque faucibus justo vitae nisi blandit at elementum lacus tristique. Nam hendrerit nulla vel dui accumsan ac eleifend magna aliquam. A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. Ut sodales viverra lacus ac rutrum. Pellentesque faucibus justo vitae nisi blandit at elementum lacus tristique. Nam hendrerit nulla vel dui accumsan ac eleifend magna aliquam.</p>\r\n'),
(2, 'PRODUCTS', '            \r\n            	<h1>Products</h1>\r\n                <p>A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. Ut sodales viverra lacus ac rutrum. Pellentesque faucibus justo vitae nisi blandit at elementum lacus tristique. Nam hendrerit nulla vel dui accumsan ac eleifend magna aliquam.</p>\r\n                <p>Ut sodales viverra lacus ac rutrum. Pellentesque faucibus justo vitae nisi blandit at elementum lacus tristique. Nam hendrerit nulla vel dui accumsan ac eleifend magna aliquam. A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. Ut sodales viverra lacus ac rutrum. Pellentesque faucibus justo vitae nisi blandit at elementum lacus tristique. Nam hendrerit nulla vel dui accumsan ac eleifend magna aliquam.</p>\r\n               '),
(3, 'CONTACT US', '           	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDExpgh5k-2YMIZIKBiFr0JxGn3UNxyDpY&sensor=true"></script>\r\n			<h1>Contact</h1>\r\n                <p>A adipiscing lacus porta vitae. Morbi ultrices ante pharetra sapien accumsan sagittis. Nulla ac urna dui. Pellentesque ut enim odio, vitae fringilla massa. Pellentesque molestie nisi facilisis velit porta sodales. Integer nec arcu suscipit sem porttitor rhoncus sed et dui. Phasellus magna odio, volutpat quis rhoncus quis, scelerisque vitae libero. Ut sodales viverra lacus ac rutrum. Pellentesque faucibus justo vitae nisi blandit at elementum lacus tristique. Nam hendrerit nulla vel dui accumsan ac eleifend magna aliquam.</p>\r\n                <div id="myMap" style="width:500px;height:500px;border:1px solid #d1d1d1;"></div>\r\n				<script> \r\n					var mapOptions = {\r\n						center: new google.maps.LatLng(44.848733,20.404867),\r\n						zoom: 25,\r\n						mapTypeId: google.maps.MapTypeId.SATELLITE\r\n					};\r\n					var maptag = document.getElementById("myMap");\r\n					var map = new google.maps.Map(maptag,mapOptions);\r\n				</script>\r\n                ');

-- --------------------------------------------------------

--
-- Table structure for table `sr_menuitems`
--

CREATE TABLE IF NOT EXISTS `sr_menuitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `link` varchar(1024) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sr_menuitems`
--

INSERT INTO `sr_menuitems` (`id`, `title`, `link`, `menu_id`) VALUES
(1, 'HOME', 'index.php?pid=1&aid=1', 1),
(2, 'PRODUCTS', 'index.php?pid=2&aid=2', 1),
(3, 'CONTACT', 'index.php?pid=3&aid=3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sr_pages`
--

CREATE TABLE IF NOT EXISTS `sr_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `modules` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sr_pages`
--

INSERT INTO `sr_pages` (`id`, `name`, `modules`) VALUES
(1, 'HOME', 'mod_slider,mod_article'),
(2, 'PRODUCTS', 'mod_slider,mod_article,mod_sidebar'),
(3, 'CONTACT US', 'mod_article');

-- --------------------------------------------------------

--
-- Table structure for table `sr_users`
--

CREATE TABLE IF NOT EXISTS `sr_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sr_users`
--

INSERT INTO `sr_users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'peter', 'peter@sma.il', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
