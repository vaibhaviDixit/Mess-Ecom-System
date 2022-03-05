<?php

session_start();


include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');

unset($_SESSION['adminLogin']);
session_destroy();

redirect(SITE_PATH.'admin/sign-in');


?>