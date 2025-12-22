<?php
$fruits = "apple,banana,grape,orange";
$fruitArray = explode(",", $fruits);

foreach ($fruitArray as $fruit) {
    echo $fruit . "<br>";
}

echo implode(" | ", $fruitArray);
?>
