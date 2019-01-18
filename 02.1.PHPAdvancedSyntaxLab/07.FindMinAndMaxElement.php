<?php
$matrixParam = array_map('intval', explode(", ", readline()));
$row = $matrixParam[0];
$col = $matrixParam[1];
$matrix = [];
for ($r = 0; $r < $row; $r++) {
    $mRow = array_map('intval', explode(", ", readline()));
    for ($c = 0; $c < $col; $c++) {
        $matrix[$r][$c] = $mRow[$c];
    }
}
$min = $matrix[0][0];
$max = $matrix[0][0];
for ($r = 0; $r < $row; $r++) {
    for ($c = 0; $c < $col; $c++) {
        if ($matrix[$r][$c] < $min) {
            $min = $mRow[$c];
        }
        if ($matrix[$r][$c] > $max) {
            $max = $mRow[$c];
        }
    }
}
echo "Min: $min \n";
echo "Max: $max";

