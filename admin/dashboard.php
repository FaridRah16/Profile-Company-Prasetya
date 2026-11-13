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
<div class="d-flex justify-content-between align-items-sm-center align-items-stretch gap-3 flex-column flex-sm-row mb-4">
    <div>
        <h1 class="h3 fw-bold mb-1">Dashboard</h1>
        <p class="text-muted small mb-0">Ringkasan status armada mobil yang tampil di website.</p>
    </div>
    <div class="d-flex gap-2 flex-column flex-sm-row">
        <a class="btn btn-outline-dark d-inline-flex align-items-center justify-content-center gap-2" href="cars.php">
            <i class="bi bi-car-front"></i>
            <span>Kelola Katalog</span>
        </a>
        <a class="btn btn-danger d-inline-flex align-items-center justify-content-center gap-2" href="car-form.php">
            <i class="bi bi-plus-circle-fill"></i>
            <span>Tambah Mobil</span>
        </a>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold d-block mb-1">Total Unit Mobil</span>
                    <strong class="display-6 fw-bold text-dark"><?= $totalCars ?></strong>
                </div>
                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="bi bi-car-front-fill fs-3 text-secondary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold d-block mb-1">Unit Tersedia</span>
                    <strong class="display-6 fw-bold text-success"><?= $availableCars ?></strong>
                </div>
                <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="bi bi-check-circle-fill fs-3 text-success"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold d-block mb-1">Tidak Tersedia / Rawat</span>
                    <strong class="display-6 fw-bold text-warning"><?= $unavailableCars ?></strong>
                </div>
                <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="bi bi-tools fs-3 text-warning"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php admin_page_end(); ?>
