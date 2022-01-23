<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'name', 'email', 'phone', 'address', 'city', 'province', 'comments',
  ];

  public function person()
  {
    return $this->hasOne(Person::class, 'person_id', 'person_id');
  }
}
