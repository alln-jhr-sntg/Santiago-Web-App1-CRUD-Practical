<?php
    include 'db.php';

    if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
    }

    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = :idz";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':idz' => $id]);

    header("Location: index.php");
    exit();
?>
