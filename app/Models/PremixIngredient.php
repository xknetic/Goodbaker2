<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremixIngredient extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'premix_ingredients';

    protected $primaryKey = 'premixIngredientID';

    protected $guarded = [];

    public function premix()
    {
        return $this->belongsTo(Premix::class, 'premix', 'premixID');
    }

    public function rawmaterial()
    {
        return $this->belongsTo(RawMaterial::class, 'rawMaterial', 'rawMaterialID');
    }
}
