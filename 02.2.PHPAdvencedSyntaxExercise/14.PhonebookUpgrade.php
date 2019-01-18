<?php
$input = readline();
$phone = array();
while ($input!="END") {
    $line = array_map(null, explode(" ", $input));
    $command = $line[0];
    switch ($command) {
        case 'A':
            $name = $line[1];
            $number = $line[2];
            $phone["$name"] = "$number";
            break;
        case 'S':
            $name = $line[1];
            if (isset($phone[$name])) {
                echo "$name -> $phone[$name]\n";
            } else {
                echo "Contact $name does not exist.\n";
            }
            break;
        case 'ListAll':
            ksort($phone);
            foreach ($phone as $key => $value) {
                echo "$key -> $value\n";
            }
            break;
    }
    $input = readline();
}