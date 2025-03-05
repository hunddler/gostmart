<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FatWaste extends Model
{
    protected $table = 'fat_waste';
    protected $fillable = ['customer_id','fat_waste_kg','fat_waste_rate','total','date','type'];
}
