<?php /** @var \App\Data\UserDTO|null $data */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<h1>USER LOGIN</h1>

<form method="POST">
    <div>
        <label>
            Username: <input value="<?= $data != null ? $data->getUsername() : "" ?>" type="text" name="username">
        </label>
    </div>

    <div>
        <label>
            Password: <input value="<?= $data != null ? $data->getPassword() : "" ?>" type="password" name="password">
        </label>
    </div>

    <div>
        <input type="submit" name="login" value="Login">
    </div>

</form>
