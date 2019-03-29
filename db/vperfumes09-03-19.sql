-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2019 at 09:50 AM
-- Server version: 5.6.31
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vperfumes`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `detailed_description` longtext,
  `vision` mediumtext,
  `about_image` varchar(500) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `detailed_description`, `vision`, `about_image`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'UAE & Oman', '<p>Al Hajis Group of companies was established in Abu hail centre ,UAE in the year 1990.The Al Hajis group,now has grown into a conglomerate of more than 10 show rooms with various divisions, brands. We have been selling the widest range of women&rsquo;s and men&rsquo;s perfumes ,watches and ladies bags at economical rates. Not only do we have the expertise of selling perfumes and watches, we also have the experience to match. We are the team of excellent professionals who are trained and developed so that they are the most knowledgeable sales representatives within the perfume industry and we can even boast about having the largest number of fragrance graduates in the UAE.&nbsp;</p>\r\n', '<p>Al Hajis group is a professionally run company where quality products, after sales and customer service a priority in business operations. We look after our customers, develop high quality at the top in terms of what you expect from one of our companies. The Group continues to grow and diversify and strengthen relationships with major clients including most luxury brands and retail malls, shopping centers in opening more and more outlets in the country.</p>\r\n\r\n<p>We are there to create freshness in your life. We are adding extra to your personality to get notify among the people. As a perfume company, we can let you in the state of confidence in your life style. We are not for just, but to bring maximum quality in the world of perfume and watches. We collect materials from the different part of the world to bring you best.</p>\r\n', 'To be the best brand in the retail sector for perfumes, fashion and luxury accessories, which is recognized for its professionalism, top quality products and Distinguished services', 'png', 1, 2, '2017-09-19', '2019-01-17 08:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `admin_posts`
--

CREATE TABLE IF NOT EXISTS `admin_posts` (
  `id` int(11) NOT NULL,
  `post_name` varchar(280) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `cms_contents` int(11) DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `masters` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `users` int(11) DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  `reports` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_posts`
--

INSERT INTO `admin_posts` (`id`, `post_name`, `admin`, `cms_contents`, `status`, `CB`, `UB`, `DOC`, `DOU`, `masters`, `product`, `users`, `orders`, `reports`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 1, '2017-03-09 00:00:00', '2018-06-08 08:50:43', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `employee_code` varchar(280) DEFAULT NULL,
  `user_name` varchar(280) DEFAULT NULL,
  `password` varchar(280) DEFAULT NULL,
  `name` varchar(280) DEFAULT NULL,
  `email` varchar(280) DEFAULT NULL,
  `phone_number` varchar(280) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `post_id`, `employee_code`, `user_name`, `password`, `name`, `email`, `phone_number`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 1, '005', 'vperfumes', '$2y$13$r2CtUrZk8/sAhBDkGlL9ke1g1RyAMQcRsvKgNKyaylZ5L0Xc55JTe', 'Admin', 'manu@azryah.com', '9876543210', 1, 10, 1, '2017-03-16 00:00:00', '2019-02-22 12:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `banner_ar` varchar(255) DEFAULT NULL,
  `alt_tag` varchar(255) DEFAULT NULL,
  `banner_link` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner`, `banner_ar`, `alt_tag`, `banner_link`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'jpg', 'jpg', 'Arabian Perfumes', '', NULL, NULL, NULL, NULL, NULL),
(2, 'jpg', 'jpg', '', '', NULL, NULL, NULL, NULL, NULL),
(3, 'jpg', 'jpg', '', '', NULL, NULL, NULL, NULL, NULL),
(4, 'png', 'png', '', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `brand_ar` varchar(200) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `show_menu` int(11) DEFAULT NULL,
  `favourite_brand` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `brand_ar`, `image`, `CB`, `UB`, `DOC`, `DOU`, `status`, `show_menu`, `favourite_brand`) VALUES
(1, 'Adidas', NULL, 'png', 1, 2, '2017-12-04', '2019-01-03 08:01:28', 1, 0, 1),
(2, 'AIGNER', NULL, '', 1, 1, '2017-12-04', '2018-10-10 09:14:10', 1, NULL, NULL),
(3, 'AMOUAGE', NULL, '', 1, 1, '2017-12-04', '2018-10-10 09:14:10', 1, NULL, NULL),
(4, 'Aramis', NULL, '', 1, 1, '2017-12-04', '2018-10-10 09:14:10', 1, NULL, NULL),
(5, 'Azzaro', NULL, '', 1, 1, '2017-12-05', '2018-10-10 09:14:10', 1, NULL, NULL),
(6, 'BECKHAM DAVID', NULL, '', 1, 1, '2017-12-06', '2018-10-10 09:14:10', 1, NULL, NULL),
(7, 'BENETTON', NULL, '', 1, 1, '2017-12-06', '2018-10-10 09:14:10', 1, NULL, NULL),
(8, 'Bentely', NULL, '', 1, 1, '2017-12-06', '2018-10-10 09:14:10', 1, NULL, NULL),
(9, 'Chanel', NULL, '', 1, 1, '2017-12-06', '2018-10-10 09:14:10', 1, NULL, NULL),
(10, 'Bottega Veneta', NULL, '', 1, 1, '2017-12-06', '2018-10-10 09:14:10', 1, NULL, NULL),
(11, 'Britney spears', NULL, '', 1, 1, '2017-12-06', '2018-10-10 09:14:10', 1, NULL, NULL),
(14, '24', NULL, 'jpg', 1, 2, '2018-02-07', '2018-12-31 12:02:51', 1, 0, NULL),
(15, 'Victoria''s Secret', NULL, '', 1, 1, '2018-03-03', '2018-10-10 09:14:10', 1, NULL, NULL),
(17, 'Dior', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(18, 'Armani', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(19, 'Gucci', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(20, 'Burberry', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(21, 'Tom Ford', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(22, 'Lancome', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(23, 'Versace', NULL, 'jpg', 1, 2, '2018-03-13', '2019-01-03 08:04:31', 1, 0, 1),
(24, 'Calvin Klein', NULL, 'jpg', 1, 2, '2018-03-13', '2018-12-31 12:03:39', 1, 0, NULL),
(25, 'Davidoff', NULL, 'jpg', 1, 2, '2018-03-13', '2019-01-03 08:05:07', 1, 0, 0),
(26, 'Lacoste', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(27, 'DKNY', NULL, 'jpg', 1, 2, '2018-03-13', '2018-12-31 12:09:53', 1, 0, NULL),
(28, 'Moschino Cheap and Chic', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(29, 'Dolce and Gabbana', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(30, 'Bvlgari', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(31, 'Nikos', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(32, 'Coral Perfumes', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(33, 'Cacharel', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(34, 'Chloe', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(35, 'Clinique', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(36, 'Carrera', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(37, 'Cartier', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(38, 'Chopard', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(39, 'Dunhill', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(40, 'Elie Saab', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(41, 'Fendi', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(42, 'Ferrari', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(43, 'Essenza', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(44, 'Elizabeth Arden', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(45, 'Escada', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(46, 'Givenchy', NULL, 'jpg', 1, 2, '2018-03-13', '2019-01-03 08:02:26', 1, 1, 1),
(47, 'Guerlain', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(48, 'Guess', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(49, 'Hugo Boss', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(50, 'Jovan', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(51, 'Kenzo', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(52, 'Kenneth Cole', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(53, 'Jimmy Choo', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(54, 'Jagur', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(55, 'Jennifer Lopez', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(56, 'Joop', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(57, 'John Varvatos', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(59, 'Estee Lauder', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(60, 'Diesel', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(61, 'YSL', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(62, 'valentino', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(63, 'Viktor & Rolf', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(64, 'Victoria Hills', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(65, 'Tawoos', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(66, 'Thierry Mugler', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(67, 'Trussardi', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(68, 'Salvatore Ferragamo', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(69, 'Mercedes Benz', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(70, 'Mont Blanc', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(71, 'Ninna Ricci', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(72, 'Lalique', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(73, 'Lanvin', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(74, 'Olive Perfumes', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(75, 'Arabian Eagle', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(76, 'Roberto Cavalli', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(77, 'Prada', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(78, 'Paco Rabanne', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(79, 'Police', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(80, 'Play Boy', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(81, 'Lady Gaga', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(82, 'Katty Perry', NULL, '', 1, 1, '2018-03-13', '2018-10-10 09:14:10', 1, NULL, NULL),
(83, ' GEOFFREY BENNE', NULL, '', 1, 1, '2018-04-24', '2018-10-10 09:14:10', 1, NULL, NULL),
(84, 'Carolina Herrera', NULL, '', 1, 1, '2018-06-04', '2018-10-10 09:14:10', 1, NULL, NULL),
(85, 'Creed', NULL, '', 1, 1, '2018-08-28', '2018-10-10 09:14:10', 1, NULL, NULL),
(86, 'Scent Diffuser', NULL, '', 1, 1, '2018-09-03', '2018-10-10 09:14:10', 1, NULL, NULL),
(87, 'Iris Montini', NULL, 'png', 2, 2, '2018-10-10', '2019-01-03 08:01:49', 1, 1, 1),
(88, 'ACQUA DI MONACO', NULL, '1', 2, 2, '2018-11-28', '0000-00-00 00:00:00', 1, NULL, NULL),
(89, 'Acqua Di Parisis', NULL, '1', 2, 2, '2018-11-28', '0000-00-00 00:00:00', 1, NULL, NULL),
(90, 'Angel Schlesser', NULL, '1', 2, 2, '2018-11-28', '0000-00-00 00:00:00', 1, NULL, NULL),
(91, 'Antonio Banderas ', NULL, '1', 2, 2, '2018-11-28', '0000-00-00 00:00:00', 1, NULL, NULL),
(92, 'Baldessarini', NULL, '1', 2, 2, '2018-11-28', '0000-00-00 00:00:00', 1, NULL, NULL),
(93, 'Cerutti ', NULL, '1', 2, 2, '2018-11-28', '0000-00-00 00:00:00', 1, NULL, NULL),
(94, 'Meraki', NULL, 'png', 2, 2, '2018-12-31', '2019-01-03 08:02:06', 1, 1, 1),
(96, 'Victor Raymond', NULL, '1', 2, 2, '2018-12-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(99, 'BRAND NAME', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(100, 'ISSEY MIAKE', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(103, 'ISSEY MIYAKE', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(104, 'FIERCE COLOGNE', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(105, 'NOBLE', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(106, ' AMBRA', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(107, 'COLONIA', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(108, 'ACQUA DI PARMA', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(109, 'AIGNER ETIENNE', NULL, '1', 2, 2, '2019-01-31', '0000-00-00 00:00:00', 1, NULL, NULL),
(110, 'ALAIA ', NULL, '1', 2, 2, '2019-02-01', '0000-00-00 00:00:00', 1, NULL, NULL),
(111, 'ALEXANDRE', NULL, '1', 2, 2, '2019-02-01', '0000-00-00 00:00:00', 1, NULL, NULL),
(112, 'AMORINO', NULL, '1', 2, 2, '2019-02-01', '0000-00-00 00:00:00', 1, NULL, NULL),
(113, 'ARMAND BASI', NULL, '1', 2, 2, '2019-02-05', '0000-00-00 00:00:00', 1, NULL, NULL),
(114, 'ARMANI EAU ', NULL, '1', 2, 2, '2019-02-05', '0000-00-00 00:00:00', 1, NULL, NULL),
(115, 'AROMATICS', NULL, '1', 2, 2, '2019-02-05', '0000-00-00 00:00:00', 1, NULL, NULL),
(116, 'ASTEN LAFERIE', NULL, '1', 2, 2, '2019-02-05', '0000-00-00 00:00:00', 1, NULL, NULL),
(117, 'ATELIER COLOGNE', NULL, '1', 2, 2, '2019-02-05', '0000-00-00 00:00:00', 1, NULL, NULL),
(118, 'brand1', 'brand1', 'jpg', 1, 1, '2019-02-19', '2019-02-20 06:49:46', 1, NULL, NULL),
(119, 'brand123', 'brand123', '', 1, 0, '2019-02-20', '0000-00-00 00:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `options` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `gift_option` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `item_type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `session_id`, `product_id`, `quantity`, `options`, `date`, `gift_option`, `rate`, `item_type`) VALUES
(19, NULL, '1550472952431', 19, 1, NULL, '2019-02-18 10:07:48', NULL, NULL, 0),
(20, NULL, '1550472952431', 27, 2, NULL, '2019-02-18 10:07:49', NULL, NULL, 0),
(21, NULL, '1550472952431', 39, 2, NULL, '2019-02-18 10:07:49', NULL, NULL, 0),
(22, NULL, '1550472952431', 40, 2, NULL, '2019-02-18 10:07:50', NULL, NULL, 0),
(23, NULL, '1550472952431', 12, 1, NULL, '2019-02-18 10:07:54', NULL, NULL, 0),
(24, NULL, '1550472952431', 11, 1, NULL, '2019-02-18 10:10:31', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `main_category` int(11) NOT NULL DEFAULT '1',
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `main_category`, `category`, `category_ar`, `category_code`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 1, 'International Brands', NULL, '', NULL, NULL, NULL, '2019-03-07 13:29:21', 1),
(2, 1, 'Exclusive Brands', NULL, '', NULL, NULL, NULL, '2019-03-07 13:29:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_customer`
--

CREATE TABLE IF NOT EXISTS `cms_customer` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `canonical_name` varchar(250) NOT NULL,
  `short_content` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_customer`
--

INSERT INTO `cms_customer` (`id`, `title`, `canonical_name`, `short_content`, `content`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 'Help With My Orders', 'help-with-my-orders', 'Orders delivery, tracking, payment and more', '<h1 class="head-one">Help With My Orders</h1>\r\n        <div class="cont-box">\r\n            <h2>Items are missing from My Order</h2>\r\n            <p>If you have received an incomplete product or order with missing items or quantity, please thoroughly check the delivery package for the missing item or product or part product. If still not found, you can contact customer care or return the entire order. </p>\r\n            <a href="#" class="link-button">Click here for return your Order</a>\r\n        </div>\r\n\r\n        <div class="cont-box"><h2> I Received a Damaged or a Defective Item</h2>\r\n            <p>If you have received a product in damaged or defective condition, you can request to return the product for a refund within 15 days of its delivery by following the steps mentioned below:</p>\r\n            <ul>\r\n                <li> Log in to your perfumedunia.com account using your registered email address and password</li>\r\n                <li>Go the My Account </li>\r\n                <li>Click on My Orders </li>\r\n                <li>Give the detailed note about the issue </li>\r\n                <li>Click on Return </li>\r\n            </ul>\r\n        </div>\r\n\r\n        <div class="cont-box"><p>Note: Ensure to provide as much information as possible before completing the return as the product you return will be assessed and validated before it is accepted for a refund. If the stated issue is not found in the product you return, the product will be sent back to you and your claim for a refund will be rejected.</p></div>\r\n        <div class="cont-box"><h2>Shipping and Delivery</h2>\r\n            <p>We deliver all across the Emirates except certain areas which are considered as out of service areas. Our courier company delivers orders during working hours from 9:00 am to 6:00 pm Saturday to Thursday.</p>\r\n            <p>Shipping fees depend on the total quantity of items and weight. Therefore, there are no flat shipping charges. The best way to find out the shipping charge applicable to your order is to try placing an order. The last page of the checkout process will provide you with the exact shipping cost. An additional amount of AED4 will be charged per shipment if you choose to pay using Cash on Delivery payment method for your order.</p></div>\r\n        <div class="cont-box"><h2>Non Shipping Areas</h2>\r\n            <a href="https://www.eliteairborne.com/download/Remote_NonServiceable_Areas_in_UAE.pdf" target="_blank" class="link-button">https://www.eliteairborne.com/download/Remote_NonServiceable_Areas_in_UAE.pdf</a></div>\r\n\r\n\r\n\r\n        <div class="cont-box"><h2>How to Know About Upcoming Promotions and Offers?</h2>\r\n            <p>You can subscribe to receive information about upcoming promotions and offers on perfumedunia.com and also control the way these notifications are sent to you.</p></div>\r\n\r\n        <div class="cont-box"><h2>About Coupon Codes</h2>\r\n            <p>Coupon codes are promotional codes that can be used on perfumedunia.com to obtain a discount on your purchase. These coupon codes can be issued by perfumedunia.com</p>\r\n        </div>\r\n        <div class="cont-box"><h2>Cancelling an Order</h2>\r\n            <p>You can cancel your order/item only before it enters the shipping phase. The option to cancel an order/item will cease to appear when the shipment has entered the shipping phase.</p></div>\r\n        <div class="cont-box"><h2>To cancel an item/order:</h2>\r\n            <ul>\r\n                <li>Log in to your perfumedunia.com account using your registered email address and password.</li>\r\n                <li>Go to My Account Page.</li>\r\n                <li>Click on My Orders.</li>\r\n                <li>Click on Cancel my Order.</li>\r\n                <li>Write a note reason for cancellation </li>\r\n                <li>Click on Complete Cancellation to complete the cancellation request.</li>\r\n            </ul>\r\n            <p>Note: For purchases made with a credit card, the amount will be refunded to the same card within 5 to 7 working days after successful cancellation of the order.</p>\r\n        </div>\r\n        <div class="cont-box"><h2>How to View My Orders?</h2>\r\n            <ul>\r\n                <li>Log in to your perfumedunia.com account using your registered email address and password.</li>\r\n                <li>Click on your name displaying on top right-hand corner of the page.</li>\r\n                <li>Click the My Orders tab. By default, all orders you have placed in the last 6 months will be displayed.</li>\r\n            </ul>\r\n        </div>\r\n        <div class="cont-box"><h2>Note:</h2>\r\n            <p>To filter your orders on the basis of their status, click the “All” tab and select the required option. Consequently, orders that are “Under Process”, “Cancelled” Or “Returned” will be displayed.</p></div>\r\n        <div class="cont-box"><h2>Accepted Payment Methods</h2>\r\n            <p>Perfumedunia.com accepts payment by credit and debit cards (Visa and MasterCard), Cash on Delivery (COD),</p> </div>\r\n\r\n        <div class="cont-box"><h2>My Credit Card Was Charged but the Order Was Not Placed</h2>\r\n            <p>If your credit card was charged while purchasing on perfumedunia.com without receiving order confirmation, view your perfumedunia.com account summary to find out if the order is not created Kindly contact to customer care.</p> \r\n        </div>\r\n        <div class="cont-box"><h2>How will I Get My Refund?</h2>\r\n            <p>Your method of refund depends on the payment method you used when you purchased the item. For credit card purchases, the payment will be refunded back to the same credit card used.	\r\n                Cancelling Return Request</p>\r\n            <p>If, following your request to return an item, you change your mind and wish to cancel your return request, you have the option to refuse the collection of the item when the courier contacts you to pick up the item.</p>\r\n        </div>', 1, 1, '2018-08-31', '2018-08-31 10:00:19', 1),
(2, 'Returns And Refund', 'returns-and-refund', 'Know how to return an item and get your money back', '<h1 class="head-one">Help With My Orders</h1>\r\n        <div class="cont-box">\r\n            <h2>Items are missing from My Order</h2>\r\n            <p>If you have received an incomplete product or order with missing items or quantity, please thoroughly check the delivery package for the missing item or product or part product. If still not found, you can contact customer care or return the entire order. </p>\r\n            <a href="#" class="link-button">Click here for return your Order</a>\r\n        </div>\r\n\r\n        <div class="cont-box"><h2> I Received a Damaged or a Defective Item</h2>\r\n            <p>If you have received a product in damaged or defective condition, you can request to return the product for a refund within 15 days of its delivery by following the steps mentioned below:</p>\r\n            <ul>\r\n                <li> Log in to your perfumedunia.com account using your registered email address and password</li>\r\n                <li>Go the My Account </li>\r\n                <li>Click on My Orders </li>\r\n                <li>Give the detailed note about the issue </li>\r\n                <li>Click on Return </li>\r\n            </ul>\r\n        </div>\r\n\r\n        <div class="cont-box"><p>Note: Ensure to provide as much information as possible before completing the return as the product you return will be assessed and validated before it is accepted for a refund. If the stated issue is not found in the product you return, the product will be sent back to you and your claim for a refund will be rejected.</p></div>\r\n        <div class="cont-box"><h2>Shipping and Delivery</h2>\r\n            <p>We deliver all across the Emirates except certain areas which are considered as out of service areas. Our courier company delivers orders during working hours from 9:00 am to 6:00 pm Saturday to Thursday.</p>\r\n            <p>Shipping fees depend on the total quantity of items and weight. Therefore, there are no flat shipping charges. The best way to find out the shipping charge applicable to your order is to try placing an order. The last page of the checkout process will provide you with the exact shipping cost. An additional amount of AED4 will be charged per shipment if you choose to pay using Cash on Delivery payment method for your order.</p></div>\r\n        <div class="cont-box"><h2>Non Shipping Areas</h2>\r\n            <a href="https://www.eliteairborne.com/download/Remote_NonServiceable_Areas_in_UAE.pdf" target="_blank" class="link-button">https://www.eliteairborne.com/download/Remote_NonServiceable_Areas_in_UAE.pdf</a></div>\r\n\r\n\r\n\r\n        <div class="cont-box"><h2>How to Know About Upcoming Promotions and Offers?</h2>\r\n            <p>You can subscribe to receive information about upcoming promotions and offers on perfumedunia.com and also control the way these notifications are sent to you.</p></div>\r\n\r\n        <div class="cont-box"><h2>About Coupon Codes</h2>\r\n            <p>Coupon codes are promotional codes that can be used on perfumedunia.com to obtain a discount on your purchase. These coupon codes can be issued by perfumedunia.com</p>\r\n        </div>\r\n        <div class="cont-box"><h2>Cancelling an Order</h2>\r\n            <p>You can cancel your order/item only before it enters the shipping phase. The option to cancel an order/item will cease to appear when the shipment has entered the shipping phase.</p></div>\r\n        <div class="cont-box"><h2>To cancel an item/order:</h2>\r\n            <ul>\r\n                <li>Log in to your perfumedunia.com account using your registered email address and password.</li>\r\n                <li>Go to My Account Page.</li>\r\n                <li>Click on My Orders.</li>\r\n                <li>Click on Cancel my Order.</li>\r\n                <li>Write a note reason for cancellation </li>\r\n                <li>Click on Complete Cancellation to complete the cancellation request.</li>\r\n            </ul>\r\n            <p>Note: For purchases made with a credit card, the amount will be refunded to the same card within 5 to 7 working days after successful cancellation of the order.</p>\r\n        </div>\r\n        <div class="cont-box"><h2>How to View My Orders?</h2>\r\n            <ul>\r\n                <li>Log in to your perfumedunia.com account using your registered email address and password.</li>\r\n                <li>Click on your name displaying on top right-hand corner of the page.</li>\r\n                <li>Click the My Orders tab. By default, all orders you have placed in the last 6 months will be displayed.</li>\r\n            </ul>\r\n        </div>\r\n        <div class="cont-box"><h2>Note:</h2>\r\n            <p>To filter your orders on the basis of their status, click the “All” tab and select the required option. Consequently, orders that are “Under Process”, “Cancelled” Or “Returned” will be displayed.</p></div>\r\n        <div class="cont-box"><h2>Accepted Payment Methods</h2>\r\n            <p>Perfumedunia.com accepts payment by credit and debit cards (Visa and MasterCard), Cash on Delivery (COD),</p> </div>\r\n\r\n        <div class="cont-box"><h2>My Credit Card Was Charged but the Order Was Not Placed</h2>\r\n            <p>If your credit card was charged while purchasing on perfumedunia.com without receiving order confirmation, view your perfumedunia.com account summary to find out if the order is not created Kindly contact to customer care.</p> \r\n        </div>\r\n        <div class="cont-box"><h2>How will I Get My Refund?</h2>\r\n            <p>Your method of refund depends on the payment method you used when you purchased the item. For credit card purchases, the payment will be refunded back to the same credit card used.	\r\n                Cancelling Return Request</p>\r\n            <p>If, following your request to return an item, you change your mind and wish to cancel your return request, you have the option to refuse the collection of the item when the courier contacts you to pick up the item.</p>\r\n        </div>', 1, 1, '2018-08-31', '2018-08-31 10:00:33', 1),
(3, 'My Account', 'my-account', 'All account related help, account settings and addresses', '<h1 class="head-one">Help With My Orders</h1>\r\n        <div class="cont-box">\r\n            <h2>Items are missing from My Order</h2>\r\n            <p>If you have received an incomplete product or order with missing items or quantity, please thoroughly check the delivery package for the missing item or product or part product. If still not found, you can contact customer care or return the entire order. </p>\r\n            <a href="#" class="link-button">Click here for return your Order</a>\r\n        </div>\r\n\r\n        <div class="cont-box"><h2> I Received a Damaged or a Defective Item</h2>\r\n            <p>If you have received a product in damaged or defective condition, you can request to return the product for a refund within 15 days of its delivery by following the steps mentioned below:</p>\r\n            <ul>\r\n                <li> Log in to your perfumedunia.com account using your registered email address and password</li>\r\n                <li>Go the My Account </li>\r\n                <li>Click on My Orders </li>\r\n                <li>Give the detailed note about the issue </li>\r\n                <li>Click on Return </li>\r\n            </ul>\r\n        </div>\r\n\r\n        <div class="cont-box"><p>Note: Ensure to provide as much information as possible before completing the return as the product you return will be assessed and validated before it is accepted for a refund. If the stated issue is not found in the product you return, the product will be sent back to you and your claim for a refund will be rejected.</p></div>\r\n        <div class="cont-box"><h2>Shipping and Delivery</h2>\r\n            <p>We deliver all across the Emirates except certain areas which are considered as out of service areas. Our courier company delivers orders during working hours from 9:00 am to 6:00 pm Saturday to Thursday.</p>\r\n            <p>Shipping fees depend on the total quantity of items and weight. Therefore, there are no flat shipping charges. The best way to find out the shipping charge applicable to your order is to try placing an order. The last page of the checkout process will provide you with the exact shipping cost. An additional amount of AED4 will be charged per shipment if you choose to pay using Cash on Delivery payment method for your order.</p></div>\r\n        <div class="cont-box"><h2>Non Shipping Areas</h2>\r\n            <a href="https://www.eliteairborne.com/download/Remote_NonServiceable_Areas_in_UAE.pdf" target="_blank" class="link-button">https://www.eliteairborne.com/download/Remote_NonServiceable_Areas_in_UAE.pdf</a></div>\r\n\r\n\r\n\r\n        <div class="cont-box"><h2>How to Know About Upcoming Promotions and Offers?</h2>\r\n            <p>You can subscribe to receive information about upcoming promotions and offers on perfumedunia.com and also control the way these notifications are sent to you.</p></div>\r\n\r\n        <div class="cont-box"><h2>About Coupon Codes</h2>\r\n            <p>Coupon codes are promotional codes that can be used on perfumedunia.com to obtain a discount on your purchase. These coupon codes can be issued by perfumedunia.com</p>\r\n        </div>\r\n        <div class="cont-box"><h2>Cancelling an Order</h2>\r\n            <p>You can cancel your order/item only before it enters the shipping phase. The option to cancel an order/item will cease to appear when the shipment has entered the shipping phase.</p></div>\r\n        <div class="cont-box"><h2>To cancel an item/order:</h2>\r\n            <ul>\r\n                <li>Log in to your perfumedunia.com account using your registered email address and password.</li>\r\n                <li>Go to My Account Page.</li>\r\n                <li>Click on My Orders.</li>\r\n                <li>Click on Cancel my Order.</li>\r\n                <li>Write a note reason for cancellation </li>\r\n                <li>Click on Complete Cancellation to complete the cancellation request.</li>\r\n            </ul>\r\n            <p>Note: For purchases made with a credit card, the amount will be refunded to the same card within 5 to 7 working days after successful cancellation of the order.</p>\r\n        </div>\r\n        <div class="cont-box"><h2>How to View My Orders?</h2>\r\n            <ul>\r\n                <li>Log in to your perfumedunia.com account using your registered email address and password.</li>\r\n                <li>Click on your name displaying on top right-hand corner of the page.</li>\r\n                <li>Click the My Orders tab. By default, all orders you have placed in the last 6 months will be displayed.</li>\r\n            </ul>\r\n        </div>\r\n        <div class="cont-box"><h2>Note:</h2>\r\n            <p>To filter your orders on the basis of their status, click the “All” tab and select the required option. Consequently, orders that are “Under Process”, “Cancelled” Or “Returned” will be displayed.</p></div>\r\n        <div class="cont-box"><h2>Accepted Payment Methods</h2>\r\n            <p>Perfumedunia.com accepts payment by credit and debit cards (Visa and MasterCard), Cash on Delivery (COD),</p> </div>\r\n\r\n        <div class="cont-box"><h2>My Credit Card Was Charged but the Order Was Not Placed</h2>\r\n            <p>If your credit card was charged while purchasing on perfumedunia.com without receiving order confirmation, view your perfumedunia.com account summary to find out if the order is not created Kindly contact to customer care.</p> \r\n        </div>\r\n        <div class="cont-box"><h2>How will I Get My Refund?</h2>\r\n            <p>Your method of refund depends on the payment method you used when you purchased the item. For credit card purchases, the payment will be refunded back to the same credit card used.	\r\n                Cancelling Return Request</p>\r\n            <p>If, following your request to return an item, you change your mind and wish to cancel your return request, you have the option to refuse the collection of the item when the courier contacts you to pick up the item.</p>\r\n        </div>', 1, 1, '2018-08-31', '2018-08-31 10:00:44', 1),
(4, 'Fees, Rules And Policies', 'fees-rules-and-policies', 'Fees, rules & policy', '<h1 class="head-one">Help With My Orders</h1>\r\n        <div class="cont-box">\r\n            <h2>Items are missing from My Order</h2>\r\n            <p>If you have received an incomplete product or order with missing items or quantity, please thoroughly check the delivery package for the missing item or product or part product. If still not found, you can contact customer care or return the entire order. </p>\r\n            <a href="#" class="link-button">Click here for return your Order</a>\r\n        </div>\r\n\r\n        <div class="cont-box"><h2> I Received a Damaged or a Defective Item</h2>\r\n            <p>If you have received a product in damaged or defective condition, you can request to return the product for a refund within 15 days of its delivery by following the steps mentioned below:</p>\r\n            <ul>\r\n                <li> Log in to your perfumedunia.com account using your registered email address and password</li>\r\n                <li>Go the My Account </li>\r\n                <li>Click on My Orders </li>\r\n                <li>Give the detailed note about the issue </li>\r\n                <li>Click on Return </li>\r\n            </ul>\r\n        </div>\r\n\r\n        <div class="cont-box"><p>Note: Ensure to provide as much information as possible before completing the return as the product you return will be assessed and validated before it is accepted for a refund. If the stated issue is not found in the product you return, the product will be sent back to you and your claim for a refund will be rejected.</p></div>\r\n        <div class="cont-box"><h2>Shipping and Delivery</h2>\r\n            <p>We deliver all across the Emirates except certain areas which are considered as out of service areas. Our courier company delivers orders during working hours from 9:00 am to 6:00 pm Saturday to Thursday.</p>\r\n            <p>Shipping fees depend on the total quantity of items and weight. Therefore, there are no flat shipping charges. The best way to find out the shipping charge applicable to your order is to try placing an order. The last page of the checkout process will provide you with the exact shipping cost. An additional amount of AED4 will be charged per shipment if you choose to pay using Cash on Delivery payment method for your order.</p></div>\r\n        <div class="cont-box"><h2>Non Shipping Areas</h2>\r\n            <a href="https://www.eliteairborne.com/download/Remote_NonServiceable_Areas_in_UAE.pdf" target="_blank" class="link-button">https://www.eliteairborne.com/download/Remote_NonServiceable_Areas_in_UAE.pdf</a></div>\r\n\r\n\r\n\r\n        <div class="cont-box"><h2>How to Know About Upcoming Promotions and Offers?</h2>\r\n            <p>You can subscribe to receive information about upcoming promotions and offers on perfumedunia.com and also control the way these notifications are sent to you.</p></div>\r\n\r\n        <div class="cont-box"><h2>About Coupon Codes</h2>\r\n            <p>Coupon codes are promotional codes that can be used on perfumedunia.com to obtain a discount on your purchase. These coupon codes can be issued by perfumedunia.com</p>\r\n        </div>\r\n        <div class="cont-box"><h2>Cancelling an Order</h2>\r\n            <p>You can cancel your order/item only before it enters the shipping phase. The option to cancel an order/item will cease to appear when the shipment has entered the shipping phase.</p></div>\r\n        <div class="cont-box"><h2>To cancel an item/order:</h2>\r\n            <ul>\r\n                <li>Log in to your perfumedunia.com account using your registered email address and password.</li>\r\n                <li>Go to My Account Page.</li>\r\n                <li>Click on My Orders.</li>\r\n                <li>Click on Cancel my Order.</li>\r\n                <li>Write a note reason for cancellation </li>\r\n                <li>Click on Complete Cancellation to complete the cancellation request.</li>\r\n            </ul>\r\n            <p>Note: For purchases made with a credit card, the amount will be refunded to the same card within 5 to 7 working days after successful cancellation of the order.</p>\r\n        </div>\r\n        <div class="cont-box"><h2>How to View My Orders?</h2>\r\n            <ul>\r\n                <li>Log in to your perfumedunia.com account using your registered email address and password.</li>\r\n                <li>Click on your name displaying on top right-hand corner of the page.</li>\r\n                <li>Click the My Orders tab. By default, all orders you have placed in the last 6 months will be displayed.</li>\r\n            </ul>\r\n        </div>\r\n        <div class="cont-box"><h2>Note:</h2>\r\n            <p>To filter your orders on the basis of their status, click the “All” tab and select the required option. Consequently, orders that are “Under Process”, “Cancelled” Or “Returned” will be displayed.</p></div>\r\n        <div class="cont-box"><h2>Accepted Payment Methods</h2>\r\n            <p>Perfumedunia.com accepts payment by credit and debit cards (Visa and MasterCard), Cash on Delivery (COD),</p> </div>\r\n\r\n        <div class="cont-box"><h2>My Credit Card Was Charged but the Order Was Not Placed</h2>\r\n            <p>If your credit card was charged while purchasing on perfumedunia.com without receiving order confirmation, view your perfumedunia.com account summary to find out if the order is not created Kindly contact to customer care.</p> \r\n        </div>\r\n        <div class="cont-box"><h2>How will I Get My Refund?</h2>\r\n            <p>Your method of refund depends on the payment method you used when you purchased the item. For credit card purchases, the payment will be refunded back to the same credit card used.	\r\n                Cancelling Return Request</p>\r\n            <p>If, following your request to return an item, you change your mind and wish to cancel your return request, you have the option to refuse the collection of the item when the courier contacts you to pick up the item.</p>\r\n        </div>', 1, 1, '2018-08-31', '2018-08-31 10:00:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_meta_tags`
--

CREATE TABLE IF NOT EXISTS `cms_meta_tags` (
  `id` int(11) NOT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_description` longtext,
  `meta_keyword` longtext,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `page_title` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_meta_tags`
--

INSERT INTO `cms_meta_tags` (`id`, `meta_title`, `meta_description`, `meta_keyword`, `CB`, `UB`, `DOC`, `DOU`, `page_title`) VALUES
(1, 'Vperfumes', 'Vperfumes', 'Vperfumes', NULL, NULL, NULL, '2019-03-07 08:55:31', 'Vperfumes'),
(2, 'About Us | Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:56:44', 'about '),
(3, 'Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:56:50', 'about '),
(7, 'Contact Us - Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:59:50', 'Contact Details'),
(8, 'Al Hajis Perfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:57:19', 'FAQ'),
(9, 'Terms & Conditions | Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:59:39', 'Terms And Condition'),
(10, 'Blogs | Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:59:35', 'Blogs'),
(11, 'Privacy Policy | Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:59:31', 'Privacy Policy'),
(12, 'Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:59:28', 'Delivery Information'),
(13, 'Login-Signups | Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:59:24', 'login/signup'),
(14, 'Cart | Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:58:55', 'cart'),
(15, 'Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:58:51', 'Return Policy'),
(16, 'Vperfumes', 'Vperfumes', 'Vperfumes', NULL, NULL, NULL, '2019-03-07 08:58:49', 'Men'),
(17, 'Vperfumes', 'Vperfumes', 'Vperfumes', NULL, NULL, NULL, '2019-03-07 08:58:43', 'Women'),
(18, 'Vperfumes', 'Vperfumes', 'Vperfumes', NULL, NULL, NULL, '2019-03-07 08:58:41', 'Oriental'),
(19, 'Vperfumes', 'Vperfumes', 'Vperfumes', NULL, NULL, NULL, '2019-03-07 08:58:40', 'Brand'),
(20, 'Vperfumes', 'Vperfumes', 'Vperfumes', NULL, NULL, NULL, '2019-03-07 08:58:38', 'Scent Diffuser'),
(21, 'Vperfumes', 'Vperfumes', 'Vperfumes', NULL, NULL, NULL, '2019-03-07 08:58:24', 'Gifts'),
(22, 'Vperfumes', 'Vperfumes', '', NULL, NULL, NULL, '2019-03-07 08:58:23', 'Special offer');

-- --------------------------------------------------------

--
-- Table structure for table `cms_others`
--

CREATE TABLE IF NOT EXISTS `cms_others` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  `status` int(11) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE IF NOT EXISTS `contact_page` (
  `id` int(11) NOT NULL,
  `map` varchar(500) DEFAULT NULL,
  `content` text,
  `accounts_info` text,
  `administration_info` text,
  `marketing_info` text,
  `business_info` text,
  `marketing_address` text,
  `address_1` text,
  `address_2` text,
  `address_3` text,
  `address_4` text,
  `phone_no` varchar(250) DEFAULT NULL,
  `phone_no_1` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `shoroom_content` varchar(500) DEFAULT NULL,
  `date_1` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`id`, `map`, `content`, `accounts_info`, `administration_info`, `marketing_info`, `business_info`, `marketing_address`, `address_1`, `address_2`, `address_3`, `address_4`, `phone_no`, `phone_no_1`, `email`, `shoroom_content`, `date_1`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `country` varchar(250) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `country_code`, `mobile_no`, `country`, `reason`, `date`) VALUES
(5, 'ccac', '', 'ascas', NULL, 'asds', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE IF NOT EXISTS `country_code` (
  `id` int(11) NOT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `country_code` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`id`, `country_name`, `country_code`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'UAE', '+971', 1, 1, 3, '2017-09-12', '2017-10-03 08:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `currency_symbol`, `currency_value`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 'Arab Emirate Dirham', 'AED', '18', 1, 1, '2017-08-14 00:00:00', '2019-02-19 13:33:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE IF NOT EXISTS `customer_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `tittle` varchar(100) DEFAULT NULL,
  `description` text,
  `review_date` date DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '''0''=>''Not Appoved'' , ''1'' => ''Appoved,'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emirates`
--

CREATE TABLE IF NOT EXISTS `emirates` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` datetime NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emirates`
--

INSERT INTO `emirates` (`id`, `name`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(2, 'Dubai', 3, 3, '2017-10-03 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Abu Dhabi', 3, 3, '2017-10-03 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'Ras al-Khaimah', 3, 3, '2017-10-03 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'Sharjah', 3, 3, '2017-10-03 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'Umm al-Quwain', 3, 3, '2017-10-03 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'Ajman', 3, 3, '2017-10-03 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'Fujairah', 3, 3, '2017-10-03 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password_tokens`
--

CREATE TABLE IF NOT EXISTS `forgot_password_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forgot_password_tokens`
--

INSERT INTO `forgot_password_tokens` (`id`, `user_id`, `token`, `date`) VALUES
(2, 9, '2807194653', NULL),
(4, 1, '1739642805', NULL),
(5, 1, '2749351806', NULL),
(7, 9, '2679180435', NULL),
(8, 9, '3980457261', NULL),
(9, 2, '5379281640', NULL),
(10, 2, '0179453862', NULL),
(11, 2, '4719253608', NULL),
(12, 2, '3901762845', NULL),
(13, 2, '5309261784', NULL),
(16, 2, '7841269350', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fregrance`
--

CREATE TABLE IF NOT EXISTS `fregrance` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fregrance`
--

INSERT INTO `fregrance` (`id`, `name`, `name_ar`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 'Eau De Parfum', 'Eau De Parfum', 1, 1, '2017-09-08', '2019-02-19 13:01:26', 1),
(2, 'Eau De Toilette', NULL, 3, 3, '2017-09-13', '0000-00-00 00:00:00', 1),
(3, 'Body Mist', NULL, 3, 3, '2017-10-10', '0000-00-00 00:00:00', 1),
(4, 'Eau De Cologne', NULL, 2, 2, '2018-10-15', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `from_our_blog`
--

CREATE TABLE IF NOT EXISTS `from_our_blog` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_description` longtext,
  `meta_keyword` longtext,
  `blog_date` date DEFAULT NULL,
  `content` text,
  `image` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `img` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`, `img`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'Men', 'png', 1, 1, 3, '2017-09-14', '2017-09-28 11:36:15'),
(2, 'Women', 'png', 1, 1, 3, '2017-09-14', '2017-09-28 11:36:20'),
(3, 'Unisex', 'png', 1, 1, 3, '2017-09-14', '2017-09-28 11:36:20'),
(4, 'Oriental', 'png', 1, 1, 3, '2017-09-14', '2017-09-28 11:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE IF NOT EXISTS `gifts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homemanagement_type`
--

CREATE TABLE IF NOT EXISTS `homemanagement_type` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `form_type` int(11) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homemanagement_type`
--

INSERT INTO `homemanagement_type` (`id`, `type`, `form_type`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 'Single banner', 1, 1, 1, '2018-03-01', '2018-03-01 10:12:04', 1),
(2, 'Double Banner', 1, 1, 1, '2018-03-01', '2018-03-01 10:12:21', 1),
(3, 'Tripple Banner', 1, 1, 1, '2018-03-01', '2018-03-01 10:12:18', 1),
(4, 'Latest product', 2, 1, 1, '2018-03-01', '2018-03-01 10:12:27', 1),
(5, 'New Arrivals', 2, 1, 1, '2018-03-01', '2018-03-01 10:12:30', 1),
(6, 'Todays Exclusive', 2, 1, 1, '2018-03-01', '2018-03-01 10:12:33', 1),
(7, 'Featured Products', 2, 1, 1, '2018-03-01', '2018-03-01 10:12:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_management`
--

CREATE TABLE IF NOT EXISTS `home_management` (
  `id` int(11) NOT NULL,
  `form_type` int(11) DEFAULT NULL,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `tittle` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE IF NOT EXISTS `main_category` (
  `id` int(11) NOT NULL,
  `main_category` varchar(200) DEFAULT NULL,
  `canonical_name` varchar(255) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`id`, `main_category`, `canonical_name`, `CB`, `UB`, `DOC`, `DOU`, `status`, `sort_order`) VALUES
(1, 'Fragrances', 'fragrances', 1, 1, '2018-09-12 00:00:00', '2019-02-20 06:41:54', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `map_locations`
--

CREATE TABLE IF NOT EXISTS `map_locations` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `latitude` varchar(500) DEFAULT NULL,
  `longitude` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_searchtag_category`
--

CREATE TABLE IF NOT EXISTS `master_searchtag_category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `search_tags` varchar(250) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` datetime NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_search_tag`
--

CREATE TABLE IF NOT EXISTS `master_search_tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master_search_tag`
--

INSERT INTO `master_search_tag` (`id`, `tag_name`, `tag_name_ar`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 'mens', NULL, 1, 1, '2017-11-29 00:00:00', '2017-11-29 06:46:28', 1),
(2, 'womens', NULL, 1, 1, '2017-11-29 00:00:00', '2017-11-29 06:46:33', 1),
(3, '24', NULL, 1, 1, '2018-02-07 00:00:00', '2018-02-07 07:05:09', 1),
(4, 'scentstory', NULL, 1, 1, '2018-02-07 00:00:00', '2018-02-07 07:05:37', 1),
(6, 'addidas', NULL, 1, 1, '2018-02-07 00:00:00', '2018-02-07 14:00:56', 1),
(7, 'dkny', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 08:28:54', 1),
(8, 'delicious', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 08:29:06', 1),
(9, 'Nikos', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 08:48:22', 1),
(10, 'Calvin Klein for Women', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 08:49:23', 1),
(11, 'Calvin Klein for Men', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 08:51:04', 1),
(12, 'ck', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 08:51:14', 1),
(13, 'Davidoff', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 08:58:48', 1),
(14, 'latest', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 08:59:08', 1),
(15, 'victoria''s secret secret Kiss fragrance mist', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 09:02:24', 1),
(16, 'victoria''s secret ', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 09:02:35', 1),
(17, ' Kiss fragrance mist', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 09:02:43', 1),
(18, 'fragrance mist', NULL, 1, 1, '2018-03-13 00:00:00', '2018-03-13 09:02:51', 1),
(19, 'givenchy', NULL, 1, 1, '2018-04-14 00:00:00', '2018-04-14 12:14:08', 1),
(20, 'blue label ', NULL, 1, 1, '2018-04-14 00:00:00', '2018-04-14 12:14:20', 1),
(21, 'ADIDAS FLORAL DREAM', NULL, 1, 1, '2018-04-14 00:00:00', '2018-04-14 12:43:40', 1),
(22, 'lanvin', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 13:52:26', 1),
(23, 'Bvlgari', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 14:36:45', 1),
(24, 'Omnia Crystalline', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 14:36:55', 1),
(25, 'ladies', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 14:37:12', 1),
(26, 'Omnia Amethyste', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 14:52:43', 1),
(27, 'Omnia Amethyste for Women', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 14:53:01', 1),
(28, ' BRIGHT CRYSTAL', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 17:00:13', 1),
(29, ' VERSACE FOR WOMEN', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 17:00:23', 1),
(30, 'Versace for Men', NULL, 1, 1, '2018-04-18 00:00:00', '2018-04-18 17:03:17', 1),
(31, 'Dahlia Noir', NULL, 1, 1, '2018-04-19 00:00:00', '2018-04-19 08:45:47', 1),
(32, 'GIVENCHY EAUDEMOISELLE', NULL, 1, 1, '2018-04-19 00:00:00', '2018-04-19 08:57:47', 1),
(33, 'EAUDEMOISELLE', NULL, 1, 1, '2018-04-19 00:00:00', '2018-04-19 08:57:51', 1),
(34, 'Gentleman by Givenchy for Men', NULL, 1, 1, '2018-04-19 00:00:00', '2018-04-19 14:51:07', 1),
(35, 'Givenchy for Men', NULL, 1, 1, '2018-04-19 00:00:00', '2018-04-19 14:51:14', 1),
(36, 'Gentleman', NULL, 1, 1, '2018-04-19 00:00:00', '2018-04-19 14:51:23', 1),
(37, 'GIVENCHY FOR WOMEN', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 08:23:01', 1),
(38, 'GIVENCHY VERY IRRESISTIBLE', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 08:23:20', 1),
(39, 'ELECTRIC ROSE FOR WOMEN ', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 08:23:32', 1),
(40, 'GUCCI BAMBOO', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 14:01:54', 1),
(41, 'GUCCI ', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 14:02:01', 1),
(42, 'BAMBOO', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 14:02:06', 1),
(43, 'GUCCI ENVY ME', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 14:58:41', 1),
(44, 'GUCCI FLORA ', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 15:32:51', 1),
(45, 'GUCCI GENEROUS', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 15:32:57', 1),
(46, 'GUCCI FLORA BY GUCCI GENEROUS', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 15:33:02', 1),
(47, 'GUCCI GORGEOUS GARDENIA', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 15:40:17', 1),
(48, 'GUCCI FLORA BY GUCCI  ', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 15:50:06', 1),
(49, 'GUCCI GUILTY BLACK', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 16:05:45', 1),
(50, 'GUCCI GUILTY BLACK M EDT 50ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 16:19:47', 1),
(51, 'GUCCI GUILTY BLACK FOR MEN', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 16:19:58', 1),
(52, 'GUCCI FOR MEN', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 16:20:09', 1),
(53, 'GUCCI GUILTY INTENSE L EDP 75ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 16:46:01', 1),
(54, 'GUCCI GUILTY INTENSE FOR MEN', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 16:57:44', 1),
(55, 'GUCCI GUILTY FOR WOMEN EDT 75ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 17:09:39', 1),
(56, 'GUCCI GUILTY M EDT 50ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 18:45:03', 1),
(57, 'GUCCI PREMIERE FOR WOMEN EDP 75ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:18:06', 1),
(58, 'GUCCI RUSH FOR WOMEN EDT 75ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:25:17', 1),
(59, 'GUERLAIN HABIT ROUGE FOR MEN EDP 100ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:28:26', 1),
(60, 'GUERLAIN HABIT ROUGE ', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:28:32', 1),
(61, 'GUERLAIN ', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:28:37', 1),
(62, 'GUERLAIN L HOMME IDEAL EDT 100ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:41:01', 1),
(63, 'GUERLAIN L INSTANT DE M EDT 125ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:42:19', 1),
(64, 'GUERLAIN L INSTANT ', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:42:24', 1),
(65, 'GUERLAIN L INSTANT MAGIC L EDP 50ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 19:52:26', 1),
(66, 'GUERLAIN LA PETITE ROBE NOIR COUTURE L EDP 100ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 20:01:17', 1),
(67, 'GUERLAIN LINSTANT DE FOR WOMEN EDP 80ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 20:10:46', 1),
(68, 'GUERLAIN SAMSARA L EDT 100ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 20:18:05', 1),
(69, 'GUERLAIN VETIVER FOR MEN EDT 100ML', NULL, 1, 1, '2018-04-24 00:00:00', '2018-04-24 20:40:55', 1),
(70, 'vs', NULL, 1, 1, '2018-04-25 00:00:00', '2018-04-25 12:47:45', 1),
(71, 'body mist', NULL, 1, 1, '2018-04-25 00:00:00', '2018-04-25 12:47:51', 1),
(72, 'coolwater', NULL, 1, 1, '2018-04-25 00:00:00', '2018-04-25 13:00:35', 1),
(73, 'Lacoste', NULL, 1, 1, '2018-04-25 00:00:00', '2018-04-25 13:03:17', 1),
(74, 'Lacoste Red ', NULL, 1, 1, '2018-04-25 00:00:00', '2018-04-25 13:03:28', 1),
(75, 'Play for men', NULL, 1, 1, '2018-04-25 00:00:00', '2018-04-25 13:03:36', 1),
(76, 'colwater for men', NULL, 1, 1, '2018-04-25 00:00:00', '2018-04-25 13:05:37', 1),
(77, 'colwater for women', NULL, 1, 1, '2018-04-25 00:00:00', '2018-04-25 13:05:46', 1),
(78, 'ENDLESS NIGHT ', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 08:19:16', 1),
(79, 'aigner', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 10:17:01', 1),
(80, 'love spell', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:05:39', 1),
(81, 'blush', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:06:04', 1),
(82, 'victoria', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:07:57', 1),
(83, 'Conflict Flower mist', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:08:04', 1),
(84, 'Pure Seduction', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:11:22', 1),
(85, 'party kiss', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:13:12', 1),
(86, 'temptation', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:14:47', 1),
(87, 'aqua kiss', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:17:17', 1),
(88, 'kiss', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:17:25', 1),
(89, 'Salvatore Ferragamo Incanto Shine', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:19:16', 1),
(90, ' Incanto Shine', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:19:21', 1),
(91, 'Salvatore Ferragamo', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:19:25', 1),
(92, 'Golden Bloom', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:23:52', 1),
(93, 'Dolce & Gabbana', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:27:20', 1),
(94, 'Dolce & Gabbana for Women', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:27:29', 1),
(95, 'Light Blue', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:27:33', 1),
(96, 'Silver Shadow Altitude', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:33:47', 1),
(97, 'Hot Water by Davidoff for Men', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:34:48', 1),
(98, 'wild vanila', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:37:56', 1),
(99, 'midnight', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 11:44:15', 1),
(100, 'CK IN2U ', NULL, 1, 1, '2018-04-26 00:00:00', '2018-04-26 13:32:11', 1),
(101, 'chanel', NULL, 1, 1, '2018-05-02 00:00:00', '2018-05-02 14:23:00', 1),
(102, 'chanel for men', NULL, 1, 1, '2018-05-02 00:00:00', '2018-05-02 14:23:08', 1),
(103, 'mens perfume', NULL, 1, 1, '2018-05-02 00:00:00', '2018-05-02 14:24:40', 1),
(104, 'men', NULL, 1, 1, '2018-05-03 00:00:00', '2018-05-03 07:24:47', 1),
(105, 'mont blanc', NULL, 1, 1, '2018-05-03 00:00:00', '2018-05-03 15:49:15', 1),
(106, 'Gift Set', NULL, 1, 1, '2018-05-03 00:00:00', '2018-05-03 15:49:41', 1),
(127, 'Armani', NULL, 1, 1, '2018-08-28 00:00:00', '2018-08-28 11:30:19', 1),
(128, 'tag1', 'tag1', 1, NULL, '2019-02-20 00:00:00', '2019-02-20 11:47:12', 1),
(129, 'tag2', 'tag2', 1, NULL, '2019-02-20 00:00:00', '2019-02-20 11:47:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_management`
--

CREATE TABLE IF NOT EXISTS `menu_management` (
  `id` int(11) NOT NULL,
  `type` smallint(6) DEFAULT NULL COMMENT '1->Main,2->Sub,3->child',
  `main_menu_id` int(11) DEFAULT NULL,
  `main_menu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_menu_arabic` int(11) DEFAULT NULL,
  `sub_menu_id` int(11) DEFAULT NULL,
  `sub_menu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_menu_arabic` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_menu_link` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_menu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_menu_arabic` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_menu_link` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_management`
--

INSERT INTO `menu_management` (`id`, `type`, `main_menu_id`, `main_menu`, `main_menu_arabic`, `sub_menu_id`, `sub_menu`, `sub_menu_arabic`, `sub_menu_link`, `child_menu`, `child_menu_arabic`, `child_menu_link`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, NULL, NULL, 'Men', NULL, NULL, NULL, NULL, 'https://www.perfumedunia.com/mens-perfumes', NULL, NULL, NULL, 1, 1, 1, '2018-03-15', '2018-09-06 06:39:42'),
(2, NULL, NULL, 'Women', NULL, NULL, NULL, NULL, 'https://perfumedunia.com/product/index?type=1', NULL, NULL, NULL, 1, 1, 1, '2018-03-15', '2018-08-29 11:19:23'),
(3, NULL, NULL, 'Oriental', NULL, NULL, NULL, NULL, 'https://perfumedunia.com/product/index?type=3', NULL, NULL, NULL, 1, 1, 1, '2018-03-15', '2018-08-29 11:19:31'),
(4, NULL, NULL, 'Body Mist', NULL, NULL, NULL, NULL, 'https://perfumedunia.com/product/index?category=body-mists', NULL, NULL, NULL, 1, 1, 1, '2018-03-16', '2018-08-29 11:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1502097917),
('m130524_201442_init', 1502097921),
('m170807_093108_test', 1502098558),
('m170807_093633_test1', 1502098664),
('m170808_075909_category', 1502179278),
('m170811_045410_product_table', 1503552671);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `notification_type` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `content` longtext,
  `message` longtext,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE IF NOT EXISTS `order_address` (
  `id` int(11) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `landmark` varchar(250) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `emirate` int(11) NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `country_code` varchar(15) DEFAULT NULL,
  `mobile_number` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `order_id`, `name`, `address`, `landmark`, `location`, `emirate`, `post_code`, `country_code`, `mobile_number`) VALUES
(1, '1179', 'Rency Daniel', 'Alzubadi building', 'AL Nadha park', 'Sharjah ', 5, NULL, '+971', 543679876),
(2, '1180', 'Sabitha Varghese', 'Ollangattu Tower', 'Near Kids Asia', 'kakkanad', 2, 682037, '+971', 9645419602);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `rate` decimal(10,2) NOT NULL,
  `item_type` int(11) NOT NULL DEFAULT '0',
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `master_id`, `order_id`, `product_id`, `quantity`, `amount`, `tax`, `delivered_date`, `rate`, `item_type`, `doc`, `status`) VALUES
(1, 1, '1179', 11, 1, '173.00', '8.24', NULL, '173.00', 0, '2018-11-29 19:09:50', 0),
(2, 2, '1180', 146, 1, '233.00', '11.10', NULL, '233.00', 0, '2019-02-07 04:07:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
  `id` int(11) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `tax_amount` decimal(10,3) DEFAULT NULL,
  `shipping_charge` decimal(10,2) DEFAULT NULL,
  `net_amount` decimal(10,2) DEFAULT NULL COMMENT 'Including Delivery charge, gift wrap and tax',
  `order_date` datetime NOT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `ship_address_id` int(11) DEFAULT NULL,
  `bill_address_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `user_comment` text,
  `payment_mode` int(11) DEFAULT NULL,
  `admin_comment` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT '0' COMMENT '0=>pending,1=>success,2=>failed,3=>cod',
  `payment_sucess_data` text,
  `payment_ref_number` varchar(100) DEFAULT NULL,
  `admin_status` int(11) DEFAULT '0' COMMENT '0- pending 1- placed 2-packed 3-dispatched 4- delivered 5-cancelled 6- returned',
  `expected_delivery_date` datetime DEFAULT NULL,
  `delivered_date` timestamp NULL DEFAULT NULL,
  `doc` datetime DEFAULT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `shipping_status` int(11) DEFAULT '0' COMMENT '1-orderplaced 2-dispached 3 delivered',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not placed, 1-> checkoutstarted, 2->billingcomplete,3->deliverydetailcoplete, 4->confirmed complete, 5->Cancelled',
  `cancel_reason` text,
  `promotion_id` int(11) DEFAULT NULL,
  `promotion_discount` decimal(10,2) DEFAULT NULL,
  `return_status` int(11) NOT NULL DEFAULT '0' COMMENT '1- returned by user 2- returned by admin',
  `return_reason` text,
  `return_approve` int(11) DEFAULT '0' COMMENT '1=>approved 2=>disapproved ',
  `gift_wrap` int(11) NOT NULL,
  `gift_wrap_value` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `order_id`, `user_id`, `total_amount`, `tax`, `discount_amount`, `tax_amount`, `shipping_charge`, `net_amount`, `order_date`, `invoice_no`, `ship_address_id`, `bill_address_id`, `currency_id`, `user_comment`, `payment_mode`, `admin_comment`, `payment_status`, `payment_sucess_data`, `payment_ref_number`, `admin_status`, `expected_delivery_date`, `delivered_date`, `doc`, `dou`, `shipping_status`, `status`, `cancel_reason`, `promotion_id`, `promotion_discount`, `return_status`, `return_reason`, `return_approve`, `gift_wrap`, `gift_wrap_value`) VALUES
(1, '1179', 2, '173.00', '8.24', NULL, NULL, '0.00', '173.00', '2018-11-30 00:39:50', '12', NULL, 4, NULL, '', 1, NULL, 3, NULL, NULL, 5, '2018-11-30 00:00:00', NULL, '2018-11-30 00:00:00', '2018-11-29 19:34:12', 0, 5, NULL, NULL, NULL, 0, NULL, 0, 0, '0'),
(2, '1180', 1, '233.00', '11.10', NULL, NULL, '0.00', '233.00', '2019-02-07 09:37:40', '13', NULL, 2, NULL, '', 1, NULL, 3, NULL, NULL, 2, '2019-02-23 00:00:00', NULL, '2019-02-07 00:00:00', '2019-02-21 10:44:30', 0, 4, NULL, NULL, NULL, 0, NULL, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `order_promotions`
--

CREATE TABLE IF NOT EXISTS `order_promotions` (
  `id` int(11) NOT NULL,
  `order_master_id` int(11) DEFAULT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `promotion_discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `principals`
--

CREATE TABLE IF NOT EXISTS `principals` (
  `id` int(11) NOT NULL,
  `terms_conditions` longtext,
  `privacy_policy` longtext,
  `return_policy` longtext,
  `faq` longtext,
  `payment_policy` text NOT NULL,
  `delivery_information` longtext,
  `status` int(11) NOT NULL DEFAULT '1',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principals`
--

INSERT INTO `principals` (`id`, `terms_conditions`, `privacy_policy`, `return_policy`, `faq`, `payment_policy`, `delivery_information`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, '<h2> Terms &amp; Conditions&nbsp; </h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You agree to use this website solely for the purposes that are permitted by any applicable law, governmental regulations and this Terms &amp; Condition.</p>\r\n\r\n<p>You agree that you will not attempt to access the perfumedunai.com other than through the interface that is provided by us.</p>\r\n\r\n<p>You agree not to attempt to access the website, or any related webpage by means of automated means, such as scripts or web crawlers.&nbsp;</p>\r\n\r\n<p>You agree that you will not undertake any activity that could disrupts or interferes with the functioning of the website and our business.</p>\r\n\r\n<p>You agree that you will not reproduce, copy, duplicate, trade or resell the information featured on the website or any portion of it for any purpose.</p>\r\n\r\n<p><strong>Intellectual property</strong></p>\r\n\r\n<p>All the content featured on the website such as graphics, text, data, images, logos, music, video, promotional messages, and software is owned property of perfumedunia.com. The content is licensed and is protected by trademark, copyright, patent, and other trade and proprietary rights. The repository, arrangement, and form of all content on the website are the exclusive property of Perfume Dunia and duplication of it will warrant legal actions.</p>\r\n\r\n<p><strong>Legal capacity to avail the services and make agreements</strong></p>\r\n\r\n<p>The customer should be of or above the age of 18 to sign in to our website and avail the services. By agreeing on the terms of legal capacity, an individual confirms his age and we cannot be held accountable for the loss or damage induced by a minor account user. Also, we reserve the right to solicit compensation for such losses or damages caused by the children from their parents or guardian.</p>\r\n\r\n<p><strong><big>PRICES</big></strong></p>\r\n\r\n<p><strong>Base Currency</strong></p>\r\n\r\n<p>All the payments and services charges should be paid in UAE Dirhams (AED)</p>\r\n\r\n<p><strong>Changing of Prices</strong></p>\r\n\r\n<p>We reserve that right to alter the price of the products featured in the website owing to change in demand, price raise by the manufacturers or other market scenario.</p>\r\n\r\n<p><strong>Typographical Errors</strong></p>\r\n\r\n<p>Perfume Dunia website is a massive reserve of data and we strive to keep every bit of it accurate. Due to human error and other determinants, there is a possibility of wrong information being posted on the website and we cannot guarantee that information listed is entirely accurate, current or complete. We encourage customers to cross-check data such as products descriptions, pricing, compatibility references, photographs, hyperlinks, detailed specifications, and other product or brand related information.</p>\r\n\r\n<p><strong><big>ORDERS</big></strong></p>\r\n\r\n<p><strong>Placement of Order</strong></p>\r\n\r\n<p>The placement can be done through the website or the mobile app. To prerequisite for placing an order are an active account, current address and phone number. We encourage customers to proof read the details of the order before confirming it. We are not responsible for the glitches in successful completion and delivery of order owing to wrong information cited by the consumer.</p>\r\n\r\n<p><strong>Processing Time</strong></p>\r\n\r\n<p>Once the order is confirmed, it is processed in approximately 24-48 hours. Delayed payment verification, public holidays, and unavailability of stock might extend the processing time. The status of the processing will be regularly updated on your account.</p>\r\n\r\n<p><strong>Order Acceptance Policy</strong></p>\r\n\r\n<p>The confirmation text message or email does not guarantee our acceptance of your order, we reserve the right to accept or decline your order if we have enough reason.</p>\r\n\r\n<p><strong>Change/ Cancel Orders</strong></p>\r\n\r\n<p>You can alter the specifications of the order before it is charged to your account. You can call our 24/7 customer care to change order details such as address or phone number.</p>\r\n\r\n<p>You can cancel the order altogether before the order is processed and receive a complete refund. You can call the customer care to request a cancellation of order. We encourage you to place a call than any other form of communication as telephonic request allows us to take swift action.</p>\r\n\r\n<p><strong><big>PAYMENT</big></strong></p>\r\n\r\n<p>Perfumedunia.com offers both electronic payment and cash on Delivery (COD). The COD facility is limited to U.A.E; customers residing in other countries can still shop at our website by the means of e-payment. We assure our website visitors a transparent and stress-free e-payment procedure; the website and the payment gateways are heavily protected from outside infiltrators and hackers.</p>\r\n\r\n<p>Perfumedunia.com reserves the right to refuse the processing or delivery of an order on the grounds or partial or no-payment from the customer.</p>\r\n\r\n<p><big><strong>DISPUTES</strong></big></p>\r\n\r\n<p>If any dispute, difference, or controversy arises in connection with this user agreement, such as dissension regarding the scope, formation, performance, existence, termination of agreement, and validity or of this User Agreement, a first attempt will be made to amicably to settle the Dispute through cooperation and negotiations over a period of thirty (30) calendar days.</p>\r\n\r\n<p>In case the dispute goes inextricable after 30 days, the parties hereby agree that the Dispute shall be moved to Dubai Court under the Arbitration Rules.</p>\r\n\r\n<p><big><strong>LIMITATIONS OF LIABILITY</strong></big></p>\r\n\r\n<p>If you are dissatisfied with any content or material featured on the website, the only remedy for the discontentment is to quit using it. All the data presented on the website is published after rigorous deliberation and inspection and we stand by it, if you find it difficult to concur with it, we encourage you to discontinue your use of it.&nbsp;</p>\r\n\r\n<p>In all circumstances, Perfume Dunia&rsquo;s liability is limited to the price of the product sold on the website. We refuse to be held accountable, under any circumstances, for a claim or action in contract, contribution or indemnity, tort, or the claims regarding the products we trade which exceeds the liability limit. We shall not be liable for the malfunction of the produce, claims by the third party, interruption of services, delays, damage, loss, whether or not we have been notified about such claims or damages.</p>\r\n\r\n<p><strong><big>GOVERNING LAW</big></strong></p>\r\n\r\n<p>This User Agreement is construed in accordance with the UAE law and the disputes regarding the agreement will be settled by the Dubai Court.</p>\r\n\r\n<p><strong><big>DELIVERY</big></strong></p>\r\n\r\n<p>The customer can order an already launched product from the website which is eligible for immediate delivery or pre-book a product which is not launched at the time of placing the order and schedule the delivery.</p>\r\n\r\n<p>The pre-ordered products can only be delivered after the launch date or the scheduled date once the payment is initiated and processed. Delivery charges may be levied on the pre-orders unless otherwise stated. The standard time required for processing the order is from the time of payment to the time of product launch; it could be delivered the same day or within next 2 days. Delivery date for the pre-ordered items may change if there is a change in the launch date of the product and the order and the delivery date could be altered without any prior notice or confirmation.</p>\r\n\r\n<p><strong><big>RETURN/ REFUND POLICY</big></strong></p>\r\n\r\n<p>The customer can solicit a refund if he/she receives a product in an unsatisfactory or damaged condition. You can lodge a refund request on the website and quote the reason for requesting a refund. If the reason is found genuine, the refund is initiated within 7 days of purchase in case of damaged or defected products.</p>\r\n\r\n<p>Return is not permitted in case:</p>\r\n\r\n<ol>\r\n	<li>If the product is not returned in its original packaging.</li>\r\n	<li>If the product is in used status.</li>\r\n	<li>If there is a disparity between the quantity of perfume delivered and returned</li>\r\n	<li>If the products are marked as non-returnable or non- refundable.</li>\r\n</ol>\r\n\r\n<p><strong><big>CANCELLATION POLICY</big></strong></p>\r\n\r\n<p>The request to cancel an order is accepted only before product delivery is initiated. Cancellation is not permitted once the delivery is initiated. The customer can lodge a cancellation request via email or telephone, we courage you to cancel via telephone as we can immediately action before the product gets out for delivery; e-mail messages will take time to be noticed and cannot be assured a cancellation.</p>\r\n', '<h2>PRIVACY POLICIES</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We hold the highest regard for your privacy at perfumedunia.com. To be able to proffer our services as an E-commerce site, we need to garner your personal data and sensitive data. We ascertain the privacy of our customer and merchant clients by the means of rigorous security provisions that we have in place.</p>\r\n\r\n<p>To set up an account on Perfumedunia.com and to start availing our services, you have to furnish details such as name, mobile number, e-mail, shipping address, financial details such as online banking details, credit card number and expiration date. &nbsp;The information collected will be solely used to facilitate purchase and will not be divulged to a third party.</p>\r\n\r\n<p>The personally identifiable information collected from the customers for billing purposes, to fill the orders and to deliver it to the right location will only be used during transactions with the exception of promotional activities. We may use the personally identifiable information to disseminate information that could benefit and interest our customers. We may use your e-mail and mobile number to send you newsletters, promotions, service-related announcements, deals and updates to inform you about the sales and offers you could avail. You can choose to &lsquo;opt out&rsquo; of this service and terminate the promotional communications via e-mail and text messages.</p>\r\n\r\n<p><strong>Information Storage and Maintenance</strong></p>\r\n\r\n<p>The information collected from the customers during account creation along with data generated by the means of cookies and log files are secured in our database. We employ this data to initiative transactions and to provide tailored packages, promotions, marketing offers, discounts, and sales.</p>\r\n\r\n<p>We may share aggregated information about our customer base with our trusted marketing partners and advertisers. This information does not divulge individual details, rather general trends and attributes of the demography. The aggregate data is completely cordoned off from personally identifiable information</p>\r\n\r\n<p><strong>Legal Disclaimer</strong></p>\r\n\r\n<p>We reserve the right to divulge your personal information when demanded by the government or the law enforcement agencies. We disclose the information only when reasonability of the request is ascertained to comply with a government or judicial proceeding.</p>\r\n\r\n<p><strong>Technical Methodologies</strong></p>\r\n\r\n<p>We employ cookies, log files, and clear gifs to collect and store the information garnered from our customers.</p>\r\n\r\n<p>The website hosts cookie files and they will be stored on the users&rsquo; computer once he/she signs up for our services. The cookie is harmless and is employed solely for the purpose of record-keeping. The intention behind planting the cookies is to discern our customers and to render a better, more personalized service. The customer can easily remove the cookies from their systems if they wish to terminate this service.</p>\r\n\r\n<p>Our advertising partners employ clear gifs a.k.a Web Bugs to facilitate e-mail marketing communications. The clear gifs functions almost similar to a cookie, they will be embedded in user&rsquo;s email to function as a gateway between user and the third party advertiser.</p>\r\n\r\n<p>The information collected will be securely stored using the log files in our database. The information includes browser type, IP addresses, internet service provider (ISP), referring/exit pages, date/time stamp, operating system and clickstream data. We use this information to proffer a better E-commerce experience to our clients and to render the website more responsive.</p>\r\n\r\n<p>Our website features hyperlinks leading to other web pages and sites which may or may not be controlled by us. We are not responsible for the privacy practices of such hyperlinked sites. We encourage you to leave to discern the privacy policy policies of such website before divulging any information.</p>\r\n\r\n<p>We reserve the right to alter the privacy statement at any time. We encourage you to read the privacy statement once in a while to check for updates and to be certain.</p>\r\n', '<h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; DELIVERY&nbsp; INFORMATION</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perfumedunia.com will NOT deal or provide any services or products to any of OFAC (Office of Foreign Assets Control) sanctions countries in accordance with the law of United Arab Emirates&rdquo;.</p>\r\n\r\n<p><strong>Shipping:</strong></p>\r\n\r\n<p>The shipping charge would reflect on the shopping cart / payment page.&nbsp;</p>\r\n\r\n<p>We are committed to delivering your order accurately, in good condition, and always on time promised by our customer care executive or on website. Below are some more shipping related points:</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Each order would be shipped only to a single destination address specified at the time of payment for that order. If you wish to ship products to different addresses, you shall need to place multiple orders.</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We make our best efforts to ensure that we ship out each item in your order within 3 working days of the order date. However in some cases, it may take longer, up to 5 or more working days, to ship the order, as the product may have to be procured by us where there is a heavy demand.</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We ship out orders on all week days (Saturday to Thursday), excluding public holidays.</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To ensure that your order reaches you in the fastest time and in good condition, we will only make shipments through reputed courier agencies.</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; While we strive to ship all items in your order together, this may not always be possible due to product characteristics, or availability.</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; If you believe that the product is not in good condition, or if the packaging is tampered with or damaged, before accepting delivery of the goods, please refuse to take delivery of the package, and immediately write an e-mail to support@perfumedunia.com mentioning your order reference number. We shall make our best efforts to ensure that a replacement delivery is made to you at the earliest.</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Please note all items will be shipped with an invoice. In case, inadvertently, the same is not received, you may write an e-mail to support@perfumedunia.com mentioning your order reference number.</p>\r\n\r\n<ul>\r\n	<li>Orders placed on non-working hours will be processed on the following working day.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>International delivery</p>\r\n\r\n<p>If you&rsquo;re receiving an International delivery it is very likely that you&rsquo;ll have to pay customs fees. Unfortunately it is extremely difficult to quantify exactly how much you&rsquo;ll have to pay in customs fees, as import duties vary from country to country, and on occasion from state to state as well.</p>\r\n\r\n<p>Some countries have exclusions for orders below a certain value, while others will charge you regardless of the value of your order.</p>\r\n\r\n<p>It is always advisable to determine what the charges may be before you place an order. A number of third party customs duty calculators are available, however it would be best to speak with the department or agency in charge of duty collections in your country to get the best information possible.</p>\r\n', '<div class="cont-box">                 <h4 class="sub-text">Returning a Product</h4>                 <p>Click on Return Item against the product you want to return. Return an item Read More...</p>             </div>             <div class="cont-box">                 <h4 class="sub-text">Where is My Order?</h4>                 <p>Your order will be delivered by the expected date specified on your order. The expected delivery date is the date on or before which you can reasonably expect the item to arrive at your preferred shipping address. Read More...                 </p>             </div>             <div class="cont-box">                 <h4 class="sub-text">Cancelling an Order</h4>                 <p>You can cancel your order or item only before it enters the shipping phase. The option to cancel an order or item will cease to appear when the shipment has entered the shipping phase. Cancel an item Read More...                 </p>             </div>             <div class="cont-box">                 <h4 class="sub-text">I Got a Counterfeit Item</h4>                 <p>If you believe you have received a counterfeit product, subject to return in accordance with Souq.com’s returns policy of the affected product to us within 15 days of its delivery and satisfaction of our assessment and validation process. </p>             </div>             <div class="cont-box">                 <h4 class="sub-text">About Returns Policy</h4>                 <p>If the product you receive is damaged, defective, counterfeit or not as described on the website, subject to return of the affected product to us within 15 days of its delivery and satisfaction of our assessment and validation process </p>             </div>', '<p><strong>RETURNS, EXCHANGES &amp; REFUNDS POLICY</strong></p>\r\n\r\n<p>We strive to deliver exemplary products and impeccable services, exceeding our clients&rsquo; expectations. Albeit, if our customers are unsatisfied with the products or services we proffer, we extend our upright services to make up for the breach of quality or quantity. We offer the following options to facilitate a refund, exchanges and refunds.</p>\r\n\r\n<p><strong>Return to Customer Services</strong></p>\r\n\r\n<p>The customers are eligible to return the product when they are delivered a damaged product, a wrong product, a wrong size. In such scenarios the customer can request for a return on our website. The process is plain sailing where you can click on the return tab, quote the reason for return and confirm the request. Once you lodge the return request our team will immediately scrutinize the issue and if the request is found genuine, employees will collect the product from your doorstep. The electronic or paper bill of the purchase has to be furnished during the time of return.&nbsp;</p>\r\n\r\n<p>A customer can request for a return within 15 days of purchase. The product must be returned in unused status and it should be returned in the package that it was delivered. If the product is returned in damaged or used condition, we reserve the right to refuse a return, refund or exchange on the product.</p>\r\n\r\n<p><strong>Refunds and exchanges</strong></p>\r\n\r\n<p>If the reason for return was wrong product or wrong sized-product and the request was for an exchange, we deliver the right product during the time of return. If the request is for a refund, we examine the issue, product and facilitate the refund once the request is found genuine.</p>\r\n\r\n<p>The refund will be issued to the bank account from which the payment was initiated. In case of cash on delivery, the money will be returned to the bank account of your choice. The refund value will be the price of the product during the time of purchase.</p>\r\n', '<p>Alhajis will NOT deal or provide any services or products to any of OFAC (Office of Foreign Assets Control) sanctions countries in accordance with the law of United Arab Emirates&rdquo;.</p>\r\n\r\n<h3>Shipping:</h3>\r\n\r\n<p>The shipping charge would reflect on the shopping cart / payment page.</p>\r\n\r\n<p>We are committed to delivering your order accurately, in good condition, and always on time promised by our customer care executive or on website. Below are some more shipping related points:</p>\r\n\r\n<ul>\r\n	<li>Each order would be shipped only to a single destination address specified at the time of payment for that order. If you wish to ship products to different addresses, you shall need to place multiple orders.</li>\r\n	<li>We make our best efforts to ensure that we ship out each item in your order within 3 working days of the order date. However in some cases, it may take longer, up to 5 or more working days, to ship the order, as the product may have to be procured by us where there is a heavy demand.</li>\r\n	<li>We ship out orders on all week days (Saturday to Thursday), excluding public holidays.</li>\r\n	<li>To ensure that your order reaches you in the fastest time and in good condition, we will only make shipments through reputed courier agencies.</li>\r\n	<li>While we strive to ship all items in your order together, this may not always be possible due to product characteristics, or availability.</li>\r\n	<li>If you believe that the product is not in good condition, or if the packaging is tampered with or damaged, before accepting delivery of the goods, please refuse to take delivery of the package, and immediately write an e-mail to support@coralperfumes.com mentioning your order reference number. We shall make our best efforts to ensure that a replacement delivery is made to you at the earliest.</li>\r\n	<li>Please note all items will be shipped with an invoice. In case, inadvertently, the same is not received, you may write an e-mail to support@coralperfumes.com mentioning your order reference number.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Orders placed on non-working hours will be processed on the following working day.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>International delivery</h3>\r\n\r\n<p>If you&rsquo;re receiving an International delivery it is very likely that you&rsquo;ll have to pay customs fees. Unfortunately it is extremely difficult to quantify exactly how much you&rsquo;ll have to pay in customs fees, as import duties vary from country to country, and on occasion from state to state as well.</p>\r\n\r\n<p>Some countries have exclusions for orders below a certain value, while others will charge you regardless of the value of your order.</p>\r\n\r\n<p>It is always advisable to determine what the charges may be before you place an order. A number of third party customs duty calculators are available, however it would be best to speak with the department or agency in charge of duty collections in your country to get the best information possible.</p>\r\n', 1, 1, 1, '2017-09-20', '2018-11-30 10:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `main_category` int(11) NOT NULL DEFAULT '1',
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_name_ar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `canonical_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `canonical_name_ar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `meta_keywords` longtext COLLATE utf8_unicode_ci,
  `search_tag` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_ean` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `ean_type` int(11) DEFAULT NULL COMMENT '1 - EAN 2 - UPC',
  `ean_value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gender_type` int(11) DEFAULT NULL COMMENT '0=>men 1=>women 2=>unisex 3=>oriental',
  `price` decimal(10,2) NOT NULL,
  `offer_price` decimal(10,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stock_unit` int(11) DEFAULT NULL,
  `stock_availability` int(11) DEFAULT '1',
  `tax` int(11) DEFAULT NULL,
  `free_shipping` int(11) DEFAULT NULL COMMENT '"1"=>"Yes", "0"=>"No"',
  `product_type` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `size_unit` int(11) DEFAULT NULL,
  `main_description` longtext COLLATE utf8_unicode_ci,
  `product_detail` longtext COLLATE utf8_unicode_ci,
  `product_detail_ar` longtext COLLATE utf8_unicode_ci,
  `condition` int(11) DEFAULT NULL COMMENT '"1"=>"New", "0"=>"refurbished"',
  `type` int(11) DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer_price_expiry_date` date DEFAULT NULL,
  `vmiles` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_alt` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gallery_alt` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_product` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_product` int(11) DEFAULT NULL,
  `sort` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `main_category`, `category`, `subcategory`, `product_name`, `product_name_ar`, `canonical_name`, `canonical_name_ar`, `meta_title`, `meta_description`, `meta_keywords`, `search_tag`, `item_ean`, `brand`, `ean_type`, `ean_value`, `gender_type`, `price`, `offer_price`, `discount`, `currency`, `stock`, `stock_unit`, `stock_availability`, `tax`, `free_shipping`, `product_type`, `size`, `size_unit`, `main_description`, `product_detail`, `product_detail_ar`, `condition`, `type`, `barcode`, `barcode_price`, `offer_price_expiry_date`, `vmiles`, `CB`, `UB`, `DOC`, `DOU`, `status`, `profile`, `profile_alt`, `gallery_alt`, `other_image`, `related_product`, `featured_product`, `sort`) VALUES
(1, 1, NULL, NULL, 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', 'blooms-de-lillis-limited-edition-edp-100ml', 'blooms-de-lillis-limited-edition-edp-100ml', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', 'Buy BLOOMS DE LILLIS LIMITED EDITION EDP 100ML from VPerfumes', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', '1', 'PD1', 8, NULL, '6294321712931', 3, '304.00', '99.00', 67, 1, 10, 5, 1, 1, 1, 1, 100, 5, NULL, '<p>Oriental<br />\r\nWoody</p>\r\n\r\n<p><br />\r\nLemon<br />\r\nOrange<br />\r\nFresh</p>\r\n\r\n<p><br />\r\nApple<br />\r\nRaspberry<br />\r\nPineapple<br />\r\nAquatic<br />\r\nGreen note</p>\r\n\r\n<p><br />\r\nCedarwood<br />\r\nDry wood<br />\r\nPatchouli<br />\r\nSandalwood<br />\r\nMusk</p>\r\n', '', NULL, NULL, '12345', '310', '2019-03-20', '', NULL, NULL, NULL, '2019-03-07 13:29:46', 1, 'jpg', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', '', NULL, NULL, NULL),
(2, 1, NULL, NULL, 'sdfsdf', 'dfdf', 'sdfsdf', 'dfdf', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', 'Buy sdfsdf from VPerfumes', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', '1', 'PD2', 8, NULL, '6294321712931', 3, '320.00', '300.00', 67, 1, 10, 5, 1, 1, 1, 1, 100, 5, NULL, '<p>Oriental<br />\r\nWoody</p>\r\n\r\n<p><br />\r\nLemon<br />\r\nOrange<br />\r\nFresh</p>\r\n\r\n<p><br />\r\nApple<br />\r\nRaspberry<br />\r\nPineapple<br />\r\nAquatic<br />\r\nGreen note</p>\r\n\r\n<p><br />\r\nCedarwood<br />\r\nDry wood<br />\r\nPatchouli<br />\r\nSandalwood<br />\r\nMusk</p>\r\n', '', NULL, NULL, '12345', '310', '2019-03-20', '', NULL, NULL, NULL, '2019-03-07 13:29:46', 1, 'jpg', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', 'BLOOMS DE LILLIS LIMITED EDITION EDP 100ML', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_listing`
--

CREATE TABLE IF NOT EXISTS `product_listing` (
  `id` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  `tittle` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_listing`
--

INSERT INTO `product_listing` (`id`, `type`, `tittle`, `product_id`, `sort_order`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 0, 'Our Perfumes', '4,6,11,15,16,17,19,20', NULL, 1, 1, 1, '2018-09-12', '2019-02-11 04:25:32'),
(2, 0, 'Our Watches', '12,27,39,40', NULL, 1, 1, 1, '2018-09-12', '2019-02-11 04:26:00'),
(3, 0, 'Our gifts', '19,27,39,40', NULL, 1, 1, 1, '2018-09-12', '2019-02-11 05:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL,
  `promotion_type` int(11) DEFAULT NULL,
  `promotion_code` varchar(250) DEFAULT NULL,
  `product_id` varchar(250) DEFAULT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=percentage,2=fixed',
  `price` decimal(10,2) DEFAULT NULL,
  `amount_range` varchar(250) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `code_usage` int(11) DEFAULT NULL COMMENT '1=one time use,2=multiple use',
  `starting_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `code_used` varchar(250) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed`
--

CREATE TABLE IF NOT EXISTS `recently_viewed` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recently_viewed`
--

INSERT INTO `recently_viewed` (`id`, `user_id`, `session_id`, `product_id`, `date`) VALUES
(1, 2, '', 193, '2018-10-17'),
(2, NULL, '1539758142196', 1, '2018-10-17'),
(3, NULL, '1539861152339', 2, '2018-10-18'),
(4, 2, '', 2, '2018-10-18'),
(5, 2, '', 3, '2018-10-20'),
(6, NULL, '1540020688367', 4, '2018-10-20'),
(7, NULL, '1540038452400', 5, '2018-10-20'),
(8, NULL, '1540183894346', 3, '2018-10-22'),
(9, 2, '', 6, '2018-10-23'),
(10, NULL, '1540310720973', 7, '2018-10-23'),
(11, NULL, '1540310868824', 7, '2018-10-23'),
(12, NULL, '1540312229379', 7, '2018-10-23'),
(13, 2, '', 7, '2018-10-24'),
(14, NULL, '1540367259545', 7, '2018-10-24'),
(15, NULL, '1540367259545', 6, '2018-10-24'),
(16, NULL, '1540470950319', 8, '2018-10-25'),
(17, 2, '', 8, '2018-10-25'),
(18, NULL, '1540472801438', 8, '2018-10-25'),
(19, NULL, '1540473118986', 7, '2018-10-25'),
(20, NULL, '1540473118986', 8, '2018-10-25'),
(21, NULL, '1540473118986', 6, '2018-10-25'),
(22, NULL, '1540473118986', 9, '2018-10-25'),
(23, NULL, '1540474019953', 9, '2018-10-25'),
(24, NULL, '1540486420529', 11, '2018-10-25'),
(25, NULL, '1540503592445', 11, '2018-10-25'),
(26, NULL, '1540632731163', 12, '2018-10-27'),
(27, NULL, '1540632731163', 4, '2018-10-27'),
(28, NULL, '1540635128215', 13, '2018-10-27'),
(29, NULL, '1542960228307', 13, '2018-11-23'),
(30, NULL, '1542960228307', 8, '2018-11-23'),
(31, NULL, '1543420314517', 14, '2018-11-28'),
(32, NULL, '1543505833090', 38, '2018-11-29'),
(33, NULL, '1543565102760', 11, '2018-11-30'),
(34, NULL, '1543565102760', 17, '2018-11-30'),
(35, NULL, '1543571551636', 41, '2018-11-30'),
(36, NULL, '1543575113371', 6, '2018-11-30'),
(37, NULL, '1543580080676', 11, '2018-11-30'),
(38, NULL, '1543918722216', 33, '2018-12-04'),
(39, NULL, '1543918722216', 44, '2018-12-04'),
(40, NULL, '1543918722216', 32, '2018-12-04'),
(41, NULL, '1543964314374', 44, '2018-12-04'),
(42, NULL, '1546177315144', 56, '2018-12-30'),
(43, NULL, '1546177315144', 12, '2018-12-30'),
(44, NULL, '1546180418302', 12, '2018-12-30'),
(45, NULL, '1546257092764', 63, '2018-12-31'),
(46, NULL, '1546257092764', 64, '2018-12-31'),
(47, NULL, '1546261598646', 67, '2018-12-31'),
(48, NULL, '1546274909707', 63, '2018-12-31'),
(49, NULL, '1546274924373', 63, '2018-12-31'),
(50, NULL, '1546274909707', 64, '2018-12-31'),
(51, NULL, '1546422750620', 27, '2019-01-02'),
(52, NULL, '1546516567572', 4, '2019-01-03'),
(53, NULL, '1548402344281', 15, '2019-01-25'),
(54, NULL, '1548925768915', 68, '2019-01-31'),
(55, NULL, '1548925768915', 69, '2019-01-31'),
(56, NULL, '1548925768915', 70, '2019-01-31'),
(57, NULL, '1548925768915', 71, '2019-01-31'),
(58, NULL, '1548925768915', 72, '2019-01-31'),
(59, NULL, '1549007198756', 81, '2019-02-01'),
(60, NULL, '1549007198756', 83, '2019-02-01'),
(61, NULL, '1549007198756', 85, '2019-02-01'),
(62, NULL, '1549352505591', 22, '2019-02-05'),
(63, NULL, '1549352505591', 23, '2019-02-05'),
(64, NULL, '1549352544544', 20, '2019-02-05'),
(65, NULL, '1549352544544', 57, '2019-02-05'),
(66, NULL, '1549352647163', 57, '2019-02-05'),
(67, NULL, '1549528813707', 174, '2019-02-07'),
(68, NULL, '1549607158379', 184, '2019-02-08'),
(69, NULL, '1549607158379', 185, '2019-02-08'),
(70, NULL, '1550373473647', 4, '2019-02-17'),
(71, NULL, '1550373473647', 3, '2019-02-17'),
(72, NULL, '1550373473647', 12, '2019-02-17'),
(73, NULL, '1550373473647', 8, '2019-02-17'),
(74, NULL, '1550473027265', 6, '2019-02-18'),
(75, NULL, '1550473027265', 4, '2019-02-18'),
(76, NULL, '1550473027265', 136, '2019-02-18'),
(77, NULL, '1550473027265', 19, '2019-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL,
  `value` bigint(20) NOT NULL,
  `prefix` varchar(200) DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `label`, `value`, `prefix`, `DOU`) VALUES
(1, 'Minimum amount for free shipping', 99, '', '2017-08-29 09:39:05'),
(2, 'Additional charge for shipping', 15, '', '2017-08-29 10:11:03'),
(3, 'Product EAN', 1, 'PD', '2017-08-29 10:11:03'),
(4, 'Order id', 1180, '', '2017-09-14 08:14:45'),
(5, 'Gift wrap Rate', 2, '', '2018-04-23 06:11:49'),
(6, 'Invoice', 14, NULL, '2018-10-12 04:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `showrooms`
--

CREATE TABLE IF NOT EXISTS `showrooms` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `address` text,
  `email` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `map` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showrooms`
--

INSERT INTO `showrooms` (`id`, `title`, `address`, `email`, `image`, `map`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(3, 'AL RIGGA', '<p>Subway Building,Near Al Rigga Metro 2nd Exit,&nbsp; &nbsp;Al Rigga Street,&nbsp;Dubai, UAE</p>\r\n\r\n<p>Working Hours:10.00 AM To 12.00 AM</p>\r\n\r\n<p><strong>PH: 04 221 0004</strong></p>\r\n', 'retail@coralperfumes.com', 'jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d115462.06639964454!2d55.252837658995986!3d25.264207476668968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3e5f5ccf03abffaf%3A0xb5003ab6404e032a!2scoral+perfumes+al+rigga!3m2!1d25.264224!2d55.322877999999996!5e0!3m2!1sen!2s!4v1507121530484" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 1, 1, 3, '2017-09-21', '2017-10-04 13:14:39'),
(4, 'SALAH Al DIN', '<p>Opposite Reef Mall</p>\r\n\r\n<p>Salah Al Din St. Dubai, UAE</p>\r\n\r\n<p>Working Hours:10AM to 12 AM</p>\r\n\r\n<p><strong><a href="https://www.google.com/search?site=async/lcl_akp&amp;q=coral+perfumes+phone&amp;sa=X&amp;ved=0ahUKEwjy9dPbg9fWAhWDXBoKHX1NDHYQ6BMIHzAF">Phone</a>:&nbsp;<a href="javascript:void(0)">+971 4 261 0002</a></strong></p>\r\n', 'info@coralperfumes.com', 'jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m22!1m12!1m3!1d115456.0518121009!2d55.25271305913024!3d25.270530973665917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m7!3e6!4m0!4m4!1s0x3e5f5cc83365d365%3A0xb83f3d845cf5d0f5!3m2!1d25.2705475!2d55.322753399999996!5e0!3m2!1sen!2s!4v1507122013057" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 1, 1, 3, '2017-09-21', '2017-10-04 13:16:21'),
(5, 'CENTURY MALL', '<p>Ground Floor,&nbsp;Opposite Carrefour,&nbsp; &nbsp; Hor Al Anz East - Dubai - UAE</p>\r\n\r\n<p>Working Hours:10:00AMTo11:00PM</p>\r\n\r\n<p><strong>PH: 04 226 4482</strong></p>\r\n', 'retail@coralperfumes.com', 'jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.424383317143!2d55.344859414596925!3d25.289941983853126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5c9acee724cd%3A0x39a43caca711207b!2sCentury+Mall!5e0!3m2!1sen!2s!4v1507123892088" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 1, 1, 3, '2017-09-21', '2017-10-06 06:59:59'),
(8, 'Al AIN', '<p>2nd Floor, Hili Mall</p>\r\n\r\n<p>AL Ain, UAE</p>\r\n\r\n<p>Working Hours: 10 AM To 11.PM</p>\r\n\r\n<p><strong>Ph:+971 54 367 9877</strong></p>\r\n', 'info@coralperfumes.com', 'jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3637.079265772232!2d55.77765961457347!3d24.27396178433387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e8ab46a2e345051%3A0x336b33ab520ff5f7!2sHili+Mall!5e0!3m2!1sen!2s!4v1507123463713" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 1, 3, 3, '2017-09-25', '2017-10-04 13:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `img_ar` varchar(255) DEFAULT NULL,
  `slider_link` varchar(500) DEFAULT NULL,
  `alt_tag_content` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img`, `img_ar`, `slider_link`, `alt_tag_content`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(2, 'jpg', 'jpg', '', '', 1, NULL, NULL, NULL, '2019-02-22 07:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `date`, `status`) VALUES
(1, 'siyad@azryah.com', '2019-01-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL,
  `main_category` int(11) NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=>percentage,2=>flat',
  `value` decimal(10,2) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `type`, `value`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'Tax 5%', 1, '5.00', 1, NULL, NULL, NULL, '2018-02-06 12:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `temp_session`
--

CREATE TABLE IF NOT EXISTS `temp_session` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL COMMENT '1=Shipping Address,2=Billing Address,3=Coupon Code',
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `content` text,
  `status` int(11) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `content`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(4, 'jpg', 'Client Name', ' You can experience wide collection of branded perfumes in Alhajis. I am excited when I found the large collections of perfumes and watches in the attractive shops.', 1, 1, 2, '2017-09-20', '2018-09-11 11:02:45'),
(7, 'jpg', 'Just Perfect!', 'You can experience wide collection of branded perfumes in Alhajis. I am excited when I found the large collections of perfumes and watches in the attractive shops.', 1, 1, 2, '2017-09-20', '2018-09-11 11:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `today_offers`
--

CREATE TABLE IF NOT EXISTS `today_offers` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `alt_tag` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `today_offers`
--

INSERT INTO `today_offers` (`id`, `title`, `image`, `link`, `alt_tag`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'Section 1', 'jpg', 'http://coralepitome.com/alhajis/product/index?type=1', 'section1', 1, 1, 2, '2018-09-11', '2018-10-15 11:43:07'),
(2, 'Sale 50% Off', NULL, 'http://coralepitome.com/alhajis/', NULL, 1, 1, 2, '2018-09-11', '2018-10-15 11:43:10'),
(3, 'Section 3', 'jpg', 'http://coralepitome.com/alhajis/product/index?type=2', 'section3', 1, 1, 2, '2018-09-11', '2019-01-17 11:23:07'),
(4, 'Sale 50% Off', NULL, 'http://coralepitome.com/alhajis/', NULL, 1, 1, 2, '2018-09-11', '2018-10-15 11:43:23'),
(5, 'Section 5', 'jpg', 'http://coralepitome.com/alhajis/', 'section5', 1, 1, 2, '2018-09-11', '2018-10-15 11:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit_name`, `unit_name_ar`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 'number', 'number', 1, 1, '2017-08-14 00:00:00', '2019-02-20 13:12:14', 1),
(4, 'litre', 'litre', 1, 1, '2017-08-17 00:00:00', '2019-02-20 13:12:02', 1),
(5, 'ML', 'ML', 1, 1, '2017-08-24 00:00:00', '2019-02-20 13:12:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `country_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `notification` int(11) NOT NULL DEFAULT '0' COMMENT '0=>No,1=>Yes',
  `email_verification` int(11) DEFAULT NULL COMMENT '0=>''not-verified'',1=>''verified''',
  `DOC` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `first_name`, `last_name`, `country`, `dob`, `gender`, `country_code`, `mobile_no`, `notification`, `email_verification`, `DOC`) VALUES
(1, 'sabitha', 'YxziszPv5DEP05lTvhuEtzKj0ELQyHdW', '$2y$13$QmhHv8rlNYvo8LonuIH2J.jjcmqL5s6l21nK/uGfWRS1tPejK41Wy', NULL, 'sabitha@azryah.com', 1, 1516680719, 1539171525, 'sabitha', 'Varghese', 1, '1993-12-05', 2, NULL, 965685449, 0, 0, NULL),
(4, NULL, 'Yjz26EsQADyN-P3YyAtprjvTOZYRDgTS', '$2y$13$ZRI32TbyLxtvm1mUGVxPvO2VDU7VLKV1Y0Og7ZVcUDqO5QWFepL36', NULL, 'binu@coralepitome.com', 1, 1551946710, 1551946710, 'Binu koshy', NULL, NULL, '2019-03-07', NULL, NULL, 9876543210, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `landmark` varchar(250) NOT NULL,
  `location` varchar(100) NOT NULL,
  `emirate` int(11) NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `country_code` varchar(15) DEFAULT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `name`, `address`, `landmark`, `location`, `emirate`, `post_code`, `country_code`, `mobile_number`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(2, 1, 'Sabitha Varghese', 'Ollangattu Tower', 'Near Kids Asia', 'kakkanad', 2, 682037, '+971', 9645419602, 0, NULL, NULL, NULL, '2018-09-25 04:09:56'),
(4, 2, 'Rency Daniel', 'Alzubadi building', 'AL Nadha park', 'Sharjah ', 5, NULL, '+971', 543679876, 0, 6, 6, '2018-08-21', '2018-09-12 05:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_problem`
--

CREATE TABLE IF NOT EXISTS `user_problem` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `user_id`, `session_id`, `product`, `date`) VALUES
(1, 2, NULL, 2, NULL),
(2, 2, NULL, 6, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_posts`
--
ALTER TABLE `admin_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `fk-admin_users-post_id` (`post_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `cms_customer`
--
ALTER TABLE `cms_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_meta_tags`
--
ALTER TABLE `cms_meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_others`
--
ALTER TABLE `cms_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currency_name` (`currency_name`),
  ADD UNIQUE KEY `currency_symbol` (`currency_symbol`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emirates`
--
ALTER TABLE `emirates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password_tokens`
--
ALTER TABLE `forgot_password_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fregrance`
--
ALTER TABLE `fregrance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `from_our_blog`
--
ALTER TABLE `from_our_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homemanagement_type`
--
ALTER TABLE `homemanagement_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_management`
--
ALTER TABLE `home_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_category` (`main_category`);

--
-- Indexes for table `map_locations`
--
ALTER TABLE `map_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_searchtag_category`
--
ALTER TABLE `master_searchtag_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_search_tag`
--
ALTER TABLE `master_search_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_name` (`tag_name`);

--
-- Indexes for table `menu_management`
--
ALTER TABLE `menu_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_promotions`
--
ALTER TABLE `order_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principals`
--
ALTER TABLE `principals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `canonical_name` (`canonical_name`),
  ADD UNIQUE KEY `item_ean` (`item_ean`),
  ADD KEY `brand` (`brand`),
  ADD KEY `brand_2` (`brand`);

--
-- Indexes for table `product_listing`
--
ALTER TABLE `product_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showrooms`
--
ALTER TABLE `showrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_category` (`sub_category`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_session`
--
ALTER TABLE `temp_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `today_offers`
--
ALTER TABLE `today_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_name` (`unit_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_problem`
--
ALTER TABLE `user_problem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_posts`
--
ALTER TABLE `admin_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_customer`
--
ALTER TABLE `cms_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cms_meta_tags`
--
ALTER TABLE `cms_meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `cms_others`
--
ALTER TABLE `cms_others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `country_code`
--
ALTER TABLE `country_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emirates`
--
ALTER TABLE `emirates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forgot_password_tokens`
--
ALTER TABLE `forgot_password_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `fregrance`
--
ALTER TABLE `fregrance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `from_our_blog`
--
ALTER TABLE `from_our_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `homemanagement_type`
--
ALTER TABLE `homemanagement_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `home_management`
--
ALTER TABLE `home_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `map_locations`
--
ALTER TABLE `map_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_searchtag_category`
--
ALTER TABLE `master_searchtag_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_search_tag`
--
ALTER TABLE `master_search_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `menu_management`
--
ALTER TABLE `menu_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_promotions`
--
ALTER TABLE `order_promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `principals`
--
ALTER TABLE `principals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_listing`
--
ALTER TABLE `product_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `showrooms`
--
ALTER TABLE `showrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp_session`
--
ALTER TABLE `temp_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `today_offers`
--
ALTER TABLE `today_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_problem`
--
ALTER TABLE `user_problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
