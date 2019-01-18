<?php
$input = array_map(null, explode(", ", readline()));
$towns = array();
for ($i= 0; $i <count($input); $i+=2) {
        if (array_key_exists("$input[$i]", $towns)) {
            $towns[$input[$i]]+= intval($input[$i+1]);
        } else {
            $towns[$input[$i]] = $input[$i+1];
        }
}
foreach ($towns as $key=>$value) {
    echo "$key => $value\n";
}