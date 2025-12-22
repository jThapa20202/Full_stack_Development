<form method="post">
    Full Name: <input name="name"><br>
    Email: <input name="email"><br>
    <button>Submit</button>
</form>

<?php
if ($_POST) {
    if (empty($_POST['name']) || empty($_POST['email'])) {
        echo "<span style='color:red'>Fields required!</span>";
    } else {
        echo "<span style='color:green'>All good!</span>";
    }
}
?>
