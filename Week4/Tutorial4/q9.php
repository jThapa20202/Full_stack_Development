<form method="post">
    Password: <input type="password" name="pass">
    <button>Check</button>
</form>

<?php
if (isset($_POST['pass'])) {
    $p = $_POST['pass'];

    if (strlen($p) < 8) echo "Too short<br>";
    if (!preg_match('/[0-9]/', $p)) echo "Needs number<br>";
    if (!preg_match('/[\W]/', $p)) echo "Needs special char<br>";
}
?>
