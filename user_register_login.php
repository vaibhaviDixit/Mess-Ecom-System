<?php


session_start();
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

// print_r($_POST);

$type=getSafeVal($_POST['type']);

if($type=="register"){

	$name=getSafeVal($_POST['regname']);
	$email=getSafeVal($_POST['regemail']);
	$phone=getSafeVal($_POST['regphone']);
	$password=getSafeVal($_POST['regpass1']);
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

	$safePass=password_hash($password,PASSWORD_BCRYPT);

	mysqli_query($con,"INSERT INTO `user`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$safePass')");
     
    $row=mysqli_fetch_assoc(mysqli_query($con,"select * from user where phone='$phone' "));
	$_SESSION['CURRENT_USER']=$row['id'];

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

		$setMsg=array("status" => "success","message"=>"Login successfully");
		echo json_encode($setMsg);
	}




}


?>