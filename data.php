<?php 

session_start();
include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

printArray($_SESSION['cart']);


?>