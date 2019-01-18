<?php
$first = intval(readline());
$second = intval(readline());
if ($second>=10) {
    $multi = $first*$second;
    echo "$first X $second = $multi";
} else {
    for ($i = $second; $i<=10; $i++) {
        $multi = $first*$i;
        echo "$first X $i = $multi \n";
    }
}