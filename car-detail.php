<?php
require_once __DIR__ . '/data/cars.php';

$car_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$car = get_car_by_id($car_id);

if (!$car) {
    header('Location: cars.php');
    exit;
}

$page_title = $car['name'] . ' - Detail Spesifikasi & Tarif Sewa';
$active_nav = 'cars';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Breadcrumbs / Top Navigation -->
<div class="bg-white border-bottom py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="index.php" class="text-danger">Beranda</a></li>
                <li class="breadcrumb-item"><a href="cars.php" class="text-danger">Katalog Mobil</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($car['name']) ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Main Car Details Section -->
<section class="py-5" style="background: var(--gray-50);">
    <div class="container">
        <div class="row g-5">
            <!-- Left Column: Image, Description, Specs, Features -->
            <div class="col-lg-8">
                <!-- Main Car Image Card -->
                <div class="detail-main-img-box position-relative">
                    <span class="car-type-badge position-absolute" style="top: 20px; left: 20px;">
                        <?= htmlspecialchars($car['type']) ?>
                    </span>
                    <span class="car-status-pill car-status-available position-absolute" style="top: 20px; right: 20px;">
                        <i class="bi bi-check-circle-fill me-1"></i> Unit Tersedia
                    </span>
                    <img src="<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['name']) ?>" class="img-fluid">
                </div>

                <!-- Car Header Title & Badge -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-3 flex-wrap mb-2">
                        <h1 class="h2 fw-bold text-dark mb-0"><?= htmlspecialchars($car['name']) ?></h1>
                        <span class="badge bg-danger rounded-pill px-3 py-2"><?= htmlspecialchars($car['badge'] ?? 'Unit Prima') ?></span>
                    </div>
                    <p class="text-muted">
                        <i class="bi bi-tag-fill text-danger me-1"></i> Brand: <strong><?= htmlspecialchars($car['brand']) ?></strong>
                        <?php if (!empty($car['year'])): ?>
                            • Tahun Produksi: <strong><?= htmlspecialchars((string) $car['year']) ?></strong>
                        <?php endif; ?>
                        <?php if (!empty($car['color'])): ?>
                            • Warna: <strong><?= htmlspecialchars($car['color']) ?></strong>
                        <?php endif; ?>
                    </p>
                </div>

                <!-- 4 Quick Specs Grid -->
                <div class="row g-3 mb-5">
                    <div class="col-md-3 col-6">
                        <div class="spec-detail-pill">
                            <i class="bi bi-people-fill"></i>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem;">Kapasitas</small>
                                <strong class="text-dark"><?= $car['seats'] ?> Kursi</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="spec-detail-pill">
                            <i class="bi bi-gear-fill"></i>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem;">Transmisi</small>
                                <strong class="text-dark"><?= htmlspecialchars($car['transmission']) ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="spec-detail-pill">
                            <i class="bi bi-fuel-pump-fill"></i>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem;">Bahan Bakar</small>
                                <strong class="text-dark"><?= htmlspecialchars($car['fuel']) ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="spec-detail-pill">
                            <i class="bi bi-briefcase-fill"></i>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem;">Kapasitas Bagasi</small>
                                <strong class="text-dark"><?= !empty($car['luggage_capacity']) ? $car['luggage_capacity'] . ' Koper' : '—' ?></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Car Full Description -->
                <div class="card p-4 border-0 rounded-4 shadow-sm bg-white mb-4">
                    <h4 class="fw-bold text-dark mb-3">Deskripsi & Keunggulan Armada</h4>
                    <p class="text-muted" style="line-height: 1.8;">
                        <?= nl2br(htmlspecialchars($car['description'])) ?>
                    </p>
                </div>

                <!-- Features & Equipment Checklist -->
                <div class="card p-4 border-0 rounded-4 shadow-sm bg-white mb-4">
                    <h4 class="fw-bold text-dark mb-3">Fitur & Kelengkapan Kenyamanan</h4>
                    <div class="row g-3">
                        <?php foreach ($car['features'] as $feature): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                                    <span class="text-dark fw-medium"><?= htmlspecialchars($feature) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Terms & Facility -->
                <div class="rental-terms-box">
                    <h5 class="fw-bold text-dark mb-3">Ketentuan Sewa & Fasilitas Termasuk</h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold text-success mb-2"><i class="bi bi-check-lg"></i> Fasilitas Termasuk:</h6>
                            <ul class="list-unstyled small text-muted mb-0">
                                <li>✓ Unit bersih & wangi (disinfeksi sebelum serah terima)</li>
                                <li>✓ Servis berkala & kondisi ban prima</li>
                                <li>✓ Bantuan teknis & darurat jalanan 24 Jam</li>
                                <li>✓ Asuransi perlindungan armada standar</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold text-danger mb-2"><i class="bi bi-x-lg"></i> Tidak Termasuk (Opsional):</h6>
                            <ul class="list-unstyled small text-muted mb-0">
                                <li>✗ Bahan bakar (BBM) disesuaikan penggunaan</li>
                                <li>✗ Tarif tol & tiket parkir</li>
                                <li>✗ Uang makan supir (jika menggunakan supir luar kota)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Interactive Booking Calculator -->
            <div class="col-lg-4">
                <div class="booking-sidebar-card">
                    <span class="section-badge mb-2">Simulasi & Reservasi</span>
                    <h3 class="fw-bold text-dark mb-1"><?= get_car_price_label($car) ?></h3>
                    <?php if (!empty($car['price_per_day'])): ?>
                    <p class="text-muted small mb-4">Tarif dasar per hari (Lepas Kunci)</p>

                    <!-- Interactive Calculator -->
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Durasi Sewa (Hari)</label>
                        <div class="input-group">
                            <input type="number" id="calcDuration" class="form-control" value="1" min="1" max="30" data-price="<?= $car['price_per_day'] ?>" data-car-name="<?= htmlspecialchars($car['name']) ?>">
                            <span class="input-group-text bg-light text-muted">Hari</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-muted">Pilihan Layanan</label>
                        <select id="calcDriver" class="form-select">
                            <option value="self_drive" selected>Lepas Kunci (Tanpa Supir)</option>
                            <option value="with_driver">Dengan Supir (+Rp 150.000 / hari)</option>
                        </select>
                    </div>

                    <!-- Total Estimasi -->
                    <div class="p-3 bg-light rounded-3 mb-4 border">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="text-muted small">Estimasi Total Biaya:</span>
                            <span class="fs-4 fw-bold text-danger" id="calcTotalDisplay"><?= format_rupiah($car['price_per_day']) ?></span>
                        </div>
                        <span class="text-muted small" style="font-size: 0.72rem;">*Harga net, belum termasuk BBM & tol jika memakai supir</span>
                    </div>

                    <?php else: ?>
                    <p class="text-muted small mb-4">Hubungi admin untuk informasi harga dan ketersediaan unit.</p>
                    <?php endif; ?>

                    <!-- WhatsApp Booking CTA Button -->
                    <a id="calcWaBookingBtn" href="<?= build_whatsapp_link($car['name']) ?>" target="_blank" data-wa="<?= COMPANY_WHATSAPP ?>" class="btn-whatsapp-solid w-100 justify-content-center py-3 mb-3">
                        <i class="bi bi-whatsapp fs-5"></i> Pesan via WhatsApp Sekarang
                    </a>

                    <div class="text-center">
                        <a href="cars.php" class="text-muted small text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Kembali ke Katalog Mobil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
