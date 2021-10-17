

 <!-- nav -->
    <?php

        include 'nav.php';

        if(!isset($_SESSION['CURRENT_USER'])){
             redirect("index.php");
             die();
        }


    ?>
    <!-- nav ends -->

<!-- about section starts  -->
<div class="pt-5 mt-5">

<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> Get Membership </h3>
   

    
    
</section>

</div>
<!-- review section ends -->

<!-- footer -->
    <?php

        include 'footer.php';
    ?>
  


