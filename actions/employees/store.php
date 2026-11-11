<?php
require_once __DIR__ . "/../../config/database.php";

if (isset($_POST['store']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $query = "INSERT INTO employees
        (employee_number, full_name, gender, Birth_date, position, salary)
        VALUES
        (:employee_number, :full_name, :gender, :birth_date, :position, :salary)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            'employee_number' => $_POST['employee_number'],
            'full_name' => $_POST['employee_name'],
            'gender' => $_POST['gender'],
            'birth_date' => $_POST['birth_date'],
            'position' => $_POST['position'],
            'salary' => $_POST['salary']
        ]);

        header('Location: ../../pages/employees/index.php');
        exit;

    } catch (PDOException $e) {
        throw $e;
    }
}