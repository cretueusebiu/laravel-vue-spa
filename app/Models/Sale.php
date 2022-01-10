<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    const SALE_TYPE_POS = 0;
    const SALE_TYPE_INVOICE = 1;
    const SALE_TYPE_WORK_ORDER = 2;
    const SALE_TYPE_QUOTE = 3;
    const SALE_TYPE_RETURN = 4;

    const SALE_STATUS_COMPLETED = 0;
    const SALE_STATUS_SUSPENDED = 1;
    const SALE_STATUS_CANCELED = 2;

    protected $table = 'ospos_sales';
    protected $primaryKey = 'sale_id';
    public $timestamps = false;

    protected $fillable = [
        'sale_time',
        'customer_id',
        'employee_id',
        'comment',
        'sale_status',
        'sale_type',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'person_id', 'customer_id');
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class, 'sale_id', 'sale_id');
    }

    public function payments()
    {
        return $this->hasMany(SalePayment::class, 'sale_id', 'sale_id');
    }
}
