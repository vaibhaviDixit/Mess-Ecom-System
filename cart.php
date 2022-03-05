<?php
   include 'nav.php';
   ?>
<!-- nav ends -->
<!-- home section starts  -->
<div class="mt-5" style="margin-top: 9rem !important;">
   <h1 class="heading mt-5">My Cart</h1>
</div>
<div class="container mt-2 pt-2">
   <div class="cart">
      <div class="d-flex flex-wrap justify-content-between">
         <?php
            if (count($cart_array) > 0)
            {
                foreach ($cart_array as $key => $value)
                {
                    if ($value['mealType'] == "meal")
                    {
                        $id = $value['id'];
                        $mealsSql = "select * from meals where id='$id'";
                        $meals = mysqli_query($con, $mealsSql);
                        while ($meals_row = mysqli_fetch_assoc($meals))
                        {
            ?>
         <div class="card mb-3" style="max-width: 540px;">
            <div class="cartItems g-0">
               <div class="col-md-4 cartImg">
                  <img src="<?php echo SITE_MENU_IMAGE . $meals_row['mealPhoto']; ?>" class="img-fluid rounded-start" alt="Image">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h3 class="product-name"><?php echo $meals_row['mealName']; ?></h3>
                     <h2 class="product-price">&#8377;<?php echo $meals_row['mealPrice']; ?></h2>
                     <div class="quantity">
                        <span class="dec" onclick="addCartMeals('<?php echo $id; ?>','meal','updateCartRemove')">-</span>
                        <span class="qty-input" id="mealQtyUpdate<?php echo $meals_row['id']; ?>" ><?php echo $value['qty']; ?> </span>
                        <span class="inc" onclick="addCartMeals('<?php echo $id; ?>','meal','updateCartAdd')" >+</span>
                     </div>
                     <button class="product-remove btn btn-danger" onclick="addCartMeals('<?php echo $id; ?>','meal','remove')" ><i class="fa fa-trash"></i>Remove</button>
                  </div>
               </div>
            </div>
         </div>
         <?php
            }
            }
            
            if ($value['mealType'] == "daily")
            {
            $id = $value['id'];
            $dailySql = "select * from dailyproducts where id='$id'";
            $daily = mysqli_query($con, $dailySql);
            while ($dailyRow = mysqli_fetch_assoc($daily))
            {
            ?>
         <div class="card mb-3" style="max-width: 540px;">
            <div class="cartItems g-0">
               <div class="col-md-4 cartImg">
                  <img src="<?php echo SITE_MENU_IMAGE . $dailyRow['proPhoto']; ?>" class="img-fluid rounded-start" alt="Image">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h3 class="product-name"><?php echo $dailyRow['proName']; ?></h3>
                     <h2 class="product-price">&#8377;<?php echo $dailyRow['proPrice']; ?></h2>
                     <div class="quantity">
                        <span class="dec"  onclick="addCartMeals('<?php echo $id; ?>','daily','updateCartRemove')" >-</span>
                        <span class="qty-input"  id="dailyQtyUpdate<?php echo $dailyRow['id']; ?>" ><?php echo $value['qty']; ?></span>
                        <span class="inc"  onclick="addCartMeals('<?php echo $id; ?>','daily','updateCartAdd')" >+</span>
                     </div>
                     <button class="product-remove btn btn-danger" onclick="addCartMeals('<?php echo $id; ?>','daily','remove')"><i class="fa fa-trash"></i>Remove</button>
                  </div>
               </div>
            </div>
         </div>
         <?php
            }
            }
            
            if ($value['mealType'] == "menu")
            {
            $id = $value['id'];
            $menuSql = "select * from menu where id='$id'";
            $menu = mysqli_query($con, $menuSql);
            while ($menuRow = mysqli_fetch_assoc($menu))
            {
            ?>
         <div class="card mb-3" style="max-width: 540px;">
            <div class="cartItems g-0">
               <div class="col-md-4 cartImg">
                  <img src="<?php echo SITE_MENU_IMAGE . $menuRow['menuPhoto']; ?>" class="img-fluid rounded-start" alt="Image">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h3 class="product-name"><?php echo $menuRow['menuName']; ?></h3>
                     <h2 class="product-price">&#8377;<?php echo $menuRow['menuPrice']; ?></h2>
                     <div class="quantity">
                        <span class="dec"  onclick="addCartMeals('<?php echo $id; ?>','menu','updateCartRemove')" >-</span>
                        <span class="qty-input"  id="menuQtyUpdate<?php echo $menuRow['id']; ?>" ><?php echo $value['qty']; ?></span>
                        <span class="inc"  onclick="addCartMeals('<?php echo $id; ?>','menu','updateCartAdd')" >+</span>
                     </div>
                     <button class="product-remove btn btn-danger" onclick="addCartMeals('<?php echo $id; ?>','menu','remove')"><i class="fa fa-trash"></i>Remove</button>
                  </div>
               </div>
            </div>
         </div>
         <?php
            }
            }
            }
            
            ?>
      </div>
   </div>
   <?php
      }
      else
      {
      ?>
</div>
<div class="d-flex justify-content-center"  style=" margin-top: -10%; ">
   <img src="<?php echo SITE_PATH; ?>asset/images/empty-cart.png" class="img-fluid">
</div>
<?php
   }
   
   ?>
</div>
</div>
<?php
   if (count($cart_array) > 0)
   {
   ?>
<div class="cart-total">
   <p class=" fs-2"><?php echo count($cart_array); ?> ITEMS</p>
   <div class="fs-3" >Sub Total :
      <?php
         $val = 0;
         foreach ($cart_array as $key => $value)
         {
             $val = $val + intval($value['subtotal']);
         }
         
         echo "<span class='cartP'> &#8377; " . $val . "</span>";
         
         ?>
   </div>
   <a href="<?php if (isset($_SESSION['CURRENT_USER']))
      {
          echo SITE_PATH . 'checkout';
      }
      else
      {
          echo SITE_PATH . 'login';
      } ?>" class="btn btn-success fs-4">Place Order</a>
</div>
<?php
   }
   ?>
<!-- footer -->
<?php
   include 'footer.php';
   
   ?>