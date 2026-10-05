<?php
namespace Database\Seeders;

use App\Models\{Article, Gallery, Product, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@smkn4bogor.sch.id'], ['name' => 'Admin SMKN 4 Bogor', 'password' => Hash::make('password123')]);

        $body = "Contoh isi artikel. Ganti dengan berita sebenarnya melalui panel admin.\n\nSMKN 4 Bogor terus berupaya menghadirkan pendidikan vokasi yang selaras dengan kebutuhan dunia kerja.";
        $arts = [
            ['Bima Arya Datang ke Sekolah untuk Memberi Motivasi kepada Siswa', 'Acara'],
            ['Siswa SMKN 4 Bogor Juara LKS Tingkat Provinsi', 'Prestasi'],
            ['Pengumuman Jadwal Ujian Akhir Semester', 'Pengumuman'],
            ['Kunjungan Industri ke Perusahaan Teknologi', 'Akademik'],
            ['Upacara Peringatan HUT RI di Lapangan Sekolah', 'Acara'],
            ['Workshop Robotika untuk Siswa Kelas X', 'Akademik'],
        ];
        foreach ($arts as $i => [$t, $c]) {
            Article::create(['title' => $t, 'category' => $c, 'excerpt' => 'Ringkasan singkat: ' . $t . '.', 'body' => $body,
                'author' => 'Humas', 'status' => 'published', 'published_at' => now()->subDays($i * 4)]);
        }

        $prods = [['Seragam Batik Sekolah', 'Seragam', 150000, 40], ['Kemeja Putih Lengan Pendek', 'Seragam', 95000, 8],
            ['Topi Upacara', 'Seragam', 35000, 60], ['Buku Panduan Kompetensi Keahlian', 'Buku', 55000, 25],
            ['Tumbler SMKN 4 Bogor', 'Merchandise', 45000, 112], ['Tas Ransel SMKN 4', 'Merchandise', 185000, 12]];
        foreach ($prods as $i => [$n, $c, $p, $s]) {
            Product::create(['name' => $n, 'category' => $c, 'price' => $p, 'stock' => $s, 'sku' => 'PRD-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'description' => 'Produk resmi koperasi SMKN 4 Bogor.']);
        }

        $gal = [['Gedung Utama', 'Fasilitas'], ['Laboratorium Komputer', 'Fasilitas'], ['Lapangan Basket', 'Fasilitas'],
            ['Praktik Bengkel', 'Kegiatan Siswa'], ['Juara LKS Provinsi', 'Prestasi'], ['Upacara Bendera', 'Acara'],
            ['Pentas Seni Tahunan', 'Acara'], ['Latihan Paskibra', 'Kegiatan Siswa']];
        foreach ($gal as $i => [$t, $c]) {
            Gallery::create(['title' => $t, 'category' => $c, 'description' => 'Dokumentasi: ' . $t . '.', 'taken_at' => now()->subDays($i * 9)]);
        }
    }
}
