<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadIn extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'load_ins';

    protected $guarded = [];
}
