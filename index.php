<?php
$title = "Beranda - Koperasi sekolah";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="styles/index.css">
</head>

<body>
  <?php require_once __DIR__ . "/components/landing/header.php" ?>

  <section class="hero">
    <h1>Sistem Koperasi Sekolah</h1>
    <p>beli barang barang di koperasi sekolah</p>
    <div class="hero-cta">
      <a href="pages/products/index.php" class="btn btn-outline">Lihat Produk</a>
      <a href="pages/suppliers/index.php" class="btn btn-outline">Lihat supplier</a>
      <a href="pages/employees/index.php" class="btn btn-outline">Lihat karyawan</a>
    </div>
  </section>

  <section class="features">
    <div class="feature-card">
      <h3>Products</h3>
      <p>Admin dapat menambah, mengubah, dan menghapus products</p>
    </div>
    <div class="feature-card">
      <h3>Suppliers</h3>
      <p>Admin dapat menambah, mengubah, dan menghapus suppliers.</p>
    </div>
    <div class="feature-card">
      <h3>Employees</h3>
      <p>Admin dapat menambah, mengubah, dan menghapus employees.</p>
    </div>
  </section>

  <?php require_once __DIR__ . "/components/landing/footer.php" ?>
</body>

</html>
