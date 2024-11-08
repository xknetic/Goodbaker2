<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransactionDiscountCharge extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sales_transaction_discount_charges';

    protected $guarded = [];
}
