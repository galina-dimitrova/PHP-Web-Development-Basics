<?php
$input = readline();
while ($input != "end") {
    $reversed = null;
    $arrIn = str_split($input,1);
    for ($i = count($arrIn); $i>=0; $i--) {
        $reversed .= $input[$i];
    }
    echo "{$input} = {$reversed}"."\n";
    $input = readline();
}