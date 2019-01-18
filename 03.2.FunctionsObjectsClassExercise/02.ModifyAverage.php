<?php
$n = readline();
calculateAverage($n);
while (calculateAverage($n)<5) {
    $n *=10;
    $n+=9;
}
echo $n;

function calculateAverage ($n) {
    $sum = 0;
    $count = 0;
    while ((int)$n>0) {
        $sum+=$n%10;
        $n/=10;
        $count+=1;
    }
    return $sum/$count;
}