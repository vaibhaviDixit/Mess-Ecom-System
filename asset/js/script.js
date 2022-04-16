// animate div on scroll
$(".sub-heading").attr('data-aos','slide-up');
$(".heading").attr('data-aos','zoom-in');
$(".menuDesc").attr('data-aos','fade-left');
$("#subscribeCards div").each(function() {
    $(this).attr('data-aos','fade-right');
});

let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navbar a');

window.onscroll = () =>{

  menu.classList.remove('fa-times');
  navbar.classList.remove('active');

  section.forEach(sec =>{

    let top = window.scrollY;
    let height = sec.offsetHeight;
    let offset = sec.offsetTop - 150;
    let id = sec.getAttribute('id');

    if(top >= offset && top < offset + height){
      navLinks.forEach(links =>{
      links.classList.remove('active');

      $("header .navbar a").each(function() {
           var hrefr = $(this).attr('href');
           tmp='#'+id;
           if(hrefr==tmp){
              $(this).addClass('active');
          }
           
       });


      });

    };

  });

}

document.querySelector('#search-icon').onclick = () =>{
  document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('#close').onclick = () =>{
  document.querySelector('#search-form').classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
});

var swiper = new Swiper(".review-slider", {
  spaceBetween: 20,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  loop:true,
  breakpoints: {
    0: {
        slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});



var swiper = new Swiper(".swiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
});

// function loader(){
//   document.querySelector('.loader-container').classList.add('fade-out');
// }

// function fadeOut(){
//   setInterval(loader, 3000);
// }

// window.onload = fadeOut;


//show / hide password field
function toggleEye(id){
    const selector="#"+id;
    const password = document.querySelector(selector);
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    $(".fa-eye").toggleClass('fa-eye-slash');
}

// add to cart

 $(document).ready(function () {


      // quantity increment decrement
        $('.inc').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.dec').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                if(value<=0){
                   $(this).parents('.quantity').find('.qty-input').val('0');
                }
                else{
                   $(this).parents('.quantity').find('.qty-input').val(value);
                }
               
            }
        });




    });

// document.querySelector('.desc').onclick = () =>{
//   document.querySelector('.eyeClick').style.right='0';
// }

// document.querySelector('.remove').onclick = () =>{
//   document.querySelector('.eyeClick').style.right='-1500px';
// }

$("body").on("click",".desc",function(){
  // var a=$(this).closest('.box');
  var a=$(this).parents('.box');
  $(a).find(".eyeClick").show();

});

$("body").on("click",".remove",function(){
  var a=$(this).closest('.box');
  $(a).find(".eyeClick").hide();

});
// orderSumryModalToggle

$("body").on("click",".orderSumryModalToggle",function(){
  var a=$(this).closest('.orderLists');
  $(a).find(".orderSumryModal").toggle(300);
});

document.querySelector('#search-icon').onclick = () =>{
  document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('#close').onclick = () =>{
  document.querySelector('#search-form').classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
});

var swiper = new Swiper(".review-slider", {
  spaceBetween: 20,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  loop:true,
  breakpoints: {
    0: {
        slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});



var swiper = new Swiper(".swiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
});



      // quantity increment decrement
        $("body").on("click",".inc",function(e){
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').text();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').text(value);
            }

        });

       $("body").on("click",".dec",function(e){
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').text();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').text(value);
            }
        });



$("body").on("click",".desc",function(){
  // var a=$(this).closest('.box');
  var a=$(this).parents('.box');
  $(a).find(".eyeClick").show(500);

});

$("body").on("click",".remove",function(){
  var a=$(this).closest('.box');
  $(a).find(".eyeClick").hide(500);

});


//rate us 
const stars=document.querySelectorAll('.star');
for(i=0; i<stars.length; i++){

  stars[i].starValue=(i+1);
  ["click"].forEach(function(e){
      stars[i].addEventListener(e,ratings);
  })

}

function ratings(e){

  let evt=e.type;
  let starValue=this.starValue;

  stars.forEach(function(elem,ind){

    if (evt === 'click') {
      if(ind < starValue){
        elem.classList.add("orange");

      }
      else{
       elem.classList.remove("orange"); 
      }
    }

    
  })


}

//user registration

$(".user-icon").mouseover(function(){

      $(".userModal").slideToggle(300);
});

//changelang 
$("#globe").mouseover(function(){

      $(".gtranslator").slideToggle(300);
});

//change margin of navbar
setInterval(function(){ 
if ( $('html').hasClass('skiptranslate')) {
  $('.navigationArea').css('margin-top','30px');
}else{
  $('.navigationArea').css('margin-top','0px');
}
}, 3000);

// $("body").on("click", function(){

//       $(".userModal").slideUp(300);
// });



//fetch category wise meals
$(document).on("click",".fetchMeals",function(){
  var catId=$(this).data("id");
  $(".categories").children().removeClass(" activeCate active ");

  $(this).addClass(" activeCate active ");
  // alert(catId);

  jQuery.ajax({
    url:'fetchMeals.php',
    type:'post',
    data:{id : catId},
    success:function(result){
        // console.log(result);
        $(".displayMeals").html(result);
    }

  });



});

//fetch category wise daily products
$(document).on("click",".fetchProducts",function(){

  var procatId=$(this).data("id");
  // alert(procatId);
  $(".proCate").children().removeClass(" activeCate active ");

  $(this).addClass(" activeCate active ");
  

  jQuery.ajax({
    url:'fetchProducts.php',
    type:'post',
    data:{id : procatId},
    success:function(result){
        // console.log(result);
        $(".displayProducts").html(result);
    }

  });



});



$('.tiffinSection a:first-child').addClass(' activeCate active ');

$(document).on("click",".fetchTiffins",function(){
  var subId=$(this).data("id");
  
  $(".tiffinSection").children().removeClass(" activeCate active ");

  $(this).addClass(" activeCate active ");


  jQuery.ajax({
    url:'fetchTiffins.php',
    type:'post',
    data:{id : subId},
    success:function(result){
        // console.log(result);
        $(".displayTiffins").html(result);
    }

  });


});

  

//cart

function addCartMeals(mealId,mealType,operation) {

  qty=$("#"+mealType+"Qty"+mealId).text();
  if(!isNaN(qty)){
    qty=1;
  }

  if(operation=="updateCartAdd"){

    q=$("#"+mealType+"QtyUpdate"+mealId).text();
    qty=parseInt(q)+1;
    
  
  }
  if(operation=="updateCartRemove"){

    q=$("#"+mealType+"QtyUpdate"+mealId).text();
    qty=parseInt(q)-1;
  }

   jQuery.ajax({
    url:'addCart.php',
    type:'post',
    data:{id : mealId,qty:qty,mealType:mealType,operation:operation},
    success:function(result){
         

      msg=jQuery.parseJSON(result);

      if(msg.action=="remove" || msg.action=="cartUpdate" ){
          window.location.href="cart.php";
      }
       if(msg.action=="chkremove"){
          window.location.href="checkout.php";
      }
      if(msg.action=="added"){
        setTimeout(function() {
              $("#addToCartSuccess").fadeIn(200);
        }, 200);

        setTimeout(function() {
          $("#addToCartSuccess").fadeOut(200);
        }, 1000);
      }

      $("#cartItems").html(msg.totalItems);

    }

  });

}


function addToFav(mealId,mealType,operation){


   jQuery.ajax({
    url:'addToFav.php',
    type:'post',
    data:{id : mealId,mealType:mealType,operation:operation},
    success:function(result){
         

      msg=jQuery.parseJSON(result);
      if(msg.action=="remove"){
          window.location.href="favourites.php";
      }

      $("#favItems").html(msg.totalItems);

      setTimeout(function() {
        $("#addToFavSuccess").fadeIn(200);
      }, 200);

      setTimeout(function() {
        $("#addToFavSuccess").fadeOut(200);
      }, 1000);

    }

  });

}


$(function() { 
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});



// firebase
  

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
  firebase.analytics();

 window.onload=function(){
    render();
 }

  function render(){
   
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
      "recaptcha-container",
    {
      size: "invisible",
      callback: function(response) {
        submitPhoneNumberAuth();
      }
    }
      );
    recaptchaVerifier.render();
  }

 
function regValidation(){


  var name=document.getElementById('regname').value;
  var email=document.getElementById('regemail').value;
  var phone=document.getElementById('regphone').value;
  // var pass1=document.getElementById('regpass1').value;
  const phoneExp = /^[6-9]\d{9}$/gi;
  


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
  if(!phoneExp.test(phone)){
     document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" >Invalid mobile number</div>';
     return false;
  }

  
return true;

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
            window.location.href=window.location.href;

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
            window.location.href=window.location.href;

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
          $(".round").removeClass(' spinner-border');
           $("#loginBtn").attr("disabled",false);
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

 jQuery('#sendOTPWalaBtn').on('click',function(e){
    e.preventDefault();
});
 jQuery('#verifyOTPWalaBtn').on('click',function(e){
    e.preventDefault();
});


function checkoutOtp(phone){
  const regexExp = /^[6-9]\d{9}$/gi;
  jQuery("#phVerifyMsg").text("");
    if(regexExp.test(phone)){
      jQuery("#subscribeForm #userPhone").attr("readonly",true);
      jQuery("#subscribeForm #sendOTPWalaBtn").hide();
      ph="+91"+phone;

      firebase.auth().signInWithPhoneNumber(ph, window.recaptchaVerifier)
          .then(function(confirmationResult){
                window.confirmationResult = confirmationResult;
                coderesult=confirmationResult;
                jQuery("#subscribeForm #sendOTPWalaBtn").hide();
                jQuery("#subscribeForm .otpBox").show();
                jQuery("#subscribeForm #verifyOTPWalaBtn").show();
                          
         }).catch(function(error){
                jQuery("#phVerifyMsg").text("Something went wrong! ");
                jQuery("#subscribeForm #userPhone").attr("readonly",false);
                jQuery("#subscribeForm #sendOTPWalaBtn").show();
        });

    }
    else{

      jQuery("#phVerifyMsg").text("Invalid Mobile");
    }
}


function verifySubOTP(otp){
  $("#verifyOTPWalaBtn").attr("disabled",true);
  $("#subscribeForm .round").addClass(' spinner-border-sm');
    confirmationResult.confirm(otp).then((result) => {
      // User signed in successfully.
       jQuery("#phVerifyMsg").text("Verified!");
      $("#subscribeForm #paymentButton").attr("disabled",false);
      $("#subscribeForm #checkIfVerified").val("1");
      $("#subscribeForm .round").removeClass('spinner-border-sm');
      jQuery("#subscribeForm .otpBox").hide();
      jQuery("#subscribeForm #verifyOTPWalaBtn").hide();
      // ...
    }).catch((error) => {
      jQuery("#OTPVerifyMsg").text("Invalid OTP");
      $("#verifyOTPWalaBtn").attr("disabled",false);
    });

}


function orderChkOutOtp(phone){
  const regexExp = /^[6-9]\d{9}$/gi;
  jQuery("#chkOutForm #phVerifyMsg").text("");
    if(regexExp.test(phone)){
      jQuery("#chkOutForm #userPhone").attr("readonly",true);
      jQuery("#chkOutForm #sendOTPWalaBtn").hide();
      ph="+91"+phone;

      firebase.auth().signInWithPhoneNumber(ph, window.recaptchaVerifier)
          .then(function(confirmationResult){
                window.confirmationResult = confirmationResult;
                coderesult=confirmationResult;
                jQuery("#chkOutForm #sendOTPWalaBtn").hide();
                jQuery("#chkOutForm .otpBox").show();
                jQuery("#chkOutForm #verifyOTPWalaBtn").show();
                          
         }).catch(function(error){
                jQuery("#chkOutForm #phVerifyMsg").text("Something went wrong! ");
                jQuery("#chkOutForm #userPhone").attr("readonly",false);
                jQuery("#chkOutForm #sendOTPWalaBtn").show();
        });

    }
    else{

      jQuery("#chkOutForm #phVerifyMsg").text("Invalid Mobile");
    }
}


function verifyOrderChkOTP(otp){
  $("#chkOutForm #verifyOTPWalaBtn").attr("disabled",true);
  $("#chkOutForm  .round").addClass(' spinner-border-sm');
    confirmationResult.confirm(otp).then((result) => {
      // User signed in successfully.
       jQuery("#chkOutForm #phVerifyMsg").text("Verified!");
      $("#chkOutForm #paymentButton").attr("disabled",false);
      $("#chkOutForm #checkIfVerified").val("1");
      $("#chkOutForm .round").removeClass('spinner-border-sm');
      jQuery("#chkOutForm .otpBox").hide();
      jQuery("#chkOutForm #verifyOTPWalaBtn").hide();
      // ...
    }).catch((error) => {
      jQuery("#chkOutForm #OTPVerifyMsg").text("Invalid OTP");
      $("#chkOutForm #verifyOTPWalaBtn").attr("disabled",false);
    });

}



//firebase push notification




 const messaging=firebase.messaging();
 var pushtoken=null    

function IntitalizeFireBaseMessaging() {
if ("serviceWorker" in navigator) {
navigator.serviceWorker
  .register("../../firebase-messaging-sw.js")
  .then(function(registration) {
    console.log("Registration successful, scope is:", registration.scope);
    messaging.getToken({vapidKey: 'BDd-btbZx53pKMO7UpMLD7y7gDUptMO1YethuSRUCSr4qvxcJM4v01wn3Bt5krbQ00YUE1WkYTvNi0Y1gs4d_5g', serviceWorkerRegistration : registration })
      .then((currentToken) => {
        if (currentToken) {
          console.log('current token for client: ', currentToken);
          pushtoken=currentToken

          sendPushNoti("hi","how are you");
    // 
          // Track the token -> client mapping, by sending to backend server
          // show on the UI that permission is secured
        } else {
          console.log('No registration token available. Request permission to generate one.');

          // shows on the UI that permission is required 
        }
      }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // catch error while creating client token
      });  
    })
    .catch(function(err) {
      console.log("Service worker registration failed, error:"  , err );
  }); 
}
    }

    messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
        //alert(reason);
            })
    })
    IntitalizeFireBaseMessaging();


    function sendPushNoti(title,msg){
      console.log(title,msg,pushtoken)
      jQuery.ajax({
            url:'send_notification.php',
            type:'post',
            data:"title="+title+"&message="+msg+"&token="+pushtoken
          });
    }