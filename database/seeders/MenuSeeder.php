<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            // ============ KATEGORI KOPI ============
            [
                'nama_menu' => 'Americano',
                'deskripsi' => 'Espresso klasik yang diencerkan dengan air panas, menghasilkan kopi dengan rasa yang kuat namun tidak terlalu pekat. Perfect bagi pecinta kopi hitam yang menyukai aroma kopi asli tanpa tambahan susu atau gula. Terbuat dari biji kopi Arabika pilihan yang disangrai medium, memberikan cita rasa yang seimbang antara pahit dan asam. Disajikan panas dengan aroma yang menggugah selera, cocok untuk menemani aktivitas pagi hari atau meeting penting Anda. Setiap tegukan memberikan pengalaman kopi yang autentik dan menyegarkan.',
                'harga' => 20000,
                'kategori' => 'kopi',
                'gambar' => 'americano.png',
                'tersedia' => true
            ],
            [
                'nama_menu' => 'Kopi Susu Gula Aren',
                'deskripsi' => 'Perpaduan sempurna antara kopi espresso, susu segar full cream, dan gula aren asli organik yang memberikan rasa manis alami dengan sentuhan karamel. Gula aren yang digunakan berasal dari perkebunan tradisional Jawa Barat, memberikan keunikan rasa yang tidak ditemukan di gula biasa. Susu steamed yang creamy menyeimbangkan kekuatan kopi, menciptakan harmoni rasa antara pahit kopi, manis alami, dan gurih susu. Dapat disajikan panas untuk menghangatkan tubuh atau dingin dengan es batu untuk kesegaran di siang hari. Minuman ini merepresentasikan perpaduan modernitas dan tradisi dalam setiap tegukan.',
                'harga' => 22000,
                'kategori' => 'kopi',
                'gambar' => 'kopi-aren.png',
                'tersedia' => true
            ],
            [
                'nama_menu' => 'Cappuccino',
                'deskripsi' => 'Minuman kopi ikonik Italia dengan komposisi sempurna 1/3 espresso, 1/3 susu steamed, dan 1/3 busa susu yang lembut. Dibuat dengan teknik microfoam yang menghasilkan tekstur busa seperti velvet, menciptakan lapisan crema yang indah di atas cangkir. Disajikan dengan taburan bubuk coklat atau kayu manis yang melengkapi rasa. Perpaduan antara kekuatan espresso yang bold dengan kelembutan susu yang creamy menghasilkan pengalaman minum kopi yang seimbang. Cocok dinikmati di pagi hari sebagai pendorong semangat atau sore hari sebagai teman bersantai. Setiap cangkir dibuat dengan perhatian pada detail untuk memastikan kualitas terbaik.',
                'harga' => 23000,
                'kategori' => 'kopi',
                'gambar' => 'cappuccino.png',
                'tersedia' => true
            ],
            
            // ============ KATEGORI NON-KOPI ============
            [
                'nama_menu' => 'Matcha Latte',
                'deskripsi' => 'Minuman sehat premium yang terbuat dari bubuk matcha grade ceremonial asal Uji, Jepang. Matcha berasal dari daun teh hijau pilihan yang ditumbuk halus menggunakan batu granit, menghasilkan warna hijau zamrud yang cantik dan rasa umami yang khas. Kaya akan antioksidan, L-theanine, dan katekin yang memberikan energi berkelanjutan tanpa menyebabkan gelisah. Dipadukan dengan susu steamed pilihan (regular, almond, atau oat milk) dan sedikit madu sebagai pemanis alami. Disajikan dengan teknik whisking tradisional untuk menghindari gumpalan dan menghasilkan tekstur yang halus. Pilihan sempurna bagi mereka yang mencari alternatif kopi yang menyehatkan namun tetap memanjakan lidah.',
                'harga' => 25000,
                'kategori' => 'non-kopi',
                'gambar' => 'matcha.png',
                'tersedia' => true
            ],
            [
                'nama_menu' => 'Chocolate',
                'deskripsi' => 'Coklat panas premium yang terbuat dari coklat couverture Belgia dengan kadar kakao 70%, memberikan rasa coklat yang intens namun tidak terlalu manis. Diproses dengan teknik tempering yang tepat untuk memastikan tekstur yang halus dan glossy. Dipadukan dengan susu full cream steamed dan whipped cream homemade yang dibuat fresh setiap hari. Disajikan dengan taburan serpihan coklat dark, marshmallow panggang, dan sentuhan vanilla bean. Tersedia dalam versi panas yang menghangatkan hati atau versi dingin yang menyegarkan. Cocok untuk segala usia, dari anak-anak hingga dewasa yang mengapresiasi kualitas coklat sejati. Setiap tegukan adalah perjalanan rasa dari pahit manis yang seimbang hingga finish yang lembut di lidah.',
                'harga' => 21000,
                'kategori' => 'non-kopi',
                'gambar' => 'chocolate.png',
                'tersedia' => true
            ],
            
            // ============ KATEGORI MAKANAN ============
            [
                'nama_menu' => 'Croissant',
                'deskripsi' => 'Roti pastry klasik Prancis yang dibuat dengan teknik laminasi tradisional menggunakan mentega premium Eropa. Proses pembuatan yang memakan waktu 3 hari dimulai dari pembuatan dough, laminasi dengan 27 lapisan mentega, proofing, hingga pemanggangan menghasilkan tekstur yang sempurna: renyah dan flaky di luar, berlapis-lapis seperti sarang lebah di dalam, namun tetap lembut dan buttery. Tersedia dalam tiga varian: Plain dengan rasa mentega murni, Almond dengan isian almond cream dan taburan irisan almond panggang, serta Chocolate dengan batang coklat dark di tengahnya. Dipanggang fresh setiap pagi pukul 6 dan 10, serta sore pukul 3 untuk memastikan kesegaran optimal. Sempurna dipasangkan dengan kopi atau teh favorit Anda.',
                'harga' => 18000,
                'kategori' => 'makanan',
                'gambar' => 'croissant.png',
                'tersedia' => true
            ],
            
            // ============ KATEGORI DESSERT ============
            [
                'nama_menu' => 'Tiramisu',
                'deskripsi' => 'Dessert ikonik Italia yang secara harfiah berarti "angkat aku" atau "buat aku bahagia". Dibuat dengan layer-layer sempurna: ladyfinger Savoiardi yang direndam dalam kopi espresso kuat dan sedikit liquor, dilapisi dengan cream mascarpone yang dibuat dari keju mascarpone impor Italia dicampur kuning telur, gula, dan whipped cream. Diselesaikan dengan taburan bubuk kakao Dutch process yang memberikan kontras rasa pahit. Proses pembuatan yang membutuhkan waktu pendinginan minimal 6 jam menghasilkan tekstur yang creamy namun tidak terlalu berat, dengan rasa yang seimbang antara manis, pahit kopi, dan gurih keju. Disajikan dingin dalam gelas yang elegan, menjadi penutup makan yang sempurna untuk mengakhiri pengalaman kuliner Anda di Cafe KOPI IN.',
                'harga' => 28000,
                'kategori' => 'dessert',
                'gambar' => 'tiramisu.png',
                'tersedia' => true
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
        
        $this->command->info('Seeder berhasil! 7 menu dengan deskripsi lengkap telah ditambahkan.');
        $this->command->info('Kopi: Americano, Kopi Susu Gula Aren, Cappuccino');
        $this->command->info('Non-Kopi: Matcha Latte, Chocolate');
        $this->command->info('Makanan: Croissant');
        $this->command->info('Dessert: Tiramisu');
    }
}