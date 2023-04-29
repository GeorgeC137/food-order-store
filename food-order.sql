-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 02:50 PM
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
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'Rick', 'ricky', 'e1d082b315044791533d401296f6c01f');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Pizza', 'Food_Category_790.jpg', 'No', 'Yes'),
(5, 'Burger', 'Food_Category_344.jpg', 'No', 'Yes'),
(6, 'MoMo', 'Food_Category_77.jpg', 'No', 'Yes'),
(8, 'Rice', 'Food_Category_816.jpg', 'Yes', 'Yes'),
(9, 'Chapati', 'Food_Category_813.jpg', 'Yes', 'Yes'),
(10, 'Ugali', 'Food_Category_421.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(3, 'Dumplings Specials', 'Chicken Dumpling with herbs from Mountains', '499.00', 'Food-Name-3649.jpg', 6, 'Yes', 'Yes'),
(4, 'Best Burger', 'Burger with Ham, Pineapple and lots of Cheese.', '345.00', 'Food-Name-6340.jpg', 5, 'Yes', 'Yes'),
(5, 'Smoky BBQ Pizza', 'Best Firewood Pizza in Town.', '599.00', 'Food-Name-8298.jpg', 5, 'No', 'Yes'),
(6, 'Sadeko Momo', 'Best Spicy Momo for Winter', '245.00', 'Food-Name-7387.jpg', 6, 'Yes', 'Yes'),
(7, 'Mixed Pizza', 'Pizza with chicken, Ham, Buff, Mushroom and Vegetables', '674.00', 'Food-Name-7833.jpg', 5, 'Yes', 'Yes'),
(8, 'Ugali/Pork', 'Enjoy wet fried pork served with hot white ugali and sukumawiki', '150.00', 'Food-Name-835.jpg', 10, 'Yes', 'Yes'),
(9, 'Ugali/Fried Fish', 'Enjoy white ugali served with deep fried tilapia', '200.00', 'Food-Name-9411.jpg', 10, 'Yes', 'Yes'),
(10, 'Ugali/Grilled Meat', 'Grilled goat meat served with white ugali', '300.00', 'Food-Name-1129.jpg', 10, 'Yes', 'Yes'),
(11, 'Ugali/Wet Fried Fish', 'Enjoy white ugali served with wet fried fish and spinach', '400.00', 'Food-Name-8513.jpg', 10, 'Yes', 'Yes'),
(12, 'Chapati/Green Peas Curry', 'Chapati served with green peas masala curry', '100.00', 'Food-Name-2694.jpg', 9, 'Yes', 'Yes'),
(13, 'Chapati/Beef ', 'Enjoy wet fried beef served with chapati', '350.00', 'Food-Name-4395.jpg', 9, 'Yes', 'Yes'),
(14, 'Chapati/Chicken', 'Chapati served with wet fried chicken', '370.00', 'Food-Name-3136.jpg', 9, 'Yes', 'Yes'),
(15, 'Beef/Pilau', 'Enjoy the best beef pilau in town', '350.00', 'Food-Name-7755.jpg', 8, 'Yes', 'Yes'),
(16, 'Chicken/Pilau', 'Delicious chicken pilau', '450.00', 'Food-Name-6552.jpg', 8, 'Yes', 'Yes'),
(17, 'Rice/Peas', 'Rice mixed with brown peas', '150.00', 'Food-Name-2411.jpg', 8, 'Yes', 'Yes'),
(18, 'Rice/Fried Chicken', 'Enjoy rice with deep fried chicken', '325.00', 'Food-Name-8990.jpg', 8, 'Yes', 'Yes'),
(19, 'Rice/Beef', 'Rice served with beef', '235.00', 'Food-Name-6139.jpg', 8, 'Yes', 'Yes'),
(20, 'Rice/Fried Eggs', 'Enjoy rice mixed with fried eggs', '135.00', 'Food-Name-2860.jpg', 8, 'Yes', 'Yes'),
(21, 'Rice/Ground Beef', 'Enjoy rice served with ground beef', '335.00', 'Food-Name-3605.jpg', 8, 'Yes', 'Yes'),
(22, 'Rice/Chicken Wet Fry', 'Enjoy rice served with wet fried chicken and sukumawiki', '425.00', 'Food-Name-8226.jpg', 8, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(6, 'Chapati/Chicken', '370.00', 3, '1110.00', '2023-03-21 08:51:59', 'Delivered', 'Winnie Cooks', '254709561795', 'winnie@gmail.com', 'Njokerio, Egerton'),
(7, 'Chapati/Green Peas Curry', '100.00', 4, '400.00', '2023-03-21 09:37:07', 'Ordered', 'Slyvia Mathers', '254769837693', 'slyvia@gmail.com', 'CBD Hostels, Egerton'),
(8, 'Ugali/Wet Fried Fish', '400.00', 5, '2000.00', '2023-03-21 09:44:04', 'Cancelled', 'Daisy Luther', '0745367856', 'daisy@gmail.com', 'Tatton Hostels, Egerton'),
(9, 'Ugali/Grilled Meat', '300.00', 2, '600.00', '2023-03-21 09:52:16', 'Delivered', 'Fred Gregory', '0791657125', 'fred@gmail.com', 'Buruburu Hostels, Egerton'),
(10, 'Chapati/Beef ', '350.00', 2, '700.00', '2023-03-21 10:08:26', 'Ordered', 'Jack Bauer', '0791657126', 'jack@gmail.com', 'Njoro, Nakuru'),
(11, 'Chicken/Pilau', '450.00', 1, '450.00', '2023-03-23 11:13:38', 'On Delivery', 'Hashira Kamado', '076545546354', 'hashira@gmail.com', 'Mid Way, Egerton'),
(13, 'Chicken/Pilau', '450.00', 1, '450.00', '2023-04-04 04:24:27', 'Delivered', 'Slyvia Wesley', '254791657126', 'sly@gmail.com', 'Njoro town, Nakuru'),
(14, 'Sadeko Momo', '245.00', 2, '490.00', '2023-04-04 04:55:13', 'Delivered', 'Jeffrey Simons', '254769837693', 'jeff@gmail.com', 'Ahero, Egerton'),
(20, 'Beef/Pilau', '350.00', 2, '700.00', '2023-04-24 07:17:27', 'On Delivery', 'Pinky Smith', '254769837693', 'pinky@gmail.com', 'Kenyatta Ave, Nairobi'),
(25, 'Ugali/Pork', '150.00', 1, '150.00', '2023-04-24 02:40:06', 'Ordered', 'Jeffery Smith', '254769837693', 'jeffery@gmail.com', 'Moi Ave, Nakuru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_id`, `user_name`, `password`, `time`) VALUES
(2, 2147483647, 'Fred', '570a90bfbf8c7eab5dc5d4e26832d5b1', '2023-03-06 11:57:11'),
(14, 44349, 'Jack', '7b9e7c06ce67136bc0b4d76cd54516dc', '2023-03-07 15:28:32'),
(17, 2463, 'Winnie', 'bc784c31b84f08bfc536b49d784cf315', '2023-03-09 10:00:48'),
(18, 6697, 'Daisy', 'cef0dad5911aba94ca334875736fdc38', '2023-03-09 10:04:55'),
(19, 7822, 'Slyvia', 'cb583171d54dc569e7dbe4942480ac18', '2023-03-21 08:31:35'),
(21, 2147483647, 'Maggie', '2792e5ca6223ee68458bf8f2113b3e67', '2023-03-26 19:55:19'),
(29, 835846, 'Simon', 'eed8cdc400dfd4ec85dff70a170066b7', '2023-04-05 09:45:49'),
(30, 1825895543, 'David', '338d811d532553557ca33be45b6bde55', '2023-04-24 04:25:22'),
(36, 56567, 'Pinky', 'fc96fe0bf8a62a2d178f0df5bbbe4d78', '2023-04-24 04:24:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
