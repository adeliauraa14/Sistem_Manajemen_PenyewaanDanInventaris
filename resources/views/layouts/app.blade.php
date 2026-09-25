<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistem Rental')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: #1f2937;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .brand {
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar a {
            color: #d1d5db;
            text-decoration: none;
            margin-left: 20px;
        }

        .navbar a:hover {
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .btn {
            display: inline-block;
            padding: 9px 15px;
            border-radius: 5px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-danger {
            background: #dc2626;
        }

        .btn-secondary {
            background: #6b7280;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f3f4f6;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .alert {
            padding: 12px 15px;
            background: #dcfce7;
            color: #166534;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('dashboard') }}" class="brand">
        Sistem Rental
    </a>

    <div>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('categories.index') }}">Kategori</a>
        <a href="{{ route('items.index') }}">Barang</a>
        <a href="{{ route('rentals.index') }}">Rental</a>
    </div>
</nav>

<main class="container">

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert">
            <strong>Terjadi kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</main>

</body>
</html>