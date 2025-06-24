<?php
include 'db.php';
$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sari-Sari Inventory</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <h1>Sari-Sari Store Inventory</h1>
    <a href="add.php" class="add-button" title="Add New Product">
        <i class="fas fa-plus"></i>
    </a>
    <button class="btn-red" id="lowStockBtn">🚨 Low Stock</button><br><br>
    <table>
        <tr>
        <th>ID</th><th>Name</th><th>Category</th><th>Qty</th><th>Price</th><th>Supplier</th><th>Actions</th>
        </tr>
        <?php foreach ($products as $row): ?>
        <tr data-quantity="<?= (int)$row['quantity'] ?>">
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['category']) ?></td>
        <td><?= htmlspecialchars($row['quantity']) ?></td>
        <td>&#8369;<!-- peso sign --><?= htmlspecialchars($row['price']) ?></td>
        <td><?= htmlspecialchars($row['supplier']) ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-blue">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-red" onclick="return confirm('Delete this product?');">Delete</a>
        </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div id="lowStockModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="closeModal">&times;</span>
        <h3>🚨 Low Stock Products (Quantity &lt; 5)</h3>
        <table>
        <thead>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $row): ?>
            <?php if ($row['quantity'] < 5): ?>
                <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= $row['quantity'] ?></td>
                </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    </div>

    <script src="js/script.js"></script>
    </body>
</html>
