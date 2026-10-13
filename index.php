<?php
require_once __DIR__ . '/data/cars.php';

$page_title = 'Beranda - PT PRASETYA MULTICAR INDO | ' . COMPANY_NAME;
$active_nav = 'home';
$featured_cars = get_featured_cars(6);
$services = get_company_services();

require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section with User Fleet Photo Background -->
<section class="hero-home">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-9 col-xl-8">
                <h1 class="hero-title mb-2">
                    <?= COMPANY_NAME ?>
                </h1>

                <p class="text-danger-emphasis fw-bold text-uppercase mb-3" style="letter-spacing: 0.1em; color: #fca5a5 !important; font-size: 1.05rem;">
                    <i class="bi bi-calendar-check text-danger me-1"></i> Berdiri sejak <?= COMPANY_ESTABLISHED ?> · <?= COMPANY_CATEGORY ?>
                </p>

                <p class="hero-subtitle mb-4">
                    Prasetya Rent Car merupakan usaha yang bergerak di bidang jasa penyewaan kendaraan roda empat sejak tahun 2022. Berlokasi di Jalan Simpang 5 Pondok Petir, Sawangan, Depok, hadir memberikan solusi transportasi terbaik untuk kebutuhan pribadi, keluarga, maupun perusahaan.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="cars.php" class="btn-primary-red">
                        <i class="bi bi-car-front-fill"></i> Lihat Katalog Mobil
                    </a>
                    <a href="<?= build_whatsapp_link() ?>" target="_blank" class="btn-whatsapp-solid">
                        <i class="bi bi-whatsapp"></i> Chat WhatsApp Admin
                    </a>
                </div>
            </div>
        </div>


    </div>
</section>

<!-- Section 1: Profil Perusahaan Lengkap -->
<section class="py-5 bg-white" id="profil-perusahaan">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="section-badge">Tentang Kami</span>
                <h2 class="section-title mb-3">
                    Profil Perusahaan
                </h2>
                <h4 class="fw-bold text-danger mb-3" style="font-size: 1.25rem;">
                    <?= COMPANY_LEGAL ?> (<?= COMPANY_NAME ?>)
                </h4>
                <p class="text-muted" style="line-height: 1.85; font-size: 1rem;">
                    <strong>Prasetya Rent Car</strong> merupakan usaha yang bergerak di bidang jasa penyewaan kendaraan roda empat sejak tahun 2022. Berlokasi di Jalan Simpang 5 Pondok Petir, Sawangan, Depok, Prasetya Rent Car hadir untuk memenuhi kebutuhan transportasi masyarakat, keluarga, maupun perusahaan.
                </p>
                <p class="text-muted" style="line-height: 1.85; font-size: 1rem;">
                    Dengan mengutamakan pelayanan yang profesional, kenyamanan, dan kepercayaan, kami berkomitmen untuk memberikan solusi transportasi yang sesuai dengan kebutuhan pelanggan, baik untuk keperluan pribadi, perjalanan bisnis, maupun berbagai aktivitas lainnya.
                </p>

                <div class="row g-3 mt-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 p-2 bg-light rounded-3">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <span class="small fw-bold">Pelayanan Profesional</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 p-2 bg-light rounded-3">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <span class="small fw-bold">Kenyamanan Maksimal</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 p-2 bg-light rounded-3">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <span class="small fw-bold">Kepercayaan Pelanggan</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 p-2 bg-light rounded-3">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <span class="small fw-bold">Solusi Fleksibel</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="assets/images/hero-bg.jpg" alt="Armada PT Prasetya Multicar Indo" class="img-fluid rounded-4 shadow-lg border" style="object-fit: cover; width: 100%; max-height: 420px;">
                    <div class="position-absolute bottom-0 start-0 p-3 m-3 bg-dark bg-opacity-75 text-white rounded-3 backdrop-blur" style="max-width: 80%;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-fill-check text-danger fs-4"></i>
                            <div>
                                <h6 class="mb-0 fw-bold"><?= COMPANY_NAME ?></h6>
                                <small class="text-white-50">Berdiri sejak 2022 · Jasa Rental Mobil</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Layanan Perusahaan (Gambar Kedua) -->
<section class="py-5" style="background-color: var(--gray-50);">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Solusi Transportasi</span>
            <h2 class="section-title">Layanan Perusahaan</h2>
            <p class="section-subtitle">
                Pilihan layanan rental mobil fleksibel yang dirancang khusus untuk kenyamanan pribadi maupun produktivitas perusahaan Anda.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($services as $srv): ?>
                <div class="col-lg-6">
                    <div class="service-card-horizontal">
                        <div class="service-icon-box <?= $srv['color'] ?>">
                            <i class="bi <?= $srv['icon'] ?>"></i>
                        </div>
                        <div class="service-content-box">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <h4><?= htmlspecialchars($srv['title']) ?></h4>
                                <span class="badge bg-light text-dark rounded-pill px-2 py-1 small fw-bold border"><?= htmlspecialchars($srv['badge']) ?></span>
                            </div>
                            <p><?= htmlspecialchars($srv['desc']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section: Komitmen Pelayanan -->
<section class="py-5 bg-white">

    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="commitment-card">
                    <div class="row align-items-center g-4">
                        <div class="col-md-2 text-center text-md-start">
                            <div class="feature-icon-wrapper icon-red mx-auto mx-md-0" style="width: 65px; height: 65px; font-size: 2rem;">
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <span class="section-badge mb-1">Integritas & Dedikasi</span>
                            <h3 class="fw-bold text-dark mb-3">Komitmen Pelayanan</h3>
                            <p class="text-muted mb-3" style="line-height: 1.85;">
                                <strong>Prasetya Rent Car</strong> percaya bahwa kepuasan pelanggan merupakan fondasi utama dalam membangun usaha yang berkelanjutan. Oleh karena itu, kami berkomitmen untuk memberikan pelayanan yang bertanggung jawab serta membangun hubungan kerja sama yang didasari oleh kepercayaan dan profesionalisme.
                            </p>
                            <p class="text-muted mb-0" style="line-height: 1.85;">
                                Kami berharap dapat menjadi mitra transportasi yang dapat diandalkan untuk mendukung kebutuhan perjalanan pribadi maupun kegiatan bisnis pelanggan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Armada Mobil Unggulan (Katalog) -->
<section class="py-5" style="background-color: var(--gray-50);">

    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Armada Pilihan</span>
            <h2 class="section-title">Armada Mobil Unggulan</h2>
            <p class="section-subtitle">
                Kendaraan prima yang selalu terawat berkala dengan standar kebersihan higienis, siap menemani setiap momen mobilitas Anda.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($featured_cars as $car): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="car-card-modern">
                        <div>
                            <!-- Car Image with Status & Badge -->
                            <div class="car-image-container">
                                <span class="car-type-badge"><?= htmlspecialchars($car['type']) ?></span>
                                <span class="car-status-pill car-status-available">
                                    <i class="bi bi-check-circle-fill me-1"></i> Tersedia
                                </span>
                                <img src="<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['name']) ?>" loading="lazy">
                            </div>

                            <!-- Car Title & Meta -->
                            <div class="car-title-box">
                                <h3><?= htmlspecialchars($car['name']) ?></h3>
                                <div class="car-meta-subtitle">
                                    <i class="bi bi-tag-fill text-danger"></i> <?= htmlspecialchars($car['brand']) ?> • Tahun <?= $car['year'] ?>
                                    <span class="badge bg-danger-subtle text-danger ms-auto"><?= htmlspecialchars($car['badge'] ?? 'Unit Prima') ?></span>
                                </div>
                            </div>

                            <!-- Specs Grid -->
                            <div class="car-specs-grid">
                                <div class="spec-cell">
                                    <div class="spec-icon"><i class="bi bi-people-fill"></i></div>
                                    <div class="spec-meta">
                                        <span class="lbl">Kapasitas</span>
                                        <span class="val"><?= $car['seats'] ?> Kursi</span>
                                    </div>
                                </div>
                                <div class="spec-cell">
                                    <div class="spec-icon"><i class="bi bi-gear-fill"></i></div>
                                    <div class="spec-meta">
                                        <span class="lbl">Transmisi</span>
                                        <span class="val"><?= htmlspecialchars($car['transmission']) ?></span>
                                    </div>
                                </div>
                                <div class="spec-cell">
                                    <div class="spec-icon"><i class="bi bi-fuel-pump-fill"></i></div>
                                    <div class="spec-meta">
                                        <span class="lbl">Bahan Bakar</span>
                                        <span class="val"><?= htmlspecialchars($car['fuel']) ?></span>
                                    </div>
                                </div>
                                <div class="spec-cell">
                                    <div class="spec-icon"><i class="bi bi-briefcase-fill"></i></div>
                                    <div class="spec-meta">
                                        <span class="lbl">Bagasi</span>
                                        <span class="val"><?= $car['luggage_capacity'] ?> Koper</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="car-footer-actions">
                            <div class="car-price-unit">
                                <span class="amount"><?= format_rupiah($car['price_per_day']) ?></span>
                                <span class="sub">/ 24 Jam</span>
                            </div>
                            <div class="car-buttons-group">
                                <a href="car-detail.php?id=<?= $car['id'] ?>" class="btn-card-detail">
                                    Detail <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="<?= build_whatsapp_link($car['name']) ?>" target="_blank" class="btn-card-wa" title="Sewa via WhatsApp">
                                    <i class="bi bi-whatsapp"></i> Sewa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="cars.php" class="btn-outline-dark-custom">
                Lihat Semua Armada Mobil (<?= count($cars) ?> Unit) <i class="bi bi-chevron-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section 6: Cara Pemesanan Praktis -->
<section class="py-5" style="background-color: var(--gray-50);">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Proses Cepat</span>
            <h2 class="section-title">Cara Pemesanan Praktis</h2>
            <p class="section-subtitle">Hanya butuh 3 langkah mudah tanpa formulir rumit atau login akun.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="step-item-card">
                    <div class="step-number-tag">1</div>
                    <div class="step-icon-large text-danger">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pilih Mobil Impian</h5>
                    <p class="text-muted small mb-0">
                        Telusuri katalog armada kami dan pilih kendaraan yang sesuai dengan kapasitas serta preferensi perjalanan Anda.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="step-item-card">
                    <div class="step-number-tag">2</div>
                    <div class="step-icon-large text-danger">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Hubungi Admin WhatsApp</h5>
                    <p class="text-muted small mb-0">
                        Klik tombol WhatsApp otomatis, informasikan tanggal sewa, durasi, dan pilihan layanan (Lepas Kunci / Dengan Supir).
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="step-item-card">
                    <div class="step-number-tag">3</div>
                    <div class="step-icon-large text-danger">
                        <i class="bi bi-key-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Konfirmasi & Jalan!</h5>
                    <p class="text-muted small mb-0">
                        Lakukan verifikasi syarat sederhana, unit siap diantar langsung ke lokasi Anda atau diambil di pool kami.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: Call to Action Banner -->
<section class="py-5 bg-white">
    <div class="container py-2">
        <div class="cta-banner-wrapper text-center">
            <div class="position-relative" style="z-index: 2;">
                <h2 class="text-white fw-bold mb-3" style="font-size: 2.3rem;">Butuh Solusi Transportasi Terpercaya?</h2>
                <p class="text-white-50 mb-4" style="max-width: 650px; margin: 0 auto; font-size: 1.1rem;">
                    Hubungi tim <strong><?= COMPANY_NAME ?></strong> sekarang untuk konsultasi armada, sewa harian, bulanan, maupun kerja sama perusahaan.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= build_whatsapp_link() ?>" target="_blank" class="btn-whatsapp-solid">
                        <i class="bi bi-whatsapp"></i> Chat WhatsApp Sekarang
                    </a>
                    <a href="cars.php" class="btn-secondary-dark">
                        <i class="bi bi-grid-fill"></i> Telusuri Katalog Mobil
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
