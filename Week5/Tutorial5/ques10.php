<?php
$file = fopen("note.txt", "a");
fwrite($file, "Appended via PHP tutorial.\n");
fclose($file);

echo nl2br(file_get_contents("note.txt"));
?>
