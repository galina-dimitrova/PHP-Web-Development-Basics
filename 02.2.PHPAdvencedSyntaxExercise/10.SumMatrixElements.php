<?php
$input = array_map('intval', explode(", ", readline()));
$rows = $input[0];
$col = $input[1];
$matrix = [];
$sum = 0;
for ($r = 0; $r < $rows; $r++) {
    $row = array_map('intval', explode(", ", readline()));
    foreach ($row as $num) {
        $sum+=$num;
    }
}
echo "$rows\n";
echo "$col\n";
echo "$sum\n";