<?php
$input = readline();
$tokens = str_split(readline(), 1);
$char = $tokens[0];
$occurrence = intval($tokens[2]);
$count = 0;

for ($i = 0; $i<strlen($input); $i++) {
    if ($input[$i]==$char) {
        $count++;
        if ($count==$occurrence) {
            echo $i;
            break;
        }
    }
}
if ($count<$occurrence) {
    echo 'Find the letter yourself!';
}
