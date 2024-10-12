<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'areas';

    protected $guarded = [];

    public function areas(){
        return $this->hasMany(Area::class, 'area', 'areaID');
    }
}
