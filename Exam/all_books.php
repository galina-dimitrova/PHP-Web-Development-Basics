<?php

require_once "common.php";

//$homeHttpHandler = new \App\Http\HomeHttpHandler($template, new \Core\DataBinder());
//$bookService = new \App\Service\BookService(new \App\Repository\BookRepository($db, new \Core\DataBinder()));
$bookHttpHandler->list($bookService);