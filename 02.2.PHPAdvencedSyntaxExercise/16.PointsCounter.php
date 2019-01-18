<?php
$data = readline();
$ranglist = array();
$garbage = array('@', '%', '&', '$', '*');
$rangLiPoints = array();
while ($data!='Result') {
    $input = explode("|", $data);
    $input = str_replace($garbage,"",$input);
    $team = null;
    $player = null;
    $points = intval($input[2]);
    $first = $input[0];
    $last = strlen($first);
    if (ord($first[$last-1])>=97 && ord($first[$last-1])<=122) {
        $player = $first;
        $team = $input[1];
    } else {
        $player = $input[1];
        $team = $first;
    }
    $ranglist["$team"]["$player"] = "$points";
    $data = readline();
}
foreach ($ranglist as $key=>$value) {
    foreach ($value as $pl=>$p) {
        if (array_key_exists($key,$rangLiPoints)) {
            $rangLiPoints[$key]+=$p;
        } else {
            $rangLiPoints[$key] = $p;
        }
    }
}
arsort($rangLiPoints);
foreach ($rangLiPoints as $key => $val) {
    echo "$key => $val\n";
    arsort($ranglist[$key]);
    echo "Most points scored by ".key($ranglist[$key])."\n";
}
