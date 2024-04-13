<?php
include 'connect.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tblblogs WHERE b_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $title = $row['b_title'];
    $content = $row['b_content'];
    $image = $row['b_image']; 
    $date = date('M d, Y', strtotime($row['b_date']));
} else {
    header("Location: adminblog.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="blog.css">
</head>
<body>
    <div id="content">
        <div class="blogs-item">
            <h1><?php echo $title; ?></h1>
            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
            <p><?php echo $date; ?></p>
            <p><?php echo nl2br($content); ?></p>
           
        </div>
    </div>
</body>
</html>
