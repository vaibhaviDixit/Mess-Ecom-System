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
    <title translate="no"><?php echo SITE_NAME; ?></title>

    <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css/aos.css" />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_PATH; ?>asset/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css/style.css">
    <link href="<?php echo SITE_PATH;?>dist/css/customAdmin.css" rel="stylesheet" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>


    <!-- owl carousel links -->
    <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/js/owl/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/js/owl/owl.theme.default.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>asset/js/swiper-bundle.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>asset/js/sweetalert.min.js"></script>
   


</head>
<body>

<!-- header section starts      -->
  <!--language translator -->

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<header class="navigationArea">

    <a href="<?php echo SITE_PATH; ?>" class="logo" translate="no"><i class="fas fa-utensils"></i><?php echo SITE_NAME; ?></a>

    <nav class="navbar">
        <a class="active" href="<?php echo SITE_PATH; ?>">Home</a>
       
            <a href="<?php echo SITE_PATH; ?>#meals">Meals</a>
            <a href="<?php echo SITE_PATH; ?>#tiffins">Tiffins</a>
            <a href="<?php echo SITE_PATH; ?>#daily">Daily</a>
            <a href="<?php echo SITE_PATH; ?>#offers">Offers & Deals</a>
    

        <a href="about" id="aboutNav">About</a>
        <a href="review" id="reviewNav">Reviews</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars circle_icon" id="menu-bars"></i>

        <i class="fas fa-search circle_icon" id="search-icon"></i>

        <a href="<?php echo SITE_PATH; ?>favourites" class="fas fa-heart circle_icon" style="position: relative;"><span id="favItems" class="count"><?php echo $fav_count; ?></span></a>

        <a href="<?php echo SITE_PATH; ?>cart" class="fas fa-shopping-cart cart-ico circle_icon" style="position: relative;"><span id="cartItems" class="count"><?php echo $count; ?></span>
        </a>

        <?php 

            if(isset($_SESSION['CURRENT_USER'])){

                ?>

    <dt class="modalDiv"> 
        <a class="fas fa-user user-icon" href="javascript:void(0)" ></a>
        <div class="userModal">
          <div class="card">
             <ul class="list-group list-group-flush">
              <li class="list-group-item">  <a href="<?php echo SITE_PATH; ?>profile" class="circle_icon"> Profile</a></li>
              <li class="list-group-item"> <a href="<?php echo SITE_PATH; ?>logout" class="circle_icon"> Logout</a></li>
            </ul>

          </div>
        </div>
    </dt>
  
        <?php
            }
            else{
                ?>
                <a href="<?php echo SITE_PATH; ?>login" class="fas fa-sign-in-alt circle_icon"> </a>
        <?php
            }

        ?>
     <dt class="changeLang">
        <i class="fa fa-globe" id="globe"></i>
        <div id="google_translate_element" class="gtranslator"></div>
    </dt>
    
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

<form action="<?php echo SITE_PATH.'results'; ?>" id="search-form" autocomplete="off">
    <input type="search" placeholder="search here..." name="query" id="search-box" required>
    <i class="fas fa-times" id="close"></i>
    <button type="submit" name="submit" class="btn fs-2"><i class="fas fa-search text-light" ></i></button>
</form>

<!-- home section starts  -->

