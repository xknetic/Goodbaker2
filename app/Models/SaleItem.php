<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sale_items';

    protected $primaryKey = 'salesItemID';

    protected $guarded = [];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'salesID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    public function truckLoadItem()
    {
        return $this->belongsTo(TruckLoadItem::class, 'truckLoadItems');
    }
}
