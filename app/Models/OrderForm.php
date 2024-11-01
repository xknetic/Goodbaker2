<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderForm extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = 'order_forms';

    protected $primaryKey = 'orderID';

    protected $guarded = [];

    public function orderform(){
        return $this->belongsToMany(OrderForm::class);
    }
}
