<?php

namespace App\Imports;

use App\Models\SalesTransactionCount;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalesTransactionCountImport implements ToModel,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SalesTransactionCount([
            'Terminal' => $row['terminal'],
            'Amount' => $row['amount'],
            'SalesCount' => $row['count'],
        ]);
    }
}
