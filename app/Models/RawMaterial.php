<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'raw_materials';

    protected $primaryKey = 'rawMaterialID';

    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierID', 'supplierID');
    }

    public function rawmaterialunits()
    {
        return $this->hasMany(RawMaterialUnit::class, 'rawMaterial', 'rawMaterialID');
    }

    public function premixingredients()
    {
        return $this->hasMany(PremixIngredient::class, 'rawMaterial', 'rawMaterialID');
    }
}
