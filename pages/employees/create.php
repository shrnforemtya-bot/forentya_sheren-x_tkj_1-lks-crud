
<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);

$pageTitle = "Tambah Karyawan";
$pageSubtitle = "Lengkapi data karyawan koperasi baru";
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Karyawan</title>
  <link rel="stylesheet" href="../../styles/tables/create.css">
</head>

<body>
  <div class="layout">
    <?php require_once __DIR__ . "/../../components/admin/sidebar.php"; ?>

    <main class="main">
      <?php require_once __DIR__ . "/../../components/admin/topbar.php"; ?>

      <div class="content">
        <form method="POST" action="../../actions/employees/store.php" class="card">

          <div class="form-group">
            <label for="number">Employee Number</label>
            <input type="text" id="number" name="employee_number"
              value="<?= htmlspecialchars($old['employee_number'] ?? '') ?>" required>
            <?php if (isset($errors['employee_number'])): ?>
              <p class="error-text"><?= htmlspecialchars($errors['employee_number']) ?></p>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="name">Nama Panjang Karyawan</label>
            <input type="text" id="name" name="employee_name"
              value="<?= htmlspecialchars($old['employee_name'] ?? '') ?>" required>
            <?php if (isset($errors['employee_name'])): ?>
              <p class="error-text"><?= htmlspecialchars($errors['employee_name']) ?></p>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label>Gender</label>

            <div>
              <input type="radio" name="gender" id="M" value="M"
                <?= ($old['gender'] ?? '') === 'M' ? 'checked' : '' ?> required>
              <label for="M">Male</label>
            </div>

            <div>
              <input type="radio" name="gender" id="F" value="F"
                <?= ($old['gender'] ?? '') === 'F' ? 'checked' : '' ?>>
              <label for="F">Female</label>
            </div>
          </div>

          <div class="form-group">
            <label for="date">Birth Date</label>
            <input type="date" id="date" name="birth_date"
              value="<?= htmlspecialchars($old['birth_date'] ?? '') ?>" required>
          </div>

          <div class="form-group">
            <label for="position">Position</label>
            <select name="position" id="position" required>
              <option value="">Pilih Posisi</option>
              <option value="Cashier" <?= ($old['position'] ?? '') === 'Cashier' ? 'selected' : '' ?>>Cashier</option>
              <option value="Warehouse Staff" <?= ($old['position'] ?? '') === 'Warehouse Staff' ? 'selected' : '' ?>>Warehouse Staff</option>
              <option value="Admin" <?= ($old['position'] ?? '') === 'Admin' ? 'selected' : '' ?>>Admin</option>
            </select>
          </div>

          <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" id="salary" name="salary"
              value="<?= htmlspecialchars($old['salary'] ?? '') ?>" required>
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
