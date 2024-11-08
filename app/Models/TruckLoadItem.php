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
<<<<<<< HEAD
        return $this->belongsTo(Delivery::class, 'deliveryID', 'deliveryID');
=======
        return $this->belongsToMany(Delivery::class, 'deliveryID', 'deliveryID');
>>>>>>> ccf9f6e (8/11)
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product', 'productID');
    }
<<<<<<< HEAD

    public function saleitems()
    {
    return $this->hasMany(SaleItem::class, 'truckLoadItem', 'truckLoadItemID');
    }
=======
>>>>>>> ccf9f6e (8/11)
}
