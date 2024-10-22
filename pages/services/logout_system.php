<?php
 	session_start();
	session_unset(); // Unset all session variables
	session_destroy(); // Destroy the session
	setcookie('loggedIn', '', time() - 3600, '/');
	header("Location: ../../"); // Redirect to homepage or login homepage
	exit();
?>