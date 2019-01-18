<?php
$input = array_map(null, explode(" ", readline()));
$mostCh = 0;
$mostCount = 0;

for ($i = 0; $i < count($input); $i++) {
    $ch = $input[$i];
    $count = 0;
    for ($j = 0; $j < count($input); $j++) {
        if ($ch==$input[$j]) {
            $count++;
        }
        if ($count > $mostCount) {
            $mostCh = $ch;
            $mostCount = $count;
        }
    }
}

echo $mostCh;