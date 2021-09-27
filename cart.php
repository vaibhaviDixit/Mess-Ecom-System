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

 
 <div class="mt-5" style="margin-top: 9rem !important;">
    <h1 class="heading mt-5">My Cart</h1>
</div>

<div class="container-fluid mt-2 p-5">

    <div class="cart">

        <div class="products">
            
            <div class="product">
                <img src="images/menu-3.jpg" alt="" class="img-fluid">
                <div class="product-info">
                    <h3 class="product-name">Pohe</h3>
                    <h2 class="product-price">&#8377;60</h2>
                     <div class="quantity">
                                <span class="dec">-</span>
                                <input type="number" class="qty-input" id="qty" value="1" name="quantity" min="1" max="10">
                                <span class="inc">+</span>
                     </div>
                     <p class="product-remove btn btn-danger">
                         <i class="fa fa-trash"></i>
                         <span>Remove</span>
                     </p>

                 </div>
            </div>
            <div class="product">
                <img src="images/menu-2.jpg" alt="" class="img-fluid">
                <div class="product-info">
                    <h3 class="product-name">Pohe</h3>
                    <h2 class="product-price">&#8377;60</h2>
                     <div class="quantity">
                                <span class="dec">-</span>
                                <input type="number" class="qty-input" id="qty" value="1" name="quantity" min="1" max="10">
                                <span class="inc">+</span>
                     </div>
                     <p class="product-remove btn btn-danger">
                         <i class="fa fa-trash"></i>
                         <span>Remove</span>
                     </p>

                 </div>
            </div>
            <div class="product">
                <img src="images/menu-1.jpg" alt="" class="img-fluid">
                <div class="product-info">
                    <h3 class="product-name">Pohe</h3>
                    <h2 class="product-price">&#8377;60</h2>
                     <div class="quantity">
                                <span class="dec">-</span>
                                <input type="number" class="qty-input" id="qty" value="1" name="quantity" min="1" max="10">
                                <span class="inc">+</span>
                     </div>
                     <p class="product-remove btn btn-danger">
                         <i class="fa fa-trash"></i>
                         <span>Remove</span>
                     </p>

                 </div>
            </div>

        </div>
        <div class="cart-total">
            
            <p fs-3>2 ITEMS</p>
            <p>
                <span>Subtotal:</span>
                <span>&#8377;60</span>
            </p>
            <a href="" class="btn btn-success fs-4">Order</a>

        </div>
        


    </div>




       

</div>










<script src="js/bootstrap.min.js"></script>

<!-- loader part  -->
<!-- <div class="loader-container">
    <img src="images/loader.gif" alt="">
</div> -->

<!-- footer -->
    <?php

        include 'footer.php';

    ?>
    <!-- footer -->

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>