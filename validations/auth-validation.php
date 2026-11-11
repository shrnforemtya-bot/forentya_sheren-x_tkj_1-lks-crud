
<?php
require_once __DIR__ . "/../repositories/user-repository.php";

function getRegisterRequest($request)
{
    return [
        'name' => trim($request['name'] ?? ''),
        'email' => trim($request['email'] ?? ''),
        'password' => $request['password'] ?? '',
        'password_confirmation' => $request['password_confirmation'] ?? '',
    ];
}

function validateRegister($request)
{
    $errors = [];

    $name = trim($request['name'] ?? '');
    $email = trim($request['email'] ?? '');
    $password = $request['password'] ?? '';
    $password_confirmation = $request['password_confirmation'] ?? '';

    // Validasi nama
    if ($name === '') {
        $errors['name'] = "Nama wajib diisi.";
    } elseif (strlen($name) > 100) {
        $errors['name'] = "Nama maksimal 100 karakter.";
    }

    // Validasi email
    if ($email === '') {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    } elseif (isEmailRegistered($email)) {
        $errors['email'] = "Email sudah terdaftar.";
    }

    // Validasi password
    if ($password === '') {
        $errors['password'] = "Password wajib diisi.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password minimal 8 karakter.";
    }

    // Validasi konfirmasi password
    if ($password_confirmation !== $password) {
        $errors['password_confirmation'] = "Konfirmasi password tidak sama.";
    }

    return $errors;
}

function getLoginRequest($request)
{
    return [
        'email' => trim($request['email'] ?? ''),
        'password' => $request['password'] ?? ''
    ];
}

function validateLogin($request)
{
    $errors = [];

    $email = trim($request['email'] ?? '');
    $password = $request['password'] ?? '';

    if ($email === '') {
        $errors['email'] = "Email wajib diisi.";
    }

    if ($password === '') {
        $errors['password'] = "Password wajib diisi.";
    }

    return $errors;
}
