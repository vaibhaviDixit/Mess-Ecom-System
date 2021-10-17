
<?php

session_start();

        if(!isset($_SESSION['CURRENT_USER'])){
             $arr=array('login'=>'false');
			 echo json_encode($arr);
        }
        else{
        	$arr=array('login'=>'true');
			 echo json_encode($arr);
        }

?>