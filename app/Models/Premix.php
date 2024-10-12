<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premix extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function premixes(){
        return $this->belongsToMany(Premix::class);
    }
}
