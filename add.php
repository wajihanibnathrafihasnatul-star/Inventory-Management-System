<?php
include 'db.php';

if(isset($_POST['save'])){

$name=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];

mysqli_query($conn,
"INSERT INTO products(product_name,quantity,price)
VALUES('$name','$quantity','$price')");

header("Location:index.php");
}
?>

<form method="post">

Product Name:
<input type="text" name="name">

<br>

Quantity:
<input type="number" name="quantity">

<br>

Price:
<input type="number" name="price">

<br>

<button name="save">Save</button>

</form>