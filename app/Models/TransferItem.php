<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'transfer_items';

    protected $primaryKey = 'transferItemID';

    protected $guarded = [];

    public function transfers(){
        return $this->belongsTo(Transfer::class, 'transferID', 'transferID');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product', 'productID');
    }

    public function premixes()
    {
        return $this->belongsTo(Premix::class, 'premix', 'premixID');
    }

    public function rawmaterials()
    {
        return $this->belongsTo(RawMaterial::class, 'rawMaterial', 'rawMaterialID');
    }
}
