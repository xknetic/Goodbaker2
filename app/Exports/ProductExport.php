<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::with(['productcategories', 'productprices'])->get();
    }

    public function headings(): array
    {
        return [
            'Category',
            'Product Name',
            'Unit',
            'Quantity',
            'Price',
            'Amount'
        ];
    }

    public function map($product): array
    {
        $price = $product->productprices->first()->price ?? 0;
        $amount = $price * $product->quantity;
        
        return [
            $product->productcategories->categoryName ?? '',
            $product->productName,
            $product->unit,
            $product->quantity,
            $price,
            $amount
        ];
    }
}