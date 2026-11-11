<?php
require_once __DIR__ . "/../../config/database.php";

if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $query = "DELETE FROM suppliers WHERE supplier_id = :id";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'id' => $_GET['id']
        ]);

        header('Location: ../../pages/suppliers/index.php');
        exit;

    } catch (PDOException $e) {
        throw $e;
    }
}