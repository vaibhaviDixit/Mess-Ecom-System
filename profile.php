<!-- nav -->
<?php

        include 'userNav.php';
        $name=$userDetails['name'];
        $email=$userDetails['email'];
        $phone=$userDetails['phone'];
        $profile=$userDetails['profile'];
    	$uid=$_SESSION['CURRENT_USER'];

        //update user profile
if(isset($_POST['userUpdate'])){
	
	$newname=$_POST['name'];
    $newemail=$_POST['email'];
    $newphone=$_POST['phone'];
    $SqlStatus=mysqli_query($con,"update `user` set `name`='$newname', `email`='$newemail', `phone`='$newphone' where id='$uid' ");
   if($SqlStatus){
            unset($_POST['userUpdate']);
            echo '<script type="text/javascript">swal("Profile Updated Successfully..!","","success").then(function(){window.location.href=window.location.href;});</script>';

       }
}
if(isset($_FILES['userProfileImg'])){

  $type=$_FILES['userProfileImg']['type'];

  if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
         unset($_FILES['userProfileImg']);
         echo '<script type="text/javascript">swal("Invalid image format..!","","error").then(function(){window.location.href=window.location.href;});</script>';
   }
   else{

        $userProfileImg=rand(111111111,999999999).'_'.$_FILES['userProfileImg']['name'];
        move_uploaded_file($_FILES['userProfileImg']['tmp_name'],SERVER_PROFILE_IMAGE.$userProfileImg);
        mysqli_query($con,"update `user` set profile='$userProfileImg' where id='$uid'");
        
           
        redirect(SITE_PATH.'profile');
   }

  
}
 
?>
<!-- Page content holder -->
<div class="page-content" id="content">

<div class="profilepg container mt-3">
	<div class="row">
		<div class="col-md-4 text-center mt-5">
			<div class="Profile-links">
				<div class="">

				    	<img src="<?php  echo SITE_PROFILE_IMAGE.$profile; ?>" onerror="this.onerror=null;this.src=`<?php  echo $profile; ?>`;" alt="profile" class="img-fluid rounded" width="200" height="200">
				    
				</div>
				<span class="d-block fw-bolder fs-4 mt-3"><?php echo $name; ?></span>
				<br>
				 <form method="post" enctype="multipart/form-data">
					<input type="file" name="userProfileImg" id="userProfileImg" accept="image/*" onchange="this.form.submit();" hidden>
					<label for="userProfileImg" > <span role="button" class="badge bg-primary fs-6 rounded-pill">Change Profile <i class="fas fa-greater-than" style="font-size: 11px;"></i></span></label>
				</form>

			</div>
		</div>
	<div class="col-md-8">
			<form method="post" name="chkOutForm" id="chkOutForm">
			<div class="user-details">
				<div class="title">Basic Information</div>
			<div class="input-box">
			<span class="details">Name</span>
			<input type="text" placeholder="Enter your name" name="name" required value="<?php echo $name; ?>">
			</div>
			</br>

			<div class="input-box">
			<span class="details">Email</span>
			<input type="text"placeholder="Enter your email" required name="email" value="<?php echo $email; ?>" readonly>
			</div>
			</br>
			<div class="row">
                <div class="col-sm-4">
                  <div class="input-box">
					<span class="details">Phone Number</span>
					<input type="text"placeholder="Enter your number" required name="phone" id="userPhone" value="<?php echo $phone; ?>">
				  </div>
                  <div id="recaptcha-container"></div>
                 <span id="phVerifyMsg" class="text-danger fw-bold"></span>
                </div>
                <div class="col-sm-4 otpBox  mt-4" style="display: none;">
                  <input type="text" class="form-control" id="userOTP" placeholder="Enter OTP">
                  <span id="OTPVerifyMsg" class="text-danger fw-bold"></span>
                </div>
                <div class="col-sm-4 otpBox  mt-4" style="display: none;">
                  <button id="verifyOTPWalaBtn" class="btn btn-primary " onclick="verifyOrderChkOTP(document.chkOutForm.userOTP.value)"><span class="round"></span>Verify</button>
                </div>
                <div class="col-sm-4 mt-4">
                  <button id="sendOTPWalaBtn" class="btn btn-primary" onclick="orderChkOutOtp(document.chkOutForm.phone.value)">Send OTP</button>
                </div>
       
            </div>

			</div>

			<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top"  title="Please Verify mobile to continue">
				<button class="btn btn-primary ProfileButton" type="submit" id="paymentButton" name="userUpdate" disabled>Save & Update</button>
			</span>
			</form>
				

	</div>

</div>
</div>
    
</div>
</div>
<div>
	<script type="text/javascript">
		$(".nav .nav-item ").removeClass("activeNavItem");
		$(".nav .profileNav").addClass("activeNavItem");
	</script>
<!-- End demo content -->
<!-- footer -->
    <?php

        include 'footer.php';

    ?>
 