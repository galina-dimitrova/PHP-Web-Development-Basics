<?php
$input = readline();
$phone = array();
while ($input!='Over') {
    $line = array_map(null, explode(" : ", $input));
    $first = $line[0];
    if (ord($first[0])>=48 && ord($first[0])<=57) {
        $number = $first;
        $name = $line[1];
    } else {
        $number = $line[1];
        $name = $first;
    }
    $phone["$name"] = "$number";
    $input=readline();
}
ksort($phone);
foreach ($phone as $key => $value) {
    echo "$key -> $value\n";
}