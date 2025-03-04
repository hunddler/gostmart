<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSupplies extends Model
{
    protected $table = 'customer_supplies';
    protected $fillable = ['customer_id', 'chicken_supply','discount_per_kg','total_amount','received_amount','difference','debt','date','status','previous_debt_amount'];

}
