<?php


$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];


$searchElement = 2;


$found = false;

foreach ($array as $element) {
    if ($element == $searchElement) {
        $found = true;
        break; 
    }
}

if ($found) {
    echo "Element $searchElement was found in the array.";
} else {
    echo "Element $searchElement was not found in the array.";
}

?>
