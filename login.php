<?php

include 'nav.php';
//Include Configuration File
include('config.php');

if (isset($_SESSION['CURRENT_USER']))
{
    redirect(SITE_PATH.'profile');
}

if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);
  $google_service = new Google_Service_Oauth2($google_client);
  $data = $google_service->userinfo->get();
  if(!empty($data['given_name']) && !empty($data['family_name']) && !empty($data['email']) && !empty($data['picture']))
  {
   $name=$data['given_name'].$data['family_name'];
   $email=$data['email'];
   $profile=$data['picture'];
   $acknw=continueWithGoogle($name,$email,$profile);
   if($acknw=="success"){
     redirect(SITE_PATH.'profile');
   }
   else{
    ?>
    <script type="text/javascript">alert("Something Went Wrong!!");</script>
    <?php
   }

  }
 }

}


?>


<section>

  <div class="">

  <a href="<?php echo SITE_PATH; ?>" class="gotoWeb"><i class="fas fa-chevron-left"></i></a>

  <div class="userLoginReg">
    <div class ="card ">
      <div class="inner-box" id ="card">
        <div class="card-front">
         <h2>LOGIN</h2>

       <?php
  
    echo '<a class="text-light fw-bold btn bg-warning bg-gradient" href="'.$google_client->createAuthUrl().'"><i class="fab fa-google text-light"></i> Continue With Google</a>';
   
   ?>
    <div class="orlabel text-center my-3" style="position: relative;">
     <span class="fw-bold fs-5 divider" >OR</span>
   </div>
            <form  method="post" id="userLogin">
                 
         <span id="loginMsg"></span>

                  <div class="mb-3">
                    <label for="loginPhone" class="form-label">Phone Number</label>
                    <input type="text" name="loginPhone" class="  input-box" id="loginPhone"  required="" autocomplete="off">
                  </div>
                  <div id="recaptcha-container"></div>
                  <button type="submit"  class="btn submit-btn" id="loginBtn" > <span class="round " role="status" aria-hidden="true"></span>  Login</button>
                  <input type="text" class="  input-box" name="type" value="login" hidden>
              </form>
              <div class="mb-3" id="loginOTPContainer" style="display: none;" >
                    <label for="loginOTP" class="form-label">OTP</label>
                    <input type="text" name="loginOTP" class="  input-box" id="loginOTP" required="" autocomplete="off">
                     <button type="submit" name="login" id="verifyLoginBtn" class="btn submit-btn" onclick="verifyLogin()"><span class="round " role="status" aria-hidden="true"></span>  Verify OTP</button>
              </div>
        <button type="button" class="btn" onclick="openRegister()"> I'm New Here </button>
        <a href="">Forget Password ?</a>
        <a href="<?php echo SITE_PATH.'admin/sign-in'; ?>" class="text-primary">Admin Login</a>
      </div>
<!-- card front i.e login card ends -->
      <div class="card-back">
          <h2>REGISTER</h2>
                <?php
  
    echo '<a class="text-light fw-bold btn bg-warning bg-gradient" href="'.$google_client->createAuthUrl().'"><i class="fab fa-google text-light"></i> Continue With Google</a>';
   
   ?>
  <div class="orlabel text-center my-3" style="position: relative;">
     <span class="fw-bold fs-5 divider" >OR</span>
   </div>

     <form  method="post" id="userRegister">
               <span id="validation"></span>

                   <div class="mb-1">
                    <label for="regname" class="form-label">Name</label>
                    <input type="text" class="  input-box" id="regname"  name="regname" autocomplete="off">
                  </div>
                  <div class="mb-1">
                    <label for="regemail" class="form-label">Email address</label>
                    <input type="email" class="  input-box" id="regemail"  name="regemail" autocomplete="off">
                  </div>
                  <div class="mb-1">
                    <label for="regphone" class="form-label">Phone</label>
                    <input type="text" class="  input-box" id="regphone" name="regphone" autocomplete="off">
                  </div>
                  <div class="mb-1">
                    <label for="regaddress" class="form-label">Address</label>
                    <textarea type="text" class="  input-box" id="regaddress" name="regaddress" autocomplete="off"></textarea>
                  </div>
                  <div class="mb-1">
                    <button  type="submit" class="btn submit-btn" id="regBtn" onclick="return regValidation()" ><span class="reground " role="status" aria-hidden="true"></span> Continue</button>
                  </div>
                   <input type="text" class="  input-box" name="type" value="register" hidden>
                  
            </form>
                  
            <div class="mb-3" style="display: none;" id="otpContainer">

                    <label for="OTP" class="form-label">Enter OTP</label>
                    <input type="text" class="  input-box" id="OTP"  autocomplete="off">
                    <button type="submit" id="verifyRegBtn" onclick="verify()" class="btn submit-btn"><span class="reground " role="status" aria-hidden="true"></span> Register</button>

            </div>
            <button type="button" class="btn" onclick="openLogin()"> I've an Account</button>
           <a href="<?php echo SITE_PATH.'admin/sign-in'; ?>" class="text-primary">Admin Login</a>
         </div>
      <!-- register card ends -->

        </div>
      </div>

      <script >
        var card =document.getElementById("card");

        function openRegister()
        {
          card.style.transform="rotateY(-180deg)";
        }

        function openLogin()
        {
          card.style.transform="rotateY(0deg)";
        }


      </script>

  <!--------------------------------------------------------------------------------->
           <!--  <div class="">
                <span id="loginMsg"></span>
                <form  method="post" id="userLogin">
                 
                  <div class="mb-3">
                    <label for="loginPhone" class="form-label">Phone Number</label>
                    <input type="text" name="loginPhone" class=" " id="loginPhone"  required="" autocomplete="off">
                  </div>
                  <div id="recaptcha-container"></div>
                  <button type="submit"  class="btn custombtn" id="loginBtn" > <span class="round " role="status" aria-hidden="true"></span>  Login</button>
                  <input type="text" class=" " name="type" value="login" hidden>
                </form>
                 <div class="mb-3" id="loginOTPContainer" style="display: none;" >
                    <label for="loginOTP" class="form-label">OTP</label>
                    <input type="text" name="loginOTP" class=" " id="loginOTP" required="" autocomplete="off">
                     <button type="submit" name="login" id="verifyLoginBtn" class="btn custombtn" onclick="verifyLogin()"><span class="round " role="status" aria-hidden="true"></span>  Verify OTP</button>
                  </div>

             </div>
 
             <div class="" id="nav-profile" >
               <span id="validation"></span>

                  <form  method="post" id="userRegister">

                   <div class="mb-3">
                    <label for="regname" class="form-label">Name</label>
                    <input type="text" class=" " id="regname"  name="regname" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="regemail" class="form-label">Email address</label>
                    <input type="email" class=" " id="regemail"  name="regemail" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="regphone" class="form-label">Phone</label>
                    <input type="text" class=" " id="regphone" name="regphone" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="regaddress" class="form-label">Address</label>
                    <textarea type="text" class=" " id="regaddress" name="regaddress" autocomplete="off"></textarea>
                  </div>
                  <div class="mb-3">
                    <button  type="submit" class="btn custombtn" id="regBtn" onclick="return regValidation()" ><span class="reground " role="status" aria-hidden="true"></span> Continue</button>
                  </div>
                   <input type="text" class=" " name="type" value="register" hidden>
                  
                </form>
                  
                     <div class="mb-3" style="display: none;" id="otpContainer">

                    <label for="OTP" class="form-label">Enter OTP</label>
                    <input type="text" class=" " id="OTP"  autocomplete="off">
                    <button type="submit" id="verifyRegBtn" onclick="verify()" class="btn custombtn"><span class="reground " role="status" aria-hidden="true"></span> Register</button>

                   </div>

             </div> -->


      </div>
    </div>
</section>
 <?php

        include 'footer.php';

?>
<script type="text/javascript">
  
  $("header").hide();
  $(".footer").hide();
  
</script>