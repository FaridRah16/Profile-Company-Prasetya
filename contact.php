<?php
require_once __DIR__ . '/data/cars.php';

$page_title = 'Kontak - PT PRASETYA MULTICAR INDO';
$active_nav = 'contact';
$all_cars = get_all_cars();

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner" style="background: linear-gradient(135deg, rgba(11, 17, 32, 0.92) 0%, rgba(15, 23, 42, 0.95) 100%), url('assets/images/hero-bg.jpg') center center / cover no-repeat;">
    <div class="container text-center">
        <span class="section-badge mb-2">Pusat Layanan</span>
        <h1 class="page-banner-title"><?= COMPANY_LEGAL ?></h1>
        <p class="text-danger-emphasis fw-bold text-uppercase mb-2" style="color: #fca5a5 !important; letter-spacing: 0.08em;">
            <?= COMPANY_NAME ?> · Berdiri sejak <?= COMPANY_ESTABLISHED ?> · <?= COMPANY_CATEGORY ?>
        </p>
        <p class="page-banner-subtitle mx-auto">
            Tim layanan pelanggan kami siap melayani pertanyaan ketersediaan armada, konsultasi rute, dan reservasi rental mobil 24 jam nonstop.
        </p>
    </div>
</section>


<!-- Contact Info Grid & Form Section -->
<section class="py-5" style="background: var(--gray-50);">
    <div class="container py-3">
        <div class="row g-5">
            <!-- Left: Contact Cards & Info -->
            <div class="col-lg-5">
                <span class="section-badge mb-2">Informasi Kontak</span>
                <h2 class="h3 fw-bold text-dark mb-4">Saluran Komunikasi Resmi</h2>

                <!-- Address Card -->
                <div class="card p-3 border-0 rounded-4 shadow-sm bg-white mb-3">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon-wrapper icon-red mb-0" style="width: 46px; height: 46px; font-size: 1.3rem;">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Alamat Kantor & Pool Armada</h6>
                            <p class="text-muted small mb-0"><?= COMPANY_ADDRESS ?></p>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp & Phone Card -->
                <div class="card p-3 border-0 rounded-4 shadow-sm bg-white mb-3">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon-wrapper icon-green mb-0" style="width: 46px; height: 46px; font-size: 1.3rem;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">WhatsApp & Call Center</h6>
                            <p class="text-muted small mb-1"><?= COMPANY_PHONE ?></p>
                            <a href="<?= build_whatsapp_link() ?>" target="_blank" class="text-success small fw-bold text-decoration-none">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Buka Chat WhatsApp Langsung
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="card p-3 border-0 rounded-4 shadow-sm bg-white mb-3">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon-wrapper icon-blue mb-0" style="width: 46px; height: 46px; font-size: 1.3rem;">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Email Resmi</h6>
                            <p class="text-muted small mb-0"><?= COMPANY_EMAIL ?></p>
                        </div>
                    </div>
                </div>

                <!-- Hours Card -->
                <div class="card p-3 border-0 rounded-4 shadow-sm bg-white mb-4">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon-wrapper icon-amber mb-0" style="width: 46px; height: 46px; font-size: 1.3rem;">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Jam Operasional</h6>
                            <p class="text-muted small mb-0"><?= COMPANY_HOURS ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Direct WhatsApp Interactive Form -->
            <div class="col-lg-7">
                <div class="card p-4 p-md-5 border-0 rounded-4 shadow-sm bg-white">
                    <span class="section-badge mb-2">Formulir Pesan</span>
                    <h3 class="fw-bold text-dark mb-2">Kirim Pesan ke Admin</h3>
                    <p class="text-muted small mb-4">
                        Isi form singkat ini untuk langsung terhubung dengan admin kami melalui WhatsApp dengan format pesan otomatis yang rapi.
                    </p>

                    <form id="contactFormDirect" data-wa="<?= COMPANY_WHATSAPP ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="cfName" class="form-label small fw-bold text-muted">Nama Lengkap</label>
                                <input type="text" class="form-control" id="cfName" placeholder="Contoh: Budi Santoso" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cfPhone" class="form-label small fw-bold text-muted">Nomor WhatsApp / HP</label>
                                <input type="tel" class="form-control" id="cfPhone" placeholder="Contoh: 081234567890" required>
                            </div>
                            <div class="col-12">
                                <label for="cfCar" class="form-label small fw-bold text-muted">Pilihan Armada yang Diminati (Opsional)</label>
                                <select class="form-select" id="cfCar">
                                    <option value="" selected>-- Pilih Mobil (Bisa Dikosongkan) --</option>
                                    <?php foreach ($all_cars as $c): ?>
                                        <option value="<?= htmlspecialchars($c['name']) ?>"><?= htmlspecialchars($c['name']) ?> (<?= format_rupiah($c['price_per_day']) ?>/hari)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="cfMessage" class="form-label small fw-bold text-muted">Pesan / Pertanyaan / Jadwal Sewa</label>
                                <textarea class="form-control" id="cfMessage" rows="4" placeholder="Tuliskan tanggal sewa yang diinginkan, rute perjalanan, atau pertanyaan Anda..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn-whatsapp-solid w-100 justify-content-center py-3">
                                    <i class="bi bi-whatsapp fs-5"></i> Kirim Pesan via WhatsApp Sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps Embed Section -->
<section class="py-5 bg-white border-top">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-badge">Lokasi Pool & Kantor</span>
            <h3 class="fw-bold text-dark">Peta Lokasi Kami</h3>
            <p class="text-muted small">Jl. Simpang 5, Pondok Petir, Bojongsari, Kota Depok</p>
        </div>
        <div class="rounded-4 overflow-hidden shadow-sm border" style="height: 400px;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1631.5300392910078!2d106.72206137898856!3d-6.363292899540989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef0006e77937%3A0x5f52f51ff5e128a2!2sPrasetya%20Rent%20Car!5e1!3m2!1sen!2sid!4v1791908975732!5m2!1sen!2sid" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                title="Lokasi Prasetya Rent Car di Google Maps"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="strict-origin-when-cross-origin">
            </iframe>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
