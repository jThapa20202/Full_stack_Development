<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$theme = $_COOKIE['theme'] ?? "light";
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: <?= $theme == "dark" ? "#000" : "#fff" ?>;
    color: <?= $theme == "dark" ? "#fff" : "#000" ?>;
}
</style>
</head>
<body>

<h2>Welcome, <?= $_SESSION['student_id']; ?> </h2>

<nav>
    <a href="dashboard.php">Dashboard</a> |
    <a href="preference.php">Change Theme</a> |
    <a href="logout.php">Logout</a>
</nav>

<p>This is the student dashboard.</p>

</body>
</html>
