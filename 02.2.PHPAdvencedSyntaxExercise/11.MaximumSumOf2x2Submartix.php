<?php
$input = array_map('intval', explode(", ", readline()));
$rows = $input[0];
$col = $input[1];
$maxSum = PHP_INT_MIN;
$maxMatrix = array();
$sum = 0;
$matrix = array();
$subMatr = array();
for ($r = 0; $r < $rows; $r++) {
    $row = array_map('intval', explode(", ", readline()));
    for($c =0; $c < $col; $c++) {
        $matrix[$r][$c] = $row[$c];
            if ($r>=1 && $c>=1) {
                $sum = 0;
                for ($i = 0; $i<=1; $i++) {
                    for ($j = 0; $j<=1; $j++) {
                        $subMatr[$i][$j] = $matrix[$r-1+$i][$c-1+$j];
                        $sum+=$subMatr[$i][$j];
                    }
                }
                if ($sum>$maxSum) {
                    $maxSum = $sum;
                    $maxMatrix = $subMatr;
                }
            }
    }
}
foreach ($maxMatrix as $ro) {
    foreach ($ro as $co) {
        echo "$co ";
    }
    echo "\n";
}
echo $maxSum;
