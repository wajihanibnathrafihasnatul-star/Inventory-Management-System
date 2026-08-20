<?php
include 'db.php';

$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Inventory System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Inventory Management System</h2>

<a href="add.php">Add Product</a>

<br><br>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['product_name']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td><?php echo $row['price']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

|

<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>