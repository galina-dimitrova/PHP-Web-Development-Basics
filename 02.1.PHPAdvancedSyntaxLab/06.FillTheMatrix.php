<?php
$input = array_map(null,explode(", ",readline()));
$n = intval($input[0]);
$pattern = $input[1];

switch ($pattern) {
    case "A":
        matrixA($n);
        break;
    case "B":
        matrixB($n);
        break;
}

function matrixA($n) {
    $matrix = [];
    for ($r = 0; $r < $n; $r++) {
        $matrix[$r] = [];
        $count = 1+$r;
        for ($c = 0; $c < $n; $c++) {
            $matrix[$r][$c] = $count;
            $count+=$n;
        }
    }
    printMatrix($matrix, $n);
}

function matrixB($n) {
    $matrix = [];
    for ($r = 0; $r < $n; $r++) {
        $matrix[$r] = [];
        $count = 1+$r;
        for ($c = 0; $c < $n; $c++) {
            $matrix[$r][$c] = $count;
            if ($c%2==0) {
                $count+=(2*$n-1-2*$r);
            } else {
                $count+=1+$r*2;
            }
        }
    }
    printMatrix($matrix, $n);
}

function printMatrix($matrix, $n) {
    for ($r = 0; $r < $n; $r++) {
        for ($c = 0; $c < $n; $c++) {
            echo $matrix[$r][$c]." ";
        }
        echo "\n";
    }
}
