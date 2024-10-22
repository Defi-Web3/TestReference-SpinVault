<?php
// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

    // Check if the 'code' and 'authuser' GET parameters are set and valid
    if (isset($_GET['code']) && isset($_GET['authuser']) && $_GET['authuser'] == 0) {

        // Include the user details page if both conditions are met
        include_once($_SERVER['DOCUMENT_ROOT'] . "/pages/userPages/userdetails.php");
    
    } else {

        // Include the main page for logged-in users if conditions aren't met
        include_once($_SERVER['DOCUMENT_ROOT'] . "/pages/components/mainLoggedOn.php");
    }

} else {

    // Include the main page for not logged-in users
    include_once($_SERVER['DOCUMENT_ROOT'] . "/pages/components/mainNotLoggedOn.php");
}
?>
