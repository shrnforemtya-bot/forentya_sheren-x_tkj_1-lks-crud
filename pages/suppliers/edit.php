<?php
require_once __DIR__ . "/../../repositories/suppliers-repository.php";

$supplier = getSupplier($_GET['id'] ?? 0);

if (!$supplier) {
    header('Location: index.php');
    exit;
}

$pageTitle = "Edit Supplier";
$pageSubtitle = "Perbarui data supplier";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier - Koperasi</title>
    <link rel="stylesheet" href="../../styles/tables/edit.css">
</head>

<body>
    <div class="layout">
        <?php require_once __DIR__ . "/../../components/admin/sidebar.php" ?>

        <main class="main">
            <?php require_once __DIR__ . "/../../components/admin/topbar.php" ?>

            <div class="content">
                <form method="POST" action="../../actions/suppliers/update.php" class="card">

                    <input type="hidden" name="supplier_id"
                        value="<?= htmlspecialchars($supplier['supplier_id']) ?>">

                    <div class="form-group">
                        <label for="name">Supplier Name</label>
                        <input type="text" id="name" name="supplier_name"
                            value="<?= htmlspecialchars($supplier['supplier_name']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"
                            value="<?= htmlspecialchars($supplier['email']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone"
                            value="<?= htmlspecialchars($supplier['phone']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" required><?= htmlspecialchars($supplier['address']) ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="type">Product Types</label>
                        <select name="product_types" id="type" required>
                            <option value="Food" <?= $supplier['product_types'] == 'Food' ? 'selected' : '' ?>>Food</option>
                            <option value="Drink" <?= $supplier['product_types'] == 'Drink' ? 'selected' : '' ?>>Drink</option>
                            <option value="Stationery" <?= $supplier['product_types'] == 'Stationery' ? 'selected' : '' ?>>Stationery</option>
                            <option value="Uniform" <?= $supplier['product_types'] == 'Uniform' ? 'selected' : '' ?>>Uniform</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date">Partnership Date</label>
                        <input type="date" id="date" name="partnership_date"
                            value="<?= htmlspecialchars($supplier['partnership_date']) ?>" required>
                    </div>

                    <div class="form-actions">
                        <a href="index.php" class="btn btn-outline">Batal</a>
                        <button type="submit" name="update" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>
</body>

</html>