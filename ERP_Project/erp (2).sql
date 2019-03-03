-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 08:37 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `created_at`, `updated_at`) VALUES
(1, 'HR', '2019-02-05 18:00:00', '2019-02-05 18:00:00'),
(2, 'CRM', '2019-02-05 18:00:00', '2019-02-05 18:00:00'),
(3, 'ACCOUNTS', '2019-02-05 18:00:00', '2019-02-05 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `deg_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `deg_name`, `dept_id`, `created_at`, `updated_at`) VALUES
(1, 'entry level', 1, '2019-02-05 18:00:00', '2019-02-05 18:00:00'),
(2, 'mid level', 1, '2019-02-05 18:00:00', '2019-02-05 18:00:00'),
(3, 'pro level', 1, '2019-02-05 18:00:00', '2019-02-05 18:00:00'),
(4, 'entry level', 2, '2019-02-05 18:00:00', '2019-02-05 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_infos`
--

CREATE TABLE `employee_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_date_of_birth` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_phone_number` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_local_adds` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_per_adds` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_resume` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_joinLetter` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_contract` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_idProof` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_desg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_joinDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_joinSalary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_accName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_accNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_bankName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_bankBranch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_swiftCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_infos`
--

INSERT INTO `employee_infos` (`id`, `emp_fname`, `emp_lname`, `emp_father_name`, `emp_email`, `emp_date_of_birth`, `emp_gender`, `emp_phone_number`, `emp_image`, `emp_local_adds`, `emp_per_adds`, `emp_resume`, `emp_joinLetter`, `emp_contract`, `emp_idProof`, `emp_id`, `emp_dept`, `emp_desg`, `emp_joinDate`, `emp_joinSalary`, `emp_accName`, `emp_accNumber`, `emp_bankName`, `emp_bankBranch`, `emp_swiftCode`, `created_at`, `updated_at`) VALUES
(4, 'Syed Sajid', 'Mahboob', 'Mahboob', 'adsd@gmail.com', '2019-01-28', 'male', '45445454', 'employeImages/4117_33.png', 'serfdsg', 'sdfsdf', 'employeC_A4CV.M_N_Kakon.pdf', 'test', 'test', 'test', 'infobizinfobizinfobiz121349', '1', '2', '2019-02-28', '21545', 'Syed Sajid Mahboob', '57545', 'asdas', 'asdas', '454', '2019-02-17 04:00:52', '2019-02-26 04:20:43'),
(5, 'Saumik Santu', 'Barua', 'Barua', 'adsd@gmail.com', '2019-01-29', 'male', '545454', 'employeImages/5117_33.png', 'edrfsdfg', 'sadfsdfsd', 'employeResumes/5CV.M_N_Kakon.pdf', 'employejoinLetter/5CV.M_N_Kakon.pdf', 'employeC_A/5CV.M_N_Kakon.pdf', 'employeproof/5CV.M_N_Kakon.pdf', 'infobizinfobiz121347', '1', '3', '2019-02-26', '152454', 'Saumik Santu Barua', '12454', 'asdas', 'asdas', NULL, '2019-02-17 04:05:00', '2019-02-26 04:25:07'),
(7, 'Saidur', 'Rahman', 'something', 'adsd@gmail.com', '2019-01-28', 'male', '5465464', 'employeImages/7account-normal.png', 'dtywr', 'afrev', 'test', 'test', 'test', 'test', 'infobiz756786', '2', '4', '2019-02-28', '764563', 'Saidur  Rahman', '45654', 'refg', 'asdas', NULL, '2019-02-26 00:25:56', '2019-02-26 00:25:56'),
(8, 'Sajid', 'Mahboob', 'test', 'sajid@infobizsoft.com', '1993-03-16', 'male', '01624958454', 'employeImages/8sajid_resize.jpg', 'test', 'test', 'employeResumes/8CV.M_N_Kakon.pdf', 'employejoinLetter/8CV.M_N_Kakon.pdf', 'employeC_A/8CV.M_N_Kakon.pdf', 'employeproof/8CV.M_N_Kakon.pdf', 'infobiz1000', '1', '1', '2019-03-03', '15000', 'Sajid Mahboob', '10155512458', 'Dutch Bangla Bank', 'Shantinagar', NULL, '2019-02-27 04:25:07', '2019-02-27 04:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `emp_contracts`
--

CREATE TABLE `emp_contracts` (
  `id` int(10) UNSIGNED NOT NULL,
  `contracts_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacts_types` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deg_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_contracts`
--

INSERT INTO `emp_contracts` (`id`, `contracts_name`, `company_name`, `contacts_types`, `dept_name`, `deg_name`, `position`, `salary`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Syed Sajid Mahboob', 'InfobizSoft', 'mercedes', '2', '4', 'Software engineer', '15000', '2019-02-28', '2019-03-28', '2019-02-27 05:55:58', '2019-02-27 05:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `erp_previledges`
--

CREATE TABLE `erp_previledges` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_Id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `erp_previledges`
--

INSERT INTO `erp_previledges` (`id`, `user_email`, `access_Id`, `created_at`, `updated_at`) VALUES
(1, 'sajid@infobizsoft.com', 1, '2019-02-26 18:00:00', '2019-02-26 18:00:00'),
(2, 'sajid@infobizsoft.com', 2, '2019-02-26 18:00:00', '2019-02-26 18:00:00'),
(3, 'sajid@infobizsoft.com', 3, '2019-03-02 18:00:00', '2019-03-02 18:00:00'),
(4, 'sajid@infobizsoft.com', 5, '2019-03-02 18:00:00', '2019-03-02 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Annual Leave', '2019-02-20 03:39:28', '2019-02-20 03:39:28'),
(2, 'Sick Leave', '2019-02-20 03:39:55', '2019-02-20 03:39:55'),
(3, 'Maternity Leave', '2019-02-20 03:39:55', '2019-02-20 03:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `menuses`
--

CREATE TABLE `menuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` int(11) DEFAULT NULL,
  `subMenu` int(11) DEFAULT NULL,
  `subMenuView` int(11) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  `action` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menuses`
--

INSERT INTO `menuses` (`id`, `name`, `menu`, `subMenu`, `subMenuView`, `parentId`, `action`, `created_at`, `updated_at`) VALUES
(1, 'HRM', 1, NULL, NULL, NULL, 1, '2019-02-23 18:00:00', '2019-02-23 18:00:00'),
(2, 'CRM', 1, NULL, NULL, NULL, 1, '2019-02-23 18:00:00', '2019-02-23 18:00:00'),
(3, 'Employee Management', NULL, 1, NULL, 1, 1, '2019-02-23 18:00:00', '2019-02-23 18:00:00'),
(4, 'Leave Management', NULL, 1, NULL, 1, 1, '2019-02-23 18:00:00', '2019-02-23 18:00:00'),
(5, 'Employee list', NULL, NULL, 1, 3, 1, '2019-02-23 18:00:00', '2019-02-23 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_24_052616_create_main_menus_table', 2),
(4, '2019_01_29_052856_create_sub_departments_table', 3),
(5, '2019_02_04_051906_create_menus_table', 4),
(6, '2019_02_05_063152_create_erp_previledges_table', 5),
(7, '2019_02_05_103903_create_erp_previledges_table', 6),
(8, '2019_02_06_073253_create_departments_table', 7),
(9, '2019_02_06_073416_create_designations_table', 8),
(10, '2019_02_11_053932_create_employee_infos_table', 9),
(11, '2019_02_17_075618_employee_infos', 10),
(12, '2019_02_18_060704_create_main_menus_table', 11),
(13, '2019_02_18_061640_create_main_menus_table', 12),
(14, '2019_02_18_061820_create_sub_menu_names_table', 13),
(15, '2019_02_18_062137_create_sub_menu_lists_table', 14),
(16, '2019_02_20_053650_create_leave_types_table', 15),
(17, '2019_02_20_093221_create_leave_types_table', 16),
(18, '2019_02_24_092216_create_menuses_table', 17),
(19, '2019_02_27_113805_create_erp_previledges_table', 18),
(20, '2019_02_27_114720_create_emp_contracts_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sajid', 'sajid.mahboob16@gmail.com', NULL, '$2y$10$9DANC8ZGzGfMAzguDmIMxe/eOpzQnPWHrXoTkey5f6ThQZ8rtxXGy', 'zZ9Gl1gB8M0PleenF0U2HfYKmluZsV5MaWZAWrj4yU45mN4IbpYXyi3XN3gB', '2019-01-22 22:54:13', '2019-01-22 22:54:13'),
(2, 'upal', 'sajid@infobizsoft.com', NULL, '$2y$10$9VEYhVgrCPWIMHVbWWrC8uAqXWWD77JM2EeZW0Qk2OlEGoAfIyLzG', 'F5NDcWc7HSSkOmAKMWZrM5ZzwzWaLN6uO6Qt4K7q1r3CA0mzYvTPX2xXBhuN', '2019-01-23 03:30:00', '2019-01-23 03:30:00'),
(3, 'Raisul Islam', 'raisul@infobiz.com', NULL, '$2y$10$NCkvkNgHpe5mGvQfFbB.1Old3h1T2gWZaYhXwYleJwXROM/cZWOAi', 'YsYO1qNNmKwmJHzDzIBwgGpv3BDCceedwaI0MPQYGj8qmNUZVavx81jiFq4l', '2019-02-24 05:11:12', '2019-02-24 05:11:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_infos`
--
ALTER TABLE `employee_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_contracts`
--
ALTER TABLE `emp_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_previledges`
--
ALTER TABLE `erp_previledges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuses`
--
ALTER TABLE `menuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_infos`
--
ALTER TABLE `employee_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emp_contracts`
--
ALTER TABLE `emp_contracts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `erp_previledges`
--
ALTER TABLE `erp_previledges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menuses`
--
ALTER TABLE `menuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
