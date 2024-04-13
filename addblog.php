<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <div id="content">
        <div class="blog-form">
            <h2>Post New Blog</h2>
            <form action="addblog_process.php" method="POST" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>

                <label for="content">Content</label>
                <textarea id="content" name="content" rows="6" required></textarea>

                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>

                <button type="submit" onclick="return confirm('Are you sure you want to Post blog ?')">Post Blog</button>
            </form>
        </div>
    </div>
</body>
</html>
