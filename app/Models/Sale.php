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
        return $this->belongsTo(SaleType::class, 'saleType');
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck');
    }
}
