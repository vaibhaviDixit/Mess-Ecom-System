
    <?php

        include 'nav.php';

    ?>
    <!-- nav ends -->

<!-- about section starts  -->
<div class="pt-5 mt-5">
<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="<?php echo SITE_PATH; ?>asset/images/about-img.png" alt="">
        </div>

        <div class="content">
            <h3>Best meal</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio corporis nihil!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque deleniti iste alias, eum natus.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Free Delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Easy Payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 Service</span>
                </div>
            </div>
            <a href="#" class="custombtn">Load more</a>
        </div>

    </div>

</section>
</div>


<!-- footer -->
    <?php

        include 'footer.php';

    ?>
<script type="text/javascript">
    

    let getnavlinks = document.querySelectorAll('header .navbar a');
    getnavlinks.forEach(link=>{
        link.classList.remove('active');
    });
    $("header .navbar #aboutNav").addClass("active");

</script>

