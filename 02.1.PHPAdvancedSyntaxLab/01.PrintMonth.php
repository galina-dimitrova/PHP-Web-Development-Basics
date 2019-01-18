<?php
$months = ['January','February','March','April',
    'May','June','July','August','September','October',
    'November','December'];
$n = intval(readline());
if (array_key_exists($n-1, $months)) {
    echo $months[$n-1];
} else {
    echo 'Invalid Month!';
}
