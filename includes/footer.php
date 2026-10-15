<?php
if (!defined('COMPANY_NAME')) {
    require_once __DIR__ . '/../data/cars.php';
}
?>
    <!-- Footer Section -->
    <footer class="footer-main">
        <div class="container">
            <div class="row g-4">
                <!-- Col 1: Brand Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img src="assets/images/logo.png" alt="PT PRASETYA MULTICAR INDO" class="navbar-logo-img">
                        <h4 class="text-white mb-0">PT PRASETYA MULTICAR INDO</h4>
                    </div>

                    <p class="text-white small pe-lg-4">
                        Penyedia layanan rental mobil terpercaya di wilayah Depok, Jakarta, Bogor, Tangerang, dan Bekasi. Hadir dengan armada terawat, bersih, wangi, dan jaminan kenyamanan perjalanan prima.
                    </p>
                    <div class="d-flex gap-2 mt-4">
                        <a href="<?= build_whatsapp_link() ?>" target="_blank" class="btn btn-sm btn-outline-light rounded-circle p-2" title="WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://www.instagram.com/prasetya.rent.car/" target="_blank" class="btn btn-sm btn-outline-light rounded-circle p-2" title="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@prasetya.rent.car" target="_blank" class="btn btn-sm btn-outline-light rounded-circle p-2" title="Tiktok">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Navigation Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Navigasi</h5>
                    <ul class="footer-link-list">
                        <li><a href="index.php#beranda"><i class="bi bi-chevron-right small"></i> Beranda</a></li>
                        <li><a href="cars.php"><i class="bi bi-chevron-right small"></i> Katalog Armada</a></li>
                        <li><a href="about.php"><i class="bi bi-chevron-right small"></i> Tentang Kami</a></li>
                        <li><a href="contact.php"><i class="bi bi-chevron-right small"></i> Kontak & Lokasi</a></li>
                    </ul>
                </div>

                <!-- Col 3: Armada Favorit -->
                <div class="col-lg-3 col-md-6 col-6">
                    <h5>Armada Pilihan</h5>
                    <ul class="footer-link-list">
                        <li><a href="index.php#layanan"><i class="bi bi-chevron-right small"></i> Rental Harian & Bulanan</a></li>
                        <li><a href="index.php#layanan"><i class="bi bi-chevron-right small"></i> Sewa dengan Sopir</a></li>
                        <li><a href="index.php#layanan"><i class="bi bi-chevron-right small"></i> Kerja Sama Perusahaan</a></li>
                    </ul>
                </div>

                <!-- Col 4: Hubungi Kami -->
                <div class="col-lg-3 col-md-6">
                    <h5>Hubungi Kami</h5>
                    <div class="footer-contact-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span class="small"><?= COMPANY_ADDRESS ?></span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-whatsapp"></i>
                        <span class="small"><?= COMPANY_PHONE ?> (Chat WhatsApp)</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span class="small"><?= COMPANY_EMAIL ?></span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-clock-fill"></i>
                        <span class="small"><?= COMPANY_HOURS ?></span>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p class="mb-0">&copy; <?= date('Y') ?> <strong><?= COMPANY_LEGAL ?> (<?= COMPANY_NAME ?>)</strong>. All Rights Reserved. Solusi Rental Mobil Terbaik & Nyaman.</p>
            </div>

        </div>
    </footer>

    <!-- Include Floating Social Buttons -->
    <?php require_once __DIR__ . '/whatsapp-bubble.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Main JS -->
    <script src="assets/js/main.js?v=2"></script>
</body>
</html>
