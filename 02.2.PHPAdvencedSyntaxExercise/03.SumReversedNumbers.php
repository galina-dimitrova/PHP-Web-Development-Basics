<?php
$input = array_map(null, explode(" ", readline()));
$sum = 0;
for ($i = 0; $i < count($input); $i++) {
    $num = $input[$i];
    $revNum = null;
    for ($j = strlen($num)-1; $j>=0; $j--)
    {
        $revNum.=$num[$j];
    }
    $sum+=intval($revNum);
}
echo $sum;