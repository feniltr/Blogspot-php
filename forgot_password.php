

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="loginstyles.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="reset_password_process.php" method="POST">
            <h2>Forgot Password?</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Reset Password</button>
        </form>

        <p class="login-link">Remember your password? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
