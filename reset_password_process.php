<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        $updateQuery = "UPDATE tbluser SET password = '$newPassword' WHERE username = '$username'";
        
        if (mysqli_query($conn, $updateQuery)) {
            header("Location: login.php?password_reset=success");
            exit();
        } else {
            echo "Error updating password: " . mysqli_error($conn);
        }
    } else {
        header("Location: forgot_password.php?error=password_mismatch");
        exit();
    }
}
?>