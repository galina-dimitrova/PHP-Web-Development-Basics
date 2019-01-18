<?php
$input = array_map(null, explode(" ", strtolower(readline())));
$words = array();
for ($i = 0; $i < count($input); $i++) {
    $word = $input[$i];
    if (array_key_exists("$word", $words)) {
        $words[$word]++;
    } else {
        $words[$word] = 1;
    }
}
$output = array();
foreach ($words as $key => $value) {
    if ($value%2!=0) {
        array_push($output, $key);
    }
}
echo implode(", ", $output);