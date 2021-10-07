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
        document.querySelector('header .navbar a[href*='+id+']').classList.add('active');
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



// add to cart

// var data=0;
// document.querySelector('.qty-input').innerText=data;
// document.querySelector('.inc').onclick = () =>{
//   data=data+1;
//   document.querySelector('.qty-input').innerText=data;
// }
// document.querySelector('.dec').onclick = () =>{
//   data=data-1;
//   document.querySelector('.qty-input').innerText=data;
// }


 $(document).ready(function () {


      // quantity increment decrement
        $('.inc').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').text();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').text(value);
            }

        });

        $('.dec').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').text();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').text(value);
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


//validation to register user

function regValidation(){

  

  var name=document.getElementById('regname').value;
  var email=document.getElementById('regemail').value;
  var phone=document.getElementById('regphone').value;
  var pass1=document.getElementById('regpass1').value;
  var pass2=document.getElementById('regpass2').value;


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
  if(pass1=="" || pass2==""){
    document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" > Please fill the password</div>';
    return false;
  }

  if(pass1!=pass2){
    document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" > Password not matching</div>';
    return false;
  }
  
  if(pass1.length<=2 || pass1.length>=20){
     document.getElementById('validation').innerHTML='<div class="alert alert-danger" role="alert" > Password must be between 3 and 20 characters</div>';
     return false;
  }

  
  

return true;




}


//user registration

jQuery('#userRegister').on('submit',function(e){
  
   jQuery("#validation").html("");
  jQuery.ajax({
    url:'user_register.php',
    type:'post',
    data:jQuery('#userRegister').serialize(),
    success:function(result){

        msg=jQuery.parseJSON(result);
        if(msg.status=="error"){
          jQuery("#validation").html("<div class='alert alert-danger' role='alert' >"+msg.message+"</div>");
        } 
                
    }


  });

e.preventDefault();
});



//







