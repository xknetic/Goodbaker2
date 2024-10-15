<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'productID';

    protected $table = 'products';

    protected $guarded = [];

    public function products(){
        return $this->hasMany(ProductPrice::class, 'product', 'productID');
    }
}
