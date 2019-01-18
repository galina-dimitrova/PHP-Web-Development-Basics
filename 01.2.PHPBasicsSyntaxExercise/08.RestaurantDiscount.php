<?php
$groupSize = intval(readline());
$type = readline();
$price = 0;
$discount = 0.00;
$hall = null;

if ($groupSize<=50) {
    $price = 2500;
    $hall = 'Small Hall';
} else if ($groupSize<=100) {
    $price =5000;
    $hall = 'Terrace';
} else if ($groupSize<=120) {
    $price = 7500;
    $hall = 'Great Hall';
} else {
    echo "We do not have an appropriate hall.";
    return;
}
switch ($type) {
    case 'Normal':
        $price += 500;
        $discount = 0.05;
        break;
    case 'Gold':
        $price += 750;
        $discount = 0.10;
        break;
    case 'Platinum':
        $price += 1000;
        $discount = 0.15;
        break;
}
$pricePerPerson = ($price-$price*$discount)/$groupSize;

echo "We can offer you the $hall
The price per person is ";
echo number_format($pricePerPerson,2,'.','');
echo '$';