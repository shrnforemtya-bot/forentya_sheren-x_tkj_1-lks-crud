<?php
require_once __DIR__ . "/../../config/database.php";

if (isset($_POST['store']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $query = "INSERT INTO suppliers
        (supplier_name, email, phone, address, product_types, partnership_date)
        VALUES
        (:supplier_name, :email, :phone, :address, :product_types, :partnership_date)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            'supplier_name' => $_POST['supplier_name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'product_types' => $_POST['product_type'],
            'partnership_date' => $_POST['partnership_date']
        ]);

        header('Location: ../../pages/suppliers/index.php');
        exit;

    } catch (PDOException $e) {
        throw $e;
    }
}