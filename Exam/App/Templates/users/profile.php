<?php /** @var \App\Data\UserDTO $data */
//$data->setId($_SESSION['id']);
?>
<h1>Hello,<?=$_SESSION['id'];?> </h1></<br>
<p><a href="add_book.php">Add new book</a> | <a href="logout.php">logout</a></p>
<p><a href="my_books.php?id=<? $_SESSION['id'];?>">My Books</a> </p>
<p><a href="all_books.php">All Books</a> </p><br>