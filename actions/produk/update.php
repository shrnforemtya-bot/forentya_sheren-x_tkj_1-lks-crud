<?php
require_once __DIR__ . "/../../config/database.php";

if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $query = "UPDATE products SET
            product_name = :product_name,
            product_code = :product_code,
            stock = :stock,
            unit = :unit,
            entry_date = :entry_date,
            price = :price,
            description = :description,
            category = :category
            WHERE product_id = :id";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            ':product_name' => $_POST['product_name'],
            ':product_code' => $_POST['product_code'],
            ':stock' => $_POST['stock'],
            ':unit' => $_POST['unit'],
            ':entry_date' => $_POST['entry_date'],
            ':price' => $_POST['price'],
            ':description' => $_POST['description'] ?? '',
            ':category' => $_POST['category'],
            ':id' => $_POST['id']
        ]);

        header('Location: ../../pages/products/index.php');
        exit;

    } catch (PDOException $e) {
        throw $e;
    }
}
