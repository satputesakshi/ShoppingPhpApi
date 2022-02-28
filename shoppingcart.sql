-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 05:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `productId`, `quantity`, `total`, `shipping`, `userId`) VALUES
(1, 1, 3, 600, 50, 1),
(2, 3, 5, 0, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custId` int(11) NOT NULL,
  `custName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `custPswd` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `addLine1` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custId`, `custName`, `Email`, `custPswd`, `dob`, `addLine1`, `city`, `province`, `zip`, `country`) VALUES
(1, 'Sakshi Satpute', 's@gmail.com', 'admin123', '2012-02-22', 'lester st', 'waterloo', 'ontario', 'N2L0B5', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prodPrice` float DEFAULT NULL,
  `produrl` varchar(500) DEFAULT NULL,
  `prodDesc` varchar(500) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `prodName` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prodPrice`, `produrl`, `prodDesc`, `rate`, `type`, `prodName`) VALUES
(1, 100, 'https://images.solecollector.com/complex/images/c_crop,h_2921,w_5193,x_772,y_440/f_auto,fl_lossy,q_auto,w_1200/qsdrtn3exos5qn5zkvg8/air-jordan-1-chicago.jpg', 'Best red shoes', 4.2, 'Best Sellers', 'Jordans'),
(2, 500, 'https://images.complex.com/complex/images/c_scale,f_auto,q_auto,w_1920/fl_lossy,pg_1/wyoqedq3xcxshqijhhln/aor-jordan-1-high-retro-og-pollen-header?fimg-ssr-default', 'Best yellow shoes', 5, 'Best Sellers', 'Yellow Jordans'),
(3, 300, 'https://images.stockx.com/images/Air-Jordan-1-Retro-High-Black-White-W-Product.jpg?fit=fill&bg=FFFFFF&w=700&h=500&fm=webp&auto=compress&q=90&dpr=2&trim=color&updated_at=1606318078', 'Best black shoes in the market', 4, 'Best Sellers', 'Jet Black Jordans'),
(6, 200, 'https://hips.hearstapps.com/esq.h-cdn.co/assets/17/07/1487353380-jordan-1-shine.jpg', 'Trending sneakers', 4, 'Best Finds', 'Limited edition glow Jordan'),
(7, 200, 'https://media.architecturaldigest.com/photos/57a11cbeb6c434ab487bc26b/2:1/w_1077,h_538,c_limit/nikes-senior-designer-explains-what-went-into-new-air-jordan-01.png', 'Trending shoes for summer', 3, 'Best Finds', 'Fall Collection'),
(10, 100, 'https://sneakernews.com/wp-content/uploads/2021/12/air-jordan-1-mid-berry-black-white-5.jpg', 'Lovely pink shoes', 4, 'Best Finds', 'Pink world Jordans'),
(11, 200, 'https://images.unsplash.com/photo-1597843797221-e34b4a320b97?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c29ja3xlbnwwfHwwfHw%3D&w=1000&q=80', 'Comfortable socks', 4.3, 'Essentials', 'Plain socks'),
(12, 45, 'https://www.vhv.rs/dpng/d/422-4224033_socks-transparent-images-socks-transparent-background-hd-png.png', 'Comfy socks for everyday', 4, 'Essentials', 'Checkered Socks'),
(13, 22, 'https://www.kindpng.com/picc/m/369-3695669_stance-deadpool-socks-hd-png-download.png', 'Best finds', 4.5, 'Essentials', 'Football Socks'),
(14, 50, 'https://www.highsnobiety.com/static-assets/thumbor/wt0zfQ7ZOOSbMC2cNISN9EhIAXA=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2020/06/25142245/jordan-1-smoke-grey-main.jpg', 'Best red shoes', 4.2, '', 'Limited edition glow Jordan'),
(15, 50, 'https://www.highsnobiety.com/static-assets/thumbor/wt0zfQ7ZOOSbMC2cNISN9EhIAXA=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2020/06/25142245/jordan-1-smoke-grey-main.jpg', 'Best red shoes', 4.2, 'Best Finds', 'Limited edition glow Jordan'),
(16, 50, 'https://www.highsnobiety.com/static-assets/thumbor/wt0zfQ7ZOOSbMC2cNISN9EhIAXA=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2020/06/25142245/jordan-1-smoke-grey-main.jpg', 'Best red shoes', 4.2, 'Best Finds', 'Limited edition glow Jordan');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(11) NOT NULL,
  `custName` varchar(50) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewId`, `custName`, `rate`, `comment`, `productId`) VALUES
(1, 'Purva', 4, 'Love it', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
