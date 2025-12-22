<?php
include 'functions.php';
include 'header.php';

$name = $email = $skills = "";
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = formatName($_POST["name"]);
        $email = trim($_POST["email"]);
        $skills = trim($_POST["skills"]);

        if (empty($name)) {
            $errors["name"] = "Name required";
        }

        if (!validateEmail($email)) {
            $errors["email"] = "Invalid email";
        }

        if (empty($skills)) {
            $errors["skills"] = "Skills required";
        }

        if (!$errors) {
            $skillsArray = cleanSkills($skills);
            saveStudent($name, $email, $skillsArray);
            $success = "Student added successfully 🎉";
            $name = $email = $skills = "";
        }
    } catch (Exception $e) {
        $errors["general"] = $e->getMessage();
    }
}
?>

<h3>Add Student Info</h3>

<?= $success ? "<p>$success</p>" : "" ?>
<?= $errors["general"] ?? "" ?>

<form method="post">
    Name:<br>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br>
    <?= $errors["name"] ?? "" ?><br>

    Email:<br>
    <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br>
    <?= $errors["email"] ?? "" ?><br>

    Skills (comma-separated):<br>
    <input type="text" name="skills" value="<?= htmlspecialchars($skills) ?>"><br>
    <?= $errors["skills"] ?? "" ?><br><br>

    <button type="submit">Add Student</button>
</form>

<?php include 'footer.php'; ?>
