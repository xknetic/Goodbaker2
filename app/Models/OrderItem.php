<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'order_item';

    protected $primaryKey = 'orderItemID';

    protected $guarded = [];

    public function orderForm()
    {
        return $this->belongsTo(OrderForm::class, 'orderID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}
