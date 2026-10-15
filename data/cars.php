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
        'id' => 10,
        'name' => 'Mercedes Benz C 300 AMG Line',
        'brand' => 'Mercedes-Benz',
        'type' => 'Sedan',
        'year' => null,
        'color' => null,
        'price_per_day' => null,
        'price_label' => 'Ask',
        'status' => 'available',
        'image' => 'assets/images/cars/mercedes-c300-amg.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Premium Sedan',
        'description' => 'Sedan premium Mercedes-Benz untuk perjalanan bisnis, acara khusus, dan mobilitas yang berkelas.',
        'features' => [
            'Kapasitas 5 penumpang',
            'Transmisi automatic',
            'Bahan bakar bensin'
        ]
    ],
    [
        'id' => 11,
        'name' => 'Toyota Alphard 2.4 HEV',
        'brand' => 'Toyota',
        'type' => 'MPV',
        'year' => null,
        'color' => null,
        'price_per_day' => null,
        'price_label' => 'Ask',
        'status' => 'available',
        'image' => 'assets/images/cars/toyota-alphard-hev.png',
        'seats' => 6,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin ',
        'badge' => 'Luxury MPV',
        'description' => 'MPV premium dengan kabin lega untuk perjalanan keluarga, tamu bisnis, dan kebutuhan eksekutif.',
        'features' => [
            'Kapasitas 6 penumpang',
            'Transmisi automatic',
            'Bahan bakar bensin'
        ]
    ],
    [
        'id' => 12,
        'name' => 'Hyundai Ioniq 5 Signature Long Range',
        'brand' => 'Hyundai',
        'type' => 'Compact SUV',
        'year' => null,
        'color' => null,
        'price_per_day' => 1500000,
        'status' => 'available',
        'image' => 'assets/images/cars/hyundai-ioniq5.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Electric Vehicle',
        'badge' => 'Electric Vehicle',
        'description' => 'SUV listrik modern dengan jarak tempuh panjang untuk perjalanan nyaman dan lebih ramah lingkungan.',
        'features' => [
            'Kapasitas 5 penumpang',
            'Transmisi automatic',
            'Electric Vehicle'
        ]
    ],
    [
        'id' => 13,
        'name' => 'Mitsubishi Pajero Sport Dakar',
        'brand' => 'Mitsubishi',
        'type' => 'SUV',
        'year' => null,
        'color' => null,
        'price_per_day' => 1200000,
        'status' => 'available',
        'image' => 'assets/images/cars/Mitsubishi Pajero Sport Dakar.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Diesel',
        'badge' => 'Premium SUV',
        'description' => 'SUV tangguh dan nyaman untuk perjalanan keluarga, bisnis, serta perjalanan jarak jauh.',
        'features' => [
            'Kapasitas 7 penumpang',
            'Transmisi automatic',
            'Mesin diesel'
        ]
    ],
    [
        'id' => 14,
        'name' => 'Toyota Fortuner 2.8 GR Sport',
        'brand' => 'Toyota',
        'type' => 'SUV',
        'year' => null,
        'color' => null,
        'price_per_day' => 1200000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Fortuner 2.8 GR Sport.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Diesel',
        'badge' => 'GR Sport',
        'description' => 'SUV berkarakter sporty dengan ruang kabin lega untuk kebutuhan perjalanan yang berkesan.',
        'features' => [
            'Kapasitas 7 penumpang',
            'Transmisi automatic',
            'Mesin diesel'
        ]
    ],
    [
        'id' => 15,
        'name' => 'Toyota Innova Zenix V HEV Modelista',
        'brand' => 'Toyota',
        'type' => 'MPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 850000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Innova Zenix V HEV Modelista.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Hybrid MPV',
        'description' => 'MPV modern yang nyaman untuk perjalanan keluarga, bisnis, dan kebutuhan mobilitas premium.',
        'features' => [
            'Kapasitas 7 penumpang',
            'Transmisi automatic',
            'Bahan bakar bensin'
        ]
    ],
    [
        'id' => 16,
        'name' => 'Suzuki Jimny 5 Doors 4x4',
        'brand' => 'Suzuki',
        'type' => 'SUV',
        'year' => null,
        'color' => null,
        'price_per_day' => null,
        'price_label' => 'Ask',
        'status' => 'available',
        'image' => 'assets/images/cars/Suzuki Jimny 5 Doors 4x4.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => '4x4 Adventure',
        'description' => 'SUV compact 4x4 yang ikonik untuk petualangan dan perjalanan dengan gaya berbeda.',
        'features' => [
            'Kapasitas 5 penumpang',
            'Transmisi automatic',
            'Bahan bakar bensin'
        ]
    ],
    [
        'id' => 17,
        'name' => 'Honda HRV SE',
        'brand' => 'Honda',
        'type' => 'Compact SUV',
        'year' => null,
        'color' => null,
        'price_per_day' => 750000,
        'status' => 'available',
        'image' => 'assets/images/cars/Honda HRV SE.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Compact SUV',
        'description' => 'Compact SUV modern yang nyaman untuk aktivitas harian, perjalanan keluarga, dan bisnis.',
        'features' => [
            'Kapasitas 5 penumpang',
            'Transmisi automatic',
            'Bahan bakar bensin'
        ]
    ],
    [
        'id' => 18,
        'name' => 'Hyundai Creta N-Line',
        'brand' => 'Hyundai',
        'type' => 'Compact SUV',
        'year' => null,
        'color' => null,
        'price_per_day' => 700000,
        'status' => 'available',
        'image' => 'assets/images/cars/Hyundai Creta N-Line.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Compact SUV',
        'description' => 'Compact SUV modern untuk kebutuhan perjalanan harian, keluarga, dan bisnis.',
        'features' => ['Kapasitas 5 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 19,
        'name' => 'Mitsubishi Xforce',
        'brand' => 'Mitsubishi',
        'type' => 'Compact SUV',
        'year' => null,
        'color' => null,
        'price_per_day' => 600000,
        'status' => 'available',
        'image' => 'assets/images/cars/Mitsubishi Xforce.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Compact SUV',
        'description' => 'SUV compact yang nyaman untuk mobilitas kota dan perjalanan luar kota.',
        'features' => ['Kapasitas 5 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 20,
        'name' => 'Toyota Innova Reborn 2.4 G',
        'brand' => 'Toyota',
        'type' => 'MPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 700000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Innova Reborn 2.4 G.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Diesel',
        'badge' => 'MPV Diesel',
        'description' => 'MPV diesel yang nyaman untuk perjalanan keluarga, bisnis, dan jarak jauh.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Mesin diesel']
    ],
    [
        'id' => 21,
        'name' => 'Toyota Innova Reborn 2.0 V',
        'brand' => 'Toyota',
        'type' => 'MPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 600000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Innova Reborn 2.0 V.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'MPV Premium',
        'description' => 'MPV nyaman dengan kabin luas untuk berbagai kebutuhan perjalanan.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 22,
        'name' => 'Toyota Innova Reborn 2.0 G',
        'brand' => 'Toyota',
        'type' => 'MPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 550000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Innova Reborn 2.0 G.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'MPV',
        'description' => 'MPV serbaguna untuk kebutuhan keluarga dan mobilitas bisnis.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 23,
        'name' => 'Hyundai Stargazer Prime',
        'brand' => 'Hyundai',
        'type' => 'LMPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 500000,
        'status' => 'available',
        'image' => 'assets/images/cars/Hyundai Stargazer Prime.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'LMPV',
        'description' => 'LMPV modern dengan kabin lega untuk perjalanan keluarga dan aktivitas harian.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 24,
        'name' => 'Mitsubishi Xpander Ultimate',
        'brand' => 'Mitsubishi',
        'type' => 'LMPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 500000,
        'status' => 'available',
        'image' => 'assets/images/cars/Mitsubishi Xpander Ultimate.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'LMPV',
        'description' => 'LMPV nyaman dengan ruang kabin luas untuk keluarga dan perjalanan bersama.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 25,
        'name' => 'Toyota Veloz HEV',
        'brand' => 'Toyota',
        'type' => 'LMPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 550000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Veloz HEV.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Hybrid LMPV',
        'description' => 'LMPV modern untuk perjalanan keluarga dan kebutuhan mobilitas sehari-hari.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 26,
        'name' => 'Honda City HB RS',
        'brand' => 'Honda',
        'type' => 'Hatchback',
        'year' => null,
        'color' => null,
        'price_per_day' => 475000,
        'status' => 'available',
        'image' => 'assets/images/cars/Honda City HB RS.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Sport Hatchback',
        'description' => 'Hatchback sporty dan lincah untuk perjalanan dalam kota maupun luar kota.',
        'features' => ['Kapasitas 5 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 27,
        'name' => 'Toyota Avanza 1.5 G',
        'brand' => 'Toyota',
        'type' => 'LMPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 450000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Avanza 1.5 G.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'LMPV',
        'description' => 'LMPV andal untuk kebutuhan keluarga, perjalanan wisata, dan mobilitas harian.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 28,
        'name' => 'Suzuki XL7 Hybrid',
        'brand' => 'Suzuki',
        'type' => 'LSUV',
        'year' => null,
        'color' => null,
        'price_per_day' => 475000,
        'status' => 'available',
        'image' => 'assets/images/cars/Suzuki XL7 Hybrid.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'LSUV Hybrid',
        'description' => 'LSUV nyaman untuk perjalanan keluarga dan mobilitas harian.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 29,
        'name' => 'Toyota Raize 1.0 Turbo',
        'brand' => 'Toyota',
        'type' => 'Crossover',
        'year' => null,
        'color' => null,
        'price_per_day' => 450000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Raize 1.0 Turbo.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Crossover Turbo',
        'description' => 'Crossover compact yang lincah untuk mobilitas dalam kota dan perjalanan luar kota.',
        'features' => ['Kapasitas 5 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 30,
        'name' => 'Honda HRV E',
        'brand' => 'Honda',
        'type' => 'Compact SUV',
        'year' => null,
        'color' => null,
        'price_per_day' => 450000,
        'status' => 'available',
        'image' => 'assets/images/cars/Honda HRV E.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Compact SUV',
        'description' => 'Compact SUV nyaman untuk perjalanan keluarga, bisnis, dan aktivitas sehari-hari.',
        'features' => ['Kapasitas 5 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 31,
        'name' => 'Mitsubishi Xpander Non Facelift',
        'brand' => 'Mitsubishi',
        'type' => 'LMPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 450000,
        'status' => 'available',
        'image' => 'assets/images/cars/Mitsubishi Xpander Non Facelift.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'LMPV',
        'description' => 'LMPV dengan kabin lega untuk perjalanan keluarga dan kebutuhan bersama.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 32,
        'name' => 'Toyota Sienta',
        'brand' => 'Toyota',
        'type' => 'MPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 400000,
        'status' => 'available',
        'image' => 'assets/images/cars/Toyota Sienta.png',
        'seats' => 7,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'MPV',
        'description' => 'MPV praktis dengan kabin lapang untuk perjalanan keluarga dan aktivitas harian.',
        'features' => ['Kapasitas 7 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 33,
        'name' => 'Honda Freed PSD',
        'brand' => 'Honda',
        'type' => 'MPV',
        'year' => null,
        'color' => null,
        'price_per_day' => 375000,
        'status' => 'available',
        'image' => 'assets/images/cars/Honda Freed PSD.png',
        'seats' => 6,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'MPV',
        'description' => 'MPV nyaman dengan pintu geser untuk perjalanan keluarga dan kebutuhan mobilitas harian.',
        'features' => ['Kapasitas 6 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 34,
        'name' => 'Honda Brio Facelift',
        'brand' => 'Honda',
        'type' => 'Hatchback',
        'year' => null,
        'color' => null,
        'price_per_day' => 375000,
        'status' => 'available',
        'image' => 'assets/images/cars/Honda Brio Facelift.png',
        'seats' => 5,
        'luggage_capacity' => null,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
        'badge' => 'Hatchback',
        'description' => 'Hatchback ringkas dan praktis untuk mobilitas perkotaan.',
        'features' => ['Kapasitas 5 penumpang', 'Transmisi automatic', 'Bahan bakar Bensin']
    ],
    [
        'id' => 4,
        'name' => 'Wuling Almaz RS Pro Turbo',
        'brand' => 'Wuling',
        'type' => 'SUV',
        'year' => 2023,
        'color' => 'Abu-abu Modern',
        'price_per_day' => 600000,
        'status' => 'available',
        'image' => 'assets/images/cars/Wuling Almaz RS Pro Turbo.png',
        'seats' => 7,
        'luggage_capacity' => 2,
        'transmission' => 'Automatic',
        'fuel' => 'Bensin',
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

function get_car_price_label($car) {
    if (!empty($car['price_label'])) {
        return $car['price_label'];
    }

    return format_rupiah($car['price_per_day']);
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
              . "Bisa dibantu untuk pricelist serta persyaratannya?";
    }
    
    return 'https://wa.me/' . $phone . '?text=' . urlencode($text);
}


function get_company_services() {
    global $services;
    return $services;
}


