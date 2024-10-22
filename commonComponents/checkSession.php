<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the home page (index.php)
    header("Location: /");
    exit;
}
?>