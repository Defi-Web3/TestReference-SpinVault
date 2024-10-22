<?php 
session_start();

if (isset($_COOKIE['loggedIn']) && $_COOKIE['loggedIn'] === 'true') {

	$_SESSION['loggedin'] = true;
}

include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/header.php");
include_once($_SERVER['DOCUMENT_ROOT'] ."/pages/main.php");
include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/footer.php");
?>
