<?php
$input = array_map('intval',explode(" ",readline()));
$count = 0;
for ($i = 0; $i <count($input); $i++) {
    $a = $input[$i];
    for ($j = $i+1; $j<count($input); $j++) {
        $b = $input[$j];
        for ($k = 0; $k<count($input); $k++) {
            $c = $input[$k];
            if ($a+$b==$c) {
                echo "$a + $b == $c\n";
                $count++;
            }
        }
    }
}
if ($count == 0) {
    echo "No";
}