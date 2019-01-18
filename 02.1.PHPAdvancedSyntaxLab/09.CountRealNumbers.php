<?php
$input = array_map(null, explode(" ", readline()));
$numbers = array();
for ($i = 0; $i < count($input); $i++) {
    $num = $input[$i];
    if (array_key_exists("$num", $numbers)) {
        $numbers[$num]++;
    } else {
        $numbers[$num] = 1;
    }
}
ksort($numbers);
foreach ($numbers as $key => $value) {
    echo "$key -> $value \n";
}