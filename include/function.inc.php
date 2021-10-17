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


//get cart of user using user id logged in 
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

	$subtotal=getSubTotal($mealId,$mealType,$qty);

		//if cart item already exists then annd it quantity
		if(mysqli_num_rows($res)>0){
			$row=mysqli_fetch_assoc($res);
			$cid=$row['id'];
			mysqli_query($con,"update cart set qty='$qty',subtotal='$subtotal' where id='$cid' ");

		}
		else
		{

			mysqli_query($con,"insert into cart(userId, menuType, menuId, qty,subtotal) VALUES ('$uid','$mealType','$mealId','$qty','$subtotal')");
		}

}

function getSubTotal($mealId,$mealType,$qty){
   global $con;
   
	if($mealType=="meal"){
		$getRow=mysqli_fetch_assoc(mysqli_query($con,"select * from meals where id='$mealId' "));
		$getPrice=$getRow['mealPrice'];
	}
	if($mealType=="menu"){
		$getRow=mysqli_fetch_assoc(mysqli_query($con,"select * from menu where id='$mealId' "));
		$getPrice=$getRow['menuPrice'];
	}
	if($mealType=="daily"){
		$getRow=mysqli_fetch_assoc(mysqli_query($con,"select * from dailyproducts where id='$mealId' "));
		$getPrice=$getRow['proPrice'];
	}
	


	$subtotal=intval($qty)*intval($getPrice);

	return $subtotal;
}


function getFullCart(){
	$cart_array=array(); //store cart 

if(isset($_SESSION['CURRENT_USER'])){
  //if user is logged in get cart of user from database
  $getUserCart=getUserCart();

  foreach ($getUserCart as $key => $value) {
   $cart_array[]= array(
        'id'=>$value['menuId'],
        'qty'=>$value['qty'],
        'mealType'=>$value['menuType'],
        'subtotal'=>$value['subtotal']

      );
  }
 
}
else{

  //if user is not logged in then get cart from session
  if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
    $cart_array=$_SESSION['cart'];
  }

}
return $cart_array;

}



function manageFav($uid,$mealType,$mealId){

	global $con;

	$res=mysqli_query($con,"select * from favourites where userId='$uid' and foodType='$mealType' and foodId='$mealId' ");

		//if cart item already exists then annd it quantity
		if(mysqli_num_rows($res)==0){
			mysqli_query($con,"insert into favourites(userId, foodType, foodId) VALUES ('$uid','$mealType','$mealId')");

		}

}

function getUserFav(){
	global $con;
	$arr=array();
	$id=$_SESSION['CURRENT_USER'];
	$res=mysqli_query($con,"select * from favourites where userId='$id' ");
	while ($row=mysqli_fetch_assoc($res) ) {
		$arr[]=$row;
	}
	return $arr;

}

function getFavourites(){
	$cart_array=array(); //store cart 

if(isset($_SESSION['CURRENT_USER'])){
  //if user is logged in get cart of user from database
  $getUserFav=getUserFav();

  foreach ($getUserFav as $key => $value) {
   $cart_array[]= array(
        'id'=>$value['foodId'],
        'mealType'=>$value['foodType']

      );
  }
 
}
else{

  //if user is not logged in then get cart from session
  if (isset($_SESSION['favourites']) && count($_SESSION['favourites'])>0) {
    $cart_array=$_SESSION['favourites'];
  }

}
return $cart_array;

}


function getUserDetails(){

	global $con;
	$userDetails=array();

		$uid=$_SESSION['CURRENT_USER'];

		$res=mysqli_fetch_assoc(mysqli_query($con,"select * from user where id='$uid' "));
		$name=$res['name'];
		$email=$res['email'];
		$phone=$res['phone'];

		$userDetails= array(
        'name'=>$name,
        'email'=>$email,
        'phone'=>$phone

       );

	return $userDetails;

}


?>









