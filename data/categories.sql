-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2014 at 12:18 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `theme123`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `parent_id`) VALUES
(1, 'Wordpress Plugin', 'http://theme123.net/plugin-wordpress', 0),
(2, 'Wordpress Themes', 'http://theme123.net/themes-wordpress', 0),
(3, 'Blogger Template', 'http://theme123.net/themes-blogger', 0),
(4, 'Opencart Themes', 'http://theme123.net/themes-opencart', 0),
(5, 'Joomla Template', 'http://theme123.net/themes-joomla', 0),
(6, 'Magento Themes', 'http://theme123.net/themes-magento', 0),
(7, 'Drupal Themes', 'http://theme123.net/themes-drupal', 0),
(8, 'WordPress SEO Tips', 'http://theme123.net/wordpress-seo-tips', 0),
(9, 'PrestaShop', 'http://theme123.net/prestashop', 0),
(10, 'OpenCart Plugins', 'http://theme123.net/opencart-plugins', 0),
(11, 'E-commerce SEO Tips', 'http://theme123.net/e-commerce-seo-tips', 0),
(12, 'Joomla SEO Tips', 'http://theme123.net/joomla-seo-tips', 0),
(13, 'Joomla Extension', 'http://theme123.net/plugin-joomla', 0),
(14, 'Hosting', 'http://theme123.net/hosting', 0),
(15, 'Blogger SEO Tips', 'http://theme123.net/blogger-seo-tips', 0),
(16, 'Tips and Tricks', 'http://theme123.net/tips-and-tricks', 0),
(17, 'SEO Tools', 'http://theme123.net/seo-tools', 0),
(18, 'Tutorials', 'http://theme123.net/tutorials', 0),
(19, 'Blog &amp; Magazine WordPress Themes', 'http://theme123.net/themes-wordpress/blog-magazine-wordpress-themes', 2),
(20, 'Creative WordPress Theme', 'http://theme123.net/themes-wordpress/creative-wordpress-theme', 2),
(21, 'Corporate WordPress Theme', 'http://theme123.net/themes-wordpress/corporate-wordpress-theme', 2),
(22, 'Entertainment WordPress Theme', 'http://theme123.net/themes-wordpress/entertainment-wordpress-theme', 2),
(23, 'eCommerce WordPress Theme', 'http://theme123.net/themes-wordpress/ecommerce-wordpress-theme-themes-wordpress', 2),
(24, 'BuddyPress WordPress Theme', 'http://theme123.net/themes-wordpress/buddypress-wordpress-theme', 2),
(25, 'Wedding WordPress Theme', 'http://theme123.net/themes-wordpress/wedding-wordpress-theme-themes-wordpress', 2),
(26, 'Retail WordPress Theme', 'http://theme123.net/themes-wordpress/retail-wordpress-theme', 2),
(27, 'Technology WordPress Theme', 'http://theme123.net/themes-wordpress/technology-wordpress-theme', 2),
(28, 'Miscellaneous WordPress Theme', 'http://theme123.net/themes-wordpress/miscellaneous-wordpress-theme', 2),
(29, 'Nonprofit WordPress Theme', 'http://theme123.net/themes-wordpress/nonprofit-wordpress-theme', 2),
(30, 'Galleries WordPress Plugin', 'http://theme123.net/plugin-wordpress/galleries-wordpress-plugin', 1),
(31, 'Media WordPress Plugin', 'http://theme123.net/plugin-wordpress/media-wordpress-plugin', 1),
(32, 'Widgets WordPress Plugin', 'http://theme123.net/plugin-wordpress/widgets-wordpress-plugin', 1),
(33, 'WooCommerce WordPress Plugin', 'http://theme123.net/plugin-wordpress/woocommerce-wordpress-plugin', 1),
(34, 'Membership WordPress Plugin', 'http://theme123.net/plugin-wordpress/membership-wordpress-plugin', 1),
(35, 'Forums WordPress Plugin', 'http://theme123.net/plugin-wordpress/forums-wordpress-plugin', 1),
(36, 'Social Networking WordPress Plugin', 'http://theme123.net/plugin-wordpress/social-networking-wordpress-plugin', 1),
(37, 'SEO WordPress Plugin', 'http://theme123.net/plugin-wordpress/seo-wordpress-plugin', 1),
(38, 'Uncategorized', 'http://theme123.net/uncategorized', 0),
(39, 'Miscellaneous WordPress Plugin', 'http://theme123.net/plugin-wordpress/miscellaneous-wordpress-plugin', 1),
(40, 'Interface Elements WordPress Plugin', 'http://theme123.net/plugin-wordpress/interface-elements-wordpress-plugin', 1),
(41, 'Science', 'http://theme123.net/science', 0),
(42, 'Utilities WordPress Plugin', 'http://theme123.net/plugin-wordpress/utilities-wordpress-plugin', 1),
(43, 'Calendars WordPress Plugin', 'http://theme123.net/plugin-wordpress/calendars-wordpress-plugin', 1),
(44, 'Forms WordPress Plugin', 'http://theme123.net/plugin-wordpress/forms-wordpress-plugin', 1),
(45, 'Newsletters WordPress Plugin', 'http://theme123.net/plugin-wordpress/newsletters-wordpress-plugin', 1),
(46, 'Mobile WordPress Theme', 'http://theme123.net/themes-wordpress/mobile-wordpress-theme', 2),
(47, 'eCommerce WordPress Plugin', 'http://theme123.net/plugin-wordpress/ecommerce-wordpress-plugin-plugin-wordpress', 1),
(48, 'Add-ons WordPress Plugin', 'http://theme123.net/plugin-wordpress/add-ons-wordpress-plugin', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
