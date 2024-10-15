<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premix extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'premixID';

    protected $table = 'premixes';

    protected $guarded = [];

    public function premixes(){
        return $this->belongsToMany(Premix::class);
    }
}
