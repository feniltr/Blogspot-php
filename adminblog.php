<?php
include 'connect.php'; 

// Handle blog deletion
if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $deleteQuery = "DELETE FROM tblblogs WHERE b_id = $deleteId";
    if (mysqli_query($conn, $deleteQuery)) {
        // Record deleted successfully
        header("Location: dashboard.php?page=adminblog");
        exit();
    } else {
        // Error deleting record
        echo "Error: " . mysqli_error($conn);
    }
}

$query = "SELECT * FROM tblblogs ORDER BY b_id DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="dashboardcss.css">
</head>
<body>
    <div id="content">
        <div class="blog-list">
            <?php
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
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
