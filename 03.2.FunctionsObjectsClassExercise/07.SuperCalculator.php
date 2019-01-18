<?php
$command = "";
$nums = [];
$results = [];
$input = readline();
while ($input!="finally") {
    if (!is_numeric($input)) {
        $command = $input;
        $nums = [];
    } else {
        $num = $input;
        $nums[] = $num;
    }
    if (calculate($command, $nums)!= 0) {
        $results[] = calculate($command, $nums);
    }
    $input = readline();
}
$newCommand = readline();
echo calculate($newCommand, $results);

function calculate ($command, $nums) {
    $result = 0;
    $num1 = 0;
    $num2 = 0;

    for ($i = 1; $i<count($nums); $i++) {
        $num1 = $nums[$i-1];
        $num2 = $nums[$i];

    }
    switch ($command) {
        case "sum":
            $result = $num1+$num2;
            break;
        case "multiply":
            $result = $num1*$num2;
            break;
        case "divide":
            if ($num2==0) {
                echo "Division by zero.";
            } else {
                $result = $num1 / $num2;
            }
            break;
        case "subtract":
            $result = $num1-$num2;
            break;
        case "factorial":
            $result = gmp_fact($nums[0]);
            break;
        case "root":
            if (intval($nums[0])<0) {
                echo "Can't take the root of a negative number";
            } else {
                $result = gmp_root($nums[0], 2);
            }
            break;
        case "power":
            $result = gmp_pow($num1,$num2);
            break;
        case "absolute":
            $result = gmp_abs($nums[0]);
            break;
        case "pythagorean":
            $result = gmp_root((gmp_pow($num1, 2)+gmp_pow($num2, 2)),2);
            break;
        case "triangleArea":
            $s= ($num1+$num2+$nums[2])/2;
            $result = gmp_root($s*($s-$num1)*($s-$num2)*($s-$nums[2]), 2);
            if ($result=0 || $result=="NAN") {
                echo "Can't take the root of a negative number";
            }
            break;
        case "quadratic":
         if (gmp_pow($num2, 2)-4*$num1*$nums[2]<0) {
             echo "Division by zero";
         } elseif (gmp_pow($num2, 2)-4*$num1*$nums[2]==0) {
             $result = -$num2 / (2 * $num1);
         } else {
             $res1 = (-$num2+gmp_root((gmp_pow($num2, 2)-4*$num1*$nums[2]), 2))/(2*$num1);
             $res2 = (-$num2-gmp_root((gmp_pow($num2, 2)-4*$num1*$nums[2]), 2))/(2*$num1);
            $result = $res1+$res2;
         }
    }
    return $result;
}
