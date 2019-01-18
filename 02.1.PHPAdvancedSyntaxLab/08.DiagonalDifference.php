<?php
$n = intval(readline());
$matrix = [];
for ($r = 0; $r < $n; $r++) {
    $mRow = array_map('intval', explode(" ", readline()));
    for ($c = 0; $c < $n; $c++) {
        $matrix[$r][$c] = $mRow[$c];
    }
}
$primD = null;
$secD = null;
for ($r = 0; $r<$n; $r++) {
    $primD += $matrix[$r][$r];
    $secD += $matrix[$r][$n-$r-1];
}
$output = abs($primD-$secD);
echo $output;