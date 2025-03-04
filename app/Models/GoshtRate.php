<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoshtRate extends Model
{
    protected $table = 'gosht_rates';
    protected $fillable = ['rate', 'date','status'];
}
