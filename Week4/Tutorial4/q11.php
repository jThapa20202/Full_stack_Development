<?php
$users = [
 ["email"=>"ram@gmail.com"],
 ["email"=>"sita@gmail.com"],
 ["email"=>"hari@gmail.com"]
];

$newEmail = "sita@gmail.com";
$found = false;

foreach ($users as $u) {
    if ($u['email'] == $newEmail) {
        $found = true;
        break;
    }
}

echo $found ? "Email already exists" : "Email available";
?>
