<?php

session_start();
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

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
    <title>Mess Website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

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
        <a href="favourites.php" class="fas fa-heart" style="position: relative;"><span id="favItems" class="count"><?php echo $fav_count; ?></span></a>
        <a href="cart.php" class="fas fa-shopping-cart" style="position: relative;"><span id="cartItems" class="count"><?php echo $count; ?></span></a>

        <?php 

            if(isset($_SESSION['CURRENT_USER'])){

                ?>

            
        <a class="fas fa-user" href="user.php" ></a>

        <div class="userModal">
          <div class="card">
             <ul class="list-group list-group-flush">
              <li class="list-group-item">  <a href=""> Profile</a></li>
              <li class="list-group-item"> <a href="logout.php"> Logout</a></li>
            </ul>

          </div>
        </div>
  

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
                <span id="loginMsg"></span>
                <form  method="post" id="userLogin">
                 
                 
                  <div class="mb-3">
                    <label for="loginPhone" class="form-label">Phone Number</label>
                    <input type="text" name="loginPhone" class="form-control" id="loginPhone"  required="" autocomplete="off">
                  </div>
                  <div id="recaptcha-container"></div>
                  <button type="submit"  class="btn custombtn" id="loginBtn" > <span class="round " role="status" aria-hidden="true"></span>  Login</button>

       
                  <input type="text" class="form-control" name="type" value="login" hidden>
              
    
                </form>
                 <div class="mb-3" id="loginOTPContainer" style="display: none;" >
                    <label for="loginOTP" class="form-label">OTP</label>
                    <input type="text" name="loginOTP" class="form-control" id="loginOTP" required="" autocomplete="off">
                     <button type="submit" name="login" id="verifyLoginBtn" class="btn custombtn" onclick="verifyLogin()"><span class="round " role="status" aria-hidden="true"></span>  Verify OTP</button>
                  </div>

             </div>

             <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
               <span id="validation"></span>

                  <form  method="post" id="userRegister">

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
                  <div id="recaptcha-container"></div>
                  <div class="mb-3">
                    <button  type="submit" class="btn custombtn" id="regBtn" onclick="return regValidation()" ><span class="reground " role="status" aria-hidden="true"></span> Continue</button>
                  </div>

                    

                   <input type="text" class="form-control" name="type" value="register" hidden>
               
                  
                </form>
                  
                     <div class="mb-3" style="display: none;" id="otpContainer">

                    <label for="OTP" class="form-label">Enter OTP</label>
                    <input type="text" class="form-control" id="OTP"  autocomplete="off">
                    <button type="submit" verifyRegBtn onclick="verify()" class="btn custombtn"><span class="reground " role="status" aria-hidden="true"></span> Register</button>

                   </div>
                

                 



             </div>
        </div>    
            
    
      </div>
      
    </div>
  </div>


</div>

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

<script type="text/javascript">
  

// Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBsfGjxjrIluPquGXlLdOeHWi4lLewkxeM",
    authDomain: "otp-authentication-58f6d.firebaseapp.com",
    projectId: "otp-authentication-58f6d",
    storageBucket: "otp-authentication-58f6d.appspot.com",
    messagingSenderId: "942589487415",
    appId: "1:942589487415:web:593e2465359f63bb0092b2",
    measurementId: "G-4VES7Z49KF"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  // firebase.getAnalytics();

 
function regValidation(){


  var name=document.getElementById('regname').value;
  var email=document.getElementById('regemail').value;
  var phone=document.getElementById('regphone').value;
  var pass1=document.getElementById('regpass1').value;


  if(name==""){
    document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" >Please fill your name </div>';
    return false;

  }
  if(name.length<5){
    document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" >Name is too short</div>';
    return false;

  }
  if(!isNaN(name)){
     document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" >Only characters are allowed in name</div>';
    return false;
  }

  if(email==""){
    document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" > Please fill your email</div>';
    return false;
  }
  if(phone==""){
    document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" > Please fill your phone</div>';
    return false;
  }
  if(isNaN(phone)){
     document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" >Invalid mobile number</div>';
     return false;
  }
  if(phone.length!=10){
     document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" >Mobile no. must be 10 digit</div>';
      return false;
  }
  if(pass1==""){
    document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" > Please fill the password</div>';
    return false;
  }


  
  if(pass1.length<=2 || pass1.length>=20){
     document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" > Password must be between 3 and 20 characters</div>';
     return false;
  }
  
  
return true;

}

 
 window.onload=function(){
    render();
 }

  function render(){
   
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
  }


//verify register
function verify(){

  otp=document.getElementById("OTP").value;

  $("#verifyRegBtn").attr("disabled",true);
  $(".lground").addClass(' spinner-border');
  // console.log(otp);

    confirmationResult.confirm(otp).then((result) => {
      // User signed in successfully.
    jQuery.ajax({
    url:'user_register_login.php',
    type:'post',
    data:jQuery('#userRegister').serialize()+"&verified=true",
    success:function(result){

        
        msg=jQuery.parseJSON(result);
        
        $("#verifyRegBtn").attr("disabled",false);
         $(".lground").removeClass(' spinner-border');
      
        if(msg.status=="error"){
          jQuery("#validation").html("<div class='alert alert-danger' role='alert' >"+msg.message+"</div>");
        }
        if(msg.status=="success"){
            jQuery("#validation").html("<div class='alert alert-success' role='alert' >"+msg.message+"</div>");
            window.location.href='index.php';

        }

    }


  });


      // ...
    }).catch((error) => {
      // User couldn't sign in (bad verification code?)
      // ...
     jQuery("#validation").html("<div class='alert alert-danger' role='alert' >Enter valid OTP please!</div>");
    });

}


//verify login
function verifyLogin(){


  otp=document.getElementById("loginOTP").value;

  $("#verifyLoginBtn").attr("disabled",true);
  $(".round").addClass(' spinner-border');

  // console.log(otp);

    confirmationResult.confirm(otp).then((result) => {
      // User signed in successfully.
    jQuery.ajax({
    url:'user_register_login.php',
    type:'post',
    data:jQuery('#userLogin').serialize()+"&verified=true",
    success:function(result){

        msg=jQuery.parseJSON(result);
         $("#verifyLoginBtn").attr("disabled",false);
         $(".round").removeClass(' spinner-border');

      
        if(msg.status=="error"){
          jQuery("#loginMsg").html("<div class='alert alert-danger' role='alert' >"+msg.message+"</div>");
        }
        if(msg.status=="success"){
            jQuery("#loginMsg").html("<div class='alert alert-success' role='alert' >"+msg.message+"</div>");
            window.location.href='index.php';

        }

    }


  });


      // ...
    }).catch((error) => {
      // User couldn't sign in (bad verification code?)
      // ...
     jQuery("#loginMsg").html("<div class='alert alert-danger' role='alert' >Enter valid OTP please!</div>");
    });

}



jQuery('#userRegister').on('submit',function(e){
  
e.preventDefault();

$(".reground").addClass(' spinner-border');
  $("#regBtn").attr("disabled",true);

   jQuery("#validation").html("");

   jQuery.ajax({

    url:'user_register_login.php',
    type:'post',
    data:jQuery('#userRegister').serialize()+"&verified=false",
    success:function(result){
        msg=jQuery.parseJSON(result);
      
        if(msg.status=="error"){
          jQuery("#validation").html("<div class='alert alert-danger' role='alert' >"+msg.message+"</div>");
        }
        if(msg.status=="success"){
          
          $("#otpContainer").show();
          $("#userRegister").hide();

          $(".reground").removeClass(' spinner-border');
           $("#regBtn").attr("disabled",false);

                        phoneNumber="+91"+document.getElementById("regphone").value;

                        firebase.auth().signInWithPhoneNumber(phoneNumber, window.recaptchaVerifier)
                        .then(function(confirmationResult){
                          // SMS sent. Prompt user to type the code from the message, then sign the
                          // user in with confirmationResult.confirm(code).
                          window.confirmationResult = confirmationResult;
                          coderesult=confirmationResult;
                          console.log(coderesult);
                          jQuery("#validation").html("<div class='alert alert-success' role='alert' >"+msg.message+"</div>");
                          // ...
                        }).catch(function(error){
                          // Error; SMS not sent
                          // ...
                          jQuery("#validation").html("<div class='alert alert-danger' role='alert' >Invalid activity</div>");
                        });

        }

    }


  });

});


//login
 jQuery('#userLogin').on('submit',function(e){
  
e.preventDefault();

  $(".round").addClass(' spinner-border');
  $("#loginBtn").attr("disabled",true);

   jQuery("#loginMsg").html("");

   jQuery.ajax({

    url:'user_register_login.php',
    type:'post',
    data:jQuery('#userLogin').serialize()+"&verified=false",
    success:function(result){
        msg=jQuery.parseJSON(result);
      
        if(msg.status=="error"){
          jQuery("#loginMsg").html("<div class='alert alert-danger' role='alert' >"+msg.message+"</div>");
        }
        if(msg.status=="success"){
          
          $("#loginOTPContainer").show();
          $("#loginBtn").hide();
          $("#recaptcha-container").hide();
          $(".round").removeClass(' spinner-border');
           $("#loginBtn").attr("disabled",false);

                        phoneNumber="+91"+document.getElementById("loginPhone").value;

                        firebase.auth().signInWithPhoneNumber(phoneNumber, window.recaptchaVerifier)
                        .then(function(confirmationResult){
                          // SMS sent. Prompt user to type the code from the message, then sign the
                          // user in with confirmationResult.confirm(code).
                          window.confirmationResult = confirmationResult;
                          coderesult=confirmationResult;
                          console.log(coderesult);
                          jQuery("#loginMsg").html("<div class='alert alert-success' role='alert' >"+msg.message+"</div>");
                          // ...
                        }).catch(function(error){
                          // Error; SMS not sent
                          // ...
                          jQuery("#loginMsg").html("<div class='alert alert-danger' role='alert' >Invalid activity</div>");
                        });

        }

    }


  });

});



</script>