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

    public function premixingredients()
    {
        return $this->hasMany(PremixIngredient::class, 'premix', 'premixID');
    }

    public function productingredients()
    {
        return $this->hasMany(ProductIngredient::class, 'premix', 'premixID');
    }
    
    public function replenishpremixes()
    {
        return $this->hasMany(ReplenishPremix::class, 'premix', 'premixID');
    }
}
