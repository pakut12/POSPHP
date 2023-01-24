-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jan 24, 2023 at 08:34 AM
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
(100, 'สวทช.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `customer_id` int(10) NOT NULL,
  `customer_code` int(10) NOT NULL,
  `customer_prefix` varchar(10) NOT NULL,
  `customer_firstname` varchar(50) NOT NULL,
  `customer_lastname` varchar(50) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`customer_id`, `customer_code`, `customer_prefix`, `customer_firstname`, `customer_lastname`, `customer_phone`, `date_create`) VALUES
(99, 0, '', '', '', '', '2023-01-13 02:28:52'),
(100, 123213, 'นาย', 'ปากัต ซิงห์', 'จาวาลา', '0810702490', '2023-01-24 10:39:03'),
(101, 123001, 'นาย', 'กัมพล', 'ปฐมอรรฆย์กุล', '0810702490', '2023-01-24 11:15:04'),
(102, 123002, 'นาย', 'ฉัตรมงคล', 'เรืองฐณโรจน์', '0810702490', '2023-01-24 11:16:54'),
(103, 123003, 'นาย', 'กฤษดา', 'กาแมน', '0810702490', '2023-01-24 11:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `company_id` int(10) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`department_id`, `department_name`, `company_id`, `date_create`) VALUES
(99, '-', 0, '2023-01-06 10:02:23'),
(100, 'COM', 100, '2023-01-24 10:16:49'),
(101, 'Accounting', 100, '2023-01-24 10:29:24'),
(102, 'Design', 100, '2023-01-24 10:30:26'),
(103, 'Financial', 100, '2023-01-24 10:30:53');

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
(99, '2023-01-13 00:00:00'),
(100, '2023-01-24 10:39:03'),
(101, '2023-01-24 11:15:04'),
(102, '2023-01-24 11:16:54'),
(103, '2023-01-24 11:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_material`
--

CREATE TABLE `tb_material` (
  `material_id` int(10) NOT NULL,
  `material_name` varchar(50) NOT NULL,
  `material_group` varchar(20) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_material`
--

INSERT INTO `tb_material` (`material_id`, `material_name`, `material_group`, `date_create`) VALUES
(99, '', '', '2023-01-19 03:10:44'),
(100, 'OTHER OUTER', 'SK', '2023-01-24 10:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(10) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_qty` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `date_create` date NOT NULL,
  `order_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `doc_id`, `customer_id`, `product_id`, `product_qty`, `department_id`, `company_id`, `date_create`, `order_status`) VALUES
(99, 0, 0, 0, 0, 0, 0, '2023-01-19', ''),
(100, 100, 100, 103, 4, 101, 100, '2023-01-24', 'new'),
(101, 100, 100, 121, 3, 101, 100, '2023-01-24', 'new'),
(107, 100, 100, 113, 6, 101, 100, '2023-01-24', 'new'),
(108, 101, 101, 116, 4, 100, 100, '2023-01-24', 'new'),
(109, 101, 101, 112, 5, 100, 100, '2023-01-24', 'new'),
(110, 102, 102, 117, 4, 100, 100, '2023-01-24', 'new'),
(111, 102, 102, 122, 3, 100, 100, '2023-01-24', 'new'),
(112, 103, 103, 109, 3, 100, 100, '2023-01-24', 'new'),
(113, 103, 103, 112, 4, 100, 100, '2023-01-24', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(10) NOT NULL,
  `material_id` int(10) NOT NULL,
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

INSERT INTO `tb_product` (`product_id`, `material_id`, `product_group`, `product_mat_no`, `product_mat_barcode`, `product_mat_name_th`, `product_color_id`, `product_size_id`, `product_sale_price`, `product_sale_vat`, `date_create`) VALUES
(99, 0, 99, '', '', '', '', '', '', '', '2023-01-05 00:00:00'),
(100, 100, 101, '4TM26S3569NB036', '2081120435062', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '036', '280.37', '300', '2023-01-24 10:19:14'),
(101, 100, 101, '4TM26S3569NB038', '2081120435079', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '038', '280.37', '300', '2023-01-24 10:19:14'),
(102, 100, 101, '4TM26S3569NB040', '2081120435086', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '040', '280.37', '300', '2023-01-24 10:19:14'),
(103, 100, 101, '4TM26S3569NB042', '2081120435093', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '042', '280.37', '300', '2023-01-24 10:19:14'),
(104, 100, 101, '4TM26S3569NB044', '2081120435109', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '044', '280.37', '300', '2023-01-24 10:19:14'),
(105, 100, 101, '4TM26S3569NB046', '2081120435116', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '046', '280.37', '300', '2023-01-24 10:19:14'),
(106, 100, 101, '4TM26S3569NB048', '2081120435123', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '048', '280.37', '300', '2023-01-24 10:19:14'),
(107, 100, 101, '4TM26S3569NB052', '2081120435130', 'เสื้อโปโลผู้ชาย สวทช.', 'NB', '052', '280.37', '300', '2023-01-24 10:19:14'),
(108, 100, 101, '4TM26S3569WH036', '2081120435147', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '036', '280.37', '300', '2023-01-24 10:19:14'),
(109, 100, 101, '4TM26S3569WH038', '2081120435154', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '038', '280.37', '300', '2023-01-24 10:19:14'),
(110, 100, 101, '4TM26S3569WH040', '2081120435161', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '040', '280.37', '300', '2023-01-24 10:19:14'),
(111, 100, 101, '4TM26S3569WH042', '2081120435178', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '042', '280.37', '300', '2023-01-24 10:19:14'),
(112, 100, 101, '4TM26S3569WH044', '2081120435185', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '044', '280.37', '300', '2023-01-24 10:19:14'),
(113, 100, 101, '4TM26S3569WH046', '2081120435192', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '046', '280.37', '300', '2023-01-24 10:19:14'),
(114, 100, 101, '4TM26S3569WH048', '2081120435208', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '048', '280.37', '300', '2023-01-24 10:19:14'),
(115, 100, 101, '4TM26S3569WH052', '2081120435215', 'เสื้อโปโลผู้ชาย สวทช.', 'WH', '052', '280.37', '300', '2023-01-24 10:19:14'),
(116, 100, 101, '4TW26S3570NB034', '2081120435222', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '034', '280.37', '300', '2023-01-24 10:19:14'),
(117, 100, 101, '4TW26S3570NB036', '2081120435239', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '036', '280.37', '300', '2023-01-24 10:19:14'),
(118, 100, 101, '4TW26S3570NB038', '2081120435246', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '038', '280.37', '300', '2023-01-24 10:19:14'),
(119, 100, 101, '4TW26S3570NB040', '2081120435253', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '040', '280.37', '300', '2023-01-24 10:19:14'),
(120, 100, 101, '4TW26S3570NB042', '2081120435260', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '042', '280.37', '300', '2023-01-24 10:19:14'),
(121, 100, 101, '4TW26S3570NB044', '2081120435277', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '044', '280.37', '300', '2023-01-24 10:19:14'),
(122, 100, 101, '4TW26S3570NB046', '2081120435284', 'เสื้อโปโลผู้หญิง สวทช.', 'NB', '046', '280.37', '300', '2023-01-24 10:19:14'),
(123, 100, 101, '4TW26S3570WH034', '2081120435291', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '034', '280.37', '300', '2023-01-24 10:19:14'),
(124, 100, 101, '4TW26S3570WH036', '2081120435307', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '036', '280.37', '300', '2023-01-24 10:19:14'),
(125, 100, 101, '4TW26S3570WH038', '2081120435314', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '038', '280.37', '300', '2023-01-24 10:19:14'),
(126, 100, 101, '4TW26S3570WH040', '2081120435321', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '040', '280.37', '300', '2023-01-24 10:19:14'),
(127, 100, 101, '4TW26S3570WH042', '2081120435338', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '042', '280.37', '300', '2023-01-24 10:19:14'),
(128, 100, 101, '4TW26S3570WH044', '2081120435345', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '044', '280.37', '300', '2023-01-24 10:19:14'),
(129, 100, 101, '4TW26S3570WH046', '2081120435352', 'เสื้อโปโลผู้หญิง สวทช.', 'WH', '046', '280.37', '300', '2023-01-24 10:19:14'),
(130, 100, 101, '4TM26S3567NV036', '2081120435369', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '036', '280.37', '300', '2023-01-24 10:19:14'),
(131, 100, 101, '4TM26S3567NV038', '2081120435376', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '038', '280.37', '300', '2023-01-24 10:19:14'),
(132, 100, 101, '4TM26S3567NV040', '2081120435383', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '040', '280.37', '300', '2023-01-24 10:19:14'),
(133, 100, 101, '4TM26S3567NV042', '2081120435390', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '042', '280.37', '300', '2023-01-24 10:19:14'),
(134, 100, 101, '4TM26S3567NV044', '2081120435406', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '044', '280.37', '300', '2023-01-24 10:19:14'),
(135, 100, 101, '4TM26S3567NV046', '2081120435413', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '046', '280.37', '300', '2023-01-24 10:19:14'),
(136, 100, 101, '4TM26S3567NV048', '2081120435420', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '048', '280.37', '300', '2023-01-24 10:19:14'),
(137, 100, 101, '4TM26S3567NV052', '2081120435437', 'เสื้อคอจีนผู้ชาย สวทช.', 'NV', '052', '280.37', '300', '2023-01-24 10:19:14'),
(138, 100, 101, '4TW26S3568NV034', '2081120435444', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '034', '280.37', '300', '2023-01-24 10:19:14'),
(139, 100, 101, '4TW26S3568NV036', '2081120435451', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '036', '280.37', '300', '2023-01-24 10:19:14'),
(140, 100, 101, '4TW26S3568NV038', '2081120435468', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '038', '280.37', '300', '2023-01-24 10:19:14'),
(141, 100, 101, '4TW26S3568NV040', '2081120435475', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '040', '280.37', '300', '2023-01-24 10:19:14'),
(142, 100, 101, '4TW26S3568NV042', '2081120435482', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '042', '280.37', '300', '2023-01-24 10:19:14'),
(143, 100, 101, '4TW26S3568NV044', '2081120435499', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '044', '280.37', '300', '2023-01-24 10:19:14'),
(144, 100, 101, '4TW26S3568NV046', '2081120435505', 'เสื้อคอจีนผู้หญิง สวทช.', 'NV', '046', '280.37', '300', '2023-01-24 10:19:14');

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
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tb_doc`
--
ALTER TABLE `tb_doc`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`material_id`);

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
  ADD KEY `product_mat_no` (`product_mat_no`,`product_mat_barcode`),
  ADD KEY `material_id` (`material_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
