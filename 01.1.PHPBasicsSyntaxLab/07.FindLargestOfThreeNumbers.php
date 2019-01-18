<?php
$first = readline();
$second = readline();
$third = readline();
if ($first>$second) {
    $largestFromFirSec = $first;
} else {
    $largestFromFirSec = $second;
}
$largest = null;
if ($largestFromFirSec>$third) {
    $largest = $largestFromFirSec;
} else {
    $largest = $third;
}
echo $largest;