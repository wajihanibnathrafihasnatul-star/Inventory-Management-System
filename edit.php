<?php
include 'db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("Invalid product ID");
}

$stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$data) {
    die("Product not found");
}

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE products
         SET product_name = ?, quantity = ?, price = ?
         WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "sidi",
        $name,
        $quantity,
        $price,
        $id
    );

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("Location: index.php");
    exit();
}
?>

<form method="post">

<input type="text"
name="name"
value="<?php echo htmlspecialchars($data['product_name'], ENT_QUOTES, 'UTF-8'); ?>"
required>

<br>

<input type="number"
name="quantity"
value="<?php echo htmlspecialchars($data['quantity'], ENT_QUOTES, 'UTF-8'); ?>"
required>

<br>

<input type="number"
name="price"
value="<?php echo htmlspecialchars($data['price'], ENT_QUOTES, 'UTF-8'); ?>"
required>

<br>

<button name="update">Update</button>

</form>
