<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplenishPremix extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'replenish_premixes';

    protected $primaryKey = 'replenishPremixID';

    protected $guarded = [];

    public function premixes() {
        return $this->belongsTo(Premix::class, 'premix', 'premixID');
    }
}
