<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/admin-car.php';

require_admin();
require_valid_csrf();

$id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id) {
    $car = car_repository_find($id);
    if ($car && car_repository_delete($id)) {
        admin_delete_managed_car_image($car['image']);
    }
}

header('Location: cars.php?success=deleted');
exit;
