<?php
//in case of REST API we can change the code
session_start();
// Predefined user credentials
$credentials = [
    'email' => 'user@mail',
    'password' => 'user'
];
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if the credentials match
    if ($email === $credentials['email'] && $password === $credentials['password']) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        //print_r($_SESSION);die();
       // echo "Login successful!";
        header("Location: ../../");

    } else {
        echo "Invalid credentials!";
    }
}?>