<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="dashboardcss.css">
</head>
<body>
    <nav>
            <div class="logo-name">
                <img src="uploads/logo.png" alt="Logo">
                <h1>BlogPost</h1>
                <ul>
           
                <li><a href="dashboard.php?page=adminblog">Blogs</a></li>
                <li><a href="dashboard.php?page=addblog">Post Blog</a></li>
                <li><a href="dashboard.php?page=users">Users</a></li>
                <li><a href="login.php" onclick="return confirmLogout();">Log out</a></li>
             </ul>
            </div>
       
    </nav>

    <div id="content">
        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                include("$page.php");
            }else {
                include("adminblog.php");
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
