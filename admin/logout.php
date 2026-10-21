<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';

require_admin();
require_valid_csrf();
logout_admin();

header('Location: login.php');
exit;
