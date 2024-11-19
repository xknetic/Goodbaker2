<?php

namespace App\Exports;

use App\Models\SalesReport;
use App\Models\Client;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Branch;
use App\Models\SaleType;
use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesReportExport implements FromCollection, WithHeadings, WithMapping
{
    protected $year;
    protected $highestSellingProducts;
    protected $lowestSellingProducts;

    public function __construct($year = null)
    {
        $this->year = $year;
        $this->calculateProductStats();
    }

    private function calculateProductStats()
    {
        $productTotals = [];
        
        // Get all sales for the year with their items
        $sales = Sale::with(['saleitems.truckloaditems.products'])
            ->whereYear('salesDate', $this->year)
            ->get();

        // Calculate totals for each product
        foreach ($sales as $sale) {
            foreach ($sale->saleitems as $saleitem) {
                $product = $saleitem->truckloaditems->products;
                $productName = $product->productName;
                $quantity = $saleitem->quantity;

                if (!isset($productTotals[$productName])) {
                    $productTotals[$productName] = 0;
                }
                $productTotals[$productName] += $quantity;
            }
        }

        // Find highest selling products
        $maxQuantity = !empty($productTotals) ? max($productTotals) : 0;
        $this->highestSellingProducts = array_filter($productTotals, function($quantity) use ($maxQuantity) {
            return $quantity === $maxQuantity;
        });

        // Find lowest selling products
        $minQuantity = !empty($productTotals) ? min($productTotals) : 0;
        $this->lowestSellingProducts = array_filter($productTotals, function($quantity) use ($minQuantity) {
            return $quantity === $minQuantity;
        });
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $sales = Sale::with(['saleitems.truckloaditems.products.productprices', 'delivery.users', 'delivery.saletypes'])
            ->whereYear('salesDate', $this->year)
            ->get();

        $exportData = [];
        
        foreach ($sales as $sale) {
            $saleData = [
                'date' => $sale->salesDate,
                'transaction_date' => $sale->salesDate,
                'agent_name' => $sale->delivery->users->name ?? '',
                'sale_type' => $sale->delivery->saletypes->saleTypeName ?? '',
                'status' => $sale->salesStatus,
                'total_sales' => 0,
                'items' => []
            ];

            foreach ($sale->saleitems as $saleitem) {
                $product = $saleitem->truckloaditems->products;
                $price = $product->productprices[0]->price ?? 0;
                $quantity = $saleitem->quantity;
                $amount = $price * $quantity;
                $saleData['total_sales'] += $amount;

                $saleData['items'][] = [
                    'product_name' => $product->productName,
                    'quantity' => $quantity,
                    'price' => $price,
                    'amount' => $amount
                ];
            }

            $exportData[] = $saleData;
        }

        return collect($exportData);
    }

    public function headings(): array
    {
        return [
            'Date',
            'Highest Selling Products',
            'Lowest Selling Products',
            'Agent Name',
            'Total Sales',
            'Transaction Date',
            'Sale Type',
            'Product Items',
            'Quantity',
            'Price',
            'Amount',
            'Total',
            'Status',
        ];
    }

    public function map($row): array
    {
        // Format highest selling products
        $highestProducts = array_map(function($quantity, $product) {
            return "$product: $quantity";
        }, $this->highestSellingProducts, array_keys($this->highestSellingProducts));
        
        // Format lowest selling products
        $lowestProducts = array_map(function($quantity, $product) {
            return "$product: $quantity";
        }, $this->lowestSellingProducts, array_keys($this->lowestSellingProducts));

        return [
            $row['date'],
            implode(', ', $highestProducts), // Highest Selling Products
            implode(', ', $lowestProducts),  // Lowest Selling Products
            $row['agent_name'],
            $row['total_sales'],
            $row['transaction_date'],
            $row['sale_type'],
            implode(', ', array_column($row['items'], 'product_name')),
            implode(', ', array_column($row['items'], 'quantity')),
            implode(', ', array_column($row['items'], 'price')),
            implode(', ', array_column($row['items'], 'amount')),
            $row['total_sales'], // Total matches total_sales
            $row['status']
        ];
    }
}
