-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 04:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'Mila', 'mila@gmail.com', '1234', '1.jpeg', '1234', 'Bangladesh', 'jobless', 'Hi'),
(2, 'shobvo', 'shobvo@gmail.com', '1234', '2.jpg', '1234', 'bangladesh', 'student', 'hi'),
(3, 'souchi', 'souchi@gmail.com', '1234', '3.jpeg', '1234', 'bd', 'student', 'hi'),
(4, 'mumu', 'mumu@gmail.com', '1234', '5.jpeg', '1234', 'bd', 'student', 'hi'),
(5, 'Anas', 'anas@gmail.com', '1234', '4.jpg', '1234', 'bd', 'student', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(9, '::1', 1, 'small'),
(10, '::1', 2, 'small'),
(11, '::1', 0, ''),
(13, '::1', 0, ''),
(15, '::1', 0, ''),
(16, '::1', 0, ''),
(34, '::1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su'),
(2, 'Women', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su'),
(3, 'kids', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su'),
(4, 'Others', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(3, 'asd', 'asdd@gmail.com', '12', 'Bangladesh', 'Dhaka', '12345', 'dhaka', 'jia-ye-y8ZnQqgohLk-unsplash.jpg', '::1'),
(4, 'mila', 'mila@gmail.com', '1234', 'Bangladesh', 'Dhaka', '12345', 'dhaka', '2025.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `p_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `p_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 2, 0, 3000, 1234, 1, 'small', '2021-12-05 11:58:10', 'pending'),
(2, 3, 13, 0, 1234, 1, 'small', '2021-12-09 16:04:57', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `code` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 0, 621683802, '10', 0, 'pending', ''),
(2, 0, 621683802, '15', 0, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(10, 3, 2, '2021-11-29 17:16:58', 'BUBBLEGUMMERS', 'emily-gouker-Zx76sbAndc0-unsplash.jpg', 'emily-gouker-Zx76sbAndc0-unsplash.jpg', 'emily-gouker-Zx76sbAndc0-unsplash.jpg', 3000, '<p>BUBBLEGUMMERS</p>', 'BUBBLEGUMMERS'),
(11, 3, 2, '2021-11-29 17:23:17', 'BUBBLEGUMMERS', 'pesce-huang-pEzLon__DfM-unsplash.jpg', 'pesce-huang-pEzLon__DfM-unsplash.jpg', 'pesce-huang-pEzLon__DfM-unsplash.jpg', 3000, '<p>BUBBLEGUMMERS</p>', 'BUBBLEGUMMERS'),
(12, 3, 2, '2021-11-29 17:39:38', 'BUBBLEGUMMERS', 'amanda-vick-XnsrZKmajPg-unsplash.jpg', 'tyron-harkiss-foster-BIkif7IMZSQ-unsplash.jpg', 'siora-photography-B1Sn_ADEohs-unsplash.jpg', 3000, '<p>BUBBLEGUMMERS</p>', 'BUBBLEGUMMERS'),
(15, 3, 2, '2021-11-29 17:44:39', 'BUBBLEGUMMERS', 'benjamin-wedemeyer-5eGtI9H4HDI-unsplash.jpg', 'benjamin-wedemeyer-5eGtI9H4HDI-unsplash.jpg', 'benjamin-wedemeyer-5eGtI9H4HDI-unsplash.jpg', 3000, '<p>BUBBLEGUMMERS</p>', 'BUBBLEGUMMERS'),
(16, 4, 1, '2021-12-02 09:33:50', 'LUXPRE', 'revolt-164_6wVEHfI-unsplash.jpg', 'revolt-164_6wVEHfI-unsplash.jpg', 'revolt-164_6wVEHfI-unsplash.jpg', 5000, '<p>LUXPRE</p>', 'LUXPRE'),
(18, 5, 2, '2021-12-09 15:15:59', 'LUXPRE', 'content-pixie-ZB4eQcNqVUs-unsplash.jpg', 'content-pixie-ZB4eQcNqVUs-unsplash.jpg', 'content-pixie-ZB4eQcNqVUs-unsplash.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE'),
(19, 5, 2, '2021-12-09 15:17:33', 'LUXPRE', 'creative-headline-APNnyM36puU-unsplash.jpg', 'creative-headline-APNnyM36puU-unsplash.jpg', 'creative-headline-APNnyM36puU-unsplash.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE'),
(20, 5, 2, '2021-12-09 15:21:25', 'LUXPRE', 'creative-headline-UiM5WNmE_Qw-unsplash.jpg', 'creative-headline-UiM5WNmE_Qw-unsplash.jpg', 'creative-headline-UiM5WNmE_Qw-unsplash.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE'),
(21, 5, 2, '2021-12-09 15:22:57', 'LUXPRE', 'creative-headline-x2l1CSCbTSQ-unsplash.jpg', 'creative-headline-x2l1CSCbTSQ-unsplash.jpg', 'creative-headline-x2l1CSCbTSQ-unsplash.jpg', 5000, '<p>LUXPRE</p>', 'LUXPRE'),
(22, 5, 1, '2021-12-09 15:24:17', 'LUXPRE', 'jakob-owens-BmH09wAkJa8-unsplash.jpg', 'jakob-owens-BmH09wAkJa8-unsplash.jpg', 'jakob-owens-BmH09wAkJa8-unsplash.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE'),
(23, 5, 1, '2021-12-09 15:25:20', 'LUXPRE', 'mohsin-khalifa-WPpnBH2jdFM-unsplash.jpg', 'mohsin-khalifa-WPpnBH2jdFM-unsplash.jpg', 'mohsin-khalifa-WPpnBH2jdFM-unsplash.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE'),
(24, 1, 2, '2021-12-09 15:30:28', 'LUXPRE', 'sara-abril-solana-pira-MWMize1wl84-unsplash.jpg', 'sara-abril-solana-pira-MWMize1wl84-unsplash.jpg', 'sara-abril-solana-pira-MWMize1wl84-unsplash.jpg', 2000, '<p>LUXPRE</p>', 'LUXPRE'),
(25, 1, 2, '2021-12-09 15:32:16', 'LUXPRE', 'karim-elmissiry-PC64QkzyNZ4-unsplash.jpg', 'karim-elmissiry-PC64QkzyNZ4-unsplash.jpg', 'karim-elmissiry-PC64QkzyNZ4-unsplash.jpg', 2000, '<p>LUXPRE</p>', 'LUXPRE'),
(26, 1, 2, '2021-12-09 15:33:22', 'LUXPRE', 'roberto-martins-4_ayhfmE5Ao-unsplash.jpg', 'roberto-martins-4_ayhfmE5Ao-unsplash.jpg', 'roberto-martins-4_ayhfmE5Ao-unsplash.jpg', 2000, '<p>LUXPRE</p>', 'LUXPRE'),
(27, 1, 2, '2021-12-09 15:34:54', 'LUXPRE', 's-qure-sITm3-ZLIcw-unsplash.jpg', 's-qure-sITm3-ZLIcw-unsplash.jpg', 's-qure-sITm3-ZLIcw-unsplash.jpg', 2000, '<p>LUXPRE</p>', 'LUXPRE'),
(28, 2, 1, '2021-12-09 16:18:32', 'LUXPRE', 'salman-hossain-saif-VIKdvmGUhq8-unsplash.jpg', 'salman-hossain-saif-VIKdvmGUhq8-unsplash.jpg', 'salman-hossain-saif-VIKdvmGUhq8-unsplash.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE'),
(29, 2, 2, '2021-12-09 16:20:09', 'LUXPRE', 'natalia-jonas-MGiYQcv_BX4-unsplash.jpg', 'natalia-jonas-MGiYQcv_BX4-unsplash.jpg', 'natalia-jonas-MGiYQcv_BX4-unsplash.jpg', 1000, '<p>LUXPRE</p>', 'LUXPRE'),
(30, 2, 2, '2021-12-09 16:21:45', 'LUXPRE', 'jess-harper-sunday-bLkj9eNhW90-unsplash.jpg', 'jess-harper-sunday-bLkj9eNhW90-unsplash.jpg', 'jess-harper-sunday-bLkj9eNhW90-unsplash.jpg', 1000, '<p>LUXPRE</p>', 'LUXPRE'),
(31, 2, 1, '2021-12-09 16:23:52', 'LUXPRE', 'sebastian-coman-travel-dtOTQYmTEs0-unsplash.jpg', 'sebastian-coman-travel-dtOTQYmTEs0-unsplash.jpg', 'sebastian-coman-travel-dtOTQYmTEs0-unsplash.jpg', 2000, '<p>LUXPRE</p>', 'LUXPRE'),
(32, 3, 1, '2021-12-09 16:32:53', 'LUXPRE', '1.jpg', '1.jpg', '1.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE'),
(33, 3, 1, '2021-12-09 16:33:55', 'LUXPRE', '2.jpg', '2.jpg', '2.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE'),
(34, 3, 1, '2021-12-09 16:36:11', 'LUXPRE', 'mostafa-mahmoudi-3OZr-hLbsq0-unsplash.jpg', 'mostafa-mahmoudi-3OZr-hLbsq0-unsplash.jpg', 'mostafa-mahmoudi-3OZr-hLbsq0-unsplash.jpg', 5000, '<p>LUXPRE</p>', 'LUXPRE'),
(35, 3, 1, '2021-12-09 16:37:38', 'LUXPRE', '4.jpg', '4.jpg', '4.jpg', 4000, '<p>LUXPRE</p>', 'LUXPRE');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'SANDALS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 'ACCESORIES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, 'SHOES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, 'SPORTS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5, 'BAGS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_image`) VALUES
(1, 'slider number 1', 'a.jpg\r\n'),
(2, 'slider number 2', 'b.jpg'),
(3, 'slider number 3', 'c.jpg'),
(4, 'slider number 4', 'd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
