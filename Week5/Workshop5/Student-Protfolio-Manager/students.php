<?php
include 'header.php';

$file = fopen("students.txt", "r");

if (!$file) {
    echo "Unable to open students file.";
    exit;
}

echo "<h3>Student List</h3>";

while (($line = fgets($file)) !== false) {
    $line = trim($line);

    if ($line === "") {
        continue;
    }
    $parts = explode("|", $line);

    if (count($parts) !== 3) {
        continue;
    }

    $name  = trim($parts[0]);
    $email = trim($parts[1]);

    // Skills as array
    $skillsArray = explode(",", trim($parts[2]));

    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Skills:</strong> " . implode(", ", $skillsArray) . "</p>";
    echo "<hr>";
}

fclose($file);

include 'footer.php';
?>
