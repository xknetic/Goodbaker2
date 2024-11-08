<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\SalesTransaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalesTransactionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $date = Carbon::createFromFormat('d-M-y H:i:s', trim($row['tran_date_time']))
            ->format('Y-m-d H:i:s');

        return new SalesTransaction([
            //
            'Terminal'   => $row['terminal'],
            'UserName'   => $row['user'],
            'TranDate'   => $date,
            'TranNo'     => $row['tran_no'],
            'Amount'     => $row['amount'],
        ]);
    }
}
