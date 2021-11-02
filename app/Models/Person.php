<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'ospos_people';

    protected $primaryKey = 'person_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'phone_number',
        'email',
        'address_1',
        'city',
        'state',
        'zip',
        'country',
        'comments',
    ];
}
