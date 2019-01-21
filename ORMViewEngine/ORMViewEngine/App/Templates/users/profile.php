<?php/** @var \App\Data\UserDTO $data */?>
<h1>Your profile</h1>

<form method="POST">
    <div>
        Username: <label>
            <input type="text"  value="<?= $data->getUsername(); ?>" name="username">
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" value="<?= $data->getPassword() ?>" name="password">
        </label>
    </div>
    <div>
        First Name: <label>
            <input type="text" value="<?= $data->getFirstName(); ?>" name="firstName">
        </label>
    </div>
    <div>
        Last Name: <label>
            <input type="text" value="<?= $data->getLastName(); ?>" name="lastName">
        </label>
    </div>
    <div>
        Birthday: <label>
            <input type="text" value="<?= $data->getBornOn(); ?>" name="bornOn">
        </label>
    </div>
    <div>
        <input type="submit" name="edit" value="Edit!">
    </div>

    <div>
        <input type="submit" name="delete" value="Delete!">
    </div>
</form>

<p>You can <a href="logout.php">logout</a> or see <a href="users.php">all users</a>.</p>
