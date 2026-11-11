
<?php
require_once __DIR__ . "/../config/database.php";

function getProducts()
{
    global $pdo;

    $query = "SELECT * FROM products ORDER BY product_id DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProduct($id)
{
    global $pdo;

    $query = "SELECT * FROM products WHERE product_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':id' => $id
    ]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        header("Location: ../products/index.php");
        exit;
    }

    return $product;
}

function isProductExists($id)
{
    global $pdo;

    $query = "SELECT COUNT(product_id) FROM products WHERE product_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetchColumn() > 0;
}

function isProductCodeTaken($code, $ignoreId = 0)
{
    global $pdo;

    $query = "SELECT COUNT(product_id) FROM products
              WHERE product_code = :code
              AND product_id != :id";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':code' => $code,
        ':id' => intval($ignoreId)
    ]);

    return $stmt->fetchColumn() > 0;
}
