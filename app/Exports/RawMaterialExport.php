<?php

namespace App\Exports;

use App\Models\RawMaterial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RawMaterialExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return RawMaterial::with(['supplier', 'rawmaterialunits'])->get();
    }

    public function headings(): array
    {
        return [
            'Supplier Name',
            'Raw Material Name', 
            'Type',
            'Unit',
            'Price',
            'Stocks',
            'Amount'
        ];
    }

    public function map($rawMaterial): array
    {
        $units = [];
        $prices = [];
        $stocks = [];
        $amounts = [];

        foreach ($rawMaterial->rawmaterialunits as $unit) {
            $units[] = $unit->unit;
            $prices[] = $unit->price;
            $stocks[] = $unit->stock;
            $amounts[] = $unit->price * $unit->stock;
        }

        return [
            $rawMaterial->supplier->supplierName,
            $rawMaterial->rawMaterialName,
            $rawMaterial->type . ' x ' . $rawMaterial->typeQuantity,
            implode(", ", $units),
            implode(", ", $prices),
            implode(", ", $stocks),
            implode(", ", $amounts)
        ];
    }
}