<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/car-repository.php';
require_once __DIR__ . '/../includes/admin-layout.php';

$admin = require_admin();
$totalCars = count(car_repository_all());
$availableCars = car_repository_count_by_status('available');
$unavailableCars = $totalCars - $availableCars;

admin_page_start('Dashboard', $admin);
?>
<div class="d-flex justify-content-between align-items-start gap-3 flex-wrap mb-4">
    <div>
        <h1 class="h2 fw-bold mb-1">Dashboard</h1>
        <p class="text-muted mb-0">Kelola katalog mobil yang tampil di website.</p>
    </div>
    <a class="btn btn-danger" href="car-form.php">+ Tambah Mobil</a>
</div>
<div class="row g-3">
    <div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body"><p class="text-muted mb-1">Total Mobil</p><strong class="display-6"><?= $totalCars ?></strong></div></div></div>
    <div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body"><p class="text-muted mb-1">Tersedia</p><strong class="display-6 text-success"><?= $availableCars ?></strong></div></div></div>
    <div class="col-md-4"><div class="card border-0 shadow-sm h-100"><div class="card-body"><p class="text-muted mb-1">Tidak tersedia / perawatan</p><strong class="display-6 text-warning"><?= $unavailableCars ?></strong></div></div></div>
</div>
<?php admin_page_end(); ?>
