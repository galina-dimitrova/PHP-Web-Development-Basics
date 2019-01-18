<?php
$input = explode(", ", readline());
$points = array();
for ($i = 0; $i<count($input); $i+=2) {
    $point = new Point($input[$i], $input[$i+1]);
    array_push($points, $point);
}
$dist12 = calculateDistance($points[0], $points[1]);
$dist23 = calculateDistance($points[1], $points[2]);
$dist31 = calculateDistance($points[2], $points[0]);
$minDist = $dist12+$dist23;
$minTrip = "1->2->3";
if ($dist23+$dist31<$minDist) {
    $minDist=$dist23+$dist31;
    $minTrip = "1->3->2";
}
if ($dist31+$dist12<$minDist) {
    $minDist = $dist31+$dist12;
    $minTrip = "2->1->3";
}

echo "$minTrip: $minDist";

class Point {
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}
function calculateDistance ($point1, $point2) {
    return sqrt(pow($point1->x-$point2->x, 2)
        + pow($point1->y-$point2->y, 2));
}