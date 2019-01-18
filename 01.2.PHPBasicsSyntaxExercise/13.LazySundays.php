<?php
$month = readline();

$start  = new DateTime("01-$month-2018");
$end    = new DateTime("31-$month-2018");

for ($date = $start; $date<=$end; $date->modify('+1 day')) {
    if ($date->format("D")=="Sun") {
        //$output = $date-> format("j m, Y");
        echo $date->format("j")."rd ".$date->format("m, Y")." \n";
    }
}
