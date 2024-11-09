<?php

namespace App\Exports;

use App\Models\SalesReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesReportExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Fetch all sales reports or customize as needed
        return SalesReport::with(['client', 'branch', 'saletypes', 'productcategories', 'products'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Client Name',
            'Branch Name',
            'Sale Type',
            'Product Category',
            'Product Name',
            'Quantity',
            'Price',
            'Total Amount',
            'Status',
            'Date',
        ];
    }

    public function map($salesReport): array
    {
        return [
            $salesReport->id,
            $salesReport->client->name ?? 'N/A',
            $salesReport->branch->name ?? 'N/A',
            $salesReport->saletypes->saleTypeName ?? 'N/A',
            $salesReport->productcategories->name ?? 'N/A',
            $salesReport->products->productName ?? 'N/A',
            $salesReport->quantity,
            $salesReport->price,
            $salesReport->quantity * $salesReport->price,
            $salesReport->salesStatus,
            $salesReport->salesDate,
        ];
    }
}
