<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Display the updated inventory list
    public function index()
    {
        $supplies = Inventory::all();
        return view('inventory.index', compact('supplies'));
    }

    // Handle the submission of a new item form
    public function store(Request $request)
    {
        // 1. Validate form fields
        $validated = $request->validate([
            'ITEM_CODE'            => 'required|integer|unique:inventory,ITEM_CODE',
            'GENERIC_NAME'         => 'required|string|max:255',
            'BRAND_NAME'           => 'nullable|string|max:255', // Optional for non-medicine items
            'ITEM_CATEGORY'        => 'required|string',
            'ITEM_QUANTITY'        => 'required|integer|min:0',
            'ITEM_EXPIRATION_DATE' => 'required|date',
        ]);

        // 2. Insert record into MariaDB
        Inventory::create($validated);

        // 3. Bounce back to the layout with a success message banner
        return redirect('/inventory')->with('success', 'New supply item registered successfully!');
    }
}