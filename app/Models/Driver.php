<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'driverID';

    protected $table = 'drivers';

    protected $guarded = [];

    public function drivers(){
        return $this->belongsToMany(Driver::class);
    }
}
