-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 04:32 PM
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
-- Database: `ecommerce_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` varchar(5) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `type`, `description`, `image`, `quantity`) VALUES
(30, 'lorem', 'watch', '40.00', 'Men', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolores, fugit exercitationem', 'watch-2.png', 5),
(31, 'watch 2', 'watch', '40.00', 'Women', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolores, fugit exercitationem', 'watch-6.png', 5),
(32, 'lorem', 'watch', '30.00', 'Women', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolores, fugit exercitationem', 'watch-7.png', 5),
(43, 'blue shoe', 'shoe', '55', 'Men', 'sd ssdd sd sdf afa sd s d', 'shoe-2.png', 8),
(44, 'shoe eze', 'shoe', '555', 'Men', 'sd dssd ds dsdds sd ds sddsd ssd', 'shoe-3.png', 88),
(45, 'pjrdss', 'shirt', '423', 'Women', 'ds dsa ads sd s ds', 'shirt-3.png', 6),
(46, 'new T-shirt', 'T-shirt', '67', 'Men', 'dsdsd asdsf sdfsdfd sds aasd dssd', 'orange-tshirt.png', 5),
(47, 'shirt', 'T-shirt', '78', 'Men', 'a pink T-whirt for men', 'pink-tshirt.png', 8),
(48, 'shirt', 'T-shirt', '70', 'Men', 'lorem lorem lorem lorem lorem', 'red-tshirt.png', 3),
(49, 'shirt', 'T-shirt', '80.40', 'Women', ' a purple t-shirt for women', 'purple-tshirt.png', 9),
(50, 'shirt', 'shirt', '54', 'Women', 'sd adss dsd sad afdas sdf  cvxvh  fd fdf ', 'shirt-2.png', 34),
(51, 'Black shirt', 'shirt', '60', 'Men', 'dsd s dad sdf sdf sd axcv dsdfweqewr e', 'shirt-1.png', 31),
(52, 'black shirt', 'shirt', '36', 'Men', 'asd sda dfaewrrqweewtt ererer ', 'shirt-4.png', 21),
(53, 'shoe', 'shoe', '34', 'Men', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'shoe-1.png', 14),
(55, 'shoe', 'shoe', '68', 'Women', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'shoe-3.png', 15),
(56, 'shoe', 'shoe', '55', 'Men', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'shoe-2.png', 8),
(57, 'shoe', 'shoe', '65', 'Women', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'shoe-4.png', 71),
(58, 'watch', 'watch', '64', 'Men', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'watch-3.png', 17),
(59, 'sunglass 1', 'sunglass', '15', 'Men', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sunglass-1.png', 12),
(60, 'sunglass 2', 'sunglass', '12', 'Women', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sunglass-2.png', 11),
(61, 'sunglass 3', 'sunglass', '14', 'Men', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sunglass-3.png', 13),
(62, 'sunglass 4', 'sunglass', '11', 'Men', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sunglass-4.png', 15),
(63, 'bagpack 1', 'bagpack', '51', 'Men', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'bagpacks-1.png', 51),
(64, 'bagpack 2', 'bagpack', '56', 'Men', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'bagpacks-2.png', 41),
(65, 'bagpack 3', 'bagpack', '31', 'Women', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'bagpacks-3.png', 12),
(66, 'bagpack 4', 'bagpack', '65', 'Women', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'bagpacks-4.png', 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `utype` varchar(3) NOT NULL DEFAULT 'USR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`, `gender`, `utype`) VALUES
(1, 'admin', 'admin@site.com', '0543123454', '$2y$10$wOkX9ldKBcrjtWfhhuKJzO3KxmnOCkFpYvXFPGOcb/tSjDB7v2UnG', 'Male', 'ADM'),
(2, 'user1', 'user1@a.com', '0543123459', '$2y$10$C5tye/PaEVSyWoyiLZYANea7F/EsHuSlu426MLi31xjANrG64.c2G', 'Female', 'USR'),
(4, 'mixer', 'user2@user.com', '1234556789', '$2y$10$vQ/q3Ugy5/7OIATCvvYpk.leJebq63DOkECeJjgqexP3jT/JERCUe', 'F', 'USR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
