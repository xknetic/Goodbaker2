<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\DailySalesTransaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DailySalesTransactionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $branchID;

    // Constructor to accept branchID
    public function __construct($branchID)
    {
        $this->branchID = $branchID;
    }
    public function model(array $row)
    {

        $date = Carbon::createFromFormat('d/m/Y', trim($row['logdate']))->format('Y-m-d');

        $logTime = Carbon::createFromFormat('g:i:s a', $row['logtime'])->format('H:i:s');

        return new DailySalesTransaction([
            //
            'StoreName' => $row['storename'],
            'LogDate' => $date,
            'LogDay' => $row['logday'],
            'LogTime' => $logTime,
            'TransactionNo' => $row['transactionno'],
            'TerminalNo' => $row['terminalno'],
            'CustomerName' => $row['customername'] ?? null,
            'ProductCode' => $row['productcode'],
            'ProductDescription' => $row['description'],
            'Category' => $row['category'] ?? null,
            'TotalQTY' => $row['totalqty'],
            'UOM' => $row['uom'],
            'Price' => $row['price'],
            'GrossSales' => $row['grosssales'],
            'SalesReturns' => $row['returns'],
            'SalesREGDISC' => $row['regdisc'],
            'SalesSCDISC' => $row['scdisc'],
            'SalesPWDDISC' => $row['pwddisc'],
            'VATEXEMPT' => $row['vatexempt'],
            'NETSALES' => $row['netsales'],
            'VATNONVAT' => $row['vatnonvat'],
            'branch' => $this->branchID,
        ]);
    }
}
