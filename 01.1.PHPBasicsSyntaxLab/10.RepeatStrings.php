<?php
$input = readline();
$arrWords = explode(" ", $input);
$output = null;
for ($i = 0; $i<count($arrWords); $i++) {
    $arrThis = str_split($arrWords[$i],1);
    $count = count($arrThis);
    while ($count>0) {
        $output .= $arrWords[$i];
        $count--;
    }
}
echo $output;