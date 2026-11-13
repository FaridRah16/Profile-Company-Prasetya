<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/car-repository.php';
require_once __DIR__ . '/../includes/admin-layout.php';

$admin = require_admin();
$cars = car_repository_all();
$notice = match ($_GET['success'] ?? '') {
    'created' => 'Mobil berhasil ditambahkan.',
    'updated' => 'Data mobil berhasil diperbarui.',
    'deleted' => 'Mobil berhasil dihapus.',
    'reordered' => 'Urutan posisi mobil berhasil diperbarui.',
    default => null,
};

admin_page_start('Katalog Mobil', $admin);
?>
<div class="d-flex justify-content-between align-items-sm-center align-items-stretch gap-3 flex-column flex-sm-row mb-4">
    <div>
        <h1 class="h3 fw-bold mb-1">Katalog Mobil</h1>
        <p class="text-muted small mb-0">Tambah, ubah, atur urutan posisi, atau hapus unit yang tampil ke publik.</p>
    </div>
    <a class="btn btn-danger d-inline-flex align-items-center justify-content-center gap-2 px-3 py-2" href="car-form.php">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Tambah Mobil</span>
    </a>
</div>

<?php if ($notice): ?>
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 d-flex align-items-center gap-2 mb-4" role="alert">
        <i class="bi bi-check-circle-fill text-success fs-5"></i>
        <div><?= admin_html($notice) ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- ================= TAMPILAN MOBILE (Card List < 768px) ================= -->
<div class="d-md-none d-flex flex-column gap-3 mb-4">
    <?php foreach ($cars as $index => $car): ?>
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden admin-car-card-mobile">
            <!-- Header Kartu: Posisi & Tombol Naik/Turun -->
            <div class="card-header bg-white border-bottom py-2 px-3 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge text-bg-dark rounded-pill px-2 py-1" style="font-size: 0.75rem;">
                        Posisi #<?= $index + 1 ?>
                    </span>
                    <span class="badge text-bg-<?= $car['status'] === 'available' ? 'success' : ($car['status'] === 'maintenance' ? 'warning' : 'secondary') ?>" style="font-size: 0.72rem;">
                        <?= admin_html($car['status'] === 'available' ? 'Tersedia' : ($car['status'] === 'maintenance' ? 'Perawatan' : 'Tidak tersedia')) ?>
                    </span>
                </div>
                <div class="d-flex align-items-center gap-1">
                    <form class="d-inline m-0" method="post" action="reorder-car.php">
                        <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                        <input type="hidden" name="id" value="<?= $car['id'] ?>">
                        <input type="hidden" name="direction" value="up">
                        <button class="btn btn-light border btn-order-icon" type="submit" title="Pindah ke Atas" <?= $index === 0 ? 'disabled' : '' ?>>
                            <i class="bi bi-arrow-up text-primary fw-bold"></i>
                        </button>
                    </form>
                    <form class="d-inline m-0" method="post" action="reorder-car.php">
                        <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                        <input type="hidden" name="id" value="<?= $car['id'] ?>">
                        <input type="hidden" name="direction" value="down">
                        <button class="btn btn-light border btn-order-icon" type="submit" title="Pindah ke Bawah" <?= $index === count($cars) - 1 ? 'disabled' : '' ?>>
                            <i class="bi bi-arrow-down text-primary fw-bold"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Isi Kartu: Foto, Nama, Tipe, Harga -->
            <div class="card-body p-3">
                <div class="d-flex gap-3 align-items-center">
                    <img src="../<?= admin_html($car['image']) ?>" alt="<?= admin_html($car['name']) ?>" width="96" height="64" class="rounded-3 object-fit-cover border bg-light flex-shrink-0">
                    <div class="flex-grow-1 min-w-0">
                        <h6 class="fw-bold mb-1 text-truncate" title="<?= admin_html($car['name']) ?>"><?= admin_html($car['name']) ?></h6>
                        <div class="text-muted small mb-1">
                            <span><?= admin_html($car['brand']) ?></span> · <span class="badge bg-light text-secondary border"><?= admin_html($car['type']) ?></span>
                        </div>
                        <div class="fw-bold text-danger">
                            <?= admin_html($car['price_label'] ?: 'Rp ' . number_format((int) $car['price_per_day'], 0, ',', '.') . ' /hari') ?>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi Bawah -->
                <div class="d-flex gap-2 mt-3 pt-3 border-top">
                    <a class="btn btn-sm btn-outline-primary flex-fill d-inline-flex align-items-center justify-content-center gap-1 py-2" href="car-form.php?id=<?= $car['id'] ?>">
                        <i class="bi bi-pencil-square"></i>
                        <span>Ubah</span>
                    </a>
                    <form class="flex-fill m-0" method="post" action="delete-car.php" onsubmit="return confirm('Hapus mobil <?= admin_html($car['name']) ?> dari katalog?');">
                        <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                        <input type="hidden" name="id" value="<?= $car['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger w-100 d-inline-flex align-items-center justify-content-center gap-1 py-2" type="submit">
                            <i class="bi bi-trash3"></i>
                            <span>Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- ================= TAMPILAN DESKTOP/TABLET (Tabel >= 768px) ================= -->
<div class="d-none d-md-block card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 140px;" class="text-center">Urutan</th>
                    <th>Mobil</th>
                    <th>Status</th>
                    <th>Tarif</th>
                    <th class="text-end" style="width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cars as $index => $car): ?>
                <tr>
                    <td class="text-center">
                        <div class="d-inline-flex align-items-center gap-1">
                            <span class="badge text-bg-light border text-secondary fw-semibold px-2 py-1 me-1" title="Posisi ke-<?= $index + 1 ?>">#<?= $index + 1 ?></span>
                            <form class="d-inline m-0" method="post" action="reorder-car.php">
                                <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                                <input type="hidden" name="id" value="<?= $car['id'] ?>">
                                <input type="hidden" name="direction" value="up">
                                <button class="btn btn-sm btn-light border btn-order-icon" type="submit" title="Pindah ke Atas" <?= $index === 0 ? 'disabled' : '' ?>>
                                    <i class="bi bi-arrow-up text-primary fw-bold"></i>
                                </button>
                            </form>
                            <form class="d-inline m-0" method="post" action="reorder-car.php">
                                <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                                <input type="hidden" name="id" value="<?= $car['id'] ?>">
                                <input type="hidden" name="direction" value="down">
                                <button class="btn btn-sm btn-light border btn-order-icon" type="submit" title="Pindah ke Bawah" <?= $index === count($cars) - 1 ? 'disabled' : '' ?>>
                                    <i class="bi bi-arrow-down text-primary fw-bold"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="../<?= admin_html($car['image']) ?>" alt="" width="80" height="54" class="rounded object-fit-cover border bg-light flex-shrink-0">
                            <div>
                                <strong class="d-block text-dark"><?= admin_html($car['name']) ?></strong>
                                <small class="text-muted"><?= admin_html($car['brand']) ?> · <span class="badge bg-light text-secondary border"><?= admin_html($car['type']) ?></span></small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge text-bg-<?= $car['status'] === 'available' ? 'success' : ($car['status'] === 'maintenance' ? 'warning' : 'secondary') ?> px-2 py-1"><?= admin_html($car['status'] === 'available' ? 'Tersedia' : ($car['status'] === 'maintenance' ? 'Perawatan' : 'Tidak tersedia')) ?></span></td>
                    <td><strong class="text-dark"><?= admin_html($car['price_label'] ?: 'Rp ' . number_format((int) $car['price_per_day'], 0, ',', '.')) ?></strong></td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-1">
                            <a class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1 px-2 py-1" href="car-form.php?id=<?= $car['id'] ?>">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                            <form class="d-inline m-0" method="post" action="delete-car.php" onsubmit="return confirm('Hapus mobil <?= admin_html($car['name']) ?> dari katalog?');">
                                <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                                <input type="hidden" name="id" value="<?= $car['id'] ?>">
                                <button class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1 px-2 py-1" type="submit">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php admin_page_end(); ?>
