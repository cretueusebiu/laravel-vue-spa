<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'ospos_items';
    protected $primaryKey = 'item_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'category',
        'stock_type',
    ];
}
