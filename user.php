
 <!-- nav -->
    <?php

        include 'nav.php';

    ?>
    <!-- nav ends -->
<!-- user section starts  -->


<div class="container-fluid mt-5 pt-5">


  <div class="user-profile mt-5 pt-5">
     
     <div class="d-flex justify-content-evenly align-items-center">
         <img src="images/pic-2.png" class="img-thumbnail img-fluid rounded-circle" alt="...">
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

        <div class="container-fluid row user-history justify-content-between">
        
                    <!-- Nav tabs -->
            <div class="col-md-3 activities ">
            <ul class="nav nav-tabs fs-3 flex-column">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#Orders"><i class="fas fa-shopping-bag"></i>Orders</a>
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

            <div class="tab-content col-md-8">
                    <div class="tab-pane container active" id="Orders">order</div>
                    <!-- favourites section starts -->
                    <div class="tab-pane container fade" id="Favourites">
                      
                       <h1 class="heading mt-5">My Favourites</h1>
                

                              <div class="container-fluid ">

                                  <div class="cart">

                                      <div class="products">
                                          
                                           <div class="product">
                                              <img src="images/menu-1.jpg" alt="" class="img-fluid">
                                              <div class="product-info">
                                                  <h3 class="product-name">Pohe</h3>
                                                  <h2 class="product-price">&#8377;60</h2>
                                                   <div class="quantity">
                                                             <span class="dec">-</span>
                                                              <span class="qty-input" id="qty">1</span>
                                                              <span class="inc">+</span>
                                                   </div>
                                                   <p class="product-remove btn btn-danger">
                                                       <i class="fa fa-trash"></i>
                                                       <span>Remove</span>
                                                   </p>
                                                    <p class="product-add btn btn-success">
                                                       <i class="fas fa-shopping-cart"></i>
                                                       <span>Add to Cart</span>
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
                                                              <span class="qty-input" id="qty">1</span>
                                                              <span class="inc">+</span>
                                                   </div>
                                                   <p class="product-remove btn btn-danger">
                                                       <i class="fa fa-trash"></i>
                                                       <span>Remove</span>
                                                   </p>
                                                    <p class="product-add btn btn-success">
                                                       <i class="fas fa-shopping-cart"></i>
                                                       <span>Add to Cart</span>
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
                                                              <span class="qty-input" id="qty">1</span>
                                                              <span class="inc">+</span>
                                                   </div>
                                                   <p class="product-remove btn btn-danger">
                                                       <i class="fa fa-trash"></i>
                                                       <span>Remove</span>
                                                   </p>
                                                    <p class="product-add btn btn-success">
                                                       <i class="fas fa-shopping-cart"></i>
                                                       <span>Add to Cart</span>
                                                   </p>

                                               </div>
                                          </div>

                                      </div>
                                      
                                  </div>

                      
                              </div>

                    </div>
                    <!-- favourites section ends -->
                    <div class="tab-pane container fade" id="Addresses">...</div>
                    <div class="tab-pane container fade" id="Notifications">...</div>
                    <!-- rate us tab starts -->
                    <div class="tab-pane container fade" id="Rate">
                      
                      <div class="container">
                        <div class="star-rating">
                          <ul class="d-flex justify-content-center">
                            <li class="star"><i class="fa fa-star"></i></li>
                            <li class="star"><i class="fa fa-star"></i></li>
                            <li class="star"><i class="fa fa-star"></i></li>
                            <li class="star"><i class="fa fa-star"></i></li>
                            <li class="star"><i class="fa fa-star"></i></li>

                          </ul>

                        </div>

                        <div class="rateMsg">
                          <textarea class="form-control form-control-lg" rows="10" placeholder="Feedback"></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-dark fs-4 mt-4">Post</button>
                        </div>

                      </div>

                    </div>
                    <!-- rate us tab ends -->
            </div>

    </div>

</div>
<!--  -->

<!-- footer -->
    <?php

        include 'footer.php';

    ?>
 