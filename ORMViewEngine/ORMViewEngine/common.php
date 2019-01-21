<?php
session_start();
spl_autoload_register();

$template = new \Core\Template();
$config = parse_ini_file("Config/db.ini");
$pdo = new PDO($config["dsn"], $config["user"], $config["pass"]);
$db = new \Database\PDODatabase($pdo);
$userRepository = new \App\Repository\UserRepository($db);
$userService = new \App\Service\UserService($userRepository);
$userHttpHandler = new \App\Http\HttpHandler($template, new \Core\DataBinder());
