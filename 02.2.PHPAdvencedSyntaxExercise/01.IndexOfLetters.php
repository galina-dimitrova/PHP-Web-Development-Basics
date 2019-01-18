<?php
$letters = [];
for ($i = 97; $i<=122; $i++) {
    array_push($letters, $i);
}
$input = strtolower(readline());
for ($i = 0; $i < strlen($input); $i++) {
    for ($j=0; $j<count($letters); $j++) {
        if ($input[$i]==chr($letters[$j])) {
            echo $input[$i] . " -> " . $j . "\n";
        }
    }
}
