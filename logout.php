<?php
session_start();
include ('include/function.inc.php');
unset($_SESSION['CURRENT_USER']);
redirect("index.php");

?>