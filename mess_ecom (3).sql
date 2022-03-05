-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 23, 2021 at 05:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `address`, `fb`, `insta`, `whatsapp`, `website`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin1234', '9285126522', '														      															      	Ahmadnagar								', 'https://www.facebook.com/', 'https://www.instagram.com/instagram/', '9284552192', 'https://www.google.com/');

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
(2, 1, 'menu', 3, 2, 0, '2021-10-12 11:12:55'),
(3, 1, 'meal', 6, 1, 0, '2021-10-12 11:19:24'),
(4, 1, 'meal', 7, 1, 0, '2021-10-13 04:19:07'),
(9, 2, 'meal', 4, 3, 435, '2021-10-15 15:29:53'),
(10, 2, 'daily', 3, 1, 200, '2021-10-16 16:21:05');

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
  `id` int(11) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proDesc` varchar(255) NOT NULL,
  `proPrice` int(11) NOT NULL,
  `proCate` int(11) NOT NULL,
  `proPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailyproducts`
--

INSERT INTO `dailyproducts` (`id`, `proName`, `proDesc`, `proPrice`, `proCate`, `proPhoto`) VALUES
(1, 'Gokul Milk', 'Fresh cow milk', 45, 1, '258806128_gokul.jpg'),
(2, 'Warana Shrikhand', 'Shrikhand with extra dry fruits', 170, 2, '411248991_warana.png'),
(3, 'Govind Shrikhand', 'semi soft, sweetish sour shrikhand', 200, 2, '484693192_shrikhand-250x250.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `foodType` varchar(255) NOT NULL,
  `foodId` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `mealName` varchar(255) NOT NULL,
  `mealDesc` varchar(255) NOT NULL,
  `mealPrice` int(11) NOT NULL,
  `mealSubscription` int(11) NOT NULL,
  `mealType` varchar(255) NOT NULL,
  `mealPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `mealName`, `mealDesc`, `mealPrice`, `mealSubscription`, `mealType`, `mealPhoto`) VALUES
(3, 'Sambar Idly', 'Idlies(Without Baking Soda or Fluffing agents)(3 pcs) + \r\nBreakfast Sambar (Best quality Dal, No flours or Thickening agents added)(250 gms) + Chutney(2 Types)(100 gms)', 60, 1, '6', '871477032_idli.jpg'),
(4, 'South Special Lunch', 'Pappu podi &amp; Gingely oil + Rice (400 gms) + Kootu (100 gms) + Poriyal (100gms) + Pappu of the day(Tomato Pappu or Keerai Pappu or Dosakai Pappu or Garlic Pappu) +  Vathakulambu (100 gms) + Rasam (100 gm) + Buttermilk (100 gms) +  Gongura Thokku + Swee', 145, 3, '7', '229373379_download (5).jpg'),
(5, 'Maharashtrain Thali', 'flat bread ( can be chapati, phulka, bhakri, ) or poori, a koshimbir ( salad), a chutney, a dry vegetable curry, papad, pickle and a sweet dish. Puranpoli ( stuffed sweet lentil flat bread)', 150, 2, '5', '454505388_download (4).jpg'),
(6, 'Sandwich', '4 Large Slices of Bread with Veg Stuffings', 30, 1, '6', '478078735_download (6).jpg'),
(7, 'Special Khichdi', 'Sabudana Khichdi(350 gm)\r\nChutney(2 Types)(100 gms)', 45, 2, '6', '513279844_images (6).jpg');

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
  `paidAmount` int(11) NOT NULL,
  `leftAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `address`, `joinDate`, `subscription`, `duration`, `adhar`, `pan`, `photo`, `totalAmount`, `paidAmount`, `leftAmount`) VALUES
(2, 'Sayali Mane', '9857512322', '							      Sangola						      							      							      ', '2021-10-04', '2', 'weekly', '', '', '', 1950, 0, 0),
(3, 'Swara kamble', '954545', 'Sangola', '2021-10-05', '1', 'monthly', 'NA', 'NA', 'NA', 5000, 0, 0),
(4, 'Sakshi kamble', '9412354', 'Solapur', '2021-10-06', '1', '15Days', 'NA', 'NA', 'NA', 500, 0, 0),
(5, 'Gauri Dighe', '9894422554', 'Sangola', '2021-10-05', '2', 'weekly', 'NA', 'NA', 'NA', 2500, 0, 0),
(6, 'Aditya Desai', '88942322', 'Pune', '2021-10-06', '2', '15Days', 'NA', 'NA', 'NA', 700, 0, 0),
(7, 'Rohan Babar', '9857113698', '							      Sangola							      ', '2021-10-05', '3', 'weekly', '774757590_adhar.jpg', '320010400_pan.jpg', 'NA', 3000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
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
(3, 7, 'roti', 'fresh roti', 20, '499601247_roti.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `subscriptionName` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `15Days` int(11) NOT NULL,
  `weekly` int(11) NOT NULL,
  `monthly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscriptionName`, `description`, `15Days`, `weekly`, `monthly`) VALUES
(1, 'Student', 'Breakfast- tea, sandwitch/pohe/upma/khichadi\r\nLunch- 2 roti,rice,dal ,dry sabji,sweet dish\r\nDinner- 2 roti,rice,curry,sabji,sweet dish,curd\r\n							      							      ', 500, 1000, 3000),
(2, 'Executive', 'Breakfast- tea/milk,dosa,sandwich,paratha\r\nLunch- 3 roti, white rice, masala rice, curry , 2 sabji, curd ,sweets\r\nDinner-3 roti, white rice,dal, curry , 2 sabji, curd ,sweets				      							      ', 3000, 1950, 5500),
(3, 'Classic', 'Breakfast- tea/milk,dosa,sandwich,paratha \r\nLunch- 4 roti, white rice, masala rice, curry , 3 sabji, curd ,sweets,salad\r\nDinner-4 roti, white rice,dal, curry , 3 sabji, curd ,sweets							      							      ', 4000, 2500, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `addedOn`) VALUES
(1, 'Vaibhavi', 'vaibhavi27@gmail.com', '9284552592', 'pass123', '2021-10-06 17:04:23'),
(2, 'Rashi Deshpande', 'rashi@gmail.com', '8767431102', '$2y$10$Wc0//iLygek7GkrbWD3Q9eoIj.evHLmki5C/C02ORktoSWN/AvoKG', '2021-10-15 06:31:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
