<?php

  $host     = "localhost";
  $port = "3006";
  $dbname   = "db_cooperative";
  $username = "root";
  $password = "";

 $dsn =  "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$options = [
// error dimunculin
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//   data yg dikiirm akan menjadi array
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//   data sesuai dengan yg dikirim
  PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}