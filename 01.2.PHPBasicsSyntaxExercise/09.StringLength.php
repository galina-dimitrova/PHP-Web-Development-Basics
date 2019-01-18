<?php
$input = readline();
$count = strlen($input);

if ($count>=20) {
    echo substr($input,0, 20);
} else {
    echo substr($input,0, $count);
    for ($i=1; $i<=20-$count; $i++) {
        echo '*';
    }
}