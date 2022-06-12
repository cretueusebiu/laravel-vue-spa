<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'item_name',
        'category',
        'item_type',
        'barcode',
        'company_name',
        'cost_price',
        'sale_price',
        'bulk_price',
        'available_quantity',
        'description'
    ];
}
