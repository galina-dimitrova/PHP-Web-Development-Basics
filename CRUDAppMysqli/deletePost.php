<?php
include("connect.php");

if (isset($_GET['id'])) {
    $st = $mysqli->prepare("DELETE FROM posts WHERE id = ?");
    $st->bind_param('i', $_GET['id']);
    $st->execute();
    if ($st->affected_rows == 1) echo "Post deleted.";
}
$result = $mysqli->query('SELECT id, title FROM posts');

while ($row = $result->fetch_assoc()) {
    $title = htmlspecialchars($row['title']);
    $id = htmlspecialchars($row['id']);
    $delLink = 'deletePost.php?id=' . $row['id'];
    echo "<p><a href='$delLink'>Delete post '$title'.</a></p>";
}