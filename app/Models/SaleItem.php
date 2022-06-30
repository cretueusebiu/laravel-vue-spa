<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $table = 'ospos_sales_items';
    protected $primaryKey = 'item_id';
    public $timestamps = false;

    protected $fillable = [
        'item_id',
        'description',
        'quantity_purchased',
        'item_cost_price',
        'item_unit_price',
    ];

    public function item()
    {
        return $this->hasOne(Item::class, 'item_id', 'item_id');
    }
}
