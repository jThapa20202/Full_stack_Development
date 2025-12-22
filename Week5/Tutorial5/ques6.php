<?php
$input = "<script>alert('hack');</script> Welcome";
echo htmlspecialchars($input) . "<br>";

$text = "  Hello World  ";
echo "Before: '$text'<br>";
echo "After: '" . trim($text) . "'";
?>
