<?php /** @var \App\Data\BookDTO $data */?>

<h1>VIEW BOOK</h1>

<p><a href="profile.php">My Profile</a></p>
<div>
    <p><b>Book Title: </b><?= $data->getTitle(); ?></p>
    <p><b>Book Author: </b><?= $data->getAuthor(); ?></p>
    <p><b>Description: </b><?= $data->getDescription(); ?></p>
    <p><b>Genre: </b><?= $data->getGenre()->getName(); ?></p>
    <p><img src="<?= $data->getImage(); ?>" alt="book image"/></p>
</div>