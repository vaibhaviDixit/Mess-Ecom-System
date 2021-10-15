        <!-- nav -->
    <?php

        include 'nav.php';

    ?>
    <!-- nav ends -->

<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span>Our Popular Meals</span>
                    <h3>spicy noodles</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                    <a href="#" class="custombtn">Order</a>
                </div>
                <div class="image">
                    <img src="images/home-img-1.png" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>Our Popular Meals</span>
                    <h3>fried chicken</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                    <a href="#" class="custombtn">Order</a>
                </div>
                <div class="image">
                    <img src="images/home-img-1.png" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>Our Popular Meals</span>
                    <h3>hot pizza</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                    <a href="#" class="custombtn">Order</a>
                </div>
                <div class="image">
                    <img src="images/home-img-3.png" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>
   

</section>
  
<!-- home section ends -->

<!-- dishes section starts  -->

<section class="dishes" id="">

    <h3 class="sub-heading"> Popular Dishes </h3>
    <h1 class="heading"> Delicious Dishes </h1>

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



    <div class="container-fluid row">

         
        
            <?php
                //select all active categories 
                $cate=mysqli_query($con,"select * from category where status=1");
            ?>
            <div class="col-md-3 fs-2">
            <form method="post">
               <ul class="list-group categories">
                    <li class="list-group-item disabled" aria-disabled="true">Categories</li>

                    <?php
                    while ($cate_row=mysqli_fetch_assoc($cate) ) {
                        $class='list-group-item d-flex justify-content-between align-items-start list-group-item-action ';
                        $categoryId=$cate_row['id'];
                        //get number of items in  particular category
                        $num=mysqli_num_rows(mysqli_query($con,"select * from meals where meals.mealType='$categoryId'"));

                        echo "<a href='javascript:void(0)' class='fetchMeals ".$class."' data-id='".$cate_row['id']."'>".$cate_row['name']." <div><span class='badge bg-primary rounded-pill'>".$num."</span></div> </a> ";
                       
                        
                    }
                    ?>
                </ul>
            </form>
            </div>

            <!-- Tab panes -->
            <div class="tab-content col-md-9 displayMeals">

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
    <h1 class="heading">Subscription Plans</h1>

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

    <div >

        <div class="row displayTiffins">
                          <?php 
                $subs=mysqli_query($con,"select * from subscriptions");
                $plans=mysqli_fetch_assoc($subs);

                ?>
                <div class="col-sm-4"> 
                    <div class="card">
                      <div class="card-header fs-2 fw-bold">
                        15 Days Plan
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fs-3 fw-bold">&#8377;<?php echo $plans['15Days']; ?></h5>
                        <p class="card-text fs-4"><?php echo $plans['description']; ?></p>
                        <a href="#" class="custombtn">Subscribe</a>
                      </div>
                    </div>
                </div>

                <div class="col-sm-4"> 
                    <div class="card">
                      <div class="card-header fs-2 fw-bold">
                        Weekly Plan
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fs-3 fw-bold">&#8377;<?php echo $plans['weekly']; ?></h5>
                        <p class="card-text fs-4"><?php echo $plans['description']; ?></p>
                        <a href="#" class="custombtn">Subscribe</a>
                      </div>
                    </div>
                </div>

                <div class="col-sm-4"> 
                    <div class="card">
                      <div class="card-header fs-2 fw-bold">
                       Monthy Plan
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fs-3 fw-bold">&#8377;<?php echo $plans['monthly']; ?></h5>
                        <p class="card-text fs-4"><?php echo $plans['description']; ?></p>
                        <a href="#" class="custombtn">Subscribe</a>
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

    <div class="container mx-auto mt-5" >
        
        <nav class="fs-2 m-5">
          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
            <button class="nav-link active" id="milk-tab" data-bs-toggle="tab" data-bs-target="#milk" type="button" role="tab" aria-controls="milk" aria-selected="true">Milk</button>

            <button class="nav-link" id="shrikhand-tab" data-bs-toggle="tab" data-bs-target="#shrikhand" type="button" role="tab" aria-controls="shrikhand" aria-selected="false">Shrikhand</button>

            <button class="nav-link" id="IceCream-tab" data-bs-toggle="tab" data-bs-target="#IceCream" type="button" role="tab" aria-controls="IceCream" aria-selected="false">IceCream</button>

            <button class="nav-link" id="Paneer-tab" data-bs-toggle="tab" data-bs-target="#Paneer" type="button" role="tab" aria-controls="Paneer" aria-selected="false">Paneer</button>

            <button class="nav-link" id="curd-tab" data-bs-toggle="tab" data-bs-target="#curd" type="button" role="tab" aria-controls="curd" aria-selected="false">Curd</button>
          </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active dishes" id="milk" role="tabpanel" aria-labelledby="milk-tab">
             <div class="box-container">
        


                <div class="box">
                <img src="images/dish-2.png" alt="">
                <h3>Milk</h3>
                <span>&#8377;50/Ltr</span>
                 <div class="quantity">
                       <span class="dec">-</span>
                       <span class="qty-input" id="qty">1</span>
                       <span class="inc">+</span>
                </div>
                <a href="#" class="custombtn addCart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            
              </div>
         </div>

      </div>
      <div class="tab-pane fade" id="shrikhand" role="tabpanel" aria-labelledby="shrikhand-tab">shrikhand</div>
      <div class="tab-pane fade" id="IceCream" role="tabpanel" aria-labelledby="IceCream-tab">icecream</div>
       <div class="tab-pane fade" id="Paneer" role="tabpanel" aria-labelledby="Paneer-tab">paneer</div>
       <div class="tab-pane fade" id="curd" role="tabpanel" aria-labelledby="curd-tab">curd</div>
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
                         <img src="images/menu-6.jpg" class="card-img-top" alt="..." style="height: 15rem;object-fit: cover;">
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
                         <img src="images/menu-4.jpg" class="card-img-top" alt="..." style="height: 15rem; object-fit: cover;">
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
 








