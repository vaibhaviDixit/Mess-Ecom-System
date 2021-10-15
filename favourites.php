
    <?php

        include 'nav.php';

    ?>
    <!-- nav ends -->
<!-- home section starts  -->

 
 <div class="mt-5" style="margin-top: 9rem !important;">
    <h1 class="heading mt-5">My Favourites</h1>
</div>

<div class="container-fluid mt-2 p-5">

    <div class="cart">

        <div class="products">


            <?php

                if(count($fav_array) >0  ){
                    foreach ($fav_array as $key => $value) {

                         if($value['mealType']=="meal"){
                         $id=$value['id'];
                         $mealsSql="select * from meals where id='$id'";
                         $meals=mysqli_query($con,$mealsSql);
                         while ($meals_row=mysqli_fetch_assoc($meals) ){
                            ?>
                            <!-- fetch meal items -->
                            <div class="product">
                                <img src="<?php echo SITE_MENU_IMAGE.$meals_row['mealPhoto'];  ?>" alt="" class="img-fluid">
                                <div class="product-info">
                                    <h3 class="product-name"><?php echo $meals_row['mealName'];  ?> </h3>
                                    <h2 class="product-price">&#8377;<?php echo $meals_row['mealPrice'];  ?></h2>
                                     <div class="quantity">
                                               <span class="dec">-</span>
                                                <span class="qty-input" id="mealQty<?php echo $meals_row['id']; ?>">1</span>
                                                <span class="inc">+</span>
                                     </div>
                                    
                                       <button class="product-remove btn btn-danger" onclick="addToFav('<?php echo $id; ?>','meal','remove')" >
                                             <i class="fa fa-trash"></i>
                                             Remove
                                         </button>
                                         <button class="product-add btn btn-success" onclick="addCartMeals('<?php echo $id; ?>','meal','add')" >
                                             <i class="fa fa-trash"></i>
                                             Add to cart
                                         </button>
                                 </div>
                             </div>

                            <?php

                            }//while ends
                        }//if meals ends
                        if($value['mealType']=="menu"){
                         $id=$value['id'];
                         $menuSql="select * from menu where id='$id'";
                         $menu=mysqli_query($con,$menuSql);
                         while ($menuRow=mysqli_fetch_assoc($menu) ){
                            ?>

                              <!-- fetch menu items -->
                            <div class="product">
                                <img src="<?php echo SITE_MENU_IMAGE.$menuRow['menuPhoto'];  ?>" alt="" class="img-fluid">
                                <div class="product-info">
                                    <h3 class="product-name"><?php  echo $menuRow['menuName']; ?> </h3>
                                    <h2 class="product-price">&#8377;<?php  echo $menuRow['menuPrice']; ?></h2>
                                     <div class="quantity">
                                               <span class="dec">-</span>
                                                <span class="qty-input" id="menuQty<?php echo $menuRow['id']; ?>">1</span>
                                                <span class="inc">+</span>
                                     </div>
                                    
                                       <button class="product-remove btn btn-danger" onclick="addToFav('<?php echo $id; ?>','menu','remove')" >
                                             <i class="fa fa-trash"></i>
                                             Remove
                                         </button>
                                         <button class="product-add btn btn-success" onclick="addCartMeals('<?php echo $id; ?>','menu','add')" >
                                             <i class="fa fa-trash"></i>
                                             Add to cart
                                         </button>
                                 </div>
                             </div>


                            <?php

                                  }//while ends
                        }//if menu ends
                    }//foreach ends

                }//if count checker ends

            ?>
            
             

        </div>
        <!-- products ends -->
        
    </div>
       

</div>






<!-- footer -->
    <?php

        include 'footer.php';

    ?>
 