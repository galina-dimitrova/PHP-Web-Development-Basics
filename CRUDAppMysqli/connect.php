<?php
$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "crud_mysqli";

$mysqli = new mysqli($host, $username, $passwd, $dbname);
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno)die('Cannot connect to MySQL');


