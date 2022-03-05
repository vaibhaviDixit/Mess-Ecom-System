<?php


session_start();
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');

// print_r($_POST);

$type=getSafeVal($_POST['type']);

if($type=="register"){

	$name=getSafeVal($_POST['regname']);
	$email=getSafeVal($_POST['regemail']);
	$phone=getSafeVal($_POST['regphone']);
	$address=getSafeVal($_POST['regaddress']);
	$verified=getSafeVal($_POST['verified']);


$checkEmail=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email' "));
$checkPhone=mysqli_num_rows(mysqli_query($con,"select * from user where phone='$phone' "));
if($checkEmail>0){
	$setMsg=array("status" => "error","message"=>"Email id already registered");
	echo json_encode($setMsg);
}
else if($checkPhone>0){
	$setMsg=array("status" => "error","message"=>"Mobile number already registered");
	echo json_encode($setMsg);
}
else if($verified=="false"){
    $setMsg=array("status" => "success","message"=>"Enter OTP sent to your no. ".$phone);
	echo json_encode($setMsg);	
}

if($verified=="true"){

	$profile="defaultprofile.png";
	mysqli_query($con,"INSERT INTO `user`(`name`, `email`, `phone`,`address`,`profile`) VALUES ('$name','$email','$phone','$address','$profile')");
     
    $row=mysqli_fetch_assoc(mysqli_query($con,"select * from user where phone='$phone' "));
	$_SESSION['CURRENT_USER']=$row['id'];

	if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
		  	foreach ($_SESSION['cart'] as $key => $value) {
		  		//manageCart function add data to cart table in database
		  		manageCart($_SESSION['CURRENT_USER'],$value['mealType'],$value['id'],$value['qty']);
		  	}
   }

	$setMsg=array("status" => "success","message"=>"Registered successfully");
	echo json_encode($setMsg);
}


}

if($type=="login"){
	$phone=getSafeVal($_POST['loginPhone']);
	$verified=getSafeVal($_POST['verified']);
	$checkPhone=mysqli_num_rows(mysqli_query($con,"select * from user where phone='$phone' "));
	if($checkPhone<=0){
		$setMsg=array("status" => "error","message"=>"Mobile number not registered! Register first!");
		echo json_encode($setMsg);
	}
	else if($verified=="false"){
	    $setMsg=array("status" => "success","message"=>"Enter OTP sent to your no. ".$phone);
		echo json_encode($setMsg);	
	}
	if($verified=="true"){
		$row=mysqli_fetch_assoc(mysqli_query($con,"select * from user where phone='$phone' "));
	    $_SESSION['CURRENT_USER']=$row['id'];
	    //if user add to cart and after that log in to system then transfer all session cart data to user's cart
	     if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
		  	foreach ($_SESSION['cart'] as $key => $value) {
		  		//manageCart function add data to cart table in database
		  		manageCart($_SESSION['CURRENT_USER'],$value['mealType'],$value['id'],$value['qty']);
		  	}
		  }
		$setMsg=array("status" => "success","message"=>"Login successfully");
		echo json_encode($setMsg);
	}
}



?>