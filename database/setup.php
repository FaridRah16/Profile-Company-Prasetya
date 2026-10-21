<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('CLI only.');
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../data/cars.php';

$options = getopt('', ['email:', 'password:', 'name::']);
if (empty($options['email']) || empty($options['password'])) {
    fwrite(STDERR, "Usage: php database/setup.php --email=admin@example.com --password=strong-password [--name=Administrator]\n");
    exit(1);
}

if (!filter_var($options['email'], FILTER_VALIDATE_EMAIL) || strlen($options['password']) < 12) {
    fwrite(STDERR, "Use a valid email and a password with at least 12 characters.\n");
    exit(1);
}

$settings = database_settings();
if (!preg_match('/^[A-Za-z0-9_]+$/', $settings['name'])) {
    fwrite(STDERR, "DB_NAME may contain only letters, numbers, and underscores.\n");
    exit(1);
}

$server = database_pdo(true);
$server->exec(sprintf(
    'CREATE DATABASE IF NOT EXISTS `%s` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci',
    $settings['name']
));

$database = database_pdo();
$schemaStatements = array_filter(array_map('trim', explode(';', (string) file_get_contents(__DIR__ . '/schema.sql'))));
foreach ($schemaStatements as $statement) {
    $database->exec($statement);
}

$insertCar = $database->prepare(
    'INSERT IGNORE INTO cars (
        id, name, brand, type, year, color, price_per_day, price_label, status, image,
        seats, luggage_capacity, transmission, fuel, badge, description, features
    ) VALUES (
        :id, :name, :brand, :type, :year, :color, :price_per_day, :price_label, :status, :image,
        :seats, :luggage_capacity, :transmission, :fuel, :badge, :description, :features
    )'
);

$database->beginTransaction();
try {
    foreach ($cars as $car) {
        $insertCar->execute([
            'id' => $car['id'],
            'name' => $car['name'],
            'brand' => $car['brand'],
            'type' => $car['type'],
            'year' => $car['year'],
            'color' => $car['color'],
            'price_per_day' => $car['price_per_day'],
            'price_label' => $car['price_label'] ?? null,
            'status' => $car['status'],
            'image' => $car['image'],
            'seats' => $car['seats'],
            'luggage_capacity' => $car['luggage_capacity'],
            'transmission' => $car['transmission'],
            'fuel' => $car['fuel'],
            'badge' => $car['badge'] ?? null,
            'description' => $car['description'],
            'features' => json_encode($car['features'], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE),
        ]);
    }

    $adminExists = $database->prepare('SELECT id FROM admins WHERE email = :email LIMIT 1');
    $adminExists->execute(['email' => strtolower($options['email'])]);
    if (!$adminExists->fetch()) {
        $createAdmin = $database->prepare(
            'INSERT INTO admins (name, email, password_hash) VALUES (:name, :email, :password_hash)'
        );
        $createAdmin->execute([
            'name' => $options['name'] ?? 'Administrator',
            'email' => strtolower($options['email']),
            'password_hash' => password_hash($options['password'], PASSWORD_DEFAULT),
        ]);
    }

    $database->commit();
} catch (Throwable $exception) {
    $database->rollBack();
    throw $exception;
}

echo "Setup complete: " . count($cars) . " catalog cars seeded.\n";
