<?php 

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');

$id=getSafeVal($_POST['planid']);
$approve=mysqli_query($con,"update onlinemembers set status=1 where id='$id' ");
if($approve){
	echo 1;
}				  
				   

				   

?>
