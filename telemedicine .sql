-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2016 at 08:07 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telemedicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `problem` longtext COLLATE utf8_unicode_ci NOT NULL,
  `doctor_advise` longtext COLLATE utf8_unicode_ci NOT NULL,
  `communication_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `appointment_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `patient_time` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `doctor_time` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `doctor_response` tinyint(1) NOT NULL,
  `patient_respons` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `doctor_id`, `patient_id`, `problem`, `doctor_advise`, `communication_type`, `appointment_type`, `patient_time`, `doctor_time`, `status`, `doctor_response`, `patient_respons`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '<p>yutyut</p>\r\n', '<p>ytr</p>\r\n', 'mobile', '', '0000-00-00 00:00:00', '03/29/2016 12:00 AM - 03/29/2016 11:59 PM', 1, 1, 0, '2016-03-29 03:30:41', NULL),
(2, 1, 5, '<p>hghjyt</p>\r\n', '', 'video_call', '', '03/07/2016 12:00 AM - 03/29/2016 11:59 PM', '0000-00-00 00:00:00', 1, 0, 0, '2016-03-29 03:38:41', NULL),
(3, 0, 5, '<p>ghghj</p>\r\n', '', 'mobile', '', '03/02/2016 2:00 AM - 03/03/2016 11:59 PM', '0000-00-00 00:00:00', 1, 0, 0, '2016-03-29 03:55:20', NULL),
(4, 0, 5, '<p>jhk</p>\r\n', '', 'mobile', 'general', '03/11/2016 12:00 AM - 03/29/2016 11:59 PM', '0000-00-00 00:00:00', 1, 0, 0, '2016-03-29 04:02:30', NULL),
(5, 0, 5, '<p>hjhgkhg</p>\r\n', '', 'mobile', 'general', '03/29/2016 12:00 AM - 03/29/2016 11:59 PM', '0000-00-00 00:00:00', 1, 0, 0, '2016-03-29 04:03:24', NULL),
(6, 0, 5, '<p>yuyui</p>\r\n', '', 'mobile', 'general', '03/15/2016 12:00 AM - 03/31/2016 11:59 PM', '0000-00-00 00:00:00', 1, 0, 0, '2016-03-29 04:07:15', NULL),
(7, 0, 5, '<p>jhghjgh</p>\r\n', '', 'mobile', 'general', '03/08/2016 12:00 AM - 03/31/2016 11:59 PM', '0000-00-00 00:00:00', 1, 0, 0, '2016-03-29 04:10:58', NULL),
(8, 1, 5, '<p>ujujui</p>\r\n', '', 'video_call', 'custom', '03/02/2016 12:00 AM - 03/29/2016 11:59 PM', '0000-00-00 00:00:00', 1, 0, 0, '2016-03-29 04:11:47', NULL),
(9, 9, 5, '<p>mmmmmmmmmmmmm</p>\r\n', '', 'email', 'custom', '03/27/2016 12:00 AM - 03/29/2016 11:59 PM', '0000-00-00 00:00:00', 1, 0, 0, '2016-03-29 04:12:45', NULL),
(10, 2, 5, '<table border="1" cellpadding="1" cellspacing="1" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>hjg</td>\r\n			<td>hjhj</td>\r\n		</tr>\r\n		<tr>\r\n			<td>hjh</td>\r\n			<td>hjgjgh</td>\r\n		</tr>\r\n		<tr>\r\n			<td>hjghjg</td>\r\n			<td>ghjgjg</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>gfghfg</p>\r\n', 'mobile', 'custom', '03/01/2016 12:00 AM - 03/29/2016 11:59 PM', '10', 1, 1, 0, '2016-03-29 04:31:46', NULL),
(11, 2, 1, '<p>dffet</p>\r\n', '<p>gfdhf</p>\r\n', 'mobile', 'custom', '03/31/2016 12:00 AM - 03/31/2016 11:59 PM', '11', 1, 1, 0, '2016-03-29 06:08:26', NULL),
(12, 2, 1, '<p>sdfghjkl</p>\r\n', '<p>njj</p>\r\n', 'email', 'custom', '03/25/2016 12:00 AM - 03/29/2016 11:59 PM', '12', 1, 1, 0, '2016-03-29 06:35:28', NULL),
(13, 3, 5, '<p>&nbsp;I have no problem, Whay I have no problem? This is my problem.</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>Problem 1</td>\r\n			<td>This is number noe problem&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>wsyswfwtysf</p>\r\n', 'video_call', 'custom', '03/12/2016 12:00 AM - 03/30/2016 11:59 PM', '13', 1, 1, 0, '2016-03-30 02:41:01', NULL),
(14, 3, 4, '<p>jtyutyityuiuyi</p>\r\n', '<p>sfsds</p>\r\n', 'email', 'custom', '03/24/2016 12:00 AM - 03/30/2016 11:59 PM', '14', 1, 1, 1, '2016-03-30 02:46:29', NULL),
(15, 2, 12, '<p>ui6876786</p>\r\n', '<p>Ok , No problem ! We ll meet at the given time</p>\r\n', 'mobile', 'custom', '03/31/2016 12:00 AM - 04/09/2016 11:59 PM', '15', 1, 1, 0, '2016-03-30 03:37:44', NULL),
(16, 3, 12, '<p>htguytuy</p>\r\n', '', 'email', 'custom', '03/01/2016 12:00 AM - 03/24/2016 11:59 PM', '', 1, 0, 0, '2016-03-30 03:38:12', NULL),
(17, 9, 12, '<p>Ear problem</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '', 'email', 'custom', '03/31/2016 2:00 PM - 03/31/2016 3:00 PM', '', 1, 0, 0, '2016-03-30 05:07:56', NULL),
(20, 2, 4, '<p>ঘজঘজগজগ</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 'mobile', 'custom', '04/05/2016 12:00 AM - 04/10/2016 11:59 PM', '04/20/2016 12:00 AM - 04/20/2016 11:59 PM', 1, 1, 1, '2016-04-01 03:56:56', NULL),
(21, 2, 4, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'mobile', 'custom', '04/05/2016 12:00 AM - 04/05/2016 11:59 PM', '04/04/2016 12:00 AM - 04/04/2016 11:59 PM', 1, 1, 1, '2016-04-01 04:15:33', NULL),
(22, 2, 4, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'mobile', 'custom', '04/04/2016 12:00 AM - 04/04/2016 11:59 PM', '04/05/2016 12:00 AM - 04/05/2016 11:59 PM', 1, 1, 1, '2016-04-01 04:46:21', NULL),
(23, 2, 13, '<p>test problem</p>\r\n', '<table border="1" cellpadding="1" cellspacing="1" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'mobile', 'custom', '04/02/2016 12:30 AM - 04/03/2016 11:59 PM', '04/02/2016 12:30 AM - 04/03/2016 11:59 PM', 1, 1, 1, '2016-04-01 23:22:05', NULL),
(25, 2, 6, '<table border="1" cellpadding="1" cellspacing="1" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>hh</td>\r\n			<td>hhyy</td>\r\n		</tr>\r\n		<tr>\r\n			<td>hh</td>\r\n			<td>hh</td>\r\n		</tr>\r\n		<tr>\r\n			<td>hh</td>\r\n			<td>hh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>fghh</p>\r\n', 'video_call', 'general', '04/04/2016 12:00 AM - 04/04/2016 11:59 PM', '04/04/2016 12:00 AM - 04/04/2016 11:59 PM', 1, 1, 0, '2016-04-02 04:32:40', NULL),
(26, 2, 4, '<p>gtyhg</p>\r\n', '<p>huytu</p>\r\n', 'mobile', 'general', '04/12/2016 12:00 AM - 04/12/2016 11:59 PM', '04/12/2016 12:00 AM - 04/12/2016 11:59 PM', 1, 1, 0, '2016-04-02 05:55:37', NULL),
(27, 14, 4, '<p>feryr5yur</p>\r\n', '', 'video_call', 'general', '04/05/2016 12:00 AM - 04/05/2016 11:59 PM', '', 1, 0, 0, '2016-04-04 00:02:19', NULL),
(28, 2, 4, '<p>fhfgj</p>\r\n', '<p>oio</p>\r\n', 'mobile', 'general', '04/06/2016 12:00 AM - 04/06/2016 11:59 PM', '04/06/2016 12:00 AM - 04/06/2016 11:59 PM', 1, 1, 0, '2016-04-04 01:16:58', NULL),
(29, 14, 4, '<p>trurtur</p>\r\n', '', 'mobile', 'general', '04/11/2016 12:00 AM - 04/11/2016 11:59 PM', '', 1, 0, 0, '2016-04-05 03:11:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_24_060500_create_appointment_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bloodgroup` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nidno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medical_reg_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_job` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `medical_speciality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `mailconfirm` tinyint(1) NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `gender`, `bloodgroup`, `nidno`, `about`, `image`, `medical_reg_no`, `p_job`, `medical_speciality`, `mobile`, `email`, `username`, `password`, `role`, `status`, `trash`, `mailconfirm`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kumar', 'Aich', 'male', 'A +', '98765432198765432', 'sgsgsghshs sgsfs', '1.PNG', '7252624', 'ssgsxgsf', 'Gynecology', '2147483647', 'souravss49@gmail.com', 'souravss49@gmail.com', '$2y$10$8hz6pYceq/7d7Gwu6SjWhu6JLQ0k6jyiGaBZbhlOHFhJg5dA4v9cK', 'patient', 1, 0, 1, NULL, 'lQArFm4fs0ADNF3OKXEG8TmsicU8EbLo3CySW1ZwjNJwa04BriTbMhC1OKSb', NULL, '2016-03-30 02:47:09'),
(3, 'sourav', 'Aich', 'male', 'B +', '87654320987654327', 'xxdgxgs', '_crrr.jpg', '', '', '', '2147483647', 'aichsourav100@gmail.com', 'aichsourav100@gmail.com', '$2y$10$3JGPyfbEv3Hu1MFOBEK5K.VRWanJkcJnchR.PxWBmPDm2y0ggj71G', 'doctor', 1, 0, 1, NULL, 'vesj7BOlgnQETUlA1eTMGCrLJj45G1KkkGY0aS8FvN7DYz9LfVQukeyXz2Yc', NULL, '2016-03-30 03:23:06'),
(4, 'korim', 'Mia', 'male', 'B +', '87654320987654328', 'xxdgxgs', '_crrr.jpg', '', '', '', '2147483647', 'korim@gmail.com', 'korim', '$2y$10$3JGPyfbEv3Hu1MFOBEK5K.VRWanJkcJnchR.PxWBmPDm2y0ggj71G', 'patient', 1, 0, 1, NULL, 'kXxTmhngRUCaIUhV6icfG9EtHlmEgMV3IveLLTF6Dulpd5XGympNn4vdsGx4', NULL, '2016-04-05 06:01:41'),
(6, 'Firog', 'Sarker', 'male', 'B +', '87654320987654310', 'xxdgxgs', '_crrr.jpg', '', '', '', '2147483640', 'firog@gmail.com', 'firog', '$2y$10$3JGPyfbEv3Hu1MFOBEK5K.VRWanJkcJnchR.PxWBmPDm2y0ggj71G', 'patient', 1, 0, 1, NULL, 'QRqePkgJwAlYzhXwx1laTQCkRyylCunGFEEmyyCmgbZqDEhWQ7GsAjUOatTF', NULL, '2016-04-02 04:32:51'),
(7, 'Ashif', 'Ahomed', 'male', 'B +', '87654320987654311', 'xxdgxgs', '_crrr.jpg', '', '', '', '2147483611', 'ashif@gmail.com', 'ashif', '$2y$10$3JGPyfbEv3Hu1MFOBEK5K.VRWanJkcJnchR.PxWBmPDm2y0ggj71G', 'patient', 1, 0, 1, NULL, NULL, NULL, '2016-03-28 18:22:19'),
(8, 'Shoumen', 'Aich', 'male', 'B +', '87654320987654312', 'xxdgxgs', 'DSC_0521.JPG', '', '', '', '2147483612', 'shoumen@gmail.com', 'shoumen', '$2y$10$3JGPyfbEv3Hu1MFOBEK5K.VRWanJkcJnchR.PxWBmPDm2y0ggj71G', 'patient', 1, 0, 1, NULL, NULL, NULL, '2016-03-28 18:22:19'),
(9, 'Golam', 'Kibria', 'male', 'O +', '12345432167854329', 'About me', 'IMG_20140607_121757.jpg', '324', 'Bangladesh Medical', 'General Surgery', '1916342178', 'kibria@gmail.com', 'kibria', '$2y$10$3JGPyfbEv3Hu1MFOBEK5K.VRWanJkcJnchR.PxWBmPDm2y0ggj71G', 'doctor', 1, 0, 1, NULL, NULL, NULL, '2016-03-28 18:33:42'),
(10, 'Bappa', 'Sarker', 'male', 'o+', '10345678901234567', 'hfghjgj', 'bappa.jpg', '', '', '', '01716342179', 'stewdert@gmail.com', 'admin', '$2y$10$OfwpdYE3psjLfdfQQVMXjOw.VJu99t7mwCMCponAOS/LD.eMZFOXi', 'admin', 1, 0, 1, NULL, 'anSSjyOT7lcSpgRZF52TZjp9B2wYxqlSFde3Jj3uKEyxze99XhNFBSgQgCnB', NULL, '2016-04-06 00:00:02'),
(12, 'parimal', 'ghosh', 'male', 'A +', '17181878787909876', '', '', '', '', '', '1713160545', 'parimal@drepsourcingbd.com', 'parimal', '$2y$10$mNZash9rVP/AbkaHiTYhZO6wbsg8jGFH98u0MMGJFvTax./nmYHnq', 'patient', 1, 0, 1, NULL, 'reGeTYW1gMw4PGuXaiVvY3ICoXyec9Iq8Uu9CHM7ILV3xmuxp8FE19qHEC5e', NULL, '2016-03-30 03:32:28'),
(13, 'Golam Kibria', 'Suman', 'male', 'A +', '123456789012', 'test', 'IMG_20160227_175211.jpg', '', '', '', '1711507466', 'mgksuman@gmail.com', 'gksuman', '$2y$10$Mp8ksoyST4s5RNApAqL9RO2/XtZakQYV5zmZPwiMSX3a.u.pguiGu', 'patient', 1, 0, 1, NULL, NULL, NULL, '2016-04-01 23:18:54'),
(14, 'Bappa', 'Sarker', 'male', 'O +', '12345678901234567', 'fghfggjkg', '1048094_4385719381663_1647512184_o.jpg', '4235447', 'Bangladesh medicale', 'Gynecology', '01916342179', 'subrata.sarkar88@gmail.com', 'bappa', '$2y$10$yFouvbFmeSI3BDjnqjhNQe4KnXLnKSUMQ9ZP/I8hffAIZVCGAdSYq', 'doctor', 1, 0, 1, NULL, 'bH8XId4LpkZfPOzs4EPBWi8RedBqKNSGJIoJ2ulGsqNFljOYZjiJ9zJG1nw6', NULL, '2016-04-06 00:02:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nidno_unique` (`nidno`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
