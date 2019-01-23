<h1>REGISTER NEW USER</h1>
<?php //foreach ($errors as $error): ?>
<!--    <p style="color: red">--><?//=$error?><!--</p>-->
<?php //endforeach;?>
<form method="POST">
    <div>
        <label>
           Username: <input type="text" name="username">
        </label>
    </div>

    <div>
        <label>
            Password: <input type="text" name="password">
        </label>
    </div>

    <div>
        <label>
            Confirm Password: <input type="text" name="confirm_password">
        </label>
    </div>

    <div>
        <label>
            Full Name: <input type="text" name="fullName">
        </label>
    </div>

    <div>
        <label>
            Born On: <input type="date" name="bornOn">
        </label>
    </div>

    <div>
        <input type="submit" name="register" value="Register!">
    </div>

</form>
