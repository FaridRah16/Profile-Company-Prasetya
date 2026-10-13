<?php
require_once __DIR__ . '/data/cars.php';

$page_title = 'Tentang Kami - ' . COMPANY_LEGAL . ' (' . COMPANY_NAME . ')';
$active_nav = 'about';
$services = get_company_services();

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner" style="background: linear-gradient(135deg, rgba(11, 17, 32, 0.92) 0%, rgba(15, 23, 42, 0.95) 100%), url('assets/images/hero-bg.jpg') center center / cover no-repeat;">
    <div class="container text-center">
        <span class="section-badge mb-2">Tentang Kami</span>
        <h1 class="page-banner-title"><?= COMPANY_LEGAL ?></h1>

        <p class="text-danger-emphasis fw-bold text-uppercase mb-2" style="color: #fca5a5 !important; letter-spacing: 0.08em;">
            <?= COMPANY_NAME ?> · Berdiri sejak <?= COMPANY_ESTABLISHED ?> · <?= COMPANY_CATEGORY ?>
        </p>
        <p class="page-banner-subtitle mx-auto">
            Mengenal lebih dekat dedikasi dan komitmen kami dalam menghadirkan solusi transportasi roda empat yang profesional, nyaman, dan terpercaya.
        </p>
    </div>
</section>

<!-- Profil Perusahaan Lengkap -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="section-badge">Tentang Usaha</span>
                <h2 class="section-title mb-3">Profil Perusahaan</h2>
                <h4 class="fw-bold text-danger mb-4" style="font-size: 1.25rem;">
                    <?= COMPANY_LEGAL ?> (<?= COMPANY_NAME ?>)
                </h4>

                <p class="text-muted" style="line-height: 1.85; font-size: 1.02rem;">
                    <strong>Prasetya Rent Car</strong> merupakan usaha yang bergerak di bidang jasa penyewaan kendaraan roda empat sejak tahun 2022. Berlokasi di Jalan Simpang 5 Pondok Petir, Sawangan, Depok, Prasetya Rent Car hadir untuk memenuhi kebutuhan transportasi masyarakat, keluarga, maupun perusahaan.
                </p>

                <p class="text-muted" style="line-height: 1.85; font-size: 1.02rem;">
                    Dengan mengutamakan pelayanan yang profesional, kenyamanan, dan kepercayaan, kami berkomitmen untuk memberikan solusi transportasi yang sesuai dengan kebutuhan pelanggan, baik untuk keperluan pribadi, perjalanan bisnis, maupun berbagai aktivitas lainnya.
                </p>

                <div class="d-flex flex-wrap gap-4 mt-4 pt-3 border-top">
                    <div>
                        <h4 class="fw-bold text-danger mb-0">2022</h4>
                        <small class="text-muted">Tahun Berdiri</small>
                    </div>
                    <div class="border-start ps-4">
                        <h4 class="fw-bold text-danger mb-0">Sawangan, Depok</h4>
                        <small class="text-muted">Lokasi Pool & Kantor</small>
                    </div>
                    <div class="border-start ps-4">
                        <h4 class="fw-bold text-danger mb-0">24 Jam</h4>
                        <small class="text-muted">Layanan Nonstop</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="assets/images/hero-bg.jpg" alt="Armada PT Prasetya Multicar Indo" class="img-fluid rounded-4 shadow-lg border" style="object-fit: cover; width: 100%;">
                    <div class="position-absolute bottom-0 start-0 p-3 m-3 bg-dark bg-opacity-75 text-white rounded-3" style="max-width: 85%;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check text-danger fs-3"></i>
                            <div>
                                <h6 class="mb-0 fw-bold"><?= COMPANY_LEGAL ?></h6>
                                <small class="text-white-50">Pelayanan Profesional · Kenyamanan · Kepercayaan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Perusahaan (Gambar Kedua) -->
<section class="py-5" style="background-color: var(--gray-50);">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Solusi Transportasi</span>
            <h2 class="section-title">Layanan Perusahaan</h2>
            <p class="section-subtitle">
                Ragam pilihan layanan fleksibel dari Prasetya Rent Car untuk memenuhi kebutuhan pribadi maupun instansi.
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

<!-- Visi dan Misi -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="section-badge">Landasan Nilai</span>
            <h2 class="section-title">Visi dan Misi</h2>
            <p class="section-subtitle">Arah dan langkah nyata kami dalam membangun layanan transportasi yang unggul dan berkelanjutan.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <!-- Visi Card -->
            <div class="col-lg-5">
                <div class="vision-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="feature-icon-wrapper icon-red mb-0" style="width: 55px; height: 55px; font-size: 1.6rem;">
                                <i class="bi bi-eye-fill"></i>
                            </div>
                            <div>
                                <span class="badge bg-danger rounded-pill px-3 py-1 mb-1">Pandangan ke Depan</span>
                                <h3 class="text-white fw-bold mb-0">Visi Kami</h3>
                            </div>
                        </div>
                        <p class="lead text-white" style="line-height: 1.85; font-size: 1.15rem; font-weight: 500;">
                            "Menjadi penyedia jasa rental mobil yang terpercaya, profesional, dan kompetitif dalam memenuhi kebutuhan transportasi masyarakat serta dunia usaha."
                        </p>
                    </div>

                    <div class="pt-4 border-top border-secondary mt-4">
                        <div class="d-flex align-items-center gap-2 text-white-50 small">
                            <i class="bi bi-check-circle text-danger"></i>
                            <span>Terpercaya · Profesional · Kompetitif</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Misi Card (5 Poin Misi) -->
            <div class="col-lg-7">
                <div class="mission-card">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="feature-icon-wrapper icon-blue mb-0" style="width: 55px; height: 55px; font-size: 1.6rem;">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <div>
                            <span class="badge bg-primary rounded-pill px-3 py-1 mb-1">Rencana Strategis</span>
                            <h3 class="text-dark fw-bold mb-0">Misi Kami</h3>
                        </div>
                    </div>

                    <div class="mission-item-box">
                        <div class="mission-number">1</div>
                        <div class="mission-text">
                            Memberikan pelayanan rental mobil yang berkualitas dan berorientasi pada kepuasan pelanggan.
                        </div>
                    </div>

                    <div class="mission-item-box">
                        <div class="mission-number">2</div>
                        <div class="mission-text">
                            Menyediakan solusi transportasi yang fleksibel sesuai kebutuhan pelanggan.
                        </div>
                    </div>

                    <div class="mission-item-box">
                        <div class="mission-number">3</div>
                        <div class="mission-text">
                            Mengutamakan keamanan, kenyamanan, dan kelayakan kendaraan.
                        </div>
                    </div>

                    <div class="mission-item-box">
                        <div class="mission-number">4</div>
                        <div class="mission-text">
                            Membangun hubungan kerja sama yang profesional dengan pelanggan individu, perusahaan, dan instansi.
                        </div>
                    </div>

                    <div class="mission-item-box">
                        <div class="mission-number">5</div>
                        <div class="mission-text">
                            Mengembangkan usaha secara berkelanjutan melalui peningkatan kualitas pelayanan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Komitmen Pelayanan -->
<section class="py-5" style="background-color: var(--gray-50);">
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
                            <span class="section-badge mb-1">Fondasi Usaha</span>
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

<!-- Call to Action Banner -->
<section class="py-5 bg-white">
    <div class="container py-2">
        <div class="cta-banner-wrapper text-center">
            <div class="position-relative" style="z-index: 2;">
                <h2 class="text-white fw-bold mb-3" style="font-size: 2.3rem;">Bermitra Bersama <?= COMPANY_NAME ?></h2>
                <p class="text-white-50 mb-4" style="max-width: 650px; margin: 0 auto; font-size: 1.1rem;">
                    Dapatkan solusi armada terbaik untuk pribadi, keluarga, maupun kontrak kerja sama perusahaan Anda.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= build_whatsapp_link() ?>" target="_blank" class="btn-whatsapp-solid">
                        <i class="bi bi-whatsapp"></i> Hubungi Kami via WhatsApp
                    </a>
                    <a href="cars.php" class="btn-secondary-dark">
                        <i class="bi bi-car-front-fill"></i> Lihat Pilihan Armada
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
