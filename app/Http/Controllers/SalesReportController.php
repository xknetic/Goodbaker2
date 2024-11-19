<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Inertia\Inertia;
use App\Models\Branch;
use App\Models\Client;
use App\Models\Product;
use App\Models\SaleType;
use App\Models\SalesReport;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Exports\SalesReportExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/SalesReports/SalesReport', [
            'salesreports' => SalesReport::all(),
            'clients' => Client::all(),
            'productcategories' => ProductCategory::all(),
            'products' => Product::with(['productcategories', 'truckloaditems.saleitems.sale', 'productprices'])->get(),
            'branches' => Branch::all(),
            'saletypes' => SaleType::all(),
            'sales' => Sale::with(['delivery.saletypes', 'delivery.users', 'saletype', 'truck', 'saleitems.truckloaditems.products.productprices'])
            ->where('salesStatus', 'Completed') ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesReport $salesReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesReport $salesReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesReport $salesReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesReport $salesReport)
    {
        //
    }

    public function export(Request $request)
    {
        // dd('Export function hit');
        $year = $request->query('year');
        return Excel::download(new SalesReportExport($year), 'sales_report'. $year.'.xlsx');
    }
}
