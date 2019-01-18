<?php
$n = intval(readline());
for ($i = 1; $i<=$n; $i++) {
    $sumDigits = null;
    $ost = $i;
    while ($ost%10 !=0) {
        $sumDigits += ($ost%10);
        $ost=$ost/10;
    }
    if ($sumDigits==5 || $sumDigits==7 || $sumDigits==11) {
        echo "{$i} -> True\n";
    } else {
        echo "{$i} -> False\n";
    }
}
