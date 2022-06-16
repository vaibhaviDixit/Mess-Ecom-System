<?php
//connect with database
$con=mysqli_connect('localhost:3309','root','','mess_ecom');


// $con=mysqli_connect('localhost','id18854369_vaibhavi','M$(puS_[Y)!4?!2Q','id18854369_messecom');


// mysqli_query($con,'CREATE TABLE `admin` (
//   `id` int(3) NOT NULL AUTO_INCREMENT,
//   `name` varchar(80) NOT NULL,
//   `email` varchar(60) NOT NULL,
//   `password` varchar(30) NOT NULL,
//   `phone` varchar(30) NOT NULL,
//   `address` varchar(60) NOT NULL,
//   `fb` varchar(255) NOT NULL,
//   `insta` varchar(255) NOT NULL,
//   `whatsapp` varchar(255) NOT NULL,
//   `website` varchar(40) NOT NULL,PRIMARY KEY  (`id`)
// );');

// mysqli_query($con,'CREATE TABLE `cart` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `userId` int(11) NOT NULL,
//   `menuType` varchar(255) NOT NULL,
//   `menuId` int(11) NOT NULL,
//   `qty` int(11) NOT NULL,
//   `subtotal` int(11) NOT NULL,
//   `addedOn` timestamp NOT NULL DEFAULT current_timestamp(),PRIMARY KEY  (`id`)
// );');

// mysqli_query($con,'CREATE TABLE `category` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `name` varchar(40) NOT NULL,
//   `description` varchar(800) NOT NULL,
//   `status` int(11) NOT NULL,PRIMARY KEY  (`id`)
// );');

// mysqli_query($con,'CREATE TABLE `dailycate` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `name` varchar(255) NOT NULL,
//   `description` varchar(255) NOT NULL,
//   `status` int(11) NOT NULL,PRIMARY KEY  (`id`)
// ) ;');

// mysqli_query($con,'CREATE TABLE `dailyproducts` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `proName` varchar(255) NOT NULL,
//   `proDesc` varchar(255) NOT NULL,
//   `proPrice` int(11) NOT NULL,
//   `proCate` int(11) NOT NULL,
//   `proPhoto` varchar(255) NOT NULL,PRIMARY KEY  (`id`)
// );');

// mysqli_query($con,'CREATE TABLE `favourites` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `userId` int(11) NOT NULL,
//   `foodType` varchar(255) NOT NULL,
//   `foodId` int(11) NOT NULL,
//   `addedOn` timestamp NOT NULL DEFAULT current_timestamp(),PRIMARY KEY  (`id`)
// );');


// mysqli_query($con,'CREATE TABLE `meals` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `mealName` varchar(255) NOT NULL,
//   `mealDesc` varchar(255) NOT NULL,
//   `mealPrice` int(11) NOT NULL,
//   `mealSubscription` int(11) NOT NULL,
//   `mealType` varchar(255) NOT NULL,
//   `mealPhoto` varchar(255) NOT NULL,PRIMARY KEY  (`id`)
// );');

// mysqli_query($con,'CREATE TABLE `members` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `name` varchar(255) NOT NULL,
//   `phone` varchar(255) NOT NULL,
//   `address` varchar(255) NOT NULL,
//   `joinDate` date NOT NULL,
//   `subscription` varchar(255) NOT NULL,
//   `duration` varchar(255) NOT NULL,
//   `adhar` varchar(255) NOT NULL,
//   `pan` varchar(255) NOT NULL,
//   `photo` varchar(255) NOT NULL,
//   `totalAmount` int(11) NOT NULL,
//   `paidAmount` int(11) NOT NULL,
//   `leftAmount` int(11) NOT NULL,PRIMARY KEY  (`id`)
// );');


// mysqli_query($con,'CREATE TABLE `menu` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `category_id` int(11) NOT NULL,
//   `menuName` varchar(80) NOT NULL,
//   `menuDesc` varchar(255) NOT NULL,
//   `menuPrice` int(11) NOT NULL,
//   `menuPhoto` varchar(255) NOT NULL,
//   `status` int(11) NOT NULL,PRIMARY KEY  (`id`)
// );');


// mysqli_query($con,'CREATE TABLE `subscriptions` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `subscriptionName` varchar(100) NOT NULL,
//   `description` varchar(255) NOT NULL,
//   `15Days` int(11) NOT NULL,
//   `weekly` int(11) NOT NULL,
//   `monthly` int(11) NOT NULL,PRIMARY KEY  (`id`)
// );');


// mysqli_query($con,'CREATE TABLE `user` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `name` varchar(255) NOT NULL,
//   `email` varchar(255) NOT NULL,
//   `phone` varchar(255) NOT NULL,
//   `password` varchar(255) NOT NULL,
//   `addedOn` timestamp NOT NULL DEFAULT current_timestamp(),PRIMARY KEY  (`id`)
// );');

// mysqli_query($con,"INSERT INTO `admin` (`name`, `email`, `password`, `phone`, `address`, `fb`, `insta`, `whatsapp`, `website`) VALUES('Admin', 'admin@gmail.com', 'admin1234', '9285126522', 'Ahmadnagar','https://www.facebook.com/','https://www.instagram.com/instagram/','9284552192','https://www.google.com/');");



?>