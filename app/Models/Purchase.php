<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'purchases';

    protected $primaryKey = 'purchaseID';

    protected $guarded = [];

    public function purchases(){
        return $this->belongsToMany(Purchase::class);
    }

    public function purchaseitems(){
        return $this->hasMany(PurchaseItem::class, 'purchaseID', 'purchaseID');
    }

    public function suppliers(){
        return $this->belongsTo(Supplier::class, 'supplier', 'supplierID');
    }
}
