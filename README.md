# SISTEM MANAJEMEN PENYEWAAN & INVENTARIS PERLENGKAPAN ACARA BERBASIS WEB

Aplikasi berbasis web untuk membantu pengelolaan penyewaan dan inventaris perlengkapan acara. Sistem ini mencatat data pengguna, kategori perlengkapan, inventaris, transaksi penyewaan, serta detail barang yang disewa.

Project ini dibuat menggunakan Laravel dengan PostgreSQL sebagai basis data.

## 1. Teknologi yang Digunakan

* **Framework:** Laravel 13
* **Bahasa Pemrograman:** PHP 8.5+
* **Database:** PostgreSQL 18
* **Package Manager PHP:** Composer
* **Frontend Build Tool:** Vite
* **Package Manager JavaScript:** NPM
* **Version Control:** Git & GitHub

## 2. Role Pengguna

Sistem memiliki dua role utama:

### Petugas

Petugas bertanggung jawab terhadap pengelolaan data sistem, terutama:

* Mengelola kategori perlengkapan.
* Mengelola data inventaris/barang.
* Mengelola data penyewaan.
* Memantau status penyewaan.

### Pelanggan

Pelanggan menggunakan sistem untuk:

* Melihat perlengkapan yang tersedia.
* Melakukan penyewaan perlengkapan.
* Melihat data/status penyewaan.

> Implementasi autentikasi dan pembatasan akses berdasarkan role dapat dikembangkan pada bagian authentication/authorization project.

## 3. Fitur Utama

* Pengelolaan pengguna dan role.
* Pengelolaan kategori perlengkapan.
* Pengelolaan data inventaris.
* Pencatatan transaksi penyewaan.
* Pencatatan detail barang dalam setiap penyewaan.
* Relasi antar-entitas menggunakan foreign key.
* Seeder untuk menyediakan data contoh sehingga aplikasi dapat langsung digunakan untuk demo.
* Database migration untuk membangun struktur database secara otomatis.

## 4. Struktur Database

Database terdiri dari lima entitas utama:

### `users`

Menyimpan data pengguna sistem.

Atribut utama:

* `id`
* `name`
* `email`
* `password`
* `role`
* `email_verified_at`
* `remember_token`
* `created_at`
* `updated_at`

Role yang digunakan:

* `petugas`
* `pelanggan`

### `categories`

Menyimpan kategori perlengkapan.

Atribut utama:

* `id`
* `name`
* `description`
* `created_at`
* `updated_at`

### `items`

Menyimpan data inventaris/perlengkapan.

Atribut utama:

* `id`
* `category_id`
* `name`
* `code`
* `description`
* `stock`
* `rental_price`
* `condition`
* `created_at`
* `updated_at`

### `rentals`

Menyimpan data transaksi penyewaan.

Atribut utama:

* `id`
* `user_id`
* `rental_date`
* `return_date`
* `status`
* `notes`
* `created_at`
* `updated_at`

### `rental_details`

Menyimpan detail barang pada setiap transaksi penyewaan.

Atribut utama:

* `id`
* `rental_id`
* `item_id`
* `quantity`
* `price_per_day`
* `rental_days`
* `subtotal`
* `created_at`
* `updated_at`

### Relasi Antar-Tabel

```text
users
  |
  | 1 : N
  v
rentals
  |
  | 1 : N
  v
rental_details
  ^
  | N : 1
  |
items
  ^
  | N : 1
  |
categories
```

Relasi yang digunakan:

* `users` **1:N** `rentals`
* `categories` **1:N** `items`
* `rentals` **1:N** `rental_details`
* `items` **1:N** `rental_details`

Foreign key digunakan untuk menjaga integritas hubungan antar-data.

## 5. Migration

Struktur database dibuat menggunakan Laravel Migration.

Migration utama yang tersedia:

```text
database/migrations/
├── 0001_01_01_000000_create_users_table.php
├── 0001_01_01_000001_create_cache_table.php
├── 0001_01_01_000002_create_jobs_table.php
├── 2026_09_24_164710_add_role_to_users_table.php
├── 2026_09_24_165157_create_categories_table.php
├── 2026_09_24_165315_create_items_table.php
├── 2026_09_24_230221_create_rentals_table.php
└── 2026_09_24_230444_create_rental_details_table.php
```

Migration membuat tabel beserta primary key, foreign key, unique constraint, default value, nullable field, dan tipe data yang diperlukan.

Contoh integritas referensial:

* `items.category_id` mengacu pada `categories.id`.
* `rentals.user_id` mengacu pada `users.id`.
* `rental_details.rental_id` mengacu pada `rentals.id`.
* `rental_details.item_id` mengacu pada `items.id`.

## 6. Seeder

Data contoh disediakan melalui:

```text
database/seeders/DatabaseSeeder.php
```

Seeder membuat data awal yang dapat digunakan untuk demonstrasi aplikasi.

Data contoh yang tersedia:

| Data           | Jumlah |
| -------------- | -----: |
| Users          |      2 |
| Categories     |      3 |
| Items          |      4 |
| Rentals        |      2 |
| Rental Details |      3 |

Data pengguna demo:

| Role      | Nama           | Email                                                 | Password |
| --------- | -------------- | ----------------------------------------------------- | -------- |
| Petugas   | Budi Petugas   | [petugas@example.com](mailto:petugas@example.com)     | password |
| Pelanggan | Andi Pelanggan | [pelanggan@example.com](mailto:pelanggan@example.com) | password |

> Akun dan password di atas merupakan data demo dari seeder dan bukan kredensial produksi.

## 7. Persyaratan Sistem

Sebelum menjalankan project, pastikan komputer telah memiliki:

* PHP 8.5 atau kompatibel dengan requirement Laravel project.
* Composer.
* PostgreSQL 18 atau versi PostgreSQL yang kompatibel.
* Node.js dan NPM.
* Git.

Pastikan extension PHP `pdo_pgsql` juga aktif karena aplikasi menggunakan PostgreSQL.

## 8. Menjalankan Project dari Nol

Bagian ini menjelaskan proses menjalankan project pada komputer baru setelah repository berhasil di-clone.

### Langkah 1 — Clone Repository

Clone repository:

```bash
git clone https://github.com/adeliauraa14/Sistem_Manajemen_Penyewaan_Inventaris.git
```

Masuk ke folder project:

```bash
cd Sistem_Manajemen_Penyewaan_Inventaris
```

### Langkah 2 — Install Dependency PHP

Jalankan:

```bash
composer install
```

Command ini akan memasang dependency Laravel berdasarkan `composer.lock`.

### Langkah 3 — Install Dependency JavaScript

Jalankan:

```bash
npm install
```

### Langkah 4 — Membuat File Environment

Salin file `.env.example` menjadi `.env`.

Pada Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Pada Linux/macOS:

```bash
cp .env.example .env
```

### Langkah 5 — Generate Application Key

Jalankan:

```bash
php artisan key:generate
```

Command tersebut akan mengisi `APP_KEY` pada file `.env`.

### Langkah 6 — Membuat Database PostgreSQL

Buat database PostgreSQL dengan nama:

```text
proyek_webframework
```

Contoh menggunakan PostgreSQL:

```sql
CREATE DATABASE proyek_webframework;
```

Pastikan PostgreSQL sedang berjalan sebelum melakukan migration.

### Langkah 7 — Konfigurasi Database

Buka file:

```text
.env
```

Sesuaikan konfigurasi database dengan PostgreSQL lokal.

Contoh:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=proyek_webframework
DB_USERNAME=postgres
DB_PASSWORD=your_postgresql_password
```

Ganti `your_postgresql_password` dengan password PostgreSQL pada komputer masing-masing.

> File `.env` tidak disimpan di repository karena dapat berisi password dan konfigurasi lokal. Repository hanya menyediakan `.env.example` sebagai template.

### Langkah 8 — Menjalankan Migration dan Seeder

Untuk membuat seluruh tabel sekaligus mengisi data demo:

```bash
php artisan migrate --seed
```

Setelah berhasil, database akan memiliki tabel Laravel dan tabel aplikasi:

```text
users
cache
jobs
categories
items
rentals
rental_details
```

### Langkah 9 — Reset Database dan Seeder

Jika ingin menghapus seluruh tabel kemudian membuat ulang database beserta data demo, gunakan:

```bash
php artisan migrate:fresh --seed
```

**Perhatian:** command tersebut akan menghapus seluruh tabel dan data pada database yang digunakan oleh aplikasi.

### Langkah 10 — Menjalankan Aplikasi

Jalankan Laravel development server:

```bash
php artisan serve
```

Kemudian buka:

```text
http://localhost:8000
```

Jika membutuhkan frontend development server, jalankan pada terminal lain:

```bash
npm run dev
```

## 9. Model Eloquent

Model yang tersedia pada aplikasi:

```text
app/Models/
├── User.php
├── Category.php
├── Item.php
├── Rental.php
└── RentalDetail.php
```

Relasi Eloquent yang digunakan:

### User

```text
User hasMany Rental
```

### Category

```text
Category hasMany Item
```

### Item

```text
Item belongsTo Category
Item hasMany RentalDetail
```

### Rental

```text
Rental belongsTo User
Rental hasMany RentalDetail
```

### RentalDetail

```text
RentalDetail belongsTo Rental
RentalDetail belongsTo Item
```

## 10. Struktur Folder yang Berkaitan dengan Database

```text
database/
├── factories/
│   └── UserFactory.php
├── migrations/
│   ├── ... migration Laravel
│   ├── ... migration categories
│   ├── ... migration items
│   ├── ... migration rentals
│   └── ... migration rental_details
└── seeders/
    └── DatabaseSeeder.php

app/
└── Models/
    ├── User.php
    ├── Category.php
    ├── Item.php
    ├── Rental.php
    └── RentalDetail.php
```

## 11. Verifikasi Database

Setelah menjalankan:

```bash
php artisan migrate --seed
```

jumlah data contoh yang diharapkan adalah:

```text
Users          : 2
Categories     : 3
Items          : 4
Rentals        : 2
Rental Details : 3
```

Relasi antar-model juga dapat diuji menggunakan Laravel Tinker:

```bash
php artisan tinker
```

Contoh:

```php
\App\Models\Item::with('category')->first()->category->name;
```

Untuk melihat kategori dari item pertama.

Contoh relasi kategori ke item:

```php
\App\Models\Category::with('items')->first()->items->count();
```

Contoh relasi rental ke pengguna:

```php
\App\Models\Rental::with('user')->first()->user->name;
```

Contoh relasi detail rental ke item:

```php
\App\Models\RentalDetail::with('item')->first()->item->name;
```

Keluar dari Tinker dengan:

```text
exit
```

## 12. Testing Migration dan Seeder

Untuk memastikan database dapat dibangun dari kondisi kosong, jalankan:

```bash
php artisan migrate:fresh --seed
```

Jika command berhasil tanpa error, migration dan seeder dapat digunakan untuk membangun database project dari awal.

## 13. Git dan Repository

Repository project:

https://github.com/adeliauraa14/Sistem_Manajemen_Penyewaan_Inventaris

Branch utama:

```text
main
```

Project menggunakan Git untuk version control.

File yang tidak disimpan ke repository antara lain:

```text
.env
/vendor
/node_modules
/public/build
```

File `.env.example` disediakan sebagai template konfigurasi environment.

## 14. Catatan Keamanan

Jangan memasukkan informasi sensitif ke repository, terutama:

* Password database.
* API key.
* Secret key.
* Token.
* Credential akun pribadi.

Gunakan file `.env` untuk konfigurasi lokal dan jangan mengubah `.env.example` menjadi tempat menyimpan password asli.

## 15. Status Baseproject

Baseproject telah mencakup:

* [x] Laravel project
* [x] PostgreSQL database configuration
* [x] Migration
* [x] Foreign key dan database constraints
* [x] Eloquent Model
* [x] Eloquent relationships
* [x] Seeder
* [x] Data demo
* [x] README
* [x] Git repository
* [x] GitHub repository
* [x] Dokumentasi langkah menjalankan project dari nol

## 16. Tujuan Project

Project ini dikembangkan sebagai sistem manajemen penyewaan dan inventaris perlengkapan acara berbasis web. Struktur database dirancang untuk memisahkan data master seperti kategori dan inventaris dari data transaksi penyewaan dan detail penyewaan, sehingga data dapat dikelola secara terstruktur dan memiliki integritas referensial.
