<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashInOut extends Model
{
    protected $table = 'cash_in_out';
    protected $fillable = ['customer_id','debt_amount','cash','diffrence','total_debt_amount','detail','document','type','date'];
}
