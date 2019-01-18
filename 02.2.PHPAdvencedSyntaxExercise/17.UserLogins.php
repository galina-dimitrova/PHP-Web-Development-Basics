<?php
$input = readline();
$passList = array();
while ($input!='login') {
    $passwords = explode(" -> ", $input);
    $passList[$passwords[0]] = $passwords[1];
    $input = readline();
}
$unsuccessful = 0;
$input = readline();
while ($input!='end') {
    $tryLog = explode(" -> ", $input);
    if (array_key_exists("$tryLog[0]",$passList) && $passList[$tryLog[0]]==$tryLog[1]) {
        echo "$tryLog[0]: logged in successfully\n";
    } else {
        echo "$tryLog[0]: login failed\n";
        $unsuccessful++;
    }
    $input = readline();
}
echo "unsuccessful login attempts: $unsuccessful";