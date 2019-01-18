<?php
for ($r=0, $g=0, $b=0; $r<256; $r+=16, $g+=8, $b+=4):
    $color = "#" .
        str_pad(dechex($r), 2, '0') .
        str_pad(dechex($g), 2, '0') .
        str_pad(dechex($b), 2, '0');
?>
 <div style="width:400px;
  background-color:<?= $color ?>"> <?= $color ?></div>
<?php endfor; ?>


