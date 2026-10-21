<?php

declare(strict_types=1);

function admin_html(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function admin_page_start(string $title, array $admin): void
{
    ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= admin_html($title) ?> | Admin Prasetya Rent Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="dashboard.php">Prasetya Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="cars.php">Katalog Mobil</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3 text-white-50 small">
                    <span><?= admin_html($admin['name']) ?></span>
                    <form method="post" action="logout.php" class="m-0">
                        <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                        <button class="btn btn-outline-light btn-sm" type="submit">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <main class="container py-4 py-md-5">
    <?php
}

function admin_page_end(): void
{
    ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    <?php
}

function admin_field_error(array $errors, string $field): void
{
    if (isset($errors[$field])) {
        echo '<div class="invalid-feedback d-block">' . admin_html($errors[$field]) . '</div>';
    }
}
