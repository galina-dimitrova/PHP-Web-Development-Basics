<?php
session_start();
spl_autoload_register();

$template = new \Core\Template();
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);
$dataBinder = new \Core\DataBinder();
// moje da iziskvat promqna:
$homeHttpHandler = new \App\Http\HomeHttpHandler($template, $dataBinder);
$userRepository = new \App\Repository\UserRepository($db);
$userService = new \App\Service\UserService($userRepository);
$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder);
$bookRepository = new \App\Repository\BookRepository($db, $dataBinder);
$bookService = new \App\Service\BookService($bookRepository);
$genreRepository = new \App\Repository\GenreRepository($db);
$genreService = new \App\Service\GenreService($genreRepository);
$bookHttpHandler = new \App\Http\BookHttpHandler($template, $dataBinder);
