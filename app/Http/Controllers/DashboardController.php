<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Branch;
use App\Models\Client;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\SaleType;
use App\Models\SalesReport;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Dashboard', [
            'salesreports' => SalesReport::all(),
            'clients' => Client::all(),
            'productcategories' => ProductCategory::all(),
            'products' => Product::with(['productcategories', 'truckloaditems.saleitems.sale'])->get(),
            'branches' => Branch::all(),
            'saletypes' => SaleType::all(),
            'sales' => Sale::with(['delivery.saletypes', 'delivery.users', 'saletype', 'truck', 'saleitems.truckloaditems.products.productprices'])->get(),
            'deliveries' => Delivery::with(['trucks', 'drivers', 'clients', 'saletypes', 'truckloaditems', 'users'])->get(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
