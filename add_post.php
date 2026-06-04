<?php
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['save'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title, content)
            VALUES('$title', '$content')";

    if($conn->query($sql)){
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
</head>
<body>

<h2>Add New Post</h2>

<form method="POST">

    <input type="text"
           name="title"
           placeholder="Post Title"
           required>

    <br><br>

    <textarea name="content"
              rows="5"
              cols="40"
              placeholder="Post Content"
              required></textarea>

    <br><br>

    <button type="submit" name="save">
        Save Post
    </button>

</form>

</body>
</html>