<?php
$input1 = array_map('intval',explode(" ",readline()));
$input2 = array_map('intval',explode(" ",readline()));
for ($i = 0; $i < max(count($input1),count($input2)); $i++) {
        $a=$input1[$i%count($input1)];
        $b = $input2[$i%count($input2)];
    $sum = $a+$b;
    echo "$sum ";
}