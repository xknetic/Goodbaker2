<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadOrder extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'bad_orders';

    protected $guarded = [];

    public function truckLoadItem()
    {
        return $this->belongsTo(TruckLoadItem::class, 'truckLoadItemID');
    }
}
