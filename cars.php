<?php
require_once __DIR__ . '/data/cars.php';

$page_title = 'Katalog Armada Mobil Lengkap';
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

                            <p class="text-muted small mb-3" style="line-height: 1.6;">
                                <?= htmlspecialchars(mb_strimwidth($car['description'], 0, 115, '...')) ?>
                            </p>
                        </div>

                        <!-- Footer Actions -->
                        <div class="car-footer-actions">
                            <div class="car-price-unit">
                                <span class="amount"><?= format_rupiah($car['price_per_day']) ?></span>
                                <span class="sub">/ 24 Jam</span>
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

<!-- Syarat & Ketentuan Sewa Singkat -->
<section class="py-5 bg-white border-top">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <span class="section-badge">Informasi Penting</span>
                <h3 class="fw-bold mb-3">Persyaratan Sewa Mudah & Fleksibel</h3>
                <p class="text-muted">
                    Kami memprioritaskan kemudahan dan kenyamanan pelanggan tanpa prosedur birokrasi berbelit-belit.
                </p>
                <div class="d-flex flex-column gap-2 mt-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check2-circle text-danger fs-5"></i>
                        <span><strong>Lepas Kunci:</strong> Cukup e-KTP, SIM A aktif, & verifikasi akun media sosial / deposit.</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check2-circle text-danger fs-5"></i>
                        <span><strong>Dengan Supir:</strong> Cukup share lokasi penjemputan dan jadwal perjalanan Anda.</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check2-circle text-danger fs-5"></i>
                        <span><strong>Antar Jemput Unit:</strong> Siap diantar ke bandara (Soekarno Hatta / Halim) atau alamat rumah.</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card p-4 border-0 rounded-4 shadow-sm" style="background: var(--brand-red-soft);">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <i class="bi bi-whatsapp fs-1 text-danger"></i>
                        <div>
                            <h5 class="fw-bold mb-1 text-dark">Konsultasi Unit Armada?</h5>
                            <p class="text-muted small mb-0">Hubungi tim kami untuk rekomendasi mobil yang paling cocok untuk rute Anda.</p>
                        </div>
                    </div>
                    <a href="<?= build_whatsapp_link() ?>" target="_blank" class="btn-whatsapp-solid text-center justify-content-center">
                        <i class="bi bi-whatsapp"></i> Chat Admin Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
