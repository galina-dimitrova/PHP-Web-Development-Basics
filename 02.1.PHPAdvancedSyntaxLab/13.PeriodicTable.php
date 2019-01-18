<?php
$input = array_map(null, explode(", ", readline()));
$elements = array();
for ($i = 0; $i<count($input); $i++) {
    if (array_key_exists("$input[$i]", $elements)) {
        $elements[$input[$i]]++;
    } else {
        $elements[$input[$i]] = 1;
    }
}
foreach ($elements as $key => $value) {
    if ($value==1) {
        echo "$key ";
    }
}