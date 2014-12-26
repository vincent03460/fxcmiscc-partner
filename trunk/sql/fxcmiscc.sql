-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2014 at 12:50 AM
-- Server version: 5.6.11
-- PHP Version: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fxcmiscc`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_login_log`
--

CREATE TABLE IF NOT EXISTS `app_login_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_ip` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remark` text,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE IF NOT EXISTS `app_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_parameter` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8_unicode_ci NOT NULL,
  `setting_remark` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `app_setting`
--

INSERT INTO `app_setting` (`setting_id`, `setting_parameter`, `setting_value`, `setting_remark`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(2, 'SERVER_MAINTAIN', '0', '0 = can login\n1 = cannot login', 0, '2012-03-05 00:00:00', 0, '2012-03-05 00:00:00'),
(3, 'SYSTEM_CURRENCY', 'USD', 'SYSTEM CURRENCY', 0, '2012-05-31 17:41:01', 0, '2012-05-31 17:41:04'),
(6, 'BANK_NAME', 'ABC Bank', 'BANK NAME', 0, '2012-06-01 06:12:02', 0, '2012-11-17 15:11:03'),
(7, 'BANK_SWIFT_CODE', 'ABCEDASDA', 'BANK SWIFT CODE', 0, '2012-06-01 06:12:02', 0, '2012-11-17 15:11:03'),
(8, 'BANK_ACCOUNT_HOLDER', 'FX-CMISC', 'BANK ACCOUNT HOLDER', 0, '2012-06-01 06:12:02', 0, '2012-11-17 15:11:03'),
(9, 'BANK_ACCOUNT_NUMBER', '1234524947', 'BANK ACCOUNT NUMBER', 0, '2012-06-01 06:12:02', 0, '2012-11-17 15:11:03'),
(10, 'CITY_OF_BANK', 'York and Market Street', 'CITY OF BANK', 0, '2012-06-01 06:12:02', 0, '2012-11-17 15:11:03'),
(11, 'COUNTRY_OF_BANK', 'Australia', 'COUNTRY OF BANK', 0, '2012-06-01 06:12:02', 0, '2012-11-17 15:11:03'),
(12, 'IBAN', '012-345', 'IBAN CODE', 0, '2012-12-06 00:00:00', 0, '2012-12-06 00:00:00'),
(13, 'MT4_ID', '2528672', '', 0, '2014-12-19 00:00:00', 0, '2014-12-25 22:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE IF NOT EXISTS `app_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `keep_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userpassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `keep_password2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userpassword2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_datetime` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `access_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`user_id`, `username`, `keep_password`, `userpassword`, `keep_password2`, `userpassword2`, `user_role`, `status_code`, `last_login_datetime`, `created_by`, `created_on`, `updated_by`, `updated_on`, `access_ip`, `remark`) VALUES
(1, '8888', '229988', '229988', 'admin123', 'admin123', 'ADMIN', 'ACTIVE', '2013-11-04 23:49:29', 0, '2012-03-04 17:37:32', 0, '2013-11-04 23:49:29', '14.192.208.21', NULL),
(2, 'money', 'money123', '888111', 'money123', 'money123', 'ADMIN', 'ACTIVE', NULL, 0, '2012-03-04 17:37:32', 0, '2014-06-07 21:11:04', NULL, NULL),
(3, '001', 'abc123', 'money8888', 'abc123', 'money111', 'DISTRIBUTOR', 'ACTIVE', '2014-12-27 00:46:08', 0, '2013-03-12 08:41:53', 0, '2014-12-27 00:46:08', '::1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_access`
--

CREATE TABLE IF NOT EXISTS `app_user_access` (
  `access_code` varchar(50) CHARACTER SET latin1 NOT NULL,
  `parent_id` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `menu_url` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `menu_label` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `is_menu` varchar(1) CHARACTER SET latin1 NOT NULL,
  `is_auth_needed` varchar(1) CHARACTER SET latin1 NOT NULL,
  `tree_level` int(11) DEFAULT NULL,
  `tree_seq` int(11) DEFAULT NULL,
  `tree_structure` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status_code` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`access_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_user_access`
--

INSERT INTO `app_user_access` (`access_code`, `parent_id`, `menu_url`, `menu_label`, `is_menu`, `is_auth_needed`, `tree_level`, `tree_seq`, `tree_structure`, `status_code`, `created_on`, `updated_on`) VALUES
('AL_CHANGE_PASSWORD', 'MOD_ADMIN', 'admin/changePassword', 'Change Password', 'Y', 'Y', 2, 1030, 'MOD_ADMIN|AL_CHANGE_PASSWORD', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_DIST_LIST', 'MOD_MARKETING', 'marketing/distList', 'Distributor List', 'Y', 'Y', 2, 2010, 'MOD_MARKETING|AL_DIST_LIST', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_ECASH_WITHDRAWAL', 'MOD_FINANCE', 'finance/ecashWithdrawal', 'e-Cash Withdrawal', 'Y', 'Y', 2, 3009, 'MOD_FINANCE|AL_ECASH_WITHDRAWAL', 'ACTIVE', '2012-12-21 09:55:35', '2012-12-21 09:55:35'),
('AL_EPOINT_PURCHASE', 'MOD_FINANCE', 'finance/epointPurchase', 'e-Point Purchase', 'Y', 'Y', 2, 3010, 'MOD_FINANCE|AL_EPOINT_PURCHASE', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_EPOINT_TRANSFER', 'MOD_FINANCE', 'finance/epointTransfer', 'e-Point Transfer', 'Y', 'Y', 2, 3020, 'MOD_FINANCE|AL_EPOINT_TRANSFER', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_MT4_WITHDRAWAL', 'MOD_FINANCE', 'finance/mt4Withdrawal', 'MT4 Withdrawal', 'Y', 'Y', 2, 3080, 'MOD_FINANCE|AL_MT4_WITHDRAWAL', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_PACKAGE', 'MOD_ADMIN', 'admin/packageList', 'Package', 'Y', 'Y', 2, 1050, 'MOD_ADMIN|AL_PACKAGE', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_PACKAGE_PURCHASE', 'MOD_FINANCE', 'finance/packagePurchase', 'Package Purchase', 'Y', 'Y', 2, 3030, 'MOD_FINANCE|AL_PACKAGE_PURCHASE', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_PACKAGE_UPGRADE', 'MOD_FINANCE', 'finance/packageUpgradeHistory', 'Package Upgrade History', 'Y', 'Y', 2, 3040, 'MOD_FINANCE|AL_PACKAGE_UPGRADE', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_PIPS_BONUS', 'MOD_FINANCE', 'finance/pipsBonusDetail', 'Pips Bonus', 'Y', 'Y', 2, 3070, 'MOD_FINANCE|AL_PIPS_BONUS', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_PIPS_CALCULATOR', 'MOD_MARKETING', 'marketing/pipsUpload', 'Pips Upload', 'Y', 'Y', 2, 2040, 'MOD_MARKETING|AL_PIPS_CALCULATOR', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_READONLY', 'MOD_READONLY', '', 'All Module Readonly', 'Y', 'Y', 2, 5010, 'MOD_READONLY|AL_READONLY', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REFERRAL_BONUS', 'MOD_FINANCE', 'finance/referralBonus', 'Referral Bonus', 'Y', 'Y', 2, 3060, 'MOD_FINANCE|AL_REFERRAL_BONUS', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_RELOAD_MT4_FUND', 'MOD_FINANCE', 'finance/reloadMt4Fund', 'Reload MT4 Fund', 'Y', 'Y', 2, 3050, 'MOD_FINANCE|AL_RELOAD_MT4_FUND', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_CONVERT_ECASH_TO_EPOINT', 'MOD_REPORT', 'report/convertEcashToEpoint', 'Convert e-Cash To e-Point', 'Y', 'Y', 2, 4010, 'MOD_REPORT|AL_REPORT_CONVERT_ECASH_TO_EPOINT', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_EPOINT_TRANSFER', 'MOD_REPORT', 'report/epointTransfer', 'e-Point Transfer', 'Y', 'Y', 2, 4020, 'MOD_REPORT|AL_REPORT_EPOINT_TRANSFER', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_GROUP_SALES', 'MOD_REPORT', 'report/groupSales', 'Group Sales', 'Y', 'Y', 2, 4030, 'MOD_REPORT|AL_REPORT_GROUP_SALES', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_INDIVIDUAL_TRADER_SALES', 'MOD_REPORT', 'report/individualTraderSales', 'Individual Trader Sales', 'Y', 'Y', 2, 4040, 'MOD_REPORT|AL_REPORT_INDIVIDUAL_TRADER_SALES', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_MT4_WITHDRAWAL', 'MOD_REPORT', 'report/mt4Withdrawal', 'MT4 Withdrawal', 'Y', 'Y', 2, 4050, 'MOD_REPORT|AL_REPORT_MT4_WITHDRAWAL', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_PACKAGE_PURCHASE', 'MOD_REPORT', 'report/packagePurchase', 'Package Purchase', 'Y', 'Y', 2, 4080, 'MOD_REPORT|AL_REPORT_PACKAGE_PURCHASE', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_PACKAGE_UPGRADE', 'MOD_REPORT', 'report/packageUpgrade', 'Package Upgrade', 'Y', 'Y', 2, 4090, 'MOD_REPORT|AL_REPORT_PACKAGE_UPGRADE', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_REFERRAL_BONUS', 'MOD_REPORT', 'report/referralBonus', 'Referral Bonus', 'Y', 'Y', 2, 4060, 'MOD_REPORT|AL_REPORT_REFERRAL_BONUS', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_TOTAL_MT4_RELOAD', 'MOD_REPORT', 'report/totalMt4Reload', 'Total Mt4 Reload', 'Y', 'Y', 2, 4070, 'MOD_REPORT|AL_REPORT_TOTAL_MT4_RELOAD', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_REPORT_TOTAL_VOLUME_TRADED', 'MOD_REPORT', 'report/totalVolumeTraded', 'Total Volume Traded', 'Y', 'Y', 2, 4100, 'MOD_REPORT|AL_REPORT_TOTAL_VOLUME_TRADED', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('AL_SETTING', 'MOD_ADMIN', 'admin/applicationSetting', 'Application Setting', 'Y', 'Y', 2, 1040, 'MOD_ADMIN|AL_SETTING', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_SPONSOR_TREE', 'MOD_MARKETING', 'marketing/sponsorTree', 'Sponsor Tree', 'Y', 'Y', 2, 2030, 'MOD_MARKETING|AL_SPONSOR_TREE', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_SUPER_IB_LIST', 'MOD_MARKETING', 'marketing/superIbList', 'Super IB Listing', 'Y', 'Y', 2, 2020, 'MOD_MARKETING|AL_SUPER_IB_LIST', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_USER_LIST', 'MOD_ADMIN', 'admin/userList', 'User List', 'Y', 'Y', 2, 1010, 'MOD_ADMIN|AL_USER_LIST', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('AL_USER_ROLE', 'MOD_ADMIN', 'admin/userRole', 'User Role', 'Y', 'Y', 2, 1020, 'MOD_ADMIN|AL_USER_ROLE', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('MOD_ADMIN', NULL, '', 'Admin', 'Y', 'Y', 1, 1000, 'MOD_ADMIN', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('MOD_FINANCE', NULL, '', 'Finance', 'Y', 'Y', 1, 3000, 'MOD_FINANCE', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('MOD_MARKETING', NULL, '', 'Marketing', 'Y', 'Y', 1, 2000, 'MOD_MARKETING', 'ACTIVE', '2012-07-30 09:55:34', '2012-07-30 09:55:34'),
('MOD_READONLY', NULL, '', 'Readonly', 'Y', 'Y', 1, 5000, 'MOD_READONLY', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35'),
('MOD_REPORT', NULL, '', 'Report', 'Y', 'Y', 1, 4000, 'MOD_REPORT', 'ACTIVE', '2012-07-30 09:55:35', '2012-07-30 09:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `app_user_in_role`
--

CREATE TABLE IF NOT EXISTS `app_user_in_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED AUTO_INCREMENT=3 ;

--
-- Dumping data for table `app_user_in_role`
--

INSERT INTO `app_user_in_role` (`user_role_id`, `user_id`, `role_id`, `created_on`, `updated_on`) VALUES
(1, -1, 1, '2011-10-20 00:00:00', '2011-10-20 00:00:00'),
(2, -2, 2, '2011-10-20 00:00:00', '2011-10-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `app_user_role`
--

CREATE TABLE IF NOT EXISTS `app_user_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_code` varchar(20) CHARACTER SET latin1 NOT NULL,
  `role_desc` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status_code` varchar(10) CHARACTER SET latin1 NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- Dumping data for table `app_user_role`
--

INSERT INTO `app_user_role` (`role_id`, `role_code`, `role_desc`, `status_code`, `created_by`, `created_on`, `updated_on`) VALUES
(1, 'finance', 'finance role', 'active', -1, '2011-10-19 00:00:00', '2011-10-19 00:00:00'),
(2, 'admin', 'admin role', 'active', -1, '2011-10-19 00:00:00', '2011-10-19 00:00:00'),
(3, 'test', 'test role', 'active', -1, '2011-10-19 23:02:20', '2011-10-19 23:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `app_user_role_access`
--

CREATE TABLE IF NOT EXISTS `app_user_role_access` (
  `role_access_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_code` varchar(50) CHARACTER SET latin1 NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`role_access_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=412 ;

--
-- Dumping data for table `app_user_role_access`
--

INSERT INTO `app_user_role_access` (`role_access_id`, `access_code`, `role_id`, `created_on`, `updated_on`) VALUES
(28, 'MOD_ADMIN', 3, '2011-10-19 23:33:53', '2011-10-19 23:33:53'),
(29, 'AL_USER_LIST', 3, '2011-10-19 23:33:53', '2011-10-19 23:33:53'),
(277, 'MOD_ADMIN', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(278, 'AL_USER_LIST', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(279, 'AL_USER_ROLE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(280, 'AL_CHANGE_PASSWORD', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(281, 'AL_SETTING', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(282, 'AL_PACKAGE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(283, 'MOD_MARKETING', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(284, 'AL_DIST_LIST', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(285, 'AL_SPONSOR_TREE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(286, 'AL_PIPS_CALCULATOR', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(287, 'MOD_FINANCE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(288, 'AL_ECASH_WITHDRAWAL', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(289, 'AL_EPOINT_PURCHASE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(290, 'AL_EPOINT_TRANSFER', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(291, 'AL_PACKAGE_PURCHASE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(292, 'AL_PACKAGE_UPGRADE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(293, 'AL_RELOAD_MT4_FUND', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(294, 'AL_REFERRAL_BONUS', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(295, 'AL_PIPS_BONUS', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(296, 'AL_MT4_WITHDRAWAL', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(297, 'MOD_REPORT', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(298, 'AL_REPORT_CONVERT_ECASH_TO_EPOINT', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(299, 'AL_REPORT_EPOINT_TRANSFER', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(300, 'AL_REPORT_GROUP_SALES', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(301, 'AL_REPORT_INDIVIDUAL_TRADER_SALES', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(302, 'AL_REPORT_MT4_WITHDRAWAL', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(303, 'AL_REPORT_REFERRAL_BONUS', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(304, 'AL_REPORT_TOTAL_MT4_RELOAD', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(305, 'AL_REPORT_PACKAGE_PURCHASE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(306, 'AL_REPORT_PACKAGE_UPGRADE', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(307, 'AL_REPORT_TOTAL_VOLUME_TRADED', 2, '2012-12-21 11:39:41', '2012-12-21 11:39:41'),
(393, 'MOD_ADMIN', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(394, 'AL_CHANGE_PASSWORD', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(395, 'AL_SETTING', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(396, 'AL_PACKAGE', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(397, 'MOD_MARKETING', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(398, 'AL_DIST_LIST', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(399, 'AL_SPONSOR_TREE', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(400, 'MOD_FINANCE', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(401, 'AL_ECASH_WITHDRAWAL', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(402, 'AL_EPOINT_PURCHASE', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(403, 'AL_EPOINT_TRANSFER', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(404, 'AL_PACKAGE_PURCHASE', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(405, 'AL_PACKAGE_UPGRADE', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(406, 'AL_RELOAD_MT4_FUND', 1, '2014-05-13 21:57:39', '2014-05-13 21:57:39'),
(407, 'AL_REFERRAL_BONUS', 1, '2014-05-13 21:57:40', '2014-05-13 21:57:40'),
(408, 'AL_PIPS_BONUS', 1, '2014-05-13 21:57:40', '2014-05-13 21:57:40'),
(409, 'AL_MT4_WITHDRAWAL', 1, '2014-05-13 21:57:40', '2014-05-13 21:57:40'),
(410, 'MOD_READONLY', 1, '2014-05-13 21:57:40', '2014-05-13 21:57:40'),
(411, 'AL_READONLY', 1, '2014-05-13 21:57:40', '2014-05-13 21:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `demo_dist_commission_ledger`
--

CREATE TABLE IF NOT EXISTS `demo_dist_commission_ledger` (
  `commission_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `commission_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `month_traded` int(11) DEFAULT NULL,
  `year_traded` int(4) DEFAULT NULL,
  `credit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `debit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(12,2) NOT NULL DEFAULT '0.00',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pips_downline_username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pips_mt4_id` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pips_rebate` decimal(12,2) DEFAULT NULL,
  `pips_level` int(11) DEFAULT NULL,
  `pips_lots_traded` decimal(12,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`commission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `demo_file_download`
--

CREATE TABLE IF NOT EXISTS `demo_file_download` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `demo_pip_csv`
--

CREATE TABLE IF NOT EXISTS `demo_pip_csv` (
  `pip_id` int(11) NOT NULL AUTO_INCREMENT,
  `month_traded` int(11) DEFAULT NULL,
  `year_traded` int(4) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `pips_string` text COLLATE utf8_unicode_ci,
  `login_id` int(11) DEFAULT NULL,
  `login_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deposit` decimal(12,2) DEFAULT NULL,
  `withdraw` decimal(12,2) DEFAULT NULL,
  `in_out` decimal(12,2) DEFAULT NULL,
  `credit` decimal(12,2) DEFAULT NULL,
  `volume` decimal(12,2) DEFAULT NULL,
  `commission` decimal(12,2) DEFAULT NULL,
  `taxes` decimal(12,2) DEFAULT NULL,
  `agent` decimal(12,2) DEFAULT NULL,
  `storage` decimal(12,2) DEFAULT NULL,
  `profit` decimal(12,2) DEFAULT NULL,
  `last_balance` decimal(12,2) DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`pip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_contact`
--

CREATE TABLE IF NOT EXISTS `email_contact` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `send_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email_id`),
  KEY `receiver_email` (`receiver_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_account_ledger`
--

CREATE TABLE IF NOT EXISTS `mlm_account_ledger` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `account_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `credit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `debit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(12,2) NOT NULL DEFAULT '0.00',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `internal_remark` text COLLATE utf8_unicode_ci,
  `ref_id` int(11) DEFAULT NULL,
  `ref_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `dist_id` (`dist_id`,`account_type`),
  KEY `dist_id_2` (`dist_id`,`account_type`,`transaction_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_admin`
--

CREATE TABLE IF NOT EXISTS `mlm_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mlm_admin`
--

INSERT INTO `mlm_admin` (`admin_id`, `admin_code`, `user_id`, `status_code`, `admin_role`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '8888', 1, 'ACTIVE', 'SUPERADMIN', 0, '2012-03-04 17:37:32', 0, '2012-03-04 17:37:32'),
(2, 'forexadmin', 2, 'ACTIVE', 'finance', 0, '2012-03-04 17:37:32', 2, '2014-05-13 21:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_announcement`
--

CREATE TABLE IF NOT EXISTS `mlm_announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_cn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content_cn` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content_jp` longtext COLLATE utf8_unicode_ci,
  `short_content` text COLLATE utf8_unicode_ci,
  `short_content_cn` text COLLATE utf8_unicode_ci,
  `short_content_jp` text COLLATE utf8_unicode_ci,
  `status_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_customer_enquiry`
--

CREATE TABLE IF NOT EXISTS `mlm_customer_enquiry` (
  `enquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `distributor_id` int(11) NOT NULL,
  `contact_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_read` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_updated` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `distributor_read` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `distributor_updated` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_customer_enquiry_detail`
--

CREATE TABLE IF NOT EXISTS `mlm_customer_enquiry_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_enquiry_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `reply_from` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_daily_bonus_log`
--

CREATE TABLE IF NOT EXISTS `mlm_daily_bonus_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bonus_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bonus_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_daily_dist_mt4_credit`
--

CREATE TABLE IF NOT EXISTS `mlm_daily_dist_mt4_credit` (
  `credit_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `mt4_user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mt4_credit` decimal(12,2) DEFAULT NULL,
  `traded_datetime` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`credit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_daily_pips_csv`
--

CREATE TABLE IF NOT EXISTS `mlm_daily_pips_csv` (
  `pip_id` int(11) NOT NULL AUTO_INCREMENT,
  `traded_datetime` datetime DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `pips_string` text COLLATE utf8_unicode_ci,
  `login_id` int(11) DEFAULT NULL,
  `login_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(12,2) DEFAULT NULL,
  `credit` decimal(12,2) DEFAULT NULL,
  `commissions` decimal(12,2) DEFAULT NULL,
  `taxes` decimal(12,2) DEFAULT NULL,
  `storage` decimal(12,2) DEFAULT NULL,
  `profit` decimal(12,2) DEFAULT NULL,
  `interest` decimal(12,2) DEFAULT NULL,
  `tax` decimal(12,2) DEFAULT NULL,
  `unrealizedPL` decimal(12,2) DEFAULT NULL,
  `equity` decimal(12,2) DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`pip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_daily_pips_file`
--

CREATE TABLE IF NOT EXISTS `mlm_daily_pips_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_debit_account`
--

CREATE TABLE IF NOT EXISTS `mlm_debit_account` (
  `debit_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`debit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_distributor`
--

CREATE TABLE IF NOT EXISTS `mlm_distributor` (
  `distributor_id` int(11) NOT NULL AUTO_INCREMENT,
  `distributor_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mt4_investor_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `internal_remark` text COLLATE utf8_unicode_ci,
  `status_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mt4_user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mt4_password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ic` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternate_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_acc_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_holder_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_swift_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visa_debit_card` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ezy_cash_card` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tree_level` int(4) DEFAULT NULL,
  `tree_structure` text COLLATE utf8_unicode_ci,
  `placement_tree_level` int(4) DEFAULT NULL,
  `placement_tree_structure` text COLLATE utf8_unicode_ci,
  `init_rank_id` int(11) DEFAULT NULL,
  `init_rank_code` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upline_dist_id` int(11) DEFAULT NULL,
  `upline_dist_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tree_upline_dist_id` int(11) DEFAULT NULL,
  `tree_upline_dist_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_left` int(11) DEFAULT '0',
  `total_right` int(11) DEFAULT '0',
  `placement_position` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `placement_datetime` datetime DEFAULT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `promax_rank_id` int(11) DEFAULT NULL,
  `rank_code` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mt4_rank_id` int(11) DEFAULT NULL,
  `active_datetime` datetime DEFAULT NULL,
  `activated_by` int(11) DEFAULT NULL,
  `leverage` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spread` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deposit_currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deposit_amount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sign_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sign_date` datetime DEFAULT NULL,
  `term_condition` int(1) DEFAULT '0',
  `ib_commission` decimal(12,2) NOT NULL DEFAULT '0.00',
  `is_ib` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `package_purchase_flag` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `file_bank_pass_book` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_proof_of_residence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_nric` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excluded_structure` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `product_mte` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `product_fxgold` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `register_remark` text COLLATE utf8_unicode_ci,
  `loan_account` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `diamond_downline_id` text COLLATE utf8_unicode_ci,
  `diamond_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diamond_date_start` datetime DEFAULT NULL,
  `diamond_date_end` datetime DEFAULT NULL,
  `diamond_date_achieve` datetime DEFAULT NULL,
  `diamond_sales` decimal(12,2) DEFAULT NULL,
  `vip_downline_id` text COLLATE utf8_unicode_ci,
  `vip_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vip_date_start` datetime DEFAULT NULL,
  `vip_date_end` datetime DEFAULT NULL,
  `vip_date_achieve` datetime DEFAULT NULL,
  `vip_sales` decimal(12,2) DEFAULT NULL,
  `degold_downline_id` text COLLATE utf8_unicode_ci,
  `degold_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degold_date_start` datetime DEFAULT NULL,
  `degold_date_end` datetime DEFAULT NULL,
  `degold_date_achieve` datetime DEFAULT NULL,
  `degold_sales` decimal(12,2) DEFAULT NULL,
  `additional_sales` decimal(12,2) DEFAULT '0.00',
  PRIMARY KEY (`distributor_id`),
  KEY `distributor_code` (`distributor_code`),
  KEY `upline_dist_id` (`upline_dist_id`),
  KEY `tree_upline_dist_id` (`tree_upline_dist_id`),
  KEY `distributor_code_2` (`distributor_code`,`status_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mlm_distributor`
--

INSERT INTO `mlm_distributor` (`distributor_id`, `distributor_code`, `user_id`, `account_type`, `mt4_investor_password`, `internal_remark`, `status_code`, `full_name`, `nickname`, `mt4_user_name`, `mt4_password`, `ic`, `country`, `address`, `address2`, `city`, `state`, `postcode`, `email`, `alternate_email`, `contact`, `gender`, `dob`, `bank_name`, `bank_acc_no`, `bank_holder_name`, `bank_swift_code`, `bank_branch`, `bank_address`, `visa_debit_card`, `ezy_cash_card`, `tree_level`, `tree_structure`, `placement_tree_level`, `placement_tree_structure`, `init_rank_id`, `init_rank_code`, `upline_dist_id`, `upline_dist_code`, `tree_upline_dist_id`, `tree_upline_dist_code`, `total_left`, `total_right`, `placement_position`, `placement_datetime`, `rank_id`, `promax_rank_id`, `rank_code`, `mt4_rank_id`, `active_datetime`, `activated_by`, `leverage`, `spread`, `deposit_currency`, `deposit_amount`, `sign_name`, `sign_date`, `term_condition`, `ib_commission`, `is_ib`, `created_by`, `created_on`, `updated_by`, `updated_on`, `package_purchase_flag`, `file_bank_pass_book`, `file_proof_of_residence`, `file_nric`, `excluded_structure`, `product_mte`, `product_fxgold`, `remark`, `register_remark`, `loan_account`, `diamond_downline_id`, `diamond_status`, `diamond_date_start`, `diamond_date_end`, `diamond_date_achieve`, `diamond_sales`, `vip_downline_id`, `vip_status`, `vip_date_start`, `vip_date_end`, `vip_date_achieve`, `vip_sales`, `degold_downline_id`, `degold_status`, `degold_date_start`, `degold_date_end`, `degold_date_achieve`, `degold_sales`, `additional_sales`) VALUES
(1, '001', 3, NULL, NULL, NULL, 'ACTIVE', 'fxcmisc', 'fxcmisc', '001', 'test123', '123', 'Singapore', '123', '', '', '', '', 'r9jason@gmail.com', NULL, '12345678900', '', NULL, '', '', '', '', '', '', '', NULL, 1, '|1|', 1, '|1|', 33, 'DEGOLD', NULL, '', NULL, '', 0, 0, NULL, '2012-12-29 15:53:00', 33, 33, 'DEGOLD', 33, '2012-12-29 15:53:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0.00', '1', 0, '2012-12-29 15:53:00', 3, '2014-11-20 04:12:16', 'N', NULL, NULL, NULL, 'N', 'N', 'Y', NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_dist_commission_ledger`
--

CREATE TABLE IF NOT EXISTS `mlm_dist_commission_ledger` (
  `commission_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `commission_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `month_traded` int(11) DEFAULT NULL,
  `year_traded` int(4) DEFAULT NULL,
  `credit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `debit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(12,2) NOT NULL DEFAULT '0.00',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pips_downline_username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pips_mt4_id` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pips_rebate` decimal(12,2) DEFAULT NULL,
  `pips_level` int(11) DEFAULT NULL,
  `pips_lots_traded` decimal(12,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`commission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_dist_epoint_purchase`
--

CREATE TABLE IF NOT EXISTS `mlm_dist_epoint_purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `currency_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'USD',
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `transaction_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_reference` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(1) DEFAULT '1',
  `bank_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_create_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_start` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_expire` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approve_reject_datetime` datetime DEFAULT NULL,
  `approved_by_userid` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `payment_method` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pg_success` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pg_msg` text COLLATE utf8_unicode_ci,
  `pg_bill_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pg_ret_encode_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pg_currency_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pg_signature` text COLLATE utf8_unicode_ci,
  `return_string` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`purchase_id`),
  KEY `dist_id` (`dist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_dist_mt4`
--

CREATE TABLE IF NOT EXISTS `mlm_dist_mt4` (
  `mt4_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `mt4_user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mt4_password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`mt4_id`),
  KEY `dist_id` (`dist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_dist_package_purchase`
--

CREATE TABLE IF NOT EXISTS `mlm_dist_package_purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `rank_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `transaction_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approve_reject_datetime` datetime DEFAULT NULL,
  `approved_by_userid` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_dist_pairing`
--

CREATE TABLE IF NOT EXISTS `mlm_dist_pairing` (
  `pairing_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `left_balance` int(11) NOT NULL DEFAULT '0',
  `right_balance` int(11) NOT NULL DEFAULT '0',
  `flush_limit` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`pairing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_dist_pairing_ledger`
--

CREATE TABLE IF NOT EXISTS `mlm_dist_pairing_ledger` (
  `pairing_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `left_right` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `credit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `debit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(12,2) NOT NULL DEFAULT '0.00',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`pairing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10185 ;

--
-- Dumping data for table `mlm_dist_pairing_ledger`
--

INSERT INTO `mlm_dist_pairing_ledger` (`pairing_id`, `dist_id`, `left_right`, `transaction_type`, `credit`, `debit`, `balance`, `remark`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(10184, 1, 'LEFT', 'REGISTER', '100.00', '0.00', '100.00', 'PAIRING POINT AMOUNT (fxm211)', 3, '2013-02-26 15:06:55', 3, '2013-02-26 15:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_ecash_withdraw`
--

CREATE TABLE IF NOT EXISTS `mlm_ecash_withdraw` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `deduct` decimal(12,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bank_in_to` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approve_reject_datetime` datetime DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`withdraw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_file_download`
--

CREATE TABLE IF NOT EXISTS `mlm_file_download` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_src` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_member_application`
--

CREATE TABLE IF NOT EXISTS `mlm_member_application` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `status_code` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_member_questionnaire`
--

CREATE TABLE IF NOT EXISTS `mlm_member_questionnaire` (
  `questionnaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `q1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `q2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `q3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `q4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `q5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `q6` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `q7` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `q8` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`questionnaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_mt4_reload_fund`
--

CREATE TABLE IF NOT EXISTS `mlm_mt4_reload_fund` (
  `reload_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `mt4_user_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approve_reject_datetime` datetime DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`reload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_mt4_withdraw`
--

CREATE TABLE IF NOT EXISTS `mlm_mt4_withdraw` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `mt4_user_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `amount_requested` decimal(12,2) NOT NULL DEFAULT '0.00',
  `handling_fee` decimal(12,2) DEFAULT NULL,
  `grand_amount` decimal(12,2) DEFAULT NULL,
  `currency_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approve_reject_datetime` datetime DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`withdraw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_package`
--

CREATE TABLE IF NOT EXISTS `mlm_package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commission` decimal(12,2) DEFAULT NULL,
  `monthly_roi` decimal(12,2) DEFAULT NULL,
  `pips_gen` decimal(12,2) DEFAULT NULL,
  `public_purchase` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `leader_bonus` decimal(12,2) DEFAULT NULL,
  `pips` decimal(12,2) DEFAULT NULL,
  `generation` decimal(12,2) DEFAULT NULL,
  `pips2` decimal(12,2) DEFAULT NULL,
  `generation2` decimal(12,2) DEFAULT NULL,
  `pips3` decimal(12,2) DEFAULT NULL,
  `generation3` decimal(12,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_package_challenge`
--

CREATE TABLE IF NOT EXISTS `mlm_package_challenge` (
  `challenge_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `challenge_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `total_sales` decimal(12,2) NOT NULL DEFAULT '0.00',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `internal_remark` text COLLATE utf8_unicode_ci,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`challenge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_package_pips`
--

CREATE TABLE IF NOT EXISTS `mlm_package_pips` (
  `pips_id` int(11) NOT NULL AUTO_INCREMENT,
  `totol_sponsor` int(11) NOT NULL,
  `pips` decimal(12,2) DEFAULT NULL,
  `generation` decimal(12,2) DEFAULT NULL,
  `pips2` decimal(12,2) DEFAULT NULL,
  `generation2` decimal(12,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`pips_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_package_promax`
--

CREATE TABLE IF NOT EXISTS `mlm_package_promax` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commission` decimal(12,2) DEFAULT NULL,
  `monthly_roi` decimal(12,2) DEFAULT NULL,
  `pips_gen` decimal(12,2) DEFAULT NULL,
  `public_purchase` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `pips` decimal(12,2) DEFAULT NULL,
  `generation` decimal(12,2) DEFAULT NULL,
  `pips2` decimal(12,2) DEFAULT NULL,
  `generation2` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_package_upgrade_history`
--

CREATE TABLE IF NOT EXISTS `mlm_package_upgrade_history` (
  `upgrade_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `mt4_user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mt4_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `status_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`upgrade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_pip_csv`
--

CREATE TABLE IF NOT EXISTS `mlm_pip_csv` (
  `pip_id` int(11) NOT NULL AUTO_INCREMENT,
  `month_traded` int(11) DEFAULT NULL,
  `year_traded` int(4) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `pips_string` text COLLATE utf8_unicode_ci,
  `login_id` int(11) DEFAULT NULL,
  `login_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deposit` decimal(12,2) DEFAULT NULL,
  `withdraw` decimal(12,2) DEFAULT NULL,
  `in_out` decimal(12,2) DEFAULT NULL,
  `credit` decimal(12,2) DEFAULT NULL,
  `volume` decimal(12,2) DEFAULT NULL,
  `commission` decimal(12,2) DEFAULT NULL,
  `taxes` decimal(12,2) DEFAULT NULL,
  `agent` decimal(12,2) DEFAULT NULL,
  `storage` decimal(12,2) DEFAULT NULL,
  `profit` decimal(12,2) DEFAULT NULL,
  `last_balance` decimal(12,2) DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`pip_id`),
  KEY `file_id` (`file_id`),
  KEY `file_id_2` (`file_id`,`status_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_roi_dividend`
--

CREATE TABLE IF NOT EXISTS `mlm_roi_dividend` (
  `devidend_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) DEFAULT NULL,
  `mt4_user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idx` int(11) DEFAULT NULL,
  `account_ledger_id` int(11) DEFAULT NULL,
  `dividend_date` datetime NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `package_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `roi_percentage` decimal(12,2) NOT NULL DEFAULT '0.00',
  `mt4_balance` decimal(12,2) DEFAULT '0.00',
  `dividend_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `first_dividend_date` datetime DEFAULT NULL,
  PRIMARY KEY (`devidend_id`),
  KEY `dist_id` (`dist_id`,`mt4_user_name`,`dividend_date`),
  KEY `mt4_user_name` (`mt4_user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17335 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
