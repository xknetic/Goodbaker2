<?php

namespace App\Imports;

use App\Models\Branch;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BranchImport implements ToModel, WithHeadingRow
{
    /**
     * Convert each row into a Branch model.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Branch([
            'branchName' => $row['branch_name'],
            'contactPerson' => $row['contact_person'],
            'contact' => $row['contact'],
        ]);
    }
}
