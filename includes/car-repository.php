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
    $row['sort_order'] = isset($row['sort_order']) ? (int) $row['sort_order'] : 0;

    return $row;
}

function car_repository_all(): array
{
    $rows = database_pdo()->query('SELECT * FROM cars ORDER BY sort_order ASC, id ASC')->fetchAll();
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
    $statement = database_pdo()->prepare('SELECT * FROM cars ORDER BY sort_order ASC, id ASC LIMIT :limit');
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
    $nextOrder = (int) database_pdo()->query('SELECT COALESCE(MAX(sort_order), 0) + 10 FROM cars')->fetchColumn();
    $values = car_database_values($car);
    $values['sort_order'] = $nextOrder;

    $statement = database_pdo()->prepare(
        'INSERT INTO cars (
            name, brand, type, year, color, price_per_day, price_label, status, image,
            seats, luggage_capacity, transmission, fuel, badge, description, features, sort_order
        ) VALUES (
            :name, :brand, :type, :year, :color, :price_per_day, :price_label, :status, :image,
            :seats, :luggage_capacity, :transmission, :fuel, :badge, :description, :features, :sort_order
        )'
    );
    $statement->execute($values);

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

function car_repository_move(int $id, string $direction): bool
{
    if (!in_array($direction, ['up', 'down'], true)) {
        return false;
    }

    $db = database_pdo();
    $rows = $db->query('SELECT id FROM cars ORDER BY sort_order ASC, id ASC')->fetchAll(PDO::FETCH_COLUMN);
    $ids = array_map('intval', $rows);
    $currentIndex = array_search($id, $ids, true);
    if ($currentIndex === false) {
        return false;
    }

    $targetIndex = $direction === 'up' ? $currentIndex - 1 : $currentIndex + 1;
    if ($targetIndex < 0 || $targetIndex >= count($ids)) {
        return false;
    }

    // Tukar posisi ID dalam urutan
    $temp = $ids[$currentIndex];
    $ids[$currentIndex] = $ids[$targetIndex];
    $ids[$targetIndex] = $temp;

    // Simpan kembali nomor urut yang bersih (10, 20, 30...)
    $db->beginTransaction();
    try {
        $stmt = $db->prepare('UPDATE cars SET sort_order = :sort_order WHERE id = :id');
        foreach ($ids as $pos => $carId) {
            $stmt->execute([
                'sort_order' => ($pos + 1) * 10,
                'id' => $carId,
            ]);
        }
        $db->commit();
        return true;
    } catch (Throwable $e) {
        $db->rollBack();
        throw $e;
    }
}
