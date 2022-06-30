<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone',
        'city',
        'address',
        'province',
        'comments',
    ];
}
