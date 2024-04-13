<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="registerstyles.css">
    <title>Register</title>
</head>
<body>
    <div class="register-container">
        <form class="register-form" action="register_process.php" method="POST">
            <h2>Register</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <div class="gender">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="male" value="male" required>
                <label for="female">Female</label>
                <input type="radio" name="gender" id="female" value="female" required>
            </div>

              
            <?php
                if (isset($_GET['error'])) {
                    echo '<p class="error-message">Username already exists.</p>';
                }
            ?>
            
            <button type="submit">Register</button>
        </form>

        <p class="register-link">Already a member ? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
