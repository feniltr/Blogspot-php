<?php
session_start();

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkQuery = "SELECT id, password FROM tbluser WHERE username = '$username'";
    $result = mysqli_query($conn, $checkQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $storedPassword = $user['password'];

        if ($username === "admin" && $password === "admin") {
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        } elseif ($password === $storedPassword) {
            $_SESSION['username'] = $username;
            header("Location: userdashboard.php");
            exit();
        } else {
            header("Location: login.php?error=invalid_credentials");
        }
    } else {
        header("Location: login.php?error=username_not_found");
    }
}
?>
