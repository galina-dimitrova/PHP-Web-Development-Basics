<h2>Create Post</h2>

<form method="post">
    Title: <input type="text" name="title"><br>
    Content: <input type="text" name="content"><br>
    <input type="submit" value="CREATE">
</form>

<?php
include("connect.php");

if (isset($_POST['title'])&&isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = (new DateTime())->format('Y.m.d');

    $stm = $mysqli
        ->prepare("INSERT INTO posts (title, content, `date`) 
                               VALUES(?,?,?)");
    $stm->bind_param("sss", $title,$content, $date);
    $stm->execute();

    if ($stm->affected_rows==1) {
        echo "Create post successful";
    }

    header("Location: index.php");
}