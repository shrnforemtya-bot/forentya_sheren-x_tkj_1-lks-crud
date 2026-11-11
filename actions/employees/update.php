<?php
require_once __DIR__ . "/../../config/database.php";

if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $query = "UPDATE employees SET
            employee_number = :employee_number,
            full_name = :full_name,
            gender = :gender,
            Birth_date = :birth_date,
            position = :position,
            salary = :salary
            WHERE employee_id = :id";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            'employee_number' => $_POST['employee_number'],
            'full_name' => $_POST['employee_name'],
            'gender' => $_POST['gender'],
            'birth_date' => $_POST['birth_date'],
            'position' => $_POST['position'],
            'salary' => $_POST['salary'],
            'id' => $_POST['id']
        ]);

        header('Location: ../../pages/employees/index.php');
        exit;

    } catch (PDOException $e) {
        throw $e;
    }
}