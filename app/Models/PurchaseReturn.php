<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'purchase_returns';

    protected $guarded = [];
    
    public function purchaseReturns(){
        return $this->hasMany(PurchaseReturn::class);
    }
}
