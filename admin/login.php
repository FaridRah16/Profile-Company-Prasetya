<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';

if (current_admin() !== null) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_is_valid($_POST['csrf_token'] ?? null)) {
        $error = 'Sesi formulir berakhir. Muat ulang halaman lalu coba kembali.';
    } elseif (login_admin((string) ($_POST['email'] ?? ''), (string) ($_POST['password'] ?? ''))) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Email atau kata sandi tidak sesuai.';
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Prasetya Rent Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center min-vh-100 py-4">
    <main class="container" style="max-width: 430px;">
        <section class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <h1 class="h3 fw-bold mb-2">Login Admin</h1>
            <p class="text-muted mb-4">Kelola katalog Prasetya Rent Car.</p>
            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrf_token()) ?>">
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" autocomplete="username" required>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="password">Kata sandi</label>
                    <input class="form-control" id="password" name="password" type="password" autocomplete="current-password" required>
                </div>
                <button class="btn btn-danger w-100 py-2" type="submit">Masuk</button>
            </form>
        </section>
    </main>
</body>
</html>
