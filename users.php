<?php
include 'connect.php'; 

$query = "SELECT id, email, username, gender FROM tbluser";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="dashboardcss.css">
</head>
<body>
  <table class="user-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Username</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['gender']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
