<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sales';

    protected $primaryKey = 'salesID';

    protected $guarded = [];

    public function delivery()
    {
        return $this->belongsTo(Delivery::class,'deliveryID' , 'deliveryID');
    }

    public function saletype()
    {
<<<<<<< HEAD
        return $this->belongsTo(SaleType::class);
=======
        return $this->belongsTo(SaleType::class, 'saleType');
>>>>>>> ccf9f6e (8/11)
    }

    public function truck()
    {
<<<<<<< HEAD
        return $this->belongsTo(Truck::class);
    }

    public function saleitems()
    {
        return $this->hasMany(SaleItem::class, 'salesID', 'salesID');
=======
        return $this->belongsTo(Truck::class, 'truck');
>>>>>>> ccf9f6e (8/11)
    }
}
