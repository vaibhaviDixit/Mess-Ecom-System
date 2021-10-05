<?php

session_start();

include ('function.inc.php');

unset($_SESSION['admin_login']);

redirect('pages-sign-in.php');


?>