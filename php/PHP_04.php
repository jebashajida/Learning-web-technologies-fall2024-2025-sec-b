<?php
function findLargestNumber($num1, $num2, $num3) {
    if ($num1 >= $num2 && $num1 >= $num3) {
        echo "$num1 is the largest number.";
    } elseif ($num2 >= $num1 && $num2 >= $num3) {
        echo "$num2 is the largest number.";
    } else {
        echo "$num3 is the largest number.";
    }
}

$num1 = 4;
$num2 = 22;
$num3 = 3;

findLargestNumber($num1, $num2, $num3);
?>
