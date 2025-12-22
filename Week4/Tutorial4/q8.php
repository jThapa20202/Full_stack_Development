<form method="post">
    Email: <input name="email">
    <button>Check</button>
</form>

<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if (strpos($email, '@') > 0 && strpos($email, '.') !== false) {
        echo "Valid email (basic check)";
    } else {
        echo "Email format incorrect (basic check)";
    }
}
?>
