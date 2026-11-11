  <?php
  session_start();

  $success = $_SESSION['success'] ?? '';
  $errors = $_SESSION['errors'] ?? [];
  $old = $_SESSION['old'] ?? [];

  unset($_SESSION['success'], $_SESSION['errors'], $_SESSION['old']);
  ?>
  <!DOCTYPE html>
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Koperasi</title>
    <link rel="stylesheet" href="../../styles/auth/login.css">
  </head>

  <body class="center-page">
    <div class="card auth-card">
      <h1>Masuk ke Sistem Koperasi Sekolah</h1>

      <?php if ($success): ?>
        <div class="alert alert-success">
          <?= htmlspecialchars($success) ?>
        </div>
      <?php endif; ?>

      <?php if (isset($errors['login'])): ?>
        <div class="alert alert-error">
          <?= htmlspecialchars($errors['login']) ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="../../pages/auth/login.php">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email"
            value="<?= htmlspecialchars($old['email'] ?? '') ?>">

          <?php if (isset($errors['email'])): ?>
            <p class="error-text"><?= htmlspecialchars($errors['email']) ?></p>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <label for="password">Kata Sandi</label>
          <input type="password" id="password" name="password">

          <?php if (isset($errors['password'])): ?>
            <p class="error-text"><?= htmlspecialchars($errors['password']) ?></p>
          <?php endif; ?>
        </div>

        <button name="login" type="submit" class="btn btn-primary btn-block">Masuk</button>
      </form>

      <p class="auth-link">Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
  </body>

  </html>