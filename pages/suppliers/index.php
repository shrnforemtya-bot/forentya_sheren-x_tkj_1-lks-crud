
<?php

require_once __DIR__ . "/../../repositories/suppliers-repository.php";

$suppliers = getSuppliers();

$isAdmin = true;
$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['errors']);

$pageTitle = "Manajemen Suppliers";
$pageSubtitle = "Kelola data suppliers";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers - Koperasi</title>
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
                        <?= htmlspecialchars($errors['delete'] ?? '') ?>
                    </div>
                <?php endif; ?>

                <?php if ($isAdmin): ?>
                    <div class="toolbar">
                        <a href="create.php" class="btn btn-primary">
                            + Tambah Supplier
                        </a>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Supplier</th>
                                <th>Email</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>Tipe Produk</th>
                                <th>Tanggal Kerja Sama</th>

                                <?php if ($isAdmin): ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($suppliers as $supplier): ?>
                                <tr>
                                    <td><?= htmlspecialchars($supplier['supplier_id'] ?? '') ?></td>

                                    <td><?= htmlspecialchars($supplier['supplier_name'] ?? '') ?></td>

                                    <td><?= htmlspecialchars($supplier['email'] ?? '') ?></td>

                                    <td><?= htmlspecialchars($supplier['phone'] ?? '') ?></td>

                                    <td><?= htmlspecialchars($supplier['address'] ?? '') ?></td>

                                    <td><?= htmlspecialchars($supplier['product_types'] ?? '') ?></td>

                                    <td><?= htmlspecialchars($supplier['partnership_date'] ?? '') ?></td>

                                    <?php if ($isAdmin): ?>
                                        <td class="actions">

                                            <a href="edit.php?id=<?= $supplier['supplier_id'] ?>"
                                                class="btn btn-edit">
                                                Edit
                                            </a>

                                            <a href="../../actions/suppliers/destroy.php?id=<?= $supplier['supplier_id'] ?>"
                                                class="btn btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus supplier ini?')">
                                                Hapus
                                            </a>

                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($suppliers)): ?>
                                <tr>
                                    <td colspan="<?= $isAdmin ? 8 : 7 ?>">
                                        Belum ada supplier
                                    </td>
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
