<?php
$n = 10;
$html = '<ul>';
for ($i=1; $i <= $n; $i++) {
    $color = 'blue';
    if ($i%2 != 0) {
        $color = 'green';
    }
    $html .= " <li><span style='color:
        $color'>$i</span></li>";
}
$html .='</ul>';