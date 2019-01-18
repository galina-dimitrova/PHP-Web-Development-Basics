<?php
$n = intval(readline());
$count = 1;
$num = 1;
$sum = 0;
do {
    echo "$num \n";
    $sum+=$num;
    $count+=1;
    $num+=2;
} while ($count<=$n);
echo "Sum: $sum";