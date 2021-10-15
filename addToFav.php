<?php
session_start();
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

// printArray($_POST);


$mealId=getSafeVal($_POST['id']);
$mealType=getSafeVal($_POST['mealType']);
$operation=getSafeVal($_POST['operation']);

if($operation=="add"){
	if(isset($_SESSION['CURRENT_USER'])){
		//user is logged in
		$uid=$_SESSION['CURRENT_USER'];
		manageFav($uid,$mealType,$mealId);
		

	}
	else{
		//user is not logged in

			$_SESSION['favourites'][]=array(
				'id'=>$mealId,
				'mealType'=>$mealType

			);

		

		
	}
	$totalItems=count(getFavourites());
	$arr=array('totalItems'=>$totalItems);
	echo json_encode($arr);
}

if($operation=="remove"){

	if(isset($_SESSION['CURRENT_USER'])){
		//user is logged in
		$uid=$_SESSION['CURRENT_USER'];

		mysqli_query($con,"delete from favourites where userId='$uid' and foodType='$mealType' and foodId='$mealId' ");
		

	}
	else{
		//user is not logged in

			foreach ($_SESSION['favourites'] as $key => $value) {
				if($value['id']==$mealId && $value['mealType']==$mealType){
					unset($_SESSION['favourites'][$key]);

				}
			}

		
	}
	$arr=array('action'=>'remove');
	echo json_encode($arr);

}


?>