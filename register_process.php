<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    
    // Check if username already exists
    $checkQuery = "SELECT id FROM tbluser WHERE username = '$username'";
    $result = mysqli_query($conn, $checkQuery);
    
    if (mysqli_num_rows($result) > 0) {
        header("Location: register.php?error=username_exists");
        exit();
    } else {
        // Username is unique, insert the user data
        $insertQuery = "INSERT INTO tbluser (email, username, password, gender) VALUES ('$email', '$username', '$password', '$gender')";
        $insertResult = mysqli_query($conn, $insertQuery);
        
        if ($insertResult) {
            header('Location: dashboard.php');
            exit();
        } else {
            echo "Registration failed. Please try again later.";
        }
    }
}
?>
