-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 01:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riskory`
--

-- --------------------------------------------------------

--
-- Table structure for table `bframeworks`
--

CREATE TABLE `bframeworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bframeworks`
--

INSERT INTO `bframeworks` (`id`, `name`, `note`, `status`, `parent_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ASL & BiSL | Information Technology', 'ASL & BiSL | Information Technology', '1', NULL, 2, '2020-11-17 07:59:14', '2020-11-17 07:59:14'),
(2, 'ASL | Information Technology', 'ASL | Information Technology', '1', 1, 2, '2020-11-17 07:59:37', '2020-11-17 07:59:37'),
(3, 'Checking Business Framework', 'Note of business framework', '1', 1, 2, '2020-11-18 05:32:28', '2020-11-18 05:37:12'),
(5, 'Checking The Framewotk', 'khsdkhakjlsdhjkl', '1', 1, 2, '2020-11-25 02:09:02', '2020-11-25 02:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `bprocesses`
--

CREATE TABLE `bprocesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bprocesses`
--

INSERT INTO `bprocesses` (`id`, `name`, `note`, `status`, `parent_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Compliance, Governance & Legal', 'Compliance, Governance & Legal checking', '1', NULL, 2, '2020-11-17 07:11:15', '2020-11-17 07:23:52'),
(2, 'Corporate & Management', 'Corporate & Management', '1', NULL, 2, '2020-11-17 07:11:43', '2020-11-17 07:24:15'),
(3, 'Checking Business Framework', 'Note of business framework', '1', 1, 2, '2020-11-17 07:12:04', '2020-11-18 05:35:51'),
(5, 'Chekjahskfja', 'akjsfaskjld', '1', 1, 2, '2020-11-25 02:09:22', '2020-11-25 02:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `note`, `status`, `parent_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Category check', 'Catgory note check', '1', NULL, 2, '2020-11-18 07:06:01', '2020-11-18 07:06:01'),
(2, 'Another Category', 'Categor', '1', NULL, 2, '2020-11-18 07:27:16', '2020-11-18 07:34:11'),
(3, 'Delete Category', 'Categoy Delete Note', '1', 1, 2, '2020-11-18 07:34:43', '2020-11-18 07:34:43'),
(4, 'NEw One', 'NEw One', '1', 1, 2, '2020-11-26 04:16:09', '2020-11-26 04:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `key`, `heading`, `content`, `created_at`, `updated_at`) VALUES
(1, 'about-us', 'About Us Check', 'No Content yet for about us', '2020-11-25 12:01:06', '2020-11-25 07:34:18'),
(2, 'contact-us', 'Contact Us', 'No Content yet for contact us', '2020-11-25 12:01:06', '2020-11-25 07:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', NULL, NULL),
(2, 'AL', 'Albania', NULL, NULL),
(3, 'DZ', 'Algeria', NULL, NULL),
(4, 'DS', 'American Samoa', NULL, NULL),
(5, 'AD', 'Andorra', NULL, NULL),
(6, 'AO', 'Angola', NULL, NULL),
(7, 'AI', 'Anguilla', NULL, NULL),
(8, 'AQ', 'Antarctica', NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', NULL, NULL),
(10, 'AR', 'Argentina', NULL, NULL),
(11, 'AM', 'Armenia', NULL, NULL),
(12, 'AW', 'Aruba', NULL, NULL),
(13, 'AU', 'Australia', NULL, NULL),
(14, 'AT', 'Austria', NULL, NULL),
(15, 'AZ', 'Azerbaijan', NULL, NULL),
(16, 'BS', 'Bahamas', NULL, NULL),
(17, 'BH', 'Bahrain', NULL, NULL),
(18, 'BD', 'Bangladesh', NULL, NULL),
(19, 'BB', 'Barbados', NULL, NULL),
(20, 'BY', 'Belarus', NULL, NULL),
(21, 'BE', 'Belgium', NULL, NULL),
(22, 'BZ', 'Belize', NULL, NULL),
(23, 'BJ', 'Benin', NULL, NULL),
(24, 'BM', 'Bermuda', NULL, NULL),
(25, 'BT', 'Bhutan', NULL, NULL),
(26, 'BO', 'Bolivia', NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(28, 'BW', 'Botswana', NULL, NULL),
(29, 'BV', 'Bouvet Island', NULL, NULL),
(30, 'BR', 'Brazil', NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(32, 'BN', 'Brunei Darussalam', NULL, NULL),
(33, 'BG', 'Bulgaria', NULL, NULL),
(34, 'BF', 'Burkina Faso', NULL, NULL),
(35, 'BI', 'Burundi', NULL, NULL),
(36, 'KH', 'Cambodia', NULL, NULL),
(37, 'CM', 'Cameroon', NULL, NULL),
(38, 'CA', 'Canada', NULL, NULL),
(39, 'CV', 'Cape Verde', NULL, NULL),
(40, 'KY', 'Cayman Islands', NULL, NULL),
(41, 'CF', 'Central African Republic', NULL, NULL),
(42, 'TD', 'Chad', NULL, NULL),
(43, 'CL', 'Chile', NULL, NULL),
(44, 'CN', 'China', NULL, NULL),
(45, 'CX', 'Christmas Island', NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(47, 'CO', 'Colombia', NULL, NULL),
(48, 'KM', 'Comoros', NULL, NULL),
(49, 'CD', 'Democratic Republic of the Congo', NULL, NULL),
(50, 'CG', 'Republic of the Congo', NULL, NULL),
(51, 'CK', 'Cook Islands', NULL, NULL),
(52, 'CR', 'Costa Rica', NULL, NULL),
(53, 'HR', 'Croatia (Hrvatska)', NULL, NULL),
(54, 'CU', 'Cuba', NULL, NULL),
(55, 'CY', 'Cyprus', NULL, NULL),
(56, 'CZ', 'Czech Republic', NULL, NULL),
(57, 'DK', 'Denmark', NULL, NULL),
(58, 'DJ', 'Djibouti', NULL, NULL),
(59, 'DM', 'Dominica', NULL, NULL),
(60, 'DO', 'Dominican Republic', NULL, NULL),
(61, 'TP', 'East Timor', NULL, NULL),
(62, 'EC', 'Ecuador', NULL, NULL),
(63, 'EG', 'Egypt', NULL, NULL),
(64, 'SV', 'El Salvador', NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', NULL, NULL),
(66, 'ER', 'Eritrea', NULL, NULL),
(67, 'EE', 'Estonia', NULL, NULL),
(68, 'ET', 'Ethiopia', NULL, NULL),
(69, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(70, 'FO', 'Faroe Islands', NULL, NULL),
(71, 'FJ', 'Fiji', NULL, NULL),
(72, 'FI', 'Finland', NULL, NULL),
(73, 'FR', 'France', NULL, NULL),
(74, 'FX', 'France, Metropolitan', NULL, NULL),
(75, 'GF', 'French Guiana', NULL, NULL),
(76, 'PF', 'French Polynesia', NULL, NULL),
(77, 'TF', 'French Southern Territories', NULL, NULL),
(78, 'GA', 'Gabon', NULL, NULL),
(79, 'GM', 'Gambia', NULL, NULL),
(80, 'GE', 'Georgia', NULL, NULL),
(81, 'DE', 'Germany', NULL, NULL),
(82, 'GH', 'Ghana', NULL, NULL),
(83, 'GI', 'Gibraltar', NULL, NULL),
(84, 'GK', 'Guernsey', NULL, NULL),
(85, 'GR', 'Greece', NULL, NULL),
(86, 'GL', 'Greenland', NULL, NULL),
(87, 'GD', 'Grenada', NULL, NULL),
(88, 'GP', 'Guadeloupe', NULL, NULL),
(89, 'GU', 'Guam', NULL, NULL),
(90, 'GT', 'Guatemala', NULL, NULL),
(91, 'GN', 'Guinea', NULL, NULL),
(92, 'GW', 'Guinea-Bissau', NULL, NULL),
(93, 'GY', 'Guyana', NULL, NULL),
(94, 'HT', 'Haiti', NULL, NULL),
(95, 'HM', 'Heard and Mc Donald Islands', NULL, NULL),
(96, 'HN', 'Honduras', NULL, NULL),
(97, 'HK', 'Hong Kong', NULL, NULL),
(98, 'HU', 'Hungary', NULL, NULL),
(99, 'IS', 'Iceland', NULL, NULL),
(100, 'IN', 'India', NULL, NULL),
(101, 'IM', 'Isle of Man', NULL, NULL),
(102, 'ID', 'Indonesia', NULL, NULL),
(103, 'IR', 'Iran (Islamic Republic of)', NULL, NULL),
(104, 'IQ', 'Iraq', NULL, NULL),
(105, 'IE', 'Ireland', NULL, NULL),
(106, 'IL', 'Israel', NULL, NULL),
(107, 'IT', 'Italy', NULL, NULL),
(108, 'CI', 'Ivory Coast', NULL, NULL),
(109, 'JE', 'Jersey', NULL, NULL),
(110, 'JM', 'Jamaica', NULL, NULL),
(111, 'JP', 'Japan', NULL, NULL),
(112, 'JO', 'Jordan', NULL, NULL),
(113, 'KZ', 'Kazakhstan', NULL, NULL),
(114, 'KE', 'Kenya', NULL, NULL),
(115, 'KI', 'Kiribati', NULL, NULL),
(116, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(117, 'KR', 'Korea, Republic of', NULL, NULL),
(118, 'XK', 'Kosovo', NULL, NULL),
(119, 'KW', 'Kuwait', NULL, NULL),
(120, 'KG', 'Kyrgyzstan', NULL, NULL),
(121, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(122, 'LV', 'Latvia', NULL, NULL),
(123, 'LB', 'Lebanon', NULL, NULL),
(124, 'LS', 'Lesotho', NULL, NULL),
(125, 'LR', 'Liberia', NULL, NULL),
(126, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(127, 'LI', 'Liechtenstein', NULL, NULL),
(128, 'LT', 'Lithuania', NULL, NULL),
(129, 'LU', 'Luxembourg', NULL, NULL),
(130, 'MO', 'Macau', NULL, NULL),
(131, 'MK', 'North Macedonia', NULL, NULL),
(132, 'MG', 'Madagascar', NULL, NULL),
(133, 'MW', 'Malawi', NULL, NULL),
(134, 'MY', 'Malaysia', NULL, NULL),
(135, 'MV', 'Maldives', NULL, NULL),
(136, 'ML', 'Mali', NULL, NULL),
(137, 'MT', 'Malta', NULL, NULL),
(138, 'MH', 'Marshall Islands', NULL, NULL),
(139, 'MQ', 'Martinique', NULL, NULL),
(140, 'MR', 'Mauritania', NULL, NULL),
(141, 'MU', 'Mauritius', NULL, NULL),
(142, 'TY', 'Mayotte', NULL, NULL),
(143, 'MX', 'Mexico', NULL, NULL),
(144, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(145, 'MD', 'Moldova, Republic of', NULL, NULL),
(146, 'MC', 'Monaco', NULL, NULL),
(147, 'MN', 'Mongolia', NULL, NULL),
(148, 'ME', 'Montenegro', NULL, NULL),
(149, 'MS', 'Montserrat', NULL, NULL),
(150, 'MA', 'Morocco', NULL, NULL),
(151, 'MZ', 'Mozambique', NULL, NULL),
(152, 'MM', 'Myanmar', NULL, NULL),
(153, 'NA', 'Namibia', NULL, NULL),
(154, 'NR', 'Nauru', NULL, NULL),
(155, 'NP', 'Nepal', NULL, NULL),
(156, 'NL', 'Netherlands', NULL, NULL),
(157, 'AN', 'Netherlands Antilles', NULL, NULL),
(158, 'NC', 'New Caledonia', NULL, NULL),
(159, 'NZ', 'New Zealand', NULL, NULL),
(160, 'NI', 'Nicaragua', NULL, NULL),
(161, 'NE', 'Niger', NULL, NULL),
(162, 'NG', 'Nigeria', NULL, NULL),
(163, 'NU', 'Niue', NULL, NULL),
(164, 'NF', 'Norfolk Island', NULL, NULL),
(165, 'MP', 'Northern Mariana Islands', NULL, NULL),
(166, 'NO', 'Norway', NULL, NULL),
(167, 'OM', 'Oman', NULL, NULL),
(168, 'PK', 'Pakistan', NULL, NULL),
(169, 'PW', 'Palau', NULL, NULL),
(170, 'PS', 'Palestine', NULL, NULL),
(171, 'PA', 'Panama', NULL, NULL),
(172, 'PG', 'Papua New Guinea', NULL, NULL),
(173, 'PY', 'Paraguay', NULL, NULL),
(174, 'PE', 'Peru', NULL, NULL),
(175, 'PH', 'Philippines', NULL, NULL),
(176, 'PN', 'Pitcairn', NULL, NULL),
(177, 'PL', 'Poland', NULL, NULL),
(178, 'PT', 'Portugal', NULL, NULL),
(179, 'PR', 'Puerto Rico', NULL, NULL),
(180, 'QA', 'Qatar', NULL, NULL),
(181, 'RE', 'Reunion', NULL, NULL),
(182, 'RO', 'Romania', NULL, NULL),
(183, 'RU', 'Russian Federation', NULL, NULL),
(184, 'RW', 'Rwanda', NULL, NULL),
(185, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(186, 'LC', 'Saint Lucia', NULL, NULL),
(187, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(188, 'WS', 'Samoa', NULL, NULL),
(189, 'SM', 'San Marino', NULL, NULL),
(190, 'ST', 'Sao Tome and Principe', NULL, NULL),
(191, 'SA', 'Saudi Arabia', NULL, NULL),
(192, 'SN', 'Senegal', NULL, NULL),
(193, 'RS', 'Serbia', NULL, NULL),
(194, 'SC', 'Seychelles', NULL, NULL),
(195, 'SL', 'Sierra Leone', NULL, NULL),
(196, 'SG', 'Singapore', NULL, NULL),
(197, 'SK', 'Slovakia', NULL, NULL),
(198, 'SI', 'Slovenia', NULL, NULL),
(199, 'SB', 'Solomon Islands', NULL, NULL),
(200, 'SO', 'Somalia', NULL, NULL),
(201, 'ZA', 'South Africa', NULL, NULL),
(202, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL),
(203, 'SS', 'South Sudan', NULL, NULL),
(204, 'ES', 'Spain', NULL, NULL),
(205, 'LK', 'Sri Lanka', NULL, NULL),
(206, 'SH', 'St. Helena', NULL, NULL),
(207, 'PM', 'St. Pierre and Miquelon', NULL, NULL),
(208, 'SD', 'Sudan', NULL, NULL),
(209, 'SR', 'Suriname', NULL, NULL),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', NULL, NULL),
(211, 'SZ', 'Swaziland', NULL, NULL),
(212, 'SE', 'Sweden', NULL, NULL),
(213, 'CH', 'Switzerland', NULL, NULL),
(214, 'SY', 'Syrian Arab Republic', NULL, NULL),
(215, 'TW', 'Taiwan', NULL, NULL),
(216, 'TJ', 'Tajikistan', NULL, NULL),
(217, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(218, 'TH', 'Thailand', NULL, NULL),
(219, 'TG', 'Togo', NULL, NULL),
(220, 'TK', 'Tokelau', NULL, NULL),
(221, 'TO', 'Tonga', NULL, NULL),
(222, 'TT', 'Trinidad and Tobago', NULL, NULL),
(223, 'TN', 'Tunisia', NULL, NULL),
(224, 'TR', 'Turkey', NULL, NULL),
(225, 'TM', 'Turkmenistan', NULL, NULL),
(226, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(227, 'TV', 'Tuvalu', NULL, NULL),
(228, 'UG', 'Uganda', NULL, NULL),
(229, 'UA', 'Ukraine', NULL, NULL),
(230, 'AE', 'United Arab Emirates', NULL, NULL),
(231, 'GB', 'United Kingdom', NULL, NULL),
(232, 'US', 'United States', NULL, NULL),
(233, 'UM', 'United States minor outlying islands', NULL, NULL),
(234, 'UY', 'Uruguay', NULL, NULL),
(235, 'UZ', 'Uzbekistan', NULL, NULL),
(236, 'VU', 'Vanuatu', NULL, NULL),
(237, 'VA', 'Vatican City State', NULL, NULL),
(238, 'VE', 'Venezuela', NULL, NULL),
(239, 'VN', 'Vietnam', NULL, NULL),
(240, 'VG', 'Virgin Islands (British)', NULL, NULL),
(241, 'VI', 'Virgin Islands (U.S.)', NULL, NULL),
(242, 'WF', 'Wallis and Futuna Islands', NULL, NULL),
(243, 'EH', 'Western Sahara', NULL, NULL),
(244, 'YE', 'Yemen', NULL, NULL),
(245, 'ZM', 'Zambia', NULL, NULL),
(246, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `note`, `status`, `parent_id`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Accommodation & Food', 'sfsdsd', '0', NULL, 2, '2020-11-17 02:21:46', '2020-11-25 07:51:58'),
(3, 'Banking & Insurance', 'Banking & Insurance', '1', NULL, 2, '2020-11-17 02:46:23', '2020-11-17 02:46:23'),
(4, 'Financial Services', NULL, '1', NULL, 2, '2020-11-17 02:46:39', '2020-11-17 02:46:39'),
(5, 'Banking', 'Note check 2nd Time', '1', 4, 2, '2020-11-17 02:46:53', '2020-11-17 05:04:02'),
(6, 'Insurance', 'Insurance note', '1', 4, 2, '2020-11-17 02:47:27', '2020-11-17 05:25:43'),
(7, 'Consumer Industries', NULL, '1', NULL, 2, '2020-11-17 03:07:01', '2020-11-17 05:18:26');

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
(5, '2013_11_11_071118_create_countries_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2014_10_12_000000_create_users_table', 3),
(18, '2014_10_12_100000_create_password_resets_table', 4),
(19, '2020_11_12_102057_laratrust_setup_tables', 4),
(21, '2020_11_13_124149_drop_users_column', 5),
(22, '2020_11_16_045431_create_users_field', 6),
(26, '2020_11_16_123522_create_industries_table', 7),
(27, '2020_11_17_070416_create_industries_foreign_key', 7),
(29, '2020_11_17_112304_create_bprocesses_table', 8),
(30, '2020_11_17_123603_create_bframeworks_table', 9),
(31, '2020_11_18_104849_create_categories_table', 10),
(32, '2020_11_25_115524_create_contents_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create User', 'Create Users desc', '2020-11-12 06:56:41', '2020-11-26 01:48:31'),
(2, 'users-read', 'Read User77', 'Read Users', '2020-11-12 06:56:41', '2020-11-26 06:26:14'),
(3, 'users-update', 'Update Users', 'Update Users', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(5, 'payments-create', 'Hammad', 'Hammad Checking', '2020-11-12 06:56:41', '2020-11-26 06:27:00'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(11, 'module_1_name-create', 'Create Module_1_name', 'Create Module_1_name', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(12, 'module_1_name-read', 'Read Module_1_name', 'Read Module_1_name', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(13, 'module_1_name-update', 'Update Module_1_name', 'Update Module_1_name', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(14, 'module_1_name-delete', 'Delete Module_1_name', 'Delete Module_1_name', '2020-11-12 06:56:41', '2020-11-12 06:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 4),
(12, 4),
(13, 4),
(14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(2, 'administrator', 'Administrator', 'Administrator', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(3, 'user', 'User', 'User', '2020-11-12 06:56:41', '2020-11-12 06:56:41'),
(4, 'role_name', 'Role Name', 'Role Name', '2020-11-12 06:56:41', '2020-11-12 06:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(3, 1, 'App\\Models\\User'),
(1, 2, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(1, 3, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User'),
(3, 4, 'App\\Models\\User'),
(4, 5, 'App\\Models\\User'),
(3, 6, 'App\\Models\\User'),
(3, 10, 'App\\Models\\User'),
(3, 12, 'App\\Models\\User'),
(3, 13, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joined_at` date NOT NULL DEFAULT '2020-11-12',
  `status` enum('A','D','S') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/avatars/default.png',
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/covers/default.png',
  `phone_no` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_email_verified` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_expiry_date` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `joined_at`, `status`, `about`, `dob`, `gender`, `avatar`, `cover`, `phone_no`, `password_token`, `is_email_verified`, `token_expiry_date`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `country_id`) VALUES
(1, 'Hammad', NULL, NULL, '2020-11-12', NULL, NULL, NULL, NULL, 'images/avatars/default.png', 'images/covers/default.png', NULL, NULL, NULL, NULL, 'hammad@virtuenetz.com', NULL, '$2y$10$lGaD2LgzIju8/RIYKoAfXuyKrDISe0eB4/iebpl0vmE0QDF1cbgHe', 'jN8Omi3oO6OFh64cVwt8kuJz74gDwdMR7cSf0oEQVyMfvn9BvtKKUvuJ8bOa', '2020-11-12 05:42:08', '2020-11-12 05:42:08', 168),
(2, 'Hammadurrafay', 'Hammad', 'Ur Rafay', '2020-11-12', NULL, NULL, '1996-07-31', 'Male', 'images/avatars/default.png', 'images/covers/default.png', NULL, NULL, NULL, NULL, 'superadministrator@app.com', NULL, '$2y$10$ZDYiDvy29x0lT1wYAlfVReCNKeL6xZaDmS2DSh6.H24l1mMoS2jEy', NULL, '2020-11-12 06:56:41', '2020-11-25 07:50:03', 162),
(3, 'Administrator', NULL, NULL, '2020-11-12', NULL, NULL, NULL, NULL, 'images/avatars/default.png', 'images/covers/default.png', NULL, NULL, NULL, NULL, 'administrator@app.com', NULL, '$2y$10$TZdsFN8wD4nc2P.OaJ7TTeEOFLDVDX79HnQOhELtxyHeu41.g1CTu', NULL, '2020-11-12 06:56:41', '2020-11-12 06:56:41', NULL),
(4, 'User', NULL, NULL, '2020-11-12', NULL, NULL, NULL, NULL, 'images/avatars/default.png', 'images/covers/default.png', NULL, NULL, NULL, NULL, 'user@app.com', NULL, '$2y$10$lGaD2LgzIju8/RIYKoAfXuyKrDISe0eB4/iebpl0vmE0QDF1cbgHe', NULL, '2020-11-12 06:56:41', '2020-11-12 06:56:41', NULL),
(5, 'Role Name', NULL, NULL, '2020-11-12', NULL, NULL, NULL, NULL, 'images/avatars/default.png', 'images/covers/default.png', NULL, NULL, NULL, NULL, 'role_name@app.com', NULL, '$2y$10$gSJonucEZa4.dwb1uAM5JeR79S1Nep3xoHr6DOAUVoXtn6u0dn/16', NULL, '2020-11-12 06:56:42', '2020-11-12 06:56:42', NULL),
(6, 'Hammad Ur rafay', NULL, NULL, '2020-11-12', NULL, NULL, NULL, NULL, 'images/avatars/default.png', 'images/covers/default.png', NULL, NULL, NULL, NULL, 'checkingemail@gmail.com', NULL, '$2y$10$lGaD2LgzIju8/RIYKoAfXuyKrDISe0eB4/iebpl0vmE0QDF1cbgHe', NULL, '2020-11-21 08:05:07', '2020-11-21 08:05:07', NULL),
(12, 'Tesign Création', NULL, NULL, '2020-11-12', NULL, NULL, NULL, NULL, 'photo.jpg.jpg', 'images/covers/default.png', NULL, NULL, NULL, NULL, 'tesign.contact@gmail.com', NULL, '$2y$10$0xqcRhygzQRaCYEiUqiX0.TC5GyeWgHm2Kb/LpHgtLQCte5XXEYKO', NULL, '2020-11-27 06:51:02', '2020-11-27 06:51:02', NULL),
(13, 'User Name', NULL, NULL, '2020-11-12', NULL, NULL, NULL, NULL, 'images/avatars/default.png', 'images/covers/default.png', NULL, NULL, NULL, NULL, 'email@email.com', NULL, '$2y$10$pjEnyHBXeI5UJpJR4l1ivufwfSdbQKue2E7XIax9ApzJ1zptgRVHi', NULL, '2020-11-27 06:58:40', '2020-11-27 06:58:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bframeworks`
--
ALTER TABLE `bframeworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bframeworks_parent_id_foreign` (`parent_id`),
  ADD KEY `bframeworks_created_by_foreign` (`created_by`);

--
-- Indexes for table `bprocesses`
--
ALTER TABLE `bprocesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bprocesses_parent_id_foreign` (`parent_id`),
  ADD KEY `bprocesses_created_by_foreign` (`created_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industries_created_by_foreign` (`created_by`),
  ADD KEY `industries_parent_id_foreign` (`parent_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bframeworks`
--
ALTER TABLE `bframeworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bprocesses`
--
ALTER TABLE `bprocesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bframeworks`
--
ALTER TABLE `bframeworks`
  ADD CONSTRAINT `bframeworks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bframeworks_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `bframeworks` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `bprocesses`
--
ALTER TABLE `bprocesses`
  ADD CONSTRAINT `bprocesses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bprocesses_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `bprocesses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `industries`
--
ALTER TABLE `industries`
  ADD CONSTRAINT `industries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `industries_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `industries` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
