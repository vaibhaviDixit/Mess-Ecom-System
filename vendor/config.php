<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once SITE_PATH.'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('618904802178-uvu58omm48bpgljcah6f67bs7kono91b.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/messEcom/login');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>