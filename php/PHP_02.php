<?php


$amount = 1000;  

$vatRate = 0.15;  

$vatAmount = $amount * $vatRate;

$totalAmount = $amount + $vatAmount;

echo "Original Amount: " . number_format($amount, 2) . "<br>";
echo "VAT (15%): " . number_format($vatAmount, 2) . "<br>";
echo "Total Amount (including VAT): " . number_format($totalAmount, 2) . "<br>";

?>
