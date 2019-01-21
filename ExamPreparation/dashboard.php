<?php

require_once "common.php";

$homeHttpHandler = new \App\Http\HomeHttpHandler($template, new \Core\DataBinder());
$taskService = new \App\Service\TaskService(new \App\Repository\TaskRepository($db, new \Core\DataBinder()));
$homeHttpHandler->dashboard($taskService);