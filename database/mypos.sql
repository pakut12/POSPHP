-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jan 13, 2023 at 10:53 AM
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
(99, '-'),
(100, 'KFC'),
(101, 'JIB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `customer_id` int(10) NOT NULL,
  `customer_code` int(10) NOT NULL,
  `customer_prefix` varchar(5) NOT NULL,
  `customer_firstname` varchar(50) NOT NULL,
  `customer_lastname` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`customer_id`, `customer_code`, `customer_prefix`, `customer_firstname`, `customer_lastname`, `date_create`) VALUES
(99, 0, '', '', '', '2023-01-13 02:28:52');

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
(100, 'ADC', '2023-10-01 00:00:00'),
(101, 'PHP', '2023-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_doc`
--

CREATE TABLE `tb_doc` (
  `doc_id` int(10) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_doc`
--

INSERT INTO `tb_doc` (`doc_id`, `date_create`) VALUES
(99, '2023-01-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(10) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `date_create` datetime NOT NULL,
  `order_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `doc_id`, `customer_id`, `product_id`, `department_id`, `company_id`, `date_create`, `order_status`) VALUES
(99, 0, 0, 0, 0, 0, '2023-01-13 08:16:50', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(10) NOT NULL,
  `product_group` int(10) NOT NULL,
  `product_mat_no` varchar(30) NOT NULL,
  `product_mat_barcode` varchar(30) NOT NULL,
  `product_mat_name_th` varchar(50) NOT NULL,
  `product_color_id` varchar(30) NOT NULL,
  `product_size_id` varchar(30) NOT NULL,
  `product_sale_price` varchar(30) NOT NULL,
  `product_sale_vat` varchar(30) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `product_group`, `product_mat_no`, `product_mat_barcode`, `product_mat_name_th`, `product_color_id`, `product_size_id`, `product_sale_price`, `product_sale_vat`, `date_create`) VALUES
(99, 99, '', '', '', '', '', '', '', '2023-01-05 00:00:00'),
(100, 104, '4TM26S3569NB036', '2081120435062', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '036', '280.37', '300', '2023-01-12 00:00:00'),
(101, 104, '4TM26S3569NB038', '2081120435079', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '038', '280.37', '300', '2023-01-12 00:00:00'),
(102, 104, '4TM26S3569NB040', '2081120435086', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '040', '280.37', '300', '2023-01-12 00:00:00'),
(103, 104, '4TM26S3569NB042', '2081120435093', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '042', '280.37', '300', '2023-01-12 00:00:00'),
(104, 104, '4TM26S3569NB044', '2081120435109', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '044', '280.37', '300', '2023-01-12 00:00:00'),
(105, 104, '4TM26S3569NB046', '2081120435116', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '046', '280.37', '300', '2023-01-12 00:00:00'),
(106, 104, '4TM26S3569NB048', '2081120435123', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '048', '280.37', '300', '2023-01-12 00:00:00'),
(107, 104, '4TM26S3569NB052', '2081120435130', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '052', '280.37', '300', '2023-01-12 00:00:00'),
(108, 104, '4TM26S3569WH036', '2081120435147', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '036', '280.37', '300', '2023-01-12 00:00:00'),
(109, 104, '4TM26S3569WH038', '2081120435154', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '038', '280.37', '300', '2023-01-12 00:00:00'),
(110, 104, '4TM26S3569WH040', '2081120435161', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '040', '280.37', '300', '2023-01-12 00:00:00'),
(111, 104, '4TM26S3569WH042', '2081120435178', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '042', '280.37', '300', '2023-01-12 00:00:00'),
(112, 104, '4TM26S3569WH044', '2081120435185', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '044', '280.37', '300', '2023-01-12 00:00:00'),
(113, 104, '4TM26S3569WH046', '2081120435192', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '046', '280.37', '300', '2023-01-12 00:00:00'),
(114, 104, '4TM26S3569WH048', '2081120435208', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '048', '280.37', '300', '2023-01-12 00:00:00'),
(115, 104, '4TM26S3569WH052', '2081120435215', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '052', '280.37', '300', '2023-01-12 00:00:00'),
(116, 104, '4TW26S3570NB034', '2081120435222', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '034', '280.37', '300', '2023-01-12 00:00:00'),
(117, 104, '4TW26S3570NB036', '2081120435239', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '036', '280.37', '300', '2023-01-12 00:00:00'),
(118, 104, '4TW26S3570NB038', '2081120435246', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '038', '280.37', '300', '2023-01-12 00:00:00'),
(119, 104, '4TW26S3570NB040', '2081120435253', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '040', '280.37', '300', '2023-01-12 00:00:00'),
(120, 104, '4TW26S3570NB042', '2081120435260', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '042', '280.37', '300', '2023-01-12 00:00:00'),
(121, 104, '4TW26S3570NB044', '2081120435277', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '044', '280.37', '300', '2023-01-12 00:00:00'),
(122, 104, '4TW26S3570NB046', '2081120435284', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '046', '280.37', '300', '2023-01-12 00:00:00'),
(123, 104, '4TW26S3570WH034', '2081120435291', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '034', '280.37', '300', '2023-01-12 00:00:00'),
(124, 104, '4TW26S3570WH036', '2081120435307', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '036', '280.37', '300', '2023-01-12 00:00:00'),
(125, 104, '4TW26S3570WH038', '2081120435314', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '038', '280.37', '300', '2023-01-12 00:00:00'),
(126, 104, '4TW26S3570WH040', '2081120435321', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '040', '280.37', '300', '2023-01-12 00:00:00'),
(127, 104, '4TW26S3570WH042', '2081120435338', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '042', '280.37', '300', '2023-01-12 00:00:00'),
(128, 104, '4TW26S3570WH044', '2081120435345', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '044', '280.37', '300', '2023-01-12 00:00:00'),
(129, 104, '4TW26S3570WH046', '2081120435352', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '046', '280.37', '300', '2023-01-12 00:00:00'),
(130, 104, '4TM26S3567NV036', '2081120435369', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '036', '280.37', '300', '2023-01-12 00:00:00'),
(131, 104, '4TM26S3567NV038', '2081120435376', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '038', '280.37', '300', '2023-01-12 00:00:00'),
(132, 104, '4TM26S3567NV040', '2081120435383', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '040', '280.37', '300', '2023-01-12 00:00:00'),
(133, 104, '4TM26S3567NV042', '2081120435390', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '042', '280.37', '300', '2023-01-12 00:00:00'),
(134, 104, '4TM26S3567NV044', '2081120435406', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '044', '280.37', '300', '2023-01-12 00:00:00'),
(135, 104, '4TM26S3567NV046', '2081120435413', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '046', '280.37', '300', '2023-01-12 00:00:00'),
(136, 104, '4TM26S3567NV048', '2081120435420', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '048', '280.37', '300', '2023-01-12 00:00:00'),
(137, 104, '4TM26S3567NV052', '2081120435437', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '052', '280.37', '300', '2023-01-12 00:00:00'),
(138, 104, '4TW26S3568NV034', '2081120435444', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '034', '280.37', '300', '2023-01-12 00:00:00'),
(139, 104, '4TW26S3568NV036', '2081120435451', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '036', '280.37', '300', '2023-01-12 00:00:00'),
(140, 104, '4TW26S3568NV038', '2081120435468', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '038', '280.37', '300', '2023-01-12 00:00:00'),
(141, 104, '4TW26S3568NV040', '2081120435475', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '040', '280.37', '300', '2023-01-12 00:00:00'),
(142, 104, '4TW26S3568NV042', '2081120435482', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '042', '280.37', '300', '2023-01-12 00:00:00'),
(143, 104, '4TW26S3568NV044', '2081120435499', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '044', '280.37', '300', '2023-01-12 00:00:00'),
(144, 104, '4TW26S3568NV080', '2081120435505', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '080', '280.37', '300', '2023-01-12 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tb_doc`
--
ALTER TABLE `tb_doc`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `department_id` (`company_id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `department_id_2` (`department_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_mat_no` (`product_mat_no`,`product_mat_barcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
