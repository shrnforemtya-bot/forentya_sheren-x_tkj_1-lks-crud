<?php
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);

$pageTitle = "Tambah Produk";
$pageSubtitle = "Lengkapi data produk koperasi baru";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="../../styles/tables/create.css">
</head>

<body>
    <div class="layout">
        <?php require_once __DIR__ . "/../../components/admin/sidebar.php" ?>

        <main class="main">
            <?php require_once __DIR__ . "/../../components/admin/topbar.php" ?>

            <div class="content">
                <form method="POST" action="../../actions/produk/store.php" class="card">

                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" id="product_name" name="product_name"
                            value="<?= htmlspecialchars($old['product_name'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" id="product_code" name="product_code"
                            value="<?= htmlspecialchars($old['product_code'] ?? '') ?>" required>

                        <?php if (isset($errors['product_code'])): ?>
                            <p class="error-text"><?= htmlspecialchars($errors['product_code']) ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock"
                            value="<?= htmlspecialchars($old['stock'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Unit</label>

                        <?php foreach (['Pcs', 'Pack', 'Bottle'] as $unit): ?>
                            <div>
                                <input type="radio" name="unit"
                                    id="<?= strtolower($unit) ?>"
                                    value="<?= $unit ?>"
                                    <?= ($old['unit'] ?? '') === $unit ? 'checked' : '' ?>
                                    required>
                                <label for="<?= strtolower($unit) ?>"><?= $unit ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="form-group">
                        <label for="entry_date">Entry Date</label>
                        <input type="date" id="entry_date" name="entry_date"
                            value="<?= htmlspecialchars($old['entry_date'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price"
                            value="<?= htmlspecialchars($old['price'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"><?= htmlspecialchars($old['description'] ?? '') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" required>
                            <option value="">Pilih Category</option>

                            <?php foreach (['Food', 'Drink', 'Stationery', 'Uniform'] as $category): ?>
                                <option value="<?= $category ?>"
                                    <?= ($old['category'] ?? '') === $category ? 'selected' : '' ?>>
                                    <?= $category ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-actions">
                        <a href="index.php" class="btn btn-outline">Batal</a>
                        <button type="submit" name="store" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>
</body>
</html>
