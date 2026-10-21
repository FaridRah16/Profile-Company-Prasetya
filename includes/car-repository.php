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
