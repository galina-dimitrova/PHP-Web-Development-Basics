<?php
$first = intval(readline());
$second = intval(readline());
if ($first<$second) {
    for ($i=$first; $i<=$second; $i++) {
        echo "$i \n";
    }
} else {
    for ($i = $second; $i<=$first; $i++) {
        echo "$i \n";
    }
}