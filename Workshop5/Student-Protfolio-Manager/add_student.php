<?php
$name = $email = $skills = "";
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $skills = trim($_POST["skills"]);

        if (empty($name)) {
            $errors["name"] = "Name is required";
        }

        if (empty($email)) {
            $errors["email"] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }

        if (empty($skills)) {
            $errors["skills"] = "Skills are required";
        }

        if (empty($errors)) {
            $skillsArray = explode(",", $skills);

            $skillsArray = array_map("trim", $skillsArray);

            $skillsString = implode(" | ", $skillsArray);

            $studentData = "Name: $name, Email: $email, Skills: $skillsString" . PHP_EOL;

            if (!file_put_contents("students.txt", $studentData, FILE_APPEND)) {
                throw new Exception("Failed to save student data");
            }

            $success = "Student added successfully 🎉";
            $name = $email = $skills = "";
        }
    } catch (Exception $e) {
        $errors["general"] = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>  
</head>
<body>

<h2>Add Student Info</h2>

<?php if (!empty($success)): ?>
    <p class="success"><?= $success ?></p>
<?php endif; ?>

<?php if (!empty($errors["general"])): ?>
    <p class="error"><?= $errors["general"] ?></p>
<?php endif; ?>

<form method="post">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
    <div class="error"><?= $errors["name"] ?? "" ?></div>

    <br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
    <div class="error"><?= $errors["email"] ?? "" ?></div>

    <br>

    <label>Skills (comma-separated):</label><br>
    <input type="text" name="skills" value="<?= htmlspecialchars($skills) ?>">
    <div class="error"><?= $errors["skills"] ?? "" ?></div>

    <br><br>

    <button type="submit">Add Student</button>
</form>

</body>
</html>
