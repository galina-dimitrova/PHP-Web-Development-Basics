<?php
$n = intval(readline());
$tokens = array_map(null, explode(", ", readline()));
foreach ($tokens as $token) {
    calculateN($n, $token);
    echo "$n\n";
}

function calculateN (&$n, $comand) {
    switch ($comand) {
        case 'chop':
            $n /= 2;
            break;
        case 'dice':
            $n = sqrt($n);
            break;
        case 'spice':
            $n+=1;
            break;
        case 'bake':
            $n*=3;
            break;
        case 'fillet':
            $n -= $n*0.2;
            break;
    }
}