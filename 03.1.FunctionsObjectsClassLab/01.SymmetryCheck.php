<?php
$input = readline();
echo isPalindrome($input);

function isPalindrome($forCheck){
    for ($i = 0; $i <strlen($forCheck)/2; $i++){
        if ($forCheck[$i] == $forCheck[strlen($forCheck)-$i-1]) {
            return "true";
        } else {
            return "false";
            break;
        }
    }
}