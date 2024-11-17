<?php

function calculateRectangle($length, $width) {
    
    $area = $length * $width;

    
    $perimeter = 2 * ($length + $width);

    
    return array('area' => $area, 'perimeter' => $perimeter);
}


$length = 5;  
$width = 3;   


$result = calculateRectangle($length, $width);

echo "For a rectangle with length $length and width $width:<br>";
echo "Area = " . $result['area'] . " square units<br>";
echo "Perimeter = " . $result['perimeter'] . " units<br>";
?>
