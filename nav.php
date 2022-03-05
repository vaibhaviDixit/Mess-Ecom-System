<?php

session_start();
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');

//array of cart items
$cart_array=getFullCart();
$count=count($cart_array);

$fav_array=getFavourites();
$fav_count=count($fav_array);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH; ?>asset/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css/style.css">
    <link href="<?php echo SITE_PATH;?>dist/css/customAdmin.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

<!-- header section starts      -->

<header>

    <a href="<?php echo SITE_PATH; ?>" class="logo"><i class="fas fa-utensils"></i>mess</a>

    <nav class="navbar">
        <a class="active" href="<?php echo SITE_PATH; ?>">Home</a>
        <?php 

        if (!(strstr( $_SERVER['REQUEST_URI'], 'about' ) || strstr( $_SERVER['REQUEST_URI'], 'review' ))) {
        ?>
            <a href="#meals">Meals</a>
            <a href="#tiffins">Tiffins</a>
            <a href="#daily">Daily</a>
            <a href="#offers">Offers & Deals</a>
        <?php
            
        } ?>

        <a href="about" id="aboutNav">About</a>
        <a href="review" id="reviewNav">Reviews</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="<?php echo SITE_PATH; ?>favourites" class="fas fa-heart" style="position: relative;"><span id="favItems" class="count"><?php echo $fav_count; ?></span></a>
        <a href="<?php echo SITE_PATH; ?>cart" class="fas fa-shopping-cart cart-ico" style="position: relative;"><span id="cartItems" class="count"><?php echo $count; ?></span>
        </a>

        <?php 

            if(isset($_SESSION['CURRENT_USER'])){

                ?>

            
        <a class="fas fa-user user-icon" href="<?php echo SITE_PATH; ?>profile" ></a>
        <div class="userModal">
          <div class="card">
             <ul class="list-group list-group-flush">
              <li class="list-group-item">  <a href="<?php echo SITE_PATH; ?>profile"> Profile</a></li>
              <li class="list-group-item"> <a href="<?php echo SITE_PATH; ?>logout"> Logout</a></li>
            </ul>

          </div>
        </div>

  
        <?php
            }
            else{
                ?>
                <a href="<?php echo SITE_PATH; ?>login" class="fas fa-sign-in-alt"> </a>
        <?php
            }

        ?>

        


    </div>

</header>





<div class="alert alert-success w-20 successMsg" id="addToCartSuccess" role="alert" >
<i class="fas fa-check-circle green-tick"></i>Added to cart successfully!
</div>

<div class="alert alert-success w-20 successMsg" id="addToFavSuccess" role="alert" >
<i class="fas fa-check-circle green-tick"></i>Added to Favourites successfully!
</div>


<!-- header section ends-->

<!-- search form  -->

<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

<!-- home section starts  -->

