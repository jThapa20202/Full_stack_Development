<?php
include 'functions.php';
include 'header.php';

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        uploadPortfolioFile($_FILES["portfolio"]);
        $success = "File uploaded successfully 🎉";
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<h3>Upload Portfolio</h3>

<?= $success ? "<p>$success</p>" : "" ?>
<?= $error ? "<p>$error</p>" : "" ?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="portfolio" required><br><br>
    <button type="submit">Upload</button>
</form>

<?php include 'footer.php'; ?>
