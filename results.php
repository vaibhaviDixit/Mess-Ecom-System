        <!-- nav -->
    <?php

        include 'nav.php';

        if(isset($_GET['query'])){
          $q=getSafeVal($_GET['query']);

        }
        else{
          redirect(SITE_PATH);
        }
        $yes=0;

    ?>
    <!-- nav ends -->

<!-- Meals section -->

<section class="menu pt-5 mt-5" id="meals">

    <?php

                            $mealsSql="select * from meals where meals.mealName like '%$q%' or meals.mealDesc like '%$q%' and meals.status=1 ";

                            $cateWise="select meals.*,category.name from meals,category where category.id=meals.mealType and category.name like '%$q%' ";
                   

                            $meals=mysqli_query($con,$mealsSql);
                            $menus=mysqli_query($con,"select * from menu where menuName like '%$q%' or menuDesc like '%$q%' and status=1");
                            $dailyPro=mysqli_query($con,"select * from dailyproducts where proName like '%$q%' or proDesc like '%$q%'and status=1");

                            $fetchCateWise=mysqli_query($con,$cateWise);

                            $row1=intVal(mysqli_num_rows($meals));
                            $row2=intVal(mysqli_num_rows($menus));
                            $row3=intVal(mysqli_num_rows($dailyPro));
                            $row4=intVal(mysqli_num_rows($fetchCateWise));
                            $countRows=$row1+$row2+$row3+$row4;
                            if($countRows<=0){
                              ?>
                               <h3 class="sub-heading mt-5"><em>Results Not Found</em></h3>
                              <?php
                            }
                            else{
    ?>

    <h3 class="sub-heading mt-5">Search Results For:<em><?php echo $q; ?></em></h3>
    <hr/>

    <div class="container-fluid pt-3">
            <div class="tab-content displayMeals">
              
                    <div class="box-container">
                    <!-- meals start -->
                        <?php
                            while ($meals_row=mysqli_fetch_assoc($meals) ) {
                              $yes=1;
                        ?>
                        <div class="box">
                            <div class="image">
                                <img src="<?php echo SITE_MENU_IMAGE.$meals_row['mealPhoto'];  ?>" alt="">
                            </div>
                            <div class="content">
                                <h3> <?php echo $meals_row['mealName'];  ?> </h3>
                                <span class="price">&#8377; <?php echo $meals_row['mealPrice'];  ?></span>
                                <div class="quantity">
                                       <span class="dec">-</span>
                                       <span class="qty-input" id="mealQty<?php echo $meals_row['id']; ?>">1</span>
                                       <span class="inc">+</span>
                                </div>
                                <a href="javascript:void(0)" class="custombtn addCart" onclick="addCartMeals(<?php echo $meals_row['id']; ?>,'meal','add')"><i class="fas fa-shopping-cart"></i>  Add to Cart</a>

                            </div>
                                 
                     </div>
                     <?php } ?>
                     <!-- meal ends -->

                       <!-- category start -->
                        <?php
                          if($yes==0)
                          {
                            while ($meals_row=mysqli_fetch_assoc($fetchCateWise) ) {
                        ?>
                        <div class="box">
                            <div class="image">
                                <img src="<?php echo SITE_MENU_IMAGE.$meals_row['mealPhoto'];  ?>" alt="">
                            </div>
                            <div class="content">
                                <h3> <?php echo $meals_row['mealName'];  ?> </h3>
                                <span class="price">&#8377; <?php echo $meals_row['mealPrice'];  ?></span>
                                <div class="quantity">
                                       <span class="dec">-</span>
                                       <span class="qty-input" id="mealQty<?php echo $meals_row['id']; ?>">1</span>
                                       <span class="inc">+</span>
                                </div>
                                <a href="javascript:void(0)" class="custombtn addCart" onclick="addCartMeals(<?php echo $meals_row['id']; ?>,'meal','add')"><i class="fas fa-shopping-cart"></i>  Add to Cart</a>

                            </div>
                                 
                     </div>
                     <?php } } ?>
                     <!-- category ends -->

                      <!-- menu start -->
                        <?php
                            while ($menu_row=mysqli_fetch_assoc($menus) ) {
                        ?>
                        <div class="box">
                            <div class="image">
                                <img src="<?php echo SITE_MENU_IMAGE.$menu_row['menuPhoto'];  ?>" alt="">
                            </div>
                            <div class="content">
                                <h3> <?php echo $menu_row['menuName'];  ?> </h3>
                                <span class="price">&#8377; <?php echo $menu_row['menuPrice'];  ?></span>
                                <div class="quantity">
                                       <span class="dec">-</span>
                                       <span class="qty-input" id="menuQty<?php echo $menu_row['id']; ?>">1</span>
                                       <span class="inc">+</span>
                                </div>
                                <a href="javascript:void(0)" class="custombtn addCart" onclick="addCartMeals(<?php echo $menu_row['id']; ?>,'menu','add')"><i class="fas fa-shopping-cart"></i>  Add to Cart</a>

                            </div>
                                 
                     </div>
                     <?php } ?>
                     <!-- menu ends -->

                     <!-- dailt pro start -->
                        <?php
                            while ($dailyPro_row=mysqli_fetch_assoc($dailyPro) ) {
                        ?>
                        <div class="box">
                            <div class="image">
                                <img src="<?php echo SITE_MENU_IMAGE.$dailyPro_row['proPhoto'];  ?>" alt="">
                            </div>
                            <div class="content">
                                <h3> <?php echo $dailyPro_row['proName'];  ?> </h3>
                                <span class="price">&#8377; <?php echo $dailyPro_row['proPrice'];  ?></span>
                                <div class="quantity">
                                       <span class="dec">-</span>
                                       <span class="qty-input" id="dailyQty<?php echo $dailyPro_row['id']; ?>">1</span>
                                       <span class="inc">+</span>
                                </div>
                                <a href="javascript:void(0)" class="custombtn addCart" onclick="addCartMeals(<?php echo $dailyPro_row['id']; ?>,'daily','add')"><i class="fas fa-shopping-cart"></i>  Add to Cart</a>

                            </div>
                                 
                     </div>
                     <?php } ?>
                     <!-- daily pro ends -->


                    </div>

            </div>


    </div>

    <?php
      }
    ?>

</section>

<!-- meals section ends -->






<!-- footer -->
    <?php

        include 'footer.php';

    ?>
 








