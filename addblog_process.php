<?php
include 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $targetDir = "uploads/"; 
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
    
    $date = date("Y-m-d H:i:s"); 
    $insertQuery = "INSERT INTO tblblogs (b_title, b_content, b_date, b_image) VALUES ('$title', '$content', '$date', '$targetFilePath')";
    
    if (mysqli_query($conn, $insertQuery)) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
