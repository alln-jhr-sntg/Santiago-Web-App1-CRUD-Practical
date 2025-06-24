<?php 
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "INSERT INTO products (name, category, quantity, price, supplier) VALUES (:namez, :categoryz, :quantityz, :pricez, :supplierz)";
        $statement = $conn->prepare($sql);

        $statement->execute([
            ':namez' => $_POST['name'],
            ':categoryz' => $_POST['category'],
            ':quantityz' => $_POST['quantity'],
            ':pricez' => $_POST['price'],
            ':supplierz' => $_POST['supplier']
        ]);
        
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2> Add New Product</h2>
    <form method="POST">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" required><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br>

        <label for="supplier">Supplier:</label><br>
        <input type="text" id="supplier" name="supplier"><br><br>

        <div class="form-buttons">
        <button type="submit" class="btn-green">Add Product</button>
        <button type="button" class="btn-gray" onclick="window.location.href='index.php'">Back to Inventory</button>
        </div>
    </form>
    <br>
    
</body>
</html>