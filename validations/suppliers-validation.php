
<?php
session_start();
require_once __DIR__ . "/../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['store'])) {
    $errors = [];

    $supplier_name = trim($_POST['supplier_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $product_types = trim($_POST['product_type'] ?? '');
    $partnership_date = $_POST['partnership_date'] ?? '';

    if ($supplier_name === '') {
        $errors['supplier_name'] = "Nama supplier wajib diisi.";
    } elseif (strlen($supplier_name) > 100) {
        $errors['supplier_name'] = "Nama supplier maksimal 100 karakter.";
    }

    if ($email === '') {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    } elseif (strlen($email) > 100) {
        $errors['email'] = "Email maksimal 100 karakter.";
    }

    if ($phone === '') {
        $errors['phone'] = "Nomor telepon wajib diisi.";
    } elseif (!preg_match('/^[0-9+\-\s]{8,15}$/', $phone)) {
        $errors['phone'] = "Nomor telepon tidak valid.";
    }

    if ($address === '') {
        $errors['address'] = "Alamat wajib diisi.";
    }

    if ($product_types === '') {
        $errors['product_type'] = "Jenis produk wajib diisi.";
    } elseif (strlen($product_types) > 100) {
        $errors['product_type'] = "Jenis produk maksimal 100 karakter.";
    }

    $date = DateTime::createFromFormat('!Y-m-d', $partnership_date);

    if (!$date || $date->format('Y-m-d') !== $partnership_date) {
        $errors['partnership_date'] = "Tanggal kerja sama tidak valid.";
    } elseif ($partnership_date > date('Y-m-d')) {
        $errors['partnership_date'] = "Tanggal kerja sama tidak boleh di masa depan.";
    }

    if (empty($errors)) {
        $query = "INSERT INTO suppliers
        (supplier_name, email, phone, address, product_types, partnership_date)
        VALUES
        (:supplier_name, :email, :phone, :address, :product_types, :partnership_date)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'supplier_name' => $supplier_name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'product_types' => $product_types,
            'partnership_date' => $partnership_date
        ]);

        header('Location: ../../pages/suppliers/index.php');
        exit;
    }

    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;

    header('Location: ../../pages/suppliers/create.php');
    exit;
}
