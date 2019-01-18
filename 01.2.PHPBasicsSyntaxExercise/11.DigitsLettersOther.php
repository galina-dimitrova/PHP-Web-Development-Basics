<?php
$input = readline();
$digits = null;
$letters = null;
$other = null;
for ($i = 0; $i<strlen($input); $i++) {
    if (is_numeric($input[$i])) {
        $digits.=$input[$i];
    } else if (((ord($input[$i])>= 65) && (ord($input[$i])<=90)) ||
        ((ord($input[$i])>=97) && (ord($input[$i])<=122))) {
        $letters.=$input[$i];
    } else {
        $other.=$input[$i];
    }
}
echo "$digits \n";
echo "$letters \n";
echo $other;