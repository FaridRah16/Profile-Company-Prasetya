<?php
require_once __DIR__ . '/data/cars.php';

$page_title = 'Syarat & Ketentuan - Prasetya Rent Car' . COMPANY_NAME;
$active_nav = 'terms';

require_once __DIR__ . '/includes/header.php';
?>

<main class="terms-page">
    <section class="terms-intro">
        <div class="container text-center">
            <span class="section-badge">Informasi Penting</span>
            <h1 class="section-title mb-2">Persyaratan Rental Mobil</h1>
            <p class="section-subtitle mb-0">Siapkan dokumen sesuai jenis layanan yang Anda pilih.</p>
        </div>
    </section>

    <section class="terms-content">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <article class="terms-card h-100">
                        <h2>Syarat Rental Mobil untuk Perusahaan</h2>
                        <p>Syarat menggunakan layanan rental mobil bulanan untuk perusahaan:</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i><em>Softcopy</em> akta perusahaan</li>
                            <li><i class="bi bi-check-circle-fill"></i>NIB (Nomor Induk Berusaha)</li>
                            <li><i class="bi bi-check-circle-fill"></i>NPWP perusahaan</li>
                            <li><i class="bi bi-check-circle-fill"></i>Domisili perusahaan</li>
                        </ul>

                        <h3>Untuk identitas penyewa:</h3>
                        <ul>
                            <li><i class="bi bi-person-check-fill"></i>KTP penyewa</li>
                            <li><i class="bi bi-person-check-fill"></i>KTP penjamin dari perusahaan</li>
                            <li><i class="bi bi-person-check-fill"></i>SIM pengguna kendaraan</li>
                        </ul>
                    </article>
                </div>

                <div class="col-lg-6">
                    <article class="terms-card h-100">
                        <h2>Syarat Rental Mobil Lepas Kunci untuk Perorangan</h2>
                        <p>Lengkapi dokumen berikut untuk menggunakan layanan rental mobil:</p>

                        <h3>Foto dokumen:</h3>
                        <ul>
                            <li><i class="bi bi-card-checklist"></i>Dokumen penyewa (KTP, SIM A, PBB jika ada, KK atau buku nikah)</li>
                            <li><i class="bi bi-card-checklist"></i>Dokumen penjamin (KTP), jika diperlukan</li>
                        </ul>

                        <h3>Jaminan yang diserahkan kepada kami:</h3>
                        <ul>
                            <li><i class="bi bi-shield-check"></i>Kendaraan (motor beserta STNK) minimal tahun 2018; atau</li>
                            <li><i class="bi bi-shield-check"></i>Deposit minimal Rp 2 juta</li>
                        </ul>

                        <p class="terms-note"><i class="bi bi-geo-alt-fill"></i>Bersedia disurvei (khusus pelanggan baru).</p>
                    </article>
                </div>
            </div>

            <div class="terms-contact">
                <div>
                    <h2>Ada pertanyaan tentang persyaratan?</h2>
                    <p>Hubungi admin untuk konsultasi pilihan armada dan proses penyewaan.</p>
                </div>
                <a href="<?= build_whatsapp_link() ?>" target="_blank" class="btn-whatsapp-solid">
                    <i class="bi bi-whatsapp"></i> Chat Admin Sekarang
                </a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
