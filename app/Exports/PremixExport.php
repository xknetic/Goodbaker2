<?php

namespace App\Exports;

use App\Models\Premix;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PremixExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Premix::all();
    }

    public function headings(): array
    {
        return [
            'Premix',
            'Size',
            'Quantity',
            'Cost',
            'Amount'
        ];
    }

    public function map($premix): array
    {
        return [
            $premix->premixName,
            $premix->size,
            $premix->quantity,
            $premix->cost,
            $premix->quantity * $premix->cost // Calculate Amount
        ];
    }
}