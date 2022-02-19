<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Notes extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'subject',
        'message',
    ];
    public function user(): HasOne {
        return $this->belongsTo(User::class);
    }
  
}
