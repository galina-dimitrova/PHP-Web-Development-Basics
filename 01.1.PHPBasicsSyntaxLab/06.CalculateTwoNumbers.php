<?php
$firstNum = readline();
$secNum = readline();
$command = readline();

switch ($command) {
    case "sum":
        echo $firstNum+$secNum;
        break;
    case "subtract":
        echo $firstNum-$secNum;
        break;
    case "divide":
        if ($firstNum==0) {
            echo "Cannot divide by zero";
        } else {
            echo $firstNum/$secNum;
        }
        break;
    case "multiply":
        echo $firstNum*$secNum;
        break;
    default:
        echo "Wrong operation supplied";
}