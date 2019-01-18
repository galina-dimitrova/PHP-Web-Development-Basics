<?php
$input = array_map('intval', explode(" ", readline()));
$k = intval(readline());
$sums = [];
$n = count($input);
for ($i = 1; $i<=$k; $i++) {
    for ($j = 0; $j<$n; $j++) {
        if (isset($sums[($i+$j)%$n])) {
            $sums[($i+$j)%$n]+=$input[$j];
        } else {
            $sums[($i+$j)%$n]=$input[$j];
        }
    }
}
for ($i = 0; $i < $n; $i++) {
    echo "$sums[$i] ";
}