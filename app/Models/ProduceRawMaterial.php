<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduceRawMaterial extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'productIngredientRawMaterialID';

    protected $table = 'ingredient_raw_materials';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product', 'productID');
    }

    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class, 'rawMaterial', 'rawMaterialID');
    }
}
