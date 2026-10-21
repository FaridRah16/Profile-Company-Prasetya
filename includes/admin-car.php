<?php

declare(strict_types=1);

require_once __DIR__ . '/car-repository.php';

function admin_car_defaults(): array
{
    return [
        'name' => '', 'brand' => '', 'type' => '', 'year' => null, 'color' => null,
        'price_per_day' => null, 'price_label' => null, 'status' => 'available', 'image' => '',
        'seats' => 5, 'luggage_capacity' => null, 'transmission' => 'Automatic', 'fuel' => 'Bensin',
        'badge' => null, 'description' => '', 'features' => [],
    ];
}

function validate_admin_car(array $input): array
{
    $car = admin_car_defaults();
    $errors = [];
    $limits = [
        'name' => 150, 'brand' => 100, 'type' => 100, 'color' => 100,
        'price_label' => 100, 'transmission' => 50, 'fuel' => 100, 'badge' => 100,
    ];

    foreach ($limits as $field => $limit) {
        $value = trim((string) ($input[$field] ?? ''));
        if (in_array($field, ['name', 'brand', 'type', 'transmission', 'fuel'], true) && $value === '') {
            $errors[$field] = 'Wajib diisi.';
        } elseif (mb_strlen($value) > $limit) {
            $errors[$field] = "Maksimal {$limit} karakter.";
        }
        $car[$field] = $value === '' ? null : $value;
    }

    $description = trim((string) ($input['description'] ?? ''));
    if ($description === '') {
        $errors['description'] = 'Wajib diisi.';
    } elseif (mb_strlen($description) > 5000) {
        $errors['description'] = 'Maksimal 5000 karakter.';
    }
    $car['description'] = $description;

    $status = (string) ($input['status'] ?? '');
    if (!in_array($status, ['available', 'unavailable', 'maintenance'], true)) {
        $errors['status'] = 'Status tidak valid.';
    }
    $car['status'] = $status;

    $car['year'] = admin_nullable_integer($input['year'] ?? null, 'year', 1900, (int) date('Y') + 1, $errors);
    $car['price_per_day'] = admin_nullable_integer($input['price_per_day'] ?? null, 'price_per_day', 0, 100000000, $errors);
    $car['seats'] = admin_nullable_integer($input['seats'] ?? null, 'seats', 1, 30, $errors);
    $car['luggage_capacity'] = admin_nullable_integer($input['luggage_capacity'] ?? null, 'luggage_capacity', 0, 30, $errors);
    if ($car['seats'] === null) {
        $errors['seats'] = 'Wajib diisi.';
    }
    if ($car['price_per_day'] === null && $car['price_label'] === null) {
        $errors['price_label'] = 'Isi harga per hari atau label harga.';
    }

    $features = preg_split('/\r\n|\r|\n/', trim((string) ($input['features'] ?? '')));
    $features = array_values(array_filter(array_map('trim', $features ?: []), static fn ($feature) => $feature !== ''));
    if (count($features) === 0) {
        $errors['features'] = 'Masukkan minimal satu fitur.';
    } elseif (count($features) > 20 || array_filter($features, static fn ($feature) => mb_strlen($feature) > 200)) {
        $errors['features'] = 'Maksimal 20 fitur dan 200 karakter per fitur.';
    }
    $car['features'] = $features;

    return [$car, $errors];
}

function admin_nullable_integer(mixed $value, string $field, int $min, int $max, array &$errors): ?int
{
    if ($value === null || trim((string) $value) === '') {
        return null;
    }

    $validated = filter_var($value, FILTER_VALIDATE_INT);
    if ($validated === false || $validated < $min || $validated > $max) {
        $errors[$field] = "Isi angka {$min} sampai {$max}.";
        return null;
    }

    return $validated;
}

function admin_store_car_image(?array $file, bool $required): array
{
    if (!$file || ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return [null, $required ? 'Foto mobil wajib diunggah.' : null];
    }
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return [null, 'Unggah foto gagal. Coba lagi.'];
    }
    if (($file['size'] ?? 0) < 1 || $file['size'] > 5 * 1024 * 1024) {
        return [null, 'Foto harus berukuran maksimal 5 MB.'];
    }

    $extension = strtolower(pathinfo((string) $file['name'], PATHINFO_EXTENSION));
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
    $allowed = [
        'image/jpeg' => ['jpg', 'jpeg'],
        'image/png' => ['png'],
        'image/webp' => ['webp'],
    ];
    if (!isset($allowed[$mime]) || !in_array($extension, $allowed[$mime], true) || !is_uploaded_file($file['tmp_name'])) {
        return [null, 'Foto harus JPEG, PNG, atau WEBP yang valid.'];
    }

    $uploadDirectory = __DIR__ . '/../uploads/cars';
    if (!is_dir($uploadDirectory) && !mkdir($uploadDirectory, 0755, true) && !is_dir($uploadDirectory)) {
        return [null, 'Folder upload tidak dapat dibuat.'];
    }

    $filename = bin2hex(random_bytes(16)) . '.' . $extension;
    if (!move_uploaded_file($file['tmp_name'], $uploadDirectory . '/' . $filename)) {
        return [null, 'Foto tidak dapat disimpan.'];
    }

    return ['uploads/cars/' . $filename, null];
}

function admin_delete_managed_car_image(?string $path): void
{
    if (!$path || !str_starts_with($path, 'uploads/cars/')) {
        return;
    }

    $file = __DIR__ . '/../' . $path;
    if (is_file($file)) {
        unlink($file);
    }
}
