<?php
include 'nav.php';

?>
<!-- nav ends -->
<!-- home section starts  -->
<div class="mt-5" style="margin-top: 9rem !important;">
   <h1 class="heading mt-5">My Favourites</h1>
</div>
<div class="container mt-2 pt-2">
   <div class="cart">
      <div class="d-flex flex-wrap justify-content-between">
         <?php
if (count($fav_array) > 0)
{
    foreach ($fav_array as $key => $value)
    {

        if ($value['mealType'] == "meal")
        {
            $id = $value['id'];
            $mealsSql = "select * from meals where id='$id'";
            $meals = mysqli_query($con, $mealsSql);
            while ($meals_row = mysqli_fetch_assoc($meals))
            {
?>
         <!-- fetch meal items -->
         <div class="card mb-3" style="max-width: 540px;">
            <div class="cartItems g-0">
               <div class="col-md-4 cartImg">
                  <img src="<?php echo SITE_MENU_IMAGE . $meals_row['mealPhoto']; ?>" class="img-fluid rounded-start" alt="Image">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h3 class="product-name"><?php echo $meals_row['mealName']; ?></h3>
                     <h2 class="product-price">&#8377;<?php echo $meals_row['mealPrice']; ?></h2>
                     <button class="product-remove btn btn-danger" onclick="addToFav(<?php echo $id; ?>,'meal','remove')" ><i class="fa fa-trash"></i>Remove</button>
                     <button class="product-add btn btn-success" onclick="addCartMeals(<?php echo $id; ?>,'meal','add')" >
                     <i class="fas fa-shopping-cart"></i>
                     Add to cart
                     </button>
                  </div>
               </div>
            </div>
         </div>
         <?php
            } //while ends
            
        } //if meals ends
        if ($value['mealType'] == "menu")
        {
            $id = $value['id'];
            $menuSql = "select * from menu where id='$id'";
            $menu = mysqli_query($con, $menuSql);
            while ($menuRow = mysqli_fetch_assoc($menu))
            {
?>
         <!-- fetch menu items -->
         <div class="card mb-3" style="max-width: 540px;">
            <div class="cartItems g-0">
               <div class="col-md-4 cartImg">
                  <img src="<?php echo SITE_MENU_IMAGE . $menuRow['menuPhoto']; ?>" class="img-fluid rounded-start" alt="Image">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h3 class="product-name"><?php echo $menuRow['menuName']; ?></h3>
                     <h2 class="product-price">&#8377;<?php echo $menuRow['menuPrice']; ?></h2>
                     <button class="product-remove btn btn-danger" onclick="addToFav('<?php echo $id; ?>','menu','remove')"><i class="fa fa-trash"></i>Remove</button>
                     <button class="product-add btn btn-success" onclick="addCartMeals('<?php echo $id; ?>','menu','add')" >
                     <i class="fas fa-shopping-cart"></i>
                     Add to cart
                     </button>
                  </div>
               </div>
            </div>
         </div>
         <?php
            } //while ends
            
        } //if menu ends
        
    } //foreach ends
    
?>
      </div>
   </div>
   <?php
} //if count checker ends
else
{
?>
</div>
<div class="mx-auto w-25 text-center" >
   <img src="<?php echo SITE_PATH; ?>asset/images/nofav.png" class="img-fluid"><br>
   <h3 class="text-center fw-bolder">No Favourites Yet!</h3>
</div>
<?php
}
?>
</div>
<!-- products ends -->
</div>
<!-- footer -->
<?php
include 'footer.php';

?>
