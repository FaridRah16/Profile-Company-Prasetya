<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';

function admin_session_start(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443);

    session_name('prasetya_admin_session');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

function current_admin(): ?array
{
    admin_session_start();
    return isset($_SESSION['admin']) && is_array($_SESSION['admin']) ? $_SESSION['admin'] : null;
}

function require_admin(): array
{
    $admin = current_admin();
    if ($admin !== null) {
        return $admin;
    }

    header('Location: login.php');
    exit;
}

function login_admin(string $email, string $password): bool
{
    $statement = database_pdo()->prepare(
        'SELECT id, name, email, password_hash FROM admins WHERE email = :email LIMIT 1'
    );
    $statement->execute(['email' => strtolower(trim($email))]);
    $admin = $statement->fetch();

    if (!$admin || !password_verify($password, $admin['password_hash'])) {
        return false;
    }

    admin_session_start();
    session_regenerate_id(true);
    $_SESSION['admin'] = [
        'id' => (int) $admin['id'],
        'name' => $admin['name'],
        'email' => $admin['email'],
    ];

    if (password_needs_rehash($admin['password_hash'], PASSWORD_DEFAULT)) {
        $rehash = database_pdo()->prepare('UPDATE admins SET password_hash = :password_hash WHERE id = :id');
        $rehash->execute([
            'id' => $admin['id'],
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        ]);
    }

    return true;
}

function logout_admin(): void
{
    admin_session_start();
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $cookie = session_get_cookie_params();
        setcookie(session_name(), '', [
            'expires' => time() - 42000,
            'path' => $cookie['path'],
            'domain' => $cookie['domain'],
            'secure' => $cookie['secure'],
            'httponly' => $cookie['httponly'],
            'samesite' => $cookie['samesite'] ?? 'Lax',
        ]);
    }

    session_destroy();
}

function csrf_token(): string
{
    admin_session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrf_is_valid(?string $token): bool
{
    admin_session_start();
    return is_string($token)
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}

function require_valid_csrf(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_is_valid($_POST['csrf_token'] ?? null)) {
        http_response_code(403);
        exit('Permintaan tidak valid. Muat ulang halaman lalu coba kembali.');
    }
}
