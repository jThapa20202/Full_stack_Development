<form method="post">
    Word: <input type="text" name="word" required>
    <button type="submit">Reverse</button>
</form>

<?php
if (isset($_POST['word'])) {

    $word = $_POST['word'];
    $rev = "";
    $length = strlen($word);

    for ($i = $length - 1; $i >= 0; $i--) {
        $rev = $rev . $word[$i];
    }

    echo "Reversed: " . $rev;
}
?>
