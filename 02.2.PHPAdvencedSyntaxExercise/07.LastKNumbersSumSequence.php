<?php
$n = intval(readline());
$k = intval(readline());
$seq = [];
for ($i = 0; $i < $n; $i++) {
    if ($i==0) {
        array_push($seq, '1');
    } else {
        $sum=0;
        for ($j = max($i-$k, 0); $j<$i; $j++) {
            $sum+=$seq[$j];
        }
        array_push($seq, $sum);
    }
}
for ($i = 0; $i < count($seq); $i++) {
    echo "$seq[$i] ";
}