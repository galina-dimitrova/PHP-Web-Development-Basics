<?php        //1 test ne minava...
$input = readline();
$emplAge = array();
$emplSalary = array();
$emplPos = array();
while ($input!= 'filter base') {
    $info = explode(" -> ", $input);
    $name = $info[0];
    $data = $info[1];
    if (is_numeric($data)&&(strpos($data,'.')==false)) {
        $emplAge[$name] = (int)$data;
    } else if (is_numeric($data)) {
        $emplSalary[$name] = (float)$data;
    } else {
        $emplPos[$name] = $data;
    }
    $input = readline();
}
$input = readline();
switch ($input) {
    case 'Age':
        foreach ($emplAge as $key=>$value) {
            echo "Name: $key\n";
            echo "Age: $value\n";
            echo '===================='.PHP_EOL;
        }
        break;
    case 'Salary':
        foreach ($emplSalary as $key=>$value) {
            echo "Name: $key\n";
            echo "Salary: ".number_format($value, 2,'.','')."\n";
            echo '===================='.PHP_EOL;
        }
        break;
    case 'Position':
        foreach ($emplPos as $key=>$value) {
            echo "Name: $key\n";
            echo "Position: $value\n";
            echo '===================='.PHP_EOL;
        }
        break;
}