<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');
include('config.php');

unset($_SESSION['CURRENT_USER']);
$google_client->revokeToken();
session_destroy();
redirect(SITE_PATH);

?>