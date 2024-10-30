<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Driver;
use App\Models\TruckLoadItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    public $timestamps = True;

    protected $table = 'deliveries';

    protected $primaryKey = 'deliveryID';

    protected $guarded = [];

    public function trucks()
    {
        return $this->belongsTo(Truck::class, 'truck', 'truckID');
    }

    public function drivers()
    {
        return $this->belongsTo(Driver::class, 'truckDriver', 'driverID');
    }

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client', 'clientID');
    }

    public function saletypes()
    {
        return $this->belongsTo(SaleType::class, 'saleType', 'saleTypeId');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'agent', 'id');
    }

    public function truckloaditems()
    {
        return $this->hasMany(TruckLoadItem::class, 'deliveryID', 'deliveryID');
    }
}
