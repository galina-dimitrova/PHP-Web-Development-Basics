<?php
$first = floatval(readline());
$second = floatval(readline());
$sum = $first+$second;
echo "\$firstNumber + \$secondNumber = $first + $second = ";
echo number_format($sum, 2, '.', '');