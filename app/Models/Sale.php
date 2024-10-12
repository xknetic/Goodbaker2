<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sales(){
        return $this->belongsToMany(Sale::class);
    }

    public function clients(){
        return $this->belongsToMany(Client::class);
    }
}
