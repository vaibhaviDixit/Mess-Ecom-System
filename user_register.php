<?php

// in progress
// session_start();
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');



$type=getSafeVal($_POST['type']);

if($type=="register"){

	$name=getSafeVal($_POST['regname']);
	$email=getSafeVal($_POST['regemail']);
	$phone=getSafeVal($_POST['regphone']);
	$password=getSafeVal($_POST['regpass1']);


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

}


?>