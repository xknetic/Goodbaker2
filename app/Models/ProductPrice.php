<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'product_prices';

    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product', 'productID');
    }

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area', 'areaID');
    }
}
