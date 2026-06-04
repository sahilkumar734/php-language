<?php
include 'db.php';

$id = $_GET['id'];

$post = $conn->query(
    "SELECT * FROM posts WHERE id=$id"
)->fetch_assoc();

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query(
        "UPDATE posts
         SET title='$title',
             content='$content'
         WHERE id=$id"
    );

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>

<h2>Edit Post</h2>

<form method="POST">

    <input type="text"
           name="title"
           value="<?php echo $post['title']; ?>"
           required>

    <br><br>

    <textarea name="content"
              rows="5"
              cols="40"
              required><?php echo $post['content']; ?></textarea>

    <br><br>

    <button type="submit" name="update">
        Update
    </button>

</form>

</body>
</html>