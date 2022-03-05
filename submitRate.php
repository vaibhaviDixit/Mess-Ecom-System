<?php      

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');


if(isset($_POST['stars']) && isset($_POST['msg'])){



 $stars=$_POST['stars'];
 $msg=$_POST['msg'];

 $uid=$_SESSION['CURRENT_USER'];
 $q=mysqli_query($con,"INSERT INTO `reviews`( `userId`, `description`, `stars`) VALUES ('$uid','$msg','$stars')");

if($q){
	$arr=array("status"=>"success");
	echo json_encode($arr);
}





}




?>