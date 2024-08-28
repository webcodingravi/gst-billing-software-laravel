-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 08:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gst-billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `gst_no` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `company_name`, `user_id`, `address`, `email`, `mobile_no`, `website`, `gst_no`, `bank_name`, `account_no`, `ifsc_code`, `created_at`, `updated_at`) VALUES
(1, 'RK desinger', 1, 'South-west delhi-110002', 'krish@gmail.com', '8076862834', 'www.rdesigner.epizy.com', '758744669845666', 'UCO BANK', '18000111220033', 'UCBA0001011', '2024-08-27 08:40:08', '2024-08-27 22:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `gst_bills`
--

CREATE TABLE `gst_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_id` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `item_description` text DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT 0,
  `cgst_rate` double NOT NULL DEFAULT 0,
  `sgst_rate` double NOT NULL DEFAULT 0,
  `igst_rate` double NOT NULL DEFAULT 0,
  `cgst_amount` double NOT NULL DEFAULT 0,
  `sgst_amount` double NOT NULL DEFAULT 0,
  `igst_amount` double NOT NULL DEFAULT 0,
  `tax_amount` double NOT NULL DEFAULT 0,
  `net_amount` double NOT NULL DEFAULT 0,
  `declaration` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gst_bills`
--

INSERT INTO `gst_bills` (`id`, `party_id`, `invoice_date`, `invoice_no`, `item_description`, `total_amount`, `cgst_rate`, `sgst_rate`, `igst_rate`, `cgst_amount`, `sgst_amount`, `igst_amount`, `tax_amount`, `net_amount`, `declaration`, `created_at`, `updated_at`) VALUES
(2, 1, '2024-08-26', '2', 'welcome 2nd invoice', 2000, 9, 9, 0, 180, 180, 0, 360, 2360, 'Thank!', '2024-08-25 06:43:45', '2024-08-26 05:44:55'),
(4, 1, '2024-08-27', '3', 'Product', 2500, 9, 9, 0, 225, 225, 0, 450, 2950, 'Thank You!', '2024-08-27 07:03:34', '2024-08-27 07:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_08_23_111038_create_parties_table', 1),
(4, '2024_08_23_111857_create_gst_bills_table', 1),
(5, '2024_08_23_113244_create_vendor_invoices_table', 1),
(6, '2024_08_26_134803_update_users_table', 2),
(7, '2024_08_27_132322_create_company_details_table', 3),
(8, '2024_08_27_143002_update_company_details_table', 4),
(9, '2024_08_28_032051_company_details', 5),
(10, '2024_08_28_035803_create_password_reset_tokens', 6);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_type` enum('vendor','client','employee') NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `branch_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `party_type`, `full_name`, `phone_no`, `address`, `account_holder_name`, `account_no`, `bank_name`, `ifsc_code`, `branch_address`, `created_at`, `updated_at`) VALUES
(1, 'client', 'Ravi kumar', '8076862834', 'Delhi south-west', 'Ravi kumar', '8451566887744122', 'PNB', 'PNB012578', 'Delhi', '2024-08-23 07:00:54', '2024-08-23 07:00:54'),
(2, 'vendor', 'Krish', '7256879845', 'Delhi', 'Master Krish', '45871265587454', 'PNB', 'punjab025478', 'Delhi', '2024-08-23 07:04:26', '2024-08-23 07:04:26'),
(4, 'client', 'karan', '4558487569', 'Delhi', 'karan', '8745962586413', 'sbi', 'sbi0298754', 'delhi', '2024-08-23 07:31:29', '2024-08-25 04:05:36'),
(5, 'vendor', 'Pooja', '9599939785', 'Delhi', 'Pooja', '875469313364', 'punb', 'punb4585', 'delhi', '2024-08-25 04:00:07', '2024-08-25 04:00:07'),
(6, 'vendor', 'krish', '587426368', 'Delhi', 'krish', '544122336', 'sbi', '52sreerer', NULL, NULL, NULL),
(7, 'vendor', 'Arjun', '845967851220', 'Delhi', 'Arjun', '4584126336688', 'pnb', 'pnb25489', NULL, NULL, NULL),
(8, 'vendor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delhi', NULL, NULL),
(9, 'vendor', 'karan', '5698745', 'delhi south west delhi', 'karan', '153248566', 'Sbi', NULL, 'delhi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `role` enum('admin','vendor','employee') DEFAULT 'admin',
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `role`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Krish Kumar', 'krish@gmail.com', '8076862834', NULL, '1724755407.jpeg', NULL, '$2y$12$rPK3M0IiugEjAgcLGj4np.eEGNNYluDfNP.7/alBxt6A.FW2qxUDy', NULL, '2024-08-26 08:48:42', '2024-08-27 05:38:28'),
(2, 'Ravi Kumar', 'rkconsultancy34@gmail.com', '8076862834', 'admin', '1724757086.png', NULL, '$2y$12$LzcPLI2h4uzk99BZCvW05eIh82E5TRD2SK8k/sRESnIxTbBVmTFNW', NULL, '2024-08-27 05:40:36', '2024-08-28 00:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_invoices`
--

CREATE TABLE `vendor_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_id` int(11) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT 0,
  `declaration` text DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `branch_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_invoices`
--

INSERT INTO `vendor_invoices` (`id`, `party_id`, `invoice_date`, `invoice_no`, `item_description`, `total_amount`, `declaration`, `account_holder_name`, `account_no`, `bank_name`, `ifsc_code`, `branch_address`, `created_at`, `updated_at`) VALUES
(1, 6, NULL, '05', NULL, 2000, NULL, 'krish', '544122336', 'sbi', '52sreerer', NULL, '2024-08-25 10:35:11', NULL),
(2, 7, '2024-08-26', '7', 'hello', 1500, NULL, 'Arjun', '4584126336688', 'pnb', 'pnb25489', NULL, '2024-08-25 11:01:48', NULL),
(3, 7, '2024-08-26', '7', 'hello', 1500, NULL, 'Arjun', '4584126336688', 'pnb', 'pnb25489', NULL, '2024-08-25 11:09:36', NULL),
(4, 9, '2024-08-25', '8', NULL, 2500, 'sfsfsf', 'karan', '153248566', 'Sbi', NULL, 'delhi', '2024-08-25 11:12:57', NULL),
(5, 9, '2024-08-25', '8', NULL, 2500, 'sfsfsf', 'karan', '153248566', 'Sbi', NULL, 'delhi', '2024-08-26 08:02:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `gst_bills`
--
ALTER TABLE `gst_bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gst_bills_invoice_no_unique` (`invoice_no`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_invoices`
--
ALTER TABLE `vendor_invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gst_bills`
--
ALTER TABLE `gst_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_invoices`
--
ALTER TABLE `vendor_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_details`
--
ALTER TABLE `company_details`
  ADD CONSTRAINT `company_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
