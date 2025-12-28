<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM books");
?>

<table border="1">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Quantity</th>
    <th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['book_id']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td>
        <a href="delete_book.php?id=<?php echo $row['book_id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>
</table>
