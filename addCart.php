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
					$subtotal=getSubTotal($mealId,$mealType,$_SESSION['cart'][$key]['qty']);
					$_SESSION['cart'][$key]['subtotal']=$subtotal;
					$update=true;

				}
			}

	
		if(!$update){
			
			$subtotal=getSubTotal($mealId,$mealType,$qty);
			$_SESSION['cart'][]=array(
				'id'=>$mealId,
				'qty'=>$qty,
				'mealType'=>$mealType,
				'subtotal'=>$subtotal

			);

		}
		

		
	}
	$totalItems=count(getFullCart());
	$arr=array('action'=>'added','totalItems'=>$totalItems);
	echo json_encode($arr);
}

if($operation=="updateCartAdd" || $operation=="updateCartRemove"){
	if(isset($_SESSION['CURRENT_USER'])){
		//user is logged in
		$uid=$_SESSION['CURRENT_USER'];
		if(intval($qty)<=10 && intval($qty)>=1){
			manageCart($uid,$mealType,$mealId,$qty);
		}
	}
	else{
		//user is not logged in
		  if(intval($qty)<=10 && intval($qty)>=1){

		  	foreach ($_SESSION['cart'] as $key => $value) {
				if($value['id']==$mealId && $value['mealType']==$mealType){
					$_SESSION['cart'][$key]['qty']=intval($qty);
					$_SESSION['cart'][$key]['subtotal']=getSubTotal($mealId,$mealType,$qty);

				}
			}

		  }
			
	}

	$arr=array('action'=>'cartUpdate');
	echo json_encode($arr);
}



if($operation=="remove" || $operation=="chkremove"){

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

	if($operation=="remove"){
	  $arr=array('action'=>'remove');	
	}
	if($operation=="chkremove"){
	  $arr=array('action'=>'chkremove');	
	}
	echo json_encode($arr);

}


?>