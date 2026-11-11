<?php
require_once __DIR__ . "/../config/database.php";

function getEmployees()
{
    global $pdo;

    $query = "SELECT * FROM employees ORDER BY employee_id DESC";
    $stmt = $pdo->query($query);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getEmployee($id)
{
    global $pdo;

    $query = "SELECT * FROM employees WHERE employee_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);

    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$employee) {
        header('Location: index.php');
        exit;
    }

    return $employee;
}