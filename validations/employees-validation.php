
<?php
session_start();
require_once __DIR__ . "/../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['store'])) {
    $errors = [];

    $employee_number = trim($_POST['employee_number'] ?? '');
    $full_name = trim($_POST['employee_name'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $birth_date = $_POST['birth_date'] ?? '';
    $position = $_POST['position'] ?? '';
    $salary = $_POST['salary'] ?? '';

    if ($employee_number !== '' && strlen($employee_number) > 10) {
        $errors['employee_number'] = "Nomor karyawan maksimal 10 karakter.";
    }

    if ($full_name === '') {
        $errors['employee_name'] = "Nama karyawan wajib diisi.";
    } elseif (strlen($full_name) > 100) {
        $errors['employee_name'] = "Nama maksimal 100 karakter.";
    }

    if (!in_array($gender, ['M', 'F'])) {
        $errors['gender'] = "Jenis kelamin tidak valid.";
    }

    $date = DateTime::createFromFormat('!Y-m-d', $birth_date);

    if (!$date || $date->format('Y-m-d') !== $birth_date) {
        $errors['birth_date'] = "Tanggal lahir tidak valid.";
    } elseif ($birth_date > date('Y-m-d')) {
        $errors['birth_date'] = "Tanggal lahir tidak boleh di masa depan.";
    }

    if (!in_array($position, ['Cashier', 'Warehouse Staff', 'Admin'])) {
        $errors['position'] = "Posisi karyawan tidak valid.";
    }

    if ($salary === '' || !is_numeric($salary) || $salary < 0) {
        $errors['salary'] = "Gaji harus berupa angka dan tidak boleh negatif.";
    }

    if (empty($errors)) {
        try {
            $query = "INSERT INTO employees
            (employee_number, full_name, gender, Birth_date, position, salary)
            VALUES
            (:employee_number, :full_name, :gender, :birth_date, :position, :salary)";

            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'employee_number' => $employee_number ?: null,
                'full_name' => $full_name,
                'gender' => $gender,
                'birth_date' => $birth_date,
                'position' => $position,
                'salary' => $salary
            ]);

            header('Location: ../../pages/employees/index.php');
            exit;

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $errors['employee_number'] = "Nomor karyawan sudah digunakan.";
            } else {
                throw $e;
            }
        }
    }

    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;

    header('Location: ../../pages/employees/create.php');
    exit;
}
