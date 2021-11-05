<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'ospos_sales';
    protected $primaryKey = 'sale_id';
    public $timestamps = false;

    protected $fillable = [
        'sale_time',
        'customer_id',
        'employee_id',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'person_id', 'customer_id');
    }
}
