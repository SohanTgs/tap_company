-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2022 at 10:35 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkash`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Supper Admin', 'admin@site.com', 'admin', NULL, '5f950b85aad861603603333.jpg', '$2y$10$mNXFMxAiB8TLQfq.2KAqiOgPGmVyo8mSpOuzxDsRyAjnJa0WvRb8q', NULL, '2020-10-24 23:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@site.com', '197049', 1, '2020-06-17 03:50:15', NULL),
(2, 'admin@site.com', '732367', 1, '2020-06-17 03:52:12', NULL),
(3, 'admin@site.com', '277967', 1, '2020-06-17 03:53:12', NULL),
(4, 'admin@site.com', '983577', 1, '2020-06-17 03:53:21', NULL),
(5, 'admin@site.com', '409354', 1, '2020-06-17 03:53:51', NULL),
(6, 'admin@site.com', '451569', 1, '2020-06-17 03:54:11', NULL),
(7, 'admin@site.com', '773540', 1, '2020-06-17 03:54:24', NULL),
(8, 'admin@site.com', '822875', 1, '2020-06-17 04:05:04', NULL),
(9, 'admin@site.com', '606926', 1, '2020-06-17 04:05:19', NULL),
(10, 'admin@site.com', '811540', 1, '2020-07-08 03:28:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bonus_histories`
--

DROP TABLE IF EXISTS `bonus_histories`;
CREATE TABLE IF NOT EXISTS `bonus_histories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `currency_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_histories`
--

INSERT INTO `bonus_histories` (`id`, `user_id`, `amount`, `currency_code`, `bonus_type`, `created_at`, `updated_at`) VALUES
(216, 39, 10.00, 'BDT', 'regi_bonus', '2020-12-25 05:19:05', '2020-12-25 05:19:05'),
(217, 39, 0.50, 'BDT', 'instant_bonus', '2020-12-25 05:48:03', '2020-12-25 05:48:03'),
(218, 39, 20.00, 'BDT', 'ref_registration_bonus', '2020-12-25 06:35:36', '2020-12-25 06:35:36'),
(219, 40, 10.00, 'BDT', 'regi_bonus', '2020-12-25 06:35:36', '2020-12-25 06:35:36'),
(220, 39, 30.75, 'BDT', 'first_level_bonus', '2020-12-25 06:49:22', '2020-12-25 06:49:22'),
(221, 39, 20.00, 'BDT', 'ref_registration_bonus', '2020-12-25 06:55:50', '2020-12-25 06:55:50'),
(222, 41, 10.00, 'BDT', 'regi_bonus', '2020-12-25 06:55:50', '2020-12-25 06:55:50'),
(223, 39, 2.50, 'BDT', 'withdraw_bonus_first_level', '2020-12-25 07:02:31', '2020-12-25 07:02:31'),
(224, 39, 2.50, 'BDT', 'transaction_bonus_first_level', '2020-12-25 07:07:40', '2020-12-25 07:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `bonus_settings`
--

DROP TABLE IF EXISTS `bonus_settings`;
CREATE TABLE IF NOT EXISTS `bonus_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `regi_bonus` double(8,2) DEFAULT 0.00,
  `instant_bonus` double(8,2) DEFAULT 0.00,
  `ref_registration_bonus` double(8,2) DEFAULT 0.00,
  `withdraw_bonus` double(8,2) DEFAULT 0.00,
  `first_level_bonus` double(8,2) DEFAULT 0.00,
  `second_level_bonus` double(8,2) DEFAULT 0.00,
  `third_level_bonus` double(8,2) DEFAULT 0.00,
  `transaction_bonus` double(8,2) DEFAULT 0.00,
  `transaction_bonus_first_level` double(8,2) DEFAULT 0.00,
  `withdraw_bonus_first_level` double(8,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_settings`
--

INSERT INTO `bonus_settings` (`id`, `regi_bonus`, `instant_bonus`, `ref_registration_bonus`, `withdraw_bonus`, `first_level_bonus`, `second_level_bonus`, `third_level_bonus`, `transaction_bonus`, `transaction_bonus_first_level`, `withdraw_bonus_first_level`, `created_at`, `updated_at`) VALUES
(12, 10.00, 5.00, 20.00, NULL, NULL, NULL, NULL, 10.00, 5.00, 10.00, '2020-12-07 09:23:57', '2020-12-25 04:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

DROP TABLE IF EXISTS `currency_rates`;
CREATE TABLE IF NOT EXISTS `currency_rates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_rate` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_all_currency` tinyint(4) DEFAULT NULL,
  `currency_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_key` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `whole_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency_rate`, `use_all_currency`, `currency_codes`, `api_key`, `status`, `whole_url`, `created_at`, `updated_at`) VALUES
(33, '{\"date\":\"2020-12-24 00:09:00+00\",\"base\":\"USD\",\"rates\":{\"BDT\":\"84.808506\",\"USD\":\"1.0\",\"EUR\":\"0.819981\",\"BTC\":\"0.00004312830281934028\",\"GBP\":\"0.739536\",\"LTC\":\"0.009800558631842015\"}}', 0, '[\"BDT\",\"USD\",\"EUR\",\"BTC\",\"GBP\",\"LTC\"]', '5bc2a726c5734e849da4b80f9f42e7f0', 1, 'https://api.currencyfreaks.com/latest?apikey=5bc2a726c5734e849da4b80f9f42e7f0', '2020-12-25 05:27:39', '2020-12-25 05:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

DROP TABLE IF EXISTS `deposits`;
CREATE TABLE IF NOT EXISTS `deposits` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_code` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `method_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `final_amo` decimal(18,8) DEFAULT 0.00000000,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel',
  `admin_feedback` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `method_code`, `amount`, `method_currency`, `charge`, `rate`, `final_amo`, `detail`, `btc_amo`, `btc_wallet`, `trx`, `try`, `status`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(69, 39, 103, '1000.00000000', 'USD', '105.00000000', '0.01179066', '13.02867930', NULL, '0', '', 'XMV5ET644R82', 0, 1, NULL, '2020-12-25 06:25:29', '2020-12-25 06:27:10'),
(70, 39, 103, '1000.00000000', 'USD', '105.00000000', '0.01179066', '13.02867930', NULL, '0', '', 'ENQMFOH6ZD9T', 0, 1, NULL, '2020-12-25 06:32:53', '2020-12-25 06:32:53'),
(71, 40, 103, '2000.00000000', 'USD', '205.00000000', '0.01179066', '25.99840530', NULL, '0', '', 'HUSNU61TKTRX', 0, 1, NULL, '2020-12-25 06:48:41', '2020-12-25 06:49:22'),
(72, 39, 103, '1000.00000000', 'USD', '105.00000000', '0.01179127', '13.02935335', NULL, '0', '', 'DQMOXV3JORQK', 0, 1, NULL, '2020-12-25 08:05:52', '2020-12-25 08:06:08'),
(73, 39, 103, '2000.00000000', 'USD', '100.00000000', '10.00000000', '2000.00000000', 'sadfsadfsdf', NULL, NULL, NULL, 0, 1, NULL, '2020-11-25 15:08:00', NULL),
(74, 39, 103, '100.00000000', 'USD', '100.00000000', '10.00000000', '100.00000000', 'sadf', NULL, NULL, NULL, 0, 1, NULL, '2020-11-02 18:00:00', NULL),
(75, 39, 185, '20.00000000', 'USD', '1.20000000', '1.00000000', '21.20000000', NULL, '0', '', 'YQK21GXW9WPH', 0, 0, NULL, '2022-04-03 11:24:40', '2022-04-03 11:24:40'),
(76, 39, 185, '20.00000000', 'USD', '1.20000000', '1.00000000', '21.20000000', NULL, '0', '', 'HG5NQRM69GBH', 0, 0, NULL, '2022-04-03 12:09:15', '2022-04-03 12:09:15'),
(77, 39, 185, '20.00000000', 'USD', '1.20000000', '1.00000000', '21.20000000', NULL, '0', '', 'BUUK9DYX9C9N', 0, 0, NULL, '2022-04-03 13:04:17', '2022-04-03 13:04:17'),
(78, 39, 185, '20.00000000', 'USD', '1.20000000', '1.00000000', '21.20000000', NULL, '0', '', '2YMXQUTVUN8V', 0, 0, NULL, '2022-04-04 03:28:57', '2022-04-04 03:28:57'),
(79, 39, 185, '20.00000000', 'USD', '1.20000000', '1.00000000', '21.20000000', NULL, '0', '', 'JNQZMQ81C3NA', 0, 0, NULL, '2022-04-04 03:39:36', '2022-04-04 03:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_level_trees`
--

DROP TABLE IF EXISTS `deposit_level_trees`;
CREATE TABLE IF NOT EXISTS `deposit_level_trees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_order` int(11) NOT NULL,
  `percent` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposit_level_trees`
--

INSERT INTO `deposit_level_trees` (`id`, `title`, `level_order`, `percent`, `status`, `created_at`, `updated_at`) VALUES
(11, 'first_level_bonus', 1, 15.00, 1, '2020-12-25 04:59:45', '2020-12-25 04:59:45'),
(12, 'second_level_bonus', 2, 10.00, 1, '2020-12-25 04:59:54', '2020-12-25 04:59:54'),
(13, 'third_level_bonus', 3, 5.00, 1, '2020-12-25 05:00:02', '2020-12-25 05:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

DROP TABLE IF EXISTS `email_sms_templates`;
CREATE TABLE IF NOT EXISTS `email_sms_templates` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcodes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT 1,
  `sms_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-07-07 05:44:08'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-07 10:23:47'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For join with us. <br></div><div>Please use below code to verify your email address. <br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', 'Your email verification code is: {{code}}', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-07 10:26:22'),
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 1, '2019-09-24 23:04:05', '2020-03-08 01:28:52'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Your verification code is: {{code}}', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:42:59'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Google two factor verification is disabled', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:43:46'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Reply Support Ticket', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><b><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong><br></strong></span></b></p><p><b>[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</b></p><p>----------------------------------------------</p><p>Here is the reply : <br></p><p> {{reply}}<br></p></div><div><br></div>', '{{subject}}\r\n\r\n{{reply}}\r\n\r\n\r\nClick here to reply:  {{link}}', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"reply\":\"Reply from Staff/Admin\",\"link\":\"Ticket URL For relpy\"}', 1, 1, '2020-06-08 18:00:00', '2020-05-04 02:24:40'),
(206, 'DEPOSIT_COMPLETE', 'Automated Deposit - Successful', 'Deposit Completed Successfully', '<div>Your deposit of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#000000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} Deposit successfully by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-24 18:00:00', '2020-07-07 06:39:22'),
(207, 'DEPOSIT_REQUEST', 'Manual Deposit - User Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2020-05-31 18:00:00', '2020-06-01 18:00:00'),
(208, 'DEPOSIT_APPROVE', 'Manual Deposit - Admin Approved', 'Your Deposit is Approved', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} transaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-16 18:00:00', '2020-06-14 18:00:00'),
(209, 'DEPOSIT_REJECT', 'Manual Deposit - Admin Rejected', 'Your Deposit Request is Rejected', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} has been rejected</b>.<b><br></b></div><br><div>Transaction Number was : {{trx}}</div><div><br></div><div>if you have any query, feel free to contact us.<br></div><br><div><br><br></div>\r\n\r\n\r\n\r\n{{rejection_message}}', 'Admin Rejected Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"rejection_message\":\"Rejection message\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(210, 'WITHDRAW_REQUEST', 'Withdraw  - User Requested', 'Withdraw Request Submitted Successfully', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been submitted Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"4\" color=\"#FF0000\"><b><br></b></font></div><div><font size=\"4\" color=\"#FF0000\"><b>This may take {{delay}} to process the payment.</b></font><br></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br><br></div>', '{{amount}} {{currency}} withdraw requested by {{withdraw_method}}. You will get {{method_amount}} {{method_currency}} in {{duration}}. Trx: {{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"delay\":\"Delay time for processing\"}', 1, 1, '2020-06-07 18:00:00', '2020-06-14 18:00:00'),
(211, 'WITHDRAW_REJECT', 'Withdraw - Admin Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Rejected.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You should get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div><div>----</div><div><font size=\"3\"><br></font></div><div><font size=\"3\"> {{amount}} {{currency}} has been <b>refunded </b>to your account and your current Balance is <b>{{post_balance}}</b><b> {{currency}}</b></font></div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Rejection :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br><br></div>', 'Admin Rejected Your {{amount}} {{currency}} withdraw request. Your Main Balance {{main_balance}}  {{method}} , Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(212, 'WITHDRAW_APPROVE', 'Withdraw - Admin  Approved', 'Withdraw Request has been Processed and your money is sent', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Processed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Processed Payment :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br></div>', 'Admin Approve Your {{amount}} {{currency}} withdraw request by {{method}}. Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2020-06-10 18:00:00', '2020-06-06 18:00:00'),
(215, 'BAL_ADD', 'Balance Add by Admin', 'Your Account has been Credited', '<div>{{amount}} {{currency}} has been added to your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} credited in your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2019-11-10 09:07:12'),
(216, 'BAL_SUB', 'Balance Subtracted by Admin', 'Your Account has been Debited', '<div>{{amount}} {{currency}} has been subtracted from your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} debited from your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2019-11-10 09:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

DROP TABLE IF EXISTS `frontends`;
CREATE TABLE IF NOT EXISTS `frontends` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_keys` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"admin\",\"blog\",\"aaaa\",\"sadfsadf\",\"sadfsdaf\",\"sadfsadfasdf\",\"sadfsdf\",\"sohan\"],\"description\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"social_title\":\"Viserlab Limited\",\"social_description\":\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\",\"image\":\"5fa397a629bee1604556710.jpg\"}', '2020-07-04 23:42:52', '2020-12-24 03:27:33'),
(24, 'about.content', '{\"has_image\":\"1\",\"first_heading\":\"OUR STORY\",\"second_heading\":\"We Make Your\",\"fitst_title\":\"One of the best investing marketing tools is High yield investment program.\",\"second_title\":\"Invest To Grow A Your Money !\",\"first_description\":\"Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet, we clear consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore consectetur adipiscing elit, sed do eiusmod tempor out incididunt ut labore et dolore magna aliqua. Amet facilisis magna etiam tempor orci.\",\"second_description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it hasfact that a reader will be distracted by the readable content of a page when do is nitin we done your project with new assignmentg\\r\\nLorem Ipsum is that it hasfact that a reader will be distracted by the readable content of a page when do is nitin we done your project\",\"image_one\":\"5fd2ed3daa24d1607658813.jpg\",\"image_two\":\"5fd2ed3dbb2e61607658813.png\"}', '2020-10-28 00:51:20', '2020-12-11 11:53:33'),
(27, 'contact_us.content', '{\"title\":\"Auctor gravida vestibulu\",\"short_details\":\"55f55\",\"email_address\":\"5555f\",\"contact_details\":\"5555h\",\"contact_number\":\"5555a\",\"latitude\":\"5555h\",\"longitude\":\"5555s\",\"website_footer\":\"5555qqq\"}', '2020-10-28 00:59:19', '2020-11-01 04:51:54'),
(28, 'counter.content', '{\"heading\":\"Latest News\",\"sub_heading\":\"Register New Account\"}', '2020-10-28 01:04:02', '2020-10-28 01:04:02'),
(29, 'counter.element', '{\"title\":\"Jannat Episode 1\",\"counter_digit\":\"350\",\"sub_title\":\"Magnam, nisi nulla mollitia sos officia sit nisi atque.\",\"counter_icon\":\"<i class=\\\"far fa-hospital\\\"><\\/i>\"}', '2020-10-28 01:05:16', '2020-10-28 01:05:16'),
(31, 'banner_one.content', '{\"has_image\":\"1\",\"hilight_one\":\"Often Have Small\",\"heading_one\":\"Invest Your Money For Future\",\"title_one\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Ut enim ad minim veniam Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute an irure dolor in voluptate velit.\",\"button_one_text\":\"Start Now\",\"button_one_link\":\"#\",\"hilight_two\":\"Often Have Small\",\"heading_two\":\"Invest Your Money For Future\",\"title_two\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Ut enim ad minim veniam Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute an irure dolor in voluptate velit.\",\"button_two_text\":\"Latest\",\"button_two_link\":\"#\",\"background_image\":\"5fd2776c787f51607628652.png\"}', '2020-12-11 03:30:10', '2020-12-11 03:40:25'),
(32, 'banner_one.element', '{\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"social_link\":\"#\"}', '2020-12-11 03:42:14', '2020-12-11 03:42:14'),
(33, 'banner_one.element', '{\"social_icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"social_link\":\"#\"}', '2020-12-11 03:42:33', '2020-12-11 03:42:33'),
(34, 'banner_one.element', '{\"social_icon\":\"<i class=\\\"fab fa-linkedin-in\\\"><\\/i>\",\"social_link\":\"#\"}', '2020-12-11 03:42:49', '2020-12-11 03:42:49'),
(35, 'banner_one.element', '{\"social_icon\":\"<i class=\\\"fab fa-google-plus-g\\\"><\\/i>\",\"social_link\":\"#\"}', '2020-12-11 03:43:08', '2020-12-11 03:43:08'),
(36, 'banner_two.content', '{\"has_image\":\"1\",\"title\":\"WHO WE ARE\",\"heading\":\"WHO WE ARE Welcome To SaveHyip\",\"paragraph\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Ut enim ad an minim veniam Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis auteirure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\",\"button_text\":\"Get More\",\"button_link\":\"#\",\"image\":\"5fd2806899c9c1607630952.png\"}', '2020-12-11 04:09:12', '2020-12-11 04:25:02'),
(38, 'banner_two.element', '{\"text\":\"We Innovate\"}', '2020-12-11 04:22:53', '2020-12-11 04:22:53'),
(39, 'banner_two.element', '{\"text\":\"Licenced &amp; Certified\"}', '2020-12-11 04:23:04', '2020-12-11 04:23:04'),
(40, 'banner_two.element', '{\"text\":\"Saving &amp; Investments\"}', '2020-12-11 04:23:08', '2020-12-11 04:23:08'),
(45, 'features.content', '{\"heading\":\"OUR PLANS\",\"title\":\"Our Features Plans\"}', '2020-12-11 04:54:25', '2020-12-11 12:00:34'),
(46, 'features.element', '{\"feature_name\":\"Deposit\",\"icon\":\"<i class=\\\"fas fa-address-book\\\"><\\/i>\",\"paragraph\":\"A praesent a feugiat id sit rilus velit fusce morbi dolorum.\"}', '2020-12-11 04:57:06', '2020-12-11 04:57:06'),
(47, 'features.element', '{\"feature_name\":\"Withdraw\",\"icon\":\"<i class=\\\"fas fa-book\\\"><\\/i>\",\"paragraph\":\"A praesent a feugiat id sit rilus velit fusce morbi dolorum.\"}', '2020-12-11 04:57:50', '2020-12-11 04:57:50'),
(48, 'features.element', '{\"feature_name\":\"Transfer Balance\",\"icon\":\"<i class=\\\"fas fa-money-bill-wave\\\"><\\/i>\",\"paragraph\":\"A praesent a feugiat id sit rilus velit fusce morbi dolorum.\"}', '2020-12-11 04:58:14', '2020-12-11 04:58:14'),
(49, 'features.element', '{\"feature_name\":\"Get HIstory\",\"icon\":\"<i class=\\\"fas fa-history\\\"><\\/i>\",\"paragraph\":\"A praesent a feugiat id sit rilus velit fusce morbi dolorum.\"}', '2020-12-11 04:59:22', '2020-12-11 04:59:22'),
(50, 'latest_trx.content', '{\"title\":\"WHO WE ARE\",\"heading\":\"Our Latest Transaction\"}', '2020-12-11 05:13:53', '2020-12-11 05:13:53'),
(51, 'video.content', '{\"has_image\":\"1\",\"heading\":\"How It Works\",\"text\":\"Utilize Your Money\",\"icon\":\"<i class=\\\"fas fa-money-bill-wave\\\"><\\/i>\",\"video_link\":\"https:\\/\\/www.youtube.com\\/watch?v=7oT3i0dx4Ms\",\"video_image\":\"5fd292fe0ed821607635710.jpg\"}', '2020-12-11 05:28:30', '2020-12-11 05:28:30'),
(52, 'top_investor.content', '{\"title\":\"TRANDING PEOPLE\",\"heading\":\"Our Top Investors\"}', '2020-12-11 05:47:06', '2020-12-11 05:49:09'),
(53, 'subscribe.content', '{\"heading\":\"Join Our Newsletter\",\"text\":\"Put your investing ideas into action with full range of investments.\",\"heading_two\":\"Refferal Commission\",\"text_two\":\"Get On First Level Refferal Commission\",\"button_text\":\"Get Link\",\"button_link\":\"#\",\"commission\":\"10%\",\"subscribe_text\":\"Subscribe\"}', '2020-12-11 05:55:51', '2020-12-11 05:55:51'),
(54, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Getting Started\",\"paragraph\":\"Design is an evolutionary process, and filler text is just one tool in progress your pushing arsenal\",\"description\":\"Web typography is now more stylish and malleable than ever before. New CSS3 properties allow for trul unique typographic effects that in the past wouldve required images and custom JavaScript.Each of the following code snippets. This is shop version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.\",\"blog_image\":\"5fd2a74e01a431607640910.jpg\"}', '2020-12-11 06:55:10', '2020-12-11 06:55:10'),
(56, 'blog.content', '{\"title\":\"OUR BLOG\",\"heading\":\"Our Latest News\"}', '2020-12-11 07:00:47', '2020-12-11 07:00:47'),
(57, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Filling Critical Data\",\"paragraph\":\"Design is an evolutionary process, and filler text is just one tool in progress your pushing arsenal\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Ut enim ad an minim veniam Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis auteirure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Ut enim ad an minim veniam Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis auteirure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\",\"blog_image\":\"5fd2aa03b89141607641603.jpg\"}', '2020-12-11 07:06:43', '2020-12-11 07:06:43'),
(58, 'blog.element', '{\"has_image\":[\"1\"],\"title\":\"Aligning Resources.\",\"paragraph\":\"Design is an evolutionary process, and filler text is just one tool in progress your pushing arsenal\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Ut enim ad an minim veniam Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis auteirure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Ut enim ad an minim veniam Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis auteirure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\",\"blog_image\":\"5fd2aa216c67c1607641633.jpg\"}', '2020-12-11 07:07:13', '2020-12-11 07:07:13'),
(59, 'accept_gateway.content', '{\"title\":\"PAYMENT METHODS\",\"heading\":\"Accepted Payment Method\"}', '2020-12-11 07:11:58', '2020-12-11 07:11:58'),
(60, 'footer.content', '{\"title\":\"We are a full service Digital Marketing Agency all the foundational tool you need.\",\"title_one\":\"Usefull Links\",\"title_two\":\"Contact Us\",\"email_address\":\"savehyip@example.com\",\"contact_details\":\"110, B Street Kalani Bagh Dewas, Madhya Pradesh, INDIA #455001\",\"contact_number\":\"+800 568 322\",\"website\":\"www.example.com\",\"copyright\":\"Copyright  2019 AutoPay. All Right Reserved - Design By Webstrot\"}', '2020-12-11 07:24:04', '2020-12-11 10:50:51'),
(61, 'footer.element', '{\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"social_link\":\"#\"}', '2020-12-11 07:25:43', '2020-12-11 07:25:43'),
(62, 'footer.element', '{\"social_icon\":\"<i class=\\\"fab fa-google-plus-g\\\"><\\/i>\",\"social_link\":\"#\"}', '2020-12-11 07:25:58', '2020-12-11 07:25:58'),
(63, 'footer.element', '{\"social_icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"social_link\":\"#\"}', '2020-12-11 07:26:07', '2020-12-11 07:26:07'),
(64, 'footer.element', '{\"social_icon\":\"<i class=\\\"fab fa-linkedin-in\\\"><\\/i>\",\"social_link\":\"#\"}', '2020-12-11 07:26:18', '2020-12-11 07:26:18'),
(65, 'uestion_ans.content', '{\"title\":\"FAQ SECTION\",\"heading\":\"Frequently Asked Questions\"}', '2020-12-11 08:02:37', '2020-12-11 08:02:37'),
(66, 'uestion_ans.element', '{\"question\":\"what anout learn programs ?\",\"answer\":\"Morbi accumsan ipsum velit. Nam nec aks tel us a odio tincidunt an auctor. Proi gravida nibh vel elit ctor. This is Photoshop\'s version of Lorem m. Proin vida nibh vel velit auctor. Nam nec aks tel us a odio tincidunt auctor. velit auctor.\"}', '2020-12-11 08:06:08', '2020-12-11 08:06:08'),
(67, 'uestion_ans.element', '{\"question\":\"How Can I Help You ?\",\"answer\":\"Morbi accumsan ipsum velit. Nam nec aks tel us a odio tincidunt an auctor. Proi gravida nibh vel elit ctor. This is Photoshop\'s version of Lorem m. Proin vida nibh vel velit auctor. Nam nec aks tel us a odio tincidunt auctor. velit auctor.\"}', '2020-12-11 08:15:40', '2020-12-11 08:15:40'),
(68, 'uestion_ans.element', '{\"question\":\"What do you want to know from me ?\",\"answer\":\"Morbi accumsan ipsum velit. Nam nec aks tel us a odio tincidunt an auctor. Proi gravida nibh vel elit ctor. This is Photoshop\'s version of Lorem m. Proin vida nibh vel velit auctor. Nam nec aks tel us a odio tincidunt auctor. velit auctor.\"}', '2020-12-11 08:16:01', '2020-12-11 08:16:01'),
(69, 'nav_mobile.content', '{\"mobile\":\"+8801245874895\"}', '2020-12-11 08:59:33', '2020-12-11 09:02:36'),
(70, 'contact.content', '{\"heading\":\"GET IN TOUCH\",\"title\":\"Contact Us For Support\"}', '2020-12-13 03:44:03', '2020-12-13 03:44:03'),
(71, 'login_and_register.content', '{\"has_image\":\"1\",\"image\":\"5fd537f47b3271607809012.jpg\"}', '2020-12-13 05:36:52', '2020-12-13 05:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

DROP TABLE IF EXISTS `gateways`;
CREATE TABLE IF NOT EXISTS `gateways` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crypto` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_form` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `alias`, `image`, `name`, `status`, `parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 101, 'paypal', '5f6f1bd8678601601117144.jpg', 'Paypal', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"paypal@user.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:45:44'),
(2, 102, 'perfect_money', '5f6f1d2a742211601117482.jpg', 'Perfect Money', 1, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"6451561651551\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:22'),
(3, 103, 'stripe', '5f6f1d4bc69e71601117515.jpg', 'Stripe Hosted', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_aat3tzBCCXXBkS4sxY3M8A1B\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:55'),
(4, 104, 'skrill', '5f6f1d41257181601117505.jpg', 'Skrill', 1, '{\"pay_to_email\":{\"title\":\"Skrill Email\",\"global\":true,\"value\":\"merchant@skrill.com\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"---\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-22 03:35:41'),
(5, 105, 'paytm', '5f6f1d1d3ec731601117469.jpg', 'PayTM', 1, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"DIY12386817555501617\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"bKMfNxPPf_QdZppa\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"DIYtestingweb\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:09'),
(6, 106, 'payeer', '5f6f1bc61518b1601117126.jpg', 'Payeer', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"866989763\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"7575\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.payeer\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:45:26'),
(7, 107, 'paystack', '5f7096563dfb71601214038.jpg', 'PayStack', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"pk_test_3c9c87f51b13c15d99eb367ca6ebc52cc9eb1f33\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_2a3f97a146ab5694801f993b60fcb81cd7254f12\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.paystack\"}}\r\n', NULL, NULL, '2019-09-14 13:14:22', '2020-09-27 07:40:38'),
(8, 108, 'voguepay', '5f6f1d5951a111601117529.jpg', 'VoguePay', 1, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"demo\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:52:09'),
(9, 109, 'flutterwave', '5f6f1b9e4bb961601117086.jpg', 'Flutterwave', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"FLWPUBK_TEST-5d9bb05bba2c13aa6c7a1ec7d7526ba2-X\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"FLWSECK_TEST-2ac7b05b6b9fa8a423eb58241fd7bbb6-X\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"FLWSECK_TEST32e13665a95a\"}}', '{\"KES\":\"KES\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"UGX\":\"UGX\",\"TZS\":\"TZS\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:44:46'),
(10, 110, 'razorpay', '5f6f1d3672dd61601117494.jpg', 'RazorPay', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"rzp_test_kiOtejPbRZU90E\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"osRDebzEqbsE1kbyQJ4y0re7\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:34'),
(11, 111, 'stripe_js', '5f7096a31ed9a1601214115.jpg', 'Stripe Storefront', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_vY0GhNLF8IUOzu9tLvyrAGP800s1MVfv84\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-27 07:41:55'),
(12, 112, 'instamojo', '5f6f1babbdbb31601117099.jpg', 'Instamojo', 1, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_2241633c3bc44a3de84a3b33969\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"test_279f083f7bebefd35217feef22d\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:44:59'),
(13, 501, 'blockchain', '5f6f1b2b20c6f1601116971.jpg', 'Blockchain', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"8df2e5a0-3798-4b74-871d-973615b57e7b\"},\"xpub_code\":{\"title\":\"XPUB CODE\",\"global\":true,\"value\":\"xpub6CXLqfWXj1xgXe79nEQb3pv2E7TGD13pZgHceZKrQAxqXdrC2FaKuQhm5CYVGyNcHLhSdWau4eQvq3EDCyayvbKJvXa11MX9i2cHPugpt3G\"}}', '{\"BTC\":\"BTC\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:42:51'),
(14, 502, 'blockio', '5f6f19432bedf1601116483.jpg', 'Block.io', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":false,\"value\":\"1658-8015-2e5e-9afb\"},\"api_pin\":{\"title\":\"API PIN\",\"global\":true,\"value\":\"covidvai2020\"}}', '{\"BTC\":\"BTC\",\"LTC\":\"LTC\",\"DOGE\":\"DOGE\"}', 1, '{\"cron\":{\"title\": \"Cron URL\",\"value\":\"ipn.blockio\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:34:43'),
(15, 503, 'coinpayments', '5f6f1b6c02ecd1601117036.jpg', 'CoinPayments', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:56'),
(16, 504, 'coinpayments_fiat', '5f6f1b94e9b2b1601117076.jpg', 'CoinPayments Fiat', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-22 03:17:29'),
(17, 505, 'coingate', '5f6f1b5fe18ee1601117023.jpg', 'Coingate', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:44'),
(18, 506, 'coinbase_commerce', '5f6f1b4c774af1601117004.jpg', 'Coinbase Commerce', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"c47cd7df-d8e8-424b-a20a\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"55871878-2c32-4f64-ab66\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.coinbase_commerce\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:24'),
(24, 113, 'paypal_sdk', '5f6f1bec255c61601117164.jpg', 'Paypal Express', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-31 23:50:27'),
(25, 114, 'stripe_v3', '5f709684736321601214084.jpg', 'Stripe Checkout', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_vY0GhNLF8IUOzu9tLvyrAGP800s1MVfv84\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_mWS4YFtvSMH0WCjFFbm6JDQP00gEvE3p0G\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"w5555\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.stripe_v3\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-27 07:41:24'),
(26, 1000, 'payoneer', '5f7096605cba01601214048.jpg', 'Payoneer', 1, '[]', '[]', 0, '{\"delay\":null}', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px; text-align: left;\">Please Send To below&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px; text-align: left;\">Payoneer&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px; text-align: left;\">Account:</span></p><div><br></div><div>Payoneer Account : adminaccount@payoneer.com</div>', '{\"send_from_email\":{\"field_name\":\"send_from_email\",\"field_level\":\"Send From Email\",\"type\":\"text\",\"validation\":\"required\"},\"screenshot\":{\"field_name\":\"screenshot\",\"field_level\":\"Screenshot\",\"type\":\"file\",\"validation\":\"required\"}}', '2020-07-05 03:46:04', '2020-09-27 07:40:48'),
(27, 115, 'mollie', '5f6f1bb765ab11601117111.jpg', 'Mollie', 1, '{\"mollie_email\":{\"title\":\"Mollie Email \",\"global\":true,\"value\":\"ronniearea@gmail.com\"},\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:45:11'),
(28, 1001, 'bank_wire', '5f6f1eb1548d41601117873.jpg', 'Bank Wire', 1, '[]', '[]', 0, '{\"delay\":null}', 'Please Send To below bank Details<div><br></div><div>Bank Name: Demo Test Bank</div><div>Account Name : Demo Account Name</div><div>Account Number: 000-000-000-000-000</div><div>Routing Number: 0123456789</div>', '{\"transaction_number_uy7uyui\":{\"field_name\":\"transaction_number_uy7uyui\",\"field_level\":\"Transaction Number uy7uyui\",\"type\":\"text\",\"validation\":\"required\"},\"sss\":{\"field_name\":\"sss\",\"field_level\":\"sss\",\"type\":\"text\",\"validation\":\"required\"},\"ffff\":{\"field_name\":\"ffff\",\"field_level\":\"ffff\",\"type\":\"text\",\"validation\":\"required\"}}', '2020-08-20 03:47:33', '2020-10-31 07:02:09'),
(29, 1002, 'mobile_money', '5f6f1ec54303f1601117893.jpg', 'Mobile Money', 1, '[]', '[]', 0, '{\"delay\":null}', '<span style=\"color: rgb(33, 37, 41);\">Please Send To below Mobile Money Number:</span><div><br></div><div><span style=\"color: rgb(33, 37, 41); font-size: 1rem;\">Mobile Money Number</span>: 000-000-000-000-000</div>', '{\"send_from_number\":{\"field_name\":\"send_from_number\",\"field_level\":\"Send From Number\",\"type\":\"text\",\"validation\":\"required\"},\"transaction_number\":{\"field_name\":\"transaction_number\",\"field_level\":\"Transaction Number\",\"type\":\"text\",\"validation\":\"required\"},\"screenshot\":{\"field_name\":\"screenshot\",\"field_level\":\"Screenshot\",\"type\":\"file\",\"validation\":\"required\"}}', '2020-09-24 06:50:30', '2020-09-26 04:58:13'),
(30, 116, 'cashmaal', '5f9a8b62bb4dd1603963746.png', 'Cashmaal', 1, '{\"web_id\":{\"title\":\"Web Id\",\"global\":true,\"value\":\"3748\"},\"ipn_key\":{\"title\":\"IPN Key\",\"global\":true,\"value\":\"546254628759524554647987\"}}', '{\"PKR\":\"PKR\",\"USD\":\"USD\"}', 0, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.cashmaal\"}}', NULL, NULL, NULL, '2020-10-29 03:29:06'),
(31, 185, 'tap_company', '', 'Tap Company', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"sk_test_XKokBfNWv6FIYuTMg5sLPjhJ\"},\"publishable_key\":{\"title\":\"Publishable API Key\",\"global\":true,\"value\":\"pk_test_EtHFV4BuPQokJT6jiROls87Y\"}}', '{\"AED\":\"AED\",\"BHD\":\"BHD\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"KWD\":\"KWD\",\"OMR\":\"OMR\",\"QAR\":\"QAR\",\"SAR\":\"SAR\",\"USD\":\"USD\"}', 0, NULL, NULL, NULL, NULL, '2022-04-03 11:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

DROP TABLE IF EXISTS `gateway_currencies`;
CREATE TABLE IF NOT EXISTS `gateway_currencies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(18,8) NOT NULL,
  `max_amount` decimal(18,8) NOT NULL,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT 0.00,
  `fixed_charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway_currencies`
--

INSERT INTO `gateway_currencies` (`id`, `name`, `currency`, `symbol`, `method_code`, `gateway_alias`, `min_amount`, `max_amount`, `percent_charge`, `fixed_charge`, `rate`, `image`, `gateway_parameter`, `created_at`, `updated_at`) VALUES
(22, 'Bank Wire', 'USD', '', 1001, 'bank_wire', '10.00000000', '100000.00000000', '1.00', '5.00000000', '0.01179127', '5f6f1eb1548d41601117873.jpg', '{\"transaction_number_uy7uyui\":{\"field_name\":\"transaction_number_uy7uyui\",\"field_level\":\"Transaction Number uy7uyui\",\"type\":\"text\",\"validation\":\"required\"},\"sss\":{\"field_name\":\"sss\",\"field_level\":\"sss\",\"type\":\"text\",\"validation\":\"required\"},\"ffff\":{\"field_name\":\"ffff\",\"field_level\":\"ffff\",\"type\":\"text\",\"validation\":\"required\"}}', '2020-08-20 03:47:33', '2020-12-25 08:44:51'),
(23, 'Payoneer', 'USD', '', 1000, 'payoneer', '1.00000000', '1000.00000000', '0.00', '10.00000000', '0.01179127', '5f7096605cba01601214048.jpg', '{\"send_from_email\":{\"field_name\":\"send_from_email\",\"field_level\":\"Send From Email\",\"type\":\"text\",\"validation\":\"required\"},\"screenshot\":{\"field_name\":\"screenshot\",\"field_level\":\"Screenshot\",\"type\":\"file\",\"validation\":\"required\"}}', '2020-07-05 03:46:04', '2020-12-25 08:45:04'),
(24, 'Mobile Money', 'USD', '', 1002, 'mobile_money', '10.00000000', '10000.00000000', '0.85', '2.56000000', '0.01179127', '5f6f1ec54303f1601117893.jpg', '{\"send_from_number\":{\"field_name\":\"send_from_number\",\"field_level\":\"Send From Number\",\"type\":\"text\",\"validation\":\"required\"},\"transaction_number\":{\"field_name\":\"transaction_number\",\"field_level\":\"Transaction Number\",\"type\":\"text\",\"validation\":\"required\"},\"screenshot\":{\"field_name\":\"screenshot\",\"field_level\":\"Screenshot\",\"type\":\"file\",\"validation\":\"required\"}}', '2020-09-24 06:50:30', '2020-12-25 08:44:58'),
(60, 'Block.io - BTC', 'BTC', 'BTC', 502, 'blockio', '1.00000000', '100.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"api_pin\":\"covidvai2020\",\"api_key\":\"demo\"}', '2020-12-25 08:40:40', '2020-12-25 08:40:40'),
(61, 'Blockchain - BTC', 'BTC', 'BTC', 501, 'blockchain', '1.00000000', '10000.00000000', '10.00', '1.00000000', '0.01179127', NULL, '{\"api_key\":\"8df2e5a0-3798-4b74-871d-973615b57e7b\",\"xpub_code\":\"xpub6CXLqfWXj1xgXe79nEQb3pv2E7TGD13pZgHceZKrQAxqXdrC2FaKuQhm5CYVGyNcHLhSdWau4eQvq3EDCyayvbKJvXa11MX9i2cHPugpt3G\"}', '2020-12-25 08:40:51', '2020-12-25 08:40:51'),
(62, 'Cashmaal - PKR', 'PKR', 'pkr', 116, 'cashmaal', '1.00000000', '10000.00000000', '10.00', '1.00000000', '0.01179127', NULL, '{\"web_id\":\"3748\",\"ipn_key\":\"546254628759524554647987\"}', '2020-12-25 08:41:01', '2020-12-25 08:41:01'),
(63, 'Coinbase Commerce - USD', 'USD', '$', 506, 'coinbase_commerce', '1.00000000', '10000.00000000', '10.00', '1.00000000', '0.01179127', NULL, '{\"api_key\":\"c47cd7df-d8e8-424b-a20a\",\"secret\":\"55871878-2c32-4f64-ab66\"}', '2020-12-25 08:41:11', '2020-12-25 08:41:11'),
(64, 'Coingate - USD', 'USD', '$', 505, 'coingate', '1.00000000', '10000.00000000', '10.00', '1.00000000', '0.01179127', NULL, '{\"api_key\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}', '2020-12-25 08:41:20', '2020-12-25 08:41:20'),
(65, 'CoinPayments - BTC', 'BTC', '$', 503, 'coinpayments', '1.00000000', '10000.00000000', '10.00', '1.00000000', '0.01179127', NULL, '{\"public_key\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\",\"private_key\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\",\"merchant_id\":\"93a1e014c4ad60a7980b4a7239673cb4\"}', '2020-12-25 08:41:27', '2020-12-25 08:41:27'),
(66, 'CoinPayments Fiat - USD', 'USD', '$', 504, 'coinpayments_fiat', '1.00000000', '10000.00000000', '10.00', '1.00000000', '0.01179127', NULL, '{\"merchant_id\":\"93a1e014c4ad60a7980b4a7239673cb4\"}', '2020-12-25 08:41:33', '2020-12-25 08:41:33'),
(67, 'Flutterwave - USD', 'USD', 'USD', 109, 'flutterwave', '1.00000000', '2000.00000000', '0.00', '1.00000000', '0.01179127', NULL, '{\"public_key\":\"FLWPUBK_TEST-5d9bb05bba2c13aa6c7a1ec7d7526ba2-X\",\"secret_key\":\"FLWSECK_TEST-2ac7b05b6b9fa8a423eb58241fd7bbb6-X\",\"encryption_key\":\"FLWSECK_TEST32e13665a95a\"}', '2020-12-25 08:41:41', '2020-12-25 08:41:41'),
(68, 'Instamojo - INR', 'INR', '$', 112, 'instamojo', '1.00000000', '10000.00000000', '2.00', '1.00000000', '0.01179127', NULL, '{\"api_key\":\"test_2241633c3bc44a3de84a3b33969\",\"auth_token\":\"test_279f083f7bebefd35217feef22d\",\"salt\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}', '2020-12-25 08:41:48', '2020-12-25 08:41:48'),
(69, 'Mollie - EUR', 'EUR', 'EUR', 115, 'mollie', '10.00000000', '1000.00000000', '0.00', '0.00000000', '0.01012560', NULL, '{\"mollie_email\":\"ronniearea@gmail.com\",\"api_key\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}', '2020-12-25 08:42:39', '2020-12-25 08:42:39'),
(70, 'Payeer - USD', 'USD', '$', 106, 'payeer', '1.00000000', '10000.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"merchant_id\":\"866989763\",\"secret_key\":\"7575\"}', '2020-12-25 08:43:06', '2020-12-25 08:43:06'),
(71, 'Paypal - USD', 'USD', '$', 101, 'paypal', '1.00000000', '10000.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"paypal_email\":\"paypal@user.com\"}', '2020-12-25 08:43:13', '2020-12-25 08:43:13'),
(72, 'Paypal Express - AUD', 'AUD', '$', 113, 'paypal_sdk', '1.00000000', '10000.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"clientId\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\",\"clientSecret\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}', '2020-12-25 08:43:26', '2020-12-25 08:43:26'),
(73, 'PayStack - USD', 'USD', '$', 107, 'paystack', '1.00000000', '10000.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"public_key\":\"pk_test_3c9c87f51b13c15d99eb367ca6ebc52cc9eb1f33\",\"secret_key\":\"sk_test_2a3f97a146ab5694801f993b60fcb81cd7254f12\"}', '2020-12-25 08:43:35', '2020-12-25 08:43:35'),
(74, 'PayTM - AUD', 'AUD', '$', 105, 'paytm', '1.00000000', '10000.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"MID\":\"DIY12386817555501617\",\"merchant_key\":\"bKMfNxPPf_QdZppa\",\"WEBSITE\":\"DIYtestingweb\",\"INDUSTRY_TYPE_ID\":\"Retail\",\"CHANNEL_ID\":\"WEB\",\"transaction_url\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\",\"transaction_status_url\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}', '2020-12-25 08:43:41', '2020-12-25 08:43:41'),
(75, 'Perfect Money - USD', 'USD', '$', 102, 'perfect_money', '1.00000000', '10000.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"passphrase\":\"6451561651551\",\"wallet_id\":\"asdfadfasdfasdf\"}', '2020-12-25 08:43:48', '2020-12-25 08:43:48'),
(76, 'RazorPay - INR', 'INR', '$', 110, 'razorpay', '1.00000000', '10000.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"key_id\":\"rzp_test_kiOtejPbRZU90E\",\"key_secret\":\"osRDebzEqbsE1kbyQJ4y0re7\"}', '2020-12-25 08:43:55', '2020-12-25 08:43:55'),
(77, 'Skrill - AED', 'AED', '$', 104, 'skrill', '1.00000000', '10000.00000000', '1.00', '1.00000000', '0.01179127', NULL, '{\"pay_to_email\":\"merchant@skrill.com\",\"secret_key\":\"---\"}', '2020-12-25 08:44:01', '2020-12-25 08:44:01'),
(78, 'Stripe Checkout - USD', 'USD', 'USD', 114, 'stripe_v3', '10.00000000', '1000.00000000', '0.00', '1.00000000', '0.01179127', NULL, '{\"secret_key\":\"sk_test_vY0GhNLF8IUOzu9tLvyrAGP800s1MVfv84\",\"publishable_key\":\"pk_test_mWS4YFtvSMH0WCjFFbm6JDQP00gEvE3p0G\",\"end_point\":\"w5555\"}', '2020-12-25 08:44:08', '2020-12-25 08:44:08'),
(79, 'Stripe Hosted - USD', 'USD', '$', 103, 'stripe', '1.00000000', '2000.00000000', '10.00', '5.00000000', '0.01179127', NULL, '{\"secret_key\":\"sk_test_aat3tzBCCXXBkS4sxY3M8A1B\",\"publishable_key\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}', '2020-12-25 08:44:17', '2020-12-25 08:44:17'),
(80, 'Stripe Storefront - USD', 'USD', '$', 111, 'stripe_js', '1.00000000', '10000.00000000', '10.00', '1.00000000', '0.01179127', NULL, '{\"secret_key\":\"sk_test_vY0GhNLF8IUOzu9tLvyrAGP800s1MVfv84\",\"publishable_key\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}', '2020-12-25 08:44:23', '2020-12-25 08:44:23'),
(81, 'VoguePay - USD', 'USD', '$', 108, 'voguepay', '1.00000000', '1000.00000000', '0.00', '1.00000000', '0.01179127', NULL, '{\"merchant_id\":\"demo\"}', '2020-12-25 08:44:29', '2020-12-25 08:44:29'),
(84, 'Tap - USD', 'USD', '$', 185, 'tap_company', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"api_key\":\"sk_test_XKokBfNWv6FIYuTMg5sLPjhJ\",\"publishable_key\":\"pk_test_EtHFV4BuPQokJT6jiROls87Y\"}', '2022-04-03 11:53:59', '2022-04-03 11:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sitename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_text` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'email configuration',
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms notification, 0 - dont send, 1 - send',
  `registration` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Off	, 1: On',
  `social_login` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'social login',
  `social_credential` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_template` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_version` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_api`, `base_color`, `secondary_color`, `mail_config`, `ev`, `en`, `sv`, `sn`, `registration`, `social_login`, `social_credential`, `active_template`, `sys_version`, `created_at`, `updated_at`) VALUES
(1, 'AutoPay', 'USD', '৳', 'no-reply@viserlab.com', '<table style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(0, 23, 54); text-decoration-style: initial; text-decoration-color: initial;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#001736\"><tbody><tr><td valign=\"top\" align=\"center\"><table class=\"mobile-shell\" width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"td container\" style=\"width: 650px; min-width: 650px; font-size: 0pt; line-height: 0pt; margin: 0px; font-weight: normal; padding: 55px 0px;\"><div style=\"text-align: center;\"><img src=\"https://i.imgur.com/C9IS7Z1.png\" style=\"height: 240 !important;width: 338px;margin-bottom: 20px;\"></div><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"padding-bottom: 10px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"tbrr p30-15\" style=\"padding: 60px 30px; border-radius: 26px 26px 0px 0px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"color: rgb(255, 255, 255); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 46px; padding-bottom: 25px; font-weight: bold;\">Hi {{name}} ,</td></tr><tr><td style=\"color: rgb(193, 205, 220); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 30px; padding-bottom: 25px;\">{{message}}</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"p30-15 bbrr\" style=\"padding: 50px 30px; border-radius: 0px 0px 26px 26px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"text-footer1 pb10\" style=\"color: rgb(0, 153, 255); font-family: Muli, Arial, sans-serif; font-size: 18px; line-height: 30px; text-align: center; padding-bottom: 10px;\">© 2020 ViserLab. All Rights Reserved.</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', 'https://api.infobip.com/api/v3/sendsms/plain?user=viserlab&password=26289099&sender=Lottery&SMSText=dfdsgdfgfg&GSM=8801716441700&type=longSMS', 'FFFFFF', 'F0A03B', '{\"name\":\"php\"}', 0, 0, 0, 0, 1, 0, '{\"google_client_id\":\"53929591142-l40gafo7efd9onfe6tj545sf9g7tv15t.apps.googleusercontent.com\",\"google_client_secret\":\"BRdB3np2IgYLiy4-bwMcmOwN\",\"fb_client_id\":\"277229062999748\",\"fb_client_secret\":\"1acfc850f73d1955d14b282938585122\"}', 'basic', NULL, NULL, '2022-04-03 11:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '5f15968db08911595250317.png', 0, 1, '2020-07-06 03:47:55', '2020-07-21 04:05:19'),
(4, 'Bangla', 'bn', '5f1596a650cd11595250342.png', 0, 0, '2020-07-20 07:05:42', '2020-12-11 12:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_14_061757_create_support_tickets_table', 3),
(5, '2020_06_14_061837_create_support_messages_table', 3),
(6, '2020_06_14_061904_create_support_attachments_table', 3),
(7, '2020_06_14_062359_create_admins_table', 3),
(8, '2020_06_14_064604_create_transactions_table', 4),
(9, '2020_06_14_065247_create_general_settings_table', 5),
(12, '2014_10_12_100000_create_password_resets_table', 6),
(13, '2020_06_14_060541_create_user_logins_table', 6),
(14, '2020_06_14_071708_create_admin_password_resets_table', 7),
(15, '2020_09_14_053026_create_countries_table', 8),
(16, '2020_12_06_204909_create_bonus_settings_table', 9),
(17, '2020_12_07_005914_create_bonus_histories_table', 10),
(18, '2020_12_08_203858_create_transfer_balances_table', 11),
(19, '2020_12_15_020016_create_user_panel_colors_table', 12),
(20, '2020_12_17_195726_create_deposit_level_trees_table', 13),
(21, '2020_12_19_212041_create_currency_rates_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'template name',
  `secs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'HOME', 'home', 'templates.basic.', '[\"banner_one\",\"banner_two\",\"features\",\"latest_trx\",\"video\",\"top_investor\",\"subscribe\",\"blog\",\"uestion_ans\",\"accept_gateway\"]', 1, '2020-07-11 06:23:58', '2020-12-10 07:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ronnie@gmail.com', '100375', '2020-07-07 05:44:47'),
('user@site.com', '910465', '2020-10-29 06:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

DROP TABLE IF EXISTS `plugins`;
CREATE TABLE IF NOT EXISTS `plugins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'object',
  `support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\n                        (function(){\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\n                        s1.async=true;\n                        s1.src=\"https://embed.tawk.to/{{app_key}}/default\";\n                        s1.charset=\"UTF-8\";\n                        s1.setAttribute(\"crossorigin\",\"*\");\n                        s0.parentNode.insertBefore(s1,s0);\n                        })();\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"58dd135ef7bbaa72709c3470\"}}', 'twak.png', 0, NULL, '2019-10-18 23:16:05', '2020-12-07 03:00:26'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\r\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\r\n<div class=\"g-recaptcha\" data-sitekey=\"{{sitekey}}\" data-callback=\"verifyCaptcha\"></div>\r\n<div id=\"g-recaptcha-error\"></div>', '{\"sitekey\":{\"title\":\"Site Key\",\"value\":\"6Lfpm3cUAAAAAGIjbEJKhJNKS4X1Gns9ANjh8MfH\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2020-08-18 00:09:33'),
(3, 'custom-captcha', 'Custom Captcha', 'Just Put Any Random String', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"SecureString\"}}', 'na', 0, NULL, '2019-10-18 23:16:05', '2020-12-07 03:00:16'),
(4, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google-analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\r\n                <script>\r\n                  window.dataLayer = window.dataLayer || [];\r\n                  function gtag(){dataLayer.push(arguments);}\r\n                  gtag(\"js\", new Date());\r\n                \r\n                  gtag(\"config\", \"{{app_key}}\");\r\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"Demo\"}}', 'ganalytics.png', 0, NULL, NULL, '2020-12-07 03:00:23'),
(5, 'fb-comment', 'Facebook Comment ', 'Key location is shown bellow', 'Facebook.png', '<div id=\"fb-root\"></div><script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId={{app_key}}&autoLogAppEvents=1\"></script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"713047905830100\"}}', 'fb_com.PNG', 0, NULL, NULL, '2020-12-07 03:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `role`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'Kamal', '2022-03-01 11:11:42', NULL),
(2, 'Manager', 'Kamal', '2022-03-05 11:11:42', NULL),
(3, 'Sr. Manager', 'Jamal', '2022-03-01 11:11:42', NULL),
(4, 'Sr. Manager', 'Jamal', '2022-03-05 11:11:42', NULL),
(5, 'Deputy Manager', 'John', '2022-03-01 11:11:42', NULL),
(6, 'Deputy Manager', 'John', '2022-03-05 11:11:42', NULL),
(8, 'Deputy Manager', 'John', '2023-03-05 11:11:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'test@mail.com', '2020-07-18 18:00:00', NULL),
(3, 'best@mail.com', '2020-07-18 18:00:00', NULL),
(4, 'admin2@gmail.com', '2020-12-13 03:25:54', '2020-12-13 03:25:54'),
(5, 'user@site.com', '2020-12-13 03:27:22', '2020-12-13 03:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

DROP TABLE IF EXISTS `support_attachments`;
CREATE TABLE IF NOT EXISTS `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `support_message_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_attachments`
--

INSERT INTO `support_attachments` (`id`, `support_message_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, '5fd67741449ad1607890753.png', '2020-12-14 04:19:13', '2020-12-14 04:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

DROP TABLE IF EXISTS `support_messages`;
CREATE TABLE IF NOT EXISTS `support_messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supportticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_messages`
--

INSERT INTO `support_messages` (`id`, `supportticket_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, '1', 0, 'sadfsdf', '2020-12-13 03:13:25', '2020-12-13 03:13:25'),
(2, '2', 0, 'sadf', '2020-12-13 03:38:59', '2020-12-13 03:38:59'),
(3, '3', 0, 'asdf', '2020-12-14 04:19:13', '2020-12-14 04:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

DROP TABLE IF EXISTS `support_tickets`;
CREATE TABLE IF NOT EXISTS `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `name`, `email`, `ticket`, `subject`, `status`, `last_reply`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mohammad Sohan', 'admin@gmail.com', '83452651', 'My ticket', 0, '2020-12-12 19:13:25', '2020-12-13 03:13:25', '2020-12-13 03:13:25'),
(2, NULL, 'Mohammad Sohan', 'user@site.com', '56827755', 'asdf', 0, '2020-12-12 19:38:59', '2020-12-13 03:38:59', '2020-12-13 03:38:59'),
(3, 8, 'User Name', 'user@site.com', '345943', 'sdf', 0, '2020-12-13 20:19:13', '2020-12-14 04:19:13', '2020-12-14 04:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `currency_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `post_balance` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `trx_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=487 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `currency_code`, `amount`, `charge`, `post_balance`, `trx_type`, `trx`, `details`, `created_at`, `updated_at`) VALUES
(459, 39, 'BDT', '10.00000000', '0.00000000', '10.00000000', '+', 'STFQNO888BPG', 'Registration Bonus', '2020-12-25 05:19:05', '2020-12-25 05:19:05'),
(460, 39, 'BDT', '0.50000000', '0.00000000', '10.50000000', '+', '8746YQXSYR4B', 'Receiver bonus from admin of my current balance', '2020-12-25 05:48:03', '2020-12-25 05:48:03'),
(461, 39, 'BDT', '1000.00000000', '105.00000000', '1010.50000000', '+', 'XMV5ET644R82', 'Deposit Via Stripe Hosted', '2020-12-25 06:27:10', '2020-12-25 06:27:10'),
(462, 39, 'BDT', '20.00000000', '0.00000000', '1030.50000000', '+', '7B6KT89AJ3ZQ', 'Referral Registration Bonus', '2020-12-25 06:35:36', '2020-12-25 06:35:36'),
(463, 40, 'BDT', '10.00000000', '0.00000000', '10.00000000', '+', 'SGFR6W1P54T7', 'Registration Bonus', '2020-12-25 06:35:36', '2020-12-25 06:35:36'),
(464, 39, 'BDT', '30.75000000', '0.00000000', '1061.25000000', '+', 'P95GVY129JUU', 'first_level_bonus', '2020-12-25 06:49:22', '2020-12-25 06:49:22'),
(465, 40, 'BDT', '2000.00000000', '205.00000000', '2010.00000000', '+', 'HUSNU61TKTRX', 'Deposit Via Stripe Hosted', '2020-12-25 06:49:22', '2020-12-25 06:49:22'),
(466, 39, 'BDT', '20.00000000', '0.00000000', '1081.25000000', '+', '12889CADBBP2', 'Referral Registration Bonus', '2020-12-25 06:55:50', '2020-12-25 06:55:50'),
(467, 41, 'BDT', '10.00000000', '0.00000000', '10.00000000', '+', 'ZDV6YR9DVBUM', 'Registration Bonus', '2020-12-25 06:55:50', '2020-12-25 06:55:50'),
(468, 40, 'BDT', '1000.00000000', '25.00000000', '1010.00000000', '-', 'WQ5Q93GV5JM2', '11.4958935 USD Withdraw Via Bank Wire', '2020-12-25 06:58:44', '2020-12-25 06:58:44'),
(469, 39, 'BDT', '2.50000000', '0.00000000', '1083.75000000', '+', 'ZP7TY798HYC7', 'Withdraw Bonus For First Level', '2020-12-25 07:02:31', '2020-12-25 07:02:31'),
(470, 39, 'BDT', '2.50000000', '0.00000000', '1086.25000000', '+', 'UPZW6O6QM7OX', 'First level bonus for transfer balance', '2020-12-25 07:07:40', '2020-12-25 07:07:40'),
(471, 40, 'BDT', '500.00000000', '50.00000000', '460.00000000', '-', 'NVUABJOUYJYB', 'Balance transter using Investment website', '2020-12-25 07:07:40', '2020-12-25 07:07:40'),
(472, 41, 'BDT', '500.00000000', '50.00000000', '510.00000000', '+', 'MKNS9PFJJH4K', 'Balance receiver using Investment website', '2020-12-25 07:07:40', '2020-12-25 07:07:40'),
(473, 40, 'USD', '2.35825402', '0.00000000', '2.35825402', '+', 'EYYTBQ8Y35J3', 'Add Wallet balance from balance', '2020-12-25 07:51:40', '2020-12-25 07:51:40'),
(474, 40, 'BDT', '200.00000000', '0.00000000', '260.00000000', '-', 'EYYTBQ8Y35J3', 'Less Wallet balance to USD', '2020-12-25 07:51:40', '2020-12-25 07:51:40'),
(475, 40, 'USD', '2.35825402', '0.00000000', '2.35825402', '+', 'AJ7S29TUQBND', 'Add Wallet balance from balance', '2020-12-25 07:51:40', '2020-12-25 07:51:40'),
(476, 40, 'BDT', '200.00000000', '0.00000000', '260.00000000', '-', 'AJ7S29TUQBND', 'Less Wallet balance to USD', '2020-12-25 07:51:40', '2020-12-25 07:51:40'),
(477, 40, 'USD', '0.11791270', '0.00000000', '2.47616672', '+', 'U3PY15AWHODE', 'Add Wallet balance from balance', '2020-12-25 07:57:43', '2020-12-25 07:57:43'),
(478, 40, 'BDT', '10.00000000', '0.00000000', '250.00000000', '-', 'U3PY15AWHODE', 'Less Wallet balance to USD', '2020-12-25 07:57:43', '2020-12-25 07:57:43'),
(479, 40, 'BDT', '169.61701200', '0.00000000', '419.61701200', '+', 'NOFEX7POCBS4', 'Add Wallet balance from USD', '2020-12-25 08:02:50', '2020-12-25 08:02:50'),
(480, 40, 'USD', '2.00000000', '0.00000000', '0.47616672', '-', 'NOFEX7POCBS4', 'Less Wallet balance to balance', '2020-12-25 08:02:50', '2020-12-25 08:02:50'),
(481, 39, 'BDT', '500.00000000', '15.00000000', '586.25000000', '-', 'QOOESFC3QWU2', '5.71876595 USD Withdraw Via Bank Wire', '2020-12-25 03:00:34', '2020-12-25 03:00:34'),
(482, 39, 'USD', '0.58956350', '0.00000000', '0.58956350', '+', 'BTCCXD34GA55', 'Add Wallet balance from balance', '2020-12-25 08:00:33', '2020-12-25 08:00:33'),
(483, 39, 'USD', '0.58956350', '0.00000000', '0.58956350', '+', 'O8GF2QE4M5Z3', 'Add Wallet balance from balance', '2020-12-25 08:00:33', '2020-12-25 08:00:33'),
(484, 39, 'BDT', '50.00000000', '0.00000000', '536.25000000', '-', 'BTCCXD34GA55', 'Less Wallet balance to USD', '2020-12-25 08:00:33', '2020-12-25 08:00:33'),
(485, 39, 'BDT', '50.00000000', '0.00000000', '536.25000000', '-', 'O8GF2QE4M5Z3', 'Less Wallet balance to USD', '2020-12-25 08:00:33', '2020-12-25 08:00:33'),
(486, 39, 'BDT', '1000.00000000', '105.00000000', '1536.25000000', '+', 'DQMOXV3JORQK', 'Deposit Via Stripe Hosted', '2020-12-25 08:06:08', '2020-12-25 08:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_balances`
--

DROP TABLE IF EXISTS `transfer_balances`;
CREATE TABLE IF NOT EXISTS `transfer_balances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `currency_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_currency_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `get_amount` float(8,2) DEFAULT NULL,
  `charge` double(8,2) NOT NULL,
  `trx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfer_balances`
--

INSERT INTO `transfer_balances` (`id`, `sender`, `receiver`, `currency_code`, `get_currency_code`, `amount`, `get_amount`, `charge`, `trx`, `reference`, `created_at`, `updated_at`) VALUES
(59, 40, 41, 'BDT', 'BDT', 500.00, 500.00, 50.00, 'NVUABJOUYJYB', 'sdfsd', '2020-12-25 07:07:40', '2020-12-25 07:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_by` int(11) DEFAULT NULL,
  `balance` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `USD` decimal(18,8) DEFAULT 0.00000000,
  `EUR` decimal(18,8) DEFAULT 0.00000000,
  `BTC` decimal(18,8) DEFAULT 0.00000000,
  `LTC` decimal(18,8) DEFAULT 0.00000000,
  `GBP` decimal(18,8) DEFAULT 0.00000000,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: sms unverified, 1: sms verified',
  `ver_code` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `mobile`, `ref_by`, `balance`, `USD`, `EUR`, `BTC`, `LTC`, `GBP`, `password`, `image`, `address`, `status`, `ev`, `sv`, `ver_code`, `ver_code_send_at`, `ts`, `tv`, `tsc`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(39, 'User', 'Name', 'username', 'user@site.com', '15874125698', NULL, '1536.25000000', '0.58956350', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '$2y$10$.rOv3IGVOElBJyArXtsEp.O5haewVHiULoW1xw8jCF3yNKJPSZgfW', '1608859680_username.jpg', '{\"address\":\"Dhaka2\",\"state\":\"11\",\"zip\":\"11\",\"country\":null,\"city\":\"Dhaka4\"}', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-12-25 05:19:05', '2020-12-25 08:06:08'),
(40, 'user', 'name2', 'username2', 'u2@gmail.com', '+8804581254741', 39, '419.61701200', '0.47616672', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '$2y$10$WZ4ixummYVM7FdcqemDC.uKTsQyx.l8twYDv34F.xDk1MoiIxfdjK', '1608860509_username2.jpg', '{\"address\":\"Dhaka2\",\"state\":\"11\",\"zip\":\"11\",\"country\":null,\"city\":\"Dhaka4\"}', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-12-25 06:35:36', '2020-12-25 09:41:49'),
(41, 'User', 'Name', 'username3', 'adsmin@gmail.com', '25474125874', 39, '510.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '$2y$10$wcjkUUUGolc6r1R9DN0Luu5.Q6x356ks6kIPMEO9pjvXsyjkoxKM6', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":null,\"city\":\"\"}', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-12-25 06:55:50', '2020-12-25 07:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

DROP TABLE IF EXISTS `user_logins`;
CREATE TABLE IF NOT EXISTS `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `location`, `browser`, `os`, `longitude`, `latitude`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(3, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-10-29 06:51:16', '2020-10-29 06:51:16'),
(4, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-11-04 04:07:47', '2020-11-04 04:07:47'),
(5, 8, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-11-05 03:22:20', '2020-11-05 03:22:20'),
(6, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 03:00:36', '2020-12-07 03:00:36'),
(7, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 03:23:18', '2020-12-07 03:23:18'),
(8, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 03:27:52', '2020-12-07 03:27:52'),
(9, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 03:37:41', '2020-12-07 03:37:41'),
(10, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 03:55:38', '2020-12-07 03:55:38'),
(11, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 04:16:06', '2020-12-07 04:16:06'),
(12, 9, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 08:39:56', '2020-12-07 08:39:56'),
(13, 10, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 08:42:07', '2020-12-07 08:42:07'),
(14, 12, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 09:16:28', '2020-12-07 09:16:28'),
(15, 13, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 09:20:48', '2020-12-07 09:20:48'),
(16, 14, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 09:25:17', '2020-12-07 09:25:17'),
(17, 15, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 09:28:03', '2020-12-07 09:28:03'),
(18, 16, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 09:40:34', '2020-12-07 09:40:34'),
(19, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 09:55:43', '2020-12-07 09:55:43'),
(20, 16, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 09:56:08', '2020-12-07 09:56:08'),
(21, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 10:11:08', '2020-12-07 10:11:08'),
(22, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 10:11:43', '2020-12-07 10:11:43'),
(23, 16, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 10:12:20', '2020-12-07 10:12:20'),
(24, 17, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 10:41:06', '2020-12-07 10:41:06'),
(25, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 10:42:14', '2020-12-07 10:42:14'),
(26, 17, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 10:43:59', '2020-12-07 10:43:59'),
(27, 18, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 10:59:23', '2020-12-07 10:59:23'),
(28, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 12:01:15', '2020-12-07 12:01:15'),
(29, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 12:40:45', '2020-12-07 12:40:45'),
(30, 18, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-07 12:42:41', '2020-12-07 12:42:41'),
(31, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 03:04:28', '2020-12-08 03:04:28'),
(32, 18, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 03:13:06', '2020-12-08 03:13:06'),
(33, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 03:13:24', '2020-12-08 03:13:24'),
(34, 18, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 04:13:46', '2020-12-08 04:13:46'),
(35, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 04:34:03', '2020-12-08 04:34:03'),
(36, 19, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 04:55:55', '2020-12-08 04:55:55'),
(37, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 04:57:30', '2020-12-08 04:57:30'),
(38, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 04:57:53', '2020-12-08 04:57:53'),
(39, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 04:58:12', '2020-12-08 04:58:12'),
(40, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 04:59:05', '2020-12-08 04:59:05'),
(41, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 04:59:56', '2020-12-08 04:59:56'),
(42, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 05:00:30', '2020-12-08 05:00:30'),
(43, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 05:01:01', '2020-12-08 05:01:01'),
(44, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 05:01:52', '2020-12-08 05:01:52'),
(45, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-08 13:01:01', '2020-12-08 13:01:01'),
(46, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:10:08', '2020-12-09 03:10:08'),
(47, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:33:18', '2020-12-09 03:33:18'),
(48, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:34:11', '2020-12-09 03:34:11'),
(49, 21, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:42:18', '2020-12-09 03:42:18'),
(50, 22, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:45:40', '2020-12-09 03:45:40'),
(51, 23, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:47:21', '2020-12-09 03:47:21'),
(52, 24, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:50:07', '2020-12-09 03:50:07'),
(53, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:51:11', '2020-12-09 03:51:11'),
(54, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 03:59:49', '2020-12-09 03:59:49'),
(55, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 04:33:13', '2020-12-09 04:33:13'),
(56, 21, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 04:36:32', '2020-12-09 04:36:32'),
(57, 22, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 04:37:25', '2020-12-09 04:37:25'),
(58, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 04:54:16', '2020-12-09 04:54:16'),
(59, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 07:56:15', '2020-12-09 07:56:15'),
(60, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 11:00:52', '2020-12-09 11:00:52'),
(61, 22, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 12:23:32', '2020-12-09 12:23:32'),
(62, 21, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 12:47:02', '2020-12-09 12:47:02'),
(63, 21, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 12:47:24', '2020-12-09 12:47:24'),
(64, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 12:47:40', '2020-12-09 12:47:40'),
(65, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 13:10:11', '2020-12-09 13:10:11'),
(66, 25, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 13:23:06', '2020-12-09 13:23:06'),
(67, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 13:23:13', '2020-12-09 13:23:13'),
(68, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-09 13:30:07', '2020-12-09 13:30:07'),
(69, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 03:25:30', '2020-12-10 03:25:30'),
(70, 22, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 03:25:42', '2020-12-10 03:25:42'),
(71, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 03:27:06', '2020-12-10 03:27:06'),
(72, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 04:56:55', '2020-12-10 04:56:55'),
(73, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 08:44:38', '2020-12-10 08:44:38'),
(74, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 10:21:03', '2020-12-10 10:21:03'),
(75, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 10:31:08', '2020-12-10 10:31:08'),
(76, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 11:38:05', '2020-12-10 11:38:05'),
(77, 26, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-10 11:38:42', '2020-12-10 11:38:42'),
(78, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 06:36:17', '2020-12-13 06:36:17'),
(79, 22, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 09:18:45', '2020-12-13 09:18:45'),
(80, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 09:59:49', '2020-12-13 09:59:49'),
(81, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 12:20:46', '2020-12-13 12:20:46'),
(82, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 12:21:09', '2020-12-13 12:21:09'),
(83, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 12:23:14', '2020-12-13 12:23:14'),
(84, 25, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 13:07:02', '2020-12-13 13:07:02'),
(85, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 13:07:16', '2020-12-13 13:07:16'),
(86, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 13:11:29', '2020-12-13 13:11:29'),
(87, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-13 13:11:54', '2020-12-13 13:11:54'),
(88, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 03:07:23', '2020-12-14 03:07:23'),
(89, 27, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 03:18:32', '2020-12-14 03:18:32'),
(90, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 03:18:47', '2020-12-14 03:18:47'),
(91, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 04:21:56', '2020-12-14 04:21:56'),
(92, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 04:59:51', '2020-12-14 04:59:51'),
(93, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 05:11:46', '2020-12-14 05:11:46'),
(94, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 05:56:37', '2020-12-14 05:56:37'),
(95, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 06:00:40', '2020-12-14 06:00:40'),
(96, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 06:45:53', '2020-12-14 06:45:53'),
(97, 27, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 06:47:50', '2020-12-14 06:47:50'),
(98, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 06:49:47', '2020-12-14 06:49:47'),
(99, 27, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 06:54:53', '2020-12-14 06:54:53'),
(100, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 06:55:34', '2020-12-14 06:55:34'),
(101, 28, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 07:59:23', '2020-12-14 07:59:23'),
(102, 28, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 08:09:09', '2020-12-14 08:09:09'),
(103, 28, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 08:35:00', '2020-12-14 08:35:00'),
(104, 27, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 08:35:10', '2020-12-14 08:35:10'),
(105, 28, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 08:36:03', '2020-12-14 08:36:03'),
(106, 27, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 09:05:11', '2020-12-14 09:05:11'),
(107, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 11:38:30', '2020-12-14 11:38:30'),
(108, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 11:40:25', '2020-12-14 11:40:25'),
(109, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-14 12:46:38', '2020-12-14 12:46:38'),
(110, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-15 03:14:50', '2020-12-15 03:14:50'),
(111, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-15 03:20:48', '2020-12-15 03:20:48'),
(112, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-15 04:38:59', '2020-12-15 04:38:59'),
(113, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-15 10:07:05', '2020-12-15 10:07:05'),
(114, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 03:23:34', '2020-12-16 03:23:34'),
(115, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 03:57:27', '2020-12-16 03:57:27'),
(116, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 03:58:13', '2020-12-16 03:58:13'),
(117, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 05:15:54', '2020-12-16 05:15:54'),
(118, 29, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 05:16:58', '2020-12-16 05:16:58'),
(119, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 05:17:38', '2020-12-16 05:17:38'),
(120, 30, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 05:52:15', '2020-12-16 05:52:15'),
(121, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 05:52:55', '2020-12-16 05:52:55'),
(122, 30, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 05:53:55', '2020-12-16 05:53:55'),
(123, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 05:54:05', '2020-12-16 05:54:05'),
(124, 31, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 10:37:21', '2020-12-16 10:37:21'),
(125, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 10:37:54', '2020-12-16 10:37:54'),
(126, 8, '192.168.30.109', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-16 11:21:10', '2020-12-16 11:21:10'),
(127, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 03:09:06', '2020-12-18 03:09:06'),
(128, 27, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 04:30:13', '2020-12-18 04:30:13'),
(129, 32, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 04:31:03', '2020-12-18 04:31:03'),
(130, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 09:06:34', '2020-12-18 09:06:34'),
(131, 33, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 09:07:26', '2020-12-18 09:07:26'),
(132, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 09:42:21', '2020-12-18 09:42:21'),
(133, 20, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 10:55:05', '2020-12-18 10:55:05'),
(134, 27, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 10:55:27', '2020-12-18 10:55:27'),
(135, 32, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 10:55:55', '2020-12-18 10:55:55'),
(136, 33, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 11:57:14', '2020-12-18 11:57:14'),
(137, 28, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 11:59:31', '2020-12-18 11:59:31'),
(138, 34, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 12:00:17', '2020-12-18 12:00:17'),
(139, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-18 12:58:58', '2020-12-18 12:58:58'),
(140, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-20 03:25:46', '2020-12-20 03:25:46'),
(141, 8, '192.168.30.109', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-20 05:16:40', '2020-12-20 05:16:40'),
(142, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-21 03:14:27', '2020-12-21 03:14:27'),
(143, 36, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-21 10:52:16', '2020-12-21 10:52:16'),
(144, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-21 10:52:58', '2020-12-21 10:52:58'),
(145, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-21 10:54:30', '2020-12-21 10:54:30'),
(146, 36, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-21 10:55:24', '2020-12-21 10:55:24'),
(147, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-21 10:58:20', '2020-12-21 10:58:20'),
(148, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 03:21:21', '2020-12-22 03:21:21'),
(149, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 04:55:24', '2020-12-22 04:55:24'),
(150, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 04:57:51', '2020-12-22 04:57:51'),
(151, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 06:52:22', '2020-12-22 06:52:22'),
(152, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 07:38:52', '2020-12-22 07:38:52'),
(153, 8, '192.168.30.109', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 08:37:17', '2020-12-22 08:37:17'),
(154, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 10:39:06', '2020-12-22 10:39:06'),
(155, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 10:42:41', '2020-12-22 10:42:41'),
(156, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 10:44:19', '2020-12-22 10:44:19'),
(157, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 10:45:47', '2020-12-22 10:45:47'),
(158, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 10:52:04', '2020-12-22 10:52:04'),
(159, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 10:56:29', '2020-12-22 10:56:29'),
(160, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 10:58:28', '2020-12-22 10:58:28'),
(161, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 11:00:15', '2020-12-22 11:00:15'),
(162, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 11:02:12', '2020-12-22 11:02:12'),
(163, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 11:45:08', '2020-12-22 11:45:08'),
(164, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 11:45:54', '2020-12-22 11:45:54'),
(165, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 11:55:03', '2020-12-22 11:55:03'),
(166, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 11:55:58', '2020-12-22 11:55:58'),
(167, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 11:57:17', '2020-12-22 11:57:17'),
(168, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 11:58:53', '2020-12-22 11:58:53'),
(169, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 12:01:34', '2020-12-22 12:01:34'),
(170, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 12:07:55', '2020-12-22 12:07:55'),
(171, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 12:34:20', '2020-12-22 12:34:20'),
(172, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 12:38:30', '2020-12-22 12:38:30'),
(173, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-22 12:54:32', '2020-12-22 12:54:32'),
(174, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-23 03:25:00', '2020-12-23 03:25:00'),
(175, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-23 03:51:16', '2020-12-23 03:51:16'),
(176, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-23 03:52:41', '2020-12-23 03:52:41'),
(177, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-23 04:00:12', '2020-12-23 04:00:12'),
(178, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-23 04:00:56', '2020-12-23 04:00:56'),
(179, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-23 04:01:31', '2020-12-23 04:01:31'),
(180, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-23 04:02:30', '2020-12-23 04:02:30'),
(181, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-23 09:49:54', '2020-12-23 09:49:54'),
(182, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-24 06:55:51', '2020-12-24 06:55:51'),
(183, 8, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-24 11:36:28', '2020-12-24 11:36:28'),
(184, 37, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 03:40:27', '2020-12-25 03:40:27'),
(185, 38, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 05:06:57', '2020-12-25 05:06:57'),
(186, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 05:19:05', '2020-12-25 05:19:05'),
(187, 40, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 06:35:37', '2020-12-25 06:35:37'),
(188, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 06:54:08', '2020-12-25 06:54:08'),
(189, 41, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 06:55:51', '2020-12-25 06:55:51'),
(190, 40, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 06:57:00', '2020-12-25 06:57:00'),
(191, 41, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 07:08:33', '2020-12-25 07:08:33'),
(192, 40, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 07:10:28', '2020-12-25 07:10:28'),
(193, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 08:46:09', '2020-12-25 08:46:09'),
(194, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 09:05:10', '2020-12-25 09:05:10'),
(195, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 09:20:24', '2020-12-25 09:20:24'),
(196, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 09:24:25', '2020-12-25 09:24:25'),
(197, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 09:26:03', '2020-12-25 09:26:03'),
(198, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 09:26:27', '2020-12-25 09:26:27'),
(199, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 09:27:15', '2020-12-25 09:27:15'),
(200, 40, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 09:39:50', '2020-12-25 09:39:50'),
(201, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 09:43:04', '2020-12-25 09:43:04'),
(202, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 10:09:59', '2020-12-25 10:09:59'),
(203, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2020-12-25 10:30:22', '2020-12-25 10:30:22'),
(204, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 7', '', '', '', '', '2020-12-24 12:40:11', '2020-12-24 12:40:11'),
(205, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 7', '', '', '', '', '2020-12-25 02:52:21', '2020-12-25 02:52:21'),
(206, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 7', '', '', '', '', '2020-12-25 07:58:59', '2020-12-25 07:58:59'),
(207, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 7', '', '', '', '', '2022-04-03 11:15:10', '2022-04-03 11:15:10'),
(208, 39, '::1', ' - -  -  ', 'Chrome', 'Windows 7', '', '', '', '', '2022-04-04 03:28:16', '2022-04-04 03:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_panel_colors`
--

DROP TABLE IF EXISTS `user_panel_colors`;
CREATE TABLE IF NOT EXISTS `user_panel_colors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `theme_color` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_panel_colors`
--

INSERT INTO `user_panel_colors` (`id`, `user_id`, `theme_color`, `created_at`, `updated_at`) VALUES
(2, 8, 'light dark-sidebar theme-red', '2020-12-16 03:48:23', '2020-12-22 09:44:49'),
(4, 29, 'light light-sidebar theme-white', '2020-12-16 05:16:57', '2020-12-16 05:17:24'),
(5, 30, 'dark dark-sidebar theme-black', '2020-12-16 05:52:15', '2020-12-16 05:52:45'),
(6, 31, 'light light-sidebar theme-white', '2020-12-16 10:37:20', '2020-12-16 10:37:20'),
(7, 32, 'light light-sidebar theme-white', '2020-12-18 04:31:02', '2020-12-18 04:31:02'),
(8, 33, 'light light-sidebar theme-white', '2020-12-18 09:07:25', '2020-12-18 09:07:25'),
(9, 34, 'light light-sidebar theme-white', '2020-12-18 12:00:16', '2020-12-18 12:00:16'),
(10, 36, 'light light-sidebar theme-white', '2020-12-21 10:52:16', '2020-12-21 10:52:16'),
(11, 37, 'light light-sidebar theme-white', '2020-12-22 04:55:23', '2020-12-22 04:55:23'),
(12, 38, 'light light-sidebar theme-white', '2020-12-25 05:06:56', '2020-12-25 05:06:56'),
(13, 39, 'light dark-sidebar theme-red', '2020-12-25 05:19:05', '2020-12-25 05:20:20'),
(14, 40, 'light light-sidebar theme-white', '2020-12-25 06:35:36', '2020-12-25 06:35:36'),
(15, 41, 'light light-sidebar theme-white', '2020-12-25 06:55:50', '2020-12-25 06:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

DROP TABLE IF EXISTS `withdrawals`;
CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `method_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `currency` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_amount` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `after_charge` decimal(18,8) NOT NULL,
  `withdraw_information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `method_id`, `user_id`, `amount`, `currency`, `rate`, `charge`, `trx`, `final_amount`, `after_charge`, `withdraw_information`, `status`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(44, 1, 40, '1000.00000000', 'USD', '0.01179066', '25.00000000', 'WQ5Q93GV5JM2', '11.49589350', '975.00000000', '{\"bank_name\":{\"field_name\":\"sdfsdf\",\"type\":\"text\"},\"account_name\":{\"field_name\":\"sadf\",\"type\":\"text\"},\"account_number\":{\"field_name\":\"sadf\",\"type\":\"text\"},\"screenshoot\":{\"field_name\":\"2020\\/12\\/24\\/5fe51d246eeaf1608850724.png\",\"type\":\"file\"}}', 1, 'popopop', '2020-12-25 06:57:50', '2020-12-25 07:02:31'),
(45, 1, 39, '500.00000000', 'USD', '0.01179127', '15.00000000', 'QOOESFC3QWU2', '5.71876595', '485.00000000', '{\"bank_name\":{\"field_name\":\"visa\",\"type\":\"text\"},\"account_name\":{\"field_name\":\"123\",\"type\":\"text\"},\"account_number\":{\"field_name\":\"123\",\"type\":\"text\"},\"screenshoot\":{\"field_name\":\"2020\\/12\\/25\\/5fe5aa320d1df1608886834.jpg\",\"type\":\"file\"}}', 1, 'Good Job \r\n!', '2020-12-25 03:00:17', '2020-12-25 03:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

DROP TABLE IF EXISTS `withdraw_methods`;
CREATE TABLE IF NOT EXISTS `withdraw_methods` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_limit` decimal(18,8) DEFAULT NULL,
  `max_limit` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `delay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` decimal(18,8) DEFAULT NULL,
  `rate` decimal(18,8) DEFAULT NULL,
  `percent_charge` decimal(5,2) DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `name`, `image`, `min_limit`, `max_limit`, `delay`, `fixed_charge`, `rate`, `percent_charge`, `currency`, `user_data`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank Wire', '5f6f1f98d88b41601118104.jpg', '10.00000000', '2000.00000000', '1-2 hours', '5.00000000', '0.01179127', '2.00', 'USD', '{\"bank_name\":{\"field_name\":\"bank_name\",\"field_level\":\"Bank Name\",\"type\":\"text\",\"validation\":\"required\"},\"account_name\":{\"field_name\":\"account_name\",\"field_level\":\"Account Name\",\"type\":\"text\",\"validation\":\"required\"},\"account_number\":{\"field_name\":\"account_number\",\"field_level\":\"Account Number\",\"type\":\"text\",\"validation\":\"required\"},\"screenshoot\":{\"field_name\":\"screenshoot\",\"field_level\":\"Screenshoot\",\"type\":\"file\",\"validation\":\"required\"}}', '<div><br></div>Please Provide The information Below:<br>', 1, '2020-06-22 04:59:14', '2020-12-25 08:45:33'),
(2, 'Mobile Money', '5f6f1fa9268c31601118121.jpg', '10.00000000', '1000.00000000', '1-2 Hours', '0.00000000', '0.01179127', '0.01', 'USD', '{\"mobile_number\":{\"field_name\":\"mobile_number\",\"field_level\":\"Mobile Number\",\"type\":\"text\",\"validation\":\"required\"}}', 'Please Provide The information Below:<br>', 1, '2020-06-22 23:39:15', '2020-12-25 08:45:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
