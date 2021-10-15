<?php
session_start();
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

// printArray($_POST);


$mealId=getSafeVal($_POST['id']);
$qty=getSafeVal($_POST['qty']);
$mealType=getSafeVal($_POST['mealType']);
$operation=getSafeVal($_POST['operation']);

if($operation=="add"){
	if(isset($_SESSION['CURRENT_USER'])){
		//user is logged in
		$uid=$_SESSION['CURRENT_USER'];
		manageCart($uid,$mealType,$mealId,$qty);
		

	}
	else{
		//user is not logged in
		$update=false;
			foreach ($_SESSION['cart'] as $key => $value) {
				if($value['id']==$mealId && $value['mealType']==$mealType){
					$_SESSION['cart'][$key]['qty']=intval($value['qty'])+intval($qty);
					$update=true;

				}
			}

	
		if(!$update){
			$_SESSION['cart'][]=array(
				'id'=>$mealId,
				'qty'=>$qty,
				'mealType'=>$mealType

			);

		}
		

		
	}
	$totalItems=count(getFullCart());
	$arr=array('totalItems'=>$totalItems);
	echo json_encode($arr);
}

if($operation=="updateCartAdd" || $operation=="updateCartRemove"){
	if(isset($_SESSION['CURRENT_USER'])){
		//user is logged in
		$uid=$_SESSION['CURRENT_USER'];
		manageCart($uid,$mealType,$mealId,$qty);
		

	}
	else{
		//user is not logged in
		
			foreach ($_SESSION['cart'] as $key => $value) {
				if($value['id']==$mealId && $value['mealType']==$mealType){
					$_SESSION['cart'][$key]['qty']=intval($qty);

				}
			}


		
		
	}
}



if($operation=="remove"){

	if(isset($_SESSION['CURRENT_USER'])){
		//user is logged in
		$uid=$_SESSION['CURRENT_USER'];

		mysqli_query($con,"delete from cart where userId='$uid' and menuType='$mealType' and menuId='$mealId' ");
		

	}
	else{
		//user is not logged in

			foreach ($_SESSION['cart'] as $key => $value) {
				if($value['id']==$mealId && $value['mealType']==$mealType){
					unset($_SESSION['cart'][$key]);

				}
			}

		
	}
	$arr=array('action'=>'remove');
	echo json_encode($arr);

}


?>