-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 08:08 PM
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
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', NULL);

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
('create-company', 1, 'allows user to create a company', NULL, NULL, NULL, NULL);

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
(1, 1, 'Main Branch', 'some branch address', '2023-10-07 02:10:48', 'active'),
(2, 2, 'Town Branch', 'Nearby', '2023-10-07 02:10:15', 'active'),
(3, 2, 'Wagithomo', 'Westside', '2023-10-07 03:10:50', 'inactive'),
(4, 1, 'Main Branch', 'some branch address', '2023-10-08 00:00:00', 'active'),
(5, 3, 'UON Branch', 'Mamlak', '2023-10-07 00:00:00', 'active'),
(6, 3, 'UON Branch', 'Kumbaya', '2023-10-09 00:00:00', 'active'),
(7, 3, 'Kitui', 'Far away', '2023-10-25 00:00:00', 'active'),
(8, 2, 'Kanye West Branch', 'Around', '2024-01-17 00:00:00', 'active'),
(9, 5, 'Wstside', 'Home', '2024-02-21 00:00:00', 'active');

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
(1, 'ABC', 'abc@gmail.com', 'some address', 'uploads/ABC.jpg', '2023-10-04', '2023-10-11', 'active'),
(2, 'BCA', 'bca@hmail.com', 'very very far', '', '2024-05-15', '2023-10-07', 'inactive'),
(3, 'No Cmpany', 'odhisjoseph85@gmail.com', 'Mamlaka', '', '2023-05-02', '2023-10-23', 'active'),
(4, 'Jay Rock', 'rock@gmail.com', 'Block LLC', '', '2023-08-16', '2023-07-18', 'active'),
(5, 'Ibtihaj', 'ib@email.com', 'tihaj LLC', '', '0000-00-00', '2023-10-24', 'active'),
(6, 'Qing', 'madi@email.com', 'Nigeria', '', '0000-00-00', '2023-07-18', 'inactive'),
(7, 'Waitha', 'ithaa@gmail.com', 'Laka', '', '0000-00-00', '2023-08-23', 'inactive'),
(8, 'Side', 'dise@gmail.com', 'Milmani', '', '0000-00-00', '2023-12-20', 'active'),
(9, 'walid', 'lid@rmail.com', 'booking', '', '0000-00-00', '2023-12-19', 'inactive'),
(10, 'No Cmpany', 'odhisjoseph85@gmail.com', 'Mamlaka', '', '0000-00-00', '2023-07-20', 'active'),
(11, 'Njaka', 'nj@fmail.com', 'shit ', '', '0000-00-00', '2023-05-23', 'active'),
(12, 'No Cmpany', 'millions85@gmail.com', 'Buru', '', '0000-00-00', '2024-03-19', 'active'),
(13, 'Kanye', 'west@gmail.com', 'Rocking', '', '2023-10-20', '2023-10-24', 'inactive'),
(14, 'wallahi', 'thanks@email.com', 'nearby', '', '2023-10-12', '2023-10-18', 'inactive'),
(15, 'kwanza', 'ghost@gmail.com', 'Mamlaka', '', '2023-10-18', '0000-00-00', 'active'),
(21, 'No Cmpany2', 'odhisjoseph85@gmail.com', 'Mamlaka', '', '0000-00-00', '2023-10-20', 'active'),
(22, 'No Cmpany2', 'odhisjoseph85@gmail.com', 'Mamlaka', '', '0000-00-00', '2023-10-31', 'active'),
(23, 'No Cmpany2', 'odhisjoseph85@gmail.com', 'Mamlaka', '', '0000-00-00', '2023-10-31', 'active'),
(24, 'wlakssk', 'W@email.com', 'lid', '', '0000-00-00', '2023-10-30', 'active'),
(26, 'Lion King', 'king@gmail.com', 'Simba', 'uploads/Lion King.jpg', '0000-00-00', '2023-10-11', 'active'),
(27, 'Niqqa prods', 'odhisjoseph85@gmail.com', 'Mamlaka', 'uploads/Niqqa prods.jpg', '0000-00-00', '2023-10-11', 'inactive');

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

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `branches_branch_id`, `department_name`, `companies_company_id`, `department_created_date`, `department_status`) VALUES
(1, 2, 'I.T Department', 1, '1997-12-13 00:00:00', 'active'),
(2, 4, 'Eating Department', 2, '2023-10-09 00:00:00', 'active'),
(3, 3, 'Business Department', 1, '0000-00-00 00:00:00', 'inactive');

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
(2, 'Walid', 'Diwali', 'khalid', 'lhyCuSNHgVoslBWecxDftXIKZd6ahBq5', '$2y$13$xdReRsT.ygYed1Mr/BS8juw7WpGnEdctMe/SY8UDys1hrwIweDghG', NULL, 'walid@email.com', 10, 1696854173, 1696854187, 'yFv_yzyvAJ92G_bv3RMoLY8NWcqV4xFp_1696854173');

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `branches_branch_id` (`branches_branch_id`,`companies_company_id`),
  ADD KEY `companies_company_id` (`companies_company_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

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
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
