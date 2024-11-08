<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'purchase_items';

    protected $primaryKey = 'purchaseItemID';

    protected $guarded = [];

    public function purchases(){
        return $this->belongsTo(Purchase::class, 'purchaseID');
    }

    public function rawmaterials(){
        return $this->belongsTo(RawMaterial::class, 'rawMaterialID', 'rawMaterialID');
    }
<<<<<<< HEAD

    public function rawmaterialunits(){
        return $this->belongsTo(RawMaterialUnit::class, 'unit', 'rawMaterialUnitID');
    }
=======
>>>>>>> ccf9f6e (8/11)
}
