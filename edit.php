<?php
include 'db.php';

$id=$_GET['id'];

$data=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT * FROM products WHERE id=$id")
);

if(isset($_POST['update'])){

$name=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];

mysqli_query($conn,
"UPDATE products
SET product_name='$name',
quantity='$quantity',
price='$price'
WHERE id=$id");

header("Location:index.php");
}
?>

<form method="post">

<input type="text"
name="name"
value="<?php echo $data['product_name']; ?>">

<br>

<input type="number"
name="quantity"
value="<?php echo $data['quantity']; ?>">

<br>

<input type="number"
name="price"
value="<?php echo $data['price']; ?>">

<br>

<button name="update">Update</button>

</form>