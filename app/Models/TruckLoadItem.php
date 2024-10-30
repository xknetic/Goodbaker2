<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckLoadItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'truck_load_items';

    protected $primaryKey = 'truckLoadItemID';

    protected $guarded = [];

    public function delivery()
    {
        return $this->belongsToMany(Delivery::class, 'deliveryID', 'deliveryID');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product', 'productID');
    }
}
