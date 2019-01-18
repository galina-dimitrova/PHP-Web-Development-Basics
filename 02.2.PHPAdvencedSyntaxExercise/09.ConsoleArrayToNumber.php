<?php
$input = array_map('intval', explode(" ", readline()));
$output = null;
if (count($input) == 1) {
    echo $input[0];
} else {
    while (count($output) != 1) {
        $output = [];
        for ($i = 1; $i < count($input); $i++) {
            $output[$i - 1] = $input[$i - 1] + $input[$i];
        }
        $input = $output;
    }
}
echo $output[0];