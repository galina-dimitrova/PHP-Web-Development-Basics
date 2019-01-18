<?php
$input = readline();
$phone = array();
while ($input!="END") {
    $line = array_map(null, explode(" ", $input));
    $command = $line[0];
    $name = $line[1];
    switch ($command) {
        case 'A':
            $number = $line[2];
            $phone["$name"] = "$number";
            break;
        case 'S':
            if (isset($phone[$name])) {
                echo "$name -> $phone[$name]\n";
            } else {
                echo "Contact $name does not exist.\n";
            }
    }
    $input = readline();
}