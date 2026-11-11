<?php
require_once __DIR__ . "/../config/database.php";

function getSuppliers()
{
    global $pdo;

    $query = "SELECT * FROM suppliers ORDER BY supplier_id DESC";
    $stmt = $pdo->query($query);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSupplier($id)
{
    global $pdo;

    $query = "SELECT * FROM suppliers WHERE supplier_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}