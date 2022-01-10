<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'ospos_app_config';
    protected $primaryKey = 'key';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'value',
    ];
}
