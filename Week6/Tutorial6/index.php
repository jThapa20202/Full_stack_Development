
<?php

include "db.php";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $conn->query("INSERT INTO students VALUES (NULL, '$name', '$email', '$course')");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $conn->query("UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id");
}
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $edit = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<body>

<h3><?php echo $edit ? "Edit Student" : "Add Student"; ?></h3>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $edit['id'] ?? ''; ?>">
    Name:
    <input type="text" name="name" value="<?php echo $edit['name'] ?? ''; ?>" required><br><br>
    Email:
    <input type="text" name="email" value="<?php echo $edit['email'] ?? ''; ?>" required><br><br>
    Course:
    <input type="text" name="course" value="<?php echo $edit['course'] ?? ''; ?>" required><br><br>
    <?php if ($edit): ?>
        <button name="update">Update</button>
    <?php else: ?>
        <button name="add">Add</button>
    <?php endif; ?>
</form>

<hr>

<h3>Student List</h3>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['course']}</td>
        <td>
            <a href='?edit={$row['id']}'>Edit</a> |
            <a href='?delete={$row['id']}'>Delete</a>
        </td>
    </tr>";
}
?>

</table>

</body>
</html>