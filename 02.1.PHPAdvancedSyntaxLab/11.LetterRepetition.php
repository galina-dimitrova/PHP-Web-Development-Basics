<?php
$input = readline();
$characters = array();
for ($i = 0; $i < strlen($input); $i++) {
    $ch = $input[$i];
    if (array_key_exists("$ch", $characters)) {
        $characters[$ch]++;
    } else {
        $characters[$ch] = 1;
    }
}
foreach ($characters as $key => $value) {
    echo "$key -> $value\n";
}