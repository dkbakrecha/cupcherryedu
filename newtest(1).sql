-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 07:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `correct` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `correct`, `sort_order`) VALUES
(7, 6, 'sdfg', 0, 0),
(8, 6, 'cvb', 0, 0),
(9, 6, 'wert', 1, 0),
(10, 6, 'dfg', 0, 0),
(11, 7, 'asd', 0, 0),
(12, 7, 'dcc', 0, 0),
(13, 7, 'as', 0, 0),
(14, 7, 'ccc', 1, 0),
(15, 8, 'opt1', 0, 0),
(16, 8, 'opt 2', 1, 0),
(17, 8, 'opt', 0, 0),
(18, 8, ' opt 4', 0, 0),
(19, 9, 'Home Tool Markup Language', 0, 0),
(20, 9, 'Hyper Text Markup Language', 1, 0),
(21, 9, ' Hyperlinks and Text Markup Language', 0, 0),
(23, 10, 'Microsoft', 0, 0),
(24, 10, 'Google', 0, 0),
(25, 10, 'The World Wide Web Consortium', 1, 0),
(26, 10, 'Mozilla', 0, 0),
(27, 11, '<head>', 0, 0),
(28, 11, '<h6>', 0, 0),
(29, 11, '<h1>', 1, 0),
(30, 11, '<heading>', 0, 0),
(31, 12, '<br>', 1, 0),
(32, 12, '<lb>', 0, 0),
(33, 12, ' <break>', 0, 0),
(34, 12, '<heading>', 0, 0),
(35, 13, 'Structured Query Language', 1, 0),
(36, 13, 'Structured Question Language', 0, 0),
(37, 13, 'Strong Question Language', 0, 0),
(38, 13, 'Strong Query Language', 0, 0),
(39, 14, 'SELECT', 1, 0),
(40, 14, 'GET', 0, 0),
(41, 14, 'OPEN', 0, 0),
(42, 14, ' EXTRACT', 0, 0),
(43, 15, 'SAVE AS', 0, 0),
(44, 15, 'UPDATE', 1, 0),
(45, 15, 'MODIFY', 0, 0),
(46, 15, 'SAVE', 0, 0),
(47, 16, 'COLLAPSE', 0, 0),
(48, 16, 'REMOVE', 0, 0),
(49, 16, 'DELETE', 1, 0),
(50, 16, 'Noghing', 0, 0),
(51, 17, 'INSERT NEW', 0, 0),
(52, 17, 'ADD NEW', 0, 0),
(53, 17, 'ADD RECORD', 0, 0),
(54, 17, 'INSERT INTO', 1, 0),
(55, 18, 'EXTRACT FirstName FROM Persons', 0, 0),
(56, 18, 'SELECT FirstName FROM Persons', 1, 0),
(57, 18, ' SELECT Persons.FirstName', 0, 0),
(58, 18, 'Nothing', 0, 0),
(59, 19, 'SELECT * FROM Persons', 1, 0),
(60, 19, 'SELECT [all] FROM Persons', 0, 0),
(61, 19, 'SELECT *.Persons', 0, 0),
(62, 19, 'SELECT Persons', 0, 0),
(63, 20, 'SELECT * FROM Persons WHERE FirstName<>''Peter''', 0, 0),
(64, 20, ' SELECT [all] FROM Persons WHERE FirstName=''Peter''', 0, 0),
(65, 20, 'SELECT [all] FROM Persons WHERE FirstName LIKE ''Peter''', 0, 0),
(66, 20, 'SELECT * FROM Persons WHERE FirstName=''Peter''', 1, 0),
(67, 21, 'SELECT * FROM Persons WHERE FirstName LIKE ''%a''', 0, 0),
(68, 21, ' SELECT * FROM Persons WHERE FirstName LIKE ''a%''', 1, 0),
(69, 21, 'SELECT * FROM Persons WHERE FirstName=''%a%''', 0, 0),
(70, 21, 'SELECT * FROM Persons WHERE FirstName=''a''', 0, 0),
(71, 22, 'SORT BY', 0, 0),
(72, 22, 'SORT', 0, 0),
(73, 22, 'ORDER', 0, 0),
(74, 22, 'ORDER BY', 1, 0),
(75, 23, '28 32 	', 0, 0),
(76, 23, '28 22', 0, 0),
(77, 23, '22 28', 1, 0),
(78, 23, '32 36', 0, 0),
(79, 24, '28 32', 0, 0),
(80, 24, '28 22', 0, 0),
(81, 24, '22 28', 1, 0),
(82, 24, '32 36', 0, 0),
(83, 25, 'Dangerous', 0, 0),
(84, 25, 'Old', 1, 0),
(85, 25, 'financial', 0, 0),
(86, 25, 'anxious', 0, 0),
(87, 26, 'tense', 0, 0),
(88, 26, 'thick', 1, 0),
(89, 26, 'general', 0, 0),
(90, 26, 'tall', 0, 0),
(91, 27, 'assess', 1, 0),
(92, 27, 'award', 0, 0),
(93, 27, 'impress', 0, 0),
(94, 27, 'indicate', 0, 0),
(95, 28, 'dirt', 1, 0),
(96, 28, 'bean', 0, 0),
(97, 28, 'corn', 0, 0),
(98, 28, 'leaf', 0, 0),
(99, 29, 'aa', 1, 0),
(100, 29, 'bb', 0, 0),
(101, 29, 'cc', 0, 0),
(102, 29, 'dd', 0, 0),
(103, 30, 'a', 1, 0),
(104, 30, 'b', 0, 0),
(105, 30, 'c', 0, 0),
(106, 30, 'd', 0, 0),
(107, 31, 'Yakihiro Matsumoto', 1, 0),
(108, 31, 'Dannis Retchie', 0, 0),
(109, 31, 'Bill Gates', 0, 0),
(110, 31, 'Steve Jobs', 0, 0),
(111, 32, 'Playing Card', 0, 0),
(112, 32, 'Private Key', 0, 0),
(113, 32, 'Wild Card', 1, 0),
(114, 32, 'Public Key', 0, 0),
(115, 33, 'Indian Business Machines', 0, 0),
(116, 33, 'International Business Machines', 1, 0),
(117, 33, 'International Business Model', 0, 0),
(118, 33, 'International Banking Machines', 0, 0),
(119, 34, 'Binary', 1, 0),
(120, 34, 'Biometric', 0, 0),
(121, 34, 'Bicentennial', 0, 0),
(122, 34, 'Byte', 0, 0),
(123, 35, 'Password', 1, 0),
(124, 35, 'Passport', 0, 0),
(125, 35, 'Entry Code', 0, 0),
(126, 35, 'Access Code', 0, 0),
(127, 36, 'Dijkastra', 0, 0),
(128, 36, 'Niklaus Writh', 1, 0),
(129, 36, 'D. Khuth', 0, 0),
(130, 36, 'Aho', 0, 0),
(131, 37, 'Form', 0, 0),
(132, 37, 'Query', 0, 0),
(133, 37, 'Report', 1, 0),
(134, 37, 'Table', 0, 0),
(135, 38, 'Repository', 1, 0),
(136, 38, 'Data warehouse', 0, 0),
(137, 38, 'RAD', 0, 0),
(138, 38, 'SASE', 0, 0),
(139, 39, 'Double Clicking', 0, 0),
(140, 39, 'highlighting', 0, 0),
(141, 39, 'Dragging', 1, 0),
(142, 39, 'Pointing', 0, 0),
(143, 40, 'Presentation', 0, 0),
(144, 40, 'Network', 0, 0),
(145, 40, 'Session', 0, 0),
(146, 40, 'Transport', 1, 0),
(147, 41, 'Compiler', 0, 0),
(148, 41, 'Loader', 0, 0),
(149, 41, 'Operating System', 1, 0),
(150, 41, 'Assembler', 0, 0),
(151, 42, 'MAN', 0, 0),
(152, 42, 'PAN', 0, 0),
(153, 42, 'CAN', 0, 0),
(154, 42, 'LAN', 1, 0),
(155, 43, '20th November ', 1, 0),
(156, 43, '20th August 	', 0, 0),
(157, 43, '20th September', 0, 0),
(158, 43, '20th February 	', 0, 0),
(159, 44, 'President of India', 0, 0),
(160, 44, 'United Nations', 1, 0),
(161, 44, 'United States of America 	', 0, 0),
(162, 44, 'Indian Parliament 	', 0, 0),
(163, 45, 'Mahatma Gandhi 	', 0, 0),
(164, 45, 'Lal Bahadur Shastri', 0, 0),
(165, 45, 'Sarvepalli Radhakrishnan 	', 0, 0),
(166, 45, 'Pt. Jawaharlal Nehru', 1, 0),
(167, 46, '1945', 0, 0),
(168, 46, '1946', 1, 0),
(169, 46, '1947', 0, 0),
(170, 46, '1948', 0, 0),
(171, 47, '1213', 0, 0),
(172, 47, '13', 0, 0),
(173, 47, '14', 1, 0),
(174, 47, '15', 0, 0),
(175, 48, 'Lotus', 0, 0),
(176, 48, 'Lilly', 0, 0),
(177, 48, 'Daisy', 0, 0),
(178, 48, 'Rose', 1, 0),
(179, 49, 'Foto (Hindi) 	', 1, 0),
(180, 49, 'Aaji Ajoba (Marathi) 	', 0, 0),
(181, 49, 'Amulyam (Telugu) 	', 0, 0),
(182, 49, 'Putaani Party (Kannada) 	', 0, 0),
(183, 50, ' Lisa Ray ', 0, 0),
(184, 50, ' Nandita Das ', 1, 0),
(185, 50, ' Deepika Padukone ', 0, 0),
(186, 50, ' Raima Sen ', 0, 0),
(187, 51, 'Hyderabad', 1, 0),
(188, 51, 'Chennai', 0, 0),
(189, 51, 'Bangalore', 0, 0),
(190, 51, 'Mysore', 0, 0),
(191, 52, ' Child Relief and You ', 0, 0),
(192, 52, ' Child Rehabilitation and You ', 0, 0),
(193, 52, ' Child Rights and You ', 1, 0),
(194, 52, ' Child Reservation and You ', 0, 0),
(195, 53, 'Indra Gandhi', 1, 0),
(196, 53, 'Narendra Modi', 0, 0),
(197, 53, 'Morarji Desai', 0, 0),
(198, 53, 'IK Gujral', 0, 0),
(199, 54, 'Fetching', 0, 0),
(200, 54, 'Storing', 0, 0),
(201, 54, 'Executing', 1, 0),
(202, 54, 'Decoding', 0, 0),
(203, 55, 'High level language', 0, 0),
(204, 55, 'Query language', 1, 0),
(205, 55, ' SQL', 0, 0),
(206, 55, '4 GL', 0, 0),
(207, 56, ' Input', 1, 0),
(208, 56, 'Output', 0, 0),
(209, 56, ' Software', 0, 0),
(210, 56, ' Storage', 0, 0),
(211, 57, 'RAM test', 0, 0),
(212, 57, 'Disk drive test', 0, 0),
(213, 57, 'Memory test', 0, 0),
(214, 57, 'Power-on self-test', 1, 0),
(215, 58, 'Page UP', 1, 0),
(216, 58, 'A', 0, 0),
(217, 58, ' Home', 0, 0),
(218, 58, 'Enter', 0, 0),
(219, 59, 'Sorting', 1, 0),
(220, 59, 'Classifying', 0, 0),
(221, 59, 'Reproducing', 0, 0),
(222, 59, 'Summarizing', 0, 0),
(223, 60, 'Broadcast linking', 1, 0),
(224, 60, 'Narrowcast linking', 0, 0),
(225, 60, ' Point to point linking', 0, 0),
(226, 60, 'All of these', 0, 0),
(227, 61, 'Character, field, file, record, database', 0, 0),
(228, 61, 'Database, tile, record, field, character', 0, 0),
(229, 61, 'Character, field, record, file, database', 1, 0),
(230, 61, 'Character, file, record, field, database', 0, 0),
(231, 62, 'First Generation', 0, 0),
(232, 62, 'Second Generation', 0, 0),
(233, 62, 'Third Generation', 0, 0),
(234, 62, 'Fourth Generation', 1, 0),
(235, 63, '1987', 0, 0),
(236, 63, '1988', 0, 0),
(237, 63, '1989', 1, 0),
(238, 63, '1990', 0, 0),
(239, 64, 'TypePad', 0, 0),
(240, 64, 'Pinterest', 1, 0),
(241, 64, 'Blogger', 0, 0),
(242, 64, 'WordPress', 0, 0),
(243, 65, 'information engines', 0, 0),
(244, 65, 'locator engines', 0, 0),
(245, 65, 'web browsers', 0, 0),
(246, 65, 'search engines', 1, 0),
(247, 66, 'stores information about the user''s web activity', 1, 0),
(248, 66, 'stores software developed by the user', 0, 0),
(249, 66, 'stores the password of the user', 0, 0),
(250, 66, 'stores the command used by the user', 0, 0),
(251, 67, 'Internet', 0, 0),
(252, 67, 'Data card', 0, 0),
(253, 67, 'Web browsers', 1, 0),
(254, 67, 'RAM', 0, 0),
(255, 68, 'Open it to about the sender and answer it', 0, 0),
(256, 68, 'Delete it after opening it', 0, 0),
(257, 68, 'Delete it without opening it', 1, 0),
(258, 68, 'Open it and try to find who the sender is', 0, 0),
(259, 69, 'Function', 0, 0),
(260, 69, 'Control', 1, 0),
(261, 69, 'Arrow', 0, 0),
(262, 69, 'Space Bar', 0, 0),
(263, 70, 'Screen', 0, 0),
(264, 70, 'Icon', 0, 0),
(265, 70, 'Menu', 1, 0),
(266, 70, 'Backup', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(60) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_hits`
--

CREATE TABLE `blog_hits` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `ip_addr` varchar(16) NOT NULL COMMENT 'ip address of user''s system',
  `user_id` int(11) NOT NULL COMMENT '0 = nouser, > 0 = user_id',
  `created` datetime DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_hits`
--

INSERT INTO `blog_hits` (`id`, `post_id`, `ip_addr`, `user_id`, `created`, `status`) VALUES
(1, 13, '::1', 0, '2016-08-08 20:18:00', 1),
(2, 14, '116.202.251.216', 0, '2016-09-11 17:31:32', 1),
(3, 15, '116.202.251.216', 0, '2016-09-11 17:49:54', 1),
(4, 15, '202.78.172.178', 0, '2016-09-12 08:50:00', 1),
(5, 15, '116.203.62.119', 0, '2016-09-12 15:56:11', 1),
(6, 15, '116.202.248.64', 5, '2016-09-16 19:49:07', 1),
(7, 15, '182.75.32.238', 0, '2016-09-21 05:48:22', 1),
(8, 14, '202.78.172.178', 0, '2016-09-21 11:37:49', 1),
(9, 12, '202.78.172.178', 0, '2016-09-21 11:39:07', 1),
(10, 12, '66.249.79.92', 0, '2016-09-22 18:34:41', 1),
(11, 13, '66.249.79.92', 0, '2016-09-22 21:40:56', 1),
(12, 14, '122.167.108.80', 0, '2016-09-23 19:14:00', 1),
(13, 16, '202.78.172.178', 0, '2016-09-26 06:59:26', 1),
(14, 16, '66.249.79.92', 0, '2016-09-26 12:38:46', 1),
(15, 15, '66.249.79.92', 0, '2016-09-27 00:25:59', 1),
(16, 10, '66.249.79.92', 0, '2016-09-27 19:47:17', 1),
(17, 16, '158.69.228.14', 0, '2016-09-28 21:24:04', 1),
(18, 15, '158.69.228.14', 0, '2016-09-28 21:24:09', 1),
(19, 14, '158.69.228.14', 0, '2016-09-28 21:24:14', 1),
(20, 13, '158.69.228.14', 0, '2016-09-28 21:24:20', 1),
(21, 12, '158.69.228.14', 0, '2016-09-28 21:24:25', 1),
(22, 11, '158.69.228.14', 0, '2016-09-28 21:24:30', 1),
(23, 10, '158.69.228.14', 0, '2016-09-28 21:24:36', 1),
(24, 9, '158.69.228.14', 0, '2016-09-28 21:24:41', 1),
(25, 15, '66.249.79.100', 0, '2016-09-29 16:52:20', 1),
(26, 12, '66.249.79.96', 0, '2016-09-30 02:33:48', 1),
(27, 17, '116.202.253.90', 0, '2016-10-02 09:25:23', 1),
(28, 17, '66.249.79.92', 0, '2016-10-02 09:48:41', 1),
(29, 17, '116.202.248.16', 0, '2016-10-02 12:29:35', 1),
(30, 17, '180.215.142.217', 0, '2016-10-02 19:36:33', 1),
(31, 17, '180.215.142.217', 5, '2016-10-02 19:37:01', 1),
(32, 15, '117.240.110.147', 0, '2016-10-05 10:42:54', 1),
(33, 14, '117.240.126.214', 0, '2016-10-06 10:50:01', 1),
(34, 16, '117.240.126.214', 0, '2016-10-06 11:02:07', 1),
(35, 15, '117.240.126.214', 0, '2016-10-06 11:02:55', 1),
(36, 13, '117.240.126.214', 0, '2016-10-06 11:03:56', 1),
(37, 11, '66.249.79.92', 0, '2016-10-07 20:31:28', 1),
(38, 9, '66.249.79.96', 0, '2016-10-09 12:04:13', 1),
(39, 11, '66.249.79.96', 0, '2016-10-09 13:54:54', 1),
(40, 10, '66.249.79.96', 0, '2016-10-09 23:14:54', 1),
(41, 15, '66.249.79.96', 0, '2016-10-10 02:57:21', 1),
(42, 10, '66.249.79.100', 0, '2016-10-10 03:51:23', 1),
(43, 11, '66.249.79.100', 0, '2016-10-10 04:39:03', 1),
(44, 9, '66.249.79.92', 0, '2016-10-10 05:19:37', 1),
(45, 12, '66.249.79.100', 0, '2016-10-10 13:21:13', 1),
(46, 17, '47.9.224.181', 0, '2016-10-11 21:11:39', 1),
(47, 17, '47.9.133.223', 0, '2016-10-12 03:17:34', 1),
(48, 17, '47.9.175.192', 0, '2016-10-15 13:00:58', 1),
(49, 14, '202.133.49.26', 0, '2016-10-16 11:17:25', 1),
(50, 10, '66.249.79.108', 0, '2016-10-16 19:06:32', 1),
(51, 10, '66.249.79.104', 0, '2016-10-16 19:06:33', 1),
(52, 15, '66.249.64.92', 0, '2016-10-17 12:36:59', 1),
(53, 9, '66.249.79.100', 0, '2016-10-17 17:22:35', 1),
(54, 12, '66.249.79.104', 0, '2016-10-17 19:07:07', 1),
(55, 10, '66.249.79.173', 0, '2016-10-19 20:32:46', 1),
(56, 15, '66.249.79.176', 0, '2016-10-19 20:36:21', 1),
(57, 12, '66.249.79.173', 0, '2016-10-19 20:36:34', 1),
(58, 11, '66.249.79.176', 0, '2016-10-19 20:39:51', 1),
(59, 9, '66.249.79.176', 0, '2016-10-19 22:50:58', 1),
(60, 9, '66.249.79.173', 0, '2016-10-19 22:51:01', 1),
(61, 15, '66.249.79.173', 0, '2016-10-20 01:32:24', 1),
(62, 11, '66.249.79.173', 0, '2016-10-20 02:12:16', 1),
(63, 17, '47.9.251.228', 0, '2016-10-20 05:22:40', 1),
(64, 10, '66.249.79.176', 0, '2016-10-20 14:29:03', 1),
(65, 12, '66.249.79.176', 0, '2016-10-20 14:59:38', 1),
(66, 15, '66.249.73.156', 0, '2016-10-20 20:55:57', 1),
(67, 12, '66.249.73.164', 0, '2016-10-20 20:59:02', 1),
(68, 11, '66.249.73.160', 0, '2016-10-20 21:13:27', 1),
(69, 9, '66.249.73.156', 0, '2016-10-20 21:13:28', 1),
(70, 13, '66.249.79.173', 0, '2016-10-21 02:40:04', 1),
(71, 11, '66.249.73.156', 0, '2016-10-21 13:06:52', 1),
(72, 10, '66.249.73.160', 0, '2016-10-21 13:15:05', 1),
(73, 9, '66.249.79.179', 0, '2016-10-21 13:45:37', 1),
(74, 9, '66.249.79.112', 0, '2016-10-25 17:41:43', 1),
(75, 14, '66.249.79.96', 0, '2016-10-29 18:54:17', 1),
(76, 14, '66.249.79.92', 0, '2016-10-29 18:54:18', 1),
(77, 14, '47.9.171.159', 0, '2016-11-03 17:58:26', 1),
(78, 13, '66.102.8.19', 0, '2016-11-03 18:00:50', 1),
(79, 13, '66.102.6.75', 0, '2016-11-03 18:00:51', 1),
(80, 13, '66.102.7.209', 0, '2016-11-03 18:00:51', 1),
(81, 13, '66.102.6.73', 0, '2016-11-03 18:01:00', 1),
(82, 13, '47.9.128.158', 0, '2016-11-04 14:22:04', 1),
(83, 14, '203.110.242.23', 0, '2016-11-04 16:36:42', 1),
(84, 14, '66.249.69.145', 0, '2016-11-06 01:57:42', 1),
(85, 14, '66.249.79.173', 0, '2016-11-07 01:29:48', 1),
(86, 16, '66.249.79.173', 0, '2016-11-09 01:01:55', 1),
(87, 18, '202.78.172.178', 0, '2016-11-10 07:13:19', 1),
(88, 18, '66.220.145.244', 0, '2016-11-10 07:14:13', 1),
(89, 18, '66.220.145.243', 0, '2016-11-10 07:14:15', 1),
(90, 18, '106.219.6.151', 0, '2016-11-10 09:59:44', 1),
(91, 18, '66.249.79.92', 0, '2016-11-12 02:28:00', 1),
(92, 17, '182.75.32.238', 0, '2016-11-12 18:45:36', 1),
(93, 19, '116.202.253.142', 0, '2016-11-12 20:45:41', 1),
(94, 19, '66.220.145.246', 0, '2016-11-12 20:47:03', 1),
(95, 19, '66.220.145.245', 0, '2016-11-12 20:47:05', 1),
(96, 19, '66.249.79.96', 0, '2016-11-13 02:30:55', 1),
(97, 16, '66.249.85.153', 0, '2016-11-13 08:48:39', 1),
(98, 16, '66.102.6.71', 0, '2016-11-13 08:48:39', 1),
(99, 16, '66.249.85.155', 0, '2016-11-13 08:48:40', 1),
(100, 16, '66.102.6.75', 0, '2016-11-13 08:48:41', 1),
(101, 14, '66.249.79.185', 0, '2016-11-30 06:34:33', 1),
(102, 13, '66.249.79.185', 0, '2016-12-01 16:51:42', 1),
(103, 19, '8.37.232.66', 0, '2016-12-05 09:47:42', 1),
(104, 16, '66.249.79.185', 0, '2016-12-05 11:48:50', 1),
(105, 15, '66.249.79.188', 0, '2016-12-05 16:03:53', 1),
(106, 11, '66.249.79.191', 0, '2016-12-06 18:58:12', 1),
(107, 9, '66.249.79.185', 0, '2016-12-06 22:15:39', 1),
(108, 12, '66.249.79.188', 0, '2016-12-09 23:47:41', 1),
(109, 10, '66.249.79.188', 0, '2016-12-10 02:32:49', 1),
(110, 12, '66.249.79.191', 0, '2016-12-12 14:05:01', 1),
(111, 16, '66.249.79.188', 0, '2016-12-27 14:16:51', 1),
(112, 15, '8.37.230.147', 0, '2017-01-04 17:45:51', 1),
(113, 9, '66.249.79.188', 0, '2017-01-05 04:57:14', 1),
(114, 14, '49.34.101.15', 0, '2017-01-08 16:00:21', 1),
(115, 10, '66.249.79.185', 0, '2017-01-09 19:13:23', 1),
(116, 19, '66.249.79.185', 0, '2017-01-16 23:09:13', 1),
(117, 18, '66.249.79.188', 0, '2017-01-19 02:34:12', 1),
(118, 18, '66.249.79.185', 0, '2017-01-19 02:34:22', 1),
(119, 18, '157.49.105.0', 0, '2017-01-21 14:50:42', 1),
(120, 11, '66.249.79.188', 0, '2017-01-22 18:33:28', 1),
(121, 11, '66.249.79.185', 0, '2017-01-22 18:33:38', 1),
(122, 12, '66.249.79.185', 0, '2017-01-23 11:49:13', 1),
(123, 16, '112.133.246.83', 0, '2017-01-24 11:47:32', 1),
(124, 16, '127.0.0.1', 0, '2017-02-02 15:58:12', 1),
(125, 19, '127.0.0.1', 0, '2017-02-06 16:31:10', 1),
(126, 19, '::1', 0, '2017-02-14 18:20:11', 1),
(127, 16, '::1', 0, '2017-03-30 20:03:14', 1),
(128, 16, '::1', 5, '2017-03-31 04:34:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active, 2 = delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created`, `updated`, `status`) VALUES
(1, 'Street', 0, '2015-04-18 07:06:14', '2015-04-18 07:06:14', 0),
(3, 'Black and White', 0, '2015-04-18 09:21:39', '2015-04-18 09:21:39', 0),
(4, 'English', 0, '2016-03-12 08:03:53', '2016-03-12 08:03:53', 1),
(5, 'Computer Science', 0, '2016-03-17 10:42:00', '2016-03-17 10:42:00', 1),
(6, 'Computer Basic', 5, '2016-03-17 10:42:35', '2016-03-17 10:42:35', 1),
(7, 'Database Systems', 5, '2016-03-22 08:41:19', '2016-03-22 08:41:19', 1),
(8, 'General grammar', 4, '2016-03-31 14:34:44', '2016-03-31 14:34:44', 1),
(9, 'Idioms and Phrases', 4, '2016-03-31 14:34:54', '2016-03-31 14:34:54', 1),
(10, 'Spotting Errors', 4, '2016-09-13 23:52:41', '2016-09-13 23:52:41', 1),
(11, 'Filling in the Blank', 4, '2016-09-13 23:53:04', '2016-09-13 23:53:04', 1),
(12, 'Synonyms', 4, '2016-09-13 23:53:18', '2016-09-13 23:53:18', 1),
(13, 'Antonyms', 4, '2016-09-13 23:53:36', '2016-09-13 23:53:36', 1),
(14, 'One Word Substitution', 4, '2016-09-13 23:54:32', '2016-09-13 23:54:32', 1),
(15, 'Spelling Mistakes', 4, '2016-09-13 23:54:55', '2016-09-13 23:54:55', 1),
(16, 'Sentence Correction', 4, '2016-09-13 23:55:19', '2016-09-13 23:55:19', 1),
(17, 'Cloze Test', 4, '2016-09-13 23:55:35', '2016-09-13 23:55:35', 1),
(18, 'Reading Comprehension', 4, '2016-09-13 23:55:58', '2016-09-13 23:55:58', 1),
(19, 'Advanced Maths', 0, '2016-09-16 03:13:49', '2016-09-16 03:13:49', 1),
(20, 'Geometry', 19, '2016-09-16 03:14:08', '2016-09-16 03:14:08', 1),
(21, 'Mensuration', 19, '2016-09-16 03:14:23', '2016-09-16 03:14:23', 1),
(22, 'Algebra', 19, '2016-09-16 03:14:38', '2016-09-16 03:14:38', 1),
(23, 'Trigonometry', 19, '2016-09-16 03:14:57', '2016-09-16 03:14:57', 1),
(24, 'Compiler Design', 5, '2016-09-16 03:19:10', '2016-09-16 03:19:10', 1),
(25, 'Digital Logic', 5, '2016-09-16 03:19:26', '2016-09-16 03:19:26', 1),
(26, 'General Awareness', 0, '2016-10-04 11:40:52', '2016-10-04 11:40:52', 1),
(27, 'India & The World', 26, '2016-10-04 11:41:25', '2016-10-04 11:41:25', 1),
(28, 'Economy & Energy', 26, '2016-10-04 11:41:39', '2016-10-04 11:41:39', 1),
(29, 'Awards and Prizes', 26, '2016-10-04 11:41:50', '2016-10-04 11:41:50', 1),
(30, 'In The News', 26, '2016-10-04 11:42:02', '2016-10-04 11:42:02', 1),
(31, 'Sports', 26, '2016-10-04 11:42:15', '2016-10-04 11:42:15', 1),
(32, 'Banking Awareness', 0, '2016-10-04 11:42:56', '2016-10-04 11:42:56', 1),
(33, 'Banking Basic', 32, '2016-10-04 11:44:59', '2016-10-04 11:44:59', 1),
(34, 'Reasoning Ability', 0, '2016-10-06 00:31:02', '2016-10-06 00:31:02', 1),
(35, 'Seating Arrangement', 34, '2016-10-06 00:31:46', '2016-10-06 00:31:46', 1),
(36, 'Syllogism', 34, '2016-10-06 00:32:55', '2016-10-06 00:32:55', 1),
(37, 'Input Output', 34, '2016-10-06 00:33:20', '2016-10-06 00:33:20', 1),
(38, 'Alphanumeric Series', 34, '2016-10-06 00:35:00', '2016-10-06 00:35:00', 1),
(39, 'Coding Decoding', 34, '2016-10-06 00:35:27', '2016-10-06 00:35:27', 1),
(40, 'Ranking/Direction/Alphabet tes', 34, '2016-10-06 00:37:17', '2016-10-06 00:37:17', 1),
(41, 'Data Sufficiency', 34, '2016-10-06 00:38:39', '2016-10-06 00:38:39', 1),
(42, 'Coded Inequalities', 34, '2016-10-06 00:39:12', '2016-10-06 00:39:12', 1),
(43, 'Puzzle', 34, '2016-10-06 00:39:36', '2016-10-06 00:39:36', 1),
(44, 'Logical Reasoning', 34, '2016-10-06 00:40:02', '2016-10-06 00:40:02', 1),
(45, 'Para Jumbles', 4, '2016-10-06 00:41:27', '2016-10-06 00:41:27', 1),
(46, 'History of Computer', 5, '2016-10-06 00:42:08', '2016-10-06 00:42:08', 1),
(47, 'Internet', 5, '2016-10-06 00:42:32', '2016-10-06 00:42:32', 1),
(48, 'MS Office - Word, Powerpoint..', 5, '2016-10-06 00:43:10', '2016-10-06 00:43:10', 1),
(49, 'Cuantitative Aptitude', 0, '2016-10-06 00:45:11', '2016-10-06 00:45:11', 1),
(50, 'Simplification', 49, '2016-10-06 00:45:32', '2016-10-06 00:45:32', 1),
(51, 'number Series', 49, '2016-10-06 00:45:52', '2016-10-06 00:45:52', 1),
(52, 'Ratio and Proportion', 49, '2016-10-06 00:46:21', '2016-10-06 00:46:21', 1),
(53, 'Percentage & Averages', 49, '2016-10-06 00:48:13', '2016-10-06 00:48:13', 1),
(54, 'Profit & Loss', 49, '2016-10-06 00:48:35', '2016-10-06 00:48:35', 1),
(55, 'Mixture', 49, '2016-10-06 00:48:56', '2016-10-06 00:48:56', 1),
(56, 'Simple & Compound Interest', 49, '2016-10-06 00:49:35', '2016-10-06 00:49:35', 1),
(57, 'Work & time', 49, '2016-10-06 00:49:59', '2016-10-06 00:49:59', 1),
(58, 'Time & Distance', 49, '2016-10-06 00:50:21', '2016-10-06 00:50:21', 1),
(59, 'Sequence & Series', 49, '2016-10-06 00:50:44', '2016-10-06 00:50:44', 1),
(60, 'Data Interpretation', 49, '2016-10-06 00:51:25', '2016-10-06 00:51:25', 1),
(61, 'Networking', 5, '2016-10-23 03:02:39', '2016-10-23 03:02:39', 1),
(62, 'General Knowledge', 26, '2016-11-14 02:25:13', '2016-11-14 02:25:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `unique_key` varchar(20) NOT NULL,
  `parent_key` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `unique_key`, `parent_key`, `content`, `status`) VALUES
(1, ' Welcome TO <span>CupCherry.com</span>', 'ABOUT_US', '', 'Cupcherry.com comes with powerful theme options, which empowers you to quickly and easily build incredible store. Cras faucibus risus varius. \r\n footer-logo footer-logo Guru comes with powerful theme options, which empowers you to quickly and easily build incredible store. Cras faucibus risus varius. ', 1),
(3, 'Practice Test', 'FEATURE_01', 'FEATURES', 'Discussion Board is easy to use functionality to increasing knowledge about any question with cupcherry''s team, experts or other users.', 1),
(4, 'Test Samilulation', 'FEATURE_02', 'FEATURES', 'Discussion Board is easy to use functionality to increasing knowledge about any question with cupcherry''s team, experts or other users.', 1),
(5, 'Question and Notes', 'FEATURE_03', 'FEATURES', 'Discussion Board is easy to use functionality to increasing knowledge about any question with cupcherry''s team, experts or other users.', 1),
(6, 'LEader board', 'FEATURE_04', 'FEATURES', 'Discussion Board is easy to use functionality to increasing knowledge about any question with cupcherry''s team, experts or other users.', 1),
(7, 'Discussion Board', 'FEATURE_05', 'FEATURES', 'Discussion Board is easy to use functionality to increasing knowledge about any question with cupcherry''s team, experts or other users.', 1),
(8, 'Profile and Social', 'FEATURE_06', 'FEATURES', 'Discussion Board is easy to use functionality to increasing knowledge about any question with cupcherry''s team, experts or other users.\r\n', 1),
(9, 'Home Top box', 'HOMEPAGE_LEFT', '', '<p><strong>Unlimited Practice test </strong>to make better understanding of particular subject.</p>\r\n\r\n<p><strong>Mock (Simulation) Test</strong> will familiarize you real exam environment for proficiently manage time along with the practises.</p>\r\n\r\n<p><strong>Questions and Notes </strong>collection is good for learning, you can manage your own too with others.</p>\r\n\r\n<p><strong>Description </strong>with every question and user have option to add more information on it.</p>\r\n\r\n<p><strong>Different Test styles </strong>for different types of study.</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '3' COMMENT '0 = disabled, 1 = enabled, 2 = deleted, 3 = pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `mail_type` int(11) NOT NULL COMMENT '0 = Contact Us',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1=unread,2=read,3=replied'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `mail_type`, `created`, `modified`, `status`) VALUES
(1, 'dharmendra', 'cgtdharm@gmail.com', 'Test Message', 'Hello Test', 0, '2016-11-12 10:23:33', '2016-11-12 10:23:33', 1),
(2, 'dharmendra', 'cgtdharm@gmail.com', 'asdasd sdfsdfsdf', 'Hello Test 2', 0, '2016-11-12 11:13:11', '2016-11-12 11:13:11', 1),
(3, 'dharmendra', 'cgtdharm@gmail.com', 'Hello Test Mail', 'This is Hello Message', 0, '2016-11-16 19:36:39', '2016-11-16 19:36:39', 1),
(4, 'Testd', 'cgtdharm@gmail.com', 'This is contact us test', 'This is contact us test 20', 0, '2016-11-16 19:39:05', '2016-11-16 19:39:05', 1),
(5, 'dharmtest', 'cgtdharm@mailinator.com', 'This Is test', 'This is test mail', 0, '2016-11-16 19:44:56', '2016-11-16 19:44:56', 1),
(6, 'dharmtest', 'cgtdharm@mailinator.com', 'This Is test', 'This is test mail', 0, '2016-11-16 19:45:26', '2016-11-16 19:45:26', 1),
(7, 'dharmtest', 'cgtdharm@mailinator.com', 'This Is test', 'This is test mail', 0, '2016-11-16 19:46:37', '2016-11-16 19:46:37', 1),
(8, 'dharmtest', 'cgtdharm@mailinator.com', 'This Is test', 'This is test mail', 0, '2016-11-16 19:47:00', '2016-11-16 19:47:00', 1),
(9, 'DharmendraH', 'cgtdharm@mailinator.com', 'This is contact u]', 'Test', 0, '2016-11-16 20:15:35', '2016-11-16 20:15:35', 1),
(10, '', 'cgtdharm@gmail.com', '', 'Test Message', 0, '2017-02-04 08:49:46', '2017-02-04 08:49:46', 1),
(11, '', 'cgtdharm@gmail.com', '', 'asdfghj', 0, '2017-02-11 10:53:05', '2017-02-11 10:53:05', 1),
(12, '', 'cgtdharm@gmail.com', '', 'asdfghj', 0, '2017-02-11 11:21:19', '2017-02-11 11:21:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_contents`
--

CREATE TABLE `email_contents` (
  `id` int(11) NOT NULL,
  `unique_name` varchar(255) NOT NULL,
  `title` varchar(512) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `keywords` text NOT NULL,
  `link_title` varchar(1024) NOT NULL COMMENT 'What link should be shown on link buttion',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0=disable, 1 enable'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_contents`
--

INSERT INTO `email_contents` (`id`, `unique_name`, `title`, `subject`, `message`, `keywords`, `link_title`, `status`) VALUES
(1, 'REGISTRATION_ESHOP', 'REGISTRATION_ESHOP', 'Eshop Registration', '<p>Dear {{name}}:</p><p>You have requested for eshop panel at meocart.com. Kindly verify your email address. After than will be able to login into meocart.com/eshop.</p><p><strong>Link :</strong> <a href="{{link}}" target="_blank">Click here to activate</a><br><strong>E-mail :</strong> {{email}}<br></p><p>Thanks for showing interest in our Website.<br>We always want to hear from you. Please send you suggestions and feedback at feedback@meocart.com.<br></p><p>Team <strong>&quot;Meocart.com</strong>&quot;</p>', '{{key}},{{link}},{{name}},{{email}},{{contactNo}},{{message}},{{pass}}', '', 1),
(4, 'EMAIL_VERIFICATION', 'EMAIL_VERIFICATION', 'Email Verification', '<p>Dear {{name}}:</p><p>Please click below link and verify your email address. </p><p><strong>Link :</strong> <a href="{{link}}">Click here to verify email address.</a> <br><strong>E-mail :</strong> {{email}}<br></p><p>Thanks for showing interest in our Website.<br>We always want to hear from you. Please send you suggestions and feedback at feedback@meocart.com.<br></p><p>Team <strong>&quot;Meocart.com</strong>&quot;</p>', '{{key}},{{link}},{{name}},{{email}},{{contactNo}},{{message}},{{pass}}', '', 1),
(2, 'FORGOT_PASSWORD', 'FORGOT_PASSWORD', 'forget password', '<p>Hi {{receiver}},</p><p>We have received a request to reset your password. \r\nLink: <a href="{{link}}">Click here to reset password.</a>\r\n</p><p><strong></strong></p><p>Thanks!<br/>Meocart Team</p>', '{{receiver}},{{link}},{{username}},{{password}}', '', 1),
(6, 'ESHOP_SUPPORT', 'ESHOP_SUPPORT', 'Support Request', '<p>Hello Team,</p><p>We have received a support request from  {{name}}({{email}}). \r\nTitle : {{title}}\r\nIssue Type : {{issue_type}}\r\nMessage: {{message}}\r\nLink : {{link}}\r\nFile : {{file}}\r\n</p><p><strong></strong></p><p>Thanks!<br/>Meoshop Team</p>', '{{name}},{{email}},{{message}},{{link}},{{issue_type}},{{title}},{{file}}', '', 1),
(7, 'CONTACTUS_MAIL', 'CONTACTUS_MAIL', 'Contact us Mail', '<p>Hello Team,</p><p>We have received a email from contact us page. Details are follows :\r\n\r\nName : {{name}}\r\nEmail : {{email}} \r\nSubject : {{subject}}\r\nMessage: {{message}}\r\nPlease reply to this mail asap.\r\n</p><p><strong></strong></p><p>Thanks!<br/>Meocart Team</p>', '{{name}},{{email}},{{message}},{{subject}}', '', 1),
(9, 'FEEDBACK_MAIL', 'FEEDBACK_MAIL', 'feedback ', '<p>Hello Team,</p><p>We have received a email from feedback page. Details are follows :\r\n\r\nName : {{name}}\r\nEmail : {{email}} \r\nSubject : {{subject}}\r\nMessage: {{message}}\r\nPlease reply to this mail asap.\r\n</p><p><strong></strong></p><p>Thanks!<br/>Meocart Team</p>', '{{name}},{{email}},{{message}},{{subject}}', '', 1),
(10, 'USER_REGISTRATION', 'USER_REGISTRATION', 'Cupcherry Registration', '<p>Hello{{name}}:</p><p>Please click on below link and verify your email address. </p><p><strong>Link :</strong> <a href="{{link}}">Click here to activate.</a><br><strong>E-mail :</strong> {{email}}<br></p><p>\nThanks for showing interest in our Website.<br>We always want to hear from you. Please send you suggestions and feedback at feedback@cupcherry.com.<br></p><p>Team <strong>&quot;Cupcherry.com</strong>&quot;</p>', '{{key}},{{link}},{{name}},{{email}},{{contactNo}},{{message}},{{pass}}', '', 1),
(11, 'PRODUCT_APPROVE', 'PRODUCT_APPROVE', 'Meocart - Product approved', '<p><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><span style="font-size:16px">Dear {{name}},</span></span></p>\r\n\r\n<p><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><span style="font-size:16px">Your product is approved by admin. You can check your product by clicking the below link:</span></span></p>\r\n\r\n<p><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><span style="font-size:16px">Link: <a href="{{link}}"> Click her to view your product live</a></span></span></p>\r\n\r\n<p><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><span style="font-size:16px">Thanks for show interest in our services.</span></span></p>\r\n\r\n<p><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><span style="font-size:16px">We will try our best to provide you more advance features.</span></span></p>\r\n\r\n<p><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><span style="font-size:16px">Meocart Team</span></span></p>\r\n', '{{name}},{{link}}', '', 1),
(12, 'API_MAIL', 'API_MAIL', 'API RELATED DATA CHECK', '<p>\r\n	{{data}}</p>\r\n', '{{data}}', '', 1),
(13, 'SEND_ENQUIRY', 'SEND_ENQUIRY', 'Enquiry', 'Hello {{recevierName}},\r\n\r\n{{senderName}} send you message : {{message}}\r\n\r\nMeocart Team', ' {{recevierName}},{{senderName}},{{message}}', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `gcal_id` varchar(40) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1:Private; 2:Group; 3:Match Play',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT 'non zero group id if type=2; 0 otherwise',
  `from_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `to_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `summary` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `where` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0:Inactive; 1:Active; 2:Deleted'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `gcal_id`, `coach_id`, `type`, `group_id`, `from_time`, `to_time`, `summary`, `where`, `created_by`, `created`, `modified`, `status`) VALUES
(1, '', 42, 1, 0, '2015-01-20 10:26:00', '2015-01-20 12:31:00', 'Test', 'Test', 1, '2015-01-19 00:00:00', '2015-01-19 00:00:00', 1),
(2, '', 0, 1, 0, '2015-01-28 21:00:00', '2015-01-28 22:00:00', '', 'new house', 1, '2015-01-19 12:37:22', '2015-01-19 12:37:22', 1),
(3, '', 0, 1, 0, '2015-01-26 21:00:00', '2015-01-26 22:00:00', 'party', 'new house', 1, '2015-01-19 12:39:36', '2015-01-19 12:39:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `logo_pic` varchar(100) NOT NULL,
  `cover_pic` varchar(100) NOT NULL,
  `fb_page` varchar(150) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1 = active, 2 = delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `description`, `logo_pic`, `cover_pic`, `fb_page`, `created`, `updated`, `status`) VALUES
(1, 'SSC', '<p>SSC</p>\r\n', 'exam_ssc.png', '', 'https://www.facebook.com/SSC-exams-1796698110617757', '0000-00-00 00:00:00', '2017-04-26 22:50:47', 1),
(2, 'Teaching', '<p>Tea hing</p>\r\n', 'exam_teaching.png', '', 'https://www.facebook.com/startIBPSPOexam2016/', '0000-00-00 00:00:00', '2017-04-26 22:51:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `title`, `created`, `status`) VALUES
(1, 'Experiments', '2015-09-02 09:39:26', 1),
(2, 'Navigations', '2015-09-02 09:39:56', 1),
(3, 'Templates', '2015-09-02 09:39:56', 1),
(4, 'UX Patterns', '2015-09-02 09:40:17', 1),
(5, 'Web Components', '2015-09-02 09:40:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT 'image, pdf, file etc ...',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1= active, 0 = inactive, 2 = delete.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `type`, `created`, `status`) VALUES
(1, 'IMG_576195ee4c361.jpg', 'image', '2016-06-15 14:22:46', 1),
(2, 'File_575eea75d3278.jpg', 'image', '2016-06-15 18:14:46', 1),
(3, 'IMG_57619db172e5a.jpg', 'image', '2016-06-15 14:55:53', 1),
(4, 'IMG_57619dee8ea01.jpg', 'image', '2016-06-15 14:56:54', 1),
(5, 'IMG_57619e0704f82.jpg', 'image', '2016-06-15 14:57:19', 1),
(6, 'IMG_576806559d760.jpg', 'image', '2016-06-20 11:35:57', 1),
(7, 'IMG_576808c9ec23f.jpg', 'image', '2016-06-20 11:46:25', 1),
(8, '', 'image', '2016-09-12 00:32:44', 1),
(9, 'IMG_57d59847136cf.png', 'image', '2016-09-12 00:45:43', 1),
(10, '', 'image', '2016-10-02 16:30:34', 1),
(11, 'IMG_57f0d40dd9805.jpg', 'image', '2016-10-02 16:31:57', 1),
(12, 'IMG_58241dfce6154.jpg', 'image', '2016-11-10 14:13:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `notes_type` int(11) NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL DEFAULT '1',
  `sub_category_id` int(11) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`, `user_id`, `notes_type`, `category_id`, `sub_category_id`, `views`, `created`, `updated`, `status`) VALUES
(1, 'zsadfa', 'dsfsdfsd', 1, 1, 5, 6, 0, '2016-04-18 13:49:05', '2016-04-18 19:19:05', 3),
(2, '', '<p>Tatya Tope&#39;s Operation Red Lotus is a quest to understand the real history of the Revolt of 1857. It is a quest that led the Tope family to discover the dramatic battle manoeuvres of their ancestor the legendary Tatya Tope, as well as the true import of the war. The first detailed account of Tatya Tope, covering his entire campaign from the planning of the war to his death, Operation Red Lotus offers a surprising answer to the generations-old question of whether the man hanged on 18 April 1859 was really Tatya Tope.</p>\r\n', 1, 1, 4, 8, 0, '2016-08-04 13:50:00', '2016-08-04 19:20:00', 3),
(3, 'asdasd', '<p>asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf asdfasf asdfasf&nbsp; asdfasf</p>\r\n', 1, 1, 5, 6, 0, '2016-08-04 13:54:49', '2016-08-04 19:24:49', 3),
(4, 'Some of the Spotting Errors Rules', '<p>1) &#39;<strong>No sooner</strong>&#39; is followed by &#39;<strong>than</strong>&#39;</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) <strong>No sooner</strong> had I entered the class &lt;b&gt;<strong>when</strong>&lt;/b&gt; the students stood up. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(ii) <strong>No sooner</strong> had I entered the class &lt;b&gt;<strong>whan</strong>&lt;/b&gt; the students stood up. (Correct)</p>\r\n\r\n<p>NOTE : The sentence Form must be past perfect or past indefinite</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>2) &lt;b&gt;More than one&lt;/b&gt; indicates a plural sense, buy it is treated as a sort of compound of one. Thus it agrees with a singular noun and takes a &lt;b&gt;singular verb&lt;/b&gt;.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) More than employees were killed in the accident. (Incorrect)</p>\r\n\r\n<p>(ii) More than one employee was killed in the accident. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>3) It is common practice in conversation to make statement and ask for comfirmation; as, &#39;&lt;b&gt;It&lt;/b&gt;&#39; is very hot, &lt;b&gt;isn&#39;t it&lt;/b&gt;? Two points are to be kept in mind. if the statement is positive, the pattern will be</p>\r\n</p>\r\n</p>\r\n\r\n<p>&lt;b&gt;Auxiliary + n&#39;t + subject&lt;/b&gt;</p>\r\n\r\n<p>if the statement is negative, the pattern will be</p>\r\n\r\n<p>&lt;b&gt;Auxiliary + subject&lt;/b&gt;</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) It is raining, is it? (Incorrect)</p>\r\n\r\n<p>(ii) It is raining, is&#39;t it? (Correct)</p>\r\n\r\n<p>(iii) You are not busy, aren&#39;t you? (Incorrect)</p>\r\n\r\n<p>(iv) You are not busy, are you? (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>4) &#39;The two first&#39; is a meaningless expression for it implies that two things may be first. We should say &#39;the first two&#39;.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) The two first chapters of novel are dull. (Incorrect)</p>\r\n\r\n<p>(ii) The first two chapters of novel are dull. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>5) &#39;&lt;b&gt;Only&lt;/b&gt;&#39; should be placed immediately before the word it &lt;b&gt;qualifies&lt;/b&gt;.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) He &lt;b&gt;only&lt;/b&gt; lost his ticket in the stampede. (Incorrect)</p>\r\n\r\n<p>(ii) &lt;b&gt;Only&lt;/b&gt; he lost his ticket in the stampede. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>6) An infinitive verb should not be split.</p>\r\n</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) I request you &lt;b&gt;to&lt;/b&gt; kindly help me. (Incorrect)</p>\r\n\r\n<p>(ii) I request you kindly &lt;b&gt;to&lt;/b&gt; help me. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>7) &lt;b&gt;Care&lt;/b&gt; should be taken in the use of</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Eaxmple:</p>\r\n</p>\r\n\r\n<p>(I) The doctor &lt;b&gt;saw&lt;/b&gt; the pulse of the patient. (Incorrect)</p>\r\n\r\n<p>(II) The doctor &lt;b&gt;felt&lt;/b&gt; the pulse of the patient. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>8) &lt;b&gt;Scarcely&lt;/b&gt; should be followed by &lt;b&gt;when&lt;b&gt; not by than</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) Scarcely had he arrived &lt;b&gt;than&lt;/b&gt; he has to leave again. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(ii) Scarcely had he arrived &lt;b&gt;when&lt;/b&gt; he has to leave again. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>9) &lt;b&gt;Till&lt;/b&gt; is used of time and &lt;b&gt;to&lt;/b&gt; is used of place.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) The office will remain open &lt;b&gt;to&lt;/b&gt; six in the evening. &nbsp;(Incorrect)</p>\r\n</p>\r\n\r\n<p>(ii) The office will remain open &lt;b&gt;till&lt;/b&gt; six in the evening. &nbsp;(Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>10) The preposition &quot;&lt;b&gt;off&lt;/b&gt;&quot; denotes &quot;sepearation&quot;, &quot;at a distance from&quot; or &quot;far from&quot; whereas the preposition &quot;of&quot; denotes cause, origin, quality, prossession.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) He put &lt;b&gt;of&lt;/b&gt; his coat. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(ii) He put &lt;b&gt;off&lt;/b&gt; his coat. (Separation)(Correct)</p>\r\n\r\n<p>(iii) He died &lt;b&gt;off&lt;/b&gt; cancer. (Incorrect)</p>\r\n\r\n<p>(iv) He died &lt;b&gt;of&lt;/b&gt; cancer. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>11) &lt;b&gt;Beside&lt;/b&gt; means by the side of while &lt;b&gt;besides&lt;/b&gt; means in additions to</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) He sat besides the chair. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(ii) He sat beside the chair. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>12) &lt;b&gt;Between&lt;/b&gt; is used for only two things or persons while &lt;b&gt;among&lt;/b&gt; is used for more than two.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) You have to choose &lt;b&gt;among&lt;/b&gt; tea and coffee. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(Ii) You have to choose &lt;b&gt;between&lt;/b&gt; tea and coffee. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>13) &lt;b&gt;Above&lt;/b&gt; and &lt;b&gt;Below&lt;/b&gt; merely denote position while &lt;b&gt;over&lt;/b&gt; and &lt;b&gt;under&lt;/b&gt; also carry a sense of covering or movement.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) The bird flew &lt;b&gt;above&lt;/b&gt; the lake. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(iI) The bird flew &lt;b&gt;over&lt;/b&gt; the lake. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>14) &lt;b&gt;During&lt;/b&gt; is used when we are talking about &lt;b&gt;the time within&lt;/b&gt; which something happens. &lt;b&gt;For&lt;/b&gt; is used when we are &lt;b&gt;taking about&lt;/b&gt; how long something lasts.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) There were few incidents of irregularity &lt;b&gt;for&lt;/b&gt; the Emergency year. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(ii) There were few incidents of irregularity &lt;b&gt;during&lt;/b&gt; the Emergency year. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>15) There are some nounsthat indicate &lt;b&gt;length&lt;/b&gt;, &lt;b&gt;measure&lt;/b&gt;, &lt;b&gt;money&lt;/b&gt;, &lt;b&gt;weight or number&lt;/b&gt;. When they are preceded by a numeral, they remain unchanged in form.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>&lt;b&gt;Foot, meter, pair, score, dozen, head, year, hundred, thousand, millions&lt;/b&gt;</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) It is a three -years degree course. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(ii) It is a three -year degree course. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>16) Some nouns are always used in a plural form and always take a plural verb.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>&lt;b&gt;Trousers, scissors, spectacies stockings, shorts measies, goods, aims, premises, tidings, annals, chattels, etc.&lt;/b&gt;</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) Where is my trouser? (Incorrect)</p>\r\n\r\n<p>(ii) Where are my trouser? (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>17) A pronoun must agree with its antecedent in person, number and gender.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) Every man must bring &lt;b&gt;his&lt;/b&gt; lauggage.</p>\r\n\r\n<p>(ii) All students must do &lt;b&gt;their&lt;/b&gt; home work.</p>\r\n\r\n<p>(iii) Each of the girls must carry &lt;b&gt;her&lt;/b&gt; own bag.</p>\r\n\r\n<p>&nbsp;\r\n<p>18) The pronoun &#39;one&#39; must be followed by &#39;one&#39;s&#39;.</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) One must finish &lt;b&gt;his&lt;/b&gt; task on time. (Incorrect)</p>\r\n\r\n<p>(ii) One must finish &lt;b&gt;one&#39;s&lt;/b&gt; task on time. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>19) &lt;b&gt;&#39;Whose&#39;&lt;/b&gt; is used for living persons and &lt;b&gt;&#39;which&#39;&lt;/b&gt; for lifeless objects.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) &lt;b&gt;Which&lt;/b&gt; photograph is lying here? (Incorrect)</p>\r\n\r\n<p>(i) &lt;b&gt;Whose&lt;/b&gt; photograph is living there? (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>20) Use of &lt;b&gt;&#39;less&#39;&lt;/b&gt; and &lt;b&gt;&#39;fewer&#39;&lt;/b&gt;</p>\r\n</p>\r\n</p>\r\n\r\n<p>&#39;Less&#39; donates quantity and &#39;Fewer&#39; denotes number.</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) &lt;b&gt;No less&lt;/b&gt; than fifty persons &lt;b&gt;were&lt;/b&gt; (Incorrect)</p>\r\n\r\n<p>(ii) &lt;b&gt;No fewer&lt;/b&gt; than fifty persons &lt;b&gt;were&lt;/b&gt; (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>21) &#39;One of&#39; always takses a &lt;b&gt;plural noun&lt;/b&gt; after it.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) It is one of the most important &lt;b&gt;day&lt;/b&gt; in my life. (Incorrect)</p>\r\n\r\n<p>(ii) It is one of the most important &lt;b&gt;days&lt;/b&gt; in my life. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>22) Use of &#39;not only&#39; and &#39;but also&#39; examine the sentences given below.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) He &lt;b&gt;not only&lt;/b&gt; comes for swimming &lt;b&gt;but also&lt;/b&gt; for coaching the leaners. (Incorrect)</p>\r\n\r\n<p>(ii) He comes &lt;b&gt;not only&lt;/b&gt; for swimming &lt;b&gt;but also&lt;/b&gt; for coaching the leaners. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>23) &lt;b&gt;Adverb &#39;as&#39;&lt;/b&gt; is not used with verbs like &#39;appointed&#39;, &#39;elected&#39;, &#39;considered&#39;, &#39;called&#39; but it is used with &#39;regard&#39;.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) I &lt;b&gt;regard&lt;b&gt; Ramesh my friend. (Incorrect)</p>\r\n\r\n<p>(ii) I &lt;b&gt;regard&lt;b&gt; Ramesh as my friend. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>24) The case of the noun or pronoun preceding or succeeding the verb &#39;to be&#39; should be the same.</p>\r\n</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>Example:</p>\r\n</p>\r\n\r\n<p>(i) It is &lt;b&gt;him&lt;/b&gt; who come to see us. (Incorrect)</p>\r\n\r\n<p>(ii) It is &lt;b&gt;he&lt;/b&gt; who come to see us. (Correct)</p>\r\n\r\n<p>(iii) It is &lt;b&gt;me&lt;/b&gt; who caught the thief. (Incorrect)</p>\r\n\r\n<p>(iv) It is &lt;b&gt;I&lt;/b&gt; who caught the thief. (Correct)</p>\r\n\r\n<p>&nbsp;\r\n<p>25) &lt;b&gt;Neither&lt;/b&gt; is followed by &lt;b&gt;nor&lt;/b&gt;.</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>(i) The phone neither went dead &lt;b&gt;or&lt;/b&gt; worked properly. (Incorrect)</p>\r\n</p>\r\n\r\n<p>(ii) The phone neither went dead &lt;b&gt;nor&lt;/b&gt; worked properly. (Correct)</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, 4, 10, 0, '2016-09-16 02:43:34', '2016-09-15 19:43:34', 1),
(5, 'Indian Banking Structure', '<h3><strong>Types of banks in India</strong></h3>\r\n\r\n<ol>\r\n	<li>Central Bank (RBI)</li>\r\n	<li>Specialised banks</li>\r\n	<li>Commercial banks</li>\r\n	<li>Development banks</li>\r\n	<li>Co-operative banks</li>\r\n</ol>\r\n\r\n<p><strong>Central Bank:</strong></p>\r\n\r\n<p>As its name signifies, a bank which manages and regulates the banking system of a particular country. It provides guidance to other banks whenever they face any problem (that is why the Central Bank is also known as a banker&rsquo;s bank) and maintains the deposit accounts of all other banks. Central Banks of different countries: Reserve Bank of India (INDIA), Federal Reserve System (USA), Swiss National Bank (SWITZERLAND), Reserve Bank of Australia (AUSTRALIA), State Bank of Pakistan (PAKISTAN).</p>\r\n\r\n<p>Specialised Banks: Those banks which are meant for special purposes. For examples: NABARD, EXIM bank, SIDBI, IDBI.</p>\r\n\r\n<p>NABARD: National Bank for Agriculture and Rural Development. This bank is meant for financing the agriculture as well as rural sector. It actually promotes research in agriculture and rural development.</p>\r\n\r\n<p>EXIM bank: Export Import Bank of India. This bank gives loans to exporters and importers and also provides valuable information about the international market. If you want to set up a business for exporting products abroad or importing products from foreign countries for sale in our country, EXIM bank can provide you the required support and assistance.</p>\r\n\r\n<p>SIDBI:Small Industries Development Bank of India. This bank provides loans to setup the small-scale busness unit / industry. SIDBI also finances, promotes and develops small-scale industries. Whereas IDBI (Industrial Development Bank of India) gives loans to big industries.</p>\r\n\r\n<p><strong>Commercial banks: </strong>Normal banks are known as commercial banks, their main function is to accept deposits from the customer and on the basis of that they grant loans. (Loans could be short-term, medium-term and long-term loans.) Commercial banks are further classified into three types.</p>\r\n\r\n<p>(a) Public sector banks</p>\r\n\r\n<p>(b) Private sector banks</p>\r\n\r\n<p>(c) Foreign banks</p>\r\n\r\n<p>(a) Public Sector Banks (PSB): Government banks are known as PSB. Since the majority of their stakes are held by the Government of India. (For example: Allahabad Bank, Andhra Bank, Bank of Baroda, Bank of India, Bank of Maharastra, Canara Bank, Central Bank of India etc).</p>\r\n\r\n<p>(b) Private Sector Banks: In these banks, the majority of stakes are held by the individual or group of persons. (For example: Bank of Punjab, Bank of Rajasthan, Catholic Syrian Bank, Centurion Bank etc).</p>\r\n\r\n<p>(c) Foreign Banks: These banks have their headquarters in a foreign country but they operate their branches in India. For e.g. HSBC, Standard Chartered Bank, ABN Amro Bank.</p>\r\n\r\n<p><strong>Development banks:</strong></p>\r\n\r\n<p>Such banks are specially meant for giving loans to the business sector for the purchase of latest machinery and equipment. Examples: SFCs (State Financial Corporation of India) and IFCI (Indian Finance Corporation of India).</p>\r\n\r\n<p><strong>Co-operative banks:</strong></p>\r\n\r\n<p>These banks are nothing but an association of members who group together for self-help and mutual-help. Their way of working is the same as commercial banks. But they are quite different. Co-operative banks in India are registered under the Co-operative Societies Act, 1965. The cooperative bank is regulated by the RBI.</p>\r\n\r\n<p>Note: Co-operative banks cannot open their branches in foreign countries while commercial banks can do this.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Types of bank accounts</strong></h3>\r\n\r\n<ul>\r\n	<li>Savings bank account</li>\r\n	<li>Current account</li>\r\n	<li>Fixed Deposit account</li>\r\n</ul>\r\n', 5, 1, 32, 33, 0, '2016-10-04 11:54:52', '2016-10-04 04:54:52', 1),
(6, 'Word - Razor', '<p>Razor (VERB)<br />\r\nà¤•à¤¾à¤Ÿà¤¨à¤¾ ( à¤°à¥‡à¤œà¤° à¤•à¥€ à¤®à¤¦à¤¦ à¤¸à¥‡ )<br />\r\nMy hairdresser always razors my fringe to give a soft effect.</p>\r\n\r\n<p>Razor blade (noun) à¤°à¥‡à¤œà¤° à¤®à¥‡à¤‚ à¤ªà¥à¤°à¤¯à¥à¤•à¥à¤¤ à¤¬à¥à¤²à¥‡à¤¡<br />\r\nHe hurt himself by the razor blade</p>\r\n\r\n<p>Razor-sharp à¤…à¤¤à¥à¤¯à¤‚à¤¤ à¤¨à¥à¤•à¥€à¤²à¤¾<br />\r\nThese animals have razor-sharp teeth.</p>\r\n\r\n<p>Razor-sharp à¤šà¤¤à¥à¤°<br />\r\nShe&rsquo;s got a razor-sharp mind.</p>\r\n\r\n<p>Razor-thin à¤…à¤¤à¥à¤¯à¤‚à¤¤ à¤¹à¥€ à¤•à¤® à¤«à¤¾à¤¸à¤²à¤¾ / à¤…à¤¨à¥à¤¤à¤° à¤¹à¥‹à¤¨à¤¾<br />\r\nThe president won the election by razor-thin margin.</p>\r\n\r\n<p>Razor wire (noun) à¤¦à¤¿à¤µà¤¾à¤° à¤•à¥‡ à¤Šà¤ªà¤° à¤¨à¥à¤•à¥€à¤²à¥‡ à¤¤à¤¾à¤° à¤¤à¤¾à¤•à¤¿ à¤‰à¤¸à¥‡ à¤•à¥‹à¤ˆ à¤«à¤¾à¤‚à¤¦à¤¾ à¤¨ à¤œà¤¾ à¤¸à¤•à¥‡<br />\r\nRazor wires were positioned on top of walls to stop people climbing over the walls.</p>\r\n\r\n<p>Razor edge intellect à¤¤à¥‡à¤œ à¤¬à¥à¤¦à¥à¤§à¤¿ à¤µà¤¾à¤²à¤¾<br />\r\nI was impressed by the razor edge intellect of my colleague.</p>\r\n\r\n<p>Blade (noun) à¤¤à¥‡à¤œ à¤§à¤¾à¤° à¤µà¤¾à¤²à¤¾ à¤”à¤œà¤¾à¤°<br />\r\nA sword with a steel blade.</p>\r\n', 5, 1, 4, 8, 0, '2016-10-06 02:38:44', '2016-10-05 19:38:44', 1),
(7, 'Sometime, Sometimes, and Some Time', '<ul>\r\n	<li>\r\n	<p><strong>Sometime</strong> means &ldquo;at some point.&rdquo;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Sometime</strong> also means &ldquo;former.&rdquo;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Some time</strong> means &ldquo;a period of time&rdquo;&mdash;usually a long period of time.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Sometimes</strong> means &ldquo;occasionally.&rdquo;</p>\r\n	</li>\r\n</ul>\r\n\r\n<hr />\r\n<h2>Sometime: One Word</h2>\r\n\r\n<p>There are two ways to use <em>sometime</em> as one word. Let&rsquo;s tackle the harder one first.</p>\r\n\r\n<h3><strong>Sometime: Adverb</strong></h3>\r\n\r\n<p>When you use <em>sometime</em> as an adverb, it refers to an unspecified point in time. It doesn&rsquo;t refer to a <em>span</em> of time&mdash;that&rsquo;s what <em>some time</em> is for.</p>\r\n\r\n<p>Here&rsquo;s an example of <em>sometime</em> used in a sentence.</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> | I&rsquo;ll get around to finishing that book <strong>sometime</strong>.</div>\r\n\r\n<p>In the sentence above, we&rsquo;re not talking about how long it will take to finish the book (span of time); we&rsquo;re talking about <em>when</em> the book will be finished (point in time). You can usually replace <em>sometime</em> with <em>someday</em> or <em>at some point</em> when it&rsquo;s used this way.</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> | I&rsquo;ll get around to finishing that book <strong>someday</strong>.</div>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> | I&rsquo;ll get around to finishing that book <strong>at some point</strong>.</div>\r\n\r\n<p>Here are a few more examples:</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> | Give me a call <strong>sometime</strong>, and we&rsquo;ll have coffee.</div>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> | We&rsquo;ll announce a release date <strong>sometime</strong> soon.</div>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> | Tony needs to stop by the bank <strong>sometime</strong> today.</div>\r\n\r\n<h3><strong>Sometime: Adjective</strong></h3>\r\n\r\n<p>OK, now let&rsquo;s talk about the other way to use <em>sometime</em>. When you use <em>sometime</em> as an <a href="https://www.grammarly.com/blog/adjective/">adjective</a>, it just means &ldquo;former.&rdquo; <em>Sometime</em> should always be one word when you&rsquo;re using it as an adjective.</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> |&nbsp;Albert, a <strong>sometime</strong> cab driver, now flies airplanes for a living.</div>\r\n\r\n<p>In the sentence above, <em>sometime cab driver</em> means &ldquo;former cab driver.&rdquo; Some writers use <em>sometime</em> to mean &ldquo;occasional,&rdquo; but that usage isn&rsquo;t accepted by everybody. If you&rsquo;re not sure whether your audience will interpret <em>sometime</em> as &ldquo;former&rdquo; or &ldquo;occasional,&rdquo; it may be a good idea to avoid the ambiguity and use more specific terms.</p>\r\n\r\n<p>And, remember, when you use <em>sometime</em> as an adjective, don&rsquo;t put an <em>s</em> at the end of it.</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Incorrect&nbsp;</strong></em>| Albert, a <strong>sometimes</strong> cab driver, now flies airplanes for a living.</div>\r\n\r\n<hr />\r\n<h2>Some Time: Two Words</h2>\r\n\r\n<p>When <em>some time</em> is two words, it refers to a span of time. In fact, it often means &ldquo;a long time.&rdquo;</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> |&nbsp;For <strong>some time</strong>, humans have known that the world is round.</div>\r\n\r\n<p>In the sentence above, we&rsquo;re talking about a long span of time&mdash;several centuries, in fact. That&rsquo;s definitely a long time.</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> |&nbsp;For <strong>a long time</strong>, humans have known that the world is round.</div>\r\n\r\n<p>Let&rsquo;s look at another example:</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> |&nbsp;It will take some time to finish the project today.</div>\r\n\r\n<p>Again, we&rsquo;re talking about a span of time, so <em>some time</em> should be two words.</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> |&nbsp;It will take <strong>a long time</strong> to finish the project today.</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<h2>Sometimes: One Word</h2>\r\n\r\n<p><em>Sometimes</em> is a one-word adverb that means &ldquo;occasionally&rdquo; or &ldquo;now and then.&rdquo;</p>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> |&nbsp;<strong>Sometimes</strong> I just don&rsquo;t understand what that man is saying.</div>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> |&nbsp;English grammar <strong>sometimes</strong> follows its own rules, and <strong>sometimes</strong> it doesn&rsquo;t.</div>\r\n\r\n<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><em><strong>Correct</strong></em> |&nbsp;Everybody hurts <strong>sometimes</strong>.</div>\r\n\r\n<p>Plenty of writers have trouble remembering how to use <em>some time</em>, <em>sometime</em> and <em>sometimes</em>.&nbsp;</p>\r\n', 5, 1, 4, 16, 0, '2016-10-11 12:09:36', '2016-10-18 03:39:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `title_slug` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `cover_image` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `title_slug`, `content`, `user_id`, `view_count`, `cover_image`, `created`, `status`) VALUES
(9, 'This is first post of cupcherry', 'This-first-post-cupcherry', '<p>This is first post of cupcherryThis is first post of cupcherryThis is first post of cupcherryThis is first post of cupcherryThis is first post of cupcherry</p>\r\n', 1, 11, 'IMG_57619e0704f82.jpg', '2016-03-26 13:16:06', 1),
(10, 'Model View Controller(MVC) Interview Questions ', 'Model-View-Controller-MVC-Interview-Questions-', '<p><strong>1) Explain what is Model-View-Controller?</strong></p>\r\n\r\n<p>MVC is a software architecture pattern for developing web application. It is handled by three objects Model-View-Controller.</p>\r\n\r\n<p><strong>2) Mention what does Model-View-Controller represent in an MVC application?</strong></p>\r\n\r\n<p>In an MVC model,</p>\r\n\r\n<ul>\r\n	<li><strong>Model</strong>&ndash; It represents the application data domain. In other words applications business logic is contained within the model and is responsible for maintaining data</li>\r\n	<li><strong>View</strong>&ndash; It represents the user interface, with which the end users communicates. In short all the user interface logic is contained within the VIEW</li>\r\n	<li><strong>Controller</strong>&ndash; It is the controller that answers to user actions. Based on the user actions, the respective controller responds within the model and choose a view to render that display the user interface.&nbsp; The user input logic is contained with-in the controller</li>\r\n</ul>\r\n\r\n<p><strong>3) Explain in which assembly is the MVC framework is defined?</strong></p>\r\n\r\n<p>The MVC framework is defined in System.Web.Mvc.</p>\r\n\r\n<p><strong>4) List out few different return types of a controller action method?</strong></p>\r\n\r\n<ul>\r\n	<li>View Result</li>\r\n	<li>Javascript Result</li>\r\n	<li>Redirect Result</li>\r\n	<li>Json Result</li>\r\n	<li>Content Result</li>\r\n</ul>\r\n\r\n<p><strong>5) Mention what is the difference between adding routes, to a webform application and an MVC application?</strong></p>\r\n\r\n<p>To add routes to a webform application, we can use MapPageRoute() method of the RouteCollection class, where adding routes to an MVC application, you can use MapRoute() method.</p>\r\n\r\n<p><a href="http://career.guru99.com/wp-content/uploads/2014/12/mvc-design-diagram1.jpg"><img alt="mvc-design-diagram" src="http://cdn.career.guru99.com/wp-content/uploads/2014/12/mvc-design-diagram1-300x300.jpg" style="height:300px; width:300px" /></a></p>\r\n\r\n<p><strong>6) Mention what are the two ways to add constraints to a route?</strong></p>\r\n\r\n<p>The two methods to add constraints to a route is</p>\r\n\r\n<ul>\r\n	<li>Use regular expressions</li>\r\n	<li>Use an object that implements IRouteConstraint Interface</li>\r\n</ul>\r\n\r\n<p><strong>7) Mention what is the advantages of MVC?</strong></p>\r\n\r\n<ul>\r\n	<li>MVC segregates your project into a different segment, and it becomes easy for developers to work on</li>\r\n	<li>It is easy to edit or change some part of your project that makes project less development and maintenance cost</li>\r\n	<li>MVC makes your project more systematic</li>\r\n</ul>\r\n\r\n<p><strong>8) Mention what &ldquo;beforFilter()&rdquo;,&ldquo;beforeRender&rdquo; and &ldquo;afterFilter&rdquo; functions do in Controller?</strong></p>\r\n\r\n<ul>\r\n	<li><strong>beforeFilter():</strong> This function is run before every action in the controller. It&rsquo;s the right place to check for an active session or inspect user permissions.</li>\r\n	<li><strong>beforeRender():</strong> This function is called after controller action logic, but before the view is rendered. This function is not often used, but may be required If you are calling render() manually before the end of a given action</li>\r\n	<li><strong>afterFilter():</strong> This function is called after every controller action, and after rendering is done. It is the last controller method to run</li>\r\n</ul>\r\n\r\n<p><strong>9) Explain the role of components Presentation, Abstraction and Control in MVC?</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Presentation:</strong> It is the visual representation of a specific abstraction within the application</li>\r\n	<li><strong>Abstraction:</strong> It is the business domain functionality within the application</li>\r\n	<li><strong>Control:</strong> It is a component that keeps consistency between the abstraction within the system and their presentation to the user in addition to communicating with other controls within the system</li>\r\n</ul>\r\n\r\n<p><strong>10) Mention the advantages and disadvantages of MVC model?</strong></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Advantages</strong></td>\r\n			<td><strong>Disadvantages</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>It represents clear separation between business logic and presentation logic</li>\r\n				<li>Each MVC object has different responsibilities</li>\r\n				<li>The development progresses in parallel</li>\r\n				<li>Easy to manage and maintain</li>\r\n				<li>All classes and object are independent of each other</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li>The model pattern is little complex</li>\r\n				<li>Inefficiency of data access in view</li>\r\n				<li>With modern user interface, it is difficult to use MVC</li>\r\n				<li>You need multiple programmers for parallel development</li>\r\n				<li>Multiple technologies knowledge is required</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>11) Explain the role of &ldquo;ActionFilters&rdquo; in MVC?</strong></p>\r\n\r\n<p>In MVC &ldquo; ActionFilters&rdquo; help you to execute logic while MVC action is executed or its executing.</p>\r\n\r\n<p><strong>12) Explain what are the steps for the execution of an MVC project?</strong></p>\r\n\r\n<p>The steps for the execution of an MVC project includes</p>\r\n\r\n<ul>\r\n	<li>Receive first request for the application</li>\r\n	<li>Performs routing</li>\r\n	<li>Creates MVC request handler</li>\r\n	<li>Create Controller</li>\r\n	<li>Execute Controller</li>\r\n	<li>Invoke action</li>\r\n	<li>Execute Result</li>\r\n</ul>\r\n\r\n<p><strong>13) Explain what is routing? What are the three segments for routing is important?</strong></p>\r\n\r\n<p>Routing helps you to decide a URL structure and map the URL with the Controller.</p>\r\n\r\n<p>The three segments that are important for routing is</p>\r\n\r\n<ul>\r\n	<li>ControllerName</li>\r\n	<li>ActionMethodName</li>\r\n	<li>Parameter</li>\r\n</ul>\r\n\r\n<p><strong>14) Explain how routing is done in MVC pattern?</strong></p>\r\n\r\n<p>There is a group of routes called the RouteCollection, which consists of registered routes in the application.&nbsp; The RegisterRoutes method records the routes in this collection.&nbsp; A route defines a URL pattern and a handler to use if the request matches the pattern. The first parameter to the MapRoute method is the name of the route. The second parameter will be the pattern to which the URL matches.&nbsp; The third parameter might be the default values for the placeholders if they are not determined.</p>\r\n', 1, 11, 'IMG_57619db172e5a.jpg', '2016-03-26 14:09:52', 1),
(11, 'New Post For Test Dharmendra', 'New-Post-For-Test-Dharmendra', '<p>Get amazing results working with the best programmers, designers, writers and other top online pros. Hire freelancers with confidence, always knowing their work experience and feedback from other clients.</p>\r\n\r\n<p>Get amazing results working with the best programmers, designers, writers and other top online pros. Hire freelancers with confidence, always knowing their work experience and feedback from other clients.</p>\r\n\r\n<p>Get amazing results working with the best programmers, designers, writers and other top online pros. Hire freelancers with confidence, always knowing their work experience and feedback from other clients.</p>\r\n', 1, 11, '', '2016-06-18 07:12:36', 1),
(12, '25 Random Freebies for Web Designers', '25-Random-Freebies-Web-Designers', '<p>There are many designers out there who are kind enough to create freebies and share them with the community. If you are looking for mockups, ui kits, PSD templates, fonts, icons, branding packs and more, we have a few of them put together in this post. All you have to do is download them, then edit and customize these freebies for your project.</p>\r\n\r\n<p>Note that while not all of them allow free for commercial use license, all of them are available for personal use. If you want to use a resource in a client&rsquo;s project, you might want to check out premium ones as they are usually higher in quality and have a higher chance of delivering better results. Ready to see these neat freebies for designers?</p>\r\n', 1, 12, 'IMG_576806559d760.jpg', '2016-06-20 11:34:40', 1),
(13, 'Newsletter Signup Forms that Rock â€“ Inspirations, Templates & Tools', 'Newsletter-Signup-Forms-Rock-Inspirations-Templates-Tools', '<p>There are many designers out there who are kind enough to create freebies and share them with the community. If you are looking for mockups, ui kits, PSD templates, fonts, icons, branding packs and more, we have a few of them put together in this post. All you have to do is download them, then edit and customize these freebies for your project.</p>\r\n\r\n<p>Note that while not all of them allow free for commercial use license, all of them are available for personal use. If you want to use a resource in a client&rsquo;s project, you might want to check out premium ones as they are usually higher in quality and have a higher chance of delivering better results. Ready to see these neat freebies for designers?</p>\r\n', 5, 11, 'IMG_576808c9ec23f.jpg', '2016-06-20 11:45:01', 1),
(14, 'IBPS Section wise tips', 'IBPS-Section-wise-tips', '<p><strong>Quantitative Aptitude</strong><br />\r\nMeant to check your calculation speed with accuracy. Does not require formula mugging. This section is time consuming because you know the method but time is less. So speed is the key and it comes with practice lot of practice. Do a lot of mental math in everyday life and make yourself able to calculate really fast. Do not waste money in coaching centers and do not buy any book just refer NCRET books to clear your basic concept and practice online free questions. (Focus area &ndash; simplification, series, approximation, D.I., time &ndash; distance, average, percentage).</p>\r\n\r\n<p><strong>Reasoning</strong><br />\r\nMeant for checking your logical ability and problem solving ability. You can understand basic from any book; It does not require your subject knowledge but practice and practice. You can solve free online practice questions. (Focus area inequality, blood relations, syllogism, and coding &ndash; decoding, direction test).</p>\r\n\r\n<p><strong>English</strong><br />\r\nThis subject is meant for checking your comprehensive ability and English language understanding, You must be a good reader of English language. Make a habit of reading different pieces of writings; News articles, Journals, Magazines, The Hindu is important one. For grammar basics just refer NCERT books, do not buy any book (Focus area Cloze test, filters, Antonyms - Synonyms).</p>\r\n\r\n<p><strong>General Awareness</strong><br />\r\nFollow any good newspaper daily. Read newspaper according to points maintioned above in syllabus of General Awareness. This is very scoring subject helps you to improve your chances of final selection.</p>\r\n\r\n<p><strong>Computer Knowledge</strong><br />\r\nYou need not be a Computer Engineer to clear this section. You can refer book by NIOS and once you are done with its contents practice a lot of sample questions either online or offline.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Smart tips to Attempt</strong><br />\r\nExam is designed in such a way that no one can attend all 200 questions not even topper. So better you to left some questions. It differs from person to person but basic part remains same.<br />\r\nReasoning and Quantitative Aptitude section take lots of time both in preparation and in exam, while results shows that Reasoning and Quantitative sections has lowest cutoffs among the all five sections but you have to clear these two sections. So attend question enough to clear sectional cutoff only. Don&rsquo;t try to score in these sections. Try to score in this section only if you are CAT student. As cost benefit ratio is very low in these sections. These sections are made to consume your valuable time. As questions in these sections is very lengthy which eating much of your time reading the questions.&nbsp; Some questions in this section designed as trap. So you waste much of your time in satisfying your ego which will effect on subsequent section, so try to attend these sections in the last.<br />\r\nTry to attend computer and banking awareness first and full. As this consume less time and scoring. In these sections you either know the answer or you don&rsquo;t know the answer. So requires less brain burning which again boosts your confidence and prepares you for Reasoning and Quantitative Aptitude sections.<br />\r\nAfter Banking Awareness and Computer Awareness try to attempt English section and after these three section fullest.<br />\r\nDo the time management such that you can finish English, Banking Awareness and Computer Awareness sections within forty to fifty minutes so you have enough time to attend enough questions in reasoning and quantitative sections to pass cut off.</p>\r\n', 1, 14, 'IMG_57d59847136cf.png', '2016-09-12 00:31:23', 1),
(15, 'How to plan of IBPS PO examinations', 'How-plan-IBPS-PO-examinations', '<p><strong>Strategy of IBPS PO 2016</strong></p>\r\n\r\n<p>According to tentative calendar released by IBPS, preliminary examination for Probationary Officer will be conducted on 16th, 22th, 23th Oct 2016 and mains on 20th November 2016. The examination is conducted in three stages which are the preliminary exam, the Main Exam followed by the Personal Interview.</p>\r\n\r\n<p><strong>Exam Pattern</strong><br />\r\nRemember only those candidates who clears Preliminary exam will be eligible for Mains exam.&nbsp; Preliminary exam is meant for qualifying only. Score obtained in Preliminary exam will not be considered in Final selection.</p>\r\n\r\n<p>Keep in mind penalty for each wrong answer is &frac14;.</p>\r\n\r\n<p><br />\r\n<strong>Take a Mock Test Online</strong><br />\r\nThe test will make you aware level of difficulty and your current status. To know &lsquo;where do I stand?&rsquo; is extremely crucial before you actually put in your time and efforts preparing for any competitive exam.</p>\r\n\r\n<p><br />\r\n<strong>Find your weak and strength areas</strong><br />\r\nAfter giving mock test analysis it. Find your weak and strength areas, then make your study plan according to it. Give more emphasis on weaker area.</p>\r\n\r\n<p><br />\r\n<strong>Practice helps to improve speed and accuracy</strong><br />\r\nAs we all know, practice make man perfect. So if you want to crack bank exam then practice is must. Without practice, It is going to too tough task for any of us to crack exam. For proper practice, You may join test series.</p>\r\n\r\n<p><br />\r\n<strong>Time Management</strong><br />\r\nAlways attempt the easier questions first and time consuming or difficult questions later. Scan the entire section first and find out the easier questions and attempt them first Do not waste more time on any question. Make plan and go according to it in mock test before actual exam.</p>\r\n\r\n<p><br />\r\n<strong>Be Confident</strong><br />\r\nSelf Confidence is the key to crack this examination. From analysis of the candidates who get already selected, self confidence was one thing that found common amongst all selected ones.</p>\r\n', 1, 17, 'IMG_57619e0704f82.jpg', '2016-09-12 00:49:21', 1),
(16, 'Teachning Aptitude', 'Teachning-Aptitude', '<div class="post_content" itemprop="articleBody">\r\n<h2 class=""><em><strong>Teaching Aptitude Question Answers</strong></em></h2>\r\n<div class=""></div>\r\n<ul>\r\n<li class="breadcrumb">\r\n<div class="drop_cap">T</div>\r\n<p>eaching Aptitude questions answers are applicable for any kind of&nbsp;preparation&nbsp;in India like B.Ed / D.ed / M.Ed. You can <strong>practice</strong>&nbsp;as much as you can to gather knowledge of how to answers Teaching Aptitude critical type papers in short time and this can <strong>be a big factor for cracking all&nbsp;India&nbsp;level exam.</strong></p></li>\r\n</ul>\r\n<div class=""></div>\r\n<h3 class=""><strong>Teaching Aptitude Question Answers &ndash; Topics</strong></h3>\r\n<div class=""></div>\r\n<ul>\r\n<li class="breadcrumb"><strong>Teaching &ndash;</strong> Nature &amp; Objectives &ndash; Steps in Teaching, Factors affecting Teaching. Teacher<br>\r\ncharacteristics, Identification of learner needs, creating appropriate learning situations, effective&nbsp;teacher, progressive teacher, teaching styles.</li>\r\n</ul>\r\n<ul>\r\n<li class="breadcrumb">b. <strong>Teacher Roles</strong> &ndash; Motivator, Facilitator, Democratic leader, Guide, Counsellor, Mentor, Social Engineer-Classroom Implications.</li>\r\n</ul>\r\n<ul>\r\n<li class="breadcrumb">c. <strong>Methods and Techniques of Teaching</strong>: Learner Centered Teaching Strategies, Projects, Group&nbsp;Discussion, Activity, Co-operative Learning, Seminars, Debates etc. Effective use of ICT, AV Aids,&nbsp;Improvisation, Tools and Techniques of Evaluation, Concept of CCE and Assessment</li>\r\n</ul>\r\n<ul>\r\n<li class="breadcrumb">d. <strong>Classroom Management</strong>, Skills in Planning and Implementation, Decision Making, Positive Feedback.</li>\r\n</ul>\r\n<ul>\r\n<li class="breadcrumb">e. <strong>Personality of the Teacher</strong> &ndash; Emotional Maturity, Balanced Personality, Attitude, Values and&nbsp;Professional Ethics.</li>\r\n</ul>\r\n<ul>\r\n<li class="breadcrumb"><strong>Understanding teaching and learning</strong> in the context of NCF 2005, KCF 2007 and right to education&nbsp;act 2009</li>\r\n</ul>\r\n\r\n\r\n\r\n<!-- Quick Adsense WordPress Plugin: http://quicksense.net/ -->\r\n\r\n\r\n<!--RWP Review-->\r\n<!--/review-wrap-->\r\n\r\n\r\n							</div>', 1, 15, '', '2016-09-26 13:59:13', 1),
(17, 'Two Year of Swachh Bharat Campaign', 'Two-Year-Swachh-Bharat-Campaign', '<p>The grand cleanliness campaign, Swachh Bharat Campaign, on October 2, 2016, completed two years since it was launched on the same date in the year 2014 with much fanfare to make India clean by the time India celebrates the 150th birth anniversary of the Father of Nation Mahatma Gandi, that is, by the year 2019.</p>\r\n\r\n<p>To mark this occasion, the Center origanized INDOSAN-India Sanitation Conference in New Dalhi and adopted a Declaration wherein top leadership including Prime Minister, Chief Ministers and Ministers from State and Union Territories today commited to make India Open Defecation Free and Clean by 2019.</p>\r\n\r\n<p><strong>INDOSAN</strong></p>\r\n\r\n<p>During the Conference, the Union Minister for Rural Development, Drinking Water &amp; Sanitation and Panchaati Raj Narandra Singh Tomar said that by October 2, 2016, one lakh villages will become Open Defecation Free (ODF) and 40 Districts will achieve the status of ODF Distracts in the financial Year 2016-17.</p>\r\n\r\n<p>The Conference also saw the distribution of awards to instutions and organizations for singnificant work to ensure cleanliness. These are as follow:</p>\r\n\r\n<ol>\r\n	<li><strong>ODF and cleanest district in plain areas</strong>: Sindhudurg District, Maharashtra</li>\r\n	<li><strong>Cleanest Cultural Heritage Site</strong>: Rani ki Vav, Patan, Gujarat</li>\r\n	<li><strong>Cleanest Tourism Destination</strong>: Gangtok, Sikkim</li>\r\n	<li><strong>Clean Cities in Million plus population category</strong>: Chandigarh and Mysuru</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 10, 'IMG_57f0d40dd9805.jpg', '2016-10-02 16:15:39', 1),
(18, 'GK Notes on Water & Air Transport in India', 'GK-Notes-Water-Air-Transport-India', '<h3>GK Notes on Water &amp; Air Transport in India</h3>\r\n\r\n<p>Geography&nbsp;covers a good number&nbsp;of questions making it an important topic to cover in SSC Exams. &nbsp;Around&nbsp;<strong>6&nbsp;&ndash; 8 questions</strong>&nbsp;are asked from Geography&nbsp;which surely makes it important for you to study the topic well for upcoming&nbsp;<strong>SSC and Other Competitive&nbsp;Exams</strong>. Here are some short&nbsp;notes on&nbsp;<strong>&ldquo;Transportation in India: Water &amp; Air Transport&rdquo;&nbsp;</strong>&nbsp;which you should not ignore.</p>\r\n\r\n<h3><strong>Water&nbsp;Transport&nbsp;</strong></h3>\r\n\r\n<p>India has an extensive network of inland waterways in the form of rivers, canals, backwaters and creeks. The waterways of the country have been divided into internal waterways and oceanic waterways.</p>\r\n\r\n<p><strong>The following waterways have been declared as National Waterways:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>NW1</strong>-&nbsp;<strong>Allahabad to Haldia &ndash;&nbsp;</strong>1620 Km</li>\r\n	<li><strong>NW2</strong>-<strong>&nbsp;Sadia to Dhubri on Brahmaputra River-&nbsp;</strong>891 Km</li>\r\n	<li><strong>NW3</strong>-&nbsp;<strong>Kollam to Kottapuram</strong>&nbsp;&ndash; 168 km</li>\r\n	<li><strong>NW4-</strong>&nbsp;<strong>Kakinada to&nbsp; Marakkannam along Goodavari and Krishna river</strong>&nbsp;&ndash; 1095 km</li>\r\n	<li><strong>NW5 &ndash;</strong>&nbsp;<strong>Mangalgarhi to Paradeep and Talcher to Dhamara along Mahanadi and Brahmini-</strong>&nbsp;623 Km</li>\r\n</ul>\r\n\r\n<h3><strong>12 -Major Ports in India</strong></h3>\r\n\r\n<p><strong>Western Coast</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Tidal Port</strong>&nbsp;&ndash;(Child of partition) &ndash;&nbsp;<strong>Gujarat</strong></li>\r\n	<li><strong>Mumbai</strong>&nbsp;&ndash; (Busiest and biggest)&nbsp; -&nbsp;&nbsp;<strong>Maharashtra</strong></li>\r\n	<li><strong>JL Nehru-</strong>(Fastest growing)-&nbsp;<strong>Maharashtra</strong></li>\r\n	<li><strong>Marmugao</strong>&nbsp;&ndash; (Naval base also) &ndash;&nbsp;<strong>Goa</strong></li>\r\n	<li><strong>Mangalore</strong>&nbsp;&ndash; (Exports Kudremukh iron &ndash; ore) &ndash;&nbsp;<strong>Karnataka</strong></li>\r\n	<li><strong>Cochin</strong>&nbsp;&ndash; (Natural harbor) &ndash;&nbsp;<strong>Kerala</strong></li>\r\n</ul>\r\n\r\n<p><strong>Eastern Coast</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Kandla&nbsp; Paradip&nbsp;</strong>&nbsp;- (exports raw iron to japan)&nbsp; -&nbsp;<strong>Odisha</strong></li>\r\n	<li><strong>Vishakhapatnam</strong>&nbsp;&ndash; (deepest port) &ndash;&nbsp;<strong>Andhra</strong>&nbsp;<strong>Pradesh</strong></li>\r\n	<li><strong>Chennai</strong>&nbsp;&ndash;( Most modern in private hands) &ndash;&nbsp;<strong>Tamil</strong>&nbsp;<strong>Nadu</strong></li>\r\n	<li><strong>Ennore</strong>&nbsp;&ndash; (Most modern in Private hands)&nbsp; -&nbsp;<strong>Tamil Nadu</strong></li>\r\n	<li><strong>Tuticorin</strong>- (Southernmost) &ndash;&nbsp;<strong>Tamil</strong>&nbsp;<strong>Nadu</strong></li>\r\n	<li><strong>Port Blair</strong>&nbsp;&ndash; (Strategically important)-&nbsp;<strong>Andaman</strong>&nbsp;<strong>and</strong>&nbsp;<strong>Nicobar</strong>&nbsp;<strong>Islands</strong></li>\r\n</ul>\r\n\r\n<h3><strong>Air Transport</strong></h3>\r\n\r\n<ul>\r\n	<li><strong>JRD Tata</strong>&nbsp;was the&nbsp;<strong>first</strong>&nbsp;<strong>person</strong>&nbsp;to take a solo flight form Mumbai to Karachi in&nbsp;<strong>1931</strong>.</li>\r\n	<li><strong>In 1935</strong>, the&nbsp;<strong>&lsquo;Tata Air Lines&rsquo;</strong>&nbsp;started its operation between&nbsp;<strong>Mumbai</strong>&nbsp;and<strong>Thiruvananthapuram</strong>&nbsp;and in 1937 between Mumbai and Delhi.</li>\r\n	<li>In&nbsp;<strong>1953</strong>, all the&nbsp;<strong>private airline</strong>&nbsp;companies were nationalized and Indian Airlines and Air India came into existence.</li>\r\n	<li><strong>Vayudoot Limited started</strong>&nbsp;in&nbsp;<strong>1981</strong>&nbsp;as a private air carrier and later on it merged with Indian Airlines.</li>\r\n	<li>International&nbsp; Airports Authority of India and National Airports Authority were merged on 1995 to form Airports Authority of India.</li>\r\n	<li>The Authority manages the Civil Aviation Training College at Allahabad and National Institute of Aviation Management and Research at Delhi.</li>\r\n</ul>\r\n\r\n<h3><strong>12 International Airports in India</strong></h3>\r\n\r\n<ul>\r\n	<li>Rajiv Gandhi International Airport &ndash;&nbsp;<strong>Hyderabad</strong></li>\r\n	<li>Calicut International Airport &ndash;&nbsp;<strong>Calicut</strong></li>\r\n	<li>Chhatrapati Shivaji International Airport-&nbsp;<strong>Mumbai</strong></li>\r\n	<li>Kempe Gowda International Airport &ndash;<strong>Bengaluru</strong></li>\r\n	<li>Goa Airport in Vasco di Gama city-&nbsp;<strong>Goa</strong></li>\r\n	<li>Netaji Subhash Chandra Bose International Airport &ndash;&nbsp;<strong>Kolkata</strong></li>\r\n	<li>Thiruvananthapuram International Airport &ndash;&nbsp;<strong>Thiruvananthapuram</strong></li>\r\n	<li>Lokpriya Gopinath Bordoloi International Airport &ndash;&nbsp;<strong>Guwahati</strong></li>\r\n	<li>Sardar Vallabbhbhai Patel International Airport &ndash;&nbsp;<strong>Ahmedabad</strong></li>\r\n	<li>Indira Gandhi International Airport &ndash;&nbsp;<strong>Delhi</strong></li>\r\n	<li>Chennai International Airport &ndash;&nbsp;<strong>Chennai</strong></li>\r\n	<li>Shri Guru Ram Dass Jee International Airport &ndash;&nbsp;<strong>Amritsar</strong></li>\r\n</ul>\r\n', 1, 8, 'IMG_58241dfce6154.jpg', '2016-11-10 14:11:31', 1),
(19, 'List of Famous Books and their Authors', 'List-Famous-Books-Authors', '<p>Today we are providing the list of &nbsp;most repeated Books &amp; their authors in competitive exam.</p>\r\n\r\n<ul>\r\n	<li>Two Year Eight Months and Twenty &ndash;Eight Night &nbsp;&ndash;<strong>Salman Rushdi&nbsp;</strong></li>\r\n	<li>The Red Sari &ndash;<strong>Javier Moro&nbsp;</strong></li>\r\n	<li>Neither a Hawk nor a dove &ndash;<strong>Khurshid M Kasuari&nbsp;</strong></li>\r\n	<li>Faces and Places Professor &ndash;<strong>Deepak Nayyar&nbsp;</strong></li>\r\n	<li>Indian Parliamentary Diplomacy-&nbsp;<strong>Meira Kumar&nbsp;</strong></li>\r\n	<li>Farishta &ndash;<strong>Kapil Isapuari&nbsp;</strong></li>\r\n	<li>Super Economies &ndash;<strong>Raghav Bahal&nbsp;</strong></li>\r\n	<li>China :Confucius in the Shadow &ndash;<strong>Poonam Surie&nbsp;</strong></li>\r\n	<li>My country My Life â€&nbsp;<strong>L.K.Advani</strong></li>\r\n	<li>Joseph Anton â€&nbsp;<strong>Sulman Rushdie (Autobiography)</strong></li>\r\n	<li>The Sahara Testaments â€&nbsp;<strong>Tade Ipadeola</strong></li>\r\n	<li>Narendra Modi: A Political Biography â€<strong>&nbsp;Andy Marino</strong></li>\r\n	<li>My Unforgettable Memories â€<strong>&nbsp;Mamata Banerjee</strong></li>\r\n	<li>Rationalised Roman for Kashmiri â€<strong>&nbsp;Dr R L Bhat</strong></li>\r\n	<li>Strictly Personal, Manmohan and Gursharan â€&nbsp;<strong>Daman Singh</strong></li>\r\n	<li>The Wrong Enemy: America in Afghanistan, 2001â€ 2014 â€&nbsp;<strong>Carlotta Gall</strong></li>\r\n	<li>Lal Bahadur Shastri: Lessons in Leadership â€<strong>&nbsp;Pavan Choudary</strong></li>\r\n	<li>Walking With Giants â€&nbsp;<strong>G. Ramachandran(former Finance Secretary )</strong></li>\r\n	<li>Crusader or Conspirator? Coalgate and other Truths â€&nbsp;<strong>PC Parakh</strong></li>\r\n	<li>The Accidental Prime Minister: the making and unmaking of Manmohan Singh â€&nbsp;<strong>Sanjaya Baru</strong></li>\r\n	<li>God of Antarctica â€&nbsp;<strong>13 year old Yashwardhan Shukla</strong></li>\r\n	<li>My Years with Rajiv and Sonia â€&nbsp;<strong>R.D.Pradhan</strong></li>\r\n	<li>Khushwantnama â€The Lessons of My Life â€&nbsp;<strong>Khushwant singh</strong></li>\r\n	<li>Syntheism &ndash; Creating God in The Internet Age â€&nbsp;<strong>Alexander Bard</strong></li>\r\n	<li>One Life is Not Enough â€&nbsp;<strong>Natwar Singh</strong></li>\r\n	<li>The Lives of Others â€<strong>&nbsp;Neel Mukherjee</strong></li>\r\n	<li>My Music My Life â€&nbsp;<strong>Pt Ravi Shankar</strong></li>\r\n	<li>I am Malala â€&nbsp;<strong>Malala Yousufzai and Christina Lamb</strong></li>\r\n	<li>A Man and A Motorcycle, How Hamid Karzai Came to Power â€&nbsp;<strong>Bette Dam</strong></li>\r\n	<li>True Colours &mdash;&nbsp;<strong>Adam Gilchrist</strong></li>\r\n	<li>Assassination of Rajiv Gandhi: An Inside Job? â€&nbsp;<strong>Faraz Ahmad</strong></li>\r\n	<li>The God of Small Things â€&nbsp;<strong>Arundhati Roy</strong></li>\r\n	<li>Interpreter of Maladies â€&nbsp;<strong>Jhumpa Lahiri</strong></li>\r\n	<li>And then One Day: A Memoir â€&nbsp;<strong>Nasiruddin Shah (Autobiography)</strong></li>\r\n	<li>Unaccustomed Earth â€<strong>&nbsp;Jhumpa Lahiri</strong></li>\r\n	<li>Lowland â€&nbsp;<strong>Jhumpa Lahiri</strong></li>\r\n	<li>Truth Always Prevails â€&nbsp;<strong>Sadruddin Hashwani</strong></li>\r\n	<li>Playing It My Way &ndash;&nbsp;<strong>Sachin Tendulkar and Boria Mazumder</strong></li>\r\n	<li>Unbreakable (Autobiography of Mary Kom) â€<strong>&nbsp;Mary Kom</strong></li>\r\n	<li>Enoch, I am a British Indian â€&nbsp;<strong>Sarinder Joshua</strong></li>\r\n	<li>Duroch ModiNomics â€&nbsp;<strong>Sameer Kochar</strong></li>\r\n	<li>Public Issues Before Parliament â€<strong>&nbsp;Vijay Darda</strong></li>\r\n	<li>Water, Peace and War &ndash; Confronting the Global Water Crisis â€&nbsp;<strong>Brahma Chellaney Ambedkar</strong></li>\r\n	<li>Awakening India&rsquo;s Social Conscience â€&nbsp;<strong>Dr. Narendra Jadhav</strong></li>\r\n	<li>Munger through the Ages â€&nbsp;<strong>Late DP Yadav</strong></li>\r\n	<li>Akbar &ndash; The Aesthete â€&nbsp;<strong>Dr. Indu Anand</strong></li>\r\n	<li>Runs in Ruins &mdash;&nbsp;<strong>Sunil Gavaskar</strong></li>\r\n	<li>India at Risk â€&nbsp;<strong>Jaswant Singh</strong></li>\r\n	<li>The Narrow Road to the Deep North â€&nbsp;<strong>Richard Flanagan (Australian)(Man Booker)</strong></li>\r\n	<li>Untold Story of the Indian Public Sector â€&nbsp;<strong>Dr UD Choubey</strong></li>\r\n	<li>Final Test: Exit Sachin Tendulkar â€&nbsp;<strong>Dilip D&rsquo;Souza</strong></li>\r\n	<li>Worthy Fights: A Memoir of Leadership in War and Peace â€&nbsp;<strong>Leon Panetta and Jim Newton</strong></li>\r\n	<li>Not Just an Accountant â€&nbsp;<strong>former CAG Vinod Rai</strong></li>\r\n	<li>Grandmaster Repertoire â€ 1.e4 vs The French, Caroâ€Kann and Philidor â€&nbsp;<strong>Parimarjan Negi</strong></li>\r\n	<li>A Bend in the river â€&nbsp;<strong>V.S. Naipaul</strong></li>\r\n	<li>Dark Star: The Loneliness of Being Rajesh Khanna â€&nbsp;<strong>Gautam Chintamani</strong></li>\r\n	<li>Half Girlfriend â€&nbsp;<strong>Chetan Bhagat</strong></li>\r\n	<li>Iqbal: The Life of a Poet, Philosopher and Politician â€&nbsp;<strong>Biography of Allama Muhammad Iqbal (Spiritual Father of Pakistan)</strong></li>\r\n	<li>50 years of man in space â€&nbsp;<strong>Garik Israelien, Brian May and David J Eicher</strong></li>\r\n	<li>Black Tornado: The Three Sieges of Mumbai 26/11 â€&nbsp;<strong>Sandeep Unnithan</strong></li>\r\n	<li>Dramatic Decade: The Indira Gandhi Years â€ Pranab Mukherjee 2014: The Election That Changed India â€<strong>Rajdeep Sardesai</strong></li>\r\n	<li>Your Dreams Are Mine Now: She Showed him What Love â€&nbsp;<strong>Ravinder Singh</strong></li>\r\n	<li>Born Again on the Mountain-&nbsp;<strong>Arunima Sinha</strong></li>\r\n	<li>Flood of Fire &ndash;<strong>Amitav Ghosh</strong></li>\r\n	<li>30 Women in Power: Their Voices, Their Stories-&nbsp;<strong>Naina Lal Kidwai</strong></li>\r\n	<li>The Courage to Act &ndash; A Memoir of a Crisis and Its Aftermath :&nbsp;<strong>Ben S. Bernanke</strong></li>\r\n	<li>To the Brink and Back: India&rsquo;s 1991 Story :<strong>Jairam Ramesh</strong></li>\r\n	<li>Globalisation, Democratization and Distributive Justice :&nbsp;<strong>Dr. Mool Chand Sharma</strong></li>\r\n	<li>Ramcharitmanas (105-year-old Urdu copy ):&nbsp;<strong>Shiv Brat Lal</strong></li>\r\n	<li>Mrs Funny &nbsp;bones :<strong>Twinkle Khanna</strong></li>\r\n	<li>Making India Awesome :&nbsp;<strong>Chetan Bhagat</strong></li>\r\n	<li>The Kumbh Mela: Mapping the Ephemeral Megacity :<strong>Tarun Khanna</strong></li>\r\n	<li>R.D. Burman: The Prince of Music :<strong>Khagesh Dev Burman</strong></li>\r\n	<li>Ghosts of Calcutta :<strong>Sebastian Ortiz</strong></li>\r\n	<li>Green Signals: Ecology, Growth, and Democracy in India :<strong>Jairam Ramesh</strong></li>\r\n	<li>Transcendence: My Spiritual Experiences with Pramukh Swamiji :&nbsp;<strong>Abdul Kalam</strong></li>\r\n	<li>Beyond Doubt: A Dossier on Gandhi&rsquo;s Assassination :&nbsp;<strong>Teesta Setalvad</strong></li>\r\n	<li>Modi &ndash; Incredible emergence of a star (in Chinese language):&nbsp;<strong>Tarun Vijay</strong></li>\r\n	<li>Education of Muslims :&nbsp;<strong>Professor JS Rajput</strong></li>\r\n	<li>Sourav Ganguly: Cricket, Captaincy and Controversy:<strong>Saptarshi Sarkar</strong></li>\r\n	<li>Flood of fire :&nbsp;<strong>Amitav Ghosh</strong></li>\r\n	<li>Super Economies :Raghav Bahl</li>\r\n	<li>Complete Story of Indian Reforms: 2G, Power &amp; Private Enterprise :<strong>&nbsp;Pradeep Baijal</strong></li>\r\n	<li>Unbelievable &ndash; Delhi to Islamabad :&nbsp;<strong>Prof Bhim Singh</strong></li>\r\n	<li>Food for All:<strong>Uma Lele</strong></li>\r\n	<li>Family Life :<strong>Akhil Sharma( winner of the Folio Prize 2015)</strong></li>\r\n	<li>Faces and Places :<strong>Prof. Deepak Nayyar</strong></li>\r\n	<li>Indian Parliamentary Diplomacy- Speaker&rsquo;s Perspective :<strong>Meira Kumar</strong></li>\r\n	<li>Editor Unplugged: Media, Magnates, Netas and Me :&nbsp;<strong>Vinod Mehta</strong></li>\r\n	<li>Fragile Frontiers: The Secret History of Mumbai Terror Attacks :<strong>&nbsp;SK Rath</strong></li>\r\n	<li>Why I Assassinated Gandhi :&nbsp;<strong>Nathuram Godse and Gopal Godse</strong></li>\r\n</ul>\r\n', 1, 8, '', '2016-11-13 03:45:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `category_id` int(5) NOT NULL DEFAULT '0',
  `sub_category_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `level` int(2) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category_id`, `sub_category_id`, `question`, `level`, `user_id`, `description`, `sort_order`, `created`, `modified`, `status`) VALUES
(6, 0, 0, 'fdgdfg', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(7, 0, 0, 'Hello TEst', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(8, 0, 0, 'Hello New Question', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(9, 0, 0, 'What does HTML stand for?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(10, 0, 0, 'Who is making the Web standards?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(11, 0, 0, 'Choose the correct HTML element for the largest heading:', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(12, 0, 0, 'What is the correct HTML element for inserting a line break?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(13, 0, 0, 'What does SQL stand for?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(14, 0, 0, 'Which SQL statement is used to extract data from a database?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(15, 0, 0, 'Which SQL statement is used to update data in a database?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(16, 0, 0, 'Which SQL statement is used to delete data from a database?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(17, 0, 0, 'Which SQL statement is used to insert new data in a database?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(18, 0, 0, 'With SQL, how do you select a column named "FirstName" from a table named "Persons"?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(19, 0, 0, 'With SQL, how do you select all the columns from a table named "Persons"?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(20, 0, 0, 'With SQL, how do you select all the records from a table named "Persons" where the value of the column "FirstName" is "Peter"?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(21, 0, 0, 'With SQL, how do you select all the records from a table named "Persons" where the value of the column "FirstName" starts with an "a"?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(22, 0, 0, 'Which SQL keyword is used to sort the result-set?', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(23, 0, 0, 'Look carefully for the pattern, and then choose which pair of numbers comes next.\r\n4 8 22 12 16 22 20 24', 0, 1, '', 0, '2016-03-12 07:42:32', '0000-00-00 00:00:00', 1),
(25, 4, 0, 'Click the best synonym for ancient:', 0, 1, '', 0, '2016-03-12 05:40:08', '2016-03-12 05:40:08', 1),
(26, 4, 0, 'Click the best synonym for dense:', 1, 1, '', 0, '2016-03-12 05:42:22', '2016-03-12 05:42:22', 1),
(27, 4, 0, 'Click the best synonym for evaluate:', 3, 1, '', 0, '2016-03-12 05:58:24', '2016-03-12 05:58:24', 1),
(28, 4, 0, 'Click the best synonym for soil:', 1, 1, '', 0, '2016-03-12 06:02:10', '2016-03-12 06:02:10', 1),
(29, 5, 6, 'sdfgh', 0, 1, '', 0, '2016-03-17 13:36:20', '2016-03-17 13:36:20', 1),
(30, 4, 8, 'Test', 0, 1, '', 0, '2016-03-31 14:35:41', '2016-03-31 14:35:41', 1),
(31, 5, 6, 'Who among the following has invented programming language Ruby?', 1, 1, '', 0, '2016-09-16 02:41:45', '2016-09-16 02:41:45', 1),
(32, 5, 6, '_____ are symbols used to replace or represent one or more characters.', 0, 1, '', 0, '2016-09-16 02:45:44', '2016-09-16 02:45:44', 1),
(33, 5, 6, 'IBM stands for _______.', 0, 1, '', 0, '2016-09-16 02:48:53', '2016-09-16 02:48:53', 1),
(34, 5, 6, 'Data Representation is based on the _____ number system, which is used two numbers to represent all data.', 0, 1, '', 0, '2016-09-16 02:52:52', '2016-09-16 02:52:52', 1),
(35, 5, 6, 'The secret code that restricts entry to some program ______.', 0, 1, '', 0, '2016-09-16 02:57:17', '2016-09-16 02:57:17', 1),
(36, 5, 6, 'Who is creator of PASCAL Language?', 1, 1, '', 0, '2016-09-16 03:01:09', '2016-09-16 03:01:09', 1),
(37, 5, 6, 'A _____ is a major database object used to display information in a printable page format', 0, 1, '', 0, '2016-09-16 03:03:07', '2016-09-16 03:03:07', 1),
(38, 5, 6, 'All the Information collected during database development us stored in a _____.', 1, 1, '', 0, '2016-09-16 03:06:41', '2016-09-16 03:06:41', 1),
(39, 5, 6, 'If you want to move an icon on your desktop, this is called _____.', 0, 1, '', 0, '2016-09-16 03:09:37', '2016-09-16 03:09:37', 1),
(40, 5, 6, '_____ layer of OSI model is also called as end-to-end layer.', 1, 1, '', 0, '2016-09-16 03:12:18', '2016-09-16 03:12:18', 1),
(41, 5, 6, 'A Computer cannot "Boot" if it does not have the ___', 0, 1, '', 0, '2016-09-21 23:27:29', '2016-09-21 23:27:29', 1),
(42, 5, 61, '_____ is a small group of computers and peripherals linked together in a small geographic are?', 1, 1, '', 0, '2016-10-23 03:04:18', '2016-10-23 03:04:18', 1),
(43, 26, 62, 'When is the Universal Childrenâ€™s Day celebrated?', 1, 1, '', 0, '2016-11-14 02:26:28', '2016-11-14 02:26:28', 1),
(44, 26, 62, 'VK Krishna Menon proposed the celebration of Childrenâ€™s Day to â€¦â€¦â€¦. ', 1, 1, '', 0, '2016-11-14 02:27:32', '2016-11-14 02:27:32', 1),
(45, 26, 62, 'Whose birthday in India is celebrated as Childrenâ€™s Day?', 1, 1, '', 0, '2016-11-14 02:28:54', '2016-11-14 02:28:54', 1),
(46, 26, 62, 'When was the United Nations International Children''s Emergency Fund (UNICEF) established? ', 1, 1, '', 0, '2016-11-14 02:30:10', '2016-11-14 02:30:10', 1),
(47, 26, 62, 'Child Labor Act prohibits employment of children aged under ...... years. ', 1, 1, '', 0, '2016-11-14 02:31:09', '2016-11-14 02:31:09', 1),
(48, 26, 62, 'Which of these is Jawaharlal Nehruâ€™s favorite flower which he always wore on his coat? ', 1, 1, '', 0, '2016-11-14 02:32:37', '2016-11-14 02:32:37', 1),
(49, 26, 62, ' Which film won the National Award for Best Childrenâ€™s film category for the year 2007? ', 1, 1, '', 0, '2016-11-14 02:34:36', '2016-11-14 02:34:36', 1),
(50, 26, 62, ' Who is the Chairperson of Childrenâ€™s Film Society of India (CFSI)? ', 1, 1, '', 0, '2016-11-14 02:36:24', '2016-11-14 02:36:24', 1),
(51, 26, 62, 'Name the hosting city of 16th International Childrenâ€™s Film Festival?', 1, 1, '', 0, '2016-11-14 02:37:34', '2016-11-14 02:37:34', 1),
(52, 26, 62, ' CRY stands for â€¦â€¦â€¦ ', 1, 1, '', 0, '2016-11-14 02:39:22', '2016-11-14 02:39:22', 1),
(53, 26, 62, 'Who is the first prime minister to introduce demonetization in India', 1, 1, '', 0, '2016-11-14 14:41:01', '2016-11-14 14:41:01', 1),
(54, 5, 7, 'â€¦â€¦â€¦â€¦.â€¦ is the process of carrying commands.', 1, 1, '', 0, '2016-11-18 23:40:44', '2016-11-18 23:40:44', 1),
(55, 5, 7, 'What is the language used by most of the DBMSâ€™s for helping their users to access data?', 1, 1, '', 0, '2016-11-18 23:42:50', '2016-11-18 23:42:50', 1),
(56, 5, 6, 'What type of device is a computer mouse?', 1, 1, '', 0, '2016-11-18 23:46:00', '2016-11-18 23:46:00', 1),
(57, 5, 6, 'When your turn on the computer, the boot routine will perform which of the test?', 1, 1, '', 0, '2016-11-18 23:51:54', '2016-11-18 23:51:54', 1),
(58, 5, 6, 'To move to the beginning of a line of text, press the _____ Key.', 1, 1, '', 0, '2016-11-18 23:57:33', '2016-11-18 23:57:33', 1),
(59, 5, 7, 'The arranging of data in a logical sequence is called____.', 1, 1, '', 0, '2016-11-18 23:59:19', '2016-11-18 23:59:19', 1),
(60, 5, 61, 'Which of the following is NOT a transmission technology?', 2, 1, '', 0, '2016-11-19 00:00:21', '2016-11-19 00:00:21', 1),
(61, 5, 7, 'Which of the following places the common data elements in order from smallest to the largest_____.\r\n', 1, 1, 'In computer science, a search data structure is any data structure that allows the efficient retrieval of specific items from a set of items, such as a specific record from a database. Common data elements in order from smallest to the largest â€œCharacter, field, record, file, databaseâ€.', 0, '2016-12-01 23:33:50', '2016-12-01 23:33:50', 1),
(62, 5, 6, 'Microprocessors as switching devices are for which generation computers?\r\n', 1, 1, 'The first microprocessor called Intel 4004 was developed by American Intel Corporation in 1971. Microprocessors are used in the computers of fourth generation computers. Personal microcomputers were possible due to the microprocessors.\r\n\r\n', 0, '2016-12-01 23:37:30', '2016-12-01 23:37:30', 1),
(63, 5, 47, 'World Wide Web began from the year_____.\r\n', 1, 1, 'Sir Tim Berners-Lee invented the World Wide Web in 1989. He is a British computer scientist.', 0, '2016-12-01 23:38:44', '2016-12-01 23:38:44', 1),
(64, 5, 6, 'Which of the following is not used as blogging platform?\r\n', 1, 1, 'Pinterestis called as Social Network Site for sharing the Articles.\r\n\r\n', 0, '2016-12-01 23:45:18', '2016-12-01 23:45:18', 1),
(65, 5, 6, 'Specialized programs that assist users in locating information on the web are called ____.\r\n', 1, 1, 'A web search engine is a software system that is designed to search for information on the World Wide Web. Web search engines get their information by web crawling from site to site.\r\n\r\n', 0, '2016-12-01 23:49:54', '2016-12-01 23:49:54', 1),
(66, 5, 47, 'A cookie is ______.\r\n', 1, 1, 'Cookies are small files which are stored on a user''s computer. They are designed to hold a modest amount of data specific to a particular client and website, and can be accessed either by the web server or the client computer.\r\n\r\n', 0, '2016-12-02 23:17:49', '2016-12-02 23:17:49', 1),
(67, 5, 47, 'Programs such as Mozilla Firefox that serve as navigable windows into the Web are called__________.\r\n', 1, 1, 'Mozilla Firefox is a free and open-source web browser developed by the Mozilla Foundation and its subsidiary, the Mozilla Corporation.\r\n\r\n', 0, '2016-12-02 23:18:48', '2016-12-02 23:18:48', 1),
(68, 5, 47, 'Which of the following operations is safe if an e-mail from an unknown suspected sender is received?\r\n', 1, 1, 'Be suspicious of email messages that re-direct you to web pages, if unsure type the web address manually into a new browser window - do not click the link.\r\n\r\n', 0, '2016-12-02 23:19:50', '2016-12-02 23:19:50', 1),
(69, 5, 6, 'Which key is used in combination with another key to perform a specific task?\r\n', 1, 1, 'A Control key is a modifier key which, when pressed in conjunction with another key, performs a special operation. The Control key rarely performs any function when pressed by itself.\r\n\r\n', 0, '2016-12-02 23:21:19', '2016-12-02 23:21:19', 1),
(70, 5, 6, 'A screen list of options in a program that tells you what is in that program ____.\r\n', 1, 1, 'Menu or menu bar is graphical control element. It is a list of options or commands presented to an operator by a computer or communications system.\r\n\r\n', 0, '2016-12-02 23:23:59', '2016-12-02 23:23:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `created`, `status`) VALUES
(1, 'general TEST', '2015-12-21 05:38:09', 0),
(2, 'HTML BASIC', '2016-01-02 07:10:51', 1),
(3, 'SQL', '2016-01-02 09:33:40', 1),
(4, 'Reasoning', '2016-03-04 11:57:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `answer_status` int(11) NOT NULL,
  `quiz_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `quiz_id`, `question_id`, `answer_id`, `answer_status`, `quiz_date`) VALUES
(1, 0, 1, 6, 9, 1, '2016-01-01 15:39:10'),
(13, 0, 1, 7, 14, 1, '2016-01-01 16:07:39'),
(14, 0, 1, 8, 18, 0, '2016-01-01 16:08:24'),
(23, 5, 2, 9, 21, 0, '2016-01-07 13:40:04'),
(24, 5, 2, 10, 24, 0, '2016-02-20 10:48:20'),
(25, 5, 3, 13, 35, 1, '2016-02-20 10:48:55'),
(28, 5, 4, 23, 78, 0, '2016-03-12 12:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `result_logs`
--

CREATE TABLE `result_logs` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `currect_questions` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `result_status` varchar(1) NOT NULL DEFAULT 'R' COMMENT 'C = Complete, R = Reset',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_logs`
--

INSERT INTO `result_logs` (`id`, `quiz_id`, `user_id`, `currect_questions`, `total_questions`, `result_status`, `created`) VALUES
(1, 1, 5, 1, 3, 'R', '2016-01-02 13:41:59'),
(2, 2, 5, 4, 4, 'R', '2016-01-04 07:13:26'),
(3, 3, 5, 4, 11, 'R', '2016-01-08 08:44:10'),
(4, 3, 5, 5, 10, 'R', '2016-01-25 11:36:01'),
(5, 4, 5, 0, 2, 'R', '2016-03-12 07:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `key` varchar(40) NOT NULL,
  `value` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '''0''=>''inactive'',''1''=>''active'''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `title`, `key`, `value`, `status`) VALUES
(16, 'YouTube', 'Site.youtube', '', 1),
(5, 'Skype', 'Site.skype', 'cupcherry', 1),
(6, 'facebook', 'Site.facebook', 'https://web.facebook.com/cupcherry/', 1),
(7, 'twitter', 'Site.twitter', '', 1),
(8, 'linkedin', 'Site.linkedin', '', 1),
(14, 'Pinterest', 'Site.pinterest', '', 1),
(15, 'Google Plus', 'Site.google_plus', '', 1),
(13, 'Records', 'Site.admin_record_per_page', '10', 0),
(17, 'Admin Mail', 'Site.email', 'admin@cupcherry.com', 1),
(18, 'Admin Date Format', 'Site.admin_date_format', 'd-m-Y', 1),
(19, 'Front date format', 'Site.front_date_format', 'd M Y', 1),
(20, 'Server Cookie Version', 'Site.SCV', 'SCV101', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `testimonial_text` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `email`, `testimonial_text`, `created`, `status`) VALUES
(1, 'Dharmendra', 'cgtdharm@gmail.com', 'This is best way for the training , and thanks for everything u guys done I appreciate I did my test and I got 100% on my test , and it''s the best way to pass your test . Thanks again - See more at: http://uscitizenshipsupport.com/testimonials/#sthash.joCmtsw4.dpuf', '2016-03-16 16:11:46', 1),
(5, 'Dharm', 'cgtdharm@gmail.com', 'Test Review Comment', '2016-03-25 12:59:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_code` varchar(5) NOT NULL COMMENT 'Now CA for category, TA for Test type',
  `test_type_id` int(11) NOT NULL,
  `question_summery` text NOT NULL,
  `test_status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'For Internal Use'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `test_code`, `test_type_id`, `question_summery`, `test_status`, `created`, `status`) VALUES
(1, 5, 'CA', 6, '[{"cate_id":"6","cate_data":[{"q_id":"33","ca_id":"115","status":"0"},{"q_id":"30","ca_id":"105","status":"0"},{"q_id":"34","ca_id":"121","status":"0"},{"q_id":"32","ca_id":"114","status":"0"},{"q_id":"29","ca_id":"102","status":"1"},{"q_id":"31","ca_id":"108","status":"1"}]}]', 2, '2016-03-17 07:01:05', 2),
(2, 5, 'CA', 6, '[{"cate_id":"6","cate_data":[{"q_id":"32","ca_id":"114","status":"0"},{"q_id":"31","ca_id":"108","status":"0"},{"q_id":"30","ca_id":"105","status":"0"},{"q_id":"34","ca_id":"121","status":"1"},{"q_id":"29","ca_id":"102","status":"1"},{"q_id":"33","ca_id":"115","status":"1"}]}]', 2, '2016-03-17 08:46:09', 2),
(3, 5, 'CA', 6, '[{"cate_id":"6","cate_data":[{"q_id":"36","ca_id":"128","status":"0"},{"q_id":"29","ca_id":"99","status":"0"},{"q_id":"32","ca_id":"113","status":"0"},{"q_id":"31","ca_id":"107","status":"0"},{"q_id":"33","ca_id":"116","status":"0"},{"q_id":"40","ca_id":"146","status":"0"},{"q_id":"38","ca_id":"135","status":"1"},{"q_id":"34","ca_id":"119","status":"1"},{"q_id":"35","ca_id":"123","status":"1"},{"q_id":"39","ca_id":"141","status":"0"},{"q_id":"37","ca_id":"133","status":"0"}]}]', 2, '2016-09-17 02:42:16', 2),
(4, 5, 'CA', 6, '[{"cate_id":"6","cate_data":[{"q_id":"37","ca_id":"133","status":"0"},{"q_id":"38","ca_id":"135","status":"-"},{"q_id":"36","ca_id":"128","status":"-"},{"q_id":"35","ca_id":"123","status":"-"},{"q_id":"39","ca_id":"141","status":"-"},{"q_id":"34","ca_id":"119","status":"-"},{"q_id":"40","ca_id":"146","status":"-"},{"q_id":"32","ca_id":"113","status":"-"},{"q_id":"29","ca_id":"99","status":"-"},{"q_id":"33","ca_id":"116","status":"-"},{"q_id":"31","ca_id":"107","status":"-"}]}]', 1, '2016-09-21 18:42:03', 1),
(5, 5, 'CA', 10, '[{"cate_id":"10","cate_data":[]}]', 1, '2016-10-06 15:49:23', 1),
(6, 20, 'CA', 58, '[{"cate_id":"58","cate_data":[]}]', 2, '2016-11-06 20:18:44', 2),
(7, 22, 'CA', 62, '[{"cate_id":"62","cate_data":[{"q_id":"51","ca_id":"187","status":"0"},{"q_id":"47","ca_id":"173","status":"-"},{"q_id":"48","ca_id":"178","status":"-"},{"q_id":"43","ca_id":"155","status":"-"},{"q_id":"49","ca_id":"179","status":"-"},{"q_id":"53","ca_id":"195","status":"-"},{"q_id":"46","ca_id":"168","status":"-"},{"q_id":"50","ca_id":"184","status":"-"},{"q_id":"44","ca_id":"160","status":"-"},{"q_id":"52","ca_id":"193","status":"-"},{"q_id":"45","ca_id":"166","status":"-"}]}]', 1, '2016-11-18 20:52:27', 1),
(8, 23, 'CA', 8, '[{"cate_id":"8","cate_data":[{"q_id":"30","ca_id":"103","status":"-"}]}]', 1, '2016-11-20 20:21:41', 1),
(9, 5, 'CA', 62, '[{"cate_id":"62","cate_data":[{"q_id":"52","ca_id":"193","status":"-"},{"q_id":"47","ca_id":"173","status":"-"},{"q_id":"45","ca_id":"166","status":"-"},{"q_id":"53","ca_id":"195","status":"-"},{"q_id":"49","ca_id":"179","status":"-"},{"q_id":"48","ca_id":"178","status":"-"},{"q_id":"50","ca_id":"184","status":"-"},{"q_id":"44","ca_id":"160","status":"-"},{"q_id":"46","ca_id":"168","status":"-"},{"q_id":"43","ca_id":"155","status":"-"},{"q_id":"51","ca_id":"187","status":"-"}]}]', 1, '2017-03-02 13:46:45', 1),
(10, 5, 'CA', 8, '[{"cate_id":"8","cate_data":[{"q_id":"30","ca_id":"103","status":"-"}]}]', 1, '2017-05-10 14:22:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_types`
--

CREATE TABLE `test_types` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(12) NOT NULL,
  `quiz_id` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `total_questions` int(11) NOT NULL,
  `total_time` int(11) NOT NULL,
  `neg_marks` float NOT NULL,
  `questions_summery` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_types`
--

INSERT INTO `test_types` (`id`, `unique_id`, `quiz_id`, `created_by`, `name`, `description`, `total_questions`, `total_time`, `neg_marks`, `questions_summery`, `start_date`, `end_date`, `created`, `modified`, `status`) VALUES
(1, '', 0, 1, '', '', 4, 30, 0, '[{"cate_id":0,"cate_data":[{"q_id":"27","ca_id":"91","status":"-"},{"q_id":"28","ca_id":"95","status":"-"}]},{"cate_id":6,"cate_data":[{"q_id":"29","ca_id":"99","status":"-"}]},{"cate_id":8,"cate_data":[{"q_id":"30","ca_id":"103","status":"-"}]}]', '2016-04-19 19:10:30', '2016-05-19 19:10:30', '2016-04-19 13:40:30', '2016-04-19 19:10:30', 1),
(2, '', 0, 1, 'Computer General', 'Computer General - Bank Exam mock test - 10 Question', 10, 30, 0, '[{"cate_id":6,"cate_data":[{"q_id":"31","ca_id":"107","status":"-"},{"q_id":"32","ca_id":"113","status":"-"},{"q_id":"33","ca_id":"116","status":"-"},{"q_id":"34","ca_id":"119","status":"-"},{"q_id":"35","ca_id":"123","status":"-"},{"q_id":"36","ca_id":"128","status":"-"},{"q_id":"37","ca_id":"133","status":"-"},{"q_id":"38","ca_id":"135","status":"-"},{"q_id":"39","ca_id":"141","status":"-"},{"q_id":"40","ca_id":"146","status":"-"}]}]', '2016-09-16 11:50:55', '2016-10-16 11:50:55', '2016-09-16 18:50:55', '2016-09-16 11:50:55', 1),
(3, 'FREEXXOPIUN', 5, 1, 'test test', 'tt', 4, 30, 0, '[{"cate_id":6,"cate_data":[{"q_id":"65","ca_id":"246","status":"-"}]},{"cate_id":47,"cate_data":[{"q_id":"66","ca_id":"247","status":"-"},{"q_id":"67","ca_id":"253","status":"-"},{"q_id":"68","ca_id":"257","status":"-"}]}]', '2017-03-02 17:08:27', '2017-04-01 18:08:27', '2017-03-02 11:38:27', '2017-03-02 17:08:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1:Admin',
  `device_id` varchar(60) NOT NULL,
  `device_type` varchar(60) NOT NULL,
  `last_login` datetime NOT NULL,
  `verification_code` varchar(32) NOT NULL COMMENT 'verification_code for mail and forget password',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active, 2 = delete, 3 = panding'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `password`, `image`, `role`, `device_id`, `device_type`, `last_login`, `verification_code`, `created`, `modified`, `status`) VALUES
(1, 'admin', 'test admin', 'admin', 'admin@admin.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8 ', '', 1, '', '', '0000-00-00 00:00:00', '', '2014-12-29 00:00:00', '2014-12-29 00:00:00', 1),
(2, 'test', 'test', 'test', 'test@example.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '52148551', 'android', '2015-09-23 13:51:00', '', '2014-12-29 00:00:00', '2015-09-23 13:51:47', 2),
(5, 'dharmendra bagrecha', '', '', 'cgtdharm@gmail.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '52148551', 'android', '2017-05-10 19:51:41', '5decbd', '2015-09-23 15:04:23', '2017-05-10 19:51:41', 1),
(6, 'dharmtest1', 'Dharmendra', 'Bagrecha', 'dharmtest1@mailinator.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '', '', '0000-00-00 00:00:00', '81c310', '2016-03-12 13:29:35', '2016-03-12 18:59:35', 2),
(10, '', 'FindFastBusinessFund', 'FindFastBusinessFund', '@getbusinessfunded.com|fundingteam+cupcherry.com@probusinessfunding.com|fundingteam+cupcherry.com@ge', '6cd7e735f9ac36c19cf45c404f2dd14c018d6faf', '', 2, '', '', '0000-00-00 00:00:00', 'c056ae', '2016-09-10 14:35:25', '2016-09-10 07:35:25', 2),
(11, '', 'BusinessFunds365', 'BusinessFunds365', '@getbusinessfunded.com|fundingteam+cupcherry.com@probusinessfunding.com|fundingteam+cupcherry.com@ge', '6cd7e735f9ac36c19cf45c404f2dd14c018d6faf', '', 2, '', '', '0000-00-00 00:00:00', 'bdec51', '2016-09-24 17:48:08', '2016-09-24 10:48:08', 2),
(12, '', 'Get Business Funded', 'Get Business Funded', '@getbusinessfunded.com|fundingteam+cupcherry.com@findfastbusinessfunds.com|fundingteam+cupcherry.com', '6cd7e735f9ac36c19cf45c404f2dd14c018d6faf', '', 2, '', '', '0000-00-00 00:00:00', 'c446c0', '2016-10-01 08:11:25', '2016-10-01 01:11:25', 2),
(13, 'testarea09', 'Dexter', 'Wrok', 'testarea09@gmail.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '', '', '0000-00-00 00:00:00', '1e727c', '2016-10-03 22:25:38', '2016-10-03 15:25:38', 2),
(14, 'testarea09', 'Dexter', 'Wrok', 'testarea09@gmail.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '', '', '0000-00-00 00:00:00', '1b9a03', '2016-10-03 22:39:34', '2016-10-03 15:39:34', 2),
(15, 'testarea08', 'Dexter', 'Wrok', 'testarea08@mailinator.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '', '', '0000-00-00 00:00:00', '661d50', '2016-10-03 22:53:59', '2016-10-03 15:53:59', 2),
(16, 'ttestarea07', 'Dexter', 'Wrok', 'ttestarea07@maailinator.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '', '', '2016-10-04 03:29:44', 'a30766', '2016-10-04 10:20:26', '2016-10-04 03:29:44', 2),
(17, 'dkbakrecha', 'dharmendra', 'Test', 'dkbakrecha@gmail.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '', '', '0000-00-00 00:00:00', '0831eb', '2016-10-06 00:54:43', '2016-10-15 13:01:42', 1),
(18, 'veersinghrajput124', 'veer', 'singh', 'veersinghrajput124@gmail.com', '92ec6013f8a43f5d2b3b073352721b93937644d4', '', 2, '', '', '2016-10-06 10:52:14', '4dbb45', '2016-10-06 17:50:39', '2016-10-06 10:56:01', 1),
(19, 'fundingteam+cupcherry.com', 'FindFastBusinessFund', 'FindFastBusinessFund', 'fundingteam+cupcherry.com@findfastbusinessfunds.com', '6cd7e735f9ac36c19cf45c404f2dd14c018d6faf', '', 2, '', '', '0000-00-00 00:00:00', '9a3124', '2016-11-04 03:31:58', '2016-11-03 20:31:58', 2),
(20, 'manisha1995rythm', 'manisha', 'bhati', 'manisha1995rythm@gmail.com', '7b117f4d44f8a4114cdd358d11a5a0ab6178bc8c', '', 2, '', '', '2016-11-06 13:15:42', 'edf61c', '2016-11-06 20:15:26', '2016-11-06 17:20:28', 1),
(21, 'fundingteam+cupcherry.com', 'BusinessCapitalAdvis', 'BusinessCapitalAdvis', 'fundingteam+cupcherry.com@businesscapitaladvisor.com', '6cd7e735f9ac36c19cf45c404f2dd14c018d6faf', '', 2, '', '', '2016-12-16 09:54:34', '22b42a', '2016-11-15 20:16:13', '2016-12-16 09:54:34', 2),
(22, 'bherwani.sunny', 'Sunny', 'Bherwani', 'bherwani.sunny@gmail.com', 'ba3484c040fa3b991afdf3148989a27a1138e3a4', '', 2, '', '', '2016-11-18 13:52:01', '483c4e', '2016-11-18 20:50:46', '2016-11-18 13:52:01', 1),
(23, 'swethaganesh70', 'Swetha', 'Ganesh', 'swethaganesh70@gmail.com', '96f6e713560b304c37d23963d44ad532259aa332', '', 2, '', '', '2016-11-20 13:21:00', '71c62a', '2016-11-20 20:20:22', '2016-11-24 09:57:02', 1),
(24, 'fundingteam+cupcherry.com', 'BusinessLoansFunded', 'BusinessLoansFunded', 'fundingteam+cupcherry.com@businessloansfunded.com', '6cd7e735f9ac36c19cf45c404f2dd14c018d6faf', '', 2, '', '', '0000-00-00 00:00:00', '244c82', '2016-12-02 15:27:35', '2016-12-02 16:16:41', 2),
(25, 'fundingteam+cupcherry.com', 'GetBusinessFunded', 'GetBusinessFunded', 'fundingteam+cupcherry.com@getbusinessfunded.com', '6cd7e735f9ac36c19cf45c404f2dd14c018d6faf', '', 2, '', '', '2016-12-08 18:52:47', '6e5e40', '2016-12-09 01:52:46', '2016-12-08 18:52:47', 2),
(26, 'shivabtech94', 'shiva', 'krishna', 'shivabtech94@gmail.com', '01d5c4ffd49b1e50d36f90c9e7cafd918bce92df', '', 2, '', '', '2016-12-12 17:46:05', '90f6e6', '2016-12-13 00:45:45', '2016-12-20 05:19:11', 1),
(27, 'reachmegokul', 'Gokul ', 'Raju', 'reachmegokul@gmail.com', '2d62c73bfe2c6bf172b11a3b4c1f8125c86f4741', '', 2, '', '', '0000-00-00 00:00:00', '5b3b7c', '2016-12-19 20:35:40', '2016-12-20 05:19:12', 1),
(28, 'vyas.shashank.199p', 'shashank', 'vyas', 'vyas.shashank.199p@gmail.com', 'b1cbebbeef9f97e8814b5fbf51c6092534b5cbe8', '', 2, '', '', '0000-00-00 00:00:00', '024cd0', '2017-01-04 00:18:49', '2017-01-03 17:19:02', 1),
(29, 'swapnalipukale', 'swapnali', 'pukale', 'swapnalipukale@gmail.com', 'de6f5ac54e91845772dac57727ea0c29673e657f', '', 2, '', '', '0000-00-00 00:00:00', 'fbf32f', '2017-01-05 00:44:35', '2017-01-06 04:56:19', 1),
(30, 'rinkalvanzara30', 'Rinkal', 'Vanzara', 'rinkalvanzara30@gmail.com', '4e0d11c9c1dd327e93261fdd1af822fc28ae93a6', '', 2, '', '', '0000-00-00 00:00:00', '049e6e', '2017-01-22 01:00:20', '2017-01-22 08:43:09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_hits`
--
ALTER TABLE `blog_hits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_contents`
--
ALTER TABLE `email_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_logs`
--
ALTER TABLE `result_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_types`
--
ALTER TABLE `test_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_hits`
--
ALTER TABLE `blog_hits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `email_contents`
--
ALTER TABLE `email_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `result_logs`
--
ALTER TABLE `result_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `test_types`
--
ALTER TABLE `test_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
