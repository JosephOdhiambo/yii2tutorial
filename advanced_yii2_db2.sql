-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 04:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanced_yii2_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `comment_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `comment_name`) VALUES
(1, 'first comment title'),
(2, 'second comment title');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Joseph', 'Odhiambo', 'Wahalla', 'jFt2BuY644QaWhy_OChGI1x6DZK4c6yl', '$2y$13$cPC5r3m307kBg/wd4tofjurkxwKVM6Urk3yrcFBCJGdgzbo8CM8A2', NULL, 'odhisjoseph85@gmail.com', 10, 1696852123, 1696852139, 'q6iudtmA9JAE791NYNTpuKpJpeg8UaBM_1696852123'),
(2, 'Walid', 'Diwali', 'khalid', 'lhyCuSNHgVoslBWecxDftXIKZd6ahBq5', '$2y$13$xdReRsT.ygYed1Mr/BS8juw7WpGnEdctMe/SY8UDys1hrwIweDghG', NULL, 'walid@email.com', 10, 1696854173, 1696854187, 'yFv_yzyvAJ92G_bv3RMoLY8NWcqV4xFp_1696854173'),
(3, 'somename', 'othername', 'sam', 'YKVKdh37CEtFXDpBCIIiXeZMwfx7CYB8', '$2y$13$kFdtMgBV2UZh5uJZwmbc4OU0coIasqFHlpq1jWBqJsbNqAIfvKqmK', NULL, 'test@gmail.com', 9, 1697183956, 1697183956, 'fusstDGoTj2WkMgpn9reNqt0oZPGw2ch_1697183956'),
(4, 'scar', 'wakadinali', 'scarde', 'baTcVxoI5lAHC-ThlCNz-1xxVI2UGXCZ', '$2y$13$u9VhlCpDsLUEYJwc/IdPq.0y2qII03YA9OzxScYo5FCc1eF3F5Mt.', NULL, 'sm@gmail.com', 9, 1697184135, 1697184135, 'XkaCKaGp5jIdjVH_souH8Oze_Uogz7OF_1697184135'),
(5, 'laden', 'bin', 'ladenbin', 'gMEezy_Ofzvb02DnScNyWEhM99sGL7be', '$2y$13$uQKvUf8PST29lzN754fZo.IbJkeYUZm5pI9DIpEIf3KDDgTUhzZ/W', NULL, 'ladenbin@gmail.com', 9, 1697184347, 1697184347, 'K70OjvOISIeRV7GspL_psCg2gM4eambb_1697184347'),
(6, 'bin', 'khalid', 'khalidbin', 'ZXzssQ-RnXznpFmGWMUYfbKep8ciRPE_', '$2y$13$8rrq4P7V7LhKnp2M2Mn.HOFGjN/PK1NlmopmaZpxMKrpEXcqg5OjW', NULL, 'khalidbin@gmail.com', 9, 1697184381, 1697184381, '131yTMcJbl2wHY69mukPKFhRMcefb0bH_1697184381'),
(7, 'swe', 'owi', 'swe', 'Cn4j8XDzG48eBbpRJUbs6p3KsL_rYiSH', '$2y$13$C9YNubVHqij6Zt9vWW.jTujBZN0lOb/QiSaJAW9W/Ak1zSzYSILVK', NULL, 'swe@gmail.com', 9, 1697185199, 1697185199, NULL),
(8, 'gii', 'tool', 'giitool', 'Ol34ndotICIL9YIiJelOtnVtoeAViYDq', '$2y$13$deBzhRJ/WlmH1wHket21ou97llMhIAExE7BInz66QGe4uT7bharRO', NULL, 'gii@gmail.com', 9, 1697185297, 1697185297, NULL),
(9, 'nuh', 'lingah', 'nuglingah', 'yrjhaHLtsAXkdqymPlWPFzAOD4ab-tD6', '$2y$13$zELb5uOJba9DmXQRKR3ADOGMxon7HdqU6S52VcRRsu1ONb14BHr0i', NULL, 'lingah@gmail.com', 9, 1697185526, 1697185526, NULL),
(10, 'west', 'side', 'westdice', 'Rz-lhpnd4M63XEEutREwscgGVQbRUniJ', '$2y$13$.boqoXTD02T7KbnFv9iGmOrBymj54QzSKDZudlM/xWG1Jz725KhL6', NULL, 'cide@gmail.com', 9, 1697185650, 1697185650, NULL),
(11, 'wesley', 'snipes', 'wesleysnipes', 'AOoIAn8DHca8s2E7EV5koQlhUooiESMr', '$2y$13$k4DiempJfUBn1XD978.Bhu5a6ovf7vEK/QqgrxAvSbM8CqqnrpC..', NULL, 'snipes@gmail.com', 9, 1697185870, 1697185870, NULL),
(12, 'kulo', 'sa', 'kulosa', 'QSUt8ryEpl8vO76IH2plzzgVS6sUx_vy', '$2y$13$OWzvbKHiXNcjzDWfVusknO2c/m7GoqLBmI9eDnYSx.HEF9cEExTzG', NULL, 'kulosa@email.com', 10, 1697186041, 1697186058, 'JM_qxAsq_lUpKH6cikI6Qe58d0xWoOVX_1697186041'),
(13, 'magnum', 'pi', 'magnum', 'lISn0fLKUjfyIoZKbCniP-djbAzpp2k0', '$2y$13$F1E4Khokj1mLySg7Oz3HTeIt6sKNvCUJQTKN2Nybs7QJt1nb47zhi', NULL, 'magnum@gmail.com', 10, 1697186256, 1697186263, 'ZW41MD7p4htm3k5TNRE7hG3eLlEtUypX_1697186256'),
(14, 'wed', 'nesday', 'wednesday', 'acWI8oNrQj1n0TVQk9HVP6_TI7eWgGja', '$2y$13$.BGwsy4/STWvIAxJdXoeK.Op.RomTMj1Dh0IzUvNqmkycWQU9nFaK', NULL, 'wednesday@gmail.com', 10, 1697372439, 1697372478, '6TJo26OHpXycnybeePMgD2qWR1EP-Xyw_1697372439');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
