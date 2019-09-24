-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 05:30 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `password`, `foto`) VALUES
(4, 'Aziz Rahman Aji', 'armansukses17@gmail.com', '$2y$10$9pxNq2JI0yz3tBXODtc4pevaDM8V66B.ZMDrXZpclSIt1vagAEzQ6', 'asdsadsadsad.jpg'),
(14, 'asfaf', 'arman_3@ymail.com', '$2y$10$Mu9ubXPop9jxoin/JMLZt.P2qBqtvSXv4kv0Mz9Nv/aKvDcfe0ny.', 'theme-asli-bejo.png'),
(18, 'zxcxz', 'cxzczc', '$2y$10$eS0HnpigItyWzHUW0DTpFuuPAnRp1ttcOxq15F//tSn2ezGJt.Rrq', 'library.jpg'),
(22, 'wawawawaawkxjfsd', 'vsdvsdv@gmail.com', '$2y$10$hZ2PhNh5ZCK8t97c1r5Pr.VTyqVIw9/sj0IeIf6FAmg0bfNAxBhUC', '10007-red-flowers-on-a-tree-branch-pv.jpg'),
(26, 'lima kali seminggu', 'wkwkwkw', '$2y$10$RKP1WayalaCxMPrR8NcSMePGT/sqPV.1.P8RVPEYi5ZTRyJ/dDvhC', 'athletic-shoes-25493_960_720.png'),
(29, 'ffefe', 'yyyy', '$2y$10$QbeSTU2xi/vrlAX68ugNJuFDhfAwaGNwHm3astAgV/3oOn81W4mDu', 'c4f497772338464a5d4e4109966e02f7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
