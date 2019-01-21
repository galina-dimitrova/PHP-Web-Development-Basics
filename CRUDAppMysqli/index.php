<?php

include("connect.php");
include("header.php");

$result = $mysqli->query("SELECT*FROM posts 
                                    ORDER BY `date` DESC");

echo "<table>\n";
echo "<tr><th>Title</th><th>Content</th><th>Date</th>
<th>EDIT</th><th>DELETE</th></tr>";
while ($row = $result->fetch_assoc()) {
    $title = htmlspecialchars($row['title']);
    $body = htmlspecialchars($row['content']);
    $date = (new DateTime($row['date']))->format('d.m.Y');
    $id = $row['id'];
    echo "<tr><td>$title</td><td>$body</td><td>$date</td>
        <td><a href='editPost.php?id=$id'>edit</a></td>
        <td><a href='deletePost.php?id=$id'>del</a></td></tr>\n";
}
echo "</table>\n";