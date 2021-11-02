<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'ospos_customers';
    protected $primaryKey = 'person_id';

    protected $fillable = [
        'company_name',
    ];

    public function person()
    {
        return $this->hasOne(Person::class, 'person_id', 'person_id');
    }
}
