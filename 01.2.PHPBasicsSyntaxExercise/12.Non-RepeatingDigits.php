<?php
$input = intval(readline());
$first = intval(null);
$second =intval( null);
$third = intval(null);
$output = null;
if ($input<102) {
    echo 'no';

} else {
    for ($i = 102; $i<=min(987, $input); $i++) {
        $trying = $i;
        $third = round($trying % 10, 0);
        $trying=$trying/10;
        $second = round($trying % 10, 0);
        $first = round($trying/10, 0);

        if ($first != $second && $second != $third && $first != $third) {
            if ($i==102) {
                $output = $i;
            } else {
                $output .= ", $i";
            }
        }
    }
}
echo $output;