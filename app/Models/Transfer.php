<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\TransferItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'transfers';

    protected $primaryKey = 'transferID';

    protected $guarded = [];

    public function transferitems(){
        return $this->hasMany(TransferItem::class, 'transferID', 'transferID');
    }

    public function branches()
    {
        return $this->belongsTo(Branch::class, 'branch', 'branchID');
    }
}
