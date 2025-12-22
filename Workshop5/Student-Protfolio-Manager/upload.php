<?php
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!isset($_FILES["portfolio"])) {
            throw new Exception("No file uploaded");
        }

        $file = $_FILES["portfolio"];

        $allowedExt = ["pdf", "jpg", "jpeg", "png"];

        $fileName = $file["name"];
        $fileSize = $file["size"];
        $fileTmp = $file["tmp_name"];
        $fileError = $file["error"];

        if ($fileError !== 0) {
            throw new Exception("File upload error");
        }

        if ($fileSize > 2097152) {
            throw new Exception("File size must be less than 2MB");
        }

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedExt)) {
            throw new Exception("Invalid file format. Only PDF, JPG, PNG allowed");
        }

        $newFileName = "portfolio_" . time() . "." . $fileExt;

        $uploadDir = "uploads/";

        if (!is_dir($uploadDir)) {
            throw new Exception("Upload directory does not exist");
        }

        if (!move_uploaded_file($fileTmp, $uploadDir . $newFileName)) {
            throw new Exception("Failed to upload file");
        }

        $success = "File uploaded successfully 🎉";
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Portfolio</title>
</head>
<body>

<h2>Upload Portfolio</h2>

<?php if ($success): ?>
    <p class="success"><?= $success ?></p>
<?php endif; ?>

<?php if ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <label>Select Portfolio (PDF/JPG/PNG, max 2MB):</label><br><br>
    <input type="file" name="portfolio" required>
    <br><br>
    <button type="submit">Upload</button>
</form>

</body>
</html>
