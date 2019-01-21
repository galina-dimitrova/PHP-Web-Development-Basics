<h2>Edit Post</h2>

<form method="post">
    Title: <input type="text" name="title"><br>
    Content: <input type="text" name="content"><br>
    <input type="submit" value="EDIT">
</form>

<?php
include("connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if(isset($_POST['title'])&&isset($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $st = $mysqli->prepare("UPDATE posts
                                      SET title = ?,
                                          content= ?                                  
                                    WHERE id = ?");
        $st->bind_param('ssi', $title, $content,$id );
        $st->execute();

        if ($st->affected_rows == 1) echo "Post editet.";
    }
}
