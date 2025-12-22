<?php

function formatName($name) {
    return ucwords(strtolower(trim($name)));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    $skills = explode(",", $string);
    return array_map("trim", $skills);
}

function saveStudent($name, $email, $skillsArray) {
    $skillsString = implode(",", $skillsArray);
    $data = "$name|$email|$skillsString" . PHP_EOL;

    if (!file_put_contents("students.txt", $data, FILE_APPEND)) {
        throw new Exception("Failed to save student data");
    }
}

function uploadPortfolioFile($file) {
    $allowedExt = ["pdf", "jpg", "jpeg", "png"];
    $maxSize = 2097152;

    if ($file["error"] !== 0) {
        throw new Exception("File upload error");
    }

    if ($file["size"] > $maxSize) {
        throw new Exception("File must be under 2MB");
    }

    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExt)) {
        throw new Exception("Invalid file format");
    }

    $newName = "portfolio_" . time() . "." . $ext;
    $uploadDir = "uploads/";

    if (!is_dir($uploadDir)) {
        throw new Exception("Upload directory missing");
    }

    if (!move_uploaded_file($file["tmp_name"], $uploadDir . $newName)) {
        throw new Exception("Upload failed");
    }

    return $newName;
}
