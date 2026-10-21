<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';

if (current_admin() === null) {
    header('Location: login.php');
    exit;
}

header('Location: dashboard.php');
exit;
