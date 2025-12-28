<?php
include 'db.php';

$category = $_POST['category'];

$sql = "SELECT * FROM books WHERE category='$category'";
$result = mysqli_query($conn, $sql);

echo "<h3>Search Results</h3>";

while($row = mysqli_fetch_assoc($result)){
    echo "Title: ".$row['title']."<br>";
    echo "Author: ".$row['author']."<br>";
    echo "Quantity: ".$row['quantity']."<br><br>";
}
?>
