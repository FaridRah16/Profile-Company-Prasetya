<?php

declare(strict_types=1);

function database_settings(): array
{
    $settings = [
        'host' => 'db.fr-roub1.bengt.wasmernet.com',
        'port' => '20184',
        'name' => 'prasetya_rent_car',
        'user' => 'user_16405dfe',
        'password' => 'pw_RwoE5uMK1Zt5gVGqh61JmPfU4abf6HLI',
        'charset' => 'utf8mb4',
    ];

    $localConfig = __DIR__ . '/database.local.php';
    if (is_file($localConfig)) {
        $localSettings = require $localConfig;
        if (is_array($localSettings)) {
            $settings = array_replace($settings, $localSettings);
        }
    }

    $environmentKeys = [
        'host' => 'DB_HOST',
        'port' => 'DB_PORT',
        'name' => 'DB_NAME',
        'user' => 'DB_USER',
        'password' => 'DB_PASSWORD',
        'charset' => 'DB_CHARSET',
    ];

    foreach ($environmentKeys as $key => $environmentKey) {
        $value = getenv($environmentKey);
        if ($value !== false && $value !== '') {
            $settings[$key] = $value;
        }
    }

    return $settings;
}

function database_pdo(bool $withoutDatabase = false): PDO
{
    static $connections = [];
    $cacheKey = $withoutDatabase ? 'server' : 'database';

    if (isset($connections[$cacheKey])) {
        return $connections[$cacheKey];
    }

    $settings = database_settings();
    $dsn = sprintf(
        'mysql:host=%s;port=%s%s;charset=%s',
        $settings['host'],
        $settings['port'],
        $withoutDatabase ? '' : ';dbname=' . $settings['name'],
        $settings['charset']
    );

    $connections[$cacheKey] = new PDO($dsn, $settings['user'], $settings['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    return $connections[$cacheKey];
}
