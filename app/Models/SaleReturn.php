<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sale_returns';

    protected $guarded = [];
    
    public function saleReturns(){
        return $this->hasMany(SaleReturn::class);
    }
}
