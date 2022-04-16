-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Apr 16, 2022 at 06:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `name` varchar(80) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `website` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `profile`, `email`, `password`, `phone`, `address`, `fb`, `insta`, `whatsapp`, `website`) VALUES
(1, 'Admin21', '152877641_dm.jpg', 'admin@gmail.com', 'admin1234', '9285126522', '														      															      	Ahmadnagar								', 'https://www.facebook.com/', 'https://www.instagram.com/instagram/', '9284552192', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `name`, `description`) VALUES
(1, '528498553_istockphoto-481149282-612x612.jpg', 4, 'The curries are thick and sweet and sour and are served with steamed rice.'),
(2, '847435207_istockphoto-1266098597-1024x1024.jpg', 5, 'Authentic maharashtrian thali.'),
(3, '935176208_khich.jpg', 7, 'Healthy and classic Indian dish made with rice and yellow mung lentils.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `menuType` varchar(255) NOT NULL,
  `menuId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `menuType`, `menuId`, `qty`, `subtotal`, `addedOn`) VALUES
(9, 2, 'meal', 4, 3, 435, '2021-10-15 15:29:53'),
(10, 2, 'daily', 3, 1, 200, '2021-10-16 16:21:05'),
(15, 2, 'daily', 1, 2, 90, '2022-01-06 05:10:45'),
(17, 2, 'meal', 6, 2, 60, '2022-01-07 13:02:49'),
(29, 1, 'meal', 3, 1, 60, '2022-01-11 14:15:31'),
(30, 1, 'meal', 7, 1, 45, '2022-01-11 14:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(800) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`) VALUES
(5, 'Dinner', 'Here you get  rice, bhaji, curd, sweets for dinner.                        ', 1),
(6, 'Breakfast', 'Here you get idli, pohe, upma, paratha, oats, tea, coffee etc... ', 1),
(7, 'Lunch', '   Here you get rice, curry, bhaji, roti, dal tadka etc.. ', 1),
(8, 'Snacks', '  ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dailycate`
--

CREATE TABLE `dailycate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailycate`
--

INSERT INTO `dailycate` (`id`, `name`, `description`, `status`) VALUES
(1, 'Milk', 'Gokul Milk, Prabhat milk, cow/buffalo milk', 1),
(2, 'Shrikhand', '  ', 1),
(3, 'Cheese', '  ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dailyproducts`
--

CREATE TABLE `dailyproducts` (
  `id` bigint(20) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proDesc` varchar(255) NOT NULL,
  `proPrice` int(11) NOT NULL,
  `proCate` int(11) NOT NULL,
  `proPhoto` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailyproducts`
--

INSERT INTO `dailyproducts` (`id`, `proName`, `proDesc`, `proPrice`, `proCate`, `proPhoto`, `status`) VALUES
(1, 'Gokul Milk', 'Fresh cow milk', 45, 1, '258806128_gokul.jpg', 1),
(2, 'Warana Shrikhand', 'Shrikhand with extra dry fruits', 170, 2, '411248991_warana.png', 1),
(3, 'Govind Shrikhand', 'semi soft, sweetish sour shrikhand', 200, 2, '484693192_shrikhand-250x250.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `foodType` varchar(255) NOT NULL,
  `foodId` bigint(20) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `userId`, `foodType`, `foodId`, `addedOn`) VALUES
(1, 2, 'meal', 4, '2021-10-15 09:23:34'),
(2, 2, 'menu', 3, '2021-10-15 09:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) NOT NULL,
  `mealName` varchar(255) NOT NULL,
  `mealDesc` varchar(255) NOT NULL,
  `mealPrice` int(11) NOT NULL,
  `mealSubscription` int(11) NOT NULL,
  `mealType` varchar(255) NOT NULL,
  `mealPhoto` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `mealName`, `mealDesc`, `mealPrice`, `mealSubscription`, `mealType`, `mealPhoto`, `status`) VALUES
(3, 'Sambar Idly', 'Idlies(Without Baking Soda or Fluffing agents)(3 pcs) + \r\nBreakfast Sambar (Best quality Dal, No flours or Thickening agents added)(250 gms) + Chutney(2 Types)(100 gms)', 60, 1, '6', '871477032_idli.jpg', 1),
(4, 'South Special Lunch', 'Pappu podi &amp; Gingely oil + Rice (400 gms) + Kootu (100 gms) + Poriyal (100gms) + Pappu of the day(Tomato Pappu or Keerai Pappu or Dosakai Pappu or Garlic Pappu) +  Vathakulambu (100 gms) + Rasam (100 gm) + Buttermilk (100 gms) +  Gongura Thokku + Swee', 145, 3, '7', '229373379_download (5).jpg', 1),
(5, 'Maharashtrain Thali', 'flat bread ( can be chapati, phulka, bhakri, ) or poori, a koshimbir ( salad), a chutney, a dry vegetable curry, papad, pickle and a sweet dish. Puranpoli ( stuffed sweet lentil flat bread)', 150, 2, '5', '454505388_download (4).jpg', 1),
(6, 'Sandwich', '4 Large Slices of Bread with Veg Stuffings', 30, 1, '6', '478078735_download (6).jpg', 1),
(7, 'Special Khichdi', 'Sabudana Khichdi(350 gm)\r\nChutney(2 Types)(100 gms)', 45, 2, '6', '513279844_images (6).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `joinDate` date NOT NULL,
  `subscription` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `adhar` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `paidAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `address`, `joinDate`, `subscription`, `duration`, `adhar`, `pan`, `photo`, `totalAmount`, `paidAmount`) VALUES
(2, 'Sayali Mane', '9857512322', '							      Sangola						      							      							      ', '2021-10-04', '2', 'weekly', '', '', '', 1950, 1900),
(3, 'Swara kamble', '954545', 'Sangola', '2021-10-05', '1', 'monthly', 'NA', 'NA', 'NA', 5000, 0),
(4, 'Sakshi kamble', '9412354', 'Solapur', '2021-10-06', '1', '15Days', 'NA', 'NA', 'NA', 500, 400),
(5, 'Gauri Dighe', '9894422554', 'Sangola', '2021-10-05', '2', 'weekly', 'NA', 'NA', 'NA', 2500, 1500),
(6, 'Aditya Desai', '88942322', 'Pune', '2021-10-06', '2', '15Days', 'NA', 'NA', 'NA', 700, 500),
(7, 'Rakesh Babar', '9857113698', '							      							      Sangola							      							      ', '2021-10-05', '3', 'weekly', '774757590_adhar.jpg', '320010400_pan.jpg', 'NA', 2500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `menuName` varchar(80) NOT NULL,
  `menuDesc` varchar(255) NOT NULL,
  `menuPrice` int(11) NOT NULL,
  `menuPhoto` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category_id`, `menuName`, `menuDesc`, `menuPrice`, `menuPhoto`, `status`) VALUES
(3, 7, 'roti', 'fresh roti', 20, '499601247_roti.jpg', 1),
(5, 7, 'Rice', 'Soft rice...', 40, '507419027_bhat.jpg', 1),
(6, 7, 'Sambhar', 'Thick gravy made with lentils, mixed vegetables, tamarind, herbs', 45, '166518536_sambhar.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offlineorders`
--

CREATE TABLE `offlineorders` (
  `id` bigint(20) NOT NULL,
  `orderId` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `remain` int(11) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offlineorders`
--

INSERT INTO `offlineorders` (`id`, `orderId`, `name`, `phone`, `address`, `payment_type`, `total`, `order_status`, `paid`, `remain`, `addedOn`) VALUES
(1, '#134497', 'Vaibhavi Dixit', '8767431102', 'Sangola							      							      ', 'Cash', 50, 1, 20, 30, '2022-03-24 20:38:17'),
(2, 'Order_135307', 'VaibhaviD', '9284552192', '							      			Satara				      ', 'Cash', 10, 1, 10, 0, '2022-03-24 20:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `offorderdetails`
--

CREATE TABLE `offorderdetails` (
  `id` bigint(20) NOT NULL,
  `orderId` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offorderdetails`
--

INSERT INTO `offorderdetails` (`id`, `orderId`, `name`, `qty`, `rate`, `total`) VALUES
(1, '#134497', 'Roti', 1, 50, 50),
(2, 'Order_135307', 'Roti', 1, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `onlinemembers`
--

CREATE TABLE `onlinemembers` (
  `id` int(11) NOT NULL,
  `orderId` text NOT NULL,
  `uid` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subName` varchar(100) NOT NULL,
  `subDuration` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `adhar` varchar(250) NOT NULL,
  `pan` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `joinDate` date NOT NULL DEFAULT current_timestamp(),
  `paymentId` text NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `onlinemembers`
--

INSERT INTO `onlinemembers` (`id`, `orderId`, `uid`, `phone`, `address`, `subName`, `subDuration`, `price`, `adhar`, `pan`, `photo`, `joinDate`, `paymentId`, `paymentStatus`, `status`) VALUES
(1, 'MessEcom3746_3', 3, '9284552192', 'Kumbhar Galli, Sangola', 'Classic', 'monthly', 7500, 'NA', 'NA', 'NA', '2021-01-01', '20220101111212800110168502503306686', 'success', 0),
(7, 'MessEcom9640_3', 3, '9284552192', 'ok', 'Student', 'monthly', 3000, 'NA', 'NA', 'NA', '2022-01-05', '', 'pending', 0),
(8, 'MESSECOM9407_3', 3, '9284552192', 'Sangola', 'Student', '15Days', 500, 'NA', 'NA', '468515368_ALIBAG.jpg', '2022-01-12', '20220112111212800110168665103353053', 'success', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `orderId` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(30) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `uid`, `orderId`, `product_id`, `product_type`, `product_qty`, `price`, `addedOn`) VALUES
(1, 1, 'MESSORDER1641575744_1', 6, 'meal', 1, 30, '2022-01-07 22:45:45'),
(2, 1, 'MESSORDER1641575744_1', 3, 'daily', 2, 400, '2022-01-07 22:45:45'),
(3, 3, 'MESSORDER1641988476_3', 6, 'meal', 1, 30, '2022-01-12 17:24:37'),
(4, 3, 'MESSORDER1641988476_3', 1, 'daily', 3, 135, '2022-01-12 17:24:37'),
(5, 3, 'MESSORDER1641988476_3', 3, 'daily', 4, 800, '2022-01-12 17:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderId` text NOT NULL,
  `userId` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `addedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderId`, `userId`, `phone`, `address`, `pincode`, `payment_type`, `total`, `order_status`, `payment_status`, `addedOn`) VALUES
(1, 'MESSORDER1641575744_1', 1, '9284552192', 'Vasud Road Sangola', 413307, 'online', 430, 3, 'success', '2022-01-07 22:45:45'),
(2, 'MESSORDER1641988476_3', 3, '9284552192', 'Kumbhar Galli Sangola', 413307, 'online', 965, 2, 'success', '2022-01-12 17:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `stars` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userId`, `description`, `stars`) VALUES
(2, 3, 'Good Food Service..Satisfied and more likely to become regular customer.', 4),
(3, 3, 'I liked your Fresh and healthy food service.', 4),
(4, 2, 'Excellent food. Menu is extensive and seasonal to a particularly high standard. Definitely fine dining. It can be expensive but worth it and they do different deals on different nights so it’s worth checking them out before you book. Highly recommended.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `subscriptionName` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `15Days` int(11) NOT NULL,
  `weekly` int(11) NOT NULL,
  `monthly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscriptionName`, `description`, `15Days`, `weekly`, `monthly`) VALUES
(1, 'Student', '<p><span style=\"font-size:16px\"><strong>Breakfast</strong>- tea, sandwitch/pohe/upma/khichadi</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Lunch</strong>- 2 roti,rice,dal ,dry sabji,sweet dish</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Dinner</strong>- 2 roti,rice,curry,sabji,sweet dish,curd</span></p>\r\n', 500, 1000, 3000),
(2, 'Executive', 'Breakfast- tea/milk,dosa,sandwich,paratha\r\nLunch- 3 roti, white rice, masala rice, curry , 2 sabji, curd ,sweets\r\nDinner-3 roti, white rice,dal, curry , 2 sabji, curd ,sweets				      							      ', 3000, 1950, 5500),
(3, 'Classic', 'Breakfast- tea/milk,dosa,sandwich,paratha \r\nLunch- 4 roti, white rice, masala rice, curry , 3 sabji, curd ,sweets,salad\r\nDinner-4 roti, white rice,dal, curry , 3 sabji, curd ,sweets							      							      ', 4000, 2500, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `profile`, `address`, `email`, `phone`, `addedOn`) VALUES
(1, 'Vaibhavi Dixit', '409602850_sp2.jpg', '', 'vaibhavi2003@gmail.com', '9284552192', '2021-10-06 17:04:23'),
(2, 'Rashi Deshpande', 'defaultprofile.jpg', '', 'rashi@gmail.com', '8767431102', '2021-10-15 06:31:20'),
(3, '40ᴠᴀɪʙʜᴀᴠɪ ᴅɪxɪᴛ', 'https://lh3.googleusercontent.com/a-/AOh14Gi70rfAXTd9N6geCFXu-xdJB-fbulBc_UoBf-eSZA=s96-c', '', 'vaibhavidixit511@gmail.com', '', '2021-12-30 12:36:58'),
(4, 'SayaliDixit', 'https://lh3.googleusercontent.com/a/AATXAJw9tTAJPrvtwY79ik09u7xpwRsqak_89GqVVGvv=s96-c', '', 'dixitsayali184@gmail.com', '', '2022-02-03 14:39:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailycate`
--
ALTER TABLE `dailycate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyproducts`
--
ALTER TABLE `dailyproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offlineorders`
--
ALTER TABLE `offlineorders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`);

--
-- Indexes for table `offorderdetails`
--
ALTER TABLE `offorderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offorderdetails_ibfk_1` (`orderId`);

--
-- Indexes for table `onlinemembers`
--
ALTER TABLE `onlinemembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`) USING HASH;

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dailycate`
--
ALTER TABLE `dailycate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dailyproducts`
--
ALTER TABLE `dailyproducts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offlineorders`
--
ALTER TABLE `offlineorders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offorderdetails`
--
ALTER TABLE `offorderdetails`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `onlinemembers`
--
ALTER TABLE `onlinemembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offorderdetails`
--
ALTER TABLE `offorderdetails`
  ADD CONSTRAINT `offorderdetails_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `offlineorders` (`orderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
