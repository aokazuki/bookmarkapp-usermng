-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2021 at 02:49 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gs_bookmark_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `indate`) VALUES
(1, 'あおやまてすと', 'aoyama', 'test', 0, 0, '2021-04-08 23:08:30'),
(3, 'ささささ', 'あああああ', 'ｓｓｓｓｓ', 0, 0, '2021-04-08 23:07:24'),
(4, 'KAZUKI AOYAMA', 'test1', 'test1', 1, 0, '2021-04-15 23:28:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;