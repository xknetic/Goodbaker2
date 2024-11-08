<?php

namespace App\Imports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\SalesTransactionDiscountCharge;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalesTransactionDiscountChargeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * 
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $tranDate = Carbon::createFromFormat('d-M-y H:i:s', trim($row['tran_date_time']))
            ->format('Y-m-d H:i:s');

        // Map the rows to the database columns
        return new SalesTransactionDiscountCharge([
            'Terminal'     => $row['terminal'],
            'UserName'     => $row['user'],
            'TranDate'     => $tranDate,
            'TranNo'       => $row['tran_no'],
            'Discount'     => $row['discount'],
            'Allowance'    => $row['allowance'],
            'Charge'       => $row['charge'],
            'PesoCharge'   => $row['peso_charge'],
        ]);
    }
}
