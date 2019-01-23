<?php

require_once "common.php";

//$bookService = new \App\Service\BookService(new \App\Repository\BookRepository($db, new \Core\DataBinder()));
//$bookHttpHandler = new \App\Http\BookHttpHandler($template, new \Core\DataBinder());
$bookHttpHandler->delete($bookService, $_GET);