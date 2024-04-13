<?php
session_start();
include 'connect.php'; 

$username = $_SESSION['username'];

if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $deleteQuery = "DELETE FROM tblbookmark WHERE blog_id = $deleteId AND u_name='$username'";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: userdashboard.php?page=bookmarks");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$query = "SELECT * FROM tblblogs WHERE b_id IN (SELECT blog_id FROM tblbookmark WHERE u_name='$username') ORDER BY b_id DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="dashboardcss.css">
    <style>
        .center-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="content">
        <div class="blog-list">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['b_id'];
                    $title = $row['b_title'];
                    $content = $row['b_content'];
                    $image = $row['b_image']; 
                    $date = date('M d, Y', strtotime($row['b_date']));
            ?>

            <div class="blog-item">
                <a class="blog-link" href="blog.php?id=<?php echo $id; ?>">
                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $date; ?></p>
                </a>
                <form class="delete-form" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                    <button type="submit" onclick="return confirm('Are you sure you want to remove this blog from bookmarks?')">Remove</button>
                </form>
            </div>
            <?php
                }
            } else {
                ?>
                <div class="center-message">
                    <p>No bookmarks available.</p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
