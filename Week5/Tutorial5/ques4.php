<?php
$statement = "Full Stack Debvelopment with PHP";
echo "Length: " .strlen($statement) ."<br>";
echo "word_count: " .str_word_count($statement) ."<br>";
echo "Reverse: " .strrev($statement) . "<br>";
echo "Position of PHP: " .strpos($statement "PHP") . "<br>";
echo "Replaced: " . str_replace("PHP", "JavaScript", $statement);
?>