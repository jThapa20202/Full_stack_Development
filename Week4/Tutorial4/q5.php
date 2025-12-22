<form method="post">
    Sentence: <input type="text" name="sentence">
    <button>Count</button>
</form>

<?php
if (isset($_POST['sentence'])) {
    $s = strtolower($_POST['sentence']);
    $count = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        if (in_array($s[$i], ['a','e','i','o','u'])) {
            $count++;
        }
    }
    echo "Vowels Count: $count";
}
?>
