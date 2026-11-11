<?php

require_once __DIR__ . "/../../config/database.php";

if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $query = "UPDATE suppliers SET
            supplier_name = :supplier_name,
            email = :email,
            phone = :phone,
            address = :address,
            product_types = :product_types,
            partnership_date = :partnership_date
            WHERE supplier_id = :supplier_id";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            'supplier_name' => $_POST['supplier_name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'product_types' => $_POST['product_types'],
            'partnership_date' => $_POST['partnership_date'],
            'supplier_id' => $_POST['supplier_id']
        ]);

        header('Location: ../../pages/suppliers/index.php');
        exit;

    } catch (PDOException $e) {
        throw $e;
    }
}