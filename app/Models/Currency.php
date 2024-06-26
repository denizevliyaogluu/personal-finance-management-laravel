<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $fillable = [
        'name',
        'code',
        'symbol',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
