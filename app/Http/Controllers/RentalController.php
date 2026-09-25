<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('user', 'rentalDetails.item')
            ->latest()
            ->get();

        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $items = Item::where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        return view('rentals.create', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rental_date',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'menunggu';

        $rental = Rental::create($validated);

        return redirect()
            ->route('rentals.show', $rental)
            ->with('success', 'Pengajuan rental berhasil dibuat.');
    }

    public function show(Rental $rental)
    {
        $rental->load('user', 'rentalDetails.item');

        return view('rentals.show', compact('rental'));
    }

    public function edit(Rental $rental)
    {
        return view('rentals.edit', compact('rental'));
    }

    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rental_date',
            'status' => 'required|string|max:30',
            'notes' => 'nullable|string',
        ]);

        $rental->update($validated);

        return redirect()
            ->route('rentals.show', $rental)
            ->with('success', 'Data rental berhasil diperbarui.');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()
            ->route('rentals.index')
            ->with('success', 'Rental berhasil dihapus.');
    }
}