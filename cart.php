
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
            

            <?php
                if(isset($_SESSION['cart'])){

                    foreach ($_SESSION['cart'] as $key => $value) {
                    
                    
                    if($value['mealType']=="meal"){
                        $id=$value['id'];
                         $mealsSql="select * from meals where id='$id'";
                         $meals=mysqli_query($con,$mealsSql);
                         while ($meals_row=mysqli_fetch_assoc($meals) ){
                            ?>

                             <div class="product">
                <img src="<?php echo SITE_MENU_IMAGE.$meals_row['mealPhoto'];  ?>" alt="" class="img-fluid">
                <div class="product-info">
                    <h3 class="product-name"><?php echo $meals_row['mealName'];  ?></h3>
                    <h2 class="product-price">&#8377;<?php echo $meals_row['mealPrice'];  ?></h2>
                     <div class="quantity">
                                <span class="dec">-</span>
                                <span class="qty-input" id="qty"><?php echo $value['qty'];  ?> </span>
                                <span class="inc">+</span>
                     </div>
                     <p class="product-remove btn btn-danger">
                         <i class="fa fa-trash"></i>
                         <span>Remove</span>
                     </p>

                 </div>
            </div>

            <?php

                         }
                    }

                    if($value['mealType']=="menu"){
                        $id=$value['id'];
                         $menuSql="select * from menu where id='$id'";
                         $menu=mysqli_query($con,$menuSql);
                         while ($menuRow=mysqli_fetch_assoc($menu) ){
                            ?>

                             <div class="product">
                <img src="<?php echo SITE_MENU_IMAGE.$menuRow['menuPhoto'];  ?>" alt="" class="img-fluid">
                <div class="product-info">
                    <h3 class="product-name"><?php  echo $menuRow['menuName']; ?></h3>
                    <h2 class="product-price">&#8377;<?php  echo $menuRow['menuPrice']; ?></h2>
                     <div class="quantity">
                                <span class="dec">-</span>
                                <span class="qty-input" id="qty"><?php echo $value['qty'];  ?></span>
                                <span class="inc">+</span>
                     </div>
                     <p class="product-remove btn btn-danger">
                         <i class="fa fa-trash"></i>
                         <span>Remove</span>
                     </p>

                 </div>
            </div>

            <?php

                         }
                    }
                }

            }

            ?>
           
           
            

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








<!-- footer -->
    <?php

        include 'footer.php';

    ?>
  