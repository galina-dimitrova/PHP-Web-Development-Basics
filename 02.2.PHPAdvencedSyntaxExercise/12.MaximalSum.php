<?php
$input = array_map('intval', explode(" ", readline()));
$rows = $input[0];
$col = $input[1];
$maxSum = PHP_INT_MIN;
$maxMatrix = array();
$sum = 0;
$matrix = array();
$subMatr = array();
for ($r = 0; $r < $rows; $r++) {
    $row = array_map('intval', explode(" ", readline()));
    for($c =0; $c < $col; $c++) {
        $matrix[$r][$c] = $row[$c];
        if ($r>=2 && $c>=2) {
            $sum = 0;
            for ($i = 0; $i<=2; $i++) {
                for ($j = 0; $j<=2; $j++) {
                    $subMatr[$i][$j] = $matrix[$r-2+$i][$c-2+$j];
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
echo "Sum = $maxSum\n";
foreach ($maxMatrix as $ro) {
    foreach ($ro as $co) {
        echo "$co ";
    }
    echo "\n";
}

