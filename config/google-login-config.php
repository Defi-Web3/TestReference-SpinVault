<?php
include_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");
$google_client = new Google_Client();
$google_client->setClientId('88597286481-enqrt92lite2gjnhk40lrlnc5h9gt7ru.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('https://sweepium-spinvault.gailabs.com/');
$google_client->addScope('email');
$google_client->addScope('profile');
?>