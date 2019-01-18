<?php
$n = intval(readline());
$inputArr = [];
for ($i = 0; $i<$n; $i++) {
    $inputArr[$i]=intval(readline());
}
for ($i = $n-1; $i>=0; $i--) {
    echo $inputArr[$i]." ";
}