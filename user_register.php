<?php

// session_start();
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');


$name=getSafeVal($_POST['regname']);
$email=getSafeVal($_POST['regemail']);
$phone=getSafeVal($_POST['regphone']);
$password=getSafeVal($_POST['regpass1']);

$check=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email' "));

if($check>0){
	$setMsg=array("status" => "error","message"=>"Email is registered already");
	echo json_encode($setMsg);
	
}



?>