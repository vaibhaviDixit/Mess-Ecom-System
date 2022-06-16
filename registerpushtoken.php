<?php      

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');


if( isset($_POST['token']) ){



 $token=$_POST['token'];


if( isset($_SESSION['CURRENT_USER']) ){

	$uid=$_SESSION['CURRENT_USER'];
	$q=mysqli_query($con,"UPDATE  `user` set `pushtoken`='$token' where `id`='$uid' ");

	if($q){
		$arr=array("success"=>true);
		echo json_encode($arr);
	}
	else{
		$arr=array("success"=>false);
		echo json_encode($arr);
	}

}
else{

	$checkTokenExist=mysqli_num_rows(mysqli_query($con,"select * from unregistered where pushtoken='$token' "));
     if($checkTokenExist>0){
     	
     	$arr=array("success"=>false);
		echo json_encode($arr);
  
     }
     else{
     	$q=mysqli_query($con,"INSERT INTO `unregistered` (`pushtoken`) VALUES('$token') ");
		$arr=array("success"=>true);
     	echo json_encode($arr);
     }

}


}




?>