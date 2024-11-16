<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\GuestCount;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuestCountImport implements ToModel, WithHeadingRow
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
        // // Convert the date to the correct format
        $date = Carbon::createFromFormat('d-M-y H:i:s', trim($row['date']))->format('Y-m-d');
        
        // // Convert time if present (nullable)
        // $time = isset($row['time']) ? Carbon::createFromFormat('H:i', trim($row['time']))->format('H:i:s') : null;
        
        // Return a new GuestCount model with the mapped data
        return new GuestCount([
            'StoreName'        => $row['store_name'],
            'Date'        => $date,
            'Day'         => $row['day'],
            'Time'        => $row['time'],
            'TransactionType'  => $row['transaction_type'],
            'TransactionNo'    => $row['transaction_no'],
            'GuestCount'       => $row['guest_count'],
            'GrossAmount'      => $row['gross_amount'],
            'Return'      => $row['return'],
            'RegularDiscount'  => $row['regular_discount'],
            'SeniorDiscount'   => $row['senior_discount'],
            'PWDDiscount'      => $row['pwd_discount'],
            'VatExempt'        => $row['vat_exempt'],
            'NetAmount'        => $row['net_amount'],
            'branch' => $this->branchID,
        ]);
    }
}