<?php
require_once __DIR__ . "/../../repositories/employee-repositories.php";

$employee = getEmployee($_GET['id'] ?? 0);

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);

$data = $old ?: $employee;

$pageTitle = "Edit Karyawan";
$pageSubtitle = "Perbarui data karyawan";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan - Koperasi</title>
    <link rel="stylesheet" href="../../styles/tables/edit.css">
</head>

<body>
    <div class="layout">
        <?php require_once __DIR__ . "/../../components/admin/sidebar.php" ?>

        <main class="main">
            <?php require_once __DIR__ . "/../../components/admin/topbar.php" ?>

            <div class="content">
                <form method="POST" action="../../actions/employees/update.php" class="card">

                    <input type="hidden" name="id" value="<?= htmlspecialchars($employee['employee_id']) ?>">

                    <div class="form-group">
                        <label for="employee_number">Nomor Karyawan</label>
                        <input type="text" id="employee_number" name="employee_number"
                            value="<?= htmlspecialchars($data['employee_number'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="employee_name">Nama Karyawan</label>
                        <input type="text" id="employee_name" name="employee_name"
                            value="<?= htmlspecialchars($data['employee_name'] ?? $data['full_name'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>

                        <div>
                            <input type="radio" name="gender" id="M" value="M"
                                <?= ($data['gender'] ?? '') === 'M' ? 'checked' : '' ?>>
                            <label for="M">Male</label>
                        </div>

                        <div>
                            <input type="radio" name="gender" id="F" value="F"
                                <?= ($data['gender'] ?? '') === 'F' ? 'checked' : '' ?>>
                            <label for="F">Female</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" id="birth_date" name="birth_date"
                            value="<?= htmlspecialchars($data['birth_date'] ?? $data['Birth_date'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="position">Posisi</label>
                        <select name="position" id="position">
                            <option value="">Pilih Posisi</option>
                            <option value="Cashier" <?= ($data['position'] ?? '') === 'Cashier' ? 'selected' : '' ?>>Cashier</option>
                            <option value="Warehouse Staff" <?= ($data['position'] ?? '') === 'Warehouse Staff' ? 'selected' : '' ?>>Warehouse Staff</option>
                            <option value="Admin" <?= ($data['position'] ?? '') === 'Admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="salary">Gaji</label>
                        <input type="number" id="salary" name="salary"
                            value="<?= htmlspecialchars($data['salary'] ?? '') ?>">
                    </div>

                    <div class="form-actions">
                        <a href="index.php" class="btn btn-outline">Batal</a>
                        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                    </div>

                </form>
            </div>
        </main>
    </div>
</body>

</html>