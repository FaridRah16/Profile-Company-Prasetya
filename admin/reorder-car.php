<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/car-repository.php';

require_admin();
require_valid_csrf();

$id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
$direction = (string) ($_POST['direction'] ?? '');

if ($id && in_array($direction, ['up', 'down'], true)) {
    car_repository_move((int) $id, $direction);
}

header('Location: cars.php?success=reordered');
exit;
