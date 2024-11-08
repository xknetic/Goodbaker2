<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySalesTransaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'daily_sales_transactions';

    protected $guarded = [];
}
