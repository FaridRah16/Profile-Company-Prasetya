<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/admin-car.php';
require_once __DIR__ . '/../includes/admin-layout.php';

$admin = require_admin();
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$existingCar = $id > 0 ? car_repository_find($id) : null;
if ($id > 0 && !$existingCar) {
    header('Location: cars.php');
    exit;
}

$car = $existingCar ?: admin_car_defaults();
$errors = [];
$isEditing = $existingCar !== null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_valid_csrf();
    [$car, $errors] = validate_admin_car($_POST);
    $car['image'] = $existingCar['image'] ?? '';

    if (!$errors) {
        [$uploadedImage, $uploadError] = admin_store_car_image($_FILES['image'] ?? null, !$isEditing);
        if ($uploadError) {
            $errors['image'] = $uploadError;
        } elseif ($uploadedImage !== null) {
            $car['image'] = $uploadedImage;
        }
    }

    if (!$errors) {
        try {
            if ($isEditing) {
                car_repository_update($id, $car);
                if ($uploadedImage !== null) {
                    admin_delete_managed_car_image($existingCar['image']);
                }
                header('Location: cars.php?success=updated');
            } else {
                car_repository_create($car);
                header('Location: cars.php?success=created');
            }
            exit;
        } catch (Throwable $exception) {
            if (isset($uploadedImage) && $uploadedImage !== null) {
                admin_delete_managed_car_image($uploadedImage);
            }
            $errors['form'] = 'Data mobil tidak dapat disimpan. Coba lagi.';
        }
    }
}

admin_page_start($isEditing ? 'Ubah Mobil' : 'Tambah Mobil', $admin);
?>
<div class="d-flex justify-content-between align-items-sm-center align-items-stretch gap-3 flex-column flex-sm-row mb-4">
    <div>
        <h1 class="h3 fw-bold mb-1"><?= $isEditing ? 'Ubah Data Mobil' : 'Tambah Mobil Baru' ?></h1>
        <p class="text-muted small mb-0">Lengkapi informasi unit yang akan tampil di katalog publik.</p>
    </div>
    <a class="btn btn-outline-secondary d-inline-flex align-items-center justify-content-center gap-2" href="cars.php">
        <i class="bi bi-arrow-left"></i>
        <span>Kembali ke Katalog</span>
    </a>
</div>

<?php if (isset($errors['form'])): ?>
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <?= admin_html($errors['form']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data" class="card border-0 shadow-sm rounded-4 p-3 p-md-4">
    <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold" for="name">Nama mobil <span class="text-danger">*</span></label>
            <input class="form-control" id="name" name="name" value="<?= admin_html($car['name']) ?>" placeholder="Contoh: Toyota Innova Zenix" required>
            <?php admin_field_error($errors, 'name'); ?>
        </div>
        <div class="col-md-3 col-6">
            <label class="form-label fw-semibold" for="brand">Merek <span class="text-danger">*</span></label>
            <input class="form-control" id="brand" name="brand" value="<?= admin_html($car['brand']) ?>" placeholder="Contoh: Toyota" required>
            <?php admin_field_error($errors, 'brand'); ?>
        </div>
        <div class="col-md-3 col-6">
            <label class="form-label fw-semibold" for="type">Tipe <span class="text-danger">*</span></label>
            <input class="form-control" id="type" name="type" value="<?= admin_html($car['type']) ?>" placeholder="Contoh: MPV" required>
            <?php admin_field_error($errors, 'type'); ?>
        </div>
        <div class="col-md-3 col-6">
            <label class="form-label fw-semibold" for="year">Tahun</label>
            <input class="form-control" id="year" name="year" type="number" min="1900" max="<?= date('Y') + 1 ?>" value="<?= admin_html($car['year']) ?>" placeholder="2023">
            <?php admin_field_error($errors, 'year'); ?>
        </div>
        <div class="col-md-3 col-6">
            <label class="form-label fw-semibold" for="color">Warna</label>
            <input class="form-control" id="color" name="color" value="<?= admin_html($car['color']) ?>" placeholder="Hitam Metalik">
            <?php admin_field_error($errors, 'color'); ?>
        </div>
        <div class="col-md-3 col-6">
            <label class="form-label fw-semibold" for="seats">Kapasitas kursi <span class="text-danger">*</span></label>
            <input class="form-control" id="seats" name="seats" type="number" min="1" max="30" value="<?= admin_html($car['seats']) ?>" required>
            <?php admin_field_error($errors, 'seats'); ?>
        </div>
        <div class="col-md-3 col-6">
            <label class="form-label fw-semibold" for="luggage_capacity">Kapasitas bagasi</label>
            <input class="form-control" id="luggage_capacity" name="luggage_capacity" type="number" min="0" max="30" value="<?= admin_html($car['luggage_capacity']) ?>" placeholder="Jumlah koper">
            <?php admin_field_error($errors, 'luggage_capacity'); ?>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold" for="price_per_day">Harga per hari (Rp)</label>
            <input class="form-control" id="price_per_day" name="price_per_day" type="number" min="0" value="<?= admin_html($car['price_per_day']) ?>" placeholder="Contoh: 750000">
            <?php admin_field_error($errors, 'price_per_day'); ?>
        </div>
        <div class="col-md-4 col-6">
            <label class="form-label fw-semibold" for="price_label">Label harga khusus</label>
            <input class="form-control" id="price_label" name="price_label" placeholder="Contoh: Ask" value="<?= admin_html($car['price_label']) ?>">
            <?php admin_field_error($errors, 'price_label'); ?>
        </div>
        <div class="col-md-4 col-6">
            <label class="form-label fw-semibold" for="status">Status ketersediaan</label>
            <select class="form-select" id="status" name="status">
                <option value="available" <?= $car['status'] === 'available' ? 'selected' : '' ?>>Tersedia</option>
                <option value="unavailable" <?= $car['status'] === 'unavailable' ? 'selected' : '' ?>>Tidak tersedia</option>
                <option value="maintenance" <?= $car['status'] === 'maintenance' ? 'selected' : '' ?>>Dalam Perawatan</option>
            </select>
            <?php admin_field_error($errors, 'status'); ?>
        </div>
        <div class="col-md-4 col-6">
            <label class="form-label fw-semibold" for="transmission">Transmisi <span class="text-danger">*</span></label>
            <input class="form-control" id="transmission" name="transmission" value="<?= admin_html($car['transmission']) ?>" placeholder="Automatic / Manual" required>
            <?php admin_field_error($errors, 'transmission'); ?>
        </div>
        <div class="col-md-4 col-6">
            <label class="form-label fw-semibold" for="fuel">Bahan bakar <span class="text-danger">*</span></label>
            <input class="form-control" id="fuel" name="fuel" value="<?= admin_html($car['fuel']) ?>" placeholder="Bensin / Diesel / Listrik" required>
            <?php admin_field_error($errors, 'fuel'); ?>
        </div>
        <div class="col-md-4">
            <label class="form-label fw-semibold" for="badge">Badge promosi/kategori</label>
            <input class="form-control" id="badge" name="badge" value="<?= admin_html($car['badge']) ?>" placeholder="Contoh: Terpopuler, Mewah">
            <?php admin_field_error($errors, 'badge'); ?>
        </div>
        <div class="col-12">
            <label class="form-label fw-semibold" for="description">Deskripsi <span class="text-danger">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Jelaskan keunggulan dan kenyamanan mobil ini..." required><?= admin_html($car['description']) ?></textarea>
            <?php admin_field_error($errors, 'description'); ?>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold" for="features">Fitur (1 per baris) <span class="text-danger">*</span></label>
            <textarea class="form-control font-monospace small" id="features" name="features" rows="4" placeholder="Kapasitas 7 penumpang&#10;AC Double Blower&#10;Kamera Mundur" required><?= admin_html(implode("\n", $car['features'])) ?></textarea>
            <?php admin_field_error($errors, 'features'); ?>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold" for="image">Foto mobil <?= $isEditing ? '<small class="text-muted fw-normal">(kosongkan bila tidak ganti)</small>' : '<span class="text-danger">*</span>' ?></label>
            <input class="form-control" id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp" <?= $isEditing ? '' : 'required' ?>>
            <div class="form-text small">JPEG, PNG, atau WEBP maksimal 5 MB.</div>
            <?php admin_field_error($errors, 'image'); ?>
            <?php if ($isEditing && !empty($existingCar['image'])): ?>
                <div class="mt-2 d-flex align-items-center gap-2">
                    <img class="border rounded-3 bg-light object-fit-cover" src="../<?= admin_html($existingCar['image']) ?>" alt="Foto saat ini" width="100" height="66">
                    <small class="text-muted">Foto saat ini</small>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="mt-4 pt-3 border-top d-flex flex-column flex-sm-row gap-2">
        <button class="btn btn-danger d-inline-flex align-items-center justify-content-center gap-2 px-4 py-2" type="submit">
            <i class="bi bi-check-circle-fill"></i>
            <span><?= $isEditing ? 'Simpan Perubahan' : 'Tambah Mobil' ?></span>
        </button>
        <a class="btn btn-outline-secondary d-inline-flex align-items-center justify-content-center px-4 py-2" href="cars.php">
            Batal
        </a>
    </div>
</form>
<?php admin_page_end(); ?>
