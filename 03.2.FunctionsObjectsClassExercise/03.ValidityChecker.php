<?php
$input = explode(", ", readline());
$x1 = $input[0];
$y1 = $input[1];
$x2 = $input[2];
$y2 = $input[3];
$x0 = 0;
$y0 = 0;

function distance ($x1, $y1, $x2, $y2) {
    return sqrt(pow($x1-$x2, 2)+ pow($y1-$y2, 2));
}

if (strpos(distance($x1,$y1, $x0, $y0), '.')===false) {
    echo '{'."$x1, $y1} to ".'{'."$x0, $y0} is valid\n";
} else {
    echo '{'."$x1, $y1} to ".'{'."$x0, $y0} is invalid\n";
}
if (strpos(distance($x2, $y2, $x0, $y0),'.')===false) {
    echo '{'."$x2, $y2} to ".'{'."$x0, $y0} is valid\n";
} else {
    echo '{'."$x2, $y2} to ".'{'."$x0, $y0} is invalid\n";
}
if (strpos(distance($x1, $y1, $x2, $y2), '.')===false) {
    echo '{'."$x1, $y1} to ".'{'."$x2, $y2} is valid";
} else {
    echo '{'."$x1, $y1} to ".'{'."$x2, $y2} is invalid";
}
