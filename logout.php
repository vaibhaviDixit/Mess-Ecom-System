<?php
include('config.php');

unset($_SESSION['CURRENT_USER']);
$google_client->revokeToken();
session_destroy();
redirect(SITE_PATH);

?>