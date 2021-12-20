-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 04:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(4) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `cpost` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `cpost`) VALUES
(1, 'Politics', 0),
(2, 'Sports', 4),
(3, 'International', 2),
(4, 'Technology', 2),
(5, 'Central', 0),
(6, 'Computer Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(5) NOT NULL,
  `p_title` varchar(50) NOT NULL,
  `p_description` longtext NOT NULL,
  `p_category` int(4) NOT NULL,
  `p_author` int(5) NOT NULL,
  `p_date` varchar(20) NOT NULL,
  `p_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_title`, `p_description`, `p_category`, `p_author`, `p_date`, `p_image`) VALUES
(1, 'My First Blog Site', 'Hello, I am Monir Hossain Sagor. This my the first blog website I have made. I am very excited about my blog website. I want to look at my blog website well developed.\r\n', 3, 9, '30 Oct, 21', '242542545_1520294894995135_9141198476848374167_n.jpg'),
(2, 'Thank You Yahoo Baba', 'Hello everyone I am Monir. I have built a blog site with PHP. I am very excited about my project. Yahoo  Baba YouTube channel helps me to build this website.\r\n\r\nThank you, Yahoo Baba.', 4, 9, '31 Oct, 21', 'afgashfs.png'),
(7, 'I will Be Your Web Developer', 'Hello, I am Monir. I am a web developer. I have already worked with some big websites. I can develop any kind of website for you. If you are interested, contact me.\r\nEmail: sagorhossain092@gmail.com\r\nPhone: +8801782031153', 6, 7, '01 Nov, 21', '247549717_627481185080591_7117216597588963772_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(7, 'Moin', 'Ahmed', 'moin123', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(9, 'Moin', 'Hossain', 'monir527', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(10, 'Sadia', 'Orin', 'orin563', '202cb962ac59075b964b07152d234b70', 1),
(11, 'Tain', 'Islam', 'tain12', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(12, 'Ahmed', 'Mehjabin', 'Mehjabin123', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
