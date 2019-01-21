<?php

require_once "common.php";

$userService = new \App\Service\UserService(new \App\Repository\UserRepository($db));
$homeHttpHandler = new \App\Http\HomeHttpHandler($template, new \Core\DataBinder());
$homeHttpHandler->index($userService);