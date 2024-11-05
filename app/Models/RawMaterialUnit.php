<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterialUnit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'raw_material_units';

    protected $primaryKey = 'rawMaterialUnitID';

    protected $guarded = [];

    public function rawmaterials()
    {
        return $this->belongsTo(RawMaterial::class,'rawMaterial' , 'rawMaterialID');
    }

    public function purchaseitems()
    {
        return $this->hasMany(PurchaseItem::class,'unit' , 'rawMaterialUnitID');
    }

}
