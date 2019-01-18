<?php
$input = array_map(null, explode(" ", readline()));
$mostCh = [];
$mostCount = 0;
$count = 1;
for ($j = 1; $j < count($input); $j++) {
    if ($input[$j]>$input[$j-1]) {
        $count++;
        if ($count>$mostCount) {
            $mostCount = $count;
            $mostCh = [];
            for ($i = $j-$mostCount+1; $i<=$j; $i++) {
                array_push($mostCh, $input[$i]);
            }
        }
    } else {
        $count = 1;
    }
}
for ($i = 0; $i<$mostCount; $i++) {
    echo $mostCh[$i]." ";
}
