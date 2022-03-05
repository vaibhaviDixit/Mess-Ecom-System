<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include 'nav.php';
if (!isset($_SESSION['CURRENT_USER']))
{
    redirect(SITE_PATH);
    die();
}
else
{
    $msg = "";
    $userRow = userRow();

    if(count($cart_array) >0){
      $cartPrice=0;
      foreach ($cart_array as $key => $value) {
          $cartPrice=$cartPrice+intval($value['subtotal']);
      }
    }
    $uid=$_SESSION['CURRENT_USER'];

    if (isset($_POST['chkoutFormSubmit']))
    {
        $ORDER_ID= getSafeVal($_POST['ORDER_ID']);
        $TXN_AMOUNT= getSafeVal($_POST['TXN_AMOUNT']);
        $userAddress= getSafeVal($_POST['userAddress']);
        $userPhone= getSafeVal($_POST['userPhone']);
        $userPIN= getSafeVal($_POST['userPIN']);
        $payMethod= getSafeVal($_POST['payMethod']);

        if($payMethod=="cod"){
          $run_order=mysqli_query($con,"INSERT INTO `orders`(`orderId`, `userId`, `phone`,`address`, `pincode`, `payment_type`, `total`, `order_status`, `payment_status`) VALUES ('$ORDER_ID','$uid','$userPhone','$userAddress','$userPIN','$payMethod','$TXN_AMOUNT','1','success')");

          foreach ($cart_array as $key => $value) {
          
            $product_id=$value['id'];
            $product_type=$value['mealType'];
            $product_qty=$value['qty'];
            $price=$value['subtotal'];


            $run_orderDetails=mysqli_query($con,"INSERT INTO `orderdetails`(`orderId`,`uid`,`product_id`, `product_type`, `product_qty`, `price`) VALUES ('$ORDER_ID','$uid','$product_id','$product_type','$product_qty','$price')");

          }
          

          if($run_order && $run_orderDetails){
              redirect(SITE_PATH.'orderSuccess');
          }
        }
        if($payMethod=="online"){
                            
      echo '<form id="chkOutFormonline" name="chkOutFormonline" method="post" action="'.SITE_PATH.'pgRedirect">
        <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="MESSORDER'.time().'_'.$uid.'" hidden>
        <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="'.time().'_'.$uid.'" hidden>
        <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" hidden value="Retail">
        <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" hidden>
        <input title="TXN_AMOUNT" id="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" hidden value="'.$cartPrice.'">
        <input title="PAYFOR" id="PAYFOR" tabindex="10" type="text" name="PAYFOR" hidden value="ORDERCHECKOUT">
        <input title="userAddress" id="userAddress" tabindex="10" type="text" name="userAddress" hidden value="'.$userAddress.'">
        <input title="userPhone" id="userPhone" tabindex="10" type="text" name="userPhone" hidden value="'.$userPhone.'">
        <input title="userPIN" id="userPIN" tabindex="10" type="userPIN" name="userPIN" hidden value="'.$userPIN.'">
    </form>
   <script type="text/javascript">document.chkOutFormonline.submit();</script>';

          
        }       
    }

}


?>
    <!-- nav ends -->

<div class="pt-5 mt-5">
<section class="review" id="review">

    <h3 class="sub-heading"> Place Order </h3>
    <br>

                    <?php
                    if (strlen($msg) > 0)
                    {
                    ?>
                    <div class="alert alert-danger" role="alert" >  <?php echo $msg; ?> </div>
                    <?php
                    }

                    ?>

    <div class="row" style="width: 80%; margin: 0 auto;">
        <div class="col-sm-7">
    <form id="chkOutForm" name="chkOutForm" method="post">
        
        <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo 'MESSORDER'.time().'_'.$_SESSION['CURRENT_USER']; ?>" hidden>
        
        <input title="TXN_AMOUNT" id="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" hidden value="<?php echo $cartPrice; ?>">

        <!--  -->
      
          <div class="mb-3">
            <label for="userPhone" class="form-label">Phone<span class="redStar">*</span></label>
            <div class="row">
                <div class="col-sm-4">
                  <input type="text" class="form-control"  name="userPhone" id="userPhone" value="<?php echo $userRow['phone']; ?>" required >
                  <div id="recaptcha-container"></div>
                 <span id="phVerifyMsg" class="text-danger fw-bold"></span>
                </div>
                <div class="col-sm-4 otpBox" style="display: none;">
                  <input type="text" class="form-control" id="userOTP" placeholder="Enter OTP">
                  <span id="OTPVerifyMsg" class="text-danger fw-bold"></span>
                </div>
                <div class="col-sm-4 otpBox" style="display: none;">
                  <button id="verifyOTPWalaBtn" class="btn btn-primary " onclick="verifyOrderChkOTP(document.chkOutForm.userOTP.value)"><span class="round"></span>Verify</button>
                </div>
                <div class="col-sm-4">
                  <button id="sendOTPWalaBtn" class="btn btn-primary" onclick="orderChkOutOtp(document.chkOutForm.userPhone.value)"  >Send OTP</button>
                </div>
       
            </div>
            
          </div>
        
      <div class="mb-3">
        <label class="form-label" for="userAddress">Delivery Address<span class="redStar">*</span></label>
        <textarea class="form-control" id="userAddress" name="userAddress" rows="3" required></textarea>
      </div>
      <div class="mb-3 col-sm-4">
        <label for="userPIN" class="form-label">Pin Code<span class="redStar">*</span></label>
        <input type="text" class="form-control" id="userPIN" name="userPIN" required>
      </div>
      <div class="mb-3">

        <label class="form-label">Select Payment Option<span class="redStar">*</span></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="payMethod" id="inlineRadio1" value="cod" required>
          <label class="form-check-label" for="inlineRadio1">Cash On Delivery</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="payMethod" id="inlineRadio2" value="online" required>
          <label class="form-check-label" for="inlineRadio2">Online</label>
        </div>
      </div>

        <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top"  title="Please Verify mobile and then continue to payment">
            <button name="chkoutFormSubmit" type="submit" id="paymentButton" class="btn btn-primary fs-4 mb-5"  disabled>Proceed to Payment</button>
        </span>

    </form>    
        </div>
        <div class="plandesc col-sm-5">
            <h4 class="text-center fw-bold border-bottom mb-5">Order Summary</h4>
            <div class="orderSumry">
            <?php
                if(count($cart_array) >0  ){
                    
                    foreach ($cart_array as $key => $value) {
                    if($value['mealType']=="meal"){
                        $id=$value['id'];
                         $mealsSql="select * from meals where id='$id'";
                         $meals=mysqli_query($con,$mealsSql);
                         while ($meals_row=mysqli_fetch_assoc($meals) ){
                            ?>
                             <div class="product">
                                <div class="cartimg">
                                    <img src="<?php echo SITE_MENU_IMAGE.$meals_row['mealPhoto'];  ?>" alt="" class="img-fluid rounded ">
                                </div>
                                <div class="cartProDesc">
                                  <b class="product-name"><?php echo $meals_row['mealName'];  ?></b><br>
                                        <span class="product-price">&#8377;<?php echo $meals_row['mealPrice'];?> x <?php echo $value['qty'];  ?></span>
                                </div>
                                        
                                     <button class="product-remove btn btn-danger btn-sm" onclick="addCartMeals('<?php echo $id; ?>','meal','chkremove')" >
                                             <i class="fa fa-trash"></i>
                                         </button>
                             </div>

            <?php

                         }
                    }

                    if($value['mealType']=="daily"){
                        $id=$value['id'];
                         $dailySql="select * from dailyproducts where id='$id'";
                         $daily=mysqli_query($con,$dailySql);
                         while ($dailyRow=mysqli_fetch_assoc($daily) ){
                            ?>

                             <div class="product">
                                <div class="cartimg">
                                    <img src="<?php echo SITE_MENU_IMAGE.$dailyRow['proPhoto'];  ?>" alt="" class="img-fluid rounded">
                                </div>
                                <div class="cartProDesc">
                                        <b class="product-name"><?php  echo $dailyRow['proName']; ?></b><br>
                                        <span class="product-price">&#8377;<?php  echo $dailyRow['proPrice']; ?> x <?php echo $value['qty'];  ?></span>
                                </div>
                                     <button class="product-remove btn btn-sm btn-danger" onclick="addCartMeals('<?php echo $id; ?>','daily','chkremove')">
                                             <i class="fa fa-trash"></i>
                                         </button>
                             </div>

    


            <?php

                         }
                    }

                    if($value['mealType']=="menu"){
                        $id=$value['id'];
                         $menuSql="select * from menu where id='$id'";
                         $menu=mysqli_query($con,$menuSql);
                         while ($menuRow=mysqli_fetch_assoc($menu) ){
                            ?>

                             <div class="product">
                                    <div class="cartimg">
                                        <img src="<?php echo SITE_MENU_IMAGE.$menuRow['menuPhoto'];  ?>" alt="" class="img-fluid rounded">
                                    </div>
                                    <div class="cartProDesc">
                                        <b class="product-name"><?php  echo $menuRow['menuName']; ?></b><br>
                                        <span class="product-price">&#8377;<?php  echo $menuRow['menuPrice']; ?> x <?php echo $value['qty'];  ?></span>
                                    </div>
                
                                      <button class="product-remove btn btn-sm btn-danger" onclick="addCartMeals('<?php echo $id; ?>','menu','chkremove')">
                                             <i class="fa fa-trash"></i>
                                      </button>
                             </div>

            <?php

                         }
                    }
                }
                
                ?>
                <div class="border-top mt-4 fs-5">
                  <b class="">ORDER TOTAL</b>
                    <b class='ms-3'>    &#8377; <?php echo $cartPrice; ?></b>

    
                </div>
            </div>
 
        </div>

            <?php
            }
            else{
                redirect(SITE_PATH);
            }

            ?>

                   
                </div>
        </div>

    </div>
</section>
</div>
<!-- footer -->
<?php
include 'footer.php';
?>
