-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2021 at 11:56 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gs_bookmark_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `bookname` varchar(64) NOT NULL,
  `bookurl` text NOT NULL,
  `bookcomment` text NOT NULL,
  `addtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookname`, `bookurl`, `bookcomment`, `addtime`) VALUES
(1, '新装版 竜馬がゆく (1)', 'https://www.amazon.co.jp/%E6%96%B0%E8%A3%85%E7%89%88-%E7%AB%9C%E9%A6%AC%E3%81%8C%E3%82%86%E3%81%8F-%E6%96%87%E6%98%A5%E6%96%87%E5%BA%AB-%E5%8F%B8%E9%A6%AC-%E9%81%BC%E5%A4%AA%E9%83%8E/dp/4167105675', 'おばあちゃん家で最初に読んだ本', '2021-04-01 08:45:25'),
(2, '新装版 竜馬がゆく (2)', 'https://www.amazon.co.jp/%E6%96%B0%E8%A3%85%E7%89%88-%E7%AB%9C%E9%A6%AC%E3%81%8C%E3%82%86%E3%81%8F-%E6%96%87%E6%98%A5%E6%96%87%E5%BA%AB-%E5%8F%B8%E9%A6%AC-%E9%81%BC%E5%A4%AA%E9%83%8E/dp/4167105683/ref=pd_bxgy_img_2/355-9110616-8127202?_encoding=UTF8&pd_rd_i=4167105683&pd_rd_r=2505fdb9-4264-41ba-bd7e-9baed7ee8644&pd_rd_w=0nyoF&pd_rd_wg=ZqeRH&pf_rd_p=e64b0a81-ca1b-4802-bd2c-a4b65bccc76e&pf_rd_r=TWG129QYH1WXNPMCF6Z9&psc=1&refRID=TWG129QYH1WXNPMCF6Z9', '続き', '2021-04-01 08:47:01'),
(3, 'ブラック・ジャック(1)', 'https://www.amazon.co.jp/%E3%83%96%E3%83%A9%E3%83%83%E3%82%AF%E3%83%BB%E3%82%B8%E3%83%A3%E3%83%83%E3%82%AF-1-%E6%89%8B%E5%A1%9A%E6%B2%BB%E8%99%AB%E6%BC%AB%E7%94%BB%E5%85%A8%E9%9B%86-%E6%89%8B%E5%A1%9A-%E6%B2%BB%E8%99%AB/dp/4061087517/ref=tmm_other_meta_binding_swatch_0?_encoding=UTF8&qid=1617234775&sr=1-3', '実家で初めて読んだ漫画でした', '2021-04-01 08:54:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;