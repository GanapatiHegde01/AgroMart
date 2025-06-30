-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 04:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agromart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `fname`, `lname`, `email`, `DOB`, `address`, `contact`, `password`) VALUES
(1, 'Ajay', 'N', 'ajay@gmail.com', '2000-01-01', 'K Narayanpura, Banglore', '1234567876', '$2y$10$/MxSmVFS/r.YZeIYe1RjoeaPys5gHR42Qyw0C6TBJm50VVg8uToZq'),
(2, 'Prem', 'Kumar', 'prem@gmail.com', '2004-05-04', 'Banglore', '9565654654', '$2y$10$WtwfCZvBvqphr3QvlBrx6e.G4K9yC2n6Uwu1wTV.V67CEDYdnXBXa');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `rid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `cid` int(255) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Eid` int(255) NOT NULL,
  `mc_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`rid`, `name`, `address`, `date`, `cid`, `contact`, `status`, `Eid`, `mc_id`, `quantity`, `total`) VALUES
(1, 'Ajay S', 'BDS Nagar, K. Narayanpura,Banglore 560071', '2024-08-01', 1, 9565654654, 'Shipped', 1, 1, 25, 2500),
(2, 'Prem', 'Banglre', '2024-08-02', 2, 9482154122, 'Delivered', 1, 3, 25, 2500),
(3, 'Ganapati Hegde', 'Banglore', '2024-08-07', 1, 9565654654, 'Accepted', 1, 1, 25, 2500),
(4, 'Ganapati', 'BDS Nagar,Banglore', '2024-08-08', 1, 1234567876, 'Accepted', 1, 1, 37, 3700);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(255) NOT NULL,
  `cid` int(255) NOT NULL,
  `t_code` int(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amt` int(255) NOT NULL,
  `rid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `cid`, `t_code`, `method`, `date`, `status`, `amt`, `rid`) VALUES
(1, 1, 27430, 'cod', '24-08-01', 'COD', 2500, 1),
(2, 2, 41702, 'cod', '24-08-02', 'COD', 2500, 2),
(3, 1, 12810, 'cod', '24-08-07', 'COD', 2500, 3),
(4, 1, 27078, 'cod', '24-08-08', 'COD', 3700, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `mc_id` int(255) NOT NULL,
  `mc_name` varchar(255) NOT NULL,
  `mc_description` varchar(1000) NOT NULL,
  `mc_image` varchar(255) NOT NULL,
  `Eid` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `mquantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`mc_id`, `mc_name`, `mc_description`, `mc_image`, `Eid`, `price`, `mquantity`) VALUES
(1, 'Tomato seeds', 'Our tomato seeds are carefully selected to produce vibrant, juicy tomatoes with rich flavor and high yield. Suitable for various climates, they promise robust growth and bountiful harvests.\r\n<br>\r\nBest season to grow is May-June\r\n\r\n', '52991tomato_seeds.jpg', 1, 100, 25),
(2, 'Brinjal', 'Our brinjal seeds yield robust plants producing tender, flavorful eggplants perfect for a variety of dishes. These seeds are optimized for high productivity and resilience in diverse growing conditions.', '21391brinjal.jpg', 1, 45, 20),
(3, 'Beetroot seeds', 'Our beetroot seeds are designed to produce sweet, tender beets with vibrant color and excellent texture. They ensure a hearty and nutritious harvest, thriving in a range of soil types.', '49637beetroot_seeds.jpg', 1, 100, 25),
(4, 'Cucumber seeds ', 'Our cucumber seeds produce crisp, refreshing cucumbers with a smooth texture and excellent flavor. They are ideal for both garden and container cultivation, yielding high-quality fruit.', '31010cucumber_seeds.png', 1, 70, 30),
(5, 'Strawberry Seeds', 'Strawberry seeds, available at AgroMart, are carefully selected for their high germination rate and ability to produce sweet, juicy berries. Ideal for both home gardeners and commercial growers, these seeds promise a bountiful strawberry harvest.\r\n', '20767strawberry.jpeg', 4, 120, 20),
(6, 'Farming Essential Tools', 'Farming essential basic tools include durable hand tools such as hoes, shovels, and rakes, designed for efficient soil cultivation and plant care. These fundamental tools are crucial for any farmer, providing reliability and ease in everyday agricultural tasks.', '73483basictoolkit.jpeg', 5, 9999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `Eid` int(255) NOT NULL,
  `Ename` varchar(255) NOT NULL,
  `Edescription` varchar(10000) NOT NULL,
  `Eimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Eid`, `Ename`, `Edescription`, `Eimage`) VALUES
(1, 'Vegitable seeds', 'Grow Fresh, Grow Healthy with Our Premium Vegetable Seeds.', '91349vegetables-pictures-qs8trfk65nvldcyr.jpg'),
(4, 'Fruit Seeds', 'Harvest the Sweetness with Our Premium Fruit Seeds.', '22208Fruits.jpg'),
(5, 'Tools', 'Revolutionizing Farming with Advanced Tools and Machinery.', '41192frontTools.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rateid` int(255) NOT NULL,
  `cid` int(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rateid`, `cid`, `rating`, `feedback`) VALUES
(1, 1, 4, 'As a satisfied customer of AgroMart, I am thrilled with the exceptional quality of their seeds and agricultural tools. Their products have significantly improved my harvest, and the user-friendly website makes shopping a breeze. I highly recommend AgroMar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`mc_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rateid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `rid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `mc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `Eid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rateid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
