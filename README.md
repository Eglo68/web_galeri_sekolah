# Web Galeri SMKN 4 Bogor (Laravel + MySQL + Tailwind)

Paket ini berisi **file aplikasi saja** (overlay). Letakkan di atas proyek Laravel 11/12 yang baru.

## Instalasi
```bash
composer create-project laravel/laravel smkn4bogor
cd smkn4bogor
# salin isi folder zip ini ke dalam smkn4bogor (timpa routes/web.php)
```
Edit `.env`:
```
APP_LOCALE=id
APP_FALLBACK_LOCALE=id
DB_CONNECTION=mysql
DB_DATABASE=smkn4bogor
DB_USERNAME=root
DB_PASSWORD=
```
Buat database `smkn4bogor` di MySQL, lalu:
```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```
- Situs: http://127.0.0.1:8000
- Admin: http://127.0.0.1:8000/login
  - email `admin@smkn4bogor.sch.id`, sandi `admin12345` (**segera ganti**)

## Isi
- Publik: Beranda `/`, Tentang `/tentang`, Kontak `/kontak`, Galeri `/galeri` + detail, Artikel `/artikel` + detail, Produk `/produk` + detail
- Admin (`/admin`): Dashboard, CRUD Artikel, Produk, Galeri (upload gambar ke `storage/app/public`)
- REST API (baca saja, JSON): `/api/articles`, `/api/products`, `/api/galleries` (+ `/{slug}`)
- Data sekolah (alamat, telepon, email, jam layanan, kepala sekolah): `config/school.php`
- Tailwind memakai CDN agar langsung jalan; untuk produksi ganti dengan build Vite.

## Catatan
- Form kontak baru memvalidasi dan menampilkan notifikasi; belum mengirim email (atur SMTP lalu aktifkan `Mail` di `PageController@send`).
- Alamat dan nomor telepon di `config/school.php` masih placeholder.
- Halaman register tidak dibuat (opsional; hanya admin).
