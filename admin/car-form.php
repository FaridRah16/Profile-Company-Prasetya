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
<div class="d-flex justify-content-between align-items-start gap-3 flex-wrap mb-4">
    <div><h1 class="h2 fw-bold mb-1"><?= $isEditing ? 'Ubah Mobil' : 'Tambah Mobil' ?></h1><p class="text-muted mb-0">Lengkapi informasi yang akan muncul di katalog publik.</p></div>
    <a class="btn btn-outline-secondary" href="cars.php">Kembali</a>
</div>
<?php if (isset($errors['form'])): ?><div class="alert alert-danger"><?= admin_html($errors['form']) ?></div><?php endif; ?>
<form method="post" enctype="multipart/form-data" class="card border-0 shadow-sm rounded-4 p-4">
    <input type="hidden" name="csrf_token" value="<?= admin_html(csrf_token()) ?>">
    <div class="row g-3">
        <div class="col-md-6"><label class="form-label" for="name">Nama mobil</label><input class="form-control" id="name" name="name" value="<?= admin_html($car['name']) ?>" required><?php admin_field_error($errors, 'name'); ?></div>
        <div class="col-md-3"><label class="form-label" for="brand">Merek</label><input class="form-control" id="brand" name="brand" value="<?= admin_html($car['brand']) ?>" required><?php admin_field_error($errors, 'brand'); ?></div>
        <div class="col-md-3"><label class="form-label" for="type">Tipe</label><input class="form-control" id="type" name="type" value="<?= admin_html($car['type']) ?>" required><?php admin_field_error($errors, 'type'); ?></div>
        <div class="col-md-3"><label class="form-label" for="year">Tahun</label><input class="form-control" id="year" name="year" type="number" min="1900" max="<?= date('Y') + 1 ?>" value="<?= admin_html($car['year']) ?>"><?php admin_field_error($errors, 'year'); ?></div>
        <div class="col-md-3"><label class="form-label" for="color">Warna</label><input class="form-control" id="color" name="color" value="<?= admin_html($car['color']) ?>"><?php admin_field_error($errors, 'color'); ?></div>
        <div class="col-md-3"><label class="form-label" for="seats">Kapasitas kursi</label><input class="form-control" id="seats" name="seats" type="number" min="1" max="30" value="<?= admin_html($car['seats']) ?>" required><?php admin_field_error($errors, 'seats'); ?></div>
        <div class="col-md-3"><label class="form-label" for="luggage_capacity">Kapasitas bagasi</label><input class="form-control" id="luggage_capacity" name="luggage_capacity" type="number" min="0" max="30" value="<?= admin_html($car['luggage_capacity']) ?>"><?php admin_field_error($errors, 'luggage_capacity'); ?></div>
        <div class="col-md-4"><label class="form-label" for="price_per_day">Harga per hari</label><input class="form-control" id="price_per_day" name="price_per_day" type="number" min="0" value="<?= admin_html($car['price_per_day']) ?>"><?php admin_field_error($errors, 'price_per_day'); ?></div>
        <div class="col-md-4"><label class="form-label" for="price_label">Label harga</label><input class="form-control" id="price_label" name="price_label" placeholder="Contoh: Ask" value="<?= admin_html($car['price_label']) ?>"><?php admin_field_error($errors, 'price_label'); ?></div>
        <div class="col-md-4"><label class="form-label" for="status">Status</label><select class="form-select" id="status" name="status"><option value="available" <?= $car['status'] === 'available' ? 'selected' : '' ?>>Tersedia</option><option value="unavailable" <?= $car['status'] === 'unavailable' ? 'selected' : '' ?>>Tidak tersedia</option><option value="maintenance" <?= $car['status'] === 'maintenance' ? 'selected' : '' ?>>Perawatan</option></select><?php admin_field_error($errors, 'status'); ?></div>
        <div class="col-md-4"><label class="form-label" for="transmission">Transmisi</label><input class="form-control" id="transmission" name="transmission" value="<?= admin_html($car['transmission']) ?>" required><?php admin_field_error($errors, 'transmission'); ?></div>
        <div class="col-md-4"><label class="form-label" for="fuel">Bahan bakar</label><input class="form-control" id="fuel" name="fuel" value="<?= admin_html($car['fuel']) ?>" required><?php admin_field_error($errors, 'fuel'); ?></div>
        <div class="col-md-4"><label class="form-label" for="badge">Badge</label><input class="form-control" id="badge" name="badge" value="<?= admin_html($car['badge']) ?>"><?php admin_field_error($errors, 'badge'); ?></div>
        <div class="col-12"><label class="form-label" for="description">Deskripsi</label><textarea class="form-control" id="description" name="description" rows="4" required><?= admin_html($car['description']) ?></textarea><?php admin_field_error($errors, 'description'); ?></div>
        <div class="col-md-6"><label class="form-label" for="features">Fitur (satu per baris)</label><textarea class="form-control" id="features" name="features" rows="5" required><?= admin_html(implode("\n", $car['features'])) ?></textarea><?php admin_field_error($errors, 'features'); ?></div>
        <div class="col-md-6"><label class="form-label" for="image">Foto mobil <?= $isEditing ? '(kosongkan bila tidak mengganti)' : '' ?></label><input class="form-control" id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp" <?= $isEditing ? '' : 'required' ?>><div class="form-text">JPEG, PNG, atau WEBP maksimal 5 MB.</div><?php admin_field_error($errors, 'image'); ?>
            <?php if ($isEditing): ?><img class="border rounded mt-3" src="../<?= admin_html($existingCar['image']) ?>" alt="Foto saat ini" width="180"><?php endif; ?></div>
    </div>
    <div class="mt-4 d-flex gap-2"><button class="btn btn-danger" type="submit"><?= $isEditing ? 'Simpan Perubahan' : 'Tambah Mobil' ?></button><a class="btn btn-light" href="cars.php">Batal</a></div>
</form>
<?php admin_page_end(); ?>
