<?php


include ('include/database.inc.php');
//print array
function printArray($arr){
	echo "<pre>";
	print_r($arr);
}


function redirect($link){
?>
<script type="text/javascript">
	
	window.location.href='<?php echo $link; ?>'
</script>
<?php
	die();
}

function getSafeVal($str){
	global $con;
	$str=mysqli_real_escape_string($con,htmlspecialchars($str));
	return $str;
}

function getUserCart(){
	global $con;
	$arr=array();
	$id=$_SESSION['CURRENT_USER'];
	$res=mysqli_query($con,"select * from cart where userId='$id' ");
	while ($row=mysqli_fetch_assoc($res) ) {
		$arr[]=$row;
	}
	return $arr;

}

function manageCart($uid,$mealType,$mealId,$qty){

	global $con;

	$res=mysqli_query($con,"select * from cart where userId='$uid' and menuType='$mealType' and menuId='$mealId' ");

		//if cart item already exists then annd it quantity
		if(mysqli_num_rows($res)>0){
			$row=mysqli_fetch_assoc($res);
			$cid=$row['id'];
			mysqli_query($con,"update cart set qty='$qty' where id='$cid' ");

		}
		else
		{

			mysqli_query($con,"insert into cart(userId, menuType, menuId, qty) VALUES ('$uid','$mealType','$mealId','$qty')");
		}

}




?>









