<?php
$input = array_map(null, explode(", ", readline()));
$x=null;
$y=null;
$z=null;
for ($i = 0; $i < count($input); $i++) {
    if ($i%3==0) {
        $x = $input[$i];
    } elseif ($i%3==1) {
        $y = $input[$i];
    } elseif ($i%3==2) {
        $z = $input[$i];
        insideVolume($x, $y, $z);
    }
}

function insideVolume($x, $y, $z) {
    if ($x>=10 && $x<=50) {
        if ($y>=20 && $y<=80){
            if ($z>=15 && $z<=50) {
                echo "inside\n";
                return;
            } else {
                echo "outside\n";
            }
        } else {
            echo "outside\n";
        }
    } else {
        echo "outside\n";
    }
}