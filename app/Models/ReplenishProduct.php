<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplenishProduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'replenish_products';

    protected $primaryKey = 'replenishProductID';

    protected $guarded = [];

    public function productingredients() {
        return $this->hasBelongTo(ProductIngredient::class, 'productIngredient', 'productIngredientID');
    }
}
