<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="loginstyles.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="login_process.php" method="POST">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>

            <?php
                if (isset($_GET['error'])) {
                    echo '<p class="error-message">Wrong credencials.</p>';
                }
            ?>
        </form>

        <p class="login-link"><a href="forgot_password.php">Forgot Password ?</a></p>
        <p class="login-link">Not a member yet? <a href="register.php">Register</a></p>
    </div>
</body>
</html>