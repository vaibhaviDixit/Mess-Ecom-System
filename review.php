

 <!-- nav -->
    <?php

        include 'nav.php';

    ?>
    <!-- nav ends -->

<!-- about section starts  -->
<div class="pt-5 mt-5">

<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> Customer's review </h3>
    <h1 class="heading"> What they say</h1>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">


            <?php 
              $fetchReviewsSql=mysqli_query($con,"select * from `reviews`");
              if(mysqli_num_rows($fetchReviewsSql)){
                while($reviewRow=mysqli_fetch_assoc($fetchReviewsSql)){
                    $rvid=$reviewRow['userId'];
                    $getUser=mysqli_fetch_assoc(mysqli_query($con,"select * from `user` where id='$rvid' "));
            ?>
                    <div class="swiper-slide slide">
                        <i class="fas fa-quote-right"></i>
                        <div class="user">
                            <img src="<?php  echo SITE_PROFILE_IMAGE.$getUser['profile']; ?>" onerror="this.onerror=null;this.src=`<?php  echo $getUser['profile']; ?>`;" alt="profile" class="img-fluid rounded" width="200" height="200">

                            <div class="user-info">
                                <h4><?php echo $getUser['name'];?></h4>
                                <div class="stars">
                                    <?php 
                                      $st=intval($reviewRow['stars']);
                                      for ($i=0; $i < $st; $i++) { 
                                        echo "<i class='fas fa-star'></i>";
                                      }
                                      $gray=5-$st;
                                      for($j=0;$j<$gray;$j++){
                                        echo "<i class='far fa-star'></i>";
                                      }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <p><?php echo $reviewRow['description'];?></p>
                    </div>
            <?php
                }//while ends
              }//if ends
            ?>

        </div>

    </div>
    
</section>

</div>
<!-- review section ends -->

<!-- footer -->
    <?php

        include 'footer.php';

    ?>
<script type="text/javascript">
    

    let getnavlinks = document.querySelectorAll('header .navbar a');
    getnavlinks.forEach(link=>{
        link.classList.remove('active');
    });
    $("header .navbar #reviewNav").addClass("active");

</script>

