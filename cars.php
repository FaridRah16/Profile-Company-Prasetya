<?php
require_once __DIR__ . '/data/cars.php';

$page_title = 'Katalog - PT PRASETYA MULTICAR INDO';
$active_nav = 'cars';
$all_cars = get_all_cars();

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner" style="background: linear-gradient(135deg, rgba(11, 17, 32, 0.92) 0%, rgba(15, 23, 42, 0.95) 100%), url('assets/images/hero-bg.jpg') center center / cover no-repeat;">
    <div class="container text-center">
        <span class="section-badge mb-2">Armada Lengkap</span>
        <h1 class="page-banner-title">Katalog Mobil <?= COMPANY_NAME ?></h1>
        <p class="text-danger-emphasis fw-bold text-uppercase mb-2" style="color: #fca5a5 !important; letter-spacing: 0.08em;">
            <?= COMPANY_LEGAL ?> · Unit Bersih & Terawat
        </p>
        <p class="page-banner-subtitle mx-auto">
            Temukan kendaraan ideal untuk keperluan bisnis, liburan keluarga, perjalanan dinas, maupun kegiatan harian Anda dengan tarif hemat bersahabat.
        </p>
    </div>
</section>


<!-- Filter & Search Controls -->
<section class="py-4 bg-white border-bottom">
    <div class="container">
        <div class="row align-items-center g-3">
            <!-- Filter Type Buttons -->
            <div class="col-lg-8">
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn filter-type-btn active btn-primary-red" data-type="all">
                        Semua Unit (<?= count($all_cars) ?>)
                    </button>
                    <button type="button" class="btn filter-type-btn btn-outline-dark-custom" data-type="MPV">
                        MPV Keluarga
                    </button>
                    <button type="button" class="btn filter-type-btn btn-outline-dark-custom" data-type="SUV">
                        SUV Tangguh
                    </button>
                    <button type="button" class="btn filter-type-btn btn-outline-dark-custom" data-type="Hatchback">
                        City Car / Hatchback
                    </button>
                </div>
            </div>

            <!-- Search Box -->
            <div class="col-lg-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="carSearchInput" class="form-control border-start-0 ps-0" placeholder="Cari nama mobil, tipe, atau transmisi...">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cars Catalog Grid -->
<section class="py-5" style="background: var(--gray-50);">
    <div class="container">
        <!-- Alert if no cars match search -->
        <div id="noCarsFoundAlert" class="alert alert-warning text-center py-4 rounded-4" style="display: none;">
            <i class="bi bi-exclamation-triangle-fill fs-3 mb-2 d-block"></i>
            <h5 class="fw-bold">Tidak ada armada yang sesuai dengan pencarian Anda.</h5>
            <p class="mb-0 text-muted">Silakan coba kata kunci lain atau pilih kategori "Semua Unit".</p>
        </div>

        <div class="row g-4" id="carCatalogContainer">
            <?php foreach ($all_cars as $car): ?>
                <div class="col-lg-4 col-md-6 car-catalog-item" data-type="<?= htmlspecialchars($car['type']) ?>" data-name="<?= htmlspecialchars($car['name']) ?> <?= htmlspecialchars($car['brand']) ?> <?= htmlspecialchars($car['transmission']) ?>">
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

                            <!-- Car Title & Quick Specifications -->
                            <div class="car-title-box">
                                <h3><?= htmlspecialchars($car['name']) ?></h3>
                                <div class="car-specs-grid" aria-label="Spesifikasi <?= htmlspecialchars($car['name']) ?>">
                                    <div class="spec-cell">
                                        <div class="spec-icon"><i class="bi bi-people-fill"></i></div>
                                        <div class="spec-meta">
                                            <span class="val"><?= $car['seats'] ?> Seater</span>
                                        </div>
                                    </div>
                                    <div class="spec-cell">
                                        <div class="spec-icon"><i class="bi bi-gear-fill"></i></div>
                                        <div class="spec-meta">
                                            <span class="val"><?= htmlspecialchars($car['transmission']) ?></span>
                                        </div>
                                    </div>
                                    <div class="spec-cell">
                                        <div class="spec-icon"><i class="bi bi-fuel-pump-fill"></i></div>
                                        <div class="spec-meta">
                                            <span class="val"><?= htmlspecialchars($car['fuel']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                        <!-- Footer Actions -->
                        <div class="car-footer-actions">
                            <div class="car-price-unit">
                                <span class="amount"><?= get_car_price_label($car) ?></span>
                                <?php if (!empty($car['price_per_day'])): ?>
                                    <span class="sub">/day</span>
                                <?php endif; ?>
                            </div>
                            <div class="car-buttons-group">
                                <a href="car-detail.php?id=<?= $car['id'] ?>" class="btn-card-detail">
                                    Lihat Detail <i class="bi bi-arrow-right"></i>
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
    </div>
</section>

<!-- Persyaratan Rental Mobil -->
<section class="py-5 border-top" style="background: #f4f5f8;">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="section-badge">Informasi Penting</span>
            <h2 class="section-title">Persyaratan Rental Mobil</h2>
            <p class="section-subtitle">Siapkan dokumen sesuai jenis layanan yang Anda pilih.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6">
                <article class="card h-100 p-4 p-md-5 rounded-4 shadow-sm" style="border: 2px solid #e8ef27;">
                    <h3 class="h4 fw-bold mb-3" style="color: #273b7a;">Syarat Rental Mobil untuk Perusahaan</h3>
                    <p class="text-muted mb-3">Syarat menggunakan layanan rental mobil bulanan untuk perusahaan:</p>
                    <ul class="list-unstyled d-grid gap-2 mb-4">
                        <li><i class="bi bi-check-circle-fill text-danger me-2"></i><em>Softcopy</em> akta perusahaan</li>
                        <li><i class="bi bi-check-circle-fill text-danger me-2"></i>NIB (Nomor Induk Berusaha)</li>
                        <li><i class="bi bi-check-circle-fill text-danger me-2"></i>NPWP perusahaan</li>
                        <li><i class="bi bi-check-circle-fill text-danger me-2"></i>Domisili perusahaan</li>
                    </ul>

                    <h4 class="h6 fw-bold text-dark mb-2">Untuk identitas penyewa:</h4>
                    <ul class="list-unstyled d-grid gap-2 mb-0">
                        <li><i class="bi bi-person-check-fill text-danger me-2"></i>KTP penyewa</li>
                        <li><i class="bi bi-person-check-fill text-danger me-2"></i>KTP penjamin dari perusahaan</li>
                        <li><i class="bi bi-person-check-fill text-danger me-2"></i>SIM pengguna kendaraan</li>
                    </ul>
                </article>
            </div>

            <div class="col-lg-6">
                <article class="card h-100 p-4 p-md-5 rounded-4 shadow-sm" style="border: 2px solid #e8ef27;">
                    <h3 class="h4 fw-bold mb-3" style="color: #273b7a;">Syarat Rental Mobil Lepas Kunci untuk Perorangan</h3>
                    <p class="text-muted mb-3">Lengkapi dokumen berikut untuk menggunakan layanan rental mobil:</p>

                    <h4 class="h6 fw-bold text-dark mb-2">Foto dokumen:</h4>
                    <ul class="list-unstyled d-grid gap-2 mb-4">
                        <li><i class="bi bi-card-checklist text-danger me-2"></i>Dokumen penyewa (KTP, SIM A, PBB jika ada, KK atau buku nikah)</li>
                        <li><i class="bi bi-card-checklist text-danger me-2"></i>Dokumen penjamin (KTP), jika diperlukan</li>
                    </ul>

                    <h4 class="h6 fw-bold text-dark mb-2">Jaminan yang diserahkan kepada kami:</h4>
                    <ul class="list-unstyled d-grid gap-2 mb-4">
                        <li><i class="bi bi-shield-check text-danger me-2"></i>Kendaraan (motor beserta STNK) minimal tahun 2018; atau</li>
                        <li><i class="bi bi-shield-check text-danger me-2"></i>Deposit minimal Rp 2 juta</li>
                    </ul>

                    <p class="text-muted mb-0"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Bersedia disurvei (khusus pelanggan baru).</p>
                </article>
            </div>
        </div>

        <div class="card p-4 border-0 rounded-4 shadow-sm mt-4" style="background: var(--brand-red-soft);">
            <div class="row align-items-center g-3">
                <div class="col-lg">
                    <h3 class="h5 fw-bold mb-1 text-dark">Ada pertanyaan tentang persyaratan?</h3>
                    <p class="text-muted small mb-0">Hubungi admin untuk konsultasi pilihan armada dan proses penyewaan.</p>
                </div>
                <div class="col-lg-auto">
                    <a href="<?= build_whatsapp_link() ?>" target="_blank" class="btn-whatsapp-solid text-center justify-content-center">
                        <i class="bi bi-whatsapp"></i> Chat Admin Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
