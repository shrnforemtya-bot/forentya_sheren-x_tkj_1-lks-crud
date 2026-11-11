<?php
require_once __DIR__ . "/../../config/database.php";

if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $query = "DELETE FROM employees WHERE employee_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $_GET['id']]);

        header('Location: ../../pages/employees/index.php');
        exit;

    } catch (PDOException $e) {
        session_start();

        $_SESSION['errors'] = [
            'delete' => "Karyawan tidak dapat dihapus karena masih digunakan"
        ];

        header('Location: ../../pages/employees/index.php');
        exit;
    }
}