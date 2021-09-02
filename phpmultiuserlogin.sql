-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2021 at 04:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmultiuserlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `message`, `date`) VALUES
(1001, 'Tommorows meeting cancelled', '2020-12-19 13:44:40'),
(1002, 'Good morning everyone', '2020-12-28 07:53:51'),
(1003, 'Today ,we have meeting', '2020-12-28 09:07:37'),
(1005, 'New announcement', '2021-01-12 12:59:04'),
(1006, 'New Announcement', '2021-01-12 12:59:14'),
(1013, 'Good morning', '2021-01-14 03:13:53'),
(1014, 'Good afternoon', '2021-01-14 06:28:33'),
(1023, 'meeting cancel tomorrow', '2021-01-14 07:26:38'),
(1024, 'Please check all document', '2021-01-14 08:27:33'),
(1027, 'Good morning, Please make sure all document details is correct', '2021-01-15 09:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `centre_of_studies`
--

CREATE TABLE `centre_of_studies` (
  `id` int(11) NOT NULL,
  `cos_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centre_of_studies`
--

INSERT INTO `centre_of_studies` (`id`, `cos_name`) VALUES
(15, 'Academy of Graduate and Professional Studies (ACADEMY)'),
(1, 'Ahmad Ibrahim Kulliyyah of Laws (AIKOL)'),
(16, 'Centre for Foundation Studies (CFS)'),
(2, 'Kulliyyah of Allied Health Sciences (KAHS)'),
(3, 'Kulliyyah of Architecture and Environmental Design (KAED)'),
(4, 'Kulliyyah of Dentistry (KOD)'),
(5, 'Kulliyyah of Economics and Management Sciences (KENMS)'),
(6, 'Kulliyyah of Education (KOED)'),
(7, 'Kulliyyah of Engineering (KOE)'),
(8, 'Kulliyyah of Information and Communication Technology (KICT)'),
(9, 'Kulliyyah of Islamic Revealed Knowledge and Human Sciences (KIRKHS)'),
(10, 'Kulliyyah of Languages and Management (KLM)'),
(11, 'Kulliyyah of Medicine (KOM)'),
(12, 'Kulliyyah of Nursing (KON)'),
(13, 'Kulliyyah of Pharmacy (KOP)'),
(14, 'Kulliyyah of Science (KOS)');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_sender` varchar(255) NOT NULL,
  `doc_responsibility` varchar(255) DEFAULT NULL,
  `doc_kulliyah` varchar(255) NOT NULL,
  `doc_description` varchar(255) DEFAULT NULL,
  `doc_receive` datetime NOT NULL,
  `doc_due` datetime NOT NULL,
  `doc_location` varchar(255) NOT NULL,
  `doc_attention` varchar(255) NOT NULL,
  `doc_characteristic` varchar(255) DEFAULT NULL,
  `doc_status` varchar(255) DEFAULT NULL,
  `doc_comment` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `doc_name`, `doc_sender`, `doc_responsibility`, `doc_kulliyah`, `doc_description`, `doc_receive`, `doc_due`, `doc_location`, `doc_attention`, `doc_characteristic`, `doc_status`, `doc_comment`, `owner`) VALUES
(1004, 'MQA 02 Document for the BSC programme', 'Dr. Ameliaa', 'Siti Amrin', 'KICT', 'MQA 01 Document', '2020-12-28 17:11:46', '2021-01-04 09:11:51', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Hardcopy', 'Pending', 'To be reviewed', 'kict user'),
(1005, 'MQA 01 - for Bachelor in Mathematics', 'Dr Zariyah', 'Siti Amrin', 'KOS', '', '2020-12-28 17:25:04', '2021-01-05 08:25:07', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Others', 'Softcopy and Hardcopy', 'Completed', 'For approval', 'kict user'),
(1006, 'New Curriculum Programme', 'SADD - Pn, Aida', 'Anis Asri', 'AIKOL', 'Curriculum', '2020-12-31 12:47:12', '2021-01-07 12:47:14', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'Forward to director', 'Syazmi Hafiz'),
(1009, 'Trying purpose', 'Try', 'Izzati Saharan', 'CELPAD', 'Other', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'Reviewed', 'kict user'),
(1010, 'My Document', 'try 3', 'Izzati Saharan', 'KOS', 'Other', '2021-01-06 00:44:59', '2021-02-05 00:45:01', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Return to sender', 'Syazmi Hafiz'),
(1011, 'MQA 02 - Bachelor of Information Technology', 'Br. Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'Forward to director', 'kict user'),
(1012, '11123', '1', 'Siti Amrin', 'KOD', 'Other', '2021-01-08 11:07:36', '2021-01-14 11:07:39', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Completed', 'Reviewed', 'kict user'),
(1013, 'MQA 01 Bachelor of Nursing', 'Dr. Zaliza', 'Anis Asri', 'KON', 'MQA 01 Document', '2021-01-13 09:37:37', '2021-01-20 09:37:40', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Pending', 'Forward to director', 'Syazmi Hafiz'),
(1014, 'senate meeting', 'Br Firdaus', 'Siti Amrin', 'KICT', 'other', '2021-01-14 15:27:49', '2021-01-21 15:27:52', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Completed', 'Reviewed', 'kict user'),
(1015, 'MQA 01 - Bachelor of Dentistry', 'Dr Ismail', 'Siti Amrin', 'KOD', 'MQA 01 Document', '2021-01-14 16:18:19', '2021-01-21 16:18:23', 'Front Desk', 'Urgent', 'Hardcopy', 'Completed', 'Others', 'Syazmi Hafiz'),
(1016, 'MQA 01 Bachelor of Medicine', 'Dr Syazmi', 'Siti Amrin', 'KOM', 'MQA 01 Document', '2021-01-15 17:40:58', '2021-01-22 17:41:00', 'Document Desk', 'Not Urgent', 'Hardcopy', 'Completed', 'Others', 'Syazmi Hafiz'),
(1017, 'MQA 01 Bachelor of Electrical Engineering', 'Dr. Syazmi', 'Siti Amrin', 'KOE', 'MQA 01 Document', '2021-01-15 17:51:27', '2021-01-23 17:51:30', 'Siti Amrin Desk', 'Urgent', 'Hardcopy', 'Completed', 'Completed', 'Syazmi Hafiz'),
(1018, 'MQA 03 KOS', 'Br Shamir', 'Anis Asri', 'KOS', 'other', '2021-06-04 00:14:25', '2021-06-18 00:14:28', '', 'Urgent', 'Softcopy', 'Pending', 'To be reviewed', 'kict user'),
(1019, 'Testing Document', 'Me', 'Izzati Saharan', 'Academy of Graduate and Professional Studies (ACADEMY)', 'Curriculum Review', '2021-09-01 12:57:44', '2021-09-01 12:57:55', 'youtube.com', 'Urgent', 'Softcopy', 'Pending', 'To be reviewed', 'kict user'),
(1021, 'test2', 'me', 'Syazmi Hafiz', 'Academy of Graduate and Professional Studies (ACADEMY)', 'Curriculum Review', '2021-09-01 13:05:30', '2021-09-01 13:05:35', '', 'Urgent', 'Softcopy', 'Pending', 'Forward to director', 'kict user'),
(1022, 'testr', 'me', 'Syazmi Hafiz', 'Academy of Graduate and Professional Studies (ACADEMY)', 'Curriculum Review', '2021-09-01 13:05:30', '2021-09-01 13:05:35', '', 'Urgent', 'Softcopy', 'Pending', 'Forward to director', 'kict user'),
(1023, '23', 'me', 'Syazmi Hafiz', 'Academy of Graduate and Professional Studies (ACADEMY)', 'Curriculum Review', '2021-09-01 13:05:30', '2021-09-01 13:05:35', '', 'Urgent', 'Softcopy', 'Pending', 'Forward to director', 'kict user'),
(1025, 'Testing Document', 'Test Sender', 'Izzati Saharan', 'Academy of Graduate and Professional Studies (ACADEMY)', 'Curriculum Review', '2021-09-02 14:27:05', '2021-09-02 14:27:08', 'youtube.com', 'Urgent', 'Softcopy', 'Pending', 'To be reviewed', 'kict user');

-- --------------------------------------------------------

--
-- Table structure for table `doc_category`
--

CREATE TABLE `doc_category` (
  `doc_cat_id` int(11) NOT NULL,
  `doc_cat_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_category`
--

INSERT INTO `doc_category` (`doc_cat_id`, `doc_cat_name`) VALUES
(11, 'Curriculum Review'),
(25, 'Examination test'),
(7, 'Full Accreditation (MQA-02) - Self-Accreditation'),
(8, 'Full Accreditation (MQA-02)/Manual Professional Body'),
(3, 'Kertas Cadangan Permohonan Program Baharu (JPT)'),
(4, 'Kertas Cadangan Semakan Kurikulum (JPT)'),
(9, 'New Cycle Accreditation - Self-Accreditation'),
(5, 'Provisional Accreditation (MQA-01) - Self-Accreditation'),
(6, 'Provisional Accreditation (MQA-01)/Manual Professional Body'),
(10, 'Renewal of Accreditation (Professional Body)'),
(34, 'testing category');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `date_logged` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doc_name` varchar(255) NOT NULL,
  `doc_sender` varchar(255) NOT NULL,
  `doc_responsibility` varchar(255) DEFAULT NULL,
  `doc_kulliyah` varchar(255) NOT NULL,
  `doc_description` varchar(255) DEFAULT NULL,
  `doc_receive` datetime NOT NULL,
  `doc_due` datetime NOT NULL,
  `doc_location` varchar(255) NOT NULL,
  `doc_attention` varchar(255) NOT NULL,
  `doc_characteristic` varchar(255) DEFAULT NULL,
  `doc_status` varchar(255) NOT NULL,
  `doc_comment` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `doc_id`, `date_logged`, `doc_name`, `doc_sender`, `doc_responsibility`, `doc_kulliyah`, `doc_description`, `doc_receive`, `doc_due`, `doc_location`, `doc_attention`, `doc_characteristic`, `doc_status`, `doc_comment`, `owner`) VALUES
(1086, 1004, '2020-12-28 09:13:09', 'MK02 Document for the BSC programme', 'Dr. Amelia', 'Anis Asri', 'KICT', 'proposal', '2020-12-28 17:11:46', '2021-01-04 09:11:51', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'For approval', 'kict user'),
(1087, 1004, '2020-12-28 09:14:24', 'MK02 Document for the BSC programme', 'Dr. Amelia', 'Siti Amrin', 'KICT', 'proposal', '2020-12-28 17:11:46', '2021-01-04 09:11:51', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'For approval', NULL),
(1088, 1004, '2020-12-28 09:15:54', 'MK02 Document for the BSC programme', 'Dr. Amelia', 'Siti Amrin', 'KICT', 'proposal', '2020-12-28 17:11:46', '2021-01-04 09:11:51', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'For approval', 'kict user'),
(1089, 1004, '2020-12-28 09:17:27', 'MK02 Document for the BSC programme', 'Dr. Amelia', 'Siti Amrin', 'KICT', '', '2020-12-28 17:11:46', '2021-01-04 09:11:51', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Completed', 'with approval by Dr A', NULL),
(1090, 1005, '2020-12-28 09:28:22', 'MQA 01 - for Bachelor in Mathematics', 'Dr Zariyah', 'Anis Asri', 'KOS', 'MQA01', '2020-12-28 17:25:04', '2021-01-05 08:25:07', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Others', 'Softcopy and Hardcopy', 'Pending', 'For approval', 'kict user'),
(1091, 1006, '2020-12-31 04:47:26', 'New Curriculum Programme', 'SADD - Pn, Aida', 'Anis Asri', 'AIKOL', 'Curriculum', '2020-12-31 12:47:12', '2021-01-07 12:47:14', 'Front Desk', 'Not Urgent', 'Softcopy', 'Pending', 'Accept', 'Syazmi Hafiz'),
(1092, 1005, '2020-12-31 04:54:42', 'MQA 01 - for Bachelor in Mathematics', 'Dr Zariyah', 'Siti Amrin', 'KOS', 'MQA01', '2020-12-28 17:25:04', '2021-01-05 08:25:07', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Others', 'Softcopy and Hardcopy', 'Pending', 'For approval', NULL),
(1095, 1009, '2021-01-05 14:57:31', 'ww', 'w', 'Anis Asri', 'CELPAD', 'proposal', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'yy', 'kict user'),
(1096, 1006, '2021-01-05 15:48:46', 'New Curriculum Programme', 'SADD - Pn, Aida', 'Anis Asri', 'AIKOL', 'Curriculum', '2020-12-31 12:47:12', '2021-01-07 12:47:14', 'Front Desk', 'Not Urgent', 'Softcopy', 'Pending', 'Accept now', NULL),
(1097, 1009, '2021-01-05 15:48:57', 'ww', 'w', 'Anis Asri', 'CELPAD', 'proposal', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'yywww', NULL),
(1098, 1009, '2021-01-05 15:50:34', 'ww', 'w', 'Siti Amrin', 'CELPAD', 'proposal', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'yywww', NULL),
(1099, 1006, '2021-01-05 15:52:36', 'New Curriculum Programme', 'SADD - Pn, Aida', 'Anis Asri', 'AIKOL', 'Curriculum', '2020-12-31 12:47:12', '2021-01-07 12:47:14', 'Front Desk jjj', 'Not Urgent', 'Softcopy', 'Pending', 'Accept now', NULL),
(1100, 1004, '2021-01-05 16:29:42', 'MQA 02 Document for the BSC programme', 'Dr. Amelia', 'Siti Amrin', 'KICT', '', '2020-12-28 17:11:46', '2021-01-04 09:11:51', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Hardcopy', 'Completed', 'with approval by Dr A', 'kict user'),
(1101, 1010, '2021-01-05 16:45:11', 'sdsa', 'dasds', 'Siti Amrin', 'KOS', 'MQA 02 Document', '2021-01-06 00:44:59', '2021-02-05 00:45:01', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Foward to director', 'Syazmi Hafiz'),
(1102, 1005, '2021-01-05 16:46:05', 'MQA 01 - for Bachelor in Mathematics', 'Dr Zariyah', 'Siti Amrin', 'KOS', 'MQA01', '2020-12-28 17:25:04', '2021-01-05 08:25:07', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Others', 'Softcopy and Hardcopy', 'Completed', 'For approval', 'kict user'),
(1103, 1011, '2021-01-05 16:59:53', 'MQA 02 - Bachelor of Information Technology', 'Br Firdaus', 'Anis Asri', 'KICT', 'MQA 02 Document', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'Forward to director', 'kict user'),
(1104, 1004, '2021-01-05 17:07:40', 'MQA 02 Document for the BSC programme', 'Dr. Amelia', 'Siti Amrin', 'KICT', 'MQA 01 Document', '2020-12-28 17:11:46', '2021-01-04 09:11:51', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Hardcopy', 'Pending', 'with approval by Dr A', NULL),
(1105, 1012, '2021-01-08 03:07:52', '111', '1', 'Anis Asri', 'KOD', 'Curriculum Review Document', '2021-01-08 11:07:36', '2021-01-14 11:07:39', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Forward to director', 'kict user'),
(1106, 1012, '2021-01-08 03:08:26', '111', '1', 'Izzati Saharan', 'KOD', '', '2021-01-08 11:07:36', '2021-01-14 11:07:39', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Forward to director', NULL),
(1107, 1012, '2021-01-08 03:09:19', '111', '1', 'Siti Amrin', 'KOD', '', '2021-01-08 11:07:36', '2021-01-14 11:07:39', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Forward to director', 'kict user'),
(1108, 1011, '2021-01-08 03:14:21', 'MQA 02 - Bachelor of Information Technology', 'Br Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'To be reviewed', NULL),
(1109, 1011, '2021-01-08 03:15:11', 'MQA 02 - Bachelor of Information Technology', 'Br Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'To be reviewed', NULL),
(1110, 1011, '2021-01-08 03:16:12', 'MQA 02 - Bachelor of Information Technology', 'Br Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'To be reviewed', NULL),
(1111, 1011, '2021-01-08 03:18:36', 'MQA 02 - Bachelor of Information Technology', 'Br Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'Return to sender', NULL),
(1112, 1011, '2021-01-08 03:19:04', 'MQA 02 - Bachelor of Information Technology', 'Br Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'Reviewed', NULL),
(1113, 1011, '2021-01-08 03:19:23', 'MQA 02 - Bachelor of Information Technology', 'Br Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'Reviewed', NULL),
(1114, 1013, '2021-01-13 01:37:56', 'MQA 01 Bachelor of Nursing', 'Dr Zaliza', 'Anis Asri', 'KON', 'MQA 01 Document', '2021-01-13 09:37:37', '2021-01-20 09:37:40', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Pending', 'Forward to director', 'Syazmi Hafiz'),
(1115, 1009, '2021-01-13 01:41:54', 'ww', 'w', 'Izzati Saharan', 'CELPAD', '', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'yywww', NULL),
(1116, 1010, '2021-01-13 01:49:02', 'sdsa', 'dasds', 'Izzati Saharan', 'KOS', '', '2021-01-06 00:44:59', '2021-02-05 00:45:01', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Foward to director', NULL),
(1117, 1009, '2021-01-13 02:00:46', 'ww', 'w', 'Izzati Saharan', 'CELPAD', '', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'yywww', NULL),
(1118, 1009, '2021-01-13 14:29:47', 'wwwww', 'w', 'Izzati Saharan', 'CELPAD', '', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'yywww', 'kict user'),
(1119, 1011, '2021-01-14 03:22:07', 'MQA 02 - Bachelor of Information Technology', 'Br. Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'Reviewed', NULL),
(1120, 1012, '2021-01-14 03:31:50', '11123', '1', 'Siti Amrin', 'KOD', '', '2021-01-08 11:07:36', '2021-01-14 11:07:39', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Forward to director', NULL),
(1121, 1013, '2021-01-14 06:10:31', 'MQA 01 Bachelor of Nursing', 'Dr. Zaliza', 'Anis Asri', 'KON', 'MQA 01 Document', '2021-01-13 09:37:37', '2021-01-20 09:37:40', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Pending', 'To be reviewed', NULL),
(1122, 1004, '2021-01-14 06:11:08', 'MQA 02 Document for the BSC programme', 'Dr. Ameliaa', 'Siti Amrin', 'KICT', 'MQA 01 Document', '2020-12-28 17:11:46', '2021-01-04 09:11:51', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Hardcopy', 'Pending', 'To be reviewed', NULL),
(1123, 1009, '2021-01-14 06:19:38', 'wwwww', 'w', 'Izzati Saharan', 'CELPAD', '', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'Reviewed', 'kict user'),
(1124, 1006, '2021-01-14 06:20:56', 'New Curriculum Programme', 'SADD - Pn, Aida', 'Anis Asri', 'AIKOL', 'Curriculum', '2020-12-31 12:47:12', '2021-01-07 12:47:14', 'Front Desk jjj', 'Not Urgent', 'Softcopy', 'Pending', 'Forward to director', NULL),
(1125, 1011, '2021-01-14 06:21:03', 'MQA 02 - Bachelor of Information Technology', 'Br. Firdaus', 'Anis Asri', 'KICT', '', '2021-01-06 00:59:34', '2021-01-14 00:59:36', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy', 'Pending', 'Forward to director', NULL),
(1126, 1013, '2021-01-14 06:21:11', 'MQA 01 Bachelor of Nursing', 'Dr. Zaliza', 'Anis Asri', 'KON', 'MQA 01 Document', '2021-01-13 09:37:37', '2021-01-20 09:37:40', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Pending', 'Forward to director', NULL),
(1127, 1012, '2021-01-14 06:21:58', '11123', '1', 'Siti Amrin', 'KOD', '', '2021-01-08 11:07:36', '2021-01-14 11:07:39', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Reviewed', NULL),
(1128, 1005, '2021-01-14 06:22:50', 'MQA 01 - for Bachelor in Mathematics', 'Dr Zariyah', 'Siti Amrin', 'KOS', '', '2020-12-28 17:25:04', '2021-01-05 08:25:07', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Others', 'Softcopy and Hardcopy', 'Completed', 'For approval', NULL),
(1129, 1009, '2021-01-14 06:29:46', 'Trying purpose', 'Try', 'Izzati Saharan', 'CELPAD', 'Other', '2021-01-05 22:57:18', '2021-01-13 22:57:20', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Urgent', 'Softcopy', 'Pending', 'Reviewed', 'kict user'),
(1130, 1006, '2021-01-14 06:31:35', 'New Curriculum Programme', 'SADD - Pn, Aida', 'Anis Asri', 'AIKOL', 'Curriculum', '2020-12-31 12:47:12', '2021-01-07 12:47:14', 'Front Desk jl', 'Not Urgent', 'Softcopy', 'Pending', 'Forward to director', 'Syazmi Hafiz'),
(1131, 1010, '2021-01-14 06:38:36', 'try 2', 'try 2', 'Izzati Saharan', 'KOS', 'Other', '2021-01-06 00:44:59', '2021-02-05 00:45:01', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'To be reviewed', 'Syazmi Hafiz'),
(1132, 1010, '2021-01-14 06:38:54', 'try 3', 'try 3', 'Izzati Saharan', 'KOS', 'Other', '2021-01-06 00:44:59', '2021-02-05 00:45:01', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'To be reviewed', 'Syazmi Hafiz'),
(1133, 1014, '2021-01-14 07:28:10', 'senate meeting', 'Br Firdaus', 'Anis Asri', 'KICT', 'other', '2021-01-14 15:27:49', '2021-01-21 15:27:52', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Pending', 'Forward to director', 'kict user'),
(1134, 1014, '2021-01-14 07:28:48', 'senate meeting', 'Br Firdaus', 'Siti Amrin', 'KICT', 'other', '2021-01-14 15:27:49', '2021-01-21 15:27:52', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Pending', 'Reviewed', NULL),
(1135, 1014, '2021-01-14 07:29:08', 'senate meeting', 'Br Firdaus', 'Siti Amrin', 'KICT', 'other', '2021-01-14 15:27:49', '2021-01-21 15:27:52', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Completed', 'Reviewed', NULL),
(1136, 1012, '2021-01-14 07:30:14', '11123', '1', 'Siti Amrin', 'KOD', 'Other', '2021-01-08 11:07:36', '2021-01-14 11:07:39', 'https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing', 'Not Urgent', 'Softcopy and Hardcopy', 'Completed', 'Reviewed', NULL),
(1137, 1010, '2021-01-14 07:32:50', 'try 3', 'try 3', 'Izzati Saharan', 'KOS', 'Other', '2021-01-06 00:44:59', '2021-02-05 00:45:01', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Reviewed', 'Syazmi Hafiz'),
(1138, 1015, '2021-01-14 08:19:41', 'MQA 01 - Bachelor of Dentistry', 'Dr Ismail', 'Anis Asri', 'KOD', 'MQA 01 Document', '2021-01-14 16:18:19', '2021-01-21 16:18:23', 'Front Desk', 'Urgent', 'Hardcopy', 'Pending', 'Forward to director', 'Syazmi Hafiz'),
(1139, 1015, '2021-01-14 08:21:07', 'MQA 01 - Bachelor of Dentistry', 'Dr Ismail', 'Siti Amrin', 'KOD', 'MQA 01 Document', '2021-01-14 16:18:19', '2021-01-21 16:18:23', 'Front Desk', 'Urgent', 'Hardcopy', 'Pending', 'Reviewed', NULL),
(1140, 1015, '2021-01-14 08:22:17', 'MQA 01 - Bachelor of Dentistry', 'Dr Ismail', 'Siti Amrin', 'KOD', 'MQA 01 Document', '2021-01-14 16:18:19', '2021-01-21 16:18:23', 'Front Desk', 'Urgent', 'Hardcopy', 'Completed', 'Others', NULL),
(1141, 1010, '2021-01-14 08:28:32', 'try 3', 'try 3', 'Izzati Saharan', 'KOS', 'Other', '2021-01-06 00:44:59', '2021-02-05 00:45:01', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Return to sender', 'Syazmi Hafiz'),
(1142, 1016, '2021-01-15 09:41:24', 'MQA 01 Bachelor of Medicine', 'Dr Syazmi', 'Anis Asri', 'KOM', 'MQA 01 Document', '2021-01-15 17:40:58', '2021-01-22 17:41:00', 'Front Desk', 'Not Urgent', 'Hardcopy', 'Pending', 'Forward to director', 'Syazmi Hafiz'),
(1143, 1016, '2021-01-15 09:42:15', 'MQA 01 Bachelor of Medicine', 'Dr Syazmi', 'Siti Amrin', 'KOM', 'MQA 01 Document', '2021-01-15 17:40:58', '2021-01-22 17:41:00', 'Siti Amrin Desk', 'Not Urgent', 'Hardcopy', 'Pending', 'Reviewed', NULL),
(1144, 1016, '2021-01-15 09:43:03', 'MQA 01 Bachelor of Medicine', 'Dr Syazmi', 'Siti Amrin', 'KOM', 'MQA 01 Document', '2021-01-15 17:40:58', '2021-01-22 17:41:00', 'Document Desk', 'Not Urgent', 'Hardcopy', 'Completed', 'Others', NULL),
(1145, 1017, '2021-01-15 09:51:54', 'MQA 01 Bachelor of Electrical Engineering', 'Dr. Syazmi', 'Anis Asri', 'KOE', 'MQA 01 Document', '2021-01-15 17:51:27', '2021-01-23 17:51:30', 'Front Desk', 'Urgent', 'Hardcopy', 'Pending', 'Forward to director', 'Syazmi Hafiz'),
(1146, 1017, '2021-01-15 09:52:38', 'MQA 01 Bachelor of Electrical Engineering', 'Dr. Syazmi', 'Siti Amrin', 'KOE', 'MQA 01 Document', '2021-01-15 17:51:27', '2021-01-23 17:51:30', 'Director Desk', 'Urgent', 'Hardcopy', 'Pending', 'Reviewed', NULL),
(1147, 1017, '2021-01-15 09:53:15', 'MQA 01 Bachelor of Electrical Engineering', 'Dr. Syazmi', 'Siti Amrin', 'KOE', 'MQA 01 Document', '2021-01-15 17:51:27', '2021-01-23 17:51:30', 'Siti Amrin Desk', 'Urgent', 'Hardcopy', 'Completed', 'Completed', NULL),
(1148, 1018, '2021-06-03 16:14:36', 'MQA 03 KOS', 'Br Shamir', 'Anis Asri', 'KOS', 'other', '2021-06-04 00:14:25', '2021-06-18 00:14:28', '', 'Urgent', 'Softcopy', 'Pending', 'To be reviewed', 'kict user'),
(1149, 1022, '2021-09-01 05:08:07', 'testr', 'me', 'Syazmi Hafiz', 'Academy of Graduate and Professional Studies (ACADEMY)', 'Curriculum Review', '2021-09-01 13:05:30', '2021-09-01 13:05:35', '', 'Urgent', 'Softcopy', 'Pending', 'Forward to director', 'kict user'),
(1150, 1023, '2021-09-01 05:09:13', '23', 'me', 'Syazmi Hafiz', 'Academy of Graduate and Professional Studies (ACADEMY)', 'Curriculum Review', '2021-09-01 13:05:30', '2021-09-01 13:05:35', '', 'Urgent', 'Softcopy', 'Pending', 'Forward to director', 'kict user'),
(1151, 1010, '2021-09-02 06:21:09', 'My Document', 'try 3', 'Izzati Saharan', 'KOS', 'Other', '2021-01-06 00:44:59', '2021-02-05 00:45:01', 'Front Desk, https://drive.google.com/file/d/1Mj5pflm7o18SmgMoHW-zgJ0Kk05_VM8C/view?usp=sharing ', 'Not Urgent', 'Softcopy and Hardcopy', 'Pending', 'Return to sender', 'Syazmi Hafiz'),
(1153, 1025, '2021-09-02 06:28:04', 'Testing Document', 'Test Sender', 'Izzati Saharan', 'Academy of Graduate and Professional Studies (ACADEMY)', 'Curriculum Review', '2021-09-02 14:27:05', '2021-09-02 14:27:08', 'youtube.com', 'Urgent', 'Softcopy', 'Pending', 'To be reviewed', 'kict user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `role_name` varchar(255) DEFAULT NULL,
  `staff_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`, `role_name`, `staff_id`) VALUES
(1001, 'admin', 'admin@gmail.com', '12345', 1, 'admin', '2017724867'),
(1013, 'Izzati Saharan', 'izzatisaharan98@gmail.com', '12345', 0, 'assistant', '2019993847'),
(1014, 'Syazmi Hafiz', 'syazmi@gmail.com', '12345', 0, 'officer', '2019994857'),
(1015, 'Anis Asri', 'anisasri1997@gmail.com', '12345', 0, 'director', '2049958395'),
(1019, 'kict user', 'kict_user@gmail.com', '12345', 0, 'owner', '112233');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centre_of_studies`
--
ALTER TABLE `centre_of_studies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cos_name` (`cos_name`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_category`
--
ALTER TABLE `doc_category`
  ADD PRIMARY KEY (`doc_cat_id`),
  ADD UNIQUE KEY `doc_cat_name` (`doc_cat_name`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `staff_id` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;

--
-- AUTO_INCREMENT for table `centre_of_studies`
--
ALTER TABLE `centre_of_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1026;

--
-- AUTO_INCREMENT for table `doc_category`
--
ALTER TABLE `doc_category`
  MODIFY `doc_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1154;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `documents` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
