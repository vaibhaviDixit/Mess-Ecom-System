<?php

session_start();
//in progress
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

if(isset($_POST['login'])){

	$email=$_POST['loginemail'];
	$pass=$_POST['loginpassword'];


 
	if ($email=="vaibhavi27@gmail.com" && $pass=="pass123") {

		$result=mysqli_query($con,"select * from user where email='$email' ");
		$row = mysqli_fetch_assoc($result);


		  $_SESSION['CURRENT_USER']=$row['id'];

		   //when user login to account then its session cart will moved to database cart
		  if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
		  	foreach ($_SESSION['cart'] as $key => $value) {
		  		//manageCart function add data to cart table in database
		  		manageCart($_SESSION['CURRENT_USER'],$value['mealType'],$value['id'],$value['qty']);
		  	}
		  }

		?>
       <script type="text/javascript">
       	// alert("Valid");
       	window.location.href='index.php';

       </script>
		
		<?php
	}
	else{
			?>
	
     <script type="text/javascript">window.location.href='index.php';</script>
		
		<?php

	}
}



?>