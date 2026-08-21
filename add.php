<?php
include 'db.php';

if(isset($_POST['save'])){

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO products(product_name, quantity, price) VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param($stmt, "sid", $name, $quantity, $price);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("Location: index.php");
    exit();
}
?>

<form method="post">

Product Name:
<input type="text" name="name" required>

<br>

Quantity:
<input type="number" name="quantity" required>

<br>

Price:
<input type="number" name="price" required>

<br>

<button name="save">Save</button>

</form>
