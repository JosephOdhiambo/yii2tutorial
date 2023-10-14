-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 04:37 PM
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
-- Database: `yii_advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 1, NULL),
('admin', 9, NULL),
('admin', 10, NULL),
('admin', 11, NULL),
('admin', 12, NULL),
('create-branch', 9, NULL),
('create-branch', 10, NULL),
('create-company', 11, NULL),
('create-company', 12, NULL),
('create-company', 13, NULL),
('updateOwnPost', 10, NULL),
('updateOwnPost', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin can create branches and create companies', NULL, NULL, NULL, NULL),
('create-branch', 1, 'allow a user to add a branch', NULL, NULL, NULL, NULL),
('create-company', 1, 'allows user to create a company', NULL, NULL, NULL, NULL),
('updateOwnPost', 1, 'allows user to update their own post', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create-branch'),
('admin', 'create-company');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `companies_company_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `branch_created_date` datetime NOT NULL,
  `branch_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `companies_company_id`, `branch_name`, `branch_address`, `branch_created_date`, `branch_status`) VALUES
(10, 28, 'Main Branch', 'some branch address', '2023-10-16 00:00:00', 'active'),
(11, 28, 'Town Branch', 'Westside', '2024-01-17 00:00:00', 'inactive'),
(12, 29, 'Wstside', 'Around', '2023-10-15 00:00:00', 'inactive'),
(13, 30, 'Kitui', 'Far away', '2023-10-31 00:00:00', 'active'),
(14, 29, 'Absa Bank', 'Hfmail', '2023-10-31 00:00:00', 'active'),
(15, 31, 'colombo', 'somehere in colombo', '0000-00-00 00:00:00', 'active'),
(16, 32, 'colombo', 'Anywhere', '0000-00-00 00:00:00', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `company_start_date` date NOT NULL,
  `company_created_date` date NOT NULL,
  `company_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_email`, `company_address`, `logo`, `company_start_date`, `company_created_date`, `company_status`) VALUES
(28, 'ABC', 'doingIT@email.com', 'Far', 'uploads/ABC.png', '0000-00-00', '2023-10-12', 'active'),
(29, 'DoingITEasy', 'doing@email.com', 'near', 'uploads/DoingITEasy.jpg', '0000-00-00', '2023-10-12', 'active'),
(30, 'DoingITEasyChannel', 'channel@gmail.com', 'ksdjcsd', 'uploads/DoingITEasyChannel.jpg', '0000-00-00', '2023-10-12', 'active'),
(31, 'ABCD', 'Aabc@email.com', 'some address', 'uploads/ABCD.png', '0000-00-00', '2023-10-13', 'active'),
(32, 'Jaguar Companies', 'jag@gmail.com', 'some address', '', '0000-00-00', '2023-10-13', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `branches_branch_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `companies_company_id` int(11) NOT NULL,
  `department_created_date` datetime NOT NULL,
  `department_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_email` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `attachment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `zip_code`, `city`, `province`) VALUES
(1, '1111', 'Colombo', 'Western'),
(2, '2222', 'Galle', 'Southern');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1696851998),
('m130524_201442_init', 1696852001),
('m190124_110200_add_verification_token_column_to_user_table', 1696852001);

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_no` varchar(10) NOT NULL,
  `description` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `po_no`, `description`) VALUES
(2, 'po-1', 'Very nice'),
(3, 'pos-9', 'company');

-- --------------------------------------------------------

--
-- Table structure for table `po_item`
--

CREATE TABLE `po_item` (
  `id` int(11) NOT NULL,
  `po_item_no` varchar(10) NOT NULL,
  `quantity` double NOT NULL,
  `po_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po_item`
--

INSERT INTO `po_item` (`id`, `po_item_no`, `quantity`, `po_id`) VALUES
(5, 'po-item-1', 15, 2),
(6, 'po-item2', 20, 2),
(7, 'po-item-9', 90, 3),
(8, 'pos-10', 150, 3);

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
(13, 'magnum', 'pi', 'magnum', 'lISn0fLKUjfyIoZKbCniP-djbAzpp2k0', '$2y$13$F1E4Khokj1mLySg7Oz3HTeIt6sKNvCUJQTKN2Nybs7QJt1nb47zhi', NULL, 'magnum@gmail.com', 10, 1697186256, 1697186263, 'ZW41MD7p4htm3k5TNRE7hG3eLlEtUypX_1697186256');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `companies_company_id` (`companies_company_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `branches_branch_id` (`branches_branch_id`,`companies_company_id`),
  ADD KEY `companies_company_id` (`companies_company_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_item`
--
ALTER TABLE `po_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_id` (`po_id`);

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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `po_item`
--
ALTER TABLE `po_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`companies_company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`companies_company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `departments_ibfk_2` FOREIGN KEY (`branches_branch_id`) REFERENCES `branches` (`branch_id`);

--
-- Constraints for table `po_item`
--
ALTER TABLE `po_item`
  ADD CONSTRAINT `po_item_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `po` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
