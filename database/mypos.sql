-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jan 06, 2023 at 10:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `company_id` int(10) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`company_id`, `company_name`) VALUES
(99, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`department_id`, `department_name`, `date_create`) VALUES
(99, '-', '2023-01-06 10:02:23'),
(100, 'pakut', '2023-01-06 10:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_doc`
--

CREATE TABLE `tb_doc` (
  `doc_id` int(10) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(10) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_total` int(7) NOT NULL,
  `company_id` int(10) NOT NULL,
  `date_create` datetime NOT NULL,
  `order_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `doc_id`, `user_id`, `product_id`, `product_total`, `company_id`, `date_create`, `order_status`) VALUES
(99, 0, 0, 0, 0, 0, '2023-01-05 10:34:49', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(10) NOT NULL,
  `product_mat_no` varchar(30) NOT NULL,
  `product_mat_barcode` varchar(30) NOT NULL,
  `product_mat_name_th` varchar(50) NOT NULL,
  `product_color_id` varchar(30) NOT NULL,
  `product_size_id` varchar(30) NOT NULL,
  `product_sale_price` varchar(30) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `product_mat_no`, `product_mat_barcode`, `product_mat_name_th`, `product_color_id`, `product_size_id`, `product_sale_price`, `date_create`) VALUES
(99, '', '', '', '', '', '', '2023-01-05 00:00:00'),
(100, '4TM26S3569NB036', '2081120435062', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '36', '280.37', '2023-01-05 13:20:51'),
(101, '4TM26S3569NB038', '2081120435079', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '38', '280.37', '2023-01-05 13:20:51'),
(102, '4TM26S3569NB040', '2081120435086', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '40', '280.37', '2023-01-05 13:20:51'),
(103, '4TM26S3569NB042', '2081120435093', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '42', '280.37', '2023-01-05 13:20:51'),
(104, '4TM26S3569NB044', '2081120435109', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '44', '280.37', '2023-01-05 13:20:51'),
(105, '4TM26S3569NB046', '2081120435116', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '46', '280.37', '2023-01-05 13:20:51'),
(106, '4TM26S3569NB048', '2081120435123', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '48', '280.37', '2023-01-05 13:20:51'),
(107, '4TM26S3569NB052', '2081120435130', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '52', '280.37', '2023-01-05 13:20:51'),
(108, '4TM26S3569WH036', '2081120435147', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '36', '280.37', '2023-01-05 13:20:51'),
(109, '4TM26S3569WH038', '2081120435154', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '38', '280.37', '2023-01-05 13:20:51'),
(110, '4TM26S3569WH040', '2081120435161', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '40', '280.37', '2023-01-05 13:20:51'),
(111, '4TM26S3569WH042', '2081120435178', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '42', '280.37', '2023-01-05 13:20:51'),
(112, '4TM26S3569WH044', '2081120435185', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '44', '280.37', '2023-01-05 13:20:51'),
(113, '4TM26S3569WH046', '2081120435192', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '46', '280.37', '2023-01-05 13:20:51'),
(114, '4TM26S3569WH048', '2081120435208', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '48', '280.37', '2023-01-05 13:20:51'),
(115, '4TM26S3569WH052', '2081120435215', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '52', '280.37', '2023-01-05 13:20:51'),
(116, '4TW26S3570NB034', '2081120435222', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '34', '280.37', '2023-01-05 13:20:51'),
(117, '4TW26S3570NB036', '2081120435239', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '36', '280.37', '2023-01-05 13:20:51'),
(118, '4TW26S3570NB038', '2081120435246', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '38', '280.37', '2023-01-05 13:20:51'),
(119, '4TW26S3570NB040', '2081120435253', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '40', '280.37', '2023-01-05 13:20:51'),
(120, '4TW26S3570NB042', '2081120435260', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '42', '280.37', '2023-01-05 13:20:51'),
(121, '4TW26S3570NB044', '2081120435277', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '44', '280.37', '2023-01-05 13:20:51'),
(122, '4TW26S3570NB046', '2081120435284', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '46', '280.37', '2023-01-05 13:20:51'),
(123, '4TW26S3570WH034', '2081120435291', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '34', '280.37', '2023-01-05 13:20:51'),
(124, '4TW26S3570WH036', '2081120435307', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '36', '280.37', '2023-01-05 13:20:51'),
(125, '4TW26S3570WH038', '2081120435314', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '38', '280.37', '2023-01-05 13:20:51'),
(126, '4TW26S3570WH040', '2081120435321', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '40', '280.37', '2023-01-05 13:20:51'),
(127, '4TW26S3570WH042', '2081120435338', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '42', '280.37', '2023-01-05 13:20:51'),
(128, '4TW26S3570WH044', '2081120435345', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '44', '280.37', '2023-01-05 13:20:51'),
(129, '4TW26S3570WH046', '2081120435352', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '46', '280.37', '2023-01-05 13:20:51'),
(130, '4TM26S3567NV036', '2081120435369', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '36', '280.37', '2023-01-05 13:20:51'),
(131, '4TM26S3567NV038', '2081120435376', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '38', '280.37', '2023-01-05 13:20:51'),
(132, '4TM26S3567NV040', '2081120435383', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '40', '280.37', '2023-01-05 13:20:51'),
(133, '4TM26S3567NV042', '2081120435390', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '42', '280.37', '2023-01-05 13:20:51'),
(134, '4TM26S3567NV044', '2081120435406', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '44', '280.37', '2023-01-05 13:20:51'),
(135, '4TM26S3567NV046', '2081120435413', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '46', '280.37', '2023-01-05 13:20:51'),
(136, '4TM26S3567NV048', '2081120435420', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '48', '280.37', '2023-01-05 13:20:51'),
(137, '4TM26S3567NV052', '2081120435437', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '52', '280.37', '2023-01-05 13:20:51'),
(138, '4TW26S3568NV034', '2081120435444', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '34', '280.37', '2023-01-05 13:20:51'),
(139, '4TW26S3568NV036', '2081120435451', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '36', '280.37', '2023-01-05 13:20:51'),
(140, '4TW26S3568NV038', '2081120435468', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '38', '280.37', '2023-01-05 13:20:51'),
(141, '4TW26S3568NV040', '2081120435475', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '40', '280.37', '2023-01-05 13:20:51'),
(142, '4TW26S3568NV042', '2081120435482', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '42', '280.37', '2023-01-05 13:20:51'),
(143, '4TW26S3568NV044', '2081120435499', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '44', '280.37', '2023-01-05 13:20:51'),
(144, '4TW26S3568NV046', '2081120435505', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '46', '280.37', '2023-01-05 13:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL,
  `user_code` int(10) NOT NULL,
  `user_prefix` varchar(5) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `department_id` (`company_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_mat_no` (`product_mat_no`,`product_mat_barcode`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
