<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestCount extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'guest_counts';

    protected $guarded = [];

    protected $date = 'date';
}
