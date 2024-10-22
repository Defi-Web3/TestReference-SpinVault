<?php
include_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");
$google_client = new Google_Client();
$google_client->setClientId('447979648660-que6aqbof4objsvkescqmqur6ts4pr8c.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('https://sweepium-spinvault.gailabs.com/pages/register.php');
$google_client->addScope('email');
$google_client->addScope('profile');
?>