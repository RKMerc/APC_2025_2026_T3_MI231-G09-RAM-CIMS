<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $supplies = Inventory::all();
        return view('inventory.index', compact('supplies'));
    }

    // Handle the submission of a new item form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ITEM_CODE'            => 'required|integer|unique:inventory,ITEM_CODE',
            'GENERIC_NAME'         => 'required|string|max:255',
            'BRAND_NAME'           => 'nullable|string|max:255',
            'ITEM_CATEGORY'        => 'required|string',
            'ITEM_QUANTITY'        => 'required|integer|min:0',
            'ITEM_EXPIRATION_DATE' => 'required|date',
        ]);

        $item = Inventory::create($validated);

        return response()->json([
            'status'  => 'Success',
            'message' => 'Item created successfully',
            'data'    => $item,
        ], 201);
    }

    public function update(Request $request, $code)
    {
        $item = Inventory::where('ITEM_CODE', $code)->firstOrFail();

        $validated = $request->validate([
            // FIXED: Ignore existing record during unique check
            'ITEM_CODE'            => 'required|integer|unique:inventory,ITEM_CODE,' . $code . ',ITEM_CODE',
            'GENERIC_NAME'         => 'required|string|max:255',
            'BRAND_NAME'           => 'nullable|string|max:255',
            'ITEM_CATEGORY'        => 'required|string',
            'ITEM_QUANTITY'        => 'required|integer|min:0',
            'ITEM_EXPIRATION_DATE' => 'required|date',
        ]);

        $item->update($validated);

        return response()->json([
            'status'  => 'Success',
            'message' => 'Item updated successfully',
            'data'    => $item,
        ], 200);
    }
}