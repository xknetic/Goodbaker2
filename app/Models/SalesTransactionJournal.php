<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransactionJournal extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sales_transaction_journals';

    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch', 'branchID');
    }
}
