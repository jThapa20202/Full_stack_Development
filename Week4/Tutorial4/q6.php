<form method="post">
    Name: <input name="name"><br>
    Age: <input name="age"><br>
    Language: <input name="lang"><br>
    <button>Submit</button>
</form>

<?php
if ($_POST) {
    if ($_POST['name'] && $_POST['age'] && $_POST['lang']) {
        echo "Preview:<br>";
        echo "Name: ".$_POST['name']."<br>";
        echo "Age: ".$_POST['age']."<br>";
        echo "Language: ".$_POST['lang'];
    } else {
        echo "All fields required!";
    }
}
?>
