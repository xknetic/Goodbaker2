<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleType extends Model
{
    use HasFactory;

    protected $table = 'sale_types';

    protected $primaryKey = 'saleTypeId';

    protected $guarded = [];

    public $timestamps = false;

    public function saletypes(){
        return $this->belongsToMany(SaleType::class);
    }
}
