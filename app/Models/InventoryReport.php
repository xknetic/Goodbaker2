<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inventoryreports(){
        return $this->belongsToMany(InventoryReport::class);
    }
}
