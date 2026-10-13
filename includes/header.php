<?php
if (!defined('COMPANY_NAME')) {
    require_once __DIR__ . '/../data/cars.php';
}

$page_title = isset($page_title) ? $page_title . ' - ' . COMPANY_NAME : COMPANY_NAME . ' - ' . COMPANY_TAGLINE;
$active_nav = isset($active_nav) ? $active_nav : 'home';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="Layanan rental dan sewa mobil terpercaya di Depok & Jabodetabek. Armada lengkap Avanza, Innova, Xpander, Almaz, City, Freed, Terios. Lepas kunci & dengan supir.">
    <meta name="keywords" content="sewa mobil, rental mobil depok, prasetya rent car, sewa mobil murah, rental mobil jabodetabek, sewa innova, sewa avanza">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png?v=3">
    <link rel="shortcut icon" href="favicon.ico?v=3" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/favicon.png?v=3">



    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;850&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom Style System -->
    <link rel="stylesheet" href="assets/css/style.css?v=5">

</head>
<body>

    <!-- Header / Navbar Navigation -->
    <header class="custom-header-wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-brand-pill">
                <div class="container-fluid p-0">
                    <!-- Brand Logo -->
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/images/logo.png" alt="PT PRASETYA MULTICAR INDO" class="navbar-logo-img">
                        <span>PT PRASETYA MULTICAR INDO</span>
                    </a>


                    <!-- Hamburger Button -->
                    <button class="navbar-toggler border-0 shadow-none text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainContent" aria-controls="navbarMainContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list fs-1 text-white"></i>
                    </button>

                    <!-- Nav Links -->
                    <div class="collapse navbar-collapse" id="navbarMainContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-lg-center">
                            <li class="nav-item">
                                <a class="nav-link <?= ($active_nav === 'home') ? 'active' : '' ?>" href="index.php#beranda">
                                    <i class="bi bi-house-door d-lg-none me-1"></i> Beranda
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($active_nav === 'cars') ? 'active' : '' ?>" href="cars.php">
                                    <i class="bi bi-grid-fill d-lg-none me-1"></i> Katalog Armada
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($active_nav === 'about') ? 'active' : '' ?>" href="about.php">
                                    <i class="bi bi-info-circle d-lg-none me-1"></i> Tentang Kami
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($active_nav === 'contact') ? 'active' : '' ?>" href="contact.php">
                                    <i class="bi bi-telephone-fill d-lg-none me-1"></i> Kontak & Lokasi
                                </a>
                            </li>
                        </ul>

                        <!-- Right Action Button: Direct WhatsApp -->
                        <div class="d-flex align-items-center mt-3 mt-lg-0">
                            <a href="<?= build_whatsapp_link() ?>" target="_blank" class="btn-header-wa">
                                <i class="bi bi-whatsapp"></i> Chat WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
