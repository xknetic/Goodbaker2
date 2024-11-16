<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\SalesTransactionJournal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalesTransactionJournalImport implements ToModel, WithHeadingRow
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

        $date = Carbon::createFromFormat('d-M-y H:i:s', trim($row['date']))
            ->format('Y-m-d H:i:s');

        return new SalesTransactionJournal([
            'StoreCode'            => $row['storecode'],
            'SalesDate'            => $date,
            'TransactionNo'        => $row['transaction_no'],
            'CustomerName'         => $row['customer_name'] ?? null,
            'BarCode'              => $row['barcode'],
            'SKU'                  => $row['sku'],
            'VatOrNonVAt'          => $row['vat_non_vat'],
            'QTY'                  => $row['qty'],
            'UOM'                  => $row['uom'],
            'UnitPrice'            => $row['unit_price'],
            'Amount'               => $row['amount'],
            'Charges'              => $row['charges'],
            'DiscountsOrAllowance' => $row['discounts_allowance'],
            'SalesReturns'         => $row['returns'],
            'VatAmount'            => $row['vatamount'] ?? null,
            'NetAmt'            => $row['net_amt'],
            'branch' => $this->branchID,
        ]);
    }
}
