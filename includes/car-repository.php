<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';

function car_from_database_row(array $row): array
{
    $features = json_decode($row['features'], true);
    $row['features'] = is_array($features) ? $features : [];
    $row['id'] = (int) $row['id'];
    $row['year'] = $row['year'] === null ? null : (int) $row['year'];
    $row['price_per_day'] = $row['price_per_day'] === null ? null : (int) $row['price_per_day'];
    $row['seats'] = (int) $row['seats'];
    $row['luggage_capacity'] = $row['luggage_capacity'] === null ? null : (int) $row['luggage_capacity'];

    return $row;
}

function car_repository_all(): array
{
    $rows = database_pdo()->query('SELECT * FROM cars ORDER BY id ASC')->fetchAll();
    return array_map('car_from_database_row', $rows);
}

function car_repository_find(int $id): ?array
{
    $statement = database_pdo()->prepare('SELECT * FROM cars WHERE id = :id LIMIT 1');
    $statement->execute(['id' => $id]);
    $car = $statement->fetch();

    return $car ? car_from_database_row($car) : null;
}

function car_repository_featured(int $limit): array
{
    $statement = database_pdo()->prepare('SELECT * FROM cars ORDER BY id ASC LIMIT :limit');
    $statement->bindValue('limit', max(1, $limit), PDO::PARAM_INT);
    $statement->execute();

    return array_map('car_from_database_row', $statement->fetchAll());
}

function car_repository_count_by_status(string $status): int
{
    $statement = database_pdo()->prepare('SELECT COUNT(*) FROM cars WHERE status = :status');
    $statement->execute(['status' => $status]);
    return (int) $statement->fetchColumn();
}

function car_repository_create(array $car): int
{
    $statement = database_pdo()->prepare(
        'INSERT INTO cars (
            name, brand, type, year, color, price_per_day, price_label, status, image,
            seats, luggage_capacity, transmission, fuel, badge, description, features
        ) VALUES (
            :name, :brand, :type, :year, :color, :price_per_day, :price_label, :status, :image,
            :seats, :luggage_capacity, :transmission, :fuel, :badge, :description, :features
        )'
    );
    $statement->execute(car_database_values($car));

    return (int) database_pdo()->lastInsertId();
}

function car_repository_update(int $id, array $car): bool
{
    $values = car_database_values($car);
    $values['id'] = $id;
    $statement = database_pdo()->prepare(
        'UPDATE cars SET
            name = :name, brand = :brand, type = :type, year = :year, color = :color,
            price_per_day = :price_per_day, price_label = :price_label, status = :status,
            image = :image, seats = :seats, luggage_capacity = :luggage_capacity,
            transmission = :transmission, fuel = :fuel, badge = :badge,
            description = :description, features = :features
        WHERE id = :id'
    );

    return $statement->execute($values);
}

function car_repository_delete(int $id): bool
{
    $statement = database_pdo()->prepare('DELETE FROM cars WHERE id = :id');
    return $statement->execute(['id' => $id]) && $statement->rowCount() === 1;
}

function car_database_values(array $car): array
{
    return [
        'name' => $car['name'],
        'brand' => $car['brand'],
        'type' => $car['type'],
        'year' => $car['year'],
        'color' => $car['color'],
        'price_per_day' => $car['price_per_day'],
        'price_label' => $car['price_label'],
        'status' => $car['status'],
        'image' => $car['image'],
        'seats' => $car['seats'],
        'luggage_capacity' => $car['luggage_capacity'],
        'transmission' => $car['transmission'],
        'fuel' => $car['fuel'],
        'badge' => $car['badge'],
        'description' => $car['description'],
        'features' => json_encode($car['features'], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE),
    ];
}
