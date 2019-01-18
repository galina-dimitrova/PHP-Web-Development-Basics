<?php
$input = readline();
$products = array();
while ($input!='shopping time') {
    $info = explode(" ", $input);
    if (array_key_exists($info[1], $products)) {
        $products[$info[1]] += $info[2];
    } else {
        $products[$info[1]] = $info[2];
    }
    $input = readline();
}
$input = readline();
while ($input!='exam time') {
    $info = explode(" ", $input);
    if (array_key_exists($info[1], $products)) {
        if ($products[$info[1]]==0) {
            echo "$info[1] out of stock\n";
        } else if ($info[2]>=$products[$info[1]]){
            $products[$info[1]] = 0;
        } else {
            $products[$info[1]]-=$info[2];
        }
    } else {
        echo "$info[1] doesn't exist\n";
    }
    $input = readline();
}
foreach ($products as $key=>$value) {
    if ($value!=0) {
        echo "$key -> $value\n";
    }
}