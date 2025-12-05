<?php

session_start();

$username = $_POST["username"] ?? '';
$password = $_POST["password"] ?? '';

$adminUser = "admin";
$adminPass = "1234";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($username === $adminUser && $password === $adminPass) {
        $_SESSION["logged_in"] = true;
        header("Location: admin.php");
        exit;
    } else {
        echo "Login failed.";
        exit;
    }
} else {
    header("Location: login.html");
    exit;
}

?>
