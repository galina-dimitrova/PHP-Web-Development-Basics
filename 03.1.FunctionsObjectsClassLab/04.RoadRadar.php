<?php
$speed = readline();
$area = readline();
getInfraction($speed, getLimit($area));

function getInfraction($speed, $limit) {
    if ($speed<$limit){
    }
    elseif ($speed<=$limit+20) {
        echo 'speeding';
    } elseif ($speed <= $limit+40) {
        echo 'excessive speeding';
    } else {
        echo 'reckless driving';
    }

}

function getLimit($area) {
    $limit = null;
    switch ($area){
        case 'motorway':
            $limit = 130;
            break;
        case 'interstate':
            $limit = 90;
            break;
        case 'city':
            $limit = 50;
            break;
        case 'residential':
            $limit = 20;
            break;
        default:
            echo 'Not a valid!';
            break;
    }
    return $limit;
}