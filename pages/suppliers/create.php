<?php
$pageTitle = "Tambah Supplier";
$pageSubtitle = "Lengkapi data supplier koperasi baru";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier</title>
    <link rel="stylesheet" href="../../styles/tables/create.css">
</head>

<body>
    <div class="layout">
        <?php require_once __DIR__ . "/../../components/admin/sidebar.php" ?>

        <main class="main">
            <?php require_once __DIR__ . "/../../components/admin/topbar.php" ?>

            <div class="content">
                <form method="POST" action="../../actions/suppliers/store.php" class="card">

                    <div class="form-group">
                        <label for="name">Supplier Name</label>
                        <input type="text" id="name" name="supplier_name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="type">Product Types</label>
                        <select name="product_type" id="type" required>
                            <option value="">Pilih Product Type</option>
                            <option value="Food">Food</option>
                            <option value="Drink">Drink</option>
                            <option value="Stationery">Stationery</option>
                            <option value="Uniform">Uniform</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date">Partnership Date</label>
                        <input type="date" id="date" name="partnership_date" required>
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
