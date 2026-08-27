<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'ITEM_CODE';
    
    // Set to false if ITEM_CODE is a custom string (e.g., "MED-001") rather than an auto-incrementing integer
    public $incrementing = false; // Change from false to true
    protected $keyType = 'int';   // Change from 'string' to 'int'

    public $timestamps = false; 

    // Define columns safe for mass-assignment (excluding price, adding generic/brand)
    protected $fillable = [
        'ITEM_CODE',
        'GENERIC_NAME',
        'BRAND_NAME',
        'ITEM_CATEGORY',
        'ITEM_QUANTITY',
        'ITEM_EXPIRATION_DATE'
    ];
}