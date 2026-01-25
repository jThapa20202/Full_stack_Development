<?php
require 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $password = $_POST['password'] ?? '';

    if (!$email || empty($password)) {
        $message = "Invalid email or password";
    } elseif (strlen($password) < 6) {
        $message = "Invalid email or password";
    } else {

      
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            
            $stmt = $pdo->prepare(
                "INSERT INTO users (email, password) VALUES (:email, :password)"
            );

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            $stmt->execute();

            $message = "User signed up successfully";
            header("refresh:2; url=login.php");

        } catch (Exception $e) {
            
            $message = "Something went wrong";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h2>Signup</h2>

<?php if ($message): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<form method="POST">
    <label>Email:</label><br>
    <input type="text" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Signup</button>
</form>

<br>
<a href="login.php">Go to Login</a>
</body>
</html>