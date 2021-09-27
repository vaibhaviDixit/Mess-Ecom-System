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


</head>
<body>

    <!-- header section starts      -->

 <!-- nav -->
    <?php

        include 'nav.php';

    ?>
    <!-- nav ends -->
<!-- home section starts  -->


<div class="container-fluid mt-5 pt-5">


  <div class="user-profile mt-5 pt-5">
     
     <div class="d-flex justify-content-evenly align-items-center">
         <img src="images/pic-1.png" class="img-thumbnail img-fluid rounded-circle" alt="...">
         <div>
           <h3 class="fs-2">Nora </h3>
         <h3 class="fs-4">9284552172</h3>
         <h3 class="fs-4">nora@gmail.com</h3>
         </div>
         <button  class="btn btn-success fs-5">Edit Profile</button>
         

     </div>

</div>
</div>
  
     <div class="container-fluid activity-wrapper">

        <div class="container-fluid row user-history">
        
                    <!-- Nav tabs -->
            <div class="col-md-4 activities">
            <ul class="nav nav-tabs fs-2 flex-column">
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#Orders"><i class="fas fa-shopping-bag"></i>Orders</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#Favourites"><i class="fas fa-heart"></i>Favourites</a>
              </li>
                 <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#Addresses"><i class="fas fa-map-marker-alt"></i>Addresses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#Notifications"><i class="fas fa-bell"></i>Notifications</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#Rate"><i class="fas fa-star"></i>Rate us</a>
              </li>

            </ul>
            </div>
           

              
              

            <!-- Tab panes -->
            <div class="tab-content col-md-7">
                    <div class="tab-pane container active" id="Orders">order</div>
                    <div class="tab-pane container fade" id="Favourites">...</div>
                    <div class="tab-pane container fade" id="Addresses">...</div>
                    <div class="tab-pane container fade" id="Notifications">...</div>
                    <div class="tab-pane container fade" id="Rate">...</div>
            </div>


    


         

    </div>


<!--  -->


<!-- loader part  -->
<!-- <div class="loader-container">
    <img src="images/loader.gif" alt="">
</div> -->

<!-- footer -->
    <?php

        include 'footer.php';

    ?>
    <!-- footer -->

<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


</body>
</html>