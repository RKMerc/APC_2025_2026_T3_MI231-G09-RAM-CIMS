<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'ITEM_CODE';
    
    // Set to false if ITEM_CODE is a custom string (e.g., "MED-001")
    public $incrementing = false;
    protected $keyType = 'int';

    public $timestamps = false; 

    // Define columns safe for mass-assignment
    protected $fillable = [
        'ITEM_CODE',
        'GENERIC_NAME',
        'BRAND_NAME',
        'ITEM_CATEGORY',
        'ITEM_QUANTITY',
        'ITEM_EXPIRATION_DATE'
    ];
}