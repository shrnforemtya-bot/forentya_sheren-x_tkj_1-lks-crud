<?php
require_once __DIR__ . "/../../repositories/employee-repositories.php";

$employees = getEmployees();
$isAdmin = true;

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$pageTitle = "Manajemen Karyawan";
$pageSubtitle = "Kelola data karyawan";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan - Koperasi</title>
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
                    <a href="create.php" class="btn btn-primary">+ Tambah Karyawan</a>
                </div>

                <div class="card">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomor Karyawan</th>
                                <th>Nama Karyawan</th>
                                <th>Gender</th>
                                <th>Tanggal Lahir</th>
                                <th>Posisi</th>
                                <th>Gaji</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($employees)): ?>
                                <?php foreach ($employees as $employee): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($employee['employee_id']) ?></td>
                                        <td><?= htmlspecialchars($employee['employee_number']) ?></td>
                                        <td><?= htmlspecialchars($employee['full_name']) ?></td>
                                        <td><?= htmlspecialchars($employee['gender']) ?></td>
                                        <td><?= htmlspecialchars($employee['Birth_date']) ?></td>
                                        <td><?= htmlspecialchars($employee['position']) ?></td>
                                        <td><?= htmlspecialchars($employee['salary']) ?></td>

                                        <td class="actions">
                                            <a href="edit.php?id=<?= urlencode($employee['employee_id']) ?>" class="btn btn-edit">Edit</a>

                                            <a href="../../actions/employees/destroy.php?id=<?= urlencode($employee['employee_id']) ?>"
                                                class="btn btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">Belum ada karyawan</td>
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