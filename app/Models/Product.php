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

    public function productprices(){
        return $this->hasMany(ProductPrice::class, 'product', 'productID');
    }

    public function productcategories()
    {
        return $this->belongsTo(ProductCategory::class, 'productCategory', 'categoryID');
    }

    public function productingredients()
    {
        return $this->hasMany(ProductIngredient::class, 'product', 'productID');
    }

    public function truckloaditems()
    {
        return $this->hasMany(TruckLoadItem::class, 'product', 'productID');
    }
}
