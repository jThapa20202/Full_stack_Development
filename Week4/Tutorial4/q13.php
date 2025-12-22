<?php
if ($_POST) {
    if ($_POST['pass'] === $_POST['cpass']) {
        echo "Registration Preview:<br>";
        echo "Name: ".$_POST['name']."<br>";
        echo "Email: ".$_POST['email']."<br>";
        echo "Password Strength: Strong";
    } else {
        echo "Passwords do not match!";
    }
}
?>
