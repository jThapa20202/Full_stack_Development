<?php
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass  = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if ($name == "") {
        $errors['name'] = "Name is required";
    }

    if ($email == "") {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if ($pass == "") {
        $errors['password'] = "Password is required";
    } elseif (strlen($pass) < 8) {
        $errors['password'] = "Minimum 8 characters required";
    } elseif (!preg_match('/[\W]/', $pass)) {
        $errors['password'] = "Must include a special character";
    }

    if ($pass !== $cpass) {
        $errors['cpassword'] = "Passwords do not match";
    }

    if (empty($errors)) {

        $jsonFile = "users.json";
        $jsonData = file_get_contents($jsonFile);

        if ($jsonData === false) {
            $errors['file'] = "Error reading JSON file";
        } else {
            $users = json_decode($jsonData, true);
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
            $newUser = [
                "name" => $name,
                "email" => $email,
                "password" => $hashedPassword
            ];

            $users[] = $newUser;
            if (file_put_contents($jsonFile, json_encode($users, JSON_PRETTY_PRINT))) {
                $success = "Registration successful!";
            } else {
                $errors['file'] = "Error writing to JSON file";
            }
        }
    }
}
?>

<h2>User Registration</h2>

<?php if ($success): ?>
    <div><?= $success ?></div>
<?php endif; ?>

<form method="post">

    Name:<br>
    <input type="text" name="name">
    <div style="color:red"><?= $errors['name'] ?? "" ?></div>

    Email:<br>
    <input type="text" name="email">
    <div style="color:red"><?= $errors['email'] ?? "" ?></div>

    Password:<br>
    <input type="password" name="password">
    <div style="color:red"><?= $errors['password'] ?? "" ?></div>

    Confirm Password:<br>
    <input type="password" name="cpassword">
    <div style="color:red"><?= $errors['cpassword'] ?? "" ?></div>

    <br>
    <button type="submit">Register</button>
</form>

<div><?= $errors['file'] ?? "" ?></div>
