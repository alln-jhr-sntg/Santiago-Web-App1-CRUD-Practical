<?php
include 'db.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit();
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "UPDATE products SET 
            name = :namez,
            category     = :categoryz,
            quantity     = :quantityz,
            price        = :pricez,
            supplier     = :supplierz
            WHERE id = :idz";

  $statement = $conn->prepare($sql);
  $statement->execute([
    ':namez' => $_POST['name'],
    ':categoryz'     => $_POST['category'],
    ':quantityz'     => $_POST['quantity'],
    ':pricez'        => $_POST['price'],
    ':supplierz'     => $_POST['supplier'],
    ':idz'           => $id
  ]);

  header("Location: index.php");
  exit();
}

$statement = $conn->prepare("SELECT * FROM products WHERE id = :idz");
$statement->execute([':idz' => $id]);
$product = $statement->fetch(PDO::FETCH_ASSOC);

if (!$product) {
  echo "Product not found.";
  exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Edit Product</h2>
    <form method="POST">
        <label>Product Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>

        <label>Category:</label><br>
        <input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>" required><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="<?= htmlspecialchars($product['quantity']) ?>" required><br>

        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" required><br>

        <label>Supplier:</label><br>
        <input type="text" name="supplier" value="<?= htmlspecialchars($product['supplier']) ?>" required><br><br>

        <div class="form-buttons">
        <button type="submit" class="btn-green">Update Product</button>
        <button type="button" class="btn-gray" onclick="window.location.href='index.php'">Back to Inventory</button>
        </div>
    </form>
    
</body>
</html>