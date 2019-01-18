<?php
$input = array_map(null,explode(" ",readline()));
for ($i = 0; $i< count($input); $i++) {
    echo "$input[$i] => ".round(floatval($input[$i]), 0, PHP_ROUND_HALF_UP)."\n";
}