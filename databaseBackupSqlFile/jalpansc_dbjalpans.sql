-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2021 at 01:04 PM
-- Server version: 10.3.29-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jalpansc_dbjalpans`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_otp_validator`
--

CREATE TABLE `admin_otp_validator` (
  `id` bigint(20) NOT NULL,
  `otp1` varchar(20) NOT NULL,
  `otp2` varchar(20) NOT NULL,
  `otp3` varchar(20) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_otp_validator`
--

INSERT INTO `admin_otp_validator` (`id`, `otp1`, `otp2`, `otp3`, `creation_date`) VALUES
(1, '402536', '587216', '014832', '2020-09-28 15:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `shopkeeper_id` bigint(20) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` decimal(18,2) NOT NULL,
  `total_price` decimal(18,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `ip_address`, `shopkeeper_id`, `product_id`, `product_attr_id`, `quantity`, `rate`, `total_price`) VALUES
(19, 'ffb6f68694c618179b3492829c503a49', 15, '33', 51, 1, 300.00, 300.00),
(18, '91c6542639b2da62ff1e2e9ce55b6224', 8, '37', 58, 2, 220.00, 440.00),
(20, '338ba1985caa5efd0a908aee9cc0c37d', 15, '31', 49, 1, 7.00, 7.00),
(27, 'c6526f146cef67beefdf5bbf4c95e2c3', 5, '6', 9, 5, 120.00, 600.00),
(26, 'f56afad52ea348e6fffb3ea3d1631325', 8, '48', 69, 1, 100.00, 100.00),
(28, '', 0, '', 0, 0, 0.00, 0.00),
(30, '3c2be9e15bf22223929707194f2cbbc6', 15, '31', 49, 1, 7.00, 7.00),
(47, '9f8973dac76a4d69322fe076f00397d8', 8, '37', 58, 1, 220.00, 220.00),
(36, 'a331f7f982df4fdf47e5264dd4036db4', 8, '48', 69, 1, 100.00, 100.00),
(46, '0380b5a5084aa79572a01bde6b76de64', 15, '34', 53, 1, 95.00, 95.00),
(48, '4d9b02472a4bed3f293d57fa8948d1e0', 15, '32', 50, 1, 18.00, 18.00),
(55, '4c7a64c7dd28bfe1c543a6d61ed866b0', 2, '3', 3, 1, 9.00, 9.00),
(60, '069deb3b0899e961f26645b7d85c63d0', 15, '31', 49, 1, 7.00, 7.00),
(61, '6ce3d08fb37b0e5f392162084b7fb9f6', 2, '3', 3, 1, 9.00, 9.00),
(62, '85b3d678be7a0e2ec3b60ed112bdd155', 8, '23', 39, 2, 60.00, 120.00),
(63, '85b3d678be7a0e2ec3b60ed112bdd155', 8, '24', 40, 2, 65.00, 130.00);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy_forgot_otp_validator`
--

CREATE TABLE `deliveryboy_forgot_otp_validator` (
  `id` bigint(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `tokens` varchar(50) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `shopkeeper_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(255) NOT NULL,
  `delboy_code` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `shopkeeper_id`, `name`, `username`, `delboy_code`, `phone`, `phone2`, `password`, `address`, `status`, `creation_date`, `modification_date`) VALUES
(1, 2, 'Santosh', 'santosh', 'DELBOY343675', '9541735957', '9571828691', '12345', 'Raj Sweets, Laheria sarai, Darbhanga', 1, '2020-09-29 07:11:15', '2021-03-31 07:16:46'),
(2, 0, '', '', 'DELBOY044796', '', '', '', '', 1, '2021-01-19 13:56:36', '2021-01-19 13:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `fail_payment_order_history`
--

CREATE TABLE `fail_payment_order_history` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `order_type` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `mid` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `txn_amt` decimal(18,2) NOT NULL,
  `pay_mode` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `txn_date` varchar(255) NOT NULL,
  `txn_status` varchar(255) NOT NULL,
  `res_code` varchar(255) NOT NULL,
  `res_message` text NOT NULL,
  `gateway` varchar(255) NOT NULL,
  `bank_txn_id` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `creation_date` varchar(20) NOT NULL DEFAULT '1',
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fail_payment_order_history`
--

INSERT INTO `fail_payment_order_history` (`id`, `ip_address`, `phone`, `order_type`, `payment_type`, `order_id`, `mid`, `txn_id`, `txn_amt`, `pay_mode`, `currency`, `txn_date`, `txn_status`, `res_code`, `res_message`, `gateway`, `bank_txn_id`, `bank_name`, `checksum`, `status`, `creation_date`, `modification_date`) VALUES
(1, '6c69dac58192eaed7c169783bac8b920', '9541735957', 2, '', 'JLPNS1382689', 'tPWyFC22266459414087', '20200929111212800110168283549694195', 8.40, 'NB', 'INR', '2020-09-29 18:01:33.0', 'TXN_FAILURE', '227', 'Your payment has been declined by your bank. Please try again or use a different method to complete the payment.', 'ICICI', '', 'ICICI', '7q3PnuiFgpv3kVxipb879KrZ9zsBlTA8HZoWSxDFC6tyOiEC8gQonEv9Ict94z1myjxzJEVKYoCEx8QXbRvQkNYigeEuYfJ5MgOdc/SC+hE=', 0, '2020-09-29 18:03:43', '2020-09-29 18:03:43'),
(2, '', '', 0, '', 'JLPNS1796689', 'tPWyFC22266459414087', '', 0.00, '', 'INR', '', 'TXN_FAILURE', '1007', 'Missing mandatory element', '', '', '', 'b16o6Cs1NdYmAIQ4uSkfKk+Q4vVHVXqD7UeyytQ5eJaC5BrghHxBXeDzQvt223UCBiuVFs5r+x2hgidcrl5YHN0QmrzTz0IFnJ79636ZV9w=', 0, '2020-10-04 13:01:39', '2020-10-04 13:01:39'),
(3, '6c69dac58192eaed7c169783bac8b920', '9571828691', 2, '', 'JLPNS1898543', 'tPWyFC22266459414087', '', 8.40, '', 'INR', '', 'TXN_FAILURE', '141', 'User has not completed transaction.', '', '', '', 'n4cYLqX6Kqa1pRy2PLBbxS1qAfhe/UwHaLlIzPBGzrXi4oEN3GCKwo2ii20igjISUhUPn/dlRxB64CMM+8JkGPmApN4GBKaaCN5kmUDGFGo=', 0, '2020-10-05 17:23:52', '2020-10-05 17:23:52'),
(4, '31623f1d590a9a1300f4578333352701', '9682124122', 2, '', 'JLPNS2437152', 'tPWyFC22266459414087', '', 262.50, '', 'INR', '', 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', '', '', '', 'Clty668vVaNkaWpqk9p6/YgKLuIFXPgelMWrtGK8wNTB0ZpkDg59W6ZwjdaBbRjm1T0WcGyaLjuYbTxiKXYcAxNL11dapshNFomZRAWpQRE=', 0, '2020-10-11 23:27:05', '2020-10-11 23:27:05'),
(5, '', '7301919976', 1, '', 'JLPNS3103378', 'tPWyFC22266459414087', '', 183.75, '', 'INR', '', 'TXN_FAILURE', '141', 'User has not completed transaction.', '', '', '', '+gCcGDSBKs3kN55DlxG7LwfyGPbUkOAEY2bQko3Mls+QRZ8d86fGMaUfU6LDjUbxdZsZFQ7E26ipbAucKjIIT8Zlxl2CgLs5Zc/XqB9aCCo=', 0, '2020-10-19 15:59:51', '2020-10-19 15:59:51'),
(6, '', '', 0, '', 'JLPNS7765121', 'tPWyFC22266459414087', '', 0.00, '', 'INR', '', 'TXN_FAILURE', '1007', 'Missing mandatory element', '', '', '', 'nab/0lL7+M/fT5vgRHwNUGQ/V1Ddfc23hj+HuCemLZg2Eu//tullKwPPNEwHb3QPjzMyqDZvb99Jg4m+9WnPAUplSvM9vBo++9pV9rxIQ5w=', 0, '2020-12-12 14:55:30', '2020-12-12 14:55:30'),
(7, '', '6200176205', 1, '', 'JLPNS7765119', 'tPWyFC22266459414087', '20201212111212800110168751266502274', 105.00, '', 'INR', '', 'TXN_FAILURE', '141', 'User has not completed transaction.', '', '', '', 'CUirHJf1gAGtd0nHEzJHzpnXD1TyiUE75DCFvlNx5Qn3ytq3vdoPfyXXbaV010Rb2IurA11yGzhmyQqWrmr8wr0heiewNUapAfw7LaFbVug=', 0, '2020-12-12 14:56:02', '2020-12-12 14:56:02'),
(8, '', '', 0, '', 'JLPNS0981940', 'tPWyFC22266459414087', '', 0.00, '', 'INR', '', 'TXN_FAILURE', '1007', 'Missing mandatory element', '', '', '', 'FmdqV894esrWgHeGjOfnQ8DPh+uQKzO9u2YQwTo1rRU2cHwSlCam/+V9stszoY4KtsL9vCaHgoMIOGd2+b2uZ8ow2osR0pS3r5CKHHoFUqg=', 0, '2021-01-18 20:29:08', '2021-01-18 20:29:08'),
(9, '', '9541735957', 1, '', 'JLPNS2101819', 'tPWyFC22266459414087', '20210131111212800110168978279576178', 7.35, '', 'INR', '', 'TXN_FAILURE', '141', 'User has not completed transaction.', '', '', '', 'I2aziWA9scVcHa4EiKuuA5ZhRF1fnwpU+k+MiMf33ckVxVgNDRSa+/iKhPD9d0qIb+y7pLwDcCItSuVIfYRdnQf2QIHVxbTlpYGLD+c+MvY=', 0, '2021-01-31 19:33:56', '2021-01-31 19:33:56'),
(10, '', '', 0, '', 'JLPNS5734533', 'tPWyFC22266459414087', '', 0.00, '', 'INR', '', 'TXN_FAILURE', '1007', 'Missing mandatory element', '', '', '', 'ZLT9BgQOY0Adn4Ary/ZPXobHKHnlYAjZ5S1n+VUQf/EsWSAvjJsWA9EVB9IOKMJtWYPg0MrRGsROy6jCaw6+8lt9KCxL54tFi/PmKBPIoE4=', 0, '2021-03-14 20:39:02', '2021-03-14 20:39:02'),
(11, '', '9541735957', 1, '', 'JLPNS5737581', 'tPWyFC22266459414087', '20210314111212800110168158889559668', 7.14, 'CC', 'INR', '2021-03-14 21:29:43.0', 'TXN_FAILURE', '227', 'Your payment request was declined by your bank. Please try again or use a different payment method to complete the payment', 'ICICIPAY', '70683278950', 'ICICI Bank', 'URl2IzWrW5oXlL7jnOKXTzZ1DjRQcgDdVz/fKFgkWUgxCTFtb60AgRZQebnlV7DjvDwOAk0/oRQpj+h/ys+dptxeH7b1LODi1jwqjFuHIrI=', 0, '2021-03-14 21:30:47', '2021-03-14 21:30:47'),
(12, '', '', 0, '', 'JLPNS8333315', 'tPWyFC22266459414087', '', 0.00, '', 'INR', '', 'TXN_FAILURE', '1007', 'Missing mandatory element', '', '', '', 'oOxb2r0NKTdE/GaQl4sW22I6QNkk6H8jtBnlLbEQyAx+B5f1r6gYcd0Ji4yhvTpU/okjW6z4pxBs6AfY4T0cKQvyCfZLcy1tl+b0tYsPcsU=', 0, '2021-04-13 22:32:07', '2021-04-13 22:32:07'),
(13, '794230f831c8631d86cc7ce663d20cdf', '', 0, '', 'JLPNS0644400', 'tPWyFC22266459414087', '', 0.00, '', 'INR', '', 'TXN_FAILURE', '1007', 'Missing mandatory element', '', '', '', 'UAaeY8pSWbtJCfv1AG4to8FmEX3i9SfMlXQ1AieoIyWgU/uvwSs7L7XiRDoP8do0c8re+6fOCe1ac24PadsXJ+OhUrk/HMnb/dzXQr1lMcQ=', 0, '2021-05-10 16:30:10', '2021-05-10 16:30:10'),
(14, '', '', 0, '', 'JLPNS2434618', 'tPWyFC22266459414087', '', 0.00, '', 'INR', '', 'TXN_FAILURE', '1007', 'Missing mandatory element', '', '', '', 'xSJJEaI/t93oetYYWVqeGLOAVnkOFf31tF10J18oP0uhQwk/sbtXIswrOFihkdJFRXoOXEjI2fWr0KthDdgu/lDwHj0f1P4RVXz/fWW/t7E=', 0, '2021-05-31 09:47:07', '2021-05-31 09:47:07'),
(15, '', '9571828691', 2, '', 'JLPNS2551312', 'tPWyFC22266459414087', '20210601111212800110168948810097883', 7.14, 'NB', 'INR', '2021-06-01 18:11:54.0', 'TXN_FAILURE', '227', 'Your payment has been declined by your bank. Please try again or use a different method to complete the payment.', 'ICICI', '', 'ICICI Bank', '8pp7A3eJVseRVowEiVtaNn0uoVQZ2PajuexsHF6etIfUKmyWTIu1RhdNJBXE+Bc9k68ZPbILhH1+C3PpoInVwh3DiFlqhV1+J6mYn+H5AR8=', 0, '2021-06-01 18:14:17', '2021-06-01 18:14:17'),
(16, '', '9571828691', 2, '', 'JLPNS2551499', 'tPWyFC22266459414087', '20210601111212800110168108609663526', 7.14, 'NB', 'INR', '2021-06-01 18:15:00.0', 'TXN_FAILURE', '227', 'Your payment has been declined by your bank. Please try again or use a different method to complete the payment.', 'ICICI', '', 'ICICI Bank', 'Zdo0WEIMbgq79CutuNvxoCIPequ8+6L6TbxbpfqiwmbCtCEH650XTXQ34APmVaue21YPNg/WuVO3Fi/oMbWec+4fwwNhvcXbtthNYMQ8ffg=', 0, '2021-06-01 18:16:48', '2021-06-01 18:16:48'),
(17, '', '9541735957', 2, '', 'JLPNS2717109', 'tPWyFC22266459414087', '', 7.14, '', 'INR', '', 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', '', '', '', 'g43trkk8c8PQh5pQG3nTibwLfTh3L0RJOEWJ3K0eba21khGrSXuwHXaHyEHq9V3y6024Hi5faYlKCaSPRdypZfMi6zuXfmcyLlsswCjKN4U=', 0, '2021-06-03 17:07:32', '2021-06-03 17:07:32'),
(18, '85b3d678be7a0e2ec3b60ed112bdd155', '9149654458', 2, '', 'JLPNS5577135', 'tPWyFC22266459414087', '20210706111212800110168286219910799', 255.00, '', 'INR', '', 'TXN_FAILURE', '141', 'User has not completed transaction.', '', '', '', 'mBILO2jZxDzSl7oHxdCpHC5e82xWTqlVyAjpI+xz32oM77uH2ZaBLyaKULy+PUTzJNHranEBaOLGifN5tMPGkjCFIhcn/313MpxIXpfiCTk=', 0, '2021-07-06 18:44:00', '2021-07-06 18:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `manage_order_data`
--

CREATE TABLE `manage_order_data` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_type` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_order_data`
--

INSERT INTO `manage_order_data` (`id`, `order_id`, `order_type`, `phone`, `creation_date`) VALUES
(1, 'JLPNS1382689', 2, '9541735957', '2020-09-29 18:01:29'),
(2, 'JLPNS1383142', 2, '7665308240', '2020-09-29 18:09:02'),
(3, 'JLPNS1627425', 2, '9541735957', '2020-10-02 14:00:25'),
(4, 'JLPNS1796687', 2, '9571828691', '2020-10-04 13:01:27'),
(5, 'JLPNS1796689', 0, '', '2020-10-04 13:01:29'),
(6, 'JLPNS1898543', 2, '9571828691', '2020-10-05 17:19:03'),
(7, 'JLPNS1899496', 2, '9571828691', '2020-10-05 17:34:56'),
(8, 'JLPNS2437152', 2, '9682124122', '2020-10-11 22:55:52'),
(9, 'JLPNS2475268', 1, '9682124122', '2020-10-12 09:31:08'),
(10, 'JLPNS2556582', 1, '9541735957', '2020-10-13 08:06:23'),
(11, 'JLPNS2610766', 1, '9571828691', '2020-10-13 23:09:26'),
(12, 'JLPNS2663427', 1, '9149654458', '2020-10-14 13:47:07'),
(13, 'JLPNS2815812', 2, '9571828691', '2020-10-16 08:06:52'),
(14, 'JLPNS3103378', 1, '7301919976', '2020-10-19 15:59:38'),
(15, 'JLPNS3164489', 2, '8252140347', '2020-10-20 08:58:09'),
(16, 'JLPNS6559461', 2, '9682124122', '2020-11-28 16:01:01'),
(17, 'JLPNS7765119', 1, '6200176205', '2020-12-12 14:55:19'),
(18, 'JLPNS7765121', 0, '', '2020-12-12 14:55:21'),
(19, 'JLPNS8899366', 2, '9711136319', '2020-12-25 17:59:26'),
(20, 'JLPNS0876749', 2, '9541735957', '2021-01-17 15:15:49'),
(21, 'JLPNS0981938', 1, '8505873148', '2021-01-18 20:28:58'),
(22, 'JLPNS0981940', 0, '', '2021-01-18 20:29:00'),
(23, 'JLPNS1050958', 1, '9571828691', '2021-01-19 15:39:18'),
(24, 'JLPNS1052002', 1, '9541735957', '2021-01-19 15:56:42'),
(25, 'JLPNS1065592', 2, '9571828691', '2021-01-19 19:43:12'),
(26, 'JLPNS2101819', 1, '9541735957', '2021-01-31 19:33:39'),
(27, 'JLPNS2102058', 1, '9571828691', '2021-01-31 19:37:38'),
(28, 'JLPNS2109383', 1, '9711136319', '2021-01-31 21:39:43'),
(29, 'JLPNS2755378', 2, '9541735957', '2021-02-08 09:06:18'),
(30, 'JLPNS3409499', 1, '9711136319', '2021-02-15 22:48:19'),
(31, 'JLPNS3638023', 2, '9682124122', '2021-02-18 14:17:03'),
(32, 'JLPNS5734530', 2, '9571828691', '2021-03-14 20:38:50'),
(33, 'JLPNS5734533', 0, '', '2021-03-14 20:38:53'),
(34, 'JLPNS5737581', 1, '9541735957', '2021-03-14 21:29:41'),
(35, 'JLPNS5737773', 1, '9571828691', '2021-03-14 21:32:53'),
(36, 'JLPNS8333310', 1, '9711136319', '2021-04-13 22:31:50'),
(37, 'JLPNS8333315', 0, '', '2021-04-13 22:31:55'),
(38, 'JLPNS8333698', 2, '9682124122', '2021-04-13 22:38:18'),
(39, 'JLPNS8337252', 1, '9571828691', '2021-04-13 23:37:32'),
(40, 'JLPNS0132866', 1, '9571828691', '2021-05-04 18:24:26'),
(41, 'JLPNS0644381', 1, '6200235320', '2021-05-10 16:29:41'),
(42, 'JLPNS0644400', 0, '', '2021-05-10 16:30:00'),
(43, 'JLPNS2434223', 2, '9682124122', '2021-05-31 09:40:23'),
(44, 'JLPNS2434616', 2, '9682124122', '2021-05-31 09:46:56'),
(45, 'JLPNS2434618', 0, '', '2021-05-31 09:46:58'),
(46, 'JLPNS2551312', 2, '9571828691', '2021-06-01 18:11:52'),
(47, 'JLPNS2551499', 2, '9571828691', '2021-06-01 18:14:59'),
(48, 'JLPNS2551649', 2, '9571828691', '2021-06-01 18:17:29'),
(49, 'JLPNS2627488', 0, '', '2021-06-02 15:21:28'),
(50, 'JLPNS2638031', 2, '9541735957', '2021-06-02 18:17:11'),
(51, 'JLPNS2717109', 2, '9541735957', '2021-06-03 16:15:09'),
(52, 'JLPNS3853853', 2, '9682124122', '2021-06-16 20:00:53'),
(53, 'JLPNS5577135', 2, '9149654458', '2021-07-06 18:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `order_type` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `shopkeeper_id` bigint(20) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `commission` int(11) NOT NULL DEFAULT 0,
  `agent_commission` decimal(18,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(18,2) NOT NULL,
  `transaction_amount` decimal(18,2) NOT NULL,
  `unlock_opt` varchar(20) DEFAULT NULL,
  `delivery_boy` int(11) NOT NULL DEFAULT 0,
  `assign_date_time` varchar(20) DEFAULT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `auto_cancelled` int(11) NOT NULL DEFAULT 0,
  `action_by` varchar(20) DEFAULT NULL,
  `refund_order_id` varchar(80) DEFAULT NULL,
  `refund` int(11) NOT NULL DEFAULT 0,
  `refund_date` varchar(20) DEFAULT NULL,
  `refund_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `refund_status` varchar(100) DEFAULT NULL,
  `refund_message` text DEFAULT NULL,
  `delivery_date_time` varchar(20) DEFAULT NULL,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `order_type`, `phone`, `shopkeeper_id`, `payment_status`, `payment_id`, `commission`, `agent_commission`, `total_amount`, `transaction_amount`, `unlock_opt`, `delivery_boy`, `assign_date_time`, `order_status`, `auto_cancelled`, `action_by`, `refund_order_id`, `refund`, `refund_date`, `refund_amount`, `refund_status`, `refund_message`, `delivery_date_time`, `creation_date`, `modification_date`, `ip_address`) VALUES
(1, 'JLPNS1383142', 2, '7665308240', 2, 'TXN_SUCCESS', '20200929111212800110168739549310981', 5, 0.25, 8.00, 8.40, '762041', 1, '2020-09-29 18:14:07', 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2020-09-29 18:17:30', '2020-09-29 18:11:56', '2020-09-29 18:14:07', 'dcc2cf2d1478e3ddff96'),
(2, 'JLPNS1627425', 2, '9541735957', 2, 'TXN_SUCCESS', '20201002111212800110168585350948128', 5, 0.25, 8.00, 8.40, '047213', 1, '2020-10-04 12:50:20', 1, 0, 'delivery_boy', NULL, 0, NULL, 0.00, NULL, NULL, '2020-10-04 12:52:59', '2020-10-04 14:01:53', '2020-10-04 12:50:20', 'a269a7d96bfe8d0face7'),
(3, 'JLPNS1796687', 2, '9571828691', 2, 'TXN_SUCCESS', '20201004111212800110168410250045899', 5, 0.25, 8.00, 8.40, '021869', 1, '2020-10-04 13:08:26', 1, 0, 'delivery_boy', NULL, 0, NULL, 0.00, NULL, NULL, '2020-10-05 11:32:44', '2020-10-04 13:04:31', '2020-10-04 13:08:26', '4fa5349ea411ba008562'),
(4, 'JLPNS1899496', 2, '9571828691', 2, 'TXN_SUCCESS', '20201005111212800110168092051150321', 5, 0.25, 8.00, 8.40, '462108', 1, '2020-10-13 08:14:11', 1, 0, 'delivery_boy', NULL, 0, NULL, 0.00, NULL, NULL, '2020-10-13 08:15:13', '2020-10-05 17:36:37', '2020-10-13 08:14:11', 'f9110fc9033cac4cc150'),
(5, 'JLPNS2475268', 1, '9682124122', 8, 'TXN_SUCCESS', '20201012111212800110168494652612016', 5, 0.25, 60.00, 63.00, '480276', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2020-10-12 09:38:03', '2020-10-12 09:31:46', '2020-10-12 09:31:46', '31623f1d590a9a1300f4'),
(6, 'JLPNS2556582', 1, '9541735957', 2, 'TXN_SUCCESS', '20201013111212800110168888852637391', 5, 0.25, 8.00, 8.40, '364081', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2020-10-13 08:10:31', '2020-10-13 08:08:17', '2020-10-13 08:08:17', '3ea50165b1954154e331'),
(7, 'JLPNS2610766', 1, '9571828691', 2, 'TXN_SUCCESS', '20201013111212800110168735152860632', 5, 0.25, 8.00, 8.40, '374016', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2020-10-13 23:12:14', '2020-10-13 23:10:26', '2020-10-13 23:10:26', '528982e5960ec710d861'),
(8, 'JLPNS2663427', 1, '9149654458', 5, 'TXN_SUCCESS', '20201014111212800110168450853061782', 5, 0.25, 5.00, 5.25, '740985', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2020-10-14 13:50:18', '2020-10-14 13:48:22', '2020-10-14 13:48:22', 'ea8e35550f1d1d3f1ddc'),
(9, 'JLPNS2815812', 2, '9571828691', 15, 'TXN_SUCCESS', '20201016111212800110168320153565836', 5, 0.25, 25.00, 26.25, '065914', 0, NULL, 2, 1, 'auto_cancelled', 'JLPNS2815812_18496_REFUND', 1, '2020-10-16 08:07:50.', 6.00, 'TXN_FAILURE', 'BALANCE_NOT_ENOUGH', '2021-01-31 15:01:01', '2021-01-31 11:47:36', '2021-04-02 21:04:21', '9a9c3891ad2b7cb11f94'),
(10, 'JLPNS6559461', 2, '9682124122', 8, 'TXN_SUCCESS', '20201128111212800110168351463537576', 5, 0.25, 400.00, 420.00, '378960', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2020-11-28 16:15:39', '2020-11-28 16:02:12', '2020-11-28 16:02:12', '94ded408fdb879ec9a2a'),
(11, 'JLPNS0876749', 2, '9541735957', 15, 'TXN_SUCCESS', '20210117111212800110168745175822450', 5, 0.25, 7.00, 7.35, '874069', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-01-17 15:22:53', '2021-01-17 15:18:43', '2021-01-17 15:18:43', '8a897de7badb409390c5'),
(12, 'JLPNS1050958', 1, '9571828691', 15, 'TXN_SUCCESS', '20210119111212800110168371475431159', 0, 0.00, 7.00, 7.00, '124906', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-01-19 15:44:54', '2021-01-19 15:40:56', '2021-01-19 15:40:56', 'bf68cbc33736275c118e'),
(13, 'JLPNS1052002', 1, '9541735957', 2, 'TXN_SUCCESS', '20210119111212800110168652276342184', 0, 0.00, 8.00, 8.00, '754821', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-01-19 16:00:13', '2021-01-19 15:58:22', '2021-01-19 15:58:22', 'bf68cbc33736275c118e'),
(14, 'JLPNS1065592', 2, '9571828691', 15, 'TXN_SUCCESS', '20210119111212800110168875176304502', 0, 0.00, 7.00, 7.00, '983651', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-01-19 19:47:35', '2021-01-19 19:44:27', '2021-01-19 19:44:27', 'bf68cbc33736275c118e'),
(15, 'JLPNS2102058', 1, '9571828691', 15, 'TXN_SUCCESS', '20210131111212800110168233879227768', 5, 0.00, 7.00, 7.35, '970518', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-05-25 14:24:23', '2021-01-31 19:38:59', '2021-01-31 19:38:59', '3c4fe60e67a1b2ffc5b7'),
(16, 'JLPNS2109383', 1, '9711136319', 2, 'TXN_SUCCESS', '20210131111212800110168311878684159', 5, 0.00, 8.00, 8.40, '915072', 0, NULL, 0, 0, NULL, NULL, 0, NULL, 0.00, NULL, NULL, NULL, '2021-01-31 21:41:46', '2021-01-31 21:41:46', 'd9491251292722484fca'),
(17, 'JLPNS2755378', 2, '9541735957', 15, 'TXN_SUCCESS', '20210208111212800110168525880669175', 5, 0.00, 7.00, 7.35, '857263', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-02-08 09:14:53', '2021-02-08 09:07:44', '2021-02-08 09:07:44', '2d5051e826a6373f2e8f'),
(18, 'JLPNS3409499', 1, '9711136319', 2, 'TXN_SUCCESS', '20210215111212800110168637082628493', 5, 0.00, 8.00, 8.40, '986170', 0, NULL, 2, 1, 'auto_cancelled', 'JLPNS3409499_70383_REFUND', 1, '2021-02-15 22:48:23.', 8.40, 'TXN_FAILURE', 'BALANCE_NOT_ENOUGH', NULL, '2021-02-15 22:50:57', '2021-04-11 00:00:02', 'd9491251292722484fca'),
(19, 'JLPNS3638023', 2, '9682124122', 8, 'TXN_SUCCESS', '20210218111212800110168702683322231', 5, 0.00, 400.00, 420.00, '031285', 0, NULL, 2, 1, 'auto_cancelled', NULL, 0, NULL, 0.00, NULL, NULL, '2021-02-19 00:00:03', '2021-02-18 14:18:12', '2021-02-19 00:00:03', '77beb443f63954a95183'),
(20, 'JLPNS5734530', 2, '9571828691', 15, 'TXN_SUCCESS', '20210314111212800110168447890020478', 2, 1.00, 25.00, 25.50, '249607', 0, NULL, 2, 1, 'auto_cancelled', 'JLPNS5734530_35956_REFUND', 1, '2021-03-14 20:38:52.', 25.50, 'TXN_FAILURE', 'BALANCE_NOT_ENOUGH', NULL, '2021-03-14 20:40:05', '2021-04-02 21:04:21', '4d9b02472a4bed3f293d'),
(21, 'JLPNS5737773', 1, '9571828691', 15, 'TXN_SUCCESS', '20210314111212800110168228390578114', 2, 1.00, 7.00, 7.14, '704923', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-05-25 14:23:42', '2021-03-14 21:33:55', '2021-03-14 21:33:55', '4d9b02472a4bed3f293d'),
(22, 'JLPNS8333310', 1, '9711136319', 2, 'TXN_SUCCESS', '20210413111212800110168209797911607', 2, 1.00, 8.00, 8.16, '260519', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-04-13 23:03:08', '2021-04-13 22:33:23', '2021-04-13 22:33:23', '11ee1e72da6e03719aea'),
(23, 'JLPNS8337252', 1, '9571828691', 15, 'TXN_SUCCESS', '20210413111212800110168498098269701', 2, 1.00, 7.00, 7.14, '378694', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-05-25 14:22:55', '2021-04-13 23:38:32', '2021-04-13 23:38:32', '51ddf729a9bebb4c7123'),
(24, 'JLPNS0132866', 1, '9571828691', 15, 'TXN_SUCCESS', '20210504111212800110168596003263062', 2, 1.00, 7.00, 7.14, '645103', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-05-04 18:28:40', '2021-05-04 18:25:47', '2021-05-04 18:25:47', '556145622a04129386e1'),
(25, 'JLPNS0644381', 1, '6200235320', 15, 'TXN_SUCCESS', '20210510111212800110168498604774844', 2, 1.00, 7.00, 7.14, '674295', 0, NULL, 1, 0, 'shopkeeper', NULL, 0, NULL, 0.00, NULL, NULL, '2021-05-25 14:22:16', '2021-05-10 16:31:33', '2021-05-10 16:31:33', '556145622a04129386e1'),
(26, 'JLPNS2434223', 2, '9682124122', 2, 'TXN_SUCCESS', '20210531111212800110168452709661629', 2, 1.00, 295.00, 300.90, '976532', 0, NULL, 2, 1, 'auto_cancelled', NULL, 0, NULL, 0.00, NULL, NULL, '2021-05-31 12:00:02', '2021-05-31 09:41:59', '2021-05-31 12:00:02', '6ce3d08fb37b0e5f3921'),
(27, 'JLPNS2434616', 2, '9682124122', 15, 'TXN_SUCCESS', '20210531111212800110168612510238725', 2, 1.00, 7.00, 7.14, '685390', 0, NULL, 2, 1, 'auto_cancelled', NULL, 0, NULL, 0.00, NULL, NULL, '2021-05-31 12:00:02', '2021-05-31 09:48:32', '2021-05-31 12:00:02', '069deb3b0899e961f266'),
(28, 'JLPNS2551649', 2, '9571828691', 15, 'TXN_SUCCESS', '20210601111212800110168777909862690', 2, 1.00, 7.00, 7.14, '975620', 0, NULL, 2, 1, 'auto_cancelled', NULL, 0, NULL, 0.00, NULL, NULL, '2021-06-02 00:00:02', '2021-06-01 18:18:48', '2021-06-02 00:00:02', '27a5dca7cc1d1204fc21'),
(29, 'JLPNS2638031', 2, '9541735957', 15, 'TXN_SUCCESS', '20210602111212800110168184809750776', 2, 1.00, 7.00, 7.14, '751639', 0, NULL, 2, 1, 'auto_cancelled', NULL, 0, NULL, 0.00, NULL, NULL, '2021-06-03 00:00:05', '2021-06-02 18:18:19', '2021-06-03 00:00:05', '069deb3b0899e961f266');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` decimal(18,2) NOT NULL,
  `discount` decimal(18,2) NOT NULL,
  `commission` decimal(18,2) NOT NULL,
  `gst` decimal(18,2) NOT NULL,
  `total_price` decimal(18,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `product_attr_id`, `quantity`, `rate`, `discount`, `commission`, `gst`, `total_price`) VALUES
(1, 'JLPNS1383142', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(2, 'JLPNS1627425', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(3, 'JLPNS1796687', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(4, 'JLPNS1899496', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(5, 'JLPNS2475268', '23', 39, 1, 60.00, 10.00, 0.00, 0.00, 60.00),
(6, 'JLPNS2556582', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(7, 'JLPNS2610766', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(8, 'JLPNS2663427', '26', 42, 1, 5.00, 0.00, 0.00, 0.00, 5.00),
(9, 'JLPNS2815812', '32', 50, 1, 18.00, 2.00, 0.00, 0.00, 18.00),
(10, 'JLPNS2815812', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(11, 'JLPNS6559461', '48', 69, 2, 100.00, 20.00, 0.00, 0.00, 200.00),
(12, 'JLPNS6559461', '47', 68, 2, 100.00, 20.00, 0.00, 0.00, 200.00),
(13, 'JLPNS0876749', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(14, 'JLPNS1050958', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(15, 'JLPNS1052002', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(16, 'JLPNS1065592', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(17, 'JLPNS2102058', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(18, 'JLPNS2109383', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(19, 'JLPNS2755378', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(20, 'JLPNS3409499', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(21, 'JLPNS3638023', '48', 69, 4, 100.00, 20.00, 0.00, 0.00, 400.00),
(22, 'JLPNS5734530', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(23, 'JLPNS5734530', '32', 50, 1, 18.00, 2.00, 0.00, 0.00, 18.00),
(24, 'JLPNS5737773', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(25, 'JLPNS8333310', '3', 3, 1, 8.00, 0.00, 0.00, 0.00, 8.00),
(26, 'JLPNS8337252', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(27, 'JLPNS0132866', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(28, 'JLPNS0644381', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(29, 'JLPNS2434223', '4', 4, 1, 295.00, 5.00, 0.00, 0.00, 295.00),
(30, 'JLPNS2434616', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(31, 'JLPNS2551649', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00),
(32, 'JLPNS2638031', '31', 49, 1, 7.00, 1.00, 0.00, 0.00, 7.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_refund`
--

CREATE TABLE `order_refund` (
  `id` bigint(20) NOT NULL,
  `order_id` varchar(80) NOT NULL,
  `refund_order_id` varchar(80) NOT NULL,
  `ref_id` varchar(80) DEFAULT NULL,
  `signature` varchar(255) NOT NULL,
  `response_timestamp` varchar(100) NOT NULL,
  `txn_timestamp` varchar(80) DEFAULT NULL,
  `refund_timestamp` varchar(25) DEFAULT NULL,
  `order_txn_id` varchar(100) NOT NULL,
  `refund_txn_id` varchar(100) NOT NULL,
  `refund_status` varchar(80) NOT NULL,
  `refund_code` varchar(80) NOT NULL,
  `refund_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_id` varchar(80) DEFAULT NULL,
  `refund_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 1,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_refund`
--

INSERT INTO `order_refund` (`id`, `order_id`, `refund_order_id`, `ref_id`, `signature`, `response_timestamp`, `txn_timestamp`, `refund_timestamp`, `order_txn_id`, `refund_txn_id`, `refund_status`, `refund_code`, `refund_message`, `refund_id`, `refund_amount`, `status`, `creation_date`, `modification_date`) VALUES
(1, 'JLPNS3409499', 'JLPNS3409499_07794_REFUND', 'JLPNS3409499_07794_REFUND', 'c0UllRb2MOUo12HaxZI+4HzAPvFqziqzRmSMj+OuVrPrXClkVZBrAPtdIp/XZEnePvR20ELpwZ87M9jB+jDFfiw/Hz8QLu1R8l/cA7ZdU38=', '1616907795070', '2021-02-15 22:48:23.0', '2021-02-15 22:48:23.0', '20210215111212800110168637082628493', '20210215111212800110168637082628493', 'TXN_FAILURE', '620', 'BALANCE_NOT_ENOUGH', 'JLPNS3409499_07794_REFUND', 8.40, 1, '2021-03-28 11:09:13', '2021-04-11 00:00:02'),
(3, 'JLPNS2815812', 'JLPNS2815812_18496_REFUND', 'JLPNS2815812_18496_REFUND', '3SYsqf2l1mkxdaxHKWhC/IDRaRzQNzAE9OzDsdiBF65puqnRZdyoDrX5silXjSePnI0QmRDZ5FRFPR6DTOP7GWrAkDWTqHP67F2rcY4YbOk=', '1616918497190', '2020-10-16 08:07:50.0', '2020-10-16 08:07:50.0', '20201016111212800110168320153565836', '20201016111212800110168320153565836', 'TXN_FAILURE', '620', 'BALANCE_NOT_ENOUGH', '20210328111212801300168320124967907', 6.00, 1, '2021-03-28 13:31:37', '2021-04-02 21:04:21'),
(4, 'JLPNS5734530', 'JLPNS5734530_35956_REFUND', 'JLPNS5734530_35956_REFUND', 'JmxkO/Is6R07nTDYfimJ4ydlGmO7UZxlalsGdmyLs/FRfcTdVLwNVqotr+bh6s9Tvhjy6j3uJCvzHnW1JAQuZwXyvcYkTOY6yIjgpYiD9Xg=', '1617035956869', '2021-03-14 20:38:52.0', '2021-03-14 20:38:52.0', '20210314111212800110168447890020478', '20210314111212800110168447890020478', 'TXN_FAILURE', '620', 'BALANCE_NOT_ENOUGH', '20210329111212801300168441825004025', 25.50, 1, '2021-03-29 22:09:16', '2021-04-02 21:04:21'),
(5, 'JLPNS3409499', 'JLPNS3409499_70383_REFUND', 'JLPNS3409499_70383_REFUND', 'YaGjuqfoPaW455uGcXYJgG1FQt42ANNYtgS/Gc5KZV2SHVrBEZAF/JjwagjMCYrFpxIU+xxinzCxF4G0rLeHlbUPZ2OBic6QcK/+iZ/pKWU=', '1618070384078', '2021-02-15 22:48:23.0', '2021-02-15 22:48:23.0', '20210215111212800110168637082628493', '20210215111212800110168637082628493', 'TXN_FAILURE', '620', 'BALANCE_NOT_ENOUGH', '20210410111212801300168339328046231', 8.40, 1, '2021-04-10 21:29:45', '2021-04-11 00:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `otp_validator`
--

CREATE TABLE `otp_validator` (
  `id` bigint(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `tokens` varchar(50) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_validator`
--

INSERT INTO `otp_validator` (`id`, `phone`, `tokens`, `otp`, `creation_date`) VALUES
(18, '', 'CY0vEiqPUDIAeyNWt81zOhja4', '691387', '2021-01-15 23:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `payment_order_history`
--

CREATE TABLE `payment_order_history` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `mid` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `txn_amt` decimal(18,2) NOT NULL,
  `pay_mode` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `txn_date` varchar(255) NOT NULL,
  `txn_status` varchar(255) NOT NULL,
  `res_code` varchar(255) NOT NULL,
  `gateway` varchar(255) NOT NULL,
  `bank_txn_id` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `creation_date` varchar(20) NOT NULL DEFAULT '1',
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_order_history`
--

INSERT INTO `payment_order_history` (`id`, `order_id`, `mid`, `txn_id`, `txn_amt`, `pay_mode`, `currency`, `txn_date`, `txn_status`, `res_code`, `gateway`, `bank_txn_id`, `bank_name`, `checksum`, `status`, `creation_date`, `modification_date`) VALUES
(1, 'JLPNS1383142', 'tPWyFC22266459414087', '20200929111212800110168739549310981', 8.40, 'UPI', 'INR', '2020-09-29 18:09:08.0', 'TXN_SUCCESS', '01', 'PPBL', '027318110024', '', 'rgo70DgSsiOCwyiW65F7JoECR4So/UOTD48Ip+nAdG3SAyzh3SG7ROeyZXUTwLIH6o8wTCgb/W9UvNCg92Wv4qHC9jhpAPFl37B/r9EzYhA=', 1, '2020-09-29 18:11:56', '2020-09-29 18:11:56'),
(2, 'JLPNS1627425', 'tPWyFC22266459414087', '20201002111212800110168585350948128', 8.40, 'NB', 'INR', '2020-10-02 14:00:38.0', 'TXN_SUCCESS', '01', 'SBI', 'IGAJNQWJM6', 'SBI', '8rZ9AND5/YilKn/Fp5Qp0ht5GfxKqpdP/g2dTsl+TzzEuP9JsVhTgUv1Zv+UTwYdwUsmkB9kaBYcXZmvVnr992koljpTdQnVR9FcjuUdSEo=', 1, '2020-10-02 14:01:53', '2020-10-02 14:01:53'),
(3, 'JLPNS1796687', 'tPWyFC22266459414087', '20201004111212800110168410250045899', 8.40, 'NB', 'INR', '2020-10-04 13:01:46.0', 'TXN_SUCCESS', '01', 'ICICI', '2089919554', 'ICICI', 'CFqa69BJzJGLhxk1BHC+EdL0yhJoMf96/80tKuxb/gobJbK375dt2QMatvdDsS7hbBwxJGJxX9xj3uDmAKV7I38DNl/0RfMid0EpzObxxwI=', 1, '2020-10-04 13:04:31', '2020-10-04 13:04:31'),
(4, 'JLPNS1899496', 'tPWyFC22266459414087', '20201005111212800110168092051150321', 8.40, 'NB', 'INR', '2020-10-05 17:35:20.0', 'TXN_SUCCESS', '01', 'ICICI', '2091191327', 'ICICI', 'x6bHXmqsMKZSsXrsLgdI/P7+81k+5AWR9yhlu6ADq4qeDzCpsGGyCTJujmmqnDOHO5TjI3VptPPxVtu+BXGDcfwBJMqhNZrh57TIIWt0pZA=', 1, '2020-10-05 17:36:37', '2020-10-05 17:36:37'),
(5, 'JLPNS2475268', 'tPWyFC22266459414087', '20201012111212800110168494652612016', 63.00, 'PPI', 'INR', '2020-10-12 09:31:53.0', 'TXN_SUCCESS', '01', 'WALLET', '145964894428', 'WALLET', 'kQfAT5tRgwKjagWGmuktgLWvZHIjtfwHe0Cu3unyJpdlnntllsXFhDf7PLpyFf2JLy5C10FKwLFQo2V1GtyaSzeUcxEf8UpcpoVUnX+ju3A=', 1, '2020-10-12 09:31:46', '2020-10-12 09:31:46'),
(6, 'JLPNS2556582', 'tPWyFC22266459414087', '20201013111212800110168888852637391', 8.40, 'CC', 'INR', '2020-10-13 08:07:12.0', 'TXN_SUCCESS', '01', 'BOBFSS', '202028771775413', 'ICICI Bank', 'rWOA0jB2vZrbwS+LyAZjvsGCWaOFJ61nx0FPwIPm63WDFs2nOC2q2xrTqjmVHfHJ760ONHyOPk/2sd6fV6LR/7UXSNFnKOsEPWNzElAAdw4=', 1, '2020-10-13 08:08:17', '2020-10-13 08:08:17'),
(7, 'JLPNS2610766', 'tPWyFC22266459414087', '20201013111212800110168735152860632', 8.40, 'CC', 'INR', '2020-10-13 23:10:17.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '69394655036', 'ICICI Bank', 'i62NBCavPTeOVWXdGurjsvifzHmMLmWKkac8x17K7m+72PHEfdHb0H4GDGmK6WRJMPpR7WKK39hVeuHISTe/TBWtqQvKFjcwXMndMGV/dN4=', 1, '2020-10-13 23:10:26', '2020-10-13 23:10:26'),
(8, 'JLPNS2663427', 'tPWyFC22266459414087', '20201014111212800110168450853061782', 5.25, 'UPI', 'INR', '2020-10-14 13:47:58.0', 'TXN_SUCCESS', '01', 'PPBL', '028873138777', '', '9mli/EWhWzwlH7kjSwxt8Wd4l2mDUXcsLfoC5ygKmaVfkz9O5fXlfNWSUA9srXY8dnGL3ngB1a465qIhji8KQboNpH/TW188CH1TXso9qFk=', 1, '2020-10-14 13:48:22', '2020-10-14 13:48:22'),
(9, 'JLPNS2815812', 'tPWyFC22266459414087', '20201016111212800110168320153565836', 26.25, 'CC', 'INR', '2020-10-16 08:07:50.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '69419611677', 'ICICI Bank', 'NqIjiRmkN5SQEWwaJgk9z4rRBC/jRzN4BeWWrOyVVlEQ3QeAJUJwSElt889VVog6ZWB+opPajZ+PtQOiIlLquY0qpo8Rr7UqM02vIaVRSnk=', 1, '2020-10-16 08:08:36', '2020-10-16 08:08:36'),
(10, 'JLPNS6559461', 'tPWyFC22266459414087', '20201128111212800110168351463537576', 420.00, 'NB', 'INR', '2020-11-28 16:01:34.0', 'TXN_SUCCESS', '01', 'SBI', 'IGAJXYYHQ2', 'SBI', '46UnOzcTQsOyWx0p8v71/ZejOyVkPD2BXqKovidxTsXcrE0imX2wZqfBYk6V3KMjpY5NkaNZc9ZSz0xIMq/mWAy/VxUASrJCRYIppKbk9Ec=', 1, '2020-11-28 16:02:12', '2020-11-28 16:02:12'),
(11, 'JLPNS0876749', 'tPWyFC22266459414087', '20210117111212800110168745175822450', 7.35, 'NB', 'INR', '2021-01-17 15:15:52.0', 'TXN_SUCCESS', '01', 'ICICI', '0022846297', 'ICICI', 'v8rhhMzmXSWxgJxrgkH0qwugyE/5IR93UGstGY6yDRt0amBGfQbGpeHaAJNdHByCADWNUTyxeb4Y4YhiqeEmZcCnLeBD4oEwQLh/CPGtQgg=', 1, '2021-01-17 15:18:43', '2021-01-17 15:18:43'),
(12, 'JLPNS1050958', 'tPWyFC22266459414087', '20210119111212800110168371475431159', 7.00, 'CC', 'INR', '2021-01-19 15:39:25.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '70257354075', 'ICICI Bank', 'DSk7tSOLjdZhCixsY3/XzL0iy78/QNUZ9qfKMrtWTcfh7/v8q2FXjvGUfiaqdjlDn/XwQaFL6q3BoECB6HkauVSZb8Mz0fycnJUkQew++7A=', 1, '2021-01-19 15:40:56', '2021-01-19 15:40:56'),
(13, 'JLPNS1052002', 'tPWyFC22266459414087', '20210119111212800110168652276342184', 8.00, 'NB', 'INR', '2021-01-19 15:56:44.0', 'TXN_SUCCESS', '01', 'SBI', 'IGAKHOCJO1', 'SBI', 'yOZ0pc+hUr3kghU+QE535yt5HAJsxgIaERisDS+rxPXP3X4B1DEALAtkDTmRkZm2OQaD6SO9EBP2dsPESdhFRejeJNYxDZWyXrtZ8NPA1K4=', 1, '2021-01-19 15:58:22', '2021-01-19 15:58:22'),
(14, 'JLPNS1065592', 'tPWyFC22266459414087', '20210119111212800110168875176304502', 7.00, 'CC', 'INR', '2021-01-19 19:43:13.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '70259334030', 'ICICI Bank', 'MLaaD2xztaG0T7USt/uXxY21jr+uym2Lpyl/Sqy2qNRFOUjFKqkQMjWeL70A/InPbEhv5VsHq2p7kQ9NTg+DecW8rukqMRxTLe/dYB0S7Oc=', 1, '2021-01-19 19:44:27', '2021-01-19 19:44:27'),
(15, 'JLPNS2102058', 'tPWyFC22266459414087', '20210131111212800110168233879227768', 7.35, 'CC', 'INR', '2021-01-31 19:37:40.0', 'TXN_SUCCESS', '01', 'BOBFSS', '202103199189930', 'ICICI Bank', 'EqCVJW92hFWuNcYlGOCVwQFuygRPaxWsYwJuQhAdO7pEOXp+TmyGyIoCR1r2Xs06QTZqYZ74GFjjITxos7SCE5q86u6gD9d2HtDFTN8Faro=', 1, '2021-01-31 19:38:59', '2021-01-31 19:38:59'),
(16, 'JLPNS2109383', 'tPWyFC22266459414087', '20210131111212800110168311878684159', 8.40, 'PPI', 'INR', '2021-01-31 21:39:46.0', 'TXN_SUCCESS', '01', 'WALLET', '152074169227', 'WALLET', 'zwiWpSHPNsJMovUYZYrl05q8Og/3qLhj+YoLXhf8PlUHDZmHSFFAX+s+gq0LY0VazHGOH7nCV/ECE2R7i6qh4GMrvE9SrzIQCMKrtYWCKTw=', 1, '2021-01-31 21:41:46', '2021-01-31 21:41:46'),
(17, 'JLPNS2755378', 'tPWyFC22266459414087', '20210208111212800110168525880669175', 7.35, 'CC', 'INR', '2021-02-08 09:06:21.0', 'TXN_SUCCESS', '01', 'SBIFSS', '202103972269200', 'ICICI Bank', 'jvBGWCWu9gSCFpoOh4HDNpF9SdU6PHv9us66q7mHpkAQmQYYe4ZWFY2Y4I/QDSf3mr4vJRcDs74hRKImy/8wrxI2Q76pBmhqXX5U51DKNF8=', 1, '2021-02-08 09:07:44', '2021-02-08 09:07:44'),
(18, 'JLPNS3409499', 'tPWyFC22266459414087', '20210215111212800110168637082628493', 8.40, 'PPI', 'INR', '2021-02-15 22:48:23.0', 'TXN_SUCCESS', '01', 'WALLET', '152947281028', 'WALLET', '8KC0fxEARTpemZpZWsKlcNZKwu9y3ATf7x5ckPKD+7nKMyHkctIy2ZWNNw1pSNZtB74v9Zp/wPzrGSHLfjog04cjNJ6biui3Qj2RmQW16Os=', 1, '2021-02-15 22:50:57', '2021-02-15 22:50:57'),
(19, 'JLPNS3638023', 'tPWyFC22266459414087', '20210218111212800110168702683322231', 420.00, 'UPI', 'INR', '2021-02-18 14:17:05.0', 'TXN_SUCCESS', '01', 'PPBL', '104914040062', '', 'yeQ3rESbXGG5Z8cJnpYIArFxQsRIJ/0mLEfnRfFd+3GOd/a+NlYm2LX/7X1KbHnvSKrDEZUZZzMbAu1+uMTNwmUJyhUZRrZ2cAIC36Aphzk=', 1, '2021-02-18 14:18:12', '2021-02-18 14:18:12'),
(20, 'JLPNS5734530', 'tPWyFC22266459414087', '20210314111212800110168447890020478', 25.50, 'CC', 'INR', '2021-03-14 20:38:52.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '70682894757', 'ICICI Bank', 'LtCt9cyP6FCdbiVnfEt73qMas9rvLo+ZK8rwmcGn2bLKiHUDAcFH8r6E937kw0gd9Pkidk58O77CEhEOebIUL/ir1nB29bxgRln60wh0eNI=', 1, '2021-03-14 20:40:05', '2021-03-14 20:40:05'),
(21, 'JLPNS5737773', 'tPWyFC22266459414087', '20210314111212800110168228390578114', 7.14, 'CC', 'INR', '2021-03-14 21:32:56.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '70683301470', 'ICICI Bank', 'jmyK4uobm0rV7XOlSIMpAAaK0WOlXoXy+0gEj/gbv5StV9vk2kj9qCemZEhLa6g6qUvT1FIQK08CdMUHWpn8adF/l8of8YGdYh0CMGyEOVU=', 1, '2021-03-14 21:33:55', '2021-03-14 21:33:55'),
(22, 'JLPNS8333310', 'tPWyFC22266459414087', '20210413111212800110168209797911607', 8.16, 'UPI', 'INR', '2021-04-13 22:31:59.0', 'TXN_SUCCESS', '01', 'PPBLC', '110377332123', '', 'Podim7ujwgQ6DVQsUZKAhsgfYo+EGrcz3d+mSO0y+TWrEMMrwnl01O4h6WRUvnXqXQWxxqX8HrUETsnCkWswbn8l1Vs50DNQaILHdoulm7o=', 1, '2021-04-13 22:33:23', '2021-04-13 22:33:23'),
(23, 'JLPNS8337252', 'tPWyFC22266459414087', '20210413111212800110168498098269701', 7.14, 'CC', 'INR', '2021-04-13 23:37:33.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '70893954354', 'ICICI Bank', 'QoL5HYitcJ0AJVhVdM24mJIpCoz0tsbL1IFoxlGixSd6L9fvITB6IHLfldkYT4hJG8n/2cZH/S2EZabbAVOyRVqk83zlB17VmZH09Z58QIQ=', 1, '2021-04-13 23:38:32', '2021-04-13 23:38:32'),
(24, 'JLPNS0132866', 'tPWyFC22266459414087', '20210504111212800110168596003263062', 7.14, 'CC', 'INR', '2021-05-04 18:24:29.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '71044680198', 'ICICI Bank', 'z9VMrUmBqhEhBPQmGDkqvDKLmsOfBK84VmrxHPrzrbApUMa8GO610FREXN403Pfdv5/mo8+vewo1X69kJNFqQOPcFB6GeZrbDBYZQ6tpoY8=', 1, '2021-05-04 18:25:47', '2021-05-04 18:25:47'),
(25, 'JLPNS0644381', 'tPWyFC22266459414087', '20210510111212800110168498604774844', 7.14, 'CC', 'INR', '2021-05-10 16:29:43.0', 'TXN_SUCCESS', '01', 'ICICIPAY', '71087882113', 'ICICI Bank', 'MaL1ZYwL/NpfORjxU7cUaj9rJwyWc2R7dxLWyYob2mdMOGNnHYXvnG2f4/f5qW8aeY+O7HqPKKmxIMKMBkt2yvpyY4tJtwu9uVuugmQwrs0=', 1, '2021-05-10 16:31:33', '2021-05-10 16:31:33'),
(26, 'JLPNS2434223', 'tPWyFC22266459414087', '20210531111212800110168452709661629', 300.90, 'NB', 'INR', '2021-05-31 09:40:25.0', 'TXN_SUCCESS', '01', 'SBI', 'IGALFIKGT3', 'State Bank of India', 'Pb/wxRY43KqgMs0VBLaCQOuAqgqoB8dkWiOsvpq+FIgJo7ba/uFEprfwq/EgN4IOtbVQUBXgsd4NNlicp9/RZ1UexkmiSTcR7sdqBMZDIFs=', 1, '2021-05-31 09:41:59', '2021-05-31 09:41:59'),
(27, 'JLPNS2434616', 'tPWyFC22266459414087', '20210531111212800110168612510238725', 7.14, 'NB', 'INR', '2021-05-31 09:46:57.0', 'TXN_SUCCESS', '01', 'ICICI', '0124967928', 'ICICI Bank', 'KMVaVwuUNDRfOOucsc6xYGm8stkwJioZObkuGc8yPD4ivSHudgAqDYR72qbLSUh4apsmCIH4RVJmq2i/PmQAS2jF8S/rftTV/aKh+wsu8Tg=', 1, '2021-05-31 09:48:32', '2021-05-31 09:48:32'),
(28, 'JLPNS2551649', 'tPWyFC22266459414087', '20210601111212800110168777909862690', 7.14, 'NB', 'INR', '2021-06-01 18:17:30.0', 'TXN_SUCCESS', '01', 'SBI', 'IGALFPXIA0', 'State Bank of India', 'GcgV46/35bNvVLzxp2HPrbbIxf9B4SsgwVaNh6k2HtD0zTHn33AzwOjk4ic++t3O1/D2j8xRvENR8aEqAYaAD6uWArPjH3D0CYH5OXXjcXY=', 1, '2021-06-01 18:18:48', '2021-06-01 18:18:48'),
(29, 'JLPNS2638031', 'tPWyFC22266459414087', '20210602111212800110168184809750776', 7.14, 'NB', 'INR', '2021-06-02 18:17:13.0', 'TXN_SUCCESS', '01', 'ICICI', '0127788474', 'ICICI Bank', '3PuWSrG6/vj2t9HvJ/m1li+pQNgOTvUP0KMMKO036Z9ncYbQUmDCf0a9nliSmuA9KKavAnBcI1wr6HiQJz5clfPlxiCWl1mBb7nK/3/yflE=', 1, '2021-06-02 18:18:19', '2021-06-02 18:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_otp_validator`
--

CREATE TABLE `payment_otp_validator` (
  `id` bigint(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `tokens` varchar(50) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_otp_validator`
--

INSERT INTO `payment_otp_validator` (`id`, `phone`, `tokens`, `otp`, `creation_date`) VALUES
(2, '9149654459', 'e8fCTO5Yy7H6sMhSdZiDlNLxJ', '503216', '2020-09-29 18:07:06'),
(24, '', 'TyakoUVlcRz2wdtumGePqv54S', '759182', '2021-01-23 06:58:32'),
(26, '9610534411', 'rqedmZf6IgGK15iX2vkbC7084', '904632', '2021-01-31 15:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `paytm_payout_history`
--

CREATE TABLE `paytm_payout_history` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `acount_number` varchar(100) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `response_status` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `response_message` text DEFAULT NULL,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paytm_payout_history`
--

INSERT INTO `paytm_payout_history` (`id`, `order_id`, `user_type`, `user_id`, `account_id`, `acount_number`, `ifsc_code`, `amount`, `response_status`, `status`, `response_message`, `creation_date`, `modification_date`) VALUES
(1, 'JLPNSSPAY492586', 1, 8, 8, '0048010359924', 'PUNB0720900', 60.00, 'FAILURE', 1, 'Invalid account number or IFSC code', '2020-10-12 14:19:47', '2020-10-12 14:19:47'),
(2, 'JLPNSSPAY555014', 1, 2, 2, '30094680550', 'SBIN0001224', 5.00, 'FAILURE', 1, 'Beneficiary bank is down. Please try after some time', '2020-10-13 07:40:15', '2020-10-13 07:40:15'),
(3, 'JLPNSSPAY579460', 1, 2, 2, '30094680550', 'SBIN0001224', 5.00, 'FAILURE', 1, 'Beneficiary bank is down. Please try after some time', '2020-10-13 14:27:41', '2020-10-13 14:27:41'),
(4, 'JLPNSSPAY608633', 1, 2, 2, '30094680550', 'SBIN0001224', 30.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2020-10-13 22:33:54', '2020-10-13 22:33:54'),
(5, 'JLPNSSPAY610424', 1, 8, 8, '0048010359924', 'PUNB0720900', 60.00, 'FAILURE', 1, 'Invalid account number or IFSC code', '2020-10-13 23:03:44', '2020-10-13 23:03:44'),
(6, 'JLPNSSPAY610967', 1, 2, 2, '30094680550', 'SBIN0001224', 8.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2020-10-13 23:12:47', '2020-10-13 23:12:47'),
(7, 'JLPNSSPAY664505', 1, 5, 15, '023401539120', 'ICIC0000797', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2020-10-14 14:05:05', '2020-10-14 14:05:05'),
(8, 'JLPNSSPAY277686', 1, 8, 8, '0048010359924', 'PUNB0720900', 60.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2020-10-21 16:24:46', '2020-10-21 16:24:46'),
(9, 'JLPNSSPAY509358', 1, 8, 18, '0048010359924', 'UBIB0720900', 460.00, 'FAILURE', 1, 'Invalid IFSC code', '2020-12-09 15:52:39', '2020-12-09 15:52:39'),
(10, 'JLPNSSPAY510056', 1, 8, 19, '48010359924', 'UBIB0720900', 460.00, 'FAILURE', 1, 'Invalid IFSC code', '2020-12-09 16:04:16', '2020-12-09 16:04:16'),
(11, 'JLPNSSPAY966340', 1, 8, 19, '48010359924', 'UBIB0720900', 460.00, 'FAILURE', 1, 'Invalid IFSC code', '2020-12-14 22:49:00', '2020-12-14 22:49:00'),
(12, 'JLPNSSPAY822667', 1, 8, 20, '48010359924', 'PUNB0004820', 460.00, 'FAILURE', 1, 'Invalid account number or IFSC code', '2020-12-24 20:41:07', '2020-12-24 20:41:07'),
(13, 'JLPNSSPAY983662', 1, 15, 17, '30094680550', 'SBIN0001229', 7.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-18 20:57:42', '2021-01-18 20:57:42'),
(14, 'JLPNSSPAY051326', 1, 15, 17, '30094680550', 'SBIN0001229', 7.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-19 15:45:27', '2021-01-19 15:45:27'),
(15, 'JLPNSSPAY052527', 1, 2, 2, '30094680550', 'SBIN0001224', 8.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-19 16:05:27', '2021-01-19 16:05:27'),
(16, 'JLPNSSPAY065901', 1, 15, 17, '30094680550', 'SBIN0001229', 14.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-19 19:48:21', '2021-01-19 19:48:21'),
(17, 'JLPNSSPAY487010', 1, 10, 10, '919010062812759', 'UTIB0000296', 5.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2021-01-24 16:46:51', '2021-01-24 16:46:51'),
(18, 'JLPNSSPAY490340', 1, 10, 10, '919010062812759', 'UTIB0000296', 6.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2021-01-24 17:42:20', '2021-01-24 17:42:20'),
(19, 'JLPNSSPAY490432', 1, 10, 10, '919010062812759', 'UTIB0000296', 5.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2021-01-24 17:43:52', '2021-01-24 17:43:52'),
(20, 'JLPNSSPAY492341', 1, 10, 10, '919010062812759', 'UTIB0000296', 2.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2021-01-24 18:15:42', '2021-01-24 18:15:42'),
(21, 'JLPNSAPAY493324', 2, 6, 2, '30094680550', 'SBIN0001229', 8.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2021-01-24 18:32:04', '2021-01-24 18:32:04'),
(22, 'JLPNSSPAY495890', 1, 10, 10, '919010062812759', 'UTIB0000296', 10.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2021-01-24 19:14:50', '2021-01-24 19:14:50'),
(23, 'JLPNSSPAY497914', 1, 10, 10, '919010062812759', 'UTIB0000296', 5.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2021-01-24 19:48:34', '2021-01-24 19:48:34'),
(24, 'JLPNSSPAY498106', 1, 10, 10, '919010062812759', 'UTIB0000296', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-24 19:51:46', '2021-01-24 19:51:46'),
(25, 'JLPNSSPAY498174', 1, 15, 17, '30094680550', 'SBIN0001229', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-24 19:52:54', '2021-01-24 19:52:54'),
(26, 'JLPNSSPAY668505', 1, 15, 17, '30094680550', 'SBIN0001229', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-26 19:11:46', '2021-01-26 19:11:46'),
(27, 'JLPNSSPAY024951', 1, 10, 10, '919010062812759', 'UTIB0000296', 2.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-30 22:12:32', '2021-01-30 22:12:32'),
(28, 'JLPNSSPAY025024', 1, 10, 10, '919010062812759', 'UTIB0000296', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-30 22:13:44', '2021-01-30 22:13:44'),
(29, 'JLPNSSPAY028008', 1, 8, 21, '32238882927', 'SBIN0002912', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-30 23:03:28', '2021-01-30 23:03:28'),
(30, 'JLPNSSPAY028311', 1, 15, 17, '30094680550', 'SBIN0001229', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-01-30 23:08:32', '2021-01-30 23:08:32'),
(31, 'JLPNSSPAY754587', 1, 15, 17, '30094680550', 'SBIN0001229', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-02-08 08:53:08', '2021-02-08 08:53:08'),
(32, 'JLPNSSPAY943220', 1, 15, 17, '30094680550', 'SBIN0001229', 5.00, 'FAILURE', 1, 'Disbursal to bank account failed. Please try after some time', '2021-02-10 13:17:00', '2021-02-10 13:17:00'),
(33, 'JLPNSSPAY410149', 1, 10, 10, '919010062812759', 'UTIB0000296', 3.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-02-15 22:59:09', '2021-02-15 22:59:09'),
(34, 'JLPNSSPAY436004', 1, 15, 17, '30094680550', 'SBIN0001229', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-02-16 06:10:05', '2021-02-16 06:10:05'),
(35, 'JLPNSSPAY532983', 1, 2, 2, '30094680550', 'SBIN0001224', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-02-28 22:53:03', '2021-02-28 22:53:03'),
(36, 'JLPNSSPAY533112', 1, 8, 21, '32238882927', 'SBIN0002912', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-02-28 22:55:12', '2021-02-28 22:55:12'),
(37, 'JLPNSSPAY944845', 1, 8, 21, '32238882927', 'SBIN0002912', 420.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-03-17 07:04:06', '2021-03-17 07:04:06'),
(38, 'JLPNSSPAY336317', 1, 2, 2, '30094680550', 'SBIN0001224', 8.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-04-13 23:21:57', '2021-04-13 23:21:57'),
(39, 'JLPNSSPAY337407', 1, 2, 2, '30094680550', 'SBIN0001224', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-04-13 23:40:07', '2021-04-13 23:40:07'),
(40, 'JLPNSSPAY337850', 1, 2, 2, '30094680550', 'SBIN0001224', 5.00, 'SUCCESS', 1, 'Successful disbursal to Bank Account is done', '2021-04-13 23:47:30', '2021-04-13 23:47:30'),
(41, 'JLPNSSPAY932934', 1, 15, 17, '30094680550', 'SBIN0001229', 102.00, 'FAILURE', 1, 'Account balance is low. Please add funds and try again.', '2021-05-25 14:25:35', '2021-05-25 14:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopkeeper_id` bigint(20) NOT NULL,
  `unique_product` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `shopkeeper_id`, `unique_product`, `description`, `status`, `creation_date`, `modification_date`) VALUES
(1, 'रसगुल्ले', 1, 'yjJAGZTFC9', 'TESTY,FRESH,DELICIOUS ', 1, '2020-09-27 18:51:20', '2020-09-27 18:51:20'),
(2, 'SAMOUSA', 1, 'XrjOdGZvxI', 'FRESH,TESTY & DELICIOUS', 1, '2020-09-27 18:53:56', '2020-09-27 18:53:56'),
(3, 'SAMOUSA', 2, 'pjGhz6QSot', 'TESTY,FRESH & DELICIOUS', 1, '2020-09-27 20:14:45', '2020-09-27 20:14:45'),
(4, 'RASGULA', 2, 'shbFeHJ7K8', 'FRESH,TESTY & DELICIOUS', 1, '2020-09-28 08:26:24', '2020-09-28 08:26:24'),
(5, 'RASGOLA', 4, 'BXeViAhCOu', 'TESTY', 1, '2020-09-28 18:16:07', '2020-09-28 18:16:07'),
(6, 'JALEBI', 5, 'dzHGXxjprF', '', 1, '2020-09-30 14:08:12', '2020-09-30 14:08:12'),
(7, 'GULAB JAMUN', 6, 'H5tiWMyxkE', 'FRESH,TESTY AND DELICIOUS ', 1, '2020-10-01 10:45:29', '2020-10-01 10:45:29'),
(8, 'SPRITE', 6, '0TcW1IJNSd', 'FRESH', 1, '2020-10-01 10:47:07', '2020-10-01 10:47:07'),
(9, 'LADDU', 6, 'f7yWhYvqmJ', 'FRESH,TESTY AND DELICIOUS', 1, '2020-10-01 10:48:32', '2020-10-01 10:48:32'),
(10, 'HALDIRAM NAMKEEN MIXTURE', 6, '64ysZ3onL5', 'FRESH,TESTY AND DELICIOUS', 1, '2020-10-01 10:50:27', '2020-10-01 10:50:27'),
(11, 'AMUL MILK GOLD', 6, 'yFrAIjWbR6', 'FRESH,TESTY AND DELICIOUS', 1, '2020-10-01 10:53:17', '2020-10-01 10:53:17'),
(12, 'SPRITE', 7, 'ptYPJEZc2R', 'FRESH & TESTY', 1, '2020-10-01 13:05:42', '2020-10-01 13:05:42'),
(13, 'GULAB JAMUN', 7, 'aFLObJHw20', 'FRESH,TESTY & DELICIOUS', 1, '2020-10-01 20:43:37', '2020-10-01 20:43:37'),
(14, 'LADDU', 7, 'mlP4fDdghz', 'FRESH ,TESTY AND DELICIOUS', 1, '2020-10-01 20:47:21', '2020-10-01 20:47:21'),
(15, 'HALDIRAM MIXTURE', 7, '2G0KjnFPxS', 'HALDIRAM MIXTURE,TESTY', 1, '2020-10-01 20:50:38', '2020-10-01 20:50:38'),
(16, 'SAMOUSA', 9, 'iOsuWjlYCF', 'FRESH ,TESTY AND DELICIOUS', 1, '2020-10-02 15:06:20', '2020-10-02 15:06:20'),
(17, 'LADDU', 9, 'ZebSnClYF7', '', 1, '2020-10-02 17:22:56', '2020-10-02 17:22:56'),
(18, 'LADDU', 2, 'qoXsDiTAWK', '', 1, '2020-10-02 17:24:24', '2020-10-02 17:24:24'),
(19, 'GULAB JAMUN', 11, 'hGL7MYv49K', 'FRESH ,TESTY & DELICIOUS', 1, '2020-10-04 18:07:07', '2020-10-04 18:07:07'),
(20, 'LADDU', 11, 'JqLZ2MrvoH', 'TESTY ,FRSH AND DELICIOUS', 1, '2020-10-04 18:13:25', '2020-10-04 18:13:25'),
(21, 'laddu', 12, 'jbJRfDEzn6', 'testy', 1, '2020-10-04 18:22:28', '2020-10-04 18:22:28'),
(22, 'LADDU', 13, 'DZtsMBipv7', 'TESTY', 1, '2020-10-04 18:47:41', '2020-10-04 18:47:41'),
(23, 'Paneer without cream', 8, 'NtakoK9JuG', 'Good for party', 1, '2020-10-11 22:28:27', '2020-10-11 22:28:27'),
(24, 'Paneer with half cream', 8, 'KoB90N5eOb', 'Better', 1, '2020-10-11 22:47:38', '2020-10-11 22:47:38'),
(25, 'Paneer with full cream', 8, '3XiEUaJuTO', 'Good quality and good test for daily usse.', 1, '2020-10-11 22:48:51', '2020-10-11 22:48:51'),
(26, 'Kazu barfi', 5, 'IFNYhu7aZG', '', 1, '2020-10-14 13:43:23', '2020-10-14 13:43:23'),
(27, 'SAMOUSA', 14, 'ulpx9Nh1mT', 'TESTY,FRESH AND DELICIOUS ', 1, '2020-10-15 22:07:01', '2020-10-15 22:07:01'),
(28, 'GULAB JAMUN', 14, 'ZTaNezhI02', 'TESTY ,FRESH AND DELICIOUS', 1, '2020-10-15 22:08:30', '2020-10-15 22:08:30'),
(29, 'LADDU', 14, 'nMq6B9s2FH', 'TESTY ,FRESH AND DELICIOUS', 1, '2020-10-15 22:10:44', '2020-10-15 22:10:44'),
(30, 'AMUL GOLD MILK', 14, 'e8YOP6UnLw', 'FRESH', 1, '2020-10-15 22:11:32', '2020-10-15 22:11:32'),
(31, 'SAMOUSA', 15, '4YJGTpchjI', 'TESTY,HOT AND DELICIOUS', 1, '2020-10-16 06:56:14', '2020-10-16 06:56:14'),
(32, 'BURGER', 15, 'yljrMbg4nR', 'TESTY, FRESH AND DELICIOUS', 1, '2020-10-16 06:57:40', '2020-10-16 06:57:40'),
(33, 'GULAB JAMUN', 15, 'ZbYqnGDIuA', 'FRESH AND TESTY', 1, '2020-10-16 06:58:31', '2020-10-16 06:58:31'),
(34, 'COCA COLA', 15, '6OtPfaQCLD', '', 1, '2020-10-16 07:00:35', '2020-10-16 07:00:35'),
(35, 'HALDIRAM MIXTURE NAMKEEN', 15, 'ltquIW36SH', 'TESTY', 1, '2020-10-16 07:02:34', '2020-10-16 07:02:34'),
(36, 'AMUL GOLD MILK', 15, '3lzdg6D9uU', 'FRESH', 1, '2020-10-16 07:03:56', '2020-10-16 07:03:56'),
(37, 'Tapovan cashew', 8, 'N0OipknUJQ', 'Y240 good quality and large size ', 1, '2020-10-18 21:20:04', '2020-10-18 21:20:04'),
(38, 'Naturoz walnuts', 8, 'j0ba4Eg1zy', 'Best quality and cheap price', 1, '2020-10-18 21:23:19', '2020-10-18 21:23:19'),
(39, 'Naturoz walnuts', 8, 'FOJTs90GqA', 'Best quality and large size', 1, '2020-10-18 21:24:40', '2020-10-18 21:24:40'),
(40, 'Naturoz pistachio', 8, 'jYgyU4Rpm0', 'Better and salty', 0, '2020-10-18 21:36:12', '2020-10-18 21:36:12'),
(41, 'Afghan anjeer', 8, 'HOIViJMh7Y', 'Better for sugar patients', 0, '2020-10-18 21:38:58', '2020-10-18 21:38:58'),
(42, 'Naturoz mix dry fruits', 8, 'G4NxP6Y7VK', 'All dry fruits mix ', 1, '2020-10-18 21:41:05', '2020-10-18 21:41:05'),
(43, 'Naturoz California almonds', 8, 'zFoxNQZPX2', 'Good quality and large size', 1, '2020-10-19 06:04:29', '2020-10-19 06:04:29'),
(44, 'Naturoz badam gurbandi giri', 8, 'gBcKvTCwJq', 'Real badam and small size', 1, '2020-10-19 06:07:42', '2020-10-19 06:07:42'),
(45, 'Naturoz dry dates', 8, 'rvtKygeTqp', 'Black dry date ', 1, '2020-10-19 06:12:30', '2020-10-19 06:12:30'),
(46, 'Naturoz dry dates', 8, 'dL7nzDYHBl', 'Bl', 1, '2020-10-19 06:13:37', '2020-10-19 06:13:37'),
(47, 'Khajur', 8, 'XC97n4mLvJ', 'Best quality', 1, '2020-11-28 15:56:07', '2020-11-28 15:56:07'),
(48, 'Soan papdi', 8, 'yFewIQgrxf', 'Testy soan papdi', 1, '2020-11-28 15:58:00', '2020-11-28 15:58:00'),
(49, 'Real gold cashew ', 8, 'yOTLuktWZ8', 'Better quality 👌', 1, '2020-11-28 21:22:40', '2020-11-28 21:22:40'),
(50, '', 0, 'pwDb5rRyO8', '', 1, '2021-01-19 13:46:19', '2021-01-19 13:46:19'),
(51, '', 0, 'HfvgLjuwJU', '', 1, '2021-05-28 03:24:11', '2021-05-28 03:24:11'),
(52, '', 0, 'krjLcASVHd', '', 1, '2021-06-20 09:56:59', '2021-06-20 09:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rate` decimal(18,2) NOT NULL,
  `gst` decimal(18,2) NOT NULL,
  `discount` decimal(18,2) NOT NULL,
  `comission` decimal(18,2) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `name`, `quantity`, `unit`, `image`, `rate`, `gst`, `discount`, `comission`, `amount`, `status`, `creation_date`, `modification_date`) VALUES
(1, 1, 'रसगुल्ले ', 1, 3, '1601212880sgOACDocF3.jpg', 8.00, 0.00, 0.00, 0.00, 8.00, 0, '2020-09-27 18:51:20', '2020-09-27 18:51:20'),
(2, 2, 'SAMOUSA', 1, 3, '1601213035JZ3WiUtvp2.jpg', 8.00, 0.00, 0.00, 0.00, 8.00, 1, '2020-09-27 18:53:56', '2020-09-27 18:53:56'),
(3, 3, 'SAMOUSA', 1, 3, '1601217885mj5r49tUE6.jpg', 9.00, 0.00, 0.00, 0.00, 9.00, 1, '2020-09-27 20:14:45', '2021-05-10 17:03:12'),
(4, 4, 'RASGULA', 1, 2, '1601261784k5zD10rbgV.jpg', 300.00, 0.00, 5.00, 0.00, 295.00, 1, '2020-09-28 08:26:24', '2020-09-28 08:26:24'),
(5, 4, NULL, 500, 1, '16012626120EkGlPAFo2.jpg', 150.00, 0.00, 2.00, 0.00, 148.00, 1, '2020-09-28 08:40:12', '2020-09-28 08:40:12'),
(6, 5, 'RASGOLA', 1, 2, '1601297167EUMjxOCpTS.jpg', 300.00, 0.00, 5.00, 0.00, 295.00, 1, '2020-09-28 18:16:07', '2020-09-28 18:16:07'),
(7, 5, NULL, 500, 1, '1601297207LNkujfg2XS.jpg', 150.00, 0.00, 2.00, 0.00, 148.00, 1, '2020-09-28 18:16:47', '2020-09-28 18:16:47'),
(8, 6, 'JALEBI', 1, 2, '16014550921EpQJFOKSc.jpg', 120.00, 0.00, 0.00, 0.00, 120.00, 1, '2020-09-30 14:08:12', '2020-09-30 14:08:12'),
(9, 6, NULL, 1, 2, '1601455342TmWbYVuDjS.jpg', 120.00, 0.00, 0.00, 0.00, 120.00, 1, '2020-09-30 14:12:23', '2020-09-30 14:12:23'),
(10, 7, 'GULAB JAMUN', 500, 1, '16015293298J9vVbIyHs.jpg', 175.00, 0.00, 5.00, 0.00, 170.00, 0, '2020-10-01 10:45:29', '2020-10-01 10:45:29'),
(11, 7, NULL, 1, 2, '1601529367R79zO2qhbe.jpg', 300.00, 0.00, 10.00, 0.00, 290.00, 0, '2020-10-01 10:46:07', '2020-10-01 10:46:07'),
(12, 8, 'SPRITE', 600, 4, '160152942715CZzQAlT9.jpg', 45.00, 0.00, 0.00, 0.00, 45.00, 1, '2020-10-01 10:47:07', '2020-10-01 10:47:07'),
(13, 8, NULL, 2, 5, '1601529459G2MLWp4d1b.jpg', 150.00, 0.00, 0.00, 0.00, 150.00, 1, '2020-10-01 10:47:39', '2020-10-01 10:47:39'),
(14, 9, 'LADDU', 1, 2, '1601529512goxFhEvnIp.jpg', 250.00, 0.00, 0.00, 0.00, 250.00, 1, '2020-10-01 10:48:32', '2020-10-01 10:48:32'),
(15, 9, NULL, 500, 1, '1601529545XukWEHywnO.jpg', 125.00, 0.00, 0.00, 0.00, 125.00, 1, '2020-10-01 10:49:05', '2020-10-01 10:49:05'),
(16, 10, 'HALDIRAM NAMKEEN MIXTURE', 1, 2, '1601529627o9AnmachN3.png', 600.00, 0.00, 0.00, 0.00, 600.00, 1, '2020-10-01 10:50:27', '2020-10-01 10:50:27'),
(17, 10, NULL, 250, 1, '1601529654kuo3li7vSC.png', 150.00, 0.00, 0.00, 0.00, 150.00, 1, '2020-10-01 10:50:54', '2020-10-01 10:50:54'),
(18, 10, NULL, 500, 1, '1601529678BWiSfIT34w.png', 300.00, 0.00, 0.00, 0.00, 300.00, 1, '2020-10-01 10:51:18', '2020-10-01 10:51:18'),
(19, 11, 'AMUL MILK GOLD', 1, 5, '1601529797DKLb02pe73.jpeg', 60.00, 0.00, 0.00, 0.00, 60.00, 1, '2020-10-01 10:53:17', '2020-10-01 10:53:17'),
(20, 11, NULL, 500, 4, '1601529831wXE3Gh5Ig8.jpeg', 35.00, 0.00, 0.00, 0.00, 35.00, 1, '2020-10-01 10:53:51', '2020-10-01 10:53:51'),
(21, 12, 'SPRITE', 2, 5, '1601537742BRyxKp2IZ4.jpg', 165.00, 18.00, 5.00, 0.00, 188.80, 2, '2020-10-01 13:05:42', '2020-10-01 13:05:42'),
(22, 12, NULL, 600, 4, '1601537787DzMbklhSYj.jpg', 45.00, 18.00, 0.00, 0.00, 53.10, 1, '2020-10-01 13:06:27', '2020-10-01 13:06:27'),
(23, 13, 'GULAB JAMUN', 1, 2, '1601565217mCx7dRX9AH.jpg', 300.00, 0.00, 0.00, 0.00, 300.00, 1, '2020-10-01 20:43:37', '2020-10-01 20:43:37'),
(24, 13, NULL, 500, 1, '1601565293oMZTLtfRqj.jpg', 150.00, 0.00, 0.00, 0.00, 150.00, 1, '2020-10-01 20:44:53', '2020-10-01 20:44:53'),
(25, 14, 'LADDU', 1, 2, '1601565441JX0ZezY9nt.jpg', 250.00, 0.00, 0.00, 0.00, 250.00, 1, '2020-10-01 20:47:21', '2020-10-01 20:48:01'),
(26, 14, NULL, 500, 1, '1601565472QA32RSpu6r.jpg', 125.00, 0.00, 0.00, 0.00, 125.00, 1, '2020-10-01 20:47:52', '2020-10-01 20:47:52'),
(27, 15, 'HALDIRAM MIXTURE', 1, 2, '1601565638qbAtK6Jrnv.png', 600.00, 0.00, 0.00, 0.00, 600.00, 1, '2020-10-01 20:50:38', '2020-10-01 20:50:38'),
(28, 15, NULL, 500, 1, '1601565662hsrWkVH3dO.png', 300.00, 0.00, 0.00, 0.00, 300.00, 1, '2020-10-01 20:51:02', '2020-10-01 20:51:02'),
(29, 15, NULL, 250, 1, '1601565691DXfypJlYZa.png', 150.00, 0.00, 0.00, 0.00, 150.00, 1, '2020-10-01 20:51:31', '2020-10-01 20:51:31'),
(30, 16, 'SAMOUSA', 1, 3, '1601631380CDv3eMfBXw.jpg', 8.00, 0.00, 1.00, 0.00, 7.00, 1, '2020-10-02 15:06:20', '2020-10-02 15:06:20'),
(31, 17, 'LADDU', 1, 2, '1601639576ymLiOjcXZk.jpg', 250.00, 0.00, 0.00, 0.00, 250.00, 1, '2020-10-02 17:22:56', '2020-10-02 17:22:56'),
(32, 18, 'LADDU', 1, 2, '1601639663Wd1fN43EQ0.jpg', 250.00, 0.00, 0.00, 0.00, 250.00, 1, '2020-10-02 17:24:24', '2020-10-02 17:24:24'),
(33, 19, 'GULAB JAMUN', 1, 2, '16018150279hEltwrqc3.jpg', 300.00, 0.00, 5.00, 0.00, 295.00, 1, '2020-10-04 18:07:07', '2020-10-04 18:07:07'),
(34, 19, NULL, 500, 2, '1601815060LiZ1UsHpk0.jpg', 150.00, 0.00, 5.00, 0.00, 145.00, 1, '2020-10-04 18:07:40', '2020-10-04 18:07:40'),
(35, 20, 'LADDU', 1, 2, '1601815405DShK0bAGZN.jpg', 250.00, 0.00, 0.00, 0.00, 250.00, 1, '2020-10-04 18:13:25', '2020-10-04 18:13:25'),
(36, 20, NULL, 500, 2, '1601815429wMFQy1ir6C.jpg', 175.00, 0.00, 0.00, 0.00, 175.00, 1, '2020-10-04 18:13:49', '2020-10-04 18:13:49'),
(37, 21, 'laddu', 1, 2, '1601815948GtDWehvxBm.jpg', 250.00, 0.00, 5.00, 0.00, 245.00, 1, '2020-10-04 18:22:28', '2020-10-04 18:22:28'),
(38, 22, 'LADDU', 1, 2, '1601817461aIKvlY28g1.jpg', 250.00, 0.00, 0.00, 0.00, 250.00, 1, '2020-10-04 18:47:41', '2020-10-04 18:47:41'),
(39, 23, 'Paneer without cream', 250, 1, '1602435507kaCP0BUoIK.jpg', 70.00, 0.00, 10.00, 0.00, 60.00, 1, '2020-10-11 22:28:27', '2020-10-11 22:28:27'),
(40, 24, 'Paneer with half cream', 250, 1, '1602436658H1aKnv3kM8.png', 75.00, 0.00, 10.00, 0.00, 65.00, 1, '2020-10-11 22:47:38', '2020-10-11 22:51:03'),
(41, 25, 'Paneer with full cream', 250, 1, '1602436731qWQFnpNytr.jpg', 80.00, 0.00, 10.00, 0.00, 70.00, 1, '2020-10-11 22:48:51', '2020-10-11 22:51:32'),
(42, 26, 'Kazu barfi', 1, 3, '1602663203KIqaSigoUY.jpeg', 5.00, 0.00, 0.00, 0.00, 5.00, 1, '2020-10-14 13:43:23', '2020-10-14 13:43:23'),
(43, 27, 'SAMOUSA', 1, 3, '1602779821oEs2Bn60Vr.jpg', 7.00, 0.00, 1.00, 0.00, 6.00, 1, '2020-10-15 22:07:01', '2020-10-15 22:07:01'),
(44, 28, 'GULAB JAMUN', 1, 2, '1602779944KNBvaoirWe.jpg', 310.00, 0.00, 5.00, 0.00, 305.00, 1, '2020-10-15 22:08:30', '2020-10-15 22:09:04'),
(45, 28, NULL, 500, 1, '1602779979mqWjXxAGNg.jpg', 160.00, 0.00, 5.00, 0.00, 155.00, 1, '2020-10-15 22:09:39', '2020-10-15 22:09:39'),
(46, 29, 'LADDU', 1, 2, '1602780044Qn8dRG69SZ.jpg', 250.00, 0.00, 0.00, 0.00, 250.00, 1, '2020-10-15 22:10:44', '2020-10-15 22:10:44'),
(47, 30, 'AMUL GOLD MILK', 1, 5, '1602780092dZ4QYfxnjG.jpeg', 60.00, 0.00, 0.00, 0.00, 60.00, 1, '2020-10-15 22:11:32', '2020-10-15 22:11:32'),
(48, 30, NULL, 500, 4, '1602780131LdPVUtIp4R.jpeg', 35.00, 0.00, 0.00, 0.00, 35.00, 1, '2020-10-15 22:12:11', '2020-10-15 22:12:11'),
(49, 31, 'SAMOUSA', 1, 3, '1602811574ln6msFBrAR.jpg', 8.00, 0.00, 1.00, 0.00, 7.00, 1, '2020-10-16 06:56:14', '2020-10-16 06:56:14'),
(50, 32, 'BURGER', 1, 3, '1602811659GrQVSaO3Hx.jpg', 20.00, 0.00, 2.00, 0.00, 18.00, 1, '2020-10-16 06:57:40', '2020-10-16 06:57:40'),
(51, 33, 'GULAB JAMUN', 1, 2, '1602811711ZVbslfz04F.jpg', 300.00, 0.00, 0.00, 0.00, 300.00, 1, '2020-10-16 06:58:31', '2020-10-16 06:58:31'),
(52, 33, NULL, 500, 1, '1602811755ADYWd71K8j.jpg', 150.00, 0.00, 0.00, 0.00, 150.00, 1, '2020-10-16 06:59:15', '2020-10-16 06:59:15'),
(53, 34, 'COCA COLA', 2, 5, '1602811835OLBjQ3chGK.jpg', 95.00, 0.00, 0.00, 0.00, 95.00, 1, '2020-10-16 07:00:35', '2020-10-16 07:00:35'),
(54, 34, NULL, 600, 4, '1602811872MQI5ZGaniV.jpg', 45.00, 0.00, 0.00, 0.00, 45.00, 1, '2020-10-16 07:01:13', '2020-10-16 07:01:13'),
(55, 35, 'HALDIRAM MIXTURE NAMKEEN', 500, 1, '1602811954kH2NRV8Lui.png', 60.00, 0.00, 0.00, 0.00, 60.00, 1, '2020-10-16 07:02:34', '2020-10-16 07:02:34'),
(56, 35, NULL, 1, 2, '1602811987nT7EIOXZv5.png', 120.00, 0.00, 2.00, 0.00, 118.00, 1, '2020-10-16 07:03:07', '2020-10-16 07:03:07'),
(57, 36, 'AMUL GOLD MILK', 1, 5, '16028120369tUqnKZTFu.jpeg', 65.00, 0.00, 0.00, 0.00, 65.00, 1, '2020-10-16 07:03:56', '2020-10-16 07:03:56'),
(58, 37, 'Tapovan cashew', 250, 1, '1603036204xkW0IcaLbt.png', 240.00, 0.00, 20.00, 0.00, 220.00, 1, '2020-10-18 21:20:04', '2020-10-18 21:20:04'),
(59, 38, 'Naturoz walnuts', 200, 1, '1603036399yQkw729dhz.jpg', 290.00, 0.00, 30.00, 0.00, 260.00, 1, '2020-10-18 21:23:19', '2020-10-18 21:23:19'),
(60, 39, 'Naturoz walnuts', 250, 1, '16030364809LknHamhCt.jpg', 235.00, 0.00, 35.00, 0.00, 200.00, 0, '2020-10-18 21:24:40', '2020-10-18 21:24:40'),
(61, 40, 'Naturoz pistachio', 200, 1, '16030371726q45l3dyDi.jpg', 365.00, 0.00, 30.00, 0.00, 335.00, 0, '2020-10-18 21:36:12', '2020-10-18 21:36:12'),
(62, 41, 'Afghan anjeer', 200, 1, '1603037338qrf1kuFZvD.jpg', 365.00, 0.00, 30.00, 0.00, 335.00, 0, '2020-10-18 21:38:58', '2020-10-18 21:38:58'),
(63, 42, 'Naturoz mix dry fruits', 200, 1, '1603037465Y2ytPzRnJM.jpg', 185.00, 0.00, 20.00, 0.00, 165.00, 1, '2020-10-18 21:41:05', '2020-10-18 21:41:05'),
(64, 43, 'Naturoz California almonds', 250, 1, '1603067669DeNoXaChVk.jpg', 235.00, 0.00, 25.00, 0.00, 210.00, 1, '2020-10-19 06:04:29', '2020-10-19 06:04:29'),
(65, 44, 'Naturoz badam gurbandi giri', 200, 1, '16030678625IXJA4fUOK.jpg', 225.00, 0.00, 20.00, 0.00, 205.00, 1, '2020-10-19 06:07:42', '2020-10-19 06:07:42'),
(66, 45, 'Naturoz dry dates', 200, 1, '16030681509EohfGTlcP.jpg', 75.00, 0.00, 10.00, 0.00, 65.00, 1, '2020-10-19 06:12:30', '2020-10-19 06:12:30'),
(67, 46, 'Naturoz dry dates', 500, 1, '1603068217269FLX53xY.jpg', 185.00, 0.00, 10.00, 0.00, 175.00, 1, '2020-10-19 06:13:37', '2020-10-19 06:13:37'),
(68, 47, 'Khajur', 500, 1, '16065591679mhV2UwKpO.jpg', 120.00, 0.00, 20.00, 0.00, 100.00, 1, '2020-11-28 15:56:07', '2020-11-28 15:56:07'),
(69, 48, 'Soan papdi', 400, 1, '1606559275HbxQm0CEdB.jpg', 120.00, 0.00, 20.00, 0.00, 100.00, 1, '2020-11-28 15:58:00', '2020-11-28 15:58:00'),
(70, 49, 'Real gold cashew ', 250, 1, '1606578760W83HKNnact.jpg', 300.00, 0.00, 80.00, 0.00, 220.00, 1, '2020-11-28 21:22:40', '2020-11-28 21:22:40'),
(71, 50, '', 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2021-01-19 13:46:19', '2021-01-19 13:46:19'),
(72, 0, NULL, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0, '2021-01-19 13:50:26', '2021-01-19 13:50:26'),
(73, 51, '', 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2021-05-28 03:24:11', '2021-05-28 03:24:11'),
(74, 0, NULL, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0, '2021-06-03 02:38:04', '2021-06-03 02:38:04'),
(75, 52, '', 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2021-06-20 09:56:59', '2021-06-20 09:56:59'),
(76, 0, NULL, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0, '2021-07-03 08:02:58', '2021-07-03 08:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `shopagent_forgot_otp_validator`
--

CREATE TABLE `shopagent_forgot_otp_validator` (
  `id` bigint(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `tokens` varchar(50) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopagent_forgot_otp_validator`
--

INSERT INTO `shopagent_forgot_otp_validator` (`id`, `phone`, `tokens`, `otp`, `creation_date`) VALUES
(1, '', 'XfnpiwBJqvrePUW7xCAMsYlzD', '236807', '2021-01-19 13:55:04'),
(5, '9571828691', '0Kr6zJsGHvqD4jVig2EMNpLnd', '879324', '2021-05-01 16:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper`
--

CREATE TABLE `shopkeeper` (
  `id` bigint(20) NOT NULL,
  `agent_id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `shopname` varchar(255) NOT NULL,
  `shopcode` varchar(20) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` text DEFAULT NULL,
  `pincode` text NOT NULL,
  `min_order_amount` int(11) NOT NULL DEFAULT 0,
  `open_time` varchar(20) DEFAULT NULL,
  `close_time` varchar(20) DEFAULT NULL,
  `wallet` decimal(18,2) NOT NULL DEFAULT 0.00,
  `terms_conditions` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `home_delivery` int(11) NOT NULL DEFAULT 0,
  `creation_date` varchar(50) NOT NULL,
  `modification_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopkeeper`
--

INSERT INTO `shopkeeper` (`id`, `agent_id`, `username`, `name`, `photo`, `shopname`, `shopcode`, `phone`, `email`, `image`, `password`, `address`, `pincode`, `min_order_amount`, `open_time`, `close_time`, `wallet`, `terms_conditions`, `status`, `enabled`, `home_delivery`, `creation_date`, `modification_date`) VALUES
(1, 0, 'rajsweets', 'SANTOSH KUMAR KARN', NULL, 'RAJ SWEETS', 'JLP1209052', '9571828691#del#del', 'karn600@gmail.com#del#del', '1601209052KW0aPbJk8O.jpg', 'karn@1983', 'LAHERIA SARAI TOWER ,DARBHANGA', '846001', 2, '09:00', '21:00', 0.00, 1, 0, 1, 0, '2020-09-27 17:47:32', '2020-09-28 09:19:03'),
(2, 3, 'rajsweets1', 'SANTOSH KUMAR KARN', '1601218127iUOBgnTuVp.jpg', 'RAJ SWEETS', 'JLP1217479', '9571828691', 'karn600@gmail.com', '1601217479I1ukFOaK5j.jpg', '12345', 'LAHERIA SARAI TOWER, DARBHANGA', '846001', 2, '09:00', '21:00', 85.00, 1, 1, 1, 1, '2020-09-27 20:07:59', '2021-05-10 16:19:44'),
(3, 0, 'sudhamilkparlour', 'AJAY KUMAR', NULL, 'SUDHA MILK PARLOUR', 'JLP1295859', '9541735957#del', 'boostfighter@yahoo.com#del', '1601295859nbEUjVmdgp.jpg', '12345', 'laheria sarai tower,darbhanga', '846001', 200, NULL, NULL, 0.00, 1, 0, 1, 0, '2020-09-28 17:54:19', '2020-09-28 17:59:30'),
(4, 0, 'sudhamilkparlour1', 'AJAY KUMAR', '1601297070soPNdt5f8T.jpg', 'SUDHA MILK PARLOUR', 'JLP1296963', '9541735957#del', 'boostfighter@yahoo.com#del', '1601296963Vh79sXnZH3.jpg', '12345', 'LAHERIA SARAI TOWER,DARBHANGA', '846001', 200, '09:00', '21:00', 0.00, 1, 0, 0, 0, '2020-09-28 18:12:43', '2020-10-01 10:32:00'),
(5, 0, 'kumarshop', 'VIKASH', NULL, 'KUMARSHOP', 'JLP1454518', '9149654458', 'binaykumarc08@gmail.com', '16014545181Qpv83gITA.jpg', '123456789', 'gaya', '824217', 100, '16:23', '14:27', 0.00, 1, 1, 1, 1, '2020-09-30 13:58:38', '2020-09-30 14:05:31'),
(6, 0, 'gautam-sweets-and-namkeen', 'GAUTAM KUMAR', '1601529202SIE34tcMDb.jpg', 'GAUTAM SWEETS AND NAMKEEN', 'JLP1529015', '9541735957#del', 'karn600@gmail.com#del', '1601529015NKAI7bV0p5.jpg', 'karn@1983', 'LAHERIA SARAI TOWER ,DARBHANGA ,BIHAR', '846001', 200, '09:00', '22:00', 0.00, 1, 0, 1, 1, '2020-10-01 10:40:15', '2020-10-01 12:37:51'),
(7, 0, 'gautam-sweets-and-namkeen1', 'GAUTAM KUMAR', '1601537641iLfaZCR9j7.jpg', 'GAUTAM SWEETS AND NAMKEEN', 'JLP1537512', '9541735957#del', 'karn600@gmail.com#del', '1601537512X3ajMSlqc1.jpg', '12345', '200mtrs NORTH OF LAHERIA SARAI TOWER, DARBHANGA', '846001', 200, '09:00', '21:00', 0.00, 1, 0, 1, 1, '2020-10-01 13:01:52', '2020-10-02 14:54:58'),
(8, 2, 'jagdamba-paneer-,-ghee-and-dry-fruits-wholesale-and-retail-', 'Harsh kumar', NULL, 'Jagdamba Paneer , Ghee and Dry Fruits Wholesale and Retail ', 'JLP1567943', '8252140347', 'happychaudhary.bsf2002@gmail.com', '', 'happy123', 'Barauni', '851112', 200, NULL, NULL, 30.00, 1, 1, 1, 1, '2020-10-01 21:29:03', '2020-11-28 15:53:47'),
(9, 0, 'gautam-sweets-and-namkeen', 'GAUTAM KUMAR', '1601631242oLvtj8AYbx.jpg', 'GAUTAM SWEETS AND NAMKEEN', 'JLP1631103', '9541735957#del', 'karn600@gmail.com#del', '1601631103Yhdcsvp9Jy.jpg', '12345', '200 mtrs NORTH OF LAHERIA SARAI TOWER,DARBHANGA', '846001', 200, '09:00', '21:00', 0.00, 1, 0, 1, 0, '2020-10-02 15:01:43', '2020-10-04 17:53:36'),
(10, 0, 'my-sweet-shop-and-namkeen-and-butter-milk-', 'RManjeet', NULL, 'My sweet shop and namkeen and butter  milk ', 'JLP1813354', '9711136319', 'rajamanjeet91@gmail.com', '1601813354AvynH1Lcxo.png', '12345', '302, G-69, Sector-63, Noida, UP\r\nSector-63', '123456', 500, NULL, NULL, 0.00, 1, 1, 1, 0, '2020-10-04 17:39:14', '2020-10-04 17:39:14'),
(11, 0, 'gautam sweets and namkeen', 'GAUTAM KUMAR', '1601814895bMCcBzSH3Q.jpg', 'GAUTAM SWEETS AND NAMKEEN', 'JLP1814751', '9541735957#del', 'karn600@gmail.com#del', '1601814751Yq4PBhpDIl.jpg', '12345', '200 MTRS NORTH OF LAHERIA SARAI TOWER, DARBHANGA', '846001', 200, '09:00', '21:00', 0.00, 1, 0, 1, 0, '2020-10-04 18:02:31', '2020-10-04 18:17:59'),
(12, 0, 'gautam sweets & namkeen', 'GAUTAM KUMAR', NULL, 'GAUTAM SWEETS & NAMKEEN', 'JLP1815901', '9541735957#del', 'karn600@gmail.com#del', '1601815901dOLUmtHiNb.jpg', '12345', 'laheria sarai', '846001', 200, NULL, NULL, 0.00, 1, 0, 1, 0, '2020-10-04 18:21:41', '2020-10-04 18:43:44'),
(13, 0, 'gautam-sweets-and-namkeen2', 'GAUTAM KUMAR', NULL, 'GAUTAM SWEETS AND NAMKEEN', 'JLP1817422', '9541735957#del', 'karn600@gmail.com#del', '16018174227YurqO1LwP.jpg', '12345', 'LAHERIA SARAI TOWER,DARBHANGA', '846001', 200, NULL, NULL, 0.00, 1, 0, 1, 0, '2020-10-04 18:47:02', '2020-10-15 21:47:24'),
(14, 0, 'gautamsweetsandnamkeens', 'GAUTAM KUMAR', '1602779665jiuT3hlHVc.jpg', 'GAUTAM SWEETS AND NAMKEENS', 'JLP2779498', '9541735957#del', 'karn600@gmail.com#del', '1602779498lyzFKd8R0J.jpg', '12345', 'laheria sarai tower darbhanga bihar', '846001', 200, '09:00', '21:00', 0.00, 1, 0, 1, 1, '2020-10-15 22:01:38', '2020-10-16 06:13:25'),
(15, 6, 'gautamsweetsandnamkeens1', 'GAUTAM KUMAR', '160281143857vzlLWHD3.jpg', 'GAUTAM SWEETS AND NAMKEENS', 'JLP2811285', '9541735957', 'karn600@gmail.com', '16028112855IjHWsX23n.jpg', '12345', 'LAHERIA SARAI TOWER ,DARBHANGA', '846001', 5, '09:00', '21:00', 102.00, 1, 1, 1, 1, '2020-10-16 06:51:25', '2020-10-16 07:51:24'),
(17, 0, 'chauhan-misthan-store', 'Chauhan Manjeet', NULL, 'Chauhan Misthan Store', 'JLP3647118', '8877203846', 'rmanjeetchauhan@gmail.com', '1623647116LCaX2HADYs.jpg', 'Manjeet@12345', 'Indirapuram, Ghaziabad', '845455', 5, NULL, NULL, 0.00, 1, 1, 1, 0, '2021-06-14 10:35:18', '2021-06-14 10:35:18'),
(18, 10, 'dev', 'Deva', NULL, 'Dev', 'JLP5577647', '8288805731', 'star.dev91@gmail.com', '', 'Bsf@1234', '', '332718', 200, NULL, NULL, 0.00, 1, 1, 1, 0, '2021-07-06 18:50:47', '2021-07-06 18:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper_account`
--

CREATE TABLE `shopkeeper_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(120) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopkeeper_account`
--

INSERT INTO `shopkeeper_account` (`id`, `user_id`, `bank_name`, `account_no`, `ifsc_code`, `branch`, `status`, `creation_date`, `modification_date`) VALUES
(1, 1, 'STATE BANK OF INDIA', '30094680550', 'SBIN0001229', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-09-27 17:47:32', '2020-09-27 20:16:31'),
(2, 2, 'STATE BANK OF INDIA', '30094680550', 'SBIN0001224', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-09-27 20:07:59', '2020-09-27 20:16:43'),
(3, 3, 'XXXXXXXXXXXX', 'XXXXXXXXXXXX', 'XXXXXXXXXXX', 'XXXXXXXXXX', 1, '2020-09-28 17:54:19', '2020-10-01 10:56:29'),
(4, 4, 'STATE BANK OF INDIA', 'XXXXXXXXXXXX', 'XXXXXXXXXX', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-09-28 18:12:43', '2020-10-01 10:59:12'),
(5, 5, 'sbi', '32546936537', 'SBIN00045', 'GAYA', -1, '2020-09-30 13:58:38', '2020-10-14 14:04:53'),
(6, 6, 'STATE BANK OF INDIA', 'XXXXXXXXXXX', 'XXXXXXXXXXX', 'XXXXXXXXXXXXXXX', 1, '2020-10-01 10:40:15', '2020-10-01 11:00:09'),
(7, 7, 'STATE BANK OF INDIA', '31660660806', 'SBIN0001229', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-10-01 13:01:52', '2020-10-01 20:53:57'),
(8, 8, 'Panjab national bank', '0048010359924', 'PUNB0720900', 'Barauni', -1, '2020-10-01 21:29:03', '2021-01-16 16:33:34'),
(9, 9, 'STATE BANK OF INDIA', '31660660806', 'SBIN0001224', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-10-02 15:01:43', '2020-10-02 17:47:10'),
(10, 10, 'AXIS BANK', '919010062812759', 'UTIB0000296', '302, G-69, Sector-63, Noida, UP', 1, '2020-10-04 17:39:14', '2020-10-04 18:11:09'),
(11, 11, 'STATE BANK OF INDIA', '30094680550', 'SBIN0001229', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-10-04 18:02:31', '2020-10-04 18:11:17'),
(12, 12, 'sbi', '30094680550', 'sbin0001224', 'laheria sarai', 1, '2020-10-04 18:21:41', '2020-10-12 07:49:42'),
(13, 13, 'SBI', '30094680550', 'SBIN0001224', 'LAHERIA SARAI', 1, '2020-10-04 18:47:02', '2020-10-12 07:49:52'),
(14, 5, 'ICIC', '023401539120', 'ICIC000797', 'Bikaner', -1, '2020-10-14 13:41:26', '2020-10-14 14:04:53'),
(15, 5, 'ICIC', '023401539120', 'ICIC0000797', 'Bikaner', 1, '2020-10-14 14:04:02', '2020-10-14 14:04:53'),
(16, 14, 'state bank of india', '30094680550', 'SBIN0001229', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-10-15 22:01:38', '2020-10-15 22:14:26'),
(17, 15, 'STATE BANK OF INDIA', '30094680550', 'SBIN0001229', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-10-16 06:51:25', '2020-10-16 07:04:27'),
(18, 8, 'United Bank', '0048010359924', 'UBIB0720900', 'Barauni', -1, '2020-12-06 12:57:26', '2021-01-16 16:33:34'),
(19, 8, 'United Bank of India', '48010359924', 'UBIB0720900', 'Barauni', -1, '2020-12-09 16:02:32', '2021-01-16 16:33:34'),
(20, 8, 'Punjab national Bank', '48010359924', 'PUNB0004820', 'Barauni\r\n', -1, '2020-12-24 15:40:48', '2021-01-16 16:33:34'),
(21, 8, 'State Bank  of India ', '32238882927', 'SBIN0002912', 'Barauni', 1, '2021-01-16 12:30:16', '2021-01-16 16:33:34'),
(22, 0, '', '', '', '', 0, '2021-01-19 13:56:55', '2021-01-19 13:56:55'),
(23, 16, '', '', '', '', 0, '2021-01-23 20:28:41', '2021-01-23 20:28:41'),
(24, 17, 'SBI', '10942009724', '123255', 'Indirapuram, Ghaziabad', 0, '2021-06-14 10:35:21', '2021-06-14 10:35:21'),
(25, 18, 'Sbi', '32238883103', 'Sbi0011392', 'Sbi kotputli', 0, '2021-07-06 18:50:47', '2021-07-06 18:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper_forgot_otp_validator`
--

CREATE TABLE `shopkeeper_forgot_otp_validator` (
  `id` bigint(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `tokens` varchar(50) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopkeeper_forgot_otp_validator`
--

INSERT INTO `shopkeeper_forgot_otp_validator` (`id`, `phone`, `tokens`, `otp`, `creation_date`) VALUES
(5, '9571828691', 'CxHJWPyAjwTlODmIVuBfnhRz5', '496215', '2021-04-04 10:07:23'),
(6, '9541735957', '1YjWSManGpfH7BvTEV6XPNlg4', '184029', '2021-04-07 19:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `shop_agent`
--

CREATE TABLE `shop_agent` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(255) NOT NULL,
  `shop_agent_code` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `wallet` decimal(18,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_agent`
--

INSERT INTO `shop_agent` (`id`, `name`, `username`, `shop_agent_code`, `phone`, `phone2`, `email`, `password`, `address`, `wallet`, `status`, `creation_date`, `modification_date`) VALUES
(1, 'SAHEB MONDAL', 'sahebmondal', 'SAGENT864770', '9775587345', '', 'sahebmondal5566@gmail.com', '13085641', 'VILL. - BISHNUPUR\r\nP.O. - PURVA BISHNUPUR\r\nDIST. - NADIYA\r\nSTATE - W.B.', 0.00, 1, '2020-09-23 18:09:30', '2020-09-23 18:09:30'),
(2, 'Harsh kumar', 'harshkumar', 'SAGENT957367', '8252140347', '8228801358', 'happychaudhary.bsf2002@gmail.com', 'happy@2002', 'Shokhara-1 ward-10 Barauni', 1.21, 1, '2020-09-24 19:52:47', '2020-09-24 19:52:47'),
(3, 'Sujit', 'sujit', 'SAGENT567529', '9682124122', '', 'sujitajit124@gmail.com', '12345', 'Abc', 0.18, 1, '2020-10-01 21:22:09', '2020-10-01 21:22:09'),
(4, 'Santosh kumar karn', 'santoshkumarkarn', 'SAGENT626614', '9571828691#del', '9541735957', 'boostfighter@yahoo.com', '12345', 'Gautam sweets & sweets', 0.00, 0, '2020-10-02 13:46:54', '2020-10-16 06:22:20'),
(5, 'HEMANT KUMAR', 'hemantkumar', 'SAGENT636294', '8210953697', '', 'hemantkumardbg2019@gmail.com', 'Barheta1984', 'VILL.-BARHETA,  P.O.-LAHERIA SARAI, DIST.-DARBHANGA', 0.00, 1, '2020-10-02 16:28:14', '2020-10-02 16:28:14'),
(6, 'SANTOSH KUMAR', 'santoshkumar', 'SAGENT810914', '9571828691', '9541735957', 'karn600@gmail.com', '12345', 'laheria sarai ,darbhanga bihar', 0.28, 1, '2020-10-16 06:45:14', '2021-04-14 15:49:06'),
(7, 'Sagar kumar', 'sagarkumar', 'SAGENT617946', '7488089819', '7488089819', 'salokchoudhary@gmail.com', '123456789', 'Manpur mallah toli', 0.00, 1, '2020-11-17 18:29:06', '2021-04-28 22:34:26'),
(9, 'Amar kumar', 'amarkumar', 'SAGENT645466', '6200235320', '8434470249', 'amarkumar.karn17@gmail.com', 'amarkumar', 'Amar Kumar\r\nBarheta, laheria sarai Darbhanga Bihar\r\n846001', 0.00, 1, '2021-05-10 16:47:46', '2021-05-10 16:47:46'),
(10, 'DEVENDER KUMAR', 'devenderkumar', 'SAGENT577410', '8288805731', '', 'star.dev91@gmail.com', 'Bsf@1234', '', 0.00, 1, '2021-07-06 18:46:50', '2021-07-06 18:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `shop_agent_account`
--

CREATE TABLE `shop_agent_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(120) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_agent_account`
--

INSERT INTO `shop_agent_account` (`id`, `user_id`, `bank_name`, `account_no`, `ifsc_code`, `branch`, `status`, `creation_date`, `modification_date`) VALUES
(1, 4, 'state bank of india', '30094680550', 'SBI0001229', 'SBI MAIN BRANCH LAHERIA SARAI', 1, '2020-10-02 16:31:08', '2020-10-02 16:31:32'),
(2, 6, 'STATE BANK OF INDIA', '30094680550', 'SBIN0001229', 'LAHERIA SARAI MAIN BRANCH', 1, '2020-10-16 06:47:23', '2020-10-18 17:39:36'),
(3, 0, '', '', '', '', 0, '2021-01-20 23:03:40', '2021-01-20 23:03:40'),
(4, 9, 'STATE BANK OF INDIA ', '20390036407', 'SBIN0001229', 'SBI LAHERIA SARAI BRANCH ', 1, '2021-05-10 16:50:40', '2021-05-11 14:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `shop_agent_otp_validator`
--

CREATE TABLE `shop_agent_otp_validator` (
  `id` bigint(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `tokens` varchar(50) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_agent_otp_validator`
--

INSERT INTO `shop_agent_otp_validator` (`id`, `phone`, `tokens`, `otp`, `creation_date`) VALUES
(6, '', '7MN8SQwVJZjfxmnEUgozd0v34', '436018', '2021-04-09 19:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `whatsapp`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `creation_date`, `modification_date`) VALUES
(1, '9610534411', 'https://www.facebook.com/Jalpanscom-100925128417697/', 'Nil', 'Nil', 'Nil', 'https://youtu.be/3OgFcK2R7as', '2021-01-04 22:58:20', '2021-01-31 20:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `comission` int(5) NOT NULL,
  `agent_commission` decimal(18,2) NOT NULL DEFAULT 0.00,
  `max_delivery_hour` int(11) NOT NULL DEFAULT 2,
  `secure_key` varchar(255) NOT NULL,
  `read_key` varchar(200) NOT NULL,
  `wallet` decimal(18,2) NOT NULL,
  `gst_wallet` decimal(18,2) NOT NULL,
  `notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` int(11) NOT NULL,
  `creation_date` varchar(50) NOT NULL,
  `modification_date` varchar(50) NOT NULL,
  `shop_notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `name`, `phone`, `email`, `image`, `password`, `comission`, `agent_commission`, `max_delivery_hour`, `secure_key`, `read_key`, `wallet`, `gst_wallet`, `notice`, `status`, `creation_date`, `modification_date`, `shop_notice`, `agent_notice`) VALUES
(1, 'Superadmin', '55555555', 'admin@gmail.com', '', '123456', 2, 1.00, 1, 'bcb8a9a740d3d322bbed353c97087857', 'Security.Jalpans.com', 335.18, 0.00, 'Shopkeeper can join their shops free of cost but how to join click at YouTube sign at top and below the website. ', 1, '2019-02-11 11:58:05', '2019-02-11 11:58:05', 'MAXIMUM DELIVERY TIME TO CUSTOMER - 1 HRS', 'HI, WELCOME TO BE A PART OF TEAM JALPANS. You will get 1% commission on every sell of shopkeeper which added by your id & you will get ₹5000/- having after join 50 shops by your Id as well. ');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sort_name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `sort_name`, `type`, `status`, `creation_date`, `modification_date`) VALUES
(1, 'Gram', 'g', 1, 1, '', ''),
(2, 'Kilogram', 'kg', 0, 1, '', ''),
(3, 'Piece', 'pcs', 0, 1, '', ''),
(4, 'ML', 'ml', 1, 1, '', ''),
(5, 'Liter', 'ltr', 0, 1, '', ''),
(6, 'Metric', 'metric', 0, 0, '', ''),
(7, 'Ton', 'ton', 0, 0, '', ''),
(8, 'Pound', 'pound', 0, 0, '', ''),
(9, 'MM', 'mm', 0, 0, '', ''),
(10, 'CM', 'cm', 0, 0, '', ''),
(11, 'Inch', 'inch', 0, 0, '', ''),
(12, 'Foot', 'foot', 0, 0, '', ''),
(13, 'Meter', 'meter', 0, 0, '', ''),
(14, 'Mile', 'mile', 0, 0, '', ''),
(15, 'Kilometer', 'kilometer', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `referral_code` varchar(50) NOT NULL,
  `referred_by` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `reset_request` varchar(255) NOT NULL,
  `creation_date` varchar(20) NOT NULL,
  `modification_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_comment`
--

CREATE TABLE `user_comment` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `visiters_id` varchar(255) NOT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `user_id`, `visiters_id`, `creation_date`) VALUES
(1, NULL, 'Sat Jan 02 2021 20:20:30 GMT+0530 (India Standard Time)', '2021-01-02 20:24:38'),
(2, NULL, 'Sat Jan 02 2021 20:42:57 GMT+0530 (India Standard Time)', '2021-01-02 20:47:08'),
(3, NULL, 'Sat Jan 02 2021 20:44:43 GMT+0530 (India Standard Time)', '2021-01-02 20:48:53'),
(4, NULL, 'Sat Jan 02 2021 15:19:34 GMT+0000 (Greenwich Mean Time)', '2021-01-02 20:53:44'),
(5, NULL, 'Sat Jan 02 2021 20:51:51 GMT+0530 (India Standard Time)', '2021-01-02 20:56:00'),
(6, NULL, 'Sat Jan 02 2021 21:58:27 GMT+0530 (India Standard Time)', '2021-01-02 22:02:32'),
(7, NULL, 'Sat Jan 02 2021 21:59:41 GMT+0530 (India Standard Time)', '2021-01-02 22:03:48'),
(8, NULL, 'Sun Jan 03 2021 12:25:42 GMT+0530 (India Standard Time)', '2021-01-03 12:29:44'),
(9, NULL, 'Sun Jan 03 2021 00:26:28 GMT-0800 (Pacific Standard Time)', '2021-01-03 14:00:37'),
(10, 'c6526f146cef67beefdf5bbf4c95e2c3', 'Sun Jan 03 2021 17:49:56 GMT+0530 (India Standard Time)', '2021-01-03 17:54:06'),
(11, 'a331f7f982df4fdf47e5264dd4036db4', 'Mon Jan 04 2021 09:56:59 GMT+0530 (India Standard Time)', '2021-01-04 10:01:02'),
(12, '0f225c14950178be71e79892d7dc5767', 'Wed Jan 06 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-07 13:56:46'),
(13, '69a9ff943081470108d19e570572543f', 'Wed Jan 06 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-08 04:44:35'),
(14, '0e52b55aa9a6613983480c30e794bf74', 'Fri Jan 08 2021 13:57:15 GMT+0530 (India Standard Time)', '2021-01-08 13:57:16'),
(15, 'c8b9f170a8f61973b97c78a0ae234213', 'Thu Jan 07 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-08 14:35:23'),
(16, '9a862041a35a7b4765f594088c8a593f', 'Thu Jan 07 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-08 17:38:58'),
(17, '28db99a498f5268e8e98b0a9e23b855e', 'Fri Jan 08 2021 20:24:33 GMT+0530 (India Standard Time)', '2021-01-08 20:24:33'),
(18, '4a689ebb9ebbb99387c96db54c8bfb77', 'Sun Jan 10 2021 23:22:28 GMT+0530 (India Standard Time)', '2021-01-10 23:22:49'),
(19, '119d212a5c3528c072de76f12816434b', 'Sun Jan 10 2021 23:32:52 GMT+0530 (India Standard Time)', '2021-01-10 23:32:52'),
(20, 'bd096234c5c2e3392696471ac8872f50', 'Mon Jan 11 2021 14:02:56 GMT+0530 (India Standard Time)', '2021-01-11 14:03:15'),
(21, 'b9c1f3f3a294e18867610ebb7f0ce2aa', 'Mon Jan 11 2021 15:35:43 GMT+0530 (India Standard Time)', '2021-01-11 15:35:44'),
(22, '5cf404ef29fa0767e9ff4ae12ec0a48f', 'Mon Jan 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-12 07:51:17'),
(23, 'a38fbf950f9dd8baf86d065c68d3bfe4', 'Mon Jan 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-12 07:51:23'),
(24, 'bd0da268af20b5183932278b395c2734', 'Mon Jan 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-12 07:51:29'),
(25, '9b7f748e3a7c0884f3d0ba6f8c518223', 'Tue Jan 12 2021 18:13:40 GMT+0530 (India Standard Time)', '2021-01-12 18:13:42'),
(26, 'ba7e7ab3ac5a9fbec2da856280b4ce44', 'Mon Jan 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-12 23:47:51'),
(27, '8cf56ef4d58bee98874a02b084f3fb39', 'Wed Jan 13 2021 13:06:26 GMT+0530 (India Standard Time)', '2021-01-13 13:06:27'),
(28, '5b999ba51eabb6e20541962363964f42', 'Wed Jan 13 2021 18:27:47 GMT+0530 (India Standard Time)', '2021-01-13 18:27:48'),
(29, '19d5cb0bc9786b84bb089c805517e02d', 'Wed Jan 13 2021 18:59:29 GMT+0530 (India Standard Time)', '2021-01-13 18:59:33'),
(30, '418dd907a4eb65d70542b64ee6a8f964', 'Wed Jan 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-14 16:28:23'),
(31, '118faf821bc624399a5964a44faac184', 'Wed Jan 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-15 02:04:42'),
(32, '38e7b374be297d50fabe9317077cd1f5', 'Thu Jan 14 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-15 09:05:23'),
(33, '', '', '2021-01-16 05:22:58'),
(34, '0fe7a676381fec3d4288abed98699f0d', 'Sat Jan 16 2021 04:55:58 GMT+0000 (Coordinated Universal Time)', '2021-01-16 10:25:59'),
(35, '7cdc0d42929ba0fa2b3e23f1c79cf13a', 'Sat Jan 16 2021 11:56:24 GMT+0530 (India Standard Time)', '2021-01-16 11:56:26'),
(36, '8a897de7badb409390c5b00cc964a656', 'Sun Jan 17 2021 08:11:06 GMT+0530 (India Standard Time)', '2021-01-17 08:11:06'),
(37, '762ccfc6c80c8193cad978aef9ee6420', 'Sun Jan 17 2021 15:08:36 GMT+0530 (GMT+5:30)', '2021-01-17 15:08:46'),
(38, '3c2be9e15bf22223929707194f2cbbc6', 'Mon Jan 18 2021 20:07:37 GMT+0530 (India Standard Time)', '2021-01-18 20:07:37'),
(39, '362379222b66abfcf768ee016039192f', 'Mon Jan 18 2021 20:57:12 GMT+0530 (India Standard Time)', '2021-01-18 20:57:11'),
(40, 'dcac7bfd50b46272e1b773812bda5225', 'Mon Jan 18 2021 20:53:34 GMT+0000 (Coordinated Universal Time)', '2021-01-19 02:23:34'),
(41, '', '', '2021-01-19 13:20:18'),
(42, 'be9adcc8d630936ecd9e392afb6c7669', 'Wed Jan 20 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-21 13:08:50'),
(43, '4bb0b6a8423a49551531fa94c0ce3481', 'Wed Jan 20 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-21 15:30:24'),
(44, 'e745bb915d651afaa18c5fc5611c3781', 'Thu Jan 21 2021 19:48:32 GMT+0530 (India Standard Time)', '2021-01-21 19:48:33'),
(45, '7ed551bb0f3557bdc8fbaa5bbe3810d7', 'Tue Jan 19 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-22 13:01:23'),
(46, '9c75a6c795d3db5e9bbe9ae860a27622', 'Fri Jan 22 2021 18:01:21 GMT-0800 (Pacific Standard Time)', '2021-01-23 07:31:22'),
(47, '4071fd16ace677e7fc3c75ca0d78ed1f', 'Sat Jan 23 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-24 08:15:21'),
(48, '517bf7881ba538161c19546c0d9243b0', 'Sun Jan 24 2021 09:46:17 GMT+0530 (India Standard Time)', '2021-01-24 09:46:17'),
(49, 'daa317dc525469843ed961fb82e206eb', 'Sat Jan 23 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-24 15:19:19'),
(50, 'd464e754771eb7f4dbd6a84ee6d855be', 'Sun Jan 24 2021 20:07:53 GMT+0530 (India Standard Time)', '2021-01-24 20:07:53'),
(51, '06897af8b27c300cc59e742855bd590d', 'Sun Jan 24 2021 22:02:58 GMT+0530 (India Standard Time)', '2021-01-24 22:02:58'),
(52, '06897af8b27c300cc59e742855bd590d', 'Sun Jan 24 2021 22:02:58 GMT+0530 (India Standard Time)', '2021-01-24 22:07:06'),
(53, '3e3bc2dfbdbd41412a057e07c7f21dae', 'Sun Jan 24 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-25 14:57:11'),
(54, '4abd5ebb3e33bd65547d506e8262fb64', 'Mon Jan 25 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-26 22:49:15'),
(55, 'dfadfb49ad161370a7f550884f758438', 'Wed Jan 27 2021 17:04:08 GMT-0800 (Pacific Standard Time)', '2021-01-28 06:34:10'),
(56, 'ce13749dfdc9c5bdc949cbba5ef54b2b', 'Wed Jan 27 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-28 21:33:16'),
(57, '31d23e81d8c67c846f5164151ebfab51', 'Sat Jan 30 2021 10:56:09 GMT+0530 (India Standard Time)', '2021-01-30 10:56:01'),
(58, '3c4fe60e67a1b2ffc5b73325b50b8588', 'Sat Jan 30 2021 11:46:31 GMT+0530 (India Standard Time)', '2021-01-30 11:46:31'),
(59, '191cd47666a971035c354bef758b8cfe', 'Sat Jan 30 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-31 09:44:21'),
(60, '9cc9424c4e1859e8c2c2694689fefdaa', 'Sat Jan 30 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-31 11:05:34'),
(61, '8d10349cff0dfecaa552cf1f7a11a302', 'Sun Jan 31 2021 12:48:02 GMT+0530 (India Standard Time)', '2021-01-31 12:48:02'),
(62, '63079c77687c035db1576309be909835', 'Sat Jan 30 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-31 13:16:40'),
(63, 'dc28fa9329b395d6ca6a415972d3cac6', 'Sun Jan 31 2021 09:09:18 GMT-0500 (EST)', '2021-01-31 19:39:22'),
(64, '2725cb2e5342f481eca7025b4f77674b', 'Sat Jan 30 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-01-31 23:28:45'),
(65, 'a2405e2d8bddb3957c7f24a83e35a487', 'Sat Jan 30 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 00:09:00'),
(66, '5926a7b2b5e7d5e8dc58acdb6b42b796', 'Sat Jan 30 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 00:28:53'),
(67, '6953546ed74fab974e54f46553c2e879', 'Sat Jan 30 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 02:10:01'),
(68, '9cb2942ce9ed13234ea56cbab25998fd', 'Sat Jan 30 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 04:11:17'),
(69, '03f59feedd4852990e828187c6302f51', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 08:23:23'),
(70, 'eb109c10b7e23863980c863832117f89', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 08:43:30'),
(71, '6b89cc47665d8f494260a81ba1ee0986', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 09:53:21'),
(72, '220509d6e2d18fbdc7a03ba14cfb7881', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 11:14:01'),
(73, '99b2e47df2938da0972de4207dc80066', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 13:24:32'),
(74, 'd458b37768efe08d72c84705922712be', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 17:56:49'),
(75, '68b4045523390a0e397343a55acfdae0', 'Mon Feb 01 2021 12:35:37 GMT+0000 (GMT)', '2021-02-01 18:05:39'),
(76, '7516a929d9b6e8a805be0731f5c6fc3c', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 18:06:59'),
(77, 'a698b02069a72a9231b7e18eccd71ceb', 'Mon Feb 01 2021 12:37:47 GMT+0000 (GMT)', '2021-02-01 18:07:48'),
(78, '57168cd2dec2c44443645fa37ed2c8a7', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 20:27:46'),
(79, 'ae7cf0cc2b3a4ed2b7bf8345b3c5d454', 'Mon Feb 01 2021 23:14:12 GMT+0530 (India Standard Time)', '2021-02-01 23:14:12'),
(80, 'a3730325653a99287aefc6710d9285d8', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-01 23:40:05'),
(81, 'fd83a81501071ea17722dd3a7383d11d', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 01:20:37'),
(82, '93ee9ed38fe72af3f5e87ce03feff764', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 03:51:46'),
(83, '8bb1001020a8c391d7c5876802f960d6', 'Sun Jan 31 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 04:31:04'),
(84, '645d9bb1b35dffef95861ccf138a1452', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 05:31:34'),
(85, '88d7acb54fbd269244a78fa30067bd9a', 'Tue Feb 02 2021 07:38:27 GMT+0530 (India Standard Time)', '2021-02-02 07:38:27'),
(86, '', '', '2021-02-02 08:44:37'),
(87, '2b7d65e44c8473ae7aea08908f03876a', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 12:46:27'),
(88, '5b991e0a3d6ea56bba07994e332a420f', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 13:36:06'),
(89, '20edfb0908fe41c437403880cc3ce944', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 15:25:41'),
(90, '0100a1afc958ce02750e4b0b69952eef', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 21:15:25'),
(91, 'b195d39708ec7448558afe62667f2ecd', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 21:36:49'),
(92, '9dc2e73c827dfa770002881a2c1fd27a', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-02 22:44:15'),
(93, '82bc058bf67d413ad9eae20ca75dbf10', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 00:10:28'),
(94, 'e7923ae6ff10d1a5306723bdcbca86cc', 'Mon Feb 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 00:42:50'),
(95, 'e764b6f2834026f60a2606d64a57180e', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 07:06:44'),
(96, '54ca41b3b4c6ea7a771546ac1cda1629', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 07:35:41'),
(97, '166fa42254c40ef686503029130a1a66', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 07:45:35'),
(98, 'f626e6428c1e78e23678090e0d8d8d13', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 08:16:41'),
(99, '2ea1d785144bfce13de793949b1cb05a', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 10:35:33'),
(100, '02bf0b98fe921d17d78bc7dd353edee9', 'Wed Feb 03 2021 12:02:57 GMT+0400 (Gulf Standard Time)', '2021-02-03 13:32:57'),
(101, '99eef1fe3a4e912ef1e50eef803928af', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 16:07:17'),
(102, 'fd4ab5c3d2c528fce122157b5c80979c', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 16:37:04'),
(103, 'f68d3049332448733d780a2a22ad44f4', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 17:54:35'),
(104, 'ec42876ce2e1147c23c54cc216595278', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 18:20:53'),
(105, 'd1806d12843a3cd66e7cf6c73aa77be1', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-03 20:48:59'),
(106, '75278a1a2b5aac6a3ebeb7c4d556b4de', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 02:39:51'),
(107, 'bb22509a6c710d628fecca1e957af704', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 02:50:59'),
(108, 'ad26dc02aac66c6e80df164f4e640bd2', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 03:40:04'),
(109, '6f5eaf2571fcdb3b78b859dc041b9db2', 'Tue Feb 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 04:59:28'),
(110, '96ca0caf92f9147b2064974c0b1db4a7', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 06:00:43'),
(111, '99ac9abab0f9dbaa8aad2334cbd45a66', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 06:40:46'),
(112, '99ac9abab0f9dbaa8aad2334cbd45a66', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 06:41:23'),
(113, '411d30864720a4a03272050478520fb5', 'Thu Feb 04 2021 12:14:48 GMT+0530 (India Standard Time)', '2021-02-04 12:14:52'),
(114, '1d4350b0e4c988beec37047dd85b01c4', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 13:31:46'),
(115, 'fdc38fb5f0544c59bc3abeb65be5f78e', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 13:43:29'),
(116, 'b7e62e82a468c0d0793ebde96bcdcaa2', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 15:13:09'),
(117, 'e904f1949672aa24056608c962f9bdbc', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 17:44:40'),
(118, '34e7b198f72b267aca6c90c57c4df10c', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-04 23:26:48'),
(119, '61e2643e22920e5357d0315c9e1e05c1', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-05 00:57:39'),
(120, 'a79e7e762763b7a178395c69a5b233be', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-05 01:16:46'),
(121, 'e5e6dcb14c7461193c73166a30f0fd74', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-05 02:35:55'),
(122, 'ca1d1810964ce2e4112f1a423d2681b9', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-05 04:13:00'),
(123, '8bf30da28d4346a858c56c7051af264e', 'Wed Feb 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-05 04:48:18'),
(124, 'bed0b732f48d98b73ad317f5f83e94e7', 'Thu Feb 04 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-05 05:38:30'),
(125, '2d5051e826a6373f2e8f8095fcdc7c05', 'Fri Feb 05 2021 06:41:06 GMT+0530 (India Standard Time)', '2021-02-05 06:41:07'),
(126, '2e9a041076b936236ab66d6c42cdcfef', 'Fri Feb 05 2021 09:56:19 GMT+0530 (India Standard Time)', '2021-02-05 09:56:21'),
(127, 'eb975326cbc9194a105f9e316814b557', 'Fri Feb 05 2021 10:10:53 GMT+0530 (India Standard Time)', '2021-02-05 10:10:44'),
(128, '9fb3616e635588794eb00fb0be3591af', 'Thu Feb 04 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-05 15:20:18'),
(129, '451d9244b6b1a4daca8824c83c93d693', 'Thu Feb 04 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-05 17:41:16'),
(130, '4febd3ee18513b91a569a6be74d49672', 'Sat Feb 06 2021 10:36:38 GMT-0700 (Mountain Standard Time)', '2021-02-06 23:06:39'),
(131, '66732e6a29e06b9a6648b4df0dad59e5', 'Thu Feb 04 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-07 20:11:59'),
(132, '026d544ef33b21a38046c48202167855', 'Sun Feb 07 2021 22:38:10 GMT-0500 (EST)', '2021-02-08 09:08:15'),
(133, '155703fe8c3e6bb062fbf244ca2a3efb', 'Sun Feb 07 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 02:24:00'),
(134, 'c542315bbfb105192914089f1a2db77c', 'Sun Feb 07 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 02:34:04'),
(135, '788283da2f8834fb0b0a012822a2108b', 'Sun Feb 07 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 04:04:39'),
(136, '414fe984b3f301191910af31f55495d9', 'Sun Feb 07 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 05:46:09'),
(137, '445bf3ab7018ed282f25132a9a6fd200', 'Sun Feb 07 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 06:13:00'),
(138, '87de1c64da56f17a23fb80c12cbd0ad5', 'Mon Feb 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 14:18:56'),
(139, 'b4f37bf31a7627eb248f246101f277a0', 'Mon Feb 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 14:38:59'),
(140, '54b02bba213622511672125039e773a7', 'Mon Feb 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 15:49:28'),
(141, 'e75133206951ce4ea0a9cc3bb0b554a8', 'Tue Feb 09 2021 17:47:12 GMT+0530 (India Standard Time)', '2021-02-09 17:47:12'),
(142, 'cbcaf50c28fd75617d0d9613d95ba8be', 'Mon Feb 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 17:49:41'),
(143, '6a5429d0350c12e41cc7cc3e69a547c8', 'Mon Feb 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-09 20:20:22'),
(144, '61a0e3ecf6c344a0e804ac0c7cefcc4b', 'Tue Feb 09 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-11 04:52:54'),
(145, '3525482de473265d3bb9d334f95450e8', 'Tue Feb 09 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-11 05:22:53'),
(146, '29a0cda8c21fe4938a9821c89008283a', 'Sun Feb 14 2021 05:15:45 GMT+0530 (India Standard Time)', '2021-02-14 05:15:46'),
(147, '3c08760b25ec6b8c4baa765ddc296a03', 'Sat Feb 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-14 19:49:52'),
(148, 'd982383ae4a16038c823ec83b2d9fb36', 'Sun Feb 14 2021 20:06:24 GMT+0530 (India Standard Time)', '2021-02-14 20:06:25'),
(149, '7bc7b6da1c0eebacdaeef82a4beaa730', 'Sat Feb 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-14 21:00:15'),
(150, '97dcf48aed575caa0857b15cd27c7ca2', 'Sat Feb 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-15 02:01:45'),
(151, 'eda281663258603c3443f4e0e367f2fa', 'Sun Feb 14 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-15 08:54:19'),
(152, 'ea0abf12fd29486b6c42a92511da22dd', 'Sun Feb 14 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-15 11:04:36'),
(153, 'a9dddbfe2a713bddc8133da305678d50', 'Sun Feb 14 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-15 13:05:10'),
(154, '208d57ad04bc48d0c23ce4fced319c7a', 'Sun Feb 14 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-15 16:51:43'),
(155, '39c3908d777b2281a98f85ebb63ec6cc', 'Mon Feb 15 2021 18:56:08 GMT+0530 (India Standard Time)', '2021-02-15 18:56:09'),
(156, '81088ad273fcfb6f1b3a957d6dc1792c', 'Sun Feb 14 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-16 01:38:18'),
(157, '7e99892c18e23f459e3916cab669a2db', 'Sun Feb 14 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-16 03:38:13'),
(158, '74c1ebd6c9d35a8365121aa6cb74094b', 'Mon Feb 15 2021 16:36:28 GMT-0600 (CST)', '2021-02-16 04:06:32'),
(159, '71cc1276cdd9cc567595deec56e6909a', 'Mon Feb 15 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-16 19:10:14'),
(160, 'faf99687a17488f8d919a28a24829ffb', 'Mon Feb 15 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-16 20:29:36'),
(161, 'dea063eb32925cce123041f14690b58e', 'Tue Feb 16 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-17 20:58:06'),
(162, 'b3a23bb3d224aea13f537445b1fe5423', 'Tue Feb 16 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-18 00:08:35'),
(163, '1b801efec94a1842b80f64c58a0960f2', 'Wed Feb 17 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-18 09:34:19'),
(164, 'dc68a4beef59cc48f409c0516a606555', 'Thu Feb 18 2021 10:26:38 GMT+0530 (India Standard Time)', '2021-02-18 10:26:34'),
(165, '6515842603c293d24ed2fc98e7090a0f', 'Wed Feb 17 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-18 11:54:39'),
(166, 'ab10626da704556fe04ee8ca4f6aa22e', 'Thu Feb 18 2021 14:18:38 GMT+0530 (India Standard Time)', '2021-02-18 14:18:38'),
(167, '95aa7e04ae99656a9fbdaa33eb3bbfd0', 'Wed Feb 17 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-18 14:56:04'),
(168, '6a10fb3bfb1ce911c2f7a16cbc94c554', 'Thu Feb 18 2021 16:15:00 GMT+0530 (India Standard Time)', '2021-02-18 16:15:00'),
(169, 'ccd46ef99baa4d22c630c1407a007995', 'Thu Feb 18 2021 17:50:09 GMT+0530 (India Standard Time)', '2021-02-18 17:50:12'),
(170, 'df4bd8f7fe4461bd2ed0e8b670264e7d', 'Wed Feb 17 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-18 21:18:02'),
(171, '64e335b45334815ed632516cfef86fdd', 'Wed Feb 17 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-19 21:28:07'),
(172, '', '', '2021-02-20 03:52:20'),
(173, '4bc9cbb165ab6d928a4d5003c27f7248', 'Mon Feb 22 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-23 12:26:26'),
(174, 'd5428cffdc834a1d98ed7eaea953911e', 'Mon Feb 22 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-23 14:15:45'),
(175, '7b2a69bd08c2325dddc0ac3913550940', 'Mon Feb 22 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-23 14:56:13'),
(176, '57e61b78993570833733d2a4f48cae91', 'Mon Feb 22 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-23 16:27:19'),
(177, '8225d0ff7464759507fdb885800fbacd', 'Mon Feb 22 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-23 16:37:23'),
(178, '29cfa275746468925fdca55ee5ebf933', 'Mon Feb 22 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-23 20:48:56'),
(179, '08b33c67ff3582bbfb1f01f27f9efc6f', 'Mon Feb 22 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-24 00:50:02'),
(180, '1d791b942ffb5932ab4686d2aaf1b68f', 'Mon Feb 22 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-24 03:21:05'),
(181, '217b826110d15abf1b1654b3980d8203', 'Tue Feb 23 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-24 07:21:27'),
(182, 'dfb8868d792bbaa17f994a6fb2824bdf', 'Tue Feb 23 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-24 08:11:21'),
(183, '618c2a71a5c7508b93d957417d02cf04', 'Tue Feb 23 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-24 11:22:05'),
(184, 'ac548d6c33f235cc909a3497329a69e3', 'Tue Feb 23 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-24 11:52:23'),
(185, 'ff19838dc4abce42b58cac78cfb70b8a', 'Tue Feb 23 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-24 12:13:14'),
(186, '14ea6d60c3f770921193a7763265c612', 'Wed Feb 24 2021 22:32:51 GMT+0530 (India Standard Time)', '2021-02-24 22:33:12'),
(187, '5b13d0ac07aa095cf08230b16fc0c49a', 'Tue Feb 23 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-24 22:36:54'),
(188, '00b5c8b20c65a8f57a9c6f9a7d602ee6', 'Wed Feb 24 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-25 12:57:31'),
(189, 'bb0606de26152f2e4fc74986be15b77c', 'Wed Feb 24 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-02-25 16:47:42'),
(190, '0bdb40c1e978a3f519167d3173415935', 'Sat Feb 27 2021 12:37:50 GMT+0530 (India Standard Time)', '2021-02-27 12:37:53'),
(191, '0623e01af713ab0c75c10d0abbad2479', 'Sat Feb 27 2021 01:08:21 GMT-0600 (CST)', '2021-02-27 12:38:25'),
(192, '', '', '2021-02-27 23:27:25'),
(193, 'e3b5b713352cc3dd72e225463148f075', 'Sun Feb 28 2021 12:52:33 GMT-0500 (EST)', '2021-02-28 23:22:37'),
(194, '226bfffa729c595bae78065bc1039693', 'Sun Feb 28 2021 23:27:07 GMT+0530 (India Standard Time)', '2021-02-28 23:27:08'),
(195, '5c82bfdb944690630871b1c4a1dd41e9', 'Sun Feb 28 2021 19:51:27 GMT+0000 (Coordinated Universal Time)', '2021-03-01 01:21:28'),
(196, 'ee3068f3940892905402b717f7f01bee', 'Tue Mar 02 2021 17:06:35 GMT+0530 (India Standard Time)', '2021-03-02 17:06:35'),
(197, '9b5d2a668c4144b286fd1fa64e2845ae', 'Mon Mar 01 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-03 05:14:34'),
(198, '03f7333dbcdb258b19c7023064c42464', 'Tue Mar 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-03 05:34:45'),
(199, 'ed9f6e5db9b9ee01520f6a9a763794ce', 'Wed Mar 03 2021 06:06:03 GMT+0530 (India Standard Time)', '2021-03-03 06:06:04'),
(200, '75ae0eef699e26a4a67e8a0ed8355dcf', 'Wed Mar 03 2021 06:06:11 GMT+0530 (India Standard Time)', '2021-03-03 06:06:12'),
(201, '2941336923ee0c61cd6c96ef8624ffb4', 'Tue Mar 02 2021 18:57:37 GMT-0800 (Pacific Standard Time)', '2021-03-03 08:27:48'),
(202, 'dc2ccd47f45381affe83c866557ae4ca', 'Tue Mar 02 2021 18:57:34 GMT-0800 (Pacific Standard Time)', '2021-03-03 08:27:51'),
(203, '892ec23de18aca2042917a0c257a41fb', 'Tue Mar 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-03 09:44:39'),
(204, '754cd490a87483cc8f7f512e0bee878e', 'Tue Mar 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-03 12:38:16'),
(205, '75b998e3a74d4cd9c9dbdb20e3afd40f', 'Tue Mar 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-03 15:15:47'),
(206, '55b6ae78eea8f5b8b48c17cebbaaca48', 'Tue Mar 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-04 00:48:42'),
(207, 'aaa651f7eac2ddbee8f3573e1e138a82', 'Tue Mar 02 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-04 03:29:18'),
(208, '2872a5e281510e698dfd7cb69cd8d4cf', 'Wed Mar 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-04 06:00:34'),
(209, 'd1325e8bb1a9ef93b0d3da2aa66238dd', 'Thu Mar 04 2021 10:35:56 GMT+0530 (India Standard Time)', '2021-03-04 10:35:51'),
(210, '227be5f7c5d3d4ceb767d0ce84c28699', 'Thu Mar 04 2021 07:11:26 GMT+0000 (GMT)', '2021-03-04 12:41:29'),
(211, '8b730aa11d3c31810eda6981ad1c2284', 'Thu Mar 04 2021 07:13:47 GMT+0000 (GMT)', '2021-03-04 12:43:48'),
(212, '8369d6a57d02fedc24f5646bb4ccb505', 'Wed Mar 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-04 18:40:25'),
(213, '08ac4513cb622b809b73d7364f2d5968', 'Thu Mar 04 2021 13:23:45 GMT+0000 (GMT)', '2021-03-04 18:53:46'),
(214, '5769893877b4d19d48f476eb784a8630', 'Wed Mar 03 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-05 08:48:37'),
(215, 'f977f5c3128950ffb394e77b79fa68b0', 'Fri Mar 05 2021 18:26:37 GMT+0530 (India Standard Time)', '2021-03-05 18:26:37'),
(216, '', '', '2021-03-06 08:49:34'),
(217, '135bb5796f378799f672f50f33502847', 'Sun Mar 07 2021 12:23:00 GMT+0530 (GMT+05:30)', '2021-03-07 12:22:59'),
(218, '', '', '2021-03-08 08:27:24'),
(219, 'b5fd0b8aff6debd39648f8f286c4662a', 'Mon Mar 08 2021 20:09:18 GMT+0530 (India Standard Time)', '2021-03-08 20:09:18'),
(220, '', '', '2021-03-09 02:26:25'),
(221, '1714898f47760b3bd4ae937826c19e7a', 'Mon Mar 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-09 06:42:14'),
(222, 'cc2cfebfe367669a2b92109ded36d465', 'Tue Mar 09 2021 05:50:28 GMT-0800 (Pacific Standard Time)', '2021-03-09 19:20:36'),
(223, 'beba23b2cd057d9241f06bc4a898a9d5', 'Mon Mar 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-09 22:15:10'),
(224, '21d0edaaa504ad20c7cc676e61f3f47c', 'Mon Mar 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-10 00:45:55'),
(225, '0c5d62db664b40e710290a481797346b', 'Mon Mar 08 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-10 01:16:09'),
(226, '4ece545cbdedb0761e3d43499e524e82', 'Wed Mar 10 2021 07:05:01 GMT+0530 (India Standard Time)', '2021-03-10 07:05:03'),
(227, 'a450a3b747522e4356cf84c1ba0ca479', 'Wed Mar 10 2021 07:05:13 GMT+0530 (India Standard Time)', '2021-03-10 07:05:15'),
(228, '2d4cd12e17419f79bfd7cccbb778094a', 'Tue Mar 09 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-10 12:10:02'),
(229, '3ea0c27227e21d04876828f289b22455', 'Tue Mar 09 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-10 12:40:20'),
(230, '0637e01ddf004f9d93457723610bce71', 'Tue Mar 09 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-10 19:03:53'),
(231, '61828805930c63e321b104b519fe5105', 'Tue Mar 09 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-10 23:14:55'),
(232, 'eda1b4c8f6ed36f520e010a7a5c34ff1', 'Wed Mar 10 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-11 09:53:25'),
(233, 'b12e6f004590d057153b4c6738d8a56c', 'Wed Mar 10 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-11 15:09:04'),
(234, '3ec3f80563590bdd832886b599f435c5', 'Wed Mar 10 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-11 15:34:06'),
(235, '2c9432d930507dab18e264da8ee754dc', 'Wed Mar 10 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-11 18:10:07'),
(236, 'f15d778aaae2dd2c24f4606a55828e30', 'Wed Mar 10 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-11 20:24:07'),
(237, 'd3c8e1bdc06bf2475b927b5cfba4fcf7', 'Wed Mar 10 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-12 00:11:39'),
(238, '14da7217563a8fad580d455d8d1d5972', 'Wed Mar 10 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-12 01:42:06'),
(239, 'ff43556f923b6eb3e326ce6b3dace176', 'Wed Mar 10 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-12 04:12:35'),
(240, '46b5be4f8086403f84c8f5efd26c4276', 'Thu Mar 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-12 05:53:40'),
(241, '5753ca0165ae82fdbbeb58c962ddaa2a', 'Thu Mar 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-12 13:42:52'),
(242, 'bccbef2b0f4f79062a3418e7e3fd08a6', 'Thu Mar 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-12 14:03:27'),
(243, 'ff071571c8b63d34a3c2538817a49bc5', 'Thu Mar 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-12 21:16:42'),
(244, '2c70d4cfaceb56267a188ae4ff6145d0', 'Thu Mar 11 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-13 00:06:51'),
(245, '9cbbe6aac7a3896544e73103a056118d', 'Fri Mar 12 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-13 06:14:05'),
(246, 'a944363d13ed5d1629c54bb6cfdd047f', 'Fri Mar 12 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-13 07:42:09'),
(247, '2f0b234a8f035c65e6357f7580a67fe3', 'Fri Mar 12 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-13 08:35:00'),
(248, 'a6ed6d5ac4b2badb48815f1bb34be78c', 'Fri Mar 12 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-13 15:24:08'),
(249, 'e8aa71096e04d0ebdce8c3d2462d8b7d', 'Fri Mar 12 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-13 16:45:20'),
(250, '30aadc099dd67972824037e56da2bdda', 'Fri Mar 12 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-13 21:08:34'),
(251, '7b717fbab61c4e01e001d4500d1c6d82', 'Fri Mar 12 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-14 01:57:50'),
(252, '638b529dfbffcae9cba49276c2bdbd61', 'Fri Mar 12 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-14 03:18:00'),
(253, '27e20cd0e236848e82d48cab16fea4c9', 'Sat Mar 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-14 09:00:30'),
(254, '116171a5fd850aad3bbb6a6528dac24c', 'Sun Mar 14 2021 00:40:32 GMT-0800 (Pacific Standard Time)', '2021-03-14 14:10:33'),
(255, 'ed56a5dd9db8c1d4ce67deaabc34d904', 'Sat Mar 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-14 16:53:36'),
(256, '41d7ab2e799cd02dcc3256e86a8f140e', 'Sat Mar 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-14 18:34:29'),
(257, '4dc56574794d3936634ca183a20371d0', 'Sat Mar 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-14 20:24:59'),
(258, '4d9b02472a4bed3f293d57fa8948d1e0', 'Sun Mar 14 2021 20:36:58 GMT+0530 (India Standard Time)', '2021-03-14 20:36:59'),
(259, '2cd30423c15d3ab10e6695fa966adec2', 'Sun Mar 14 2021 11:10:16 GMT-0400 (EDT)', '2021-03-14 20:40:22'),
(260, 'c510499e7e86b3d0cf7bbb3308b8e5cf', 'Sat Mar 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-14 21:24:49'),
(261, '2292a4fbb83dba2ad410e37423372cd3', 'Sat Mar 13 2021 16:00:00 GMT-0800 (Pacific Standard Time)', '2021-03-15 05:05:51'),
(262, '', '', '2021-03-15 09:42:39'),
(263, '2cf3830a027935d7241dcb227d1e9d17', 'Tue Mar 16 2021 10:48:00 GMT+0530 (India Standard Time)', '2021-03-16 10:48:02'),
(264, 'ed662f829a333e732eed4158a645de0b', 'Wed Mar 17 2021 06:42:09 GMT+0530 (India Standard Time)', '2021-03-17 06:42:10'),
(265, '', '', '2021-03-17 10:58:30'),
(266, '19b77be95bccaf61935b54b63b4520c4', 'Wed Mar 17 2021 15:39:40 GMT+0530 (India Standard Time)', '2021-03-17 15:39:39'),
(267, '0c24b0a41d90438a9772da8866bb9f6a', 'Thu Mar 18 2021 13:47:00 GMT+0630 (GMT+5:30)', '2021-03-18 12:47:11'),
(268, '5def734596ed9807e2c13b614a8e4e8d', 'Thu Mar 18 2021 13:47:00 GMT+0630 (GMT+5:30)', '2021-03-18 12:47:11'),
(269, '5def734596ed9807e2c13b614a8e4e8d', 'Thu Mar 18 2021 13:47:00 GMT+0630 (GMT+5:30)', '2021-03-18 12:47:11'),
(270, '0c24b0a41d90438a9772da8866bb9f6a', 'Thu Mar 18 2021 13:47:00 GMT+0630 (GMT+5:30)', '2021-03-18 12:47:11'),
(271, 'b704b4206625a603c614aedfecd9a582', 'Thu Mar 18 2021 16:01:31 GMT+0530 (India Standard Time)', '2021-03-18 16:01:31'),
(272, '5c90948e914aaeb4f77e61de0249ed1f', 'Fri Mar 19 2021 18:55:09 GMT+0545 (Nepal Time)', '2021-03-19 18:40:06'),
(273, '', '', '2021-03-20 20:51:35'),
(274, '9b2eb58ad43bd0d18baea7b8e2191eba', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-23 08:58:48'),
(275, 'cc29f985e628a29c4a8d03dddb5b66e2', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-23 09:05:09'),
(276, 'f9e24004985d174f3b0c9a98c0c67a30', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-23 11:17:17'),
(277, 'b154c764720434a7361efb1213d1f747', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-23 12:24:32'),
(278, '', '', '2021-03-23 14:12:04'),
(279, '38a954f07dd5f93fded1f5fdcd10cdd2', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-23 23:11:46'),
(280, 'ce0cc5ba842be9b868a1baa1fc2f68b5', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-23 23:39:40'),
(281, '7c2dea529f180a064d0c700539ab4844', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 04:01:42'),
(282, '746ced959bbfeaede9e23296dee6358e', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 04:31:31'),
(283, 'd0cccad7db859e73178f5725cba271ea', 'Mon Mar 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 05:11:57'),
(284, '0c46fc0bf2886a95fc2834dbbb8a2035', 'Tue Mar 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 14:05:19'),
(285, 'b369052006aabbc636c6f34e5594bf82', 'Tue Mar 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 14:25:41'),
(286, 'd06838d42bd62e35fedbd0f3d1064b16', 'Tue Mar 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 16:16:13'),
(287, 'de8982649395a5bcee9e987fb1db2fd1', 'Tue Mar 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 16:56:33'),
(288, 'f5c328231a964cd30c1dd9c0a4779a11', 'Tue Mar 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 18:37:43'),
(289, 'e6f42c277e6fff14d21bcc32bea9b54c', 'Tue Mar 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-24 23:58:17'),
(290, 'f203644c5246a7eb671ea34ecc592f95', 'Fri Mar 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-27 17:16:54'),
(291, '4c88e6929c8d1019ffcaa6aeefc26ac4', 'Fri Mar 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-27 18:12:28'),
(292, '02b6938f6ac915867be37b4c50ebd15d', 'Fri Mar 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-27 20:32:26'),
(293, 'f427f41faeb9b242548f7e5171e5af08', 'Fri Mar 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-28 04:46:30'),
(294, '2044e3a2ef6d26df907db37499f04e42', 'Fri Mar 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-28 05:06:22'),
(295, '9c276e95b0c3ddf96f94249813811496', 'Sat Mar 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-28 06:02:07'),
(296, '1d6469150b517572892349b6039f755b', 'Sat Mar 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-28 12:57:40'),
(297, '10f32f014bd7d4093eff7ad297b3770e', 'Sat Mar 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-28 17:09:32'),
(298, 'bcaf4630ffbc1f8070e01436b80a38d5', 'Sun Mar 28 2021 08:40:48 GMT-0700 (Pacific Daylight Time)', '2021-03-28 21:10:57'),
(299, 'edf67f44e4957c594c40f1796adb1865', 'Sat Mar 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-28 22:33:39'),
(300, '9751793613e41e168d0c9d2425332ec3', 'Sat Mar 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-28 23:03:54'),
(301, '97fa6b4f67301604ade5b802519d4be4', 'Sun Mar 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-29 05:55:01'),
(302, '0775084c6d37faac98fdf19d165bcf9d', 'Sun Mar 28 2021 20:18:44 GMT-0700 (Pacific Daylight Time)', '2021-03-29 08:48:49'),
(303, 'd71da238619e95d2192a7abc3f9a3ecc', 'Sun Mar 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-29 09:06:52'),
(304, '', '', '2021-03-29 09:42:50'),
(305, '5894400f9926131e847c329fc213377f', 'Sun Mar 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-29 17:30:24'),
(306, '8898f2d9b5f1867bb05e7166758db2c4', 'Sun Mar 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-29 19:10:27'),
(307, '9454fd317ffc0a311246f5a2dde31791', 'Sun Mar 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-29 20:41:24'),
(308, '3969d1dbcb2014573517e48723e4b483', 'Sun Mar 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-30 03:35:50'),
(309, '06c09d709015ea77ff4ab6d9f232764d', 'Mon Mar 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-30 10:19:56'),
(310, '378b7b70a8468f6ec6e91ff2bb83797e', 'Mon Mar 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-30 12:34:57'),
(311, '51ddf729a9bebb4c71238564e1b312eb', 'Tue Mar 30 2021 15:40:07 GMT+0530 (India Standard Time)', '2021-03-30 15:40:09'),
(312, 'da557795456293d9785e94e4d7772967', 'Tue Mar 30 2021 11:41:16 GMT-0400 (EDT)', '2021-03-30 21:11:25'),
(313, '0bfc897a6b26131fa81604b00a5479c9', 'Mon Mar 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-30 21:37:01'),
(314, 'de3b6bf38bef8088b4d97d75335ca73b', 'Mon Mar 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-31 06:34:58'),
(315, 'eba225c0ae0e401a738278c82588cc1c', 'Tue Mar 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-31 08:57:55'),
(316, '917bf338d3331cb145ed47c62285732a', 'Tue Mar 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-31 11:51:08'),
(317, '209006666620ea81d785a0ba707a8de1', 'Tue Mar 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-03-31 16:06:31'),
(318, '80bc948b1595043996fd3ff858298aed', 'Wed Mar 31 2021 13:06:55 GMT+0000 (Coordinated Universal Time)', '2021-03-31 18:36:55'),
(319, '5f85bc8e8eb5f8be65a0675b81a668fe', 'Wed Mar 31 2021 08:32:58 GMT-0700 (Pacific Daylight Time)', '2021-03-31 21:03:03'),
(320, '03063863113d712215bb36adf1ac01f5', 'Tue Mar 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-01 02:00:22'),
(321, '03063863113d712215bb36adf1ac01f5', 'Tue Mar 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-01 02:05:29'),
(322, '77c2470945eb98b6229f51ee707e0e00', 'Wed Mar 31 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-01 05:34:05'),
(323, '913fc49ff1579f2fadbadb7bbb060728', 'Wed Mar 31 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-01 05:43:58'),
(324, '5c93997c6f538b2ebd3208e3b13bdee5', 'Wed Mar 31 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-01 10:16:09'),
(325, '', '', '2021-04-01 15:35:58'),
(326, 'f8222959e7ccb408cdc8a4a4ad0aeec5', 'Wed Mar 31 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-02 01:22:49'),
(327, '75d17ae08163faec7217aad7d1caa0df', 'Thu Apr 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-02 05:51:37'),
(328, 'd8ea1ddf4f50c0309bf64a645e1a17ad', 'Thu Apr 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-02 08:52:57'),
(329, 'e6534d3280435d1bd22fa6e9519cfb18', 'Thu Apr 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-02 12:04:43'),
(330, '3e60ae0018b027a47d3f2cd6f469009c', 'Thu Apr 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-02 15:06:40'),
(331, '', '', '2021-04-02 16:14:17'),
(332, '5fa47bbba44e22de711052b8a110b88f', 'Thu Apr 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-02 21:39:12'),
(333, '0380b5a5084aa79572a01bde6b76de64', 'Sat Apr 03 2021 10:51:56 GMT+0530 (India Standard Time)', '2021-04-03 10:52:01'),
(334, '5367918d71af8b8607ce8bd68aa5b848', 'Fri Apr 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-03 12:32:20'),
(335, 'babf8345909cb7f7f263a15fce13c018', 'Fri Apr 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-03 13:22:28'),
(336, '75b9b63c616e1208e413998b24478fd6', 'Sat Apr 03 2021 14:37:00 GMT+0630 (GMT+5:30)', '2021-04-03 13:37:10'),
(337, 'abf61e1ce691f3b0db1bb3e816540c29', 'Fri Apr 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-03 14:02:48'),
(338, 'ec16be6987d9081b116232e2bf4a989b', 'Fri Apr 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-03 23:12:49'),
(339, 'fa8f11f3ce4319f9b608a86dd18dd73f', 'Fri Apr 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-03 23:42:42'),
(340, '52b584c351579026056c3ab7b622db3f', 'Sat Apr 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-04 09:15:38'),
(341, 'd3fb3eb238cbdf96bf192130fe6009ae', 'Sat Apr 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-04 12:15:24'),
(342, '5fe5551812868c9ffe5a8c17200f7e50', 'Sat Apr 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-04 15:26:09'),
(343, '9e204692e08b22945711e711982c4b07', 'Sat Apr 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-04 18:37:24'),
(344, 'c45660e6727b784396cc45dfcb2cdc90', 'Sat Apr 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-05 00:49:37'),
(345, '1e9bafcc26dd74887a91d22038792ba9', 'Sun Apr 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-05 06:32:46'),
(346, 'e02239408f8e1b1dbf52cdd1c45ec209', 'Sun Apr 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-05 08:32:33'),
(347, '493e6c16e0f6e7b95a602ee3fa1e5a8a', 'Mon Apr 05 2021 09:08:37 GMT+0000 (GMT)', '2021-04-05 14:38:38'),
(348, '3cb6d8d8cf132215ad930b5af59f513e', 'Mon Apr 05 2021 09:10:38 GMT+0000 (GMT)', '2021-04-05 14:40:40'),
(349, 'f898481be5dd85f5712a8a1370669492', 'Sun Apr 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-05 18:13:58'),
(350, '2ea71e13732b28673cb2dca6f82c1297', 'Mon Apr 05 2021 12:53:05 GMT+0000 (GMT)', '2021-04-05 18:23:06'),
(351, '97b24785181ac141b590d1c233ca26a8', 'Sun Apr 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-05 20:04:56'),
(352, 'c6978e404bf7e5c96e91862a02ef838a', 'Sun Apr 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-06 01:32:51'),
(353, '6a72e1ac02e092cd3db8598151d85d79', 'Mon Apr 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-06 08:04:17'),
(354, '5f7190abce63e30319d5af0b401ccf7d', 'Mon Apr 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-06 14:46:36'),
(355, '20b18046b13a15f09d3802ebf3ffba0e', 'Mon Apr 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-06 18:08:53'),
(356, 'a31bb47dbf5c581aff031653d63fc38b', 'Mon Apr 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-06 18:59:10'),
(357, '17cd6ca4ef8ddfe03baaa0b73e2ea9b0', 'Mon Apr 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-07 00:49:38'),
(358, 'a9afb5ec614d3ed44fd0cebd88505e7b', 'Tue Apr 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-07 11:26:30'),
(359, 'afb16bf5cc53819da61642d501be5cb4', 'Tue Apr 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-07 18:37:58'),
(360, '774b3f2a30eee923dd409cf04fd8f54e', 'Tue Apr 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-07 20:39:08'),
(361, 'edb340fc53ec16e20cfceee747635a16', 'Tue Apr 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-07 21:09:14'),
(362, '', '', '2021-04-07 21:26:21'),
(363, 'da4d21ed4fbd6f81f0c59ee2df33d6b5', 'Tue Apr 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 02:24:40'),
(364, '9ec29cff77e58394b08aef67965e498a', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 06:36:28'),
(365, 'f1192faecfbffc64c2d5c7979ca16589', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 07:26:50'),
(366, '0822f1febc9134673896b7b67475b2ce', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 07:30:22'),
(367, '27d0729770ed6856330dbb75be5d9e84', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 08:00:25'),
(368, '3d8ed0fa98a49abd73b5df73b0b51c2d', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 14:47:56'),
(369, '05b13da3a60929f2b689b6ff0cece0ee', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 14:52:29'),
(370, 'd91e08f0be470c145109400f09a403ea', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 15:00:28'),
(371, 'e5998fa5ae6db191cdb0a02c9e864c85', 'Thu Apr 08 2021 02:32:09 GMT-0700 (Pacific Daylight Time)', '2021-04-08 15:02:25'),
(372, '', '', '2021-04-08 15:07:05'),
(373, '0485efe6bf11617e84bec273364ba755', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-08 19:09:14'),
(374, 'a28ce20cf5850a6e5e937d9f2804dd9e', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-09 00:30:54'),
(375, '574f3059261696a8374077c2781e4bb0', 'Wed Apr 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-09 03:46:53'),
(376, '5afb5c79dc5cef4ff87bfd0c646b78c8', 'Thu Apr 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-09 15:32:11'),
(377, '5d9821a2c827f590e4994d9dd7a14038', 'Thu Apr 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-09 15:52:13'),
(378, '4d64aa5ed11353cce6f68eecf9d403a6', 'Fri Apr 09 2021 06:25:20 GMT-0700 (Pacific Daylight Time)', '2021-04-09 18:55:23'),
(379, '9a1238dd9aab7a6b6cb234167b6b9e5b', 'Fri Apr 09 2021 09:07:19 GMT-0700 (Pacific Daylight Time)', '2021-04-09 21:37:23'),
(380, '213e81c56fc835facd6cc50d7d6978bf', 'Fri Apr 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-10 06:29:31'),
(381, '700dbfb334a5917a13f95008fbc4aef2', 'Fri Apr 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-10 07:40:20'),
(382, '1836b822d194fd20c38edcf19d89b79a', 'Fri Apr 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-10 09:31:07'),
(383, 'fe45aeb42d0ae3f0b9e1087f4284085f', 'Sat Apr 10 2021 01:37:21 GMT-0700 (Pacific Daylight Time)', '2021-04-10 14:07:25'),
(384, '1245729d5cbcb0a9b64a4e521fe4cc2c', 'Sat Apr 10 2021 08:55:14 GMT+0000 (Coordinated Universal Time)', '2021-04-10 14:25:15'),
(385, '1b0ee6162b4b11c88208546fe91926c2', 'Sat Apr 10 2021 02:07:20 GMT-0700 (Pacific Daylight Time)', '2021-04-10 14:37:23'),
(386, 'f3a23f428adee9f744b873243ba15575', 'Fri Apr 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-10 16:47:04'),
(387, 'c88f0ad4712e78a47457f745e5bec749', 'Fri Apr 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-10 17:27:26'),
(388, '8899640b3a624c102fdb9b68c8de3e26', 'Fri Apr 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-10 18:57:42'),
(389, '897d84a2dbe3e2f41563561652cf6f28', 'Sat Apr 10 2021 10:22:28 GMT-0700 (Pacific Daylight Time)', '2021-04-10 22:52:36'),
(390, '6dfee387d0b52ea65416ae6667961328', 'Sat Apr 10 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-11 06:21:26'),
(391, '9f1706066eeab21d66c510ff54795c6a', 'Sat Apr 10 2021 21:33:34 GMT-0700 (Pacific Daylight Time)', '2021-04-11 10:03:37'),
(392, '69c603ec1ca9e6a77821edcf1875f1b7', 'Sat Apr 10 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-11 15:37:34'),
(393, 'e5de170b8c48be4dd9ea3b810e67915f', 'Sun Apr 11 2021 06:50:38 GMT-0700 (Pacific Daylight Time)', '2021-04-11 19:20:40'),
(394, 'd68fa6e9b99ce314f5972125b65d0496', 'Sat Apr 10 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-11 22:18:05'),
(395, '9f83459ce0792c30a9376f32c91a6b54', 'Sat Apr 10 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-12 01:20:05'),
(396, '471da6b508be150219df0bdcbdbfbcfd', 'Sat Apr 10 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-12 04:10:15'),
(397, '7d44bc4fef54f9ff7d8d536e78e82550', 'Sun Apr 11 2021 16:29:42 GMT-0700 (Pacific Daylight Time)', '2021-04-12 04:59:46'),
(398, 'a9a0f86b982968de8f90f2e4dfd25c40', 'Sun Apr 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-12 08:43:22'),
(399, '13076f9158094f87220b8930c32c0759', 'Mon Apr 12 2021 01:34:41 GMT-0700 (Pacific Daylight Time)', '2021-04-12 14:04:46'),
(400, '850c1059259bb11d75729b9adf4d0a1f', 'Sun Apr 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-12 15:26:02'),
(401, '0c5b8e20aa35d9d59db6b899e568e1a4', 'Sun Apr 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-12 17:36:09'),
(402, '4146b8be2dc34bef07afdd8304e70026', 'Sun Apr 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-12 22:37:08'),
(403, 'b3896140d7750d8240da9df390e0af2f', 'Sun Apr 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-13 01:53:55'),
(404, '1ba0ebbdd96486d9317382dfc8d22882', 'Sun Apr 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-13 04:22:53'),
(405, 'd20cbfa9aabfad7ca5ffea3373076d08', 'Mon Apr 12 2021 16:13:45 GMT-0700 (Pacific Daylight Time)', '2021-04-13 04:43:48'),
(406, '29faeeb99d1bd5f23e096d21037bbe95', 'Mon Apr 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-13 09:52:07'),
(407, '15f16941b724c27e8b0cef01668c5e52', 'Mon Apr 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-13 13:54:38'),
(408, '253faa5f1f0501f7c94658523de65511', 'Mon Apr 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-13 15:55:06'),
(409, '1795beaff18087aee10182b7b528a5b9', 'Mon Apr 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-13 21:29:56'),
(410, 'bced4ef1e47c1dd1c9e6c934e199cb48', 'Tue Apr 13 2021 10:36:47 GMT-0700 (Pacific Daylight Time)', '2021-04-13 23:06:51'),
(411, '180de4aa518ee8b35d2360d3b6c855dd', 'Mon Apr 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-13 23:40:55'),
(412, '0dc395941ec0a47990509bbd23b6d10d', 'Tue Apr 13 2021 23:41:48 GMT+0530 (India Standard Time)', '2021-04-13 23:41:48'),
(413, '33c0f5fc189604ede11d3435bd2f8388', 'Mon Apr 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-14 01:41:38'),
(414, '2b3d39ed7d8a51071436f20c673bd2b4', 'Tue Apr 13 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-14 06:39:34'),
(415, '66684f7e27b9212d4ffdcecdf865fd1e', 'Tue Apr 13 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-14 07:39:37'),
(416, 'a5f0b42e6690b6a8115f2228190b8c2f', 'Tue Apr 13 2021 20:13:30 GMT-0700 (Pacific Daylight Time)', '2021-04-14 08:43:32'),
(417, 'fa95a3c4c8798042d74a028ca0026198', 'Tue Apr 13 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-14 16:36:24'),
(418, '368453039fba997a1edd7d1cf5750597', 'Wed Apr 14 2021 04:54:45 GMT-0700 (Pacific Daylight Time)', '2021-04-14 17:24:49');
INSERT INTO `visitors` (`id`, `user_id`, `visiters_id`, `creation_date`) VALUES
(419, '029ce1b7ba814a5c7cdcf41f61beef06', 'Tue Apr 13 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-14 23:48:23'),
(420, 'a5669303cf5cdb3ce356833854b40793', 'Tue Apr 13 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-15 00:48:43'),
(421, 'cf35d8237fe0991535251d95f6002891', 'Wed Apr 14 2021 19:36:36 GMT-0700 (Pacific Daylight Time)', '2021-04-15 08:06:40'),
(422, 'd0b2c4b00aecc72c7d4e937134902922', 'Thu Apr 15 2021 05:17:34 GMT-0700 (Pacific Daylight Time)', '2021-04-15 17:47:38'),
(423, 'ed4934a36d244dc47e568f0e999c1a8a', 'Thu Apr 15 2021 15:56:06 GMT+0000 (GMT)', '2021-04-15 21:26:09'),
(424, 'b334851e3fe5636f1803fcef9dd37adb', 'Thu Apr 15 2021 15:58:13 GMT+0000 (GMT)', '2021-04-15 21:28:14'),
(425, 'dd70b09b15c59ad4bf0f2740cbcfedc2', 'Thu Apr 15 2021 12:50:22 GMT-0700 (Pacific Daylight Time)', '2021-04-16 01:21:18'),
(426, 'cebd190816e67cfdef5eb58ca53a505a', 'Fri Apr 16 2021 09:43:28 GMT+0530 (India Standard Time)', '2021-04-16 09:43:29'),
(427, '632505ad37798dee1c671d00912b8ea2', 'Mon Apr 19 2021 08:29:03 GMT-0700 (Pacific Daylight Time)', '2021-04-19 21:00:26'),
(428, '5896cf71062975b59baad070c4954e98', 'Mon Apr 19 2021 16:21:11 GMT-0700 (Pacific Daylight Time)', '2021-04-20 04:51:18'),
(429, '950dff308916c3c9972e37da3aab377d', 'Mon Apr 19 2021 22:02:50 GMT-0700 (Pacific Daylight Time)', '2021-04-20 10:32:53'),
(430, '9f2eef942d74ce30ab3ae1f71f2fb25d', 'Tue Apr 20 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-21 17:29:31'),
(431, '05160a856128227fe4ddff08c6462320', 'Tue Apr 20 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-21 18:29:33'),
(432, 'a9f2b1f349990066dc9a551fcf331f7f', 'Thu Apr 22 2021 08:43:58 GMT-0700 (Pacific Daylight Time)', '2021-04-22 21:14:01'),
(433, 'a8b322e1c0ca627b5d919ec4b41f4344', 'Thu Apr 22 2021 13:19:05 GMT-0700 (Pacific Daylight Time)', '2021-04-23 01:49:09'),
(434, '85a12abb7947689247ff3c1d650b9717', 'Thu Apr 22 2021 16:34:30 GMT-0700 (Pacific Daylight Time)', '2021-04-23 05:35:35'),
(435, 'a15053ad6aabc383987613cbebde5fc3', 'Fri Apr 23 2021 01:32:18 GMT-0700 (Pacific Daylight Time)', '2021-04-23 14:02:19'),
(436, '76cbb3d508e39c7514812bcdb535c161', 'Thu Apr 22 2021 22:32:37 GMT-0700 (Pacific Daylight Time)', '2021-04-23 17:23:33'),
(437, '', '', '2021-04-25 10:29:30'),
(438, 'cd588c3980762ab7de494c20c4b6e249', 'Sun Apr 25 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-27 02:36:25'),
(439, '6b8055975f0171a12a24d62850fdea92', 'Sun Apr 25 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-27 03:40:12'),
(440, '4a9c4e0221c1d4f6b692539da3122f54', 'Mon Apr 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-27 13:32:48'),
(441, '28e41f5c3b94aab3d612e04c99e736ba', 'Mon Apr 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-27 13:47:52'),
(442, 'de40560413c030e4936555dd09aad66f', 'Tue Apr 27 2021 19:26:37 GMT+0530 (India Standard Time)', '2021-04-27 19:26:39'),
(443, '2d59400c2d5781ba408a5a6a7aa066ad', 'Mon Apr 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-28 01:30:36'),
(444, 'f85e7d09101ae3077f13ad9d3fcdc3eb', 'Mon Apr 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-28 04:20:43'),
(445, '65e2cedd4459be8d3ff511ae5c27bcf5', 'Mon Apr 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-28 04:50:42'),
(446, '96d58e3b6e0abbecf76c2221fba8914e', 'Tue Apr 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-28 12:59:11'),
(447, '9ba5c9ca75ecb1635e25e271fd6f3b51', 'Tue Apr 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-28 15:40:01'),
(448, '180a3df209ddb9e9e8cfc34a95ddd326', 'Wed Apr 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-29 05:34:47'),
(449, '4aba9bb81c2b11cf649216a07963b69c', 'Wed Apr 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-29 05:44:59'),
(450, '629753b38ebdfb49c5a9486976e0955b', 'Wed Apr 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-29 16:00:17'),
(451, '107dc0051646018912ad6724ce1b2b2e', 'Wed Apr 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-29 16:26:09'),
(452, '4f36e61eaa0fc657cfb8ec285d4054d0', 'Wed Apr 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-04-29 18:11:38'),
(453, '6de4301b3632737c7c31c00f3a1d8a8f', 'Fri Apr 30 2021 06:31:32 GMT+0530 (India Standard Time)', '2021-04-30 06:31:34'),
(454, '8de191f698399bc511872e466a1556dd', 'Sat May 01 2021 16:31:45 GMT+0530 (India Standard Time)', '2021-05-01 16:31:45'),
(455, 'b81eba773f381d4b4d9798c6b9f55eee', 'Sat May 01 2021 04:30:30 GMT-0700 (Pacific Daylight Time)', '2021-05-01 17:00:30'),
(456, '29b13e21df9b98db9ef19abd5e617b30', 'Sat May 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-02 15:24:33'),
(457, 'a3324b7748692887f99611e4617076a2', 'Sat May 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-02 16:14:47'),
(458, 'e22e415b8c8dfd31539c3b146eb80787', 'Sat May 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-03 02:58:03'),
(459, '7ec4131fe598e21b579fde6b9a83b2c5', 'Sat May 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-03 05:29:00'),
(460, 'a9dff85af39cf57294b1d7252ac49ac4', 'Sun May 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-03 08:40:09'),
(461, '2a5faa6501118b927f6fe939a65b987a', 'Sun May 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-03 13:21:15'),
(462, 'b0311a639d18728c21fb5e68083a7f0b', 'Sun May 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-03 16:53:03'),
(463, '6694ba579154ac7475df872356a66379', 'Sun May 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-03 20:13:15'),
(464, '144993158d67d28fed1042bdb7218d10', 'Mon May 03 2021 10:36:07 GMT-0700 (Pacific Daylight Time)', '2021-05-03 23:06:06'),
(465, 'aea1e2596fcb1cdcf5f2c4524fd4fa8d', 'Mon May 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-04 07:34:08'),
(466, '5b0dae57ee0d0b4f63ef40ce3a00f370', 'Tue May 04 2021 06:26:42 GMT+0000 (Coordinated Universal Time)', '2021-05-04 11:56:43'),
(467, '8cab45a479c08ecfd01f3d3df4d74dc1', 'Tue May 04 2021 19:17:26 GMT+0530 (India Standard Time)', '2021-05-04 19:17:26'),
(468, '1c6fa9b20ee0abb973e4172f058c9eaf', 'Mon May 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-04 22:54:18'),
(469, '6906be35dab48da7643dd4098e0d736b', 'Mon May 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-05 04:22:25'),
(470, 'd28a260b3b724ecacd71047791c58a14', 'Mon May 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-05 05:25:00'),
(471, '5874346595ce0fbe7b2f87fffa720186', 'Tue May 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-05 07:46:32'),
(472, 'e9518895f448da242026dad06f825437', 'Tue May 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-05 15:18:16'),
(473, '28aa1820f62b0f7395b34576bc89fd60', 'Tue May 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-05 17:58:30'),
(474, '32c67d05c091885d16410e20fc5ae0fb', 'Wed May 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-06 08:27:17'),
(475, 'ad15e9cce4fd1ca8dbb5c4656a2391dd', 'Wed May 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-06 11:07:46'),
(476, 'e680299375cb8fae2f3f4e7d064c13b3', 'Wed May 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-06 23:41:30'),
(477, '446496965ef5a2d6c6ac0d1893505174', 'Thu May 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-07 06:58:40'),
(478, '2568691ece836d4a50d02e65d276e912', 'Thu May 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-07 08:49:10'),
(479, '8d8761783224ef773b650ef75f312a0e', 'Thu May 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-07 12:23:07'),
(480, '85fb836033471a4270fd2942f630f03b', 'Thu May 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-07 13:53:34'),
(481, '14d1336a8d7a0432fd0818d2031e91df', 'Thu May 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-07 14:53:37'),
(482, '11b90ae4f304ee8acbf70ad6d204106a', 'Thu May 06 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-08 00:23:19'),
(483, '4dc675936f230f2068b3f5eff77e5d2f', 'Fri May 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-08 22:35:31'),
(484, '2bb56a37755881c95be7e1920e570865', 'Fri May 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 02:56:48'),
(485, 'd26d1d4a497761baa43e31bb335d363c', 'Fri May 07 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 04:07:00'),
(486, 'ac81eea64c7ba233de21f64547b92425', 'Sat May 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 11:18:40'),
(487, '4dffcd6ddc44665c2e9af2bd9878d368', 'Sat May 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 12:29:25'),
(488, '33787beec71302f11a065a7e83a5dc3a', 'Sat May 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 13:30:21'),
(489, 'ebd543ed17fddd0be9774c418298a87e', 'Sun May 09 2021 08:08:58 GMT+0000 (GMT)', '2021-05-09 13:38:59'),
(490, '3465aa8206477d6fc0db98813eecea04', 'Sun May 09 2021 08:10:59 GMT+0000 (GMT)', '2021-05-09 13:41:00'),
(491, '9b91d9981cf8dc64812941a3d14a8896', 'Sun May 09 2021 08:27:22 GMT+0000 (GMT)', '2021-05-09 13:57:24'),
(492, '9523d6f76f12ee880fc836317cb3422d', 'Sun May 09 2021 08:29:47 GMT+0000 (GMT)', '2021-05-09 13:59:49'),
(493, '5b6bdf370afb8ae19038121d43ffc56b', 'Sun May 09 2021 08:39:43 GMT+0000 (GMT)', '2021-05-09 14:09:45'),
(494, '9d014c7fbf07e8fec0689e2963ec3a24', 'Sat May 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 15:23:30'),
(495, '21e0b49ce8a83d74faa7881279bc9719', 'Sat May 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 15:53:29'),
(496, '7e31c8898666705af20a22f286c6fb28', 'Sat May 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 16:23:29'),
(497, '28af53c1138b91981c8bc88c53687c8b', 'Sat May 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-09 21:02:30'),
(498, '1f96715e4eca3a4606074229998b620b', 'Sun May 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-10 10:09:23'),
(499, '13757edb6e5e488acb280e805c48295c', 'Mon May 10 2021 16:11:46 GMT+0530 (India Standard Time)', '2021-05-10 16:12:08'),
(500, '88cefb8efaee2b259fd77d5c170674bf', 'Mon May 10 2021 16:17:21 GMT+0530 (India Standard Time)', '2021-05-10 16:17:22'),
(501, '0e2972b6d625df0683921b31e4ead776', 'Mon May 10 2021 17:06:41 GMT+0530 (India Standard Time)', '2021-05-10 17:06:43'),
(502, 'eb1f0a4a3336081bc08fbcbbd091be9e', 'Mon May 10 2021 17:09:03 GMT+0530 (India Standard Time)', '2021-05-10 17:09:04'),
(503, '71f62d90c0cd58816ccd439846b167cf', 'Sun May 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-10 19:32:13'),
(504, '269000b9bc82b296b4174367b6ad2f9d', 'Mon May 10 2021 10:45:11 GMT-0700 (Pacific Daylight Time)', '2021-05-10 23:15:11'),
(505, 'f3e37b0546b58beed46a1d5ad5a422af', 'Sun May 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-10 23:27:45'),
(506, '069deb3b0899e961f26645b7d85c63d0', 'Tue May 11 2021 16:12:11 GMT+0530 (India Standard Time)', '2021-05-11 16:12:11'),
(507, 'ca66bc3851cb81a6ab124352e7a70231', 'Mon May 10 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-11 17:36:18'),
(508, '4f19d94d773de4ea878c33b417f47d17', 'Tue May 11 2021 19:00:15 GMT+0530 (India Standard Time)', '2021-05-11 19:00:15'),
(509, 'fd7cb06d97da911997fbea012ecec0aa', 'Mon May 10 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-11 19:26:46'),
(510, '2aad9b703dbdfd0125fab502a083b784', 'Mon May 10 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-11 20:36:31'),
(511, 'c7e0e81dfbeb782364eedfada43c1f43', 'Wed May 12 2021 10:06:59 GMT+0530 (India Standard Time)', '2021-05-12 10:07:00'),
(512, '299fbfecc70bdbfeadc8fce5c63db512', 'Tue May 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-12 17:54:40'),
(513, 'f9a1793d63297b06270415e1030561e6', 'Tue May 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-12 19:31:21'),
(514, '057c5ae1681394f879bbb762de33b9af', 'Tue May 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-12 20:11:27'),
(515, '2ee30d2d6c0b27ee741f6fda62992051', 'Tue May 11 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-12 22:43:57'),
(516, 'fe92aca7ebf726e18e1a096b21122aa2', 'Wed May 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-13 05:41:51'),
(517, '02ba0e7a15b99fa6778c5f620157d0eb', 'Wed May 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-13 12:47:25'),
(518, '268778f74a1cfd8f28965f5ffa79f846', 'Wed May 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-13 17:17:29'),
(519, 'd87b761c5d30c80b4681d2a3b5557f06', 'Wed May 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-13 18:27:55'),
(520, 'bf7ac4416b55444606409e8758fa3b0c', 'Wed May 12 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-13 22:09:29'),
(521, 'c47662102556686de22b57af522f1e41', 'Fri May 14 2021 07:21:04 GMT+0000 (Coordinated Universal Time)', '2021-05-14 12:51:05'),
(522, '97a8748fe15c18def47d4c0e0e266f97', 'Thu May 13 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-14 13:07:55'),
(523, '', '', '2021-05-14 16:27:09'),
(524, '6eaf75066bc51546df8fa6daf40f6414', 'Thu May 13 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-14 17:29:01'),
(525, '4f9f6b912332e7794c2c75bab65c2580', 'Thu May 13 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-14 21:51:20'),
(526, '936359fab42390425bd7fdbb41dfab51', 'Fri May 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-15 18:28:08'),
(527, '16f73273e2a7ba06a514ee4225ac11e0', 'Fri May 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-15 23:31:24'),
(528, '99bb302145285a1361f7fe6352cb8131', 'Fri May 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-16 00:00:15'),
(529, '51813eafdda9013e20e267d11ff24dec', 'Fri May 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-16 04:50:19'),
(530, 'f92590ce7ec166b84c31533453fff9ce', 'Sat May 15 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-16 11:10:39'),
(531, '54fd86570916fff80d00c3bf775cdba0', 'Sat May 15 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-16 13:31:49'),
(532, '4c7a64c7dd28bfe1c543a6d61ed866b0', 'Sun May 16 2021 14:53:15 GMT+0530 (India Standard Time)', '2021-05-16 14:53:18'),
(533, 'a5000dd47c91765873fb734b36dab1a3', 'Sat May 15 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-16 15:05:47'),
(534, '4be5eff09798b59ce140b93f60d9ab24', 'Sat May 15 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-16 17:52:54'),
(535, 'f2bcb7594252415a63d9d1bc75401da5', 'Sat May 15 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-16 22:03:08'),
(536, '452bdf8dd064b00f0fd51e38324f3d5f', 'Sat May 15 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-17 02:23:43'),
(537, 'c18ea1e9f9d5dfad81e397a9cfeb57d7', 'Sat May 15 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-17 05:14:09'),
(538, 'e24a9359c5cf516ae41df28f79fdcb64', 'Sun May 16 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-17 08:05:06'),
(539, '45dd40cb60ce918ae1113e8704d7c9ce', 'Sun May 16 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-17 14:36:39'),
(540, '28f341f770f24abfd73279cddaefc4f0', 'Sun May 16 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-17 16:25:24'),
(541, '69a4e9b5d43f9ae239a0e0af8c2704e9', 'Sun May 16 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-17 17:48:17'),
(542, '', '', '2021-05-17 19:19:23'),
(543, '603e1530589ee40b11a0699a59b1af1b', 'Mon May 17 2021 10:36:37 GMT-0500 (Central Daylight Time)', '2021-05-17 21:06:38'),
(544, '9090284d2abf08afc8ee1f865549f524', 'Mon May 17 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-18 06:22:55'),
(545, '9731b6117dac654c78f5a0a6e81281d0', 'Mon May 17 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-18 08:23:25'),
(546, '123bd1fdc703d9197469deda73c212c2', 'Tue May 18 2021 09:52:12 GMT+0000 (Coordinated Universal Time)', '2021-05-18 15:22:13'),
(547, 'b0d0bd63a860b89dee016cdee1eda81f', 'Mon May 17 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-18 16:35:37'),
(548, 'a4d7450e2c28f0b8afb34d8057c83663', 'Mon May 17 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-18 22:17:18'),
(549, '52b7d2d4bb97a4014529ec7528250c36', 'Mon May 17 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-19 01:38:28'),
(550, 'babb3ad2367d11924ff3d72057b27aaa', 'Wed May 19 2021 10:03:27 GMT+0530 (India Standard Time)', '2021-05-19 10:03:28'),
(551, '6474fad1dc2cf07654db068870a7e998', 'Tue May 18 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-19 10:22:00'),
(552, '91612fbe87f406e32aeabd47945f5073', 'Tue May 18 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-20 06:15:36'),
(553, 'ce62449d1667b41a28b5ff895943932e', 'Tue May 18 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-20 06:23:01'),
(554, '9e8d9a3290e27096b466256adee1ea00', 'Wed May 19 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-20 16:21:05'),
(555, 'b29407f308dca1982dcbf607fde35dfa', 'Wed May 19 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-20 18:02:00'),
(556, '60bb095f3f6fed27ee354d11f2142b9e', 'Wed May 19 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-21 04:08:06'),
(557, '3e871f17ac622f7e8908c89a0105d723', 'Fri May 21 2021 04:59:03 GMT+0300 (Moscow Standard Time)', '2021-05-21 07:28:54'),
(558, '093ef312ba5b91089871f2ee48b14060', 'Thu May 20 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-21 22:02:23'),
(559, '26455cb82cd783f97142e496385e15f9', 'Thu May 20 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-22 01:28:36'),
(560, '3abf6bb334ce2b578bda9521f805dbfa', 'Fri May 21 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-22 09:30:11'),
(561, '93850048d325d32bc52e93c0f8053fa1', 'Fri May 21 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-22 16:57:31'),
(562, '27a9b7bfdf356aa58d607776c36ab28a', 'Fri May 21 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-22 20:08:02'),
(563, '8ed01081c0138a0749416dec05f6e77e', 'Sat May 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-23 07:01:14'),
(564, '7785f98b03c293205d1df33d8923f647', 'Sat May 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-23 13:11:25'),
(565, '', '', '2021-05-23 18:52:52'),
(566, '46d551bed79adb2807b1f4b10883ecce', 'Sat May 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-24 02:15:10'),
(567, '041c7ccfb045089801e7a55865c4e237', 'Sat May 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-24 02:35:33'),
(568, 'e78c28ba349d822698075c67760553a1', 'Sat May 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-24 03:19:27'),
(569, 'a9232c9a0b82001af5aba0920e3c4619', 'Sat May 22 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-24 04:19:23'),
(570, '2be1c56141aa2128837a07945971921d', 'Sun May 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-24 15:07:56'),
(571, 'aa35468dd8a9535182f9cbf97d5f907f', 'Sun May 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-24 17:08:48'),
(572, '4610aaef0c91ee4d40c5d4bfc960978a', 'Sun May 23 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-25 00:11:32'),
(573, '3c332f9d5a3d489f1be62294100b750f', 'Mon May 24 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-25 10:57:58'),
(574, '2fde0ee4dd4c350d9928fa5aac12cdfd', 'Mon May 24 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-25 13:38:29'),
(575, 'b96d698361b531261237a074dd8e27b8', 'Mon May 24 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-26 02:32:44'),
(576, 'fc918e27a6da5b07f294def618698cec', 'Tue May 25 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-26 06:33:47'),
(577, '5890e36403f971aed1c32672426fc848', 'Tue May 25 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-26 12:17:37'),
(578, 'bf9ee379f3b5de3394c6d2ba70b4055f', 'Tue May 25 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-26 12:45:59'),
(579, '01273bb56457cc5097ba916d9377a010', 'Tue May 25 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-26 21:08:46'),
(580, '7dab6521cc19b423c7b6c6eccb7e746a', 'Tue May 25 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-26 23:50:26'),
(581, 'a13506412f01b37a08cd90992da94ebe', 'Wed May 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-27 08:15:29'),
(582, 'b7ad09afe36ff910f1ff93c185314715', 'Wed May 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-27 09:04:26'),
(583, '5f1790189ae0f64c6015ba03c01d2352', 'Wed May 26 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-27 17:36:33'),
(584, '56a4deaf4acfb6079fb53c0e612aa2de', 'Thu May 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-28 14:53:14'),
(585, 'c05c6cd0848cfc120d733e79567f2d98', 'Thu May 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-28 20:30:09'),
(586, '5ec19d2f99fc348b269119205652e459', 'Thu May 27 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-28 23:50:59'),
(587, '3b7f2010cd275f535a4d21fbdacccb06', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-29 07:53:41'),
(588, '182cc0abc4a756ddd6bd9d6d311ceb46', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-29 14:23:41'),
(589, '6de905212066d4bcad5dcd165203de31', 'Sat May 29 2021 17:12:28 GMT+0530 (India Standard Time)', '2021-05-29 17:12:30'),
(590, 'c3a26e46d37e631f40197f3d75f2b2d0', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-29 17:17:52'),
(591, '0490b115f40d0f26a5ced50ed7289d7d', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-29 17:32:53'),
(592, '', '', '2021-05-29 17:57:04'),
(593, 'ebb2d23d88ecc985d56b10f1423f3395', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-29 18:02:39'),
(594, '57155ada8560333edbb1efda740b29ad', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-29 18:18:01'),
(595, 'bbebc82f1eb1c7edd0a7563d6986b251', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-29 19:16:49'),
(596, '5e6d03b391be340fb0304af0ef4031ac', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-29 23:57:30'),
(597, '8b109ba58cf87011593e8dd10c394d66', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 03:39:54'),
(598, '726ca8b1b07f181a7d39ef008d596ddf', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 03:49:55'),
(599, '90ce19fcdc7bb6391bb1513cee8c347b', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 03:59:53'),
(600, '061b27a6f1436a9f56b598434f4e9800', 'Fri May 28 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 04:00:37'),
(601, 'ca547feed2f0d597585c8f9927e9f2eb', 'Sat May 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 10:57:39'),
(602, '6792ab59b9a49c641b14fb8efd8e0736', 'Sat May 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 14:04:38'),
(603, '7119468146e0c82ddd1ffac379bc68c5', 'Sat May 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 20:26:38'),
(604, '89bcad254506649f506b4b3162eb86d0', 'Sat May 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 23:23:05'),
(605, '89bcad254506649f506b4b3162eb86d0', 'Sat May 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-30 23:33:29'),
(606, '10c8981c40ce6f14a60aeabd698102e4', 'Sun May 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-31 06:02:17'),
(607, '1f9054a9126e34f859f9b6d1a67303ec', 'Sun May 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-31 19:13:21'),
(608, 'c070406cd88a90a19a847a17133dc4f9', 'Sun May 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-31 23:04:31'),
(609, '92603af7f28a26675a1fd673144b7e4a', 'Sun May 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-05-31 23:34:51'),
(610, '8892f80f37300de3b29e122c5b7537ef', 'Sun May 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-01 00:34:49'),
(611, '05d73673c8c5f5e91216d81b0b642843', 'Mon May 31 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-01 09:33:42'),
(612, '7b1e4fddfce190a47fcafb60a904b969', 'Mon May 31 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-01 12:14:59'),
(613, '2596ee4853405d5a96346d1846ff490b', 'Tue Jun 01 2021 14:25:08 GMT+0530 (India Standard Time)', '2021-06-01 14:25:30'),
(614, '2596ee4853405d5a96346d1846ff490b', 'Tue Jun 01 2021 14:25:08 GMT+0530 (India Standard Time)', '2021-06-01 14:25:31'),
(615, 'fea693761819e7513afafc8a0dc5851a', 'Mon May 31 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-02 00:57:29'),
(616, '8de813d8b50ad38eba35c3f740cf6c2f', 'Mon May 31 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-02 01:57:46'),
(617, 'ec15e92e632d1a91c5ca69e1915c49a3', 'Tue Jun 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-02 07:41:40'),
(618, '047f41f4481ff1442630e23df6fc659f', 'Tue Jun 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-02 15:23:36'),
(619, 'd73fee96ee7b13bd78a5b6812689914a', 'Tue Jun 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-02 15:32:21'),
(620, '1eaa00cb86900d2becaa739e70d94aef', 'Tue Jun 01 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-02 16:42:42'),
(621, 'dc604ca3047ec03f29cabf5c4ff5c7e9', 'Wed Jun 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-03 08:59:01'),
(622, 'e90d5ef04c5bc23de5d1acf5d9e9587a', 'Wed Jun 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-03 09:29:12'),
(623, '289b6347e4080cfce06540012b95fe1a', 'Wed Jun 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-03 10:09:03'),
(624, '3bf52c1f5fec27bb3c770c39b2cb057c', 'Wed Jun 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-03 12:09:31'),
(625, '31aacc73aee37ed79cd803f846a57e47', 'Thu Jun 03 2021 17:52:32 GMT+0530 (India Standard Time)', '2021-06-03 17:52:34'),
(626, 'dfadf8a4a7a55be42d43ae295bd87f45', 'Wed Jun 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-04 04:02:04'),
(627, 'ac0028eef313b6058bea5ccd8648aa3d', 'Wed Jun 02 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-04 04:07:53'),
(628, '393c96bc7de6fa8df3fd727ccb610888', 'Thu Jun 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-04 06:55:07'),
(629, '0ebbffe76018c284a7b6bdc8031f1f2f', 'Thu Jun 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-04 08:05:29'),
(630, '', '', '2021-06-04 11:05:36'),
(631, 'c9cbbe93e0d67dfefeb164b25e71fdd7', 'Fri Jun 04 2021 11:41:49 GMT+0530 (India Standard Time)', '2021-06-04 11:42:11'),
(632, 'e579dcdfd627d8498a5a00e80dc0f960', 'Thu Jun 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-04 15:48:02'),
(633, '', '', '2021-06-04 18:03:12'),
(634, '610141b462cb6c07cbf3141798142188', 'Thu Jun 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-04 18:28:11'),
(635, 'f608f717dcffabf8a81cc9b0d8e44f05', 'Thu Jun 03 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-05 01:00:45'),
(636, 'e98cba3d4d2904ddb34515afb4da9fe9', 'Fri Jun 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-05 12:26:30'),
(637, 'e1bc2ad83ec85cc36162dcaa7f05aa9f', 'Fri Jun 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-05 13:12:27'),
(638, '0fdfbadb8379795fd0191638bf20a3ea', 'Fri Jun 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-05 13:39:59'),
(639, 'e4d27ea590d64aa23af3c75ba2a500ef', 'Sat Jun 05 2021 14:07:17 GMT+0530 (India Standard Time)', '2021-06-05 14:07:36'),
(640, 'f2212d5affd8dc6739991ea8ed6c17d5', 'Sat Jun 05 2021 14:16:04 GMT+0530 (India Standard Time)', '2021-06-05 14:16:26'),
(641, '3899a5cc9e173d007c3c3dc67a820f63', 'Sat Jun 05 2021 17:49:52 GMT+0530 (India Standard Time)', '2021-06-05 17:49:53'),
(642, 'b3fa6e706cfad34fc7b6e638b63b64e2', 'Fri Jun 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-05 23:49:41'),
(643, '68c0e697e75e8f1ef757ed3f66faab70', 'Fri Jun 04 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-06 03:30:14'),
(644, '88f3dd30e6cdd36ff8ff89ab915cbcd8', 'Sat Jun 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-06 11:12:28'),
(645, '56ca3cb2afe22f22e18a8841fc06b6ab', 'Sat Jun 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-06 12:02:51'),
(646, '2d54a94b33d8e508b0eebf09c4b58ad5', 'Sat Jun 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-06 16:16:08'),
(647, 'd213edb7048be80efb43652eb0f6c146', 'Sat Jun 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-06 18:06:40'),
(648, 'cf259ec4d72de5dbc5143ee3227cc395', 'Sat Jun 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-06 21:57:21'),
(649, 'd77eeee76cd4acf7fa1600fd91ecdbb4', 'Tue Jun 08 2021 12:25:47 GMT+0530 (India Standard Time)', '2021-06-08 12:26:11'),
(650, '', '', '2021-06-08 16:10:07'),
(651, '', '', '2021-06-08 18:47:33'),
(652, '', '', '2021-06-08 19:04:42'),
(653, '7861bf84cfde84288cd46b4318db4b96', 'Tue Jun 08 2021 20:39:53 GMT+0530 (India Standard Time)', '2021-06-08 20:39:54'),
(654, '6f3b36124a1dbd8defcf329b3da73678', 'Tue Jun 08 2021 20:39:56 GMT+0530 (India Standard Time)', '2021-06-08 20:40:17'),
(655, 'ee6a993e53d1b8fcf0099ef4c9df6131', 'Tue Jun 08 2021 19:57:42 GMT+0000 (Greenwich Mean Time)', '2021-06-09 01:27:45'),
(656, 'b98c5e9cf54a26dfb5f25fff4ec50083', 'Wed Jun 09 2021 10:30:39 GMT+0300 (Moscow Standard Time)', '2021-06-09 12:59:33'),
(657, '9a0b82cc6b2eea6986955575d991f611', 'Wed Jun 09 2021 10:07:42 GMT-0000 (GMT)', '2021-06-09 15:37:42'),
(658, '5b5df5d08e54fcd67d569550e123734b', 'Wed Jun 09 2021 10:07:48 GMT+0000 (Coordinated Universal Time)', '2021-06-09 15:37:48'),
(659, 'e6dcf7744b3e0f34ceff6aacfc63e8dd', 'Thu Jun 10 2021 05:18:40 GMT-0700 (Pacific Daylight Time)', '2021-06-10 17:48:40'),
(660, 'd3267f481d90e5db4b2dcfab031058ce', 'Wed Jun 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-10 19:23:20'),
(661, 'f6b8cc8092f6300c0e19b9568cb26bbe', 'Fri Jun 11 2021 07:38:02 GMT-0000 (GMT)', '2021-06-11 13:08:02'),
(662, '3470d5e28f3d89382297bff9d5e4742e', 'Fri Jun 11 2021 07:38:07 GMT+0000 (Coordinated Universal Time)', '2021-06-11 13:08:08'),
(663, '7fa9fc9a134c8df9f4e0192dc311c1dd', 'Fri Jun 11 2021 07:39:09 GMT+0000 (Coordinated Universal Time)', '2021-06-11 13:09:09'),
(664, 'd410d1d7a6b9e983bb7fd07d98e746da', 'Sat Jun 12 2021 07:43:53 GMT-0000 (GMT)', '2021-06-12 13:13:53'),
(665, '33bd26bf15078c47fe21c20e31f22940', 'Sat Jun 12 2021 07:43:58 GMT+0000 (Coordinated Universal Time)', '2021-06-12 13:13:59'),
(666, '3f2aec93a5d5636bc0035ab040c6660e', 'Sat Jun 12 2021 07:45:23 GMT+0000 (Coordinated Universal Time)', '2021-06-12 13:15:24'),
(667, '53e91eb99940ad70790637fa7bc7e408', 'Mon Jun 14 2021 17:21:40 GMT+0530 (India Standard Time)', '2021-06-14 17:21:45'),
(668, '8a39bb959ee79e0bf3fd60d7da5b0876', 'Mon Jun 14 2021 17:23:19 GMT+0530 (India Standard Time)', '2021-06-14 17:23:21'),
(669, '2a189ae13fb42c88253a0ca9a26fefde', 'Mon Jun 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-15 10:43:33'),
(670, '2a189ae13fb42c88253a0ca9a26fefde', 'Mon Jun 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-15 10:45:22'),
(671, 'c2dbe4c2b2794faa864217c1b66f638f', 'Mon Jun 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-15 11:13:32'),
(672, 'e4ae346e0a22c0c5b8b2c16040969d60', 'Mon Jun 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-15 12:12:35'),
(673, 'e94a7400e059d655b4accfd24a1b6b5f', 'Mon Jun 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-15 13:12:35'),
(674, 'e4ae346e0a22c0c5b8b2c16040969d60', 'Mon Jun 14 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-15 14:12:27'),
(675, '69fa4c9587684366e4afd6b085cdc963', 'Sun Jun 20 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-21 21:40:44'),
(676, '', '', '2021-06-22 18:49:03'),
(677, '03e3ca12db1519d686fb7d4a7ed2c7c5', 'Thu Jun 24 2021 15:26:56 GMT+0530 (India Standard Time)', '2021-06-24 15:26:57'),
(678, 'f339f957310f6907720060169f9958ee', 'Thu Jun 24 2021 19:07:54 GMT+0530 (India Standard Time)', '2021-06-24 19:06:58'),
(679, 'adeca93377baf16b0e97e5b1ed14c16d', 'Thu Jun 24 2021 19:16:27 GMT+0530 (India Standard Time)', '2021-06-24 19:16:49'),
(680, 'adeca93377baf16b0e97e5b1ed14c16d', 'Thu Jun 24 2021 19:16:27 GMT+0530 (India Standard Time)', '2021-06-24 19:16:53'),
(681, 'b29dd0d33b15269ebc63dfe273088df4', 'Thu Jun 24 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-25 14:39:33'),
(682, '545a0c019c96d373f1b3c2712c01e66c', 'Sat Jun 26 2021 11:05:05 GMT+0800 (Malaysia Time)', '2021-06-26 08:35:34'),
(683, '26be2e6c650576c53d31d5c9325ab560', 'Mon Jun 28 2021 06:14:38 GMT-0700 (Pacific Daylight Time)', '2021-06-28 18:44:38'),
(684, '8ba9f21def5f74d9cc3c69abd7a55978', 'Tue Jun 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-30 15:46:48'),
(685, '823f24ae8b7372993ccd064963e3869f', 'Wed Jun 30 2021 04:03:23 GMT-0700 (Pacific Daylight Time)', '2021-06-30 16:33:34'),
(686, '3c2d1e18fb5c93132d1967a383ea20a9', 'Tue Jun 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-30 16:56:41'),
(687, '28849312c1bd1a3b0a6252ee7a1943a1', 'Wed Jun 30 2021 07:34:36 GMT-0400 (Eastern Daylight Time)', '2021-06-30 17:05:04'),
(688, '0244f9b455ff6b1954ed8afc5ea0cd2d', 'Wed Jun 30 2021 06:34:36 GMT-0500 (Central Daylight Time)', '2021-06-30 17:05:09'),
(689, '6413011cddf6f3c536dd5028613bbb42', 'Tue Jun 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-30 17:46:13'),
(690, '545070f3f3cf53065819b094468a2300', 'Wed Jun 30 2021 06:23:11 GMT-0600 (Mountain Daylight Time)', '2021-06-30 17:53:15'),
(691, '763b95e77eec79fa25c53a7ed8a7b357', 'Tue Jun 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-06-30 23:52:50'),
(692, 'd0615115328e33b1d22c4d064dd26227', 'Wed Jun 30 2021 18:28:13 GMT+0000 (Coordinated Universal Time)', '2021-06-30 23:58:15'),
(693, 'c5b5b2feb3a08741bce23dba78512645', 'Tue Jun 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-01 01:14:08'),
(694, '0082e1ea2b5f09847a0b8e9ccc05ad59', 'Tue Jun 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-01 01:44:30'),
(695, '0082e1ea2b5f09847a0b8e9ccc05ad59', 'Tue Jun 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-01 01:46:24'),
(696, 'baf1196dafc38d226ab2765eb45f5ad1', 'Tue Jun 29 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-01 02:55:19'),
(697, 'daf4d2d88ba8fb0efde157d5e4cc4894', 'Wed Jun 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-01 09:27:22'),
(698, '64dd27add9812bdf77347f2f714388dd', 'Wed Jun 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-01 11:28:00'),
(699, '72c870e8dcf7cc97350b167cbfb058b7', 'Wed Jun 30 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-01 12:08:28'),
(700, '', '', '2021-07-01 17:35:23'),
(701, '2f4245e194e9f26dbf5397ba399ac5d6', 'Thu Jul 01 2021 10:17:38 GMT-0700 (Pacific Daylight Time)', '2021-07-01 22:47:58'),
(702, '', '', '2021-07-04 19:16:43'),
(703, '', '', '2021-07-05 20:48:04'),
(704, '630875a3cb09e1eab3114bee01280bf4', 'Mon Jul 05 2021 21:59:06 GMT+0530 (India Standard Time)', '2021-07-05 21:59:06'),
(705, '64934db6b4720856a15223782c1098bb', 'Mon Jul 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-06 09:43:42'),
(706, 'b5dc20a3db19f908a5aee4b8dfc36c1c', 'Mon Jul 05 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-06 10:13:42'),
(707, '6f94c8e2a97fd4324a76588d4b68ef7e', 'Tue Jul 06 2021 18:36:15 GMT+0530 (India Standard Time)', '2021-07-06 18:36:16'),
(708, '702125aa3da86d8e8631af8ab397e320', 'Tue Jul 06 2021 14:12:07 GMT+0000 (Coordinated Universal Time)', '2021-07-06 19:42:07'),
(709, 'c7e5929f774cdfe62f7d2112010d2cdd', 'Tue Jul 06 2021 14:12:18 GMT+0000 (Coordinated Universal Time)', '2021-07-06 19:42:18'),
(710, '53e6be5c2a9d53a1a5065bf260a1d079', 'Tue Jul 06 2021 14:59:36 GMT+0000 (Coordinated Universal Time)', '2021-07-06 20:29:37'),
(711, '4b5dd31862c70440c73c5636c84b5670', 'Tue Jul 06 2021 15:08:16 GMT+0000 (Coordinated Universal Time)', '2021-07-06 20:38:16'),
(712, 'ff53cda2f797aa3053135bfa2394e620', 'Tue Jul 06 2021 15:08:42 GMT+0000 (Coordinated Universal Time)', '2021-07-06 20:38:42'),
(713, '094b3133d72e403d597181c079ee597e', 'Tue Jul 06 2021 15:09:10 GMT+0000 (Coordinated Universal Time)', '2021-07-06 20:39:10'),
(714, '93efc06da1119acbdc7b708efb4ed3fa', 'Tue Jul 06 2021 15:29:33 GMT+0000 (Coordinated Universal Time)', '2021-07-06 20:59:33'),
(715, '33a72f75ff4dddf2acc7bdba7261f456', 'Tue Jul 06 2021 15:29:46 GMT+0000 (Coordinated Universal Time)', '2021-07-06 20:59:46'),
(716, 'f9a5b5a33ab97f82d91029a6516a9e4a', 'Wed Jul 07 2021 09:50:01 GMT+0530 (India Standard Time)', '2021-07-07 09:50:01'),
(717, '647ffad4f0e583c035c86bc2741dbd43', 'Wed Jul 07 2021 09:51:45 GMT+0530 (India Standard Time)', '2021-07-07 09:51:46'),
(718, 'c281f975c0d870cc6c089207e26ed039', 'Wed Jul 07 2021 09:53:07 GMT+0530 (IST)', '2021-07-07 09:53:11'),
(719, 'e7c981a24c5a332f2e2072d7a0cb7651', 'Wed Jul 07 2021 09:59:13 GMT+0530 (India Standard Time)', '2021-07-07 09:59:13'),
(720, 'a68dc60cc2aa0a5a776da999c50fe420', 'Wed Jul 07 2021 12:20:58 GMT+0530 (IST)', '2021-07-07 12:18:02'),
(721, 'a12b769f5da7948fc4337926df09b09b', 'Wed Jul 07 2021 13:35:48 GMT+0530 (India Standard Time)', '2021-07-07 13:35:49'),
(722, '421cc5eb535769ef8627fd69325fc47a', 'Thu Jul 08 2021 22:07:01 GMT+0300 (Moscow Standard Time)', '2021-07-09 00:36:45'),
(723, '249537dcf5d392131ef96e5901758f4f', 'Thu Jul 08 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-09 18:34:04'),
(724, '8dadc1c3182f63b32c90b941ab0045d9', 'Sat Jul 10 2021 00:43:13 GMT+0530 (India Standard Time)', '2021-07-10 00:43:14'),
(725, 'd5e583185914b9ef011454bd0a6bff10', 'Fri Jul 09 2021 17:00:00 GMT-0700 (Pacific Daylight Time)', '2021-07-11 00:34:22'),
(726, '7a7332c7915639ef66815769eca82203', 'Sun Jul 11 2021 08:23:19 GMT+0000 (Coordinated Universal Time)', '2021-07-11 13:53:19'),
(727, 'd9bc83e243bd7dbe9c801b4374c25bec', 'Sun Jul 11 2021 11:24:08 GMT-0000 (GMT)', '2021-07-11 16:54:08'),
(728, 'af756d6b5dded45a36ef80087eb83b60', 'Sun Jul 11 2021 11:24:13 GMT+0000 (Coordinated Universal Time)', '2021-07-11 16:54:13'),
(729, '4201c61c165d7eba31b99bd0778e9070', 'Sun Jul 11 2021 23:23:59 GMT+0530 (India Standard Time)', '2021-07-11 23:24:01'),
(730, '35a80fe970feb4af2e50cce84891998f', 'Tue Jul 13 2021 12:54:25 GMT+0530 (India Standard Time)', '2021-07-13 12:54:22'),
(731, '855bc8fc4fe73d5beb05cef32b073120', 'Tue Jul 13 2021 12:58:23 GMT+0530 (India Standard Time)', '2021-07-13 12:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_for` int(11) NOT NULL COMMENT '1-shop, 2-admin, 3-gst',
  `order_id` int(11) NOT NULL,
  `pay_order_id` varchar(50) DEFAULT NULL,
  `total_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `commission` decimal(18,2) NOT NULL DEFAULT 0.00,
  `agent_commission` decimal(18,2) NOT NULL DEFAULT 0.00,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_type` varchar(10) NOT NULL COMMENT 'dr, cr',
  `transaction_reason` varchar(255) NOT NULL,
  `amount_before` decimal(18,2) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `amount_after` decimal(18,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `creation_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `user_id`, `transaction_for`, `order_id`, `pay_order_id`, `total_amount`, `commission`, `agent_commission`, `transaction_id`, `transaction_type`, `transaction_reason`, `amount_before`, `amount`, `amount_after`, `status`, `creation_date`) VALUES
(1, 2, 1, 1, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS383650', 'CR', 'wallet credited for order delivered', 0.00, 8.00, 8.00, 1, '2020-09-29 18:17:30'),
(2, 1, 2, 1, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS383650', 'CR', 'wallet credited for order delivered', 309.45, 0.40, 309.85, 1, '2020-09-29 18:17:30'),
(3, 2, 1, 2, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS796179', 'CR', 'wallet credited for order delivered', 8.00, 8.00, 16.00, 1, '2020-10-04 12:52:59'),
(4, 3, 3, 2, NULL, 8.40, 5.00, 0.25, 'JLPNSWLTS796179', 'CR', 'wallet credited for order delivered', 0.00, 0.02, 0.02, 1, '2020-10-04 12:52:59'),
(5, 1, 2, 2, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS796179', 'CR', 'wallet credited for order delivered', 309.85, 0.38, 310.23, 1, '2020-10-04 12:52:59'),
(6, 2, 1, 3, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS877764', 'CR', 'wallet credited for order delivered', 16.00, 8.00, 24.00, 1, '2020-10-05 11:32:44'),
(7, 3, 3, 3, NULL, 8.40, 5.00, 0.25, 'JLPNSWLTS877764', 'CR', 'wallet credited for order delivered', 0.02, 0.02, 0.04, 1, '2020-10-05 11:32:44'),
(8, 1, 2, 3, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS877764', 'CR', 'wallet credited for order delivered', 310.23, 0.38, 310.61, 1, '2020-10-05 11:32:44'),
(9, 8, 1, 5, NULL, 63.00, 5.00, 0.00, 'JLPNSWLTS475683', 'CR', 'wallet credited for order delivered', 0.00, 60.00, 60.00, 1, '2020-10-12 09:38:03'),
(10, 2, 3, 5, NULL, 63.00, 5.00, 0.25, 'JLPNSWLTS475683', 'CR', 'wallet credited for order delivered', 0.00, 0.16, 0.16, 1, '2020-10-12 09:38:03'),
(11, 1, 2, 5, NULL, 63.00, 5.00, 0.00, 'JLPNSWLTS475683', 'CR', 'wallet credited for order delivered', 310.61, 2.84, 313.45, 1, '2020-10-12 09:38:03'),
(12, 8, 1, 0, 'JLPNSSPAY492586', 60.00, 0.00, 0.00, 'JLPNSWLTS492587', 'FAILED', 'Invalid account number or IFSC code', 60.00, 60.00, 0.00, 1, '2020-10-12 14:19:47'),
(13, 2, 1, 0, 'JLPNSSPAY555014', 5.00, 0.00, 0.00, 'JLPNSWLTS555015', 'FAILED', 'Beneficiary bank is down. Please try after some time', 24.00, 5.00, 19.00, 1, '2020-10-13 07:40:15'),
(14, 2, 1, 6, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS556831', 'CR', 'wallet credited for order delivered', 19.00, 8.00, 27.00, 1, '2020-10-13 08:10:31'),
(15, 3, 3, 6, NULL, 8.40, 5.00, 0.25, 'JLPNSWLTS556831', 'CR', 'wallet credited for order delivered', 0.04, 0.02, 0.06, 1, '2020-10-13 08:10:31'),
(16, 1, 2, 6, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS556831', 'CR', 'wallet credited for order delivered', 313.45, 0.38, 313.83, 1, '2020-10-13 08:10:31'),
(17, 2, 1, 4, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS557113', 'CR', 'wallet credited for order delivered', 27.00, 8.00, 35.00, 1, '2020-10-13 08:15:13'),
(18, 3, 3, 4, NULL, 8.40, 5.00, 0.25, 'JLPNSWLTS557113', 'CR', 'wallet credited for order delivered', 0.06, 0.02, 0.08, 1, '2020-10-13 08:15:13'),
(19, 1, 2, 4, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS557113', 'CR', 'wallet credited for order delivered', 313.83, 0.38, 314.21, 1, '2020-10-13 08:15:13'),
(20, 2, 1, 0, 'JLPNSSPAY579460', 5.00, 0.00, 0.00, 'JLPNSWLTS579461', 'FAILED', 'Beneficiary bank is down. Please try after some time', 35.00, 5.00, 30.00, 1, '2020-10-13 14:27:41'),
(21, 2, 1, 0, 'JLPNSSPAY608633', 30.00, 0.00, 0.00, 'JLPNSWLTS608634', 'DR', 'Successful disbursal to Bank Account is done', 30.00, 30.00, 0.00, 1, '2020-10-13 22:33:54'),
(22, 8, 1, 0, 'JLPNSSPAY610424', 60.00, 0.00, 0.00, 'JLPNSWLTS610424', 'FAILED', 'Invalid account number or IFSC code', 60.00, 60.00, 0.00, 1, '2020-10-13 23:03:44'),
(23, 2, 1, 7, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS610934', 'CR', 'wallet credited for order delivered', 0.00, 8.00, 8.00, 1, '2020-10-13 23:12:14'),
(24, 3, 3, 7, NULL, 8.40, 5.00, 0.25, 'JLPNSWLTS610934', 'CR', 'wallet credited for order delivered', 0.08, 0.02, 0.10, 1, '2020-10-13 23:12:14'),
(25, 1, 2, 7, NULL, 8.40, 5.00, 0.00, 'JLPNSWLTS610934', 'CR', 'wallet credited for order delivered', 314.21, 0.38, 314.59, 1, '2020-10-13 23:12:14'),
(26, 2, 1, 0, 'JLPNSSPAY610967', 8.00, 0.00, 0.00, 'JLPNSWLTS610967', 'DR', 'Successful disbursal to Bank Account is done', 8.00, 8.00, 0.00, 1, '2020-10-13 23:12:47'),
(27, 5, 1, 8, NULL, 5.25, 5.00, 0.00, 'JLPNSWLTS663618', 'CR', 'wallet credited for order delivered', 0.00, 5.00, 5.00, 1, '2020-10-14 13:50:18'),
(28, 1, 2, 8, NULL, 5.25, 5.00, 0.00, 'JLPNSWLTS663618', 'CR', 'wallet credited for order delivered', 314.59, 0.25, 314.84, 1, '2020-10-14 13:50:18'),
(29, 5, 1, 0, 'JLPNSSPAY664505', 5.00, 0.00, 0.00, 'JLPNSWLTS664505', 'DR', 'Successful disbursal to Bank Account is done', 5.00, 5.00, 0.00, 1, '2020-10-14 14:05:05'),
(30, 8, 1, 0, 'JLPNSSPAY277686', 60.00, 0.00, 0.00, 'JLPNSWLTS277686', 'FAILED', 'Account balance is low. Please add funds and try again.', 60.00, 60.00, 0.00, 1, '2020-10-21 16:24:46'),
(31, 8, 1, 10, NULL, 420.00, 5.00, 0.00, 'JLPNSWLTS560339', 'CR', 'wallet credited for order delivered', 60.00, 400.00, 460.00, 1, '2020-11-28 16:15:39'),
(32, 2, 3, 10, NULL, 420.00, 5.00, 0.25, 'JLPNSWLTS560339', 'CR', 'wallet credited for order delivered', 0.16, 1.05, 1.21, 1, '2020-11-28 16:15:39'),
(33, 1, 2, 10, NULL, 420.00, 5.00, 0.00, 'JLPNSWLTS560339', 'CR', 'wallet credited for order delivered', 314.84, 18.95, 333.79, 1, '2020-11-28 16:15:39'),
(34, 8, 1, 0, 'JLPNSSPAY509358', 460.00, 0.00, 0.00, 'JLPNSWLTS509359', 'FAILED', 'Invalid IFSC code', 460.00, 460.00, 0.00, 1, '2020-12-09 15:52:39'),
(35, 8, 1, 0, 'JLPNSSPAY510056', 460.00, 0.00, 0.00, 'JLPNSWLTS510056', 'FAILED', 'Invalid IFSC code', 460.00, 460.00, 0.00, 1, '2020-12-09 16:04:16'),
(36, 8, 1, 0, 'JLPNSSPAY966340', 460.00, 0.00, 0.00, 'JLPNSWLTS966340', 'FAILED', 'Invalid IFSC code', 460.00, 460.00, 0.00, 1, '2020-12-14 22:49:00'),
(37, 8, 1, 0, 'JLPNSSPAY822667', 460.00, 0.00, 0.00, 'JLPNSWLTS822667', 'FAILED', 'Invalid account number or IFSC code', 460.00, 460.00, 0.00, 1, '2020-12-24 20:41:07'),
(38, 15, 1, 11, NULL, 7.35, 5.00, 0.00, 'JLPNSWLTS877173', 'CR', 'wallet credited for order delivered', 0.00, 7.00, 7.00, 1, '2021-01-17 15:22:53'),
(39, 6, 3, 11, NULL, 7.35, 5.00, 0.25, 'JLPNSWLTS877173', 'CR', 'wallet credited for order delivered', 0.00, 0.02, 0.02, 1, '2021-01-17 15:22:53'),
(40, 1, 2, 11, NULL, 7.35, 5.00, 0.00, 'JLPNSWLTS877173', 'CR', 'wallet credited for order delivered', 333.79, 0.33, 334.12, 1, '2021-01-17 15:22:53'),
(41, 15, 1, 0, 'JLPNSSPAY983662', 7.00, 0.00, 0.00, 'JLPNSWLTS983663', 'DR', 'Successful disbursal to Bank Account is done', 7.00, 7.00, 0.00, 1, '2021-01-18 20:57:42'),
(42, 0, 1, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS044766', 'CR', 'wallet credited for order delivered', 0.00, 0.00, 0.00, 1, '2021-01-19 13:56:06'),
(43, 1, 2, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS044768', 'CR', 'wallet credited for order delivered', 334.12, 0.00, 334.12, 1, '2021-01-19 13:56:06'),
(44, 15, 1, 12, NULL, 7.00, 0.00, 0.00, 'JLPNSWLTS051294', 'CR', 'wallet credited for order delivered', 0.00, 7.00, 7.00, 1, '2021-01-19 15:44:54'),
(45, 6, 3, 12, NULL, 7.00, 0.00, 0.00, 'JLPNSWLTS051297', 'CR', 'wallet credited for order delivered', 0.02, 0.00, 0.02, 1, '2021-01-19 15:44:54'),
(46, 1, 2, 12, NULL, 7.00, 0.00, 0.00, 'JLPNSWLTS051297', 'CR', 'wallet credited for order delivered', 334.12, 0.00, 334.12, 1, '2021-01-19 15:44:54'),
(47, 15, 1, 0, 'JLPNSSPAY051326', 7.00, 0.00, 0.00, 'JLPNSWLTS051328', 'DR', 'Successful disbursal to Bank Account is done', 7.00, 7.00, 0.00, 1, '2021-01-19 15:45:27'),
(48, 2, 1, 13, NULL, 8.00, 0.00, 0.00, 'JLPNSWLTS052213', 'CR', 'wallet credited for order delivered', 0.00, 8.00, 8.00, 1, '2021-01-19 16:00:13'),
(49, 3, 3, 13, NULL, 8.00, 0.00, 0.00, 'JLPNSWLTS052213', 'CR', 'wallet credited for order delivered', 0.10, 0.00, 0.10, 1, '2021-01-19 16:00:13'),
(50, 1, 2, 13, NULL, 8.00, 0.00, 0.00, 'JLPNSWLTS052213', 'CR', 'wallet credited for order delivered', 334.12, 0.00, 334.12, 1, '2021-01-19 16:00:13'),
(51, 2, 1, 0, 'JLPNSSPAY052527', 8.00, 0.00, 0.00, 'JLPNSWLTS052527', 'DR', 'Successful disbursal to Bank Account is done', 8.00, 8.00, 0.00, 1, '2021-01-19 16:05:27'),
(52, 15, 1, 14, NULL, 7.00, 0.00, 0.00, 'JLPNSWLTS065855', 'CR', 'wallet credited for order delivered', 7.00, 7.00, 14.00, 1, '2021-01-19 19:47:35'),
(53, 6, 3, 14, NULL, 7.00, 0.00, 0.00, 'JLPNSWLTS065857', 'CR', 'wallet credited for order delivered', 0.02, 0.00, 0.02, 1, '2021-01-19 19:47:35'),
(54, 1, 2, 14, NULL, 7.00, 0.00, 0.00, 'JLPNSWLTS065857', 'CR', 'wallet credited for order delivered', 334.12, 0.00, 334.12, 1, '2021-01-19 19:47:35'),
(55, 15, 1, 0, 'JLPNSSPAY065901', 14.00, 0.00, 0.00, 'JLPNSWLTS065902', 'DR', 'Successful disbursal to Bank Account is done', 14.00, 14.00, 0.00, 1, '2021-01-19 19:48:21'),
(56, 10, 1, 0, 'JLPNSSPAY487010', 5.00, 0.00, 0.00, 'JLPNSWLTS487011', 'FAILED', 'Account balance is low. Please add funds and try again.', 20.00, 5.00, 15.00, 1, '2021-01-24 16:46:51'),
(57, 10, 1, 0, 'JLPNSSPAY490340', 6.00, 0.00, 0.00, 'JLPNSWLTS490341', 'FAILED', 'Account balance is low. Please add funds and try again.', 20.00, 6.00, 14.00, 1, '2021-01-24 17:42:20'),
(58, 10, 1, 0, 'JLPNSSPAY490432', 5.00, 0.00, 0.00, 'JLPNSWLTS490433', 'FAILED', 'Account balance is low. Please add funds and try again.', 20.00, 5.00, 15.00, 1, '2021-01-24 17:43:52'),
(59, 10, 1, 0, 'JLPNSSPAY492341', 2.00, 0.00, 0.00, 'JLPNSWLTS492342', 'FAILED', 'Account balance is low. Please add funds and try again.', 20.00, 2.00, 18.00, 1, '2021-01-24 18:15:42'),
(60, 6, 3, 0, 'JLPNSAPAY493324', 8.00, 0.00, 0.00, 'JLPNSWLTS493324', 'FAILED', 'Account balance is low. Please add funds and try again.', 0.02, 8.00, -7.98, 1, '2021-01-24 18:32:04'),
(61, 10, 1, 0, 'JLPNSSPAY495890', 10.00, 0.00, 0.00, 'JLPNSWLTS495892', 'FAILED', 'Account balance is low. Please add funds and try again.', 20.00, 10.00, 10.00, 1, '2021-01-24 19:14:50'),
(62, 10, 1, 0, 'JLPNSSPAY497914', 5.00, 0.00, 0.00, 'JLPNSWLTS497914', 'FAILED', 'Account balance is low. Please add funds and try again.', 20.00, 5.00, 15.00, 1, '2021-01-24 19:48:34'),
(63, 10, 1, 0, 'JLPNSSPAY498106', 5.00, 0.00, 0.00, 'JLPNSWLTS498106', 'DR', 'Successful disbursal to Bank Account is done', 20.00, 5.00, 15.00, 1, '2021-01-24 19:51:46'),
(64, 15, 1, 0, 'JLPNSSPAY498174', 5.00, 0.00, 0.00, 'JLPNSWLTS498174', 'DR', 'Successful disbursal to Bank Account is done', 100.00, 5.00, 95.00, 1, '2021-01-24 19:52:54'),
(65, 15, 1, 0, 'JLPNSSPAY668505', 5.00, 0.00, 0.00, 'JLPNSWLTS668506', 'DR', 'Successful disbursal to Bank Account is done', 95.00, 5.00, 90.00, 1, '2021-01-26 19:11:46'),
(66, 10, 1, 0, 'JLPNSSPAY024951', 2.00, 0.00, 0.00, 'JLPNSWLTS024952', 'DR', 'Successful disbursal to Bank Account is done', 10.00, 2.00, 8.00, 1, '2021-01-30 22:12:32'),
(67, 10, 1, 0, 'JLPNSSPAY025024', 5.00, 0.00, 0.00, 'JLPNSWLTS025024', 'DR', 'Successful disbursal to Bank Account is done', 8.00, 5.00, 3.00, 1, '2021-01-30 22:13:44'),
(68, 8, 1, 0, 'JLPNSSPAY028008', 5.00, 0.00, 0.00, 'JLPNSWLTS028008', 'DR', 'Successful disbursal to Bank Account is done', 460.00, 5.00, 455.00, 1, '2021-01-30 23:03:28'),
(69, 15, 1, 0, 'JLPNSSPAY028311', 5.00, 0.00, 0.00, 'JLPNSWLTS028312', 'DR', 'Successful disbursal to Bank Account is done', 75.00, 5.00, 70.00, 1, '2021-01-30 23:08:32'),
(70, 15, 1, 0, 'JLPNSSPAY754587', 5.00, 0.00, 0.00, 'JLPNSWLTS754588', 'DR', 'Successful disbursal to Bank Account is done', 70.00, 5.00, 65.00, 1, '2021-02-08 08:53:08'),
(71, 15, 1, 17, NULL, 7.35, 5.00, 0.00, 'JLPNSWLTS755893', 'CR', 'wallet credited for order delivered', 70.00, 7.00, 77.00, 1, '2021-02-08 09:14:53'),
(72, 6, 3, 17, NULL, 7.35, 5.00, 0.00, 'JLPNSWLTS755893', 'CR', 'wallet credited for order delivered', 0.00, 0.00, 0.00, 1, '2021-02-08 09:14:53'),
(73, 1, 2, 17, NULL, 7.35, 5.00, 0.00, 'JLPNSWLTS755893', 'CR', 'wallet credited for order delivered', 334.12, 0.35, 334.47, 1, '2021-02-08 09:14:53'),
(74, 15, 1, 0, 'JLPNSSPAY943220', 5.00, 0.00, 0.00, 'JLPNSWLTS943221', 'FAILED', 'Disbursal to bank account failed. Please try after some time', 72.00, 5.00, 67.00, 1, '2021-02-10 13:17:00'),
(75, 10, 1, 0, 'JLPNSSPAY410149', 3.00, 0.00, 0.00, 'JLPNSWLTS410149', 'DR', 'Successful disbursal to Bank Account is done', 3.00, 3.00, 0.00, 1, '2021-02-15 22:59:09'),
(76, 15, 1, 0, 'JLPNSSPAY436004', 5.00, 0.00, 0.00, 'JLPNSWLTS436005', 'DR', 'Successful disbursal to Bank Account is done', 72.00, 5.00, 67.00, 1, '2021-02-16 06:10:05'),
(77, 2, 1, 0, 'JLPNSSPAY532983', 5.00, 0.00, 0.00, 'JLPNSWLTS532983', 'DR', 'Successful disbursal to Bank Account is done', 100.00, 5.00, 95.00, 1, '2021-02-28 22:53:03'),
(78, 8, 1, 0, 'JLPNSSPAY533112', 5.00, 0.00, 0.00, 'JLPNSWLTS533112', 'DR', 'Successful disbursal to Bank Account is done', 455.00, 5.00, 450.00, 1, '2021-02-28 22:55:12'),
(79, 8, 1, 0, 'JLPNSSPAY944845', 420.00, 0.00, 0.00, 'JLPNSWLTS944846', 'DR', 'Successful disbursal to Bank Account is done', 450.00, 420.00, 30.00, 1, '2021-03-17 07:04:06'),
(80, 2, 1, 22, NULL, 8.16, 2.00, 0.00, 'JLPNSWLTS335188', 'CR', 'wallet credited for order delivered', 95.00, 8.00, 103.00, 1, '2021-04-13 23:03:08'),
(81, 3, 3, 22, NULL, 8.16, 2.00, 1.00, 'JLPNSWLTS335188', 'CR', 'wallet credited for order delivered', 0.10, 0.08, 0.18, 1, '2021-04-13 23:03:08'),
(82, 1, 2, 22, NULL, 8.16, 2.00, 0.00, 'JLPNSWLTS335188', 'CR', 'wallet credited for order delivered', 334.47, 0.08, 334.55, 1, '2021-04-13 23:03:08'),
(83, 2, 1, 0, 'JLPNSSPAY336317', 8.00, 0.00, 0.00, 'JLPNSWLTS336318', 'DR', 'Successful disbursal to Bank Account is done', 103.00, 8.00, 95.00, 1, '2021-04-13 23:21:57'),
(84, 2, 1, 0, 'JLPNSSPAY337407', 5.00, 0.00, 0.00, 'JLPNSWLTS337407', 'DR', 'Successful disbursal to Bank Account is done', 95.00, 5.00, 90.00, 1, '2021-04-13 23:40:07'),
(85, 2, 1, 0, 'JLPNSSPAY337850', 5.00, 0.00, 0.00, 'JLPNSWLTS337850', 'DR', 'Successful disbursal to Bank Account is done', 90.00, 5.00, 85.00, 1, '2021-04-13 23:47:30'),
(86, 0, 1, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS927445', 'CR', 'wallet credited for order delivered', 0.00, 0.00, 0.00, 1, '2021-04-20 19:34:05'),
(87, 1, 2, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS927445', 'CR', 'wallet credited for order delivered', 334.55, 0.00, 334.55, 1, '2021-04-20 19:34:05'),
(88, 0, 1, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS991065', 'CR', 'wallet credited for order delivered', 0.00, 0.00, 0.00, 1, '2021-04-21 13:14:25'),
(89, 1, 2, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS991065', 'CR', 'wallet credited for order delivered', 334.55, 0.00, 334.55, 1, '2021-04-21 13:14:25'),
(90, 15, 1, 24, NULL, 7.14, 2.00, 0.00, 'JLPNSWLTS133120', 'CR', 'wallet credited for order delivered', 67.00, 7.00, 74.00, 1, '2021-05-04 18:28:40'),
(91, 6, 3, 24, NULL, 7.14, 2.00, 1.00, 'JLPNSWLTS133120', 'CR', 'wallet credited for order delivered', 0.00, 0.07, 0.07, 1, '2021-05-04 18:28:40'),
(92, 1, 2, 24, NULL, 7.14, 2.00, 0.00, 'JLPNSWLTS133120', 'CR', 'wallet credited for order delivered', 334.55, 0.07, 334.62, 1, '2021-05-04 18:28:40'),
(93, 0, 1, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS358124', 'CR', 'wallet credited for order delivered', 0.00, 0.00, 0.00, 1, '2021-05-07 08:58:44'),
(94, 1, 2, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS358124', 'CR', 'wallet credited for order delivered', 334.62, 0.00, 334.62, 1, '2021-05-07 08:58:44'),
(95, 15, 1, 25, NULL, 7.14, 2.00, 0.00, 'JLPNSWLTS932736', 'CR', 'wallet credited for order delivered', 74.00, 7.00, 81.00, 1, '2021-05-25 14:22:16'),
(96, 6, 3, 25, NULL, 7.14, 2.00, 1.00, 'JLPNSWLTS932736', 'CR', 'wallet credited for order delivered', 0.07, 0.07, 0.14, 1, '2021-05-25 14:22:16'),
(97, 1, 2, 25, NULL, 7.14, 2.00, 0.00, 'JLPNSWLTS932736', 'CR', 'wallet credited for order delivered', 334.62, 0.07, 334.69, 1, '2021-05-25 14:22:16'),
(98, 15, 1, 23, NULL, 7.14, 2.00, 0.00, 'JLPNSWLTS932775', 'CR', 'wallet credited for order delivered', 81.00, 7.00, 88.00, 1, '2021-05-25 14:22:55'),
(99, 6, 3, 23, NULL, 7.14, 2.00, 1.00, 'JLPNSWLTS932775', 'CR', 'wallet credited for order delivered', 0.14, 0.07, 0.21, 1, '2021-05-25 14:22:55'),
(100, 1, 2, 23, NULL, 7.14, 2.00, 0.00, 'JLPNSWLTS932775', 'CR', 'wallet credited for order delivered', 334.69, 0.07, 334.76, 1, '2021-05-25 14:22:55'),
(101, 15, 1, 21, NULL, 7.14, 2.00, 0.00, 'JLPNSWLTS932822', 'CR', 'wallet credited for order delivered', 88.00, 7.00, 95.00, 1, '2021-05-25 14:23:42'),
(102, 6, 3, 21, NULL, 7.14, 2.00, 1.00, 'JLPNSWLTS932822', 'CR', 'wallet credited for order delivered', 0.21, 0.07, 0.28, 1, '2021-05-25 14:23:42'),
(103, 1, 2, 21, NULL, 7.14, 2.00, 0.00, 'JLPNSWLTS932822', 'CR', 'wallet credited for order delivered', 334.76, 0.07, 334.83, 1, '2021-05-25 14:23:42'),
(104, 15, 1, 15, NULL, 7.35, 5.00, 0.00, 'JLPNSWLTS932863', 'CR', 'wallet credited for order delivered', 95.00, 7.00, 102.00, 1, '2021-05-25 14:24:23'),
(105, 6, 3, 15, NULL, 7.35, 5.00, 0.00, 'JLPNSWLTS932863', 'CR', 'wallet credited for order delivered', 0.28, 0.00, 0.28, 1, '2021-05-25 14:24:23'),
(106, 1, 2, 15, NULL, 7.35, 5.00, 0.00, 'JLPNSWLTS932863', 'CR', 'wallet credited for order delivered', 334.83, 0.35, 335.18, 1, '2021-05-25 14:24:23'),
(107, 15, 1, 0, 'JLPNSSPAY932934', 102.00, 0.00, 0.00, 'JLPNSWLTS932936', 'FAILED', 'Account balance is low. Please add funds and try again.', 102.00, 102.00, 0.00, 1, '2021-05-25 14:25:35'),
(108, 0, 1, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS531305', 'CR', 'wallet credited for order delivered', 0.00, 0.00, 0.00, 1, '2021-06-24 16:11:45'),
(109, 1, 2, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS531305', 'CR', 'wallet credited for order delivered', 335.18, 0.00, 335.18, 1, '2021-06-24 16:11:45'),
(110, 0, 1, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS357467', 'CR', 'wallet credited for order delivered', 0.00, 0.00, 0.00, 1, '2021-07-04 05:41:07'),
(111, 1, 2, 0, NULL, 0.00, 0.00, 0.00, 'JLPNSWLTS357467', 'CR', 'wallet credited for order delivered', 335.18, 0.00, 335.18, 1, '2021-07-04 05:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `_crone_job`
--

CREATE TABLE `_crone_job` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `creation_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_crone_job`
--

INSERT INTO `_crone_job` (`id`, `date`, `ip`, `creation_date`) VALUES
(1, '2021-01-30 11:16:01', '103.129.97.229', '2021-01-30 11:16:01'),
(2, '2021-01-30 11:17:02', '103.129.97.229', '2021-01-30 11:17:02'),
(3, '2021-01-30 11:18:01', '103.129.97.229', '2021-01-30 11:18:01'),
(4, '2021-01-30 11:19:01', '103.129.97.229', '2021-01-30 11:19:01'),
(5, '2021-01-30 11:20:01', '103.129.97.229', '2021-01-30 11:20:01'),
(6, '2021-01-30 11:21:03', '103.129.97.229', '2021-01-30 11:21:03'),
(7, '2021-01-30 11:22:02', '103.129.97.229', '2021-01-30 11:22:02'),
(8, '2021-01-30 11:23:01', '103.129.97.229', '2021-01-30 11:23:01'),
(9, '2021-01-30 11:24:01', '103.129.97.229', '2021-01-30 11:24:01'),
(10, '2021-01-30 11:25:01', '103.129.97.229', '2021-01-30 11:25:01'),
(11, '2021-01-30 11:26:01', '103.129.97.229', '2021-01-30 11:26:01'),
(12, '2021-01-30 11:27:02', '103.129.97.229', '2021-01-30 11:27:02'),
(13, '2021-01-30 11:28:01', '103.129.97.229', '2021-01-30 11:28:01'),
(14, '2021-01-30 11:29:02', '103.129.97.229', '2021-01-30 11:29:02'),
(15, '2021-01-30 11:30:02', '103.129.97.229', '2021-01-30 11:30:02'),
(16, '2021-01-30 11:31:04', '103.129.97.229', '2021-01-30 11:31:04'),
(17, '2021-01-30 11:32:02', '103.129.97.229', '2021-01-30 11:32:02'),
(18, '2021-01-30 11:33:01', '103.129.97.229', '2021-01-30 11:33:01'),
(19, '2021-01-30 11:34:02', '103.129.97.229', '2021-01-30 11:34:02'),
(20, '2021-01-30 11:35:01', '103.129.97.229', '2021-01-30 11:35:01'),
(21, '2021-01-30 11:36:01', '103.129.97.229', '2021-01-30 11:36:01'),
(22, '2021-01-30 11:37:01', '103.129.97.229', '2021-01-30 11:37:01'),
(23, '2021-01-30 11:38:02', '103.129.97.229', '2021-01-30 11:38:02'),
(24, '2021-01-30 11:39:02', '103.129.97.229', '2021-01-30 11:39:02'),
(25, '2021-01-30 11:40:01', '103.129.97.229', '2021-01-30 11:40:01'),
(26, '2021-01-30 11:41:02', '103.129.97.229', '2021-01-30 11:41:02'),
(27, '2021-01-30 11:42:01', '103.129.97.229', '2021-01-30 11:42:01'),
(28, '2021-01-30 11:43:02', '103.129.97.229', '2021-01-30 11:43:02'),
(29, '2021-01-30 11:44:01', '103.129.97.229', '2021-01-30 11:44:01'),
(30, '2021-01-30 11:45:01', '103.129.97.229', '2021-01-30 11:45:01'),
(31, '2021-01-30 11:46:01', '103.129.97.229', '2021-01-30 11:46:01'),
(32, '2021-01-30 11:47:01', '103.129.97.229', '2021-01-30 11:47:01'),
(33, '2021-01-30 11:48:01', '103.129.97.229', '2021-01-30 11:48:01'),
(34, '2021-01-30 11:49:02', '103.129.97.229', '2021-01-30 11:49:02'),
(35, '2021-01-30 11:50:01', '103.129.97.229', '2021-01-30 11:50:01'),
(36, '2021-01-30 11:51:01', '103.129.97.229', '2021-01-30 11:51:01'),
(37, '2021-01-30 11:52:02', '103.129.97.229', '2021-01-30 11:52:02'),
(38, '2021-01-30 11:53:01', '103.129.97.229', '2021-01-30 11:53:01'),
(39, '2021-01-30 11:54:01', '103.129.97.229', '2021-01-30 11:54:01'),
(40, '2021-01-30 11:55:02', '103.129.97.229', '2021-01-30 11:55:02'),
(41, '2021-01-30 11:56:02', '103.129.97.229', '2021-01-30 11:56:02'),
(42, '2021-01-30 11:57:01', '103.129.97.229', '2021-01-30 11:57:01'),
(43, '2021-01-30 11:58:02', '103.129.97.229', '2021-01-30 11:58:02'),
(44, '2021-01-30 11:59:02', '103.129.97.229', '2021-01-30 11:59:02'),
(45, '2021-01-30 12:00:01', '103.129.97.229', '2021-01-30 12:00:01'),
(46, '2021-01-30 12:01:01', '103.129.97.229', '2021-01-30 12:01:01'),
(47, '2021-01-30 12:02:01', '103.129.97.229', '2021-01-30 12:02:01'),
(48, '2021-01-30 12:03:01', '103.129.97.229', '2021-01-30 12:03:01'),
(49, '2021-01-30 12:04:02', '103.129.97.229', '2021-01-30 12:04:02'),
(50, '2021-01-30 12:05:02', '103.129.97.229', '2021-01-30 12:05:02'),
(51, '2021-01-30 12:06:02', '103.129.97.229', '2021-01-30 12:06:02'),
(52, '2021-01-30 12:07:01', '103.129.97.229', '2021-01-30 12:07:01'),
(53, '2021-01-30 12:08:02', '103.129.97.229', '2021-01-30 12:08:02'),
(54, '2021-01-30 12:09:01', '103.129.97.229', '2021-01-30 12:09:01'),
(55, '2021-01-30 12:10:02', '103.129.97.229', '2021-01-30 12:10:02'),
(56, '2021-01-30 12:11:01', '103.129.97.229', '2021-01-30 12:11:01'),
(57, '2021-01-30 12:12:01', '103.129.97.229', '2021-01-30 12:12:01'),
(58, '2021-01-30 12:13:01', '103.129.97.229', '2021-01-30 12:13:01'),
(59, '2021-01-30 12:14:02', '103.129.97.229', '2021-01-30 12:14:02'),
(60, '2021-01-30 12:15:03', '103.129.97.229', '2021-01-30 12:15:03'),
(61, '2021-01-30 12:16:01', '103.129.97.229', '2021-01-30 12:16:01'),
(62, '2021-01-30 12:17:02', '103.129.97.229', '2021-01-30 12:17:02'),
(63, '2021-01-30 12:18:01', '103.129.97.229', '2021-01-30 12:18:01'),
(64, '2021-01-30 12:19:01', '103.129.97.229', '2021-01-30 12:19:01'),
(65, '2021-01-30 12:20:02', '103.129.97.229', '2021-01-30 12:20:02'),
(66, '2021-01-30 12:21:01', '103.129.97.229', '2021-01-30 12:21:01'),
(67, '2021-01-30 12:22:01', '103.129.97.229', '2021-01-30 12:22:01'),
(68, '2021-01-30 12:23:02', '103.129.97.229', '2021-01-30 12:23:02'),
(69, '2021-01-30 12:24:02', '103.129.97.229', '2021-01-30 12:24:02'),
(70, '2021-01-30 12:25:01', '103.129.97.229', '2021-01-30 12:25:01'),
(71, '2021-01-30 12:26:01', '103.129.97.229', '2021-01-30 12:26:01'),
(72, '2021-01-30 12:27:01', '103.129.97.229', '2021-01-30 12:27:01'),
(73, '2021-01-30 12:28:01', '103.129.97.229', '2021-01-30 12:28:01'),
(74, '2021-01-30 12:29:02', '103.129.97.229', '2021-01-30 12:29:02'),
(75, '2021-01-30 12:30:02', '103.129.97.229', '2021-01-30 12:30:02'),
(76, '2021-01-30 12:31:02', '103.129.97.229', '2021-01-30 12:31:02'),
(77, '2021-01-30 12:32:02', '103.129.97.229', '2021-01-30 12:32:02'),
(78, '2021-01-30 12:33:02', '103.129.97.229', '2021-01-30 12:33:02'),
(79, '2021-01-30 12:34:01', '103.129.97.229', '2021-01-30 12:34:01'),
(80, '2021-01-30 12:35:02', '103.129.97.229', '2021-01-30 12:35:02'),
(81, '2021-01-30 12:36:01', '103.129.97.229', '2021-01-30 12:36:01'),
(82, '2021-01-30 12:37:01', '103.129.97.229', '2021-01-30 12:37:01'),
(83, '2021-01-30 12:38:02', '103.129.97.229', '2021-01-30 12:38:02'),
(84, '2021-01-30 12:39:01', '103.129.97.229', '2021-01-30 12:39:01'),
(85, '2021-01-30 12:40:02', '103.129.97.229', '2021-01-30 12:40:02'),
(86, '2021-01-30 12:41:02', '103.129.97.229', '2021-01-30 12:41:02'),
(87, '2021-01-30 12:42:02', '103.129.97.229', '2021-01-30 12:42:02'),
(88, '2021-01-30 12:43:01', '103.129.97.229', '2021-01-30 12:43:01'),
(89, '2021-01-30 12:44:02', '103.129.97.229', '2021-01-30 12:44:02'),
(90, '2021-01-30 12:45:01', '103.129.97.229', '2021-01-30 12:45:01'),
(91, '2021-01-30 12:46:01', '103.129.97.229', '2021-01-30 12:46:01'),
(92, '2021-01-30 12:47:02', '103.129.97.229', '2021-01-30 12:47:02'),
(93, '2021-01-30 12:48:02', '103.129.97.229', '2021-01-30 12:48:02'),
(94, '2021-01-30 12:49:02', '103.129.97.229', '2021-01-30 12:49:02'),
(95, '2021-01-30 12:50:02', '103.129.97.229', '2021-01-30 12:50:02'),
(96, '2021-01-30 12:51:01', '103.129.97.229', '2021-01-30 12:51:01'),
(97, '2021-01-30 12:52:01', '103.129.97.229', '2021-01-30 12:52:01'),
(98, '2021-01-30 12:53:01', '103.129.97.229', '2021-01-30 12:53:01'),
(99, '2021-01-30 12:54:01', '103.129.97.229', '2021-01-30 12:54:01'),
(100, '2021-01-30 12:55:01', '103.129.97.229', '2021-01-30 12:55:01'),
(101, '2021-01-30 12:56:01', '103.129.97.229', '2021-01-30 12:56:01'),
(102, '2021-01-30 12:57:01', '103.129.97.229', '2021-01-30 12:57:01'),
(103, '2021-01-30 12:58:02', '103.129.97.229', '2021-01-30 12:58:02'),
(104, '2021-01-30 12:59:03', '103.129.97.229', '2021-01-30 12:59:03'),
(105, '2021-01-30 13:00:03', '103.129.97.229', '2021-01-30 13:00:03'),
(106, '2021-01-30 13:01:01', '103.129.97.229', '2021-01-30 13:01:01'),
(107, '2021-01-30 13:02:01', '103.129.97.229', '2021-01-30 13:02:01'),
(108, '2021-01-30 13:03:02', '103.129.97.229', '2021-01-30 13:03:02'),
(109, '2021-01-30 13:04:02', '103.129.97.229', '2021-01-30 13:04:02'),
(110, '2021-01-30 13:05:01', '103.129.97.229', '2021-01-30 13:05:01'),
(111, '2021-01-30 13:06:01', '103.129.97.229', '2021-01-30 13:06:01'),
(112, '2021-01-30 13:07:01', '103.129.97.229', '2021-01-30 13:07:01'),
(113, '2021-01-30 13:08:02', '103.129.97.229', '2021-01-30 13:08:02'),
(114, '2021-01-30 13:09:01', '103.129.97.229', '2021-01-30 13:09:01'),
(115, '2021-01-30 13:10:02', '103.129.97.229', '2021-01-30 13:10:02'),
(116, '2021-01-30 13:11:02', '103.129.97.229', '2021-01-30 13:11:02'),
(117, '2021-01-30 13:12:02', '103.129.97.229', '2021-01-30 13:12:02'),
(118, '2021-01-30 13:13:02', '103.129.97.229', '2021-01-30 13:13:02'),
(119, '2021-01-30 13:14:02', '103.129.97.229', '2021-01-30 13:14:02'),
(120, '2021-01-30 13:15:01', '103.129.97.229', '2021-01-30 13:15:01'),
(121, '2021-01-30 13:16:02', '103.129.97.229', '2021-01-30 13:16:02'),
(122, '2021-01-30 13:17:02', '103.129.97.229', '2021-01-30 13:17:02'),
(123, '2021-01-30 13:18:02', '103.129.97.229', '2021-01-30 13:18:02'),
(124, '2021-01-30 13:19:01', '103.129.97.229', '2021-01-30 13:19:01'),
(125, '2021-01-30 13:20:02', '103.129.97.229', '2021-01-30 13:20:02'),
(126, '2021-01-30 13:21:01', '103.129.97.229', '2021-01-30 13:21:01'),
(127, '2021-01-30 13:22:02', '103.129.97.229', '2021-01-30 13:22:02'),
(128, '2021-01-30 13:23:01', '103.129.97.229', '2021-01-30 13:23:01'),
(129, '2021-01-30 13:24:01', '103.129.97.229', '2021-01-30 13:24:01'),
(130, '2021-01-30 13:25:01', '103.129.97.229', '2021-01-30 13:25:01'),
(131, '2021-01-30 13:26:02', '103.129.97.229', '2021-01-30 13:26:02'),
(132, '2021-01-30 13:27:01', '103.129.97.229', '2021-01-30 13:27:01'),
(133, '2021-01-30 13:28:02', '103.129.97.229', '2021-01-30 13:28:02'),
(134, '2021-01-30 13:29:01', '103.129.97.229', '2021-01-30 13:29:01'),
(135, '2021-01-30 13:30:02', '103.129.97.229', '2021-01-30 13:30:02'),
(136, '2021-01-30 13:31:02', '103.129.97.229', '2021-01-30 13:31:02'),
(137, '2021-01-30 13:32:01', '103.129.97.229', '2021-01-30 13:32:01'),
(138, '2021-01-30 13:33:02', '103.129.97.229', '2021-01-30 13:33:02'),
(139, '2021-01-30 13:34:02', '103.129.97.229', '2021-01-30 13:34:02'),
(140, '2021-01-30 13:35:02', '103.129.97.229', '2021-01-30 13:35:02'),
(141, '2021-01-30 13:36:01', '103.129.97.229', '2021-01-30 13:36:01'),
(142, '2021-01-30 13:37:02', '103.129.97.229', '2021-01-30 13:37:02'),
(143, '2021-01-30 13:38:02', '103.129.97.229', '2021-01-30 13:38:02'),
(144, '2021-01-30 13:39:02', '103.129.97.229', '2021-01-30 13:39:02'),
(145, '2021-01-30 13:40:01', '103.129.97.229', '2021-01-30 13:40:01'),
(146, '2021-01-30 13:41:02', '103.129.97.229', '2021-01-30 13:41:02'),
(147, '2021-01-30 13:42:01', '103.129.97.229', '2021-01-30 13:42:01'),
(148, '2021-01-30 13:43:01', '103.129.97.229', '2021-01-30 13:43:01'),
(149, '2021-01-30 13:44:01', '103.129.97.229', '2021-01-30 13:44:01'),
(150, '2021-01-30 13:45:01', '103.129.97.229', '2021-01-30 13:45:01'),
(151, '2021-01-30 13:46:01', '103.129.97.229', '2021-01-30 13:46:01'),
(152, '2021-01-30 13:47:01', '103.129.97.229', '2021-01-30 13:47:01'),
(153, '2021-01-30 13:48:02', '103.129.97.229', '2021-01-30 13:48:02'),
(154, '2021-01-30 13:49:01', '103.129.97.229', '2021-01-30 13:49:01'),
(155, '2021-01-30 13:50:02', '103.129.97.229', '2021-01-30 13:50:02'),
(156, '2021-01-30 13:51:02', '103.129.97.229', '2021-01-30 13:51:02'),
(157, '2021-01-30 13:52:01', '103.129.97.229', '2021-01-30 13:52:01'),
(158, '2021-01-30 13:53:01', '103.129.97.229', '2021-01-30 13:53:01'),
(159, '2021-01-30 13:54:01', '103.129.97.229', '2021-01-30 13:54:01'),
(160, '2021-01-30 13:55:01', '103.129.97.229', '2021-01-30 13:55:01'),
(161, '2021-01-30 13:56:01', '103.129.97.229', '2021-01-30 13:56:01'),
(162, '2021-01-30 13:57:01', '103.129.97.229', '2021-01-30 13:57:01'),
(163, '2021-01-30 13:58:02', '103.129.97.229', '2021-01-30 13:58:02'),
(164, '2021-01-30 13:59:02', '103.129.97.229', '2021-01-30 13:59:02'),
(165, '2021-01-30 14:00:05', '103.129.97.229', '2021-01-30 14:00:05'),
(166, '2021-01-30 14:01:02', '103.129.97.229', '2021-01-30 14:01:02'),
(167, '2021-01-30 14:02:01', '103.129.97.229', '2021-01-30 14:02:01'),
(168, '2021-01-30 14:03:02', '103.129.97.229', '2021-01-30 14:03:02'),
(169, '2021-01-30 14:04:01', '103.129.97.229', '2021-01-30 14:04:01'),
(170, '2021-01-30 14:05:02', '103.129.97.229', '2021-01-30 14:05:02'),
(171, '2021-01-30 14:06:01', '103.129.97.229', '2021-01-30 14:06:01'),
(172, '2021-01-30 14:07:01', '103.129.97.229', '2021-01-30 14:07:01'),
(173, '2021-01-30 14:08:01', '103.129.97.229', '2021-01-30 14:08:01'),
(174, '2021-01-30 14:09:01', '103.129.97.229', '2021-01-30 14:09:01'),
(175, '2021-01-30 14:10:01', '103.129.97.229', '2021-01-30 14:10:01'),
(176, '2021-01-30 14:11:02', '103.129.97.229', '2021-01-30 14:11:02'),
(177, '2021-01-30 14:12:02', '103.129.97.229', '2021-01-30 14:12:02'),
(178, '2021-01-30 14:13:01', '103.129.97.229', '2021-01-30 14:13:01'),
(179, '2021-01-30 14:14:03', '103.129.97.229', '2021-01-30 14:14:03'),
(180, '2021-01-30 14:15:01', '103.129.97.229', '2021-01-30 14:15:01'),
(181, '2021-01-30 14:16:01', '103.129.97.229', '2021-01-30 14:16:01'),
(182, '2021-01-30 14:17:01', '103.129.97.229', '2021-01-30 14:17:01'),
(183, '2021-01-30 14:18:01', '103.129.97.229', '2021-01-30 14:18:01'),
(184, '2021-01-30 14:19:02', '103.129.97.229', '2021-01-30 14:19:02'),
(185, '2021-01-30 14:20:02', '103.129.97.229', '2021-01-30 14:20:02'),
(186, '2021-01-30 14:21:02', '103.129.97.229', '2021-01-30 14:21:02'),
(187, '2021-01-30 14:22:02', '103.129.97.229', '2021-01-30 14:22:02'),
(188, '2021-01-30 14:23:02', '103.129.97.229', '2021-01-30 14:23:02'),
(189, '2021-01-30 14:24:02', '103.129.97.229', '2021-01-30 14:24:02'),
(190, '2021-01-30 14:25:02', '103.129.97.229', '2021-01-30 14:25:02'),
(191, '2021-01-30 14:26:03', '103.129.97.229', '2021-01-30 14:26:03'),
(192, '2021-01-30 14:27:02', '103.129.97.229', '2021-01-30 14:27:02'),
(193, '2021-01-30 14:28:02', '103.129.97.229', '2021-01-30 14:28:02'),
(194, '2021-01-30 14:29:02', '103.129.97.229', '2021-01-30 14:29:02'),
(195, '2021-01-30 14:30:01', '103.129.97.229', '2021-01-30 14:30:01'),
(196, '2021-01-30 14:31:01', '103.129.97.229', '2021-01-30 14:31:01'),
(197, '2021-01-30 14:32:01', '103.129.97.229', '2021-01-30 14:32:01'),
(198, '2021-01-30 14:33:02', '103.129.97.229', '2021-01-30 14:33:02'),
(199, '2021-01-30 14:34:01', '103.129.97.229', '2021-01-30 14:34:01'),
(200, '2021-01-30 14:35:02', '103.129.97.229', '2021-01-30 14:35:02'),
(201, '2021-01-30 14:36:02', '103.129.97.229', '2021-01-30 14:36:02'),
(202, '2021-01-30 14:37:01', '103.129.97.229', '2021-01-30 14:37:01'),
(203, '2021-01-30 14:38:02', '103.129.97.229', '2021-01-30 14:38:02'),
(204, '2021-01-30 14:39:01', '103.129.97.229', '2021-01-30 14:39:01'),
(205, '2021-01-30 14:40:02', '103.129.97.229', '2021-01-30 14:40:02'),
(206, '2021-01-30 14:41:01', '103.129.97.229', '2021-01-30 14:41:01'),
(207, '2021-01-30 14:42:02', '103.129.97.229', '2021-01-30 14:42:02'),
(208, '2021-01-30 14:43:02', '103.129.97.229', '2021-01-30 14:43:02'),
(209, '2021-01-30 14:44:01', '103.129.97.229', '2021-01-30 14:44:01'),
(210, '2021-01-30 14:45:01', '103.129.97.229', '2021-01-30 14:45:01'),
(211, '2021-01-30 14:46:01', '103.129.97.229', '2021-01-30 14:46:01'),
(212, '2021-01-30 14:47:02', '103.129.97.229', '2021-01-30 14:47:02'),
(213, '2021-01-30 14:48:02', '103.129.97.229', '2021-01-30 14:48:02'),
(214, '2021-01-30 14:49:02', '103.129.97.229', '2021-01-30 14:49:02'),
(215, '2021-01-30 14:50:01', '103.129.97.229', '2021-01-30 14:50:01'),
(216, '2021-01-30 14:51:01', '103.129.97.229', '2021-01-30 14:51:01'),
(217, '2021-01-30 14:52:01', '103.129.97.229', '2021-01-30 14:52:01'),
(218, '2021-01-30 14:53:01', '103.129.97.229', '2021-01-30 14:53:01'),
(219, '2021-01-30 14:54:01', '103.129.97.229', '2021-01-30 14:54:01'),
(220, '2021-01-30 14:55:01', '103.129.97.229', '2021-01-30 14:55:01'),
(221, '2021-01-30 14:56:02', '103.129.97.229', '2021-01-30 14:56:02'),
(222, '2021-01-30 14:57:02', '103.129.97.229', '2021-01-30 14:57:02'),
(223, '2021-01-30 14:58:01', '103.129.97.229', '2021-01-30 14:58:01'),
(224, '2021-01-30 14:59:02', '103.129.97.229', '2021-01-30 14:59:02'),
(225, '2021-01-30 15:00:01', '103.129.97.229', '2021-01-30 15:00:01'),
(226, '2021-01-30 15:01:01', '103.129.97.229', '2021-01-30 15:01:01'),
(227, '2021-01-30 15:02:02', '103.129.97.229', '2021-01-30 15:02:02'),
(228, '2021-01-30 15:03:01', '103.129.97.229', '2021-01-30 15:03:01'),
(229, '2021-01-30 15:04:02', '103.129.97.229', '2021-01-30 15:04:02'),
(230, '2021-01-30 15:05:02', '103.129.97.229', '2021-01-30 15:05:02'),
(231, '2021-01-30 15:06:01', '103.129.97.229', '2021-01-30 15:06:01'),
(232, '2021-01-30 15:07:01', '103.129.97.229', '2021-01-30 15:07:01'),
(233, '2021-01-30 15:08:01', '103.129.97.229', '2021-01-30 15:08:01'),
(234, '2021-01-30 15:09:01', '103.129.97.229', '2021-01-30 15:09:01'),
(235, '2021-01-30 15:10:02', '103.129.97.229', '2021-01-30 15:10:02'),
(236, '2021-01-30 15:11:02', '103.129.97.229', '2021-01-30 15:11:02'),
(237, '2021-01-30 15:12:02', '103.129.97.229', '2021-01-30 15:12:02'),
(238, '2021-01-30 15:13:02', '103.129.97.229', '2021-01-30 15:13:02'),
(239, '2021-01-30 15:14:01', '103.129.97.229', '2021-01-30 15:14:01'),
(240, '2021-01-30 15:15:02', '103.129.97.229', '2021-01-30 15:15:02'),
(241, '2021-01-30 15:16:01', '103.129.97.229', '2021-01-30 15:16:01'),
(242, '2021-01-30 15:17:02', '103.129.97.229', '2021-01-30 15:17:02'),
(243, '2021-01-30 15:18:01', '103.129.97.229', '2021-01-30 15:18:01'),
(244, '2021-01-30 15:19:01', '103.129.97.229', '2021-01-30 15:19:01'),
(245, '2021-01-30 15:20:01', '103.129.97.229', '2021-01-30 15:20:01'),
(246, '2021-01-30 15:21:02', '103.129.97.229', '2021-01-30 15:21:02'),
(247, '2021-01-30 15:22:01', '103.129.97.229', '2021-01-30 15:22:01'),
(248, '2021-01-30 15:23:01', '103.129.97.229', '2021-01-30 15:23:01'),
(249, '2021-01-30 15:24:01', '103.129.97.229', '2021-01-30 15:24:01'),
(250, '2021-01-30 15:25:02', '103.129.97.229', '2021-01-30 15:25:02'),
(251, '2021-01-30 15:26:01', '103.129.97.229', '2021-01-30 15:26:01'),
(252, '2021-01-30 15:27:02', '103.129.97.229', '2021-01-30 15:27:02'),
(253, '2021-01-30 15:28:02', '103.129.97.229', '2021-01-30 15:28:02'),
(254, '2021-01-30 15:29:02', '103.129.97.229', '2021-01-30 15:29:02'),
(255, '2021-01-30 15:30:01', '103.129.97.229', '2021-01-30 15:30:01'),
(256, '2021-01-30 15:31:01', '103.129.97.229', '2021-01-30 15:31:01'),
(257, '2021-01-30 15:32:02', '103.129.97.229', '2021-01-30 15:32:02'),
(258, '2021-01-30 15:33:01', '103.129.97.229', '2021-01-30 15:33:01'),
(259, '2021-01-30 15:34:01', '103.129.97.229', '2021-01-30 15:34:01'),
(260, '2021-01-30 15:35:01', '103.129.97.229', '2021-01-30 15:35:01'),
(261, '2021-01-30 15:36:02', '103.129.97.229', '2021-01-30 15:36:02'),
(262, '2021-01-30 15:37:01', '103.129.97.229', '2021-01-30 15:37:01'),
(263, '2021-01-30 15:38:02', '103.129.97.229', '2021-01-30 15:38:02'),
(264, '2021-01-30 15:39:02', '103.129.97.229', '2021-01-30 15:39:02'),
(265, '2021-01-30 15:40:01', '103.129.97.229', '2021-01-30 15:40:01'),
(266, '2021-01-30 15:41:01', '103.129.97.229', '2021-01-30 15:41:01'),
(267, '2021-01-30 15:42:02', '103.129.97.229', '2021-01-30 15:42:02'),
(268, '2021-01-30 15:43:01', '103.129.97.229', '2021-01-30 15:43:01'),
(269, '2021-01-30 15:44:01', '103.129.97.229', '2021-01-30 15:44:01'),
(270, '2021-01-30 15:45:01', '103.129.97.229', '2021-01-30 15:45:01'),
(271, '2021-01-30 15:46:01', '103.129.97.229', '2021-01-30 15:46:01'),
(272, '2021-01-30 15:47:02', '103.129.97.229', '2021-01-30 15:47:02'),
(273, '2021-01-30 15:48:01', '103.129.97.229', '2021-01-30 15:48:01'),
(274, '2021-01-30 15:49:01', '103.129.97.229', '2021-01-30 15:49:01'),
(275, '2021-01-30 15:50:01', '103.129.97.229', '2021-01-30 15:50:01'),
(276, '2021-01-30 15:51:02', '103.129.97.229', '2021-01-30 15:51:02'),
(277, '2021-01-30 15:52:01', '103.129.97.229', '2021-01-30 15:52:01'),
(278, '2021-01-30 15:53:02', '103.129.97.229', '2021-01-30 15:53:02'),
(279, '2021-01-30 15:54:02', '103.129.97.229', '2021-01-30 15:54:02'),
(280, '2021-01-30 15:55:01', '103.129.97.229', '2021-01-30 15:55:01'),
(281, '2021-01-30 15:56:01', '103.129.97.229', '2021-01-30 15:56:01'),
(282, '2021-01-30 15:57:01', '103.129.97.229', '2021-01-30 15:57:01'),
(283, '2021-01-30 15:58:01', '103.129.97.229', '2021-01-30 15:58:01'),
(284, '2021-01-30 15:59:01', '103.129.97.229', '2021-01-30 15:59:01'),
(285, '2021-01-30 16:00:02', '103.129.97.229', '2021-01-30 16:00:02'),
(286, '2021-01-30 16:01:01', '103.129.97.229', '2021-01-30 16:01:01'),
(287, '2021-01-30 16:02:01', '103.129.97.229', '2021-01-30 16:02:01'),
(288, '2021-01-30 16:03:01', '103.129.97.229', '2021-01-30 16:03:01'),
(289, '2021-01-30 16:04:02', '103.129.97.229', '2021-01-30 16:04:02'),
(290, '2021-01-30 16:05:02', '103.129.97.229', '2021-01-30 16:05:02'),
(291, '2021-01-30 16:06:02', '103.129.97.229', '2021-01-30 16:06:02'),
(292, '2021-01-30 16:07:01', '103.129.97.229', '2021-01-30 16:07:01'),
(293, '2021-01-30 16:08:02', '103.129.97.229', '2021-01-30 16:08:02'),
(294, '2021-01-30 16:09:02', '103.129.97.229', '2021-01-30 16:09:02'),
(295, '2021-01-30 16:10:02', '103.129.97.229', '2021-01-30 16:10:02'),
(296, '2021-01-30 16:11:02', '103.129.97.229', '2021-01-30 16:11:02'),
(297, '2021-01-30 16:12:01', '103.129.97.229', '2021-01-30 16:12:01'),
(298, '2021-01-30 16:13:01', '103.129.97.229', '2021-01-30 16:13:01'),
(299, '2021-01-30 16:14:02', '103.129.97.229', '2021-01-30 16:14:02'),
(300, '2021-01-30 16:15:01', '103.129.97.229', '2021-01-30 16:15:01'),
(301, '2021-01-30 16:16:01', '103.129.97.229', '2021-01-30 16:16:01'),
(302, '2021-01-30 16:17:02', '103.129.97.229', '2021-01-30 16:17:02'),
(303, '2021-01-30 16:18:01', '103.129.97.229', '2021-01-30 16:18:01'),
(304, '2021-01-30 16:19:01', '103.129.97.229', '2021-01-30 16:19:01'),
(305, '2021-01-30 16:20:02', '103.129.97.229', '2021-01-30 16:20:02'),
(306, '2021-01-30 16:21:02', '103.129.97.229', '2021-01-30 16:21:02'),
(307, '2021-01-30 16:22:02', '103.129.97.229', '2021-01-30 16:22:02'),
(308, '2021-01-30 16:23:05', '103.129.97.229', '2021-01-30 16:23:05'),
(309, '2021-01-30 16:24:01', '103.129.97.229', '2021-01-30 16:24:01'),
(310, '2021-01-30 16:25:01', '103.129.97.229', '2021-01-30 16:25:01'),
(311, '2021-01-30 16:26:01', '103.129.97.229', '2021-01-30 16:26:01'),
(312, '2021-01-30 16:27:01', '103.129.97.229', '2021-01-30 16:27:01'),
(313, '2021-01-30 16:28:02', '103.129.97.229', '2021-01-30 16:28:02'),
(314, '2021-01-30 16:29:01', '103.129.97.229', '2021-01-30 16:29:01'),
(315, '2021-01-30 16:30:02', '103.129.97.229', '2021-01-30 16:30:02'),
(316, '2021-01-30 16:31:01', '103.129.97.229', '2021-01-30 16:31:01'),
(317, '2021-01-30 16:32:01', '103.129.97.229', '2021-01-30 16:32:01'),
(318, '2021-01-30 16:33:01', '103.129.97.229', '2021-01-30 16:33:01'),
(319, '2021-01-30 16:34:02', '103.129.97.229', '2021-01-30 16:34:02'),
(320, '2021-01-30 16:35:01', '103.129.97.229', '2021-01-30 16:35:01'),
(321, '2021-01-30 16:36:01', '103.129.97.229', '2021-01-30 16:36:01'),
(322, '2021-01-30 16:37:01', '103.129.97.229', '2021-01-30 16:37:01'),
(323, '2021-01-30 16:38:01', '103.129.97.229', '2021-01-30 16:38:01'),
(324, '2021-01-30 16:39:01', '103.129.97.229', '2021-01-30 16:39:01'),
(325, '2021-01-30 16:40:02', '103.129.97.229', '2021-01-30 16:40:02'),
(326, '2021-01-30 16:41:02', '103.129.97.229', '2021-01-30 16:41:02'),
(327, '2021-01-30 16:42:02', '103.129.97.229', '2021-01-30 16:42:02'),
(328, '2021-01-30 16:43:01', '103.129.97.229', '2021-01-30 16:43:01'),
(329, '2021-01-30 16:44:01', '103.129.97.229', '2021-01-30 16:44:01'),
(330, '2021-01-30 16:45:02', '103.129.97.229', '2021-01-30 16:45:02'),
(331, '2021-01-30 16:46:01', '103.129.97.229', '2021-01-30 16:46:01'),
(332, '2021-01-30 16:47:01', '103.129.97.229', '2021-01-30 16:47:01'),
(333, '2021-01-30 16:48:01', '103.129.97.229', '2021-01-30 16:48:01'),
(334, '2021-01-30 16:49:02', '103.129.97.229', '2021-01-30 16:49:02'),
(335, '2021-01-30 16:50:01', '103.129.97.229', '2021-01-30 16:50:01'),
(336, '2021-01-30 16:51:02', '103.129.97.229', '2021-01-30 16:51:02'),
(337, '2021-01-30 16:52:01', '103.129.97.229', '2021-01-30 16:52:01'),
(338, '2021-01-30 16:53:01', '103.129.97.229', '2021-01-30 16:53:01'),
(339, '2021-01-30 16:54:01', '103.129.97.229', '2021-01-30 16:54:01'),
(340, '2021-01-30 16:55:02', '103.129.97.229', '2021-01-30 16:55:02'),
(341, '2021-01-30 16:56:03', '103.129.97.229', '2021-01-30 16:56:03'),
(342, '2021-01-30 16:57:01', '103.129.97.229', '2021-01-30 16:57:01'),
(343, '2021-01-30 16:58:01', '103.129.97.229', '2021-01-30 16:58:01'),
(344, '2021-01-30 16:59:02', '103.129.97.229', '2021-01-30 16:59:02'),
(345, '2021-01-30 17:00:02', '103.129.97.229', '2021-01-30 17:00:02'),
(346, '2021-01-30 17:01:02', '103.129.97.229', '2021-01-30 17:01:02'),
(347, '2021-01-30 17:02:01', '103.129.97.229', '2021-01-30 17:02:01'),
(348, '2021-01-30 17:03:01', '103.129.97.229', '2021-01-30 17:03:01'),
(349, '2021-01-30 17:04:02', '103.129.97.229', '2021-01-30 17:04:02'),
(350, '2021-01-30 17:05:02', '103.129.97.229', '2021-01-30 17:05:02'),
(351, '2021-01-30 17:06:01', '103.129.97.229', '2021-01-30 17:06:01'),
(352, '2021-01-30 17:07:02', '103.129.97.229', '2021-01-30 17:07:02'),
(353, '2021-01-30 17:08:02', '103.129.97.229', '2021-01-30 17:08:02'),
(354, '2021-01-30 17:09:01', '103.129.97.229', '2021-01-30 17:09:01'),
(355, '2021-01-30 17:10:03', '103.129.97.229', '2021-01-30 17:10:03'),
(356, '2021-01-30 17:11:01', '103.129.97.229', '2021-01-30 17:11:01'),
(357, '2021-01-30 17:12:01', '103.129.97.229', '2021-01-30 17:12:01'),
(358, '2021-01-30 17:13:02', '103.129.97.229', '2021-01-30 17:13:02'),
(359, '2021-01-30 17:14:01', '103.129.97.229', '2021-01-30 17:14:01'),
(360, '2021-01-30 17:15:02', '103.129.97.229', '2021-01-30 17:15:02'),
(361, '2021-01-30 17:16:01', '103.129.97.229', '2021-01-30 17:16:01'),
(362, '2021-01-30 17:17:02', '103.129.97.229', '2021-01-30 17:17:02'),
(363, '2021-01-30 17:18:01', '103.129.97.229', '2021-01-30 17:18:01'),
(364, '2021-01-30 17:19:01', '103.129.97.229', '2021-01-30 17:19:01'),
(365, '2021-01-30 17:20:01', '103.129.97.229', '2021-01-30 17:20:01'),
(366, '2021-01-30 17:21:02', '103.129.97.229', '2021-01-30 17:21:02'),
(367, '2021-01-30 17:22:01', '103.129.97.229', '2021-01-30 17:22:01'),
(368, '2021-01-30 17:23:02', '103.129.97.229', '2021-01-30 17:23:02'),
(369, '2021-01-30 17:24:01', '103.129.97.229', '2021-01-30 17:24:01'),
(370, '2021-01-30 17:25:01', '103.129.97.229', '2021-01-30 17:25:01'),
(371, '2021-01-30 17:26:01', '103.129.97.229', '2021-01-30 17:26:01'),
(372, '2021-01-30 17:27:02', '103.129.97.229', '2021-01-30 17:27:02'),
(373, '2021-01-30 17:28:01', '103.129.97.229', '2021-01-30 17:28:01'),
(374, '2021-01-30 17:29:01', '103.129.97.229', '2021-01-30 17:29:01'),
(375, '2021-01-30 17:30:02', '103.129.97.229', '2021-01-30 17:30:02'),
(376, '2021-01-30 17:31:01', '103.129.97.229', '2021-01-30 17:31:01'),
(377, '2021-01-30 17:32:01', '103.129.97.229', '2021-01-30 17:32:01'),
(378, '2021-01-30 17:33:01', '103.129.97.229', '2021-01-30 17:33:01'),
(379, '2021-01-30 17:34:02', '103.129.97.229', '2021-01-30 17:34:02'),
(380, '2021-01-30 17:35:02', '103.129.97.229', '2021-01-30 17:35:02'),
(381, '2021-01-30 17:36:01', '103.129.97.229', '2021-01-30 17:36:01'),
(382, '2021-01-30 17:37:02', '103.129.97.229', '2021-01-30 17:37:02'),
(383, '2021-01-30 17:38:02', '103.129.97.229', '2021-01-30 17:38:02'),
(384, '2021-01-30 17:39:02', '103.129.97.229', '2021-01-30 17:39:02'),
(385, '2021-01-30 17:40:02', '103.129.97.229', '2021-01-30 17:40:02'),
(386, '2021-01-30 17:41:01', '103.129.97.229', '2021-01-30 17:41:01'),
(387, '2021-01-30 17:42:01', '103.129.97.229', '2021-01-30 17:42:01'),
(388, '2021-01-30 17:43:01', '103.129.97.229', '2021-01-30 17:43:01'),
(389, '2021-01-30 17:44:01', '103.129.97.229', '2021-01-30 17:44:01'),
(390, '2021-01-30 17:45:01', '103.129.97.229', '2021-01-30 17:45:01'),
(391, '2021-01-30 17:46:01', '103.129.97.229', '2021-01-30 17:46:01'),
(392, '2021-01-30 17:47:02', '103.129.97.229', '2021-01-30 17:47:02'),
(393, '2021-01-30 17:48:02', '103.129.97.229', '2021-01-30 17:48:02'),
(394, '2021-01-30 17:49:03', '103.129.97.229', '2021-01-30 17:49:03'),
(395, '2021-01-30 17:50:02', '103.129.97.229', '2021-01-30 17:50:02'),
(396, '2021-01-30 17:51:02', '103.129.97.229', '2021-01-30 17:51:02'),
(397, '2021-01-30 17:52:01', '103.129.97.229', '2021-01-30 17:52:01'),
(398, '2021-01-30 17:53:01', '103.129.97.229', '2021-01-30 17:53:01'),
(399, '2021-01-30 17:54:02', '103.129.97.229', '2021-01-30 17:54:02'),
(400, '2021-01-30 17:55:01', '103.129.97.229', '2021-01-30 17:55:01'),
(401, '2021-01-30 17:56:02', '103.129.97.229', '2021-01-30 17:56:02'),
(402, '2021-01-30 17:57:01', '103.129.97.229', '2021-01-30 17:57:01'),
(403, '2021-01-30 17:58:01', '103.129.97.229', '2021-01-30 17:58:01'),
(404, '2021-01-30 17:59:01', '103.129.97.229', '2021-01-30 17:59:01'),
(405, '2021-01-30 18:00:02', '103.129.97.229', '2021-01-30 18:00:02'),
(406, '2021-01-30 18:01:02', '103.129.97.229', '2021-01-30 18:01:02'),
(407, '2021-01-30 18:02:02', '103.129.97.229', '2021-01-30 18:02:02'),
(408, '2021-01-30 18:03:01', '103.129.97.229', '2021-01-30 18:03:01'),
(409, '2021-01-30 18:04:01', '103.129.97.229', '2021-01-30 18:04:01'),
(410, '2021-01-30 18:05:02', '103.129.97.229', '2021-01-30 18:05:02'),
(411, '2021-01-30 18:06:01', '103.129.97.229', '2021-01-30 18:06:01'),
(412, '2021-01-30 18:07:02', '103.129.97.229', '2021-01-30 18:07:02'),
(413, '2021-01-30 18:08:02', '103.129.97.229', '2021-01-30 18:08:02'),
(414, '2021-01-30 18:09:02', '103.129.97.229', '2021-01-30 18:09:02'),
(415, '2021-01-30 18:10:01', '103.129.97.229', '2021-01-30 18:10:01'),
(416, '2021-01-30 18:11:02', '103.129.97.229', '2021-01-30 18:11:02'),
(417, '2021-01-30 18:12:02', '103.129.97.229', '2021-01-30 18:12:02'),
(418, '2021-01-30 18:13:03', '103.129.97.229', '2021-01-30 18:13:03'),
(419, '2021-01-30 18:14:01', '103.129.97.229', '2021-01-30 18:14:01'),
(420, '2021-01-30 18:15:01', '103.129.97.229', '2021-01-30 18:15:01'),
(421, '2021-01-30 18:16:01', '103.129.97.229', '2021-01-30 18:16:01'),
(422, '2021-01-30 18:17:01', '103.129.97.229', '2021-01-30 18:17:01'),
(423, '2021-01-30 18:18:02', '103.129.97.229', '2021-01-30 18:18:02'),
(424, '2021-01-30 18:19:02', '103.129.97.229', '2021-01-30 18:19:02'),
(425, '2021-01-30 18:20:02', '103.129.97.229', '2021-01-30 18:20:02'),
(426, '2021-01-30 18:21:02', '103.129.97.229', '2021-01-30 18:21:02'),
(427, '2021-01-30 18:22:01', '103.129.97.229', '2021-01-30 18:22:01'),
(428, '2021-01-30 18:23:02', '103.129.97.229', '2021-01-30 18:23:02'),
(429, '2021-01-30 18:24:01', '103.129.97.229', '2021-01-30 18:24:01'),
(430, '2021-01-30 18:25:02', '103.129.97.229', '2021-01-30 18:25:02'),
(431, '2021-01-30 18:26:02', '103.129.97.229', '2021-01-30 18:26:02'),
(432, '2021-01-30 18:27:03', '103.129.97.229', '2021-01-30 18:27:03'),
(433, '2021-01-30 18:28:02', '103.129.97.229', '2021-01-30 18:28:02'),
(434, '2021-01-30 18:29:01', '103.129.97.229', '2021-01-30 18:29:01'),
(435, '2021-01-30 18:30:02', '103.129.97.229', '2021-01-30 18:30:02'),
(436, '2021-01-30 18:31:02', '103.129.97.229', '2021-01-30 18:31:02'),
(437, '2021-01-30 18:32:02', '103.129.97.229', '2021-01-30 18:32:02'),
(438, '2021-01-30 18:33:01', '103.129.97.229', '2021-01-30 18:33:01'),
(439, '2021-01-30 18:34:02', '103.129.97.229', '2021-01-30 18:34:02'),
(440, '2021-01-30 18:35:01', '103.129.97.229', '2021-01-30 18:35:01'),
(441, '2021-01-30 18:36:02', '103.129.97.229', '2021-01-30 18:36:02'),
(442, '2021-01-30 18:37:02', '103.129.97.229', '2021-01-30 18:37:02'),
(443, '2021-01-30 18:38:01', '103.129.97.229', '2021-01-30 18:38:01'),
(444, '2021-01-30 18:39:01', '103.129.97.229', '2021-01-30 18:39:01'),
(445, '2021-01-30 18:40:02', '103.129.97.229', '2021-01-30 18:40:02'),
(446, '2021-01-30 18:41:01', '103.129.97.229', '2021-01-30 18:41:01'),
(447, '2021-01-30 18:42:01', '103.129.97.229', '2021-01-30 18:42:01'),
(448, '2021-01-30 18:43:01', '103.129.97.229', '2021-01-30 18:43:01'),
(449, '2021-01-30 18:44:01', '103.129.97.229', '2021-01-30 18:44:01'),
(450, '2021-01-30 18:45:01', '103.129.97.229', '2021-01-30 18:45:01'),
(451, '2021-01-30 18:46:02', '103.129.97.229', '2021-01-30 18:46:02'),
(452, '2021-01-30 18:47:01', '103.129.97.229', '2021-01-30 18:47:01'),
(453, '2021-01-30 18:48:01', '103.129.97.229', '2021-01-30 18:48:01'),
(454, '2021-01-30 18:49:01', '103.129.97.229', '2021-01-30 18:49:01'),
(455, '2021-01-30 18:50:01', '103.129.97.229', '2021-01-30 18:50:01'),
(456, '2021-01-30 18:51:01', '103.129.97.229', '2021-01-30 18:51:01'),
(457, '2021-01-30 18:52:01', '103.129.97.229', '2021-01-30 18:52:01'),
(458, '2021-01-30 18:53:02', '103.129.97.229', '2021-01-30 18:53:02'),
(459, '2021-01-30 18:54:02', '103.129.97.229', '2021-01-30 18:54:02'),
(460, '2021-01-30 18:55:01', '103.129.97.229', '2021-01-30 18:55:01'),
(461, '2021-01-30 18:56:02', '103.129.97.229', '2021-01-30 18:56:02'),
(462, '2021-01-30 18:57:01', '103.129.97.229', '2021-01-30 18:57:01'),
(463, '2021-01-30 18:58:02', '103.129.97.229', '2021-01-30 18:58:02'),
(464, '2021-01-30 18:59:02', '103.129.97.229', '2021-01-30 18:59:02'),
(465, '2021-01-30 19:00:02', '103.129.97.229', '2021-01-30 19:00:02'),
(466, '2021-01-30 19:01:01', '103.129.97.229', '2021-01-30 19:01:01'),
(467, '2021-01-30 19:02:01', '103.129.97.229', '2021-01-30 19:02:01'),
(468, '2021-01-30 19:03:01', '103.129.97.229', '2021-01-30 19:03:01'),
(469, '2021-01-30 19:04:01', '103.129.97.229', '2021-01-30 19:04:01'),
(470, '2021-01-30 19:05:02', '103.129.97.229', '2021-01-30 19:05:02'),
(471, '2021-01-30 19:06:02', '103.129.97.229', '2021-01-30 19:06:02'),
(472, '2021-01-30 19:07:02', '103.129.97.229', '2021-01-30 19:07:02'),
(473, '2021-01-30 19:08:02', '103.129.97.229', '2021-01-30 19:08:02'),
(474, '2021-01-30 19:09:01', '103.129.97.229', '2021-01-30 19:09:01'),
(475, '2021-01-30 19:10:02', '103.129.97.229', '2021-01-30 19:10:02'),
(476, '2021-01-30 19:11:01', '103.129.97.229', '2021-01-30 19:11:01'),
(477, '2021-01-30 19:12:01', '103.129.97.229', '2021-01-30 19:12:01'),
(478, '2021-01-30 19:13:01', '103.129.97.229', '2021-01-30 19:13:01'),
(479, '2021-01-30 19:14:02', '103.129.97.229', '2021-01-30 19:14:02'),
(480, '2021-01-30 19:15:01', '103.129.97.229', '2021-01-30 19:15:01'),
(481, '2021-01-30 19:16:01', '103.129.97.229', '2021-01-30 19:16:01'),
(482, '2021-01-30 19:17:01', '103.129.97.229', '2021-01-30 19:17:01'),
(483, '2021-01-30 19:18:01', '103.129.97.229', '2021-01-30 19:18:01'),
(484, '2021-01-30 19:19:01', '103.129.97.229', '2021-01-30 19:19:01'),
(485, '2021-01-30 19:20:02', '103.129.97.229', '2021-01-30 19:20:02'),
(486, '2021-01-30 19:21:02', '103.129.97.229', '2021-01-30 19:21:02'),
(487, '2021-01-30 19:22:02', '103.129.97.229', '2021-01-30 19:22:02'),
(488, '2021-01-30 19:23:01', '103.129.97.229', '2021-01-30 19:23:01'),
(489, '2021-01-30 19:24:01', '103.129.97.229', '2021-01-30 19:24:01'),
(490, '2021-01-30 19:25:01', '103.129.97.229', '2021-01-30 19:25:01'),
(491, '2021-01-30 19:26:01', '103.129.97.229', '2021-01-30 19:26:01'),
(492, '2021-01-30 19:27:01', '103.129.97.229', '2021-01-30 19:27:01'),
(493, '2021-01-30 19:28:01', '103.129.97.229', '2021-01-30 19:28:01'),
(494, '2021-01-30 19:29:01', '103.129.97.229', '2021-01-30 19:29:01'),
(495, '2021-01-30 19:30:02', '103.129.97.229', '2021-01-30 19:30:02'),
(496, '2021-01-30 19:31:02', '103.129.97.229', '2021-01-30 19:31:02'),
(497, '2021-01-30 19:32:02', '103.129.97.229', '2021-01-30 19:32:02'),
(498, '2021-01-30 19:33:01', '103.129.97.229', '2021-01-30 19:33:01'),
(499, '2021-01-30 19:34:02', '103.129.97.229', '2021-01-30 19:34:02'),
(500, '2021-01-30 19:35:01', '103.129.97.229', '2021-01-30 19:35:01'),
(501, '2021-01-30 19:36:02', '103.129.97.229', '2021-01-30 19:36:02'),
(502, '2021-01-30 19:37:01', '103.129.97.229', '2021-01-30 19:37:01'),
(503, '2021-01-30 19:38:01', '103.129.97.229', '2021-01-30 19:38:01'),
(504, '2021-01-30 19:39:01', '103.129.97.229', '2021-01-30 19:39:01'),
(505, '2021-01-30 19:40:01', '103.129.97.229', '2021-01-30 19:40:01'),
(506, '2021-01-30 19:41:01', '103.129.97.229', '2021-01-30 19:41:01'),
(507, '2021-01-30 19:42:02', '103.129.97.229', '2021-01-30 19:42:02'),
(508, '2021-01-30 19:43:02', '103.129.97.229', '2021-01-30 19:43:02'),
(509, '2021-01-30 19:44:02', '103.129.97.229', '2021-01-30 19:44:02'),
(510, '2021-01-30 19:45:01', '103.129.97.229', '2021-01-30 19:45:01'),
(511, '2021-01-30 19:46:02', '103.129.97.229', '2021-01-30 19:46:02'),
(512, '2021-01-30 19:47:01', '103.129.97.229', '2021-01-30 19:47:01'),
(513, '2021-01-30 19:48:02', '103.129.97.229', '2021-01-30 19:48:02'),
(514, '2021-01-30 19:49:02', '103.129.97.229', '2021-01-30 19:49:02'),
(515, '2021-01-30 19:50:01', '103.129.97.229', '2021-01-30 19:50:01'),
(516, '2021-01-30 19:51:03', '103.129.97.229', '2021-01-30 19:51:03'),
(517, '2021-01-30 19:52:01', '103.129.97.229', '2021-01-30 19:52:01'),
(518, '2021-01-30 19:53:02', '103.129.97.229', '2021-01-30 19:53:02'),
(519, '2021-01-30 19:54:01', '103.129.97.229', '2021-01-30 19:54:01'),
(520, '2021-01-30 19:55:02', '103.129.97.229', '2021-01-30 19:55:02'),
(521, '2021-01-30 19:56:03', '103.129.97.229', '2021-01-30 19:56:03'),
(522, '2021-01-30 19:57:01', '103.129.97.229', '2021-01-30 19:57:01'),
(523, '2021-01-30 19:58:04', '103.129.97.229', '2021-01-30 19:58:04'),
(524, '2021-01-30 19:59:01', '103.129.97.229', '2021-01-30 19:59:01'),
(525, '2021-01-30 20:00:02', '103.129.97.229', '2021-01-30 20:00:02'),
(526, '2021-01-30 20:01:01', '103.129.97.229', '2021-01-30 20:01:01'),
(527, '2021-01-30 20:02:02', '103.129.97.229', '2021-01-30 20:02:02'),
(528, '2021-01-30 20:03:01', '103.129.97.229', '2021-01-30 20:03:01'),
(529, '2021-01-30 20:04:01', '103.129.97.229', '2021-01-30 20:04:01'),
(530, '2021-01-30 20:05:02', '103.129.97.229', '2021-01-30 20:05:02'),
(531, '2021-01-30 20:06:02', '103.129.97.229', '2021-01-30 20:06:02'),
(532, '2021-01-30 20:07:01', '103.129.97.229', '2021-01-30 20:07:01'),
(533, '2021-01-30 20:08:01', '103.129.97.229', '2021-01-30 20:08:01'),
(534, '2021-01-30 20:09:01', '103.129.97.229', '2021-01-30 20:09:01'),
(535, '2021-01-30 20:10:01', '103.129.97.229', '2021-01-30 20:10:01'),
(536, '2021-01-30 20:11:01', '103.129.97.229', '2021-01-30 20:11:01'),
(537, '2021-01-30 20:12:03', '103.129.97.229', '2021-01-30 20:12:03'),
(538, '2021-01-30 20:13:02', '103.129.97.229', '2021-01-30 20:13:02'),
(539, '2021-01-30 20:14:01', '103.129.97.229', '2021-01-30 20:14:01'),
(540, '2021-01-30 20:15:01', '103.129.97.229', '2021-01-30 20:15:01'),
(541, '2021-01-30 20:16:01', '103.129.97.229', '2021-01-30 20:16:01'),
(542, '2021-01-30 20:17:02', '103.129.97.229', '2021-01-30 20:17:02'),
(543, '2021-01-30 20:18:01', '103.129.97.229', '2021-01-30 20:18:01'),
(544, '2021-01-30 20:19:02', '103.129.97.229', '2021-01-30 20:19:02'),
(545, '2021-01-30 20:20:01', '103.129.97.229', '2021-01-30 20:20:01'),
(546, '2021-01-30 20:21:02', '103.129.97.229', '2021-01-30 20:21:02'),
(547, '2021-01-30 20:22:02', '103.129.97.229', '2021-01-30 20:22:02'),
(548, '2021-01-30 20:23:02', '103.129.97.229', '2021-01-30 20:23:02'),
(549, '2021-01-30 20:24:01', '103.129.97.229', '2021-01-30 20:24:01'),
(550, '2021-01-30 20:25:01', '103.129.97.229', '2021-01-30 20:25:01'),
(551, '2021-01-30 20:26:02', '103.129.97.229', '2021-01-30 20:26:02'),
(552, '2021-01-30 20:27:01', '103.129.97.229', '2021-01-30 20:27:01'),
(553, '2021-01-30 20:28:01', '103.129.97.229', '2021-01-30 20:28:01'),
(554, '2021-01-30 20:29:01', '103.129.97.229', '2021-01-30 20:29:01'),
(555, '2021-01-30 20:30:02', '103.129.97.229', '2021-01-30 20:30:02'),
(556, '2021-01-30 20:31:01', '103.129.97.229', '2021-01-30 20:31:01'),
(557, '2021-01-30 20:32:01', '103.129.97.229', '2021-01-30 20:32:01'),
(558, '2021-01-30 20:33:01', '103.129.97.229', '2021-01-30 20:33:01'),
(559, '2021-01-30 20:34:01', '103.129.97.229', '2021-01-30 20:34:01'),
(560, '2021-01-30 20:35:01', '103.129.97.229', '2021-01-30 20:35:01'),
(561, '2021-01-30 20:36:01', '103.129.97.229', '2021-01-30 20:36:01'),
(562, '2021-01-30 20:37:02', '103.129.97.229', '2021-01-30 20:37:02'),
(563, '2021-01-30 20:38:02', '103.129.97.229', '2021-01-30 20:38:02'),
(564, '2021-01-30 20:39:01', '103.129.97.229', '2021-01-30 20:39:01'),
(565, '2021-01-30 20:40:01', '103.129.97.229', '2021-01-30 20:40:01'),
(566, '2021-01-30 20:41:02', '103.129.97.229', '2021-01-30 20:41:02'),
(567, '2021-01-30 20:42:02', '103.129.97.229', '2021-01-30 20:42:02'),
(568, '2021-01-30 20:43:02', '103.129.97.229', '2021-01-30 20:43:02'),
(569, '2021-01-30 20:44:01', '103.129.97.229', '2021-01-30 20:44:01'),
(570, '2021-01-30 20:45:01', '103.129.97.229', '2021-01-30 20:45:01'),
(571, '2021-01-30 20:46:01', '103.129.97.229', '2021-01-30 20:46:01'),
(572, '2021-01-30 20:47:01', '103.129.97.229', '2021-01-30 20:47:01'),
(573, '2021-01-30 20:48:01', '103.129.97.229', '2021-01-30 20:48:01'),
(574, '2021-01-30 20:49:02', '103.129.97.229', '2021-01-30 20:49:02'),
(575, '2021-01-30 20:50:02', '103.129.97.229', '2021-01-30 20:50:02'),
(576, '2021-01-30 20:51:02', '103.129.97.229', '2021-01-30 20:51:02'),
(577, '2021-01-30 20:52:01', '103.129.97.229', '2021-01-30 20:52:01'),
(578, '2021-01-30 20:53:01', '103.129.97.229', '2021-01-30 20:53:01'),
(579, '2021-01-30 20:54:02', '103.129.97.229', '2021-01-30 20:54:02'),
(580, '2021-01-30 20:55:02', '103.129.97.229', '2021-01-30 20:55:02'),
(581, '2021-01-30 20:56:02', '103.129.97.229', '2021-01-30 20:56:02'),
(582, '2021-01-30 20:57:01', '103.129.97.229', '2021-01-30 20:57:01'),
(583, '2021-01-30 20:58:01', '103.129.97.229', '2021-01-30 20:58:01'),
(584, '2021-01-30 20:59:02', '103.129.97.229', '2021-01-30 20:59:02'),
(585, '2021-01-30 21:00:02', '103.129.97.229', '2021-01-30 21:00:02'),
(586, '2021-01-30 21:01:02', '103.129.97.229', '2021-01-30 21:01:02'),
(587, '2021-01-30 21:02:01', '103.129.97.229', '2021-01-30 21:02:01'),
(588, '2021-01-30 21:03:02', '103.129.97.229', '2021-01-30 21:03:02'),
(589, '2021-01-30 21:04:02', '103.129.97.229', '2021-01-30 21:04:02'),
(590, '2021-01-30 21:05:01', '103.129.97.229', '2021-01-30 21:05:01'),
(591, '2021-01-30 21:06:01', '103.129.97.229', '2021-01-30 21:06:01'),
(592, '2021-01-30 21:07:02', '103.129.97.229', '2021-01-30 21:07:02'),
(593, '2021-01-30 21:08:02', '103.129.97.229', '2021-01-30 21:08:02'),
(594, '2021-01-30 21:09:02', '103.129.97.229', '2021-01-30 21:09:02'),
(595, '2021-01-30 21:10:01', '103.129.97.229', '2021-01-30 21:10:01'),
(596, '2021-01-30 21:11:01', '103.129.97.229', '2021-01-30 21:11:01'),
(597, '2021-01-30 21:12:02', '103.129.97.229', '2021-01-30 21:12:02'),
(598, '2021-01-30 21:13:02', '103.129.97.229', '2021-01-30 21:13:02'),
(599, '2021-01-30 21:14:01', '103.129.97.229', '2021-01-30 21:14:01'),
(600, '2021-01-30 21:15:01', '103.129.97.229', '2021-01-30 21:15:01'),
(601, '2021-01-30 21:16:01', '103.129.97.229', '2021-01-30 21:16:01'),
(602, '2021-01-30 21:17:01', '103.129.97.229', '2021-01-30 21:17:01'),
(603, '2021-01-30 21:18:02', '103.129.97.229', '2021-01-30 21:18:02'),
(604, '2021-01-30 21:19:01', '103.129.97.229', '2021-01-30 21:19:01'),
(605, '2021-01-30 21:20:02', '103.129.97.229', '2021-01-30 21:20:02'),
(606, '2021-01-30 21:21:01', '103.129.97.229', '2021-01-30 21:21:01'),
(607, '2021-01-30 21:22:01', '103.129.97.229', '2021-01-30 21:22:01'),
(608, '2021-01-30 21:23:01', '103.129.97.229', '2021-01-30 21:23:01'),
(609, '2021-01-30 21:24:01', '103.129.97.229', '2021-01-30 21:24:01'),
(610, '2021-01-30 21:25:02', '103.129.97.229', '2021-01-30 21:25:02'),
(611, '2021-01-30 21:26:01', '103.129.97.229', '2021-01-30 21:26:01'),
(612, '2021-01-30 21:27:01', '103.129.97.229', '2021-01-30 21:27:01'),
(613, '2021-01-30 21:28:01', '103.129.97.229', '2021-01-30 21:28:01'),
(614, '2021-01-30 21:29:01', '103.129.97.229', '2021-01-30 21:29:01'),
(615, '2021-01-30 21:30:02', '103.129.97.229', '2021-01-30 21:30:02'),
(616, '2021-01-30 21:31:01', '103.129.97.229', '2021-01-30 21:31:01'),
(617, '2021-01-30 21:32:01', '103.129.97.229', '2021-01-30 21:32:01'),
(618, '2021-01-30 21:33:01', '103.129.97.229', '2021-01-30 21:33:01'),
(619, '2021-01-30 21:34:02', '103.129.97.229', '2021-01-30 21:34:02'),
(620, '2021-01-30 21:35:01', '103.129.97.229', '2021-01-30 21:35:01'),
(621, '2021-01-30 21:36:01', '103.129.97.229', '2021-01-30 21:36:01'),
(622, '2021-01-30 21:37:01', '103.129.97.229', '2021-01-30 21:37:01'),
(623, '2021-01-30 21:38:01', '103.129.97.229', '2021-01-30 21:38:01'),
(624, '2021-01-30 21:39:01', '103.129.97.229', '2021-01-30 21:39:01'),
(625, '2021-01-30 21:40:02', '103.129.97.229', '2021-01-30 21:40:02'),
(626, '2021-01-30 21:41:02', '103.129.97.229', '2021-01-30 21:41:02'),
(627, '2021-01-30 21:42:01', '103.129.97.229', '2021-01-30 21:42:01'),
(628, '2021-01-30 21:43:01', '103.129.97.229', '2021-01-30 21:43:01'),
(629, '2021-01-30 21:44:01', '103.129.97.229', '2021-01-30 21:44:01'),
(630, '2021-01-30 21:45:01', '103.129.97.229', '2021-01-30 21:45:01'),
(631, '2021-01-30 21:46:01', '103.129.97.229', '2021-01-30 21:46:01'),
(632, '2021-01-30 21:47:01', '103.129.97.229', '2021-01-30 21:47:01'),
(633, '2021-01-30 21:48:01', '103.129.97.229', '2021-01-30 21:48:01'),
(634, '2021-01-30 21:49:01', '103.129.97.229', '2021-01-30 21:49:01'),
(635, '2021-01-30 21:50:01', '103.129.97.229', '2021-01-30 21:50:01'),
(636, '2021-01-30 21:51:01', '103.129.97.229', '2021-01-30 21:51:01'),
(637, '2021-01-30 21:52:02', '103.129.97.229', '2021-01-30 21:52:02'),
(638, '2021-01-30 21:53:01', '103.129.97.229', '2021-01-30 21:53:01'),
(639, '2021-01-30 21:54:01', '103.129.97.229', '2021-01-30 21:54:01'),
(640, '2021-01-30 21:55:02', '103.129.97.229', '2021-01-30 21:55:02'),
(641, '2021-01-30 21:56:02', '103.129.97.229', '2021-01-30 21:56:02'),
(642, '2021-01-30 21:57:02', '103.129.97.229', '2021-01-30 21:57:02'),
(643, '2021-01-30 21:58:02', '103.129.97.229', '2021-01-30 21:58:02'),
(644, '2021-01-30 21:59:02', '103.129.97.229', '2021-01-30 21:59:02'),
(645, '2021-01-30 22:00:02', '103.129.97.229', '2021-01-30 22:00:02'),
(646, '2021-01-30 22:01:02', '103.129.97.229', '2021-01-30 22:01:02'),
(647, '2021-01-30 22:02:01', '103.129.97.229', '2021-01-30 22:02:01'),
(648, '2021-01-30 22:03:01', '103.129.97.229', '2021-01-30 22:03:01'),
(649, '2021-01-30 22:04:01', '103.129.97.229', '2021-01-30 22:04:01'),
(650, '2021-01-30 22:05:02', '103.129.97.229', '2021-01-30 22:05:02'),
(651, '2021-01-30 22:06:01', '103.129.97.229', '2021-01-30 22:06:01'),
(652, '2021-01-30 22:07:02', '103.129.97.229', '2021-01-30 22:07:02'),
(653, '2021-01-30 22:08:01', '103.129.97.229', '2021-01-30 22:08:01'),
(654, '2021-01-30 22:09:01', '103.129.97.229', '2021-01-30 22:09:01'),
(655, '2021-01-30 22:10:01', '103.129.97.229', '2021-01-30 22:10:01'),
(656, '2021-01-30 22:11:01', '103.129.97.229', '2021-01-30 22:11:01'),
(657, '2021-01-30 22:12:02', '103.129.97.229', '2021-01-30 22:12:02'),
(658, '2021-01-30 22:13:01', '103.129.97.229', '2021-01-30 22:13:01'),
(659, '2021-01-30 22:14:02', '103.129.97.229', '2021-01-30 22:14:02'),
(660, '2021-01-30 22:15:01', '103.129.97.229', '2021-01-30 22:15:01'),
(661, '2021-01-30 22:16:02', '103.129.97.229', '2021-01-30 22:16:02'),
(662, '2021-01-30 22:17:02', '103.129.97.229', '2021-01-30 22:17:02'),
(663, '2021-01-30 22:18:02', '103.129.97.229', '2021-01-30 22:18:02'),
(664, '2021-01-30 22:19:02', '103.129.97.229', '2021-01-30 22:19:02'),
(665, '2021-01-30 22:20:01', '103.129.97.229', '2021-01-30 22:20:01'),
(666, '2021-01-30 22:21:02', '103.129.97.229', '2021-01-30 22:21:02'),
(667, '2021-01-30 22:22:01', '103.129.97.229', '2021-01-30 22:22:01'),
(668, '2021-01-30 22:23:01', '103.129.97.229', '2021-01-30 22:23:01'),
(669, '2021-01-30 22:24:01', '103.129.97.229', '2021-01-30 22:24:01'),
(670, '2021-01-30 22:25:01', '103.129.97.229', '2021-01-30 22:25:01'),
(671, '2021-01-30 22:26:01', '103.129.97.229', '2021-01-30 22:26:01'),
(672, '2021-01-30 22:27:02', '103.129.97.229', '2021-01-30 22:27:02'),
(673, '2021-01-30 22:28:02', '103.129.97.229', '2021-01-30 22:28:02'),
(674, '2021-01-30 22:29:02', '103.129.97.229', '2021-01-30 22:29:02'),
(675, '2021-01-30 22:30:01', '103.129.97.229', '2021-01-30 22:30:01'),
(676, '2021-01-30 22:31:01', '103.129.97.229', '2021-01-30 22:31:01'),
(677, '2021-01-30 22:32:02', '103.129.97.229', '2021-01-30 22:32:02'),
(678, '2021-01-30 22:33:01', '103.129.97.229', '2021-01-30 22:33:01'),
(679, '2021-01-30 22:34:02', '103.129.97.229', '2021-01-30 22:34:02'),
(680, '2021-01-30 22:35:01', '103.129.97.229', '2021-01-30 22:35:01'),
(681, '2021-01-30 22:36:01', '103.129.97.229', '2021-01-30 22:36:01'),
(682, '2021-01-30 22:37:02', '103.129.97.229', '2021-01-30 22:37:02'),
(683, '2021-01-30 22:38:01', '103.129.97.229', '2021-01-30 22:38:01'),
(684, '2021-01-30 22:39:02', '103.129.97.229', '2021-01-30 22:39:02'),
(685, '2021-01-30 22:40:02', '103.129.97.229', '2021-01-30 22:40:02'),
(686, '2021-01-30 22:41:01', '103.129.97.229', '2021-01-30 22:41:01'),
(687, '2021-01-30 22:42:01', '103.129.97.229', '2021-01-30 22:42:01'),
(688, '2021-01-30 22:43:01', '103.129.97.229', '2021-01-30 22:43:01'),
(689, '2021-01-30 22:44:01', '103.129.97.229', '2021-01-30 22:44:01'),
(690, '2021-01-30 22:45:01', '103.129.97.229', '2021-01-30 22:45:01'),
(691, '2021-01-30 22:46:01', '103.129.97.229', '2021-01-30 22:46:01'),
(692, '2021-01-30 22:47:01', '103.129.97.229', '2021-01-30 22:47:01'),
(693, '2021-01-30 22:48:01', '103.129.97.229', '2021-01-30 22:48:01'),
(694, '2021-01-30 22:49:01', '103.129.97.229', '2021-01-30 22:49:01'),
(695, '2021-01-30 22:50:02', '103.129.97.229', '2021-01-30 22:50:02'),
(696, '2021-01-30 22:51:02', '103.129.97.229', '2021-01-30 22:51:02'),
(697, '2021-01-30 22:52:01', '103.129.97.229', '2021-01-30 22:52:01'),
(698, '2021-01-30 22:53:01', '103.129.97.229', '2021-01-30 22:53:01'),
(699, '2021-01-30 22:54:01', '103.129.97.229', '2021-01-30 22:54:01'),
(700, '2021-01-30 22:55:01', '103.129.97.229', '2021-01-30 22:55:01'),
(701, '2021-01-30 22:56:01', '103.129.97.229', '2021-01-30 22:56:01'),
(702, '2021-01-30 22:57:01', '103.129.97.229', '2021-01-30 22:57:01'),
(703, '2021-01-30 22:58:01', '103.129.97.229', '2021-01-30 22:58:01'),
(704, '2021-01-30 22:59:01', '103.129.97.229', '2021-01-30 22:59:01'),
(705, '2021-01-30 23:00:01', '103.129.97.229', '2021-01-30 23:00:01'),
(706, '2021-01-30 23:01:02', '103.129.97.229', '2021-01-30 23:01:02'),
(707, '2021-01-30 23:02:02', '103.129.97.229', '2021-01-30 23:02:02'),
(708, '2021-01-30 23:03:02', '103.129.97.229', '2021-01-30 23:03:02'),
(709, '2021-01-30 23:04:02', '103.129.97.229', '2021-01-30 23:04:02'),
(710, '2021-01-30 23:05:02', '103.129.97.229', '2021-01-30 23:05:02'),
(711, '2021-01-30 23:06:01', '103.129.97.229', '2021-01-30 23:06:01'),
(712, '2021-01-30 23:07:01', '103.129.97.229', '2021-01-30 23:07:01'),
(713, '2021-01-30 23:08:02', '103.129.97.229', '2021-01-30 23:08:02'),
(714, '2021-01-30 23:09:02', '103.129.97.229', '2021-01-30 23:09:02'),
(715, '2021-01-30 23:10:02', '103.129.97.229', '2021-01-30 23:10:02'),
(716, '2021-01-30 23:11:01', '103.129.97.229', '2021-01-30 23:11:01'),
(717, '2021-01-30 23:12:02', '103.129.97.229', '2021-01-30 23:12:02'),
(718, '2021-01-30 23:13:01', '103.129.97.229', '2021-01-30 23:13:01'),
(719, '2021-01-30 23:14:01', '103.129.97.229', '2021-01-30 23:14:01'),
(720, '2021-01-30 23:15:02', '103.129.97.229', '2021-01-30 23:15:02'),
(721, '2021-01-30 23:16:02', '103.129.97.229', '2021-01-30 23:16:02'),
(722, '2021-01-30 23:17:02', '103.129.97.229', '2021-01-30 23:17:02'),
(723, '2021-01-30 23:18:01', '103.129.97.229', '2021-01-30 23:18:01'),
(724, '2021-01-30 23:19:02', '103.129.97.229', '2021-01-30 23:19:02'),
(725, '2021-01-30 23:20:01', '103.129.97.229', '2021-01-30 23:20:01');
INSERT INTO `_crone_job` (`id`, `date`, `ip`, `creation_date`) VALUES
(726, '2021-01-30 23:21:01', '103.129.97.229', '2021-01-30 23:21:01'),
(727, '2021-01-30 23:22:02', '103.129.97.229', '2021-01-30 23:22:02'),
(728, '2021-01-30 23:23:01', '103.129.97.229', '2021-01-30 23:23:01'),
(729, '2021-01-30 23:24:01', '103.129.97.229', '2021-01-30 23:24:01'),
(730, '2021-01-30 23:25:01', '103.129.97.229', '2021-01-30 23:25:01'),
(731, '2021-01-30 23:26:01', '103.129.97.229', '2021-01-30 23:26:01'),
(732, '2021-01-30 23:27:01', '103.129.97.229', '2021-01-30 23:27:01'),
(733, '2021-01-30 23:28:02', '103.129.97.229', '2021-01-30 23:28:02'),
(734, '2021-01-30 23:29:01', '103.129.97.229', '2021-01-30 23:29:01'),
(735, '2021-01-30 23:30:02', '103.129.97.229', '2021-01-30 23:30:02'),
(736, '2021-01-30 23:31:01', '103.129.97.229', '2021-01-30 23:31:01'),
(737, '2021-01-30 23:32:01', '103.129.97.229', '2021-01-30 23:32:01'),
(738, '2021-01-30 23:33:02', '103.129.97.229', '2021-01-30 23:33:02'),
(739, '2021-01-30 23:34:02', '103.129.97.229', '2021-01-30 23:34:02'),
(740, '2021-01-30 23:35:02', '103.129.97.229', '2021-01-30 23:35:02'),
(741, '2021-01-30 23:36:01', '103.129.97.229', '2021-01-30 23:36:01'),
(742, '2021-01-30 23:37:02', '103.129.97.229', '2021-01-30 23:37:02'),
(743, '2021-01-30 23:38:01', '103.129.97.229', '2021-01-30 23:38:01'),
(744, '2021-01-30 23:39:01', '103.129.97.229', '2021-01-30 23:39:01'),
(745, '2021-01-30 23:40:02', '103.129.97.229', '2021-01-30 23:40:02'),
(746, '2021-01-30 23:41:01', '103.129.97.229', '2021-01-30 23:41:01'),
(747, '2021-01-30 23:42:02', '103.129.97.229', '2021-01-30 23:42:02'),
(748, '2021-01-30 23:43:01', '103.129.97.229', '2021-01-30 23:43:01'),
(749, '2021-01-30 23:44:02', '103.129.97.229', '2021-01-30 23:44:02'),
(750, '2021-01-30 23:45:01', '103.129.97.229', '2021-01-30 23:45:01'),
(751, '2021-01-30 23:46:02', '103.129.97.229', '2021-01-30 23:46:02'),
(752, '2021-01-30 23:47:01', '103.129.97.229', '2021-01-30 23:47:01'),
(753, '2021-01-30 23:48:01', '103.129.97.229', '2021-01-30 23:48:01'),
(754, '2021-01-30 23:49:02', '103.129.97.229', '2021-01-30 23:49:02'),
(755, '2021-01-30 23:50:01', '103.129.97.229', '2021-01-30 23:50:01'),
(756, '2021-01-30 23:51:01', '103.129.97.229', '2021-01-30 23:51:01'),
(757, '2021-01-30 23:52:02', '103.129.97.229', '2021-01-30 23:52:02'),
(758, '2021-01-30 23:53:01', '103.129.97.229', '2021-01-30 23:53:01'),
(759, '2021-01-30 23:54:01', '103.129.97.229', '2021-01-30 23:54:01'),
(760, '2021-01-30 23:55:02', '103.129.97.229', '2021-01-30 23:55:02'),
(761, '2021-01-30 23:56:02', '103.129.97.229', '2021-01-30 23:56:02'),
(762, '2021-01-30 23:57:02', '103.129.97.229', '2021-01-30 23:57:02'),
(763, '2021-01-30 23:58:01', '103.129.97.229', '2021-01-30 23:58:01'),
(764, '2021-01-30 23:59:02', '103.129.97.229', '2021-01-30 23:59:02'),
(765, '2021-01-31 00:00:02', '103.129.97.229', '2021-01-31 00:00:02'),
(766, '2021-01-31 00:01:02', '103.129.97.229', '2021-01-31 00:01:02'),
(767, '2021-01-31 00:02:02', '103.129.97.229', '2021-01-31 00:02:02'),
(768, '2021-01-31 00:03:02', '103.129.97.229', '2021-01-31 00:03:02'),
(769, '2021-01-31 00:04:01', '103.129.97.229', '2021-01-31 00:04:01'),
(770, '2021-01-31 00:05:01', '103.129.97.229', '2021-01-31 00:05:01'),
(771, '2021-01-31 00:06:02', '103.129.97.229', '2021-01-31 00:06:02'),
(772, '2021-01-31 00:07:01', '103.129.97.229', '2021-01-31 00:07:01'),
(773, '2021-01-31 00:08:01', '103.129.97.229', '2021-01-31 00:08:01'),
(774, '2021-01-31 00:09:02', '103.129.97.229', '2021-01-31 00:09:02'),
(775, '2021-01-31 00:10:01', '103.129.97.229', '2021-01-31 00:10:01'),
(776, '2021-01-31 00:11:03', '103.129.97.229', '2021-01-31 00:11:03'),
(777, '2021-01-31 00:12:02', '103.129.97.229', '2021-01-31 00:12:02'),
(778, '2021-01-31 00:13:02', '103.129.97.229', '2021-01-31 00:13:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_otp_validator`
--
ALTER TABLE `admin_otp_validator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryboy_forgot_otp_validator`
--
ALTER TABLE `deliveryboy_forgot_otp_validator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fail_payment_order_history`
--
ALTER TABLE `fail_payment_order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_order_data`
--
ALTER TABLE `manage_order_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_refund`
--
ALTER TABLE `order_refund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_validator`
--
ALTER TABLE `otp_validator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_order_history`
--
ALTER TABLE `payment_order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_otp_validator`
--
ALTER TABLE `payment_otp_validator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paytm_payout_history`
--
ALTER TABLE `paytm_payout_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopagent_forgot_otp_validator`
--
ALTER TABLE `shopagent_forgot_otp_validator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopkeeper`
--
ALTER TABLE `shopkeeper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopkeeper_account`
--
ALTER TABLE `shopkeeper_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopkeeper_forgot_otp_validator`
--
ALTER TABLE `shopkeeper_forgot_otp_validator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_agent`
--
ALTER TABLE `shop_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_agent_account`
--
ALTER TABLE `shop_agent_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_agent_otp_validator`
--
ALTER TABLE `shop_agent_otp_validator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_comment`
--
ALTER TABLE `user_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_crone_job`
--
ALTER TABLE `_crone_job`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_otp_validator`
--
ALTER TABLE `admin_otp_validator`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `deliveryboy_forgot_otp_validator`
--
ALTER TABLE `deliveryboy_forgot_otp_validator`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fail_payment_order_history`
--
ALTER TABLE `fail_payment_order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `manage_order_data`
--
ALTER TABLE `manage_order_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_refund`
--
ALTER TABLE `order_refund`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `otp_validator`
--
ALTER TABLE `otp_validator`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_order_history`
--
ALTER TABLE `payment_order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment_otp_validator`
--
ALTER TABLE `payment_otp_validator`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `paytm_payout_history`
--
ALTER TABLE `paytm_payout_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `shopagent_forgot_otp_validator`
--
ALTER TABLE `shopagent_forgot_otp_validator`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shopkeeper`
--
ALTER TABLE `shopkeeper`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shopkeeper_account`
--
ALTER TABLE `shopkeeper_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `shopkeeper_forgot_otp_validator`
--
ALTER TABLE `shopkeeper_forgot_otp_validator`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop_agent`
--
ALTER TABLE `shop_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shop_agent_account`
--
ALTER TABLE `shop_agent_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_agent_otp_validator`
--
ALTER TABLE `shop_agent_otp_validator`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=732;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `_crone_job`
--
ALTER TABLE `_crone_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=779;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
