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

    if (isset($_GET['id']) && isset($_GET['duration']))
    {
        $subId = getSafeVal($_GET['id']);
        $subDuration = getSafeVal($_GET['duration']);
        $Date=date('d-m-Y');
        $subDate=getSubscribeInterval($Date,$subDuration);
        $query = mysqli_query($con, "select * from subscriptions where id='$subId'");
        if (mysqli_num_rows($query) > 0)
        {
            $row = mysqli_fetch_assoc($query);
        }
        $userRow = userRow();

    }
    if (isset($_POST['subscribeFormSubmit']))
    {
        $UserName = getSafeVal($_POST['name']);
        $UserPhone = getSafeVal($_POST['phone']);
        $UserAddress = getSafeVal($_POST['address']);
        $price = $row[$subDuration];

        $image_condition = "";
        $blank = "NA";

        if ($_FILES['adhar']['name'] != "")
        {
            $adharType = $_FILES['adhar']['type'];

            if ($adharType != "image/jpeg" && $adharType != "image/png" && $adharType != "image/jpg" && $adharType != "application/pdf")
            {
                $msg = "Invalid image format";
            }
            else
            {

                $adhar = rand(111111111, 999999999) . '_' . $_FILES['adhar']['name'];
                move_uploaded_file($_FILES['adhar']['tmp_name'], SERVER_DOC_IMAGE . $adhar);
                $image_condition = $image_condition . ",'$adhar' ";

            }

        }
        else
        {
            $image_condition = $image_condition . ",'$blank' ";
        }

        if ($_FILES['pan']['name'] != "")
        {

            $panType = $_FILES['pan']['type'];

            if ($panType != "image/jpeg" && $panType != "image/png" && $panType != "image/jpg" && $panType != "application/pdf")
            {
                $msg = "Invalid image format";
            }
            else
            {

                $pan = rand(111111111, 999999999) . '_' . $_FILES['pan']['name'];
                move_uploaded_file($_FILES['pan']['tmp_name'], SERVER_DOC_IMAGE . $pan);
                $image_condition = $image_condition . ",'$pan' ";

            }

        }
        else
        {
            $image_condition = $image_condition . ",'$blank' ";
        }

        if ($_FILES['photo']['name'] != "")
        {

            $photoType = $_FILES['photo']['type'];

            if ($photoType != "image/jpeg" && $photoType != "image/png" && $photoType != "image/jpg" && $photoType != "application/pdf")
            {
                $msg = "Invalid image format";
            }
            else
            {

                $photo = rand(111111111, 999999999) . '_' . $_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'], SERVER_DOC_IMAGE . $photo);
                $image_condition = $image_condition . ",'$photo' ";

            }

        }
        else
        {
            $image_condition = $image_condition . ",'$blank' ";
        }
        
    }

}

?>
    <!-- nav ends -->

<div class="pt-5 mt-5">
<section class="review" id="review">

    <h3 class="sub-heading"> Get Membership </h3>
    <br>

                    <?php
if (strlen($msg) > 0)
{
?>
                    <div class="alert alert-danger" role="alert" >  <?php echo $msg; ?> </div>
                    <?php
}

?>

    <div class="row">
        <div class="col-sm-7">
    <form id="subscribeForm" method="post" enctype="multipart/form-data" name="subscribeForm" action="<?php echo SITE_PATH; ?>pgRedirect">
        <!--  -->
        <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo 'MESSECOM'.rand(1000,9999).'_'.$_SESSION['CURRENT_USER']; ?>" hidden>
        <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo rand(1000,9999).'_'.$_SESSION['CURRENT_USER']; ?>" hidden>
        <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" hidden value="Retail">
        <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" hidden>
        <input title="TXN_AMOUNT" id="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" hidden value="<?php echo $row[$subDuration]; ?>">
        <input title="PAYFOR" id="PAYFOR" tabindex="10" type="text" name="PAYFOR" hidden value="TIFFINCHECKOUT">

        <input type="text" name="subName" value="<?php echo $row['subscriptionName']; ?>" hidden>
        <input type="text" name="subDuration"  value="<?php echo $subDuration; ?>" hidden>
        <!--  -->
      <div class="mb-3">
        <label for="userName" class="form-label">Name<span class="redStar">*</span></label>
        <input type="text" class="form-control" id="userName" name="name" value="<?php echo $userRow['name']; ?>" readonly required>
      </div>
      
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
                  <button id="verifyOTPWalaBtn" class="btn btn-primary " onclick="verifySubOTP(document.subscribeForm.userOTP.value)"><span class="round"></span>Verify</button>
                </div>
                <div class="col-sm-4"><button id="sendOTPWalaBtn" class="btn btn-primary" onclick="checkoutOtp(document.subscribeForm.userPhone.value)" >Send OTP</button></div>
       
            </div>
            
          </div>
        
      <div class="mb-3">
        <label class="form-label" for="userAddress">Tiffin Delivery Address<span class="redStar">*</span></label>
        <textarea class="form-control" id="userAddress" name="userAddress" rows="3" required></textarea>
      </div>
      <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="adhar" class="form-label">Adhar Card</label>
                                    <input class="form-control form-control-sm" type="file" id="adhar" name="adhar">
                                
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <label for="pan" class="form-label">PAN Card</label>
                                    <input class="form-control form-control-sm" type="file" id="pan" name="pan">
                                
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input class="form-control form-control-sm" type="file" id="photo" name="photo">
                                
                                </div>


        </div><br>
        <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top"  title="Please Verify mobile and then continue to payment">
            <button name="subscribeFormSubmit" type="submit" id="paymentButton" class="btn btn-primary fs-4 mb-5"  disabled>Proceed to Payment</button>
        </span>

          
  
    </form>    
        </div>
        <div class="plandesc col-sm-5">
            <h4 class="text-center">Your Plan<hr></h4>
                <div class="fs-2">
                     <h1 class="heading2">Type</h1>

                    <p><?php echo $row['subscriptionName']; ?></p>

                    <h1 class="heading2">Duration</h1>
                    <p><?php echo $subDuration.$subDate; ?></p>
            
                    <h1 class="heading2">Price</h1>
                    <p><?php echo $row[$subDuration]; ?></p>
               
                    <h1 class="heading2">Description</h1>
                    <p><?php echo $row['description']; ?></p>
                </div>
        </div>

    </div>
</section>
</div>
<!-- footer -->
<?php
include 'footer.php';
?>
