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
<div class="d-flex justify-content-between align-items-start gap-3 flex-wrap mb-4">
    <div><h1 class="h2 fw-bold mb-1">Katalog Mobil</h1><p class="text-muted mb-0">Tambah, ubah, atur urutan posisi, atau hapus unit yang tampil ke publik.</p></div>
    <a class="btn btn-danger" href="car-form.php">+ Tambah Mobil</a>
</div>
<?php if ($notice): ?><div class="alert alert-success"><?= admin_html($notice) ?></div><?php endif; ?>
<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 130px;" class="text-center">Urutan</th>
                    <th>Mobil</th>
                    <th>Status</th>
                    <th>Tarif</th>
                    <th class="text-end">Aksi</th>
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
                                <button class="btn btn-sm btn-outline-secondary px-2 py-1 lh-1" type="submit" title="Pindah ke Atas" <?= $index === 0 ? 'disabled' : '' ?>>
                                    <i class="bi bi-arrow-up"></i>
                                </button>
                            </form>
                            <form class="d-inline m-0" method="post" action="reorder-car.php">
                                <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
                                <input type="hidden" name="id" value="<?= $car['id'] ?>">
                                <input type="hidden" name="direction" value="down">
                                <button class="btn btn-sm btn-outline-secondary px-2 py-1 lh-1" type="submit" title="Pindah ke Bawah" <?= $index === count($cars) - 1 ? 'disabled' : '' ?>>
                                    <i class="bi bi-arrow-down"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td><div class="d-flex align-items-center gap-3"><img src="../<?= admin_html($car['image']) ?>" alt="" width="72" height="48" class="rounded object-fit-cover border"><div><strong><?= admin_html($car['name']) ?></strong><small class="d-block text-muted"><?= admin_html($car['brand']) ?> · <?= admin_html($car['type']) ?></small></div></div></td>
                    <td><span class="badge text-bg-<?= $car['status'] === 'available' ? 'success' : ($car['status'] === 'maintenance' ? 'warning' : 'secondary') ?>"><?= admin_html($car['status'] === 'available' ? 'Tersedia' : ($car['status'] === 'maintenance' ? 'Perawatan' : 'Tidak tersedia')) ?></span></td>
                    <td><?= admin_html($car['price_label'] ?: 'Rp ' . number_format((int) $car['price_per_day'], 0, ',', '.')) ?></td>
                    <td class="text-end"><a class="btn btn-sm btn-outline-primary" href="car-form.php?id=<?= $car['id'] ?>">Ubah</a>
                        <form class="d-inline" method="post" action="delete-car.php" onsubmit="return confirm('Hapus mobil ini dari katalog?');"><input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>"><input type="hidden" name="id" value="<?= $car['id'] ?>"><button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button></form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php admin_page_end(); ?>
