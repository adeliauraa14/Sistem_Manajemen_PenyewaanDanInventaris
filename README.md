# SISTEM MANAJEMEN PENYEWAAN & INVENTARIS PERLENGKAPAN ACARA BERBASIS WEB

Project ini merupakan baseproject aplikasi berbasis web untuk mengelola penyewaan dan inventaris perlengkapan acara.

## Teknologi

- Laravel 13
- PHP 8.5
- PostgreSQL 18
- Composer
- Node.js & NPM

## Deskripsi

Sistem ini digunakan untuk membantu pengelolaan data perlengkapan acara, kategori perlengkapan, pengguna, serta transaksi penyewaan.

Sistem memiliki dua role pengguna utama:

- `petugas`
- `pelanggan`

## Fitur Utama

- Manajemen kategori perlengkapan
- Manajemen inventaris/perlengkapan
- Pengelolaan transaksi penyewaan
- Pengelolaan detail penyewaan
- Relasi data pengguna, penyewaan, perlengkapan, dan kategori
- Seeder data awal untuk kebutuhan pengujian dan demo

## Struktur Database

Database terdiri dari tabel utama:

- `users` - menyimpan data pengguna dan role
- `categories` - menyimpan kategori perlengkapan
- `items` - menyimpan data perlengkapan yang dapat disewa
- `rentals` - menyimpan data transaksi penyewaan
- `rental_details` - menyimpan detail perlengkapan dalam setiap transaksi

### Relasi Database

- Satu user dapat memiliki banyak rental.
- Satu kategori dapat memiliki banyak item.
- Satu rental dapat memiliki banyak rental detail.
- Satu item dapat digunakan pada banyak rental detail.

## Cara Menjalankan Project dari Awal

### 1. Clone Repository

```bash
git clone <URL_REPOSITORY>
cd Proyek_WebFramework