<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'product_ingredients';

    protected $primaryKey = 'productIngredientID';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product', 'productID');
    }

    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class, 'rawMaterial', 'rawMaterialID');
    }

    public function premixes()
    {
        return $this->belongsTo(Premix::class, 'premix', 'premixID');
    }
}