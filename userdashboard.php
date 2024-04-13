<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="userdashboard.css">
</head>
<body>
    <nav>
            <div class="logo-name">
                <img src="uploads/logo.png" alt="Logo">
                <h1>BlogPost</h1>
                <ul>
                    <li><a href="userdashboard.php?page=userblog">Blogs</a></li>
                    <li><a href="userdashboard.php?page=bookmarks">Bookmarks</a></li>
                    <li><a href="userdashboard.php?page=about">About</a></li>
                    <li><a href="login.php" onclick="return confirmLogout();">Log out</a></li>
                    </ul>
            </div>
       
    </nav>

   
    <div id="content">
        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                include("$page.php");
            } else {
                include("userblog.php");
            }
        ?>
    </div>

    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
    </script>
</body>
</html>
