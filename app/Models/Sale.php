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

    public function deliveries()
    {
        return $this->belongsTo(Delivery::class,'deliveryID' , 'deliveryID');
    }

    public function saletypes()
    {
        return $this->belongsTo(SaleType::class, 'saleType');
    }

    public function trucks()
    {
        return $this->belongsTo(Truck::class, 'truck');
    }
}
