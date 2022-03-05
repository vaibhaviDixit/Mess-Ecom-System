        <!-- nav -->
    <?php

        include 'nav.php';

    ?>
    <!-- nav ends -->

<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

          <?php 
            $banner=mysqli_query($con,"select banner.*,meals.id,meals.mealName from banner,meals where banner.name=meals.id");
            if(mysqli_num_rows($banner)>0){
              while ($bannerRow=mysqli_fetch_assoc($banner)) {

          ?>

            <div class="swiper-slide slide banner-img">
                <div class="content">
                    <span>Our Popular Meals</span>
                    <h3><?php echo $bannerRow['mealName']; ?></h3>
                    <p><?php echo $bannerRow['description']; ?></p>
                    <!-- <a href="#" class="custombtn p-3">Order</a> -->
                </div>
                <div class="image">
                    <img  src="<?php echo SITE_MENU_IMAGE.$bannerRow['image']; ?>" alt="" class=" img-fluid">
                </div>
            </div>
            <?php
                } 
              }
            ?>


        </div>

        <div class="swiper-pagination"></div>

    </div>
   

</section>
  
<!-- home section ends -->

<!-- dishes section starts  -->

<section class="dishes" id="">

    <h3 class="sub-heading"> Popular Menus </h3>
    <h1 class="heading"> Delicious Menus </h1>

    <div class="box-container">

            <?php
                    //select menu items
                    $menuSql="select * from menu where status=1";
                    $menuItems=mysqli_query($con,$menuSql);
                    while($menuRow=mysqli_fetch_assoc($menuItems)){

           ?>
        


            <div class="box">
            <a href="javascript:void(0)" class="fas fa-heart"  onclick="addToFav(<?php  echo $menuRow['id']; ?>,'menu','add')"></a>
            <a  class="fas fa-eye desc" ></a>
            <img src="<?php echo SITE_MENU_IMAGE.$menuRow['menuPhoto'];  ?>" alt="">
            <h3><?php  echo $menuRow['menuName']; ?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>&#8377;<?php  echo $menuRow['menuPrice']; ?></span>
             <div class="quantity">
                   <span class="dec">-</span>
                   <span class="qty-input" id="menuQty<?php  echo $menuRow['id']; ?>">1</span>
                   <span class="inc">+</span>
            </div>
            <a href="javascript:void(0)" class="custombtn addCart"  onclick="addCartMeals(<?php  echo $menuRow['id']; ?>,'menu','add')"><i class="fas fa-shopping-cart"></i> Add to Cart</a>

            <div class="eyeClick">
                <a  class="fas fa-times remove"></a>
                <p> <?php  echo $menuRow['menuDesc']; ?> </p>

            </div>
        
          </div>
          <?php  } ?>




       
    
    </div>

</section>

<!-- Todays special section ends -->

<!-- Meals section -->

<section class="menu" id="meals">

    <h3 class="sub-heading">Our Meals</h3>
    <h1 class="heading">Our Specialities</h1>



    <div class="container-fluid">

         
        
            <?php
                //select all active categories 
                $cate=mysqli_query($con,"select * from category where status=1");
            ?>
            <div class="fs-2 categories text-center">
               
                    <?php
                    while ($cate_row=mysqli_fetch_assoc($cate) ) {
                        $categoryId=$cate_row['id'];
                        //get number of items in  particular category
                        $num=mysqli_num_rows(mysqli_query($con,"select * from meals where meals.mealType='$categoryId'"));

                        if(!intval($num)<=0){
                           echo "<a href='javascript:void(0)' class='fetchMeals ' data-id='".$cate_row['id']."'>".$cate_row['name']." <span class='badge bg-primary rounded-pill ms-2'>".$num."</span></a> ";
                        }                      
                    }
                    ?>
            
        
            </div>

            <!-- Tab panes -->
            <div class="tab-content displayMeals">

                    <?php

                             $mealsSql="select meals.*, subscriptions.subscriptionName from meals,subscriptions where meals.mealSubscription=subscriptions.id ";
                            $meals=mysqli_query($con,$mealsSql);
                    ?>
              
                    <div class="box-container">

                        <?php
                            while ($meals_row=mysqli_fetch_assoc($meals) ) {
                        ?>
                        <div class="box">
                            <div class="image">
                                <img src="<?php echo SITE_MENU_IMAGE.$meals_row['mealPhoto'];  ?>" alt="">
                                <a  class="fas fa-eye desc"></a>
                                <a href="javascript:void(0)" class="fas fa-heart" onclick="addToFav(<?php echo $meals_row['id']; ?>,'meal','add')"></a>
                            </div>
                            <div class="content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <h3> <?php echo $meals_row['subscriptionName'];  ?> </h3>
                                <h3> <?php echo $meals_row['mealName'];  ?> </h3>
                                <span class="price">&#8377; <?php echo $meals_row['mealPrice'];  ?></span>
                                <div class="quantity">
                                       <span class="dec">-</span>
                                       <span class="qty-input" id="mealQty<?php echo $meals_row['id']; ?>">1</span>
                                       <span class="inc">+</span>
                                </div>
                                <a href="javascript:void(0)" class="custombtn addCart" onclick="addCartMeals(<?php echo $meals_row['id']; ?>,'meal','add')"><i class="fas fa-shopping-cart"></i>  Add to Cart</a>

                            </div>

                                <div class="eyeClick">
                                    <a  class="fas fa-times remove"></a>
                                    <p>
                                        <?php echo $meals_row['mealDesc'];  ?>

                                    </p>

                                </div>
                                 
                     </div>
                     <?php } ?>
                     <!-- meal card ends -->


                    </div>

            </div>


    </div>

    

</section>

<!-- meals section ends -->

<!-- tiffins section starts  -->

<section  id="tiffins">


    <h3 class="sub-heading">Tiffins</h3>
    <h1 class="heading">Membership Plans</h1>

    <div class="container mx-auto mt-5" >
        
        <div class="fs-2 m-5">
            <div class="nav d-flex justify-content-center tiffinSection" >

              <?php 
                $tiffins=mysqli_query($con,"select * from subscriptions");
                while($subRow=mysqli_fetch_assoc($tiffins)){
              ?>

              <a href="javascript:void(0)" data-id="<?php echo $subRow['id']; ?>" class="fetchTiffins" ><?php echo $subRow['subscriptionName']; ?></a>
              <?php
                 }
               ?>

            </div>
       </div>

        <div class=" displayTiffins">
                          <?php 
                $subs=mysqli_query($con,"select * from subscriptions");
                $plans=mysqli_fetch_assoc($subs);

                ?>
                <div class="row">
                  <div class="col-sm-7 menuDesc">
                    <div id="dispMenu">
                        <h3 class="sub-heading">-Meal Plan-</h3>
                        <div class="fs-4" style="padding: 1rem 2rem; text-align: left;"><?php echo $plans['description']; ?></div>
                    </div>
                    
                  </div>
                  <div class="col-sm-5">
                    <div> 
                        <div class="card">
                          <div class="card-header fs-2 fw-bold">
                            15 Days Plan <small class="fs-6">(Student)</small>
                          </div>
                          <div class="card-body d-flex flex-wrap">
                            <h5 class="card-title fs-3 fw-bold">&#8377;<span class="subPrice"><?php echo $plans['15Days']; ?> </span> </h5>
                            <div class="mr1">
                              <form method="post">
                                <input type="text" name="subId" value="<?php echo $plans['id']; ?>" hidden>
                                <input type="text" name="subDuration" value="15Days" hidden>
                                 <input type="submit" value="Subscribe" name="subscribeTiffin" class="subscribebtn"></input>
                              </form>
                            </div>         
                          </div>
                        </div>
                    </div>

                    <div> 
                        <div class="card">
                          <div class="card-header fs-2 fw-bold">
                            Weekly Plan <small class="fs-6">(Student)</small>
                          </div>
                          <div class="card-body d-flex flex-wrap">
                            <h5 class="card-title fs-3 fw-bold">&#8377;<span class="subPrice"><?php echo $plans['weekly']; ?></span></h5>
                            <div class="mr1">
                              <form method="post">
                                <input type="text" name="subId" value="<?php echo $plans['id']; ?>" hidden>
                                <input type="text" name="subDuration" value="weekly" hidden>
                                 <input type="submit" value="Subscribe" name="subscribeTiffin" class="subscribebtn"></input>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div> 
                        <div class="card">
                          <div class="card-header fs-2 fw-bold">
                           Monthy Plan <small class="fs-6">(Student)</small>
                          </div>
                          <div class="card-body d-flex flex-wrap">
                            <h5 class="card-title fs-3 fw-bold">&#8377;<span class="subPrice"><?php echo $plans['monthly']; ?></span> </h5>
                            <div class="mr1">
                              <form method="post">
                                <input type="text" name="subId" value="<?php echo $plans['id']; ?>" hidden>
                                <input type="text" name="subDuration" value="monthly" hidden>
                                 <input type="submit" value="Subscribe" name="subscribeTiffin" class="subscribebtn"></input>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                  </div>
                </div>
              
        </div>

    </div>

   
</section>

<!-- tiffins section ends -->



<!-- Daily
 section starts  -->

 <section  id="daily">


    <h3 class="sub-heading">Products</h3>
    <h1 class="heading">Daily Products</h1>

    <div class="container-fluid" >
        
        <?php
                //select all active categories 
                $procate=mysqli_query($con,"select * from dailycate where status=1");
            ?>
            <div class="fs-2 proCate text-center">
          
                    <?php
                    while ($proCateRow=mysqli_fetch_assoc($procate) ) {
                        $cId=$proCateRow['id'];
                        //get number of items in  particular category
                        $numOfPro=mysqli_num_rows(mysqli_query($con,"select * from dailyproducts where dailyproducts.proCate='$cId'"));

                        if(!intval($numOfPro)<=0){

                          echo "<a href='javascript:void(0)' class='fetchProducts' data-id='".$proCateRow['id']."'>".$proCateRow['name']." <div><span class='badge bg-primary rounded-pill ms-2'>".$numOfPro."</span></div> </a> ";

                        }
                        
                    }
                    ?>
        
            </div>
 

    <div class="tab-content  displayProducts dishes">

                    <?php

                             $productsSql="select * from dailyproducts";
                            $products=mysqli_query($con,$productsSql);
                    ?>
              
                    <div class="box-container">

                        <?php
                            while ($products_row=mysqli_fetch_assoc($products) ) {
                        ?>
                        <div class="box">
                          <img src="<?php echo SITE_MENU_IMAGE.$products_row['proPhoto'];  ?>" alt="">
                          <h3><?php echo $products_row['proName'];  ?> </h3>
                          <p class="fs-4"><?php echo $products_row['proDesc'];  ?></p>
                          <span>&#8377;<?php echo $products_row['proPrice'];  ?></span>
                          <div class="quantity">
                                       <span class="dec">-</span>
                                       <span class="qty-input" id="dailyQty<?php echo $products_row['id']; ?>">1</span>
                                       <span class="inc">+</span>
                          </div>
                                <a href="javascript:void(0)" class="custombtn addCart" onclick="addCartMeals(<?php echo $products_row['id']; ?>,'daily','add')"><i class="fas fa-shopping-cart"></i>  Add to Cart</a>

                      
            
                       </div>

                     <?php } ?>
                     <!-- product card ends -->

                    </div>

      </div>


  </div>



   
</section>
<!-- daily section ends -->

<!-- offers & deals starts  -->

<section  id="offers">


    <h3 class="sub-heading"></h3>
    <h1 class="heading">Offers & Deals</h1>

    <div class="container mx-auto mt-5" >
        
        <nav class="fs-2 m-5">
          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">

            <button class="nav-link active" id="corporate-tab" data-bs-toggle="tab" data-bs-target="#corporate" type="button" role="tab" aria-controls="corporate" aria-selected="true">Corporate</button>

            <button class="nav-link" id="bulkorders-tab" data-bs-toggle="tab" data-bs-target="#bulkorders" type="button" role="tab" aria-controls="bulkorders" aria-selected="false">Bulk Orders</button>

          </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="corporate" role="tabpanel" aria-labelledby="corporate">


                <div class="row">
                  <div class="col-sm-6">
                    <div class="card">
                         <img src="<?php echo SITE_PATH; ?>asset/images/menu-6.jpg" class="card-img-top" alt="..." style="height: 15rem;object-fit: cover;">
                      <div class="card-body">
                        <h5 class="card-title">Breakfast</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <p>Rs. 40/</p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card">
                         <img src="<?php echo SITE_PATH; ?>asset/images/menu-4.jpg" class="card-img-top" alt="..." style="height: 15rem; object-fit: cover;">
                      <div class="card-body">
                        <h5 class="card-title">Barbecues</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <p>Rs. 250/plate</p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                      </div>
                    </div>
                  </div>
                </div>

                
        </div>

      <div class="tab-pane fade" id="bulkorders" role="tabpanel" aria-labelledby="bulkorders">
        bulk order
          
      </div>
    </div>

    </div>

   
</section>

<!-- offers & deals ends-->





<!-- footer -->
    <?php

        include 'footer.php';

    ?>
 








