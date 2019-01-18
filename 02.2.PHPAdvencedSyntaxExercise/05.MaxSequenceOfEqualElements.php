<?php
$input = explode(" ", readline());
$mostCh = 0;
$mostCount = 1;
    $count = 1;
    for ($j = 1; $j < count($input); $j++) {
        if ($input[$j]==$input[$j-1]) {
            $count++;
            if ($count>$mostCount) {
                $mostCount = $count;
                $mostCh = $input[$j];
            }
        } else {
            $count = 1;
        }
}
if ($mostCount == 1) {
        echo "$input[0]";
} else {
    for ($i = 0; $i<$mostCount; $i++) {
        echo $mostCh . " ";
    }
}
