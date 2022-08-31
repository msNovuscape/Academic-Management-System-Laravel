-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 11:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_code` int(11) NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `phone_code`, `country_code`, `name`, `created_at`, `updated_at`) VALUES
(1, 93, 'AF', 'Afghanistan', NULL, NULL),
(2, 358, 'AX', 'Aland Islands', NULL, NULL),
(3, 355, 'AL', 'Albania', NULL, NULL),
(4, 213, 'DZ', 'Algeria', NULL, NULL),
(5, 1684, 'AS', 'American Samoa', NULL, NULL),
(6, 376, 'AD', 'Andorra', NULL, NULL),
(7, 244, 'AO', 'Angola', NULL, NULL),
(8, 1264, 'AI', 'Anguilla', NULL, NULL),
(9, 672, 'AQ', 'Antarctica', NULL, NULL),
(10, 1268, 'AG', 'Antigua and Barbuda', NULL, NULL),
(11, 54, 'AR', 'Argentina', NULL, NULL),
(12, 374, 'AM', 'Armenia', NULL, NULL),
(13, 297, 'AW', 'Aruba', NULL, NULL),
(14, 61, 'AU', 'Australia', NULL, NULL),
(15, 43, 'AT', 'Austria', NULL, NULL),
(16, 994, 'AZ', 'Azerbaijan', NULL, NULL),
(17, 1242, 'BS', 'Bahamas', NULL, NULL),
(18, 973, 'BH', 'Bahrain', NULL, NULL),
(19, 880, 'BD', 'Bangladesh', NULL, NULL),
(20, 1246, 'BB', 'Barbados', NULL, NULL),
(21, 375, 'BY', 'Belarus', NULL, NULL),
(22, 32, 'BE', 'Belgium', NULL, NULL),
(23, 501, 'BZ', 'Belize', NULL, NULL),
(24, 229, 'BJ', 'Benin', NULL, NULL),
(25, 1441, 'BM', 'Bermuda', NULL, NULL),
(26, 975, 'BT', 'Bhutan', NULL, NULL),
(27, 591, 'BO', 'Bolivia', NULL, NULL),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba', NULL, NULL),
(29, 387, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(30, 267, 'BW', 'Botswana', NULL, NULL),
(31, 55, 'BV', 'Bouvet Island', NULL, NULL),
(32, 55, 'BR', 'Brazil', NULL, NULL),
(33, 246, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(34, 673, 'BN', 'Brunei Darussalam', NULL, NULL),
(35, 359, 'BG', 'Bulgaria', NULL, NULL),
(36, 226, 'BF', 'Burkina Faso', NULL, NULL),
(37, 257, 'BI', 'Burundi', NULL, NULL),
(38, 855, 'KH', 'Cambodia', NULL, NULL),
(39, 237, 'CM', 'Cameroon', NULL, NULL),
(40, 1, 'CA', 'Canada', NULL, NULL),
(41, 238, 'CV', 'Cape Verde', NULL, NULL),
(42, 1345, 'KY', 'Cayman Islands', NULL, NULL),
(43, 236, 'CF', 'Central African Republic', NULL, NULL),
(44, 235, 'TD', 'Chad', NULL, NULL),
(45, 56, 'CL', 'Chile', NULL, NULL),
(46, 86, 'CN', 'China', NULL, NULL),
(47, 61, 'CX', 'Christmas Island', NULL, NULL),
(48, 672, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(49, 57, 'CO', 'Colombia', NULL, NULL),
(50, 269, 'KM', 'Comoros', NULL, NULL),
(51, 242, 'CG', 'Congo', NULL, NULL),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo', NULL, NULL),
(53, 682, 'CK', 'Cook Islands', NULL, NULL),
(54, 506, 'CR', 'Costa Rica', NULL, NULL),
(55, 225, 'CI', 'Cote D\'Ivoire', NULL, NULL),
(56, 385, 'HR', 'Croatia', NULL, NULL),
(57, 53, 'CU', 'Cuba', NULL, NULL),
(58, 599, 'CW', 'Curacao', NULL, NULL),
(59, 357, 'CY', 'Cyprus', NULL, NULL),
(60, 420, 'CZ', 'Czech Republic', NULL, NULL),
(61, 45, 'DK', 'Denmark', NULL, NULL),
(62, 253, 'DJ', 'Djibouti', NULL, NULL),
(63, 1767, 'DM', 'Dominica', NULL, NULL),
(64, 1809, 'DO', 'Dominican Republic', NULL, NULL),
(65, 593, 'EC', 'Ecuador', NULL, NULL),
(66, 20, 'EG', 'Egypt', NULL, NULL),
(67, 503, 'SV', 'El Salvador', NULL, NULL),
(68, 240, 'GQ', 'Equatorial Guinea', NULL, NULL),
(69, 291, 'ER', 'Eritrea', NULL, NULL),
(70, 372, 'EE', 'Estonia', NULL, NULL),
(71, 251, 'ET', 'Ethiopia', NULL, NULL),
(72, 500, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(73, 298, 'FO', 'Faroe Islands', NULL, NULL),
(74, 679, 'FJ', 'Fiji', NULL, NULL),
(75, 358, 'FI', 'Finland', NULL, NULL),
(76, 33, 'FR', 'France', NULL, NULL),
(77, 594, 'GF', 'French Guiana', NULL, NULL),
(78, 689, 'PF', 'French Polynesia', NULL, NULL),
(79, 262, 'TF', 'French Southern Territories', NULL, NULL),
(80, 241, 'GA', 'Gabon', NULL, NULL),
(81, 220, 'GM', 'Gambia', NULL, NULL),
(82, 995, 'GE', 'Georgia', NULL, NULL),
(83, 49, 'DE', 'Germany', NULL, NULL),
(84, 233, 'GH', 'Ghana', NULL, NULL),
(85, 350, 'GI', 'Gibraltar', NULL, NULL),
(86, 30, 'GR', 'Greece', NULL, NULL),
(87, 299, 'GL', 'Greenland', NULL, NULL),
(88, 1473, 'GD', 'Grenada', NULL, NULL),
(89, 590, 'GP', 'Guadeloupe', NULL, NULL),
(90, 1671, 'GU', 'Guam', NULL, NULL),
(91, 502, 'GT', 'Guatemala', NULL, NULL),
(92, 44, 'GG', 'Guernsey', NULL, NULL),
(93, 224, 'GN', 'Guinea', NULL, NULL),
(94, 245, 'GW', 'Guinea-Bissau', NULL, NULL),
(95, 592, 'GY', 'Guyana', NULL, NULL),
(96, 509, 'HT', 'Haiti', NULL, NULL),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands', NULL, NULL),
(98, 39, 'VA', 'Holy See (Vatican City State)', NULL, NULL),
(99, 504, 'HN', 'Honduras', NULL, NULL),
(100, 852, 'HK', 'Hong Kong', NULL, NULL),
(101, 36, 'HU', 'Hungary', NULL, NULL),
(102, 354, 'IS', 'Iceland', NULL, NULL),
(103, 91, 'IN', 'India', NULL, NULL),
(104, 62, 'ID', 'Indonesia', NULL, NULL),
(105, 98, 'IR', 'Iran, Islamic Republic of', NULL, NULL),
(106, 964, 'IQ', 'Iraq', NULL, NULL),
(107, 353, 'IE', 'Ireland', NULL, NULL),
(108, 44, 'IM', 'Isle of Man', NULL, NULL),
(109, 972, 'IL', 'Israel', NULL, NULL),
(110, 39, 'IT', 'Italy', NULL, NULL),
(111, 1876, 'JM', 'Jamaica', NULL, NULL),
(112, 81, 'JP', 'Japan', NULL, NULL),
(113, 44, 'JE', 'Jersey', NULL, NULL),
(114, 962, 'JO', 'Jordan', NULL, NULL),
(115, 7, 'KZ', 'Kazakhstan', NULL, NULL),
(116, 254, 'KE', 'Kenya', NULL, NULL),
(117, 686, 'KI', 'Kiribati', NULL, NULL),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(119, 82, 'KR', 'Korea, Republic of', NULL, NULL),
(120, 381, 'XK', 'Kosovo', NULL, NULL),
(121, 965, 'KW', 'Kuwait', NULL, NULL),
(122, 996, 'KG', 'Kyrgyzstan', NULL, NULL),
(123, 856, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(124, 371, 'LV', 'Latvia', NULL, NULL),
(125, 961, 'LB', 'Lebanon', NULL, NULL),
(126, 266, 'LS', 'Lesotho', NULL, NULL),
(127, 231, 'LR', 'Liberia', NULL, NULL),
(128, 218, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(129, 423, 'LI', 'Liechtenstein', NULL, NULL),
(130, 370, 'LT', 'Lithuania', NULL, NULL),
(131, 352, 'LU', 'Luxembourg', NULL, NULL),
(132, 853, 'MO', 'Macao', NULL, NULL),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of', NULL, NULL),
(134, 261, 'MG', 'Madagascar', NULL, NULL),
(135, 265, 'MW', 'Malawi', NULL, NULL),
(136, 60, 'MY', 'Malaysia', NULL, NULL),
(137, 960, 'MV', 'Maldives', NULL, NULL),
(138, 223, 'ML', 'Mali', NULL, NULL),
(139, 356, 'MT', 'Malta', NULL, NULL),
(140, 692, 'MH', 'Marshall Islands', NULL, NULL),
(141, 596, 'MQ', 'Martinique', NULL, NULL),
(142, 222, 'MR', 'Mauritania', NULL, NULL),
(143, 230, 'MU', 'Mauritius', NULL, NULL),
(144, 269, 'YT', 'Mayotte', NULL, NULL),
(145, 52, 'MX', 'Mexico', NULL, NULL),
(146, 691, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(147, 373, 'MD', 'Moldova, Republic of', NULL, NULL),
(148, 377, 'MC', 'Monaco', NULL, NULL),
(149, 976, 'MN', 'Mongolia', NULL, NULL),
(150, 382, 'ME', 'Montenegro', NULL, NULL),
(151, 1664, 'MS', 'Montserrat', NULL, NULL),
(152, 212, 'MA', 'Morocco', NULL, NULL),
(153, 258, 'MZ', 'Mozambique', NULL, NULL),
(154, 95, 'MM', 'Myanmar', NULL, NULL),
(155, 264, 'NA', 'Namibia', NULL, NULL),
(156, 674, 'NR', 'Nauru', NULL, NULL),
(157, 977, 'NP', 'Nepal', NULL, NULL),
(158, 31, 'NL', 'Netherlands', NULL, NULL),
(159, 599, 'AN', 'Netherlands Antilles', NULL, NULL),
(160, 687, 'NC', 'New Caledonia', NULL, NULL),
(161, 64, 'NZ', 'New Zealand', NULL, NULL),
(162, 505, 'NI', 'Nicaragua', NULL, NULL),
(163, 227, 'NE', 'Niger', NULL, NULL),
(164, 234, 'NG', 'Nigeria', NULL, NULL),
(165, 683, 'NU', 'Niue', NULL, NULL),
(166, 672, 'NF', 'Norfolk Island', NULL, NULL),
(167, 1670, 'MP', 'Northern Mariana Islands', NULL, NULL),
(168, 47, 'NO', 'Norway', NULL, NULL),
(169, 968, 'OM', 'Oman', NULL, NULL),
(170, 92, 'PK', 'Pakistan', NULL, NULL),
(171, 680, 'PW', 'Palau', NULL, NULL),
(172, 970, 'PS', 'Palestinian Territory, Occupied', NULL, NULL),
(173, 507, 'PA', 'Panama', NULL, NULL),
(174, 675, 'PG', 'Papua New Guinea', NULL, NULL),
(175, 595, 'PY', 'Paraguay', NULL, NULL),
(176, 51, 'PE', 'Peru', NULL, NULL),
(177, 63, 'PH', 'Philippines', NULL, NULL),
(178, 64, 'PN', 'Pitcairn', NULL, NULL),
(179, 48, 'PL', 'Poland', NULL, NULL),
(180, 351, 'PT', 'Portugal', NULL, NULL),
(181, 1787, 'PR', 'Puerto Rico', NULL, NULL),
(182, 974, 'QA', 'Qatar', NULL, NULL),
(183, 262, 'RE', 'Reunion', NULL, NULL),
(184, 40, 'RO', 'Romania', NULL, NULL),
(185, 70, 'RU', 'Russian Federation', NULL, NULL),
(186, 250, 'RW', 'Rwanda', NULL, NULL),
(187, 590, 'BL', 'Saint Barthelemy', NULL, NULL),
(188, 290, 'SH', 'Saint Helena', NULL, NULL),
(189, 1869, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(190, 1758, 'LC', 'Saint Lucia', NULL, NULL),
(191, 590, 'MF', 'Saint Martin', NULL, NULL),
(192, 508, 'PM', 'Saint Pierre and Miquelon', NULL, NULL),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(194, 684, 'WS', 'Samoa', NULL, NULL),
(195, 378, 'SM', 'San Marino', NULL, NULL),
(196, 239, 'ST', 'Sao Tome and Principe', NULL, NULL),
(197, 966, 'SA', 'Saudi Arabia', NULL, NULL),
(198, 221, 'SN', 'Senegal', NULL, NULL),
(199, 381, 'RS', 'Serbia', NULL, NULL),
(200, 381, 'CS', 'Serbia and Montenegro', NULL, NULL),
(201, 248, 'SC', 'Seychelles', NULL, NULL),
(202, 232, 'SL', 'Sierra Leone', NULL, NULL),
(203, 65, 'SG', 'Singapore', NULL, NULL),
(204, 1, 'SX', 'Sint Maarten', NULL, NULL),
(205, 421, 'SK', 'Slovakia', NULL, NULL),
(206, 386, 'SI', 'Slovenia', NULL, NULL),
(207, 677, 'SB', 'Solomon Islands', NULL, NULL),
(208, 252, 'SO', 'Somalia', NULL, NULL),
(209, 27, 'ZA', 'South Africa', NULL, NULL),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
(211, 211, 'SS', 'South Sudan', NULL, NULL),
(212, 34, 'ES', 'Spain', NULL, NULL),
(213, 94, 'LK', 'Sri Lanka', NULL, NULL),
(214, 249, 'SD', 'Sudan', NULL, NULL),
(215, 597, 'SR', 'Suriname', NULL, NULL),
(216, 47, 'SJ', 'Svalbard and Jan Mayen', NULL, NULL),
(217, 268, 'SZ', 'Swaziland', NULL, NULL),
(218, 46, 'SE', 'Sweden', NULL, NULL),
(219, 41, 'CH', 'Switzerland', NULL, NULL),
(220, 963, 'SY', 'Syrian Arab Republic', NULL, NULL),
(221, 886, 'TW', 'Taiwan, Province of China', NULL, NULL),
(222, 992, 'TJ', 'Tajikistan', NULL, NULL),
(223, 255, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(224, 66, 'TH', 'Thailand', NULL, NULL),
(225, 670, 'TL', 'Timor-Leste', NULL, NULL),
(226, 228, 'TG', 'Togo', NULL, NULL),
(227, 690, 'TK', 'Tokelau', NULL, NULL),
(228, 676, 'TO', 'Tonga', NULL, NULL),
(229, 1868, 'TT', 'Trinidad and Tobago', NULL, NULL),
(230, 216, 'TN', 'Tunisia', NULL, NULL),
(231, 90, 'TR', 'Turkey', NULL, NULL),
(232, 7370, 'TM', 'Turkmenistan', NULL, NULL),
(233, 1649, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(234, 688, 'TV', 'Tuvalu', NULL, NULL),
(235, 256, 'UG', 'Uganda', NULL, NULL),
(236, 380, 'UA', 'Ukraine', NULL, NULL),
(237, 971, 'AE', 'United Arab Emirates', NULL, NULL),
(238, 44, 'GB', 'United Kingdom', NULL, NULL),
(239, 1, 'US', 'United States', NULL, NULL),
(240, 1, 'UM', 'United States Minor Outlying Islands', NULL, NULL),
(241, 598, 'UY', 'Uruguay', NULL, NULL),
(242, 998, 'UZ', 'Uzbekistan', NULL, NULL),
(243, 678, 'VU', 'Vanuatu', NULL, NULL),
(244, 58, 'VE', 'Venezuela', NULL, NULL),
(245, 84, 'VN', 'Viet Nam', NULL, NULL),
(246, 1284, 'VG', 'Virgin Islands, British', NULL, NULL),
(247, 1340, 'VI', 'Virgin Islands, U.s.', NULL, NULL),
(248, 681, 'WF', 'Wallis and Futuna', NULL, NULL),
(249, 212, 'EH', 'Western Sahara', NULL, NULL),
(250, 967, 'YE', 'Yemen', NULL, NULL),
(251, 260, 'ZM', 'Zambia', NULL, NULL),
(252, 263, 'ZW', 'Zimbabwe', NULL, NULL);

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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_20_082240_create_logs_table', 1),
(7, '2022_06_20_091443_create_countries_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_type` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@localhost.com', NULL, '$2y$10$/NukDWYP4IOUctLQ8fGWa.y4K3/d41jCuygtBlJ1WGxnb6r7hErhi', '1', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
