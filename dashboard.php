<?php
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<a href="add_post.php">Add New Post</a> |
<a href="logout.php">Logout</a>

<hr>

<?php

$result = $conn->query(
    "SELECT * FROM posts ORDER BY id DESC"
);

while($row = $result->fetch_assoc()){
?>

<h3><?php echo $row['title']; ?></h3>

<p><?php echo $row['content']; ?></p>

<a href="edit_post.php?id=<?php echo $row['id']; ?>">
    Edit
</a>

|

<a href="delete_post.php?id=<?php echo $row['id']; ?>">
    Delete
</a>

<hr>

<?php } ?>

</body>
</html>