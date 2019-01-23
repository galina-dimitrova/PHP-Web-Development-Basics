<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>ADD NEW BOOK</h1>
<?php //foreach ($errors as $error): ?>
<!--    <p style="color: red">--><?//=$error?><!--</p>-->
<?php //endforeach;?>
<form method="post">
    Book Title: <input type="text" name="title" minlength="3" maxlength="50"/><br />
    Book AUTHOR: <input type="text" name="author" minlength="3" maxlength="50"/><br />
    Description: <input type="text" name="description" minlength="10" maxlength="10000"/><br />
    Image URL:<input type="text" name="image"  minlength="3" maxlength="255"/><br />
    Genre: <select name="genre_id">
        <option></option>
        <?php foreach ($data->getGenres() as $genre): ?>
            <option value="<?=$genre->getId(); ?>"><?= $genre->getName(); ?></option>
        <?php endforeach; ?>
    </select><br />
    <input type="submit" name="save" value="Save"/><br />
</form>

