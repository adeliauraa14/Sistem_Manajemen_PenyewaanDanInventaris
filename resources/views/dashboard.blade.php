@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1>Dashboard</h1>

    <p>Selamat datang di Sistem Rental.</p>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 25px;">

        <div class="card">
            <h3>Total Kategori</h3>
            <h2>{{ $totalCategories }}</h2>

            <a href="{{ route('categories.index') }}" class="btn">
                Lihat Kategori
            </a>
        </div>

        <div class="card">
            <h3>Total Barang</h3>
            <h2>{{ $totalItems }}</h2>

            <a href="{{ route('items.index') }}" class="btn">
                Lihat Barang
            </a>
        </div>

        <div class="card">
            <h3>Total Rental</h3>
            <h2>{{ $totalRentals }}</h2>

            <a href="{{ route('rentals.index') }}" class="btn">
                Lihat Rental
            </a>
        </div>

    </div>

@endsection