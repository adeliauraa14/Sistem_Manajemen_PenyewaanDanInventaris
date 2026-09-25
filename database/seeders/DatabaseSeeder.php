<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\Rental;
use App\Models\RentalDetail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // USERS
        // =========================

        $petugas = User::create([
            'name' => 'Budi Petugas',
            'email' => 'petugas@example.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);

        $pelanggan = User::create([
            'name' => 'Andi Pelanggan',
            'email' => 'pelanggan@example.com',
            'password' => Hash::make('password'),
            'role' => 'pelanggan',
        ]);

        // =========================
        // CATEGORIES
        // =========================

        $kamera = Category::create([
            'name' => 'Kamera',
            'description' => 'Peralatan kamera untuk kebutuhan dokumentasi.',
        ]);

        $laptop = Category::create([
            'name' => 'Laptop',
            'description' => 'Laptop untuk kebutuhan kerja dan kegiatan.',
        ]);

        $proyektor = Category::create([
            'name' => 'Proyektor',
            'description' => 'Peralatan proyektor untuk presentasi dan acara.',
        ]);

        // =========================
        // ITEMS
        // =========================

        $itemKamera = Item::create([
            'category_id' => $kamera->id,
            'name' => 'Canon EOS 1500D',
            'code' => 'KMR-001',
            'description' => 'Kamera DSLR untuk dokumentasi.',
            'stock' => 3,
            'rental_price' => 150000,
            'condition' => 'baik',
        ]);

        $itemKamera2 = Item::create([
            'category_id' => $kamera->id,
            'name' => 'Sony A6400',
            'code' => 'KMR-002',
            'description' => 'Kamera mirrorless untuk foto dan video.',
            'stock' => 2,
            'rental_price' => 200000,
            'condition' => 'baik',
        ]);

        $itemLaptop = Item::create([
            'category_id' => $laptop->id,
            'name' => 'Lenovo ThinkPad',
            'code' => 'LPT-001',
            'description' => 'Laptop untuk kebutuhan kerja.',
            'stock' => 4,
            'rental_price' => 175000,
            'condition' => 'baik',
        ]);

        $itemProyektor = Item::create([
            'category_id' => $proyektor->id,
            'name' => 'Epson EB-X06',
            'code' => 'PRJ-001',
            'description' => 'Proyektor untuk presentasi.',
            'stock' => 2,
            'rental_price' => 125000,
            'condition' => 'baik',
        ]);

        // =========================
        // RENTALS
        // =========================

        $rental1 = Rental::create([
            'user_id' => $pelanggan->id,
            'rental_date' => now()->toDateString(),
            'return_date' => now()->addDays(2)->toDateString(),
            'status' => 'menunggu',
            'notes' => 'Rental untuk kegiatan dokumentasi.',
        ]);

        $rental2 = Rental::create([
            'user_id' => $pelanggan->id,
            'rental_date' => now()->subDays(5)->toDateString(),
            'return_date' => now()->subDays(3)->toDateString(),
            'status' => 'selesai',
            'notes' => 'Rental telah selesai.',
        ]);

        // =========================
        // RENTAL DETAILS
        // =========================

        RentalDetail::create([
            'rental_id' => $rental1->id,
            'item_id' => $itemKamera->id,
            'quantity' => 1,
            'price_per_day' => $itemKamera->rental_price,
            'rental_days' => 2,
            'subtotal' => $itemKamera->rental_price * 2,
        ]);

        RentalDetail::create([
            'rental_id' => $rental1->id,
            'item_id' => $itemProyektor->id,
            'quantity' => 1,
            'price_per_day' => $itemProyektor->rental_price,
            'rental_days' => 2,
            'subtotal' => $itemProyektor->rental_price * 2,
        ]);

        RentalDetail::create([
            'rental_id' => $rental2->id,
            'item_id' => $itemLaptop->id,
            'quantity' => 1,
            'price_per_day' => $itemLaptop->rental_price,
            'rental_days' => 2,
            'subtotal' => $itemLaptop->rental_price * 2,
        ]);
    }
}