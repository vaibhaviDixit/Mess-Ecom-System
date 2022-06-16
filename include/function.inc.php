<?php

include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');

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
	$str=strip_tags(mysqli_real_escape_string($con,htmlspecialchars($str)));
	return $str;
}
function getSafeArrVal($arr){
	global $con;
	for($i=0;$i<count($arr);$i++){
		$arr[$i]=strip_tags(mysqli_real_escape_string($con,htmlspecialchars($arr[$i])));
	}
	return $arr;
}

function getAdminToken(){
	global $con;
	$tokenrow=mysqli_query($con,"select pushtoken from admin");
	if(mysqli_num_rows($tokenrow)>0){
		$gettoken=mysqli_fetch_assoc($tokenrow);
		return $gettoken['pushtoken']; 
	}
	return 0;

}



function myDate($dt){
	return date('d-m-Y',strtotime($dt)).' '.date('h:ia',strtotime($dt));
}
function getSubscribeInterval($Date,$subDuration){
	  if($subDuration=="15Days"){
            $dt=date('d-m-Y', strtotime($Date. ' + 15 days'));
            $subDate=date('d-m-Y', strtotime( $dt . "-1 day"));
            return " (".$Date.") TO (".$subDate.")";
      }
      elseif($subDuration=="weekly") {
            $dt=date('d-m-Y', strtotime($Date. ' + 7 days'));
            $subDate=date('d-m-Y', strtotime( $dt . "-1 day"));
            return " (".$Date.") TO (".$subDate.")";
      }
      elseif ($subDuration=="monthly") {
            $dt=date('d-m-Y', strtotime($Date. ' + 1 months'));
            $subDate=date('d-m-Y', strtotime( $dt . "-1 day"));
            return " (".$Date.") TO (".$subDate.")";
      }
}

function dateDiff($date1, $date2)
{
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}

function getSubscribeStatus($Date,$subDuration){
	  $today=date('d-m-Y');
	  if($subDuration=="15Days"){
            $dt=date('d-m-Y', strtotime($Date. ' + 15 days'));
            $subDate=date('d-m-Y', strtotime( $dt . "-1 day"));
            if(dateDiff($today,$subDate)>0){
            	return 'Active';
            }
            else{
            	return 'Expired';
            }
            
      }
      elseif($subDuration=="weekly") {
            $dt=date('d-m-Y', strtotime($Date. ' + 7 days'));
            $subDate=date('d-m-Y', strtotime( $dt . "-1 day"));
            if(dateDiff($today,$subDate)>0){
            	return 'Active';
            }
            else{
            	return 'Expired';
            }
      }
      elseif ($subDuration=="monthly") {
            $dt=date('d-m-Y', strtotime($Date. ' + 1 months'));
            $subDate=date('d-m-Y', strtotime( $dt . "-1 day"));
            if(dateDiff($today,$subDate)>0){
            	return 'Active';
            }
            else{
            	return 'Expired';
            }
      }
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

function emptyCart($uid){
	global $con;
	$res=mysqli_query($con,"delete from cart where userId='$uid' ");

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
		$uid=$_SESSION['CURRENT_USER'];

		$res=mysqli_fetch_assoc(mysqli_query($con,"select * from user where id='$uid' "));

	return $res;

}



function getUserToken(){

	global $con;
		$uid=$_SESSION['CURRENT_USER'];

		$res=mysqli_fetch_assoc(mysqli_query($con,"select pushtoken from user where id='$uid' "));

	return $res['pushtoken'];

}

function getUserTokenById($uid){

	global $con;
	$res=mysqli_fetch_assoc(mysqli_query($con,"select pushtoken from user where id='$uid' "));

	return $res['pushtoken'];

}

function userRow(){
	global $con;
	$userDetails=array();
	$uid=$_SESSION['CURRENT_USER'];
	$res=mysqli_fetch_assoc(mysqli_query($con,"select * from user where id='$uid' "));
		
	return $res;

}

function continueWithGoogle($name,$email,$profile){
	global $con;
	$checkEmailExist=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email' "));
       if($checkEmailExist>0){
              
        $check=mysqli_query($con,"select * from user where email='$email' ");
        $row=mysqli_fetch_assoc($check);
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
		  	foreach ($_SESSION['cart'] as $key => $value) {
		  		//manageCart function add data to cart table in database
		  		manageCart($_SESSION['CURRENT_USER'],$value['mealType'],$value['id'],$value['qty']);
		  	}
		  }
		   $updateData=mysqli_query($con,"UPDATE  `user` set `name`='$name', `profile`='$profile' where  `email`='$email' ");
	      if($updateData){

            $_SESSION['CURRENT_USER']=$row['id'];
	      	return "success";
	      }
         
       }else{

      $check=mysqli_query($con,"INSERT INTO `user`(`name`, `email`, `profile`) VALUES ('$name','$email','$profile') ");

      if($check){
        $check=mysqli_query($con,"select * from user where email='$email' ");
        $row=mysqli_fetch_assoc($check);
        $_SESSION['CURRENT_USER']=$row['id'];
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
		  	foreach ($_SESSION['cart'] as $key => $value) {
		  		//manageCart function add data to cart table in database
		  		manageCart($_SESSION['CURRENT_USER'],$value['mealType'],$value['id'],$value['qty']);
		  	}
		  }
        return "success";
      }
      else{
        return "fail";
      }

       }
}

// functions for dashboard data 

function totalMenus(){
	global $con;

	$countmeals=mysqli_num_rows(mysqli_query($con,"select * from meals"));
	$countmenu=mysqli_num_rows(mysqli_query($con,"select * from menu"));
	$countdaily=mysqli_num_rows(mysqli_query($con,"select * from dailyproducts "));
	return $countmeals+$countmenu+$countdaily;
}

function totalOrders(){
	global $con;

	$online=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total from orders"));
	$offline=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total from offlineOrders"));
	return intval($online['total'])+intval($offline['total']);
}

function pendingOrders(){
	global $con;

	$online=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total from orders where order_status=1"));
	$offline=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total from offlineOrders where order_status=1"));
	return intval($online['total'])+intval($offline['total']);
}


function totalRevenue(){
	global $con;

	$online=mysqli_fetch_assoc(mysqli_query($con,"select sum(total) as total from orders"));
	$offline=mysqli_fetch_assoc(mysqli_query($con,"select sum(paid) as total from offlineOrders"));
	return intval($online['total'])+intval($offline['total']);
}


function totalUsers(){
	global $con;

	$count=mysqli_num_rows(mysqli_query($con,"select * from user"));
	return $count;
}

function activeMembers(){

	global $con;

	$count=0;
	$onlinemem=mysqli_query($con,"select * from onlinemembers");
    $offlinemem=mysqli_query($con,"select * from members");

	while ($row1=mysqli_fetch_assoc($onlinemem)) {
		$status1=getSubscribeStatus($row1['joinDate'],$row1['subDuration']);
		if($status1=="Active"){
			$count=$count+1;
		}
	}

	while ($row2=mysqli_fetch_assoc($offlinemem)) {
		$status2=getSubscribeStatus($row2['joinDate'],$row2['duration']);
		if($status2=="Active"){
			$count=$count+1;
		}
	}



}


function revenueStatistic(){
	global $con;

	$arr=array();
	$now=date('Y');
	$orders=mysqli_query($con,"SELECT total as total,addedOn FROM `orders` UNION SELECT paid as total,addedOn from offlineorders");

	while ($row=mysqli_fetch_assoc($orders)) {
		$dbDate=date('Y',strtotime($row['addedOn']));
		if($now==$dbDate){
			$getMonth=date('m',strtotime($row['addedOn']));
			$arr[intval($getMonth)-1]=$row['total'];
		}
	}

	return json_encode($arr);



}

?>




















