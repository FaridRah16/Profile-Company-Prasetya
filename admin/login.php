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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light d-flex align-items-center min-vh-100 py-4">
    <main class="container px-3" style="max-width: 400px;">
        <section class="card border-0 shadow-sm rounded-4 p-4 p-sm-5 bg-white">
            <div class="text-center mb-4">
                <div class="rounded-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center p-3 mb-2" style="width: 58px; height: 58px;">
                    <i class="bi bi-shield-lock-fill text-danger fs-3"></i>
                </div>
                <h1 class="h4 fw-bold mb-1 text-dark">Login Admin</h1>
                <p class="text-muted small mb-0">Panel Kelola Prasetya Rent Car</p>
            </div>
            <?php if ($error): ?>
                <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 small border-0 shadow-sm rounded-3 mb-3" role="alert">
                    <i class="bi bi-exclamation-circle-fill flex-shrink-0"></i>
                    <div><?= htmlspecialchars($error) ?></div>
                </div>
            <?php endif; ?>
            <form method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrf_token()) ?>">
                <div class="mb-3">
                    <label class="form-label small fw-semibold" for="email">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
                        <input class="form-control border-start-0 ps-0" id="email" name="email" type="email" placeholder="ptprasetyamulticarindo@gmail.com" autocomplete="username" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-semibold" for="password">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-key"></i></span>
                        <input class="form-control border-start-0 ps-0" id="password" name="password" type="password" placeholder="••••••••••••" autocomplete="current-password" required>
                    </div>
                </div>
                <button class="btn btn-danger w-100 py-2 fw-semibold d-inline-flex align-items-center justify-content-center gap-2" type="submit">
                    <span>Masuk ke Dashboard</span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>
        </section>
        <div class="text-center mt-3">
            <a href="../index.php" class="text-muted text-decoration-none small">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Website Publik
            </a>
        </div>
    </main>
</body>
</html>
