-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 05:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cactus`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `city`, `street`, `post_code`, `telephone`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Belgrade', 'Narodnih Heroja 3a', '12345', '381691101221', 2, '2020-03-20 11:05:35', '2020-03-20 12:18:29'),
(3, 'GradIzm', 'Adresa 2Izmen', '54322', '987654322', 2, '2020-03-20 13:17:01', '2020-03-27 13:14:36'),
(4, 'Grad', 'Ulica 51', '11235', '691102354', 5, '2020-07-10 10:50:35', '2020-07-10 10:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `main_cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`, `main_cat_id`) VALUES
(1, 'Clothing', '2020-03-09 18:07:30', '0000-00-00 00:00:00', NULL),
(2, 'Accessories', '2020-03-09 18:07:30', '0000-00-00 00:00:00', NULL),
(3, 'Shirts ', '2020-03-09 18:08:03', '0000-00-00 00:00:00', 1),
(4, 'Jackets', '2020-03-09 18:10:00', '0000-00-00 00:00:00', 1),
(5, 'Coats', '2020-03-09 18:10:00', '0000-00-00 00:00:00', 1),
(6, 'Jeans', '2020-03-09 18:10:38', '0000-00-00 00:00:00', 1),
(7, 'Sweatshirts & Hoodies\r\n', '2020-03-09 18:11:15', '0000-00-00 00:00:00', 1),
(8, 'Shorts', '2020-03-09 18:12:11', '0000-00-00 00:00:00', 1),
(9, 'Dresses', '2020-03-09 18:13:02', '0000-00-00 00:00:00', 1),
(10, 'Playsuits & Jumpsuits ', '2020-03-09 18:13:33', '0000-00-00 00:00:00', 1),
(11, 'Skirts', '2020-03-09 18:15:33', '0000-00-00 00:00:00', 1),
(12, 'Belts', '2020-03-09 18:16:33', '0000-00-00 00:00:00', 2),
(13, 'Jewellery', '2020-03-09 18:16:33', '0000-00-00 00:00:00', 2),
(14, 'Wallets', '2020-03-09 18:17:13', '0000-00-00 00:00:00', 2),
(15, 'Backpacks', '2020-03-09 18:18:29', '0000-00-00 00:00:00', 2),
(16, 'Bags', '2020-03-09 18:20:08', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category_gender`
--

CREATE TABLE `category_gender` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_gender` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_gender`
--

INSERT INTO `category_gender` (`id`, `id_category`, `id_gender`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2020-03-09 19:12:09', '0000-00-00 00:00:00'),
(2, 3, 2, '2020-03-09 19:12:09', '0000-00-00 00:00:00'),
(3, 4, 1, '2020-03-09 19:14:00', '0000-00-00 00:00:00'),
(4, 4, 2, '2020-03-09 19:14:00', '0000-00-00 00:00:00'),
(5, 5, 1, '2020-03-09 19:14:30', '0000-00-00 00:00:00'),
(6, 5, 2, '2020-03-09 19:14:30', '0000-00-00 00:00:00'),
(7, 6, 1, '2020-03-09 19:15:44', '0000-00-00 00:00:00'),
(8, 6, 2, '2020-03-09 19:15:44', '0000-00-00 00:00:00'),
(9, 7, 1, '2020-03-09 19:16:19', '0000-00-00 00:00:00'),
(10, 7, 2, '2020-03-09 19:16:19', '0000-00-00 00:00:00'),
(11, 8, 1, '2020-03-09 19:19:13', '0000-00-00 00:00:00'),
(12, 8, 2, '2020-03-09 19:19:13', '0000-00-00 00:00:00'),
(13, 9, 2, '2020-03-09 19:19:20', '0000-00-00 00:00:00'),
(14, 10, 2, '2020-03-09 19:19:31', '0000-00-00 00:00:00'),
(15, 11, 2, '2020-03-09 19:19:43', '0000-00-00 00:00:00'),
(16, 12, 1, '2020-03-09 19:19:59', '0000-00-00 00:00:00'),
(17, 12, 2, '2020-03-09 19:19:59', '0000-00-00 00:00:00'),
(18, 13, 2, '2020-03-09 19:20:19', '0000-00-00 00:00:00'),
(19, 14, 1, '2020-03-09 19:20:26', '0000-00-00 00:00:00'),
(20, 15, 1, '2020-03-09 19:20:39', '0000-00-00 00:00:00'),
(21, 15, 2, '2020-03-09 19:20:39', '0000-00-00 00:00:00'),
(22, 16, 2, '2020-03-09 19:21:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `col_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `id_col_pic` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `col_name`, `active`, `id_col_pic`, `created_at`, `updated_at`) VALUES
(1, 'NewLife', 1, 72, '2020-03-14 13:26:03', '0000-00-00 00:00:00'),
(2, 'Mickey Mouse', 1, 73, '2020-03-14 13:26:03', '0000-00-00 00:00:00'),
(3, 'Summer 20', 1, 74, '2020-03-14 13:26:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `id_gen_pic` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_name`, `gender_desc`, `id_gen_pic`, `created_at`, `updated_at`) VALUES
(1, 'Men', '\" The men’s section offers much more than fashionable jeans wear for young people \"', 1, '2020-03-15 16:39:15', '0000-00-00 00:00:00'),
(2, 'Women', '\" Cactus\'s public is characterized by adventurous young people, who are aware of the latest trends and are interested in music, social networks and new technologies \"', 2, '2020-03-15 16:39:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`) VALUES
(4, 'marko@gmail.com', '2020-03-27 10:53:54', '2020-03-27 10:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `total_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `processed` tinyint(4) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `total_price`, `processed`, `payment_type`, `created_at`, `updated_at`) VALUES
(8, 2, 2, '160', 1, 'Cash on delivery', '2020-03-21 12:00:36', '2020-03-25 15:04:55'),
(9, 2, 2, '160', 0, 'Cash on delivery', '2020-03-21 12:00:55', '2020-03-21 12:00:55'),
(10, 5, 4, '35', 0, 'Check payments', '2020-07-10 10:52:04', '2020-07-10 10:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `pic_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pic_alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `pic_path`, `pic_alt`, `created_at`, `updated_at`, `active`) VALUES
(1, 'menfashion.jpg', 'Men-fashion', '2020-03-09 17:58:52', '0000-00-00 00:00:00', 1),
(2, 'womenfashion.jpg', 'Women-fashion', '2020-03-09 17:58:52', '0000-00-00 00:00:00', 1),
(3, 'men-shirt-p-1.jpg', 'Men Tropical Shirt', '2020-03-11 17:56:48', '0000-00-00 00:00:00', 1),
(4, 'men-shirt-p-1-v2.jpg', 'Men Tropical Shirt 2', '2020-03-11 17:57:09', '0000-00-00 00:00:00', 1),
(5, 'men-shirt-p-1-v3.jpg', 'Men Tropical Shirt 3', '2020-03-11 17:57:09', '0000-00-00 00:00:00', 1),
(6, 'men-shirt-p-1-v4.jpg', 'Men Tropical Shirt 4', '2020-03-11 17:57:09', '0000-00-00 00:00:00', 1),
(7, 'men-shirt-p-2.jpg', 'Dragon printed shirt', '2020-03-11 18:02:44', '0000-00-00 00:00:00', 1),
(8, 'men-shirt-p-2-v2.jpg', 'Dragon printed shirt', '2020-03-11 18:02:44', '0000-00-00 00:00:00', 1),
(9, 'men-shirt-p-2-v3.jpg', 'Dragon printed shirt', '2020-03-11 18:02:44', '0000-00-00 00:00:00', 1),
(10, 'men-shirt-p-3.jpg', 'Future tshirt', '2020-03-11 18:21:10', '0000-00-00 00:00:00', 1),
(11, 'men-shirt-p-3-v2.jpg', 'Future tshirt', '2020-03-11 18:21:10', '0000-00-00 00:00:00', 1),
(12, 'men-shirt-p-3-v3.jpg', 'Future tshirt', '2020-03-11 18:21:10', '0000-00-00 00:00:00', 1),
(13, 'men-shirt-p-3-v4.jpg', 'Future tshirt', '2020-03-11 18:21:10', '0000-00-00 00:00:00', 1),
(14, 'men-shirt-p-4.jpg', 'Agree Round Neck TShirt', '2020-03-11 18:32:05', '0000-00-00 00:00:00', 1),
(15, 'men-shirt-p-4-v2.jpg', 'Agree Round Neck TShirt', '2020-03-11 18:32:05', '0000-00-00 00:00:00', 1),
(16, 'men-shirt-p-4-v3.jpg', 'Agree Round Neck TShirt', '2020-03-11 18:32:05', '0000-00-00 00:00:00', 1),
(17, 'men-shirt-p-4-v4.jpg', 'Agree Round Neck TShirt', '2020-03-11 18:32:05', '0000-00-00 00:00:00', 1),
(18, 'women-shirt-p-1.jpg', 'Join Life Women TShirt', '2020-03-11 18:39:04', '0000-00-00 00:00:00', 1),
(19, 'women-shirt-p-1-v2.jpg', 'Join Life Women TShirt', '2020-03-11 18:39:04', '0000-00-00 00:00:00', 1),
(20, 'women-shirt-p-1-v3.jpg', 'Join Life Women TShirt', '2020-03-11 18:39:04', '0000-00-00 00:00:00', 1),
(21, 'women-shirt-p-2.jpg', 'Sailor Moon Join Life TShirt', '2020-03-11 18:45:31', '0000-00-00 00:00:00', 1),
(22, 'women-shirt-p-2-v2.jpg', 'Sailor Moon Join Life TShirt', '2020-03-11 18:45:31', '0000-00-00 00:00:00', 1),
(23, 'women-shirt-p-2-v3.jpg', 'Sailor Moon Join Life TShirt', '2020-03-11 18:45:31', '0000-00-00 00:00:00', 1),
(24, 'women-shirt-p-2-v4.jpg', 'Sailor Moon Join Life TShirt', '2020-03-11 18:45:31', '0000-00-00 00:00:00', 1),
(25, 'women-shirt-p-3.jpg', 'Micky Mouse TShirt', '2020-03-11 18:53:35', '0000-00-00 00:00:00', 1),
(26, 'women-shirt-p-3-v2.jpg', 'Micky Mouse TShirt', '2020-03-11 18:53:35', '0000-00-00 00:00:00', 1),
(27, 'women-shirt-p-3-v3.jpg', 'Micky Mouse TShirt', '2020-03-11 18:53:35', '0000-00-00 00:00:00', 1),
(28, 'women-shirt-p-3-v4.jpg', 'Micky Mouse TShirt', '2020-03-11 18:53:35', '0000-00-00 00:00:00', 1),
(29, 'men-jacket-p-1.jpg', 'Micky Mouse Jacket Men', '2020-03-11 19:11:51', '0000-00-00 00:00:00', 1),
(30, 'men-jacket-p-1-v2.jpg', 'Micky Mouse Jacket Men', '2020-03-11 19:13:07', '0000-00-00 00:00:00', 1),
(31, 'men-jacket-p-1-v3.jpg', 'Micky Mouse Jacket Men', '2020-03-11 19:11:51', '0000-00-00 00:00:00', 1),
(32, 'men-jacket-p-2.jpg', 'Reflective White Jacket', '2020-03-11 19:18:12', '0000-00-00 00:00:00', 1),
(33, 'men-jacket-p-2-v2.jpg', 'Reflective White Jacket', '2020-03-11 19:18:12', '0000-00-00 00:00:00', 1),
(34, 'men-jacket-p-2-v3.jpg', 'Reflective White Jacket', '2020-03-11 19:18:12', '0000-00-00 00:00:00', 1),
(35, 'women-jacket-p-1.jpg', 'Women Leather Jacket', '2020-03-11 19:30:14', '0000-00-00 00:00:00', 1),
(36, 'women-jacket-p-1-v2.jpg', 'Women Leather Jacket', '2020-03-11 19:30:14', '0000-00-00 00:00:00', 1),
(37, 'women-jacket-p-1-v3.jpg', 'Women Leather Jacket', '2020-03-11 19:30:14', '0000-00-00 00:00:00', 1),
(38, 'women-jacket-p-1-v4.jpg', 'Women Leather Jacket', '2020-03-11 19:30:14', '0000-00-00 00:00:00', 1),
(39, 'women-jacket-p-2.jpg', 'Mickey Mouse Denim Jacket Women', '2020-03-13 14:17:49', '0000-00-00 00:00:00', 1),
(40, 'women-jacket-p-2-v2.jpg', 'Mickey Mouse Denim Jacket Women', '2020-03-13 14:17:49', '0000-00-00 00:00:00', 1),
(41, 'women-jacket-p-2-v3.jpg', 'Mickey Mouse Denim Jacket Women', '2020-03-13 14:17:49', '0000-00-00 00:00:00', 1),
(42, 'women-jacket-p-2-v4.jpg', 'Mickey Mouse Denim Jacket Women', '2020-03-13 14:17:49', '0000-00-00 00:00:00', 1),
(43, 'men-coat-p-1.jpg', 'Lightweight nylon coat men', '2020-03-13 14:24:12', '0000-00-00 00:00:00', 1),
(44, 'men-coat-p-1-v2.jpg', 'Lightweight nylon coat men', '2020-03-13 14:24:12', '0000-00-00 00:00:00', 1),
(45, 'men-coat-p-1-v3.jpg', 'Lightweight nylon coat men', '2020-03-13 14:24:12', '0000-00-00 00:00:00', 1),
(46, 'men-coat-p-2.jpg', 'Reflective puffer coat Men', '2020-03-13 14:29:05', '0000-00-00 00:00:00', 1),
(47, 'men-coat-p-2-v2.jpg', 'Reflective puffer coat Men', '2020-03-13 14:29:05', '0000-00-00 00:00:00', 1),
(48, 'men-coat-p-2-v3.jpg', 'Reflective puffer coat Men', '2020-03-13 14:29:05', '0000-00-00 00:00:00', 1),
(49, 'women-coat-p-1.jpg', 'Straight fit coat Women', '2020-03-13 14:39:11', '0000-00-00 00:00:00', 1),
(50, 'women-coat-p-1-v2.jpg', 'Straight fit coat Women', '2020-03-13 14:39:11', '0000-00-00 00:00:00', 1),
(51, 'women-coat-p-1-v3.jpg', 'Straight fit coat Women', '2020-03-13 14:39:11', '0000-00-00 00:00:00', 1),
(52, 'women-coat-p-2.jpg', 'Denim trench coat with a round neck and long sleeves.', '2020-03-13 14:47:41', '0000-00-00 00:00:00', 1),
(53, 'women-coat-p-2-v2.jpg', 'Denim trench coat with a round neck and long sleeves.', '2020-03-13 14:47:41', '0000-00-00 00:00:00', 1),
(54, 'women-coat-p-2-v3.jpg', 'Denim trench coat with a round neck and long sleeves.', '2020-03-13 14:47:41', '0000-00-00 00:00:00', 1),
(55, 'women-coat-p-2-v4.jpg', 'Denim trench coat with a round neck and long sleeves.', '2020-03-13 14:47:41', '0000-00-00 00:00:00', 1),
(56, 'men-jeans-p-1.jpg', 'Dragon Ball jeanse Men', '2020-03-13 15:02:25', '0000-00-00 00:00:00', 1),
(57, 'men-jeans-p-1-v2.jpg', 'Dragon Ball jeanse Men', '2020-03-13 15:02:25', '0000-00-00 00:00:00', 1),
(58, 'men-jeans-p-1-v3.jpg', 'Dragon Ball jeanse Men', '2020-03-13 15:02:25', '0000-00-00 00:00:00', 1),
(60, 'men-jeans-p-2.jpg', 'Denim joggers with side pockets', '2020-03-13 15:13:25', '0000-00-00 00:00:00', 1),
(61, 'men-jeans-p-2-v2.jpg', 'Denim joggers with side pockets', '2020-03-13 15:13:25', '0000-00-00 00:00:00', 1),
(62, 'men-jeans-p-2-v3.jpg', 'Denim joggers with side pockets', '2020-03-13 15:13:25', '0000-00-00 00:00:00', 1),
(63, 'men-jeans-p-2-v4.jpg', 'Denim joggers with side pockets', '2020-03-13 15:13:25', '0000-00-00 00:00:00', 1),
(64, 'women-jeans-p-1.jpg', 'Low waist fitted jeans', '2020-03-13 15:27:20', '0000-00-00 00:00:00', 1),
(65, 'women-jeans-p-1-v2.jpg', 'Low waist fitted jeans', '2020-03-13 15:27:20', '0000-00-00 00:00:00', 1),
(66, 'women-jeans-p-1-v3.jpg', 'Low waist fitted jeans', '2020-03-13 15:27:20', '0000-00-00 00:00:00', 1),
(67, 'women-jeans-p-1-v4.jpg', 'Low waist fitted jeans', '2020-03-13 15:27:20', '0000-00-00 00:00:00', 1),
(68, 'women-jeans-p-2.jpg', 'Slim fit ripped jeans Women', '2020-03-13 15:34:23', '0000-00-00 00:00:00', 1),
(69, 'women-jeans-p-2-v2.jpg', 'Slim fit ripped jeans Women', '2020-03-13 15:34:23', '0000-00-00 00:00:00', 1),
(70, 'women-jeans-p-2-v3.jpg', 'Slim fit ripped jeans Women', '2020-03-13 15:34:23', '0000-00-00 00:00:00', 1),
(71, 'women-jeans-p-2-v4.jpg', 'Slim fit ripped jeans Women', '2020-03-13 15:34:23', '0000-00-00 00:00:00', 1),
(72, 'newlife-collection.jpg', 'NewLife Collection', '2020-03-14 13:25:30', '0000-00-00 00:00:00', 1),
(73, 'mickey-collection.jpg', 'Mickey Mouse New Collection', '2020-03-14 13:25:30', '0000-00-00 00:00:00', 1),
(74, 'summer-collection.jpg', 'Summer Vibes Collection', '2020-03-14 13:25:30', '0000-00-00 00:00:00', 1),
(75, 'women-skirt-p-1.jpg', 'NewLife paperbag skirt', '2020-03-14 14:02:49', '0000-00-00 00:00:00', 1),
(76, 'women-skirt-p-1-v2.jpg', 'NewLife paperbag skirt', '2020-03-14 14:02:49', '0000-00-00 00:00:00', 1),
(77, 'women-skirt-p-1-v3.jpg', 'NewLife paperbag skirt', '2020-03-14 14:02:49', '0000-00-00 00:00:00', 1),
(78, 'women-jeans-p-3.jpg', 'Mickey MOuse Ballon Jeans', '2020-03-14 14:42:58', '0000-00-00 00:00:00', 1),
(79, 'women-jeans-p-3-v2.jpg', 'Mickey MOuse Ballon Jeans', '2020-03-14 14:42:58', '0000-00-00 00:00:00', 1),
(80, 'women-jeans-p-3-v3.jpg', 'Mickey MOuse Ballon Jeans', '2020-03-14 14:42:58', '0000-00-00 00:00:00', 1),
(81, 'women-jeans-p-3-v4.jpg', 'Mickey MOuse Ballon Jeans', '2020-03-14 14:42:58', '0000-00-00 00:00:00', 1),
(85, '1585225115_women-dress-p-1.jpg', 'Printed baby-doll dress', '2020-03-26 11:18:35', '2020-03-26 11:18:35', 1),
(86, '1585225115_women-dress-p-2.jpg', 'Printed baby-doll dress', '2020-03-26 11:18:35', '2020-03-26 11:18:35', 1),
(87, '1585225115_women-dress-p-3.jpg', 'Printed baby-doll dress', '2020-03-26 11:18:35', '2020-03-26 11:18:35', 1),
(88, '1585225115_women-dress-p-4.jpg', 'Printed baby-doll dress', '2020-03-26 11:18:35', '2020-03-26 11:18:35', 1),
(95, '1585307027_women-tshirt-p1.jpg', 'New Life Yoda Tshirt', '2020-03-27 10:03:47', '2020-03-27 10:03:47', 1),
(96, '1585307027_women-tshirt-p2.jpg', 'New Life Yoda Tshirt', '2020-03-27 10:03:47', '2020-03-27 10:03:47', 1),
(97, '1585307027_women-tshirt-p3.jpg', 'New Life Yoda Tshirt', '2020-03-27 10:03:47', '2020-03-27 10:03:47', 1),
(98, '1585307027_women-tshirt-p4.jpg', 'New Life Yoda Tshirt', '2020-03-27 10:03:47', '2020-03-27 10:03:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `prices_sale` int(11) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `prices_sale`, `active`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 35, NULL, 1, 1, '2020-03-13 16:07:33', '0000-00-00 00:00:00'),
(2, 35, 25, 1, 2, '2020-03-13 16:07:33', '0000-00-00 00:00:00'),
(3, 40, NULL, 1, 3, '2020-03-13 16:08:14', '0000-00-00 00:00:00'),
(4, 35, 20, 1, 4, '2020-03-13 16:08:14', '0000-00-00 00:00:00'),
(5, 40, NULL, 1, 5, '2020-03-13 16:09:20', '0000-00-00 00:00:00'),
(6, 40, NULL, 1, 6, '2020-03-13 16:09:20', '0000-00-00 00:00:00'),
(7, 50, 30, 1, 7, '2020-03-13 16:09:40', '0000-00-00 00:00:00'),
(8, 80, 60, 1, 8, '2020-03-13 16:10:01', '0000-00-00 00:00:00'),
(9, 100, NULL, 1, 9, '2020-03-13 16:10:29', '0000-00-00 00:00:00'),
(10, 70, NULL, 1, 10, '2020-03-13 16:10:29', '0000-00-00 00:00:00'),
(11, 80, 60, 1, 11, '2020-03-13 16:11:01', '0000-00-00 00:00:00'),
(12, 100, NULL, 1, 12, '2020-03-13 16:11:01', '0000-00-00 00:00:00'),
(13, 130, 100, 1, 13, '2020-03-13 16:11:30', '0000-00-00 00:00:00'),
(14, 120, 100, 1, 14, '2020-03-13 16:11:30', '0000-00-00 00:00:00'),
(15, 150, 120, 1, 15, '2020-03-13 16:12:04', '0000-00-00 00:00:00'),
(16, 60, NULL, 1, 16, '2020-03-13 16:12:04', '0000-00-00 00:00:00'),
(17, 60, NULL, 1, 17, '2020-03-13 16:12:52', '0000-00-00 00:00:00'),
(18, 60, NULL, 1, 18, '2020-03-13 16:12:52', '0000-00-00 00:00:00'),
(19, 70, NULL, 1, 19, '2020-03-13 16:12:52', '0000-00-00 00:00:00'),
(20, 60, 40, 1, 20, '2020-03-14 14:04:32', '0000-00-00 00:00:00'),
(21, 90, 70, 1, 21, '2020-03-14 15:18:22', '0000-00-00 00:00:00'),
(23, 70, NULL, 1, 25, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(26, 50, NULL, 1, 27, '2020-07-10 14:53:21', '2020-07-10 12:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `pro_new` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_desc`, `featured`, `pro_new`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Tropical Printed shirt', 'COMPOSITION:\r\nExterior\r\n\r\n100% viscose .\r\nCARE:\r\nMACHINE WASH UP TO 30ºC/86ºF GENTLE CYCLE\r\nDO NOT BLEACH\r\nIRON UP TO 110ºC/230ºF\r\nDO NOT DRY CLEAN\r\nDO NOT TUMBLE DRY', 1, 1, 1, '2020-03-17 14:21:10', '0000-00-00 00:00:00'),
(2, 'Dragon Printed shirt', 'Product information\r\nCOMPOSITION:\r\nExterior\r\n\r\n100% viscose.\r\nCARE:\r\nMACHINE WASH UP TO 30ºC/86ºF GENTLE CYCLE\r\nDO NOT BLEACH\r\nIRON UP TO150ºC/302ºF\r\nDRY CLEAN TETRACHLORETHYLENE\r\nDO NOT TUMBLE DRY', 0, 0, 1, '2020-03-17 14:21:23', '0000-00-00 00:00:00'),
(3, '\"NewLife\" Future t-shirt', 'Product information\r\nCOMPOSITION:\r\nExterior\r\n\r\n100% cotton.\r\nCARE:\r\nMACHINE WASH UP TO 30ºC/86ºF GENTLE CYCLE\r\nDO NOT BLEACH\r\nIRON UP TO 110ºC/230ºF\r\nDO NOT DRY CLEAN\r\nDO NOT TUMBLE DRY\r\nWASH INSIDE OUT\r\nIRON INSIDE OUT', 1, 0, 1, '2020-03-17 14:21:32', '0000-00-00 00:00:00'),
(4, 'Round neck T-shirt', 'Product information\r\nCOMPOSITION:\r\nExterior\r\n\r\n100% cotton.\r\nCARE:\r\nMACHINE WASH UP TO 30ºC/86ºF GENTLE CYCLE\r\nDO NOT BLEACH\r\nIRON UP TO 110ºC/230ºF\r\nDRY CLEAN TETRACHLORETHYLENE\r\nTUMBLE DRY LOW', 0, 1, 1, '2020-03-17 14:21:39', '0000-00-00 00:00:00'),
(5, '\"NewLife\" T-shirt', 'NewLife Care for fibre: 100% ecologically grown cotton. Ecologically grown cotton is produced using practices that help us to protect biodiversity, such as crop rotation and the use of natural fertilisers.', 1, 1, 1, '2020-03-14 13:59:39', '0000-00-00 00:00:00'),
(6, 'Sailor Moon T-shirt', 'NewLife Care for fibre: at least 50% ecologically grown cotton. Ecologically grown cotton is produced using practices that help us to protect biodiversity, such as crop rotation and the use of natural fertilisers.', 1, 1, 1, '2020-03-14 14:00:16', '0000-00-00 00:00:00'),
(7, '“Mickey Mouse” T-shirt', 'NewLife Care for fibre: 100% ecologically grown cotton. Ecologically grown cotton is produced using practices that help us to protect biodiversity, such as crop rotation and the use of natural fertilisers.', 1, 1, 1, '2020-03-14 14:00:16', '0000-00-00 00:00:00'),
(8, '“Mickey Mouse” Denim jacket', 'Collared denim jacket with long sleeves and buttoned cuffs. Featuring a regular fit, two chest flap pockets, two waist pockets, distressed trims and metal button fastening in the front.', 1, 1, 1, '2020-03-14 12:25:04', '0000-00-00 00:00:00'),
(9, 'Reflective White jacket', 'Jacket with an adjustable hood, reflective detail on the chest and back, two flap pockets at the chest with metal fastening and two zip pockets on the front. Featuring adjustable elastic cuffs and hem and central zip fastening covered by a placket.', 0, 0, 1, '2020-03-11 19:16:07', '0000-00-00 00:00:00'),
(10, 'Faux leather jacket', 'Cropped faux leather biker jacket with a lapel collar. Featuring front zip pockets, a matching fabric belt with a metal buckle at the hem and asymmetric front zip fastening.', 1, 1, 1, '2020-03-11 19:25:24', '0000-00-00 00:00:00'),
(11, '“Mickey Mouse” Denim jacket Women', 'Collared denim jacket with long sleeves and buttoned cuffs. Featuring a regular fit, two chest flap pockets, two waist pockets, distressed trims and metal button fastening in the front.', 0, 0, 1, '2020-03-14 12:25:20', '0000-00-00 00:00:00'),
(12, 'Lightweight nylon coat', 'Long lightweight coat with adjustable hood. Features printed detail on the front and back. Adjustable drawstring waistband, front pockets with an angled flap and central zip fastening.', 1, 1, 1, '2020-03-13 14:27:11', '0000-00-00 00:00:00'),
(13, 'Reflective puffer coat', 'Long reflective puffer coat with adjustable drawstrings on the hood, an adjustable tab at the top, two front pockets, chest welt pockets, a fleece-lined flap pocket at the hip, sleeves with ribbed cuffs and a label detail, a contrast inner placket, printed lining and two-way front zip fastening.', 1, 1, 1, '2020-03-13 14:27:00', '0000-00-00 00:00:00'),
(14, 'Straight fit coat', 'Product information\r\nCOMPOSITION:\r\nExterior\r\n\r\n52% polyester\r\n\r\n34% acrylic\r\n\r\n9% polyamide\r\n\r\n5% wool\r\n\r\n0% other fibres\r\nLining\r\n\r\n100% polyester\r\nCARE:\r\nDO NOT WASH\r\nDO NOT BLEACH\r\nIRON UP TO 110ºC/230ºF\r\nDRY CLEAN TETRACHLORETHYLENE\r\nDO NOT TUMBLE DRY', 0, 0, 1, '2020-03-13 14:37:45', '0000-00-00 00:00:00'),
(15, 'Long Denim coat', 'Denim trench coat with a round neck and long sleeves. Featuring an adjustable plush hood, elastic cuffs, two pockets, front zip fastening and an adjustable drawstring waist.', 1, 1, 1, '2020-03-14 12:26:07', '0000-00-00 00:00:00'),
(16, 'Dragon Ball fit jeans', 'Faded low waist denim jeans with a five-pocket design. Featuring a loose fit, wide legs that taper at the ankles and a button and concealed zip fastening at the front.\r\n\r\nJOIN LIFE Care for fibre: at least 15% recycled cotton. Producing recycled fabrics has a lower environmental impact, it consumes less water, less energy and fewer natural resources.', 0, 0, 1, '2020-03-13 14:57:06', '0000-00-00 00:00:00'),
(17, 'Jogger jeans', 'Denim joggers with side pockets, elasticated hems and zip fly and top button fastening.\r\n\r\nJOIN LIFE Care for fibre: at least 50% ecologically grown cotton. Ecologically grown cotton is produced using practices that help us to protect biodiversity, such as crop rotation and the use of natural fertilisers.', 0, 1, 1, '2020-03-13 15:11:05', '0000-00-00 00:00:00'),
(18, '\"NewLife\" Skinny jeans', 'Low waist fitted jeans in stretch fabric with a 5-pocket design, rips on the front, frayed hems and zip fly and metal top button fastening.\r\n\r\nNewLife Care for fibre: at least 15% recycled cotton. Producing recycled fabrics has a lower environmental impact; it consumes less water, less energy and fewer natural resources.', 1, 1, 1, '2020-03-14 14:00:16', '0000-00-00 00:00:00'),
(19, '\"NewLife\" Slim fit ripped jeans', 'Jeans with 5 pockets, belt loops and a slim fit. Zip fly and metal button front fastening. Featuring rips and frayed hems.\r\n\r\nNewLife Care for fibre: at least 15% recycled cotton. Producing recycled fabrics has a lower environmental impact; it consumes less water, less energy and fewer natural resources.', 0, 1, 1, '2020-03-14 14:00:16', '0000-00-00 00:00:00'),
(20, '\"NewLife\" Paperbag skirt', 'NewLife Care for fibre: at least 50% ecologically grown cotton. Ecologically grown cotton is produced using practices that help us to protect biodiversity, such as crop rotation and the use of natural fertilisers.', 0, 0, 1, '2020-03-14 14:32:35', '0000-00-00 00:00:00'),
(21, '“Mickey Mouse” Balloon jeans', 'High waist Balloon Fit trousers featuring darts, two front pockets and zip fly and top button fastening.', 0, 1, 1, '2020-03-14 14:40:44', '0000-00-00 00:00:00'),
(25, 'Printed baby-doll dress', 'Short dress with a round neckline, 3/4 puff sleeves and a voluminous hem.', 0, 1, 1, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(27, '\"NewLife\" Yoda T-shirt', 'NEWLIFE Care for fibre: at least 50% ecologically grown cotton. Ecologically grown cotton is produced using practices that help us to protect biodiversity, such as crop rotation and the use of natural fertilisers.', 0, 0, 1, '2020-03-27 10:03:47', '2020-07-10 12:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `id_product`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-03-11 17:55:00', '0000-00-00 00:00:00'),
(2, 2, 1, '2020-03-11 18:18:51', '0000-00-00 00:00:00'),
(3, 3, 1, '2020-03-11 18:19:00', '0000-00-00 00:00:00'),
(4, 4, 1, '2020-03-11 18:29:48', '0000-00-00 00:00:00'),
(5, 5, 2, '2020-03-11 18:35:29', '0000-00-00 00:00:00'),
(6, 6, 2, '2020-03-11 19:05:28', '0000-00-00 00:00:00'),
(7, 7, 2, '2020-03-11 19:05:28', '0000-00-00 00:00:00'),
(8, 8, 3, '2020-03-11 19:08:55', '0000-00-00 00:00:00'),
(9, 9, 3, '2020-03-11 19:16:42', '0000-00-00 00:00:00'),
(10, 10, 4, '2020-03-11 19:26:10', '0000-00-00 00:00:00'),
(11, 11, 4, '2020-03-13 14:15:42', '0000-00-00 00:00:00'),
(12, 12, 5, '2020-03-13 14:22:55', '0000-00-00 00:00:00'),
(13, 13, 5, '2020-03-13 14:27:41', '0000-00-00 00:00:00'),
(14, 14, 6, '2020-03-13 14:43:30', '0000-00-00 00:00:00'),
(15, 15, 6, '2020-03-13 14:45:42', '0000-00-00 00:00:00'),
(16, 16, 7, '2020-03-13 15:00:23', '0000-00-00 00:00:00'),
(17, 17, 7, '2020-03-13 15:16:18', '0000-00-00 00:00:00'),
(18, 18, 8, '2020-03-13 15:25:15', '0000-00-00 00:00:00'),
(19, 19, 8, '2020-03-13 15:32:22', '0000-00-00 00:00:00'),
(20, 20, 15, '2020-03-14 14:00:44', '0000-00-00 00:00:00'),
(21, 21, 8, '2020-03-14 14:41:03', '0000-00-00 00:00:00'),
(23, 25, 13, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(32, 27, 2, '2020-07-10 12:53:21', '2020-07-10 12:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `products_collections`
--

CREATE TABLE `products_collections` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_collection` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_collections`
--

INSERT INTO `products_collections` (`id`, `id_product`, `id_collection`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2020-03-23 10:56:32', '0000-00-00 00:00:00'),
(2, 20, 1, '2020-03-23 10:56:32', '0000-00-00 00:00:00'),
(3, 18, 1, '2020-03-23 10:56:32', '0000-00-00 00:00:00'),
(4, 19, 1, '2020-03-23 10:56:32', '0000-00-00 00:00:00'),
(5, 5, 1, '2020-03-23 10:56:32', '0000-00-00 00:00:00'),
(6, 21, 2, '2020-03-23 10:57:23', '0000-00-00 00:00:00'),
(7, 8, 2, '2020-03-23 10:57:23', '0000-00-00 00:00:00'),
(8, 11, 2, '2020-03-23 10:57:23', '0000-00-00 00:00:00'),
(9, 7, 2, '2020-03-23 10:57:23', '0000-00-00 00:00:00'),
(10, 1, 3, '2020-03-23 10:58:59', '0000-00-00 00:00:00'),
(11, 2, 3, '2020-03-23 10:58:59', '0000-00-00 00:00:00'),
(12, 4, 3, '2020-03-23 10:58:59', '0000-00-00 00:00:00'),
(13, 17, 3, '2020-03-23 10:58:59', '0000-00-00 00:00:00'),
(14, 16, 3, '2020-03-23 10:58:59', '0000-00-00 00:00:00'),
(15, 10, 3, '2020-03-23 10:58:59', '0000-00-00 00:00:00'),
(20, 25, 3, '2020-03-26 11:36:35', '2020-03-26 11:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `products_pictures`
--

CREATE TABLE `products_pictures` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_pictures` int(11) NOT NULL,
  `main` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_pictures`
--

INSERT INTO `products_pictures` (`id`, `id_products`, `id_pictures`, `main`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '2020-03-11 17:58:33', '0000-00-00 00:00:00'),
(2, 1, 4, 0, '2020-03-11 17:57:55', '0000-00-00 00:00:00'),
(3, 1, 5, 0, '2020-03-11 17:57:55', '0000-00-00 00:00:00'),
(4, 1, 6, 0, '2020-03-11 17:57:55', '0000-00-00 00:00:00'),
(5, 2, 7, 1, '2020-03-11 18:04:03', '0000-00-00 00:00:00'),
(6, 2, 8, 0, '2020-03-11 18:04:03', '0000-00-00 00:00:00'),
(7, 2, 9, 0, '2020-03-11 18:04:03', '0000-00-00 00:00:00'),
(8, 3, 10, 1, '2020-03-11 18:23:48', '0000-00-00 00:00:00'),
(9, 3, 11, 0, '2020-03-11 18:23:48', '0000-00-00 00:00:00'),
(10, 3, 12, 0, '2020-03-11 18:23:48', '0000-00-00 00:00:00'),
(11, 3, 13, 0, '2020-03-11 18:23:48', '0000-00-00 00:00:00'),
(12, 4, 14, 1, '2020-03-11 18:32:54', '0000-00-00 00:00:00'),
(13, 4, 15, 0, '2020-03-11 18:32:54', '0000-00-00 00:00:00'),
(14, 4, 16, 0, '2020-03-11 18:32:54', '0000-00-00 00:00:00'),
(15, 4, 17, 0, '2020-03-11 18:32:54', '0000-00-00 00:00:00'),
(16, 5, 18, 1, '2020-03-11 18:39:43', '0000-00-00 00:00:00'),
(17, 5, 19, 0, '2020-03-11 18:39:43', '0000-00-00 00:00:00'),
(18, 5, 20, 0, '2020-03-11 18:39:43', '0000-00-00 00:00:00'),
(19, 6, 21, 1, '2020-03-11 18:46:34', '0000-00-00 00:00:00'),
(20, 6, 22, 0, '2020-03-11 18:46:34', '0000-00-00 00:00:00'),
(21, 6, 23, 0, '2020-03-11 18:46:34', '0000-00-00 00:00:00'),
(22, 6, 24, 0, '2020-03-11 18:46:34', '0000-00-00 00:00:00'),
(23, 7, 25, 1, '2020-03-11 18:54:36', '0000-00-00 00:00:00'),
(24, 7, 26, 0, '2020-03-11 18:54:36', '0000-00-00 00:00:00'),
(25, 7, 27, 0, '2020-03-11 18:54:36', '0000-00-00 00:00:00'),
(26, 7, 28, 0, '2020-03-11 18:54:36', '0000-00-00 00:00:00'),
(27, 8, 29, 1, '2020-03-11 19:12:45', '0000-00-00 00:00:00'),
(28, 8, 30, 0, '2020-03-11 19:12:45', '0000-00-00 00:00:00'),
(29, 8, 31, 0, '2020-03-11 19:12:45', '0000-00-00 00:00:00'),
(30, 9, 32, 1, '2020-03-11 19:19:16', '0000-00-00 00:00:00'),
(31, 9, 33, 0, '2020-03-11 19:19:16', '0000-00-00 00:00:00'),
(32, 9, 34, 0, '2020-03-11 19:19:16', '0000-00-00 00:00:00'),
(33, 10, 35, 1, '2020-03-11 19:32:01', '0000-00-00 00:00:00'),
(34, 10, 36, 0, '2020-03-11 19:32:01', '0000-00-00 00:00:00'),
(35, 10, 37, 0, '2020-03-11 19:32:01', '0000-00-00 00:00:00'),
(36, 10, 38, 0, '2020-03-11 19:32:01', '0000-00-00 00:00:00'),
(37, 11, 39, 1, '2020-03-13 14:19:05', '0000-00-00 00:00:00'),
(38, 11, 40, 0, '2020-03-13 14:19:05', '0000-00-00 00:00:00'),
(39, 11, 41, 0, '2020-03-13 14:19:05', '0000-00-00 00:00:00'),
(40, 11, 42, 0, '2020-03-13 14:19:05', '0000-00-00 00:00:00'),
(41, 12, 43, 1, '2020-03-13 14:24:54', '0000-00-00 00:00:00'),
(42, 12, 44, 0, '2020-03-13 14:24:54', '0000-00-00 00:00:00'),
(43, 12, 45, 0, '2020-03-13 14:24:54', '0000-00-00 00:00:00'),
(44, 13, 46, 1, '2020-03-13 14:31:04', '0000-00-00 00:00:00'),
(45, 13, 47, 0, '2020-03-13 14:31:04', '0000-00-00 00:00:00'),
(46, 13, 48, 0, '2020-03-13 14:31:04', '0000-00-00 00:00:00'),
(47, 14, 49, 1, '2020-03-13 14:40:04', '0000-00-00 00:00:00'),
(48, 14, 50, 0, '2020-03-13 14:40:04', '0000-00-00 00:00:00'),
(49, 14, 51, 0, '2020-03-13 14:40:04', '0000-00-00 00:00:00'),
(50, 15, 52, 1, '2020-03-13 14:55:11', '0000-00-00 00:00:00'),
(51, 15, 53, 0, '2020-03-13 14:55:11', '0000-00-00 00:00:00'),
(52, 15, 54, 0, '2020-03-13 14:55:11', '0000-00-00 00:00:00'),
(53, 15, 55, 0, '2020-03-13 14:55:11', '0000-00-00 00:00:00'),
(54, 16, 56, 1, '2020-03-13 15:04:47', '0000-00-00 00:00:00'),
(55, 16, 57, 0, '2020-03-13 15:04:47', '0000-00-00 00:00:00'),
(56, 16, 58, 0, '2020-03-13 15:04:47', '0000-00-00 00:00:00'),
(57, 17, 60, 1, '2020-03-13 15:16:07', '0000-00-00 00:00:00'),
(58, 17, 61, 0, '2020-03-13 15:16:07', '0000-00-00 00:00:00'),
(59, 17, 62, 0, '2020-03-13 15:16:07', '0000-00-00 00:00:00'),
(60, 17, 63, 0, '2020-03-13 15:16:07', '0000-00-00 00:00:00'),
(61, 18, 64, 1, '2020-03-13 15:30:06', '0000-00-00 00:00:00'),
(62, 18, 65, 0, '2020-03-13 15:30:06', '0000-00-00 00:00:00'),
(63, 18, 66, 0, '2020-03-13 15:30:06', '0000-00-00 00:00:00'),
(64, 18, 67, 0, '2020-03-13 15:30:06', '0000-00-00 00:00:00'),
(65, 19, 68, 1, '2020-03-13 15:38:49', '0000-00-00 00:00:00'),
(66, 19, 69, 0, '2020-03-13 15:38:49', '0000-00-00 00:00:00'),
(67, 19, 70, 0, '2020-03-13 15:38:49', '0000-00-00 00:00:00'),
(68, 19, 70, 0, '2020-03-13 15:38:49', '0000-00-00 00:00:00'),
(69, 20, 75, 1, '2020-03-14 14:03:38', '0000-00-00 00:00:00'),
(70, 20, 76, 0, '2020-03-14 14:03:38', '0000-00-00 00:00:00'),
(71, 20, 77, 0, '2020-03-14 14:03:38', '0000-00-00 00:00:00'),
(72, 21, 78, 1, '2020-03-14 14:43:42', '0000-00-00 00:00:00'),
(73, 21, 79, 0, '2020-03-14 14:43:42', '0000-00-00 00:00:00'),
(74, 21, 80, 0, '2020-03-14 14:43:42', '0000-00-00 00:00:00'),
(75, 21, 81, 0, '2020-03-26 15:33:13', '0000-00-00 00:00:00'),
(76, 25, 85, 1, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(77, 25, 86, 0, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(78, 25, 87, 0, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(79, 25, 88, 0, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(86, 27, 95, 1, '2020-03-27 10:03:47', '2020-03-27 10:03:47'),
(87, 27, 96, 0, '2020-03-27 10:03:47', '2020-03-27 10:03:47'),
(88, 27, 97, 0, '2020-03-27 10:03:47', '2020-03-27 10:03:47'),
(89, 27, 98, 0, '2020-03-27 10:03:47', '2020-03-27 10:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `products_sizes`
--

CREATE TABLE `products_sizes` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `id_product`, `id_size`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2020-03-11 18:14:06', '0000-00-00 00:00:00'),
(2, 1, 3, '2020-03-11 18:14:06', '0000-00-00 00:00:00'),
(3, 1, 4, '2020-03-11 18:14:06', '0000-00-00 00:00:00'),
(4, 2, 1, '2020-03-11 18:14:41', '0000-00-00 00:00:00'),
(5, 2, 3, '2020-03-11 18:14:41', '0000-00-00 00:00:00'),
(6, 2, 4, '2020-03-11 18:14:41', '0000-00-00 00:00:00'),
(7, 2, 5, '2020-03-11 18:14:41', '0000-00-00 00:00:00'),
(8, 3, 2, '2020-03-11 18:26:11', '0000-00-00 00:00:00'),
(9, 3, 3, '2020-03-11 18:26:11', '0000-00-00 00:00:00'),
(10, 3, 4, '2020-03-11 18:26:11', '0000-00-00 00:00:00'),
(11, 5, 1, '2020-03-11 18:42:36', '0000-00-00 00:00:00'),
(12, 5, 2, '2020-03-11 18:42:36', '0000-00-00 00:00:00'),
(13, 5, 3, '2020-03-11 18:42:36', '0000-00-00 00:00:00'),
(14, 6, 1, '2020-03-11 19:07:21', '0000-00-00 00:00:00'),
(15, 6, 2, '2020-03-11 19:07:21', '0000-00-00 00:00:00'),
(16, 6, 3, '2020-03-11 19:07:21', '0000-00-00 00:00:00'),
(17, 7, 1, '2020-03-11 19:07:52', '0000-00-00 00:00:00'),
(18, 7, 3, '2020-03-11 19:07:52', '0000-00-00 00:00:00'),
(19, 7, 4, '2020-03-11 19:07:52', '0000-00-00 00:00:00'),
(20, 8, 3, '2020-03-11 19:13:26', '0000-00-00 00:00:00'),
(21, 8, 4, '2020-03-11 19:13:26', '0000-00-00 00:00:00'),
(22, 9, 2, '2020-03-11 19:20:56', '0000-00-00 00:00:00'),
(23, 9, 3, '2020-03-11 19:20:56', '0000-00-00 00:00:00'),
(24, 9, 5, '2020-03-11 19:20:56', '0000-00-00 00:00:00'),
(25, 10, 2, '2020-03-11 19:32:19', '0000-00-00 00:00:00'),
(26, 10, 3, '2020-03-11 19:32:19', '0000-00-00 00:00:00'),
(27, 11, 2, '2020-03-13 14:20:13', '0000-00-00 00:00:00'),
(28, 11, 3, '2020-03-13 14:20:13', '0000-00-00 00:00:00'),
(29, 11, 4, '2020-03-13 14:20:13', '0000-00-00 00:00:00'),
(30, 12, 3, '2020-03-13 14:25:26', '0000-00-00 00:00:00'),
(31, 12, 4, '2020-03-13 14:25:26', '0000-00-00 00:00:00'),
(32, 13, 3, '2020-03-13 14:31:48', '0000-00-00 00:00:00'),
(33, 13, 4, '2020-03-13 14:31:48', '0000-00-00 00:00:00'),
(34, 13, 5, '2020-03-13 14:31:48', '0000-00-00 00:00:00'),
(35, 14, 2, '2020-03-13 14:40:35', '0000-00-00 00:00:00'),
(36, 14, 3, '2020-03-13 14:40:35', '0000-00-00 00:00:00'),
(37, 14, 4, '2020-03-13 14:40:35', '0000-00-00 00:00:00'),
(38, 15, 2, '2020-03-13 14:55:40', '0000-00-00 00:00:00'),
(39, 15, 3, '2020-03-13 14:55:40', '0000-00-00 00:00:00'),
(40, 15, 4, '2020-03-13 14:55:40', '0000-00-00 00:00:00'),
(41, 16, 2, '2020-03-13 15:05:33', '0000-00-00 00:00:00'),
(42, 16, 3, '2020-03-13 15:05:33', '0000-00-00 00:00:00'),
(43, 16, 4, '2020-03-13 15:05:33', '0000-00-00 00:00:00'),
(44, 17, 2, '2020-03-13 15:17:08', '0000-00-00 00:00:00'),
(45, 17, 3, '2020-03-13 15:17:08', '0000-00-00 00:00:00'),
(46, 17, 4, '2020-03-13 15:17:08', '0000-00-00 00:00:00'),
(47, 18, 2, '2020-03-13 15:30:25', '0000-00-00 00:00:00'),
(48, 18, 3, '2020-03-13 15:30:25', '0000-00-00 00:00:00'),
(49, 19, 2, '2020-03-13 15:39:07', '0000-00-00 00:00:00'),
(50, 19, 3, '2020-03-13 15:39:07', '0000-00-00 00:00:00'),
(51, 20, 2, '2020-03-14 14:03:54', '0000-00-00 00:00:00'),
(52, 20, 3, '2020-03-14 14:03:54', '0000-00-00 00:00:00'),
(53, 21, 2, '2020-03-14 14:44:02', '0000-00-00 00:00:00'),
(54, 21, 3, '2020-03-14 14:44:02', '0000-00-00 00:00:00'),
(55, 21, 4, '2020-03-14 14:44:02', '0000-00-00 00:00:00'),
(61, 25, 1, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(62, 25, 2, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(63, 25, 3, '2020-03-26 11:18:35', '2020-03-26 11:18:35'),
(87, 27, 2, '2020-07-10 12:53:21', '2020-07-10 12:53:21'),
(88, 27, 3, '2020-07-10 12:53:21', '2020-07-10 12:53:21'),
(89, 27, 4, '2020-07-10 12:53:21', '2020-07-10 12:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pro_total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `id_product`, `id_order`, `quantity`, `size`, `pro_total_price`, `created_at`, `updated_at`) VALUES
(4, 7, 8, 2, 'xs', 60, '2020-03-21 12:00:36', '2020-03-21 12:00:36'),
(5, 7, 8, 1, 'l', 30, '2020-03-21 12:00:36', '2020-03-21 12:00:36'),
(6, 19, 8, 1, 's', 70, '2020-03-21 12:00:36', '2020-03-21 12:00:36'),
(7, 7, 9, 2, 'xs', 60, '2020-03-21 12:00:55', '2020-03-21 12:00:55'),
(8, 7, 9, 1, 'l', 30, '2020-03-21 12:00:55', '2020-03-21 12:00:55'),
(9, 19, 9, 1, 's', 70, '2020-03-21 12:00:55', '2020-03-21 12:00:55'),
(10, 1, 10, 1, 's', 35, '2020-07-10 10:52:04', '2020-07-10 10:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_tags` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `id_product`, `id_tags`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2020-03-14 11:22:44', '0000-00-00 00:00:00'),
(2, 1, 7, '2020-03-14 11:22:44', '0000-00-00 00:00:00'),
(4, 1, 8, '2020-03-14 11:25:10', '0000-00-00 00:00:00'),
(5, 2, 3, '2020-03-14 11:25:41', '0000-00-00 00:00:00'),
(6, 2, 6, '2020-03-14 11:25:41', '0000-00-00 00:00:00'),
(7, 2, 7, '2020-03-14 11:25:41', '0000-00-00 00:00:00'),
(8, 3, 3, '2020-03-14 11:26:02', '0000-00-00 00:00:00'),
(9, 3, 8, '2020-03-14 11:26:02', '0000-00-00 00:00:00'),
(10, 4, 3, '2020-03-14 11:26:18', '0000-00-00 00:00:00'),
(11, 4, 7, '2020-03-14 11:26:18', '0000-00-00 00:00:00'),
(12, 5, 5, '2020-03-14 11:27:16', '0000-00-00 00:00:00'),
(13, 5, 6, '2020-03-14 11:27:16', '0000-00-00 00:00:00'),
(14, 5, 7, '2020-03-14 11:27:16', '0000-00-00 00:00:00'),
(15, 6, 4, '2020-03-14 11:29:35', '0000-00-00 00:00:00'),
(16, 6, 8, '2020-03-14 11:29:35', '0000-00-00 00:00:00'),
(17, 7, 7, '2020-03-14 11:30:05', '0000-00-00 00:00:00'),
(18, 7, 5, '2020-03-14 11:30:05', '0000-00-00 00:00:00'),
(19, 7, 9, '2020-03-14 11:30:05', '0000-00-00 00:00:00'),
(20, 8, 3, '2020-03-14 11:31:19', '0000-00-00 00:00:00'),
(21, 8, 1, '2020-03-14 11:31:19', '0000-00-00 00:00:00'),
(22, 8, 6, '2020-03-14 11:31:19', '0000-00-00 00:00:00'),
(23, 8, 4, '2020-03-14 11:31:19', '0000-00-00 00:00:00'),
(24, 9, 3, '2020-03-14 11:31:46', '0000-00-00 00:00:00'),
(25, 9, 1, '2020-03-14 11:31:46', '0000-00-00 00:00:00'),
(26, 9, 9, '2020-03-14 11:31:46', '0000-00-00 00:00:00'),
(27, 10, 5, '2020-03-14 11:32:24', '0000-00-00 00:00:00'),
(28, 10, 9, '2020-03-14 11:32:24', '0000-00-00 00:00:00'),
(29, 10, 9, '2020-03-14 11:32:24', '0000-00-00 00:00:00'),
(30, 11, 5, '2020-03-14 11:34:12', '0000-00-00 00:00:00'),
(31, 11, 1, '2020-03-14 11:34:12', '0000-00-00 00:00:00'),
(32, 11, 8, '2020-03-14 11:34:12', '0000-00-00 00:00:00'),
(33, 11, 9, '2020-03-14 11:34:12', '0000-00-00 00:00:00'),
(34, 12, 3, '2020-03-14 11:35:08', '0000-00-00 00:00:00'),
(35, 12, 2, '2020-03-14 11:35:08', '0000-00-00 00:00:00'),
(36, 12, 4, '2020-03-14 11:35:08', '0000-00-00 00:00:00'),
(37, 13, 3, '2020-03-14 11:35:40', '0000-00-00 00:00:00'),
(38, 13, 2, '2020-03-14 11:35:40', '0000-00-00 00:00:00'),
(39, 13, 4, '2020-03-14 11:35:40', '0000-00-00 00:00:00'),
(40, 13, 9, '2020-03-14 11:35:40', '0000-00-00 00:00:00'),
(41, 14, 1, '2020-03-14 11:36:22', '0000-00-00 00:00:00'),
(42, 14, 5, '2020-03-14 11:36:22', '0000-00-00 00:00:00'),
(43, 14, 4, '2020-03-14 11:36:22', '0000-00-00 00:00:00'),
(44, 14, 2, '2020-03-14 11:36:22', '0000-00-00 00:00:00'),
(45, 15, 1, '2020-03-14 11:36:59', '0000-00-00 00:00:00'),
(46, 15, 5, '2020-03-14 11:36:59', '0000-00-00 00:00:00'),
(47, 15, 2, '2020-03-14 11:36:59', '0000-00-00 00:00:00'),
(48, 15, 9, '2020-03-14 11:36:59', '0000-00-00 00:00:00'),
(49, 16, 1, '2020-03-14 11:43:52', '0000-00-00 00:00:00'),
(50, 16, 3, '2020-03-14 11:43:52', '0000-00-00 00:00:00'),
(51, 16, 10, '2020-03-14 11:43:52', '0000-00-00 00:00:00'),
(52, 16, 8, '2020-03-14 11:43:52', '0000-00-00 00:00:00'),
(53, 17, 3, '2020-03-14 11:44:07', '0000-00-00 00:00:00'),
(54, 17, 10, '2020-03-14 11:44:07', '0000-00-00 00:00:00'),
(55, 18, 1, '2020-03-14 11:44:30', '0000-00-00 00:00:00'),
(56, 18, 5, '2020-03-14 11:44:30', '0000-00-00 00:00:00'),
(57, 18, 10, '2020-03-14 11:44:30', '0000-00-00 00:00:00'),
(58, 18, 9, '2020-03-14 11:44:30', '0000-00-00 00:00:00'),
(59, 19, 1, '2020-03-14 11:45:01', '0000-00-00 00:00:00'),
(60, 19, 5, '2020-03-14 11:45:01', '0000-00-00 00:00:00'),
(61, 19, 10, '2020-03-14 11:45:01', '0000-00-00 00:00:00'),
(62, 19, 8, '2020-03-14 11:45:01', '0000-00-00 00:00:00'),
(63, 20, 5, '2020-03-14 14:04:13', '0000-00-00 00:00:00'),
(64, 20, 7, '2020-03-14 14:04:13', '0000-00-00 00:00:00'),
(65, 21, 1, '2020-03-14 14:44:29', '0000-00-00 00:00:00'),
(66, 21, 5, '2020-03-14 14:44:29', '0000-00-00 00:00:00'),
(67, 21, 10, '2020-03-14 14:44:29', '0000-00-00 00:00:00'),
(68, 21, 8, '2020-03-14 14:44:29', '0000-00-00 00:00:00'),
(72, 25, 5, '2020-03-26 12:20:51', '0000-00-00 00:00:00'),
(73, 25, 6, '2020-03-26 12:20:51', '0000-00-00 00:00:00'),
(88, 27, 1, '2020-07-10 12:53:21', '2020-07-10 12:53:21'),
(89, 27, 6, '2020-07-10 12:53:21', '2020-07-10 12:53:21'),
(90, 27, 7, '2020-07-10 12:53:21', '2020-07-10 12:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user', '2020-03-20 10:23:14', '0000-00-00 00:00:00'),
(2, 'admin', '2020-03-20 10:23:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_name`, `created_at`, `updated_at`) VALUES
(1, 'xs', '2020-03-11 18:11:09', '0000-00-00 00:00:00'),
(2, 's', '2020-03-11 18:11:09', '0000-00-00 00:00:00'),
(3, 'm', '2020-03-11 18:11:09', '0000-00-00 00:00:00'),
(4, 'l', '2020-03-11 18:11:09', '0000-00-00 00:00:00'),
(5, 'xl', '2020-03-11 18:11:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `special_products`
--

CREATE TABLE `special_products` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `baner_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `baner_alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main` tinyint(4) DEFAULT NULL,
  `second` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special_products`
--

INSERT INTO `special_products` (`id`, `id_product`, `baner_path`, `baner_alt`, `main`, `second`, `created_at`, `updated_at`) VALUES
(1, 20, 'baner-pic-1.jpg', 'Special Product Baner', 1, NULL, '2020-03-27 11:18:19', '2020-03-27 10:18:19'),
(2, 27, '1585307781_baner-2.jpg', 'Second Special Product', NULL, 1, '2020-03-27 11:18:19', '2020-03-27 10:18:19'),
(3, 21, '1585307899_baner-3.jpg', 'Second Special Product 21', NULL, 1, '2020-03-27 11:18:19', '2020-03-27 10:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 1, '2020-03-14 11:13:57', '0000-00-00 00:00:00'),
(2, 'Coats', 1, '2020-03-14 11:13:57', '0000-00-00 00:00:00'),
(3, 'Men\'s fashion', 1, '2020-03-14 11:14:44', '0000-00-00 00:00:00'),
(4, 'Winter fashion', 1, '2020-03-14 11:14:44', '0000-00-00 00:00:00'),
(5, 'Women\'s fashion', 1, '2020-03-14 11:15:08', '0000-00-00 00:00:00'),
(6, 'Spring fashion', 1, '2020-03-14 11:15:22', '0000-00-00 00:00:00'),
(7, 'Summer vibe', 1, '2020-03-14 11:27:32', '0000-00-00 00:00:00'),
(8, 'Trendy', 1, '2020-03-14 11:24:44', '0000-00-00 00:00:00'),
(9, 'Stylish', 1, '2020-03-14 11:26:47', '0000-00-00 00:00:00'),
(10, 'Jeans', 1, '2020-03-14 11:37:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `mem_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `mem_name`, `position`, `team_pic`, `alt`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'John Terrans', 'Ceo', 'team-1.jpg', 'John Terrans -Ceo', '#', '2020-03-15 15:14:39', '0000-00-00 00:00:00'),
(2, 'Caytlin Voice ', 'Business Development Manager', 'team-2.jpg', 'Business Development Managers - Caytlin Voice ', '#', '2020-03-15 15:21:25', '0000-00-00 00:00:00'),
(3, 'Rhys Metler', 'Account Manager', 'team-3.jpg', 'Account Manager - Rhys Metler', '#', '2020-03-15 15:22:26', '0000-00-00 00:00:00'),
(4, 'Ana Mantis', 'Account Manager', 'team-4.jpg', 'Account Manager - Ana Mantis', '#', '2020-03-15 15:25:50', '0000-00-00 00:00:00'),
(5, 'Maria Jovic', 'Full Stack Programer', 'team-5.jpg', 'Full Stack Programer - Maria Jovic', '#', '2020-03-15 15:26:51', '0000-00-00 00:00:00'),
(6, 'Stefan Persson', 'Full Stack Programer', 'team-6.jpg', 'Full Stack Programer - Stefan Persson', '#', '2020-03-15 15:27:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `role_id`) VALUES
(2, 'SiamIzmena', 'milossimicbz@gmail.com', '01488dd067097083f80f32761c0ad802', '2020-03-19 14:04:19', '2020-03-27 14:10:27', 2),
(3, 'Test', 'test@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f', '2020-03-23 15:00:51', '0000-00-00 00:00:00', 1),
(4, 'Admin', 'admin@gmail.com', '965277f0852350bec159902fea05ed3d', '2020-07-10 09:15:09', '2020-07-10 11:15:26', 2),
(5, 'User', 'testuser@gmail.com', '50988eef41d0d48322a26cd9804f36f1', '2020-07-10 10:47:28', '2020-07-10 10:47:28', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkUser` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkMainCategory` (`main_cat_id`);

--
-- Indexes for table `category_gender`
--
ALTER TABLE `category_gender`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCategory` (`id_category`),
  ADD KEY `fkGender` (`id_gender`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCollectionPIcture` (`id_col_pic`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkGenderPIcture` (`id_gen_pic`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkUserOrders` (`user_id`),
  ADD KEY `fkAddOrd` (`address_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkProductPrice` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkProductsCat` (`id_product`),
  ADD KEY `fkCategoryCat` (`id_category`);

--
-- Indexes for table `products_collections`
--
ALTER TABLE `products_collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkProductCol` (`id_product`),
  ADD KEY `fkCollectionCol` (`id_collection`);

--
-- Indexes for table `products_pictures`
--
ALTER TABLE `products_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkProduct` (`id_products`),
  ADD KEY `fkPictures` (`id_pictures`);

--
-- Indexes for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkProductSIze` (`id_product`),
  ADD KEY `fkSizeSize` (`id_size`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkOrderPRoduct` (`id_product`),
  ADD KEY `fkOrderORders` (`id_order`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkPro` (`id_product`),
  ADD KEY `fkTags` (`id_tags`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_products`
--
ALTER TABLE `special_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkProduct` (`id_product`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkRole` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category_gender`
--
ALTER TABLE `category_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products_collections`
--
ALTER TABLE `products_collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products_pictures`
--
ALTER TABLE `products_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `products_sizes`
--
ALTER TABLE `products_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `special_products`
--
ALTER TABLE `special_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fkUserAdress` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fkMainCategory` FOREIGN KEY (`main_cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `category_gender`
--
ALTER TABLE `category_gender`
  ADD CONSTRAINT `fkCatCategoryGen` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fkCatGenderGen` FOREIGN KEY (`id_gender`) REFERENCES `gender` (`id`);

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `fkCollectionPIcture` FOREIGN KEY (`id_col_pic`) REFERENCES `pictures` (`id`);

--
-- Constraints for table `gender`
--
ALTER TABLE `gender`
  ADD CONSTRAINT `fkGenderPicture` FOREIGN KEY (`id_gen_pic`) REFERENCES `pictures` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fkAddressORder` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `fkUserOrder` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `fkProductPrices` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `idCatCategory` FOREIGN KEY (`id_category`) REFERENCES `category_gender` (`id`),
  ADD CONSTRAINT `idCatProducts` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products_collections`
--
ALTER TABLE `products_collections`
  ADD CONSTRAINT `fkCollectionCol` FOREIGN KEY (`id_collection`) REFERENCES `collections` (`id`),
  ADD CONSTRAINT `fkProductsCol` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products_pictures`
--
ALTER TABLE `products_pictures`
  ADD CONSTRAINT `fkPictures` FOREIGN KEY (`id_pictures`) REFERENCES `pictures` (`id`),
  ADD CONSTRAINT `fkProducts` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`);

--
-- Constraints for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD CONSTRAINT `fkProductSize` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fkSizeSIze` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`);

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `fkOrderOrder` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fkProductOrder` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `fkProductTags` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fkTagsTags` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id`);

--
-- Constraints for table `special_products`
--
ALTER TABLE `special_products`
  ADD CONSTRAINT `fkSpecialProduct` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fkRoleId` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
