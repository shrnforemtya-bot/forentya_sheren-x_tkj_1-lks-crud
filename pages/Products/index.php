<?php
require_once __DIR__ . "/../../repositories/products-repository.php";

$products = getProducts();

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$pageTitle = "Manajemen Produk";
$pageSubtitle = "Kelola data produk koperasi";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Koperasi</title>
    <link rel="stylesheet" href="../../styles/tables/index.css">
</head>

<body>
    <div class="layout">
        <?php require_once __DIR__ . "/../../components/admin/sidebar.php" ?>

        <main class="main">
            <?php require_once __DIR__ . "/../../components/admin/topbar.php" ?>

            <div class="content">

                <?php if (isset($errors['delete'])): ?>
                    <div class="alert alert-error">
                        <?= htmlspecialchars($errors['delete']) ?>
                    </div>
                <?php endif; ?>

                <div class="toolbar">
                    <a href="create.php" class="btn btn-primary">
                        + Tambah Produk
                    </a>
                </div>

                <div class="card">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Stok</th>
                                <th>Unit</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($products)): ?>

                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= $product['product_id'] ?></td>
                                        <td><?= htmlspecialchars($product['product_name']) ?></td>
                                        <td><?= htmlspecialchars($product['product_code']) ?></td>
                                        <td><?= $product['stock'] ?></td>
                                        <td><?= htmlspecialchars($product['unit']) ?></td>
                                        <td><?= htmlspecialchars($product['entry_date']) ?></td>
                                        <td><?= number_format($product['price'], 0, ',', '.') ?></td>
                                        <td><?= htmlspecialchars($product['description'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($product['category']) ?></td>

                                        <td class="actions">
                                            <a href="edit.php?id=<?= $product['product_id'] ?>"
                                                class="btn btn-edit">
                                                Edit
                                            </a>

                                            <a href="../../actions/produk/destroy.php?id=<?= $product['product_id'] ?>"
                                                class="btn btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            <?php else: ?>
                                <tr>
                                    <td colspan="10">Belum ada produk</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
