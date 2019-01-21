<?php

require_once "common.php";

$taskService = new \App\Service\TaskService(new \App\Repository\TaskRepository($db, new \Core\DataBinder()));

$taskHttpHandler = new \App\Http\TaskHttpHandler($template, new \Core\DataBinder());
$taskHttpHandler->delete($taskService, $_GET);