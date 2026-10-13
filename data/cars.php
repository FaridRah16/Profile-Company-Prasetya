<?php
/**
 * Data Armada Mobil & Konfigurasi Profil Perusahaan
 * Prasetya Rent Car - PHP Native
 */

// Konfigurasi Perusahaan
define('COMPANY_LEGAL', 'PT PRASETYA MULTICAR INDO');
define('COMPANY_NAME', 'Prasetya Rent Car');
define('COMPANY_ESTABLISHED', '2022');
define('COMPANY_CATEGORY', 'Jasa Rental Mobil');
define('COMPANY_TAGLINE', 'Solusi Rental Mobil Terpercaya & Profesional');
define('COMPANY_PHONE', '+62 812-1309-2043');
define('COMPANY_WHATSAPP', '6281213092043'); // Format tanpa '+' untuk link wa.me
define('COMPANY_EMAIL', 'info@prasetyarentcar.com');
define('COMPANY_ADDRESS', 'Jalan Simpang 5 Pondok Petir, Sawangan, Depok, Jawa Barat 16517');
define('COMPANY_HOURS', '24 Jam Nonstop (Senin - Minggu)');

// Layanan Perusahaan
$services = [
    [
        'title' => 'Rental Mobil Harian',
        'desc' => 'Penyewaan kendaraan untuk kebutuhan pribadi, keluarga, aktivitas sehari-hari, dan perjalanan khusus.',
        'icon' => 'bi-calendar-date-fill',
        'badge' => 'Harian & Weekend',
        'color' => 'icon-red'
    ],
    [
        'title' => 'Rental Mobil Bulanan',
        'desc' => 'Solusi transportasi untuk mendukung kebutuhan operasional dan mobilitas bisnis dalam jangka waktu tertentu.',
        'icon' => 'bi-calendar-month-fill',
        'badge' => 'Jangka Panjang',
        'color' => 'icon-blue'
    ],
    [
        'title' => 'Layanan Transportasi dengan Sopir',
        'desc' => 'Layanan kendaraan beserta pengemudi untuk perjalanan bisnis, kebutuhan keluarga, dan kegiatan lainnya.',
        'icon' => 'bi-person-badge-fill',
        'badge' => 'Driver Profesional',
        'color' => 'icon-green'
    ],
    [
        'title' => 'Kerja Sama Perusahaan dan Instansi',
        'desc' => 'Mendukung kebutuhan transportasi perusahaan melalui layanan penyewaan kendaraan yang dapat disesuaikan dengan kesepakatan kerja sama.',
        'icon' => 'bi-building-fill-check',
        'badge' => 'Corporate & B2B',
        'color' => 'icon-amber'
    ]
];


// Data Armada Mobil
$cars = [
    [
        'id' => 1,
        'name' => 'Toyota Avanza',
        'brand' => 'Toyota',
        'type' => 'MPV',
        'year' => 2023,
        'color' => 'Putih',
        'price_per_day' => 350000,
        'status' => 'available',
        'image' => 'assets/images/cars/avanza.png',
        'seats' => 7,
        'luggage_capacity' => 2,
        'transmission' => 'Manual / Matic',
        'fuel' => 'Bensin',
        'badge' => 'Terlaris',
        'description' => 'Mobil keluarga serbaguna yang nyaman, irit bahan bakar, dan handal. Sangat cocok untuk perjalanan wisata keluarga, silaturahmi, maupun mobilitas harian di dalam dan luar kota.',
        'features' => [
            'AC Double Blower Dingin Merata',
            'Sistem Audio Touchscreen & Bluetooth',
            'Dual SRS Airbag & Rem ABS',
            'Sensor Parkir & Kamera Belakang',
            'Kapasitas Bagasi Fleksibel',
            'Port Charger USB di Setiap Baris'
        ]
    ],
    [
        'id' => 2,
        'name' => 'Toyota Innova Reborn',
        'brand' => 'Toyota',
        'type' => 'MPV',
        'year' => 2022,
        'color' => 'Abu-abu Metalik',
        'price_per_day' => 500000,
        'status' => 'available',
        'image' => 'assets/images/cars/innova.png',
        'seats' => 8,
        'luggage_capacity' => 3,
        'transmission' => 'Automatic',
        'fuel' => 'Diesel',
        'badge' => 'Favorit Keluarga',
        'description' => 'MPV kelas atas dengan kenyamanan suspensi terbaik, kabin senyap, dan mesin diesel bertenaga prima. Solusi sempurna untuk perjalanan dinas eksekutif dan liburan jarak jauh.',
        'features' => [
            'Suspensi Lembut & Kabin Senyap',
            'Captain Seat / Baris Luas Nyaman',
            'AC Triple Blower Digital',
            'Mesin Diesel 2.4L Kuat & Efisien',
            'Eco Mode & Power Mode Driving',
            'Bagasi Super Luas Muat Koper Besar'
        ]
    ],
    [
        'id' => 3,
        'name' => 'Mitsubishi Xpander',
        'brand' => 'Mitsubishi',
        'type' => 'MPV',
        'year' => 2023,
        'color' => 'Silver Metalik',
        'price_per_day' => 400000,
        'status' => 'available',
        'image' => 'assets/images/cars/xpander.png',
        'seats' => 7,
        'luggage_capacity' => 2,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Modern & Stylish',
        'description' => 'Desain futuristik dengan ground clearance tinggi layaknya SUV. Interior lapang dengan banyak ruang penyimpanan cerdas untuk kenyamanan seluruh anggota keluarga.',
        'features' => [
            'Desain Dynamic Shield Modern',
            'Ground Clearance Tinggi Anti Banjir',
            'Kabin Kedap Suara Berkualitas',
            'Head Unit Modern Support Apple CarPlay & Android Auto',
            'Electronic Parking Brake & Brake Assist',
            'Kursi Baris Ketiga Lipat Rata Lantai'
        ]
    ],
    [
        'id' => 4,
        'name' => 'Wuling Almaz RS Pro Turbo',
        'brand' => 'Wuling',
        'type' => 'SUV',
        'year' => 2023,
        'color' => 'Abu-abu Modern',
        'price_per_day' => 550000,
        'status' => 'available',
        'image' => 'assets/images/cars/car_1782042105.jpg',
        'seats' => 7,
        'luggage_capacity' => 2,
        'transmission' => 'CVT Matic',
        'fuel' => 'Bensin Turbo',
        'badge' => 'SUV Premium Turbo',
        'description' => 'SUV flagship modern dengan Panoramic Sunroof megah, mesin 1.5L Turbocharged bertenaga responsif, kamera 360 derajat, dan fitur asisten suara canggih (WIND).',
        'features' => [
            'Panoramic Sunroof Mewah',
            'Layar Sentuh 10.4 Inci Vertikal Canggih',
            'Kamera 360 Derajat High Definition',
            'Perintah Suara Bahasa Indonesia (WIND)',
            'Advanced Driver Assistance System (ADAS)',
            'Interior Kulit Sintetis Elegan'
        ]
    ],
    [
        'id' => 5,
        'name' => 'Honda City Hatchback RS',
        'brand' => 'Honda',
        'type' => 'Hatchback',
        'year' => 2023,
        'color' => 'Putih Mutiara',
        'price_per_day' => 450000,
        'status' => 'available',
        'image' => 'assets/images/cars/6f0u83w0E756fFhXmaKJ2J9lyo309ZzG6faUdb0u.png',
        'seats' => 5,
        'luggage_capacity' => 2,
        'transmission' => 'Automatic CVT',
        'fuel' => 'Bensin',
        'badge' => 'Sporty & Agile',
        'description' => 'Hatchback bernuansa racing sporty dengan handling presisi dan mesin i-VTEC bertenaga. Dilengkapi ULTRA Seat fleksibel yang mampu membawa barang bawaan beragam bentuk.',
        'features' => [
            'Desain Sporty RS Aero Kit',
            'ULTRA Seat (4 Mode Konfigurasi Kursi)',
            'Paddle Shift untuk Sensasi Manual',
            'Remote Engine Start via Smart Key',
            'Audio Touchscreen 8 Inci & 8 Speakers',
            'Vehicle Stability Assist (VSA)'
        ]
    ],
    [
        'id' => 6,
        'name' => 'Honda Freed PSD',
        'brand' => 'Honda',
        'type' => 'MPV',
        'year' => 2022,
        'color' => 'Silver Polished',
        'price_per_day' => 380000,
        'status' => 'available',
        'image' => 'assets/images/cars/GPr6TpguD834efOb2tGUzDMgdxJUMSkzImff1YQA.png',
        'seats' => 7,
        'luggage_capacity' => 2,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Power Sliding Door',
        'description' => 'Pintu geser elektrik otomatis (Power Sliding Door) memudahkan akses naik turun anak-anak dan lansia, terutama di tempat parkir sempit. Captain seat mewah di baris kedua.',
        'features' => [
            'Dual Power Sliding Door Otomatis',
            'Captain Seat Baris Kedua dengan Armrest',
            'Walk-Through Cabin Rata Lantai',
            'Visibilitas Luas & Mudah Bermanuver',
            'Mesin 1.5L i-VTEC Sangat Hemat BBM',
            'AC Dingin & Nyaman Hingga Baris Belakang'
        ]
    ],
    [
        'id' => 7,
        'name' => 'Nissan All New Livina',
        'brand' => 'Nissan',
        'type' => 'MPV',
        'year' => 2023,
        'color' => 'Hitam Metalik',
        'price_per_day' => 400000,
        'status' => 'available',
        'image' => 'assets/images/cars/dqNEbgJqDp1XssmigSU05bjvLucG2GruOxh5J443.png',
        'seats' => 7,
        'luggage_capacity' => 2,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Elegan & Nyaman',
        'description' => 'Kombinasi kemewahan gril V-Motion khas Nissan dan kenyamanan kabin premium. Kekedapan kabin yang sangat baik membuat perjalanan jauh bersama keluarga terasa santai.',
        'features' => [
            'Gril V-Motion Chrome Elegan',
            'Kabin Sangat Kedap & Hening',
            'Suspensi Empuk Khas Nissan',
            'Kamera Parkir Belakang & Sensor',
            'Sistem Pengereman Canggih ABS + EBD + BA',
            'Banyak Kompartemen & Laci Tersembunyi'
        ]
    ],
    [
        'id' => 8,
        'name' => 'Daihatsu Terios R Deluxe',
        'brand' => 'Daihatsu',
        'type' => 'SUV',
        'year' => 2022,
        'color' => 'Merah Marun',
        'price_per_day' => 400000,
        'status' => 'available',
        'image' => 'assets/images/cars/terios.png',
        'seats' => 7,
        'luggage_capacity' => 2,
        'transmission' => 'Manual / Matic',
        'fuel' => 'Bensin',
        'badge' => 'SUV Tangguh',
        'description' => 'SUV 7-seater tangguh dengan ground clearance 220mm, siap melibas segala medan jalan tanjakan, pegunungan, maupun jalan berlubang dengan aman dan bertenaga.',
        'features' => [
            'Ground Clearance 220 mm Bebas Rintangan',
            'Penggerak Roda Belakang (RWD) Kuat Menanjak',
            'Around View Monitor (Kamera 360)',
            'Keyless Entry & Push Start Button',
            'Hill Start Assist (HSA) Aman di Tanjakan',
            'Desain Sporty Roof Rail'
        ]
    ],
    [
        'id' => 9,
        'name' => 'Honda Jazz RS',
        'brand' => 'Honda',
        'type' => 'Hatchback',
        'year' => 2022,
        'color' => 'Hitam Crystal',
        'price_per_day' => 350000,
        'status' => 'available',
        'image' => 'assets/images/cars/jazz.png',
        'seats' => 5,
        'luggage_capacity' => 1,
        'transmission' => 'Automatic CVT',
        'fuel' => 'Bensin',
        'badge' => 'Kompak & Lincah',
        'description' => 'City car hatchback legendaris yang sangat lincah untuk lalu lintas perkotaan. Sangat mudah bermanuver dan parkir di tempat sempit dengan konsumsi BBM yang luar biasa irit.',
        'features' => [
            'Dimensi Kompak Mudah Parkir',
            'Akselerasi Spontan & Irit Bahan Bakar',
            'Lampu Full LED dengan DRL Modern',
            'Jok Ergonomis dengan Lapisan Kulit',
            'AC Digital Touch Panel',
            'Audio Bluetooth Handsfree'
        ]
    ]
];

// Helper Functions
function get_all_cars() {
    global $cars;
    return $cars;
}

function get_car_by_id($id) {
    global $cars;

    foreach ($cars as $car) {
        if ((int) $car['id'] === (int) $id) {
            return $car;
        }
    }

    return null;
}

function get_featured_cars($limit = 6) {
    global $cars;
    return array_slice($cars, 0, $limit);
}

function format_rupiah($nominal) {
    return 'Rp ' . number_format($nominal, 0, ',', '.');
}

/**
 * Membuat tautan WhatsApp instan dengan teks pre-filled rapi
 */
function build_whatsapp_link($car_name = null, $custom_message = null) {
    $phone = COMPANY_WHATSAPP;
    
    if ($custom_message) {
        $text = $custom_message;
    } elseif ($car_name) {
        $text = "Halo Admin Prasetya Rent Car, saya tertarik untuk menyewa mobil *$car_name*.\n\n"
              . "Mohon info ketersediaan unit dan persyaratannya. Terima kasih!";
    } else {
        $text = "Halo Admin Prasetya Rent Car, saya ingin menanyakan informasi rental mobil.\n\n"
              . "Bisa dibantu untuk pilihan unit dan tarifnya? Terima kasih!";
    }
    
    return 'https://wa.me/' . $phone . '?text=' . urlencode($text);
}


function get_company_services() {
    global $services;
    return $services;
}


