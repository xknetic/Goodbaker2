<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sales_transactions';

    protected $guarded = [];
}
