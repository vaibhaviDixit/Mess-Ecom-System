
<!-- footer section starts  -->
<div class="pt-5 mt-5">
<section class="footer">

    <div class="box-container">


         <div class="box">
            <h3><i class="fas fa-utensils"></i>Mess</h3>
            <p class="text-muted fs-4">Mess is an online platform for server customers across Ahmadnagar.</p>
            <h4 class="">Follow Us:</h4>
            <div class="social-icons fs-1 text-muted">
                <a href=""> <i class="fab fa-facebook p-3"></i> </a>
                <a href=""> <i class="fab fa-instagram p-3"></i></a>
                <a href=""> <i class="fab fa-whatsapp p-3"></i></a>
            </div>
        </div>

       

        <div class="box">
            <h3>quick links</h3>
            <a class="active" href="<?php echo SITE_PATH; ?>">Home</a>
            <a href="#meals">Meals</a>
            <a href="#tiffins">Tiffins</a>
            <a href="#daily">Daily</a>
            <a href="#offers">Offers & Deals</a>
            <a href="about">About</a>
            <a href="review">Reviews</a>
            
        </div>

        <div class="box">
            <h3>Location</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60307.12544509007!2d74.67842687910156!3d19.14292480000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdcbb66c6632be5%3A0xcbf4954913527147!2sChhappan%20Bhog%20Restaurant!5e0!3m2!1sen!2sin!4v1631872014575!5m2!1sen!2sin" width="250" height="200" style="border:0;" allowfullscreen="" class="img-fluid"></iframe>
        </div>


        <div class="box questions">
            <h3>Questions?</h3>

            <p class="fs-5">Drop us a line at <p>
             <a href="mailto:" ><i class="fas fa-envelope"></i> xyz@gmail.com</a>
            <hr>
            <p class="fs-5">Call us</p>
            <a href="tel:" ><i class="fas fa-phone-square-alt"></i>+91 9882548844</a>


        </div>

    </div>

    <div class="credit "> copyright @ 2021 by <span>.....</span> </div>

</section>
</div>
<!-- footer section ends -->

   <!-- footer -->


<!-- loader part  -->
<!-- <div class="loader-container">
    <img src="images/loader.gif" alt="">
</div> -->


<!-- custom js file link  -->
<script src="<?php echo SITE_PATH; ?>asset/js/script.js"></script>
<script src="<?php echo SITE_PATH; ?>asset/js/bootstrap.min.js"></script>

</body>
</html>

<?php 
 if(isset($_POST['subscribeTiffin'])){
        $subId=getSafeVal($_POST['subId']);
        $subDuration=getSafeVal($_POST['subDuration']);
        
        if(!isset($_SESSION['CURRENT_USER'])){
?>
            <script type="text/javascript">
                    swal("Login First!", "You are not logged in! Login to get Membership", "info");
            </script>
<?php
        }
        else{
           redirect(SITE_PATH."getMembership/".$subId."/".$subDuration);
        }
 }

?>













