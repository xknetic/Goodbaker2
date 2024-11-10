<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'clientID';

    protected $table = 'clients';

    protected $guarded = [];

    public function clients(){
        return $this->belongsToMany(Client::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class, 'client', 'clientID');
    }
}
