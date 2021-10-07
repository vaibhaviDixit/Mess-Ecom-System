<?php

session_start();
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<!-- header section starts      -->

<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>mess</a>

    <nav class="navbar">
        <a class="active" href="index.php#home">Home</a>
        <a href="index.php#meals">Meals</a>
        <a href="index.php#tiffins">Tiffins</a>
        <a href="index.php#daily">Daily</a>
        <a href="index.php#offers">Offers & Deals</a>
        <a href="about.php">About</a>
        <a href="review.php">Reviews</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="favourites.php" class="fas fa-heart"></a>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <?php 

            if(isset($_SESSION['CURRENT_USER'])){

                ?>

            
        <a class="fas fa-user" href="user.php" ></a>
  

             <!--  <a tabindex="0" class=" fas fa-user" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Dismissible popover" data-bs-content="And here's some amazing content. It's very engaging. Right?"></a> -->
        <?php
            }
            else{
                ?>
                <a href="" class="fas fa-sign-in-alt " data-bs-toggle="modal" data-bs-target="#login"> </a>
        <?php
            }

        ?>

        


    </div>

</header>



<div class="modal" id="login">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
         
         <!-- tabs -->
         <div class="container">
             <div class="nav nav-tabs nav-justified fs-3 " id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Register</button>
              </div>
        </div>
            <!--  -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="tab-content fs-4" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <form action="login.php" method="post">
                 
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="loginemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="loginpassword" class="form-control" id="exampleInputPassword1" required="" autocomplete="off">
                  </div>
                  <div class="mb-3 ">
                    <a href="">Forgot Password?</a>
                  </div>
                  <button type="submit" name="login" class="custombtn">Login</button>
                </form>

             </div>

             <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                  <form  method="post" id="userRegister">
                     
                     <span id="validation"></span>
                    

                   <div class="mb-3">
                    <label for="regname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="regname"  name="regname" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="regemail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="regemail"  name="regemail" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="regphone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="regphone" name="regphone" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="regpass1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="regpass1" name="regpass1" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="regpass2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="regpass2"  autocomplete="off">
                  </div>
                  <button type="submit" class="custombtn"  onclick="return regValidation()" >Register</button>
                </form>



             </div>
        </div>    
            
    
      </div>
      
    </div>
  </div>


</div>

<!-- header section ends-->

<!-- search form  -->

<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

<!-- home section starts  -->