<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'saldo', 'hutang', 'difference'
    ];

    public function user_id()
    {
        return $this->belongsTo(User::class);
    }
}
