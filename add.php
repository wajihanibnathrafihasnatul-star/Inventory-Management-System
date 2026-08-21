<?php
include 'db.php';

if(isset($_POST['save'])){

    $name = trim($_POST['name']);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    if($name === ''){
        die("Product name is required.");
    }

    if($quantity === false || $quantity < 0){
        die("Quantity must be a valid non-negative number.");
    }

    if($price === false || $price < 0){
        die("Price must be a valid non-negative number.");
    }

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO products(product_name, quantity, price)
         VALUES (?, ?, ?)"
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
<input type="number" name="quantity" min="0" required>

<br>

Price:
<input type="number" name="price" min="0" step="0.01" required>

<br>

<button type="submit" name="save">Save</button>

</form>
