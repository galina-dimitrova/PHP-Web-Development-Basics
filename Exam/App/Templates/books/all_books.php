<?php /** @var \App\Data\BookDTO[] $data */ ?>

<h1>All Books</h1>

<a href="add_book.php">Add new book</a> |
<a href="profile.php">MyProfile</a> |
    <a href="logout.php">logout</a> <br /><br />

<table border="1">
    <thead>
        <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Genre</td>
            <td>Added by User</td>
            <td>Details</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($data as $book): ?>
        <tr>
<!--            --><?//=var_dump($book);exit();?>
            <td><?= $book->getTitle() ?></td>
            <td><?= $book->getAuthor() ?></td>
            <td><?= $book->getGenre()->getName(); ?></td>
            <td><?= $book->getUser()->getFullName(); ?></td>
            <td><a href="view_book.php?id=<?=$book->getId(); ?>">Details</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>