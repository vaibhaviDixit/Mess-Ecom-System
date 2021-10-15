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


//validation to register user



//user registration




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
      if(msg.action=="remove"){
          window.location.href="cart.php";
      }

      $("#cartItems").html(msg.totalItems);

      setTimeout(function() {
        $("#addToCartSuccess").fadeIn(200);
      }, 200);

      setTimeout(function() {
        $("#addToCartSuccess").fadeOut(200);
      }, 1000);

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






