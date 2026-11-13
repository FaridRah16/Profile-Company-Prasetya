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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --bs-body-font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .admin-car-card-mobile {
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .admin-car-card-mobile:active {
            transform: scale(0.99);
        }
        .btn-order-icon {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border-radius: 8px;
        }
        @media (max-width: 575.98px) {
            .admin-title-row {
                flex-direction: column !important;
                align-items: stretch !important;
            }
            .admin-title-row .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body class="bg-light min-vh-100 d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="dashboard.php">
                <i class="bi bi-shield-lock-fill text-danger"></i>
                <span>Prasetya Admin</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav me-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['PHP_SELF'] ?? '') === 'dashboard.php' ? 'active fw-semibold' : '' ?>" href="dashboard.php">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= in_array(basename($_SERVER['PHP_SELF'] ?? ''), ['cars.php', 'car-form.php'], true) ? 'active fw-semibold' : '' ?>" href="cars.php">
                            <i class="bi bi-car-front-fill me-1"></i> Katalog Mobil
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center justify-content-between justify-content-lg-end gap-3 text-white-50 pt-3 pt-lg-0 border-top border-secondary border-opacity-25 border-top-lg-0">
                    <div class="small">
                        <i class="bi bi-person-circle me-1"></i>
                        <span class="text-white"><?= admin_html($admin['name']) ?></span>
                    </div>
                    <form method="post" action="logout.php" class="m-0">
                        <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                        <button class="btn btn-outline-danger btn-sm px-3" type="submit">
                            <i class="bi bi-box-arrow-right me-1"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <main class="container py-3 py-md-4 flex-grow-1">
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
