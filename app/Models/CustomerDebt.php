<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDebt extends Model
{
    protected $table = 'customer_debt';
    protected $fillable = ['customer_id','total_debt_amount'];
}
